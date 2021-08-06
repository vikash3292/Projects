@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6 col-6">
                        @if(!empty($editData))

                          <h3 class="page-title">Edit User</h3>


                        @else
                            <h3 class="page-title">Add User</h3>

                        @endif
                      
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                             @if(!empty($editData))
                           <li class="breadcrumb-item active"><a href="{{URL::to('/employees')}}">Edit User</a></li>
                           @else

                             <li class="breadcrumb-item active"><a href="{{URL::to('/employees')}}">Add User</a></li>
                           @endif
                        </ol>
                     </div>
                     <div class="col-6 text-right">
                          <a href="javascript: history.go(-1)"  class="btn btn-primary"> Back</a>
                     </div>
                  </div>
               </div>

             @if(isset($_GET['profile']) && !empty($_GET['profile']))


               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body p-0">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="row">
                                    <div class="col-sm-3 text-center">
                                       <div class="imguploadDiv">
                                          <img src="{{URL::to('/public/')}}{{Auth::guard('main_users')->user()->profileimg??''}}" alt="Avatar"
                                             class="avatar img-responsive" width="100%">
                                          <div class="imgupload">
                                             <span><i class="mdi mdi-lead-pencil font-18"></i></span>
                                             <input type="file" id="profile" name="profile" accept="image">
                                          </div>
                                          <div>
                                            <div id="profile_error"></div>
                                             <button id="uploadImg" onclick="uploadprofile()"  class="btn btn-primary">Upload</button>
                                          </div>
                                       </div>
                                    </div>
                                        <div class="col-sm-9">
                                       <div class="row p-20">
                                          <div class="col-md-12">
                                             <div class="form-group row">
                                                <label for="empcode" class="col-lg-4">Name</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">{{Auth::guard('main_users')->user()->userfullname??''}}
                                                   </label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Email ID</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">{{Auth::guard('main_users')->user()->emailaddress??''}}</label>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="col-md-12">
                                             <div class="row">
                                                <label for="empcode" class="col-lg-4">Contact N0.</label>
                                                <div class="col-lg-5">
                                                   <label class="myprofile_label">{{Auth::guard('main_users')->user()->workphone??''}}
                                                   </label>
                                                </div>

                                             </div>
                                          </div>
                                          <div class="col-md-12 m-t-10">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Change Theme</label>
                                                <div class="col-lg-5">
                                                   <select class="form-control" id="themesdate">
                                                      <option>Default Theme</option>
                                                      <option value="Light" @if(!empty($editData)) @if('Light' == Auth::guard('main_users')->user()->themes) selected @endif @endif >Light</option>
                                                      <option value="Dark" @if(!empty($editData)) @if('Dark' == Auth::guard('main_users')->user()->themes) selected @endif @endif>Dark</option>
                                                   </select>
                                                </div>
                                                <div class="col-sm-3">
                                                   <button class="btn btn-primary" data-toggle="modal"
                                                      data-target="#changepsw">Change Password</button>
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
               </div>

                          <div id="changepsw" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group row">
                           <label for="currentpsd" class="col-lg-4 col-form-label">
                              Current Password</label>
                           <div class="col-lg-8">
                              <input id="cpassword" name="currentpsd" minlength="6" maxlength="20" type="text" class="form-control">
                              <div id="cpassword_error"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="newpsd" class="col-lg-4 col-form-label">
                              New Password</label>
                           <div class="col-lg-8">
                              <input id="newpsd" name="newpsd" type="text" minlength="6" maxlength="20" class="form-control">
                              <div id="newpsd_error"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Confirm Password</label>
                           <div class="col-lg-8">
                              <input id="cnfpsd" name="cnfpsd" type="text" minlength="6" maxlength="20" class="form-control">
                              <div id="cnfpsd_error"></div>
                           </div>
                        </div>
              
                     </div>
                     <div class="modal-footer">
                        <button type="button" id="changepassord" class="btn btn-primary waves-effect">Save</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light"
                           data-dismiss="modal">Cancel</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>

            @endif


               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="tab">
                              <button class="tablinks active" onclick="openTab(event, 'add-employees')" id="defaultOpen"><span class="d-none d-sm-block">Official
                                 Info</span><span class="d-block d-sm-none text-center"><i class="fa fa-info-circle" data-toggle="tooltip" title="Official Info"></i></span></button>
                              <!-- <button class="tablinks" onclick="openTab(event, 'leaves')">Leaves</button>
                              <button class="tablinks" onclick="openTab(event, 'holiday')">Holiday</button> -->
                              <button class="tablinks" onclick="openTab(event, 'addsalary')"><span class="d-none d-sm-block">Salary</span><span class="d-block d-sm-none text-center"><i class="fa fa-money-bill-alt" data-toggle="tooltip" title="Salary"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addPersonalInfo')"><span class="d-none d-sm-block">Personal Info</span>
                              <span class="d-block d-sm-none text-center"><i class="fa fa-user" data-toggle="tooltip" title="Personal Info"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addcontact')"><span class="d-none d-sm-block">Contact Info</span><span class="d-block d-sm-none text-center"><i class="fa fa-phone" data-toggle="tooltip" title="Contact Info"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addexperiance')"><span class="d-none d-sm-block">Experience</span><span class="d-block d-sm-none text-center"><i class="fa fa-history" data-toggle="tooltip" title="Experience"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')"><span class="d-none d-sm-block">Education</span><span class="d-block d-sm-none text-center"><i class="fa fa-graduation-cap" data-toggle="tooltip" title="Education"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')"><span class="d-none d-sm-block">Training &
                                 Certification</span><span class="d-block d-sm-none text-center"><i class="fa fa-certificate" data-toggle="tooltip" title="Training &
                                 Certification"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')"><span class="d-none d-sm-block">Visa & Immigration</span><span class="d-block d-sm-none text-center"><i class="fab fa-cc-visa" data-toggle="tooltip" title="Visa & Immigration"></i></span></button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')"><span class="d-none d-sm-block">Assets</span><span class="d-block d-sm-none text-center" data-toggle="tooltip" title="Assets"><i class="fa fa-list"></i></span></button>
                           </div>
                           <form id="offical" method="post">
                           <div id="official" class="tabcontent active">
                              <h3>Official Info</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcode" class="col-lg-4 col-form-label">User ID<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <input id="empid" type="text"  value="{{autoincrement()}}" maxlength="20" class="form-control" readonly="">
                                             <div id="empode_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empid" class="col-lg-4 col-form-label">User Code<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <input  id="empcode"  type="text" onkeypress="preventNonNumericalInput(event)" value="{{$editData->employeeId??''}}"  maxlength="20" class="form-control">
                                              <div id="empid_error"></div>
                                          </div>
                                       </div>
                                    </div>



                                   <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empid" class="col-lg-4 col-form-label">Sarvor Card No<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <input  id="sarvor_id"  type="text"  value="{{$editData->savior_card_id??''}}"  maxlength="20" class="form-control">
                                              <div id="sarvor_id_error"></div>
                                          </div>
                                       </div>
                                    </div>

                                 </div>

                                    <input type="hidden" id="userid" value="{{$editData->id??''}}">

                                       <?php

                                            $prefixdata = DB::table('main_prefix')->where('isactive','=',1)->get();
                                             
                                           ?>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="prifix" class="col-lg-4 col-form-label">Prefix
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="prefix">
                                                <option value="">Select Option</option>
                                                @foreach($prefixdata  as  $prefixdatas)
                                                <option value="{{$prefixdatas->id}}" @if(!empty($editData)) @if($prefixdatas->id == $editData->prefix) selected @endif @endif>{{$prefixdatas->prefix}}.</option>
                                                @endforeach
                                               
                                             </select>
                                              <div id="prefix_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="firstname" class="col-lg-4 col-form-label">First Name<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <input id="fname" type="text" value="{{$editData->firstname??''}}" class="form-control">
                                              <div id="fname_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="logo" class="col-lg-4 col-form-label">Last Name<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <div class="form-group">
                                                <input id="lname" type="text" value="{{$editData->lastname??''}}"  class="form-control">
                                                 <div id="lname_error"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="email" class="col-lg-4 col-form-label">Email
