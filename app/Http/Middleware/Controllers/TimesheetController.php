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

class TimesheetController extends Controller

{







   protected $startDay = 21;

   protected $endDay = 20;

   protected $attEndDay = 20;

   protected $monthInterval = 1;

	

// function timesheetpreview(Request $request,$monthYear='',$currentweek='',$totalweek='',$time=''){

// $userId = Auth::guard('main_users')->user()->id??0;

// if(isset($currentweek) && !empty($currentweek)){

// $currentweekCount = $this->weekOfMonth();

// $currentweekCountPassed = $currentweek;

// }else{

// $currentweekCount = $this->weekOfMonth();

// $currentweekCountPassed = $this->weekOfMonth();

// }

// if(isset($monthYear) && !empty($monthYear)){

// $findMonth = date('M',strtotime($monthYear));

// $findYear = date('Y',strtotime($monthYear));

// $month = date('m',strtotime($monthYear));

// $paginationDate = date('Y-m',strtotime($monthYear));

// $currentweekcount = $currentweek ;

// $finddate =  date('Y-m-d',strtotime('+'.$currentweekcount.' week sun '.$findMonth.' '.$findYear));



// $daterange = $this->rangeWeek($finddate);

// $firstDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[0])));

// $lastDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[1])));

// $daterange1 =  $this->createDateRangeArray($firstDate ,$lastDate);



// }else{





// $finddate = date('Y-m-d',strtotime('last sunday'));

// $findMonth = date('M',strtotime($finddate));

// $findYear = date('Y',strtotime($finddate));

// $month = date('m',strtotime($finddate));

// $paginationDate = date('Y-m',strtotime($finddate));

// $currentweekcount = $this->weekOfMonth() ;





// $daterange =   $this->x_week_range($finddate);

// list($firstDate,$lastDate) = $daterange;

// $daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);



// }





// $daterange =  $daterange1;

// $alltotalhour = 0;

// $totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));



// $uderUser = [];

// $uderUser[] = $userId;

// $usergetassign = DB::table('main_users');

// if(isset($request->mid) && !empty($request->mid)){

// $usergetassign->where('reporting_manager',$request->mid);

// }else{

// $usergetassign->where('reporting_manager',$userId);

// }

// $usergetassign  =  $usergetassign->where('isactive',1)->select('id')->get();

// foreach($usergetassign as $usergetassigns){

// $uderUser[] = $usergetassigns->id;

// }

// $editable = [];

// $editable[] = $userId;

// $usergetassign = DB::table('main_users');

// $usergetassign->where('reporting_manager',$userId);

// $usergetassign  =  $usergetassign->where('isactive',1)->select('id')->get();

// foreach($usergetassign as $usergetassigns){

// $editable[] = $usergetassigns->id;

// }

// $managerProject = [];

// $getallproject = DB::table('tm_projects')->where('manager_id',$userId)->select('id')->get();

// foreach($getallproject as $getallprojects){

// $managerProject[] = $getallprojects->id;

// }

// $tasknotfound = [];

// //  $getuserproject = DB::table('tm_project_employees')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.is_active',1)->where('main_users.isactive',1)->select('emp_id','main_users.userfullname')->get();

// // $getuserproject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->whereIn('tm_project_employees.emp_id',$uderUser)->groupBy('tm_project_employees.emp_id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();          

// $getuserproject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->join('main_users as reportingM','main_users.reporting_manager','=','reportingM.id')->where('tm_projects.is_active',1);

// if(isset($request->mid) && !empty($request->mid)){

// $getuserproject->whereIn('tm_project_employees.emp_id',$uderUser);

// }

// if(!isset($request->all) && empty($request->all)){

// $getuserproject->WhereNull('main_users.extension');

// }

// $getuserproject = $getuserproject->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('main_users.isactive',1)->orderBy('main_users.userfullname')->groupBy('tm_project_employees.emp_id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name','reportingM.userfullname as repotingmanager','main_users.emprole','main_users.extension','main_users.isactive')->paginate(20)->appends(request()->query());



         



// if(isset($getuserproject) && !empty($getuserproject)){

// foreach($getuserproject as $getuserprojects){

// $totaltaskhour = 0;

// $total_mon = 0;

// $total_tue = 0;

// $total_wed = 0;

// $total_thu = 0;

// $total_fri = 0;





// $leaveuser = DB::table('main_leaverequest')->where('user_id',$getuserprojects->emp_id)->where('leavestatus','Approved')->where('leaveday',1)->whereBetween('from_date', [$firstDate, $lastDate])->select('from_date')->get();

//   $leaveList = [];

// if(isset($leaveuser) && !empty($leaveuser) && count($leaveuser) > 0){

    

// 	foreach ($leaveuser as $key => $leaveusers) {

		

// 		$leaveList[] = date('D',strtotime($leaveusers->from_date)); 

// 	}

 

// }



//   $getuserprojects->leaveDate = $leaveList;



// $urerhour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// foreach($urerhour as $urerhours)  {              

// $time_arr =  array($urerhours->mon_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_mon +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->tue_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_tue +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->wed_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_wed +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->thu_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_thu +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->fri_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_fri +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->week_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $totaltaskhour +=explode_time($time_val);

// }

// }

// //dd($total_fri);

// $getuserprojects->userhour = second_to_hhmm($totaltaskhour??'00:00');

// $getuserprojects->assign_hour_mon = second_to_hhmm($total_mon??'00:00');

// $getuserprojects->assign_hour_tue = second_to_hhmm($total_tue??'00:00');

// $getuserprojects->assign_hour_wed = second_to_hhmm($total_wed??'00:00');

// $getuserprojects->assign_hour_thu = second_to_hhmm($total_thu??'00:00');

// $getuserprojects->assign_hour_fri = second_to_hhmm($total_fri??'00:00');

// //$getuserprojects->total_user_hour_emp_diff = second_to_hhmm($totaltaskhour - $usertotaltaskhour);





// $getuserprojects->user_hour_mon_diff = second_to_hhmm( 32400 - (int)$total_mon);

// $color_mon = 32400 - (int)$total_mon;

// $getuserprojects->user_hour_mon_color = ($color_mon > 0)?(in_array('Mon',$getuserprojects->leaveDate)? 'bg-dark' : 'bg-green '):'bg-red';

// $getuserprojects->user_hour_tue_diff = second_to_hhmm(32400 - (int)$total_tue);

// $color_tue = 32400 - (int)$total_tue;

// $getuserprojects->user_hour_tue_color = ($color_tue > 0)?(in_array('Tue',$getuserprojects->leaveDate)? 'bg-dark' : 'bg-green '):'bg-red';

// $getuserprojects->user_hour_wed_diff = second_to_hhmm(32400 - (int)$total_wed );

// $color_wed = 32400 - (int)$total_wed;

// $getuserprojects->user_hour_wed_color = ($color_wed > 0)?(in_array('Wed',$getuserprojects->leaveDate)? 'bg-dark' : 'bg-green '):'bg-red';

// $getuserprojects->user_hour_thu_diff = second_to_hhmm(32400 - (int)$total_thu);

// $color_thu = 32400 - (int)$total_thu;

// $getuserprojects->user_hour_thu_color = ($color_thu > 0)?(in_array('Thu',$getuserprojects->leaveDate)? 'bg-dark' : 'bg-green '):'bg-red';

// $getuserprojects->user_hour_fri_diff = second_to_hhmm(32400 - (int)$total_fri);

// $color_fri = 32400 - (int)$total_fri;

// $getuserprojects->user_hour_fri_color = ($color_fri > 0)?(in_array('Fri',$getuserprojects->leaveDate)? 'bg-dark' : 'bg-green '):'bg-red';

// $totaltaskhour = 0;

// $total_mon = 0;

// $total_tue = 0;

// $total_wed = 0;

// $total_thu = 0;

// $total_fri = 0;

// $tasknotfound = [];

// $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();

// if(isset($hideprojectlist)){

// foreach($hideprojectlist as $hideprojectlists){

// $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_tasks.*','tm_tasks.task')->first();

// if(empty($tasklist)){

// $tasknotfound[] = $hideprojectlists->project_id;

// }

// }

// }



// // if($currentweekcount < $this->weekOfMonth() && $month <= date('m')){



// // $userassignprojectlist = array();

// // $assignproject = DB::table('tm_assign_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekcount)->groupBy('project_id')->get();



// // foreach ($assignproject as $key => $assignprojects) {

// // 	$userassignprojectlist[] = $assignprojects->project_id;

	

// // }







// //$emplist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->where('project_status','in-progress')->whereNotIn('tm_project_employees.project_id',$tasknotfound)->whereIn('tm_project_employees.project_id',array_unique($userassignprojectlist))->where('tm_project_employees.project_id','!=',30)->select('tm_project_employees.*','tm_projects.project_name')->get();



// //dd($emplist);



// //unset($userassignprojectlist);



// //}else{



// // dd($tasknotfound);

// $emplist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->where('project_status','in-progress')->whereNotIn('tm_project_employees.project_id',$tasknotfound)->where('tm_project_employees.project_id','!=',30)->select('tm_project_employees.*','tm_projects.project_name')->get();



// //}



// if(isset($emplist)){

// foreach($emplist as $emplists){

// $project_total_hour = 0;

// $project_mon = 0;

// $project_tue = 0;

// $project_wed = 0;

// $project_thu = 0;

// $project_fri = 0;

// $urerhour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$emplists->emp_id)->where('project_id',$emplists->project_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// //dd($urerhour);               

// foreach($urerhour as $urerhours)  {              

// $time_arr =  array($urerhours->mon_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_mon +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->tue_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_tue +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->wed_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_wed +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->thu_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_thu +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->fri_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_fri +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->week_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_total_hour +=explode_time($time_val);

// }

// }

// //dd($total_fri);

// $emplists->project_hour = second_to_hhmm($project_total_hour??'00:00');

// $emplists->project_hour_mon = second_to_hhmm($project_mon??'00:00');

// $emplists->project_hour_tue = second_to_hhmm($project_tue??'00:00');

// $emplists->project_hour_wed = second_to_hhmm($project_wed??'00:00');

// $emplists->project_hour_thu = second_to_hhmm($project_thu??'00:00');

// $emplists->project_hour_fri = second_to_hhmm($project_fri??'00:00');

// ////dd($total_mon);

// //$project_total_hour = 0;

// //   $project_mon = 0;

// //   $project_tue = 0;

// //   $project_wed = 0;

// //     $project_thu = 0;

// //      $project_fri = 0;

// $emplists->gettask =  DB::table('tm_project_task_employees')->join('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$emplists->project_id)->where('tm_project_task_employees.emp_id',$emplists->emp_id)->groupBy('tm_project_task_employees.task_id')->groupBy('tm_project_task_employees.project_task_id')->select('tm_project_task_employees.*','tm_tasks.task','tm_project_tasks.id as project_taskId')->get();

// foreach($emplists->gettask  as $taskassign){

// $taskhour = 0;

// $projecassignuser = DB::table('tm_assign_emp_timesheets')->where('project_id',$taskassign->project_id)->where('project_task_id',$taskassign->project_task_id)->where('emp_id',$taskassign->emp_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// if(isset($projecassignuser) && !empty($projecassignuser)){

// foreach($projecassignuser as $projecassignusers){

// $taskassign->duration[] = $projecassignusers->sun_duration;

// $taskassign->duration[] = $projecassignusers->mon_duration;

// $taskassign->duration[] =  $projecassignusers->tue_duration;

// $taskassign->duration[] =  $projecassignusers->wed_duration;

// $taskassign->duration[] =  $projecassignusers->thu_duration;

// $taskassign->duration[] =  $projecassignusers->fri_duration;

// $taskassign->duration[] =  $projecassignusers->sat_duration;

// $time_arr =  array($projecassignusers->mon_duration,$projecassignusers->tue_duration,$projecassignusers->wed_duration,$projecassignusers->thu_duration,$projecassignusers->fri_duration);

// foreach ($time_arr as $time_val) {

// $taskhour +=explode_time($time_val);

// }

// }

// $taskassign->task_hour = second_to_hhmm($taskhour??'00:00');   

// }

// }

// }

// }

// $mon = '';

// $tue = '';

// $wed = '';

// $thu = '';

// $fri = '';

// foreach($emplist as $userprojects){

// $projecthour = DB::table('tm_assign_emp_timesheets')->where('project_id',$userprojects->project_id)->where('emp_id',$userprojects->emp_id)->where('ts_week',$currentweekCountPassed)->get();

// if(!empty($projecthour)){

// foreach($projecthour as $projecthours){

// $mon = strtotime($projecthours->mon_duration);

// $tue = strtotime($projecthours->tue_duration);

// $wed = strtotime($projecthours->wed_duration);

// $thu = strtotime($projecthours->thu_duration);

// $fri = strtotime($projecthours->fri_duration);

// $userprojects->mon =  date('H:i:s', $mon);

// $userprojects->tue =  date('H:i:s', $tue);

// $userprojects->web =  date('H:i:s', $wed);

// $userprojects->thu =  date('H:i:s', $thu);

// $userprojects->fri =  date('H:i:s', $fri);

// }

// }

// }

// $getuserprojects->userproject = $emplist;

// unset($tasknotfound);

// }

// }

                  

// //dd($getuserproject);                               

// //	dd(date('H:i:s', '11072714400'));

// return view('projects.timesheet',['assignproject' => $getuserproject,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'PaginationDate' => $paginationDate,'emp_list' => array_unique($editable),'projectidlist' => $managerProject,'everyMonth' => $findMonth ]);

// //dd($monthYear);

// }

// public function search_timesheet_name(Request $request){

// $userId = Auth::guard('main_users')->user()->id??0;

// if(isset($request->currentweek) && !empty($request->currentweek)){

// $currentweekCount = $this->weekOfMonth();

// $currentweekCountPassed = $request->currentweek;

// }else{

// $currentweekCount = $this->weekOfMonth();

// $currentweekCountPassed = $this->weekOfMonth();

// }

// if(isset($request->paginationDate) && !empty($request->paginationDate)){

// $monthYear = $request->paginationDate;

// $findMonth = date('M',strtotime($monthYear));

// $findYear = date('Y',strtotime($monthYear));

// $month = date('m',strtotime($monthYear));

// $currentweekcount = $request->currentweek;

// $paginationDate = date('Y-m',strtotime($monthYear));

// $finddate =  date('Y-m-d',strtotime('+'.$currentweekcount.' week sun '.$findMonth.' '.$findYear));





// $daterange = $this->rangeWeek($finddate);

// $firstDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[0])));

// $lastDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[1])));

// $daterange1 =  $this->createDateRangeArray($firstDate ,$lastDate);

// }else{





// $finddate = date('Y-m-d',strtotime('last sunday'));

// $findMonth = date('M',strtotime($finddate));

// $findYear = date('Y',strtotime($finddate));

// $month = date('m',strtotime($finddate));

// $paginationDate = date('Y-m',strtotime($finddate));

// $currentweekcount = $this->weekOfMonth() ;





// $daterange =   $this->x_week_range($finddate);

// list($firstDate,$lastDate) = $daterange;

// $daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);



// }



// $daterange =  $daterange1;

// $alltotalhour = 0;

// $totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));

// $uderUser = [];

// $uderUser[] = $userId;

// $usergetassign = DB::table('main_users');

// if(isset($request->mid) && !empty($request->mid)){

// $usergetassign->where('reporting_manager',$request->mid);

// }else{

// $usergetassign->where('reporting_manager',$userId);

// }

// $usergetassign  =  $usergetassign->where('isactive',1)->select('id')->get();

// foreach($usergetassign as $usergetassigns){

// $uderUser[] = $usergetassigns->id;

// }

// $editable = [];

// $editable[] = $userId;

// $usergetassign = DB::table('main_users');

// $usergetassign->where('reporting_manager',$userId);

// $usergetassign  =  $usergetassign->where('isactive',1)->select('id')->get();

// foreach($usergetassign as $usergetassigns){

// $editable[] = $usergetassigns->id;

// }

// $managerProject = [];

// $getallproject = DB::table('tm_projects')->where('manager_id',$userId)->select('id')->get();

// foreach($getallproject as $getallprojects){

// $managerProject[] = $getallprojects->id;

// }

// $tasknotfound = [];

// //  $getuserproject = DB::table('tm_project_employees')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.is_active',1)->where('main_users.isactive',1)->select('emp_id','main_users.userfullname')->get();

// // $getuserproject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->whereIn('tm_project_employees.emp_id',$uderUser)->groupBy('tm_project_employees.emp_id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();          

// $getuserproject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->leftjoin('main_users','tm_project_employees.emp_id','=','main_users.id')->leftjoin('main_users as reportingM','main_users.reporting_manager','=','reportingM.id')->where('main_users.isactive',1)->where('tm_projects.is_active',1);

// if(isset($request->mid) && !empty($request->mid)){

// $getuserproject->whereIn('tm_project_employees.emp_id',$uderUser);

// }

// $getuserproject = $getuserproject->Where('main_users.userfullname', 'like', '%' . $request->timesheet_name . '%')->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->orderBy('main_users.userfullname')->groupBy('tm_project_employees.emp_id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name','reportingM.userfullname as repotingmanager')->paginate(20)->appends(request()->query());          

// if(isset($getuserproject) && !empty($getuserproject)){

// foreach($getuserproject as $getuserprojects){

// $totaltaskhour = 0;

// $total_mon = 0;

// $total_tue = 0;

// $total_wed = 0;

// $total_thu = 0;

// $total_fri = 0;

// $urerhour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// foreach($urerhour as $urerhours)  {              

// $time_arr =  array($urerhours->mon_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_mon +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->tue_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_tue +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->wed_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_wed +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->thu_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_thu +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->fri_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $total_fri +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->week_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $totaltaskhour +=explode_time($time_val);

// }

// }

// //dd($total_fri);

// $getuserprojects->userhour = second_to_hhmm($totaltaskhour??'00:00');

// $getuserprojects->assign_hour_mon = second_to_hhmm($total_mon??'00:00');

// $getuserprojects->assign_hour_tue = second_to_hhmm($total_tue??'00:00');

// $getuserprojects->assign_hour_wed = second_to_hhmm($total_wed??'00:00');

// $getuserprojects->assign_hour_thu = second_to_hhmm($total_thu??'00:00');

// $getuserprojects->assign_hour_fri = second_to_hhmm($total_fri??'00:00');

// //$getuserprojects->total_user_hour_emp_diff = second_to_hhmm($totaltaskhour - $usertotaltaskhour);

// $getuserprojects->user_hour_mon_diff = second_to_hhmm( 32400 - (int)$total_mon);

// $color_mon = 32400 - (int)$total_mon;

// $getuserprojects->user_hour_mon_color = ($color_mon > 0)?'bg-green':'bg-red';

// $getuserprojects->user_hour_tue_diff = second_to_hhmm(32400 - (int)$total_tue);

// $color_tue = 32400 - (int)$total_tue;

// $getuserprojects->user_hour_tue_color = ($color_tue > 0)?'bg-green':'bg-red';

// $getuserprojects->user_hour_wed_diff = second_to_hhmm(32400 - (int)$total_wed );

// $color_wed = 32400 - (int)$total_wed;

// $getuserprojects->user_hour_wed_color = ($color_wed > 0)?'bg-green':'bg-red';

// $getuserprojects->user_hour_thu_diff = second_to_hhmm(32400 - (int)$total_thu);

// $color_thu = 32400 - (int)$total_thu;

// $getuserprojects->user_hour_thu_color = ($color_thu > 0)?'bg-green':'bg-red';

// $getuserprojects->user_hour_fri_diff = second_to_hhmm(32400 - (int)$total_fri);

// $color_fri = 32400 - (int)$total_fri;

// $getuserprojects->user_hour_fri_color = ($color_fri > 0)?'bg-green':'bg-red';

// $totaltaskhour = 0;

// $total_mon = 0;

// $total_tue = 0;

// $total_wed = 0;

// $total_thu = 0;

// $total_fri = 0;

// $tasknotfound = [];

// $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();

// if(isset($hideprojectlist)){

// foreach($hideprojectlist as $hideprojectlists){

// $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_tasks.*','tm_tasks.task')->first();

// if(empty($tasklist)){

// $tasknotfound[] = $hideprojectlists->project_id;

// }

// }

// }

// // dd($tasknotfound);

// $emplist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->where('project_status','in-progress')->whereNotIn('tm_project_employees.project_id',$tasknotfound)->where('tm_project_employees.project_id','!=',30)->select('tm_project_employees.*','tm_projects.project_name')->get();

// //dd($emplist);

// if(isset($emplist)){

// foreach($emplist as $emplists){

// $project_total_hour = 0;

// $project_mon = 0;

// $project_tue = 0;

// $project_wed = 0;

// $project_thu = 0;

// $project_fri = 0;

// $urerhour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$emplists->emp_id)->where('project_id',$emplists->project_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// //dd($urerhour);               

// foreach($urerhour as $urerhours)  {              

// $time_arr =  array($urerhours->mon_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_mon +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->tue_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_tue +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->wed_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_wed +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->thu_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_thu +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->fri_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_fri +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->week_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $project_total_hour +=explode_time($time_val);

// }

// }

// //dd($total_fri);

// $emplists->project_hour = second_to_hhmm($project_total_hour??'00:00');

// $emplists->project_hour_mon = second_to_hhmm($project_mon??'00:00');

// $emplists->project_hour_tue = second_to_hhmm($project_tue??'00:00');

// $emplists->project_hour_wed = second_to_hhmm($project_wed??'00:00');

// $emplists->project_hour_thu = second_to_hhmm($project_thu??'00:00');

// $emplists->project_hour_fri = second_to_hhmm($project_fri??'00:00');

// ////dd($total_mon);

// //$project_total_hour = 0;

// //   $project_mon = 0;

// //   $project_tue = 0;

// //   $project_wed = 0;

// //     $project_thu = 0;

// //      $project_fri = 0;

// $emplists->gettask =  DB::table('tm_project_task_employees')->join('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$emplists->project_id)->where('tm_project_task_employees.emp_id',$emplists->emp_id)->groupBy('tm_project_task_employees.task_id')->select('tm_project_task_employees.*','tm_tasks.task','tm_project_tasks.id as project_taskId')->get();

// foreach($emplists->gettask  as $taskassign){

// $taskhour = 0;

// $projecassignuser = DB::table('tm_assign_emp_timesheets')->where('project_id',$taskassign->project_id)->where('project_task_id',$taskassign->project_task_id)->where('emp_id',$taskassign->emp_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// if(isset($projecassignuser) && !empty($projecassignuser)){

// foreach($projecassignuser as $projecassignusers){

// $taskassign->duration[] = $projecassignusers->sun_duration;

// $taskassign->duration[] = $projecassignusers->mon_duration;

// $taskassign->duration[] =  $projecassignusers->tue_duration;

// $taskassign->duration[] =  $projecassignusers->wed_duration;

// $taskassign->duration[] =  $projecassignusers->thu_duration;

// $taskassign->duration[] =  $projecassignusers->fri_duration;

// $taskassign->duration[] =  $projecassignusers->sat_duration;

// $time_arr =  array($projecassignusers->mon_duration,$projecassignusers->tue_duration,$projecassignusers->wed_duration,$projecassignusers->thu_duration,$projecassignusers->fri_duration);

// foreach ($time_arr as $time_val) {

// $taskhour +=explode_time($time_val);

// }

// }

// $taskassign->task_hour = second_to_hhmm($taskhour??'00:00');   

// }

// }

// }

// }

// $mon = '';

// $tue = '';

// $wed = '';

// $thu = '';

// $fri = '';

// foreach($emplist as $userprojects){

// $projecthour = DB::table('tm_assign_emp_timesheets')->where('project_id',$userprojects->project_id)->where('emp_id',$userprojects->emp_id)->where('ts_week',$currentweekCountPassed)->get();

// if(!empty($projecthour)){

// foreach($projecthour as $projecthours){

// $mon = strtotime($projecthours->mon_duration);

// $tue = strtotime($projecthours->tue_duration);

// $wed = strtotime($projecthours->wed_duration);

// $thu = strtotime($projecthours->thu_duration);

// $fri = strtotime($projecthours->fri_duration);

// $userprojects->mon =  date('H:i:s', $mon);

// $userprojects->tue =  date('H:i:s', $tue);

// $userprojects->web =  date('H:i:s', $wed);

// $userprojects->thu =  date('H:i:s', $thu);

// $userprojects->fri =  date('H:i:s', $fri);

// }

// }

// }

// $getuserprojects->userproject = $emplist;

// unset($tasknotfound);

// }

// }

// // dd($daterange);

// return view('projects.ajextimesheet', ['assignproject' => $getuserproject,'daterange' => $daterange ,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'PaginationDate' => $paginationDate,'emp_list' => array_unique($editable),'projectidlist' => $managerProject ]);

// }

// public function hour_defin_project(Request $request){

// //dd($request->all());

// $userId = Auth::guard('main_users')->user()->id??0;

// $week_duration = 0;

// foreach($request->project_id as  $project){

// $week_duration = 0;

// foreach($request->project_taskId[$project] as $key => $projecttask){

// // = dd($request->entrydate[$project][$projecttask][0]);

// // $week_duration += strtotime($request->entryhour[$project][$projecttask][0]) + strtotime($request->entryhour[$project][$projecttask][1]) + strtotime($request->entryhour[$project][$projecttask][2]) + strtotime($request->entryhour[$project][$projecttask][3]) + strtotime($request->entryhour[$project][$projecttask][4]) + strtotime($request->entryhour[$project][$projecttask][5]) + strtotime($request->entryhour[$project][$projecttask][6]);

// $totaltaskhour = 0;

// $time_arr =  array($request->entryhour[$project][$projecttask][0],$request->entryhour[$project][$projecttask][1],$request->entryhour[$project][$projecttask][2],$request->entryhour[$project][$projecttask][3],$request->entryhour[$project][$projecttask][4],$request->entryhour[$project][$projecttask][5],$request->entryhour[$project][$projecttask][6]);

// foreach ($time_arr as $time_val) {

// $totaltaskhour +=explode_time($time_val);

// }

// //  $usarassignhour->totaltaskhour = second_to_hhmm($totaltaskhour??'00:00');

// $arra = array(

// 'emp_id' => $request->emp_id[0],

// 'project_task_id' => $projecttask,

// 'project_id' => $project,

// 'ts_year' => date('Y',strtotime($request->entrydate[$project][$projecttask][0])),

// 'ts_month' => date('m',strtotime($request->entrydate[$project][$projecttask][0])),

// 'ts_week' => $request->currentweek,

// 'sun_date' => $request->entrydate[$project][$projecttask][0],

// 'sun_duration' => $request->entryhour[$project][$projecttask][0],

// 'mon_date' => $request->entrydate[$project][$projecttask][1],

// 'mon_duration' => $request->entryhour[$project][$projecttask][1],

// 'tue_date' => $request->entrydate[$project][$projecttask][2],

// 'tue_duration' => $request->entryhour[$project][$projecttask][2],

// 'wed_date' => $request->entrydate[$project][$projecttask][3],

// 'wed_duration' => $request->entryhour[$project][$projecttask][3],

// 'thu_date' => $request->entrydate[$project][$projecttask][4],

// 'thu_duration' => $request->entryhour[$project][$projecttask][4],

// 'fri_date' => $request->entrydate[$project][$projecttask][5],

// 'fri_duration' => $request->entryhour[$project][$projecttask][5],

// 'sat_date' => $request->entrydate[$project][$projecttask][6],

// 'sat_duration' => $request->entryhour[$project][$projecttask][6],

// 'week_duration' => second_to_hhmm($totaltaskhour??'00:00'),

// 'created_by' => $userId,

// 'modified_by' => $userId,

// 'is_active' => 1,

// 'created' => date('Y-m-d H:i:s'),

// 'modified' => date('Y-m-d H:i:s'),

// );

// // dd($arra);

// $count = DB::table('tm_assign_emp_timesheets')->where('emp_id',$request->emp_id[0])->where('project_task_id',$projecttask)->where('project_id',$project)->where('ts_year',date('Y',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_month',date('m',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_week',$request->currentweek)->count();

// if($count > 0){

// $inst = DB::table('tm_assign_emp_timesheets')->where('emp_id',$request->emp_id[0])->where('project_task_id',$projecttask)->where('project_id',$project)->where('ts_year',date('Y',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_month',date('m',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_week',$request->currentweek)->update($arra);

// }else{

// $inst = DB::table('tm_assign_emp_timesheets')->insert($arra);

// }

// }

// $week_duration = 0;

// }

// // 	  foreach($request->project_id as  $project){

// // 	     foreach($request->project_taskId as $key => $projecttask){

// // 	       //  dd($request->entrydate[$projecttask][0]);

// // 	        $week_duration += strtotime($request->entryhour[$projecttask][0]) + strtotime($request->entryhour[$projecttask][1]) + strtotime($request->entryhour[$projecttask][2]) + strtotime($request->entryhour[$projecttask][3]) + strtotime($request->entryhour[$projecttask][4]) + strtotime($request->entryhour[$projecttask][5]) + strtotime($request->entryhour[$projecttask][6]);

// // 	       //  dd($week_duration);

// // 	         $arra = array(

// // 	             'emp_id' => $request->emp_id[$key],

// // 	             'project_task_id' => $projecttask,

// // 	             'project_id' => $project,

// // 	             'ts_year' => date('Y',strtotime($request->entrydate[$projecttask][0])),

// // 	             'ts_month' => date('m',strtotime($request->entrydate[$projecttask][0])),

// // 	             'ts_week' => $request->currentweek,

// // 	              'sun_date' => $request->entrydate[$projecttask][0],

// // 	              'sun_duration' => $request->entryhour[$projecttask][0],

// // 	               'mon_date' => $request->entrydate[$projecttask][1],

// // 	              'mon_duration' => $request->entryhour[$projecttask][1],

// // 	               'tue_date' => $request->entrydate[$projecttask][2],

// // 	              'tue_duration' => $request->entryhour[$projecttask][2],

// // 	               'wed_date' => $request->entrydate[$projecttask][3],

// // 	              'wed_duration' => $request->entryhour[$projecttask][3],

// // 	               'thu_date' => $request->entrydate[$projecttask][4],

// // 	              'thu_duration' => $request->entryhour[$projecttask][4],

// // 	               'fri_date' => $request->entrydate[$projecttask][5],

// // 	              'fri_duration' => $request->entryhour[$projecttask][5],

// // 	               'sat_date' => $request->entrydate[$projecttask][6],

// // 	              'sat_duration' => $request->entryhour[$projecttask][6],

// // 	              'week_duration' => date('H:i', $week_duration??0),

// // 	               'created_by' => $userId,

// // 	               'modified_by' => $userId,

// // 	               'is_active' => 1,

// // 	               'created' => date('Y-m-d H:i:s'),

// // 	                'modified' => date('Y-m-d H:i:s'),

// // 	             );

// // 	             $count = DB::table('tm_assign_emp_timesheets')->where('emp_id',$request->emp_id[$key])->where('project_task_id',$projecttask)->where('project_id',$project)->where('ts_year',date('Y',strtotime($request->entrydate[$projecttask][0])))->where('ts_month',date('m',strtotime($request->entrydate[$projecttask][0])))->where('ts_week',$request->currentweek)->count();

// // 	             if($count > 0){

// // 	                 $inst = DB::table('tm_assign_emp_timesheets')->where('emp_id',$request->emp_id[$key])->where('project_task_id',$projecttask)->where('project_id',$project)->where('ts_year',date('Y',strtotime($request->entrydate[$projecttask][0])))->where('ts_month',date('m',strtotime($request->entrydate[$projecttask][0])))->where('ts_week',$request->currentweek)->update($arra);

// // 	             }else{

// // 	                 $inst = DB::table('tm_assign_emp_timesheets')->insert($arra);

// // 	             }

// // 	     }

// // 	       $week_duration = 0;

// // 	  }

// if($inst){

// return response()->json(['status' => 200, 'msg' => 'successfully Assgin User']);

// }else{

// return response()->json(['status' => 201, 'msg' => 'Not successfully']);

// }

// }



public function view_emp_timesheet($userid,$monthYear='',$currentweek='',$totalweek='',$time=''){



   $mon = '';

   $tue = '';

   $wed = '';

   $thu = '';

   $fri = '';

   $userId = $userid; 



   $getuserdetails = DB::table('main_users')->where('id',$userId)->first();



 

   if(isset($currentweek) && !empty($currentweek)){

   $currentweekCount = $this->weekOfMonth();

   $currentweekCountPassed = $currentweek;

   }else{

   $currentweekCount = $this->weekOfMonth();

   $currentweekCountPassed = $this->weekOfMonth();

   }

   if(isset($monthYear) && !empty($monthYear)){

   $findMonth = date('M',strtotime($monthYear));

   $findYear = date('Y',strtotime($monthYear));

   $month = date('m',strtotime($monthYear));

   $paginationDate = date('Y-m',strtotime($monthYear));

   $currentweekcount = $currentweek ;

   $finddate =  date('Y-m-d',strtotime('+'.$currentweekcount.' week sun '.$findMonth.' '.$findYear));



   $daterange = $this->rangeWeek($finddate);

$firstDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[0])));

$lastDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[1])));

$daterange1 =  $this->createDateRangeArray($firstDate ,$lastDate);

   

   

   $userassignprojectlist = array();

   $assignproject = DB::table('tm_assign_emp_timesheets')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekcount)->groupBy('project_id')->get();

   $userassignprojectlist[] = 30;

   foreach ($assignproject as $key => $assignprojects) {

      $userassignprojectlist[] = $assignprojects->project_id;

      

   }

   

   }else{





$finddate = date('Y-m-d',strtotime('last sunday'));

$findMonth = date('M',strtotime($finddate));

$findYear = date('Y',strtotime($finddate));

$month = date('m',strtotime($finddate));

$paginationDate = date('Y-m',strtotime($finddate));

$currentweekcount = $this->weekOfMonth() ;





$daterange =   $this->x_week_range($finddate);

list($firstDate,$lastDate) = $daterange;

$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);



}





$daterange =  $daterange1;

$alltotalhour = 0;

$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));

   $all_hour_in_user = 0;

   $all_hour_in_mon = 0;

   $all_hour_in_tue = 0;

   $all_hour_in_wed = 0;

   $all_hour_in_thu = 0;

   $all_hour_in_fri = 0;

   $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();

   // dd($user_project_hour);       

   if(isset($user_project_hour) && !empty($user_project_hour)){

   foreach($user_project_hour as $duration){

   $time_arr =  array($duration->week_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $all_hour_in_user +=explode_time($time_val);

   } 

   $time_arr =  array($duration->mon_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $all_hour_in_mon +=explode_time($time_val);

   } 

   $time_arr =  array($duration->tue_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $all_hour_in_tue +=explode_time($time_val);

   } 

   $time_arr =  array($duration->wed_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $all_hour_in_wed +=explode_time($time_val);

   } 

   $time_arr =  array($duration->thu_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $all_hour_in_thu +=explode_time($time_val);

   } 

   $time_arr =  array($duration->fri_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $all_hour_in_fri +=explode_time($time_val);

   } 

   }

   }

   $tasknotfound = [];

   $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->where('tm_projects.project_status','in-progress')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();

   if(isset($hideprojectlist)){

   foreach($hideprojectlist as $hideprojectlists){

   $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->first();

   if(empty($tasklist)){

   $tasknotfound[] = $hideprojectlists->project_id;

   }

   }

   }

   //  dd($tasknotfound);

   $projectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->whereNotIn('tm_project_employees.project_id',$tasknotfound);

   

   if(isset($userassignprojectlist) && !empty($userassignprojectlist) && $currentweekcount < $this->weekOfMonth() && $month <= date('m')){

   

      $projectlist->whereIn('tm_project_employees.project_id', $userassignprojectlist);

   

   }else{

   

      $projectlist->where('tm_projects.project_status','in-progress');

   

   }

   

   

   $projectlist = $projectlist->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();

   

   if(isset($projectlist) && !empty($projectlist)){

   foreach($projectlist as $projectlista){

   $totaltaskhour = 0;

   $total_mon = 0;

   $total_tue = 0;

   $total_wed = 0;

   $total_thu = 0;

   $total_fri = 0;

   $urerhour = DB::table('tm_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

   foreach($urerhour as $urerhours)  {              

   $time_arr =  array($urerhours->mon_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $total_mon +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->tue_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $total_tue +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->wed_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $total_wed +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->thu_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $total_thu +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->fri_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $total_fri +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->week_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $totaltaskhour +=explode_time($time_val);

   }

   }

   $projectlista->userhour = second_to_hhmm($totaltaskhour??'00:00');

   $projectlista->user_hour_mon = second_to_hhmm($total_mon??'00:00');

   $projectlista->user_hour_tue = second_to_hhmm($total_tue??'00:00');

   $projectlista->user_hour_wed = second_to_hhmm($total_wed??'00:00');

   $projectlista->user_hour_thu = second_to_hhmm($total_thu??'00:00');

   $projectlista->user_hour_fri = second_to_hhmm($total_fri??'00:00');

   $assign_totaltaskhour = 0;

   $assign_total_mon = 0;

   $assign_total_tue = 0;

   $assign_total_wed = 0;

   $assign_total_thu = 0;

   $assign_total_fri = 0;

   $urerhour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

   foreach($urerhour as $urerhours)  {              

   $time_arr =  array($urerhours->mon_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $assign_total_mon +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->tue_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $assign_total_tue +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->wed_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $assign_total_wed +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->thu_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $assign_total_thu +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->fri_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $assign_total_fri +=explode_time($time_val);

   } 

   $time_arr =  array($urerhours->week_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $assign_totaltaskhour +=explode_time($time_val);

   }

   }

   //dd($total_fri);

   $projectlista->assign_userhour = second_to_hhmm($assign_totaltaskhour??'00:00');

   $projectlista->assign_hour_mon = second_to_hhmm($assign_total_mon??'00:00');

   $projectlista->assign_hour_tue = second_to_hhmm($assign_total_tue??'00:00');

   $projectlista->assign_hour_wed = second_to_hhmm($assign_total_wed??'00:00');

   $projectlista->assign_hour_thu = second_to_hhmm($assign_total_thu??'00:00');

   $projectlista->assign_hour_fri = second_to_hhmm($assign_total_fri??'00:00');

   $projectlista->tasklist = DB::table('tm_project_task_employees')->join('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$projectlista->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->get();

   if(isset($projectlista->tasklist) && !empty($projectlista->tasklist)){

   foreach($projectlista->tasklist as $usarassignhour){

   $durationall = DB::table('tm_assign_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_task_id',$usarassignhour->id)->where('project_id',$usarassignhour->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();

   if(isset($durationall) && !empty($durationall)){

   foreach($durationall as $duration){

   $sun = strtotime($duration->sun_duration??'00:00');

   $mon = strtotime($duration->mon_duration??'00:00');

   $tue = strtotime($duration->tue_duration??'00:00');

   $wed = strtotime($duration->wed_duration??'00:00');

   $thu = strtotime($duration->thu_duration??'00:00');

   $fri = strtotime($duration->fri_duration??'00:00');

   $sat = strtotime($duration->sat_duration??'00:00');

   $usarassignhour->assintime[] =  date('H:i', $sun);

   $usarassignhour->assintime[] =  date('H:i', $mon);

   $usarassignhour->assintime[] =  date('H:i', $tue);

   $usarassignhour->assintime[] =  date('H:i', $wed);

   $usarassignhour->assintime[] =  date('H:i', $thu);

   $usarassignhour->assintime[] =  date('H:i', $fri);

   $usarassignhour->assintime[] =  date('H:i', $sat);

   }

   }

   $tm_status = DB::table('tm_ts_status')->where('emp_id',$projectlista->emp_id)->where('project_id',$usarassignhour->project_id)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekCountPassed)->get();

   if(isset($tm_status) && !empty($tm_status)){

   foreach($tm_status as $tm_statuss){

   $weekstaus = $tm_statuss->week_status;

   $usarassignhour->week_status =  $weekstaus;

   }

   }

   $totaltaskhour = 0;

   $userenterhour = DB::table('tm_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_task_id',$usarassignhour->id)->where('project_id',$usarassignhour->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();

   //dd($userenterhour);

   if(isset($userenterhour) && !empty($userenterhour)){

   foreach($userenterhour as $userenterhours){

   $usarassignhour->duration[] = $userenterhours->sun_duration??'00:00';

   $usarassignhour->duration[] = $userenterhours->mon_duration??'00:00';

   $usarassignhour->duration[] =  $userenterhours->tue_duration??'00:00';

   $usarassignhour->duration[] =  $userenterhours->wed_duration??'00:00';

   $usarassignhour->duration[] =  $userenterhours->thu_duration??'00:00';

   $usarassignhour->duration[] =  $userenterhours->fri_duration??'00:00';

   $usarassignhour->duration[] =  $userenterhours->sat_duration??'00:00';

   $totaltaskhour = 0;

   $time_arr =  array($userenterhours->mon_duration??'00:00',$userenterhours->tue_duration??'00:00',$userenterhours->wed_duration??'00:00',$userenterhours->thu_duration??'00:00',$userenterhours->fri_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $totaltaskhour +=explode_time($time_val);

   }

   } 

   $usarassignhour->totaltaskhour = second_to_hhmm($totaltaskhour??'00:00');

   // $totaltaskhour += $totaltaskhour;

   }

   }

   }

   }

   }

   // dd($projectlist);

   $sun = 0;

   $mon = 0;

   $tue = 0;

   $wed = 0;

   $thu = 0;

   $fri = 0;

   $sat = 0;

   foreach($projectlist as $userprojects){

   $projecthour = DB::table('tm_assign_emp_timesheets')->where('project_id',$userprojects->project_id)->where('emp_id',$userprojects->emp_id)->where('ts_week',$currentweekCountPassed)->where('ts_month',$month)->where('ts_year',$findYear)->get();

   if(!empty($projecthour)){

   foreach($projecthour as $projecthours){

   $sun += strtotime($projecthours->sun_duration??'00:00');

   $mon += strtotime($projecthours->mon_duration??'00:00');

   $tue += strtotime($projecthours->tue_duration??'00:00');

   $wed += strtotime($projecthours->wed_duration??'00:00');

   $thu += strtotime($projecthours->thu_duration??'00:00');

   $fri += strtotime($projecthours->fri_duration??'00:00');

   $sat += strtotime($projecthours->sat_duration??'00:00');





   $totaltaskhour = 0;

   $time_arr =  array($projecthours->mon_duration??'00:00',$projecthours->tue_duration??'00:00',$projecthours->wed_duration??'00:00',$projecthours->thu_duration??'00:00',$projecthours->fri_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $totaltaskhour +=explode_time($time_val);

   }

   

   }



   

   $userprojects->sun =  date('H:i', $sun);

   $userprojects->mon =  date('H:i', $mon);

   $userprojects->tue =  date('H:i', $tue);

   $userprojects->wed =  date('H:i', $wed);

   $userprojects->thu =  date('H:i', $thu);

   $userprojects->fri =  date('H:i', $fri);

   $userprojects->sat =  date('H:i', $sat);

   $sun = 0;

   $mon = 0;

   $tue = 0;

   $wed = 0;

   $thu = 0;

   $fri = 0;

   $sat = 0;



   $usarassignhour->assigntotaltaskhour = second_to_hhmm($totaltaskhour??'00:00');



   }

   $usersun = 0;

   $usermon= 0;

   $usertue = 0;

   $userwed = 0;

   $userthu = 0;

   $userfri = 0;

   $usersat = 0;

   $projecthour = DB::table('tm_emp_timesheets')->where('project_id',$userprojects->project_id)->where('emp_id',$userprojects->emp_id)->where('ts_week',$currentweekCountPassed)->where('ts_month',$month)->where('ts_year',$findYear)->get();

   // dd($projecthour);

   if(!empty($projecthour)){

   foreach($projecthour as $projecthours){

   $usersun += strtotime($projecthours->sun_duration??'00:00');

   $usermon += strtotime($projecthours->mon_duration??'00:00');

   $usertue += strtotime($projecthours->tue_duration??'00:00');

   $userwed += strtotime($projecthours->wed_duration??'00:00');

   $userthu += strtotime($projecthours->thu_duration??'00:00');

   $userfri += strtotime($projecthours->fri_duration??'00:00');

   $usersat += strtotime($projecthours->sat_duration??'00:00');

   //$totaltaskhour = 0;

   $time_arr =  array($projecthours->mon_duration??'00:00',$projecthours->tue_duration??'00:00',$projecthours->wed_duration??'00:00',$projecthours->thu_duration??'00:00',$projecthours->fri_duration??'00:00');

   foreach ($time_arr as $time_val) {

   $totaltaskhour +=explode_time($time_val);

   }

   }

   //$alltotalhour +=$totaltaskhour;

   $userprojects->usersun =  date('H:i', $usersun);

   $userprojects->usermon =  date('H:i', $usermon);

   $userprojects->usertue =  date('H:i', $usertue);

   $userprojects->userwed =  date('H:i', $userwed);

   $userprojects->userthu =  date('H:i', $userthu);

   $userprojects->userfri =  date('H:i', $userfri);

   $userprojects->usersat =  date('H:i', $usersat);

   $alltotalhour += $usermon +$usertue + $userwed + $userthu +$userfri;

   $userprojects->usertotaltime =  date('H:i', $usermon +$usertue + $userwed + $userthu +$userfri);

   }

   }

   //$allhour = !empty(second_to_hhmm($alltotalhour))?second_to_hhmm($alltotalhour):'00:00';

   $allhour =  second_to_hhmm($all_hour_in_user??'00:00');

   $allmon =  second_to_hhmm($all_hour_in_mon??'00:00');

   $alltue =  second_to_hhmm($all_hour_in_tue??'00:00');

   $allwed =  second_to_hhmm($all_hour_in_wed??'00:00');

   $allthu =  second_to_hhmm($all_hour_in_thu??'00:00');

   $allfri =  second_to_hhmm($all_hour_in_fri??'00:00');

   $userenterhourNote = DB::table('tm_emp_ts_notes')->where('emp_id',$userId)->where('ts_month',(int)date('m',strtotime($daterange[6])))->where('ts_year',date('Y',strtotime($daterange[0])))->where('ts_week',$currentweekCountPassed)->orderBy('id','DESC')->first();

   $noteweek = [];

   $noteweek[] = $userenterhourNote->sun_note??'';

   $noteweek[] = $userenterhourNote->mon_note??'';

   $noteweek[] = $userenterhourNote->tue_note??'';

   $noteweek[] = $userenterhourNote->wed_note??'';

   $noteweek[] = $userenterhourNote->thu_note??'';

   $noteweek[] = $userenterhourNote->fri_note??'';

   $noteweek[] = $userenterhourNote->sat_note??'';

  // dd($projectlist);

   $tm_status = DB::table('tm_ts_status')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekCountPassed)->orderBy('id','DESC')->first();



  // dd( $tm_status);

   

   return view('projects.view_emp_timesheet',['projectlist' => $projectlist,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'noteweekly' => $userenterhourNote,'tm_emp_status' => $tm_status,'allhour' => $allhour,'allmon'=>$allmon,'alltue' => $alltue,'allwed' => $allwed,'allthu' => $allthu,'allfri' => $allfri,'paginationDate' =>$paginationDate ,'noteList' => $noteweek,'weeknote' => $userenterhourNote,'everyMonth' => $findMonth,'userdetails' => $getuserdetails]);





}



public function indiviable_Statua(Request $request){



    

   if($request->status == 1){

      $status = 'approved';

      }else{

      $status = 'enabled';

      }



       $applyDate = date('D',strtotime($request->applyDate));





        if($applyDate == 'Mon'){



         $statusArr = [

            'mon_project_status' => $status,

            'mon_status' => $status,

            'week_status' => $status,

            'modified' => date('Y-m-d H:i:s'),

 

         ];





      }else if($applyDate == 'Tue'){



         $statusArr = [

            'tue_project_status' => $status,

            'tue_status' => $status,

            'week_status' => $status,

            'modified' => date('Y-m-d H:i:s'),

 

         ];



      }else if($applyDate == 'Wed'){



         $statusArr = [



            'wed_project_status' => $status,

            'wed_status' => $status,

            'week_status' => $status,

         'modified' => date('Y-m-d H:i:s'),

         ];



      }else if($applyDate == 'Thu'){



         $statusArr = [



            'thu_project_status' => $status,

            'thu_status' => $status,

            'week_status' => $status,

            'modified' => date('Y-m-d H:i:s'),

 

         ];



      }else if($applyDate == 'Fri'){



         $statusArr = [



            'fri_project_status' => $status,

         'fri_status' => $status,

         'week_status' => $status,

         'modified' => date('Y-m-d H:i:s'),

         ];



      }



     



      $update = DB::table('tm_ts_status')->where('id',$request->status_id)->where('ts_week',$request->week)->update( $statusArr );

      if($update){

      return response()->json(['status' => 200, 'msg' => 'successfully']);

      }else{

      return response()->json(['status' => 201, 'msg' => 'Not successfully']);

      }

}





public function user_timesheet($monthYear='',$currentweek='',$totalweek='',$time=''){

$sun = '';

$mon = '';

$tue = '';

$wed = '';

$thu = '';

$fri = '';
$sat = '';

$userId = Auth::guard('main_users')->user()->id??0;

if(isset($currentweek) && !empty($currentweek)){

$currentweekCount = $this->weekOfMonth();

$currentweekCountPassed = $currentweek;

}else{

$currentweekCount = $this->weekOfMonth();

$currentweekCountPassed = $this->weekOfMonth();

}

if(isset($monthYear) && !empty($monthYear)){

$findMonth = date('M',strtotime($monthYear));

$findYear = date('Y',strtotime($monthYear));

$month = date('m',strtotime($monthYear));

$paginationDate = date('Y-m',strtotime($monthYear));

$currentweekcount = $currentweek ;

$finddate =  date('Y-m-d',strtotime('+'.$currentweekcount.'week sunday '.$findMonth.' '.$findYear));



$daterange = $this->rangeWeek($finddate);

$firstDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[0])));

$lastDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[1])));

$daterange1 =  $this->createDateRangeArray($firstDate ,$lastDate);





$userassignprojectlist = array();

$assignproject = DB::table('tm_assign_emp_timesheets')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekcount)->groupBy('project_id')->get();

$userassignprojectlist[] = 30;

foreach ($assignproject as $key => $assignprojects) {

	$userassignprojectlist[] = $assignprojects->project_id;

	

}



}else{



$finddate = date('Y-m-d',strtotime('last sunday'));

$findMonth = date('M',strtotime($finddate));

$findYear = date('Y',strtotime($finddate));

$month = date('m',strtotime($finddate));

$paginationDate = date('Y-m',strtotime($finddate));

$currentweekcount = $this->weekOfMonth();





$daterange =   $this->x_week_range($finddate);

list($firstDate,$lastDate) = $daterange;

$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);



}





$daterange =  $daterange1;

$alltotalhour = 0;







$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));

$all_hour_in_user = 0;

$all_hour_in_sun = 0;

$all_hour_in_mon = 0;

$all_hour_in_tue = 0;

$all_hour_in_wed = 0;

$all_hour_in_thu = 0;

$all_hour_in_fri = 0;

$all_hour_in_sat = 0;

$user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();

// dd($user_project_hour);       

if(isset($user_project_hour) && !empty($user_project_hour)){

foreach($user_project_hour as $duration){

$time_arr =  array($duration->week_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_user +=explode_time($time_val);

} 

$time_arr =  array($duration->sun_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_sun +=explode_time($time_val);

} 

$time_arr =  array($duration->mon_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_mon +=explode_time($time_val);

} 

$time_arr =  array($duration->tue_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_tue +=explode_time($time_val);

} 

$time_arr =  array($duration->wed_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_wed +=explode_time($time_val);

} 

$time_arr =  array($duration->thu_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_thu +=explode_time($time_val);

} 

$time_arr =  array($duration->fri_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_fri +=explode_time($time_val);

} 
$time_arr =  array($duration->sat_duration??'00:00');

foreach ($time_arr as $time_val) {

$all_hour_in_sat +=explode_time($time_val);

} 

}

}

