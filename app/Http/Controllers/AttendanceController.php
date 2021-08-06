<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

//use Illuminate\Support\Facades\Auth;

use DB;

use Session;

use Auth;

use Mail;

use URL;

use Hash;

use Validator;

use Illuminate\Support\Str;

use App\Main_users;

use DateTime;

use DatePeriod;

use DateInterval;



class AttendanceController extends Controller

{



  protected $_name = 'main_attendance';

  protected $_primary = 'id';

  protected $startDay = 21;

  protected $endDay = 20;

  protected $attEndDay = 20;

  protected $monthInterval = 1;

    

    public function attandance_correction(){

     

      $userId = Auth::guard('main_users')->user()??'';









  

    return view('attendance.attendance_correction',['users' =>$userId]);



    }





    function emp_sallary(){



      return view('attendance.attendance_sallary');





    }



    public function attandance_info(Request $request){

        

       // dd($request->all());

         $weekEnds = array();

          $chunks = array();

          $holidayArr = array();

           $leavearraydate = array();

       $month = date('m');

       $newdate = date('Y-m', strtotime(date('Y-m').'+-1 months'));

       $shownewdate = date('m-Y', strtotime(date('Y-m').'+-1 months'));       

       $year = date('Y');

         

        

       $userid = Auth::guard('main_users')->user()->id;

       $userRole = Auth::guard('main_users')->user()->emprole;

       $startdate = $this->startDay.'-'.$shownewdate;

       $userList = DB::table('main_users');

       if($userRole != 1 && $userRole != 4 && $userRole != 11 && $userRole != 3){

           

           $userList->where('id',$userid);



       }else if($userRole == 3){

        $uder_user_id = array();

         $uder_user_id[] = $userid;

        $users = DB::table('main_users')->where('reporting_manager',$userid)->where('isactive',1)->get();

        foreach ($users as $key => $user) {

          $uder_user_id[] = $user->id;

        }

        

        $userList->whereIn('id',$uder_user_id);





       }

       $useralllist = array();

       $userList = $userList->where('isactive',1)->orderBy('main_users.userfullname','ASC')->select('id','userfullname')->get();



       if($userRole == 1 || $userRole == 4 || $userRole == 11){

           

            foreach ($userList as $key => $userLists) {

          

        }

         $userLists->id = 1000;

         $userLists->userfullname = 'All Employees';



       }

       

      $gerseachuser = DB::table('main_users')->where('id',$userid)->select('id','userfullname')->first();

       $availleave = $this->getAvailableLeave($userid);

       



       $enddate = $this->endDay.'-'. $month .'-'.$year;



       $range =  $startdate.'  to '.$enddate;

      // dd($startdate);



                $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);

                  $wkYear = ($month==12) ? ($year+1) : $year;

                  $wkMonth = ($month==12) ? '01' : ($month+1);



                  

                  $start = new DateTime($year.'-'.$month.'-01');

                  $interval = new DateInterval('P1D');

                 

                  $end = new DateTime($wkYear.'-'.$wkMonth.'-01');



                  $period = new DatePeriod($start,$interval,$end);

                

               // dd($period);

      

                  foreach ($period as $day){

                    if ($day->format('N') == 6 || $day->format('N') == 7){

                      $weekEnds[$day->format('Y-m-d')] = true;

                    }

                  }



                  $weekEnds  = count($weekEnds);



       $attstatedate = $newdate.'-'.$this->startDay;

       $attenddate = $year.'-'. $month.'-'.$this->attEndDay;



         

     // $leavearraydate = array();

