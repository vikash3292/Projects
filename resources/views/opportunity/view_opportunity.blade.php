 
     @extends('layouts.superadmin_layout')
   @section('content')
   
 <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6 col-6">
                        <h3 class="page-title">Opportunity View</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Opportunity View</a></li>
                        </ol>
                     </div>
                     <div class="col-sm-6 col-6 p-l-0">
                        <div class="float-right d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('/edit-opportunity/')}}/{{$opp_id}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit Opportunity</button>
                              </a>
                               <a href="javascript: history.go(-1)">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Back</button>
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
                           <div class="width-float">
                              <form class="wizard wizardstages">
                                 <div class="steps clearfix">
                                    <ul role="tablist" class="text-center">
                                       <li role="tab" id="open" class="first current" aria-disabled="false"
                                          aria-selected="true">
                                          <a id="form-horizontal-t-0" href="#form-horizontal-h-0"
                                             aria-controls="form-horizontal-p-0" data-toggle="tooltip" title="Prospecting" class="activeli">
                                             <span class="text">Prospecting</span><i class="fa fa-check check display-none"></i>
                                          </a>
                                       </li>
                                       <li role="tab" id="working" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-1" href="#form-horizontal-h-1"
                                             aria-controls="form-horizontal-p-1" data-toggle="tooltip" title="Quotation" class="activeli">
                                             Quotation</a>
                                       </li>
                                       <li role="tab" id="closed" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" data-toggle="tooltip" title="Needs Analysis" class="activeli">
                                             Needs Analysis</a>
                                       </li>
                                         <li role="tab" id="closed" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" data-toggle="tooltip" title="Id. Decision Makers" class="activeli">
                                             Id. Decision Makers</a>
                                       </li>
                                          <li role="tab" id="closed" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" data-toggle="tooltip" title="Perception Analysis" class="activeli">
                                             Perception Analysis</a>
                                       </li>
                                           <li role="tab" id="closed" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" data-toggle="tooltip" title="Proposal/Price Quote" class="activeli">
                                             Proposal/Price Quote</a>
                                       </li>
                                             <li role="tab" id="closed" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" data-toggle="tooltip" title="Negotiation/Review" class="activeli">
                                             Negotiation/Review</a>
                                       </li>
                                         <li role="tab" id="closed" class="disabled last" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" data-toggle="tooltip" title="Closed" class="activeli">
                                             Closed</a>
                                       </li>
                                    </ul>
                                    <ul role="tablist" class="text-center">
                                       <li id="markstatus" role="tab" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-3" 
                                             class="btn btn-primary " href="#form-horizontal-h-3"
                                             aria-controls="form-horizontal-p-3" style="line-height: 1.5;">