$tasknotfound = [];

$hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->where('tm_projects.project_status','in-progress')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();



if(isset($hideprojectlist)){

foreach($hideprojectlist as $hideprojectlists){

$tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$hideprojectlists->emp_id)->select('tm_project_tasks.*','tm_tasks.task')->first();

if(empty($tasklist)){

$tasknotfound[] = $hideprojectlists->project_id;

}

}

}



$projectlist = DB::table('tm_project_employees')->leftjoin('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->leftjoin('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->whereNotIn('tm_project_employees.project_id',$tasknotfound);



if(isset($userassignprojectlist) && !empty($userassignprojectlist) && $currentweekcount < $this->weekOfMonth() && $month <= date('m')){



	$projectlist->whereIn('tm_project_employees.project_id', $userassignprojectlist);



}else{



	$projectlist->where('tm_projects.project_status','in-progress');



}





$projectlist = $projectlist->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();





if(isset($projectlist) && !empty($projectlist)){

foreach($projectlist as $projectlista){

$totaltaskhour = 0;

$total_sun = 0;

$total_mon = 0;

$total_tue = 0;

$total_wed = 0;

$total_thu = 0;

$total_fri = 0;

$total_sat = 0;

$urerhour = DB::table('tm_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

foreach($urerhour as $urerhours)  {  


$time_arr =  array($urerhours->sun_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_sun +=explode_time($time_val);

}             

$time_arr =  array($urerhours->mon_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_mon +=explode_time($time_val);

} 

$time_arr =  array($urerhours->tue_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_tue +=explode_time($time_val);

} 

$time_arr =  array($urerhours->wed_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_wed +=explode_time($time_val);

} 

$time_arr =  array($urerhours->thu_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_thu +=explode_time($time_val);

} 

$time_arr =  array($urerhours->fri_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_fri +=explode_time($time_val);

} 

$time_arr =  array($urerhours->sat_duration??'00:00');

foreach ($time_arr as $time_val) {

$total_sat +=explode_time($time_val);

} 

$time_arr =  array($urerhours->week_duration??'00:00');

foreach ($time_arr as $time_val) {

$totaltaskhour +=explode_time($time_val);

}

}

$projectlista->userhour = second_to_hhmm($totaltaskhour??'00:00');

$projectlista->user_hour_sun = second_to_hhmm($total_sun??'00:00');

$projectlista->user_hour_mon = second_to_hhmm($total_mon??'00:00');

$projectlista->user_hour_tue = second_to_hhmm($total_tue??'00:00');

$projectlista->user_hour_wed = second_to_hhmm($total_wed??'00:00');

$projectlista->user_hour_thu = second_to_hhmm($total_thu??'00:00');

$projectlista->user_hour_fri = second_to_hhmm($total_fri??'00:00');

$projectlista->user_hour_sat = second_to_hhmm($total_fri??'00:00');

$assign_totaltaskhour = 0;

$assign_total_sun = 0;

$assign_total_mon = 0;

$assign_total_tue = 0;

$assign_total_wed = 0;

$assign_total_thu = 0;

$assign_total_fri = 0;

$assign_total_sat = 0;

// $urerhour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();

// foreach($urerhour as $urerhours)  {              

// $time_arr =  array($urerhours->mon_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $assign_total_mon +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->tue_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $assign_total_tue +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->wed_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $assign_total_wed +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->thu_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $assign_total_thu +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->fri_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $assign_total_fri +=explode_time($time_val);

// } 

// $time_arr =  array($urerhours->week_duration??'00:00');

// foreach ($time_arr as $time_val) {

// $assign_totaltaskhour +=explode_time($time_val);

// }

// }

// //dd($total_fri);

// $projectlista->assign_userhour = second_to_hhmm($assign_totaltaskhour??'00:00');

// $projectlista->assign_hour_mon = second_to_hhmm($assign_total_mon??'00:00');

// $projectlista->assign_hour_tue = second_to_hhmm($assign_total_tue??'00:00');

// $projectlista->assign_hour_wed = second_to_hhmm($assign_total_wed??'00:00');

// $projectlista->assign_hour_thu = second_to_hhmm($assign_total_thu??'00:00');

// $projectlista->assign_hour_fri = second_to_hhmm($assign_total_fri??'00:00');

$projectlista->tasklist = DB::table('tm_project_task_employees')->join('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$projectlista->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->get();

if(isset($projectlista->tasklist) && !empty($projectlista->tasklist)){

foreach($projectlista->tasklist as $usarassignhour){

// $durationall = DB::table('tm_assign_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_task_id',$usarassignhour->id)->where('project_id',$usarassignhour->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();

// if(isset($durationall) && !empty($durationall)){

// foreach($durationall as $duration){

// $sun = strtotime($duration->sun_duration??'00:00');

// $mon = strtotime($duration->mon_duration??'00:00');

// $tue = strtotime($duration->tue_duration??'00:00');

// $wed = strtotime($duration->wed_duration??'00:00');

// $thu = strtotime($duration->thu_duration??'00:00');

// $fri = strtotime($duration->fri_duration??'00:00');

// $sat = strtotime($duration->sat_duration??'00:00');

// $usarassignhour->assintime[] =  date('H:i', $sun);

// $usarassignhour->assintime[] =  date('H:i', $mon);

// $usarassignhour->assintime[] =  date('H:i', $tue);

// $usarassignhour->assintime[] =  date('H:i', $wed);

// $usarassignhour->assintime[] =  date('H:i', $thu);

// $usarassignhour->assintime[] =  date('H:i', $fri);

// $usarassignhour->assintime[] =  date('H:i', $sat);

// }

// }

$tm_status = DB::table('tm_ts_status')->where('emp_id',$projectlista->emp_id)->where('project_id',$usarassignhour->project_id)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekCountPassed)->get();

if(isset($tm_status) && !empty($tm_status)){

foreach($tm_status as $tm_statuss){

$weekstaus = $tm_statuss->week_status;

$usarassignhour->week_status =  $weekstaus;

}

}

$totaltaskhour = 0;

$userenterhour = DB::table('tm_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_task_id',$usarassignhour->id)->where('project_id',$usarassignhour->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();

//dd($userenterhour);

if(isset($userenterhour) && !empty($userenterhour)){

foreach($userenterhour as $userenterhours){

$usarassignhour->duration[] = $userenterhours->sun_duration??'00:00';

$usarassignhour->duration[] = $userenterhours->mon_duration??'00:00';

$usarassignhour->duration[] =  $userenterhours->tue_duration??'00:00';

$usarassignhour->duration[] =  $userenterhours->wed_duration??'00:00';

$usarassignhour->duration[] =  $userenterhours->thu_duration??'00:00';

$usarassignhour->duration[] =  $userenterhours->fri_duration??'00:00';

$usarassignhour->duration[] =  $userenterhours->sat_duration??'00:00';

$totaltaskhour = 0;

$time_arr =  array($userenterhours->sun_duration??'00:00',$userenterhours->mon_duration??'00:00',$userenterhours->tue_duration??'00:00',$userenterhours->wed_duration??'00:00',$userenterhours->thu_duration??'00:00',$userenterhours->fri_duration??'00:00');

foreach ($time_arr as $time_val) {

$totaltaskhour +=explode_time($time_val);

}

} 

$usarassignhour->totaltaskhour = second_to_hhmm($totaltaskhour??'00:00');

// $totaltaskhour += $totaltaskhour;

}

}

}

}

}

// dd($projectlist);

$sun = 0;

$mon = 0;

$tue = 0;

$wed = 0;

$thu = 0;

$fri = 0;

$sat = 0;

foreach($projectlist as $userprojects){

// $projecthour = DB::table('tm_assign_emp_timesheets')->where('project_id',$userprojects->project_id)->where('emp_id',$userprojects->emp_id)->where('ts_week',$currentweekCountPassed)->where('ts_month',$month)->where('ts_year',$findYear)->get();

// if(!empty($projecthour)){

// foreach($projecthour as $projecthours){

// $sun += strtotime($projecthours->sun_duration??'00:00');

// $mon += strtotime($projecthours->mon_duration??'00:00');

// $tue += strtotime($projecthours->tue_duration??'00:00');

// $wed += strtotime($projecthours->wed_duration??'00:00');

// $thu += strtotime($projecthours->thu_duration??'00:00');

// $fri += strtotime($projecthours->fri_duration??'00:00');

// $sat += strtotime($projecthours->sat_duration??'00:00');

// }

// $userprojects->sun =  date('H:i', $sun);

// $userprojects->mon =  date('H:i', $mon);

// $userprojects->tue =  date('H:i', $tue);

// $userprojects->wed =  date('H:i', $wed);

// $userprojects->thu =  date('H:i', $thu);

// $userprojects->fri =  date('H:i', $fri);

// $userprojects->sat =  date('H:i', $sat);

// $sun = 0;

// $mon = 0;

// $tue = 0;

// $wed = 0;

// $thu = 0;

// $fri = 0;

// $sat = 0;

// }

$usersun = 0;

$usermon= 0;

$usertue = 0;

$userwed = 0;

$userthu = 0;

$userfri = 0;

$usersat = 0;

$projecthour = DB::table('tm_emp_timesheets')->where('project_id',$userprojects->project_id)->where('emp_id',$userprojects->emp_id)->where('ts_week',$currentweekCountPassed)->where('ts_month',$month)->where('ts_year',$findYear)->get();

// dd($projecthour);

if(!empty($projecthour)){

foreach($projecthour as $projecthours){

$usersun += strtotime($projecthours->sun_duration??'00:00');

$usermon += strtotime($projecthours->mon_duration??'00:00');

$usertue += strtotime($projecthours->tue_duration??'00:00');

$userwed += strtotime($projecthours->wed_duration??'00:00');

$userthu += strtotime($projecthours->thu_duration??'00:00');

$userfri += strtotime($projecthours->fri_duration??'00:00');

$usersat += strtotime($projecthours->sat_duration??'00:00');

//$totaltaskhour = 0;

$time_arr =  array($projecthours->sun_duration??'00:00',$projecthours->mon_duration??'00:00',$projecthours->tue_duration??'00:00',$projecthours->wed_duration??'00:00',$projecthours->thu_duration??'00:00',$projecthours->fri_duration??'00:00');

foreach ($time_arr as $time_val) {

$totaltaskhour +=explode_time($time_val);

}

}

//$alltotalhour +=$totaltaskhour;

$userprojects->usersun =  date('H:i', $usersun);

$userprojects->usermon =  date('H:i', $usermon);

$userprojects->usertue =  date('H:i', $usertue);

$userprojects->userwed =  date('H:i', $userwed);

$userprojects->userthu =  date('H:i', $userthu);

$userprojects->userfri =  date('H:i', $userfri);

$userprojects->usersat =  date('H:i', $usersat);

$alltotalhour += $usersun + $usermon +$usertue + $userwed + $userthu +$userfri +$usersat;

$userprojects->usertotaltime =  date('H:i', $usersun + $usermon +$usertue + $userwed + $userthu +$userfri +$usersat);

}

}

//$allhour = !empty(second_to_hhmm($alltotalhour))?second_to_hhmm($alltotalhour):'00:00';

$allhour =  second_to_hhmm($all_hour_in_user??'00:00');

$allsun =  second_to_hhmm($all_hour_in_sun??'00:00');

$allmon =  second_to_hhmm($all_hour_in_mon??'00:00');

$alltue =  second_to_hhmm($all_hour_in_tue??'00:00');

$allwed =  second_to_hhmm($all_hour_in_wed??'00:00');

$allthu =  second_to_hhmm($all_hour_in_thu??'00:00');

$allfri =  second_to_hhmm($all_hour_in_fri??'00:00');

$allsat =  second_to_hhmm($all_hour_in_sat??'00:00');

$userenterhourNote = DB::table('tm_emp_ts_notes')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekCountPassed)->orderBy('id','DESC')->first();

$noteweek = [];

$noteweek[] = $userenterhourNote->sun_note??'';

$noteweek[] = $userenterhourNote->mon_note??'';

$noteweek[] = $userenterhourNote->tue_note??'';

$noteweek[] = $userenterhourNote->wed_note??'';

$noteweek[] = $userenterhourNote->thu_note??'';

$noteweek[] = $userenterhourNote->fri_note??'';

$noteweek[] = $userenterhourNote->sat_note??'';



$tm_status = DB::table('tm_ts_status')->where('emp_id',$userId)->where('ts_month',$month)->where('ts_year',$findYear)->where('ts_week',$currentweekCountPassed)->first();



return view('projects.usertimesheet',['projectlist' => $projectlist,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'noteweekly' => $userenterhourNote,'tm_status' => $tm_status,'allhour' => $allhour,'allsun'=>$allsun,'allmon'=>$allmon,'alltue' => $alltue,'allwed' => $allwed,'allthu' => $allthu,'allfri' => $allfri,'allsat' => $allsat,'paginationDate' =>$paginationDate ,'noteList' => $noteweek,'weeknote' => $userenterhourNote,'everyMonth' => $findMonth]);

}

function getSundays($y,$m){ 

$date = "$y-$m-01";

$first_day = date('N',strtotime($date));

$first_day = 7 - $first_day + 1;

$last_day =  date('t',strtotime($date));

$days = array();

for($i=$first_day; $i<=$last_day; $i=$i+7 ){

$days[] = $i;

}

return  $days;

}





function x_week_range($date) {

    $ts = strtotime($date);

    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);

    return array(date('Y-m-d', $start),

                 date('Y-m-d', strtotime('next saturday', $start)));

}









