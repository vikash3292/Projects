    @extends('layouts.superadmin_layout')
   @section('content')
                         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6 col-6">
                        <h3 class="page-title">Contact View</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Contact View</a></li>
                        </ol>
                     </div>
                     <div class="col-sm-6 col-6">
                        <div class="float-right d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('edit-contact')}}/{{$viewcontact->id}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit Contact</button>
                              </a>
                               <a href="#">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Back</button>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                    <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="width-float">
                             <div class="row">
                              <div class="col-sm-6">
                                 <h5 class="m-0">
                                    <img src="assets/images/profile.png" height="100">
                                    <span title="Contact" data-toggle="tooltip">{{$viewcontact->salutation}} {{$viewcontact->first_name}} {{$viewcontact->last_name}}</span
                                       title="Contact" data-toggle="tooltip"></h5>
                              </div>
                              <div class="col-sm-6 text-right">
                                 <h6 class="text-success m-0"><span title="Account" data-toggle="tooltip">{{ucwords($viewcontact->account_name)}}</span title="Contact" data-toggle="tooltip"></h6>
                                 <p class="m-0"><span title="Title" data-toggle="tooltip">{{$viewcontact->title}}</span></p>
                                 <p class="m-0"><a href="#" title="Contact Owner" data-toggle="tooltip"><u
                                          class="text-info">{{$viewcontact->userfullname}}</u></a></p>
                                 <p class="m-0 text-info"><span title="Phone" data-toggle="tooltip">+91
                                       {{$viewcontact->mobile}}</span></p>
                                 <p class="m-0 text-info"><span title="Email"
                                       data-toggle="tooltip">{{$viewcontact->email}}</span></p>
                              </div>
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <ul class="nav nav-tabs nav-tabs-custom" role="tablist" id="#myTab">
                                 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#home"
                                    role="tab"><span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Activity Log</span></a></li>
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile"
                                       role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                       <span class="d-none d-sm-block">Details</span></a></li>
                                    </ul>
                                     <div class="tab-content">
                                      <div class="tab-pane p-3" id="home" role="tabpanel">
                                        <div class="row m-t-10">
                                          <div class="col-md-6">
                                             <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Date<span style="color:red">*</span></label>
                                                <div class="col-lg-8">
                                                   <input type="date" class="form-control" id="choose_date">
                                                   <span id="choose_date_error"></span>
                                                </div>
                                             </div>
                                          </div>
                                          <input type="hidden" id="lead_log_id">
                                          <div class="col-md-6">
                                             <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Communication
                                                   Type<span style="color:red">*</span></label>
                                                   <div class="col-lg-8">
                                                      <select class="form-control" id="commu_type">
                                                         <option>Call</option>
                                                         <option>SMS</option>
                                                         <option>F2F Meeting</option>
                                                         <option>Skype</option>
                                                         <option>Zoom</option>
                                                         <option>Email</option>
                                                         <option>Site Visit</option>
                                                         <option>Office Meeting</option>
                                                      </select>
                                                      <span id="commu_type_error"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                   <label for="prifix" class="col-lg-4 col-form-label">Comments<span style="color:red">*</span></label>
                                                   <div class="col-lg-8">
                                                      <textarea rows="3" class="form-control" id="comment"></textarea>
                                                      <span id="comment_error"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                   <label for="firstname" class="col-lg-4 col-form-label">Commented By<span style="color:red">*</span></label>
                                                   <div class="col-lg-8">
                                                      <input type="text" placeholder="admin" disabled="" class="form-control">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                   <label for="prifix" class="col-lg-4 col-form-label">Next Communication
                                                      Date<span style="color:red">*</span></label>
                                                      <div class="col-lg-8">
                                                         <input type="date" class="form-control" id="next_date">
                                                         <span id="next_date_error"></span>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      <button onclick="save_log()" class="btn btn-primary float-right" id="savelog">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                               <div class="col-sm-12">
                                                <table id="datatable" class="lead_log table table-bordered dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                   <tr>
                                                      <th>S.No</th>
                                                      <th>Date</th>
                                                      <th>Communication Type</th>
                                                      <th>Comments</th>
                                                      <th>Commented By</th>
                                                      <th>Next Comm. Date</th>
                                                      <th>Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="row">
                                        <div class="col-sm-12">
                                         <h5 class="p-lr-20">TimeLine</h5>
                                      </div>
                                   </div>
                                   <div id="cd-timeline">
                                     <ul class="timeline list-unstyled timeline">
                                                                                       <!-- <li class="timeline-list right clearfix">
                                           <div class="cd-timeline-content bg-light p-10">
                                              <h5 class="mt-0 mb-2">Himanshu Pawar <span class="text-primary float-left">11:00 PM</span></h5>
                                              <a href="#" class="text-primary" data-toggle="modal" data-target="#activitylog">View Detail</a>
                                              <div class="date bg-primary">
                                                 <h5 class="mt-0 mb-0">23</h5>
                                                 <p class="mb-0 text-white-50">Jan</p>
                                              </div>
                                           </div>
                                        </li> -->
                                     </ul>
                                  </div>
                               </div>
                               <div class="tab-pane p-3 active" id="profile" role="tabpanel">
                                      <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="empcode" class="col-lg-4 col-form-label">Contact Owner</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->userfullname}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="empid" class="col-lg-4 col-form-label">Name</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->salutation}} {{$viewcontact->first_name}} {{$viewcontact->last_name}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="prifix" class="col-lg-4 col-form-label">Home Phone</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->phone}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="firstname" class="col-lg-4 col-form-label">Other Phone</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->other_phone}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Department</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->deportment}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Fax</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->fax}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Birth Date</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->dob}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Reports To</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->report_to}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Assistant</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->assistant}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Lead Source</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewbill->street??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Asst. Phone</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->assistant_phone}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Mailing Address</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewbill->street??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Other Address</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewshipp->street??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Languages</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->lang}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Level</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->level}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Created By</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$viewcontact->userfullname}}, {{$viewcontact->created_at}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Last Modified By</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">
                                             {{$viewcontact->userfullname}}, {{$viewcontact->created_at}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Description</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label"> {{$viewcontact->desc}}</label>
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
            <!-- activity log -->
      <div id="activitylog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title mt-0" id="myModalLabel">Activity View</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="lead_form" method="post">
               <div class="modal-body">
                  <div class="row m-t-10">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empcode" class="col-lg-4 col-form-label">Date<span style="color:red">*</span></label>
                           <div class="col-lg-8 col-form-label">
                              <label class="myprofile_label">5-4-2020</label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" id="lead_log_id">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empid" class="col-lg-4 col-form-label">Communication
                              Type<span style="color:red">*</span></label>
                              <div class="col-lg-8 col-form-label">
                                 <label class="myprofile_label">Call</label>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="row m-t-10">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empcode" class="col-lg-4 col-form-label">Comments<span style="color:red">*</span></label>
                           <div class="col-lg-8 col-form-label">
                              <label class="myprofile_label">dummy dummy dummy dummy</label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" id="lead_log_id">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empid" class="col-lg-4 col-form-label">Commented By
                              Type<span style="color:red">*</span></label>
                              <div class="col-lg-8 col-form-label">
                                 <label class="myprofile_label">Admin</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row m-t-10">
                     <div class="col-md-6">
                        <div class="form-group row">
                           <label for="empcode" class="col-lg-4 col-form-label">Next Communication Date<span style="color:red">*</span></label>
                           <div class="col-lg-8 col-form-label">
                              <label class="myprofile_label">23-5-20220</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- activity log end -->
         </div>
           @stop

           @section('extra_js')

<script language="javascript" type="text/javascript">

                    $("form#addcontact").submit(function(e) {

 
            e.preventDefault();
            
           

          var last_name = $('#last_name').val();
           var first_name = $('#first_name').val();
            var mobile = $('#mobile').val();
      
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
      
      if(mobile ==''){
         $('#mobile_error').text('Mobile is Required').attr('style','color:red');
         $('#mobile_error').show();
          error = 0;
              return false;

      }else{$('#mobile_error').hide();  error = 1;}

      

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



   var userid = '{{$userid}}';
         var lead_id = '{{$contact_id}}';
        var  status = 3;




     

         getLeadlog(userid,lead_id,status);
         
        function getLeadlog(user_id,lead_id,status){
            var convert = 'convert';
       var _token = "{{csrf_token()}}";
       

  $.ajax({
        url: '/get_lead_logs',
        type: "post",
        data: {"_token": _token,"user_id":user_id,"lead_id":lead_id,"status" : status},
        dataType: 'JSON',
         
        success: function (data) {
         console.log(data);
         // alert(lead_id);
          $(".lead_log tbody").html(data.lead_log);
    
          
        }
      });
             
         }



show_timeline(lead_id);
function show_timeline(lead_id){


 var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/timeline',
  type: "post",
  data: {"_token": _token,"status":2,"lead_id":lead_id},
 

  success: function (data) {
  
    $(".timeline").html(data);

 }
});

}


                           


function save_log(){
  error = 1;  
  var choose_date = $('#choose_date').val();
  var commu_type = $('#commu_type').val();
  var comment = $('#comment').val();
  var next_date = $('#next_date').val();
  var lead_log_id = $('#lead_log_id').val();


  if(choose_date ==''){
   $('#choose_date_error').text('Date is Required').attr('style','color:red');
   $('#choose_date_error').show();
   error = 0;
   return false;

}else{$('#choose_date_error').hide();  error = 1;}

if(commu_type ==''){
   $('#commu_type_error').text('Communication Type is Required').attr('style','color:red');
   $('#commu_type_error').show();
   error = 0;
   return false;

}else{$('#commu_type_error').hide();  error = 1;}

if(comment ==''){
   $('#comment_error').text('Comment is Required').attr('style','color:red');
   $('#comment_error').show();
   error = 0;
   return false;

}else{$('#comment_error').hide();  error = 1;}

// if(next_date ==''){
//    $('#next_date_error').text('Next Date is Required').attr('style','color:red');
//    $('#next_date_error').show();
//    error = 0;
//    return false;

// }else{$('#next_date_error').hide();  error = 1;}

if(error == 1){

  var _token = "{{csrf_token()}}";

  $.ajax({
     url: '/save_lead_logs',
     type: "post",
     data: {"_token": _token,"choose_date":choose_date,"commu_type":commu_type,"comment":comment,"next_date":next_date,"lead_id" :lead_id,"lead_log_id":lead_log_id,'status':3},
     dataType: 'JSON',

     success: function (data) {
      if(data.status == 200){
       alertify.success(data.msg); 
       getLeadlog(userid,lead_id);
       var choose_date = $('#choose_date').val('');
       var commu_type = $('#commu_type').val('');
       var comment = $('#comment').val('');
       var next_date = $('#next_date').val('');
       $('#lead_log_id').val('');
       $('#savelog').text('Save');
       show_timeline(lead_id);

    }else{

     alertify.success(data.msg); 
     show_timeline(lead_id);

  }




}
});

}

}

function delete_lead_log(thisval,lead_log_id){


 var result = confirm("Want to delete?");
 if (result) {
    //Logic to delete the item

    var _token = "{{csrf_token()}}";

    $.ajax({
     url: '/delete_lead_logs',
     type: "post",
     data: {"_token": _token,"lead_log_id":lead_log_id},
     dataType: 'JSON',

     success: function (data) {

      if(data.status == 200){
        alertify.success(data.msg); 
        $(thisval).closest("tr").remove();
        show_timeline(lead_id);

     }else{
        alertify.success(data.msg); 
        show_timeline(lead_id);
     }



  }
});
 }

}

function edit_lead_log(thisval,lead_log_id){

  var _token = "{{csrf_token()}}";

  $.ajax({
     url: '/edit_lead_logs',
     type: "post",
     data: {"_token": _token,"lead_log_id":lead_log_id},
     dataType: 'JSON',

     success: function (data) {

      show_timeline(lead_id);

        var choose_date = $('#choose_date').val(data.lead_detail.date);
        var commu_type = $('#commu_type').val();
        var comment = $('#comment').val(data.lead_detail.comment);
        var next_date = $('#next_date').val(data.lead_detail.next_date);
        $('#lead_log_id').val(lead_log_id);
        $('#savelog').text('Save Edit');

        $("#commu_type > option").each(function() {
         if(this.text == data.lead_detail.communication_type){
            $('#commu_type').val(data.lead_detail.communication_type).attr("selected"); 
         }

      });




     }
  });

}
           
 $(document).ready(function () {
                        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                            localStorage.setItem('activeTab', $(e.target).attr('href'));
                        });
                        var activeTab = localStorage.getItem('activeTab');
                        if (activeTab) {
                            $('#myTab a[href="' + activeTab + '"]').tab('show');
                        }
                    });
</script>

           @stop