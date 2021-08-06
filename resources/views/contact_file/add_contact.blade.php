    @extends('layouts.superadmin_layout')
   @section('content')
                        <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Add Contact</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Add Contact</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript: history.go(-1)" class="btn btn-primary float-right">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        
                        
                        <div class="col-12">
                            <form id="addcontact" method="post">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after m-t-0 m-b-20"><span>Contact
                                                        Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Contact Owner <span class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" placeholder="{{Auth::guard('main_users')->user()->userfullname}}" disabled
                                                        class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Phone <span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" maxlength="10" name="phone" id="phone"  onkeypress="preventNonNumericalInput(event)"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <fieldset class="col-md-12">
                                                <legend>Name</legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group row m-0">
                                                                    <label for="role"
                                                                        class="col-lg-5 col-form-label">Salutation</label>
                                                                    <div class="col-lg-7 col-form-label">
                                                                        <select class="form-control" name="salutation">
                                                                           
                                                                            <option>Mr.</option>
                                                                            <option>Ms.</option>
                                                                            <option>Mrs.</option>
                                                                            <option>Dr.</option>
                                                                            <option>Prof.</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row m-0">
                                                                    <label for="role"
                                                                        class="col-lg-5 col-form-label">First
                                                                        Name<span class="text-danger">*</span></label>
                                                                    <div class="col-lg-7 col-form-label">
                                                                        <input type="text" class="form-control" name="first_name" id="first_name">
                                                                        <span id="first_name_error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row m-0">
                                                                    <label for="role"
                                                                        class="col-lg-5 col-form-label">Last
                                                                        Name<span class="text-danger">*</span></label>
                                                                    <div class="col-lg-7 col-form-label">
                                                                        <input type="text" class="form-control" name="last_name" id="last_name">
                                                                         <span id="last_name_error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="prifix" class="col-lg-4 col-form-label">Account Name<span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">

                                                <?php 
                                                
                                                $getAccount = DB::table('main_lead_list')->where('owner',$userid)->where('lead_status',5)->get();
                                                ?>

                                                <select class="form-control" name="ac_name" id="ac_name">
                                                    <option value=""> Select Option </option>

                                                                        @foreach($getAccount as $getAccounts)
                                                                           
                                                                           <option value="{{$getAccounts->id}}">{{$getAccounts->company}}</option>

                                                                           @endforeach
                                                                          
                                                                       </select>
                                                                       <div id="ac_name_error"></div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Mobile <span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" maxlength="10" name="mobile" id="mobile" onkeypress="preventNonNumericalInput(event)">
                                                     <span id="mobile_error"></span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Title</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="title" id="title"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Other Phone</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="other_phone" id="other_phone"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Department</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="deportment" id="deportment"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Fax</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="fax" id="fax"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Date of Birth</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="date" class="form-control" name="dob" id="dob">
                                                    <div id="dob_error"></div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Email</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="email" id="emaildata"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Reports To</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="report_to" id="report_to"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Assistant</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="assistant" id="assistant"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Lead Source</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="lead_source" id="lead_source"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Asst. Phone</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="asst_pohone" id="asst_pohone"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-2 col-form-label">Description</label>
                                                <div class="col-lg-10 col-form-label">
                                                    <textarea rows="3" class="form-control" name="desc" id="desc"></textarea> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after"><span>Address Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 div-right-b">
                                            <div class="col-sm-12">
                                                <h5>Mailing Address</h5>
                                            </div>
                                            <div class="col-sm-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Mailing
                                                        Street</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <textarea class="form-control" name="billing_street" id="billing_street"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Mailing
                                                        City</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="billing_city" id="billing_city">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Mailing
                                                        State/Province</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="billing_state" id="billing_state">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Mailing Zip/Postal
                                                        Code</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="billing_zip" id="billing_zip">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Mailing
                                                        Country</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="billing_country" id="billing_country">
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
                                                    <label for="logo" class="col-lg-4 col-form-label">Other
                                                        Street</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <textarea class="form-control" name="shipping_country" id="shipping_country"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Other
                                                        City</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" name="shipping_city" id="shipping_city" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Other
                                                        State/Province</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="shipping_state" id="shipping_state">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Other Zip/Postal
                                                        Code</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="shipping_zip" id="shipping_zip">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-0">
                                                <div class="form-group row m-0">
                                                    <label for="logo" class="col-lg-4 col-form-label">Other
                                                        Country</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <input type="text" class="form-control" name="shipping_contry" id="shipping_contry">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after"><span>Additional Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Languages </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="lang" id="lang"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Level </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="level" id="level">
                                                        <option>--None--</option>
                                                        <option>Secondary</option>
                                                        <option>Tertiary</option>
                                                        <option>Primary</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center m-t-20">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                           
                                            <button type="reset"   class="btn btn-primary">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                              </form>
                        </div>
                      
                        <!-- container-fluid -->
                    </div>
           @stop

           @section('extra_js')

<script language="javascript" type="text/javascript">

                    $("form#addcontact").submit(function(e) {

 
            e.preventDefault();
            
           

          var last_name = $('#last_name').val();
           var first_name = $('#first_name').val();
            var mobile = $('#mobile').val();
             var dob = $('#dob').val();
              var ac_name = $('#ac_name').val();
             
             
      
         if(first_name ==''){
         $('#first_name_error').text('First Name is Required').attr('style','color:red');
         $('#first_name_error').show();
          error = 0;
              return false;

      }else{$('#first_name_error').hide();  error = 1;}
      
      if(last_name ==''){
         $('#last_name_error').text('Last Name is Required').attr('style','color:red');
         $('#last_name_error').show();
          error = 0;
              return false;

      }else{$('#last_name_error').hide();  error = 1;}
      
      
      if(ac_name ==''){
         $('#ac_name_error').text('Account is Required').attr('style','color:red');
         $('#ac_name_error').show();
          error = 0;
              return false;

      }else{$('#ac_name_error').hide();  error = 1;}
      
      if(mobile ==''){
         $('#mobile_error').text('Mobile is Required').attr('style','color:red');
         $('#mobile_error').show();
          error = 0;
              return false;

      }else{$('#mobile_error').hide();  error = 1;}
      
      if(dob !='' && today(dob) == false){
         $('#dob_error').text('Valid  DOB').attr('style','color:red');
         $('#dob_error').show();
          error = 0;
              return false;

      }else{$('#dob_error').hide();  error = 1;}

      

   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/insert-contact',
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
 
          var editurl =   base_url+'/contact/';


   
         window.location = editurl;

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "success");
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

</script>

           @stop