function getFullWeeksOfMonth($iYear, $iMonth, $sFirstDayOfWeek = 'Sunday', $bExclusive = true)

{

$iYear           = filter_var($iYear, FILTER_VALIDATE_INT, array(

'options' => array(

'default' => (int) date('Y')

)

));

$iMonth          = filter_var($iMonth, FILTER_VALIDATE_REGEXP, array(

'options' => array(

'default' => (int) date('m'),

'regexp' => '/^([1-9]|1[012])$/'

)

));

$aDay            = array(

'monday' => 1,

'sunday' => 1

);

$sFirstDayOfWeek = filter_var($sFirstDayOfWeek, FILTER_VALIDATE_REGEXP, array(

'options' => array(

'default' => 'sunday', //Set default week

'regexp' => '/^monday|sunday$/'

)

));

$bExclusive      = filter_var($bExclusive, FILTER_VALIDATE_BOOLEAN);

$oStart          = new DateTime($iYear . '-' . $iMonth . '-01');

if ($bExclusive === true || ($bExclusive === false && isset($aDay[strtolower($oStart->format('l'))]))) {

if ((int) $oStart->format('d') === 1) {

$oStart->modify('-1 day');

}

$oStart->modify('first ' . $sFirstDayOfWeek . ' ' . $oStart->format('H:i'));

} else {

$oStart->modify('last ' . $sFirstDayOfWeek . ' ' . $oStart->format('H:i'));

}

$oEnd = clone ($oStart);

if ((int) $oStart->format('m') === $iMonth) {

$oEnd->modify('last day of this month');

} else {

$oEnd->modify('last day of next month');

}

$oInterval  = new DateInterval('P1W7D');

$oDaterange = new DatePeriod($oStart, $oInterval, $oEnd);

$aDate = array();

$i     = 1;

foreach ($oDaterange as $oDate) {

$oTestDate    = clone $oDate;

$oLastWeekDay = $oTestDate->modify('+6 days');

if (((int) $oDate->format('m') === (int) $iMonth || (int) $oLastWeekDay->format('m') === (int) $iMonth) && (($bExclusive === true && (int) $oLastWeekDay->format('m') === (int) $iMonth) || ($bExclusive === false))) {

$aDate[$i]['First'] = $oDate->format('Y-m-d');

$aDate[$i]['Last']  = $oLastWeekDay->format('Y-m-d');

}

$i++;

}

return $aDate;

}

