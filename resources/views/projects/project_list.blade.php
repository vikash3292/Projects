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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
@stop
      <!-- Start content -->
   <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h4 class="page-title">Projects</h4>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Projects</a></li>
                        </ol>
                     </div>
                     
                       @if(PermissionHelper::frontendPermission('create-project'))
                 
                     <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('new-project')}}"><button
                                    class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button" aria-haspopup="true" aria-expanded="false">
                                    Add New Project</button></a>
                           </div>
                        </div>
                     </div>
                     @endif
                     
                  </div>
               </div>
               <!-- end row -->
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-12">
                                 
                                 <div class="accordion panel-group" id="accordionExample relative">
                                     <?php
                                    $pstaus = ['in-progress','hold','completed','Initiated','draft'];
                                       ?>
                               
                                     <table id="datatable"
                                                            class="table table-bordered dt-responsive nowrap projectlist font-14"
                                                            style="border-collapse: collapse; border-spacing: 0;width:100%">
                                                            <thead>
                                                               <tr>
                                                                  <th>S.No</th>
                                                                  <th>Project Name</th>
                                                                  <th>Stage</th>
                                                                  <th>Category</th>
                                                                  <th>Status</th>
                                                                  <!-- <th>Base Project</th> -->
                                                                 
                                                                  <th>Estimate Hrs</th>
                                                                  <th>Actual Hrs</th>
                                                                  <th>Start Date</th>
                                                                  <th>End Date</th>
                                                                  <th>Manager</th>
                                                                  <!--  <th>Action</th> -->
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                <?php
                                                                
                                                                
                                                                
                      $projectList = DB::table('tm_project_employees')->join('tm_projects','tm_project_employees.project_id','=','tm_projects.id')->leftjoin('main_users','tm_projects.manager_id','=','main_users.id')->leftjoin('main_project_category','tm_projects.project_category','=','main_project_category.id')->leftjoin('main_stage','tm_projects.stage','=','main_stage.id')->where('tm_projects.is_active',1);
                      
                   // if(isset($_GET['pstatus']) && !empty($_GET['pstatus'])){

                   //   if($_GET['pstatus'] != 'all'){

                   //       $projectList->where('tm_projects.project_status',$_GET['pstatus']);
                         
                   //   }

                        

                   //    }else{

                   //       $projectList->where('tm_projects.project_status','in-progress');

                   //    }

                      if($role !=1 && $role !=11){
              
                            $projectList->where('tm_project_employees.emp_id','=',$userid);
                      }
                      
                       if($role ==1){
               
                            $projectList->groupBy('tm_project_employees.project_id');
                      }
            
             if( $role ==11){
                
                            $projectList->groupBy('tm_project_employees.project_id');
                      }
                    
                      
                    
                      
                      $projectList = $projectList->orderBy('tm_projects.project_name', 'ASC')->select('tm_projects.*','main_users.userfullname','main_stage.stage_name','main_project_category.cat_name')->get();
                                                                
                                                 
                                                                
          foreach($projectList as $projectLists){
               $all_seconds=0;
              $assignproject = DB::table('tm_emp_timesheets')->where('project_id',$projectLists->id)->get();
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
                  $projectLists->actualhour = $week_hour;
                  
                  
                  
              }
              
          }
                                                          
                                                                
                                                                ?>
                                                                
                                                             
                                                                
                                                         @php($i = 1)
                                  @foreach($projectList as $project_lists)
                                  <?php
                                  $taskcount = DB::table('tm_project_tasks')->where('project_id',$project_lists->id)->count();
                                     $assignhr = explode(':',$project_lists->actualhour);
                                    // dd($assignhr);
                                  if($project_lists->estimated_hrs < (int)$assignhr[0]){
                                      
                                      $cl = 'actual_hr';
                                      
                                  }else{
                                      
                                       $cl = '';
                                      
                                  }
                                  
                                  ?>
                                 
                                 <tr onclick="window.location='{{URL::to('/project-view')}}/{{$project_lists->id}}'">
                                    <td>
                                      {{$i++}}
                                    </td>
                                    <td class="text_ellipses" data-toggle="tooltip" title="{{$project_lists->project_name}}">{{$project_lists->project_name}}</td>
                                    <td class="text_ellipses" data-toggle="tooltip" title="{{$project_lists->stage_name}}">{{$project_lists->stage_name}}</td>
                                    <td class="text_ellipses" data-toggle="tooltip" title="{{$project_lists->cat_name}}">{{$project_lists->cat_name}}</td>
                                    <td class="text_ellipses" data-toggle="tooltip" title="{{ucwords($project_lists->project_status)}}">{{ucwords($project_lists->project_status)}}</td>
                                    <td class="text_ellipses"> {{$project_lists->estimated_hrs}}:00</td>
                                    <td class="text_ellipses {{$cl}}">{{$project_lists->actualhour}}</td>
                                    <td class="text_ellipses">{{$project_lists->start_date}}</td>
                                    <td class="text_ellipses">{{$project_lists->end_date}}</td>
                                    <td class="text_ellipses">{{$project_lists->userfullname}}</td>
                                  <!--   <td>
                                      <a href="{{URL::to('/project-view')}}/{{$project_lists->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td> -->
                                 </tr>
                                 
                                 @endforeach
                                 @if(count($projectList) ==0)
                                 <tr>
                                    <td colspan="10">
                                     Project Not Found
                                    </td>
                                   
                                 </tr>
                                 @endif            
                                                            </tbody>
                                                         </table>
                                     
                                    
                                 </div>
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
@endsection

@section('extra_js')


@stop