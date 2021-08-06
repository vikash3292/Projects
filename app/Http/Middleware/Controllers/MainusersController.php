<?php

namespace App\Http\Controllers;
namespace Illuminate\Support\Facades;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


//use Illuminate\Support\Facades\Auth;
use DB;
use Session;
//use Input;
use Mail;
use URL;
use Hash;
use Auth;
use Validator;
use App\Main_users;
use App\Mail\sendEmail;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;


class MainusersController extends Controller
{

     protected $_primary = 'id';
  protected $startDay = 21;
  protected $endDay = 20;
  protected $attEndDay = 20;
  protected $monthInterval = 1;
    //

 //SUPER ADMIN LOGIN 
public function users_login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');


    
        if(!empty($email) && !empty($password))
        {


      	  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //user sent their email 
            if (Auth::guard('main_users')->attempt(['emailaddress' => $email, 'password' => $password,'isactive' => 1])){
               return redirect('dashboard');
               
            } else {
            return redirect()->back()->with('message', 'Invalid Email OR Password');;
        }
               
            } else {
    //they sent their username instead 
            if (Auth::guard('main_users')->attempt(['savior_card_id' => $email, 'password' => $password,'isactive' => 1])){
               return redirect('dashboard');
            } else {
            return redirect()->back()->with('message', 'Invalid Sarvior Card No OR Password');;
            }
              }
        

        } 
        else 
        {

 
           
           $userId = Auth::guard('main_users')->user()??'';
           if(!empty($userId)){
           

              return redirect('dashboard');

           }else{
            return view('admin.login');
          }
        }    
}


