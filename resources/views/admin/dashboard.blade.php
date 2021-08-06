@extends('layouts.superadmin_layout')
@section('content')
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
                    <h4>{{$dashboad['PL']??0}}<h4>
                        <p class="font-12">Provisional Leaves</p>
                    </div>
                    <div class="dash-stats-list">
                        <h4>{{$dashboad['CL']??0}}</h4>
                        <p class="font-12">Casual Leave</p>
                    </div>
                </div>
                <!-- <h4 class="font-500">18 </h4> -->
                <div class="mini-stat-label bg-primary">
                    <p class="mb-0">{{$dashboad['total_use_leave']??0}}</p>
                </div>
            </div>
            
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
                    <h4>{{$dashboad['TotalUnderUserActive']??0}}</h4>
                    <p class="font-12">Reportees</p>
                </div>
                <div class="dash-stats-list">
                    <h4>{{$dashboad['pendingLeave']??0}}</h4>
                    <p class="font-12">Leaves To Approve</p>
                </div>
            </div>
            <div class="mini-stat-label bg-primary">
                <p class="mb-0">{{$dashboad['TotalUnderUser']??0}}</p>
            </div>
        </div>
        
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
                    <h4>{{$dashboad['FTS']??0}}</h4>
                    <p class="font-12">FTS</p>
                </div>
                <div class="dash-stats-list">
                    <h4>{{$dashboad['AttedanceCorrection']??0}} </h4>
                    <p class="font-12">To Approve</p>
                </div>
            </div>
            <div class="mini-stat-label bg-primary">
                <p class="mb-0">{{$dashboad['totalworkday']??0}}</p>
            </div>
        </div>
        
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
                    <h4>{{$dashboad['managerProject']??0}}</h4>
                    <p class="font-12">As Project Manager</p>
                </div>
                <div class="dash-stats-list">
                    <h4>{{$dashboad['memberProject']??0}}</h4>
                    <p class="font-12">Just A Member</p>
                </div>
            </div>
            <div class="mini-stat-label bg-primary">
                <p class="mb-0">{{$dashboad['TotalProject']??0}}</p>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>


