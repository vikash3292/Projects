    @extends('layouts.superadmin_layout')
   @section('content')
            
         <!-- Start content -->
                    <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Manual Attendance</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">
                                           Manual Attendance</a></li>
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
                                  
                                    <p class="green-text">Manual Attendance</p>
                                    <div class="row">
                                        
                                                   <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Employee <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="userid">
                                                        <option value="">Select</option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->userfullname}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div id="userid_error"></div>
                                                </div>
                                            </div>
                                        </div>
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
                                                        <option value="P">Present</option>
                                                          <option value="A">Absent</option>
                                                            <option value="HL">Half Leave</option> 
                                                            <option value="L">Leave</option>
                                                              <option value="H">Holiday</option>
                                                                <option value="FTS">Forgot to Swap</option>
                                                                <option value="LWP">Leave without Pay</option>
                                                                <option value="WFH">Work from Home</option>
                                                                <option value="OSD">Out Station Duties</option>
                                                                
                                                                
                                                    </select>
                                                     <div id="preposedStatus_error"></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                     
                                        <div class="col-md-4">
                                            <button id="addmanualattedance" class="btn btn-primary">Submit</button>
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


              $(document).on('click','#addmanualattedance',function(){
                error = 1;

                var userid = $('#userid').val();
                 var checkdate = $('#showcheckdate').val();

                  var preposedInTime = $('#preposedInTime').val();
                   var preposedOutTime = $('#preposedOutTime').val();
                    var preposedStatus = $('#preposedStatus').val();
                   
                    
                 

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
      

        if(preposedInTime ==''){
         $('#preposedInTime_error').text('Select Time is Required').attr('style','color:red');
         $('#preposedInTime_error').show();
           error = 0;
              return false;
      }else{$('#preposedInTime_error').hide();  error = 1;}

        if(preposedOutTime ==''){
         $('#preposedOutTime_error').text('Select Time is Required').attr('style','color:red');
         $('#preposedOutTime_error').show();
           error = 0;
              return false;
      }else{$('#preposedOutTime_error').hide();  error = 1;}

        if(preposedStatus ==''){
         $('#preposedStatus_error').text('Select Status is Required').attr('style','color:red');
         $('#preposedStatus_error').show();
           error = 0;
              return false;
      }else{$('#preposedStatus_error').hide();  error = 1;}

      


        if(error ==1){

          $('#loadingDiv').show();

    var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/manual_attendace',
        type: "post",
        data: {"_token": _token,"userid":userid,"checkdate":checkdate,"preposedInTime":preposedInTime,"preposedOutTime":preposedOutTime,"preposedStatus":preposedStatus},
        dataType: 'JSON',
         
        success: function (data) {
      

       // return false;
    
          if(data.status ==200){
             $('#loadingDiv').hide();

          
           swal("Good job!", data.msg, "success");
             location.reload();
        
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