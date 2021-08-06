

@extends('layouts.superadmin_layout')
   @section('content')



         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6 col-6">



                    @if(!empty($assest))

                          <h3 class="page-title">Edit User</h3>


                        @else
                            <h3 class="page-title">Add User</h3>

                        @endif

                      
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                    @if(!empty($assest))
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
                              <button class="tablinks" onclick="openTab(event, 'addPersonalInfo')">Personal Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addcontact')">Contact Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addexperiance')">Experience</button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks active" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                          <form method="post" id="visa">
                           <div id="assets" class="tabcontent">
                              <h3>Assets</h3>
                              <div class="width-float">
                                <!--  <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Asset Name</label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <input id="assestname" maxlength="60" type="text" class="form-control" placeholder="">
                                             
                                             </div>
                                                <div id="assestname_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="holidayType" class="col-lg-4 col-form-label">Serial Number</label>
                                          <div class="col-lg-8">
                                             <input id="serialno" maxlength="20" type="text" class="form-control" placeholder="">
                                             <div id="serialno_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <input type="hidden" id="edit_asset">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Description</label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <textarea id="descdata" maxlength="500" class="form-control" rows="3"></textarea>
                                                 
                                             </div>
                                              <div id="descdata_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div> -->
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                         <!--  <div class="col-lg-12">
                                             <button id="saveAssest" class="float-right btn btn-primary">Save</button>
                                            
                                          </div> -->
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Asset Name</th>
                                                         <th>Serial Number</th>
                                                       <!--    <th>Desc</th>
                                                         <th>Action</th> -->
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @php($i = 1)

                                                      @if(count($assest) > 0)
                                                      @foreach($assest as $k=>$assests)
                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>{{$assests->name}}</td>
                                                         <td>{{$assests->number}}</td>
                                                        <!--   <td class="text_ellipses">{{$assests->descdata}}</td>
                                                           <td>
                                                            <i class="mdi mdi-pen text-warning" data-toggle="modal"
                                                               data-target="#editemp" onclick="editasset('{{$assests->id}}','{{$assests->name}}','{{$assests->number}}','{{$assests->descdata}}')"  title="Edit"></i>

                                                                <a href="javascript:void(0)" onclick="delassest('{{$assests->id}}','{{$assests->number}}','')">
                                                            <i class="mdi mdi-delete text-danger" data-toggle="modal"
                                                               data-target="#deletemp" title="Delete"></i></a>
                                                         </td> -->
                                                      </tr>
                                                      @endforeach
                                                       @else


                                                      <tr> <td colspan="7">No Record Found</td>  </tr>

                                                      @endif
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <div class=" float-right">
                                                <button class="btn btn-primary">Previous</button>
                                                <button class="btn btn-primary">Next</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div> -->
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