</label>
                                          <div class="col-lg-8">
                                              <input id="emaildata" value="{{$editData->emailaddress??''}}" type="text" class="form-control">
                                             <div id="email_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="cid" class="col-lg-4 col-form-label">Medical Policy Customer
                                             ID
</label>
                                          <div class="col-lg-8">
                                             <input id="mpcst" type="text" value="{{$editData->medicalpolicy??''}}" onkeypress="preventNonNumericalInput(event)" maxlength="30" class="form-control">
                                             <div id="mpcst_error"></div>
                                          </div>
                                       </div>
                                    </div>

                                    

                                       <?php

                                            $modeemp= DB::table('main_mode_emploment')->where('isactive','=',1)->get();
                                             
                                           ?>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="mode" class="col-lg-4 col-form-label">Mode of Employement
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="modeemp">
                                                <option value="">Select option</option>
                                                 @foreach($modeemp as  $modeemps)
                                                <option value="{{$modeemps->id}}"  @if(!empty($editData)) @if($modeemps->id == $editData->modeofentry) selected @endif @endif>{{$modeemps->name}}</option>
                                                @endforeach
                                                
                                             </select>
                                             <div id="modeemp_error"></div>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="role" class="col-lg-4 col-form-label">Role<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                        <?php

                                            $role = DB::table('main_roles')->where('id','!=',1)->where('isactive','=',1)->get();
                                             
                                           ?>
                                            
                                             <select class="form-control" id="role">
                                                <option value="">Select Role</option>
                                                @foreach($role as $roles)
                                                <option value="{{$roles->id}}"   @if(!empty($editData)) @if($roles->id == $editData->emprole) selected @endif @endif  >{{$roles->rolename}}</option>
                                                @endforeach
                                               
                                             </select>
                                             <div id="role_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcat" class="col-lg-4 col-form-label">Employee Category
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="emp_category">
                                                <option value="">Select Category</option>
                                                <option @if(!empty($editData)) @if('A' == $editData->emp_category) selected @endif @endif >A</option>
                                                <option  @if(!empty($editData)) @if('B' == $editData->emp_category) selected @endif @endif>B</option>
                                             </select>
                                             <div id="empcode_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="crdno" class="col-lg-4 col-form-label">Card No.
