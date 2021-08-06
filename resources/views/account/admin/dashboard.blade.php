
@extends('layouts.superadmin_layout')

   @section('content')
   @section('extra_css')
   <style>
    .table>tbody>tr>td, .table>tfoot>tr>td, .table>thead>tr>td {
    padding: 8px 4px;
}
</style>
@stop
   <!-- Begin page -->
         <!-- Start content -->
                 <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style m-b-20 p-10">
                     <div class="col-sm-6">
                        <h4 class="page-title">Dashboard</h4>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-xl-3 col-md-6">
                     <div class="card mini-stat bg-success-50 text-white">
                        <div class="card-body">
                           <div>
                              <h5 class="font-16 text-uppercase mt-0">My Leaves</h5>
                              <div class="time-list">
                                 <div class="dash-stats-list">
                                    <h4>{{$takeleave??0}}</h4>
                                    <p class="font-12">Taken Leave</p>
                                 </div>
                                 <div class="dash-stats-list">
                                    <h4>{{$pending??0}}</h4>
                                    <p class="font-12">Pending Leave</p>
                                 </div>
                              </div>
                              <!-- <h4 class="font-500">18 </h4> -->
                              <div class="mini-stat-label bg-primary">
                                 <p class="mb-0">{{$takeleave??0 + $pending??0 }}</p>
                              </div>
                           </div>
                           <!--<div class="pt-2">-->
                           <!--   <div class="float-right">-->
                           <!--      <a href="{{URL::to('/leavelist')}}" class="text-white">-->
                           <!--             <p class="mb-0">View More <i class="mdi mdi-arrow-right h5 font-14 text-white"></i></p>-->
                                    
                           <!--      </a>-->
                           <!--   </div>-->
                           
                           <!--</div>-->
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="card mini-stat bg-danger-50 text-white">
                        <div class="card-body">
                           <div>
                              <h5 class="font-16 text-uppercase mt-0">My Team</h5>
                              <div class="time-list">
                                 <div class="dash-stats-list">
                                    <h4>2</h4>
                                    <p class="font-12">Member</p>
                                 </div>
                                 <div class="dash-stats-list">
                                    <h4>3</h4>
                                    <p class="font-12">Leaves for Approval</p>
                                 </div>
                              </div>
                              <div class="mini-stat-label bg-primary">
                                 <p class="mb-0">12</p>
                              </div>
                           </div>
                           <!--<div class="pt-2">-->
                           <!--   <div class="float-right"><a href="#" class="text-white">-->
                           <!--        <p class="mb-0">View More-->
                           <!--       <i class="mdi mdi-arrow-right h5 font-14 text-white"></i></p></a></div>-->
                             
                           <!--</div>-->
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="card mini-stat bg-info-50 text-white">
                        <div class="card-body">
                           <div>
                              <h5 class="font-16 text-uppercase mt-0">Attendance</h5>
                              <div class="time-list">
                                 <div class="dash-stats-list">
                                    <h4>{{$halfday??0}}</h4>
                                    <p class="font-12">FTS</p>
                                 </div>
                                 <div class="dash-stats-list">
                                    <h4>{{$late??0}}</h4>
                                    <p class="font-12">To Approve</p>
                                 </div>
                              </div>
                              <div class="mini-stat-label bg-primary">
                                 <p class="mb-0">{{$halfday??0 + $late??0 }}</p>
                              </div>
                           </div>
                           <!--<div class="pt-2">-->
                           <!--   <div class="float-right"><a href="#" class="text-white">-->
                           <!--   <p class="mb-0">View More<i class="mdi mdi-arrow-right h5 font-14 text-white"></i></p>-->
                           <!--   </a></div>-->
                           <!--</div>-->
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="card mini-stat bg-warning-50 text-white">
                        <div class="card-body">
                           <div>
                              <h5 class="font-16 text-uppercase mt-0">Projects</h5>
                              <div class="time-list">
                                 <div class="dash-stats-list">
                                    <h4>9</h4>
                                    <p class="font-12">Complete</p>
                                 </div>
                                 <div class="dash-stats-list">
                                    <h4>3</h4>
                                    <p class="font-12">Ongoing</p>
                                 </div>
                              </div>
                              <div class="mini-stat-label bg-primary">
                                 <p class="mb-0">12</p>
                              </div>
                           </div>
                           <!--<div class="pt-2">-->
                           <!--   <div class="float-right"><a href="#" class="text-white">-->
                           <!--   <p class="mb-0">View More <i class="mdi mdi-arrow-right h5 font-14 text-white"></i></p>-->
                           <!--   </a></div>-->
                           <!--</div>-->
                        </div>
                     </div>
                  </div>
               </div>
                  <div class="row">
                     @if(count($leavelist) !=0) 
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Pending Leaves for Approval
                            @if(PermissionHelper::frontendPermission('update-leave-to-approval'))
                           <span class="float-right">
                                  <button class="btn btn-primary" onclick="aprovelstatus('Approve')">Approve</button>
                           <button class="btn btn-default" onclick="aprovelstatus('reject')">Reject</button>
                           </span>
                            @endif
                           </h4>
                           <table  class="datatable table table-bordered dt-responsive nowrap font-14"
                              style="border-collapse: collapse; border-spacing: 0; width: 100%">
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>
                                       <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input checkAll" name="checkAll" type="checkbox" id="remember">
                                          <label class="custom-control-label" for="customControlInline remember">

                                          </label>
                                       </div>
                                    </th>
                                    <th>Action</th>
                                    <th>Type</th>
                                    <th>Emp Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Days</th>
                                    <th>Reason</th>
                                   
                                 </tr>
                              </thead>
                              <tbody>
                                   @php($i = 1)
                                    @foreach($leavelist as $leavelists)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                       
                                       
                                       <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input pendingleave" type="checkbox" name="check"  id="remember_{{$leavelists->id}}" value="{{$leavelists->id}}" data-userid ="{{$leavelists->user_id}}">
                                          <label class="custom-control-label" for="customControlInline remember">

                                          </label>
                                       </div>
                                    </td>
                                    
                                    
                                      <?php
                                        
                                         if($leavelists->leavetypeid ==1){
                        $title = 'CL';
                        $color = 'green';
                    }else if($leavelists->leavetypeid ==2){
                         $title = 'RH';
                          $color = 'Yellow';
                        
                    }else if($leavelists->leavetypeid ==5){
                          $title = 'MyLeave';
                           $color = 'Pink';
                    }else if($leavelists->leavetypeid ==4){
                        
                         $title = 'Maternity Leave';
                         $color = 'blue';
                        
                    }
                                        ?>
                                    
                                       <td class="pending-bg">
                                           @if($leavelists->leavestatus=="Pending for approval")
                                           Pending
                                           @else
                                            {{$leavelists->leavestatus}}
                                           @endif
                                                   
                                                </td>
                                    
                                      
                                               
                                   
                                    <td>{{$title}}
                                    </td>
                                    <td> {{ucwords($leavelists->userfullname)}}</td>
                                    <td>{{$leavelists->from_date}}</td>
                                    <td>{{$leavelists->to_date}}</td>
                                    <td>1</td>
 <td class="text_ellipses" data-toggle="tooltip" title="{{$leavelists->reason}}">{{$leavelists->reason}}</td>
                                 </tr>
                                 @endforeach
                                
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  @endif
                
                   @if(count($approvalList) !=0) 
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Attendance Request Pending For Approval
                             @if(PermissionHelper::frontendPermission('view-attendence'))
                         
                           
                           <span class="float-right">
                                 <button onclick="correctionAttedance('Approve')" class="btn btn-primary">Approve</button>
                           <button onclick="correctionAttedance('Reject')" class="btn btn-default">Reject</button>
                           </span>
                           @endif
                           </h4>
                           <table  class="datatable table table-bordered dt-responsive nowrap font-14"
                              style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>
                                       <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input checkall" type="checkbox" name="checkall" id="remember">
                                          <label class="custom-control-label" for="customControlInline remember">
                                          </label>
                                       </div>
                                    </th>
                                    <th>Status</th>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>A_InTime</th>
                                    <th>A_OutTime</th>
                                    <th>P_InTime</th>
                                    <th>P_OutTime</th>
                                    <th>A_Status</th>
                                    <th>P_Status</th>
                                  
                                 </tr>
                              </thead>
                              <tbody>
                                   @php($i =1)
                                          @foreach($approvalList as $approvalLists)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    
                                     <?php
                                        
                                         if($approvalLists->is_active ==4 || $approvalLists->is_active ==3){
                                             
                                            $attcls = 'disabled'; 
                                             
                                         }else{
                                             
                                             
                                             $attcls = '';
                                             
                                         }
                                        ?>
                                    
                                    
                                    <td>
                                       <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input pendingAttendace" type="checkbox" {{$attcls}} name="check" id="remember" value="{{$approvalLists->id}}" data-attDate="{{$approvalLists->entry_date}}" data-userid ="{{$approvalLists->empid}}">
                                          <label class="custom-control-label" for="customControlInline remember">
                                          </label>
                                       </div>
                                    </td>
                                    <td  class="pending-bg">
                                         @if($approvalLists->is_active == 2)
                                                       Pending
                                                       @elseif($approvalLists->is_active == 3)
                                                       Approved
                                                       @else
                                                       
                                                       Reject
                                                       @endif
                                    </td>
                                    <td>{{ucwords($approvalLists->userfullname)}}
                                    </td>
                                    <td>{{date('d-M-Y',strtotime($approvalLists->entry_date))}}</td>
                                    <td>{{date('H:i:s',strtotime($approvalLists->actual_intime))}}</td>
                                    <td>{{date('H:i:s',strtotime($approvalLists->actual_outtime))}}</td>
                                    <td>{{date('H:i:s',strtotime($approvalLists->preposed_intime))}}</td>
                                    <td>{{date('H:i:s',strtotime($approvalLists->preposed_outtime))}}</td>
                                    <td>{{$approvalLists->actual_status}}</td>
                                    <td>{{$approvalLists->preposed_status}}</td>
                                   
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           
                        </div>
                     </div>
                  </div>
                  @endif
                  <!-- <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Today</h4>
                        </div>
                     </div>
                  </div> -->


    


               </div>
               
               
               <!-- end row -->
               <div class="row">
                  <!-- <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Today</h4>
                        </div>
                     </div>
                  </div> -->
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Upcoming Holidays</h4>
                           <div class="table-responsive">
                              <table class="table table-hover">
                                 <tbody>
                                     
                                     @foreach($holyDay as $holyDays)
                                    <tr>
                                       <td class="p-tb-10">
                                          <div class="text-success">{{$holyDays->holidayname}}</div>
                                       </td>
                                       <td class="p-tb-10">{{date('d-M-Y',strtotime($holyDays->holidaydate))}}</td>
                                       <td class="p-tb-10">{{date('D',strtotime($holyDays->holidaydate))}}</td>
                                    </tr>
                                    @endforeach
                                    <!--<tr>-->
                                    <!--   <td class="p-tb-10">-->
                                    <!--      <div class="text-success"> Good Friday</div>-->
                                    <!--   </td>-->
                                    <!--   <td class="p-tb-10">10-Apr-2020</td>-->
                                    <!--   <td class="p-tb-10">Friday</td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--   <td class="p-tb-10">-->
                                    <!--      <div class="text-success">Gandhi Jayanti</div>-->
                                    <!--   </td>-->
                                    <!--   <td class="p-tb-10">2-Oct-2020</td>-->
                                    <!--   <td class="p-tb-10">Friday</td>-->
                                    <!--</tr>-->
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Birthday/Year Completion</h4>
                           <div class="table-responsive">
                              <table class="table table-hover mb-0">
                                 <tbody>
                                     
                                     @foreach($birthday as $birthdays)
                                     
                                     
                                    <tr>
                                       <td class="p-tb-5">
                                          <div class="notice-board">
                                             <div class="table-img">
                                                <div class="e-avatar mr-3">
                                                    
                                                    @if(!empty($birthdays->profileimg))
                                                    <img class="img-fluid thumb-sm rounded-circle mr-2" src="{{URL::to('public')}}{{$birthdays->profileimg}}">
                                                    @elseif($birthdays->prefix == 1)
                                                    
                                                      <img class="img-fluid thumb-sm rounded-circle mr-2" src="{{URL::to('public/uploads/male.png')}}">
                                                      
                                                    @elseif($birthdays->prefix == 2 || $birthdays->prefix ==3 )
                                                    
                                                     <img class="img-fluid thumb-sm rounded-circle mr-2" src="{{URL::to('public/uploads/female.png')}}">
                                                    
                                                    @else
                                                     
                                                    @endif
                                                    
                                                </div>
                                             </div>
                                             <div class="notice-body">
                                                <h6 class="m-0 font-500">{{ucwords($birthdays->userfullname)}}</h6>
                                                @if(date('d-m',strtotime($birthdays->dob)) == date('d-m',strtotime(date('Y-m-d'))))
                                                <span class="ctm-text-sm text-danger">Birthday | Today</span>
                                                @else
                                                  <span class="ctm-text-sm">{{date('d M',strtotime($birthdays->dob))}}</span>
                                                @endif
                                             </div>
                                          </div>
                                       </td>
                                        @if(date('d-m',strtotime($birthdays->dob)) == date('d-m',strtotime(date('Y-m-d'))) &&  $birthdays->userid != $userid)
                                       <td><span class="badge badge-success float-right cursorpointer" onclick="show_wish_dob({{$birthdays->userid}})" id="b_wish_{{$birthdays->dob}}">Wish</span></td>
                                       @endif

                                    </tr>
                                           <tr id="b_wish_{{$birthdays->userid}}" style="display:none;">
                                       <td>
                                          <input type="text" class="form-control" id="comment_{{$birthdays->userid}}" placeholder="Comment here...">
                                       </td>
                                       <td class="text-right">
                                          <span onclick="submitcomment({{$birthdays->userid}})" class="badge badge-success cursorpointer">Send</span>
                                          <span class="badge badge-primary cursorpointer" onclick="close_pop({{$birthdays->userid}})" >Cancel</span>
                                       </td>
                                    </tr>
                              
                                    @endforeach
                                    
                             
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4">Company Announcements
                           <!--<a href="add_announcement.html"><i class="fa fa-plus float-right"></i></a>-->
                           </h4>
                           <div class="alert alert-success" role="alert">Laptop Desktop Equipment Policy. <span
                                 class="font-12 text-dark">Thu, Mar 22</span></div>
                           <div class="alert alert-info" role="alert">Medical Policy for Parents. <span
                                 class="font-12 text-dark">Mon, Apr 2</span></div>
                           <div class="alert alert-warning" role="alert">Laptop Desktop Equipment Policy. <span
                                 class="font-12 text-dark">Thu, Mar 22</span></div>
                           <div class="alert alert-danger mb-0" role="alert">Medical Policy for Parents. <span
                                 class="font-12 text-dark">Mon, Apr 2</span></div>
                        </div>
                     </div>
                  </div>


               </div>
               <!-- <div class="row">
                  <div class="col-xl-9">
                     <div class="card crd-blue-border dashboard_leveheight" style="height:238px">
                        <div class="card-body">
                           <h3 class="mt-0 header-title mb-4 font-blue">Circulars</h3>
                           <hr>
                           <ul class="ulcolor">
                              <li>Leaves are restricted for month of October.</li>
                              <li>Policy of EC letter is updated by government.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3">
                     <div class="card dashboard_leveheight">
                        <div class="card-body crd-blue-border">
                           <div>
                              <h4 class="mt-0 header-title mb-4 font-blue">Total Leaves</h4>
                           </div>
                           <div>
                              <canvas id="leavechart"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
               <!-- end row -->

               <!-- <div class="row">
                  <div class="col-xl-12">
                     <div class="card crd-blue-border">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-5 font-blue">Deparment Wise Head Count</h4>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div>
                                    <canvas id="myChart" height="80"></canvas>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
               <!-- end row -->
  @stop    
  
  
  @section('extra_js')
  
  <script>
  


      
      function show_wish_dob(dob){
         $("#b_wish_"+dob).show();
      }
      
      
      function close_pop(id){
          $("#b_wish_"+id).hide();
      }
      
      function submitcomment(birthday_user_id){
          
          var comment = $('#comment_'+birthday_user_id).val();
          
             var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/sendnotification',
        type: "post",
        data: {"_token": _token,"birthday_user_id":birthday_user_id,"comment":comment},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
             $("#b_wish_"+birthday_user_id).hide();
             
            alertify.success(data.msg);
           
         


          }else{

             $('#loadingDiv').hide();
            
            
             alertify.error(data.msg);

          }
          
        }
      });
          
          
      }
      
  </script>
  
  
  
   <script type="text/javascript">
       

       function aprovelstatus(status){

     
      

     leaveid = [];
     userid = [];
     
    // if is checked
    if ($('.pendingleave').is(':checked')) {


      $('.pendingleave').parent().find('input[type=checkbox]:checked').each(function() {
        leaveid.push($(this).val());
        userid.push($(this).data('userid'));
      });



  leave_id = JSON.stringify(leaveid);
  user_id = JSON.stringify(userid);

 $('#loadingDiv').show();
   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/leavestatus',
        type: "post",
        data: {"_token": _token,leave_id:leave_id,user_id:user_id,status:status},
       // dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", data.msg, "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!",data.msg, "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", data.msg, "error");

          }
          
        }
      });



            }


       }

          



       function correctionAttedance(status){

     
      

     attendace_id = [];
     user_id = [];
      attdanceDate = [];
     
    // if is checked
    if ($('.pendingAttendace').is(':checked')) {


      $('.pendingAttendace').parent().find('input[type=checkbox]:checked').each(function() {
        attendace_id.push($(this).val());
        user_id.push($(this).data('userid'));
         attdanceDate.push($(this).data('attDate'));
      });
      
    



  attendace_id = JSON.stringify(attendace_id);
  user_id = JSON.stringify(user_id);
  attdanceDate = JSON.stringify(attdanceDate);

 $('#loadingDiv').show();
   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/attendancestatus',
        type: "post",
        data: {"_token": _token,attendace_id:attendace_id,user_id:user_id,status:status,attdanceDate:attdanceDate},
       // dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", data.msg, "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!",data.msg, "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", data.msg, "error");

          }
          
        }
      });



            }


       }
// check all
$(document).ready(function () {
  $('.checkAll').on('click', function () {
    $(this).closest('table').find('tbody :checkbox')
      .prop('checked', this.checked)
      .closest('tr').toggleClass('selected', this.checked);
  });

  $('tbody :checkbox').on('click', function () {
    $(this).closest('tr').toggleClass('selected', this.checked); //Classe de seleção na row
  
    $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); //Tira / coloca a seleção no .checkAll
  });
}); 

   </script>
  
   @stop 
   
