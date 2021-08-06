    @extends('layouts.superadmin_layout')
   @section('content')
   
   
    <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Add Opportunity</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Add
                                            Opportunity</a>
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

                    <form method="post" id="opp_form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">

                               
                                    <div class="row">
                                   
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Opportunity Owner
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                <input type="text" placeholder="{{Auth::guard('main_users')->user()->userfullname}}" disabled
                                                        class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Amount <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="opp_amount"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="prifix" class="col-lg-4 col-form-label">Expected Revenue
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="opp_exp_revenue"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Opportunity
                                                    Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control"  name="opp_name"> </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Organization
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    
                                    <?php 
                                                
                                                $getAccount = DB::table('main_lead_list')->where('owner',$userid)->where('lead_status',5)->get();
                                                ?>

                                                <select class="form-control" name="ac_name">

                                                                        @foreach($getAccount as $getAccounts)
                                                                           
                                                                           <option value="{{$getAccounts->id}}">{{$getAccounts->company}}</option>

                                                                           @endforeach
                                                                          
                                                                       </select> </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="logo" class="col-lg-4 col-form-label">Close Date<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="date" class="form-control"  name="opp_close_date"> </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="email" class="col-lg-4 col-form-label">Product Interest
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="opp_product_inst">
                                                        <option>EIA</option>
                                                        <option>CTE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="cid" class="col-lg-4 col-form-label">Organization
                                                    Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="opp_org_name"> </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="mode" class="col-lg-4 col-form-label">Created Time</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">Last Modified
                                                    By</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">Last Modified
                                                    Date</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">Last Modified
                                                    Time</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                        </div> -->

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <h5 class="font-18 h5after"><span>Address Information</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">Country<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                               
    
     
      <select class="form-control" id="country" name="country">
         <option value="">Select Country</option>
         @foreach($Country as $Country)
         <option value="{{$Country->id}}" >{{$Country->country}}</option>
         @endforeach
        
      </select>
      <div id="country_error"></div> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">State<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                               
     
      <select class="form-control" id="state" name="state">
         <option value="">Select State</option>

       
      </select>
     <div id="state_error"></div> </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">City<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                               
                                                <select class="form-control" id="city" name="city">
                                                <option value="">Select City</option>

                                               
                                              
                                               
                                             </select>
                                             <div id="city_error"></div>
                                                    
                                                     </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">Street<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="opp_street"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="role" class="col-lg-4 col-form-label">Zip Code<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" class="form-control" name="opp_zip"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            </form>
   
   @stop


   @section('extra_js')

<script language="javascript" type="text/javascript">


$(document).ready(function() {
    
   
    
  $("#opp_form").validate({
    rules: {
      opp_amount : {
        required: true,
        number: true,
       
      },
      opp_exp_revenue: {
        required: true,
        number: true,
        
      },
        opp_name: {
        required: true,
        minlength: 3
        
      },
          ac_name: {
        required: true,
       
        
      },
          opp_close_date: {
        required: true,
        
        
      },
          opp_product_inst: {
        required: true,
        
        
      },
      country: {
        required: true,
        
        
      },
      state: {
        required: true,
        
        
      },
      city: {
        required: true,
        
        
      },
      opp_street: {
        required: true,
        minlength: 10
        
        
      },
      opp_zip :{
        required: true,
        minlength: 6,
        maxlength: 6,
        number: true,
        
        
        
      },
      email: {
        required: true,
        email: true
      },
      weight: {
        required: {
          depends: function(elem) {
            return $("#age").val() > 50
          }
        },
        number: true,
        min: 0
      }
    },
    messages : {
           opp_name: {
        minlength: "Please enter your Min 3 Charactor",
       
      },
      
           opp_street: {
        minlength: "Please enter your Min 10 Charactor",
       
      },
        
     
      age: {
        required: "Please enter your age",
        number: "Please enter your age as a numerical value",
        min: "You must be at least 18 years old"
      },
      email: {
        email: "The email should be in the format: abc@domain.tld"
      },
      weight: {
        required: "People with age over 50 have to enter their weight",
        number: "Please enter your weight as a numerical value"
      }
    },
    
submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#loadingDiv').show();
      $.ajax({
        url: "{{URL::to('insert-opp')}}" ,
        type: "POST",
        data: $('#opp_form').serialize(),
        success: function( data ) {
                     if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Added Successfully", "success");

            base_url = $('#base_url').val();
 
          var editurl =   base_url+'/opportunity/';


   
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
    }
 
  });
});

//                     $("form#opp_form").submit(function(e) {

 
//             e.preventDefault();
            
           

//     //       var last_name = $('#last_name').val();
//     //        var first_name = $('#first_name').val();
//     //         var mobile = $('#mobile').val();
      
//     //      if(first_name ==''){
//     //      $('#first_name_error').text('First Name is Required').attr('style','color:red');
//     //      $('#first_name_error').show();
//     //       error = 0;
//     //           return false;

//     //   }else{$('#first_name_error').hide();  error = 1;}
      
//     //   if(last_name ==''){
//     //      $('#last_name_error').text('Last Name is Required').attr('style','color:red');
//     //      $('#last_name_error').show();
//     //       error = 0;
//     //           return false;

//     //   }else{$('#last_name_error').hide();  error = 1;}
      
//     //   if(mobile ==''){
//     //      $('#mobile_error').text('Mobile is Required').attr('style','color:red');
//     //      $('#mobile_error').show();
//     //       error = 0;
//     //           return false;

//     //   }else{$('#mobile_error').hide();  error = 1;}

      

//   var token = "{{csrf_token()}}"; 


//   $.ajax({
//         url: '/insert-opp',
//         headers: {'X-CSRF-TOKEN': token}, 
//         type: "post",
//         data:$(this).serialize(),

//           beforeSend: function() {    
       
//         $('#loadingDiv').show();
//         },
    
//         success: function (data) {
//         //console.log(data.city); // this is good
    
//           if(data.status ==200){
//              $('#loadingDiv').hide();
         
             
//              swal("Good job!", "Added Successfully", "success");

//             base_url = $('#base_url').val();
 
//           var editurl =   base_url+'/opportunity/';


   
//          window.location = editurl;

//           }else if(data.status ==202){

//               $('#loadingDiv').hide();
//             swal("Good job!", "User alert Exist", "success");
//             location.reload();

//               }else if(data.status ==203){

//               $('#loadingDiv').hide();
//             swal("Good job!", "Successfully Updated", "success");
//               location.reload();

//           }else{

//              $('#loadingDiv').hide();
            
//              swal("Good job!", "You clicked the button!", "error");

//           }
          
//         }
//       });

       
//           });

           </script>

           @stop