<!--                                              <span id="checkicon" class="number"><i class="fa fa-check"></i> </span>
 -->                                             <span id="statustext">Change Closed Status</span>
                                          </a>
                                         </li>
                                    </ul>
                                 </div>
                              </form>
                              

                              <ul class="nav nav-tabs nav-tabs-custom" role="tablist" id="myTab">
                              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#home" role="tab"><span
                                       class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Activity Log</span></a></li>
                              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile"
                                    role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Details</span></a></li>
                           </ul>
                           <!-- Tab panes -->
                           <div class="tab-content">
                                <div class="tab-pane  p-3" id="home" role="tabpanel">
                                     <div class="row m-t-10">
                                       <div class="col-md-6">
                                          <div class="form-group row">
                                             <label for="empcode" class="col-lg-4 col-form-label">Date<span style="color:red">*</span></label>
                                             <div class="col-lg-8">
                                                <input type="date" class="form-control" id="choose_date">
                                                <span id="choose_date_error"></span>
                                             </div>
                                          </div>
                                       </div>
                                       <input type="hidden" id="lead_log_id">
                                       <div class="col-md-6">
                                          <div class="form-group row">
                                             <label for="empid" class="col-lg-4 col-form-label">Communication
                                                Type<span style="color:red">*</span></label>
                                             <div class="col-lg-8">
                                                <select class="form-control" id="commu_type">
                                                   <option>Call</option>
                                                   <option>SMS</option>
                                                   <option>F2F Meeting</option>
                                                   <option>Skype</option>
                                                   <option>Zoom</option>
                                                   <option>Email</option>
                                                   <option>Site Visit</option>
                                                   <option>Office Meeting</option>
                                                </select>
                                                 <span id="commu_type_error"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row">
                                             <label for="prifix" class="col-lg-4 col-form-label">Comments<span style="color:red">*</span></label>
                                             <div class="col-lg-8">
                                                <textarea rows="3" class="form-control" id="comment"></textarea>
                                                <span id="comment_error"></span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row">
                                             <label for="firstname" class="col-lg-4 col-form-label">Commented By<span style="color:red">*</span></label>
                                             <div class="col-lg-8">
                                                <input type="text" placeholder="{{$view_opp->userfullname}}" disabled="" class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row">
                                             <label for="prifix" class="col-lg-4 col-form-label">Next Communication
                                                Date<span style="color:red">*</span></label>
                                             <div class="col-lg-8">
                                                <input type="date" class="form-control" id="next_date">
                                                 <span id="next_date_error"></span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <button onclick="save_log()" class="btn btn-primary float-right">Save</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <table id="datatable" class="accnt opp_log table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       <thead>
                                          <tr>
                                             <th>S.No</th>
                                             <th>Date</th>
                                             <th>Communication Type</th>
                                             <th>Comments</th>
                                             <th>Commented By</th>
                                             <th>Next Comm. Date</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                               
                                       </tbody>
                                    </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                         <h5 class="p-lr-20">TimeLine</h5>
                                      </div>
                                   </div>
                                   <div id="cd-timeline">
                                     <ul class="timeline list-unstyled timeline">
                                               
                                       <!--  <li class="timeline-list right clearfix">
                                           <div class="cd-timeline-content bg-light p-10">
                                              <h5 class="mt-0 mb-2">Himanshu Pawar <span class="text-primary float-left">11:00 PM</span></h5>
                                              <a href="#" class="text-primary" data-toggle="modal" data-target="#activitylog">View Detail</a>
                                              <div class="date bg-primary">
                                                 <h5 class="mt-0 mb-0">23</h5>
                                                 <p class="mb-0 text-white-50">Jan</p>
                                              </div>
                                           </div>
                                        </li> -->
                                     </ul>
                                  </div>
                                
                                 </div>









                                 <div class="tab-pane p-3 active" id="profile" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="empcode" class="col-lg-4 col-form-label">Opportunity
                                                Owner</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->userfullname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="empid" class="col-lg-4 col-form-label">Amount</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->amount}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="prifix" class="col-lg-4 col-form-label">Expected
                                                Revenue</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->exp_revance}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="firstname" class="col-lg-4 col-form-label">Opportunity
                                                Name</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->opp_name}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="logo" class="col-lg-4 col-form-label">Close Date</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->close_date}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="email" class="col-lg-4 col-form-label">Product Interest</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->project_intrest}}%</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="cid" class="col-lg-4 col-form-label">Organization
                                                Name</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->org_name}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="mode" class="col-lg-4 col-form-label">Next Step</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->userfullname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Type</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">/label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Stage</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Lead Source</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->sourse}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Probability</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">0</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Upload Work
                                                Order</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label"></label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Work order Number</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">SOW</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label"></label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Created by</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->userfullname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Last Modified by</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->userfullname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Country</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->country}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">State</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->state}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">City</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->city}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Street</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->opp_street}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Zip Code</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$view_opp->opp_zip}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="oppr_card">
                                             <h4 class="font-18 m-t-0 p-5-10 text-primary"><span>Stage-Project
                                                   Details</span><span class="fa fa-pen float-right font-12"
                                                   id="project_detail_edit"></span>
                                             </h4>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="empcode" class="col-lg-4 col-form-label">Proposed
                                                         Project Name</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label " id="project_label">Kloudrac-HRMS</label>
                                                         <input type="text"
                                                            class="form-control updated_project_detail disply_none"
                                                            id="project_input">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="empid" class="col-lg-4 col-form-label">Area
                                                         Covered</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">14500000</label>
                                                         <input type="text"
                                                            class="form-control updated_project_detail disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Location
                                                         Address</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updated_project_detail disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="firstname" class="col-lg-4 col-form-label">Total
                                                         Project Cost</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updated_project_detail disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <button
                                                   class="btn btn-primary float-right m-b-10 disply_none project_update">Update
                                                </button>
                                                <button class="btn btn-primary float-right m-b-10 m-r-5">Add Payment
                                                   Terms</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="oppr_card">
                                             <h4 class="font-18 m-t-0 p-5-10 text-primary"><span>Quotation</span><span
                                                   class="fa fa-pen float-right font-12" id="quotation_edit"></span>
                                             </h4>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="empcode" class="col-lg-4 col-form-label">Total Amount
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">0.00</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="empid" class="col-lg-4 col-form-label">Time
                                                         Frame</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Tax %
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="firstname" class="col-lg-4 col-form-label">Choose
                                                         SOW</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Payment Terms
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12 text-right m-b-10">
                                                   <button class="btn btn-primary">Send to Email</button>
                                                   <button class="btn btn-primary m-r-5">Download as PDF</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="oppr_card">
                                             <h4 class="font-18 m-t-0 p-5-10 text-primary"><span>Negotiation</span><span
                                                   class="fa fa-pen float-right font-12" id="negotiation_edit"></span>
                                             </h4>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="empcode" class="col-lg-4 col-form-label">Work Order
                                                         Date
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">12-Jan-2020</label>
                                                         <input type="date"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="empid" class="col-lg-4 col-form-label">WO
                                                         Number</label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Reference
                                                         Number
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="firstname" class="col-lg-4 col-form-label">Subject
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Sector
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Project Type
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group row m-0">
                                                      <label for="prifix" class="col-lg-4 col-form-label">Time Frame
                                                      </label>
                                                      <div class="col-lg-8 col-form-label">
                                                         <label class="myprofile_label">dummy</label>
                                                         <input type="text"
                                                            class="form-control updatevalue disply_none">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12 text-right m-b-10">
                                                   <button class="btn btn-primary">Send to Email</button>
                                                   <button class="btn btn-primary m-r-5">Download as PDF</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
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
           <div id="convert_lead" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-md">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title mt-0" id="myModalLabel">Close This Opportunity</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12">
                         <div class="form-group row m-0">
                             <label for="empcode" class="col-lg-4 col-form-label">Stage
                                 <span class="text-danger">*</span></label>
                             <div class="col-lg-8 col-form-label">
                                <select class="form-control" id="selectstage">
                                   <option>Select a Closed Stage</option>
                                   <option value="closed_won">Closed Won</option>
                                   <option>Closed Lost</option>
                                </select>
                                </div>
                         </div>
                     </div>
                 </div>
               </div>
               <div class="modal-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- create work order modal -->
         <div id="createworkorder" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title mt-0" id="myModalLabel">Create Work Order</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <div class="modal-body">
                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Work Order
                                                    Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text"id="work_order_name" name="work_order_name" class="form-control">
                                                    <span id="work_order_name_error"></span>
                                                     </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Work Order No.<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="work_order_no" class="form-control"> 
                                                   <span id="work_order_no_error"></span>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="prifix" class="col-lg-4 col-form-label">Amount<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="work_amt" class="form-control"> 
                                                      <span id="work_amt_error"></span>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Project Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="project_name" class="form-control">
                                                       <span id="project_name_error"></span>
                                                     </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php
                                   $seles = DB::table('main_users')->whereIn('emprole',[12,13,14])->where('isactive',1)->get();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Sales Person<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                   <select class="form-control" id="sales">
                                              <option value="">Select Option</option>
                                                  @foreach($seles as $seless)
                                              <option value="{{$seless->id}}">{{$seless->userfullname}}</option>
                                              @endforeach                                           
                                             </select>
                                                 <span id="sales_error"></span>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Status</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" id="status">
                                                        <option value="1">Pending</option>
                                                        <option value="2">In-Proccess</option>
                                                        <option value="3">Complete</option>
                                                    </select>
                                                     <span id="status_error"></span>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
               </div>
               <div class="modal-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <button onclick="work_order()" class="btn btn-primary">Save</button>
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- create work order modal end -->
      <!-- activity log -->
      <div id="activitylog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title mt-0" id="myModalLabel">Activity View</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="lead_form" method="post">
               <div class="modal-body">
                  <div class="row m-t-10">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empcode" class="col-lg-4 col-form-label">Date<span style="color:red">*</span></label>
                           <div class="col-lg-8 col-form-label">
                              <label class="myprofile_label">5-4-2020</label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" id="lead_log_id">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empid" class="col-lg-4 col-form-label">Communication
                              Type<span style="color:red">*</span></label>
                              <div class="col-lg-8 col-form-label">
                                 <label class="myprofile_label">Call</label>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="row m-t-10">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empcode" class="col-lg-4 col-form-label">Comments<span style="color:red">*</span></label>
                           <div class="col-lg-8 col-form-label">
                              <label class="myprofile_label">dummy dummy dummy dummy</label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" id="lead_log_id">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empid" class="col-lg-4 col-form-label">Commented By
                              Type<span style="color:red">*</span></label>
                              <div class="col-lg-8 col-form-label">
                                 <label class="myprofile_label">Admin</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row m-t-10">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empcode" class="col-lg-4 col-form-label">Next Communication Date<span style="color:red">*</span></label>
                           <div class="col-lg-8 col-form-label">
                              <label class="myprofile_label">23-5-20220</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- activity log end -->
         @stop

         @section('extra_js')