public function dashboardview(){
    
     $Role = Auth::guard('main_users')->user()->emprole;
     $userid = Auth::guard('main_users')->user()->id;
    $date =  date("Y-m-d");
    
    $upcomingholydate = DB::table('main_holidaydates')->whereDate('holidaydate','>=',$date)->where('isactive',1)->orderBy('holidaydate', 'asc')->limit(3)->get();
    
   
     $birthday = DB::table('grc_emppersonaldetails')->join('main_users','main_users.id','=','grc_emppersonaldetails.user_id')->where('main_users.isactive',1)->where(DB::raw("(DATE_FORMAT(grc_emppersonaldetails.dob,'%m-%d'))"), ">=", date('m-d'))->orderBy(DB::raw("DATE_FORMAT(grc_emppersonaldetails.dob,'%m')"), 'asc')->orderBy(DB::raw("DATE_FORMAT(grc_emppersonaldetails.dob,'%d')"), 'asc')->where('grc_emppersonaldetails.status',1)->select('main_users.userfullname','grc_emppersonaldetails.dob','main_users.profileimg','main_users.prefix','main_users.id as userid')->limit(5)->get();
  
    
    $halfday = 0;
    $late = 0;
     $attadance = DB::table('main_attendance')->where(DB::raw("(DATE_FORMAT(main_attendance.entry_date,'%Y'))"), "=", date('Y'));
     
       if($Role != 1){
        $attadance->where('user_id' , $userid);
    }
     
     $attadance = $attadance->get();
     foreach($attadance as $attadances){
         if($attadances->status == 'HL'){
             $halfday +=1;
         }
         
          if($attadances->intime <= '10:00:00'){
             $late +=1;
         }
         
     }

      $userid = Auth::guard('main_users')->user()->id;
       $role= Auth::guard('main_users')->user()->emprole;
      $getAppravellist = DB::table('main_attendance_temporarydata')->join('main_users','main_attendance_temporarydata.empid','=','main_users.id');
      if($role != 1){
        $getAppravellist ->where('main_attendance_temporarydata.reporting_to',$userid);

      }
      
     $getattence =  $getAppravellist->whereIN('is_active',[2])->select('main_attendance_temporarydata.*','main_users.userfullname')->get();


    
    
    $leavecount = DB::table('grc_employeeleaves')->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y'))"), "=", date('Y'));
    if($Role != 1){
        $leavecount->where('user_id' , $userid);
    }
    $leavecount = $leavecount->get();
    $takenLeave = 0;
    $pending = 0;
    foreach($leavecount as $leavecounts){
          if($leavecounts->manager ==1 && $leavecounts->hr ==1 && $leavecounts->admin ==1 || $leavecounts->director ==1){
             $takenLeave += $leavecounts->leave_type; 
          }
           if($leavecounts->manager ==0 && $leavecounts->hr ==0 && $leavecounts->admin==0 && $leavecounts->director==0){
             $pending += $leavecounts->leave_type; 
          }
            
    }


          $getleavetype = DB::table('grc_employeeleaves')->where('status',1)
            ->where(function($query) {

                         $query->where('manager','=',1)

                            ->where('hr','=',1)

                            ->where('admin','=',1);                     

                    })->where(function($query) {

                            $query->orWhere('grc_employeeleaves.director', '=',0);

                    })
          ->where('user_id',$userid)->orderBy(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%m'))"), 'asc')->select(DB::raw('SUM(grc_employeeleaves.leave_type) as leaveCount'))->first();

          

$dashboardview = [];

$leave = DB::table('main_users')->where('id',$userid)->first();

$dashboardview['PL'] = $leave->leave_pl;
$dashboardview['CL'] = $leave->leave_cl;
$dashboardview['total_use_leave'] = $getleavetype->leaveCount??0;

 $pendingleave = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->where('grc_employeeleaves.manager',0)->where('grc_employeeleaves.hr',0)->where('grc_employeeleaves.admin',0);
if($Role !=1){
  $pendingleave->whereRaw("find_in_set($userid,grc_employeeleaves.show_user_id)");
}
$pendingleave = $pendingleave->select(DB::raw('SUM(grc_employeeleaves.leave_type) AS leaveCount'))
  ->first();
  $dashboardview['pendingLeave'] = $pendingleave->leaveCount;


$totalunderUser = DB::table('main_users');
if($Role !=1){
$totalunderUser->where('reporting_manager',$userid);
}
$totalunderUser = $totalunderUser->count();
$dashboardview['TotalUnderUser'] = $totalunderUser;

$totalunderUserActive = DB::table('main_users');
if($Role !=1){
$totalunderUserActive->where('reporting_manager',$userid);
}
$totalunderUserActive = $totalunderUserActive->where('isactive',1)->count();
$dashboardview['TotalUnderUserActive'] = $totalunderUserActive;

$fts = $this->fts($userid);
$dashboardview['FTS'] = $fts;

  $attdandaceCorrection = DB::table('main_attendance_temporarydata');
      if($Role != 1){
        $attdandaceCorrection->where('main_attendance_temporarydata.reporting_to',$userid);

      }
      
     $attdandaceCorrection =  $attdandaceCorrection->whereIN('is_active',[2])->select(DB::raw('COUNT(*) AS leaveCorrection'))->first();
     $dashboardview['AttedanceCorrection'] = $attdandaceCorrection->leaveCorrection;
     $dashboardview['totalworkday'] = $this->totalworkingday();

     //project

     $underProject = DB::table('tm_projects')->where('project_status','in-progress')->where('is_active',1);
      if($Role != 1){
        $underProject->where('tm_projects.manager_id',$userid);
      }

      $underProject = $underProject->count();

      $tasknotfound = [];
$hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userid)->where('tm_projects.project_status','in-progress')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();
if(isset($hideprojectlist)){
foreach($hideprojectlist as $hideprojectlists){
$tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userid)->select('tm_project_tasks.*','tm_tasks.task')->first();
if(empty($tasklist)){
$tasknotfound[] = $hideprojectlists->project_id;
}
}
}
     
       $memberProject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','tm_projects.id')->where('tm_projects.project_status','in-progress')->whereNotIn('tm_project_employees.project_id',$tasknotfound)->where('tm_projects.is_active',1);
 if($Role != 1){
         $memberProject->where('tm_project_employees.emp_id',$userid);
       }
     
      $memberProject = $memberProject->count();


           $TotalProject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','tm_projects.id')->where('tm_projects.project_status','in-progress')->where('tm_projects.is_active',1);
 if($Role != 1){
         $TotalProject->where('tm_project_employees.emp_id',$userid);
       }
     
      $TotalProject = $TotalProject->count();

     
       $dashboardview['managerProject'] =  $underProject;
        $dashboardview['memberProject'] =  $memberProject;
        $dashboardview['TotalProject'] =  $TotalProject;

   

    return view('admin.dashboard',['holyDay' => $upcomingholydate,'birthday' => $birthday,'takeleave' =>$takenLeave,'pending' =>$pending,'halfday' =>$halfday,'late' =>$late,'dashboad' => $dashboardview,'approvalList' => $getattence]);

}