      $culculateleavedat = DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'L')->count();

      

       

     

      $presentday =

                      DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'P')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'CORR')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'NTS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'OS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'NS')->count()  ;





       

         $absent  = 1 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'LWP')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'HL')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'FTCO')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'FTCI')->count()  + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'HPL')->count();

         

        



         $holiday  = $this->count_holyday_day(date('m'),date('Y'));

        



           foreach ($holiday as $holidays) {

            $holidayArr[] =   date('Ymd',strtotime($holidays->holidaydate));

        }



      



         $attendance  = $this->createDateRangeArray($attstatedate,$attenddate);

         //dd($attendance);

         // if(isset($culculateleavedat)){

         //  foreach ($culculateleavedat as $culculateleavedats) {

         //    $leavearraydate =  (array) date('Ymd',strtotime($culculateleavedats->from_date));

         //    }



         // }

           

 

        // dd($leavearraydate);

          



           $chunks = array_chunk($attendance, 7);

           $Hourchunks = array_chunk($attendance, 7);

           $total =0;

           $reqhouse = 0;

           

           foreach ($Hourchunks as $key => &$chunkData) {

           $hour = 0;

           $mints = 0;

            foreach($chunkData as $k => &$showDate) {

              $getdate = DB::table('main_attendance')->where('user_id','=',$userid)->whereIn('status',['P','HL','CORR'])->whereDate('entry_date','=',$showDate)->select('intime','outtime','entry_date')->first();

               if(isset($getdate)){

                 

                 $time1 = new DateTime($getdate->entry_date.' '.$getdate->outtime);

                 $time2 = new DateTime($getdate->entry_date.' '.$getdate->intime);

                 $timediff = $time1->diff($time2);

                   $hour += $timediff->h;

                    $mints += $timediff->i;

                    

                    $hours = floor($mints / 60);

                    $min = $mints - ($hours * 60);

                    

                    $total =  $hour + $hours.':'.$min;

                    

                // $total += isset($getdate->intime)?strtotime($getdate->intime):'00:00:00' - isset($getdate->outtime)?strtotime($getdate->outtime):'00:00:00' ;

                   $reqhouse ++ ;





               }

               

                

            }

           $chunkData[$key] = $total;

           $chunkData['cnt'][$key] = $reqhouse * 9;

             $total = 0;

             $reqhouse = 0;

           }



            // echo "<pre>";

            // print_r($Hourchunks);





          

          



                    if($request->export == 'export'){

                       $weekEnds = [];

                  $month = $request->month;

                  $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);

                  $wkYear = ($month==12) ? ($year+1) : $year;

                  $wkMonth = ($month==12) ? '01' : ($month+1);



                  

                  $start = new DateTime($year.'-'.$month.'-01');

                  $interval = new DateInterval('P1D');

                 

                  $end = new DateTime($wkYear.'-'.$wkMonth.'-01');



                  $period = new DatePeriod($start,$interval,$end);

                

               // dd($period);

      

                  foreach ($period as $day){

                    if ($day->format('N') == 6 || $day->format('N') == 7){

                      $weekEnds[$day->format('Y-m-d')] = true;

                    }

                  }



                  $weekEnds  = count($weekEnds);





       $newdate = date('Y-m', strtotime($year.'-'.$request->month.'+-1 months'));



       $attstatedate = $newdate.'-'.$this->startDay;

       $attenddate = $year.'-'. $request->month.'-'.$this->attEndDay;





                 $datetime1 = new DateTime($attstatedate);



                 $datetime2 = new DateTime($attenddate);



                 $difference = $datetime1->diff($datetime2);



                 $totalday  = $difference->d;



                 $weekendoff = $weekEnds;



                 $workingday = (int)$totalday - (int)$weekendoff;



               //  $datana =  $workingday - $presentday - count($culculateleavedat);



                  $holiday  = $this->count_holyday_day($request->month,$request->year);

                    



            $alluseratt = DB::table('main_users')->where('isactive',1)->where('emprole','!=',1)->select('id','userfullname')->get();

            

            foreach ($alluseratt as $key => $users) {

               //  $present = $this->count_present_day($users->id,$request->month,$request->year);

              

               // $hlleave = $this->count_HL_day($users->id,$request->month,$request->year);

 



                       $users->present =

                      DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'P')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'CORR')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'NTS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'OS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'NS')->count();





                

        

          



             $users->absent  = 1 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'LWP')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'HL')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'FTCO')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'FTCI')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'HPL')->count();



             // $culculateleavedat = $this->count_leave_day($users->id,$request->month,$request->year);

  $culculateleavedat = DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'L')->count();

      

       

// 

              $users->leaveCount = $culculateleavedat;



               $datana =  $workingday - $users->present - $users->leaveCount;



                $users->datanot =  $datana;

            

                    }





             $columns = array('S.No', 'Employee Name', 'Present', 'Leaves', 'Absent/FTS','Data NA');



      $columns1 = array('Total Working Days',$workingday,'Week Offs',$weekendoff,'Holidays',count($holiday),'Total Days',$totalday);



                $filename = public_path("uploads/csv/report_'".time()."'_report.csv");

                $handle = fopen($filename, 'w+');

                



             





                fputcsv($handle, $columns1);



                fputcsv($handle, $columns);

           $i = 1;

        foreach ($alluseratt as $key => $valattue) {



                 fputcsv($handle, array($i++, ucwords($valattue->userfullname), $valattue->present, $valattue->leaveCount, $valattue->absent, $valattue->datanot));

      

                  }









         fclose($handle);



       $headers = array(

        'Content-Type' => 'text/csv'

       

        );





    return Response()->download($filename);







         }



            

 

          $name = Auth::guard('main_users')->user()->userfullname;



     

        



       if($request->isMethod('post')) {



        



         $userList = DB::table('main_users');

       if($userRole != 1 && $userRole != 4 && $userRole != 11 && $userRole != 3){

           

           $userList->where('id',$userid);



       }else if($userRole == 3){

        $uder_user_id = array();

         $uder_user_id[] = $userid;

        $users = DB::table('main_users')->where('reporting_manager',$userid)->where('isactive',1)->get();

        foreach ($users as $key => $user) {

          $uder_user_id[] = $user->id;

        }

        

        $userList->whereIn('id',$uder_user_id);





       }

       $useralllist = array();

       $userList = $userList->where('isactive',1)->where('id','!=',1)->orderBy('main_users.userfullname','ASC')->select('id','userfullname')->get();



       if($userRole == 1 || $userRole == 4 || $userRole == 11){

           

            foreach ($userList as $key => $userLists) {

          

        }

         $userLists->id = 1000;

         $userLists->userfullname = 'All Employees';



       }



      

       

 //  dd($getuser->id);

        $name = $request->emp_name;

        $month = $request->month;

        $year = $request->year;

        $userid = $request->user_id;

        $weekEnds = array();

         $chunks = array();

          $holidayArr = [];

         if(!isset($userid)){

         return redirect()->back();

         }

         

     $gerseachuser = DB::table('main_users')->where('id',$userid)->select('id','userfullname')->first();



         $effectiveDate = date($request->year.'-'.$request->month);

           // echo 'Date'.$effectiveDate;<br>

            $effectiveDate = date('Y-m', strtotime($effectiveDate.'+-1 months'));

         

       

        $startdate = $this->startDay.'-'. $effectiveDate;



       $enddate = $this->endDay.'-'. $request->month .'-'.$request->year;



       $range =  $startdate.'  to '.$enddate;



       $attstatedate = $effectiveDate.'-'.$this->startDay;

       $attenddate = $request->year.'-'. $request->month.'-'.$this->attEndDay;



   

   



      $culculateleavedat = DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'L')->count();









       $presentday =

                      DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'P')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'CORR')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'NTS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'OS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'NS')->count();

         

      

        



          $absent  = 1 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'LWP')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'HL')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'FTCO')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'FTCI')->count()  + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'HPL')->count();



           $attendance  = $this->createDateRangeArray($attstatedate,$attenddate);



            $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);

                  $wkYear = ($month==12) ? ($year+1) : $year;

                  $wkMonth = ($month==12) ? '01' : ($month+1);



                  

                  $start = new DateTime($year.'-'.$month.'-01');

                  $interval = new DateInterval('P1D');

                  $end = new DateTime($wkYear.'-'.$wkMonth.'-01');



                  $period = new DatePeriod($start,$interval,$end);

      

                  foreach ($period as $day){

                    if ($day->format('N') == 6 || $day->format('N') == 7){

                      $weekEnds[$day->format('Y-m-d')] = true;

                    }

                  }

         

               $weekEnds = count($weekEnds);

            



           if($userid == 1000){



                 $datetime1 = new DateTime($attstatedate);



                 $datetime2 = new DateTime($attenddate);



                 $difference = $datetime1->diff($datetime2);



                 $totalday  = $difference->d;

                 

                 $weekendoff = $weekEnds ;



                   $workingday = (int)$totalday - (int)($weekendoff);



                    $datana = DB::table('main_attendance')->whereNotBetween('entry_date', [$datetime1, $datetime2])->count();



                   



                  $holiday  = $this->count_holyday_day($request->month,$request->year);

                    



            $alluseratt = DB::table('main_users')->where('isactive',1)->where('emprole','!=',1)->select('id','userfullname')->get();

            foreach ($alluseratt as $key => $users) {





               



                       $users->present =

                      DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'P')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'CORR')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'NTS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'OS')->count() + DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'NS')->count();





             

                

           

