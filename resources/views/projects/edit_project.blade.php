@extends('layouts.superadmin_layout')
@section('content')
<?php  //echo "<pre>"; print_r($classData); ?>
<!-- Content Wrapper. Contains page content -->
@section('extra_css')
<style>
    .disabledTab {
        pointer-events: none;
    }
</style>

@stop
<!-- Start content -->
<div class="content p-0">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center bredcrum-style">
                <div class="col-sm-7">
                    <h4 class="page-title">Edit Project</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Edit Project / Task /
                                QCI Expert</a>
                        </li>
                        <li class="breadcrumb-item active"><a
                                href="javascript: history.go(-1)">{{$projectedit->project_name}}</a>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-5">
                    <a href="javascript: history.go(-1)" class="btn btn-primary float-right">Back to List</a>
                </div>
            </div>
        </div>
        <!-- end row -->
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-t-20">
                    <div class="card-body">
                        <div class="tab">
                            <button class="tablinks" onclick="openTab1(event, 'details')" id="defaultOpen">Details
                            </button>
                            <!-- <button class="tablinks" onclick="openTab(event, 'leaves')">Leaves</button>
                                        <button class="tablinks" onclick="openTab(event, 'holiday')">Holiday</button> -->
                      <button class="tablinks" onclick="openTab1(event, 'tasks')">Tasks</button>
                 <button class="tablinks" onclick="openTab1(event, 'resources')"> QCI Expert</button>
                            <button class="tablinks" onclick="openTab1(event, 'filemanager')">Files </button>

                          <button class="tablinks" onclick="openTab1(event, 'forms')">Forms</button>

                            <button class="tablinks" onclick="openTab1(event, 'payment')">Payments</button>
                            <button class="tablinks" onclick="openTab1(event, 'comnication')">Comnication</button>

                        </div>
                        <div id="details" class="tabcontent">
                            <div class="col-12">
                                <h5 class="h5after"><span>Project Details</span></h5>
                            </div>
                            <form id="project_form" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Project
                                                Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="project_name"
                                                    value="{{$projectedit->project_name}}" class="form-control">
                                                <span id="project_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                            <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Builder
                                                </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="builder" class="form-control"  value="{{$projectedit->builder}}">
                                                <span id="builder_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                      

                                        <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Location</label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="location" class="form-control" value="{{$projectedit->location}}">
                                                <span id="location_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Project ID </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="project_temp_id" class="form-control"   value="{{$projectedit->project_temp_id}}">
                                                <span id="project_temp_id_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Temp ID </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="temp_id" class="form-control"   value="{{$projectedit->temp_id}}">
                                                <span id="temp_id_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Work Order No </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="work_order_no" class="form-control"  value="{{$projectedit->work_order_no}}">
                                                <span id="work_order_no_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empid" class="col-lg-4 col-form-label">Project Status
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="project_status">
                                                    <option value="">Select Status</option>
                                                    <option @if($projectedit->project_status =='in-progress') selected
                                                        @endif>In-progress</option>
                                                    <option @if($projectedit->project_status =='initiated') selected
                                                        @endif>Initiated</option>

                                                    <option @if($projectedit->project_status =='draft') selected
                                                        @endif>Draft</option>
                                                    <option @if($projectedit->project_status =='hold') selected
                                                        @endif>Hold</option>
                                                    <option @if($projectedit->project_status =='completed') selected
                                                        @endif >Completed</option>


                                                </select>
                                                <span id="project_status_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                           
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="prifix" class="col-lg-4 col-form-label">Base
                                                Project</label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control" id="base_project">
                                                    <option value="">Select Project</option>
                                                    @foreach($baseproject as $baseprojects)
                                                    <option value="{{$baseprojects->id}}">
                                                        {{$baseprojects->project_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="project_id" value="{{$projectedit->id}}">
                                    <input type="hidden" id="project_edit_id" value="{{$projectedit->id}}">
                                    <div class="col-md-6">

                                      
                                        <div class="form-group row m-0">
                                            <label for="firstname" class="col-lg-4 col-form-label">Project Category<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control" id="category">
                                                    <option value="">Select Category</option>
                                           

                                                          @foreach($main_category as $main_categorys)
                                                             <option value="{{$main_categorys->id}}"  @if($projectedit->project_category ==$main_categorys->id) selected
                                                        @endif>{{$main_categorys->cat_name}}</option>
                                                            @endforeach
                                                </select>
                                                <span id="category_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="logo" class="col-lg-4 col-form-label">Organization
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control client_pro" id="project_client">
                                                    <option value="">Select Option</option>
                                                    @foreach($org as $clients)

                                                    <option value="{{$clients->id}}" @if($projectedit->client_id ==
                                                        $clients->id) selected @endif>{{$clients->company}}</option>

                                                    @endforeach
                                                </select>
                                                <span id="project_client_error"></span>
                                                <a data-toggle="modal" data-target="#addclient">Add Client</a>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">Currency
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="currecy">
                                                    <option value="">Select Currency</option>
                                                    @foreach($currency as $currencys)
                                                    <option value="{{$currencys->id}}" @if($projectedit->currency_id ==
                                                        $currencys->id) selected @endif>{{$currencys->currencyname}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="currecy_error"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">Project Associate
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="manager"  onchange="coordinator_val(this.value)">
                                                    <option value="">Select Option</option>
                                                    @foreach($managerlist as $managerlists)
                                                    <option value="{{$managerlists->id}}" @if($projectedit->manager_id
                                                        == $managerlists->id) selected
                                                        @endif>{{$managerlists->userfullname}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="manager_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">Coordinator
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="coordinator">
                                                    <option value="">Select Option</option>
                                                    @foreach($managerlist as $managerlists)
                                                @if($projectedit->manager_id != $managerlists->id)
                                                    <option value="{{$managerlists->id}}" @if($projectedit->coordinator
                                                        == $managerlists->id) selected
                                                        @endif>
                                                        {{$managerlists->userfullname}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span id="coordinator_error"></span>
                                            </div>
                                        </div>
                                    </div>

                             
                                   <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">
                                                Stage
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="stage">
                                                    <option value="">Select Option</option>
                                                    @foreach($stage as $stages)
                                                    <option value="{{$stages->id}}"  @if($projectedit->stage
                                                        == $stages->id) selected
                                                        @endif>
                                                        {{$stages->stage_name}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="stage_error"></span>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="cid" class="col-lg-4 col-form-label">Project
                                                Type<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8 col-form-label">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" value="billable"
                                                        name="project_type" class="custom-control-input checkval"
                                                        @if($projectedit->project_type == 'billable') checked @endif >
                                                    <label class="custom-control-label"
                                                        for="customRadioInline1">Billable</label></div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="project_type"
                                                        value="non_billable" class="custom-control-input checkval"
                                                        @if($projectedit->project_type == 'non_billable') checked
                                                    @endif>
                                                    <label class="custom-control-label " for="customRadioInline2">Non
                                                        Billable</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="project_type"
                                                        value="revenue" class="custom-control-input checkval"
                                                        @if($projectedit->project_type == 'revenue') checked @endif>
                                                    <label class="custom-control-label" for="customRadioInline2">Revenue
                                                        Generation</label>
                                                </div>
                                                <!--<div-->
                                                <!--    class="custom-control custom-radio custom-control-inline">-->
                                                <!--    <input type="radio" id="customRadioInline1"  value="billable" name="jghkj"-->

                                                <!--        class="custom-control-input checkval" @if($projectedit->project_type == 'billable') checked @endif > <label-->
                                                <!--        class="custom-control-label"-->
                                                <!--        for="customRadioInline1" value="billable"  >Billable</label></div>-->
                                                <!--<div-->
                                                <!--    class="custom-control custom-radio custom-control-inline">-->
                                                <!--    <input type="radio" id="customRadioInline2" value="non_billable" name="kjkoi"  -->

                                                <!--        class="custom-control-input checkval" @if($projectedit->project_type == 'non_billable') checked @endif> <label-->
                                                <!--        class="custom-control-label "-->
                                                <!--        for="customRadioInline2" value="non_billable">Non Billable</label>-->
                                                <!--</div>-->
                                                <!--<div-->
                                                <!--    class="custom-control custom-radio custom-control-inline">-->
                                                <!--    <input type="radio" id="customRadioInline3" value="revenue" name="jkjhkjhk" -->

                                                <!--        class="custom-control-input checkval" @if($projectedit->project_type == 'revenue') checked @endif> <label-->
                                                <!--        class="custom-control-label"-->
                                                <!--        for="customRadioInline2" value="revenue">Revenue-->
                                                <!--        Generation</label></div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="mode" class="col-lg-4 col-form-label">Description<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8 col-form-label">
                                                <textarea class="form-control" id="project_desc"
                                                    rows="3">{{$projectedit->description}}</textarea>
                                                <span id="project_desc_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <fieldset class="col-md-12">
                                        <legend>Estimate</legend>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row m-0">
                                                            <label for="role" class="col-lg-5 col-form-label">Estimate
                                                                Date
                                                                From <span class="text-danger">*</span></label>
                                                            <div class="col-lg-7 col-form-label">
                                                                <input type="date" value="{{$projectedit->start_date}}"
                                                                    id="from_date" class="form-control">
                                                                <span id="from_date_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row m-0">
                                                            <label for="role" class="col-lg-5 col-form-label">Estimate
                                                                Date To <span class="text-danger">*</span></label>
                                                            <div class="col-lg-7 col-form-label">
                                                                <input type="date" id="to_date"
                                                                    value="{{$projectedit->end_date}}"
                                                                    class="form-control">
                                                                <span id="to_date_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row m-0">
                                                            <label for="role" class="col-lg-5 col-form-label">Estimation
                                                                Hours <span class="text-danger">*</span></label>
                                                            <div class="col-lg-7 col-form-label">
                                                                <input type="text" id="estimated"
                                                                    value="{{$projectedit->estimated_hrs}}"
                                                                    class="form-control" onkeypress="preventNonNumericalInput(event)" maxlength="8">
                                                                <span id="estimated_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>
                                <div class="col-sm-12">
                                    <h3 class="m-t-20">Activity</h3>
                                    <button type="button" class="btn btn-primary float-right" data-target="#addmilestone"
                                        data-toggle="modal">Add Milestone</button>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap projectlist milestone"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Milestone Name</th>
                                                <th>Milestone Color</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @if(PermissionHelper::frontendPermission('project-edit-details'))

                                <div class="col-md-4 form-group m-t-10">
                                    <input type="submit" class="btn btn-primary" id="saveProject" value="Update">
                                </div>

                                @endif
                            </form>
                        </div>
                        <div id="tasks" class="tabcontent">
                            <div class="col-12">
                                <h5 class="m-b-20"><span>Tasks</span>
                                    <button class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#addtask">Add Task</button>
                                </h5>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <form method="post" id="task_form">
                                    <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap projectlist tasklist font-14"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th class="text-ellipses1">Name</th>
                                                <th>Milstone</th>
                                                <th>Estimated Hr</th>
                                                <th>Billable</th>
                                                <th>Status</th>
                                                <th style="width:20px">Start Date</th>
                                                <th style="width:20px">End Date</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    
                                                    $assignuser = [] ;
                                                    
                                                    ?>
                                            @php($i = 1)

                                            @foreach($taskedit as $key => $taskedits)

                                            <?php
                                                    
                                                     $milestone = DB::table('tm_milestone')->where('id',$taskedits->milestone_id)->first();

                                                         $taskAssign  = DB::table('tm_project_task_employees')->join('main_users','tm_project_task_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->join('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.task_id',$taskedits->id)->where('tm_project_task_employees.project_id',$project_id)->select('tm_project_task_employees.*','main_users.userfullname','main_users.employeeId','main_users.prefix','main_users.profileimg','tm_tasks.task','main_jobtitles.jobtitlename','main_users.emp_type')->get();


                                                    foreach($taskAssign as $taskAssigns){
                                                        
                                                        $assignuser[$key][] = $taskAssigns->emp_id;
                                                    }
                                                    
                                                    // $taskAssign  = Db::table('tm_project_task_employees')->leftjoin('tm_project_tasks','tm_project_task_employees.task_id','=','tm_project_tasks.task_id')->leftjoin('main_users','tm_project_task_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.task_id',$taskedits->task_id)->select('tm_project_task_employees.*','main_users.userfullname','main_users.employeeId','main_users.prefix','main_users.profileimg','tm_tasks.task','tm_project_tasks.estimated_hrs','main_jobtitles.jobtitlename')->get();


                                               
                                                    ?>
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td class="text_ellipses1" data-toggle="tooltip"
                                                    title="{{$taskedits->task}}">{{$taskedits->task}}</td>
                                                     <td>{{$milestone->milestone_name??''}}</td>
                                                <td>
                                                    <input type="hidden" name="update_project_id[]"
                                                        value="{{$taskedits->project_id}}">
                                                    <input type="hidden" name="update_task_id[]"
                                                        value="{{$taskedits->id}}">
                                                    <input type="text" name="task_hr[]"
                                                        onkeypress="preventNonNumericalInput(event)"
                                                        class="form-control" value="{{$taskedits->estimated_hrs}}">
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">

                                                        <input type="checkbox"
                                                            onclick="getbillable(this,'{{$taskedits->id??0}}')"
                                                            class="checkboxval custom-control-input"
                                                            value="{{$taskedits->is_billable??0}}" name="billable[]"
                                                            @if($taskedits->is_billable ==1) checked @endif

                                                        id="customControlInline"> <label class="custom-control-label"
                                                            for="customControlInline">
                                                        </label>
                                                        <input type="hidden" id="checkval_{{$taskedits->id??0}}"
                                                            class="checkbox_val" name="test_checkbox[]"
                                                            value="{{$taskedits->is_billable??0}}" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" data-type="text" data-pk="2" class="editable"
                                                        data-url="" data-title="Edit Quantity">
                                                        <select class="form-control" name="task_status[]">


                                                            <option @if($taskedits->task_status =='in-progress')
                                                                selected @endif>in-progress</option>
                                                            <option @if($taskedits->task_status =='initiated') selected
                                                                @endif>initiated</option>

                                                            <option @if($taskedits->task_status =='draft') selected
                                                                @endif>draft</option>
                                                            <option @if($taskedits->task_status =='hold') selected
                                                                @endif>hold</option>
                                                            <option @if($taskedits->task_status =='completed') selected
                                                                @endif >completed</option>
                                                        </select>
                                                    </a>
                                                </td>
                                                <td style="width:20px">
                                                    <input type="date" class="form-control" name="stat_date[]"
                                                        value="{{$taskedits->task_start_date}}">
                                                </td>
                                                <td style="width:20px">
                                                    <input type="date" class="form-control" name="end_date[]"
                                                        value="{{$taskedits->task_end_date}}">
                                                </td>
                                                <td class="text_ellipses" data-toggle="tooltip"
                                                    title="{{$taskedits->userfullname}}">{{$taskedits->userfullname}}
                                                </td>
                                                <td>
                                                    <a href="#" title="Assign QCI Expert" data-toggle="modal"
                                                        data-target="#assignresource{{$taskedits->id}}"><i
                                                            class="fa fa-user-check font-blue"></i></a>
                                                    <a href="project_view.html" data-toggle="modal"
                                                        data-target="#viewtask{{$taskedits->id}}">
                                                        <i class="fa fa-eye font-blue"></i>
                                                    </a>
                                                    <a href="#" onclick="deletetask(this,'{{$taskedits->id}}')">
                                                        <i class="fa fa-trash font-blue"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div id="viewtask{{$taskedits->id}}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModalLabel">View Task
                                                                QCI Expert</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-sm-12 p-0">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <span class="font-500">Task:</span>
                                                                        <span>{{$taskedits->task}}</span>
                                                                    </div>
                                                                    <div class="col-sm-6 float-right">
                                                                        <span class="font-500">Estimated Hours:</span>
                                                                        <span>{{$taskedits->estimated_hrs}}</span>
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
                                                                            <form role="search"
                                                                                class="app-search m-t-10"
                                                                                style="height: 0;">
                                                                                <div class="form-group mb-0">
                                                                                    <input type="text"
                                                                                        class="form-control m-0"
                                                                                        placeholder="Search..">
                                                                                    <button type="submit"
                                                                                        style="top:10px"><i
                                                                                            class="fa fa-search"></i></button>
                                                                                </div>
                                                                            </form>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-t-10">
                                                                @foreach($taskAssign as $taskAssigns)
                                                                <div class="col-sm-3">
                                                                    <div
                                                                        class="card m-b-10 float-left width100 box-shadow">
                                                                        <div class="media p-l-5 p-r-5 p-t-5">
                                                                            @if(!empty($taskAssigns->profileimg))
                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/')}}/{{$taskAssigns->profileimg}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">
                                                                            @elseif($taskAssigns->prefix == 1)

                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/uploads/male.png')}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">

                                                                            @elseif($taskAssigns->prefix == 2 ||
                                                                            $taskAssigns->prefix == 3)

                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/uploads/female.png')}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">

                                                                            @else

                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/uploads/human.png')}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">

                                                                            @endif

                                                                            <div class="media-body">
                                                                                <h6 class="mt-0 mb-0 font-16 text-info">
                                                                                    {{ucwords($taskAssigns->userfullname)}}
                                                                                </h6>
                                                                                <p class="m-0 font-12">
                                                                                    {{$taskAssigns->employeeId}}</p>
                                                                                <p class="m-0 font-12">
                                                                                    {{$taskedits->estimated_hrs}} Hrs
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mainhilight">
                                                                            <span
                                                                                class="font-500">{{$taskAssigns->jobtitlename}}</span>
                                                                        </div>

                                                                        <div class="mainhilight">
                                                                            <span
                                                                                class="font-500">{{$taskAssigns->emp_type}}</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="assignresource{{$taskedits->id}}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModalLabel">Assign To Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12 m-b-10">
                                                                    <div class="col-sm-12 p-0">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <span class="font-500">Task:</span>
                                                                                <span>{{$taskedits->task}}(
                                                                                    @if($taskedits->is_billable ==1)

                                                                                    Billable
                                                                                    @else

                                                                                    Non Billable
                                                                                    @endif

                                                                                    )</span>
                                                                            </div>
                                                                            <div class="col-sm-6 float-right">
                                                                                <span class="font-500">Estimated
                                                                                    Hours:</span>
                                                                                <span>{{$taskedits->estimated_hrs}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" id="project_task_id"
                                                                    value="{{$taskedits->id}}">
                                                                <div class="col-sm-12">
                                                                    <div class="row modal-height">
                                                                        <div class="col-sm-6 div-right-b">
                                                                            <h6>QCI Expert <span
                                                                                    class="text-danger m-b-20 font-12 font-500">
                                                                                    (Click on resource to add to task)
                                                                                </span>

                                                                            </h6>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 m-b-20">
                                                                                    <form role="search"
                                                                                        class="app-search float-right"
                                                                                        style="height: 0;">
                                                                                        <div class="form-group mb-0">
                                                                                            <input type="text"
                                                                                                class="form-control m-0"
                                                                                                placeholder="Search..">
                                                                                            <button type="submit"
                                                                                                style="top:10px">
                                                                                                <i
                                                                                                    class="fa fa-search"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row reversediv">
                                                                                @if(!empty($assignuser[$key]))
                                                                                @foreach($userlist as $userlists)
                                                                                @if(!in_array($userlists->id,
                                                                                $assignuser[$key]))
                                                                                <div
                                                                                    class="col-sm-6 assign cursorpointer">
                                                                                    <div
                                                                                        class="card m-b-10 float-left width100 box-shadow">
                                                                                        <div
                                                                                            class="media p-l-5 p-r-5 p-t-5">


                                                                                            @if(!empty($userlists->profileimg))
                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/')}}/{{$userlists->profileimg}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">
                                                                                            @elseif($userlists->prefix
                                                                                            == 1)

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/male.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @elseif($userlists->prefix
                                                                                            == 2 || $userlists->prefix
                                                                                            == 3)

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/female.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @else

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/human.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @endif
                                                                                            <input type="hidden"
                                                                                                class="user_id_{{$taskedits->task_id}}"
                                                                                                value="{{$userlists->id}}">
                                                                                            <input type="hidden"
                                                                                                class="assgin_task_id"
                                                                                                value="{{$taskedits->task_id}}">
                                                                                            <div class="media-body">
                                                                                                <h6
                                                                                                    class="mt-0 mb-0 font-16 text-info">
                                                                                                    {{$userlists->userfullname}}
                                                                                                </h6>
                                                                                                <p class="m-0 font-12">
                                                                                                    {{$userlists->employeeId}}
                                                                                                </p>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mainhilight">
                                                                                            <span
                                                                                                class="font-500">{{$userlists->jobtitlename}}</span>
                                                                                        </div>

                                                                                          <div class="mainhilight">
                                                                            <span
                                                                                class="font-500">{{$userlists->emp_type==1?'Employee':'freelancer'}}</span>
                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                                @endforeach
                                                                                @else


                                                                                @foreach($userlist as $userlists)

                                                                                <div
                                                                                    class="col-sm-6 assign cursorpointer">
                                                                                    <div
                                                                                        class="card m-b-10 float-left width100 box-shadow">
                                                                                        <div
                                                                                            class="media p-l-5 p-r-5 p-t-5">


                                                                                            @if(!empty($userlists->profileimg))
                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/')}}/{{$userlists->profileimg}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">
                                                                                            @elseif($userlists->prefix
                                                                                            == 1)

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/male.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @elseif($userlists->prefix
                                                                                            == 2 || $userlists->prefix
                                                                                            == 3)

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/female.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @else

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/human.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @endif
                                                                                            <input type="hidden"
                                                                                                class="user_id_{{$taskedits->task_id}}"
                                                                                                value="{{$userlists->id}}">
                                                                                            <input type="hidden"
                                                                                                class="assgin_task_id"
                                                                                                value="{{$taskedits->task_id}}">

                                                                                            <div class="media-body">
                                                                                                <h6
                                                                                                    class="mt-0 mb-0 font-16 text-info">
                                                                                                    {{$userlists->userfullname}}
                                                                                                </h6>
                                                                                                <p class="m-0 font-12">
                                                                                                    {{$userlists->employeeId}}
                                                                                                </p>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mainhilight">
                                                                                            <span
                                                                                                class="font-500">{{$userlists->jobtitlename}}</span>
                                                                                        </div>

                                                                                                                                                    <div class="mainhilight">
                                                                            <span
                                                                                class="font-500">{{$userlists->emp_type==1?'Employee':'freelancer'}}</span>
                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                @endforeach

                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <h6>Selected QCI EXpert <span
                                                                                    class="text-danger m-b-20 font-12 font-500">
                                                                                    (Click on resource to remove from
                                                                                    task)
                                                                                </span>

                                                                            </h6>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 m-b-20">
                                                                                    <form role="search"
                                                                                        class="app-search float-right"
                                                                                        style="height: 0;">
                                                                                        <div class="form-group mb-0">
                                                                                            <input type="text"
                                                                                                class="form-control m-0"
                                                                                                placeholder="Search..">
                                                                                            <button type="submit"
                                                                                                style="top:10px"><i
                                                                                                    class="fa fa-search"></i></button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row assigneduser">

                                                                                @if(!empty($taskAssign))
                                                                                @foreach($taskAssign as $taskAssigns)

                                                                                <div
                                                                                    class="col-sm-6 assigned cursorpointer">
                                                                                    <div
                                                                                        class="card m-b-10 float-left width100 box-shadow">
                                                                                        <div
                                                                                            class="media p-l-5 p-r-5 p-t-5">


                                                                                            @if(!empty($taskAssigns->profileimg))
                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/')}}/{{$taskAssigns->profileimg}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">
                                                                                            @elseif($taskAssigns->prefix
                                                                                            == 1)

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/male.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @elseif($taskAssigns->prefix
                                                                                            == 2 || $taskAssigns->prefix
                                                                                            == 3)

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/female.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @else

                                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                                src="{{URL::to('public/uploads/human.png')}}"
                                                                                                alt="Generic placeholder image"
                                                                                                height="40">

                                                                                            @endif





                                                                                            <input type="hidden"
                                                                                                class="selected_user_id_{{$taskedits->task_id}}"
                                                                                                value="{{$taskAssigns->emp_id??0}}">

                                                                                            <input type="hidden"
                                                                                                class="assgin_task_id"
                                                                                                value="{{$taskedits->task_id}}">

                                                                                            <div class="media-body">
                                                                                                <h6
                                                                                                    class="mt-0 mb-0 font-16 text-info">
                                                                                                    {{$taskAssigns->userfullname}}
                                                                                                </h6>
                                                                                                <p class="m-0 font-12">
                                                                                                    {{$taskAssigns->employeeId}}
                                                                                                </p>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mainhilight">
                                                                                            <span
                                                                                                class="font-500">{{$taskAssigns->jobtitlename}}</span>
                                                                                        </div>

                                                                                         <div class="mainhilight">
                                                                                            <span
                                                                                                class="font-500">{{$taskAssigns->emp_type==1?'Employee':'freelancer'}}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @endforeach
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                onclick="assigntask('{{$taskedits->task_id}}')"
                                                                class="btn btn-primary waves-effect waves-light">Assign
                                                                Resource</button>
                                                            <button type="button" class="btn btn-default waves-effect"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </form>
                            </div>
                            @endforeach

                            </tbody>
                            </table>
                            <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                        <div id="resources" class="tabcontent">
                            <div class="col-12">
                                <h5 class="m-b-20"><span>QCI Expert</span>
                                    <button class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#addresources">Add
                                        QCI Expert</button>
                                </h5>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                
                                <form method="post" id="resourse_form">
                                    <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap projectlist font-14"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>

                                            <tr>
                                                <th>S.No</th>
                                                <th>Employee</th>
                                                <th>Type</th>
                                                <th>Billable Rate/Hr(INR)</th>
                                                <th>Cost Rate/Hr(INR)</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @php($i = 1)
                                            @foreach($userlist as $userlists)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>

                                                    @if(!empty($userlists->profileimg))
                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/')}}/{{$userlists->profileimg}}"
                                                        alt="Generic placeholder image" height="40">
                                                    @elseif($userlists->prefix == 1)

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/male.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @elseif($userlists->prefix == 2 || $userlists->prefix == 3)

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/female.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @else

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/human.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @endif


                                                    {{$userlists->userfullname}}
                                                    @if($userlists->emprole ==3)

                                                    <span class="manager">M</span>
                                                    @endif

                                                </td>
                                                 <td>{{$userlists->emp_type==1?'Employee':'freelancer'}}</td>
                                                <td>
                                                    <input type="hidden" name="userresourceid[]"
                                                        value="{{$userlists->id}}">
                                                    <input type="hidden" name="project_id" value="{{$project_id}}">

                                                    <input type="number" class="form-control" name="cost_rate[]"
                                                        value="{{$userlists->cost_rate??''}}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="billable_rate[]"
                                                        value="{{$userlists->billable_rate??''}}">
                                                </td>
                                                <td>{{$userlists->created}} </td>
                                                <td>



                                                    <a href="javascript:void(0)"
                                                        onclick="getassigntask('{{$userlists->id}}')"><i
                                                            class="fa fa-user-check font-blue"></i></a>



                                                    <a href="javascript:void(0)"
                                                        onclick="getassigntaskview('{{$userlists->id}}')">
                                                        <i class="fa fa-eye font-blue"></i>
                                                    </a>

                                                    @if($userlists->manager_id !=1 && $userlists->manager_id !=2)
                                                    <a href="#" onclick="deleteuserproject(this,'{{$userlists->id}}')">
                                                        <i class="fa fa-trash font-blue"></i>

                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>

                                            <?php
                                                    
                                                      $usreasigntask = DB::table('tm_project_task_employees')->leftjoin('main_users','tm_project_task_employees.emp_id','=','main_users.id')->leftjoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')->leftjoin('tm_project_tasks','tm_project_task_employees.task_id','=','tm_project_tasks.task_id')->leftjoin('tm_tasks','tm_project_task_employees.task_id','=','tm_tasks.id')->where('tm_project_task_employees.emp_id',$userlists->id)->select('tm_project_tasks.estimated_hrs','tm_tasks.task','main_users.userfullname','main_users.profileimg','main_users.prefix','main_users.employeeId','main_jobtitles.jobtitlename')->get();
                                  
                                                    ?>



                                            <div id="viewresource{{$userlists->id}}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModalLabel">View Employee
                                                                Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12 m-b-10">
                                                                    <span class="float-right">
                                                                        <form role="search" class="app-search"
                                                                            style="height: 0;">
                                                                            <div class="form-group mb-0">
                                                                                <input type="text"
                                                                                    class="form-control m-0"
                                                                                    placeholder="Search by Task..">
                                                                                <button type="submit"
                                                                                    style="top:10px"><i
                                                                                        class="fa fa-search"></i></button>
                                                                            </div>
                                                                        </form>
                                                                    </span>
                                                                </div>
                                                                <div class="col-sm-12">

                                                                    @foreach($usreasigntask as $taskAssigns)
                                                                    <div
                                                                        class="card m-b-10 float-left width100 box-shadow">

                                                                        <div class="media padding-5">

                                                                            @if(!empty($taskAssigns->profileimg))
                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/')}}/{{$taskAssigns->profileimg}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">
                                                                            @elseif($taskAssigns->prefix == 1)

                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/uploads/male.png')}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">

                                                                            @elseif($taskAssigns->prefix == 2 ||
                                                                            $taskAssigns->prefix == 3)

                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/uploads/female.png')}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">

                                                                            @else

                                                                            <img class="d-flex mr-3 rounded-circle"
                                                                                src="{{URL::to('public/uploads/human.png')}}"
                                                                                alt="Generic placeholder image"
                                                                                height="40">

                                                                            @endif



                                                                            <div class="media-body col-sm-4">
                                                                                <h6 class="mt-0 mb-0 font-16 text-info">
                                                                                    {{ucwords($taskAssigns->userfullname)}}
                                                                                </h6>
                                                                                <p class="m-0 font-12">
                                                                                    {{$taskAssigns->employeeId}}</p>
                                                                                <p class="m-0 font-12">
                                                                                    {{$taskAssigns->estimated_hrs}} Hrs
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="media-body col-sm-8 text-center">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 div-right-b">
                                                                                        <h6>Task</h6>
                                                                                        <p class="m-b-5">
                                                                                            {{$taskAssigns->task}}</p>
                                                                                    </div>
                                                                                    <div class="col-sm-4 div-right-b">
                                                                                        <h6>Estimated hours</h6>
                                                                                        <p class="m-b-5">
                                                                                            {{$taskAssigns->estimated_hrs}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <h6>Actual hours</h6>
                                                                                        <p class="m-b-5">
                                                                                            {{$taskAssigns->estimated_hrs}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mainhilight col-sm-12">
                                                                            <span
                                                                                class="font-500">{{$taskAssigns->jobtitlename}}</span>
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
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            </div>
                        </div>
                        <div id="filemanager" class="tabcontent">
                            <h3>File Manager</h3>
                            <div class="width-float"><!-- 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Create Folder
                                                Name <span class="text-danger"></span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="folder_name" class="form-control">
                                                <span id="folder_name_error"><span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button  onclick="creatfolder()" class="btn btn-primary">Create</button>
                                        <button class="btn btn-primary">Cancel</button>
                                    </div>
                                </div> -->


                                               <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
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
                                    </div>
                                  
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-12 p-0">
                    <div class="form-group row">
                        <div class="col-sm-12 m-t-30">
                            <form action="#" class="dropzone">
                                <div class="fallback"><input name="files[]" type="file" multiple="multiple"></div>
                            </form>
                        </div>
                        <div class="col-sm-12 text-center m-t-15">
                            <button type="button" onclick="upload_file()" class="btn btn-primary waves-effect waves-light">Upload Files</button>
                        </div>
                    </div>
                </div>
                            
                        </div>
                        <!-- end col -->
                    </div>

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
                                             <input type="file" name="upload_files" id="upload_files" onchange="upload_files('{{$form_shows->id}}')" class="btn btn-info"><i class="fa fa-upload m-r-5"></i>Upload
                                       </div>
                                       <div class="col-2">
                                           <a class="btn btn-warning" href="{{URL::to('form-history')}}/{{$form_shows->id}}"><i class="fa fa-history m-r-5"></i>History</a>
                                       </div>
                                    </div>
                                  </div>

                                  @endforeach
                               <!--    <div class="col-sm-12">
                                     <h6>Form 1B</h6>
                                     <div class="row m-t-10">
                                        <div class="col-2">
                                           <button class="btn btn-success"><i class="fa fa-download m-r-5"></i>Download</button>
                                        </div> 
                                        <div class="col-2">
                                            <input type="file" class="btn btn-info"><i class="fa fa-upload m-r-5"></i>Upload
                                        </div>
                                        <div class="col-2">
                                          <a class="btn btn-warning" href="history.html"><i class="fa fa-history m-r-5"></i>History</a>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="col-sm-12">
                                     <h6>Form 2B</h6>
                                     <div class="row m-t-10">
                                        <div class="col-2">
                                           <button class="btn btn-success"><i class="fa fa-download m-r-5"></i>Download</button>
                                        </div> 
                                        <div class="col-2">
                                              <input type="file" class="btn btn-info"><i class="fa fa-upload m-r-5"></i>Upload
                                        </div>
                                        <div class="col-2">
                                          <a class="btn btn-warning" href="history.html"><i class="fa fa-history m-r-5"></i>History</a>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="col-sm-12">
                                     <h6>Form 3B</h6>
                                     <div class="row m-t-10">
                                        <div class="col-2">
                                           <button class="btn btn-success"><i class="fa fa-download m-r-5"></i>Download</button>
                                        </div> 
                                        <div class="col-2">
                                           <input type="file" class="btn btn-info"><i class="fa fa-upload m-r-5"></i>Upload
                                        </div>
                                        <div class="col-2">
                                          <a class="btn btn-warning" href="history.html"><i class="fa fa-history m-r-5"></i>History</a>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="col-sm-12">
                                     <h6>Form 4B</h6>
                                     <div class="row m-t-10">
                                        <div class="col-2">
                                           <button class="btn btn-success"><i class="fa fa-download m-r-5"></i>Download</button>
                                        </div> 
                                        <div class="col-2">
                                             <input type="file" class="btn btn-info"><i class="fa fa-upload m-r-5"></i>Upload
                                        </div>
                                        <div class="col-2">
                                          <a class="btn btn-warning" href="history.html"><i class="fa fa-history m-r-5"></i>History</a>
                                       </div>
                                     </div>
                                   </div> -->
                              </div>
                           </div>

                        <div id="payment" class="tabcontent">
                            <h3>Payments
                            </h3>
                            <div class="width-float">
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



                        <div id="comnication" class="tabcontent">
                            <h3>Comnication
                            </h3>
                            <form id="comnication_form">
                            <div class="width-float">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Title
                                                 <span class="text-danger"></span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" class="form-control" name="title" id="title" require>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="project_id" name="project_id" value="{{$projectedit->id}}">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empid" class="col-lg-4 col-form-label">Descripation
                                                <span class="text-danger"></span></label>
                                            <div class="col-lg-8 col-form-label">
                                            <textarea class="form-control" id="desc"  name="desc" require></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
            <!-- container-fluid -->
        </div>
    </div>
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
<!-- milestone add -->

<?php 

$single_milestone = DB::table('tm_milestone')->where('project_id',$project_id)->orderBy('id','DESC')->first();
 ?>
<div id="addmilestone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Milestone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Milestone Name
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="milestone_name" placeholder="Milestone Name" class="form-control">
                                    <span id="milestone_name_error"><span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="milstone_id">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Milestone Color
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="color" id="milestone_color" placeholder="Milestone Color" class="form-control">
                                    <span id="milestone_color_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Start Date <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date"  id="milestone_start_date" @if(!empty($single_milestone)) value="{{$single_milestone->end_date??''}}"  readonly=""  @endif placeholder="small Description" class="form-control">

                                     <span id="milestone_start_date_error"><span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">End Date
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" id="milestone_end_date" placeholder="small Description" class="form-control">
                                     <span id="milestone_end_date_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-2 col-form-label">Description<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" id="milestone_desc" rows="2"></textarea>
                                     <span id="milestone_desc_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save_milstone()" id="save_milstone" class="add-edit btn btn-primary waves-effect">Add</button>
                <button type="button" class="btn btn-secondary waves-effect waves-light" data-
                    dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /.add-milestone -->
<div id="addclient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 p-0">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="client_name" placeholder="Project Name" class="form-control">
                                    <span id="client_name_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Email
                                    <span class="text-danger"></span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="client_email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Phone No <span
                                        class="text-danger"></span></label>
                                <div class="col-lg-8">
                                    <input type="number" id="client_phone" placeholder="Phone No " class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Address
                                    <span class="text-danger"></span></label>
                                <div class="col-lg-8">
                                    <textarea id="client_address" placeholder="Address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="role" class="col-lg-4 col-form-label">Country</label>
                                <div class="col-lg-8">
                                    <?php

                                       $Country = DB::table('main_countries')->where('isactive','=',1)->get();
                                             
                                           ?>

                                    <select class="form-control" id="country">
                                        <option value="">Select Country</option>
                                        @foreach($Country as $Country)
                                        <option value="{{$Country->id}}">{{$Country->country}}</option>
                                        @endforeach

                                    </select>
                                    <div id="country_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="role" class="col-lg-4 col-form-label">State</label>
                                <div class="col-lg-8">



                                    <select class="form-control" id="state">
                                        <option value="">Select State</option>



                                    </select>
                                    <div id="state_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="role" class="col-lg-4 col-form-label">City</label>
                                <div class="col-lg-8">

                                    <select class="form-control" id="city">
                                        <option value="">Select City</option>




                                    </select>
                                </div>
                                <div id="city_error"></div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Point of Contact<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="contact" placeholder="Point of Contact" class="form-control">
                                    <span id="contact_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="add_client()" class="btn btn-primary waves-effect">Add</button>


                    <button type="button" class="btn btn-default waves-effect waves-light"
                        data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


<div id="addtask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body modal-height">
                <div class="col-sm-12 p-0">
                    <!--<div class="row m-b-20">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <div class="custom-control custom-radio custom-control-inline">-->
                    <!--            <input type="radio" id="customRadioInline1"-->
                    <!--                name="outer-group[0][customRadioInline1]"-->
                    <!--                class="custom-control-input taskradio" value="0" checked> <label-->
                    <!--                class="custom-control-label" for="customRadioInline1">Default-->
                    <!--                Tasks</label></div>-->
                    <!--        <div class="custom-control custom-radio custom-control-inline">-->
                    <!--            <input type="radio" id="customRadioInline2"-->
                    <!--                name="outer-group[0][customRadioInline1]"-->
                    <!--                class="custom-control-input taskradio" value="1"> <label-->
                    <!--                class="custom-control-label" for="customRadioInline2">-->
                    <!--                Frequently used Tasks</label>-->
                    <!--        </div>-->
                    <!--        <div class="custom-control custom-radio custom-control-inline">-->
                    <!--            <input type="radio" id="customRadioInline2"-->
                    <!--                name="outer-group[0][customRadioInline1]"-->
                    <!--                class="custom-control-input taskradio" value="2"> <label-->
                    <!--                class="custom-control-label" for="customRadioInline2">New-->
                    <!--                Task</label>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Task Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="task_name" placeholder="Task Name" class="form-control">
                                    <span id="task_name_error"><span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Estimate Hrs
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="estimate" placeholder="Estimate Hrs" class="form-control">
                                    <span id="estimate_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                          <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                            <label for="empid" class="col-lg-4 col-form-label">Milestone <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                  <select class="form-control" id="milestone_id">
                                   <option value="">Select option</option>
                                    @foreach($milestone as $milestones)
                                     <option value="{{$milestones->id}}">{{$milestones->milestone_name}}</option>
                                    @endforeach
                                  </select>
                                    <span id="milestone_id_error"><span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 timeshow"  style="display: none">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Milestone Start Date
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" id="milestone_sdate" readonly="" placeholder="Estimate Hrs" class="form-control">
                                    <span id="milestone_sdate_error"><span>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-4 timeshow" style="display: none">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Milestone End Date
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" id="milestone_edate" readonly="" placeholder="Estimate Hrs" class="form-control">
                                    <span id="milestone_edate_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Start Date <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" id="tast_start_date" placeholder="small Description"
                                        class="form-control">
                                    <span id="tast_start_date_error"><span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">End Date
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" id="tast_end_date" placeholder="small Description"
                                        class="form-control">
                                    <span id="tast_end_date_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" value="0">
                                <label class="custom-control-label" for="customControlInline">Billable
                                </label>
                            </div>

                        </div>
                        <div class="col-md-2 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" value="1">
                                <label class="custom-control-label" for="customControlInline">Default Task
                                </label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <h5 class="h5after"><span>Assign Resource to Task</span></h5>
                        </div>
                    </div>
                      <div class="row">

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 div-right-b">
                                <h6>QCI Expert <span class="text-danger m-b-20 font-12 font-500">
                                        (Click on resource to add to task)
                                    </span>

                                </h6>
                                <div class="row">
                                    <div class="col-sm-12 m-b-20">
                                        <form method="post" id="searchUser" role="search" class="app-search float-right"
                                            style="height: 0;">
                                            <input type="hidden" name="project_id" value="{{$project_id??0}}">
                                            <div class="form-group mb-0">
                                                <input type="text" id="search" name="searchname"
                                                    class="form-control m-0" placeholder="Search..">
                                                <button type="submit" style="top:10px"><i
                                                        class="fa fa-search"></i></button></div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tag_search">
                                    <div class="row reversediv_task" id="tag_container">


                                        @foreach($newusertasklist as $newuserlists)

                                        <div class="col-sm-6 append_div_task cursorpointer">
                                            <div class="contentsearch card m-b-10 float-left width100 box-shadow">
                                                <div class="media p-l-5 p-r-5 p-t-5">


                                                    @if(!empty($newuserlists->profileimg))
                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/')}}/{{$newuserlists->profileimg}}"
                                                        alt="Generic placeholder image" height="40">
                                                    @elseif($newuserlists->prefix == 1)

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/male.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @elseif($newuserlists->prefix == 2 || $newuserlists->prefix == 3)

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/female.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @else

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/human.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @endif


                                                    <input type="hidden" class="user_id" value="{{$newuserlists->id}}">


                                                    <div class="media-body">
                                                        <h6 class="mt-0 mb-0 font-16 text-info">
                                                            {{$newuserlists->userfullname}}
                                                        </h6>
                                                        <p class="m-0 font-12">{{$newuserlists->employeeId}}</p>

                                                    </div>
                                                </div>
                                                <div class="mainhilight">
                                                    <span class="font-500">{{$newuserlists->jobtitlename}}</span>
                                                </div>
                                                <div class="mainhilight">
                                                    <span class="font-500">{{($newuserlists->emp_type ==1)?'Employee':'Freelancer'}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Selected QCI Expert <span class="text-danger m-b-20 font-12 font-500">
                                        (Click on resource to remove from task)
                                    </span>

                                </h6>
                                <div class="row">
                                    <div class="col-sm-12 m-b-20">
                                        <form role="search" class="app-search float-right" style="height: 0;">
                                            <div class="form-group mb-0">
                                                <input type="text" id="search1" class="form-control m-0"
                                                    placeholder="Search..">
                                                <button type="submit" style="top:10px"><i
                                                        class="fa fa-search"></i></button></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row assigneduser_task">


                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect taskAdd">Add</button>
                <button type="button" class="btn btn-default waves-effect waves-light"
                    data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>




<div id="addresources" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Project Assign </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body modal-height">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 div-right-b">
                                <h6>QCI Expert <span class="text-danger m-b-20 font-12 font-500">
                                        (Click on resource to add to task)
                                    </span>

                                </h6>
                                <div class="row">
                                    <div class="col-sm-12 m-b-20">
                                        <form method="post" id="searchUser" role="search" class="app-search float-right"
                                            style="height: 0;">
                                            <input type="hidden" name="project_id" value="{{$project_id??0}}">
                                            <div class="form-group mb-0">
                                                <input type="text" id="search" name="searchname"
                                                    class="form-control m-0" placeholder="Search..">
                                                <button type="submit" style="top:10px"><i
                                                        class="fa fa-search"></i></button></div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tag_search">
                                    <div class="row reversediv" id="tag_container">


                                        @foreach($newuserlist as $newuserlists)

                                        <div class="col-sm-6 append_div cursorpointer">
                                            <div class="contentsearch card m-b-10 float-left width100 box-shadow">
                                                <div class="media p-l-5 p-r-5 p-t-5">


                                                    @if(!empty($newuserlists->profileimg))
                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/')}}/{{$newuserlists->profileimg}}"
                                                        alt="Generic placeholder image" height="40">
                                                    @elseif($newuserlists->prefix == 1)

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/male.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @elseif($newuserlists->prefix == 2 || $newuserlists->prefix == 3)

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/female.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @else

                                                    <img class="d-flex mr-3 rounded-circle"
                                                        src="{{URL::to('public/uploads/human.png')}}"
                                                        alt="Generic placeholder image" height="40">

                                                    @endif


                                                    <input type="hidden" class="user_id" value="{{$newuserlists->id}}">


                                                    <div class="media-body">
                                                        <h6 class="mt-0 mb-0 font-16 text-info">
                                                            {{$newuserlists->userfullname}}
                                                        </h6>
                                                        <p class="m-0 font-12">{{$newuserlists->employeeId}}</p>

                                                    </div>
                                                </div>
                                                <div class="mainhilight">
                                                    <span class="font-500">{{$newuserlists->jobtitlename}}</span>
                                                </div>
                                                <div class="mainhilight">
                                                    <span class="font-500">{{($newuserlists->emp_type ==1)?'Employee':'Freelancer'}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>

                                    {!! $newuserlist->render() !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Selected QCI Expert <span class="text-danger m-b-20 font-12 font-500">
                                        (Click on resource to remove from task)
                                    </span>

                                </h6>
                                <div class="row">
                                    <div class="col-sm-12 m-b-20">
                                        <form role="search" class="app-search float-right" style="height: 0;">
                                            <div class="form-group mb-0">
                                                <input type="text" id="search1" class="form-control m-0"
                                                    placeholder="Search..">
                                                <button type="submit" style="top:10px"><i
                                                        class="fa fa-search"></i></button></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row assigneduser">


                                    @foreach($userlist as $userlists)

                                    <div class="col-sm-6 assigned cursorpointer">
                                        <div class="contentsearch1 card m-b-10 float-left width100 box-shadow">
                                            <div class="media p-l-5 p-r-5 p-t-5">


                                                @if(!empty($userlists->profileimg))
                                                <img class="d-flex mr-3 rounded-circle"
                                                    src="{{URL::to('public/')}}/{{$userlists->profileimg}}"
                                                    alt="Generic placeholder image" height="40">
                                                @elseif($userlists->prefix == 1)

                                                <img class="d-flex mr-3 rounded-circle"
                                                    src="{{URL::to('public/uploads/male.png')}}"
                                                    alt="Generic placeholder image" height="40">

                                                @elseif($userlists->prefix == 2 || $userlists->prefix == 3)

                                                <img class="d-flex mr-3 rounded-circle"
                                                    src="{{URL::to('public/uploads/female.png')}}"
                                                    alt="Generic placeholder image" height="40">

                                                @else

                                                <img class="d-flex mr-3 rounded-circle"
                                                    src="{{URL::to('public/uploads/human.png')}}"
                                                    alt="Generic placeholder image" height="40">

                                                @endif
                                                <input type="hidden" class="selected_user_id"
                                                    value="{{$userlists->id}}">

                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-0 font-16 text-info">{{$userlists->userfullname}}
                                                    </h6>
                                                    <p class="m-0 font-12">{{$userlists->employeeId}}</p>

                                                </div>
                                            </div>
                                            <div class="mainhilight">
                                                <span class="font-500">{{$userlists->jobtitlename}}</span>
                                            </div>

                                            <div class="mainhilight">
                                                <span class="font-500">{{($userlists->emp_type ==1)?'Employee':'Freelancer'}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="assginproject()" class="btn btn-primary waves-effect waves-light">Assign
                    Resource</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<div id="taskAssign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Task Assign Uses </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 m-b-10">
                        <span class="float-right">
                            <form role="search" class="app-search" style="height: 0;">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control m-0" placeholder="Search by Task..">
                                    <button type="submit" style="top:10px"><i class="fa fa-search"></i></button></div>
                            </form>
                        </span>
                    </div>

                    <div class="col-sm-12 alltask">

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra_js')


<script type="text/javascript">




$("form#comnication_form").submit(function(e) {

 
e.preventDefault();



var token = "{{csrf_token()}}"; 


$.ajax({
url: '/add_comnication',
headers: {'X-CSRF-TOKEN': token}, 
type: "post",
data:$(this).serialize(),

success: function (data) {
//console.log(data.city); // this is good
$('#comnication_form')[0].reset();
if(data.status ==200){
 $('#loadingDiv').hide();

 alertify.success(data.msg); 

}else if(data.status ==202){

  $('#loadingDiv').hide();
  alertify.success(data.msg); 

  }else if(data.status ==203){

  $('#loadingDiv').hide();
  alertify.success(data.msg); 

}else{

 $('#loadingDiv').hide();

 alertify.error(data.msg); 

}

}
});



});




    var project_id = $('#project_id').val();


    function show_input(exp_id){

    
    
   
    $('#editText_'+exp_id).show();
    $('#r_amount_'+exp_id).hide();
    $('#edit_icon_'+exp_id).hide();

}

function close_r_amt(exp_id){

    $('#r_amount_'+exp_id).show();
    $('#editText_'+exp_id).hide();
      $('#edit_icon_'+exp_id).show();
}

function update_r_amt(file_id){



    var file_name = $('#r_amt_'+file_id).val();

    var _token = "{{csrf_token()}}";
    $.ajax({
        url: '/update_file_name',
        type: "post",
        data: {"_token": _token,"file_id":file_id,"file_name":file_name},
        dataType: 'JSON',

        success: function (data) {

            
                $('#editText_'+file_id).hide();
                $('#r_amount_'+file_id).show();
                $('#r_amount_'+file_id).text(file_name);
                 $('#edit_icon_'+file_id).show();


            if(data.status == 200){

               
                alertify.success(data.msg); 

            }else{
                alertify.success(data.msg); 
            }

        }
    });
}


     function upload_files(form_id){


   formData  =  new FormData();
  var files = $('#upload_files')[0].files[0];
  formData.append('profile', files);
   formData.append('form_id', form_id);
   error =1;


      if(error ==1){

          $('#loadingDiv').show();

      var token = "{{csrf_token()}}"; 
    
      $.ajax({
      url: '/upload_form_project_file',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){
               if(data.status ==200){
             $('#loadingDiv').hide();
         
             
              alertify.success(data.msg);

           

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            alertify.success(data.msg);
            

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
       },
    });

      }


 }


    function coordinator_val(m_id){


                    var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/get_coordinator',
                type: "post",
                data: { "_token": _token, "m_id": m_id},
                dataType: 'JSON',

                success: function (data) {
                   console.log(data.manager);
                 $('#coordinator').html(data.manager);

                }
            });

    }

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



    function upload_file(){

  var project_id = $('#project_id').val();
 
  var files = $('#files').val();

     if(files ==''){
       alert('Please Select files')
              return false;
      }

  // var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  //   if(!allowedExtensions.exec(profile)){
  //       $('#profile_error').text('Valid Image').attr('style','color:red');
  //        $('#profile_error').show();
  //          error = 0;
  //       fileInput.value = '';
  //       return false;
  //   }


  



   formData  =  new FormData();
  //var files = $('#files')[0].files[0];

  console.log( $('input[type=file]')[0].files);


 var files =$('input[type=file]')[0].files;
    console.log(files.length);

    for(var i=0;i<files.length;i++){
        formData.append("images[]", files[i], files[i]['name']);

    }


formData.append('project_id', project_id);


   error =1;


      if(error ==1){

          $('#loadingDiv').show();

           var token = "{{csrf_token()}}";

    

   
      $.ajax({
      url: '/upload_file_folder',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){

        if(data.status ==200){
          alertify.success(data.msg); 
           $('#loadingDiv').hide(); 
            get_files(project_id);

       }
     }
      });

      }


 }




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


    function save_milstone(){

        var project_id = $('#project_id').val();
   

        var error = 1;
        var milestone_name = $('#milestone_name').val();
        var milestone_color = $('#milestone_color').val();
        var milestone_start_date = $('#milestone_start_date').val();
        var milestone_end_date = $('#milestone_end_date').val();
        var milestone_desc= $('#milestone_desc').val();
         var milstone_id= $('#milstone_id').val();
        

        if(milestone_name == ''){
            $('#milestone_name_error').html('Please Enter Milestone Name').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_name_error').hide();
            error = 1;
            
        }

       
         if(milestone_start_date == ''){
            $('#milestone_start_date_error').html('Please Choose Start Date').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_start_date_error').hide();
            error = 1;
           
        }

         if(milestone_end_date == ''){
            $('#milestone_end_date_error').html('Please Choose End Date').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_end_date_error').hide();
            error = 1;
           
        }

         if(milestone_desc == ''){
            $('#milestone_desc_error').html('Please Enter Milestone DESC').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_desc_error').hide();
            error = 1;
           
        }

                 var d111 = Date.parse(milestone_start_date);
                  var d222 = Date.parse(milestone_end_date);
                  if (d111 > d222) {
                       $('#milestone_end_date_error').html('Please Wrong  Date').css("color", "red").show();
            error = 0;
            return false;
                  }
     
        $('#save_milstone').attr('disabled','disabled');

              var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/add_milstone',
            type: "post",
            data: { "_token": _token, "project_id": project_id,'milestone_name':milestone_name,'milestone_color':milestone_color,'milestone_start_date':milestone_start_date,'milestone_end_date':milestone_end_date,'milestone_desc':milestone_desc,'milstone_id':milstone_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.allclient); // this is good
                $('#save_milstone').removeAttr('disabled','disabled');


              $('#addmilestone').modal('hide');
                  get_milestone(project_id);
                  location.reload();


            }
        });
        

    }


function edit_milstonr(milstone_id){



     var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/edit_milstone',
            type: "post",
            data: { "_token": _token, "milstone_id": milstone_id },
            dataType: 'JSON',

            success: function (data) {
              
              
         $('#milestone_name').val(data.milstone.milestone_name);
         $('#milestone_color').val(data.milstone.color);
         $('#milestone_start_date').val(data.milstone.start_date);
        $('#milestone_end_date').val(data.milstone.end_date);
        $('#milestone_desc').val(data.milstone.description);
         $('#milstone_id').val(data.milstone.id);
         $('.add-edit').text('Edit');
       
         $('#addmilestone').modal('show');

            }
        });

}


$(document).on('change','#milestone_id',function(){

    var milestone_id = this.value;

   var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/get_milstone_date',
            type: "post",
            data: { "_token": _token, "milestone_id": milestone_id },
            dataType: 'JSON',

            success: function (data) {

                if(data.status == 200){



              $('#milestone_sdate').val(data.milstone.start_date);
               $('#milestone_edate').val(data.milstone.end_date);
                $('.timeshow').show();

                }else{

               $('#milestone_sdate').val('');
               $('#milestone_edate').val('');
                $('.timeshow').hide();

                }
                
            

            }
        });

});

    get_milestone(project_id);

    function get_milestone(project_id) {



        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/all_milstone',
            type: "post",
            data: { "_token": _token, "project_id": project_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.allclient); // this is good
              $('table.milestone tbody').html(data.milstone);


            }
        });
    }


function delete_milstonr(thisval,milstone_id){

      var _token = "{{csrf_token()}}";



        $.ajax({
            url: '/delete_milstone_work_order',
            type: "post",
            data: { "_token": _token, "milstone_id": milstone_id },
            dataType: 'JSON',

            success: function (data) {
                if(data.status == 200){
                    $(thisval).parent().parent().remove();
                    get_milestone(project_id);
                      alertify.success(data.msg);

                }
                 


            }
        });

}


    $(window).on('hashchange', function () {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getData(page);
            }
        }
    });

    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page = $(this).attr('href').split('page=')[1];

            getData(page);
        });

    });

    function getData(page) {
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html"
            }).done(function (data) {
                $("#tag_container").empty().html(data);
                location.hash = page;
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
    }
</script>


<script>



    $("form#resourse_form").submit(function (e) {


        e.preventDefault();

        $('#loadingDiv').show();

        var token = "{{csrf_token()}}";


        $.ajax({
            url: '/resource_user',
            headers: { 'X-CSRF-TOKEN': token },
            type: "post",
            data: $(this).serialize(),

            success: function (data) {
                //console.log(data.city); // this is good

                if (data.status == 200) {
                    $('#loadingDiv').hide();


                    alertify.success(data.msg);

                    //location.reload();

                } else if (data.status == 202) {

                    $('#loadingDiv').hide();
                    swal("Good job!", "User alert Exist", "success");
                    location.reload();

                } else if (data.status == 203) {

                    $('#loadingDiv').hide();
                    swal("Good job!", "Successfully Updated", "success");
                    location.reload();

                } else {

                    $('#loadingDiv').hide();

                    swal("Good job!", "You clicked the button!", "error");

                }

            }
        });



    });



    function assign_more_user(user_id) {

        assignuser = [];
        $('input[name="task_id[]"]:checked').each(function () {

            assignuser.push($(this).val());

        });


        var taskid = [];
        $.each(assignuser, function (i, el) {
            if ($.inArray(el, taskid) === -1) taskid.push(el);
        });



        var project_id = $('#project_id').val();
        var project_task_id = $('#project_task_id').val();
        $('#loadingDiv').show();
        var taskid = JSON.stringify(taskid);
        var _token = "{{csrf_token()}}";
        $.ajax({
            url: '/assign_task_more_user',
            type: "post",
            data: { "_token": _token, "user_id": user_id, 'project_id': project_id, 'taskid': taskid, 'project_task_id': project_task_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.assgintask); // this is good
                $('#loadingDiv').hide();
                if (data.status == 200) {

                    alertify.success(data.msg);

                    //   $('.alltask').html(data.assgintask);
                    $('#taskAssign').modal('hide');

                }

            }


        });


    }


    function getassigntaskview(user_id) {

        var _token = "{{csrf_token()}}";
        var project_id = $('#project_id').val();


        $('#loadingDiv').show();

        $.ajax({
            url: '/assign_task_view',
            type: "post",
            data: { "_token": _token, "user_id": user_id, 'project_id': project_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.assgintask); // this is good
                $('#loadingDiv').hide();
                if (data.status == 200) {

                    $('.alltask').html(data.assgintask);
                    $('#taskAssign').modal('show');

                }

            }


        });
    }


    function getassigntask(user_id) {

        var _token = "{{csrf_token()}}";
        var project_id = $('#project_id').val();



        $('#loadingDiv').show();
        $.ajax({
            url: '/assign_task',
            type: "post",
            data: { "_token": _token, "user_id": user_id, 'project_id': project_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.assgintask); // this is good

                if (data.status == 200) {
                    $('#loadingDiv').hide();
                    $('.alltask').html(data.assgintask);
                    $('#taskAssign').modal('show');

                }

            }


        });
    }

    function assigntask(task_id) {

        assignuser = [];
        $(".selected_user_id_" + task_id).each(function () {

            assignuser.push($(this).val());

        });


        var uniqueNames = [];
        $.each(assignuser, function (i, el) {
            if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
        });

        var project_id = $('#project_id').val();
        var project_task_id = $('#project_task_id').val();

        var userid = JSON.stringify(uniqueNames);

        var _token = "{{csrf_token()}}";

        $('#loadingDiv').show();

        $.ajax({
            url: '/assign_task_users',
            type: "post",
            data: { "_token": _token, "users_id": userid, 'project_id': project_id, 'task_id': task_id, 'project_task_id': project_task_id },
            dataType: 'JSON',

            success: function (data) {
                // console.log(data.allclient); // this is good
                html = '';
                if (data.status == 200) {
                    $('#loadingDiv').hide();


                    // swal("Good job!", "Added Successfully", "success");
                    alertify.success(data.msg);


                    location.reload();

                } else if (data.status == 202) {

                    $('#loadingDiv').hide();
                    alertify.success(data.msg);
                    $('#addclient').modal('hide');

                } else if (data.status == 203) {

                    $('#loadingDiv').hide();
                    alertify.success(data.msg);
                    $('#addclient').modal('hide');



                } else {

                    $('#loadingDiv').hide();

                    alertify.success(data.msg);
                    $('#addclient').modal('hide');


                }

            }
        });


    }


    $("form#assign_task_user").submit(function (e) {


        e.preventDefault();

        $('#loadingDiv').show();

        var token = "{{csrf_token()}}";


        $.ajax({
            url: '/assign_task_users',
            headers: { 'X-CSRF-TOKEN': token },
            type: "post",
            data: $(this).serialize(),

            success: function (data) {
                //console.log(data.city); // this is good

                if (data.status == 200) {
                    $('#loadingDiv').hide();


                    swal("Good job!", "Added Successfully", "success");

                    location.reload();

                } else if (data.status == 202) {

                    $('#loadingDiv').hide();
                    swal("Good job!", "User alert Exist", "success");
                    location.reload();

                } else if (data.status == 203) {

                    $('#loadingDiv').hide();
                    swal("Good job!", "Successfully Updated", "success");
                    location.reload();

                } else {

                    $('#loadingDiv').hide();

                    swal("Good job!", "You clicked the button!", "error");

                }

            }
        });



    });


    $("form#searchUser").submit(function (e) {


        e.preventDefault();

        $('#loadingDiv').show();

        var token = "{{csrf_token()}}";


        $.ajax({
            url: '/search_user_name',
            headers: { 'X-CSRF-TOKEN': token },
            type: "post",
            data: $(this).serialize(),

            success: function (data) {
                //console.log(data.city); // this is good
                $('#loadingDiv').hide();
                $("#tag_search").empty().html(data);

            }
        });



    });


        function coordinator_val(m_id){


                    var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/get_coordinator',
                type: "post",
                data: { "_token": _token, "m_id": m_id},
                dataType: 'JSON',

                success: function (data) {
                   console.log(data.manager);
                 $('#coordinator').html(data.manager);

                }
            });

    }



    function deleteuserproject(val, projectuserassign) {

        var _token = "{{csrf_token()}}";

        var project_id = $('#project_id').val();

        var result = confirm("Want to delete?");
        if (result) {
            //Logic to delete the item

            $('#loadingDiv').show();
            $.ajax({
                url: '/delete_project_user',
                type: "post",
                data: { "_token": _token, "projectuserassign": projectuserassign, 'project_id': project_id },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good
                    html = '';
                    if (data.status == 200) {
                        $('#loadingDiv').hide();


                        // swal("Good job!", "Added Successfully", "success");
                        alertify.success(data.msg);


                        $(val).closest("tr").remove();

                        //location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');

                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');



                    } else {

                        $('#loadingDiv').hide();

                        alertify.success(data.msg);
                        $('#addclient').modal('hide');


                    }

                }
            });

        }
    }


    function assginproject() {



        assignuser = [];
        $(".selected_user_id").each(function () {

            assignuser.push($(this).val());

        });


        var uniqueNames = [];
        $.each(assignuser, function (i, el) {
            if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
        });
        var project_id = $('#project_id').val();
        var token = "{{csrf_token()}}";
        var userid = JSON.stringify(uniqueNames);
        $('#loadingDiv').show();
        $.ajax({
            url: '/assign_project_users',
            headers: { 'X-CSRF-TOKEN': token },
            type: "post",
            data: { 'project_id': project_id, 'users_id': userid },

            success: function (data) {
                //console.log(data.city); // this is good

                if (data.status == 200) {
                    $('#loadingDiv').hide();


                    swal("Good job!", "Added Successfully", "success");

                    location.reload();

                } else if (data.status == 202) {

                    $('#loadingDiv').hide();
                    swal("Good job!", "User alert Exist", "success");
                    location.reload();

                } else if (data.status == 203) {

                    $('#loadingDiv').hide();
                    swal("Good job!", "Successfully Updated", "success");
                    location.reload();

                } else {

                    $('#loadingDiv').hide();

                    swal("Good job!", "You clicked the button!", "error");

                }

            }
        });

    }


    $(document).ready(function () {
        $(document).on("click", ".append_div", function () {
            $(this).click(function () {
                var img_type = $(this).find(".media img").attr("src");
                var name = $(this).find(".text-info").text();
                var empid = $(this).find(".font-12").text();
                var disnation = $(this).find(".font-500").text();
                var assgin_task_id = $(this).find(".assgin_task_id").val();
                var user_id = $(this).find(".user_id").val();

                var append_div = ' <input type="hidden" class="selected_user_id" value="' + user_id + '"><div class="col-sm-6  assigned"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="' + img_type + '" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">' + name + '</h6><p class="m-0 font-12">' + empid + '</p></div></div><div class="mainhilight"><span class="font-500">' + disnation + '</span></div></div></div>'
                $(".assigneduser").append(append_div);
                $(this).remove();
            });

        })
        $(document).on("click", ".assigned", function () {

            var img_type = $(this).find(".media img").attr("src");
            var name = $(this).find(".text-info").text();
            var empid = $(this).find(".font-12").text();
            var disnation = $(this).find(".font-500").text();


            var assgin_task_id = $(this).find(".assgin_task_id").val();


            var user_id = $(this).find(".selected_user_id_" + assgin_task_id).val();

            $(this).remove();

            var project_id = '{{$project_id}}';


            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/remove_assign_task',
                type: "post",
                data: { "_token": _token, "userid": user_id, "assgin_task_id": assgin_task_id, "project_id": project_id },
                dataType: 'JSON',

                success: function (data) {
                    //console.log(data.attendace); // this is good

                    var reversediv = '<div class="col-sm-6 append_div "> <input type="hidden" class="user_id" value="' + user_id + '"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="' + img_type + '" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">' + name + '</h6><p class="m-0 font-12">' + empid + '</p></div></div><div class="mainhilight"><span class="font-500">' + disnation + '</span></div></div></div>'

                    // var reversediv = ' <input type="hidden" class="selected_user_id" value="'+user_id+'"><div class="col-sm-6 append_div assigned"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="assets/images/users/user-6.jpg" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">Nisha Upreti</h6><p class="m-0 font-12">KSPL1167</p><p class="m-0 font-12">2 Hrs</p></div></div><div class="mainhilight"><span class="font-500">HTML Developer</span></div></div></div>';
                    $(".reversediv").append(reversediv);

                }
            });



        })


   
        $(document).on("click", ".append_div_task", function () {
            $(this).click(function () {
                var img_type = $(this).find(".media img").attr("src");
                var name = $(this).find(".text-info").text();
                var empid = $(this).find(".font-12").text();
                var disnation = $(this).find(".font-500").text();
                var assgin_task_id = $(this).find(".assgin_task_id").val();
                var user_id = $(this).find(".user_id").val();

                var append_div = ' <input type="hidden" class="selected_user_task_id" value="' + user_id + '"><div class="col-sm-6  assigned_task"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="' + img_type + '" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">' + name + '</h6><p class="m-0 font-12">' + empid + '</p></div></div><div class="mainhilight"><span class="font-500">' + disnation + '</span></div></div></div>'
                $(".assigneduser_task").append(append_div);
                $(this).remove();
            });

        });
        $(document).on("click", ".assigned_task", function () {

            var img_type = $(this).find(".media img").attr("src");
            var name = $(this).find(".text-info").text();
            var empid = $(this).find(".font-12").text();
            var disnation = $(this).find(".font-500").text();


            var assgin_task_id = $(this).find(".assgin_task_id").val();


            var user_id = $(this).find(".selected_user_id_" + assgin_task_id).val();

          
      var reversediv = '<div class="col-sm-6 append_div_task "> <input type="hidden" class="user_id" value="' + user_id + '"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="' + img_type + '" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">' + name + '</h6><p class="m-0 font-12">' + empid + '</p></div></div><div class="mainhilight"><span class="font-500">' + disnation + '</span></div></div></div>'

         $(".reversediv_task").append(reversediv);
        $(this).remove();
        });


        $(document).on("click", ".assign", function () {
            $(this).click(function () {
                var img_type = $(this).find(".media img").attr("src");
                var name = $(this).find(".text-info").text();
                var empid = $(this).find(".font-12").text();
                var disnation = $(this).find(".font-500").text();
                var assgin_task_id = $(this).find(".assgin_task_id").val();

                var user_id = $(this).find(".user_id_" + assgin_task_id).val();

                // alert(user_id);


                var append_div = '<div class="col-sm-6  assigned"> <input type="hidden" class="selected_user_id_' + assgin_task_id + '" value="' + user_id + '"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="' + img_type + '" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">' + name + '</h6><p class="m-0 font-12">' + empid + '</p></div></div><div class="mainhilight"><span class="font-500">' + disnation + '</span></div></div></div>'
                $(".assigneduser").append(append_div);
                $(this).remove();
            });

        })
        $(document).on("click", ".unassigned", function () {

            var img_type = $(this).find(".media img").attr("src");
            var name = $(this).find(".text-info").text();
            var empid = $(this).find(".font-12").text();
            var disnation = $(this).find(".font-500").text();


            var assgin_task_id = $(this).find(".assgin_task_id").val();

            var user_id = $(this).find(".selected_user_id" + assgin_task_id).val();



            $(this).remove();



            var reversediv = ' <input type="hidden" class="user_id_' + assgin_task_id + '" value="' + user_id + '"><div class="col-sm-6 append_div "><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="' + img_type + '" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">' + name + '</h6><p class="m-0 font-12">' + empid + '</p></div></div><div class="mainhilight"><span class="font-500">' + disnation + '</span></div></div></div>'

            // var reversediv = ' <input type="hidden" class="selected_user_id" value="'+user_id+'"><div class="col-sm-6 append_div assigned"><div class="card m-b-10 float-left width100 box-shadow"><div class="media p-l-5 p-r-5 p-t-5"><img class="d-flex mr-3 rounded-circle" src="assets/images/users/user-6.jpg" alt="Generic placeholder image" height="40"><div class="media-body"><h6 class="mt-0 mb-0 font-16 text-info">Nisha Upreti</h6><p class="m-0 font-12">KSPL1167</p><p class="m-0 font-12">2 Hrs</p></div></div><div class="mainhilight"><span class="font-500">HTML Developer</span></div></div></div>';
            $(".reversediv").append(reversediv);
        })

    })
