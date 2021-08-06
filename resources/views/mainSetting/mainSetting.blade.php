@extends('layouts.superadmin_layout')
@section('content')
<?php  //echo "<pre>"; print_r($classData); ?>
<!-- Content Wrapper. Contains page content -->

         <!-- Start content -->

            
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">

                @if(Session::has('message'))
                     <p class="alert alert-info">{{ Session::get('message') }}</p>
                   @endif
                  <div class="row align-items-center bredcrum-style m-b-20 p-10">
                     <div class="col-sm-6">
                        <h4 class="page-title">System Wide Settings</h4>
                     </div>
                  </div>
               </div>
               <form method="post" action="{{URL::to('/updatecompany')}}" enctype='multipart/form-data'>
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="txtFirstNameBilling" class="col-lg-4 col-form-label">Choose
                                       Theme</label>
                                    <div class="col-lg-8">
                                       <select class="form-control" id="themes" name="themes">
                                          <option>Select Theme</option>
                                          <option value="Light" @if($mainsetting->thems == 'Light') selected @endif >Light</option>
                                          <option value="Dark" @if($mainsetting->thems == 'Dark') selected @endif >Dark</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="txtFirstNameBilling" class="col-lg-4 col-form-label">Choose
                                       Currency</label>
                                    <div class="col-lg-8">
                                       <select class="form-control" id="currency" name="currency">
                                          <option>INR</option>
                                            <option>USD</option>
                                              <option>EUR</option>
                                          
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           {{ csrf_field() }}
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="lang" class="col-lg-4 col-form-label">Language</label>
                                    <div class="col-lg-8">
                                       <select class="form-control" value="{{$mainsetting->lang??''}}" id="lag" name="lag">
                                          <option>English</option>
                                         
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empcode" class="col-lg-4 col-form-label">Employee
                                       Code</label>
                                    <div class="col-lg-8">
                                       <input id="empcode" maxlength="20" name="empcode" value="{{$mainsetting->emp_code??''}}" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="compname" class="col-lg-4 col-form-label">Company
                                       Name</label>
                                    <div class="col-lg-8">
                                       <input id="compname" maxlength="60"  name="compname" value="{{$mainsetting->company_name??''}}" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="logo" class="col-lg-4 col-form-label">Company
                                       Logo</label>
                                    <div class="col-lg-8">
                                       <div class="form-group">
                                          <input type="file" id="companylogo" name="companylogo" class="filestyle" data-buttonname="btn-secondary">
                                          @if(!empty($mainsetting->company_logo))

                                          <img src="{{URL::to('/public/')}}{{$mainsetting->company_logo}}" width="100px">

                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="adminname" class="col-lg-4 col-form-label">Admin
                                       Name</label>
                                    <div class="col-lg-8">
                                       <input id="adminname" maxlength="60"  value="{{$mainsetting->admin_name??''}}" name="adminname" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                                    <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="adminname" maxlength="60"  class="col-lg-4 col-form-label">bussniss Unit
                                       </label>
                                    <div class="col-lg-8">
                                       <input id="bussnissunit" value="{{$mainsetting->bussines_unit??''}}" name="bussnissunit" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="city" class="col-lg-4 col-form-label">Address</label>
                                    <div class="col-lg-8">
                                       <textarea id="address" maxlength="500"   name="address" rows="4" class="form-control">{{$mainsetting->address??''}}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="city" class="col-lg-4 col-form-label">City</label>
                                    <div class="col-lg-8">
                                       <input id="city" maxlength="60"  name="city" value="{{$mainsetting->city??''}}" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="pincode" class="col-lg-4 col-form-label">Pin Code</label>
                                    <div class="col-lg-8">
                                       <input id="pincode"  maxlength="10"  onkeypress="preventNonNumericalInput(event)" name="pincode" value="{{$mainsetting->pin_code??''}}" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="txtleave" class="col-lg-4 col-form-label">Total
                                       Provisional
                                       Leaves</label>
                                    <div class="col-lg-8">
                                       <input id="txtleave" maxlength="10" value="{{$mainsetting->provinal_leave??''}}" onkeypress="preventNonNumericalInput(event)" name="txtleave" type="number" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="txtcasual" class="col-lg-4 col-form-label">Total Casual
                                       Leaves</label>
                                    <div class="col-lg-8">
                                       <input id="txtcasual" maxlength="10" value="{{$mainsetting->total_casual_leave??''}}" onkeypress="preventNonNumericalInput(event)" name="txtcasual" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group row">
                                    <label for="txtcasual" class="col-lg-12 col-form-label m-b-20">Working Hours</label>
                                    <div class="col-lg-12">
                                       <div class="work_hr m-b-20">
                                          <div class="select_day">
                                             <span id="s">S</span>
                                             <span id="m" class="active_day">M</span>
                                             <span id="t">T</span>
                                             <span id="w">W</span>
                                             <span id="th">T</span>
                                             <span id="f">F</span>
                                             <span id="sat">S</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="work_hr_time" id="sunday">
                                          <div class="day_name">
                                             <span>Sunday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" placeholder="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                      <li>6:00pm</li>
                                                      <li>7:00pm</li>
                                                      <li>8:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="work_hr_time" id="monday">
                                          <div class="day_name">
                                             <span>Monday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" value="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="work_hr_time" id="tuesday">
                                          <div class="day_name">
                                             <span>Tuesday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" value="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="work_hr_time" id="wednesday">
                                          <div class="day_name">
                                             <span>Wednesday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" value="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="work_hr_time" id="thursday">
                                          <div class="day_name">
                                             <span>Thursday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" value="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="work_hr_time" id="friday">
                                          <div class="day_name">
                                             <span>Friday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" value="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="work_hr_time" id="saturday">
                                          <div class="day_name">
                                             <span>Saturday</span>
                                          </div>
                                          <div class="time">
                                             <div class="time_from">
                                                <input type="text" value="9:00am">
                                                <div class="intime_dropdown">
                                                   <ul>
                                                      <li>10:00am</li>
                                                      <li>11:00am</li>
                                                      <li>12:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="to_text">
                                                <span>To</span>
                                             </div>
                                             <div class="time_to">
                                                <input type="text" value="5:00pm">
                                                <div class="outTime_dropdown">
                                                   <ul>
                                                      <li>4:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>1:00pm</li>
                                                      <li>2:00pm</li>
                                                      <li>3:00pm</li>
                                                      <li>4:00pm</li>
                                                      <li>5:00pm</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @if(PermissionHelper::frontendPermission('edit-wide-setting'))
                              <div class="col-sm-6">
                                 <button class="btn btn-primary float-right">Save</button>
                              </div>
                              @endif
                           </div>
                           <!-- end row -->
                        </div>
                     </div>
                  </div>
               </div>
             </form>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
<!-- /.content-wrapper -->				
@endsection