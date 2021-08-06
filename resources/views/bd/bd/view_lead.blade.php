    @extends('layouts.superadmin_layout')
   @section('content')
                         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Lead View</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a  href="javascript: history.go(-1)">Lead View</a></li>
                        </ol>
                     </div>
                     <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('editLead')}}/{{$lead->id??''}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit Lead</button>
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
                              <form class="wizard">
                                 <div class="steps clearfix">
                                    <ul role="tablist" class="text-center"  id="myUL">
                                       <li role="tab" id="open" class="first disabled" aria-disabled="false"
                                          aria-selected="true">
                                          <a id="form-horizontal-t-0"  class="acivebtn activeli" href="#form-horizontal-h-0"
                                             aria-controls="form-horizontal-p-0">
                                             Open Not-Contacted
                                          </a>
                                       </li>
                                       <li role="tab" id="working" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-1" href="#form-horizontal-h-1"
                                             aria-controls="form-horizontal-p-1" class="activeli">
                                             Working-Contacted</a>
                                       </li>
                                       <li role="tab" id="closed" class="disabled" aria-disabled="true">
                                          <a id="form-horizontal-t-2" href="#form-horizontal-h-2"
                                             aria-controls="form-horizontal-p-2" class="activeli">
                                             Closed-Not Converted</a>
                                       </li>
                                       <li role="tab" id="converted" class="disabled last" aria-disabled="true">
                                          <a id="form-horizontal-t-3" href="#form-horizontal-h-3"
                                             aria-controls="form-horizontal-p-3" class="activeli">
                                             Converted
                                          </a>
                                       </li>
                                       <li id="markstatus" role="tab" aria-disabled="true">
                                          <a id="form-horizontal-t-3 " 
                                             class="btn btn-info" href="#form-horizontal-h-3"
                                             aria-controls="form-horizontal-p-3" style="line-height: 1.3;">
                                             <span id="checkicon" class="number m-0"><i class="fa fa-check"></i> </span>
                                             <span id="statustext">Mark Status as Complete </span>
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </form>
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"
                                       role="tab"><span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                       <span class="d-none d-sm-block">Activity Log</span></a></li>
                                 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                       role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                       <span class="d-none d-sm-block">Details</span></a></li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                 <div class="tab-pane active p-3" id="home" role="tabpanel">
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
                                                <input type="text" placeholder="{{$lead->userfullname??''}}" disabled="" class="form-control">
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
                                             <button onclick="save_log()" class="btn btn-primary float-right" id="savelog">Save</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <table id="datatable" class="lead_log table table-bordered dt-responsive nowrap"
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
                                
                                 </div>
                                 <div class="tab-pane p-3" id="profile" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="empcode" class="col-lg-4 col-form-label">Lead Owner</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->userfullname??''}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="empid" class="col-lg-4 col-form-label">Phone</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->phone}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="prifix" class="col-lg-4 col-form-label">Mobile</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->mobile}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="firstname" class="col-lg-4 col-form-label">Salutation</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->prefix}}.</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="logo" class="col-lg-4 col-form-label">First Name</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->fname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="email" class="col-lg-4 col-form-label">Last Name</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->lname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="cid" class="col-lg-4 col-form-label">Company</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->company}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="mode" class="col-lg-4 col-form-label">Fax</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->fax}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                               
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Email</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->email}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Lead Source</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->sourse}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Website</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->website}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Industry</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->industry}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Lead Status</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->lead_status}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Annual Revenue</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->annual_revenue}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Rating</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">
                                                   $lead->rating
                                                   
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">No of
                                                Employees</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->no_of_emp}}</label>
                                             </div>
                                          </div>
                                       </div>
                          
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Project Type</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->product_type}}</label>
                                             </div>
                                          </div>
                                       </div>
                              
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="col-sm-12">
                                             <h5 class="font-18 h5after"><span>Address Information</span></h5>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Country</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->country}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">State</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->state}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">City</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->city}}</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Street</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->street}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group row m-0">
                                             <label for="role" class="col-lg-4 col-form-label">Zip Code</label>
                                             <div class="col-lg-8 col-form-label">
                                                <label class="myprofile_label">{{$lead->zipcode}}</label>
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
         
          <!-- convert lead -->
  <div id="convert_lead" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title mt-0" id="myModalLabel">Convert Lead</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <div class="form-group row m-b-10 bg-light">
                  <div class="col-sm-12">
                     <h6 class="h6after bg-light m-t-10"><i class="fa fa-angle-right m-r-5"></i><span>Account</span>
                     </h6>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                 class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="customRadioInline1">Create New</label></div>
                        </div>
                        <div class="col-sm-1">
                           <span>-OR-</span>
                        </div>
                        <div class="col-sm-5">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="customRadioInline2"
                                 class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline2">Choose Existing</label></div>
                        </div>
                     </div>
                     <div class="row m-b-10">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="empcode" class="width100">Organization/Account Name</label>
                              <div class="col-lg-12 p-0">
                                 <input type="text" class="form-control" placeholder="Type here...">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                        <div class="col-md-5">
                           <div class="form-group">
                              <label for="empcode" class="width100">Organization</label>
                              <div class="col-lg-12 p-0">
                                 <input type="text" placeholder="Search for Matching Organizations"
                                    class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row m-b-10">
                  <div class="col-sm-12">
                     <h6 class="h6after"><i class="fa fa-angle-right m-r-5"></i><span>Contact</span></h6>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline3" name="customRadioInline3"
                                 class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="customRadioInline3">Create New</label></div>
                        </div>
                        <div class="col-sm-1">
                           <span>-OR-</span>
                        </div>
                        <div class="col-sm-5">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline4" name="customRadioInline4"
                                 class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline4">Choose Existing</label></div>
                        </div>
                     </div>
                     <div class="row m-t-10">
                        <div class="col-md-6">
                           <div class="form-group">
                              <div class="col-lg-12 p-0" id="newcontact">
                                 <button>Nisha</button>
                              </div>
                              <div class="col-lg-12" id="fullnamefill">
                                 <div class="form-group">
                                    <label for="empcode" class="width100">Salutation</label>
                                    <div class="col-lg-12 p-0">
                                       <select class="form-control">
                                          <option>--None--</option>
                                          <option>Mr.</option>
                                          <option>Ms.</option>
                                          <option>Mrs.</option>
                                          <option>Dr.</option>
                                          <option>Prof.</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="empcode" class="width100">First Name</label>
                                    <div class="col-lg-12 p-0">
                                       <input type="text" class="form-control" placeholder="Type here..." value="Nisha">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="empcode" class="width100">Last Name</label>
                                    <div class="col-lg-12 p-0">
                                       <input type="text" class="form-control" placeholder="Type here..."
                                          value="Upreti">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                        <div class="col-md-5">
                           <div class="form-group">
                              <div class="col-lg-12 p-0">
                                 <input type="text" placeholder="Search for Matching Contacts" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row m-b-10">
                  <div class="col-sm-12">
                     <h6 class="h6after"><i class="fa fa-angle-right m-r-5"></i><span>Opportunity</span></h6>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline5" name="customRadioInline5"
                                 class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="customRadioInline5">Create New</label></div>
                        </div>
                        <div class="col-sm-1">
                           <span>-OR-</span>
                        </div>
                        <div class="col-sm-5">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline6" name="customRadioInline6"
                                 class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline6">Choose Existing</label></div>
                        </div>
                     </div>
                     <div class="row m-t-10">
                        <div class="col-md-6">
                           <div class="form-group">
                              <div class="col-lg-12 p-0">
                                 <input type="text" class="form-control" placeholder="Type here...">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                        <div class="col-md-5">
                           <div class="form-group">
                              <div class="col-lg-12 p-0">
                                 <input type="text" placeholder="To find opportunity, choose an Existing account"
                                    class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="custom-control custom-checkbox"><input type="checkbox"
                                 class="custom-control-input" id="customControlInline"> <label
                                 class="custom-control-label" for="customControlInline">Don't create an Opportunity upon
                                 conversion</label>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="row m-t-10">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="empcode" class="width100">Record Owner <span class="text-danger">
                                    *</span></label>
                              <div class="col-lg-12 p-0">
                                 <input type="text" class="form-control" placeholder="Nisha Upreti">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="empcode" class="width100">Converted Status <span class="text-danger">
                                    *</span></label>
                              <div class="col-lg-12 p-0">
                                 <select class="form-control">
                                    <option>Closed-Converted</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Convert</button>
               <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
         <!-- content -->
           @stop

           @section('extra_js')

         <script>  
         
         $("#newcontact button").click(function () {
$(this).css("display", "none");
$("#fullnamefill").css("display", "block");
});

