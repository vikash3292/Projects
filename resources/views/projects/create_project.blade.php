@extends('layouts.superadmin_layout')
@section('content')
<?php  //echo "<pre>"; print_r($classData); ?>
<!-- Content Wrapper. Contains page content -->
@section('extra_css')


@stop
<!-- Start content -->
<div class="content p-0">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center bredcrum-style">
                <div class="col-sm-6">
                    <h4 class="page-title">Add Project</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Add Project / Task /
                                QCI Expert</a>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-6">
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
                            <button class="tablinks" onclick="openTab(event, 'details')" id="defaultOpen">Details
                            </button>
                            <!-- <button class="tablinks" onclick="openTab(event, 'leaves')">Leaves</button>
                                                    <button class="tablinks" onclick="openTab(event, 'holiday')">Holiday</button> -->
                            <button class="tablinks" onclick="openTab(event, 'tasks')">Tasks</button>
                            <button class="tablinks" onclick="openTab(event, 'resources')">QCI Expert</button>
                            <button class="tablinks" onclick="openTab(event, 'filemanager')">File Manager</button>
                            <button class="tablinks" onclick="openTab(event, 'payment')">Payments</button>
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
                                                <input type="text" id="project_name" class="form-control">
                                                <span id="project_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Builder
                                                </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="builder" class="form-control">
                                                <span id="builder_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                      

                                        <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Location</label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="location" class="form-control">
                                                <span id="location_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Project ID </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="project_temp_id" class="form-control">
                                                <span id="project_temp_id_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Temp ID </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="temp_id" class="form-control">
                                                <span id="temp_id_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">Work Order No </label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" id="work_order_no" class="form-control">
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
                                                    <option>in-progress</option>
                                                    <option>initiated</option>

                                                    <option>draft</option>
                                                    <option>hold</option>
                                                    <option>completed</option>
                                                </select>
                                                <span id="project_status_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                                    
                                                    $baseproject = DB::table('tm_projects')->where('is_active',1)->get();
                                                    
                                                    ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="prifix" class="col-lg-4 col-form-label">Base
                                                Project</label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control js-example-basic-single" id="base_project">
                                                    <option value="">Select Project</option>
                                                    @foreach($baseproject as $baseprojects)
                                                    <option value="{{$baseprojects->id}}">
                                                        {{$baseprojects->project_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                     <?php
                                   $main_category = DB::table('main_project_category')->where('status',1)->get();
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="firstname" class="col-lg-4 col-form-label">Project Category<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control" id="category">
                                                    <option value="">Select Category</option>
                                                      @foreach($main_category as $main_categorys)
                                                             <option value="{{$main_categorys->id}}">{{$main_categorys->cat_name}}</option>
                                                            @endforeach
                                                </select>
                                                <span id="category_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                                    
                                                    $org = Db::table('main_lead_list')->where('lead_status',5)->get();
                                                    
                                                    ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="logo" class="col-lg-4 col-form-label">Organization
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control client_pro js-example-basic-single"
                                                    id="project_client">
                                                    <option value="">Select option</option>
                                                    @foreach($org as $clients)

                                                    <option value="{{$clients->id}}">{{$clients->company}}</option>

                                                    @endforeach
                                                </select>
                                                <span id="project_client_error"></span>
                                               <!--  <a data-toggle="modal" data-target="#addclient">Add Client</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                                        
                                                        $currency = Db::table('main_currency')->where('isactive',1)->get();
                                                        
                                                        ?>
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">Currency
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="currecy">
                                                    <option value="">Select Currency</option>
                                                    @foreach($currency as $currencys)
                                                    <option value="{{$currencys->id}}" @if($currencys->id==4) selected
                                                        @endif>{{$currencys->currencyname}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="currecy_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                                        
                                                        $managerlist = Db::table('main_users')->where('emprole',3)->where('isactive',1)->get();
                                                        
                                                        ?>
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">Project Associate
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="manager" onchange="coordinator_val(this.value)">
                                                    <option value="">Select Option</option>
                                                    @foreach($managerlist as $managerlists)
                                                    <option value="{{$managerlists->id}}">
                                                        {{$managerlists->userfullname}}</option>
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
                                                  
                                                </select>
                                                <span id="coordinator_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                   $stage = DB::table('main_stage')->where('status',1)->get();
                                    ?>
                                   <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="email" class="col-lg-4 col-form-label">
                                                Stage
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label">
                                                <select class="form-control" id="stage">
                                                    <option value="">Select Option</option>
                                                    @foreach($stage as $stages)
                                                    <option value="{{$stages->id}}">
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
                                                        name="project_type" checked
                                                        class="custom-control-input checkval">
                                                    <label class="custom-control-label"
                                                        for="customRadioInline1">Billable</label></div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="project_type"
                                                        value="non_billable" class="custom-control-input checkval">
                                                    <label class="custom-control-label " for="customRadioInline2">Non
                                                        Billable</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="project_type"
                                                        value="revenue" class="custom-control-input checkval">
                                                    <label class="custom-control-label" for="customRadioInline2">Revenue
                                                        Generation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="mode" class="col-lg-4 col-form-label">Description<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8 col-form-label">
                                                <textarea class="form-control" id="project_desc" rows="3"></textarea>
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
                                                                <input type="date" id="from_date" class="form-control">
                                                                <span id="from_date_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row m-0">
                                                            <label for="role" class="col-lg-5 col-form-label">Estimate
                                                                Date To <span class="text-danger">*</span></label>
                                                            <div class="col-lg-7 col-form-label">
                                                                <input type="date" id="to_date" class="form-control">
                                                                <span id="to_date_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row m-0">
                                                            <label for="role" class="col-lg-5 col-form-label">Estimation
                                                                Hours <span class="text-danger">*</span></label>
                                                            <div class="col-lg-7 col-form-label">
                                                                <input type="text" id="estimated" class="form-control" onkeypress="preventNonNumericalInput(event)" maxlength="8">
                                                                <span id="estimated_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>
<!--   <div class="col-sm-12">
                                                <h3 class="m-t-20">Activity</h3>
                                                <button class="btn btn-primary float-right" data-target="#addmilestone"
                                                    data-toggle="modal">Add Milestone</button>
                                                <table id="datatable1"
                                                    class="table table-bordered dt-responsive nowrap projectlist"
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Ujjval</td>
                                                            <td>Red</td>
                                                            <td>
                                                                02-03-2020
                                                            </td>
                                                            <td>
                                                                02-05-2020
                                                            </td>
                                                            <td class="text_ellipses">dummy dummy</td>
                                                            <td>
                                                                <a href="#" data-toggle="tooltip" title="Edit">
                                                                    <i class="mdi mdi-pencil text-warning"></i>
                                                                </a>
                                                                <i class="fa fa-trash font-blue" data-toggle="tooltip"
                                                                    title="Delete"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->
                                <div class="col-md-4 form-group m-t-10">
                                    <input type="submit" class="btn btn-primary" id="saveProject" value="Save">
                                </div>
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
                            <input type="hidden" id="project_id" value="1">
                            <div class="col-sm-12">
                                <table id="datatable1"
                                    class="table table-bordered dt-responsive nowrap projectlist font-14"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Estimated Hour</th>
                                            <th>Billable</th>
                                            <th>Task Status</th>
                                            <th>Task Start Date</th>
                                            <th>Task End Date</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Documantation</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customControlInline"> <label class="custom-control-label"
                                                        for="customControlInline">
                                                    </label>
                                                </div>
                                            </td>
                                            <td><a href="#" data-type="text" data-pk="2" class="editable" data-url=""
                                                    data-title="Edit Quantity">
                                                    <select class="form-control">
                                                        <option>In-Progress</option>
                                                    </select>
                                                </a>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control">
                                            </td>
                                            <td>Created By</td>
                                            <td>
                                                <i class="fa fa-user-check font-blue"></i>
                                                <a href="#">
                                                    <i class="fa fa-eye font-blue"></i>
                                                </a>
                                                <i class="fa fa-trash font-blue"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="resources" class="tabcontent">
                            <div class="col-12">
                                <h5 class="m-b-20"><span>Resources</span>
                                    <button class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#addresources">Add
                                        Resources</button>
                                </h5>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <table id="datatable"
                                    class="table table-bordered dt-responsive nowrap projectlist font-14"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Employee</th>
                                            <th>Billable Rate/Hr(INR)</th>
                                            <th>Cost Rate/Hr(INR)</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img class="img-responsive thumb-sm" src="assets/images/logo-sm.png">
                                                Nitish Kumar <span class="manager">M</span></td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>Misha Miglani</td>
                                            <td>
                                                <i class="fa fa-user-check font-blue"></i>
                                                <a href="#">
                                                    <i class="fa fa-eye font-blue"></i>
                                                </a>
                                                <i class="fa fa-trash font-blue"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="filemanager" class="tabcontent">
                            <h3>File Manager</h3>
                            <div class="width-float">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-4 col-form-label">File
                                                Name <span class="text-danger"></span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 m-t-30">
                                        <form action="#" class="dropzone">
                                            <div class="fallback"><input name="file" type="file" multiple="multiple">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12 text-center m-t-15">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">Upload
                                            Files</button>
                                    </div>
                                </div>
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
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
                <!-- container-fluid -->
            </div>
        </div>
    </div>
    <div id="addclient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
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
                                        <input type="text" id="client_name" placeholder="Project Name"
                                            class="form-control">
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
                                        <input type="number" id="client_phone" maxlength="12" placeholder="Phone No "
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="empid" class="col-lg-4 col-form-label">Address
                                        <span class="text-danger"></span></label>
                                    <div class="col-lg-8">
                                        <textarea id="client_address" placeholder="Address"
                                            class="form-control"></textarea>
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
                                        <input type="text" id="contact" placeholder="Point of Contact"
                                            class="form-control">
                                        <span id="contact_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="add_client()" class="btn btn-primary waves-effect">Add</button>


                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-
                            dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

  <!-- milestone add -->
                    <div id="addmilestone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Add Milestone</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12 p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="empid" class="col-lg-4 col-form-label">Milestone Name
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <input type="text" placeholder="Milestone Name"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="empid" class="col-lg-4 col-form-label">Milestone Color
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <input type="text" placeholder="Milestone Color"
                                                            class="form-control">
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
                                                        <input type="date" placeholder="small Description"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="empid" class="col-lg-4 col-form-label">End Date
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <input type="date" placeholder="small Description"
                                                            class="form-control">
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
                                                        <textarea class="form-control" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary waves-effect">Add</button>
                                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-
                                        dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.add-milestone -->
<div id="addtask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 p-0">
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="outer-group[0][customRadioInline1]"
                                    class="custom-control-input taskradio" value="0" checked> <label
                                    class="custom-control-label" for="customRadioInline1">Default
                                    Tasks</label></div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="outer-group[0][customRadioInline1]"
                                    class="custom-control-input taskradio" value="1"> <label
                                    class="custom-control-label" for="customRadioInline2">
                                    Frequently used Tasks</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="outer-group[0][customRadioInline1]"
                                    class="custom-control-input taskradio" value="2"> <label
                                    class="custom-control-label" for="customRadioInline2">New
                                    Task</label>
                            </div>
                        </div>
                    </div>
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
                                    <input type="text" id="estimate" placeholder="small Description"
                                        class="form-control">
                                    <span id="estimate_error"><span>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect taskAdd">Add</button>
                <button type="button" class="btn btn-secondary waves-effect waves-light" data-
                    dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<!--  <div id="addresources" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"-->
<!--    aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title mt-0" id="myModalLabel">Add Resource</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal"-->
<!--                    aria-hidden="true">×</button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="col-sm-12 p-0">-->
<!--                    <div class="row m-b-20">-->
<!--                        <div class="col-md-12">-->
<!--                            <div class="custom-control custom-radio custom-control-inline">-->
<!--                                <input type="radio" id="customRadioInline1"-->
<!--                                    name="outer-group[0][customRadioInline1]"-->
<!--                                    class="custom-control-input"> <label-->
<!--                                    class="custom-control-label" for="customRadioInline1">Default-->
<!--                                    Tasks</label></div>-->
<!--                            <div class="custom-control custom-radio custom-control-inline">-->
<!--                                <input type="radio" id="customRadioInline2"-->
<!--                                    name="outer-group[0][customRadioInline1]"-->
<!--                                    class="custom-control-input"> <label-->
<!--                                    class="custom-control-label" for="customRadioInline2">-->
<!--                                    Frequently used Tasks</label>-->
<!--                            </div>-->
<!--                            <div class="custom-control custom-radio custom-control-inline">-->
<!--                                <input type="radio" id="customRadioInline2"-->
<!--                                    name="outer-group[0][customRadioInline1]"-->
<!--                                    class="custom-control-input"> <label-->
<!--                                    class="custom-control-label" for="customRadioInline2">New-->
<!--                                    Task</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group row">-->
<!--                                <label for="empid" class="col-lg-4 col-form-label">Name <span-->
<!--                                        class="text-danger">*</span></label>-->
<!--                                <div class="col-lg-8">-->
<!--                                    <input type="text" placeholder="small Description"-->
<!--                                        class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group row">-->
<!--                                <label for="empid" class="col-lg-4 col-form-label">Estimate Hrs-->
<!--                                    <span class="text-danger">*</span></label>-->
<!--                                <div class="col-lg-8">-->
<!--                                    <input type="text" placeholder="small Description"-->
<!--                                        class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group row">-->
<!--                                <label for="empid" class="col-lg-4 col-form-label">Start Date <span-->
<!--                                        class="text-danger">*</span></label>-->
<!--                                <div class="col-lg-8">-->
<!--                                    <input type="date" placeholder="small Description"-->
<!--                                        class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-group row">-->
<!--                                <label for="empid" class="col-lg-4 col-form-label">End Date-->
<!--                                    <span class="text-danger">*</span></label>-->
<!--                                <div class="col-lg-8">-->
<!--                                    <input type="date" placeholder="small Description"-->
<!--                                        class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-2 form-group">-->
<!--                            <div class="custom-control custom-checkbox">-->
<!--                                <input type="checkbox" class="custom-control-input"-->
<!--                                    id="customControlInline" value="0"> <label class="custom-control-label"-->
<!--                                    for="customControlInline">Billable-->
<!--                                </label>-->
<!--                            </div>-->

<!--                        </div>-->
<!--                        <div class="col-md-2 form-group">-->
<!--                            <div class="custom-control custom-checkbox">-->
<!--                                <input type="checkbox" class="custom-control-input"-->
<!--                                    id="customControlInline" value="1"> <label class="custom-control-label"-->
<!--                                    for="customControlInline">Default Task-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-primary waves-effect">Add</button>-->
<!--                <button type="button" class="btn btn-secondary waves-effect waves-light" data--->
<!--                    dismiss="modal">Cancel</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- /.content-wrapper -->
@endsection

@section('extra_js')
<script>


    var Base_Url = window.location.host;


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

        } else { $('#client_name_error').hide(); error++; }



        if (contact == '') {
            $('#contact_error').text('Contact is Required').attr('style', 'color:red');
            $('#contact_error').show();
            error = 0;

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
         var stage = $('#stage').val();

          var builder = $('#builder').val();
           var location = $('#location').val();
            var project_temp_id = $('#project_temp_id').val();
            var temp_id = $('#temp_id').val();
            var work_order_no = $('#work_order_no').val();
            var coordinator = $('#coordinator').val();


       



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

          if (stage == '') {
            $('#stage_error').text('Stage is Required').attr('style', 'color:red');
            $('#stage_error').show();
            error = 0;
            return false;
        } else { $('#stage_error').hide(); error++; }

        if (error > 0) {

         

            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/add_new_project',
                type: "post",
                data: { "_token": _token, "project": project, "project_status": project_status, "base_project": base_project, "category": category, "project_client": project_client, "currecy": currecy, "checkval": checkval, "project_desc": project_desc, "from_date": from_date, "to_date": to_date, "estimated": estimated, 'manager': manager,"stage":stage,"builder":builder,"location":location,"project_temp_id":project_temp_id,"temp_id":temp_id,"work_order_no":work_order_no,"coordinator":coordinator },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();

                        alertify.success(data.msg);

                        $("#tasktab").removeClass("disabledTab");
                        $('#project_id').val(data.project_id);
                        $('#project_form')[0].reset();

                        window.location.href = "/edit-project/" + data.project_id;

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        alertify.success(data.msg);


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

        var error = 1
        var project_id = $('#project_id').val();
        var taskradio = $('.taskradio').val();
        var task_name = $('#task_name').val();
        var estimate = $('#estimate').val();
        var tast_start_date = $('#tast_start_date').val();
        var tast_end_date = $('#tast_end_date').val();
        var customControlInline = $('#customControlInline').val();

        if (task_name == '') {
            $('#task_name_error').text('Task Name is Required').attr('style', 'color:red');
            $('#task_name_error').show();
            error = 0;

        } else { $('#task_name_error').hide(); error++; }

        if (estimate == '') {
            $('#estimate_error').text('Estimate is Required').attr('style', 'color:red');
            $('#estimate_error').show();
            error = 0;

        } else { $('#estimate_error').hide(); error++; }

        if (tast_start_date == '') {
            $('#tast_start_date_error').text('Start Date is Required').attr('style', 'color:red');
            $('#tast_start_date_error').show();
            error = 0;

        } else { $('#tast_start_date_error').hide(); error++; }

        if (tast_end_date == '') {
            $('#tast_end_date_error').text('End Date is Required').attr('style', 'color:red');
            $('#tast_end_date_error').show();
            error = 0;

        } else { $('#tast_end_date_error').hide(); error++; }

        if (error > 0) {

            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/add_task',
                type: "post",
                data: { "_token": _token, "project_id": project_id, "taskradio": taskradio, "task_name": task_name, "estimate": estimate, "tast_start_date": tast_start_date, "tast_end_date": tast_end_date, "customControlInline": customControlInline },
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

    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

</script>
<script>
    function openTab(evt, tabName) {
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