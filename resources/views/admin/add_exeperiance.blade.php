@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                         @if(!empty($experience))
                        <h3 class="page-title">Edit User</h3>
                        @else

                         <h3 class="page-title">Add User</h3>

                        @endif
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                             @if(!empty($experience))
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
                                          </div><div class="col-md-12 m-t-10">
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
                              <button class="tablinks" onclick="openTab(event, 'addcontact')">Contact Info</button>
                              <button class="tablinks active" onclick="openTab(event, 'addexperiance')">Experience</button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                   
                    
                  
                           <form method="post" id="exp">
                           <div id="experience" class="tabcontent active">
                              <h3>Experience</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="holidayType" class="col-lg-4 col-form-label">Company
                                             Name</label>
                                          <div class="col-lg-8">
                                             <input type="text" id="commpanyname" class="form-control" placeholder="">
                                             <div id="commpanyname_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="website" class="col-lg-4 col-form-label">Company
                                             Website</label>
                                          <div class="col-lg-8">
                                             <input id="website" name="website" type="text" class="form-control">
                                              <div id="website_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="from" class="col-lg-4 col-form-label">From Date</label>
                                          <div class="col-lg-8">
                                             <input id="fromdate" name="from" type="date" class="form-control">
                                               <div id="fromdate_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="to" class="col-lg-4 col-form-label">To Date</label>
                                          <div class="col-lg-8">
                                             <input id="todate" name="to" type="date" class="form-control">
                                              <div id="todate_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <input type="hidden" id="expid">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="Designation" class="col-lg-4 col-form-label">Designation</label>
                                          <div class="col-lg-8">
                                             <input id="Designation" name="Designation" type="text"
                                                class="form-control">
                                                 <div id="Designation_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <button id="SaveExp" class="btn btn-primary float-right">Save</button>
                                      
                                    </div>
                                 </div>
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
                                                         <th>Action</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>

                                                     

                                                
                                                   @if(count($experience) > 0)
                                                   @php($i = 1)
                                                   @foreach($experience as $k=> $experiences)
                                                   
                                                      <tr>
                                                         
                                                         <td scope="row">{{$i++}}</td>
                                                         <td>{{$experiences->comp_name}}</td>
                                                         <td>{{$experiences->comp_website}}</td>
                                                         <td>{{$experiences->designation}}</td>
                                                         <td>{{$experiences->from_date}}</td>
                                                         <td>{{$experiences->to_date}}</td>
                                                         <td>
                                                            <a href="javascript:void(0)" onclick="editexp('{{$experiences->id}}','{{$experiences->comp_name}}','{{$experiences->comp_website}}','{{$experiences->designation}}','{{$experiences->from_date}}','{{$experiences->to_date}}')">
                                                            <i class="mdi mdi-pen text-warning" data-toggle="modal"
                                                               data-target="#editemp" title="Edit"></i>


                                                            </a>
                                                               <a href="javascript:void(0)" onclick="delexp('{{$experiences->id}}')">
                                                            <i class="mdi mdi-delete text-danger" data-toggle="modal"
                                                               data-target="#deletemp" title="Delete"></i>
                                                            </a>
                                                         </td>
                                                      </tr>

                                                      @endforeach

                                                      @else


                                                      <tr> <td colspan="7">No Recoud Found</td>  </tr>

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