    @extends('layouts.superadmin_layout')
   @section('content')

   <?php 
 
 $current_year = date('Y')-1;
   $preYear = (int) date('Y')-2;
   $currentYear = (int)date('Y');
  
   ?>
            
         <div class="content p-0">
                <div class="container-fluid">
                     @if (Session::has('message'))
         <div class="alert alert-{{Session::get('alert')}} alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{Session::get('message')}}</strong>
         </div>
         @endif
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Attendance Info</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Attendance
                                            Info</a></li>
                                </ol>
                                
                            </div>
                            @if(PermissionHelper::frontendPermission('import-attendance'))
                            <div class="col-sm-6 state_dist">
                                <button class="btn btn-primary float-right advance_setting">Attendance Upload <i class="fa fa-angle-right"></i></button>
                                <form method="post" action="{{URL::to('uploadattadancecsv')}}" enctype='multipart/form-data'>
                                       
                                        <div class="state_dist_wrapper">
                                            <div class="close_popup">
                                                <img src="../public/assets/images/close_icon.png" alt="" title="">
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                      <input type="file" name="upload_attadance"  class="form-control" style="padding:3px;"  />
                                                       {{ csrf_field() }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                    <div class="form-group">
                                                      <input type="submit" name="upload" value="Upload" class="btn btn-primary float-right">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            <!--<form method="post" action="{{URL::to('uploadattadancecsv')}}" enctype='multipart/form-data'>-->
                            <!--    <input type="file" name="upload_attadance"  class="form-control"  />-->
                            <!--      {{ csrf_field() }}-->
                            <!--    <input type="submit" name="upload" value="Upload" class="btn btn-primary float-right">-->
                            <!--    </form>-->
                                </div>
                              @endif

                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                 <form method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Employee <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                       <select class="form-control js-example-basic-single" name="user_id" id="user_id">
                                                           @foreach($userlist as $userlist)
                                                        <option value="{{$userlist->id}}" @if($userid == $userlist->id) selected @endif >{{ucwords($userlist->userfullname)}}</option>
                                                           @endforeach


                                                       

                                                       
                                                    </select>
                                                       <!--<input type="text" name="emp_name" id="emp_name" class="form-control" value="{{$name??''}}" placeholder="Enter Employee Name" />-->
                                                       <!--<div id="empList">-->
                                                       <!-- <input id="userid" name="userid" type="hidden" value="{{$userid??0}}">-->
                                                       <!--</div>-->
                                                     
                                                      <!--{{ csrf_field() }}-->
                                                  <!--   <select class="form-control">
                                                  <!--      <option>Select</option>-->
                                                  <!--      <option>Nisha Upreti</option>-->
                                                  <!--      <option>Diksha Saini</option>-->
                                                  <!--      <option>Rajesh Yadav</option>-->
                                                  <!--      <option>RIshab</option>-->
                                                  <!--      <option>Pooja</option>-->
                                                  <!--      <option>Nitish</option>-->
                                                  <!--  </select> -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                           {{ csrf_field() }}
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Select
                                                    Month <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                      
                                                       <select class="form-control js-example-basic-single" name="month" id="month">
                                                        <option value="">Select</option>
                                                        <?php 
                                             for($x = 1; $x <= (int)date('m'); $x++) {
                                              $value = str_pad($x,2,"0",STR_PAD_LEFT); 
                                               $sel=($month==$value)?'selected':'';?>
                                   
                                              <option value="<?php echo $value; ?>" <?=$sel?>><?php echo $value; ?></option>
                                        <?php } ?>  
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Select
                                                    Year <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                         
                                                     <select class="form-control js-example-basic-single" name="year" id="year">
                                                        <option value="">Select</option>
                                                         <?php 
                                                         $y = 0;
                                                         for($i=$preYear; $i < $currentYear; $i++){ 
                                                            $y++;
                                                           ?>
                                            <option value="<?php echo ($preYear + $y); ?>" @if(date('Y') == ($preYear + $y))  selected  @endif><?php echo ($preYear + $y); ?></option>
                                        <?php } ?>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary float-right">Generate Report</button>
                                        </div>
                                    </div>
                                   </form>
                                    <hr class="m-t-5 m-b-5">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="mt-0 mb-0 inline-block">{{ucwords($name)??''}}</h5>
                                            <p class="mb-0 inline-block text-danger">(Showing records from {{$range??''}})</p>
                                            <!-- <button class="btn btn-primary float-right">Export</button> -->
                                            <hr class="m-t-5 m-b-5">
                                        </div>
                                        <div class="col-sm-12 m-b-10">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <strong>Present:</strong>
                                                    <span>{{count($presentCount)??0}}</span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <strong>Leaves:</strong>
                                                    <span>{{count($countleave)??0}}</span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <strong>Absent/FTS:</strong>
                                                    <span>{{count($absetCount)??0}}</span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <strong>WeekOffs:</strong>
                                                    <span>{{count($weekendoff)??0}}</span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <strong>Holidays:</strong>
                                                    <span>{{count($holyday)??0}}</span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <strong>Data NA:</strong>
                                                    <span>11</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="legend">
                                                <div class="legendstyle">
                                                    <strong>Legends: </strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="leave"><i class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Leave</strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="lwp"><i class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Leave without Pay</strong>
                                                </div>
                                                  <div class="legendstyle">
                                                    <span class="hpl"><i class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Half Pay Leave</strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="halfday"><i class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Halfday</strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="correction"><i
                                                            class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Correction</strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="forgetcheckin"><i
                                                            class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Forget to Check-In</strong>
                                                </div>
                                                   <div class="legendstyle">
                                                    <span class="forgetcheckout"><i
                                                            class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Forget to Check-Out</strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="workfromhome"><i
                                                            class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Work from home</strong>
                                                </div>
                                                <div class="legendstyle">
                                                    <span class="holiday"><i class="mdi mdi-checkbox-blank"></i></span>
                                                    <strong>Holiday</strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 attendanceinfo">
                                            <ul class="nav nav-pills nav-justified m-t-20" role="tablist">

                                                @php($i = 1)
                                                @foreach($attchunk as $k=>$attchunks)
                                               <?php 
                                               if($k ==0){
                                                 $active = 'active';

                                               }else{

                                                 $active = '';

                                               }
                                              

                                               ?>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link b-r-0 {{$active}}" data-toggle="tab" href="#week-{{$k}}"
                                                        role="tab">
                                                        <span class="d-block d-sm-none">
                                                            <img src="assets/images/week1.png" width="22px"
                                                                class="img-responsive">
                                                        </span>
                                                        <span class="d-none d-sm-block">Week {{$i++}}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                              
                                            </ul>


                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                           
                                               @foreach($attchunk as $k=>$attchunks)
                                               <?php 
                                               if($k ==0){
                                                 $active = 'active';

                                               }else{

                                                 $active = '';

                                               }
                                              

                                               ?>
                                                <div class="tab-pane p-3 p-t-0 {{$active}}" id="week-{{$k}}" role="tabpanel">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table mb-0 text-center border-table font-12">
                                                                <thead class="thead-light">
                                                                    
                                                                    <tr>
                                                                        <th>Days</th>
                                                                           @foreach($attchunks as &$showdate)
                                                                        <th>{{date('D d M',strtotime($showdate))}}</th>
                                                                        @endforeach
                                                                       <!--  <th>Mon 16 Sep</th>
                                                                        <th>Tue 17 Sep</th>
                                                                        <th>Wed 18 Sep</th>
                                                                        <th>Thu 19 Sep</th>
                                                                        <th>Fri 20 Sep</th>
                                                                        <th>Sat 21 Sep</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Status</th>
                                                                         @foreach($attchunks as &$showdate)

                                                                        @php($getIntime = (array)getAttendeceRecoud($userid,$showdate))

                                                                        
                                                                         @if( isset($getIntime['status']) && $getIntime['status'] == 'CORR')

                                                                         @php($class = 'correction')

                                                                         @elseif(isset($getIntime['status']) && $getIntime['status'] == 'HL')
                                                                         @php($class = 'halfday')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'LWP')
                                                                         @php($class = 'leavewithoutpay')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'FTS')
                                                                         @php($class = 'forgetinfinger')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'WFH')
                                                                         @php( isset($getIntime['status']) &&  $class = 'workformhome')

                                                                         @else

                                                                         @php($class = '')

                                                                         @endif
                                                                      

                                                                
                     

                                                                         @if(date('D',strtotime($showdate)) == 'Sun' || date('D',strtotime($showdate)) == 'Sat')

                                                                            <td class="wo">WO</td>

                                                                       @elseif(isset($getIntime['intime']) && !empty($getIntime['intime']))
                                                                       <td class="{{$class}}">{{$getIntime['status']}}</td>

                                                                        

                                                                     

                                                                        @elseif(in_array(date('Ymd',strtotime($showdate)),$leavedata))
                                                                           <td class="Leave">L</td>


                                                                           @elseif(in_array(date('Ymd',strtotime($showdate)),$holidayArr))
                                                                           <td class="holiday">H</td>
                                                                         @else

                                                                         <td>--</td>
                                                                         @endif
                                                                        
                                                                        @endforeach
                                                                        <!-- <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td class="wo">WO</td> -->
                                                                    </tr>
                                                                    <tr>
                                                                        <th>InTime</th>
                                                                         @foreach($attchunks as &$showdate)

                                                                         @php($getIntime = (array) getAttendeceRecoud($userid,$showdate))

                                                                           @if( isset($getIntime['status']) && $getIntime['status'] == 'CORR')

                                                                         @php($class = 'correction')

                                                                         @elseif(isset($getIntime['status']) && $getIntime['status'] == 'HL')
                                                                         @php($class = 'halfday')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'LWP')
                                                                         @php($class = 'leavewithoutpay')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'FTS')
                                                                         @php($class = 'forgetinfinger')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'WFH')
                                                                         @php( isset($getIntime['status']) &&  $class = 'workformhome')

                                                                         @else

                                                                         @php($class = '')

                                                                         @endif
                                                                   


                     

                                                                         @if(date('D',strtotime($showdate)) == 'Sun' || date('D',strtotime($showdate)) == 'Sat')

                                                                         <td class="wo">WO</td>

                                                                         @elseif(isset($getIntime['intime']) && !empty($getIntime['intime']))

                                                                           <td class="{{$class}}">{{ second_to_hhmm(explode_time($getIntime['intime']))}}</td>





                                                                           @elseif(in_array(date('Ymd',strtotime($showdate)),$leavedata))
                                                                           <td class="Leave">--</td>

                                                                              @elseif(in_array(date('Ymd',strtotime($showdate)),$holidayArr))
                                                                           <td class="holiday">--</td>

                                                                    
                                                                         @else

                                                                         <td>--</td>
                                                                         @endif
                                                                        
                                                                        @endforeach
                                                                       <!--  <td class="wo">WO</td> -->
                                                                        <!-- <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td>NA</td>
                                                                        <td class="wo">WO</td> -->
                                                                    </tr>
                                                                    <tr>
                                                                        <th>OutTime</th>
                                                                       @foreach($attchunks as &$showdate)

                                                                        @php($getIntime = (array) getAttendeceRecoud($userid,$showdate))

                                                                         @if( isset($getIntime['status']) && $getIntime['status'] == 'CORR')

                                                                         @php($class = 'correction')

                                                                         @elseif(isset($getIntime['status']) && $getIntime['status'] == 'HL')
                                                                         @php($class = 'halfday')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'LWP')
                                                                         @php($class = 'leavewithoutpay')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'FTS')
                                                                         @php($class = 'forgetinfinger')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'WFH')
                                                                         @php( isset($getIntime['status']) &&  $class = 'workformhome')

                                                                         @else

                                                                         @php($class = '')

                                                                         @endif
                                                                        


                                                                         @if(date('D',strtotime($showdate)) == 'Sun' || date('D',strtotime($showdate)) == 'Sat')

                                                                         <td class="wo">WO</td>


                                                                         @elseif(isset($getIntime['outtime']))



                                                   <td class="{{$class}}"> {{ second_to_hhmm(explode_time($getIntime['outtime']))}} </td>



                                                                           @elseif(in_array(date('Ymd',strtotime($showdate)),$leavedata))
                                                                           <td class="Leave">--</td>

                                                                              @elseif(in_array(date('Ymd',strtotime($showdate)),$holidayArr))
                                                                           <td class="holiday">--</td>
                                                                    
                                                                         @else

                                                                         <td>--</td>
                                                                         @endif
                                                                        
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Duration</th>
                                                                        @foreach($attchunks as &$showdate)


                                                                         @php($getIntime = (array) getAttendeceRecoud($userid,$showdate))

                                                                          @if( isset($getIntime['status']) && $getIntime['status'] == 'CORR')

                                                                         @php($class = 'correction')

                                                                         @elseif(isset($getIntime['status']) && $getIntime['status'] == 'HL')
                                                                         @php($class = 'halfday')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'LWP')
                                                                         @php($class = 'leavewithoutpay')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'FTS')
                                                                         @php($class = 'forgetinfinger')

                                                                         @elseif( isset($getIntime['status']) &&  $getIntime['status'] == 'WFH')
                                                                         @php( isset($getIntime['status']) &&  $class = 'workformhome')

                                                                         @else

                                                                         @php($class = '')

                                                                         @endif
                                                                          
                                                                         @if(date('D',strtotime($showdate)) == 'Sun' || date('D',strtotime($showdate)) == 'Sat')

                                                                         <td class="wo">WO</td>


                                                                         @elseif(isset($getIntime['intime']) && isset($getIntime['outtime']))

                                                              <?php

             $start_datetime = new DateTime($showdate.' '.$getIntime['intime']);
             $end_datetime = new DateTime($showdate.' '.$getIntime['outtime']);


                                              
                                                              ?>

                   <td class="{{$class}}">{{ $start_datetime->diff($end_datetime)->format('%h:%I') }}</td>



                                                                      

                                                                            @elseif(in_array(date('Ymd',strtotime($showdate)),$leavedata))
                                                                           <td class="Leave">--</td>

                                                                              @elseif(in_array(date('Ymd',strtotime($showdate)),$holidayArr))
                                                                           <td class="holiday">--</td>
                                                                    
                                                                         @else

                                                                         <td>--</td>
                                                                         @endif
                                                                        
                                                                        @endforeach
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                             <div class="col-sm-12">
                                            <div class="row">
                                                @php($i = 1)
                                                @foreach($weeklyTotalhour as $k => &$weeklyTotalhour)
                                                <div class="col-sm-6">
                                                    <strong>Week {{$i++}} :</strong>
                                                    <span class="text-danger">Required Hours:</span>
                                                    <span>{{$weeklyTotalhour['cnt'][$k]}}.00</span>
                                                    <span class="text-danger">Total Hours :</span>
                                                    <span>{{ ($weeklyTotalhour[$k] ==0)?'00:00:00': $weeklyTotalhour[$k]}}</span>
                                                    <span class="text-danger">Leave Marked :</span>
                                                    <span>NA</span>
                                                </div>
                                                @endforeach
                                             <!--    <div class="col-sm-6 text-right">
                                                    <strong>Week 2 :</strong>
                                                    <span class="text-danger">Required Hours:</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Total Hours :</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Leave Marked :</span>
                                                    <span>NA</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <strong>Week 3 :</strong>
                                                    <span class="text-danger">Required Hours:</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Total Hours :</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Leave Marked :</span>
                                                    <span>NA</span>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <strong>Week 4 :</strong>
                                                    <span class="text-danger">Required Hours:</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Total Hours :</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Leave Marked :</span>
                                                    <span>NA</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <strong>Week 5 :</strong>
                                                    <span class="text-danger">Required Hours:</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Total Hours :</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Leave Marked :</span>
                                                    <span>NA</span>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <strong>Week 6 :</strong>
                                                    <span class="text-danger">Required Hours:</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Total Hours :</span>
                                                    <span>0.00</span>
                                                    <span class="text-danger">Leave Marked :</span>
                                                    <span>NA</span>
                                                </div>
                                            </div> -->
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




           @stop

                 @section('extra_js')

  <script type="text/javascript">
                    
 $(document).ready(function(){

 $('#emp_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/searchemp",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#empList').fadeIn();  
                    $('#empList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#emp_name').val($(this).text());  
        $('#empList').fadeOut();  
    });  

});

 $(".advance_setting").on("click", function(){
            $(".state_dist_wrapper").addClass("state_dis_cls");
        });
        $(".close_popup").on("click", function(){
           $(".state_dist_wrapper").removeClass("state_dis_cls"); 
        });
                 </script>


                 @stop