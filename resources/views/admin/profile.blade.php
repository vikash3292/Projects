

@extends('layouts.superadmin_layout')
   @section('content')
<div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6 col-6">
                        <h3 class="page-title">My Profile</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">My Profile</a></li>
                        </ol>
                     </div>
                     <div class="col-sm-6 col-6">
                             <button class="btn btn-primary float-right" data-toggle="modal"
                                                      data-target="#changepsw">Change Password</button>
                     </div>
                  </div>
               </div>
               <!-- end row -->
              <!--  <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="row">
                                    <div class="col-sm-3 text-center">
                                       <div class="imguploadDiv">
                                          <img src="assets/images/profile.png" alt="Avatar"
                                             class="avatar img-responsive" width="100%">
                                          <div class="imgupload">
                                             <span><i class="mdi mdi-lead-pencil font-18"></i></span>
                                             <input type="file">
                                          </div>
                                          <div>
                                             <button class="btn btn-primary">Upload</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-9 basicinfo">
                                       <div class="row p-20">
                                          <div class="col-md-12">
                                             <div class="form-group row">
                                                <label for="empcode" class="col-lg-4">Name</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">Nisha Upreti
                                                   </label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Email ID</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">Nupreti@gmail.com</label>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="col-md-12">
                                             <div class="row">
                                                <label for="empcode" class="col-lg-4">Contact N0.</label>
                                                <div class="col-lg-5">
                                                   <label class="myprofile_label">9876543210
                                                   </label>
                                                </div>

                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Change Theme</label>
                                                <div class="col-lg-5">
                                                   <select class="form-control" id="themes">
                                                      <option>Select Theme</option>
                                                      <option value="assets/css/style.css">Light</option>
                                                      <option value="assets/css/primary.css">Dark</option>
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
               </div> -->
         
         

               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body padding-5">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="row">
                                    <div class="col-sm-3 text-center">
                                       <div class="imguploadDiv">
                                          <img src="{{URL::to('/public/')}}{{$info->profileimg??''}}" alt="Avatar"
                                             class="avatar img-responsive" width="100%">
                                              @if($currentuser == $userid)
                                          <div class="imgupload">
                                                <span><i class="mdi mdi-lead-pencil font-18"></i></span>
                                             <input type="file" id="profile" name="profile" onchange="uploadprofile()" accept="image">
                                          </div>
                                         
                                          <div>
                                            <div id="profile_error"></div>
                                             <!--<button id="uploadImg"  class="btn btn-primary">Change Picture</button>-->
                                          </div>
                                          @endif
                                       </div>
                                    </div>
                                        <div class="col-sm-9">
                                       <div class="row p-20">
                                          <div class="col-md-12">
                                             <div class="form-group row">
                                                <label for="empcode" class="col-lg-4">Name</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">{{$info->userfullname??''}}
                                                   </label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Email ID</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">{{$info->emailaddress??''}}</label>
                                                </div>
                                             </div>
                                          </div>

                                            <div class="col-md-12">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Savior Card No</label>
                                                <div class="col-lg-8">
                                                   <label class="myprofile_label">{{$info->savior_card_id??''}}</label>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="col-md-12">
                                             <div class="row">
                                                <label for="empcode" class="col-lg-4">Contact No.</label>
                                                <div class="col-lg-5">
                                                   <label class="myprofile_label">{{$info->workphone??''}}
                                                   </label>
                                                </div>

                                             </div>
                                          </div>
                                          
                                            @if($currentuser == $userid)
                                          <div class="col-md-12 m-t-10">
                                             <div class="row form-group ">
                                                <label for="empcode" class="col-lg-4">Change Theme</label>
                                                <div class="col-lg-5">
                                                   <select class="form-control" id="themesdate">
                                                      <option value="">Default Theme</option>
                                                 <option value="Light" @if(!empty($info->themes)) @if('Light' == $info->themes) selected @endif @endif>Green</option>
                                                      <option value="Dark" @if(!empty($info->themes))  @if('Dark' == $info->themes) selected @endif @endif>Purple</option>
                                                   </select>
                                                </div>
                                                <!--<div class="col-sm-3">-->
                                                <!--   <button class="btn btn-primary" data-toggle="modal"-->
                                                <!--      data-target="#changepsw">Change Password</button>-->
                                                <!--</div>-->
                                             </div>
                                          </div>
                                          
                                          @endif
                                          
                                          
                                          
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
                              <input id="cpassword" name="currentpsd" type="password" minlength="6" maxlength="20" type="text" class="form-control">
                              <div id="cpassword_error"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="newpsd" class="col-lg-4 col-form-label">
                              New Password</label>
                           <div class="col-lg-8">
                              <input id="newpsd" name="newpsd" type="text" type="password" minlength="6" maxlength="20" class="form-control">
                              <div id="newpsd_error"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Confirm Password</label>
                           <div class="col-lg-8">
                              <input id="cnfpsd" name="cnfpsd" type="text" type="password" minlength="6" maxlength="20" class="form-control">
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
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body profilepage">
                           <div class="tab">
                              <button class="tablinks" onclick="openCity(event, 'official')" id="defaultOpen"><span class="d-none d-sm-block">Official
                                 Info</span><span class="d-block d-sm-none text-center"><i class="fa fa-info-circle" data-toggle="tooltip" title="Salary"></i></span></button>
                              <!--<button class="tablinks" onclick="openCity(event, 'leaves')">Leaves</button>-->
                              <button class="tablinks" onclick="openCity(event, 'holiday')"><span class="d-none d-sm-block">Holiday</span><span class="d-block d-sm-none text-center"><i class="fas fa-snowman" data-toggle="tooltip" title="Holiday"></i></span></button>
                               @if($currentuser == $userid)
                              <button class="tablinks" onclick="openCity(event, 'salary')"><span class="d-none d-sm-block">Salary</span><span class="d-block d-sm-none text-center"><i class="fa fa-money-bill-alt" data-toggle="tooltip" title="Salary"></i></span></button>
                              
                              <button class="tablinks" onclick="openCity(event, 'personalinfo')"><span class="d-none d-sm-block">Personal Info</span><span class="d-block d-sm-none text-center"><i class="fa fa-user" data-toggle="tooltip" title="Personal Info"></i></span></button>
                              <button class="tablinks" onclick="openCity(event, 'contactinfo')"><span class="d-none d-sm-block">Contact Info</span><span class="d-block d-sm-none text-center"><i class="fa fa-phone" data-toggle="tooltip" title="Contact Info"></i></span></button>
                              @endif
                              <button class="tablinks" onclick="openCity(event, 'experience')"><span class="d-none d-sm-block">Experience</span><span class="d-block d-sm-none text-center"><i class="fa fa-history" data-toggle="tooltip" title="Experience"></i></span></button>
                              <button class="tablinks" onclick="openCity(event, 'education')"><span class="d-none d-sm-block">Education</span><span class="d-block d-sm-none text-center"><i class="fa fa-graduation-cap" data-toggle="tooltip" title="Education"></i></span></button>
                              <button class="tablinks" onclick="openCity(event, 'training')"><span class="d-none d-sm-block">Training &
                                 Certification</span><span class="d-block d-sm-none text-center"><i class="fa fa-certificate" data-toggle="tooltip" title="Training &
                                 Certification"></i></span></button>
                                     @if($currentuser == $userid)
                              <button class="tablinks" onclick="openCity(event, 'visa')"><span class="d-none d-sm-block">Visa & Immigration</span><span class="d-block d-sm-none text-center"><i class="fa fa-cc-visa" data-toggle="tooltip" title="Visa & Immigration"></i></span></button>
                           
                              <button class="tablinks" onclick="openCity(event, 'assets')"><span class="d-none d-sm-block">Assets</span><span class="d-block d-sm-none text-center"><i class="fa fa-list" data-toggle="tooltip" title="Assets"></i></span></button>
                                 @endif
                           </div>
                           <div id="official" class="tabcontent">
                              <h3>Official Info 
                            @if($currentuser == $userid)
                              <a href="{{URL::to('/edit/add-employees')}}/{{$userid}}"><i class="mdi mdi-pen float-right text-warning cursorpointer"
                                    ></i></a>
                                   
                                   @endif
                                    
                                    
                                    </h3>
                                    
                                 
                               
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcode" class="col-lg-4 col-form-label">User Code</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->employeeId??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empid" class="col-lg-4 col-form-label">User ID</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->userid??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="prifix" class="col-lg-4 col-form-label">Prefix</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label" id="prifixlabel">{{$info->prefixname??''}}.</label>
                                             <div id="prifix">
                                                <input type="text" class="form-control inline_input">
                                                <i class="mdi mdi-check text-warning"></i>
                                                <i class="mdi mdi-close text-danger" id="cancelprifix"></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="firstname" class="col-lg-4 col-form-label">First Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label" id="firstlabel">{{$info->firstname??''}}</label>
                                             <div id="firstname">
                                                <input type="text" class="form-control inline_input">
                                                <i class="mdi mdi-check text-warning"></i>
                                                <i class="mdi mdi-close text-danger" id="cancelfirst"></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="logo" class="col-lg-4 col-form-label">Last Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label" id="lastlabel">{{$info->lastname??''}}  </label>
                                             <div id="lastname">
                                                <input type="text" class="form-control inline_input">
                                                <i class="mdi mdi-check text-warning"></i>
                                                <i class="mdi mdi-close text-danger" id="cancellast"></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="email" class="col-lg-4 col-form-label">Email</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label" id="emaillabel">{{$info->emailaddress??''}}</label>
                                             <div id="email">
                                                <input type="text" class="form-control inline_input">
                                                <i class="mdi mdi-check text-warning"></i>
                                                <i class="mdi mdi-close text-danger" id="cancelemail"></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="cid" class="col-lg-4 col-form-label">Medical Policy Customer
                                             ID</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->medicalpolicy??''}} </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="mode" class="col-lg-4 col-form-label">Mode of Employement</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->modename??''}}</label>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="role" class="col-lg-4 col-form-label">Role</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->rolename??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcat" class="col-lg-4 col-form-label">Employee Category</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->emp_category??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="crdno" class="col-lg-4 col-form-label">Card No.</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->card_number??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="busunit" class="col-lg-4 col-form-label">Business Unit</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->unitname??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="dep" class="col-lg-4 col-form-label">Department</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->deptname??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <?php
                                    
                                  
                                    
                                    $getRname  = DB::table('main_users')->where('id', $info->reporting_manager??0)->select('userfullname')->first();
                                    
                                    ?>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="reporting" class="col-lg-4 col-form-label">Reporting
                                             Manager</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$getRname->userfullname??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="jobtitle" class="col-lg-4 col-form-label">Job Title</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->jobtitlename??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="position" class="col-lg-4 col-form-label">Position</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->positionname??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empstatus" class="col-lg-4 col-form-label">Employement
                                             Status</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->workcode??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="doj" class="col-lg-4 col-form-label">Date of Joining</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{date('d-M-y',strtotime($info->join_date??''))}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="dol" class="col-lg-4 col-form-label">Date of Leaving</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">
                                                @if(!empty($info->leave_date))
                                                {{date('d-M-y',strtotime($info->leave_date??''))}}
                                                @endif
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="yoe" class="col-lg-4 col-form-label">Year of Experience</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->experience??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="workphn" class="col-lg-4 col-form-label">Work Phone</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->workphone??''}}</label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="extno" class="col-lg-4 col-form-label">Extension No.</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->extension}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="leaves" class="tabcontent">
                              <h3>Leaves</h3>

                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="table-responsive m-t-20">
                                          <table class="table mb-0">
                                             <thead>
                                                <tr>
                                                   <th>Leave Type</th>
                                                   <th>Allotted Leave Limit</th>
                                                   <th>Used Leave</th>
                                                   <th>Remaining Leaves</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <th scope="row">
                                                      Casual Leave
                                                   </th>
                                                   <td>
                                                      18
                                                   </td>
                                                   <td>5.5</td>
                                                   <td>12.5</td>
                                                </tr>
                                                <tr>
                                                   <th scope="row">
                                                      Restricted Leave
                                                   </th>
                                                   <td>
                                                      5
                                                   </td>
                                                   <td>5.0</td>
                                                   <td>0.0</td>
                                                </tr>
                                                <tr>
                                                   <th scope="row">
                                                      Leave Without Pay
                                                   </th>
                                                   <td>
                                                      30
                                                   </td>
                                                   <td></td>
                                                   <td></td>
                                                </tr>
                                                <tr>
                                                   <th scope="row">
                                                      Meternity Leave
                                                   </th>
                                                   <td>
                                                      90
                                                   </td>
                                                   <td></td>
                                                   <td></td>
                                                </tr>
                                                <tr>
                                                   <th scope="row">
                                                      My Leave
                                                   </th>
                                                   <td>
                                                      {{$info->unpaid_leave??''}}
                                                   </td>
                                                   <td>{{$info->used_leave??''}}</td>
                                                   <td>0.0</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="holiday" class="tabcontent">
                              <h3>Holiday</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-12">
                                       <div class="table-responsive m-t-20">
                                          <table class="table mb-0">
                                             <thead>
                                                <tr>
                                                   <th>Action</th>
                                                   <th>Holiday</th>
                                                   <th>Holiday Type</th>
                                                   <th>Date</th>
                                                   <th>Description</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                 @if(!empty($info->holiday))
                                                @foreach($info->holiday as $holyday)
                                                @php($getgroup = DB::table('main_holidaygroups')->where('id',$holyday->groupid)->select('groupname')->first())

                                                <tr>
                                                   <th scope="row">
                                                      <i class="mdi mdi-eye font-blue" onclick="holiday(' {{$holyday->holidayname}}','{{$holyday->holidaydate}}','{{$holyday->description}}')" title="View"></i>
                                                   </th>
                                                   <td>
                                                    {{$holyday->holidayname}}
                                                   </td>
                                                   <td class="font-green">{{$getgroup->groupname??''}}</td>
                                                   <td> {{date('d-M-Y',strtotime($holyday->holidaydate))}}</td>
                                                   <td class="text_ellipses">{{$holyday->description}}</td>

                                                </tr>

                                                @endforeach
                                                @endif
                                                <!-- <tr>
                                                   <th scope="row">
                                                      <i class="mdi mdi-eye font-blue" data-toggle="modal"
                                                         data-target="#holidayaction" title="View"></i>
                                                   </th>
                                                   <td>
                                                      Guru Nank Jayanti
                                                   </td>
                                                   <td class="font-blue">RH</td>
                                                   <td>12 November 2019</td>
                                                   <td class="text_ellipses">Guru Nank Jayanti</td>
                                                </tr>
                                                <tr>
                                                   <th scope="row">
                                                      <i class="mdi mdi-eye font-blue" data-toggle="modal"
                                                         data-target="#holidayaction" title="View"></i>
                                                   </th>
                                                   <td>
                                                      Bhai Dooj
                                                   </td>
                                                   <td class="font-blue">RH</td>
                                                   <td>29 October 2019</td>
                                                   <td class="text_ellipses">Bhai Dooj is celebrated two days after
                                                      Diwali, and is, like
                                                      Raksha Bandhan, a day dedicated to the love between a brother and
                                                      sister.</td>
                                                </tr> -->
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="salary" class="tabcontent">
                              <h3>Salary</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Currency</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->currencyname??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="payfrq" class="col-lg-4 col-form-label">Pay
                                             Frequency</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->salarytype??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="salaryamt" class="col-lg-4 col-form-label">Salary Amount</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->salary??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="bankname" class="col-lg-4 col-form-label">Bank Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->bankname??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="actname" class="col-lg-4 col-form-label">Account Holder
                                             Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->accountholder_name??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="acclassType" class="col-lg-4 col-form-label">IFSC Code</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->ifsc??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="acctype" class="col-lg-4 col-form-label">Account Type</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->account_type??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="accno" class="col-lg-4 col-form-label">Account No.</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->accountnumber??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="acctype" class="col-lg-4 col-form-label">Project
                                             Commission(%)</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->project_commission??''}}%</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="personalinfo" class="tabcontent">
                              <h3>Personal Info
                                 <!-- <button class="btn btn-primary float-right" id="personalinfocancel">Cancel</button> -->
                                 <!--@if(PermissionHelper::frontendPermission('edit-users'))-->
                               
                                 <a href="{{URL::to('edit/addPersonalInfo')}}/{{$userid}}" class="btn btn-primary float-right m-r-5" id="personalinfoedit">Edit</a>

                                 <!--@endif-->
                                 <!-- <button class="btn btn-primary float-right m-r-5"
                                    id="personalinfoupdate">Update</button> -->
                              </h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="gender" class="col-lg-4 col-form-label">Gender</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->gendername??''}}</label>
                                             <select class="form-control editpersonalinfo">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="holidayType" class="col-lg-4 col-form-label">Marital
                                             Status</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->maritalstatusname??''}}</label>
                                             <select class="form-control editpersonalinfo">
                                                <option value="">Single</option>
                                                <option value="AE">Married</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Nationality</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->nationalitycode??''}}</label>
                                             <select class="form-control editpersonalinfo">
                                                <option value="">Indian</option>
                                                <option value="AE">Other</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="ethnic" class="col-lg-4 col-form-label">Ethnic Code</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->ethnic_code??''}}</label>
                                             <input type="text" class="form-control editpersonalinfo">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="racecode" class="col-lg-4 col-form-label">Race Code</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->race_code??''}}</label>
                                             <input type="text" class="form-control editpersonalinfo">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="dob" class="col-lg-4 col-form-label">Date of Birth</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{date('d-M-Y',strtotime($info->dob??''))}}</label>
                                             <input type="date" class="form-control editpersonalinfo">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="racecode" class="col-lg-4 col-form-label">Blood Group</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->blood_group??''}}</label>
                                             <input type="text" class="form-control editpersonalinfo">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="contactinfo" class="tabcontent">
                              <h3>Contact Info</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="personalmail" class="col-lg-4 col-form-label">Personal
                                             Email</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->personalemail??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <h3>Permanent Address</h3>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Country" class="col-lg-4 col-form-label">Country</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->country??''}}</label>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="city" class="col-lg-4 col-form-label">City</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->cityname??''}}</label>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="state" class="col-lg-4 col-form-label">State</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->statename??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Street" class="col-lg-4 col-form-label">Street</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->personal_streetaddress??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="postalcode" class="col-lg-4 col-form-label">Postal Code</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->perm_pincode??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <h3>Current Address</h3>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Country" class="col-lg-4 col-form-label">Country</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->current_country??''}}</label>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="city" class="col-lg-4 col-form-label">City</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->current_city??''}}</label>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="state" class="col-lg-4 col-form-label">State</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->current_state??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Street" class="col-lg-4 col-form-label">Street</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->current_streetaddress??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="postalcode" class="col-lg-4 col-form-label">Postal Code</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->current_pincode??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <h3>Emergancy Details</h3>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="name" class="col-lg-4 col-form-label">Name</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->emergency_name??''}}</label>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="email" class="col-lg-4 col-form-label">Email</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->emergency_email??''}}</label>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="contactno" class="col-lg-4 col-form-label">Contact No.</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->emergency_number??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="offadd" class="col-lg-4 col-form-label">Office Address</label>
                                          <div class="col-lg-8 col-form-label">
                                             <label class="myprofile_label">{{$info->emergentcy_address??''}}</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="experience" class="tabcontent">
                              <h3>Experience
                              <!--@if(PermissionHelper::frontendPermission('edit-users'))-->
                                 <a href="{{URL::to('edit/addexperiance')}}/{{$userid}}" class="btn btn-primary float-right"
                                    title="Add">Add</a>
                                    <!--@endif-->
                              </h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Company Name</th>
                                                         <th>Company Website</th>
                                                         <th>Designation</th>
                                                         <th>From Date</th>
                                                         <th>To Date</th>
                                                         <!-- <th>Action</th> -->
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @php($i = 1)
                                                      @if(!empty($info->experiance))
                                                      @foreach($info->experiance as $exp)
                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>{{$exp->comp_name}}</td>
                                                         <td>{{$exp->comp_website}}</td>
                                                         <td>{{$exp->designation}}</td>
                                                         <td>{{date("d-M-Y",strtotime($exp->from_date))}}</td>
                                                         <td>{{date("d-M-Y",strtotime($exp->to_date))}}</td>
                                                         <td>
                                                            <!-- <i class="mdi mdi-eye font-green"></i> -->
                                                            <!-- <i class="mdi mdi-delete text-danger" data-toggle="modal"
                                                               data-target="#deletemp" title="Delete"></i> -->
                                                         </td>
                                                      </tr>
                                                      @endforeach
                                                      @endif
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="education" class="tabcontent">
                              <h3>Education
                              <!--@if(PermissionHelper::frontendPermission('edit-users'))-->
                                 <a href="{{URL::to('edit/addeducation')}}/{{$userid}}" class="btn btn-primary float-right"
                                    title="Add">Add</a>
                                    <!--@endif-->
                              </h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Education Level</th>
                                                         <th>Institution Name</th>
                                                         <th>Course</th>
                                                         <th>From Date</th>
                                                         <th>To Date</th>
                                                         <!-- <th>Action</th> -->
                                                      </tr>
                                                   </thead>
                                                   <tbody>

                                                        @php($i = 1)
                                                        @if(!empty($info->education))
                                                      @foreach($info->education as $educaition)



                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>
                                                            {{$educaition->eduname}}
                                                         </td>
                                                         <td> {{$educaition->institute_name}}</td>
                                                         <td> {{$educaition->coursename}}</td>
                                                         <td>{{date("d-M-Y",strtotime($educaition->from_date))}}</td>
                                                         <td>{{date("d-M-Y",strtotime($educaition->from_date))}}</td>
                                                         <!-- <td>
                                                            <i class="mdi mdi-eye font-green"></i>
                                                            <i class="mdi mdi-delete text-danger" data-toggle="modal"
                                                               data-target="#editemp" title="Edit"></i>
                                                         </td> -->
                                                      </tr>
                                                      @endforeach
                                                      @endif
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="training" class="tabcontent">
                              <h3>Training & Certification
                              </h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Course Type</th>
                                                         <th>Course Level</th>
                                                         <th>Training By</th>
                                                         <th>Fromo Date</th>
                                                         <th>To Date</th>
                                                         <th>Description</th>
                                                         <th>Attachment</th>
                                                         <!-- <th>Action</th> -->
                                                      </tr>
                                                   </thead>
                                                   <tbody>


                                                        @php($i = 1)
                                                        @if(!empty($info->training))
                                                      @foreach($info->training as $training)

                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>{{$training->coursetype}}</td>
                                                         <td>{{$training->courselevel}}</td>
                                                         <td>{{$training->trainingby}}</td>
                                              <td>{{date("d-M-Y",strtotime($training->fromdate))}}</td>
                                                         <td>{{date("d-M-Y",strtotime($training->todate))}}</td>
                                                         <td class="text_ellipses">{{$training->descdata}}</td>
                                                         <td><a download href="{{$training->attachfile}}">Download</a></td>
                                                         <!-- <td>
                                                            <i class="mdi mdi-clipboard-text text-primary"
                                                               data-toggle="modal" data-target="#feedback"
                                                               title="Feedback"></i>
                                                            <i class="mdi mdi-pen text-warning" data-toggle="modal"
                                                               data-target="#trainingedit" title="Edit"></i>
                                                         </td> -->
                                                      </tr>

                                                      @endforeach
                                                      @endif
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="visa" class="tabcontent">
                              <h3>Visa & Immigration</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Passport Number</th>
                                                         <th>Passport Issued Date</th>
                                                         <th>Passport Expiry Date</th>
                                                         <th>Visa Type</th>
                                                         <th>Visa Number</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>

                                                           @php($i = 1)
                                                           @if(!empty($info->visa))
                                                      @foreach($info->visa as $visa)
                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>{{$visa->passport_number}}</td>
                                                         <td>{{date("d-M-Y",strtotime($visa->passport_issue_date))}}</td>
                                                         <td>{{date("d-M-Y",strtotime($visa->passport_expiry_date))}}</td>
                                                         <td>{{$visa->visa_type}}</td>
                                                         <td>{{$visa->visa_number}}</td>
                                                      </tr>

                                                      @endforeach
                                                      @endif
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="assets" class="tabcontent">
                              <h3>Assets</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Asset Name</th>
                                                         <th>Serial Number</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                          @php($i = 1)
                                                          @if(!empty($info->assets))
                                                      @foreach($info->assets as $asset)
                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>{{$asset->name}}</td>
                                                         <td>{{$asset->number}}</td>
                                                      </tr>

                                                      @endforeach
                                                      @endif
                                                     
                                                   </tbody>
                                                </table>
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
            <!-- change password -->
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
                              <input id="currentpsd" name="currentpsd" type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="newpsd" class="col-lg-4 col-form-label">
                              New Password</label>
                           <div class="col-lg-8">
                              <input id="newpsd" name="newpsd" type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Confirm Password</label>
                           <div class="col-lg-8">
                              <input id="cnfpsd" name="cnfpsd" type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Choose Theme</label>
                           <div class="col-lg-8">
                              <select class="form-control">
                                 <option>Select Theme</option>
                                 <option><i class="mdi mdi-checkbox-blank text-light">Light</i></option>
                                 <option><i class="mdi mdi-checkbox-blank text-dark">Dark</i></option>
                                 <option><i class="mdi mdi-checkbox-blank text-primary">Primary</i></option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect">Save</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light"
                           data-dismiss="modal">Cancel</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>
            <!-- feedback popup -->
            <div id="feedback" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Trainer Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group row">
                           <div class="table-responsive m-t-20">
                              <table class="table mb-0">
                                 <thead>
                                    <tr>
                                       <th>S.No</th>
                                       <th>Course Name</th>
                                       <th>Course Level</th>
                                       <th>Course Offered By</th>
                                       <th>Certification/Training Name</th>
                                       <th>Fromo Date</th>
                                       <th>To Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <th scope="row">1</th>
                                       <td>Dummy</td>
                                       <td>Dummy</td>
                                       <td>Dummy</td>
                                       <td>Dummy</td>
                                       <td>Dummy</td>
                                       <td>Dummy</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-12 text-center">
                              <h5>Feedbaack Form</h5>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="currentpsd" class="col-lg-4 col-form-label">
                              Provide rating to trainer</label>
                           <div class="col-lg-8">
                              <input type="hidden" class="rating check" data-filled="mdi mdi-star text-primary"
                                 data-empty="mdi mdi-star-outline text-muted">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="newpsd" class="col-lg-4 col-form-label">
                              Quality of trainer</label>
                           <div class="col-lg-8">
                              <input type="hidden" class="rating check" data-filled="mdi mdi-star text-primary"
                                 data-empty="mdi mdi-star-outline text-muted">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Quality of Communication</label>
                           <div class="col-lg-8">
                              <input type="hidden" class="rating check" data-filled="mdi mdi-star text-primary"
                                 data-empty="mdi mdi-star-outline text-muted">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Any Feedback you want for trainer</label>
                           <div class="col-lg-8">
                              <textarea class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="cnfpsd" class="col-lg-4 col-form-label">
                              Any Specificies</label>
                           <div class="col-lg-8">
                              <textarea class="form-control"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect">Submit</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light"
                           data-dismiss="modal">Cancel</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>
            <!-- Holiday Action -->
            <div id="holidayaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">View</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group row">
                           <div class="table-responsive">
                              <table class="table mb-0">
                                 <thead>
                                    <tr>
                                       <th>Holiday</th>
                                       <th>Date</th>
                                       <th>Description</th>
                                       <th>Holiday Type</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <th id="holidayname" scope="row"></th>
                                       <td id="holidaydate"></td>
                                       <td id="holidaydesc"></td>
                                       <td  id="holidaygroup" class="text_ellipses">FH</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Back</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>
            <!-- Add Experience -->
            <div id="addexp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add Experience</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="holidayType" class="col-lg-4 col-form-label">Company
                                    Name</label>
                                 <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="website" class="col-lg-4 col-form-label">Company
                                    Website</label>
                                 <div class="col-lg-8">
                                    <input id="website" name="website" type="text" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="from" class="col-lg-4 col-form-label">From Date</label>
                                 <div class="col-lg-8">
                                    <input id="from" name="from" type="date" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="to" class="col-lg-4 col-form-label">To Date</label>
                                 <div class="col-lg-8">
                                    <input id="to" name="to" type="date" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="Designation" class="col-lg-4 col-form-label">Designation</label>
                                 <div class="col-lg-8">
                                    <input id="Designation" name="Designation" type="text" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button class="btn btn-primary float-right">Save</button>
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Cancel</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>
            <!-- Add Education -->
            <div id="addedu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add Education</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="holidayType" class="col-lg-4 col-form-label">Education
                                    Lavel</label>
                                 <div class="col-lg-8">
                                    <select id="holidayType" name="holidayType" class="form-control">
                                       <option value="">--Please Select--</option>
                                       <option value="AE">Graduate</option>
                                       <option value="VI">Post Graduate</option>
                                       <option value="MC">Deploma</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="colortype" class="col-lg-4 col-form-label">Institution
                                    Name</label>
                                 <div class="col-lg-8">
                                    <input id="colortype" name="colortype" type="text" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="colortype" class="col-lg-4 col-form-label">Course</label>
                                 <div class="col-lg-8">
                                    <select id="holidayType" name="holidayType" class="form-control">
                                       <option value="">--Please Select--</option>
                                       <option value="AE">BCA</option>
                                       <option value="VI">B.tech</option>
                                       <option value="MC">MCA</option>
                                    </select> </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="from" class="col-lg-4 col-form-label">From Date</label>
                                 <div class="col-lg-8">
                                    <input id="from" name="from" type="date" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="to" class="col-lg-4 col-form-label">To Date</label>
                                 <div class="col-lg-8">
                                    <input id="to" name="to" type="date" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button class="btn btn-primary float-right">Save</button>
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Cancel</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>
         </div>


         @stop

          @section('extra_js')
          <script>
      function openCity(evt, cityName) {
         var i, tabcontent, tablinks;
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
   </script>

    <script>

      function holiday(hodayname,holidate,desc){



        
        // $('#holidayaction').model('show');
         $('#holidayaction').modal('show');

         $('#holidayname').text(hodayname);
         $('#holidaydate').text(holidate);
         $('#holidaydesc').text(desc);

      }

    </script>

   @endsection