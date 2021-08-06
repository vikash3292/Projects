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
use File;



class PmController extends Controller

{



	public function project_list(){

	    

	   // $projectList = Db::table('tm_projects')->leftjoin('main_users','tm_projects.manager_id','=','main_users.id')->where('tm_projects.is_active',1)->select('tm_projects.*','main_users.userfullname')->get();

	

	

    //     	foreach($projectList as $projectLists){

    //     	     $all_seconds=0;

    //     	    $assignproject = DB::table('tm_emp_timesheets')->where('project_id',$projectLists->id)->get();

    //     	    if(isset($assignproject) && !empty($assignproject)){

    //     	        foreach($assignproject as $assignprojects){

        	        

    //     	         list($hour, $minute) = explode(':', $assignprojects->week_duration);

	   //                   $h = (int)$hour;

	   //                   $m  = (int)$minute;

	                        

	   //                  $all_seconds += $h * 3600;

    //                      $all_seconds += $m * 60;

    //     	        }

        	        

    //     	          $total_minutes = floor($all_seconds/60);

                    

    //                  $hours = floor($total_minutes / 60); 

    //                   $minutes = $total_minutes % 60;

                       

           

    //               $week_hour =  sprintf('%02d:%02d', $hours, $minutes);

    //               $projectLists->actualhour = $week_hour;

        	        

        	        

        	        

    //     	    }

        	    

    //     	}

        	

        //	dd($projectList);

	    

	      return view('projects.project_list');

	    

	}

	

	