private function totalworkingday(){


                  $weekEnds = [];
                  $month = date('m');
                  $year = date('Y');
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

                   $newdate = date('Y-m', strtotime($year.'-'.$month.'+-1 months'));

       $attstatedate = $newdate.'-'.$this->startDay;
       $attenddate = $year.'-'. $month.'-'.$this->attEndDay;


                 $datetime1 = new DateTime($attstatedate);

                 $datetime2 = new DateTime($attenddate);

                 $difference = $datetime1->diff($datetime2);

                 $totalday  = $difference->d;

                 $weekendoff = $weekEnds;

                return $workingday = (int)$totalday - (int)$weekendoff;




}


private function fts($userid){

       $month = date('m');
       $newdate = date('Y-m', strtotime(date('Y-m').'+-1 months'));     
       $year = date('Y');


       $attstatedate = $newdate.'-'.$this->startDay;
       $attenddate = $year.'-'. $month.'-'.$this->attEndDay;

      return  $absent  = 1 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'LWP')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'HL')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'FTCO')->count() + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'FTCI')->count()  + 0.5 * DB::table('main_attendance')->whereBetween('entry_date', [$attstatedate, $attenddate])->where('user_id',$userid)->where('status', '=', 'HPL')->count();
}








    public function employees(){

       $userid = Auth::guard('main_users')->user()->id;
       // dd($userid);

          $listData = Main_users::leftJoin('main_departments','main_users.department_id','=','main_departments.id')->where('main_users.emprole','!=',1)->where('main_users.id','!=', $userid)->select('main_users.*','main_departments.deptname','main_users.createddate as usercreateddate')->get();
            return view('admin.employees',compact('listData'));
    }

    public  function add_employees(Request $request){
      return view('admin.add_emp');
    }

   public function showLinkRequestForm(){

            return view('admin.forget');

    }

       public function sendResetLinkEmail(Request $request){


         date_default_timezone_set("Asia/Kolkata");

         $user = DB::table('main_users')->where('emailaddress', $request->email)->first();
        if ( !$user ) return redirect()->back()->with('message', 'Invalid Email');
          
      $arr  = [
            'email' => $request->email,
            'token' => str_random(60), //change 60 to any length you want
            'created_at' =>date('Y-m-d H:i:s'),
        ];

        //create a new token to be sent to the user. 
      // $dd = DB::table('password_resets')->insert($arr);

         DB::table('password_resets')->where('email', $request->email)->delete();
         
          $test_detailsId = DB::table('password_resets')->insert($arr);

        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

       $token = $tokenData->token;
       $email = $request->email; // or $email = $tokenData->email;

   
        $to = $email;
        $subject = 'Reset password';
        $from = 'ujjval000@gmail.com';
        $fromname = 'ujjval';
        $content = '';
        $content .='
   <!DOCTYPE html>
  <html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>GRC</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="GRC" name="author">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="body-wrap"
                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
                    bgcolor="#f6f6f6">
                    <tr
                        style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                            valign="top"></td>
                        <td class="container" width="600"
                            style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                            valign="top">
                            <div class="content"
                                style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action"
                                    itemscope itemtype="http://schema.org/ConfirmAction"
                                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                    <tr
                                        style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-wrap"
                                            style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #5fe384;border-radius: 7px; background-color: #fff;"
                                            valign="top">
                                            <meta itemprop="name" content="Confirm Email"
                                                style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <tr
                                                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block"
                                                        style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                        valign="top">Please confirm your email address by
                                                        clicking the link below.</td>
                                                </tr>
                                                <tr
                                                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block"
                                                        style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                        valign="top">We may need to send you critical
                                                        information about our service and it is important
                                                        that we have an accurate email address.</td>
                                                </tr>
                                                <tr
                                                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" itemprop="handler" itemscope
                                                        itemtype="http://schema.org/HttpActionHandler"
                                                        style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                        valign="top"><a href="'.URL::to('password/reset/'.$token).'" class="btn-primary" itemprop="url"
                                                            style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #5fe384; margin: 0; border-color: #5fe384; border-style: solid; border-width: 8px 16px;">Confirm
                                                            email address </a> 
                                                            <p style="color:red;margin-bottom: 5px;
    margin-top: 4px;
    font-size: 13px;">Link has been Expired After 2 hr</p>
                                                            </td>
                                                </tr>
                                                <tr
                                                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block"
                                                        style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                        valign="top">
                                                        <b>GRC India</b>
                                                    </td>
                                                </tr>
                                                <tr
                                                    style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block"
                                                        style="text-align: center;font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;"
                                                        valign="top">© 2019 GRC</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
       
        ';
       // $content .= 'Dear '.$user->userfullname.' Send Reset Password <a href="'.URL::to('password/reset/'.$token).'">Click Link</a> Link valid in 2 Hours'; 

        $sendEmail = $this->sendforgetlink($to,$subject,$from,$fromname,$content);


        if($sendEmail){

          return redirect('admin')->with('message', 'Link Has been send in your email');

        }else{

        return redirect('admin')->with('message', 'Link Has been send in your email');

        }



    }

        public function showResetForm($token)
     {
         $tokenData = DB::table('password_resets')
         ->where('token', $token)->where('created_at','>',Carbon::now()->subHours(2))->first();

         if ( !$tokenData ) return redirect('forget')->with('message', 'Link Expaired');; //redirect them anywhere you want if the token does not exist.
         return view('admin.changePassword',['token' =>$tokenData->token]);
     }



     public function resetform(Request $request)
     {
  

       $token = $request->token;

       $Validator =  Validator::make($request->all(), [
        'password' => 'min:6',
        'cpassword' => 'required_with:password|same:password|min:6'
      ]);

     if($Validator->fails()){

          return redirect('password/reset/'.$token)->with('message', $Validator->messages()->first());

       }
     
     $password = $request->password;
     $tokenData = DB::table('password_resets')->where('token', $token)->first();
  
 
   //  $user = User::where('email', $tokenData->email)->first();
      $user = DB::table('main_users')->where('emailaddress', $tokenData->email)->first();

     if ( !$user ) return redirect()->to('/'); //or wherever you want
       $pass  = Hash::make($password);
      $upated =  DB::table('main_users')->where('id',$user->id)->update(['password' => $pass]);
     //$user->password = Hash::make($password);
    // $user->update(); //or $user->save();
    
     //do we log the user directly or let them login and try their password for the first time ? if yes 

       if($upated){

       //  Auth::login($user);

        DB::table('password_resets')->where('email', $user->emailaddress)->delete();

          return redirect('admin')->with('message', 'Password has been changed successfully');

       }
  
 }




        protected function sendforgetlink($to, $subject, $from, $fromname, $content)
    {
        try {
            $mail = Mail::send([], [], function ($message) use ($to, $subject, $from, $fromname, $content) {

                $message->from($from, $fromname);
                $message->to($to);
                $message->subject($subject);
                $message->setBody($content, 'text/html'); // for HTML rich messages
            });

            if ($mail) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }




public function sendnotification(Request $request){
    
     $userid = Auth::guard('main_users')->user()->id;
    
    $addnoti = array(
        'sender_id' => $userid,
        'reciver_id' => $request->birthday_user_id,
        'msg' => $request->comment,
        'status' => 1,
        
        );
        
        $inst = DB::table('main_notification')->insert($addnoti);
        
        if($inst){
            
             return response()->json(['status' => 200, 'msg' => 'Send Wishes']);
        }else{
            
             return response()->json(['status' => 203, 'msg' => 'not send']);
            
        }
}

function shownotification(Request $request){
    
    $current_userid = $request->current_user_id;
    
     $role = Auth::guard('main_users')->user()->emprole;
    
    $getnotification = DB::table('main_notification')->leftjoin('main_users as sender','main_notification.sender_id','=','sender.id')->leftjoin('main_users as reciver','main_notification.reciver_id','=','reciver.id')->orderBy('main_notification.create_at', 'DESC')->select('main_notification.*','sender.userfullname as sender_user_name','reciver.userfullname as reciver_username','sender.profileimg','sender.prefix');
     if($role !=1){
        $getnotification->where('main_notification.reciver_id','=',$current_userid); 
     }

       $count = 0;
        $count +=  $getnotification->count(); 
       
       $allnotidata = $getnotification->limit(10)->get();

       $leave_pending = DB::table('grc_employeeleaves')->join('main_users as sender','grc_employeeleaves.user_id','=','sender.id')->where('grc_employeeleaves.status',1)
            ->where(function($query) {

                         $query->where('grc_employeeleaves.manager','=',0)

                            ->where('grc_employeeleaves.hr','=',0)

                            ->where('grc_employeeleaves.admin','=',0);
                       

                    })->where(function($query) {

                            $query->orWhere('grc_employeeleaves.director', '=',0);

                    })

          ->whereRaw("find_in_set($current_userid,grc_employeeleaves.show_user_id)")->orderBy(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y-%m-%d'))"), 'DESC')->select('grc_employeeleaves.*','sender.userfullname as sender_user_name','sender.profileimg','sender.prefix');

           $count +=  $leave_pending->count(); 

          $leave_pending  = $leave_pending->get();
       
    $html = '';

    foreach ($leave_pending as $key => $getnotifications) {

       $cunt = date('d-M-Y h:i:s', strtotime($getnotifications->created_at));
       
                   
                 $html .=  ' <a href="javascript:void(0);" class="dropdown-item notify-item">
                              <div class="notify-icon bg-success">'; 
                              if(!empty($getnotifications->profileimg))
                              $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="'.URL::to('public/').$getnotifications->profileimg.'">';
                              elseif($getnotifications->prefix == 1){
                                 $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="'.URL::to('public/uploads/male.png').'">';
                              }elseif($getnotifications->prefix == 2 || $getnotifications->prefix ==3 ){
                                 $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="'.URL::to('public/uploads/female.png').'">';
                              }else{
                              
                               $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="#">';
                              
                              }
                              $html .= '</div>
                              <p class="notify-details">'.ucwords($getnotifications->sender_user_name).'<span class="text-muted">Pending Leave ' .$cunt.'</span></p>
                           </a>';                             
                                        
     
    }


    foreach($allnotidata as $getnotifications){
        
       $cunt = date('d-M-Y h:i:s', strtotime($getnotifications->create_at));
       
                   
                 $html .=  ' <a href="javascript:void(0);" class="dropdown-item notify-item">
                              <div class="notify-icon bg-success">'; 
                              if(!empty($getnotifications->profileimg))
                              $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="'.URL::to('public/').$getnotifications->profileimg.'">';
                              elseif($getnotifications->prefix == 1){
                                 $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="'.URL::to('public/uploads/male.png').'">';
                              }elseif($getnotifications->prefix == 2 || $getnotifications->prefix ==3 ){
                                 $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="'.URL::to('public/uploads/female.png').'">';
                              }else{
                              
                               $html .=  '<img class="img-fluid thumb-sm1 rounded-circle mr-2" src="#">';
                              
                              }
                              $html .= '</div>
                              <p class="notify-details">'.ucwords($getnotifications->sender_user_name).'<span class="text-muted">'. $getnotifications->msg .' - '.$cunt.'</span></p>
                           </a>';                             
                                                
        
        
     
    }
    
      
       return response()->json(['status' => 200, 'notifiction' => $html,'totalcount' =>$count]);

}



}
