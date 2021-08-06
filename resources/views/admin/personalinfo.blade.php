@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                      @if(!empty($persoanlinfo))
                        <h3 class="page-title">Edit User</h3>
                        @else

                           <h3 class="page-title">Add User</h3>
                        @endif
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                              @if(!empty($persoanlinfo))
                           <li class="breadcrumb-item active"><a href="{{URL::to('/employees')}}">Edit User</a></li>
                           @else
                  <li class="breadcrumb-item active"><a href="{{URL::to('/employees')}}">Add User</a></li>

                           @endif
                        </ol>
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
                            <button class="tablinks " onclick="openTab(event, 'add-employees')" id="defaultOpen">Official
                                 Info</button>
                              <!-- <button class="tablinks" onclick="openTab(event, 'leaves')">Leaves</button>
                              <button class="tablinks" onclick="openTab(event, 'holiday')">Holiday</button> -->
                              <button class="tablinks" onclick="openTab(event, 'addsalary')">Salary</button>
                              <button class="tablinks active" onclick="openTab(event, 'addPersonalInfo')">Personal Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addcontact')">Contact Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addexperiance')">Experience</button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                     
                         
                           <form id="personalinfo" method="post">
                           <div id="personalinfo" class="tabcontent active">
                              <h3>Personal Info</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="gender" class="col-lg-4 col-form-label">Gender</label>
                                          <div class="col-lg-8">

                                             <?php
                                             $gender = DB::table('main_gender')->where('isactive' ,1)->get();
                                             ?>
                                             <div class="input-group">
                                                <select class="form-control" id="gender">
                                                    <option value="">Select option</option>
                                                   @foreach($gender as $genders)
                                                   <option value="{{$genders->id}}"   @if(!empty($persoanlinfo)) @if($genders->id == $persoanlinfo->genderid) selected @endif @endif>{{$genders->gendername}}</option>
                                                   @endforeach
                                                  
                                                </select>
                                             </div>
                                             <div id="gender_error"></div>
                                          </div>
                                       </div>
                                    </div>

                                    


                                             <?php
                                             $merital = DB::table('main_maritalstatus')->where('isactive' ,1)->get();
                                             ?>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="holidayType" class="col-lg-4 col-form-label">Marital
                                             Status</label>
                                          <div class="col-lg-8">
                                             <select id="maritalstaus" class="form-control" >
                                                 <option value="">Select Option</option>
                                                 @foreach($merital as $meritals)
                                                   <option value="{{$meritals->id}}"   @if(!empty($persoanlinfo)) @if($meritals->id == $persoanlinfo->maritalstatusid) selected @endif @endif>{{$meritals->maritalstatusname}}</option>
                                                   @endforeach
                                             </select>
                                              <div id="maritalstaus_error"></div>
                                          </div>
                                         
                                       </div>
                                    </div>
                                 </div>

                                   <?php
                                             $main_nationality = DB::table('main_nationality')->where('isactive' ,1)->get();
                                             ?>

                                 
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Nationality</label>
                                          <div class="col-lg-8">
                                             <select id="nationalty" name="nationalty" class="form-control">
                                                <option value="">Select Option</option>
                                               
                                                 @foreach($main_nationality as $main_nationality)
                                                   <option value="{{$main_nationality->id}}"  @if(!empty($persoanlinfo))  @if($main_nationality->id == $persoanlinfo->nationalityid) selected @endif @endif >{{$main_nationality->nationalitycode}}</option>
                                                   @endforeach
                                             </select>
                                          </div>
                                          <div id="national_error"></div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="ethnic" class="col-lg-4 col-form-label">Ethnic Code</label>
                                          <div class="col-lg-8">
                                             <input id="ethnic" value="{{$persoanlinfo->ethnic_code??''}}" name="ethnic" maxlength="20" type="text" class="form-control">
                                               <div id="ethnic_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="racecode" class="col-lg-4 col-form-label">Race Code</label>
                                          <div class="col-lg-8">
                                             <input id="racecode" value="{{$persoanlinfo->race_code??''}}" maxlength="20" name="racecode" type="text" class="form-control">
                                            <div id="racecode_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="dob" class="col-lg-4 col-form-label">Date of Birth</label>
                                          <div class="col-lg-8">
                                             <input id="dob"  type="date" value="{{$persoanlinfo->dob??''}}" class="form-control">
                                             <div id="dob_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="bloodgroup" class="col-lg-4 col-form-label">Blood Group</label>
                                          <div class="col-lg-8">
                                             <input id="bloodgroup" value="{{$persoanlinfo->blood_group??''}}"  maxlength="5" name="racecode" type="text" class="form-control">
                                             <div id="bloodgroup_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class=" float-right">
                                                <button id="addPersonalInfo" class="btn btn-primary">Save</button>
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
         @stop