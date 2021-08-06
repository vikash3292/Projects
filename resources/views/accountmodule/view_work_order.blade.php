@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
	<div class="container-fluid">
		<div class="page-title-box">
			<div class="row align-items-center bredcrum-style">
				<div class="col-sm-6 col-6">
					<h3 class="page-title">Work Order</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">GRC</a></li>
						<li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Work Order</a>
						</li>
					</ol>
				</div>
				<div class="col-sm-6 col-6">
					<div class="float-right d-md-block">
						<div class="dropdown">
                           <!--    <a href="edit_workorder.html">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button">
                                    Edit Work Order</button>
                                </a> -->
                                          <!--   <button
                                                class="btn btn-primary" data-toggle="model" data-target="#addmilestone"
                                                type="button">
                                            Add Milestone</button> -->
                                              <a href="{{URL::to('/edit-work-order')}}/{{$work_id}}"><button class="btn btn-primary" type="button">Edit</button></a>
                                            @if($view_work->status == 1 && count($get_milestone) > 0)
                                 <button
                                            class="btn btn-primary" data-toggle="modal" data-target="#convertproject"
                                            type="button">
                                        Convert Project</button>

                                        @endif

                                        <a href="work_order.html">
                                        	<button class="btn btn-primary" type="button">
                                        	Back to List</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                    	<div class="col-12">
                    		<div class="card m-t-20">
                    			<div class="card-body">
                    				<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#detail" role="tab" aria-selected="false"><span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    						<span class="d-none d-sm-block">Detail</span></a></li>
                    						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#milestone" role="tab" aria-selected="false"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    							<span class="d-none d-sm-block">Milestone</span></a></li>
                                 <!--      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#invoice" role="tab" aria-selected="true"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                 	<span class="d-none d-sm-block">Invoices</span></a></li> -->
                                 </ul>
                                 <!-- Tab panes -->
                                 <div class="tab-content">
                                 	<div class="tab-pane p-3 active" id="detail" role="tabpanel">
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0 b-b-d">
                                 					<label for="empcode" class="col-lg-4 col-form-label">Work Order Name</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$view_work->work_order_name}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0 b-b-d">
                                 					<label for="empid" class="col-lg-4 col-form-label">Work Order No.</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$view_work->work_order_no}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0 b-b-d">
                                 					<label for="prifix" class="col-lg-4 col-form-label">Amount</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$view_work->work_amt}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0 b-b-d">
                                 					<label for="firstname" class="col-lg-4 col-form-label">Project Name</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$view_work->project_name}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0 b-b-d">
                                 					<label for="logo" class="col-lg-4 col-form-label">Sales Person</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$view_work->userfullname}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0 b-b-d">
                                 					<label for="email" class="col-lg-4 col-form-label">Status</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{($view_work->status == 1?'Pending':($view_work->status == 2?'In-Proccess':'Complete'))}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-sm-12 m-t-20">
                                 				<h5 class="h5after"><span>Scope of Work</span></h5>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="empcode" class="col-lg-4 col-form-label">Name of SOW</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->scope_name??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="empid" class="col-lg-4 col-form-label">Organization</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->org_name??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="prifix" class="col-lg-4 col-form-label">Work Order</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->work_order_name??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="firstname" class="col-lg-4 col-form-label">Contact</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->contact_no??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="logo" class="col-lg-4 col-form-label">Created By</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->created_name??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="email" class="col-lg-4 col-form-label">Modified By</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->modifile_name??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                 		<div class="row">
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="cid" class="col-lg-4 col-form-label">Modified DateTime</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->modifiled_at??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 			<div class="col-md-6">
                                 				<div class="form-group row m-0">
                                 					<label for="mode" class="col-lg-4 col-form-label">Created Time</label>
                                 					<div class="col-lg-8 col-form-label">
                                 						<label class="myprofile_label">{{$scope_view->created_at??''}}</label>
                                 					</div>
                                 				</div>
                                 			</div>
                                 		</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>Scope of Work Editor</h4>
                                            </div>
                                        </div>
                                 	</div>
                                 	<div class="tab-pane p-3" id="milestone" role="tabpanel">
                                 		<div class="row">
                                 			<div class="col-sm-12 m-t-20">
                                 				<h4>Activity Gantt Chart</h4>
                                 				<div id="chart_div" class="m-t-20"></div>
                                 			</div>
                                 		</div>
                                    <!--  <div class="col-sm-12 m-t-10 p-0">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                           <thead>
                                              <tr>
                                                 <th>S.No</th>
                                                 <th>Project Name</th>
                                                 <th>Milestone</th>
                                                 <th>Start Date</th>
                                                 <th>End Date</th>
                                                 <th>Resorce</th>
                                                 <th>Action</th>
                                              </tr>
                                           </thead>
                                           <tbody>
                                              <tr>
                                                 <td>
                                                    1
                                                 </td>
                                                 <td>Decathlon</td>
                                                 <td>Project Analysis</td>
                                                 <td>0000-00-00</td>
                                                 <td>0000-00-00</td>
                                                 <td>Rishabh</td>
                                                 <td>
                                                    <a href="edit_workorder.html" data-toggle="tooltip" title="" data-original-title="Edit">
                                                       <i class="mdi mdi-pen text-warning"></i>
                                                    </a>
                                                   <i class="mdi mdi-delete text-danger" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                                 </td>
                                              </tr>
                                           </tbody>
                                        </table>
                                    </div> -->
                                </div>
                              <!--   <div class="tab-pane p-3 active" id="invoice" role="tabpanel">
                                     <div class="col-sm-12 m-t-10 p-0">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                           <thead>
                                              <tr>
                                                 <th>S.No</th>
                                                 <th>Company Name</th>
                                                 <th>City</th>
                                                 <th>Phone</th>
                                                 <th>Date</th>
                                                 <th>Due Date</th>
                                                 <th>Customer ID</th>
                                                 <th>Action</th>
                                              </tr>
                                           </thead>
                                           <tbody>
                                              <tr>
                                                 <td>
                                                    1
                                                 </td>
                                                 <td>GRC India</td>
                                                 <td>Delhi</td>
                                                 <td>+91 7894535398</td>
                                                 <td>09-03-2020</td>
                                                 <td>19-04-2020</td>
                                                 <td>grc0011</td>
                                                 <td>
                                                    <a href="edit_workorder.html" data-toggle="tooltip" title="" data-original-title="Edit">
                                                       <i class="mdi mdi-pen text-warning"></i>
                                                    </a>
                                                    <i class="mdi mdi-delete text-danger" data-toggle="tooltip" title="" data-original-title="Delete"></i>
                                                 </td>
                                              </tr>
                                           </tbody>
                                        </table>
                                     </div>
                                 </div> -->
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
     <div id="convertproject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     	<div class="modal-dialog modal-lg">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title mt-0" id="myModalLabel">Convert Project</h5>
     				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     			</div>
     			<div class="modal-body modal-height">
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
                                                    
                                                    $client = Db::table('tm_clients')->where('is_active',1)->get();
                                                    
                                                    ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row m-0">
                                            <label for="logo" class="col-lg-4 col-form-label">Client
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-form-label form-group">
                                                <select class="form-control client_pro js-example-basic-single"
                                                    id="project_client">
                                                    <option value="">Select Client</option>
                                                    @foreach($client as $clients)

                                                    <option value="{{$clients->id}}">{{$clients->client_name}}</option>

                                                    @endforeach
                                                </select>
                                                <span id="project_client_error"></span>
                                                <a data-toggle="modal" data-target="#addclient">Add Client</a>
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
                                                <select class="form-control" id="manager">
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
                                                    @foreach($managerlist as $managerlists)
                                                    <option value="{{$managerlists->id}}">
                                                        {{$managerlists->userfullname}}</option>
                                                    @endforeach
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
                                                                <input type="text" id="estimated" class="form-control">
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
                            </form>									</div>
     													</div>
     												</div>
     											</div>
     											@stop
     											@section('extra_js')
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


   var work_id ='{{$work_id}}';

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
                url: '/add_new_project_work_order',
                type: "post",
                data: { "_token": _token, "project": project, "project_status": project_status, "base_project": base_project, "category": category, "project_client": project_client, "currecy": currecy, "checkval": checkval, "project_desc": project_desc, "from_date": from_date, "to_date": to_date, "estimated": estimated, 'manager': manager,"stage":stage,"builder":builder,"location":location,"project_temp_id":project_temp_id,"temp_id":temp_id,"work_order_no":work_order_no,"coordinator":coordinator,"work_id":work_id },
                dataType: 'JSON',

                success: function (data) {
                    // console.log(data.allclient); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();

                        alertify.success(data.msg);

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



     											</script>
     											<!-- gantt chart end -->
     											@stop