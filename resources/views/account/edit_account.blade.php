    @extends('layouts.superadmin_layout')
   @section('content')
   
               <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6 col-6">
                                <h4 class="page-title">Organization</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Edit Organization</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="float-right d-md-block">
                                    <div class="dropdown">
                                        <a href="javascript: history.go(-1)">
                                            <button
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                type="button">
                                                Back</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                                    <div class="row">
                   
                        <div class="col-12">
                                 <form id="addaccount" method="post">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after m-t-0 m-b-20"><span>Organization
                                                        Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Organization Owner<span style="color:red">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="lead_ownere" id="lead_ownere">
                                             <option value="">Select Option</option>
                                             @foreach($userlist as $userlists)
                                             <option value="{{$userlists->id}}" @if($editLead->owner == $userlists->id) selected @endif>{{$userlists->userfullname}}</option>
                                             @endforeach
                                          </select>
                                            <span id="lead_ownere_error"></span> 
                                             </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Rating </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="rating" id="rating">
                                                        <option value="">--None--</option>
                                                        <option @if($editLead->rating == 'Hot') selected @endif>Hot</option>
                                                        <option @if($editLead->rating == 'Warm') selected @endif>Warm</option>
                                                        <option @if($editLead->rating == 'Cold') selected @endif>Cold</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="prifix" class="col-lg-4 col-form-label">Organization
                                                    Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->company??''}}" name="account_name" id="account_name"> 
                                                    <span id="account_name_error"></span>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Phone</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->phone??''}}" maxlength="10" name="phone" id="phone"  onkeypress="preventNonNumericalInput(event)" maxlength="10"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Parent
                                                    Organization</label>
                                                <div class="col-lg-8 col-form-label">
                                                   <select class="form-control" name="parent_ac" id="parent_ac">
                                             <option value="">Select Option</option>
                                             @foreach($parent_ac as $parent_acs)
                                             <option value="{{$parent_acs->company}}" @if($editLead->parent_ac == $parent_acs->company) selected @endif>{{$parent_acs->company}}</option>
                                            
                                             @endforeach
                                              <option value="other">Other</option>
                                          </select> </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6 display-none" id="parent_name">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Parent
                                                    Organization Name</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" name="p_other_ac" class="form-control">
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Fax</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->fax??''}}" name="fax" id="fax"  onkeypress="preventNonNumericalInput(event)"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Organization
                                                    Number</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->ac_no??''}}" name="ac_no" id="ac_no" onkeypress="preventNonNumericalInput(event)"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Website</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->website??''}}" name="website" id="website"> 
                                                    <div id="website_error"></div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Status
                                                    </label>
                                                <div class="col-lg-8 col-form-label">
                                                   <select class="form-control" name="status" id="status">
                                             <option value="">--None--</option>
                                             <option value="1" @if($editLead->lead_status == 1) selected @endif>Open Non Contacted</option>
                                             <option value="2" @if($editLead->lead_status == 2) selected @endif>Working-Contacted</option>
                                             <option value="3" @if($editLead->lead_status == 3) selected @endif>Closed-Converted</option>
                                             <option value="4" @if($editLead->lead_status == 4) selected @endif>Closed-Not Converted</option>
                                          </select>
                                            </div>
                                        </div>
                                        </div>
                                        <?php
                                        $stage = DB::table('main_stage')->get();
                                        ?>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Stage
                                                    Symbol</label>
                                                <div class="col-lg-8 col-form-label">
                                                      <select class="form-control" name="stage" id="stage">
                                                     @foreach($stage as $stage)
                                             <option value="{{$stage->id}}" @if($editLead->stage == $stage->id) selected @endif>{{$stage->stage_name}}</option>
                                             @endforeach
                                                    </select>
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Type</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="ac_type" id="ac_type">
                                                        <option>--None--</option>
                                                        <option @if($editLead->ac_type == 'Prospect') selected @endif>Prospect</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Ownership</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="ownership" id="ownership">
                                                        <option>--None--</option>
                                                        <option @if($editLead->ownership == 'Public') selected @endif>Public</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Industry</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="industry" id="industry">
                                                        <option>--None--</option>
                                                        <option @if($editLead->industry == 'Agriculture') selected @endif>Agriculture</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Employees</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->no_of_emp??0}}"  name="emp" id="emp" onkeypress="preventNonNumericalInput(event)"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Annual
                                                    Revenue</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editLead->annual_revenue??0}}" name="ann_rev" id="ann_rev" onkeypress="preventNonNumericalInput(event)">
                                                </div>
                                            </div>
                                        </div>
                            
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after"><span>Address Information</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 div-right-b">
                                            <div class="col-sm-12">
                                                <h5>Billing Address</h5>
                                            </div>
                                            
                                            <input type="hidden" name="lead_id" id="lead_id" value="{{$lead_id}}">
                                            <div class="col-sm-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Billing
                                                        Street</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <textarea class="form-control" name="bill_street" value="{{$editbill->street??0}}" id="bill_street"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Billing
                                                        City</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editbill->city??0}}" name="bill_city" id="bill_city">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Billing
                                                        State/Province</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editbill->state??0}}" name="bill_state" id="bill_state">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Billing
                                                        Zip/Postal
                                                        Code</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editbill->zip??0}}" name="bill_zip" id="bill_zip" onkeypress="preventNonNumericalInput(event)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Billing
                                                        Country</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editbill->contry??0}}" name="bill_country" id="bill_country">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12">
                                                <h5>Other Address</h5>
                                            </div>
                                            <div class="col-sm-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Shipping
                                                        Street</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <textarea class="form-control" name="shipping_street" value="{{$editshipping->street??0}}" id="shipping_street"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Shipping
                                                        City</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editshipping->city??0}}" name="shipping_city" id="shipping_city">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Shipping
                                                        State/Province</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editshipping->state??0}}" name="shipping_state" id="shipping_state">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Shipping
                                                        Zip/Postal
                                                        Code</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editshipping->zip??0}}" name="shipping_zip" id="shipping_zip" onkeypress="preventNonNumericalInput(event)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Shipping
                                                        Country</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" value="{{$editshipping->contry??0}}" name="shipping_country" id="shipping_country">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after"><span>Additional
                                                        Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Customer Priority </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="cust_pri" id="cust_pri">
                                                        <option>--None--</option>
                                                        <option @if(!empty($editinfo)) @if($editinfo->cust_priority == 'High') selected @endif @endif>High</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">SLA
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="sla" id="sla">
                                                        <option>--None--</option>
                                                        <option @if(!empty($editinfo)) @if($editinfo->sla == 'Gold') selected @endif @endif>Gold</option>
                                                        <option @if(!empty($editinfo)) @if($editinfo->sla == 'Silver') selected @endif @endif>Silver</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    SLA Expiration Date </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="date" class="form-control" value="{{$editinfo->sla_date??''}}" name="sla_date" id="sla_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">SLA
                                                    Serial Number
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" value="{{$editinfo->sla_no??''}}" name="sla_serial" id="sla_serial" onkeypress="preventNonNumericalInput(event)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Number of Locations </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="number" class="form-control" value="{{$editinfo->no_of_location??''}}" name="no_location" id="no_location" onkeypress="preventNonNumericalInput(event)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Upsell
                                                    Opportunity
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="upsell" id="upsell">
                                                        <option>--None--</option>
                                                        <option @if(!empty($editinfo)) @if($editinfo->upsell_opportunity == 'Maybe') selected @endif @endif>Maybe</option>
                                                        <option @if(!empty($editinfo)) @if($editinfo->upsell_opportunity == 'Yes') selected @endif @endif>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Active </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="active" id="active">
                                                        <option value="">--None--</option>
                                                        <option value="2" @if(!empty($editinfo)) @if($editinfo->active == 1) selected @endif @endif>No</option>
                                                        <option value="1" @if(!empty($editinfo)) @if($editinfo->active == 2) selected @endif @endif>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after"><span>Description
                                                        Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Description </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <textarea class="form-control"  rows="3" name="desc" id="desc">{{$editinfo->long_desc??''}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center m-t-20">
                                            <button type="submit"  class="btn btn-primary">Edit</button>
                                           
                                             <button type="reset"  class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>

                                    <!-- end col -->

                                    <!-- end row -->

                                    <!-- container-fluid -->
                                </div>
                                <!-- content -->

                            </div>
                            </form>
                            <!-- ============================================================== -->
                            <!-- End Right content here -->
                            <!-- ============================================================== -->

                        </div>
                        </div>

         <!-- content -->
           @stop

           @section('extra_js')

         <script> 
         
                    $("form#addaccount").submit(function(e) {

 
            e.preventDefault();
            
           

          var account_name = $('#account_name').val();

            var lead_ownere = $('#lead_ownere').val();
            var website = $('#website').val();
            
           

         if(lead_ownere ==''){
         $('#lead_ownere_error').text('Account Owner is Required').attr('style','color:red');
         $('#lead_ownere_error').show();
          error = 0;
              return false;

      }else{$('#lead_ownere_error').hide();  error = 1;}

      
         if(account_name ==''){
         $('#account_name_error').text('Account is Required').attr('style','color:red');
         $('#account_name_error').show();
          error = 0;
              return false;

      }else{$('#account_name_error').hide();  error = 1;}
      
       if(checkurl(website) == false && website !=''){
          $('#website_error').text('Valid website').attr('style','color:red');
          $('#website_error').show();
            error = 0;
               return false;
       }else{$('#website_error').hide();  error = 1;}


       

   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/insert_account',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),

           beforeSend: function() {    
       
        $('#loadingDiv').show();
        },
    
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Added Successfully", "success");

            base_url = $('#base_url').val();
 
          var editurl =   base_url+'/account/';


   
         window.location = editurl;

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");
               location.reload();

          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        }
      });

       
           });
         

         
