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

class ReportController extends Controller
{




	
	public function reportview(Request $request,$monthYear='',$currentweek='',$totalweek='',$time=''){
	    
	                                                                   $mon = '';
                                                                      $tue = '';
                                                                       $wed = '';
                                                                        $thu = '';
                                                                         $fri = '';
                                                                      
	    
	    
	    	      $userId = Auth::guard('main_users')->user()->id??0;
	      
	            if(isset($currentweek) && !empty($currentweek)){
              
               $currentweekCount = $this->weekOfMonth();
            $currentweekCountPassed = $currentweek;
              
          }else{
              
            $currentweekCount = $this->weekOfMonth();
            $currentweekCountPassed = $this->weekOfMonth();
              
          }
	    
	    
	   // dd($currentweekCountPassed);
	      
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

$daterange = $this->x_week_range($finddate);
list($firstDate,$lastDate) = $daterange;
$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);

}


$daterange =  $daterange1;
$alltotalhour = 0;
$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));
       
          
          
          
	                                                               $totalsun = 0;
	                                                               $totalmon = 0;
	                                                               $totaltue = 0;
	                                                               $totalwed = 0;
	                                                               $totalthu = 0;
	                                                               $totalfri = 0;
	                                                               $totalsat = 0;
	                                                               
	                               $tasknotfound = [];
	                               $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();
	                                 if(isset($hideprojectlist)){
	                                 foreach($hideprojectlist as $hideprojectlists){
	                                    $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->select('tm_project_tasks.*','tm_tasks.task')->first();
	                                    if(empty($tasklist)){
	                                        $tasknotfound[] = $hideprojectlists->project_id;
	                                    }
	                                     
	                                     
	                                 }
	                                 }
	                                 
	                              
          
          $getuserproject = DB::table('tm_project_employees')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('is_active',1)->groupBy('emp_id')->whereNotIn('tm_project_employees.project_id',array_unique($tasknotfound));
              

	 if(!isset($request->all) && empty($request->all)){
                
         
                   $getuserproject->WhereNull('main_users.extension');
                
            }

            if(isset($request->export) && !empty($request->export)){

               $getuserproject = $getuserproject->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('main_users.isactive',1)->orderBy('main_users.userfullname')->select('emp_id','main_users.userfullname')->get();

              

            }else{

               $getuserproject = $getuserproject->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('main_users.isactive',1)->orderBy('main_users.userfullname')->select('emp_id','main_users.userfullname')->paginate(20)->appends(request()->query());

            }

           


           if(isset($getuserproject) && !empty($getuserproject)){
               foreach($getuserproject as $getuserprojects){
                   
 
                          $tasknotfounduser = [];
	                               $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();
	                                 if(isset($hideprojectlist)){
	                                 foreach($hideprojectlist as $hideprojectlists){
	                                    $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_tasks.*','tm_tasks.task')->first();
	                                    if(empty($tasklist)){
	                                        $tasknotfounduser[] = $hideprojectlists->project_id;
	                                    }
	                                     
	                                     
	                                 }
	                                 }
	                                 
	                $all_assign_hour_in_user = 0;
                 $assigndurationall = DB::table('tm_assign_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                      //dd($assigndurationall);
                  
                        if(isset($assigndurationall) && !empty($assigndurationall)){
                            foreach($assigndurationall as $k=> $durationall){
                                
                                        $time_arr =  array($durationall->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_assign_hour_in_user +=explode_time($time_val);
                                                              } 
                                                      
                                                                         
                                      }
                          //  dd(date('H:i', $all_assign_hour_in_project));
                                 $getuserprojects->all_assign_hour_in_user_all =  second_to_hhmm($all_assign_hour_in_user??'00:00');
                        }
                        
                    $all_hour_in_user = 0;
                 $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    // dd($user_project_hour);       
                      
                        if(isset($user_project_hour) && !empty($user_project_hour)){
                            foreach($user_project_hour as $duration){
                                
                                             $time_arr =  array($duration->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_hour_in_user +=explode_time($time_val);
                                                              } 
                          
                                                                    
                            }
                             $getuserprojects->all_hour_in_user_all =  second_to_hhmm($all_hour_in_user??'00:00');
                                     $findday  =      explode(':',second_to_hhmm($all_hour_in_user??'00:00'));
                              $getuserprojects->day = 5 - (int) DB::table('main_holidaydates')->where('groupid',2)->whereBetween('holidaydate', [$firstDate, $lastDate])->count() - (int) DB::table('main_leaverequest')->where('leavetypeid',2)->where('user_id',$getuserprojects->emp_id)->whereBetween('from_date', [$firstDate, $lastDate])->count();
                              $getuserprojects->hour = $getuserprojects->day*9;
                              
                              
                $fool_hour_in_user = 0;
                 $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('project_id',30)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    // dd($user_project_hour);       
                      
                        if(isset($user_project_hour) && !empty($user_project_hour)){
                            foreach($user_project_hour as $duration){
                                
                                             $time_arr =  array($duration->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $fool_hour_in_user +=explode_time($time_val);
                                                              } 
                          
                                                                    
                            }
                             $getuserprojects->fool_hour_in_user_all =  second_to_hhmm($fool_hour_in_user??'00:00');
                              
                              
                        }
                        }
                        
                   
                   
                 
	    
	    $projectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->whereNotIn('tm_project_employees.project_id',$tasknotfounduser)->where('tm_projects.is_active',1)->groupBy('tm_project_employees.project_id')->select('tm_project_employees.*','tm_projects.project_name')->get();
      
     // dd($projectlist);
      
       if(isset($projectlist) && !empty($projectlist)){
           foreach($projectlist as $projectlista){
               
                      
               
               
               $all_assign_hour_in_project = 0;
                 $assigndurationall = DB::table('tm_assign_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    
                  
                        if(isset($assigndurationall) && !empty($assigndurationall)){
                            foreach($assigndurationall as $k=> $durationall){
                                
                                        $time_arr =  array($durationall->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_assign_hour_in_project +=explode_time($time_val);
                                                              } 
                                                      
                                                                         
                                      }
                          //  dd(date('H:i', $all_assign_hour_in_project));
                                 $projectlista->all_assign_hour_in_project_all =  second_to_hhmm($all_assign_hour_in_project??'00:00');
                        }
                        
                          $all_hour_in_project = 0;
                 $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    // dd($user_project_hour);       
                      
                        if(isset($user_project_hour) && !empty($user_project_hour)){
                            foreach($user_project_hour as $duration){
                                
                                             $time_arr =  array($duration->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_hour_in_project +=explode_time($time_val);
                                                              } 
                          
                                                                    
                            }
                                $projectlista->all_hour_in_project_all =  second_to_hhmm($all_hour_in_project??'00:00');
                        }
                        
                                                                                        
                                                                                            
                                                                                            if($all_assign_hour_in_project > $all_hour_in_project) {
                                                                                                
                                                                                                 $cl = 'bg-Yellow';
                                                                                                
                                                                                            }else if($all_assign_hour_in_project < $all_hour_in_project){
                                                                                                
                                                                                                 $cl = 'bg-Red';
                                                                                                
                                                                                            }else{
                                                                                                
                                                                                                $cl = '';
                                                                                                
                                                                                            }
                                                                                    
                                                                                            
                                                                                     
                                                                                    
                                                                                   $projectlista->all_hour_in_project_all_color =  $cl;
                      
          
           }
       }
	       
	                                    
	                                              
	                                                $getuserprojects->project = $projectlist;
	                                                unset($tasknotfounduser);
           }
	}
             if(isset($request->export) && !empty($request->export)){  

                $columns = array('S.No', 'Employee Name', 'Working Days', 'Working Hours', 'Allocated Hours','Actual Hours','Free Pool');

    
    $filename = public_path("uploads/csv/Report_'".time()."'_report.csv");
    $handle = fopen($filename, 'w+');
    fputcsv($handle, $columns);

      $i = 1;
    foreach ($getuserproject as $key => $getprojectuser) {

      fputcsv($handle, array($i++, ucwords($getprojectuser->userfullname), $getprojectuser->day, $getprojectuser->hour, $getprojectuser->all_assign_hour_in_user_all, $getprojectuser->all_hour_in_user_all,$getprojectuser->fool_hour_in_user_all));

     
    }

     fclose($handle);

       $headers = array(
        'Content-Type' => 'text/csv'
       
        );


    return Response()->download($filename);
      

             } 
 //dd($getuserproject);
	    
	    return view('projects.report',['projectlist' => $getuserproject,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'PaginationDate' => $paginationDate,'everyMonth' => $findMonth]);
	    
	   
	    
	}
	
	
	
	function search_report_name(Request $request){
	    
	    
	    
	    
	                                                                 $mon = '';
                                                                      $tue = '';
                                                                       $wed = '';
                                                                        $thu = '';
                                                                         $fri = '';
                                                                      
	    
	    
	   $userId = Auth::guard('main_users')->user()->id??0;
	    
	    if(isset($request->currentweek) && !empty($request->currentweek)){
             
               $currentweekCount = $this->weekOfMonth();
              
              $currentweekCountPassed = $request->currentweek;
              
          }else{
              
            $currentweekCount = $this->weekOfMonth();
              
            $currentweekCountPassed = $this->weekOfMonth();
              
              
          }
	    
	      
	     
	      
	      if(isset($request->paginationDate) && !empty($request->paginationDate)){
	          $monthYear = $request->paginationDate;
	          $findMonth = date('M',strtotime($monthYear));
	           $findYear = date('Y',strtotime($monthYear));
	            $month = date('m',strtotime($monthYear));
	           $currentweekcount = $request->currentweek;
	           $paginationDate = date('Y-m',strtotime($monthYear));
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

$daterange = $this->x_week_range($finddate);
list($firstDate,$lastDate) = $daterange;
$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);

}

$daterange =  $daterange1;
$alltotalhour = 0;
$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));
          
       
          
          
          
	                                                               $totalsun = 0;
	                                                               $totalmon = 0;
	                                                               $totaltue = 0;
	                                                               $totalwed = 0;
	                                                               $totalthu = 0;
	                                                               $totalfri = 0;
	                                                               $totalsat = 0;
	                                                               
	                               $tasknotfound = [];
	                               $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();
	                                 if(isset($hideprojectlist)){
	                                 foreach($hideprojectlist as $hideprojectlists){
	                                    $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->select('tm_project_tasks.*','tm_tasks.task')->first();
	                                    if(empty($tasklist)){
	                                        $tasknotfound[] = $hideprojectlists->project_id;
	                                    }
	                                     
	                                     
	                                 }
	                                 }
	                                 
	                              
          
          $getuserproject = DB::table('tm_project_employees')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('is_active',1)->groupBy('emp_id')->whereNotIn('tm_project_employees.project_id',array_unique($tasknotfound))->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('main_users.extension', '=', 'Noida@1')->orWhereNull('main_users.extension')->where('main_users.isactive',1)->Where('main_users.userfullname', 'like', '%' . $request->report_name . '%')->orderBy('main_users.userfullname')->select('emp_id','main_users.userfullname')->paginate(20);;
        
           if(isset($getuserproject) && !empty($getuserproject)){
               foreach($getuserproject as $getuserprojects){
                   
 
                          $tasknotfounduser = [];
	                               $hideprojectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();
	                                 if(isset($hideprojectlist)){
	                                 foreach($hideprojectlist as $hideprojectlists){
	                                    $tasklist = DB::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.project_task_id','=','tm_project_tasks.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.project_id',$hideprojectlists->project_id)->where('tm_project_task_employees.is_active',1)->where('tm_project_task_employees.emp_id',$getuserprojects->emp_id)->select('tm_project_tasks.*','tm_tasks.task')->first();
	                                    if(empty($tasklist)){
	                                        $tasknotfounduser[] = $hideprojectlists->project_id;
	                                    }
	                                     
	                                     
	                                 }
	                                 }
	                                 
	                $all_assign_hour_in_user = 0;
                 $assigndurationall = DB::table('tm_assign_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                      //dd($assigndurationall);
                  
                        if(isset($assigndurationall) && !empty($assigndurationall)){
                            foreach($assigndurationall as $k=> $durationall){
                                
                                        $time_arr =  array($durationall->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_assign_hour_in_user +=explode_time($time_val);
                                                              } 
                                                      
                                                                         
                                      }
                          //  dd(date('H:i', $all_assign_hour_in_project));
                                 $getuserprojects->all_assign_hour_in_user_all =  second_to_hhmm($all_assign_hour_in_user??'00:00');
                        }
                        
                    $all_hour_in_user = 0;
                 $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    // dd($user_project_hour);       
                      
                        if(isset($user_project_hour) && !empty($user_project_hour)){
                            foreach($user_project_hour as $duration){
                                
                                             $time_arr =  array($duration->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_hour_in_user +=explode_time($time_val);
                                                              } 
                          
                                                                    
                            }
                             $getuserprojects->all_hour_in_user_all =  second_to_hhmm($all_hour_in_user??'00:00');
                                     $findday  =      explode(':',second_to_hhmm($all_hour_in_user??'00:00'));
                               $getuserprojects->day = 5 - (int) DB::table('main_holidaydates')->where('groupid',2)->whereBetween('holidaydate', [$firstDate, $lastDate])->count() - (int) DB::table('main_leaverequest')->where('leavetypeid',2)->where('user_id',$getuserprojects->emp_id)->whereBetween('from_date', [$firstDate, $lastDate])->count();
                             
                              $getuserprojects->hour = $getuserprojects->day*9;
                              
                              
                $fool_hour_in_user = 0;
                 $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('project_id',30)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    // dd($user_project_hour);       
                      
                        if(isset($user_project_hour) && !empty($user_project_hour)){
                            foreach($user_project_hour as $duration){
                                
                                             $time_arr =  array($duration->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $fool_hour_in_user +=explode_time($time_val);
                                                              } 
                          
                                                                    
                            }
                             $getuserprojects->fool_hour_in_user_all =  second_to_hhmm($fool_hour_in_user??'00:00');
                              
                              
                        }
                        }
                        
                   
                   
                 
	    
	    $projectlist = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->where('tm_project_employees.emp_id',$getuserprojects->emp_id)->whereNotIn('tm_project_employees.project_id',$tasknotfounduser)->where('tm_projects.is_active',1)->groupBy('tm_project_employees.project_id')->select('tm_project_employees.*','tm_projects.project_name')->get();
      
     // dd($projectlist);
      
       if(isset($projectlist) && !empty($projectlist)){
           foreach($projectlist as $projectlista){
               
                      
               
               
               $all_assign_hour_in_project = 0;
                 $assigndurationall = DB::table('tm_assign_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    
                  
                        if(isset($assigndurationall) && !empty($assigndurationall)){
                            foreach($assigndurationall as $k=> $durationall){
                                
                                        $time_arr =  array($durationall->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_assign_hour_in_project +=explode_time($time_val);
                                                              } 
                                                      
                                                                         
                                      }
                          //  dd(date('H:i', $all_assign_hour_in_project));
                                 $projectlista->all_assign_hour_in_project_all =  second_to_hhmm($all_assign_hour_in_project??'00:00');
                        }
                        
                          $all_hour_in_project = 0;
                 $user_project_hour = DB::table('tm_emp_timesheets')->where('emp_id',$projectlista->emp_id)->where('project_id',$projectlista->project_id)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->where('ts_year',$findYear)->get();
                    // dd($user_project_hour);       
                      
                        if(isset($user_project_hour) && !empty($user_project_hour)){
                            foreach($user_project_hour as $duration){
                                
                                             $time_arr =  array($duration->week_duration??'00:00');
                                                          foreach ($time_arr as $time_val) {
                                                        $all_hour_in_project +=explode_time($time_val);
                                                              } 
                          
                                                                    
                            }
                                $projectlista->all_hour_in_project_all =  second_to_hhmm($all_hour_in_project??'00:00');
                        }
                        
                                                                                        
                                                                                            
                                                                                            if($all_assign_hour_in_project > $all_hour_in_project) {
                                                                                                
                                                                                                 $cl = 'bg-Yellow';
                                                                                                
                                                                                            }else if($all_assign_hour_in_project < $all_hour_in_project){
                                                                                                
                                                                                                 $cl = 'bg-Red';
                                                                                                
                                                                                            }else{
                                                                                                
                                                                                                $cl = '';
                                                                                                
                                                                                            }
                                                                                    
                                                                                            
                                                                                     
                                                                                    
                                                                                   $projectlista->all_hour_in_project_all_color =  $cl;
                      
          
           }
       }
	       
	                                    
	                                              
	                                                $getuserprojects->project = $projectlist;
	                                                unset($tasknotfounduser);
           }
	}
        
        return view('projects.ajexreport',['projectlist' => $getuserproject,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'PaginationDate' => $paginationDate]);
	    
	    
        
        
	}
	
	
	function manager_report(Request $request,$monthYear='',$currentweek='',$totalweek='',$time=''){
	    
	   
	                                                                     $mon = '';
                                                                      $tue = '';
                                                                       $wed = '';
                                                                        $thu = '';
                                                                         $fri = '';
                                                                      
	    
	            $manger = [];
	    	      $userId = Auth::guard('main_users')->user()->id??0;
	        
	    if(isset($currentweek) && !empty($currentweek)){
              
               $currentweekCount = $this->weekOfMonth();
            $currentweekCountPassed = $currentweek;
              
          }else{
              
            $currentweekCount = $this->weekOfMonth();
            $currentweekCountPassed = $this->weekOfMonth();
              
          }
	      //dd($currentweekCount);
	    
	     //dd($currentweekCountPassed);
	      
	      if(isset($monthYear) && !empty($monthYear)){
	          
	          $findMonth = date('M',strtotime($monthYear));
	           $findYear = date('Y',strtotime($monthYear));
	            $month = date('m',strtotime($monthYear));
	          $paginationDate = date('Y-m',strtotime($monthYear));
	           $currentweekcount = $currentweek;
	          
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
$daterange = $this->x_week_range($finddate);
list($firstDate,$lastDate) = $daterange;
$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);

}


$daterange =  $daterange1;
$alltotalhour = 0;
$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));
		 
       
          $arr = ['in-progress','initiated','hold','completed'];
          
                       if(isset($request->mid)){
                 
                      $manager_id = $request->mid;
                    $managerlist = array();   
               
                  if($manager_id == 'All'){
                      
                    $manger =   DB::table('tm_projects')->join('main_users','tm_projects.manager_id','=','main_users.id')->where('is_active',1);
                  
                 if($request->status != 'All'){
                        $manger->where('tm_projects.project_status',$request->status);
                    }
                     if($request->cat != 'All'){
                        $manger->where('tm_projects.project_category',$request->cat);
                    }
                    
                   $manger->groupBy('main_users.userfullname')->select('tm_projects.*','main_users.userfullname');
                  
                   $manger = $manger->get();
                    
                   
                   
                      
                  }else{
                      
                       $manger =   DB::table('tm_projects')->join('main_users','tm_projects.manager_id','=','main_users.id')->where('manager_id',$manager_id)->where('is_active',1);
                       
                        if($request->status != 'All'){
                        $manger->where('tm_projects.project_status',$request->status);
                       }
                     if($request->cat != 'All'){
                        $manger->where('tm_projects.project_category',$request->cat);
                    }
                       
                       
                      $manger = $manger->select('tm_projects.*','main_users.userfullname')->limit(1)->get();
                   
                      
                  }
                  
                 //dd($manger);
               
                 if(isset($manger) && !empty($manger)){
                     
                 
                  foreach($manger as $mangers){
                      
                      $projectlist = DB::table('tm_projects')->where('manager_id',$mangers->manager_id);
                      
                         if($request->status != 'All'){
                        $projectlist->where('tm_projects.project_status',$request->status);
                       }
                     if($request->cat != 'All'){
                        $projectlist->where('tm_projects.project_category',$request->cat);
                    }
                      
                    $mangers->project_list =   $projectlist->where('is_active',1)->get();
                      
              
                      
                        foreach($mangers->project_list as $emplist){
                            
             $project_total_hour = 0;
               $project_mon = 0;
               $project_tue = 0;
               $project_wed = 0;
                $project_thu = 0;
                 $project_fri = 0;
                 
                   $uderUser = [];
                      
                       $usergetassign = DB::table('main_users')->where('reporting_manager',$mangers->manager_id)->where('isactive',1)->select('id')->get();
                       
                       foreach($usergetassign as $usergetassigns){
                           $uderUser[] = $usergetassigns->id;
                       }

                       $getprojectinuser = DB::table('tm_project_employees')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15])->where('is_active',1);
                       
                       if(!isset($request->outall)){

                        $getprojectinuser->WhereNull('main_users.extension');
                         
                       }
                       
                      $getprojectinuser = $getprojectinuser->where('project_id',$emplist->id)->get();

                      
                      if(isset($getprojectinuser)){
                        foreach($getprojectinuser as  $getprojectinusers){


                           $uderUser[] = $getprojectinusers->emp_id;
                        }
                      }
                            
                               $emplist->emplistthisproject = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->whereNotIn('main_users.emprole',[1,4,11,12,13,14,15]);
                               

                                if(!isset($request->outall)){

                        $emplist->emplistthisproject->WhereNull('main_users.extension');
                         
                       }
                               
                              $emplist->emplistthisproject =  $emplist->emplistthisproject->WhereNull('main_users.extension')->where('main_users.isactive',1)->where('main_users.isactive',1)->where('tm_projects.is_active',1)->where('tm_project_employees.project_id',$emplist->id)->whereIn('tm_project_employees.emp_id',$uderUser)->orderBy('main_users.userfullname')->groupBy('tm_project_employees.emp_id')->select('tm_project_employees.*','main_users.userfullname','tm_projects.project_name')->get();          
                            
                            
                              $urerhour = DB::table('tm_assign_emp_timesheets')->whereIn('emp_id',$uderUser)->where('project_id',$emplist->id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();
	                          
	               foreach($urerhour as $urerhours)  {              
                   
                      $time_arr =  array($urerhours->mon_duration??'00:00');
            foreach ($time_arr as $time_val) {
            $project_mon +=explode_time($time_val);
                  } 
                   
                     $time_arr =  array($urerhours->tue_duration??'00:00');
            foreach ($time_arr as $time_val) {
            $project_tue +=explode_time($time_val);
                  } 
                   
                    $time_arr =  array($urerhours->wed_duration??'00:00');
            foreach ($time_arr as $time_val) {
            $project_wed +=explode_time($time_val);
                  } 
                   
                      $time_arr =  array($urerhours->thu_duration??'00:00');
            foreach ($time_arr as $time_val) {
            $project_thu +=explode_time($time_val);
                  } 
                   
                    $time_arr =  array($urerhours->fri_duration??'00:00');
            foreach ($time_arr as $time_val) {
            $project_fri +=explode_time($time_val);
                  } 
             
             
             $time_arr =  array($urerhours->week_duration??'00:00');
            foreach ($time_arr as $time_val) {
            $project_total_hour +=explode_time($time_val);
                  }
                   
                   
	               }
	               
	               //dd($total_fri);
	               
	                $emplist->project_hour = second_to_hhmm($project_total_hour??'00:00');
	                $emplist->project_hour_mon = second_to_hhmm($project_mon??'00:00');
	                 $emplist->project_hour_tue = second_to_hhmm($project_tue??'00:00');
	                  $emplist->project_hour_wed = second_to_hhmm($project_wed??'00:00');
	                     $emplist->project_hour_thu = second_to_hhmm($project_thu??'00:00');
	                    $emplist->project_hour_fri = second_to_hhmm($project_fri??'00:00');
	               ////dd($total_mon);
	          
	           $project_total_hour = 0;
               $project_mon = 0;
               $project_tue = 0;
               $project_wed = 0;
                $project_thu = 0;
                 $project_fri = 0;
                            
                        
                              
               $totaltaskhour = 0;
               $total_mon = 0;
               $total_tue = 0;
               $total_wed = 0;
                $total_thu = 0;
                 $total_fri = 0;
                               if(isset($emplist->emplistthisproject)){
                               foreach($emplist->emplistthisproject as $getuserprojects){
                                   
        
                $urerhour = DB::table('tm_assign_emp_timesheets')->where('project_id',$getuserprojects->project_id)->where('emp_id',$getuserprojects->emp_id)->where('ts_year',(int)$findYear)->where('ts_month',(int)$month)->where('ts_week',$currentweekCountPassed)->get();
	               
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
	               
	               //dd($total_fri);
	               
	                $getuserprojects->userhour = second_to_hhmm($totaltaskhour??'00:00');
	               // $getuserprojects->assign_hour_mon = second_to_hhmm($total_mon??'00:00');
	               //  $getuserprojects->assign_hour_tue = second_to_hhmm($total_tue??'00:00');
	               //   $getuserprojects->assign_hour_wed = second_to_hhmm($total_wed??'00:00');
	               //      $getuserprojects->assign_hour_thu = second_to_hhmm($total_thu??'00:00');
	               //     $getuserprojects->assign_hour_fri = second_to_hhmm($total_fri??'00:00');
	               //dd($total_mon);
	                 $getuserprojects->user_hour_mon_diff = second_to_hhmm($total_mon);
	               
	              //  $color_mon = 32400 - (int)$total_mon;
	                $getuserprojects->user_hour_mon_color = ($total_mon <= 32400)?'':'bg-danger';
	                
	                 $getuserprojects->user_hour_tue_diff = second_to_hhmm($total_tue);
	                 
	                 // $color_tue = 32400 - (int)$total_tue;
	                $getuserprojects->user_hour_tue_color = ($total_tue <= 32400)?'':'bg-danger';
	                 
	                   $getuserprojects->user_hour_wed_diff = second_to_hhmm($total_wed );
	                    //$color_wed = 32400 - (int)$total_wed;
	                    $getuserprojects->user_hour_wed_color = ($total_wed <= 32400)?'':'bg-danger';
	                
	                     $getuserprojects->user_hour_thu_diff = second_to_hhmm($total_thu);
	                     
	                      //$color_thu = 32400 - (int)$total_thu;
	                      $getuserprojects->user_hour_thu_color = ($total_thu <= 32400)?'':'bg-danger';
	                
	                      $getuserprojects->user_hour_fri_diff = second_to_hhmm($total_fri);
	                      
	                      // $color_fri = 32400 - (int)$total_fri;
	                      $getuserprojects->user_hour_fri_color = ($total_fri <= 32400)?'':'bg-danger';
	                      
	                      
	                      
	               //       $getuserprojects->user_hour_mon_diff = second_to_hhmm( 32400 - (int)$total_mon);
	               
	               // $color_mon = 32400 - (int)$total_mon;
	               // $getuserprojects->user_hour_mon_color = ($color_mon > 0)?'bg-green':'bg-danger';
	                
	               //  $getuserprojects->user_hour_tue_diff = second_to_hhmm(32400 - (int)$total_tue);
	                 
	               //   $color_tue = 32400 - (int)$total_tue;
	               // $getuserprojects->user_hour_tue_color = ($color_tue > 0)?'bg-green':'bg-danger';
	                 
	               //    $getuserprojects->user_hour_wed_diff = second_to_hhmm(32400 - (int)$total_wed );
	               //     $color_wed = 32400 - (int)$total_wed;
	               //     $getuserprojects->user_hour_wed_color = ($color_wed > 0)?'bg-green':'bg-danger';
	                
	               //      $getuserprojects->user_hour_thu_diff = second_to_hhmm(32400 - (int)$total_thu);
	                     
	               //       $color_thu = 32400 - (int)$total_thu;
	               //       $getuserprojects->user_hour_thu_color = ($color_thu > 0)?'bg-green':'bg-danger';
	                
	               //       $getuserprojects->user_hour_fri_diff = second_to_hhmm(32400 - (int)$total_fri);
	                      
	               //        $color_fri = 32400 - (int)$total_fri;
	               //       $getuserprojects->user_hour_fri_color = ($color_fri > 0)?'bg-green':'bg-danger';
	                      
	           $totaltaskhour = 0;
               $total_mon = 0;
               $total_tue = 0;
               $total_wed = 0;
                $total_thu = 0;
                 $total_fri = 0;
	                     
                                   
                                   
                               }
                               }
                               
    
                         unset($uderUser);  
                        }
                      
                  }
                 }
                 
                   return view('projects.manager_report',['managerlist_data' => $manger,'arr' => $arr,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId ,'PaginationDate' => $paginationDate,'everyMonth' => $findMonth]);
	    
                  
                  
                 // dd($manger);
           
                       }
                       
	    
	    return view('projects.manager_report',['managerlist_data' => $manger,'arr' => $arr,'daterange' => $daterange,'currentweekCount' => $currentweekCount,'weekcountpassed' => $currentweekCountPassed,'totalweekCount' => $totalweekCount,'userid' => $userId,'PaginationDate' => $paginationDate,'everyMonth' => $findMonth]);
	    
	    
	}
	
	
	 function searchReport(Request $request){
	    
	   // dd($request->all());
	    
	         $userId = Auth::guard('main_users')->user()->id??0;
	         
	         	         if(isset($request->currentweek) && !empty($request->currentweek)){
              
              $currentweekCount = $this->weekOfMonth();
            $currentweekCountPassed = $request->currentweek;
              
          }else{
              
            $currentweekCount = $this->weekOfMonth();
            $currentweekCountPassed = $this->weekOfMonth();
              
          }
	    
	    
	    // dd($currentweekCountPassed);
	      
	      if(isset($request->year) && !empty($request->month)){
	          
	          $monthYear = $request->year.'-0'.$request->month;
	          
	          $findMonth = date('M',strtotime($monthYear));
	           $findYear = date('Y',strtotime($monthYear));
	            $month = date('m',strtotime($monthYear));
	          
	           $currentweekcount =  $request->currentweek -1;
	          
	            $finddate =  date('Y-m-d',strtotime('+'.$currentweekcount.' week sun '.$findMonth.' '.$findYear));

              $daterange = $this->rangeWeek($finddate);
$firstDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[0])));
$lastDate = date('Y-m-d', strtotime('-1 day', strtotime($daterange[1])));
$daterange1 =  $this->createDateRangeArray($firstDate ,$lastDate);
	          
	          
	      }else{
	          
	          $monthYear = $request->searchYear.'-0'.$request->searchMonth;
	          

$finddate = date('Y-m-d',strtotime('last sunday'));
$findMonth = date('M',strtotime($finddate));
$findYear = date('Y',strtotime($finddate));
$month = date('m',strtotime($finddate));
$paginationDate = date('Y-m',strtotime($finddate));
$currentweekcount = $this->weekOfMonth() ;


$daterange = $this->x_week_range($finddate);
list($firstDate,$lastDate) = $daterange;
$daterange1 =  $this->createDateRangeArray($daterange[0] ,$daterange[1]);

}

