    @extends('layouts.superadmin_layout')
   @section('content')
   
                     <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-5 col-5 p-r-5">
                        <h3 class="page-title">Bill Payment View</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Bill Payment View</a></li>
                        </ol>
                     </div>

                   <!--   <div class="col-sm-4 text-center">
                        <span title="contact" data-toggle="tooltip" class="specialicon">
                           <i class="mdi mdi-account-multiple noti-icon m-r-30"></i>
                           <span class="badge badge-pill badge-danger noti-icon-badge">0</span>
                        </span>
                        <span title="Opportunities" data-toggle="tooltip" class="specialicon">
                           <i class="mdi mdi-lightbulb-on noti-icon m-r-30"></i>
                           <span class="badge badge-pill badge-danger noti-icon-badge">0</span>
                        </span>
                        <span title="Partners" data-toggle="tooltip" class="specialicon">
                           <i class="fas fa-handshake noti-icon m-r-30" style="height:37px"></i>
                           <span class="badge badge-pill badge-danger noti-icon-badge">0</span>
                        </span>
                     </div> -->

                     <div class="col-sm-7 col-7 p-l-0">
                        <div class="float-right d-md-block">
                           <div class="dropdown">
                            
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
                     <div class="card">
                        <div class="card-body">
                           <!-- Nav tabs -->
                           <ul class="nav nav-tabs nav-tabs-custom" role="tablist" id="myTab">
                              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#home" role="tab"><span
                                       class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Activity Log</span></a></li>
                              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile"
                                    role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Details</span></a></li>
                           </ul>
                           <!-- Tab panes -->
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
                                                <input type="text" placeholder="{{$view_bill->userfullname}}" disabled="" class="form-control">
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
                                             <button onclick="save_log()" class="btn btn-primary float-right">Save</button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <table id="datatable" class="accnt table table-bordered dt-responsive nowrap"
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
                                       
                                     
                                       <!--  <li class="timeline-list right clearfix">
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
                                    



                                   
                                 <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label">Bill Name</label>
                                <div class="col-lg-8 col-form-label">
                                    <label class="myprofile_label">{{$view_bill->bill_name}}</label>
                                                                    </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Type</label>
                                <div class="col-lg-8 col-form-label">
                                     <label class="myprofile_label">{{$view_bill->bill_name}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Number</label>
                                <div class="col-lg-8 col-form-label">
                                  <label class="myprofile_label">{{$view_bill->bill_no}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Amount</label>
                                <div class="col-lg-8 col-form-label">
                                    <label class="myprofile_label">{{$view_bill->bill_amt}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Vendor</label>
                                <div class="col-lg-8 col-form-label">
                                    <label class="myprofile_label">{{$view_bill->vendor_name}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Payment Type</label>
                                <div class="col-lg-8 col-form-label">
                                    <label class="myprofile_label">{{$view_bill->payment_type}}</label>
                                </div>
                            </div>
                        </div>

                      
                      @php(
                      $month = ['Jan' ,'Feb','March' ,'April' , 'May','June']
                      )
                       @if($view_bill->payment_type == 'quarterly')
                        <div class="col-sm-6" id="Quarter1">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Month</label>
                                <div class="col-lg-8 col-form-label">
                                  @for($i = 1; $i <=6; $i++)
                                  @if($view_bill->month == $i)
                                  <label class="myprofile_label">{{$i}}</label>
                                  @endif
                                  @endfor
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-6" id="Quarter3">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Day</label>
                                <div class="col-lg-8 col-form-label">
                                 <label class="myprofile_label">{{$view_bill->day}}</label>
                                </div>
                            </div>
                        </div>

                      @else

                         <div class="col-sm-6" id="date">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0"> Start Date</label>
                                <div class="col-lg-8 col-form-label">
                                <label class="myprofile_label">{{$view_bill->start_date}}</label>
                                </div>
                            </div>
                        </div>

                          <div class="col-sm-6" id="date">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0"> Due Date</label>
                                <div class="col-lg-8 col-form-label">
                                <label class="myprofile_label">{{$view_bill->due_date}}</label>
                                </div>
                            </div>
                        </div>


                        @endif
                      
                     
                        <div class="col-sm-12" id="onetimedate">
                            <div class="row">
                               
                                <div class="col-sm-6">
                                    <div class="form-group row m-0">
                                        <label for="empid" class="col-lg-4 col-form-label p-r-0">Date</label>
                                        <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_bill->created_at}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Status</label>
                                <div class="col-lg-8 col-form-label">
                                   <label class="myprofile_label">{{($view_bill->status == 1?'Pending' : ($view_bill->status == 2)?'Aproved' : 'Reject')}}</label>
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
         </div>
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
         <!-- content -->
           @stop

           @section('extra_js')

         <script type="text/javascript">

          
         
          var userid = '{{$userid}}';
         var lead_id = '{{$lead_id}}';
        var  status = 5;



     

show_timeline(lead_id,status);
function show_timeline(lead_id,status){


 var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/timeline',
  type: "post",
  data: {"_token": _token,"status":status,"lead_id":lead_id},
 

  success: function (data) {
  
    $(".timeline").html(data);

 }
});
}



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
          $(".accnt tbody").html(data.lead_log);
    
          
        }
      });
             
         }
         
                    $("form#addaccount").submit(function(e) {

 
            e.preventDefault();
            
           

          var account_name = $('#account_name').val();

      
         if(account_name ==''){
         $('#account_name_error').text('Account is Required').attr('style','color:red');
         $('#account_name_error').show();
          error = 0;
              return false;

      }else{$('#account_name_error').hide();  error = 1;}

       

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
          
        }
      });

       
           });
         


         </script>
         
          <script>  
         
         function save_log(){
           error = 1;  
        var choose_date = $('#choose_date').val();
        var commu_type = $('#commu_type').val();
        var comment = $('#comment').val();
        var next_date = $('#next_date').val();
        var lead_log_id = $('#lead_log_id').val();
        
        var  status = 5;
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
      
       if(next_date ==''){
         $('#next_date_error').text('Next Date is Required').attr('style','color:red');
         $('#next_date_error').show();
           error = 0;
              return false;

      }else{$('#next_date_error').hide();  error = 1;}
      
      if(error == 1){
          
  var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/save_lead_logs',
        type: "post",
        data: {"_token": _token,"choose_date":choose_date,"commu_type":commu_type,"comment":comment,"next_date":next_date,"lead_id" :lead_id,"lead_log_id":lead_log_id,"status" : status},
        dataType: 'JSON',
         
        success: function (data) {
            if(data.status == 200){
                alertify.success(data.msg); 
                getLeadlog(userid,lead_id);
                   var choose_date = $('#choose_date').val('');
        var commu_type = $('#commu_type').val('');
        var comment = $('#comment').val('');
        var next_date = $('#next_date').val('');
        var lead_log_id = $('#lead_log_id').val('');
        show_timeline(lead_id,status);
                
            }else{
                
                 alertify.success(data.msg); 
                 show_timeline(lead_id,status);
                
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
                
            }else{
                 alertify.success(data.msg); 
            }
            
            show_timeline(lead_log_id,5);
     
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
            
        var choose_date = $('#choose_date').val(data.lead_detail.date);
        var commu_type = $('#commu_type').val();
        var comment = $('#comment').val(data.lead_detail.comment);
        var next_date = $('#next_date').val(data.lead_detail.next_date);
                        $('#lead_log_id').val(lead_log_id);
                          $('.float-right').text('Edit');
                          
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