</script>
<script>

    function getbillable(val, billable) {

        if ($(val).is(':checked')) {
            var target = 1;
        } else {

            var target = 0

        }
        $('#checkval_' + billable).val(target);

    }


    $("form#task_form").submit(function (e) {


        e.preventDefault();



        var token = "{{csrf_token()}}";

        $('#loadingDiv').show();
        $.ajax({
            url: '/update_task',
            headers: { 'X-CSRF-TOKEN': token },
            type: "post",
            data: $(this).serialize(),

            success: function (data) {
                //console.log(data.city); // this is good

                if (data.status == 200) {
                    $('#loadingDiv').hide();


                    alertify.success(data.msg);

                    location.reload();

                } else if (data.status == 202) {

                    $('#loadingDiv').hide();
                    alertify.success(data.msg);
                    //  location.reload();

                } else if (data.status == 203) {

                    $('#loadingDiv').hide();
                    alertify.success(data.msg);
                    location.reload();

                } else {

                    $('#loadingDiv').hide();

                    swal("Good job!", "You clicked the button!", "error");

                }

            }
        });



    });


    function deletetask(val, task_id) {

        var result = confirm("Want to delete?");
        if (result) {
            //Logic to delete the item

            $('#loadingDiv').show();
            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/delete_task',
                type: "post",
                data: { "_token": _token, "task_id": task_id },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good
                    html = '';
                    if (data.status == 200) {
                        $('#loadingDiv').hide();


                        // swal("Good job!", "Added Successfully", "success");
                        alertify.success(data.msg);


                        $(val).closest("tr").remove();

                        //location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');

                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');



                    } else {

                        $('#loadingDiv').hide();

                        alertify.success(data.msg);
                        $('#addclient').modal('hide');


                    }

                }
            });

        }

    }


    function add_client() {

        var error = 1
        var client_name = $('#client_name').val();
        var client_email = $('#client_email').val();
        var client_phone = $('#client_phone').val();
        var client_address = $('#client_address').val();
        var country = $('#country').val();

        var state = $('#state').val();
        var city = $('#city').val();
        var contact = $('#contact').val();

        if (client_name == '') {
            $('#client_name_error').text('Client is Required').attr('style', 'color:red');
            $('#client_name_error').show();
            error = 0;
            return false;
        } else { $('#client_name_error').hide(); error++; }

        if (contact == '') {
            $('#contact_error').text('Contact is Required').attr('style', 'color:red');
            $('#contact_error').show();
            error = 0;
            return false;
        } else { $('#contact_error').hide(); error++; }

        if (error > 2) {


            $('#loadingDiv').show();
            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/add_client_project',
                type: "post",
                data: { "_token": _token, "client_name": client_name, "client_email": client_email, "client_phone": client_phone, "client_address": client_address, "country": country, "state": state, "city": city, "contact": contact },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good
                    html = '';
                    if (data.status == 200) {
                        $('#loadingDiv').hide();


                        // swal("Good job!", "Added Successfully", "success");
                        alertify.success(data.msg);

                        if (data.allclient.length > 0) {

                            $.each(data.allclient, function (k, v) {
                                html = html += ' <option value="' + v.id + '">' + v.client_name + '</option> ';

                            });
                        } else {
                            html = html += 'Client not available';
                        }


                        // console.log(html);
                        $(".client_pro").html(html);

                        $('#addclient').modal('hide');

                        //location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');

                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');



                    } else {

                        $('#loadingDiv').hide();

                        alertify.success(data.msg);
                        $('#addclient').modal('hide');


                    }

                }
            });
        }


    }


    $(document).on('click', '#saveProject', function (event) {

        event.preventDefault();
        error = 1;
        var project = $('#project_name').val();
        var project_status = $('#project_status').val();
        var base_project = $('#base_project').val();
        var category = $('#category').val();
        var project_client = $('#project_client').val();
        var currecy = $('#currecy').val();
        var checkval = $('input[name="project_type"]:checked').val();

        var project_desc = $('#project_desc').val();

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var estimated = $('#estimated').val();
        var manager = $('#manager').val();

         var builder = $('#builder').val();
           var location = $('#location').val();
            var project_temp_id = $('#project_temp_id').val();
            var temp_id = $('#temp_id').val();
            var work_order_no = $('#work_order_no').val();
            var coordinator = $('#coordinator').val();

  
       // var project_id = '{{$project_id}}';

        if (project == '') {
            $('#project_error').text('Project is Required').attr('style', 'color:red');
            $('#project_error').show();
            error = 0;
            return false;
        } else { $('#project_error').hide(); error++; }

        if (project_status == '') {
            $('#project_status_error').text('Project Status is Required').attr('style', 'color:red');
            $('#project_status_error').show();
            error = 0;
            return false;
        } else { $('#project_status_error').hide(); error++; }

        if (category == '') {
            $('#category_error').text('Category is Required').attr('style', 'color:red');
            $('#category_error').show();
            error = 0;
            return false;
        } else { $('#category_error').hide(); error++; }

        if (project_client == '') {
            $('#project_client_error').text('Cleint is Required').attr('style', 'color:red');
            $('#project_client_error').show();
            error = 0;
            return false;
        } else { $('#project_client_error').hide(); error++; }

        if (currecy == '') {
            $('#currecy_error').text('Currency is Required').attr('style', 'color:red');
            $('#currecy_error').show();
            error = 0;
            return false;
        } else { $('#currecy_error').hide(); error++; }

        if (project_desc == '') {
            $('#project_desc_error').text('Description is Required').attr('style', 'color:red');
            $('#project_desc_error').show();
            error = 0;
            return false;
        } else { $('#project_desc_error').hide(); error++; }

        if (from_date == '') {
            $('#from_date_error').text('Form Date is Required').attr('style', 'color:red');
            $('#from_date_error').show();
            error = 0;
            return false;
        } else { $('#from_date_error').hide(); error++; }


        if (to_date == '') {
            $('#to_date_error').text('To Date is Required').attr('style', 'color:red');
            $('#to_date_error').show();
            error = 0;
            return false;
        } else { $('#to_date_error').hide(); error++; }

        if (estimated == '') {
            $('#estimated_error').text('Estimated hour is Required').attr('style', 'color:red');
            $('#estimated_error').show();
            error = 0;
            return false;
        } else { $('#estimated_error').hide(); error++; }

        if (manager == '') {
            $('#manager_error').text('Manager is Required').attr('style', 'color:red');
            $('#manager_error').show();
            error = 0;
            return false;
        } else { $('#manager_error').hide(); error++; }

        if (error > 0) {
            $('#loadingDiv').hide();
            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/add_new_project',
                type: "post",
                data: { "_token": _token, "project": project, "project_status": project_status, "base_project": base_project, "category": category, "project_client": project_client, "currecy": currecy, "checkval": checkval, "project_desc": project_desc, "from_date": from_date, "to_date": to_date, "estimated": estimated, 'manager': manager, 'project_id': project_id ,"builder":builder,"location":location,"project_temp_id":project_temp_id,"temp_id":temp_id,"work_order_no":work_order_no,"coordinator":coordinator  },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();

                        alertify.success(data.msg);

                        $("#tasktab").removeClass("disabledTab");
                        $('#project_id').val(data.project_id);
                        $('#project_form')[0].reset();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);

                        window.location = "{{URL::to('/')}}/project-view/"+data.project_id;


                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');



                    } else {

                        $('#loadingDiv').hide();

                        alertify.success(data.msg);
                        $('#addclient').modal('hide');


                    }

                }
            });


        }


    });



    $(document).on('click', '.taskAdd', function (event) {

        event.preventDefault();


        assignuser = [];
        $(".selected_user_task_id").each(function () {

            assignuser.push($(this).val());

        });


        var uniqueNames = [];
        $.each(assignuser, function (i, el) {
            if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
        });
        
        var user_assign_new_task = JSON.stringify(uniqueNames);

        var error = 1
        var project_id = $('#project_id').val();
        var taskradio = $('.taskradio').val();
        var task_name = $('#task_name').val();
        var estimate = $('#estimate').val();
        var tast_start_date = $('#tast_start_date').val();
        var tast_end_date = $('#tast_end_date').val();
        var customControlInline = $('#customControlInline').val();

        var milestone_id = $('#milestone_id').val();
        var milestone_sdate = $('#milestone_sdate').val();
        var milestone_edate = $('#milestone_edate').val();

        if (task_name == '') {
            $('#task_name_error').text('Task Name is Required').attr('style', 'color:red');
            $('#task_name_error').show();
            error = 0;
            return false;
        } else { $('#task_name_error').hide(); error++; }

        if (estimate == '') {
            $('#estimate_error').text('Estimate is Required').attr('style', 'color:red');
            $('#estimate_error').show();
            error = 0;
            return false;
        } else { $('#estimate_error').hide(); error++; }

         if (milestone_id == '') {
            $('#milestone_id_error').text('Milestone is Required').attr('style', 'color:red');
            $('#milestone_id_error').show();
            error = 0;
            return false;
        } else { $('#milestone_id_error').hide(); error++; }

        if (tast_start_date == '') {
            $('#tast_start_date_error').text('Start Date is Required').attr('style', 'color:red');
            $('#tast_start_date_error').show();
            error = 0;
            return false;
        } else { $('#tast_start_date_error').hide(); error++; }

        if (tast_end_date == '') {
            $('#tast_end_date_error').text('End Date is Required').attr('style', 'color:red');
            $('#tast_end_date_error').show();
            error = 0;
            return false;
        } else { $('#tast_end_date_error').hide(); error++; }



                 var msdate = Date.parse(milestone_sdate);
                  var tdate = Date.parse(tast_start_date);
                  if (msdate > tdate) {
                       $('#tast_start_date_error').html('Milstone Greater  Date').css("color", "red").show();
                     error = 0;
                      return false;
                  }


                 var m_edate = Date.parse(milestone_edate);
                  var end_date = Date.parse(tast_end_date);
                  if (end_date > m_edate) {
                       $('#tast_end_date_error').html(' Milstone Less  Date').css("color", "red").show();
            error = 0;
            return false;
                  }


                  var start_c_date = Date.parse(tast_start_date);
                  var end_c_date = Date.parse(tast_end_date);
                  if (end_c_date < start_c_date) {
                       $('#tast_end_date_error').html(' Wrong  Date').css("color", "red").show();
            error = 0;
            return false;
                  }

        if (error > 0) {

            var _token = "{{csrf_token()}}";
            $('#loadingDiv').show();
            $.ajax({
                url: '/add_task',
                type: "post",
                data: { "_token": _token, "project_id": project_id, "taskradio": taskradio, "task_name": task_name, "estimate": estimate, "tast_start_date": tast_start_date, "tast_end_date": tast_end_date, "customControlInline": customControlInline,"milestone_id":milestone_id,"user_assign_new_task":user_assign_new_task },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();

                        alertify.success(data.msg);

                        $("#tasktab").removeClass("disabledTab");
                        $('#project_id').val(data.project_id);
                        $('#project_form')[0].reset();
                        location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);


                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);
                        $('#addclient').modal('hide');



                    } else {

                        $('#loadingDiv').hide();

                        alertify.error(data.msg);
                        $('#addclient').modal('hide');


                    }

                }
            });


        }

    });

    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
    $(document).on('keyup', '#search', function () {
        // Search text
        var text = $(this).val().toLowerCase();

        // Hide all content class element
        $('.contentsearch').hide();

        // Search 
        $('.contentsearch .media-body').each(function () {

            if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                $(this).closest('.contentsearch').show();
            }
        });
    })
    // $(document).ready(function(){
    //   $('#search').keyup(function(){


    //  });
    // });
    $(document).ready(function () {
        $('#search1').keyup(function () {

            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.contentsearch1').hide();

            // Search 
            $('.contentsearch1 .media-body').each(function () {

                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.contentsearch1').show();
                }
            });
        });
    });
</script>
<script>
    function openTab1(evt, tabName) {
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

    $(document).ready(function () {
        $("#datatable1").DataTable();
        $("#selectmilestone").change(function () {
            $("#milestonedate").css("display", "flex");
        })
    });
</script>
@stop