$daterange =  $daterange1;
$alltotalhour = 0;
$totalweekCount =  !empty($totalweek)?count($this->getSundays($findYear,$month)):count($this->getSundays($findYear,$month));
		 
	         

          
	      
                                                                   $totalsun = 0;
	                                                               $totalmon = 0;
	                                                               $totaltue = 0;
	                                                               $totalwed = 0;
	                                                               $totalthu = 0;
	                                                               $totalfri = 0;
	                                                               $totalsat = 0;
          
          $getuserproject = DB::table('tm_project_employees')->join('main_users','tm_project_employees.emp_id','=','main_users.id')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->where('tm_project_employees.project_id',$request->searchProject)->where('tm_projects.project_status',$request->searchStatus);
          
          if(!isset($request->inactive)){
              
              $getuserproject->where('tm_project_employees.is_active',1);
              
          }
          
          $getuserproject = $getuserproject->groupBy('tm_project_employees.emp_id')->select('tm_project_employees.emp_id','main_users.userfullname')->get();
          
         // dd($getuserproject);
        
           if(isset($getuserproject) && !empty($getuserproject)){
               foreach($getuserproject as $getuserprojects){
                   
                                $projecthour = DB::table('tm_assign_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_year',$findYear)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->get();
                                       // dd($projecthour);     
                                                                     if(isset($projecthour) && !empty($projecthour)){
                                                                     foreach($projecthour as $assinprojecthours){
                                                                        $totalsun += strtotime($assinprojecthours->sun_duration);
                                                                      $totalmon += strtotime($assinprojecthours->mon_duration);
                                                                      $totaltue += strtotime($assinprojecthours->tue_duration);
                                                                         $totalwed += strtotime($assinprojecthours->wed_duration);
                                                                         $totalthu += strtotime($assinprojecthours->thu_duration);
                                                                          $totalfri += strtotime($assinprojecthours->fri_duration);
                                                                            $totalsat += strtotime($assinprojecthours->sat_duration);
                                                                     
                                                                         
                                                                     }
                                                                     
                                                                     
                                                                           
                                                                          $getuserprojects->assin_sun =  date('H:i', $totalsun);
                                                                          $getuserprojects->assin_mon =  date('H:i', $totalmon);
                                                                            $getuserprojects->assin_tue =  date('H:i', $totaltue);
                                                                              $getuserprojects->assin_wed =  date('H:i', $totalwed);
                                                                                $getuserprojects->assin_thu =  date('H:i', $totalthu);
                                                                                  $getuserprojects->assin_fri =  date('H:i', $totalfri);
                                                                                  $getuserprojects->assin_sat =  date('H:i', $totalsat);
                                                                     
                                                                     }
                                                                     
                                                                   $usertotalsun = 0;
	                                                               $usertotalmon = 0;
	                                                               $usertotaltue = 0;
	                                                               $usertotalwed = 0;
	                                                               $usertotalthu = 0;
	                                                               $usertotalfri = 0;
	                                                               $usertotalsat = 0;
                                                                     
                                                                     
                                         $userprojecthour = DB::table('tm_emp_timesheets')->where('emp_id',$getuserprojects->emp_id)->where('ts_year',$findYear)->where('ts_month',$month)->where('ts_week',$currentweekCountPassed)->get();
                                      //  dd($projecthour);     
                                                                     if(isset($userprojecthour) && !empty($userprojecthour)){
                                                                     foreach($userprojecthour as $projecthours){
                                                                        $usertotalsun += strtotime($projecthours->sun_duration);
                                                                      $usertotalmon += strtotime($projecthours->mon_duration);
                                                                      $usertotaltue += strtotime($projecthours->tue_duration);
                                                                         $usertotalwed += strtotime($projecthours->wed_duration);
                                                                         $usertotalthu += strtotime($projecthours->thu_duration);
                                                                          $usertotalfri += strtotime($projecthours->fri_duration);
                                                                            $usertotalsat += strtotime($projecthours->sat_duration);
                                                                      
                                                                     }
                                                                     
                                                                       $getuserprojects->user_sun =  date('H:i', $usertotalsun);
                                                                          $getuserprojects->user_mon =  date('H:i', $usertotalmon);
                                                                            $getuserprojects->user_tue =  date('H:i', $usertotaltue);
                                                                              $getuserprojects->user_wed =  date('H:i', $usertotalwed);
                                                                                $getuserprojects->user_thu =  date('H:i', $usertotalthu);
                                                                                  $getuserprojects->user_fri =  date('H:i', $usertotalfri);
                                                                                  $getuserprojects->user_sat =  date('H:i', $usertotalsat);
                                                                                  
                                                                     
                                                                     }
                                                                   // dd($totalmon);  
                                                                     if($totalmon != 0){
                                                                         
                                                                         $total_color_mon = (($usertotalmon*100)/$totalmon);
                                                                                 
                                                                                    if($total_color_mon < 120 || $total_color_mon > 120){
                                                                                      $cl = 'yellow';
                                                                                        
                                                                                    }elseif($total_color_mon < 150 || $total_color_mon > 150){
                                                                                        
                                                                                         $cl = 'orange';
                                                                                        
                                                                                    }else if($total_color_mon > 150){
                                                                                        
                                                                                         $cl = 'red';
                                                                                        
                                                                                    }else{
                                                                                        
                                                                                        $cl = '';
                                                                                        
                                                                                    }
                                                                         
                                                                     }else{
                                                                         
                                                                           $cl = '';
                                                                         
                                                                     }
                                                                       
                                                                                    
                                                                                     $getuserprojects->user_color_mon =  $cl;
                                                                                     
                                                                                      if($totaltue != 0){
                                                                                    
                                                                                            $total_color_tue = ($usertotaltue*100)/$totaltue -100;
                                                                                    
                                                                                    if($total_color_tue < 120 || $total_color_tue > 120){
                                                                                        $cl = 'yellow';
                                                                                        
                                                                                    }elseif($total_color_tue < 150 || $total_color_tue > 150){
                                                                                        
                                                                                          $cl = 'orange';
                                                                                        
                                                                                    }else if($total_color_tue > 150){
                                                                                        
                                                                                         $cl = 'red';
                                                                                        
                                                                                    }else{
                                                                                        
                                                                                         $cl = '';
                                                                                        
                                                                                    }
                                                                                      }else{
                                                                                            $cl = '';
                                                                                          
                                                                                      }
                                                                                      
                                                                                    
                                                                                    $getuserprojects->user_color_tue =  $cl;
                                                                                    
                                                                                     if($totalwed != 0){
                                                                                    
                                                                                            $total_color_wed = ($usertotalwed*100)/$totalwed -100;
                                                                                    
                                                                                    if($total_color_wed < 120 || $total_color_wed > 120){
                                                                                        $cl = 'yellow';
                                                                                        
                                                                                    }elseif($total_color_wed < 150 || $total_color_wed > 150){
                                                                                        
                                                                                          $cl = 'orange';
                                                                                        
                                                                                    }else if($total_color_wed > 150){
                                                                                        
                                                                                         $cl = 'red';
                                                                                        
                                                                                    }else{
                                                                                        
                                                                                         $cl = '';
                                                                                        
                                                                                    }
                                                                                     }else{
                                                                                         
                                                                                          $cl = '';
                                                                                         
                                                                                     }
                                                                                    
                                                                                    $getuserprojects->user_color_wed =  $cl;
                                                                                    
                                                                                    
                                                                                     if($totalthu != 0){
                                                                                    
                                                                                            $total_color_thu = ($usertotalthu*100)/$totalthu -100;
                                                                                    
                                                                                    if($total_color_thu < 120 || $total_color_thu > 120){
                                                                                        $cl = 'yellow';
                                                                                        
                                                                                    }elseif($total_color_thu < 150 || $total_color_thu > 150){
                                                                                        
                                                                                          $cl = 'orange';
                                                                                        
                                                                                    }else if($total_color_thu > 150){
                                                                                        
                                                                                         $cl = 'red';
                                                                                        
                                                                                    }else{
                                                                                        
                                                                                         $cl = '';
                                                                                        
                                                                                    }
                                                                                     }else{
                                                                                          $cl = '';
                                                                                         
                                                                                     }
                                                                                    
                                                                                    $getuserprojects->user_color_thu =  $cl;
                                                                                    
                                                                                       if($totalfri != 0){
                                                                                    
                                                                                            $total_color_fri = ($usertotalfri*100)/$totalfri -100;
                                                                                    
                                                                                    if($total_color_fri < 120 || $total_color_fri > 120){
                                                                                        $cl = 'yellow';
                                                                                        
                                                                                    }elseif($total_color_fri < 150 || $total_color_fri > 150){
                                                                                        
                                                                                          $cl = 'orange';
                                                                                        
                                                                                    }else if($total_color_fri > 150){
                                                                                        
                                                                                         $cl = 'red';
                                                                                        
                                                                                    }else{
                                                                                        
                                                                                         $cl = '';
                                                                                        
                                                                                    }
                                                                                       }else{
                                                                                           
                                                                                            $cl = '';
                                                                                           
                                                                                       }
                                                                                    
                                                                                    $getuserprojects->user_color_fri =  $cl;
                                                                                    
               }
           }
               
              // dd($getuserproject);
             
              $html = '';
              
              $html .=' <ul class="nav nav-tabs small justify-content-end"
                                                                role="tablist">';
                                                                
                                                                 for($i = 1;$i <= $currentweekCount;$i++){
                                                                     
                                                                 if($i == $currentweekCountPassed){
                                                                  
                                                                   $ac ='active';
                                                                
                                                                 }else{
                                                                 
                                                                 
                                                                   $ac ='';
                                                                 
                                                                     
                                                                 }
                                                                  
                                                                  
                                                                
                                                                 
                                                                
                                                               $html .='  <li class="nav-item '.$ac.' "><a class="nav-link"
                                                                        onclick="getresultweekly('.$findYear.','.$month.','.$i.','.$totalweekCount.')" role="tab">Week
                                                                    '.$i.'</a></li>';
                                                                    
                                                                    
                                                                 }
                                                                 
                                                                  // dd($currentweekCountPassed);
                                                               
                                                            $html .=' </ul>';
              
              
              $html .= ' <div class="tab-content py-2">
                                                                <div class="tab-pane active" id="tab1" role="tabpanel">
                                                                   <div class="col-sm-12 table-responsive">
                                                            <table class="table text-center">
                                                                <thead class="thead-light">
                                                                    <th>Employee Name</th>';
                                                                    
                                                                    foreach($daterange as $dateranges){
                                                                        $DateRange = date('D d M',strtotime($dateranges));
                                                                     $html .= '<th>'.$DateRange.'</th>';
                                                                     
	                                                                   }
                                                                    
                                                                $html .= '</thead>
                                                                <tbody>';
                                                                
                                                                if(count($getuserproject) == 0){
                                                                    
                                                             $html .= '<tr><td colspan="8"> No Record Found</td>
                                                                </tr>';
                                                                    
                                                                }
                                                                
                                                               
                                                                    
                                                                  if(isset($getuserproject) && !empty($getuserproject)){  
                                                                      foreach($getuserproject as $getuserprojects){
                                                                    
                                                                     $html .= ' <tr>
                                                                        <td>'.$getuserprojects->userfullname.'</td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-equalhr">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_sun.'
                                                                                </span>
                                                                                <span class="p-2 ">
                                                                                   '.$getuserprojects->user_sun.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-blank">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_mon.'
                                                                                </span>
                                                                                <span class="p-2 '.$getuserprojects->user_color_mon.'">
                                                                                    '.$getuserprojects->user_mon.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-equalhr">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_tue.'
                                                                                </span>
                                                                                <span class="p-2 '.$getuserprojects->user_color_tue.'">
                                                                                   '.$getuserprojects->user_tue.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-equalhr">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_wed.'
                                                                                </span>
                                                                                <span class="p-2 '.$getuserprojects->user_color_wed.'">
                                                                                 '.$getuserprojects->user_wed.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-free">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_thu.'
                                                                                </span>
                                                                                <span class="p-2 '.$getuserprojects->user_color_thu.'">
                                                                                    '.$getuserprojects->user_thu.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-approx">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_fri.'
                                                                                </span>
                                                                                <span class="p-2 '.$getuserprojects->user_color_fri.'">
                                                                                     '.$getuserprojects->user_fri.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="span_hr widthauto bg-free">
                                                                                <span class="div-right-b p-2">'.$getuserprojects->assin_sat.'
                                                                                </span>
                                                                                <span class="p-2 ">
                                                                                     '.$getuserprojects->user_sat.'
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                    </tr>';
                                                                    
                                                                  }
                                                                  }
                                                                    
                                                                 
                                                                 $html .= '</tbody>
                                                            </table>
                                                        </div>
                                                                 ';
                                                                 
                                                               //  dd($html);
                                                                 
                                                                 
                                	return response()->json(['status' => 200, 'msg' => 'Successfully','report' =>$html ]);                                 
                                                                 
                                                  
                                                            
                   
	    
	}
	
	 function rangeWeek ($datestr) {
   date_default_timezone_set (date_default_timezone_get());
   $dt = strtotime ($datestr);
   
 
   return array (
      date ('N', $dt) == 1 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('last monday', $dt)),
     date('N', $dt) == 7 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('next sunday', $dt))
   );
 }
	
		function weekOfMonth($when = null) {
    if ($when === null) $when = strtotime(date('Y-m-d',strtotime('last sunday')));
    $week = strftime('%U', $when); // weeks start on Sunday
    $firstWeekOfMonth = strftime('%U', strtotime(date('Y-m-01', $when)));
    return  ($week < $firstWeekOfMonth ? $week : $week - $firstWeekOfMonth);
}

// find week in month


function weeks($month, $year){
    $firstday = date("w", mktime(0, 0, 0, $month, 1, $year)); 
    $lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 
    $count_weeks = 1 + ceil(($lastday-7+$firstday)/7);
    return (int)$count_weeks;
}

function x_week_range($date) {
    $ts = strtotime($date);
    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    return array(date('Y-m-d', $start),
                 date('Y-m-d', strtotime('next saturday', $start)));
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
	
    
}