@if(count($approvalList) !=0)
<div class="col-sm-12 p-0">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title mb-4">
                <div class="row">
                    <div class="col-sm-6 col-6 p-r-0">Attendance Request Pending For Approval</div>
                    <div class="col-sm-6 col-6">

                        <?php
                        
                        $arrUser = [];
                        $findunderUser = DB::table('main_users')->where('reporting_manager',$userid)->where('isactive',1)->select('id')->get();
                        
                        
                        foreach($findunderUser as $key => $findunderUsers) {
                           $arrUser[] =  $findunderUsers->id;
                       }
                       ?>
                       @if(count($arrUser) > 0)


                       <span class="float-right">
                        <button onclick="correctionAttedance('Approve')"
                        class="btn btn-primary">Approve</button>
                        <button onclick="correctionAttedance('Reject')" class="btn btn-default">Reject</button>
                    </span>
                    @endif
                </div>
            </div>
        </h4>
        <div class="row">
            <div class="col-sm-12 table-responsive p-0">
               <table class="datatable table table-bordered dt-responsive nowrap font-14"
               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
               <thead>
                <tr>
                    <th>S.No</th>
                    <th>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input checkall" type="checkbox" name="checkall"
                            id="remember">
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
                        <input class="custom-control-input pendingAttendace" type="checkbox"
                        {{$attcls}} name="check" id="remember" value="{{$approvalLists->id}}"
                        data-attDate="{{$approvalLists->entry_date}}"
                        data-userid="{{$approvalLists->empid}}">
                        <label class="custom-control-label" for="customControlInline remember">
                        </label>
                    </div>
                </td>
                <td class="pending-bg">
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
</div>
</div>
@endif

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
      
      <!--<tr id="b_wish_div">-->
        <!--   <td>-->
            <!--      <input type="text" class="form-control" placeholder="Comment here...">-->
            <!--   </td>-->
            <!--   <td class="text-right">-->
                <!--      <span class="badge badge-success">Send</span>-->
                <!--      <span class="badge badge-success" id="b-cancel">Cancel</span>-->
                <!--   </td>-->
                <!--</tr>-->
                <!--<tr>-->
                    <!--   <td colspan="2" class="p-tb-5">-->
                        <!--      <div class="notice-board">-->
                            <!--         <div class="table-img">-->
                                <!--            <div class="e-avatar mr-3"><img-->
                                    <!--                  class="img-fluid thumb-sm rounded-circle mr-2"-->
                                    <!--                  src="assets/images/users/user-3.jpg" alt="Danny Ward"></div>-->
                                    <!--         </div>-->
                                    <!--         <div class="notice-body">-->
                                        <!--            <h6 class="m-0 font-500">Rani Ahuja</h6>-->
                                        <!--            <span class="ctm-text-sm">1 Year Completion | 12 Jan 2020</span>-->
                                        <!--         </div>-->
                                        <!--      </div>-->
                                        <!--   </td>-->
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

                     <h4 class="mt-0 header-title mb-4">Company Announcements</h4>
                      @php($i = 1)
                      @foreach($announment as $announments)
                      <?php
                      if($i % 2 == 0){
                        $cl = 'alert-success';
                      }else{

                        $cl = 'alert-info';

                      }
                      
                      ?>
                     <div class="alert {{$cl}}" role="alert">{{$announments->title}} <span
                       class="font-12 text-dark"> {{date('D, M d',strtotime($announments->created_at)) }} </span></div>

                       @endforeach

                   
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




        function show_wish_dob(dob) {
            $("#b_wish_" + dob).show();
        }


        function close_pop(id) {
            $("#b_wish_" + id).hide();
        }

        function submitcomment(birthday_user_id) {

            var comment = $('#comment_' + birthday_user_id).val();

            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/sendnotification',
                type: "post",
                data: { "_token": _token, "birthday_user_id": birthday_user_id, "comment": comment },
                dataType: 'JSON',

                success: function (data) {
                //console.log(data.city); // this is good

                if (data.status == 200) {
                    $('#loadingDiv').hide();
                    $("#b_wish_" + birthday_user_id).hide();

                    alertify.success(data.msg);




                } else {

                    $('#loadingDiv').hide();


                    alertify.error(data.msg);

                }

            }
        });


        }

    </script>



    <script type="text/javascript">


        function aprovelstatus(status) {




            leaveid = [];
            userid = [];

        // if is checked
        if ($('.pendingleave').is(':checked')) {


            $('.pendingleave').parent().find('input[type=checkbox]:checked').each(function () {
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
                data: { "_token": _token, leave_id: leave_id, user_id: user_id, status: status },
                // dataType: 'JSON',

                success: function (data) {
                    //console.log(data.city); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();


                        swal("Good job!", data.msg, "success");

                        location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        swal("Good job!", data.msg, "success");
                        location.reload();

                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        swal("Good job!", data.msg, "success");


                    } else {

                        $('#loadingDiv').hide();

                        swal("Good job!", data.msg, "error");

                    }

                }
            });



        }


    }





    function correctionAttedance(status) {




        attendace_id = [];
        user_id = [];
        attdanceDate = [];

        // if is checked
        if ($('.pendingAttendace').is(':checked')) {


            $('.pendingAttendace').parent().find('input[type=checkbox]:checked').each(function () {
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
                data: { "_token": _token, attendace_id: attendace_id, user_id: user_id, status: status, attdanceDate: attdanceDate },
                // dataType: 'JSON',

                success: function (data) {
                    //console.log(data.city); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();


                        swal("Good job!", data.msg, "success");

                        location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        swal("Good job!", data.msg, "success");
                        location.reload();

                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        swal("Good job!", data.msg, "success");


                    } else {

                        $('#loadingDiv').hide();

                        swal("Good job!", data.msg, "error");

                    }

                }
            });



        }


    }





    function ns_Attedance(status) {




        var ns_id = [];


        // if is checked
        if ($('.ns_user_id').is(':checked')) {


            $('.ns_user_id').parent().find('input[type=checkbox]:checked').each(function () {
                ns_id.push($(this).val());

            });





            ns_id = JSON.stringify(ns_id);


            $('#loadingDiv').show();
            var _token = "{{csrf_token()}}";

            $.ajax({
                url: '/ns_approvel',
                type: "post",
                data: { "_token": _token, ns_id: ns_id, status: status },
                // dataType: 'JSON',

                success: function (data) {
                    //console.log(data.city); // this is good

                    if (data.status == 200) {
                        $('#loadingDiv').hide();


                        swal("Good job!", data.msg, "success");

                        location.reload();

                    } else if (data.status == 202) {

                        $('#loadingDiv').hide();
                        swal("Good job!", data.msg, "success");
                        location.reload();

                    } else if (data.status == 203) {

                        $('#loadingDiv').hide();
                        swal("Good job!", data.msg, "success");


                    } else {

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