function enter_fill_user_project(Request $request){



$userId = Auth::guard('main_users')->user()->id??0;

foreach($request->project_id as  $project){

$week_duration = 0;

foreach($request->project_taskId[$project] as $key => $projecttask){

// = dd($request->entrydate[$project][$projecttask][0]);

//  $week_duration += strtotime($request->entryhour[$project][$projecttask][0]) + strtotime($request->entryhour[$project][$projecttask][1]) + strtotime($request->entryhour[$project][$projecttask][2]) + strtotime($request->entryhour[$project][$projecttask][3]) + strtotime($request->entryhour[$project][$projecttask][4]) + strtotime($request->entryhour[$project][$projecttask][5]) + strtotime($request->entryhour[$project][$projecttask][6]);

$totaltaskhour = 0;

$time_arr =  array($request->entryhour[$project][$projecttask][0],$request->entryhour[$project][$projecttask][1],$request->entryhour[$project][$projecttask][2],$request->entryhour[$project][$projecttask][3],$request->entryhour[$project][$projecttask][4],$request->entryhour[$project][$projecttask][5],$request->entryhour[$project][$projecttask][6]);

foreach ($time_arr as $time_val) {

$totaltaskhour +=explode_time($time_val);

}

$arra = array(

'emp_id' => $request->emp_id,

'project_task_id' => $projecttask,

'project_id' => $project,

// 'from_date' => $request->stime,

// 'to_date' => $request->etime,

'ts_year' => date('Y',strtotime($request->entrydate[$project][$projecttask][0])),

'ts_month' => date('m',strtotime($request->entrydate[$project][$projecttask][0])),

'ts_week' => $request->currentweek,

'sun_date' => $request->entrydate[$project][$projecttask][0],

'sun_duration' => $request->entryhour[$project][$projecttask][0],

'mon_date' => $request->entrydate[$project][$projecttask][1],

'mon_duration' => $request->entryhour[$project][$projecttask][1],

'tue_date' => $request->entrydate[$project][$projecttask][2],

'tue_duration' => $request->entryhour[$project][$projecttask][2],

'wed_date' => $request->entrydate[$project][$projecttask][3],

'wed_duration' => $request->entryhour[$project][$projecttask][3],

'thu_date' => $request->entrydate[$project][$projecttask][4],

'thu_duration' => $request->entryhour[$project][$projecttask][4],

'fri_date' => $request->entrydate[$project][$projecttask][5],

'fri_duration' => $request->entryhour[$project][$projecttask][5],

'sat_date' => $request->entrydate[$project][$projecttask][6],

'sat_duration' => $request->entryhour[$project][$projecttask][6],

'week_duration' => second_to_hhmm($totaltaskhour??'00:00'),

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:i:s'),

'modified' => date('Y-m-d H:i:s'),

);

// dd($arra);

$count = DB::table('tm_emp_timesheets')->where('emp_id',$request->emp_id)->where('project_task_id',$projecttask)->where('project_id',$project)->where('ts_year',date('Y',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_month',date('m',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_week',$request->currentweek)->count();

if($count > 0){

$inst = DB::table('tm_emp_timesheets')->where('emp_id',$request->emp_id)->where('project_task_id',$projecttask)->where('project_id',$project)->where('ts_year',date('Y',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_month',date('m',strtotime($request->entrydate[$project][$projecttask][0])))->where('ts_week',$request->currentweek)->update($arra);

}else{

$inst = DB::table('tm_emp_timesheets')->insert($arra);

}

}

$week_duration = 0;

}

if($inst){

$Notearr = array(

'emp_id' => $request->emp_id,

'ts_year' => date('Y',strtotime($request->stime)),

'ts_month' => date('m',strtotime($request->stime)),

'ts_week' => $request->currentweek,

'sun_date' => $request->noteDate[0],

'sun_note' => $request->DailyNote[0],

'mon_date' => $request->noteDate[1],

'mon_note' => $request->DailyNote[1],

'tue_date' => $request->noteDate[2],

'tue_note' => $request->DailyNote[2],

'wed_date' => $request->noteDate[3],

'wed_note' => $request->DailyNote[3],

'thu_date' => $request->noteDate[4],

'thu_note' => $request->DailyNote[4],

'fri_date' => $request->noteDate[5],

'fri_note' => $request->DailyNote[5],

'sat_date' => $request->noteDate[6],

'sat_note' => $request->DailyNote[6],

'week_note' => $request->weeknotes,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:i:s'),

'modified' => date('Y-m-d H:i:s'),

);

$counttemp = DB::table('tm_emp_ts_notes')->where('emp_id',$request->emp_id)->where('ts_year',date('Y',strtotime($request->stime)))->where('ts_month',date('M',strtotime($request->stime)))->where('ts_week',$request->currentweek)->count();

if($counttemp > 0){

$inst = DB::table('tm_emp_ts_notes')->where('emp_id',$request->emp_id)->where('ts_year',date('Y',strtotime($request->stime)))->where('ts_month',date('M',strtotime($request->stime)))->where('ts_week',$request->currentweek)->update($Notearr);

}else{

$inst = DB::table('tm_emp_ts_notes')->insert($Notearr);

}

//   $getname = DB::table('main_users')->where('id',$request->emp_id)->select('userfullname')->first();

//   foreach($request->project_id as  $project){

//   foreach($request->project_taskId as $key => $projecttask){

//       foreach($request->entrydate[$projecttask] as $enty => $entrydate){

//           $arry = array(

//               'emp_id' =>$request->emp_id,

//                'emp_name' =>$getname->userfullname,

//                 'project_task_id' =>$projecttask,

//                  'project_id' =>$project,

//                   'timesheet_date' =>$entrydate,

//                    'day_name' =>date('D',strtotime($entrydate)),

//                     'time_duration' =>$request->entryhour[$projecttask][$enty],

//                      'create_by' =>$userId,

//                       'status' =>1,

//                       'updated_date' =>date('Y-m-d H:i:s'),

//               );

//               $counttemp = DB::table('tm_temp_timesheet')->where('emp_id',$request->emp_id)->where('project_task_id',$projecttask)->where('timesheet_date',$entrydate)->count();

//               if($counttemp > 0){

//                 $inst = DB::table('tm_temp_timesheet')->where('emp_id',$request->emp_id)->where('project_task_id',$projecttask)->where('timesheet_date',$entrydate)->update($arry);

//               }else{

//                    $inst = DB::table('tm_temp_timesheet')->insert($arry);

//               }

//       }

//   }

//   }

if($request->submitvalue == 1){

$timeStatus['emp_id'] = $request->emp_id;

$timeStatus['ts_year'] = date('Y',strtotime($request->stime));

$timeStatus['ts_month'] = date('m',strtotime($request->stime));

$timeStatus['ts_week'] = $request->currentweek;

$timeStatus['sun_date'] = $request->noteDate[0];

$timeStatus['sun_project_status'] = $request->noteDate[0];

$timeStatus['sun_status'] ='saved';

$timeStatus['sun_status_date'] = date('Y-m-d H:i:s');

if($request->noteDate[1] == date('Y-m-d')){

$timeStatus['mon_date'] = $request->noteDate[1];

$timeStatus['mon_project_status'] = 'saved';

$timeStatus[ 'mon_status'] = 'saved';

$timeStatus['mon_status_date'] = date('Y-m-d H:i:s');

}

if($request->noteDate[2] == date('Y-m-d')){

$timeStatus['mon_date'] = $request->noteDate[1];

$timeStatus['mon_project_status'] = 'saved';

$timeStatus[ 'mon_status'] = 'saved';

$timeStatus['mon_status_date'] = date('Y-m-d H:i:s');

$timeStatus['tue_date'] = $request->noteDate[2];

$timeStatus['tue_project_status'] = 'saved';

$timeStatus['tue_status'] ='saved';

$timeStatus['tue_status_date'] = date('Y-m-d H:i:s');

}

if($request->noteDate[3] == date('Y-m-d')){

$timeStatus['mon_date'] = $request->noteDate[1];

$timeStatus['mon_project_status'] = 'saved';

$timeStatus[ 'mon_status'] = 'saved';

$timeStatus['mon_status_date'] = date('Y-m-d H:i:s');

$timeStatus['tue_date'] = $request->noteDate[2];

$timeStatus['tue_project_status'] = 'saved';

$timeStatus['tue_status'] ='saved';

$timeStatus['tue_status_date'] = date('Y-m-d H:i:s');

$timeStatus['wed_date'] = $request->noteDate[3];

$timeStatus['wed_project_status'] = 'saved';

$timeStatus['wed_status'] ='saved';

$timeStatus['wed_status_date'] = date('Y-m-d H:i:s');

}

if($request->noteDate[4] == date('Y-m-d')){

$timeStatus['mon_date'] = $request->noteDate[1];

$timeStatus['mon_project_status'] = 'saved';

$timeStatus[ 'mon_status'] = 'saved';

$timeStatus['mon_status_date'] = date('Y-m-d H:i:s');

$timeStatus['tue_date'] = $request->noteDate[2];

$timeStatus['tue_project_status'] = 'saved';

$timeStatus['tue_status'] ='saved';

$timeStatus['tue_status_date'] = date('Y-m-d H:i:s');

$timeStatus['wed_date'] = $request->noteDate[3];

$timeStatus['wed_project_status'] = 'saved';

$timeStatus['wed_status'] ='saved';

$timeStatus['wed_status_date'] = date('Y-m-d H:i:s');        

$timeStatus['thu_date'] = $request->noteDate[4];

$timeStatus['thu_project_status'] = 'saved';

$timeStatus['thu_status'] ='saved';

$timeStatus['thu_status_date'] = date('Y-m-d H:i:s');

}

if($request->noteDate[5] == date('Y-m-d')){

$timeStatus['mon_date'] = $request->noteDate[1];

$timeStatus['mon_project_status'] = 'saved';

$timeStatus[ 'mon_status'] = 'saved';

$timeStatus['mon_status_date'] = date('Y-m-d H:i:s');

$timeStatus['tue_date'] = $request->noteDate[2];

$timeStatus['tue_project_status'] = 'saved';

$timeStatus['tue_status'] ='saved';

$timeStatus['tue_status_date'] = date('Y-m-d H:i:s');

$timeStatus['wed_date'] = $request->noteDate[3];

$timeStatus['wed_project_status'] = 'saved';

$timeStatus['wed_status'] ='saved';

$timeStatus['wed_status_date'] = date('Y-m-d H:i:s');        

$timeStatus['thu_date'] = $request->noteDate[4];

$timeStatus['thu_project_status'] = 'saved';

$timeStatus['thu_status'] ='saved';

$timeStatus['thu_status_date'] = date('Y-m-d H:i:s');

$timeStatus['fri_date'] = $request->noteDate[5];

$timeStatus['fri_project_status'] = 'saved';

$timeStatus['fri_status'] ='saved';

$timeStatus['fri_status_date'] = date('Y-m-d H:i:s');



}else{



$timeStatus['mon_date'] = $request->noteDate[1];

$timeStatus['mon_project_status'] = 'saved';

$timeStatus[ 'mon_status'] = 'saved';

$timeStatus['mon_status_date'] = date('Y-m-d H:i:s');

$timeStatus['tue_date'] = $request->noteDate[2];

$timeStatus['tue_project_status'] = 'saved';

$timeStatus['tue_status'] ='saved';

$timeStatus['tue_status_date'] = date('Y-m-d H:i:s');

$timeStatus['wed_date'] = $request->noteDate[3];

$timeStatus['wed_project_status'] = 'saved';

$timeStatus['wed_status'] ='saved';

$timeStatus['wed_status_date'] = date('Y-m-d H:i:s');        

$timeStatus['thu_date'] = $request->noteDate[4];

$timeStatus['thu_project_status'] = 'saved';

$timeStatus['thu_status'] ='saved';

$timeStatus['thu_status_date'] = date('Y-m-d H:i:s');

$timeStatus['fri_date'] = $request->noteDate[5];

$timeStatus['fri_project_status'] = 'saved';

$timeStatus['fri_status'] ='saved';

$timeStatus['fri_status_date'] = date('Y-m-d H:i:s');





}

$timeStatus['sat_date'] = $request->noteDate[6];

$timeStatus['sat_project_status'] = 'saved';

$timeStatus['sat_status'] ='saved';

$timeStatus['sat_status_date'] = date('Y-m-d H:i:s');

$timeStatus['week_status'] = 'saved';

$timeStatus['created_by'] = $userId;

$timeStatus['modified_by'] = $userId;

$timeStatus['is_active'] = 1;

$timeStatus['created'] = date('Y-m-d H:i:s');

$timeStatus['modified'] = date('Y-m-d H:i:s');

}

if($request->submitvalue == 2){

$submit = 'submitted';

$timeStatus = array(

'emp_id' => $request->emp_id,

'ts_year' => date('Y',strtotime($request->stime)),

'ts_month' => date('m',strtotime($request->stime)),

'ts_week' => $request->currentweek,

'sun_date' => $request->noteDate[0],

'sun_project_status' => $request->noteDate[0],

'sun_status' => $request->noteDate[0],

'sun_status_date' => date('Y-m-d H:i:s'),

'mon_date' => $request->noteDate[1],

'mon_project_status' => $submit,

'mon_status' =>$submit,

'mon_status_date' => date('Y-m-d H:i:s'),

'tue_date' => $request->noteDate[2],

'tue_project_status' => $submit,

'tue_status' =>$submit,

'tue_status_date' => date('Y-m-d H:i:s'),

'wed_date' => $request->noteDate[3],

'wed_project_status' => $submit,

'wed_status' =>$submit,

'wed_status_date' => date('Y-m-d H:i:s'),

'thu_date' => $request->noteDate[4],

'thu_project_status' => $submit,

'thu_status' =>$submit,

'thu_status_date' => date('Y-m-d H:i:s'),

'fri_date' => $request->noteDate[5],

'fri_project_status' => $submit,

'fri_status' =>$submit,

'fri_status_date' => date('Y-m-d H:i:s'),

'sat_date' => $request->noteDate[6],

'sat_project_status' => $request->noteDate[6],

'sat_status' => $request->noteDate[6],

'sat_status_date' => date('Y-m-d H:i:s'),

'week_status' => $submit,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:i:s'),

'modified' => date('Y-m-d H:i:s'),

);

}

$counttemp = DB::table('tm_ts_status')->where('emp_id',$request->emp_id)->where('ts_year',date('Y',strtotime($request->stime)))->where('ts_month',date('m',strtotime($request->stime)))->where('ts_week',$request->currentweek)->count();

if($counttemp > 0){

$inst = DB::table('tm_ts_status')->where('emp_id',$request->emp_id)->where('ts_year',date('Y',strtotime($request->stime)))->where('ts_month',date('m',strtotime($request->stime)))->where('ts_week',$request->currentweek)->update($timeStatus);

}else{

$inst = DB::table('tm_ts_status')->insert($timeStatus);

}

return response()->json(['status' => 200, 'msg' => 'Successfully Enter Hour']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully']);

}

}

public function emp_timesheet($monthYear='',$currentweek='',$totalweek='',$time=''){

if(isset($currentweek) && !empty($currentweek)){

$currentweekCount = $this->weekOfMonth();

$currentweekCountPassed = $currentweek;

}else{

$currentweekCount = $this->weekOfMonth();

$currentweekCountPassed = $this->weekOfMonth();

}

if(isset($monthYear) && !empty($monthYear)){

$findMonth = date('M',strtotime($monthYear));

$findYear = date('Y',strtotime($monthYear));

$month = date('m',strtotime($monthYear));

$paginationDate = date('Y-m',strtotime($monthYear));

$currentweekcount = $currentweek ;

$finddate =  date('Y-m-d',strtotime('+'.$currentweekcount.' week sun '.$findMonth.' '.$findYear));





$daterange = $this->rangeWeek($finddate);

$firstDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[0])));

$lastDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[1])));