<script>


      function work_order() {
        var error = 1;
       var work_order_name = $('#work_order_name').val();
        var work_order_no = $('#work_order_no').val();
         var work_amt = $('#work_amt').val();
          var project_name = $('#project_name').val();

          var sales = $('#sales').val();
          var status = $('#status').val();
        
         
         if(work_order_name ==''){
          $('#work_order_name_error').text('Work Order Name is Required').attr('style','color:red');
          $('#work_order_name_error').show();
            error = 0;
               return false;
       }else{$('#work_order_name_error').hide();  error = 1;}
       
            if(work_order_no ==''){
          $('#work_order_no_error').text('Work Order No is Required').attr('style','color:red');
          $('#work_order_no_error').show();
            error = 0;
               return false;
       }else{$('#work_order_no_error').hide();  error = 1;}
       
         if(work_amt ==''){
          $('#work_amt_error').text('Amount is Required').attr('style','color:red');
          $('#work_amt_error').show();
            error = 0;
               return false;
       }else{$('#work_amt_error').hide();  error = 1;}
       
        if(project_name ==''){
          $('#project_name_error').text('Project Name No is Required').attr('style','color:red');
          $('#project_name_error').show();
            error = 0;
               return false;
       }else{$('#project_name_error').hide();  error = 1;}

         if(status ==''){
          $('#status_error').text('Status is Required').attr('style','color:red');
          $('#status_error').show();
            error = 0;
               return false;
       }else{$('#status_error').hide();  error = 1;}

          var work_order_name = $('#work_order_name').val();
        var work_order_no = $('#work_order_no').val();
         var work_amt = $('#work_amt').val();
          var project_name = $('#project_name').val();

          var sales = $('#sales').val();
          var status = $('#status').val();
        

        if(error ==1){
             var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/work_order_add',
        type: "post",
        data: {"_token": _token,"work_order_name":work_order_name,"work_order_no":work_order_no,"work_amt":work_amt,"project_name" : project_name,"sales":sales,"status":status},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){
                
                 alertify.success(data.msg); 
                  window.location.href = "{{URL::to('/work-order')}}";
            }else{
                 alertify.success(data.msg); 
            }
            
        }
      });
        }
       
    }

         
         var userid = '{{$userid}}';
         var lead_id = '{{$opp_id}}';
        var status = 4;


