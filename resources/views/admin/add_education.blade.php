@extends('layouts.superadmin_layout')
   @section('content')
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                         @if(!empty($education))
                        <h3 class="page-title">Edit User</h3>
                        @else
                            <h3 class="page-title">Add User</h3>
                        @endif
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                            @if(!empty($education))
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
                              <button class="tablinks active" onclick="openTab(event, 'addeducation')">Education</button>
                              <button class="tablinks" onclick="openTab(event, 'addtraining')">Training &
                                 Certification</button>
                              <button class="tablinks" onclick="openTab(event, 'addvisa')">Visa & Immigration</button>
                              <button class="tablinks" onclick="openTab(event, 'addassetes')">Assets</button>
                           </div>
                       
                         
                     
                      
                    
                           <div id="education" class="tabcontent active">
                              <h3>Education</h3>
                              <div class="width-float">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="holidayType" class="col-lg-4 col-form-label">Education
                                             Lavel</label>

                                               <?php

                                            $educationlist = DB::table('main_education_list')->where('status','=',1)->get();
                                             
                                           ?>
                                          <div class="col-lg-8">
                                             <select id="educationDate" name="holidayType" class="form-control">
                                                <option value="">--Please Select--</option>
                                                @foreach($educationlist as  $educationlists)
                                                <option value="{{$educationlists->id}}">{{ $educationlists->name}}</option>
                                                @endforeach
                                             
                                             </select>
                                            <div id="education_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="hidden" id="edu_id">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Institution
                                             Name</label>
                                          <div class="col-lg-8">
                                             <input id="Institution" name="colortype" maxlength="60" type="text" class="form-control">
                                              <div id="Institution_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <?php

                                            $courselist = DB::table('main_course_list')->where('status','=',1)->get();
                                             
                                           ?>
                                       <div class="form-group row">
                                          <label for="colortype" class="col-lg-4 col-form-label">Course</label>
                                          <div class="col-lg-8">
                                             <select id="coursedate"  class="form-control">
                                                <option value="">--Please Select--</option>
                                                @foreach($courselist as  $courselists)
                                                <option value="{{ $courselists->id}}">{{ $courselists->name}}</option>
                                                @endforeach
                                             </select> 
                                             <div id="course_error"></div>

                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="from" class="col-lg-4 col-form-label">From Date</label>
                                          <div class="col-lg-8">
                                             <input id="fromdate" name="from" type="date" class="form-control">
                                               <div id="fromdate_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                               
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="to" class="col-lg-4 col-form-label">To Date</label>
                                          <div class="col-lg-8">
                                             <input id="todate" name="to" type="date" class="form-control">
                                             <div id="todate_error"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <button id="saveEduction" class="float-right btn btn-primary">Save</button>
                                       
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
                                                         <th>Education Level</th>
                                                         <th>Institution Name</th>
                                                         <th>Course</th>
                                                         <th>From Date</th>
                                                         <th>To Date</th>
                                                         <th>Action</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                     
                                                   @if(count($education) > 0)
                                                   @foreach($education as $k=> $educations)
                                                    @php($k++)
                                                      <tr>
                                                         <th scope="row">{{$k}}</th>
                                                         <td>{{$educations->eduname}}</td>
                                                         <td>{{$educations->institute_name}}</td>
                                                         <td>{{$educations->coursename}}</td>
                                                         <td>{{$educations->from_date}}</td>
                                                         <td>{{$educations->to_date}}</td>
                                                         <td>
                              <i class="mdi mdi-pen text-warning" onclick="get_edu_data('{{$educations->id}}')" title="Edit"></i>

                                               



                                                               <a href="javascript:void(0)" onclick="deledu('{{$educations->id}}')">
                                                            <i class="mdi mdi-delete text-danger" data-toggle="modal"
                                                               data-target="#deletemp" title="Delete"></i>
                                                            </a>
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
         <!-- edit education mpdal -->

         @stop

         @section('extra_js')

         <script type="text/javascript">



   $(document).on('click','#saveEduction',function(event){
            event.preventDefault();
              error = 1

             
             
             var userid = $('#crturl2').val();
              var education = $('#educationDate').val();
               var Institution = $('#Institution').val();
                var fromdate = $('#fromdate').val();
                 var todate = $('#todate').val();
                  var course = $('#coursedate').val();
                  var edu_id = $('#edu_id').val();
                  
                   var d1 = Date.parse(fromdate);
                  var d2 = Date.parse(todate);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      var error = 0;
                      return false;
                  }
                  

              
          if(education ==''){
         $('#education_error').text('Education is Required').attr('style','color:red');
         $('#education_error').show();
           error = 0;
              return false;
      }else{$('#education_error').hide();  error = 1;}

          if(Institution ==''){
         $('#Institution_error').text('Institution is Required').attr('style','color:red');
         $('#Institution_error').show();
           error = 0;
              return false;
        

      }else{$('#Institution_error').hide();  error = 1;}

        if(fromdate ==''){
         $('#fromdate_error').text('Form Date is Required').attr('style','color:red');
         $('#fromdate_error').show();
           error = 0;
              return false;
      }else{$('#fromdate_error').hide();  error = 1;}

        if(todate ==''){
         $('#todate_error').text('To Date is Required').attr('style','color:red');
         $('#todate_error').show();
           error = 0;
              return false;
      }else{$('#todate_error').hide();  error = 1;}

      //   if(course ==''){
      //    $('#course_error').text('Course is Required').attr('style','color:red');
      //    $('#course_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#course_error').hide();  error = 1;}


           if(error ==1){

             $("#saveEduction").attr( "disabled", "disabled" );


  

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/insertedu',
        type: "post",
        data: {"_token": _token,"education":education,"Institution":Institution,"fromdate":fromdate,"todate":todate,"course":course,"userid":userid,"edu_id":edu_id},
        dataType: 'JSON',
         
        success: function (data) {

         $("#saveEduction").removeAttr( "disabled", "disabled" );
        //console.log(data.city); // this is good
            
          if(data.status ==200){
             $('#loadingDiv').hide();
         
               $('#edu_id').val('');
             swal("Good job!", "Added Successfully", "success");

            location.reload();

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
          
        },
        error: function(xhr, status, error) {
           $("#saveEduction").removeAttr("disabled", "disabled");
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }


          });


            

 function get_edu_data(edu_id){

     var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/get_edu_data',
        type: "post",
        data: {"_token": _token,"edu_id":edu_id},
        dataType: 'JSON',
         
        success: function (data) {

            $("#educationDate > option").each(function() {
         if($(this).val() == data.edu.education_level){
            $('#educationDate').val(data.edu.education_level).attr("selected"); 
         }

      });

          $("#coursedate > option").each(function() {
         if($(this).val() == data.edu.course){
            $('#coursedate').val(data.edu.course).attr("selected"); 
         }

      });
               var Institution = $('#Institution').val(data.edu.institute_name);
                var fromdate = $('#fromdate').val(data.edu.from_date);
                 var todate = $('#todate').val(data.edu.to_date);
                 $('#saveEduction').text('Edit');
                 $('#edu_id').val(data.edu.id);
                  
 


      
        }
        });
}
         </script>
         @stop