$daterange1 =  $this->createDateRangeArray($firstDate ,$lastDate);



}else{





$finddate = date('Y-m-d',strtotime('last sunday'));

$findMonth = date('M',strtotime($finddate));

$findYear = date('Y',strtotime($finddate));

$month = date('m',strtotime($finddate));

$paginationDate = date('Y-m',strtotime($finddate));

$currentweekcount = $this->weekOfMonth() ;





$daterange =   $this->x_week_range($finddate);

list($firstDate,$lastDate) = $daterange;

$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);



}





$daterange =  $daterange1;

$alltotalhour = 0;

$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));



return view('projects.emptimesheet',['currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'daterange' => $daterange,'totalweekCount' => $totalweekCount,'PaginationDate' => $paginationDate,'everyMonth'=>  $findMonth]);

}

function get_week_timsheet(Request $request){



 $role = Auth::guard('main_users')->user()->emprole;



$assignuserid = [];

$getuseruser = DB::table('main_users');

if($role != 1){



	$getuseruser->where('reporting_manager',$request->curent_user);



}



 $getuseruser = $getuseruser->where('isactive',1)->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->select('id','userfullname')->get();







foreach($getuseruser as $getuserusers){

// $getprojecttask = DB::table('tm_project_task_employees')->where('emp_id',$getuserusers->id)->groupBy('emp_id')->select('emp_id')->get();

// if(isset($getprojecttask)){

// foreach($getprojecttask as $getprojecttasks){

// $assignuserid[] = $getprojecttasks->emp_id;

// }

// }



$assignuserid[] = $getuserusers->id;



}

$year = date('Y',strtotime($request->sweekdate));

$month = date('m',strtotime($request->sweekdate));

$assingetuseruser = DB::table('main_users')->whereIn('id',$assignuserid)->where('isactive',1)->select('id','userfullname','reporting_manager')->get();



if(isset($assingetuseruser) && !empty($assingetuseruser)){

foreach($assingetuseruser as $getuserusers){

$empsheet = DB::table('tm_emp_timesheets')->where('emp_id',$getuserusers->id)->whereBetween('sun_date', [$request->sweekdate, $request->eweekdate])->where('is_active',1)->select('week_duration','emp_id')->get();

// dd($empsheet);

$all_seconds=0;

if(!empty($empsheet) && isset($empsheet)){

foreach($empsheet as  $empsheets){

list($hour, $minute) = explode(':', $empsheets->week_duration??'00:00');

$h = (int)$hour;

$m  = (int)$minute;

$all_seconds += $h * 3600;

$all_seconds += $m * 60;

}

$total_minutes = floor($all_seconds/60);

$hours = floor($total_minutes / 60); 

$minutes = $total_minutes % 60;

$week_hour =  sprintf('%02d:%02d', $hours, $minutes);

$getuserusers->weekhour = $week_hour;

}

$empstatus = DB::table('tm_ts_status')->where('emp_id',$getuserusers->id)->where('ts_week',$request->cweek)->where('ts_year',$year)->where('ts_month', $month);

if($request->type != 'all'){

$empstatus->where('tm_ts_status.week_status',$request->type);

}

$empstatus = $empstatus->select('week_status','id')->first();

if(isset($empstatus) && !empty($empstatus)){

$getuserusers->weekstatus = $empstatus->week_status;

$getuserusers->weekstatus_id = $empstatus->id;

}

}

}

//dd($assingetuseruser);

$html = '';

if(count($assingetuseruser) == 0){

$html .='

<div class="alert alert-warning alert-dismissible fade show" role="alert">

   No Record Found

   <button type="button" class="close" data-dismiss="alert" aria-label="Close">

   <span aria-hidden="true">&times;</span>

   </button>

</div>

';

}







if(isset($assingetuseruser) && !empty($assingetuseruser)){

foreach($assingetuseruser as $get_statuss){

   $url = URL::to('view-emp-timesheet/'.$get_statuss->id);

$html .='

<div class="col-sm-3">

   <div class="card m-b-10 float-left width100 box-shadow">

      <div class="media p-l-5 p-r-5 p-t-5">

         <div class="media-body">

            <h6 class="mt-0 mb-0 font-16 text-info">

               '.$get_statuss->userfullname.'

            </h6>

            <div class="m-t-10 m-b-10">

               <table rules="rows" width="100%" class="emp_status">

                  <tbody>

                     ';

                     if(isset($get_statuss->weekstatus)){

                     $html .='

                     <tr>

                        <th>Status</th>

                        <td class="text-info">'.ucwords($get_statuss->weekstatus).'

                        </td>

                     </tr>

                     ';

                     }else{

                     $html .='

                     <tr>

                        <th>Status</th>

                        <td class="text-info">no_entry

                        </td>

                     </tr>

                     ';

                     }

                    $html .='<tr>

                                                                                            <th>Total Hrs</th>

                                                                                            <td class="text-dark">

                                                                                              '.$get_statuss->weekhour.'

                                                                                            </td>';

                                                                                            if(isset($get_statuss->weekstatus) && $get_statuss->weekstatus == 'submitted'){



                                                                                            $html .='  <td>

                                                                                                <a href='. $url.' class="text-info">

                                                                                                    <i class="fa fa-eye m-r-5"></i>View

                                                                                                    Time

                                                                                                </a>

                                                                                            </td>';

                                                                                            }

                                                                                           

                                                                                            $html .='   </tr>

                  </tbody>

               </table>

            </div>

         </div>

      </div>

      ';

      if(isset($get_statuss->weekstatus) && $get_statuss->weekstatus == 'submitted'){

      $approved = 1;

      $html .='

      <div class="mainhilight">

         <button  onclick="empApproveTimesheet('.$get_statuss->id.','.$get_statuss->weekstatus_id.','.$request->cweek.','.$get_statuss->reporting_manager.','.$approved.')" class="btn btn-primary">Approve</button>

         <button onclick="empRejectTimesheet('.$get_statuss->id.','.$get_statuss->weekstatus_id.','.$request->cweek.','.$get_statuss->reporting_manager.')" class="btn btn-danger">Reject</button>

      </div>

      ';

      }else if(isset($get_statuss->weekstatus) && $get_statuss->weekstatus == 'approved'){

      $enabled = 2;

      $html .='

      <div class="mainhilight">

         <button  onclick="empApproveTimesheet('.$get_statuss->id.','.$get_statuss->weekstatus_id.','.$request->cweek.','.$get_statuss->reporting_manager.','.$enabled.')" class="btn btn-primary">Enabled</button>

      </div>

      ';

      }

      $html .='

   </div>

</div>

';

//  dd($assingetuseruser);                                    

}

}

return response()->json(['status' => 200, 'msg' => 'successfully','approvellist' => $html]);

}

public function approve_status(Request $request){

if($request->status == 1){

$status = 'approved';

}else{

$status = 'enabled';

}

$update = DB::table('tm_ts_status')->where('id',$request->status_id)->where('ts_week',$request->week)->update([

'mon_project_status' => $status,

'mon_status' => $status,

'tue_project_status' => $status,

'tue_status' => $status,

'wed_project_status' => $status,

'wed_status' => $status,

'thu_project_status' => $status,

'thu_status' => $status,

'fri_project_status' => $status,

'fri_status' => $status,

'week_status' => $status,

'modified_by' => $status,

'modified' => date('Y-m-d H:i:s'),

]);

if($update){

return response()->json(['status' => 200, 'msg' => 'successfully']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully']);

}

}

public function reject_status(Request $request){

$update = DB::table('tm_ts_status')->where('id',$request->status_id)->where('ts_week',$request->week)->update([

'mon_project_status' => 'rejected',

'mon_status' => 'rejected',

'tue_project_status' => 'rejected',

'tue_status' => 'rejected',

'wed_project_status' => 'rejected',

'wed_status' => 'rejected',

'thu_project_status' => 'rejected',

'thu_status' => 'rejected',

'fri_project_status' => 'rejected',

'fri_status' => 'rejected',

'week_status' => 'rejected',

'modified_by' => $request->repoting_id,

'modified' => date('Y-m-d H:i:s'),

]);

if($update){

return response()->json(['status' => 200, 'msg' => 'successfully']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully']);

}

}

function enternote(Request $request){

$userId = Auth::guard('main_users')->user()->id??0;

$countweek = DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->count();

if($request->day = 'Mon'){

$aary = array(

'emp_id' => $request->userid,

'ts_year' => $request->curentyear,

'ts_month' => $request->curentMonth,

'ts_week' => $countweek + 1,

'cal_week' => $request->emp_id,

'mon_note' =>$request->note,

'mon_date' => $request->fillDate,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:s:i'),

'modified' => date('Y-m-d H:s:i'),

);

$countnote  = DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->count();

if($countnote > 0){

$upate =  DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->update($aary);

}else{

$upate =  DB::table('tm_emp_ts_notes')->insert($aary);

}

if($upate){

return response()->json(['status' => 200, 'msg' => 'successfully Fill Note']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully Fill Note']);

}

}else if($request->day = 'Tue'){

$aary = array(

'emp_id' => $request->userid,

'ts_year' => $request->curentyear,

'ts_month' => $request->curentMonth,

'ts_week' => $request->curentweek,

'cal_week' =>$countweek + 1,

'tue_note' =>$request->note,

'thu_date' => $request->fillDate,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:s:i'),

'modified' => date('Y-m-d H:s:i'),

);

$countnote  = DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->count();

if($countnote > 0){

$upate =  DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->update($aary);

}else{

$upate =  DB::table('tm_emp_ts_notes')->insert($aary);

}

if($upate){

return response()->json(['status' => 200, 'msg' => 'successfully Fill Note']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully Fill Note']);

}

}else if($request->day = 'Wed'){

$aary = array(

'emp_id' => $request->userid,

'ts_year' => $request->curentyear,

'ts_month' => $request->curentMonth,

'ts_week' => $request->curentweek,

'cal_week' => $countweek + 1,

'wed_note' =>$request->note,

'wed_date' =>$request->fillDate,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:s:i'),

'modified' => date('Y-m-d H:s:i'),

);

$countnote  = DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->count();

if($countnote > 0){

$upate =  DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->update($aary);

}else{

$upate =  DB::table('tm_emp_ts_notes')->insert($aary);

}

if($upate){

return response()->json(['status' => 200, 'msg' => 'successfully Fill Note']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully Fill Note']);

}

}else if($request->day = 'Thu'){

$aary = array(

'emp_id' => $request->userid,

'ts_year' => $request->curentyear,

'ts_month' => $request->curentMonth,

'ts_week' => $request->curentweek,

'cal_week' => $countweek + 1,

'thu_note' =>$request->note,

'thu_date' => $request->fillDate,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:s:i'),

'modified' => date('Y-m-d H:s:i'),

);

$countnote  = DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->count();

if($countnote > 0){

$upate =  DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->update($aary);

}else{

$upate =  DB::table('tm_emp_ts_notes')->insert($aary);

}

if($upate){

return response()->json(['status' => 200, 'msg' => 'successfully Fill Note']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully Fill Note']);

}

}elseif($request->day = 'Fri'){

$aary = array(

'emp_id' => $request->userid,

'ts_year' => $request->curentyear,

'ts_month' => $request->curentMonth,

'ts_week' => $request->curentweek,

'cal_week' => $countweek + 1,

'fri_note' =>$request->note,

'fri_date' => $request->fillDate,

'created_by' => $userId,

'modified_by' => $userId,

'is_active' => 1,

'created' => date('Y-m-d H:s:i'),

'modified' => date('Y-m-d H:s:i'),

);

$countnote  = DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->count();

if($countnote > 0){

$upate =  DB::table('tm_emp_ts_notes')->where('emp_id',$request->userid)->where('ts_week',$request->curentweek)->update($aary);

}else{

$upate =  DB::table('tm_emp_ts_notes')->insert($aary);

}

if($upate){

return response()->json(['status' => 200, 'msg' => 'successfully Fill Note']);

}else{

return response()->json(['status' => 201, 'msg' => 'Not successfully Fill Note']);

}

}

}

function rangeWeek ($datestr) {

date_default_timezone_set (date_default_timezone_get());

$dt = strtotime ($datestr);

return array (

date ('N', $dt) == 1 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('last monday', $dt)),

date('N', $dt) == 7 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('next sunday', $dt))

);

}

// find week in current week

// 	function nbweeks_of_month($month=null, $year=null){

// 	    if(empty($month)){

// 	        $month = date('m');

// 	    }

// 	      if(empty($year)){

// 	        $year = date('Y');

// 	    }

//     $nb_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

//     $first_day = date('w', mktime(0, 0, 0, $month, 1, $year));

//     if($first_day > 1 && $first_day < 6){ 

//         // month started on Tuesday-Friday, no chance of having 5 weeks

//         return 5;

//     } else if($nb_days == 31) return 5;

//     else if($nb_days == 30) return ($first_day == 0 || $first_day == 1)? 5:4;

//     else if($nb_days == 29) return $first_day == 1? 5:4;

// }

function getweekscount($month, $year){

$num_of_days = date("t", mktime(0,0,0,$month,1,$year)); 

$lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 

$no_of_weeks = 0; 

$count_weeks = 0; 

while($no_of_weeks < $lastday){ 

$no_of_weeks += 7; 

$count_weeks++; 

} 

return $count_weeks;

} 

function weekOfMonth($when = null) {

if ($when === null) $when = strtotime(date('Y-m-d',strtotime('last sunday')));

$week = strftime('%U', $when); // weeks start on Sunday

$firstWeekOfMonth = strftime('%U', strtotime(date('Y-m-01', $when)));

// dd(1 + ($week < $firstWeekOfMonth ? $week :  $week -$firstWeekOfMonth));

return  ($week < $firstWeekOfMonth ? $week :  $week -$firstWeekOfMonth);

}

function weeks($month, $year){

$firstday = date("w", mktime(0, 0, 0, $month, 1, $year)); 

$lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 

$count_weeks = 1 + ceil(($lastday-7+$firstday)/7);

return (int)$count_weeks;

}

function createDateRangeArray($strDateFrom,$strDateTo)

{

$preDay = date('d',strtotime($strDateFrom));

$strDateFrom  =  date("Y-m-d", strtotime('sunday this week', strtotime($strDateFrom)));

$postDay = date('d',strtotime($strDateFrom));

$j = 0;

for($i = (int)$preDay; $i <(int)$postDay; $i++){

$j++;

}

$strDateTo = date('Y-m-d',strtotime("+".$j."day", strtotime($strDateTo)));

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





public function export_timesheet(Request $request){







 

   $findDate = [];

   if($request->isMethod('post')) {



   $month = $request->month;

    $year = $request->year;

   $newdate =  date('Y-m', strtotime($year.'-'.$month.'+-1 months'));

 





      $attstatedate = $newdate.'-'.$this->startDay;

      $attenddate = $year.'-'. $month.'-'.$this->attEndDay;

      $findDate = $this->getDatesFromRange($attstatedate,$attenddate);

      

       if($request->user_id == 'all'){



    



         $userdetils = DB::table('main_users')->where('isactive',1)->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('main_users.isactive',1)->whereNull('extension')->orderBy('userfullname','ASC')->select('id','employeeId','userfullname')->get();

         foreach( $userdetils as  $userdetilss){

         $userHour = [];

         $userDate = [];

         $timesheet = DB::table('tm_emp_timesheets')->where('emp_id',$userdetilss->id)->whereBetween('sun_date', [$attstatedate, $attenddate])->groupBy(DB::raw("(DATE_FORMAT(sun_date,'%Y-%m-%d'))"))->select(DB::raw('SUM(sun_duration) as sun_duration'),DB::raw('SUM(mon_duration) as mon_duration'),DB::raw('SUM(tue_duration) as tue_duration'),DB::raw('SUM(wed_duration) as wed_duration'),DB::raw('SUM(thu_duration) as thu_duration'),DB::raw('SUM(fri_duration) as fri_duration'),DB::raw('SUM(sat_duration) as sat_duration'),'sun_date','mon_date','tue_date','wed_date','thu_date','fri_date','sat_date')->get(); 

       

               foreach($timesheet as $timesheets) {

            $userHour[] = $timesheets->sun_duration??'0';

            $userHour[] = $timesheets->mon_duration??'0';

            $userHour[] = $timesheets->tue_duration??'0';

            $userHour[] = $timesheets->wed_duration??'0';

            $userHour[] = $timesheets->thu_duration??'0';

            $userHour[] = $timesheets->fri_duration??'0';

            $userHour[] = $timesheets->sat_duration??'0';



            $userDate[] = $timesheets->sun_date??'-';

            $userDate[] = $timesheets->mon_date??'-';

            $userDate[] = $timesheets->tue_date??'-';

            $userDate[] = $timesheets->wed_date??'-';

            $userDate[] = $timesheets->thu_date??'-';

            $userDate[] = $timesheets->fri_date??'-';

            $userDate[] = $timesheets->sat_date??'-';



            $userdetilss->userHour = $userHour;

            $userdetilss->userDate = $userDate;

            $findHour = [];

            foreach($findDate as $findDates){



               if(date('D',strtotime($findDates)) == 'Sun'){



                  $findHour[] = $timesheets->sun_duration??'0';



               }else if(date('D',strtotime($findDates)) == 'Mon'){



                  $findHour[] = $timesheets->mon_duration??'0';



               }else if(date('D',strtotime($findDates)) == 'Tue'){



                  $findHour[] = $timesheets->tue_duration??'0';



               }else if(date('D',strtotime($findDates)) == 'Wed'){



                  $findHour[] = $timesheets->wed_duration??'0';



               }else if(date('D',strtotime($findDates)) == 'Thu'){



                  $findHour[] = $timesheets->thu_duration??'0';



               }else if(date('D',strtotime($findDates)) == 'Fri'){



                  $findHour[] = $timesheets->fri_duration??'0';



               }else if(date('D',strtotime($findDates)) == 'Sat'){



                  $findHour[] = $timesheets->sat_duration??'0';



               }



               $userdetilss->FindHour = $findHour;

            }

            //unset($findHour); 



           

            unset($findHour);

         }  

         

         unset($userDate);

         unset($userHour);

      

      }



      // dd($userdetils);





       

          

         

         //$nameArr = array('EMP ID','Emp Name');

        //$columns =   array_merge($nameArr , $findDate) ;



        

        



         $filename = public_path("uploads/csv/timesheet_'".time()."'_report.csv");

         $handle = fopen($filename, 'w+');

         

         $nameArr = array('EMP ID','Emp Name');

         $merygecol = array_merge($nameArr , $findDate??[]);

         

         fputcsv($handle,  $merygecol);







         foreach($userdetils  as $userdetilss){

               

                  $nameArr1 = array($userdetilss->employeeId,$userdetilss->userfullname);

                  $columns1 =   array_merge($nameArr1 , $userdetilss->FindHour??[]) ;

                  fputcsv($handle, $columns1);



                

             



             

         

   

            

          }

   

           



         

         fclose($handle);

//          $alluserdetils = DB::table('main_users')->where('isactive',1)->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('main_users.isactive',1)->whereNull('extension')->orderBy('userfullname','ASC')->select('id','employeeId','userfullname')->get();

       

//        foreach($alluserdetils  as  $alluserdetilss){



      

//        $projectuserlist =  $this->indiviable_export($alluserdetilss->id,$attstatedate,$attenddate);



//        $filename = public_path("uploads/csv/timesheet_'".time()."'_inviable_report.csv");

//    $handle1 = fopen($filename, 'w+');



//    $nameArr = array('EMP ID','Emp Name','Project Name','Task');

//    $merygecol = array_merge($nameArr , $findDate);

   

//    fputcsv($handle1,  $merygecol);



//    foreach($projectuserlist  as $userdetilss){

            

//          foreach($userdetilss->tasklist as $tasks){



//             $nameArr1 = array($userdetilss->employeeId,$userdetilss->userfullname,$userdetilss->project_name,$tasks->task);

//              $columns1 =   array_merge($nameArr1 , isset($tasks->userHour)?$tasks->userHour:[]) ;

//              fputcsv($handle1, $columns1);

//          }



     

//    }



//   fclose($handle1);



// }



 





         $headers = array(

          'Content-Type' => 'text/csv'

         

          );

  

  

      return Response()->download($filename);

  





       }



$userId = $request->user_id;

$tasknotfound = [];

$hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->where('tm_projects.project_status','in-progress')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();

if(isset($hideprojectlist)){

foreach($hideprojectlist as $hideprojectlists){

$tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->first();

if(empty($tasklist)){

$tasknotfound[] = $hideprojectlists->project_id;

}

}

}

//  dd($tasknotfound);

$projectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->whereNotIn('tm_project_employees.project_id',$tasknotfound);



$projectlist->where('tm_projects.project_status','in-progress');



$projectlist = $projectlist->select('tm_project_employees.*','main_users.userfullname','main_users.employeeId','tm_projects.project_name')->get();



foreach($projectlist as $projectlista){



   $projectlista->tasklist = DB::table('tm_project_task_employees')->join('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$projectlista->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->get();



    foreach($projectlista->tasklist as $task){

      $userHour = [];

      $userDate = [];

      $timesheet = DB::table('tm_emp_timesheets')->where('tm_emp_timesheets.emp_id',$userId)->where('tm_emp_timesheets.project_id',$task->project_id)->where('tm_emp_timesheets.project_task_id',$task->id)->whereBetween('tm_emp_timesheets.sun_date', [$attstatedate, $attenddate])->groupBy(DB::raw("(DATE_FORMAT(sun_date,'%Y-%m-%d'))"))->select(DB::raw('SUM(sun_duration) as sun_duration'),DB::raw('SUM(mon_duration) as mon_duration'),DB::raw('SUM(tue_duration) as tue_duration'),DB::raw('SUM(wed_duration) as wed_duration'),DB::raw('SUM(thu_duration) as thu_duration'),DB::raw('SUM(fri_duration) as fri_duration'),DB::raw('SUM(sat_duration) as sat_duration'),'sun_date','mon_date','tue_date','wed_date','thu_date','fri_date','sat_date')->get(); 

   

         foreach($timesheet as $timesheets) {

         $userHour[] = $timesheets->sun_duration??'0';

         $userHour[] = $timesheets->mon_duration??'0';

         $userHour[] = $timesheets->tue_duration??'0';

         $userHour[] = $timesheets->wed_duration??'0';

         $userHour[] = $timesheets->thu_duration??'0';

         $userHour[] = $timesheets->fri_duration??'0';

         $userHour[] = $timesheets->sat_duration??'0';



         $userDate[] = $timesheets->sun_date??'-';

         $userDate[] = $timesheets->mon_date??'-';

         $userDate[] = $timesheets->tue_date??'-';

         $userDate[] = $timesheets->wed_date??'-';

         $userDate[] = $timesheets->thu_date??'-';

         $userDate[] = $timesheets->fri_date??'-';

         $userDate[] = $timesheets->sat_date??'-';



         $task->userHour = $userHour;

         $task->userDate = $userDate;



         $findHour = [];

         foreach($findDate as $findDates){



            if(date('D',strtotime($findDates)) == 'Sun'){



               $findHour[] = $timesheets->sun_duration??'0';



            }else if(date('D',strtotime($findDates)) == 'Mon'){



               $findHour[] = $timesheets->mon_duration??'0';



            }else if(date('D',strtotime($findDates)) == 'Tue'){



               $findHour[] = $timesheets->tue_duration??'0';



            }else if(date('D',strtotime($findDates)) == 'Wed'){



               $findHour[] = $timesheets->wed_duration??'0';



            }else if(date('D',strtotime($findDates)) == 'Thu'){



               $findHour[] = $timesheets->thu_duration??'0';



            }else if(date('D',strtotime($findDates)) == 'Fri'){



               $findHour[] = $timesheets->fri_duration??'0';



            }else if(date('D',strtotime($findDates)) == 'Sat'){



               $findHour[] = $timesheets->sat_duration??'0';



            }



           

            $task->FindHour = $findHour;

         }

         //unset($findHour); 



        

         unset($findHour);

       

      }  

      

      unset($userDate);

      unset($userHour);

     

     

    }

}



   



   $filename = public_path("uploads/csv/timesheet_'".time()."'_inviable_report.csv");

   $handle = fopen($filename, 'w+');



   // $nameArr = array('EMP ID','Emp Name','Project Name','Task');

   // $merygecol = array_merge($nameArr , $findDate);

   

   // fputcsv($handle,  $merygecol);



   $nameArr = array('EMP ID','Emp Name','Project Name','Task');

   $merygecol = array_merge($nameArr , $findDate??[]);

   

   fputcsv($handle,  $merygecol);



   foreach($projectlist  as $userdetilss){

            

         foreach($userdetilss->tasklist as $tasks){



          



            $nameArr1 = array($userdetilss->employeeId,$userdetilss->userfullname,$userdetilss->project_name,$tasks->task);

             $columns1 =   array_merge($nameArr1 , isset($tasks->FindHour)?$tasks->FindHour:[]) ;

             fputcsv($handle, $columns1);

         }



     

   }



   fclose($handle);



   $headers = array(

    'Content-Type' => 'text/csv'

   

    );



return Response()->download($filename);



   



   }



   return view('projects.export_timesheet');

}









private function indiviable_export($userId,$attstatedate,$attenddate){

   

$tasknotfound = [];

$hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->where('tm_projects.project_status','in-progress')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();

if(isset($hideprojectlist)){

foreach($hideprojectlist as $hideprojectlists){

$tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->first();

if(empty($tasklist)){

$tasknotfound[] = $hideprojectlists->project_id;

}

}

}

//  dd($tasknotfound);

$projectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$userId)->whereNotIn('tm_project_employees.project_id',$tasknotfound);



$projectlist->where('tm_projects.project_status','in-progress');



$projectlist = $projectlist->select('tm_project_employees.*','main_users.userfullname','main_users.employeeId','tm_projects.project_name')->get();



foreach($projectlist as $projectlista){



   $projectlista->tasklist = DB::table('tm_project_task_employees')->join('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$projectlista->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$userId)->select('tm_project_tasks.*','tm_tasks.task')->get();



    foreach($projectlista->tasklist as $task){

      $userHour = [];

      $userDate = [];

      $timesheet = DB::table('tm_emp_timesheets')->where('tm_emp_timesheets.emp_id',$userId)->where('tm_emp_timesheets.project_id',$task->project_id)->where('tm_emp_timesheets.project_task_id',$task->id)->whereBetween('tm_emp_timesheets.sun_date', [$attstatedate, $attenddate])->groupBy(DB::raw("(DATE_FORMAT(sun_date,'%Y-%m-%d'))"))->select(DB::raw('SUM(sun_duration) as sun_duration'),DB::raw('SUM(mon_duration) as mon_duration'),DB::raw('SUM(tue_duration) as tue_duration'),DB::raw('SUM(wed_duration) as wed_duration'),DB::raw('SUM(thu_duration) as thu_duration'),DB::raw('SUM(fri_duration) as fri_duration'),DB::raw('SUM(sat_duration) as sat_duration'),'sun_date','mon_date','tue_date','wed_date','thu_date','fri_date','sat_date')->get(); 

   

         foreach($timesheet as $timesheets) {

         $userHour[] = $timesheets->sun_duration??'00::00';

         $userHour[] = $timesheets->mon_duration??'00::00';

         $userHour[] = $timesheets->tue_duration??'00::00';

         $userHour[] = $timesheets->wed_duration??'00::00';

         $userHour[] = $timesheets->thu_duration??'00::00';

         $userHour[] = $timesheets->fri_duration??'00::00';

         $userHour[] = $timesheets->sat_duration??'00::00';



         $userDate[] = $timesheets->sun_date??'-';

         $userDate[] = $timesheets->mon_date??'-';

         $userDate[] = $timesheets->tue_date??'-';

         $userDate[] = $timesheets->wed_date??'-';

         $userDate[] = $timesheets->thu_date??'-';

         $userDate[] = $timesheets->fri_date??'-';

         $userDate[] = $timesheets->sat_date??'-';



         $task->userHour = $userHour;

         $task->userDate = $userDate;

       

      }  

      

      unset($userDate);

      unset($userHour);

     

     

    }

}



return $projectlist;





}







}