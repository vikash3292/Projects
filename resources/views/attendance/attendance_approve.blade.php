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

                                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist" id="myTab">

                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"

                                                        href="#home1" role="tab"><span class="d-block d-sm-none"><i

                                                                class="fas fa-calendar"></i></span> <span

                                                            class="d-none d-sm-block">Attendance Approve Request</span></a></li>

                                                <li class="nav-item"><a class="nav-link" data-toggle="tab"

                                                        href="#timeallocation" role="tab"><span

                                                            class="d-block d-sm-none"><i class="fa fa-user"></i></span>

                                                        <span class="d-none d-sm-block">On Duty Request</span></a>

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

                                                                <th>Action</th>

                                                                

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

                                                <td>{{$approvalLists->preposed_status}}</td>

                                                <!-- <td>Correction</td> -->

                                                </tr>

                

                                                  <!-- attendance to approve -->

                   

                

                

                

                

                                                @endforeach











                                                @foreach($underUser as $approvalLists)

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

                                                <td>



                                                @if($approvalLists->is_active == 2)

<span onclick="corraprovalStatus('{{$approvalLists->id}}',1)" class="m-r-5 text-primary">Approved</span>

<span  onclick="corraprovalStatus('{{$approvalLists->id}}',2)" class="text-danger">Rejected</span>



@endif



</td> 

                                                <!-- <td>Correction</td> -->

                                                </tr>

                

                                                  <!-- attendance to approve -->

                   

                

                

                

                

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

                                                            

  							    <th>Action</th>

                                                        </thead>

                                                        <tbody>

                                                        <?php

                                                        

                                                        ?>

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

                                                            </tr>



                                       @endforeach







                                       @foreach($nsunderUsewr as $nstimes)



<tr>

  <td>{{$i++}}</td>

  <td>{{$nstimes->userfullname}}</td>

  <td>{{date('d M Y', strtotime($nstimes->from_date))}}</td>

  <td>{{date('d M Y', strtotime($nstimes->to_date))}}</td>

  <td>{{$nstimes->user_status}}</td>

  

<td>



@if($nstimes->status == 'pending')

<span onclick="aprovalStatus('{{$nstimes->id}}',1)" class="m-r-5 text-primary">Approve</span>

<span  onclick="aprovalStatus('{{$nstimes->id}}',2)" class="text-danger">Reject</span>

@else



  {{ucwords($nstimes->status)}}



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









        function corraprovalStatus(att_temp_id,status){





            $('#loadingDiv').show();



var _token = "{{csrf_token()}}";



$.ajax({

    url: '/approve_attendace',

    type: "post",

    data: {"_token": _token,"status":status,"att_temp_id":att_temp_id},

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



// active tab on reload

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



        