	function resource_user(Request $request){

	    

	    

	    foreach($request->userresourceid as $key => $resource_id){

	        

	        $update = DB::table('tm_project_employees')->where('project_id',$request->project_id)->where('emp_id',$resource_id)->update([

	            

	            'cost_rate' => $request->cost_rate[$key]??'',

	            'billable_rate' => $request->billable_rate[$key]??'',

	            

	            ]);

	    }

	    

	    

	      if($update){

	        

	         return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);

	        

	    }else{

	        

	         return response()->json(['status' => 201, 'msg' => ' Not Updated ' ]);

	        

	    }

	    

	}

	

	

	public function edit_project_task(Request $request,$id){

	    

	    $assin = [];

	    $projectedit = DB::table('tm_projects')->where('id',$id)->first();

       $form_show = DB::table('tm_forms')->get();

	    $tastedit = DB::table('tm_project_tasks')->leftjoin('main_users','tm_project_tasks.created_by','=','main_users.id')->join('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_tasks.project_id',$id)->get();

	    

	      $project_user_list = DB::table('tm_project_employees')->leftjoin('main_users as user_created_by','tm_project_employees.created_by','=','user_created_by.id')->leftjoin('main_users','tm_project_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('main_roles','main_users.emprole','=','main_roles.id')->where('tm_project_employees.project_id',$id)->where('tm_project_employees.is_active',1)->select('main_users.id','main_users.prefix','main_users.employeeId','main_users.emprole','main_users.userfullname','main_roles.rolename','user_created_by.userfullname as created','main_jobtitles.jobtitlename','tm_project_employees.cost_rate','tm_project_employees.billable_rate','tm_project_employees.manager_id','main_users.emp_type')->get();

	     // dd( $project_user_list);

	       foreach($project_user_list as $assignlist){

	          $assin[] =  $assignlist->id;

	       }

	       

	      //dd($project_user_list);
        
        $newusertasklist= DB::table('main_users')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('main_roles','main_users.emprole','=','main_roles.id')->whereIn('main_users.id',$assin)->where('emprole','!=', 1)->where('main_users.isactive',1)->select('main_users.*','main_users.userfullname','main_roles.rolename','main_jobtitles.jobtitlename')->get();
	      

	       $newuserlist= DB::table('main_users')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('main_roles','main_users.emprole','=','main_roles.id')->whereNotIn('main_users.id',$assin)->where('emprole','!=', 1)->where('main_users.isactive',1)->select('main_users.*','main_users.userfullname','main_roles.rolename','main_jobtitles.jobtitlename')->paginate(10);

	      

	       if ($request->ajax()) {

	           

	          // dd($newuserlist);

            return view('projects.ajexload', compact('newuserlist'));

        }

	      

	      

	      return view('projects.edit_project',['projectedit'=>$projectedit,'taskedit' =>$tastedit,'userlist' => $project_user_list,'newuserlist' =>$newuserlist,'project_id' =>$id,'form_show' => $form_show,'newusertasklist' => $newusertasklist ]);

	    

	}

	public function upload_form_project_file(Request $request){

		  $user_id =  Auth::guard('main_users')->user()->id;

         if($request->hasFile('profile')) {
           $file = $request->file('profile');

           $original_name = strtolower(trim($file->getClientOriginalName()));
             $name = time().rand(100,999).$original_name;

           $file->move(public_path().'/uploads/attach/', $name);
           $image['files'] = '/uploads/attach/'. $name;
           $image['form_id'] = $request->form_id;
            $image['create_by'] =  $user_id;
            
          // $user->save();
        }
                $exp12  = DB::table('tm_form_histroy')->insert($image);
       

          if(isset($exp12)){

                

               if($exp12){

                 return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);

               }else{


                  return response()->json(['status' => 201, 'msg' => 'Not Change']);
               }

}

}

	

    public function search_user_name(Request $request){

        

        

        $assin = [];

         $project_user_list = DB::table('tm_project_employees')->leftjoin('main_users as user_created_by','tm_project_employees.created_by','=','user_created_by.id')->leftjoin('main_users','tm_project_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('main_roles','main_users.emprole','=','main_roles.id')->where('tm_project_employees.project_id',$request->project_id)->where('tm_project_employees.is_active',1)->select('main_users.id','main_users.prefix','main_users.employeeId','main_users.emprole','main_users.userfullname','main_roles.rolename','user_created_by.userfullname as created','main_jobtitles.jobtitlename','tm_project_employees.cost_rate','tm_project_employees.billable_rate','tm_project_employees.manager_id')->get();

	     // dd( $project_user_list);

	       foreach($project_user_list as $assignlist){

	          $assin[] =  $assignlist->id;

	       }

        

         $newuserlist= DB::table('main_users')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('main_roles','main_users.emprole','=','main_roles.id')->Where('main_users.userfullname', 'like', '%' . $request->searchname . '%')->whereNotIn('main_users.id',$assin)->where('emprole','!=', 1)->where('main_users.isactive',1)->select('main_users.*','main_users.userfullname','main_roles.rolename','main_jobtitles.jobtitlename')->get();

	      

       //dd($newuserlist);

        return view('projects.ajexload', compact('newuserlist'));

        

    }

	

	public function update_task(Request $request){

	    

	   //dd($request->all());

	    

	     $user_id =  Auth::guard('main_users')->user()->id;

	    

	    foreach($request->update_project_id as $key =>  $project_id){

	        



	        $projectdata = DB::table('tm_projects')->where('id',$project_id)->first();

	        

	        if($projectdata->estimated_hrs < $request->task_hr[$key]){

	            

	             return response()->json(['status' => 202, 'msg' => 'Excced Hour In Project']);

	            

	        }

	        

	       $updt = DB::table('tm_project_tasks')->where('project_id',$project_id)->where('task_id',$request->update_task_id[$key])->update(

	           [

	            'estimated_hrs' => $request->task_hr[$key],

	            'is_billable' => $request->test_checkbox[$key],  

	            'modified_by' => $user_id,  

	            'task_start_date' => $request->stat_date[$key],  

	            'task_end_date' => $request->end_date[$key],

	            'task_status' => $request->task_status[$key],

	            'modified' => date('Y-m-d h:i:s'), 

	           ]

	           ) ;

	    }

	    

	    //return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);

	    

	     if($updt){

	        

	         return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);

	        

	    }else{

	        

	         return response()->json(['status' => 201, 'msg' => ' Not Updated ' ]);

	        

	    }

	}

	

	public function assign_task_users(Request $request){

	    

	    

	    

	    $user_id =  Auth::guard('main_users')->user()->id;

	    $userid = json_decode($request->users_id);

	     $get_project_task_id = DB::table('tm_project_tasks')->where('project_id',$request->project_id)->where('task_id',$request->task_id)->first();

	

		// DB::table('tm_project_task_employees')->where('project_id',$request->project_id)->where('task_id',$request->task_id)->delete();

		

		

		 foreach($userid as $userids){



			$count = DB::table('tm_project_task_employees')->where('project_id',$request->project_id)->where('emp_id',$userids)->where('project_task_id', $get_project_task_id->id)->count();

	        if($count == 0){

	        $inst = DB::table('tm_project_task_employees')->insert([

	           'project_id' => $request->project_id,

	           'task_id' => $request->task_id,

	           'project_task_id' => $get_project_task_id->id,

	           'emp_id' => $userids,

	           'created_by' => $user_id,

	             'modified_by' => $user_id,

	               'is_active' => 1,

	                 'created' => date('Y-m-d h:i:s'),

	                   'modified' => date('Y-m-d h:i:s'),

	            

				]);

			}

	    }

	    

	    if($inst){

	        

	         return response()->json(['status' => 200, 'msg' => 'Successfully Assign', 'tab' =>'task' ]);

	        

	    }else{

	        

	         return response()->json(['status' => 201, 'msg' => ' Not Assign ' , 'tab' =>'task' ]);

	        

	    }

	    

	}

	

	function assign_project_users(Request $request){

	    

	   // dd($request->all());

	    $user_id =  Auth::guard('main_users')->user()->id;

	    $userid = json_decode($request->users_id);

	     DB::table('tm_project_employees')->where('project_id',$request->project_id)->delete();

	    foreach($userid as $userids){

	      

	   //   $getcount = DB::table('tm_project_employees')->where('project_id',$request->project_id)->where('emp_id',$userids)->count();

	     

	   //     if($getcount == 0 ){

	     $project  =  [

	        

	        'project_id' => $request->project_id,

	        'emp_id' => $userids,

	        'created_by' => $user_id,

	        'modified_by' => $user_id,

	        'is_active' => 1,

	        'created' => date('Y-m-d h:i:s'),

	        'modified' => date('Y-m-d h:i:s'),

	        

	        ];

	    

	    $project = DB::table('tm_project_employees')->insert($project);

	       // }

	    

	    

	    }

	    

	    

	    if($project){

	        

	         return response()->json(['status' => 200, 'msg' => 'Successfully Assign', 'tab' =>'resource','project_id' =>$request->project_id  ]);

	        

	    }else{

	        

	         return response()->json(['status' => 201, 'msg' => ' Not Assign ' , 'tab' =>'resource' ]);

	        

	    }

	}

	

	public function project_view($id){

	    

	     $user_id =  Auth::guard('main_users')->user()->id;

	     $form_show = DB::table('tm_forms')->get();

	     $projectview = DB::table('tm_projects')->leftjoin('main_users','tm_projects.manager_id','=','main_users.id')->leftjoin('tm_clients','tm_projects.client_id','=','tm_clients.id')->leftjoin('main_currency','tm_projects.currency_id','=','main_currency.id')->where('tm_projects.id',$id)->where('tm_projects.is_active',1)->select('tm_projects.*','tm_clients.client_name','main_currency.currencyname','main_users.userfullname','tm_projects.manager_id')->first();

	   

	          $all_seconds = 0;

        	    $assignproject = DB::table('tm_emp_timesheets')->where('project_id',$projectview->id)->get();

        	    if(isset($assignproject) && !empty($assignproject)){

        	        foreach($assignproject as $assignprojects){

        	        

        	         list($hour, $minute) = explode(':', $assignprojects->week_duration);

	                      $h = (int)$hour;

	                      $m  = (int)$minute;

	                        

	                     $all_seconds += $h * 3600;

                         $all_seconds += $m * 60;

        	        }

        	        

        	          $total_minutes = floor($all_seconds/60);

                    

                     $hours = floor($total_minutes / 60); 

                      $minutes = $total_minutes % 60;

                       

           

                   $week_hour =  sprintf('%02d:%02d', $hours, $minutes);

                   $projectview->actualhour = $week_hour;

        	        

        	        

        	        

        	    

        	    

        	}

	

//	dd($projectview);

	   

	     $taskview = DB::table('tm_project_tasks')->leftjoin('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->leftjoin('main_users','tm_project_tasks.created_by','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('tm_milestone','tm_project_tasks.milestone_id','=','tm_milestone.id')->where('tm_project_tasks.project_id',$id)->where('tm_project_tasks.is_active',1)->select('tm_project_tasks.*','main_users.userfullname','tm_tasks.task','main_jobtitles.jobtitlename','tm_milestone.milestone_name')->get();

	    

	      

	    

	     $project_user_list = DB::table('tm_project_employees')->leftjoin('main_users as user_created_by','tm_project_employees.created_by','=','user_created_by.id')->leftjoin('main_users','tm_project_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('main_roles','main_users.emprole','=','main_roles.id')->where('tm_project_employees.project_id',$id)->where('tm_project_employees.is_active',1)->select('main_users.*','main_users.userfullname','main_roles.rolename','user_created_by.userfullname as created','main_jobtitles.jobtitlename')->get();

	      // dd($project_user_list);

	      

	       

	   //    foreach($project_user_list as $assignlist){

	   //       $assin[] =  $assignlist->id;

	   //    }

	       

	      

	   //    $user_list = DB::table('main_users')->join('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->join('main_roles','main_users.emprole','=','main_roles.id')->whereNotIn('main_users.id',$assin)->where('emprole','!=', 1)->where('main_users.isactive',1)->select('main_users.*','main_users.userfullname','main_roles.rolename','main_jobtitles.jobtitlename')->get();

	    

	   //   return view('projects.edit_project',['projectedit'=>$projectedit,'taskedit' =>$tastedit,'userlist' => $project_user_list,'newuserlist' =>$user_list ]);

	    

	    

	    return view('projects.project_view',['projectview' => $projectview,'taskList' =>$taskview,'userlist' => $project_user_list,'project_id' => $id,'current_user_id' => $user_id,'form_show' => $form_show]);

	    

	}

	

	public function new_project(){

	    

	    return view('projects.create_project');

	}

	

	

	public function assign_more_task_inuser(Request $request){

	    

	    dd($request->all());

	    

	}

	

	public function assign_task(Request $request){

	   // dd($request->all());

	     $projecttaskuser = [];

	    $taskview = DB::table('tm_project_tasks')->leftjoin('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_tasks.project_id',$request->project_id)->where('tm_project_tasks.is_active',1)->select('tm_project_tasks.*','tm_tasks.task')->get();

	    if(isset($taskview)){

	    foreach($taskview as $key =>  $taskviews){

	        

	       $taaskuser = DB::table('tm_project_task_employees')->where('project_id',$taskviews->project_id)->where('task_id',$taskviews->task_id)->select('emp_id')->get();

	       

	       foreach($taaskuser as $taaskusers){

	           

	           $projecttaskuser[$key][] =   $taaskusers->emp_id;

	           

	       }

	        

	        // $taskviews->userassigned_task

	        

	    }

	    }

	    

	//  dd($taskview);

	    

	    $getuser = DB::table('main_users')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->where('main_users.id',$request->user_id)->select('main_users.*','main_jobtitles.jobtitlename')->first();

	    

	    //dd($getuser);

	    

	    if(!empty($getuser->profileimg)){

	        

	         $profile = URL::to('public/').$getuser->profileimg;

	        

	    }else if($getuser->prefix == 1 && !empty($getuser->prefix)){

	        

	        $profile = URL::to('public/uploads/male.png');

	        

	    }else if($getuser->prefix == 2 || $getuser->prefix == 3 && !empty($getuser->prefix)){

	        

	         $profile = URL::to('public/uploads/female.png');

	         

	   

	        

	    }else{

	        

	      $profile = URL::to('public/uploads/human.png');

	        

	    }

	   

	    

	    

	    $html = '';

	    $html .= '<div class="row"><div class="col-sm-4 append_div cursorpointer">

                                                            <div class="card m-b-10 float-left width100 box-shadow">

                                                                <div class="media p-l-5 p-r-5 p-t-5">';

                                                                

                                                                 $html .= '<img class="d-flex mr-3 rounded-circle"

                              src="'.$profile.'" alt="Generic placeholder image" height="40">';

                                                                

                                                               

                                                                 

                              

                                                                 $html .= '<input type="hidden" class="user_id" value="'.$getuser->id.'">   

                                                                        

                                                                        

                                                                    <div class="media-body">

                                                                        <h6 class="mt-0 mb-0 font-16 text-info">'.$getuser->userfullname.'

                                                                            </h6>

                                                                        <p class="m-0 font-12">'.$getuser->employeeId.'</p>

                                                                       

                                                                    </div>

                                                                </div>

                                                                <div class="mainhilight">

                                                                    <span class="font-500">'.$getuser->jobtitlename.'</span>

                                                                </div>

                                                            </div>

                                                        </div></div>';

                  

                  

                  

                 $html .= '<div class="col-sm-12 p-0"><table class="table font-14">

  <thead>

    <tr>

     

      <th scope="col">Task</th>

      <th scope="col">Estimated hours</th>

      <th scope="col">Actual hours</th>

    </tr>

  </thead>

  <tbody>';

  

  foreach($taskview as  $k => $taskviews){

      

             

        	     $all_seconds=0;

        	    $assignproject = DB::table('tm_emp_timesheets')->where('project_id',$request->project_id)->where('project_task_id',$taskviews->id)->get();

        	    if(isset($assignproject) && !empty($assignproject)){

        	        foreach($assignproject as $assignprojects){

        	        

        	         list($hour, $minute) = explode(':', $assignprojects->week_duration);

	                      $h = (int)$hour;

	                      $m  = (int)$minute;

	                        

	                     $all_seconds += $h * 3600;

                         $all_seconds += $m * 60;

        	        }

        	        

        	          $total_minutes = floor($all_seconds/60);

                    

                     $hours = floor($total_minutes / 60); 

                      $minutes = $total_minutes % 60;

                       

           

                   $week_hour =  sprintf('%02d:%02d', $hours, $minutes);

                 

        	        

        	    }

        	    

        	

      

      if(isset($projecttaskuser[$k])){

      if(in_array($getuser->id,$projecttaskuser[$k])){

          

          $check = 'Checked';

          

      }else{

          

          $check = '';

          

      }

      }else{

          

           $check = '';

          

      }

      

    $html .= '<tr>

       

      <td>

                                                            <div class="custom-control custom-checkbox">

      <input type="checkbox" name="task_id[]"  class="custom-control-input" value="'.$taskviews->task_id.'" '.$check.'><label class="custom-control-label" for="customControlInline">'.$taskviews->task.'</label></div></td>

      <td>'.$taskviews->estimated_hrs.'</td>

      <td>'.$week_hour.'</td>

    </tr>';

    

  }

  

  $html .= '</tbody>

</table>





<button type="button" onclick="assign_more_user('.$request->user_id.')" class="btn btn-primary">Assign Task</button></div>';

                  

                  return response()->json(['status' => 200, 'msg' => 'Successfully Assign','assgintask' =>$html ]);

                 

	    

	    

	}

	

	

	function assign_task_view(Request $request){

	    

	  

	 // dd($request->all());

	    

	     $getuser = DB::table('main_users')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->where('main_users.id',$request->user_id)->select('main_users.*','main_jobtitles.jobtitlename')->first();

	    

	    //dd($getuser);

	    

	    if(!empty($getuser->profileimg)){

	        

	         $profile = URL::to('public/').$getuser->profileimg;

	        

	    }else if($getuser->prefix == 1 && !empty($getuser->prefix)){

	        

	        $profile = URL::to('public/uploads/male.png');

	        

	    }else if($getuser->prefix == 2 || $getuser->prefix == 3 && !empty($getuser->prefix)){

	        

	         $profile = URL::to('public/uploads/female.png');

	        

	    }else{

	        

	     $profile = URL::to('public/uploads/human.png');

	        

	    }

	   

	    

	    

	    $html = '';

	    $html .= '<div class="col-sm-4 append_div cursorpointer">

                                                            <div class="card m-b-10 float-left width100 box-shadow">

                                                                <div class="media p-l-5 p-r-5 p-t-5">';

                                                                

                                                                 $html .= '<img class="d-flex mr-3 rounded-circle"

                              src="'.$profile.'" alt="Generic placeholder image" height="40">';

                                                                

                                                               

                                                                 

                              

                                                                 $html .= '<input type="hidden" class="user_id" value="'.$getuser->id.'">   

                                                                        

                                                                        

                                                                    <div class="media-body">

                                                                        <h6 class="mt-0 mb-0 font-16 text-info">'.$getuser->userfullname.'

                                                                            </h6>

                                                                        <p class="m-0 font-12">'.$getuser->employeeId.'</p>

                                                                       

                                                                    </div>

                                                                </div>

                                                                <div class="mainhilight">

                                                                    <span class="font-500">'.$getuser->jobtitlename.'</span>

                                                                </div>

                                                            </div>

                                                        </div>';

                                                        

                                                          $html .= '<div class="col-sm-12 "><table class="table">

  <thead>

    <tr>

     

      <th scope="col">Task</th>

      <th scope="col">Estimated hours</th>

      <th scope="col">Actual hours</th>

    </tr>

  </thead>

  <tbody>';

  

  

  

    $taskview = DB::table('tm_project_tasks')->leftjoin('tm_project_task_employees','tm_project_task_employees.task_id','=','tm_project_tasks.task_id')->leftjoin('tm_tasks','tm_project_tasks.task_id','=','tm_tasks.id')->where('tm_project_task_employees.emp_id',$request->user_id)->where('tm_project_tasks.project_id',$request->project_id)->where('tm_project_tasks.is_active',1)->groupBy('tm_project_task_employees.task_id')->select('tm_project_tasks.*','tm_tasks.task')->get();

	 //dd($taskview);

  if(!empty($taskview)){

  foreach($taskview as  $k => $taskviews){

      

              	

        	     $all_seconds=0;

        	    $assignproject = DB::table('tm_emp_timesheets')->where('project_id',$request->project_id)->where('emp_id',$request->user_id)->where('project_task_id',$taskviews->id)->get();

        	    if(isset($assignproject) && !empty($assignproject)){

        	        foreach($assignproject as $assignprojects){

        	        

        	         list($hour, $minute) = explode(':', $assignprojects->week_duration);

	                      $h = (int)$hour;

	                      $m  = (int)$minute;

	                        

	                     $all_seconds += $h * 3600;

                         $all_seconds += $m * 60;

        	        }

        	        

        	          $total_minutes = floor($all_seconds/60);

                    

                     $hours = floor($total_minutes / 60); 

                      $minutes = $total_minutes % 60;

                       

           

                   $week_hour =  sprintf('%02d:%02d', $hours, $minutes);

                  

        	        

        	        

        	        

        	    }

        	    

        	

      



    $html .= '<tr>

       

      <td>'.$taskviews->task.'</td>

      <td>'.$taskviews->estimated_hrs.'</td>

      <td>'.$week_hour??'00:00'.'</td>

    </tr>';

    

  }

  }else{

      

      

    $html .= '<tr>

       

         <td colspan="3">Task Not Found</td>

     

    </tr>';

      

  }

  

  $html .= '</tbody>

</table></div>';

                                                        

                                                          return response()->json(['status' => 200, 'msg' => 'Successfully Assign','assgintask' =>$html ]);

	    

	}

	

	function assign_task_more_user(Request $request){

	    

	    

	   // dd($request->all());

	   $task_id =  json_decode($request->taskid);

	    $user_id =  Auth::guard('main_users')->user()->id;

	    

	      DB::table('tm_project_task_employees')->where('project_id',$request->project_id)->where('emp_id',$request->user_id)->delete();

	   

	   foreach($task_id as $task_ids){

	       

	     

	       

	       $isnt = DB::table('tm_project_task_employees')->insert([

	           

	           'project_id' => $request->project_id,

	           'task_id' => $task_ids,

	           'project_task_id' => $request->project_task_id,

	           'emp_id' => $request->user_id,

	           'created_by' => $user_id,

	           'modified_by' => $user_id,

	           'is_active' =>1,

	           'created' => date('Y-m-d h:i:s'),

	            'modified' => date('Y-m-d h:i:s'),

	           ]);

	   }

	   

	   

	   if($isnt){

	       

	        return response()->json(['status' => 200, 'msg' => 'Successfully Task Assign']);

	       

	   }else{

	       

	        return response()->json(['status' => 201, 'msg' => 'Not Client']);

	   }

	   

	    

	    

	}

	

	public function addclientproject(Request $request){

	    

	   $user_id =  Auth::guard('main_users')->user()->id;

	    

	  $arr = array(

	      'client_name' => $request->client_name,

	      'email' => $request->client_email,

	      'phone_no' => $request->client_phone,

	      'poc' => $request->contact,

	      'address' => $request->client_address,

	      'country_id' => $request->country,

	      'state_id' => $request->state,

	      'city_id' => $request->city,

	      'is_active' => 1,

	      'created_by' =>$user_id,

	      'created' => date('Y-m-d h:i:s'),

	       'modified' => date('Y-m-d h:i:s'),

	      

	      );

	      

	      

	       $res = Db::table('tm_clients')->insert($arr);

	       

	       $getClient = Db::table('tm_clients')->where('is_active',1)->get();

	      

	       return response()->json(['status' => 200, 'msg' => 'Successfully add Client','allclient' =>$getClient]);

	    

	}

	

	

	public function add_new_project(Request $request){

	    

	 //  dd($request->all());

	    

	     $user_id =  Auth::guard('main_users')->user()->id;

	    $project_name = DB::table('tm_projects')->where('project_name',$request->project)->count();

	  

	    

	  

	   $project = array(

	       'project_name' => $request->project,

	        'project_status' => $request->project_status,

	         'base_project' => $request->base_project,

	          'project_category' => $request->category,

	           'builder' => $request->builder,
	           'location' => $request->location,
	           'project_temp_id' => $request->project_temp_id,
	           'temp_id' => $request->temp_id,
	           'work_order_no' => $request->work_order_no,
	           'description' => $request->project,

	            'client_id' => $request->project_client,

	            'currency_id' => $request->currecy,

	             'project_type' => $request->checkval,

	              'estimated_hrs' => $request->estimated,

	               'start_date' => $request->from_date,

	               'end_date' => $request->to_date,

	               'created_by' => $user_id,

	               'modified_by' => $user_id,

	               'manager_id' => $request->manager,
	               'coordinator' => $request->coordinator,
	               'stage' => $request->stage,

	               'is_active' => 1,

	               'created' => date('Y-m-d h:i:s'),

	               'modified' => date('Y-m-d h:i:s'),

	       

	       );

	       

	      

	                        

	    if(isset($request->project_id)){

	        

	           DB::table('tm_projects')->where('id',$request->project_id)->update($project);

	           

	           $getmanager = DB::table('tm_project_employees')->where(['project_id' => $request->project_id,'manager_id' => 1])->first();

	           if(isset($getmanager)){

	           	      

	           	 if(isset($request->coordinator)){

	           	 	 DB::table('tm_project_employees')->where('project_id',$request->project_id)->where('emp_id',$request->coordinator)->delete();

	      	     $addcoodinotor = array(

	               'project_id' => $request->project_id,

	               'emp_id' => $request->coordinator,

	               'manager_id' => 1,

	               'created_by' => $user_id,

	               'modified_by' =>  $user_id,

	               'is_active' => 1,

	               'created' => date('Y-m-d h:i:s'),

	               'modified' =>  date('Y-m-d h:i:s'),

	               

	               );

	      DB::table('tm_project_employees')->insert($addcoodinotor);

	      }


	                   DB::table('tm_project_employees')->where(['project_id' => $request->project_id,'manager_id' => 1])->update(['emp_id' =>$request->manager]);

	           }else{





				 DB::table('tm_project_employees')->where(['project_id' => $request->project_id,'emp_id' => $request->manager])->delete();



				  $addmanager = array(

	               'project_id' => $request->project_id,

	               'emp_id' => $request->manager,

	               'manager_id' => 1,

	               'created_by' => $user_id,

	               'modified_by' =>  $user_id,

	               'is_active' => 1,

	               'created' => date('Y-m-d h:i:s'),

	               'modified' =>  date('Y-m-d h:i:s'),

	               

	               );

	              
	      DB::table('tm_project_employees')->insert($addmanager);

	      if(isset($request->coordinator)){

	      	     $addcoodinotor = array(

	               'project_id' => $request->project_id,

	               'emp_id' => $request->coordinator,

	               'manager_id' => 1,

	               'created_by' => $user_id,

	               'modified_by' =>  $user_id,

	               'is_active' => 1,

	               'created' => date('Y-m-d h:i:s'),

	               'modified' =>  date('Y-m-d h:i:s'),

	               

	               );

	      DB::table('tm_project_employees')->insert($addcoodinotor);

	      }




			   }

	        

	           

	             return response()->json(['status' => 202, 'msg' => 'Successfully Update Project','project_id' =>$request->project_id ]);

	        

	    }else{

	        

	        

	        

	          if($project_name > 0){

	        

	           return response()->json(['status' => 202, 'msg' => ' Project Allready Exist']);

	          }

	        

	         $inst = DB::table('tm_projects')->insertGetId($project);

	        

	         

	       

	    

	       

	       if($inst){

	           

	           $addmanager = array(

	               'project_id' => $inst,

	               'emp_id' => $request->manager,

	               'manager_id' => 1,

	               'created_by' => $user_id,

	               'modified_by' =>  $user_id,

	               'is_active' => 1,

	               'created' => date('Y-m-d h:i:s'),

	               'modified' =>  date('Y-m-d h:i:s'),

	               

	               );

	           $folder = array(
              'project_id' => $inst,
              'folder_name' => $request->project,
              'created_by' => $user_id,
              'create_at' => date('Y-m-d h:i:s')

	           	);

	              DB::table('tm_folder')->insert($folder);

	

	      DB::table('tm_project_employees')->insert($addmanager);

	      
            if($user_id != 1){
	       $addcreator = array(

	               'project_id' => $inst,

	               'emp_id' => $user_id,

	               'created_by' => $user_id,

	               'modified_by' =>  $user_id,

	               'manager_id' => 2,

	               'is_active' => 1,

	               'created' => date('Y-m-d h:i:s'),

	               'modified' =>  date('Y-m-d h:i:s'),

	               

	               );

	               

	

	      DB::table('tm_project_employees')->insert($addcreator);

	           }

	             

	           

	             return response()->json(['status' => 200, 'msg' => 'Successfully add Project','project_id'=>$inst]);

	           

	       }else{

	           

	             return response()->json(['status' => 201, 'msg' => 'Not add Project']);

	           

	       }

	    }

	}

    

    

    public function add_task(Request $request){

       

         $user_id =  Auth::guard('main_users')->user()->id;

        

        $project_get = DB::table('tm_projects')->where('id',$request->project_id)->first();
      
      $assign_new_task = json_decode($request->user_assign_new_task);


      if($project_get->start_date > $request->tast_start_date && $project_get->end_date < $request->tast_end_date){

      	 return response()->json(['status' => 201, 'msg' => ' Task Date is not Correct ']);

      }
      

        if($project_get->estimated_hrs > $request->estimate){

        

        $task = array(

            

            'task' => $request->task_name,

              'is_default' => $request->task_name,

                'created_by' => $user_id,

                  'modified_by' => $user_id, 

                  'is_active' => 1,

                  'created' => date('Y-m-d h:i:s'),

                  'modified' => date('Y-m-d h:i:s'),

            

            );

            

            $task_id = Db::table('tm_tasks')->insertGetId($task);

            

            

            $project_task = array(

                'project_id' => $request->project_id,

                'task_id' => $task_id,
                'milestone_id' => $request->milestone_id,

                'estimated_hrs' => $request->estimate,

                'is_billable' => $request->customControlInline,

                'created_by' => $user_id,

                'modified_by' => $user_id,

                'is_active' => 1,

                'task_start_date' => $request->tast_start_date,

                 'task_end_date' => $request->tast_end_date,

                  'task_status' => 'in-progress', 

                  'created' => date('Y-m-d h:i:s'),

                   'modified' => date('Y-m-d h:i:s'),

                

                );

                

                 $project_task_inst = Db::table('tm_project_tasks')->insertGetId($project_task);

	       

	       if($project_task_inst){
               if(count($assign_new_task) > 0){
	           foreach ($assign_new_task as $key => $assign_user) {
	           DB::table('tm_project_task_employees')->insert([
               'project_id' => $request->project_id,
               'task_id' =>$task_id,
               'project_task_id' => $project_task_inst, 
               'emp_id' => $assign_user,
               'created_by' => $user_id,
               'modified_by' => $user_id,
               'is_active' => 1,
               'created' => date('Y-m-d h:i:s'),
               'modified' => date('Y-m-d h:i:s'),

	           ]);
	           }
	           }

	             return response()->json(['status' => 200, 'msg' => 'Successfully Added Task','project_task_id'=>$project_task_inst,'tab' =>'task','project_id' => $request->project_id]);

	           

	       }else{

	           

	             return response()->json(['status' => 201, 'msg' => 'Not Added Task']);

	           

	       }

        }else{

            

               return response()->json(['status' => 201, 'msg' => 'Exceed Hour In Project']);

	           

            

        }

        

    }

    

    public function delete_project_user(Request $request){

        

          $delete = DB::table('tm_project_employees')->where('emp_id',$request->projectuserassign)->where('project_id',$request->project_id)->delete();

            

         if($delete){

	           

	             return response()->json(['status' => 200, 'msg' => 'Successfully Deleted']);

	           

	       }else{

	           

	             return response()->json(['status' => 201, 'msg' => 'Not Delete']);

	           

	       }

        

    }

    

    public function delete_task(Request $request){

        

        //dd($request->all());

        

      $delete = DB::table('tm_project_tasks')->where('task_id',$request->task_id)->delete();

               DB::table('tm_tasks')->where('id',$request->tast_id)->delete();

         if($delete){

	           

	             return response()->json(['status' => 200, 'msg' => 'Successfully Deleted']);

	           

	       }else{

	           

	             return response()->json(['status' => 201, 'msg' => 'Not Delete']);

	           

	       }

        

    }

    

    public function assign_task_in_user(Request $request){

        

          dd($request->all());

        

    }

    

    public function update_stage(Request $request){

        

        $update = DB::table('tm_projects')->where('id',$request->project_id)->update(['stage'=>$request->stage]);

        

        if($update){

	           

	             return response()->json(['status' => 200, 'msg' => 'Successfully updated']);

	           

	       }else{

	           

	             return response()->json(['status' => 201, 'msg' => 'Not update']);

	           

	       }

	}

	

	function remove_assign_task(Request $request){



		$project_task_id = DB::table('tm_project_tasks')->where('project_id',$request->project_id)->where('task_id',$request->assgin_task_id)->first();

 

		$delte = DB::table('tm_project_task_employees')->where('emp_id',$request->userid)->where('project_id',$request->project_id)->where('project_task_id', $project_task_id->id)->delete();

        if($delte){



			return response()->json(['status' => 200, 'msg' => 'update']);



		}else{



			return response()->json(['status' => 201, 'msg' => 'Not update']);



		}

		

	}


public function all_milstone(Request $request){

$get_milestone = DB::table('tm_milestone')->where('project_id',$request->project_id)->orderBy('id','ASC')->get();

$single_milestone = DB::table('tm_milestone')->where('project_id',$request->project_id)->orderBy('id','DESC')->first();


$html = '';
$i = 1;
foreach ($get_milestone as $key => $get_milestones) {
	$html .= '<tr>
	<td>'.$i++.'</td>
	<td>'.$get_milestones->milestone_name.'</td>
	<td>'.$get_milestones->color.'</td>
	<td>'.$get_milestones->start_date.'</td>
	<td>'.$get_milestones->end_date.'</td>
	<td>'.substr($get_milestones->description,0,20).'</td>';


	$html .= '<td>';
  
	

	$html .= '<i  onclick="edit_milstonr('.$get_milestones->id.')" class="mdi mdi-pencil text-warning" data-toggle="tooltip" title="" data-original-title="Edit"></i>';

 if($get_milestones->id == $single_milestone->id){

$html .= '<i onclick="delete_milstonr(this,'.$get_milestones->id.')" class="fa fa-trash font-blue" data-toggle="tooltip" title="" data-original-title="Delete"></i>';

                                                     
    }


    $html .= '</td></tr>';
}

return response()->json(['status' => 200, 'milstone' => $html]);




}

public function delete_milstone(Request $request){

	$del = DB::table('tm_milestone')->where('id',$request->milstone_id)->delete();

     return response()->json(['status' => 200, 'msg' => 'Successfully Deleteed']);

}

function add_milstone(Request $request){

	  $user_id =  Auth::guard('main_users')->user()->id;

	$addArr = array(
      'project_id' => $request->project_id,
      'milestone_name' => $request->milestone_name,
      'start_date' => $request->milestone_start_date,
      'end_date' => $request->milestone_end_date,
      'created_by' =>  $user_id,
      'modifed_by' =>  $user_id,
      'created_at' => date('Y-m-d h:i:s'),
      'modifed_at' => date('Y-m-d h:i:s'),
      'color' => $request->milestone_color,
      'description' => $request->milestone_desc,


	);
   if(isset($request->milstone_id)){

   	$inst = DB::table('tm_milestone')->where('id',$request->milstone_id)->update($addArr);
	return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

   }else{

   	$inst = DB::table('tm_milestone')->insert($addArr);
	return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

   }
	

}

function edit_milstone(Request $request){

	$milestone = DB::table('tm_milestone')->where('id',$request->milstone_id)->first();

	return response()->json(['status' => 200, 'milstone' => $milestone]);

}
    
function get_milstone_date(Request $request){


	$milestone = DB::table('tm_milestone')->where('id',$request->milestone_id)->first();
    if($milestone){
    return response()->json(['status' => 200, 'milstone' => $milestone]);
    }else{

    	return response()->json(['status' => 201, 'milstone' => '']);

    }
	

}





public function upload_file_folder(Request $request){

$user_id =  Auth::guard('main_users')->user()->id;

 $get_folder = DB::table('tm_folder')->where('project_id',$request->project_id)->first();

 if(isset($get_folder)){
  $folder_id = $get_folder->id;
 }else{
 $folder_id = null;
 }

         if($request->hasFile('images')) {

          
           foreach($request->file('images') as $file){

           $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;

           $file->move(public_path().'/uploads/attach/files/', $name);

           $filename = '/uploads/attach/files/'. $name;

           $arr = array(


'project_id' => $request->project_id,
'folder_id' => $folder_id,
'file_name' => $filename,
'files' => $filename,
'created_by' => $user_id,
'created_at' => date('Y-m-d h:i:d'),
           );

    $insert = DB::table('tm_folder_uploads')->insert($arr);

       }

        }

          return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);


}



function all_files_project(Request $request){



$get_all_files = DB::table('tm_folder_uploads')->where('project_id',$request->project_id)->get();

$html = '';
$i = 1;
foreach ($get_all_files as $key => $value) {
$url = URL::to('/').$value->files;

$file_name = str_replace('/uploads/attach/files/', '', $value->file_name);

$html .=' <tr>
                                                    <td width="6%">'.$i++.'</td>
                                                    <td>


 <span id="r_amount_'.$value->id.'">'.$file_name.'</span>
                                  
								<i class="mdi mdi-pen text-warning" id="edit_icon_'.$value->id.'" onclick="show_input('.$value->id.')" ></i>
                                      

								<span style="display:none"  id="editText_'.$value->id.'">
									<input type="text" class="form-control inline-block" id="r_amt_'.$value->id.'" style="width: auto;">
									<i onclick="update_r_amt('.$value->id.')" class="btn btn-primary mdi mdi-check"></i>
									<i onclick="close_r_amt('.$value->id.')" class="btn btn-danger mdi mdi-window-close"></i>
								</span>

                                                    </td>
                                                    <td width="6%">
                                                    <a href='.$url.' download>
                                                        <i class="mdi mdi-download text-blue"
                                                                data-toggle="tooltip"
                                                                title="Download"></i></a>
                                                       <a href="javascript:void(0)" onclick="delete_file(this,'.$value->id.')">         
                                                        <i class="mdi mdi-delete text-danger" data-toggle="tooltip" title="Delete"></i></a>
                                                    </td>
                                                </tr>';

}

return response()->json(['status' => 200, 'all_files' => $html]);

}
function form_history($id){

$get_form = DB::table('tm_form_histroy')->join('main_users','main_users.id','=','tm_form_histroy.create_by')->select('tm_form_histroy.*','main_users.userfullname')->get();

return view('projects.form_histroy',['get_form' => $get_form]);
}

function get_coordinator(Request $request){

$get_user = DB::table('main_users')->whereNotIn('id',[$request->m_id])->where('emprole',3)->orderBy('userfullname','ASC')->get();
$html = '';
foreach ($get_user as $key => $get_user) {
	$html .='<option value='.$get_user->id.'>'.$get_user->userfullname.'</option>';
}

 
   return response()->json(['status' => 200, 'msg' => 'Addedd successfully','manager' => $html ]);

}

function update_file_name(Request $request){

	$updatfile = DB::table('tm_folder_uploads')->where('id',$request->file_id)->update(['file_name' => $request->file_name]);
	   return response()->json(['status' => 200, 'msg' => 'Addedd successfully' ]);

}

}