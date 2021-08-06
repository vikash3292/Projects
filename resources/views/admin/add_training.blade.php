@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                         @if(!empty($training))
                        
                         <h3 class="page-title">Edit User</h3>
                        @else

                         <h3 class="page-title">Add User</h3>

                        @endif
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                            @if(!empty($training))
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
                             <button class="tablinks" onclick="openTab(event, 'add-employees')" id="defaultOpen">Official
                                 Info</button>
                              <!-- <button class="tablinks" onclick="openTab(event, 'leaves')">Leaves</button>
                              <button class="tablinks" onclick="openTab(event, 'holiday')">Holiday</button> -->
                              <button class="tablinks" onclick="openTab(event, 'addsalary')">Salary</button>
                              <button class="tablinks" onclick="openTab(event, 'addPersonalInfo')">Personal Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addcontact')">Contact Info</button>
                              <button class="tablinks" onclick="openTab(event, 'addexperiance')">Experience</button>
                              <button class="tablinks" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks active" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                       
                         
                     
                      
                    
                         <form method="post" id="training" enctype="multipart/form-data">
                           <div id="training" class="tabcontent active">
                              <h3>Training & Certification</h3>
                              <div class="width-float">
                                 <div class="row">
                                   
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="coursetype" class="col-lg-4 col-form-label">Course Type</label>
                                          <div class="col-lg-8">
                                             <select id="courseTypedata" class="form-control">
                                                <option value="">--Please Select--</option>
                                                <option value="Certification">Certification</option>
                                                <option value="Training">Training</option>
                                                
                                             </select>
                                             <div id="coursetype_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Course Level</label>
                                          <div class="col-lg-8">
                                             <select id="courselevel" class="form-control">
                                                <option value="">--Please Select--</option>
                                                <option value="AE">Basic</option>
                                                <option value="VI">Advance</option>
                                             </select>
                                              <div id="courselevel_error"></div>
                                          </div>
                                         
                                       </div>
                                    </div>

                                 </div>
                                 <?
                                $users = DB::table('main_users')->where('isactive',1)->get();
                                 ?>
                                 <input type="hidden" id="traning_id">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Training By</label>
                                          <div class="col-lg-8">
                                             <select class="form-control" id="trainingby">
                                                @foreach($users as $userss)
                                                <option>{{$userss->userfullname}}</option>
                                                @endforeach
                                                <option>Raghav</option>
                                             </select>
                                             <div id="trainingby_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">From Date</label>
                                          <div class="col-lg-8">
                                             <input id="fromdate" name="colortype" type="date" class="form-control">
                                             <div id="fromdate_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">To Date</label>
                                          <div class="col-lg-8">
                                             <input id="todate" name="colortype" type="date" class="form-control">
                                               <div id="todate_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Description</label>
                                          <div class="col-lg-8">
                                             <textarea id="descdata" class="form-control"></textarea>
                                             <div id="descdata_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Attachment</label>
                                          <div class="col-lg-8">
                                             <input  id="file" name="file" type="file">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <div class="col-lg-12">
                                             <button  id="saveTraining" class="float-right btn btn-primary">Save</button>
                                            

                                          </div>
                                          <div class="col-lg-12">
                                             <div class="table-responsive m-t-20">
                                                <table class="table mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>S.No</th>
                                                         <th>Course Type</th>
                                                         <th>Course Level</th>
                                                         <th>Training By</th>
                                                         <th>From Date</th>
                                                         <th>To Date</th>
                                                         <th>Description</th>
                                                         <th>Attachment</th>
                                                         <th>Action</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>

                                                     
                                                      @php($i =1)
                                                      @if(count($training) > 0)
                                                      @foreach($training as $k=> $trainings)
                                                      <tr>
                                                         <th scope="row">{{$i++}}</th>
                                                         <td>{{$trainings->coursetype}}</td>
                                                         <td>{{$trainings->courselevel}}</td>
                                                         <td>{{$trainings->trainingby}}</td>
                                                         <td>{{$trainings->fromdate}}</td>
                                                         <td>{{$trainings->todate}}</td>
                                                         <td class="text_ellipses">{{$trainings->descdata}}</td>
                                                         <td >

                                                            @if(!empty($trainings->attachfile))

                                                            <a href="{{URL::to('/public/')}}{{$trainings->attachfile??''}}" download>Download</a>

                                                            @else

                                                            @endif

                                                         </td>
                                                         <td>
                                                            <i class="mdi mdi-pen text-warning" onclick="get_training('{{$trainings->id}}')"" title="Edit"></i>

                                                                <a href="javascript:void(0)" onclick="deltraining('{{$trainings->id}}')">
                                                            <i class="mdi mdi-delete text-danger" data-toggle="modal"
                                                               data-target="#deletemp" title="Delete"></i></a>
                                                         </td>
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
                          
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         @stop


         @section('extra_js')

         <script type="text/javascript">


   $(document).on('click','#saveTraining',function(event){
            event.preventDefault();

          

             error = 1
             var userid = $('#crturl2').val();
              var courseType = $('#courseTypedata').val();
               var courselevel = $('#courselevel').val();
                var fromdate = $('#fromdate').val();
                 var todate = $('#todate').val();
                  var trainingby = $('#trainingby').val();
                   var descdata = $('#descdata').val();
                   var attach = $('#file').val();
                    var traning_id = $('#traning_id').val();



 formData  =  new FormData();
  var files = $('#file')[0].files[0];

formData.append('userid', userid);
formData.append('courseType', courseType);
formData.append('courselevel', courselevel);
formData.append('fromdate', fromdate);
formData.append('todate', todate);
formData.append('trainingby', trainingby);
formData.append('descdata', descdata);
formData.append('file', files);
formData.append('traning_id', traning_id);

        if(attach !=''){
              if($('#file')[0].files[0].size > 2000000) {
             alert("Please upload file less than 2MB. Thanks!!");
             $('#file')[0].files[0].val('');
             return false;
           }
        }
if(attach !=''){
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(attach)){
        alert("Please Upload JPG, GIF,PNG,PDF");
         $('#profile_error').show();
           error = 0;
        files.value = '';
        return false;
           }
         }
   

     var d1 = Date.parse(fromdate);
                var d2 = Date.parse(todate);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      return false;
                  }

                  var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = yyyy + '-' + mm + '-' + dd;

                  var d1 = Date.parse(today);
                  var d2 = Date.parse(fromdate);
                  if (d1 < d2) {
                      alert ("Please Select Valid Date");
                      return false;
                  }


      //     if(courseType ==''){
      //    $('#coursetype_error').text('Course Type is Required').attr('style','color:red');
      //    $('#coursetype_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#coursetype_error').hide();  error = 1;}


      //     if(courselevel ==''){
      //    $('#courselevel_error').text('Course Lavel is Required').attr('style','color:red');
      //    $('#courselevel_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#courselevel_error').hide();  error = 1;}


      //     if(fromdate ==''){
      //    $('#fromdate_error').text('Form Date is Required').attr('style','color:red');
      //    $('#fromdate_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#fromdate_error').hide();  error = 1;}


      //     if(todate ==''){
      //    $('#todate_error').text('To date is Required').attr('style','color:red');
      //    $('#todate_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#todate_error').hide();  error = 1;}


      //     if(trainingby ==''){
      //    $('#trainingby_error').text('Training is Required').attr('style','color:red');
      //    $('#trainingby_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#education_error').hide();  error = 1;}


      //     if(trainingby ==''){
      //    $('#trainingby_error').text('Training is Required').attr('style','color:red');
      //    $('#trainingby_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#education_error').hide();  error = 1;}

      //  if(descdata ==''){
      //    $('#descdata_error').text('Desc is Required').attr('style','color:red');
      //    $('#descdata_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#descdata_error').hide();  error = 1;}




   

      var token = "{{csrf_token()}}"; 
    
      $("#saveTraining").attr( "disabled", "disabled" );
   
      $.ajax({
      url: '/inserttraning',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){

        $("#saveTraining").removeAttr( "disabled", "disabled" );
               if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Added Successfully", "success");

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
       },
       error: function(xhr, status, error) {
         $("#saveTraining").removeAttr( "disabled", "disabled" );
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
    });




          });

  
            

    

 function get_training(tranig_id){

     var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/get_trainig_data',
        type: "post",
        data: {"_token": _token,"tranig_id":tranig_id},
        dataType: 'JSON',
         
        success: function (data) {

            $("#courseTypedata > option").each(function() {
         if($(this).val() == data.training.coursetype){
            $('#courseTypedata').val(data.training.coursetype).attr("selected"); 
         }

      });

           $("#courselevel > option").each(function() {
         if($(this).val() == data.training.courselevel){
            $('#courselevel').val(data.training.courselevel).attr("selected"); 
         }

      });

             $("#trainingby > option").each(function() {
         if($(this).val() == data.training.trainingby){
            $('#trainingby').val(data.training.trainingby).attr("selected"); 
         }

      });
                $('#descdata').val(data.training.descdata);
                 $('#fromdate').val(data.training.fromdate);
                  $('#todate').val(data.training.todate);
                 $('#saveTraining').text('Edit');
                 $('#traning_id').val(data.training.id);
                  
 


      
        }
        });
}


         </script>

         @stop