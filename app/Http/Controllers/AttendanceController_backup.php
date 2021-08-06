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



    public function attandance_info(Request $request){

         $weekEnds = array();

          $chunks = array();

          $holidayArr = array();

           $leavearraydate = array();

       $month = date('m');

       $newdate = date("Y-m", strtotime("-1 months"));

       $shownewdate = date("m-Y", strtotime("-1 months"));

       

       $year = date('Y');



    	 $userid = Auth::guard('main_users')->user()->id;

    	 $userRole = Auth::guard('main_users')->user()->emprole;

       $startdate = $this->startDay.'-'.$shownewdate;

       $userList = DB::table('main_users');

       if($userRole != 1){

           

           $userList->where('id',$userid);

       }

       $userList = $userList->where('isactive',1)->where('id','!=',1)->get();

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

                

      

                  foreach ($period as $day){

                    if ($day->format('N') == 6 || $day->format('N') == 7){

                      $weekEnds[$day->format('Y-m-d')] = true;

                    }

                  }

      $attstatedate = $newdate.'-'.$this->startDay;

       $attenddate = $year.'-'. $month.'-'.$this->attEndDay;



                

     // $leavearraydate = array();

    	$culculateleavedat = $this->count_leave_day($userid,date('m'),date('Y'));

     

     

       $presentday  = $this->count_present_day($userid,date('m'),date('Y'));



         $absent  = $this->count_absent_day($userid,date('m'),date('Y'));



        



         $holiday  = $this->count_holyday_day(date('m'),date('Y'));





           foreach ($holiday as $holidays) {

            $holidayArr[] =  (array) date('Ymd',strtotime($holidays->holidaydate));

        }



         $attendance  = $this->createDateRangeArray($attstatedate,$attenddate);

         //dd($attendance);

         if(isset($culculateleavedat)){

          foreach ($culculateleavedat as $culculateleavedats) {

            $leavearraydate =  (array) date('Ymd',strtotime($culculateleavedats->leaveDate));

            }



         }

           



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

           // die;

            

 

        	$name = Auth::guard('main_users')->user()->userfullname;



     

        



    	 if($request->isMethod('post')) {



        $userList = DB::table('main_users');

       if($userRole != 1){

           

           $userList->where('id',$userid);

       }

       $userList = $userList->where('isactive',1)->where('id','!=',1)->get();

       

 //  dd($getuser->id);

        $name = $request->emp_name;

        $month = $request->month;

        $year = $request->year;

        $userid = $request->user_id;

        $weekEnds = array();

         $chunks = array();



         if(!isset($userid)){

         return redirect()->back();

         }



   



         $effectiveDate = date($request->year.'-'.$request->month);

           // echo 'Date'.$effectiveDate;<br>

            $effectiveDate = date('Y-m', strtotime($effectiveDate.'+-1 months'));

         

       

        $startdate = $this->startDay.'-'. $effectiveDate.'-'.$request->year;



       $enddate = $this->endDay.'-'. $request->month .'-'.$request->year;



       $range =  $startdate.'  to '.$enddate;



       $attstatedate = $effectiveDate.'-'.$this->startDay;

       $attenddate = $request->year.'-'. $request->month.'-'.$this->attEndDay;



    

     



    	 	$culculateleavedat = $this->count_leave_day($userid,$request->month,$request->year);

        //dd($culculateleavedat);

          $holiday  = $this->count_holyday_day($request->month,$request->year);

         

        $presentday  = $this->count_present_day($userid,$request->month,$request->year);

        

         $absent  = $this->count_absent_day($userid,$request->month,$request->year);

           $attendance  = $this->createDateRangeArray($attstatedate,$attenddate);

           //dd($attendance);

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

            



            foreach ($culculateleavedat as $culculateleavedats) {

            $leavearraydate[] =  (array) date('Ymd',strtotime($culculateleavedats->leaveDate));

        }

         $holiday  = $this->count_holyday_day($request->month,$request->year);

           foreach ($holiday as $holidays) {

            $holidayArr[] =  (array) date('Ymd',strtotime($holidays->holidaydate));

        }



           // echo "<pre>";

           // print_r($holidayArr);

           // die;

 

         

    



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



    	 }







       return view('attendance.attendance_info',['countleave' => $culculateleavedat,'name' => $name,'range' => $range,'month' =>$month,'year' =>$year,'weekendoff' => $weekEnds,'absent' =>  $absent,'presentday' =>$presentday,'attchunk' => $chunks,'userid'=>$userid,'leavedata'=>$leavearraydate,'holidayArr' =>$holidayArr,'weeklyTotalhour' =>$Hourchunks,'holyday'=>$holiday,'presentCount' =>$presentday,'absetCount' => $absent,'userlist' => $userList]);



    }





      function getSundays($start, $end) {

    $timestamp1 = strtotime($start);

    $timestamp2 = strtotime($end);

    $sundays    = array();

    $oneDay     = 60*60*24;



    for($i = $timestamp1; $i <= $timestamp2; $i += $oneDay) {

        $day = date('N', $i);



        // If sunday

        if($day == 7) {

            // Save sunday in format YYYY-MM-DD, if you need just timestamp

            // save only $i

            $sundays[] = date('Y-m-d', $i);



            // Since we know it is sunday, we can simply skip 

            // next 6 days so we get right to next sunday

            $i += 6 * $oneDay;

        }

    }



    return $sundays;

}



    protected function count_leave_day($userid,$month,$year){





    	

    	 return $leavedate = DB::select("select grc_employeeleaves.* from grc_employeeleaves where user_id = ".$userid." and manager =1 and hr =1 and admin =1 OR director = 1 and (leaveDate between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->endDay."')");



      

    }



     protected function count_present_day($userid,$month,$year){





      

       return $present = DB::select("select main_attendance.* from main_attendance where user_id = ".$userid." and status ='P' and (entry_date between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->endDay."')");

    }



     protected function count_absent_day($userid,$month,$year){





      

       return $absent= DB::select("select main_attendance.* from main_attendance where user_id = ".$userid." and status ='A' and  (entry_date between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->endDay."')");

    }





       protected function count_holyday_day($month,$year){





      

       return $holiday= DB::select("select main_holidaydates.* from main_holidaydates where (holidaydate between DATE_SUB('".$year."-".$month."-".$this->startDay."', INTERVAL ".$this->monthInterval." MONTH) and '".$year."-".$month."-".$this->endDay."')");

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



            $getuser= DB::table('main_users')->where('id',$request->userid)->select('reporting_manager')->first();



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

      $getAppravellist = DB::table('main_attendance_temporarydata')->join('main_users','main_attendance_temporarydata.empid','=','main_users.id');

      if($role != 1){

        $getAppravellist ->where('empid',$userid);



      }

      

     $getattence =  $getAppravellist->whereIN('is_active',[2,3,4])->select('main_attendance_temporarydata.*','main_users.userfullname')->get();

      



     



      return view('attendance.attendance_approve',['approvalList' => $getattence]);

    }



    public function approve_attendace(Request $request){

        $gettempdata = DB::table('main_attendance_temporarydata')->where('empid','=',$request->userid)->where('id','=',$request->att_temp_id)->first();

       $getAttendace = DB::table('main_attendance')->where('user_id','=',$request->userid)->where('empid','=',$request->att_temp_id)->update(['intime' => $gettempdata->preposed_intime,'outtime' => $gettempdata->preposed_outtime,'status' =>'CORR']);

        DB::table('main_attendance_temporarydata')->where('empid','=',$request->userid)->where('id','=',$request->att_temp_id)->update(['is_active' =>3]);



     if($getAttendace){



        return response()->json(['status' => 200, 'msg' => 'Successfully updated']);



     }else{



      return response()->json(['status' => 201, 'msg' => 'Not added']);



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

  

        //dd($importData_arr);

        

        

          $getintime = DB::table('company_intime')->where('id',1)->first();

        $intime = strtotime($getintime->inTime);

           

           // Insert to MySQL database

            foreach($importData_arr as $importData){



              $getuserid = DB::table('main_users')->where('employeeId','KSPL'.$importData[1])->select('id','reporting_manager')->first();

              

                 // dd($getuserid);

              if(isset($getuserid)){

                  

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

                  

                  if($intime < strtotime($importData[10])){

                      

                      $status = 'HL';

                  }else if($importData[15]=='Present '){

                       $status = 'P';

                  }else if($importData[15]=='Absent'){

                      

                       $status = 'LWP';

                      

                  }else if(strtotime($importData[10])  > strtotime('13:00:00') && empty($importData[11])){

                      

                         $status = 'FTCI';

                      

                  }else  if(strtotime($importData[10])  < strtotime('13:00:00') && empty($importData[11])){

                      

                            $status = 'FTCO';

                      

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

              Session::flash('message','Import Successful.');

            Session::flash('alert','primary');



              }else{



                 Session::flash('message','Some Employees not registered, Remaining Employees uploaded Successfully');

                 Session::flash('alert','danger');



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

    

     public function todayattendaceexportcsv(Request $request)

{



     $userid = Auth::guard('main_users')->user()->id;

     $reviews = DB::table('main_attendance')->join('main_users','main_attendance.user_id','=','main_users.id')->where('main_users.isactive',1)->whereDate('main_attendance.entry_date','=',$request->attadance_date)->select('main_attendance.*','main_users.userfullname')->get();

  $columns = array('EMP Code', 'Employee Name', 'Date', 'InTime','OutTime','Status');

    $filename = public_path("uploads/csv/attadance_'".time()."'_report.csv");

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $columns);

        if(is_array($reviews) && !empty($reviews)){ 
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





public function munualattedance(){

    

    $userdata = DB::table('main_users')->where('id','!=',1)->select('id','userfullname')->get();

  

    return view('attendance.manual_attedance',['users' => $userdata ]);

}





public function manual_attendace(Request $request){

    

   // dd($request->all());

    

       $getreporting = Db::table('main_users')->where('id',$request->userid)->first();

    

   

    	    

    	   $upateatt =  DB::table('main_attendance')->insert([

    	    'user_id' => $request->userid,

    	    'empid' => $updateid,

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

    

public function export_attdendance(Request $request)

{

   // $reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();

     $userid = Auth::guard('main_users')->user()->id;

   $month = date('m');

if(isset($_GET['month']) && isset($_GET['id'])){



  $month = $_GET['month'];

  $userid = $_GET['id'];







    $reviews = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->leftJoin('total_leave_list', 'total_leave_list.user_id', '=', 'grc_employeeleaves.user_id')->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%m'))"), "=",$month)->where('grc_employeeleaves.user_id',$userid)



  ->select('grc_employeeleaves.*','total_leave_list.total_year_leave','total_leave_list.month_leave','total_leave_list.used_leave','total_leave_list.unpaid_leave','main_users.userfullname','main_users.employeeId')

  ->get();





}else{



    $reviews = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->leftJoin('total_leave_list', 'total_leave_list.user_id', '=', 'grc_employeeleaves.user_id')->whereRaw("find_in_set($userid,show_user_id)")



  ->select('grc_employeeleaves.*','total_leave_list.total_year_leave','total_leave_list.month_leave','total_leave_list.used_leave','total_leave_list.unpaid_leave','main_users.userfullname','main_users.employeeId')

  ->get();



}







    $columns = array('S.No', 'Employee Name', 'Employee Code', 'Date of Leave', 'Type of Leave','Comments','Status');



    

    $filename = public_path("uploads/csv/leave_'".time()."'_report.csv");

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $columns);



         $i = 1;

        foreach($reviews as $review) {



        $useridshowid = array_filter(explode(',',$review->show_user_id));

                                                

            if(count($useridshowid) > 5){



              if($review->manager ==1 && $review->hr ==1 && $review->admin ==1 && $review->director == 1){

                $status = 'Approved';

  

              }else if($review->manager == 2 || $review->hr ==2 || $review->admin ==2 || $review->director == 2){

  

                $status = 'Rejected';

  

              }else{

  

                $status = 'Pending';

  

              }



            }else{



              if($review->manager ==1 && $review->hr ==1 && $review->admin ==1){

                $status = 'Approved';

  

              }else if($review->manager == 2 || $review->hr ==2 || $review->admin ==2){

  

                $status = 'Rejected';

  

              }else{

  

                $status = 'Pending';

  

              }



            }

           fputcsv($handle, array($i++, ucwords($review->userfullname), $review->employeeId, $review->leaveDate, $review->leave_mode, $review->comment,$status));

        }

        

       fclose($handle);



       $headers = array(

        'Content-Type' => 'text/csv'

       

        );


    return Response()->download($filename);

 

 

}


    

}