// convert lead js
var header = document.getElementById("myUL");
var btns = header.getElementsByClassName("activeli");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("acivebtn");
    current[0].className = current[0].className.replace("acivebtn", "");
    this.className += " acivebtn";
  });
}
$("#working").click(function () {
//$(this).children().addClass("acivebtn");


$("#checkicon").remove();
$("#statustext").text("Mark as Current Status");
$("#statustext").addClass("first");
});
$("#closed").click(function () {
//$(this).children().addClass("acivebtn");


$("#checkicon").remove();
$("#statustext").text("Mark as Current Status");
$("#statustext").removeClass("first");
$("#statustext").addClass("second");
});
$("#converted").click(function () {
//$(this).children().addClass("acivebtn");

$("#checkicon").remove();
$("#statustext").text("Select Converted Status");
$("#statustext").removeClass("first");
$("#statustext").removeClass("second");
$("#statustext").addClass("third");
});
$("#open").click(function () {
$("li#markstatus a").html("<span id='checkicon' class='number'><i class='fa fa-check'></i></span><span id='statustext'>Mark Status as Complete</span>");

});

$("a").click(function(event) {
  event.preventDefault();
  $(this).parent('li').removeClass('acivebtn');
});
         
         $(document).on('click','.third',function(){
             
       
             
               $('#convert_lead').modal('show');
             
             
         });
         
  
         
         var userid = '{{$userid}}';
         var lead_id = '{{$lead_id}}';
         var status = 0;
         getLeadlog(userid,lead_id,status);
         
         function getLeadlog(user_id,lead_id,status){
             
       var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/get_lead_logs',
        type: "post",
        data: {"_token": _token,"user_id":user_id,"lead_id":lead_id,"status":status},
        dataType: 'JSON',
         
        success: function (data) {
      
          $(".lead_log tbody").html(data.lead_log);
    
          
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
        var status = 0;
             
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
      
       if(next_date ==''){
         $('#next_date_error').text('Next Date is Required').attr('style','color:red');
         $('#next_date_error').show();
           error = 0;
              return false;

      }else{$('#next_date_error').hide();  error = 1;}
      
      if(error == 1){
          
  var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/save_lead_logs',
        type: "post",
        var status = 0;
        data: {"_token": _token,"choose_date":choose_date,"commu_type":commu_type,"comment":comment,"next_date":next_date,"lead_id" :lead_id,"lead_log_id":lead_log_id,"status": status},
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
                
            }else{
                
                 alertify.success(data.msg); 
                
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
                
            }else{
                 alertify.success(data.msg); 
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
                          
        
            
         
        }
      });
             
         }
         
         </script>

           @stop