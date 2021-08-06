@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                         @if(!empty($contactinfo))
                        <h3 class="page-title">Edit User</h3>
                        @else
                       <h3 class="page-title">Add User</h3>
                        @endif
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                            @if(!empty($contactinfo))
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
                                                <label for="empcode" class="col-lg-4">Email ID </label>
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
                              <button class="tablinks" onclick="openTab(event, 'addPersonalInfo')">Personal Info</button>
                              <button class="tablinks active" onclick="openTab(event, 'addcontact')">Contact Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addexperiance')">Experience</button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                      
                         
                     
                        
                           <div id="contactinfo" class="tabcontent active">
                              <h3>Contact Info</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="personalmail" class="col-lg-4 col-form-label">Personal
                                             Email <span class="text-danger p-l-5">*</span></label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <input type="email" value="{{$contactinfo->personalemail??''}}" id="emaildata" class="form-control" placeholder="xyz@gmail.com">
                                              
                                             </div>
                                               <div id="emaildata_error"></div>
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
                                          <label for="role" class="col-lg-4 col-form-label">Country</label>
                                          <div class="col-lg-8">
                                        <?php

                                       $Country = DB::table('main_countries')->where('isactive','=',1)->get();
                                             

                                           ?>
                                            
                                             <select class="form-control" id="country">
                                                <option value="">Select Country</option>
                                                @foreach($Country as $Country)
                                                <option value="{{$Country->id}}" @if(!empty($contactinfo))  @if($Country->id == $contactinfo->perm_country) selected @endif @endif >{{$Country->country}}</option>
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
                                      
                                        <?php

                                       $state = DB::table('alm_states');

                                              

                                            
                                               $state->where('country_id',$contactinfo->perm_country??101);

                                               

                                              $state = $state->get();

                                             
                                           ?>
                                            
                                             <select class="form-control" id="state">
                                                <option value="">Select State</option>

                                                 @foreach($state as $states)
                                                <option value="{{$states->id}}" @if(!empty($contactinfo))  @if($states->id == $contactinfo->perm_state) selected @endif @endif >{{$states->name}}</option>
                                                @endforeach
                                              
                                             </select>
                                            <div id="state_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                  <div class="col-md-6">
                                        <?php

                                       $alm_cities = DB::table('alm_cities');
                                        
                                          $alm_cities->where('state_id',$contactinfo->perm_state??36);

                                         

                                        $alm_cities =  $alm_cities->get();
                                             
                                           ?>
                                       <div class="form-group row">
                                          <label for="role" class="col-lg-4 col-form-label">City</label>
                                          <div class="col-lg-8">
                                      
                                             <select class="form-control" id="city">
                                                <option value="">Select City</option>

                                                 @foreach($alm_cities as $alm_citiess)
                                                <option value="{{$alm_citiess->id}}" @if(!empty($contactinfo))  @if($alm_citiess->id == $contactinfo->perm_city) selected @endif @endif >{{$alm_citiess->name}}</option>
                                                @endforeach
                                              
                                               
                                             </select>
                                             <div id="city_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Street" class="col-lg-4 col-form-label">Street</label>
                                          <div class="col-lg-8">
                                          <input id="p_Street" name="Street" value="{{$contactinfo->current_streetaddress??''}}"  maxlength="60" type="text" class="form-control">
                                           <div id="p_Street_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="postalcode" class="col-lg-4 col-form-label">Postal Code</label>
                                          <div class="col-lg-8">
                                             <input id="p_postalcode"  maxlength="10"  value="{{$contactinfo->perm_pincode??''}}" name="postalcode"  onkeypress="preventNonNumericalInput(event)" type="text"
                                                class="form-control">
                                                <div id="p_postalcode_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="filladdress" class="custom-control-input"
                                             id="customControlInline" onclick="filladdress()">
                                          <label class="custom-control-label" for="customControlInline">Check this box
                                             if current Address and Permanent Address are the same.</label>
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
                                          <div class="col-lg-8">
                                             <input id="c_Country" value="{{$contactinfo->current_country??''}}" name="Country" type="text" class="form-control">
                                          </div>
                                       </div>

                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="city" class="col-lg-4 col-form-label">City</label>
                                          <div class="col-lg-8">
                                             <input id="c_city" name="city" value="{{$contactinfo->current_city??''}}" type="text" class="form-control">
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="state" class="col-lg-4 col-form-label">State</label>
                                          <div class="col-lg-8">
                                             <input id="c_state"  value="{{$contactinfo-> current_state??''}}" name="state" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Street" class="col-lg-4 col-form-label">Street</label>
                                          <div class="col-lg-8">
                                             <input id="c_Street" value="{{$contactinfo-> current_streetaddress??''}}" maxlength="60" name="Street" type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="postalcode" value="{{$contactinfo-> current_pincode??''}}" class="col-lg-4 col-form-label">Postal Code</label>
                                          <div class="col-lg-8">
                                             <input id="c_postalcode"  maxlength="10"  value="{{$contactinfo-> current_pincode??''}}"  onkeypress="preventNonNumericalInput(event)" name="postalcode" type="text"
                                                class="form-control">
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
                                          <label for="name" class="col-lg-4 col-form-label">Name <span class="text-danger p-l-5">*</span></label>
                                          <div class="col-lg-8">
                                             <input id="name" name="name" value="{{$contactinfo-> emergency_name??''}}" type="text" class="form-control">
                                               <div id="name_error"></div>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="email" class="col-lg-4 col-form-label">Email <span class="text-danger p-l-5">*</span></label>
                                          <div class="col-lg-8">
                                             <input id="contact_email" value="{{$contactinfo-> emergency_email??''}}" name="email" type="text" class="form-control">
                                             <div id="contact_email_error"></div>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="contactno" class="col-lg-4 col-form-label">Contact No. <span class="text-danger p-l-5">*</span></label>
                                          <div class="col-lg-8">
                                             <input id="contactno" value="{{$contactinfo->   emergency_number??''}}" name="contactno" type="text" class="form-control">
                                               <div id="contactno_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="offadd" class="col-lg-4 col-form-label">Office Address <span class="text-danger p-l-5">*</span></label>
                                          <div class="col-lg-8">
                                             <input id="offadd" name="offadd" value="{{$contactinfo-> emergentcy_address??''}}"  readonly
                                                type="text" class="form-control">
                                                 <div id="offadd_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class=" float-right">
                                                <button id="SaveContact" class="btn btn-primary">Save</button>
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
         @stop