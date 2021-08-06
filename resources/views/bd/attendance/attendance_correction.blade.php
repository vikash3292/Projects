@extends('layouts.superadmin_layout')
@section('content')
         
      <!-- Start content -->
                 <div class="content p-0">
             <div class="container-fluid">
                 <div class="page-title-box">
                     <div class="row align-items-center bredcrum-style">
                         <div class="col-sm-6">
                             <h4 class="page-title">Attendance Correction Form</h4>
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                 <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Attendance
                                         Correction Form</a></li>
                             </ol>
                         </div>
                     </div>
                 </div>
                 <!-- end row -->
                 <!-- end row -->
                 <div class="row">
                     <div class="col-12">
                         <div class="card m-t-20">
                             <div class="card-body correctionform">
                                <div class="row">
                                   <div class="col-sm-3  col-xs-12">
				        <div class="borderdiv">
					<h6 class="mt-0">Noon & Night and On Site
					   <span class="display-block font-12 font-blue font-400">Service Advance Proposal</span>
					</h6>
					<div class="row">
						  <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-12 col-form-label display-block">Employee Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <select class="form-control" name="ns_user" id="ns_user">
                                                         <option value="{{$users->id}}" selected="">{{$users->userfullname}}</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
	  <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-12 col-form-label display-block">From Date<span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <input type="date" id="ns_form_data" name="ns_form_data" class="form-control">
                                                     <span id="error_ns_form_data"></span>
                                                </div>
                                            </div>
                                        </div>
 <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-12 col-form-label display-block">To Date<span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <input type="date" id="ns_to_data" name="ns_to_data" class="form-control">
                                                    <span id="error_ns_to_data"></span>
                                                </div>
                                            </div>
                                        </div>
					<div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-12 col-form-label display-block">Shift<span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                     <select class="form-control" name="ns_status" id="ns_status">
                                                        <option value="">Select</option>
                                                       
							<option>Noon Shift</option>
                            <option>Night Shift</option>
                             <option>On Site</option>

							
                                                    </select>
                                                    <span id="error_ns_status"></span>
                                                </div>
                                            </div>
                                        </div>
					<div class="col-md-12 text-center">
						<button onclick="sendnsrequest()" class="btn btn-primary">Send Proposal</button>
					</div>
					</div>
				        </div>
                                   </div>
                                   <div class="col-sm-9 col-xs-12">
                                 <h6 class="mt-0">Current Attendance Data Correction</h6>
                                    <p class="green-text">EMPLOYEE CURRENT STATUS</p>
                                    <p id="error_msg"></p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Employee <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="userid">
                                                       
                                                        <option value="{{$users->id}}" selected="">{{$users->userfullname}}</option>
                                                        
                                                    </select>
                                                    <div id="userid_error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Select
                                                    Date <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" id="checkdate">
                                                     <div id="checkdate_error"></div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="checkstatus" class="btn btn-primary">Check Current
                                                Status</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">In
                                                    Time <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="time" id="inTime" readonly class="form-control">
                                                    <div id="inTime_error"></div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Out
                                                    Time <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="time" id="OutTime" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Present
                                                    Status <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="pstatus"  readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="green-text">CORRECTION FORM</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Preposed InTime
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="preposedInTime">
                                                        <option value="">HH:MM</option>
                                                        <?php
                                                        $time = strtotime('09:00');
                                                        $addtime = 0;
                                                        
                                                        for($i =0 ; $i < 40; $i++){
                                                            $addtime += 15;
                                                         
                                                            $endTime =  date("H:i",strtotime('+'.$addtime.' minutes',$time));
                                                        
                                                        ?>
                                                        
                                                        
                                                        <option>{{$endTime}}</option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div id="preposedInTime_error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Preposed OutTime
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="preposedOutTime">
                                                        <option value="">HH:MM</option>
                                                         <?php
                                                        $time = strtotime('09:00');
                                                        $addtime = 0;
                                                        
                                                        for($i =0 ; $i < 40; $i++){
                                                            $addtime += 15;
                                                         
                                                            $endTime =  date("H:i",strtotime('+'.$addtime.' minutes',$time));
                                                        
                                                        ?>
                                                        
                                                        
                                                        <option>{{$endTime}}</option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                     <div id="preposedOutTime_error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Preposed Status
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="preposedStatus">
                                                        <option value="">Status to be..</option>
                                                        <option value="CORR">Correction</option>
                                                    </select>
                                                     <div id="preposedStatus_error"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select Date
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" id="showcheckdate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Explanation
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" maxlength="500" id="reason"></textarea>
                                                     <div id="reason_error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="addCorrection" class="btn btn-primary">Submit</button>
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
         </div>
        @stop

        @section('extra_js')

        <script type="text/javascript">

         $(document).on('click','#checkstatus',function(){
             error = 1;
             var userid = $('#userid').val();
              var checkdate = $('#checkdate').val();

     if(userid ==''){
      $('#userid_error').text('Select User is Required').attr('style','color:red');
      $('#userid_error').show();
        error = 0;
           return false;
   }else{$('#userid_error').hide();  error = 1;}

    if(checkdate ==''){
      $('#checkdate_error').text('Select Date is Required').attr('style','color:red');
      $('#checkdate_error').show();
        error = 0;
           return false;
   }else{$('#checkdate_error').hide();  error = 1;}

   if(error ==1){

       $('#loadingDiv').show();

 var _token = "{{csrf_token()}}";

$.ajax({
     url: '/get_attendace',
     type: "post",
     data: {"_token": _token,"userid":userid,"checkdate":checkdate},
     dataType: 'JSON',
      
     success: function (data) {
     //console.log(data.attendace); // this is good

    // return false;
 
       if(data.status ==200){
          $('#loadingDiv').hide();

        

           $('#error_msg').hide();

          $('#inTime').val(data.attendace.intime);
           $('#OutTime').val(data.attendace.outtime);
            $('#pstatus').val(data.attendace.status);
             $('#showcheckdate').val(checkdate);
      
          
     
       }else if(data.status ==202){

           $('#loadingDiv').hide();
         swal("Good job!", "User alert Exist", "success");
         location.reload();

           }else if(data.status ==203){

           $('#loadingDiv').hide();
         swal("Good job!", "Successfully Updated", "success");


       }else{
        $('#loadingDiv').hide();
        $('#error_msg').html('No Recoud Found').attr('style','color:red');
           $('#error_msg').show();
            $('#inTime').val('');
           $('#OutTime').val('');
            $('#pstatus').val('');
             $('#showcheckdate').val('');

       }
       
     }
   });

   }



         });
  

  function sendnsrequest(){


               error = 1;

             var userid = $('#ns_user').val();
              var ns_form_data = $('#ns_form_data').val();
                var ns_to_data = $('#ns_to_data').val();
                 
                      var ns_status = $('#ns_status').val();

        if(ns_form_data ==''){
      $('#error_ns_form_data').text('Enter Form Date').attr('style','color:red');
      $('#error_ns_form_data').show();
        error = 0;
           return false;
   }else{$('#error_ns_form_data').hide();  error = 1;}

    if(ns_to_data ==''){
      $('#error_ns_to_data').text('Enter To Date').attr('style','color:red');
      $('#error_ns_to_data').show();
        error = 0;
           return false;
   }else{$('#error_ns_to_data').hide();  error = 1;}

    if(ns_status ==''){
      $('#error_ns_status').text('Select Status').attr('style','color:red');
      $('#error_ns_status').show();
        error = 0;
           return false;
   }else{$('#error_ns_status').hide();  error = 1;}

     if(error ==1){

       $('#loadingDiv').show();

 var _token = "{{csrf_token()}}";

$.ajax({
     url: '/ns_request',
     type: "post",
     data: {"_token": _token,"userid":userid,"ns_form_data":ns_form_data,"ns_to_data":ns_to_data,"ns_status":ns_status},
     dataType: 'JSON',
      
     success: function (data) {
   

    // return false;
 
       if(data.status ==200){
          $('#loadingDiv').hide();

       
        swal("Good job!", data.msg, "success");
          
     
       }else if(data.status ==202){

           $('#loadingDiv').hide();
         swal("Good job!", "User alert Exist", "success");
         location.reload();

           }else if(data.status ==203){

           $('#loadingDiv').hide();
         swal("Good job!", "Successfully Updated", "success");


       }else{

          $('#loadingDiv').hide();
         
          swal("Good job!", "You clicked the button!", "error");

       }
       
     }
   });

   }

  }

         

           $(document).on('click','#addCorrection',function(){
             error = 1;

             var userid = $('#userid').val();
              var checkdate = $('#checkdate').val();
                var inTime = $('#inTime').val();
                 var OutTime = $('#OutTime').val();
                      var pstatus = $('#pstatus').val();
                 
               var preposedInTime = $('#preposedInTime').val();
                var preposedOutTime = $('#preposedOutTime').val();
                 var preposedStatus = $('#preposedStatus').val();
                  var reason = $('#reason').val();
                   var inTime = $('#inTime').val();
              

     if(userid ==''){
      $('#userid_error').text('Not Found').attr('style','color:red');
      $('#userid_error').show();
        error = 0;
           return false;
   }else{$('#userid_error').hide();  error = 1;}

    if(checkdate ==''){
      $('#checkdate_error').text(' Date Not Found').attr('style','color:red');
      $('#checkdate_error').show();
        error = 0;
           return false;
   }else{$('#checkdate_error').hide();  error = 1;}
   
       if(inTime ==''){
      $('#inTime_error').text('InTime Not Found').attr('style','color:red');
      $('#inTime_error').show();
        error = 0;
           return false;
   }else{$('#inTime_error').hide();  error = 1;}

     if(preposedInTime ==''){
      $('#preposedInTime_error').text(' InTime Not Found').attr('style','color:red');
      $('#preposedInTime_error').show();
        error = 0;
           return false;
   }else{$('#preposedInTime_error').hide();  error = 1;}

     if(preposedOutTime ==''){
      $('#preposedOutTime_error').text(' OutTime is Required').attr('style','color:red');
      $('#preposedOutTime_error').show();
        error = 0;
           return false;
   }else{$('#preposedOutTime_error').hide();  error = 1;}

     if(preposedStatus ==''){
      $('#preposedStatus_error').text(' Status Not Found').attr('style','color:red');
      $('#preposedStatus_error').show();
        error = 0;
           return false;
   }else{$('#preposedStatus_error').hide();  error = 1;}

    if(reason ==''){
      $('#reason_error').text('Write Descripation is Required').attr('style','color:red');
      $('#reason_error').show();
        error = 0;
           return false;
   }else{$('#reason_error').hide();  error = 1;}


     if(error ==1){

       $('#loadingDiv').show();

 var _token = "{{csrf_token()}}";

$.ajax({
     url: '/update_attendace',
     type: "post",
     data: {"_token": _token,"userid":userid,"checkdate":checkdate,"preposedInTime":preposedInTime,"preposedOutTime":preposedOutTime,"preposedStatus":preposedStatus,"reason":reason,"inTime":inTime,"OutTime":OutTime,"pstatus":pstatus},
     dataType: 'JSON',
      
     success: function (data) {
   

    // return false;
 
       if(data.status ==200){
          $('#loadingDiv').hide();

       
        swal("Good job!", data.msg, "success");
          
     
       }else if(data.status ==202){

           $('#loadingDiv').hide();
         swal("Good job!", "User alert Exist", "success");
         location.reload();

           }else if(data.status ==203){

           $('#loadingDiv').hide();
         swal("Good job!", "Successfully Updated", "success");


       }else{

          $('#loadingDiv').hide();
         
          swal("Good job!", "You clicked the button!", "error");

       }
       
     }
   });

   }


         });
            
       

        </script>


        @stop	