    @extends('layouts.superadmin_layout')
   @section('content')
            
         <!-- Start content -->
                   <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Attendance to Approve</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Attendance to
                                            Approve</a>
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                        href="#home1" role="tab"><span class="d-block d-sm-none"><i
                                                                class="fas fa-home"></i></span> <span
                                                            class="d-none d-sm-block">Attendance Approve Request</span></a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                        href="#timeallocation" role="tab"><span
                                                            class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                        <span class="d-none d-sm-block">Night Shift Approve Request</span></a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3" id="home1" role="tabpanel">
                                                    <div class="col-sm-12 p-0 m-t-20">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>
                                                                    Employee
                                                                </th>
                                                                 <th>Action</th>
                                                                <th>Date</th>
                                                                <th>Actual In</th>
                                                                <th>Actual Out</th>
                                                                <th>Status</th>
                                                                <th>Proposed In</th>
                                                                <th>Proposed Out</th>
                                                                 <th>Preposed Status</th>
                                                                
                                                              
                                                                <th>Reason Of Correction</th> 
                                                                 @if(PermissionHelper::frontendPermission('view-attendence'))
                                                                 <th>Action</th> 
                                                                 @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          @php($i =1)
                                                          @foreach($approvalList as $approvalLists)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                
                                                                <td>{{$approvalLists->userfullname}}</td>
                                                                
                                                                
                                                                  <td>
                                                                      
                                                                      @if($approvalLists->is_active == 2)
                                                                       Pending
                                                                       @elseif($approvalLists->is_active == 3)
                                                                       Approved
                                                                       @else
                                                                       
                                                                       Reject
                                                                       @endif
                                                                  
                                                                  </td>
                                                              
                                                <td>{{date('d-M-Y',strtotime($approvalLists->entry_date))}}</td>
                                                <td>{{date('H:i:s',strtotime($approvalLists->actual_intime))}}</td>
                                                <td>{{date('H:i:s',strtotime($approvalLists->actual_outtime))}}</td>
                                                <td>{{$approvalLists->actual_status}}</td>
                                                <td>{{date('H:i:s',strtotime($approvalLists->preposed_intime))}}</td>
                                                <td>{{date('H:i:s',strtotime($approvalLists->preposed_outtime))}}</td>
                                                <td>{{$approvalLists->preposed_status}}</td>
                                                <td>{{$approvalLists->reason}}</td>
                                                 @if(PermissionHelper::frontendPermission('view-attendence'))
                
                                                <td>
                
                                                        @if($approvalLists->is_active == 2)
                                                    <i class="fa fa-eye font-blue m-r-5" title="View" data-toggle="modal"
                                                        data-target="#attendanceapprove_{{$approvalLists->id}}"></i>
                                                        @endif
                                                     
                                                        <!--   @if(PermissionHelper::frontendPermission('view-attendence'))
                                                    <i class="text-primary fa fa-check m-r-5" title="Approve"></i>
                                                    @endif
                                                       @if(PermissionHelper::frontendPermission('view-attendence'))
                
                                                    <i class="text-danger fa fa-times" title="Reject"></i>
                
                                                    @endif -->
                                                </td>
                                                 @endif
                                                <!-- <td>Correction</td> -->
                                                </tr>
                
                                                  <!-- attendance to approve -->
                    <div id="attendanceapprove_{{$approvalLists->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Attendance to Approve</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Employee</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{$approvalLists->userfullname}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empid" class="col-lg-8 col-form-label">Date</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{date('d-M-Y',strtotime($approvalLists->entry_date))}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Actual In</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{date('H:i:s',strtotime($approvalLists->actual_intime))}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Actual Out</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{date('H:i:s',strtotime($approvalLists->actual_outtime))}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Status</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{$approvalLists->actual_status}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Proposed In</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{date('H:i:s',strtotime($approvalLists->preposed_intime))}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Proposed Out</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{date('H:i:s',strtotime($approvalLists->preposed_outtime))}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-8 col-form-label">Proposed Status</label>
                                                        <div class="col-lg-4 col-form-label">
                                                            <label class="myprofile_label">{{$approvalLists->preposed_status}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row m-0">
                                                        <label for="empcode" class="col-lg-4 col-form-label">Reason</label>
                                                        <div class="col-lg-8 col-form-label p-l-4">
                                                            <label class="myprofile_label">
                                                               {{$approvalLists->reason}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                      @if(PermissionHelper::frontendPermission('edit-attendence'))
                                    <button onclick="attendace('{{$approvalLists->id}}','{{$approvalLists->empid}}')" class="btn btn-primary float-right">Approve</button>
                                    @endif
                                    @if(PermissionHelper::frontendPermission('delete-attendence'))
                                    <button onclick="rejctattendace('{{$approvalLists->id}}','{{$approvalLists->empid}}')" class="btn btn-danger float-right">Reject</button>
                                    @endif
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                
                
                
                
                                                @endforeach
                                          
                                            </tbody>
                                            </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane p-3" id="timeallocation" role="tabpanel">
                                                    <div class="col-sm-12 p-0 m-t-20">
                                                        <table id="example" class="table table-bordered dt-responsive nowrap text-center"
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <th>S.No</th>
                                                            <th>Employee</th>
                                                            <th>From Date</th>
                                                            <th>To Date</th>
                                                            <th>Shift</th>
                                                             <th>Status</th>
  							    <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                            @php($i = 1)
                                                           @foreach($nstime as $nstimes)

                                                              <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$nstimes->userfullname}}</td>
                                                                <td>{{date('d M Y', strtotime($nstimes->from_date))}}</td>
                                                                <td>{{date('d M Y', strtotime($nstimes->to_date))}}</td>
                                                                <td>{{$nstimes->user_status}}</td>
                                                                 <td>



                                                                    {{ucwords($nstimes->status)}}

                                                                </td>
								<td>

                                    @if($nstimes->status == 'pending')
								    <span onclick="aprovalStatus('{{$nstimes->id}}',1)" class="m-r-5 text-primary">Approved</span>
								    <span  onclick="aprovalStatus('{{$nstimes->id}}',2)" class="text-danger">Rejected</span>

                                    @endif
								</td>
                                                            </tr>

                                       @endforeach

  							  
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
                <!-- end col -->
            </div>




           @stop


            @section('extra_js')

            <script type="text/javascript">
		$('#example').DataTable({});
                function attendace(att_temp_id,user_id){

                           $('#loadingDiv').show();

    var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/approve_attendace',
        type: "post",
        data: {"_token": _token,"userid":user_id,"att_temp_id":att_temp_id},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.attendace); // this is good

       // return false;
    
          if(data.status ==200){
          

               $('#loadingDiv').hide();
            swal("Good job!",data.msg , "success");
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
             swal("Good job!",data.msg , "error");
             

          }
          
        }
      });
                }
                
 function rejctattendace(att_temp_id,user_id){

     $('#loadingDiv').show();

    var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/reject_attendace',
        type: "post",
        data: {"_token": _token,"userid":user_id,"att_temp_id":att_temp_id},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.attendace); // this is good

       // return false;
    
          if(data.status ==200){
           

               $('#loadingDiv').hide();
            swal("Good job!",data.msg , "success");
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
             swal("Good job!",data.msg , "error");
             

          }
          
        }
      });

 }


function aprovalStatus(ns_req_id,status){

         $('#loadingDiv').show();

    var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/ns-aproval-status',
        type: "post",
        data: {"_token": _token,"status":status,"ns_req_id":ns_req_id},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.attendace); // this is good

       // return false;
    
          if(data.status ==200){
           

               $('#loadingDiv').hide();
            swal("Good job!",data.msg , "success");
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
             swal("Good job!",data.msg , "error");
             

          }
          
        }
      });

}

            </script>


            @stop

        