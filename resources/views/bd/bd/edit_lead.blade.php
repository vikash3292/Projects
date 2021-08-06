    @extends('layouts.superadmin_layout')
   @section('content')
            <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Create Lead</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Edit Lead</a></li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <form method="post" id="formlead">
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="width-float">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h5 class="font-18 h5after m-t-0 m-b-20"><span>Lead Information</span></h5>
                                 </div>
                              </div>
                              {{ csrf_field() }}
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="empcode" class="col-lg-4 col-form-label">Lead Owner</label>
                                       <div class="col-lg-8">
                                          
                                          <select class="form-control" name="lead_ownere" id="lead_ownere">
                                             <option value="">Select Option</option>
                                             @foreach($userlist as $userlists)
                                             <option value="{{$userlists->id}}" @if($leadedit->owner == $userlists->id) selected @endif >{{$userlists->userfullname}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="empid" class="col-lg-4 col-form-label">Primary Phone No.</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" name="p_phone_no" value="{{$leadedit->phone??0}}" id="p_phone_no" onkeypress="preventNonNumericalInput(event)" maxlenght="10">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="prifix" class="col-lg-4 col-form-label">Alternet Phone No</label>
                                       <div class="col-lg-8">
                                       <input type="text" class="form-control"  name="a_phone_no" value="{{$leadedit->mobile??0}}" id="a_phone_no" onkeypress="preventNonNumericalInput(event)" maxlenght="10">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="firstname" class="col-lg-4 col-form-label">First Name <span
                                             class="text-danger"> *</span></label>
                                       <div class="col-lg-2 p-r-0">
                                          <select class="form-control" name="prefix" id="prefix">
                                             <option @if($leadedit->prefix == 'Miss') selected @endif>Miss</option>
                                             <option @if($leadedit->prefix == 'Mr.') selected @endif >Mr.</option>
                                             <option @if($leadedit->prefix == 'Mrs.') selected @endif>Mrs.</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-6">
                                          <input type="text" class="form-control" name="f_name" value="{{$leadedit->fname??''}}" id="f_name">
                                          <span id="f_name_error" style="color:red"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="logo" class="col-lg-4 col-form-label">Last Name <span
                                             class="text-danger"> *</span></label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" name="l_name" value="{{$leadedit->lname??''}}" id="l_name">
                                           <span id="l_name_error" style="color:red"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="email" class="col-lg-4 col-form-label">Account Name <span
                                             class="text-danger"> *</span></label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" value="{{$leadedit->company??''}}" name="ac_name" id="ac_name">
                                          <span id="ac_name_error" style="color:red"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="cid" class="col-lg-4 col-form-label">Fax</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" name="fax" value="{{$leadedit->fax??''}}" id="fax" onkeypress="preventNonNumericalInput(event)">
                                       </div>
                                    </div>
                                 </div>
                    
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Email</label>
                                       <div class="col-lg-8">
                                          <input type="email" class="form-control" name="email" value="{{$leadedit->email??''}}" id="email">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Lead Source </label>
                                       <div class="col-lg-8">
                                          <select class="form-control" name="lead_source" id="lead_source">
                                             <option @if($leadedit->sourse == 'Self') selected @endif>Self</option>
                                             <option @if($leadedit->sourse == 'MD') selected @endif>MD</option>
                                             <option @if($leadedit->sourse == 'BA') selected @endif>BA</option>
                                             <option @if($leadedit->sourse == 'Tenders') selected @endif>Tenders</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Website</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" value="{{$leadedit->website??''}}" name="website" id="website">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Industry</label>
                                       <div class="col-lg-8">
                                         <select class="form-control" name="industry" id="industry">
                                             <option value="">--None--</option>
                                             <option value="1" @if($leadedit->industry == 'Open Non Contacted') selected @endif>Open Non Contacted</option>
                                             <option value="2" @if($leadedit->industry == 'Working-Contacted') selected @endif>Working-Contacted</option>
                                             <option value="3" @if($leadedit->industry == 'Closed-Converted') selected @endif>Closed-Converted</option>
                                             <option value="4" @if($leadedit->industry == 'Closed-Not Converted') selected @endif>Closed-Not Converted</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Lead Status <span
                                             class="text-danger"> *</span></label>
                                       <div class="col-lg-8">
                                          <select class="form-control" name="lead_status" id="lead_status">
                                             <option value="">--None--</option>
                                             <option value="1" @if($leadedit->industry == 1) selected @endif>Open Non Contacted</option>
                                             <option value="2" @if($leadedit->industry == 2) selected @endif>Working-Contacted</option>
                                             <option value="3" @if($leadedit->industry == 3) selected @endif> Closed-Converted</option>
                                             <option value="4" @if($leadedit->industry == 4) selected @endif>Closed-Not Converted</option>
                                          </select>
                                          <span id="lead_status_error" style="color:red"><span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Annual Revenue</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" value="{{$leadedit->annual_revenue??''}}" name="annual_revenue" id="annual_revenue" onkeypress="preventNonNumericalInput(event)">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Rating</label>
                                       <div class="col-lg-8">
                                             <select class="form-control" name="rating" id="rating">
                                                        <option>--None--</option>
                                                        <option @if($leadedit->industry == 'Hot') selected @endif>Hot</option>
                                                        <option @if($leadedit->industry == 'Warm') selected @endif>Warm</option>
                                                        <option @if($leadedit->industry == 'Cold') selected @endif>Cold</option>
                                                    </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">No of Employees</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" value="{{$leadedit->no_of_emp??''}}" name="no_of_emp" id="no_of_emp" onkeypress="preventNonNumericalInput(event)">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Project Type </label>
                                       <div class="col-lg-8">
                                          <select class="form-control" name="project_type" id="project_type">
                                             <option>--None--</option>
                                             <option @if($leadedit->product_type == 'Open Non Contacted') selected @endif>Open Non Contacted</option>
                                             <option @if($leadedit->product_type == 'Working-Contacted') selected @endif>Working-Contacted</option>
                                             <option @if($leadedit->product_type == 'Closed-Converted') selected @endif>Closed-Converted</option>
                                             <option @if($leadedit->product_type == 'Closed-Not Converted') selected @endif>Closed-Not Converted</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                 
                          
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h5 class="font-18 h5after"><span>Address Information</span></h5>
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
                                            
                                             <select class="form-control" id="country" name="country">
                                                <option value="">Select Country</option>
                                                @foreach($Country as $Country)
                                                <option value="{{$Country->id}}" @if(!empty($contactinfo))  @if($Country->id == $leadedit->country) selected @endif @endif >{{$Country->country}}</option>
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

                                       $state = DB::table('alm_states')->get();

                                             
                                           ?>
                                            
                                             <select class="form-control" id="state" name="state">
                                                <option value="">Select State</option>

                                                 @foreach($state as $states)
                                                <option value="{{$states->id}}" @if(!empty($contactinfo))  @if($states->id == $leadedit->state) selected @endif @endif >{{$states->name}}</option>
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

                                       $alm_cities = DB::table('alm_cities')->get();
                                             
                                           ?>
                                       <div class="form-group row">
                                          <label for="role" class="col-lg-4 col-form-label">City</label>
                                          <div class="col-lg-8">
                                      
                                             <select class="form-control" id="city" name="city">
                                                <option value="">Select City</option>

                                                 @foreach($alm_cities as $alm_citiess)
                                                <option value="{{$alm_citiess->id}}" @if(!empty($contactinfo))  @if($alm_citiess->id == $leadedit->city) selected @endif @endif >{{$alm_citiess->name}}</option>
                                                @endforeach
                                              
                                               
                                             </select>
                                             <div id="city_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Street</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" value="{{$leadedit->street??''}}" name="street" id="street">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label for="role" class="col-lg-4 col-form-label">Zip Code</label>
                                       <div class="col-lg-8">
                                          <input type="text" class="form-control" value="{{$leadedit->zip??''}}" name="zip" id="zip">
                                       </div>
                                    </div>
                                 </div>

                                <input type="hidden" name="lead_id" value="{{$lead_id}}">
                              </div>
                              <div class="row">
                                 <div class="col-md-12 text-center">
                                    <button type="button" onClick='submitDetailsForm()' class="btn btn-primary">Save</button>
                                   <button type="reset" class="btn btn-primary">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               </form>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
           @stop

           @section('extra_js')

<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
        var error = 1;
       var f_name = $('#f_name').val();
        var l_name = $('#l_name').val();
         var ac_name = $('#ac_name').val();
          var lead_status = $('#lead_status').val();
         
         if(f_name ==''){
          $('#f_name_error').text('First Name is Required').attr('style','color:red');
          $('#f_name_error').show();
            error = 0;
               return false;
       }else{$('#f_name_error').hide();  error = 1;}
       
            if(l_name ==''){
          $('#l_name_error').text('Last Name is Required').attr('style','color:red');
          $('#l_name_error').show();
            error = 0;
               return false;
       }else{$('#l_name_error').hide();  error = 1;}
       
         if(ac_name ==''){
          $('#ac_name_error').text('Account Name is Required').attr('style','color:red');
          $('#l_name_error').show();
            error = 0;
               return false;
       }else{$('#ac_name_error').hide();  error = 1;}
       
        if(lead_status ==''){
          $('#lead_status_error').text('Status is Required').attr('style','color:red');
          $('#lead_status_error').show();
            error = 0;
               return false;
       }else{$('#lead_status_error').hide();  error = 1;}
       
        if(error ==1){
            $("#formlead").submit();
        }
       
    }
</script>

           @stop