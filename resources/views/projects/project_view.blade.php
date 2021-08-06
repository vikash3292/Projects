 @extends('layouts.superadmin_layout')
@section('content')
<?php  //echo "<pre>"; print_r($classData); ?>
<!-- Content Wrapper. Contains page content -->
@section('extra_css')
<style>


.disabledTab{
    pointer-events: none;
}
</style>

@stop
      <!-- Start content -->
        <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Project View</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Project View</a>
                           </li>
                            <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">{{$projectview->project_name}}</a>
                           </li>
                           
                           
                        </ol>
                     </div>
                     
                     
                   @if($current_user_id == $projectview->manager_id)
                      
                 
                     <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('/edit-project')}}/{{$projectview->id}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit Project</button>
                              </a>
                           </div>
                        </div>
                     </div>
                     @elseif($current_user_id == $projectview->coordinator)
 
                  <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('/edit-project')}}/{{$projectview->id}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit Project</button>
                              </a>
                           </div>
                        </div>
                     </div>

                      @elseif(PermissionHelper::frontendPermission('edit-project'))
                     
                        <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('/edit-project')}}/{{$projectview->id}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit Project</button>
                              </a>
                           </div>
                        </div>
                     </div>
                     
                     @endif
                
                     

                     
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                            <div class="tab">
                                <button class="tablinks" onclick="openTabview(event, 'details')" id="defaultOpen">Details
                                </button>
                                <!-- <button class="tablinks" onclick="openTab(event, 'leaves')">Leaves</button>
                                <button class="tablinks" onclick="openTab(event, 'holiday')">Holiday</button> -->
                                <button class="tablinks" onclick="openTabview(event, 'tasks')">Tasks</button>
                                <button class="tablinks" onclick="openTabview(event, 'resources')">QCI Expert</button>
                                <button class="tablinks" onclick="openTabview(event, 'filemanager')">Files </button>
                                      
                                       <button class="tablinks" onclick="openTabview(event, 'forms')">Forms</button>


                                <button class="tablinks" onclick="openTabview(event, 'payment')">Payments</button>
                                <button class="tablinks" onclick="openTabview(event, 'comnication')">Comnication</button>
                             </div> 
                             <div id="details" class="tabcontent">
                                <div class="col-12">
                                    <h5 class="h5after"><span>Details</span></h5>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empcode" class="col-lg-4 col-form-label">Project
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->project_name}}</label>
                                          </div>
                                       </div>
                                    </div>

                                     <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empcode" class="col-lg-4 col-form-label">Location
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->location}}</label>
                                          </div>
                                       </div>
                                    </div>

                                     <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empcode" class="col-lg-4 col-form-label">Builder
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->builder}}</label>
                                          </div>
                                       </div>
                                    </div>

                                     <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empcode" class="col-lg-4 col-form-label">Project ID
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->project_temp_id}}</label>
                                          </div>
                                       </div>
                                    </div>

                                     <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empcode" class="col-lg-4 col-form-label">Temp ID
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->temp_id}}</label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empcode" class="col-lg-4 col-form-label">Work Order No
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->work_order_no}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="empid" class="col-lg-4 col-form-label">Client</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->client_name}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="prifix" class="col-lg-4 col-form-label">Description</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->description}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="firstname" class="col-lg-4 col-form-label">Currency</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->currencyname}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="logo" class="col-lg-4 col-form-label">Status</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->project_status}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="email" class="col-lg-4 col-form-label">Project Type</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->project_type}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="cid" class="col-lg-4 col-form-label">Start Date</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{date('d-M-Y',strtotime($projectview->start_date))}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="mode" class="col-lg-4 col-form-label">End Date</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{date('d-M-Y',strtotime($projectview->end_date))}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="role" class="col-lg-4 col-form-label">Estimated Hours</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->estimated_hrs}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="role" class="col-lg-4 col-form-label">Actual Hours</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$projectview->actualhour}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    
                                      <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="role" class="col-lg-4 col-form-label">Project Associate </label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{ucwords($projectview->userfullname)}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <?php
                                    $stage  = DB::table('main_stage')->get();
                                    ?>
                                     @if($current_user_id == $projectview->manager_id)
                                    
                                    <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="role" class="col-lg-4 col-form-label">Stage</label>
                                          <div class="col-lg-8 col-form-label">
                                             <select class="form-control" id="stage">
                                                      
                                                        @foreach($stage as $stages)
                                                        <option value="{{$stages->id}}" @if($projectview->stage == $stages->id) selected @endif>{{$stages->stage_name}}</option>
                                                        @endforeach
                                                       
                                                                    </select>
                                          </div>
                                       </div>
                                    </div>
                                     @elseif(PermissionHelper::frontendPermission('edit-project'))
                                     
                                                  <div class="col-md-6">
                                       <div class="form-group row m-0 b-b-d">
                                          <label for="role" class="col-lg-4 col-form-label">Stage</label>
                                          <div class="col-lg-8 col-form-label">
                                             <select class="form-control" id="stage">
                                                       
                                                        @foreach($stage as $stages)
                                                        <option value="{{$stages->id}}" @if($projectview->stage == $stages->id) selected @endif>{{$stages->stage_name}}</option>
                                                        @endforeach
                                                       
                                                                    </select>
                                          </div>
                                       </div>
                                    </div>
                                     
                                     @endif
                                    
                                    
                                    
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12 m-t-20">
                                       <h4>Activity Gantt Chart</h4>
                                       <div id="chart_div" class="m-t-20"></div>
                                    </div>
                                 </div>
                             </div>
                             <div id="tasks" class="tabcontent">
                                <div class="col-12">
                                    <h5 class="h5after"><span>Tasks</span></h5>
                                 </div>
                                 <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap font-14"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       <thead>
                                          <tr>
                                             <th>S.No</th>
                                             <th>Name</th>
                                             <th>Milstone</th>
                                             <th>Estimated Hours</th>
                                             <th>Actual Hours</th>
                                             <th>Start Date</th>
                                             <th>End Date</th>
                                             <th>Status</th>
                                             <th>Created By</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        
                                           @php($i = 1)
                                           @foreach($taskList as $taskLists)
                                           
                                           <?php
                               
        $taskAssign  = DB::table('tm_project_task_employees')->join('main_users','tm_project_task_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->join('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.task_id',$taskLists->task_id)->where('tm_project_task_employees.project_id',$project_id)->select('tm_project_task_employees.*','main_users.userfullname','main_users.employeeId','main_users.prefix','main_users.profileimg','tm_tasks.task','main_jobtitles.jobtitlename')->get();
          // dd($taskAssign);                               
                                           
            	
        	     $all_seconds=0;
        	    $assignproject = DB::table('tm_emp_timesheets')->where('project_id',$project_id)->where('project_task_id',$taskLists->id)->get();
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
        	    
       
                                          
                                           ?>
                                          <tr>
                                             <td>
                                              {{$i++}}
                                             </td>
                                             <td class="text_ellipses" data-toggle="tooltip" title="{{$taskLists->task}}">{{$taskLists->task}}</td>
                                              <td>{{$taskLists->milestone_name}}</td>
                                             <td>{{$taskLists->estimated_hrs}}</td>
                                            
                                             <td>{{$week_hour??'0'}}</td>
                                             <td>{{$taskLists->task_start_date}}</td>
                                             <td>{{$taskLists->task_end_date}}</td>
                                             <td>{{$taskLists->task_status}}</td>
                                             <td>{{$taskLists->userfullname}}</td>
                                             <td>
                                                <a href="project_view.html" data-toggle="modal" data-target="#viewtask{{$taskLists->id}}">
                                                   <i class="fa fa-eye font-blue"></i>
                                                </a>
                                             </td>
                                          </tr>
                                          
                                          
                                             <div id="viewtask{{$taskLists->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title mt-0" id="myModalLabel">View Task QCI Expert</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <div class="col-sm-12 p-0">
                  <div class="row">
                     <div class="col-sm-6">
                        <span class="font-500">Task:</span>
                        <span>{{$taskLists->task}}</span>
                     </div>
                     <div class="col-sm-6 float-right">
                        <span class="font-500">Estimated Hours:</span>
                        <span>{{$taskLists->estimated_hrs}}</span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <h5>
                           <span>QCI Expert</span>
                        </h5>
                     </div>
                    <div class="col-sm-6 float-right">
                        <span class="float-right">
                           <form role="search" class="app-search float-right"
                                                                style="height: 0;">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control m-0"
                                                                        placeholder="Search..">
                                                                    <button type="submit" style="top:10px"><i
                                                                            class="fa fa-search"></i></button></div>
                                                            </form>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="row m-t-10">
                   @foreach($taskAssign as $taskAssigns)
                  <div class="col-sm-3">
                     <div class="card m-b-10 float-left width100 box-shadow">
                        <div class="media p-l-5 p-r-5 p-t-5">
                            @if(!empty($taskAssigns->profileimg))
                            <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/')}}/{{$taskAssigns->profileimg}}" alt="Generic placeholder image" height="40">
                              @elseif($taskAssigns->prefix == 1)
                              
                               <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/male.png')}}" alt="Generic placeholder image" height="40">
                              
                              @elseif($taskAssigns->prefix == 2 || $taskAssigns->prefix == 3)
                              
                                <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/female.png')}}" alt="Generic placeholder image" height="40">
                              
                              @else
                              
                              <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/human.png')}}" alt="Generic placeholder image" height="40">
                              @endif
                              
                           <div class="media-body">
                              <h6 class="mt-0 mb-0 font-16 text-info">{{ucwords($taskAssigns->userfullname)}}</h6>
                              <p class="m-0 font-12">{{$taskAssigns->employeeId}}</p>
                              <p class="m-0 font-12">{{$taskLists->estimated_hrs}} Hrs</p>
                           </div>
                        </div>
                        <div class="mainhilight">
                           <span class="font-500">{{$taskAssigns->jobtitlename}}</span>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  <!--<div class="col-sm-3">-->
                  <!--   <div class="card m-b-10 float-left width100 box-shadow">-->
                  <!--      <div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle"-->
                  <!--            src="assets/images/users/user-6.jpg" alt="Generic placeholder image" height="40">-->
                  <!--         <div class="media-body">-->
                  <!--            <h6 class="mt-0 mb-0 font-16 text-info">Nisha Upreti</h6>-->
                  <!--            <p class="m-0 font-12">KSPL1167</p>-->
                  <!--            <p class="m-0 font-12">2 Hrs</p>-->
                  <!--         </div>-->
                  <!--      </div>-->
                  <!--      <div class="mainhilight">-->
                  <!--         <span class="font-500">HTML Developer</span>-->
                  <!--      </div>-->
                  <!--   </div>-->
                  <!--</div>-->
                  <!--<div class="col-sm-3">-->
                  <!--   <div class="card m-b-10 float-left width100 box-shadow">-->
                  <!--      <div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle"-->
                  <!--            src="assets/images/users/user-6.jpg" alt="Generic placeholder image" height="40">-->
                  <!--         <div class="media-body">-->
                  <!--            <h6 class="mt-0 mb-0 font-16 text-info">Nisha Upreti</h6>-->
                  <!--            <p class="m-0 font-12">KSPL1167</p>-->
                  <!--            <p class="m-0 font-12">2 Hrs</p>-->
                  <!--         </div>-->
                  <!--      </div>-->
                  <!--      <div class="mainhilight">-->
                  <!--         <span class="font-500">HTML Developer</span>-->
                  <!--      </div>-->
                  <!--   </div>-->
                  <!--</div>-->
                  <!--<div class="col-sm-3">-->
                  <!--   <div class="card m-b-10 float-left width100 box-shadow">-->
                  <!--      <div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle"-->
                  <!--            src="assets/images/users/user-6.jpg" alt="Generic placeholder image" height="40">-->
                  <!--         <div class="media-body">-->
                  <!--            <h6 class="mt-0 mb-0 font-16 text-info">Nisha Upreti</h6>-->
                  <!--            <p class="m-0 font-12">KSPL1167</p>-->
                  <!--            <p class="m-0 font-12">2 Hrs</p>-->
                  <!--         </div>-->
                  <!--      </div>-->
                  <!--      <div class="mainhilight">-->
                  <!--         <span class="font-500">HTML Developer</span>-->
                  <!--      </div>-->
                  <!--   </div>-->
                  <!--</div>-->
               </div>
            </div>
         </div>
      </div>
   </div>
                                          
                                          
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                             </div>
                             <div id="resources" class="tabcontent">
                                <div class="col-12">
                                    <h5 class="h5after"><span>QCI Expert</span></h5>
                                 </div>
                                
                                 <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap font-14"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       <thead>
                                          <tr>
                                             <th>S.No</th>
                                             <th>Name</th>
                                             <th>Type</th>
                                             <th>Role</th>
                                             <th>Billable Rate(INR)</th>
                                             <th>Cost Rate(INR)</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                           @php($i = 1)
                                           @foreach($userlist as $userlists)
                                           
                                           <?php
                                           
                                           $usreasigntask = DB::table('tm_project_task_employees')->leftjoin('main_users','tm_project_task_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('tm_project_tasks','tm_project_task_employees.task_id','=','tm_project_tasks.task_id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.emp_id',$userlists->id)->where('tm_project_task_employees.project_id',$project_id)->select('tm_project_tasks.estimated_hrs','tm_project_tasks.id','tm_tasks.task','main_users.userfullname','main_users.id as userid','main_users.profileimg','main_users.prefix','main_users.employeeId','main_jobtitles.jobtitlename')->get();
                                         
                                           ?>
                                           
                                          <tr>
                                             <td>
                                                {{$i++}}
                                             </td>
                                             <td class="text_ellipses" data-toggle="tooltip" title="{{ucwords($userlists->userfullname)}}">{{ucwords($userlists->userfullname)}}</td>
                                                 <td>{{$userlists->emp_type==1?'Employee':'Freelancer'}}</td>
                                             <td>{{$userlists->rolename}}</td>
                                             <td></td>
                                             <td></td>
                                             <td>
                                                <a href="project_view.html" data-toggle="modal"
                                                   data-target="#viewresource{{$userlists->id}}">
                                                   <i class="fa fa-eye font-blue"></i>
                                                </a>
                                             </td>
                                          </tr>
                                          
                                          <div id="viewresource{{$userlists->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title mt-0" id="myModalLabel">View Employee Task</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-12 m-b-10">
                     <span class="float-right">
                        <form role="search" class="app-search float-left width100" style="height: 0;">
                           <div class="form-group mb-0">
                              <input type="text" class="form-control m-0" placeholder="Search by Task..">
                              <button type="submit" style="top:10px"><i class="fa fa-search"></i></button></div>
                        </form>
                     </span>
                  </div>
                  <div class="col-sm-12">
                      
                      @foreach($usreasigntask as $usreasigntasks)
                      <?php
                      
                             
        	     $all_seconds=0;
        	    $assignproject = DB::table('tm_emp_timesheets')->where('emp_id',$usreasigntasks->userid)->where('project_id',$project_id)->where('project_task_id',$usreasigntasks->id)->get();
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
        	    
        	
                      ?>
                     <div class="card m-b-10 float-left width100 box-shadow">

                        <div class="media padding-5">
                            
                             @if(!empty($usreasigntasks->profileimg))
                            <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/')}}/{{$usreasigntasks->profileimg}}" alt="Generic placeholder image" height="40">
                              @elseif($usreasigntasks->prefix == 1)
                              
                               <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/male.png')}}" alt="Generic placeholder image" height="40">
                              
                              @elseif($usreasigntasks->prefix == 2 || $usreasigntasks->prefix == 3)
                              
                                <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/female.png')}}" alt="Generic placeholder image" height="40">
                              
                              @else
                              
                              <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/human.png')}}" alt="Generic placeholder image" height="40">
                              
                              @endif
                            
                         
                              
                           <div class="media-body col-sm-4">
                              <h6 class="mt-0 mb-0 font-16 text-info">{{ucwords($usreasigntasks->userfullname)}}</h6>
                              <p class="m-0 font-12">{{$usreasigntasks->employeeId}}</p>
                              <p class="m-0 font-12">{{$usreasigntasks->estimated_hrs}} Hrs</p>
                           </div>
                           <div class="media-body col-sm-8 text-center">
                              <div class="row">
                                 <div class="col-sm-4 div-right-b">
                                    <h6>Task</h6>
                                    <p class="m-b-5">{{$usreasigntasks->task}}</p>
                                 </div>
                                 <div class="col-sm-4 div-right-b">
                                    <h6>Estimated hours</h6>
                                    <p class="m-b-5">{{$usreasigntasks->estimated_hrs}}</p>
                                 </div>
                                 <div class="col-sm-4">
                                    <h6>Actual hours</h6>
                                    <p class="m-b-5">{{$week_hour??'00:00'}}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="mainhilight col-sm-12">
                           <span class="font-500">{{$usreasigntasks->jobtitlename}}</span>
                        </div>
                     </div>
                     
                     @endforeach
                     @if(count($usreasigntask) == 0)
                     
                     <p>Task Not Assign</p>
                     @endif
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
                                          
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              
                             </div>
                             <div id="filemanager" class="tabcontent">
                              <div class="row">
                                 <div class="col-12">
                                    <h5 class="h5after"><span>File Manager</span></h5>
                                 </div>
                                 <div class="col-12">
 <table id="datatable" class="show_all_files table table-bordered dt-responsive nowrap"
                                                     style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                     <thead>
                                                         <tr>
                                                             <th width="6%">S.No</th>
                                                             <th>File Name</th>
                                                             <th width="6%">Action</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                        
                                                     </tbody>
                                                 </table>                                
                       
                                     
                                 </div>
                                 <!-- end col -->
                             </div>
                             </div>


                   
<div id="forms" class="tabcontent">
                              <h3>Forms</h3>
                              <div class="width-float">
                                @php($i =1)
                                @foreach($form_show as $form_shows)
                                 <div class="col-sm-12">
                                    <h6>Form {{$i++}}A</h6>
                                    <div class="row m-t-10">
                                       <div class="col-2">
                                          <a href="{{URL::to('/public/')}}{{$form_shows->form_files}}" download class="btn btn-success"><i class="fa fa-download m-r-5"></i>Download</a>
                                       </div> 
                                     
                                       <div class="col-2">
                                           <a class="btn btn-warning" href="{{URL::to('form-history')}}/{{$form_shows->id}}"><i class="fa fa-history m-r-5"></i>History</a>
                                       </div>
                                    </div>
                                  </div>

                                  @endforeach
                              </div>
                           </div>

  

                             <div id="payment" class="tabcontent">
                                <div class="row">
                                   <div class="col-sm-12">
                                    <h5 class="h5after"><span>Payments<span>
                                    </h5>
                                   </div>
                                   <div class="col-sm-12">
                                    <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group row m-0">
                                               <label for="empcode" class="col-lg-4 col-form-label">Transaction ID
                                                   Name <span class="text-danger"></span></label>
                                               <div class="col-lg-8 col-form-label form-group">
                                                   <input type="text" class="form-control">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group row m-0">
                                               <label for="empid" class="col-lg-4 col-form-label">Milestone Name
                                                   <span class="text-danger"></span></label>
                                               <div class="col-lg-8 col-form-label">
                                                   <input type="text" class="form-control">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group row m-0">
                                               <label for="empcode" class="col-lg-4 col-form-label">Total
                                                   Amount <span class="text-danger"></span></label>
                                               <div class="col-lg-8 col-form-label form-group">
                                                   <input type="text" class="form-control">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group row m-0">
                                               <label for="empid" class="col-lg-4 col-form-label">Paid Date
                                                   <span class="text-danger"></span></label>
                                               <div class="col-lg-8 col-form-label">
                                                   <input type="date" class="form-control">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group row m-0">
                                               <label for="empcode" class="col-lg-4 col-form-label">Due
                                                   Date <span class="text-danger"></span></label>
                                               <div class="col-lg-8 col-form-label form-group">
                                                   <input type="date" class="form-control">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                     <div class="row">
                                        <div class="col-md-12 text-center">
                                          <button class="btn btn-primary">Update</button>
                                          <button class="btn btn-default">Cancel</button>
                                        </div>
                                     </div>
                                   </div>
                                </div>
                             </div>




                             <div id="comnication" class="tabcontent">
                              <div class="row">
                                 <div class="col-12">
                                    <h5 class="h5after"><span>Comnication</span></h5>
                                 </div>
                                 <div class="col-12">
                                 <?php
                                 $comnication = DB::table('comnication_log')->where('project_id',$project_id)->get();
                                 ?>
                                 <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                                     style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                     <thead>
                                            
                                                         <tr>
                                                             <th width="6%">S.No</th>
                                                             <th> Name</th>
                                                             <th width="6%">DESC</th>
                                                         </tr>
                                                      
                                                     </thead>
                                                     <tbody>
                                                     @php($i = 1)
                                                     @foreach($comnication as  $comnications)
                                                         <tr>
                                                             <td width="6%">{{$i++}}</td>
                                                             <td> {{$comnications->title}} </td>
                                                             <td width="6%">{{$comnications->desc}}</td>
                                                         </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>                                
                       
                                     
                                 </div>
                                 <!-- end col -->
                             </div>
                             </div>

                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
           <!-- file upload -->
     <div id="fileupload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">File Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <input type="hidden"  id="folder_id">
            <div class="modal-body">
                <div class="col-sm-12 p-0">
                    <div class="form-group row">
                        <div class="col-sm-12 m-t-30">
                            <form action="#" class="dropzone">
                                <div class="fallback"><input name="files[]"  type="file" multiple="multiple"></div>
                            </form>
                        </div>
                        <div class="col-sm-12 text-center m-t-15">
                            <button type="button" onclick="upload_file()" class="btn btn-primary waves-effect waves-light">Upload Files</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
              <!-- /.file-upload -->	
         
     <?php

$get_milestone = DB::table('tm_milestone')->where('project_id',$project_id)->get();
// $datachart = array();
// foreach ($get_milestone  as $key => $get_milestones) {
//    $datachart[$key][] = mt_rand(1000,99999);
//   $datachart[$key][] = $get_milestones->milestone_name;
//    $datachart[$key][] = new Date('".$get_milestones->start_date."');
//     $datachart[$key][] =  new Date('".$get_milestones->end_date."');
//     $datachart[$key][] = null;
//      $datachart[$key][] = 100;
//      $datachart[$key][] = null;
// }


// $data_flow = json_encode($datachart);

     ?>

  
         
@endsection

@section('extra_js')

<script>

var project_id = '{{$project_id}}';




      get_files(project_id);

    function get_files(project_id) {



        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/all_files_project',
            type: "post",
            data: { "_token": _token, "project_id": project_id },
            dataType: 'JSON',

            success: function (data) {
              //  console.log(data.allclient); // this is good
              $('table.show_all_files tbody').html(data.all_files);


            }
        });
    }
    
     function delete_file(element,file_id) {



        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/delete_files',
            type: "post",
            data: { "_token": _token, "file_id": file_id },
            dataType: 'JSON',

            success: function (data) {
              //  console.log(data.allclient); // this is good
              //$('table.show_all_files tbody').html(data.all_files);
              $(element).parent().parent().remove();
               alertify.success(data.msg);
              get_files(project_id);


            }
        });
    }

   // var project_id = $('#project_id').val();


  


    function open_upload_popup(folder_id){
        $('#folder_id').val(folder_id);
        $('#fileupload').modal('show');
    }


    function creatfolder(){
        var folder_name = $('#folder_name').val();
         if(folder_name == ''){
            $('#folder_name_error').html('Please Enter Folder Name').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#folder_name_error').hide();
            error = 1;
            
        }
        
        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/create_folder',
            type: "post",
            data: { "_token": _token, "project_id": project_id,'folder_name':folder_name},
            dataType: 'JSON',

            success: function (data) {
                
            
          
                    alertify.success(data.msg);
                    location.reload();

            }
        });


    }