show_timeline(lead_id);
function show_timeline(lead_id){


 var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/timeline',
  type: "post",
  data: {"_token": _token,"status":3,"lead_id":lead_id},
 

  success: function (data) {
  
    $(".timeline").html(data);

 }
});

}



         getLeadlog(userid,lead_id,status);
         
         function getLeadlog(user_id,lead_id,status){
             
       var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/get_lead_logs',
        type: "post",
        data: {"_token": _token,"user_id":user_id,"lead_id":lead_id,"status":status},
        dataType: 'JSON',
         
        success: function (data) {
      
          $(".opp_log tbody").html(data.lead_log);
    
          
        }
      });
             
         }
         
         function save_log(){
           error = 1;  
        var choose_date = $('#choose_date').val();
        var commu_type = $('#commu_type').val();
        var comment = $('#comment').val();
        var next_date = $('#next_date').val();
        var lead_log_id = $('#lead_log_id').val();
        var status = 4;
             
         if(choose_date ==''){
         $('#choose_date_error').text('Date is Required').attr('style','color:red');
         $('#choose_date_error').show();
           error = 0;
              return false;

      }else{$('#choose_date_error').hide();  error = 1;}
      
       if(commu_type ==''){
         $('#commu_type_error').text('Communication Type is Required').attr('style','color:red');
         $('#commu_type_error').show();
           error = 0;
              return false;

      }else{$('#commu_type_error').hide();  error = 1;}
      
       if(comment ==''){
         $('#comment_error').text('Comment is Required').attr('style','color:red');
         $('#comment_error').show();
           error = 0;
              return false;

      }else{$('#comment_error').hide();  error = 1;}
      
      //  if(next_date ==''){
      //    $('#next_date_error').text('Next Date is Required').attr('style','color:red');
      //    $('#next_date_error').show();
      //      error = 0;
      //         return false;

      // }else{$('#next_date_error').hide();  error = 1;}
      
      if(error == 1){
          
  var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/save_lead_logs',
        type: "post",
        data: {"_token": _token,"choose_date":choose_date,"commu_type":commu_type,"comment":comment,"next_date":next_date,"lead_id" :lead_id,"lead_log_id":lead_log_id,"status" :status },
        dataType: 'JSON',
         
        success: function (data) {
            if(data.status == 200){
                alertify.success(data.msg); 
                getLeadlog(userid,lead_id);
                    var choose_date = $('#choose_date').val('');
        var commu_type = $('#commu_type').val('');
        var comment = $('#comment').val('');
        var next_date = $('#next_date').val('');
                        $('#lead_log_id').val('');
                         $('#savelog').text('Save');
                       show_timeline(lead_id);
                
            }else{
                
                 alertify.success(data.msg); 
                show_timeline(lead_id);
                
            }
      
       
    
          
        }
      });
          
      }
             
         }
         
         function delete_lead_log(thisval,lead_log_id){
             
             
             var result = confirm("Want to delete?");
if (result) {
    //Logic to delete the item

               var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/delete_lead_logs',
        type: "post",
        data: {"_token": _token,"lead_log_id":lead_log_id},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){
                 alertify.success(data.msg); 
                 $(thisval).closest("tr").remove();
                 show_timeline(lead_id);
                
            }else{
                 alertify.success(data.msg); 
                 show_timeline(lead_id);
            }
            
            
     
        }
      });
}
             
         }
         
         function edit_lead_log(thisval,lead_log_id){
             
     var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/edit_lead_logs',
        type: "post",
        data: {"_token": _token,"lead_log_id":lead_log_id},
        dataType: 'JSON',
         
        success: function (data) {
            
        var choose_date = $('#choose_date').val(data.lead_detail.date);
        var commu_type = $('#commu_type').val();
        var comment = $('#comment').val(data.lead_detail.comment);
        var next_date = $('#next_date').val(data.lead_detail.next_date);
                        $('#lead_log_id').val(lead_log_id);
                          $('#savelog').text('Save Edit');
                          
                          $("#commu_type > option").each(function() {
                              if(this.text == data.lead_detail.communication_type){
                                 $('#commu_type').val(data.lead_detail.communication_type).attr("selected"); 
                              }
                         
                           });
                          
        
        show_timeline(lead_id);
         
        }
      });
             
         }


         $(document).on('click','.disabled', function(){
            $('.disabled').each( function(){
         	$(this).removeClass("stop");
         	$(this).removeClass("current");  
         	}); 

         	 $(this).addClass('stop');

        $('.disabled').each( function(){
     
       if($(this).attr('class') ==  'disabled stop'){
        return false;
       }else{

       	$(this).addClass('current');

       }
        
         
        
     });
 });


         $(document).ready(function(){
          $("li .activeli").mouseover(function(){
            $("li .activeli .check").css({'width':($("li .activeli span").innerWidth()+'px')});
             $("li .activeli .check").css({'height':($("li .activeli span").innerHeight()+'px')});
          })
       $('#statustext').click(function(){
       if($('.last').attr('class') == 'disabled last current'){
         $("#convert_lead").modal('show');
       }

       });
       

            $("#selectstage").change(function(){
               debugger
               if($(this).val()=='closed_won'){
                   $("#createworkorder").modal('show');
                    $("#convert_lead").modal('hide');
               }
               else{
                  $("#createworkorder").modal('hide');
               }
              
            })
         })
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
         @stop