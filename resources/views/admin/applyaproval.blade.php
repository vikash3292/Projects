

@extends('layouts.superadmin_layout')
@section('content')
<!-- Start content -->
<div class="content p-0">
  <div class="container-fluid">
    <div class="page-title-box">
      <div class="row align-items-center bredcrum-style">
        <div class="col-sm-6">
          <h4 class="page-title">Leaves to Approve</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Leave</a></li>
            <li class="breadcrumb-item active"><a href="#">Leaves to Approve</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
    <!-- end row -->
    <!-- end row -->

    <div class="row">
      <div class="col-12">
        <div class="card m-t-20">
          <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>S.No</th>
                <th>
                  Employee
                </th>
                <th>Leave Type</th>
                <th>Date</th>
                 <th>Apply Date</th>
                <th>No. of Days</th>
                <th>Approver Status</th>
                <th>Leave Status</th>
                @if(Auth::guard('main_users')->user()->emprole !=5)
                <th>Action</th>
                @endif

              </tr>
            </thead>

           
            <tbody>
              @php($i = 1)
              @foreach($leavelist as $leavelists)
              <tr>
                <td>{{$i++}}</td>
                <td>
                 {{ucwords($leavelists->userfullname)}}
               </div>
             </td>
             <td>  {{$leavelists->leave_mode}}</td>
             <td>  {{$leavelists->leaveDate}}</td>
               <td>  {{date('d M Y H:i:s',strtotime($leavelists->created_at))}}</td>
             <td>{{$leavelists->leave_type}}</td>
             <td>
              @php($useridshowid = array_filter(explode(',',$leavelists->show_user_id)))

              @if($leavelists->manager ==1)
              <i class="mdi mdi-checkbox-blank-circle approved approvalstatus"
              title="Approved">

                @if(!empty($leavelists->show_status_name[0]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[0]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[0]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[0]->created_at))}}</span>
                  </p>
                </div>
                @endif

              </i>

              @elseif($leavelists->manager ==0)

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>
              @else

              <i class="mdi mdi-checkbox-blank-circle rejected approvalstatus"
              title="Rejected">
                @if(!empty($leavelists->show_status_name[0]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[0]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[0]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[0]->created_at))}}</span>
                  </p>
                </div>
                @endif
              </i>

              @endif  
              @if($leavelists->hr ==1)


              <i class="mdi mdi-checkbox-blank-circle approved approvalstatus"
              title="Approved">
                

               @if(!empty($leavelists->show_status_name[1]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[1]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[1]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[1]->created_at))}}</span>
                  </p>
                </div>
                @endif

              </i>

              @elseif($leavelists->hr ==0)

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>
              @else

              <i class="mdi mdi-checkbox-blank-circle rejected approvalstatus"
              title="Rejected">
                

              @if(!empty($leavelists->show_status_name[1]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[1]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[1]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[1]->created_at))}}</span>
                  </p>
                </div>
                @endif

              </i>

              @endif  
              @if($leavelists->admin ==1)

              
              <i class="mdi mdi-checkbox-blank-circle approved approvalstatus"
              title="Approved">
                

            @if(!empty($leavelists->show_status_name[2]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[2]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[2]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[2]->created_at))}}</span>
                  </p>
                </div>
                @endif


              </i>
              @elseif($leavelists->admin ==0)

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>

              @else

              <i class="mdi mdi-checkbox-blank-circle rejected approvalstatus"
              title="Rejected">
                

                  @if(!empty($leavelists->show_status_name[2]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[2]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[2]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[2]->created_at))}}</span>
                  </p>
                </div>
                @endif

              </i>

              @endif  
              @if($leavelists->director ==1 && count($useridshowid) > 5)
              <i class="mdi mdi-checkbox-blank-circle approved approvalstatus"
              title="Approved">
                
                @if(!empty($leavelists->show_status_name[3]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[3]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[3]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[3]->created_at))}}</span>
                  </p>
                </div>
                @endif


              </i>

              @elseif($leavelists->director ==0 && count($useridshowid) > 5) 

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>
              @elseif(count($useridshowid) > 5) 

              <i class="mdi mdi-checkbox-blank-circle rejected approvalstatus"
              title="Rejected">
                
                  @if(!empty($leavelists->show_status_name[3]))
                <div class="appstatusdetail">
                  <p>
                    <strong class="float-left">Name:</strong>
                    <span class="float-right">{{ucwords($leavelists->show_status_name[3]->userfullname)}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Date:</strong>
                    <span class="float-right">{{ date('d M Y',strtotime($leavelists->show_status_name[3]->created_at))}}</span>
                  </p>
                  <p>
                    <strong class="float-left">Time:</strong>
                    <span class="float-right">{{ date('H:i:s',strtotime($leavelists->show_status_name[3]->created_at))}}</span>
                  </p>
                </div>
                @endif

              </i>

              @endif  
                                                   <!--  <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                    title="Rejected"></i> -->
                                                  </td>


                                                  @if(count($useridshowid) > 5)


                                                  @if($leavelists->manager ==1 && $leavelists->hr ==1 && $leavelists->admin ==1 && $leavelists->director == 1)


                                                  <td class="approve-bg">
                                                    Approved
                                                  </td>
                                                  @elseif($leavelists->manager == 2 || $leavelists->hr ==2 || $leavelists->admin ==2 || $leavelists->director ==2)

                                                  <td class="reject-bg">
                                                    Rejected 
                                                  </td>

                                                  @else


                                                  <td class="pending-bg">
                                                    Pending
                                                  </td>

                                                  @endif

                                                  @else

                                                  @if($leavelists->manager ==1 && $leavelists->hr ==1 && $leavelists->admin ==1 )


                                                  <td class="approve-bg">
                                                    Approved
                                                  </td>
                                                  @elseif($leavelists->manager == 2 || $leavelists->hr ==2 || $leavelists->admin ==2 )

                                                  <td class="reject-bg">
                                                    Rejected 
                                                  </td>

                                                  @else


                                                  <td class="pending-bg">
                                                    Pending
                                                  </td>

                                                  @endif

                                                  @endif

                                                  <td>
                                                   @if($leavelists->user_id != $userid && $leavelists->approval_status == 0)

                                                    

                                                   <span class="font-blue cursorpointer" data-toggle="modal" data-target="#leaveapprove{{$leavelists->id}}">
                                                   Approve/Reject</span>

                                                   @endif
                                                 </td>
                                               </tr>

                                               <!-- leave approve -->

                                               <div id="leaveapprove{{$leavelists->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                  <div class="modal-header">
                                                   <h5 class="modal-title mt-0" id="myModalLabel">Approve/Reject Leave</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                 </div>
                                                 <form id="aproveModel" method="post">
                                                  <div class="modal-body p-0">
                                                    <div class="col-sm-12">
                                                     <div class="row">
                                                       <div class="col-md-2">
                                                        Date
                                                      </div>
                                                      <div class="col-md-2">
                                                        Leave Day Type
                                                      </div>
                                                      <div class="col-md-2">
                                                        Leave Timing
                                                      </div>
                                                      <div class="col-md-2">
                                                        Approver Status
                                                      </div>
                                                      <div class="col-md-2">
                                                        My Action
                                                      </div>
                                                      <div class="col-md-2">
                                                        Final Status
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                  <div class="row">
                                                    <div class="col-md-2">
                                                     {{$leavelists->leaveDate}}
                                                   </div>
                                                   <div class="col-md-2">
                                                     @if($leavelists->leave_type == 1.0)

                                                     Full day

                                                     @else

                                                     Half Day

                                                     @endif
                                                   </div>
                                                   <div class="col-md-2">
                                                    {{$leavelists->leave_timing??'Fullday'}}
                                                  </div>
                                                  <div class="col-md-2">
                                                    

                                                                 @php($useridshowid = array_filter(explode(',',$leavelists->show_user_id)))

              @if($leavelists->manager ==1)
              <i class="mdi mdi-checkbox-blank-circle approved"
              title="Approved"></i>

              @elseif($leavelists->manager ==0)

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>
              @else

              <i class="mdi mdi-checkbox-blank-circle rejected"
              title="Rejected"></i>

              @endif  
              @if($leavelists->hr ==1)
              <i class="mdi mdi-checkbox-blank-circle approved"
              title="Approved"></i>

              @elseif($leavelists->hr ==0)

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>
              @else

              <i class="mdi mdi-checkbox-blank-circle rejected"
              title="Rejected"></i>

              @endif  
              @if($leavelists->admin ==1)
              <i class="mdi mdi-checkbox-blank-circle approved"
              title="Approved"></i>
              @elseif($leavelists->admin ==0)

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>

              @else

              <i class="mdi mdi-checkbox-blank-circle rejected"
              title="Rejected"></i>

              @endif  
              @if($leavelists->director ==1 && count($useridshowid) > 5)
              <i class="mdi mdi-checkbox-blank-circle approved"
              title="Approved"></i>

              @elseif($leavelists->director ==0 && count($useridshowid) > 5) 

              <i class="mdi mdi-checkbox-blank-circle pending"
              title="pending"></i>
              @elseif(count($useridshowid) > 5) 

              <i class="mdi mdi-checkbox-blank-circle rejected"
              title="Rejected"></i>

              @endif  


                                                  </div>
                                                  <div class="col-md-2">
                                                    <select class="form-control" id="status" name="status" required="">
                                                     <option value="">Selet status</option>
                                                     <option>Approve</option>
                                                     <option>Reject</option>
                                                   </select>
                                                 </div>
                                                 <input type="hidden" id="leaveid" name="leaveid" value="{{$leavelists->id}}">
                                                 <input type="hidden" id="user_id" name="user_id" value="{{$leavelists->user_id}}">
                                                 <input type="hidden" id="leavecount" name="leavecount" value="{{$leavelists->leave_type}}">
                                                 <div class="col-md-2">
                                                   @if($leavelists->manager == 1 && $leavelists->hr == 1 && $leavelists->admin == 1)
                                                   <div class="approved-bg">Approved</div>

                                                   @elseif($leavelists->manager == 2 || $leavelists->hr == 2 || $leavelists->admin == 2)


                                                   <div class="rejected-bg">Rejected</div>

                                                   @else

                                                   <div class="pending-bg">Pending</div>


                                                   @endif
                                                 </div>
                                               </div>
                                              </div>
                                               <div class="col-md-12">
                                                <div class="row">
                                       
                                              
                                           </div>
                                           <div class="row">
                                          

                                         @if(Auth::guard('main_users')->check() && Auth::guard('main_users')->user()->emprole == 3)

                                         <div class="col-md-6">
                                           <div class="form-group row m-0">
                                            <label for="empcode" class="col-lg-8 col-form-label">Reason</label>
                                            <div class="col-lg-4 col-form-label">
                                              <textarea id="reason" name="reason" maxlength="200" class="form-control" required></textarea>
                                            </div>
                                          </div>
                                        </div>
                                        @endif
                                      </div>

                                      <div class="row">
                                     
                                   </div>
                                   <div class="row">
                                    <div class="col-md-12">
                                     <div class="form-group row m-0">
                                      <label for="empcode" class="col-lg-4 col-form-label">Comment By Applicant</label>
                                      <div class="col-lg-8 col-form-label">
                                       <label class="myprofile_label">
                                         {{$leavelists->comment}}
                                       </label>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary float-right">Save</button>
                             <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Cancel</button>
                           </div>
                         </form>
                       </div>

                     </div>
                     <!-- /.modal-content -->
                   </div>

                   <!-- /.modal-dialog -->
                 </div>

                 @endforeach

                 @if(count($leavelist) == 0)
                 <tr><td colspan="9">No Recoud Found</td></tr>

                 @endif


               </tbody>
             </table>
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
     
    

           $("form#aproveModel").submit(function(e) {

 
            e.preventDefault();
             var token = "{{csrf_token()}}"; 
             $('#loadingDiv').show();

  $.ajax({
        url: '/aproveleave',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),

        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", data.msg, "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "success");
               location.reload();

          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", data.msg, "error");

          }
          
        }
      });

          });


   </script>

   @stop