$(document).on('change','#stage',function(){
    
    var stage = this.value;
   
 
   
   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/update_stage',
        type: "post",
        data: {"_token": _token,"project_id":project_id,"stage":stage},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Change Successfully", "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "Not change", "error");

          }
          
        }
      });

});
</script>
<script>
    function openTabview(evt, tabName) {
       var i, tabcontent, tablinks;
       tabcontent = document.getElementsByClassName("tabcontent");
       for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
       }
       tablinks = document.getElementsByClassName("tablinks");
       for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
       }
       document.getElementById(tabName).style.display = "block";
       evt.currentTarget.className += " active";
    }
 
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    $(document).ready(function() {
        $("#datatable1").DataTable();
        $("#selectmilestone").change(function(){
            $("#milestonedate").css("display","flex"); 
        })
    });
 </script>
 <!-- gantt chart -->
 
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load('current', {'packages':['gantt']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {


   
     var data = new google.visualization.DataTable();
     data.addColumn('string', 'Task ID');
     data.addColumn('string', 'Task Name');
     data.addColumn('string', 'Resource');
     data.addColumn('date', 'Start Date');
     data.addColumn('date', 'End Date');
     data.addColumn('number', 'Duration');
     data.addColumn('number', 'Percent Complete');
     data.addColumn('string', 'Dependencies');
     data.addRows([
      @if(!empty($get_milestone))
      @foreach($get_milestone as $val)
       ['{{$val->id}}', '{{$val->milestone_name}}', 'Rishabh',
        new Date('{{$val->start_date}}'), new Date('{{$val->end_date}}'), null, 100, null],
      @endforeach
      @endif

      //  ['2014Summer', 'Prototype', 'Amit',
      //   new Date(2014, 5, 21), new Date(2014, 8, 20), null, 100, null],
      //  ['2014Autumn', 'Design', 'Nisha',
      //   new Date(2014, 8, 21), new Date(2014, 11, 20), null, 100, null],
      //  ['2014Winter', 'Development', 'Ujjval',
      //   new Date(2014, 11, 21), new Date(2015, 2, 21), null, 100, null],
      //  ['2015Spring', 'Testing', 'Vikas',
      //   new Date(2015, 2, 22), new Date(2015, 5, 20), null, 50, null],
      //  ['2015Summer', 'Deployment', 'Arun',
      //   new Date(2015, 5, 21), new Date(2015, 8, 20), null, 0, null],
      // //  ['2015Autumn', 'Autumn 2015', 'autumn',
      //   new Date(2015, 8, 21), new Date(2015, 11, 20), null, 0, null],
      //  ['2015Winter', 'Winter 2015', 'winter',
      //   new Date(2015, 11, 21), new Date(2016, 2, 21), null, 0, null],
      //  ['Football', 'Football Season', 'sports',
      //   new Date(2014, 8, 4), new Date(2015, 1, 1), null, 100, null],
      //  ['Baseball', 'Baseball Season', 'sports',
      //   new Date(2015, 2, 31), new Date(2015, 9, 20), null, 14, null],
      //  ['Basketball', 'Basketball Season', 'sports',
      //   new Date(2014, 9, 28), new Date(2015, 5, 20), null, 86, null],
      //  ['Hockey', 'Hockey Season', 'sports',
      //   new Date(2014, 9, 8), new Date(2015, 5, 21), null, 89, null]
     ]);

     var options = {
       height: 400,
       gantt: {
         trackHeight: 30
       }
     };

     var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

     chart.draw(data, options);
   }
 </script>
 <!-- gantt chart end -->
@stop