$users->absent  = 1 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'LWP')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'HL')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'FTCO')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'FTCI')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'HPL')->count();



              $culculateleavedat = DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$users->id)->where('status', '=', 'L')->count();

              $users->leaveCount = $culculateleavedat;



              $datana =  $workingday - $users->present  - $users->leaveCount;



                $users->datanot =  $datana;



            

            }



         

        return view('attendance.attendance_sallary',['userlist' => $alluseratt,'holidayall' =>  count($holiday),'totalday' => $totalday,'weekendof' => $weekendoff,'workingday' => $workingday,'month' => $request->month,'year' => $request->year,'allemp' => $request->user_id]);

         



           }

           

           $availleave = $this->getAvailableLeave($userid);





           $chunks = array_chunk($attendance, 7);

            $Hourchunks = array_chunk($attendance, 7);

           $total =0;

           $reqhouse = 0;

          

           foreach ($Hourchunks as $key => &$chunkData) {

           $hour = 0;

           $mints = 0;

            foreach($chunkData as $k => &$showDate) {

              $getdate = DB::table('main_attendance')->where('user_id','=',$userid)->whereIn('status',['P','HL','CORR'])->whereDate('entry_date','=',$showDate)->select('intime','outtime','entry_date')->first();

               if(isset($getdate)){

               $time1 = new DateTime($getdate->entry_date.' '.$getdate->outtime);

                 $time2 = new DateTime($getdate->entry_date.' '.$getdate->intime);

                 $timediff = $time1->diff($time2);

                   $hour += $timediff->h;

                    $mints += $timediff->i;

                    

                     $hours = floor($mints / 60);

                    $min = $mints - ($hours * 60);

                    

                    $total =  $hour + $hours.':'.$min;

                    

                  // $total += isset($getdate->intime)?strtotime($getdate->entry_date.' '.$getdate->outtime):'00:00:00' - isset($getdate->outtime)?strtotime($getdate->entry_date.' '.$getdate->intime):'00:00:00' ;

                   $reqhouse ++ ;



               }

               

                

            }

           $chunkData[$key] = $total;

           $chunkData['cnt'][$key] = $reqhouse * 9;

             $total = 0;

             $reqhouse = 0;

           }





           //  echo "<pre>";

           // print_r($Hourchunks);

           // die;

            



        //     foreach ($culculateleavedat as $culculateleavedats) {

        //     $leavearraydate[] =  (array) date('Ymd',strtotime($culculateleavedats->from_date));

        // }

         $holiday  = $this->count_holyday_day($request->month,$request->year);

           foreach ($holiday as $holidays) {

            $holidayArr[] =   date('Ymd',strtotime($holidays->holidaydate));

        }



         



         

 



       }



     



       return view('attendance.attendance_info',['countleave' => $culculateleavedat,'name' => $name,'range' => $range,'month' =>$month,'year' =>$year,'weekendoff' => $weekEnds,'absent' =>  $absent,'presentday' =>$presentday,'attchunk' => $chunks,'userid'=>$userid,'leavedata'=>$leavearraydate,'holidayArr' =>$holidayArr,'weeklyTotalhour' =>$Hourchunks,'holyday'=>$holiday,'presentCount' =>$presentday,'absetCount' => $absent,'userlist' => $userList,'startdate' => $startdate,'enddate' => $enddate,'searchName' => $gerseachuser,'availleave' => $availleave]);



    }









    protected function count_leave_day($userid,$month,$year){





       return $leavedate = DB::select("select main_leaverequest.*,sum(appliedleavescount) as leavecount from main_leaverequest where user_id = ".$userid." and leavestatus = 'Approved' and (from_date between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->attEndDay."')");



      

    }

    

    

    



     protected function count_present_day($userid,$month,$year){



 

      

       return $present = DB::select("select main_attendance.*,COUNT(id) as presentcount from main_attendance where user_id = ".$userid." and status ='P' and (entry_date between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->attEndDay."')");

    }



       protected function count_HL_day($userid,$month,$year){



       return $present = DB::select("select main_attendance.*,COUNT(id) as hlcount from main_attendance where user_id = ".$userid." and status ='HL' and (entry_date between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->attEndDay."')");

    }



     protected function count_absent_day($userid,$month,$year){





      

       return $absent= DB::select("select main_attendance.*,COUNT(id) as abssentcount from main_attendance where user_id = ".$userid." and status ='A' and  (entry_date between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->attEndDay."')");

    }





       protected function count_holyday_day($month,$year){





      

       return $holiday= DB::select("select main_holidaydates.holidaydate from main_holidaydates where groupid = 2 and (holidaydate between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->attEndDay."')");

    }



 

    function createDateRangeArray($strDateFrom,$strDateTo)

{

    $preDay = date('d',strtotime($strDateFrom));

    //$strDateFrom  =  date("Y-m-d", strtotime('sunday this week', strtotime($strDateFrom)));

       $strDateFrom  =date('Y-m-d', strtotime($strDateFrom.'last sunday'));



   

    $postDay = date('d',strtotime($strDateFrom));

     $j = 0;

     for($i = (int)$preDay; $i <(int)$postDay; $i++){

         $j++;

     }

     

  // $strDateTo = date('Y-m-d',strtotime("+".$j."day", strtotime($strDateTo)));

      $strDateTo = date('Y-m-d',strtotime($strDateTo.' next saturday'));

    $aryRange=array();



    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));

    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));



    if ($iDateTo>=$iDateFrom)

    {

        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

        while ($iDateFrom<$iDateTo)

        {

            $iDateFrom+=86400; // add 24 hours

            array_push($aryRange,date('Y-m-d',$iDateFrom));

        }

    }

    return $aryRange;

}











    



    public function get_attendace(Request $request){

        

        //dd($request->all());



      $getAttendace = DB::table('main_attendance')->whereDate('entry_date',$request->checkdate)->where('user_id',$request->userid)->first();



      

      // $getAttendace->actual_intime = date('h:i:s a', strtotime($getAttendace->actual_intime));

      // $getAttendace->actual_outtime = date('h:i:s a', strtotime($getAttendace->actual_outtime));



      if(isset($getAttendace)){



        return response()->json(['status' => 200, 'msg' => 'Successfully Get Data','attendace' => $getAttendace]);





        }else{



        return response()->json(['status' => 201, 'msg' => 'Not found']);

        }

    }



    public function update_attendace(Request $request){



      $getuser= DB::table('main_users')->where('id',$request->userid)->first();

      $manager = DB::table('main_users')->where('id',$getuser->reporting_manager)->first();

            



      $updayarr = array(

          'empid' => $request->userid,

          'reporting_to' => $getuser->reporting_manager,

          'entry_date' => $request->checkdate,

        'preposed_intime' => $request->preposedInTime,

        'preposed_outtime' => $request->preposedOutTime,

        'preposed_status' => $request->preposedStatus,

        'actual_intime' =>  $request->inTime,

        'actual_outtime' =>  $request->OutTime,

        'actual_status' =>  $request->pstatus,

        'reason' => $request->reason,

            'is_active' => 2,

            'created' => date('Y-m-d H:i:s'),



      );



          $update = DB::table('main_attendance_temporarydata')->insert($updayarr);

        if(isset($update)){



    $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content = templete_attendace_request($getuser->userfullname,$manager->userfullname,$request->checkdate,$request->inTime,$request->preposedOutTime,$request->preposedStatus,$request->pstatus);

  



  

    $userEmail  = sendMail($manager->emailaddress,$subject,$from,$fromname,$content);



    DB::table('main_notification')->insert(['sender_id' =>$getuser->reporting_manager,'reciver_id' => $getuser->id,'msg' => 'Request For Attendace '.$request->checkdate,'status' => 1]);

    



        return response()->json(['status' => 200, 'msg' => 'Successfully updated']);





        }else{



        return response()->json(['status' => 201, 'msg' => 'Not found']);

        }

    }



    public function searchemp(Request $request){



      $role = Auth::guard('main_users')->user()->emprole;

       $id = Auth::guard('main_users')->user()->id;



    if($request->get('query'))

     {

      $query = $request->get('query');

      $data = DB::table('main_users')->where('userfullname', 'LIKE', "%{$query}%");



      if($role != 1){



        $data->where('id','=',$id);



      }



       $data->select('id','userfullname');

        

        $users = $data->get();





      $output = '<ul class="form-control dropdown-menu" style="display:block; position:relative">';

      if(isset($users) && !empty($users)){

      foreach($users as $row)

      {

       $output .= '

       <li><a href="#"><input id="userid" name="userid" type="hidden" value="'.$row->id.'">'.ucwords($row->userfullname).'</a></li>

       ';

      }

    }else{



       $output .= '

       <li><a href="#">Recoud Not Found</a></li>

       ';



    }

      $output .= '</ul>';

      return $output;

     }

    }





    public function attendence_approved(){



      $userid = Auth::guard('main_users')->user()->id;

       $role= Auth::guard('main_users')->user()->emprole;

     



       $arrUser = [];

       $findunderUser = DB::table('main_users')->where('reporting_manager',$userid)->where('isactive',1)->select('id')->get();

       

       

       foreach($findunderUser as $key => $findunderUsers) {

         $arrUser[] =  $findunderUsers->id;

       }



      



      $getAppravellist = DB::table('main_attendance_temporarydata')->join('main_users','main_attendance_temporarydata.empid','=','main_users.id');

      if($role != 1){

        $getAppravellist ->where('main_users.id',$userid);



      }



     $getattence =  $getAppravellist->whereIN('main_attendance_temporarydata.is_active',[2,3,4])->orderBy('main_attendance_temporarydata.id','DESC')->select('main_attendance_temporarydata.*','main_users.userfullname')->get();

      

     

    

     $underUser = DB::table('main_attendance_temporarydata')->join('main_users','main_attendance_temporarydata.empid','=','main_users.id');

    

       $underUser ->whereIn('main_users.id',$arrUser);



    $underUser =  $underUser->whereIN('main_attendance_temporarydata.is_active',[2,3,4])->orderBy('main_attendance_temporarydata.id','DESC')->select('main_attendance_temporarydata.*','main_users.userfullname')->get();

     



    $nsshift = DB::table('main_ns_request')->join('main_users','main_ns_request.user_id','=','main_users.id');



    

      $nsshift->where('main_users.id',$userid);



    



    $nsshift =  $nsshift->orderBy('main_ns_request.id','DESC')->select('main_ns_request.*','main_users.userfullname')->get();

    





     $nsunderUsewr = DB::table('main_ns_request')->join('main_users','main_ns_request.user_id','=','main_users.id');



        $nsunderUsewr->whereIn('main_users.id',$arrUser);



    



      $nsunderUsewr =  $nsunderUsewr->orderBy('main_ns_request.id','DESC')->select('main_ns_request.*','main_users.userfullname')->get();

      





     



      return view('attendance.attendance_approve',['approvalList' => $getattence,'nstime' => $nsshift,'underUser' => $underUser,'nsunderUsewr' => $nsunderUsewr]);

    }



    public function approve_attendace(Request $request){



    



              if($request->status = 1){







        $gettempdata = DB::table('main_attendance_temporarydata')->where('id','=',$request->att_temp_id)->first();

      $getuser = DB::table('main_users')->leftjoin('main_users as manager','main_users.reporting_manager','=','manager.id')->where('main_users.id',$gettempdata->empid)->select('main_users.userfullname','main_users.emailaddress','manager.userfullname as manager','main_users.id as uid','manager.id as mid')->first();

      

        $getAttendace = DB::table('main_attendance')->where('user_id','=',$gettempdata->empid)->where('entry_date','=',$gettempdata->entry_date)->update(['intime' => $gettempdata->preposed_intime,'outtime' => $gettempdata->preposed_outtime,'status' =>'CORR']);

       

        if($getAttendace){



    $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content =   templete_attendace_confirmation($getuser->userfullname,$gettempdata->entry_date,$gettempdata->actual_status,$gettempdata->preposed_status,$gettempdata->reason,$getuser->manager);

  

    $userEmail  = sendMail($getuser->emailaddress,$subject,$from,$fromname,$content);



          DB::table('main_attendance_temporarydata')->where('id','=',$request->att_temp_id)->update(['is_active' =>3]);





    DB::table('main_notification')->insert(['sender_id' =>$getuser->uid,'reciver_id' => $getuser->mid,'msg' => 'Approved Attendace For '. $gettempdata->entry_date,'status' => 1]);





          return response()->json(['status' => 200, 'msg' => 'Successfully updated']);

  

       }else{

  

        return response()->json(['status' => 201, 'msg' => 'Not added']);

  

       }  

      

      

      }else{



             $gettempdata = DB::table('main_attendance_temporarydata')->where('id','=',$request->att_temp_id)->first();

      $getuser = DB::table('main_users')->leftjoin('main_users as manager','main_users.reporting_manager','=','manager.id')->where('main_users.id',$gettempdata->empid)->select('main_users.userfullname','main_users.emailaddress','manager.userfullname as manager','main_users.id as uid','manager.id as mid')->first();



        $getAttendace =   DB::table('main_attendance_temporarydata')->where('id','=',$request->att_temp_id)->update(['is_active' =>4]);





    $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content =   templete_attendace_confirmation($getuser->userfullname,$gettempdata->entry_date,$gettempdata->actual_status,$gettempdata->preposed_status,$gettempdata->reason,$getuser->manager);

  

        $userEmail  = sendMail($getuser->emailaddress,$subject,$from,$fromname,$content);





    DB::table('main_notification')->insert(['sender_id' =>$getuser->uid,'reciver_id' => $getuser->mid,'msg' => 'Rejected Attendace For '.$gettempdata->entry_date,'status' => 1]);





                if($getAttendace){



                  return response()->json(['status' => 200, 'msg' => 'Successfully updated']);

          

               }else{

          

                return response()->json(['status' => 201, 'msg' => 'Not added']);

          

               }



              }



   



    }





    public function reject_attendace(Request $request){



       $getAttendace = DB::table('main_attendance_temporarydata')->where('empid','=',$request->userid)->where('id','=',$request->att_temp_id)->update(['is_active' =>4]);



     if($getAttendace){



        return response()->json(['status' => 200, 'msg' => 'Successfully updated']);



     }else{



      return response()->json(['status' => 201, 'msg' => 'Not added']);



     }



    }



      public function upload_attadance_csv(Request $request){







      if ($request->input('upload') != null ){

  

        $file = $request->file('upload_attadance');

        //dd($file);

        // File Details 

        $filename = str_replace(' ','',$file->getClientOriginalName());

        $extension = $file->getClientOriginalExtension();

        $tempPath = $file->getRealPath();

        $fileSize = $file->getSize();

        $mimeType = $file->getMimeType();

  

        // Valid File Extensions

        $valid_extension = array("csv");

  

        

  

        // 2MB in Bytes

        $maxFileSize = 2097152; 

  

        // Check file extension

        if(in_array(strtolower($extension),$valid_extension)){

  

          // Check file size

          if($fileSize <= $maxFileSize){

  

            // File upload location

            $location = 'uploadcsv';

  

           

            $file->move(public_path().'/uploadcsv/', $filename);

            // Import CSV to Database

            $filepath = public_path($location."/".$filename);

     

            $file = fopen($filepath,"r");

  

            $importData_arr = array();

            $i = 0;

  

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {

               $num = count($filedata);

               

               // Skip first row (Remove below comment if you want to skip the first row)

               if($i == 0){

                  $i++;

                  continue; 

               }

               for ($c=0; $c < $num; $c++) {

                  $importData_arr[$i][] = $filedata[$c];

               }

               $i++;

            }

            fclose($file);

  

       // dd($importData_arr);

        

        

          $getintime = DB::table('company_intime')->where('id',1)->first();

        $intime = strtotime($getintime->inTime);

           

           // Insert to MySQL database

            foreach($importData_arr as $importData){



              $getuserid = DB::table('main_users')->where('employeeId','KSPL'.$importData[1])->select('id','reporting_manager')->first();

              

                 // dd($getuserid);

              if(isset($getuserid)){

                  

                  

                  

            

             if(DB::table('main_attendance')->where('empid',$importData[1])->whereDate('entry_date',date('Y-m-d',strtotime($importData[0])))->count() == 0){        

            

              if(strtotime($importData[10])  > strtotime('13:00:00')){

                $InTime = '00:00:00';

                $outTime = $importData[10];

                

            }else if(empty($importData[10])){

            

            $outTime = '00:00:00';

              $InTime = '00:00:00';

                

            }else{

                

                 $outTime = $importData[10];

                   $InTime =  $importData[10];

                

            }

            

           

            

          //dd(strtotime($importData[10]));

            

                     if($intime < strtotime($importData[10]) && $importData[15]=='Present '){

                

                $status = 'HL';

            }else if($importData[15]=='Present '){

                 $status = 'P';

            }else if(empty($importData[10]) && empty($importData[11])){

                

                 $status = 'LWP';



           

                

            }else if(strtotime($importData[10])  > strtotime('13:00:00') && empty($importData[11])){

                

                   $status = 'FTCI';

                

            }else  if(strtotime($importData[10])  < strtotime('13:00:00') && empty($importData[11])){

                

                      $status = 'FTCO';

                

            }else{



              $status = 'LWP';



            }

            





              





             $insertDataattadeance = array(

              "user_id"=>$getuserid->id,

              "empid"=>$importData[1],

              "reporting_to"=>$getuserid->reporting_manager,

              "shift"=>'GS',

              "intime"=>$InTime,

              "outtime"=>isset($importData[11])?$importData[11]:$outTime,

              "entry_date"=>date('Y-m-d',strtotime($importData[0])),

              "status"=>$status,

              

             );



             DB::table('main_attendance')->insert($insertDataattadeance);

              //Session::flash('message','Import Successful.');

           // Session::flash('alert','primary');

               }



              }

              

  

            }

            

            

            

              Session::flash('message','Import Successful.');

             Session::flash('alert','primary');

        

  

           

          }else{

            Session::flash('message','File too large. File must be less than 2MB.');

            Session::flash('alert','danger');

          }

  

        }else{

           Session::flash('message','Invalid File Extension.');

           Session::flash('alert','danger');

        }

  

        // Redirect to index

      return redirect()->back();

  

      }

  

    }

    

    

public function munualattedance(){

    

    $userdata = DB::table('main_users')->where('id','!=',1)->select('id','userfullname')->get();

  

    return view('attendance.manual_attedance',['users' => $userdata ]);

}





public function manual_attendace(Request $request){

    

   // dd($request->all());

    

       $getreporting = Db::table('main_users')->where('id',$request->userid)->first();

    

  

          

         $upateatt =  DB::table('main_attendance')->insert([

          'user_id' => $request->userid,

          'empid' => $getreporting->employeeId,

          'reporting_to' => $getreporting->reporting_manager,

          'shift' => 'GS',

          'intime' => $request->preposedInTime,

          'outtime' =>  $request->preposedOutTime,

          'entry_date' =>  $request->checkdate,

          'status' => $request->preposedStatus,

          'manual_status' => 1,

          ]);

          

          

        if(isset($upateatt)){



        return response()->json(['status' => 200, 'msg' => 'Successfully updated']);





        }else{



        return response()->json(['status' => 201, 'msg' => 'Not found']);

        }

    

}



public function attendance_status(Request $request){

    

    $attendace_id = json_decode($request->attendace_id);

     $user_id = json_decode($request->user_id);

     $attdanceDate= json_decode($request->attdanceDate);

     

     

     

    $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

  

     

     

     if($request->status == 'Approve'){

         



         

             foreach($user_id as $k => $user_ids){

                 

                   $user_details = DB::table('main_users')->where('id',$user_ids)->first();

                

         $gettempdata = DB::table('main_attendance_temporarydata')->where('empid','=',$user_ids)->where('id','=',$attendace_id[$k])->first();



       $getAttendace = DB::table('main_attendance')->where('user_id','=',$user_ids)->where('entry_date','=',$gettempdata->entry_date)->update(['intime' => $gettempdata->preposed_intime,'outtime' => $gettempdata->preposed_outtime,'status' =>'CORR']);

          DB::table('main_attendance_temporarydata')->where('empid','=',$user_ids)->where('entry_date','=',$gettempdata->entry_date)->update(['is_active' =>3]);

          

       //$content .='Dear '.$user_details->userfullname.' Your Attendace Correction Approve'.Auth::guard('main_users')->user()->userfullname;

       

       // sendMail($user_details->emailaddress,$subject,$from,$fromname,$content);



  $userdetails = DB::table('main_users')->where('id',$user_ids)->first();

  $manager  = DB::table('main_users')->where('id',$userdetails->reporting_manager)->first();







    $content =   templete_attendace_confirmation($userdetails->userfullname,$gettempdata->entry_date,$gettempdata->actual_status,$gettempdata->preposed_status,$gettempdata->reason,$manager->userfullname);

  

    $userEmail  = sendMail($userdetails->emailaddress,$subject,$from,$fromname,$content);

        

    }

    

    

     if($getAttendace){



        return response()->json(['status' => 200, 'msg' => 'Successfully Attendace Approved']);



     }else{



        return response()->json(['status' => 200, 'msg' => 'Something Went Wrong']);



     



     }

    

         

     }else{

         

          foreach($user_id as $k => $user_ids){



              $gettempdata = DB::table('main_attendance_temporarydata')->where('empid','=',$user_ids)->where('id','=',$attendace_id[$k])->first();

              

              $user_details = DB::table('main_users')->where('id',$user_ids)->first();

         

              DB::table('main_attendance_temporarydata')->where('empid','=',$user_ids)->where('id','=',$attendace_id[$k])->update(['is_active' =>4]);

              

              

  $userdetails = DB::table('main_users')->where('id',$user_ids)->first();

  $manager  = DB::table('main_users')->where('id',$userdetails->reporting_manager)->first();







    $content =   templete_attendace_confirmation($userdetails->userfullname,$gettempdata->entry_date,$gettempdata->actual_status,$gettempdata->preposed_status,$gettempdata->reason,$manager->userfullname);

  

    $userEmail  = sendMail($userdetails->emailaddress,$subject,$from,$fromname,$content);

        



          }

              

              

               return response()->json(['status' => 200, 'msg' => 'Attendace Rejected']);

         

     }

    



    

}



function ns_request(Request $request){





$userid = Auth::guard('main_users')->user()->id;

$manager = DB::table('main_users')->where('id',Auth::guard('main_users')->user()->reporting_manager)->first();



  $arr = array(

    'user_id'  =>  $userid,

    'from_date' => $request->ns_form_data,

    'to_date' => $request->ns_to_data,

    'user_status' => $request->ns_status,

     'status' => 'pending',





  );



  DB::table('main_ns_request')->insert($arr);



    $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content = templete_attendace_request(Auth::guard('main_users')->user()->userfullname,$manager->userfullname,$request->ns_form_data. ' to '. $request->ns_to_data,'','',$request->ns_status,$request->ns_status);

  



  

    $userEmail  = sendMail($manager->emailaddress,$subject,$from,$fromname,$content);



    DB::table('main_notification')->insert(['sender_id' =>Auth::guard('main_users')->user()->id,'reciver_id' => Auth::guard('main_users')->user()->reporting_manager,'msg' => 'Request For Attendace '.$request->ns_form_data. ' to '. $request->ns_to_data,'status' => 1]);



    return response()->json(['status' => 200, 'msg' => 'Successfully Send Request']);

         



}  



function ns_aproval_status(Request $request){

 $req_daitails = DB::table('main_ns_request')->where('id',$request->ns_req_id)->first();



 if($request->status == 1){



  if($req_daitails->user_status  =='Night Shift'){

    $attstatus = 'NTS';

  }else if($req_daitails->user_status == 'Noon Shift'){

    $attstatus = 'NS';



 }else if($req_daitails->user_status == 'WFH'){

    $attstatus = 'WFH';



  }else{

    $attstatus = 'OS';



  }



  $status = 'approved';

  $update = DB::table('main_ns_request')->where('id',$request->ns_req_id)->update(['status' =>$status ]);



  $userdetails = DB::table('main_users')->where('id',$req_daitails->user_id)->first();

  $manager  = DB::table('main_users')->where('id',$userdetails->reporting_manager)->first();



   $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content =   templete_attendace_confirmation($userdetails->userfullname,$req_daitails->from_date.' TO '.$req_daitails->to_date,$req_daitails->user_status,$req_daitails->status,'',$manager->userfullname);

  

    $userEmail  = sendMail($userdetails->emailaddress,$subject,$from,$fromname,$content);



    DB::table('main_notification')->insert(['sender_id' =>$manager->id,'reciver_id' => $userdetails->id,'msg' => 'Approved Attendace For '.$req_daitails->from_date.' TO '.$req_daitails->to_date,'status' => 1]);



  $nstime = $this->getDatesFromRange($req_daitails->from_date,$req_daitails->to_date);



  foreach ($nstime as $key => $nstimes) {

   

   DB::table('main_attendance')->where('user_id',$userdetails->id)->whereDate('entry_date',$nstimes)->delete();



   $upateatt =  DB::table('main_attendance')->insert([

          'user_id' => $userdetails->id,

          'empid' => $userdetails->employeeId,

          'reporting_to' => $userdetails->reporting_manager,

          'shift' => 'NS',

          'intime' => '00:00:00',

          'outtime' =>  '00:00:00',

          'entry_date' =>  $nstimes,

          'status' => $attstatus,

          

          ]);



 }



  return response()->json(['status' => 200, 'msg' => 'Successfully Approved']);

 



 }else{



  $status = 'rejected';



   $update = DB::table('main_ns_request')->where('id',$request->ns_req_id)->update(['status' =>$status ]);



     $userdetails = DB::table('main_users')->where('id',$req_daitails->user_id)->first();

    $manager  = DB::table('main_users')->where('id',$userdetails->reporting_manager)->first();





    $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content =   templete_attendace_confirmation($userdetails->userfullname,$req_daitails->from_date.' TO '.$req_daitails->to_date,$req_daitails->user_status,$req_daitails->status,'',$manager->userfullname);

  

    $userEmail  = sendMail($userdetails->emailaddress,$subject,$from,$fromname,$content);





    DB::table('main_notification')->insert(['sender_id' =>$manager->id,'reciver_id' => $userdetails->id,'msg' => 'Rejected Attendace For '.$req_daitails->from_date.' TO '.$req_daitails->to_date,'status' => 1]);



    return response()->json(['status' => 200, 'msg' => 'Successfully Reject']);

 



 }





 

    



}



public function ns_approvel(Request $request){



    $nsid = json_decode($request->ns_id);



  

    if($request->status == 1){

  



   foreach ($nsid as $key => $nsids) {

    

  

   $req_daitails = DB::table('main_ns_request')->where('id',$nsids)->first();



 



 if($req_daitails->user_status  =='Night Shift'){

    $attstatus = 'NTS';

  }else if($req_daitails->user_status == 'Noon Shift'){

    $attstatus = 'NS';



 }else if($req_daitails->user_status == 'WFH'){

    $attstatus = 'WFH';



  }else{

    $attstatus = 'OS';



  }



  $status = 'approved';

  $update = DB::table('main_ns_request')->where('id',$nsids)->update(['status' =>$status ]);



  $userdetails = DB::table('main_users')->where('id',$req_daitails->user_id)->first();

  $manager  = DB::table('main_users')->where('id',$userdetails->reporting_manager)->first();



   $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content =   templete_attendace_confirmation($userdetails->userfullname,$req_daitails->from_date.' TO '.$req_daitails->to_date,$req_daitails->user_status,$req_daitails->status,'',$manager->userfullname);

  

    $userEmail  = sendMail($userdetails->emailaddress,$subject,$from,$fromname,$content);



    DB::table('main_notification')->insert(['sender_id' =>$manager->id,'reciver_id' => $userdetails->id,'msg' => 'Approved Attendace For' .$req_daitails->from_date.' TO '.$req_daitails->to_date,'status' => 1]);



  $nstime = $this->getDatesFromRange($req_daitails->from_date,$req_daitails->to_date);



  foreach ($nstime as $key => $nstimes) {

   

   DB::table('main_attendance')->where('user_id',$userdetails->id)->whereDate('entry_date',$nstimes)->delete();



   $upateatt =  DB::table('main_attendance')->insert([

          'user_id' => $userdetails->id,

          'empid' => $userdetails->employeeId,

          'reporting_to' => $userdetails->reporting_manager,

          'shift' => 'NS',

          'intime' => '00:00:00',

          'outtime' =>  '00:00:00',

          'entry_date' =>  $nstimes,

          'status' => $attstatus,

          

          ]);



 }





 }





  return response()->json(['status' => 200, 'msg' => 'Successfully Approved']);



}





 if($request->status == 2){

  



   foreach ($nsid as $key => $nsids) {



   $req_daitails = DB::table('main_ns_request')->where('id',$nsids)->first();



   $userdetails = DB::table('main_users')->where('id',$req_daitails->user_id)->first();

  $manager  = DB::table('main_users')->where('id',$userdetails->reporting_manager)->first();





      

    DB::table('main_notification')->insert(['sender_id' =>$manager->id,'reciver_id' => $userdetails->id,'msg' => 'Approved Attendace For '. $req_daitails->from_date.' TO '.$req_daitails->to_date,'status' => 1]);



       $subject = 'No Reply - Kloudrac HRMS';

    $from = 'suitecrm14@gmail.com';

    $fromname = 'Not_reply';

    $content =   templete_attendace_confirmation($userdetails->userfullname,$req_daitails->from_date.' TO '.$req_daitails->to_date,$req_daitails->user_status,$req_daitails->status,'',$manager->userfullname);

       $userEmail  = sendMail($userdetails->emailaddress,$subject,$from,$fromname,$content);



    



  $status = 'rejected';



   $update = DB::table('main_ns_request')->where('id',$nsids)->update(['status' =>$status ]);



    

 }



 return response()->json(['status' => 200, 'msg' => 'Successfully Rejected']);



 }


}


function update_pl(Request $request){

  DB::table('main_users')->where('id',$request->user_id)->update(['leave_pl' => $request->pl ]);

 return response()->json(['status' => 200, 'msg' => 'Successfully Added Leave PL']);



}

function update_cl(Request $request){

    
  DB::table('main_users')->where('id',$request->user_id)->update(['leave_cl' => $request->cl ]);

 return response()->json(['status' => 200, 'msg' => 'Successfully Added Leave CL']);


  
}




private function getDatesFromRange($start, $end, $format = 'Y-m-d') { 

      

    // Declare an empty array 

    $array = array(); 

      

    // Variable that store the date interval 

    // of period 1 day 

    $interval = new DateInterval('P1D'); 

  

    $realEnd = new DateTime($end); 

    $realEnd->add($interval); 

  

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 

  

    // Use loop to store date into array 

    foreach($period as $date) {                  

        $array[] = $date->format($format);  

    } 

  

    // Return the array elements 

    return $array; 

}







private function getAvailableLeave($userid){

        $leaveid = 1;

        $leavecode = 'CL';

        $data = [];

        $userdetails = DB::table('main_users')->where('id',$userid)->first();

          $data['Pl'] = $userdetails->leave_pl;
          $data['Cl'] = $userdetails->leave_cl;

          return $data;

}


 public function export_attdendance(Request $request)

{



     $userid = Auth::guard('main_users')->user()->id;

     $reviews = DB::table('main_attendance')->join('main_users','main_users.id','=','main_attendance.user_id')->where('main_users.isactive',1)->whereDate('main_attendance.entry_date','=',$request->attadance_date)->select('main_attendance.*','main_users.userfullname')->get();

    

  $columns = array('EMP Code', 'Employee Name', 'Date', 'InTime','OutTime','Status');

    $filename = public_path("uploads/csv/attadance_'".time()."'_report.csv");

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $columns);

        if(isset($reviews) && !empty($reviews)){ 
        foreach($reviews as $review) {

        fputcsv($handle, array($review->empid,$review->userfullname,$review->entry_date,$review->intime,$review->outtime,$review->status));

    
        }
      }

        

       fclose($handle);



       $headers = array(

        'Content-Type' => 'text/csv'

        );

    return Response()->download($filename);


}

    

}