//          getLeadlog(userid,lead_id);
         
//          function getLeadlog(user_id,lead_id){
             
//       var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/get_lead_logs',
//         type: "post",
//         data: {"_token": _token,"user_id":user_id,"lead_id":lead_id},
//         dataType: 'JSON',
         
//         success: function (data) {
      
//           $(".lead_log tbody").html(data.lead_log);
    
          
//         }
//       });
             
//          }
         
//          function save_log(){
//           error = 1;  
//         var choose_date = $('#choose_date').val();
//         var commu_type = $('#commu_type').val();
//         var comment = $('#comment').val();
//         var next_date = $('#next_date').val();
//         var lead_log_id = $('#lead_log_id').val();
        
             
//          if(choose_date ==''){
//          $('#choose_date_error').text('Date is Required').attr('style','color:red');
//          $('#choose_date_error').show();
//           error = 0;
//               return false;

//       }else{$('#choose_date_error').hide();  error = 1;}
      
//       if(commu_type ==''){
//          $('#commu_type_error').text('Communication Type is Required').attr('style','color:red');
//          $('#commu_type_error').show();
//           error = 0;
//               return false;

//       }else{$('#commu_type_error').hide();  error = 1;}
      
//       if(comment ==''){
//          $('#comment_error').text('Comment is Required').attr('style','color:red');
//          $('#comment_error').show();
//           error = 0;
//               return false;

