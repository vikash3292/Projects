@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                          @if(!empty($getsalary))
                        <h3 class="page-title">Edit User</h3>
                        @else
                     <h3 class="page-title">Add User</h3>
                        @endif
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                             @if(!empty($getsalary))
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
                              <button class="tablinks active" onclick="openTab(event, 'addsalary')">Salary</button>
                              <button class="tablinks" onclick="openTab(event, 'addPersonalInfo')">Personal Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addcontact')">Contact Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addexperiance')">Experience</button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                           <form id="salary" method="post">
                           <div id="salary" class="tabcontent active">
                              <h3>Salary</h3>
                              <div class="width-float">

                                    <?php

                                 $currency = DB::table('main_currency')->where('isactive','=',1)->get();


                                             
                                           ?>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Currency
                                          <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <select id="currncy"  class="form-control">
                                                   <option value="">--Please Select--</option>

                                                   @foreach($currency as  $currencys)
                                                   <option value="{{$currencys->id}}" @if(!empty($getsalary)) @if($currencys->id == $getsalary->currency_id) selected   @endif  @endif>{{$currencys->currencyname}}</option>
                                                   @endforeach
                                                </select>
                                               
                                             </div>
                                              <div id="currncy_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="payfrq" class="col-lg-4 col-form-label">Pay
                                             Frequency<span class="text-danger p-l-5">*</span>
                                             </label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="pay">
                                                <option value="">Select Pay Frequency</option>
                                                <option @if(!empty($getsalary)) @if('Monthly' == $getsalary->salarytype) selected   @endif  @endif>Monthly</option>
                                             </select>
                                              <div id="pay_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="salaryamt" class="col-lg-4 col-form-label">Salary Amount <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <input id="salaryamt" onkeypress="preventNonNumericalInput(event)" name="salaryamt" value="{{$getsalary->salary??''}}" type="text" maxlength="20" class="form-control">
                                              <div id="salaryamt_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="bankname" class="col-lg-4 col-form-label">Bank Name</label>
                                          <div class="col-lg-8">
                                             <input id="bankname" value="{{$getsalary->bankname??''}}" name="bankname" maxlength="20" type="text" class="form-control">
                                              <div id="bankname_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="actname" class="col-lg-4 col-form-label">Account Holder
                                             Name</label>
                                          <div class="col-lg-8">
                                             <input id="actname" value="{{$getsalary->accountholder_name??''}}" name="actname" maxlength="20" type="text" class="form-control">
                                              <div id="actname_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="acclassType" class="col-lg-4 col-form-label">Account Class
                                             Type</label>
                                          <div class="col-lg-8">
                                             <input id="acclassType" value="{{$getsalary->ifsc??''}}" name="acclassType" maxlength="20" type="text"
                                                class="form-control">
                                                <div id="acclassType_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="acctype" class="col-lg-4 col-form-label">Account Type</label>
                                          <div class="col-lg-8">
                                             <input id="acctype" value="{{$getsalary->account_type??''}}"  name="acctype" type="text" maxlength="20" class="form-control">
                                             <div id="acctype_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="accno" class="col-lg-4 col-form-label">Account No.</label>
                                          <div class="col-lg-8">
                                             <input id="accno" value="{{$getsalary->accountnumber??''}}" name="accno" type="text" maxlength="20" class="form-control">
                                              <div id="accno_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                       <!--           <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="acctype" class="col-lg-4 col-form-label">Project
                                             Commission(%)</label>
                                          <div class="col-lg-8">
                                             <input id="procommison" value="{{$getsalary->   project_commission??''}}" type="text" maxlength="20" class="form-control">
                                             <div id="procommison_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div> -->
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class="float-right">
                                                <button id="saveSalary" class="btn btn-primary">Save</button>
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