</label>
                                          <div class="col-lg-8">
                                             <input id="crdno" type="text" value="{{$editData->medicalpolicy??''}}" onkeypress="preventNonNumericalInput(event)" maxlength="20" class="form-control">
                                               <div id="crdno_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    
                                      <?php

                                     $businessunit = DB::table('main_businessunits')->where('isactive','=',1)->get();
                                             
                                           ?>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="busunit" class="col-lg-4 col-form-label">Business Unit</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="bsnit">
                                                <option value="">Select Business Unit</option>
                                                @foreach($businessunit as $businessunits)
                                                <option value="{{$businessunits->id}}"   @if(!empty($editData)) @if($businessunits->id == $editData->bussinessunit) selected @endif @endif  >{{$businessunits->unitname}}</option>
                                                @endforeach
                                               
                                             </select>
                                               <div id="bsnit_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                         <?php

                                            $department = DB::table('main_departments')->where('isactive','=',1)->get();
                                             
                                           ?>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="dep" class="col-lg-4 col-form-label">Department
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="dprt">
                                                <option value="">Select Department</option>

                                                @foreach($department as $departments)
                                                <option value="{{$departments->id}}"  @if(!empty($editData)) @if($departments->id == $editData->department_id) selected @endif @endif>{{$departments->deptname}}</option>
                                                @endforeach
                                               
                                             </select>
                                               <div id="dprt_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                     <?php

                                          $reporting = DB::table('main_users')->where('isactive','=',1)->where('emprole',3)->get();
                                             
                                           ?>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="reporting" class="col-lg-4 col-form-label">Reporting
                                             Manager<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="reptmng">
                                                <option value="">Select Reporting Manager</option>
                                                @foreach($reporting as $reportings)
                                                <option value="{{$reportings->id}}"  @if(!empty($editData)) @if($reportings->id == $editData->reporting_manager) selected @endif @endif >{{$reportings->userfullname}}</option>
                                                @endforeach
                                             
                                             </select>
                                             <div id="reptmng_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 

                                         <?php

                                            $jobtitle= DB::table('main_jobtitles')->where('isactive','=',1)->get();
                                             
                                           ?>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="jobtitle" class="col-lg-4 col-form-label">Job Title
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="jobtitle">
                                                <option value="">Select Job Title</option>
                                                @foreach($jobtitle as  $jobtitles)
                                                <option value="{{$jobtitles->id}}" @if(!empty($editData)) @if($jobtitles->id == $editData->jobtitle_id) selected @endif @endif >{{$jobtitles->jobtitlename}}</option>
                                                @endforeach
                                               
                                             </select>
                                             <div id="jobtitle_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                     <?php

                                            $positions= DB::table('main_positions')->where('isactive','=',1)->get();
                                             
                                           ?>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="position" class="col-lg-4 col-form-label">Position</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="positions">
                                                <option value="">Select Position</option>
                                                @foreach($positions as $positionss)
                                                <option value="{{$positionss->id}}" @if(!empty($editData)) @if($positionss->id == $editData->position_id) selected @endif @endif>{{$positionss->positionname}}</option>
                                                @endforeach
                                              
                                             </select>
                                              <div id="positions_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 

                                       <?php

                                            $empstatus = DB::table('main_employmentstatus')->where('isactive','=',1)->get();
                                             
                                           ?>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empstatus" class="col-lg-4 col-form-label">Employement
                                             Status