//       }else{$('#comment_error').hide();  error = 1;}
      
//       if(next_date ==''){
//          $('#next_date_error').text('Next Date is Required').attr('style','color:red');
//          $('#next_date_error').show();
//           error = 0;
//               return false;

//       }else{$('#next_date_error').hide();  error = 1;}
      
//       if(error == 1){
          
//   var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/save_lead_logs',
//         type: "post",
//         data: {"_token": _token,"choose_date":choose_date,"commu_type":commu_type,"comment":comment,"next_date":next_date,"lead_id" :lead_id,"lead_log_id":lead_log_id},
//         dataType: 'JSON',
         
//         success: function (data) {
//             if(data.status == 200){
//                 alertify.success(data.msg); 
//                 getLeadlog(userid,lead_id);
                
//             }else{
                
//                  alertify.success(data.msg); 
                
//             }
      
       
    
          
//         }
//       });
          
//       }
             
//          }
         
//          function delete_lead_log(thisval,lead_log_id){
             
             
//              var result = confirm("Want to delete?");
// if (result) {
//     //Logic to delete the item

//               var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/delete_lead_logs',
//         type: "post",
//         data: {"_token": _token,"lead_log_id":lead_log_id},
//         dataType: 'JSON',
         
//         success: function (data) {
            
//             if(data.status == 200){
//                  alertify.success(data.msg); 
//                  $(thisval).closest("tr").remove();
                
//             }else{
//                  alertify.success(data.msg); 
//             }
            
            
     
//         }
//       });
// }
             
//          }
         
//          function edit_lead_log(thisval,lead_log_id){
             
//      var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/edit_lead_logs',
//         type: "post",
//         data: {"_token": _token,"lead_log_id":lead_log_id},
//         dataType: 'JSON',
         
//         success: function (data) {
            
//         var choose_date = $('#choose_date').val(data.lead_detail.date);
//         var commu_type = $('#commu_type').val();
//         var comment = $('#comment').val(data.lead_detail.comment);
//         var next_date = $('#next_date').val(data.lead_detail.next_date);
//                         $('#lead_log_id').val(lead_log_id);
//                           $('.float-right').text('Edit');
                          
//                           $("#commu_type > option").each(function() {
//                               if(this.text == data.lead_detail.communication_type){
//                                  $('#commu_type').val(data.lead_detail.communication_type).attr("selected"); 
//                               }
                         
//                           });
                          
        
            
         
//         }
//       });
             
//          }
          $('select#parent_ac').on('change', function() {
  if($(this).val()=='other'){
    debugger
    $("#parent_name").css('display','block');
  }
  else{
      $("#parent_name").css('display','none');
  }
});
         </script>

           @stop