</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="empstatus">
                                                <option value="">Employement
                                                   Status</option>
                                                   @foreach($empstatus as $empstatuss)
                                                <option value="{{$empstatuss->id}}" @if(!empty($editData)) @if($empstatuss->id == $editData->employee_status) selected @endif @endif>{{$empstatuss->workcode}}</option>
                                                @endforeach
                                              
                                             </select>
                                              <div id="empstatus_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="doj" class="col-lg-4 col-form-label">Date of Joining<span class="text-danger p-l-5">*</span>
</label>
                                          <div class="col-lg-8">
                                             <input id="doj" type="date" value="{{$editData->join_date??''}}" class="form-control">
                                              <div id="doj_error"></div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="dol" class="col-lg-4 col-form-label">Date of Leaving</label>
                                          <div class="col-lg-8">
                                             <input id="dol" type="date" value="{{$editData->leave_date??''}}" class="form-control">
                                               <div id="dol_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                     
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="yoe" class="col-lg-4 col-form-label">Year of Experience</label>
                                          <div class="col-lg-8">
                                             <input id="yoe" type="text" onkeypress="preventNonNumericalInput(event)" maxlength="2" value="{{$editData->experience??''}}" class="form-control">
                                              <div id="yoe_error"></div>
                                          </div>
                                       </div>
                                    </div>


                                       <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="yoe" class="col-lg-4 col-form-label">Type</label>
                                          <div class="col-lg-8">
                                             <input id="yoe" type="text" maxlength="4" value="{{$editData->experience??''}}" class="form-control">
                                              <div id="yoe_error"></div>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="workphn" class="col-lg-4 col-form-label">Work Phone</label>
                                          <div class="col-lg-8">
                                             <input id="workphn" onkeypress="preventNonNumericalInput(event)" type="text" maxlength="15" value="{{$editData->workphone??''}}" class="form-control">
                                              <div id="workphn_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="extno" class="col-lg-4 col-form-label">Employee Type.</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="emp_type">
                                             <option value="1" @if(!empty($editData)) @if($editData->emp_type==1) selected  @endif @endif>Employee</option>
                                              <option value="2" @if(!empty($editData))   @if($editData->emp_type==2) selected  @endif  @endif>freelancer</option>     
                                              </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class=" float-right">
                                               
                                                <button type="button" class="btn btn-primary addemp">Save</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           </form>
                         
                    
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         @stop
          @section('extra_js')
         <!--  <script type="text/javascript">
          	 $('#doj').datetimepicker();
          	 $(function () {
         
            });
          </script> -->
         
            @stop