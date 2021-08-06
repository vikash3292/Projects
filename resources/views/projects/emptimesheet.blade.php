

@extends('layouts.superadmin_layout')
@section('content')

@section('extra_css')

 <?php 
 
 $current_year = date('Y')-1;
  $future_year = date('Y');


   ?>
   
   <?php 
 
 $current_year = date('Y')-1;
  $future_year = date('Y');


   ?>

<style>

.without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }

 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }

</style>


@stop

 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Timesheet</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Timesheet</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right">
                                <span class="font-600 m-r-10">Legend:</span>
                                <span class="time_legend bg-blank">Leave</span>
                                <span class="time_legend bg-weekend">Week Off</span>
                                <span class="time_legend bg-approx">Estimate Hr</span>
                                <span class="time_legend bg-equalhr">Actual Hr</span>
                                <span class="time_legend bg-free">Free Hr</span>
                                </div>
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
                                              
                                                   @if(PermissionHelper::frontendPermission('user-timsheet'))
                                                <li  class="nav-item"><a href="{{URL::to('/user-timesheet')}}" onclick="timesheet('user')" class="nav-link " ><span class="d-block d-sm-none"><i
                                                                class="fas fa-home"></i></span> <span
                                                            class="d-none d-sm-block">Timesheet</span></a></li>
                                                            @endif
                                                      <!--  @if(PermissionHelper::frontendPermission('assign-timesheet'))        
                                                <li class="nav-item"><a  href="{{URL::to('/timesheet')}}" onclick="timesheet('allocation')" class="nav-link" ><span
                                                            class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                        <span class="d-none d-sm-block">Timesheet Allocation</span></a>
                                                </li>
                                                      @endif -->
                                                   @if(PermissionHelper::frontendPermission('emp-approvel'))        
                                                <li  class="nav-item"><a href="{{URL::to('/emp-timesheet')}}" onclick="timesheet('emp')" class="nav-link active" ><span class="d-block d-sm-none"><i
                                                                class="far fa-user"></i></span> <span
                                                            class="d-none d-sm-block">Employee Timesheet</span></a></li>
                                                                  @endif
                                            </ul>
                                            <!-- Tab panes -->
                                               <div class="tab-content">
                                                <div class="tab-pane  p-3" id="home1" role="tabpanel">
                                                    <div class="col-sm-12 p-0 m-t-20">
                                                        <div class="row">
                                                            <div class="col-sm-6 p-r-0">
                                                                <h6 class="m-0 bg-naviblue">Name</h6>
                                                            </div>
                                                            <div class="col-sm-6 p-l-0">
                                                                <h6 class="m-0 bg-naviblue text-center">Actual
                                                                    Hours
                                                                    in Week 1</h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 p-r-0">
                                                                <h6 class="m-0 bg-light padding-5">
                                                                    <form role="search" class="app-search"
                                                                        style="height: 0;">
                                                                        <div class="form-group mb-0">
                                                                            <input type="text" class="form-control m-0"
                                                                                placeholder="Search by Name..">
                                                                            <button type="submit" style="top:10px"><i
                                                                                    class="fa fa-search"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </h6>
                                                            </div>
                                                            
                                                             <?php
                                                                            
                                                                            $startDate = $daterange[0];
                                                                            $endDate = $daterange[6];
                                                                            $showDate = date('Y-m',strtotime($startDate));
                                                                            $showMonth = date('F',strtotime($daterange[6]));
                                                                            $currentYear = date('Y',strtotime($startDate));
                                                                            $currentMonth = date('m',strtotime($startDate));
                                                                             $endtDate = $daterange[1];
                                                                             $startDay = date('d',strtotime($startDate));
                                                                            $endDay = date('d',strtotime($endtDate));
                                                                          //  dd($daterange[6]);
                                                                          
                                                                            ?>      
                                                            <div class="col-sm-6 p-l-0">
                                                                <h6
                                                                    class="m-0 text-center bg-light p-10 cursorpointer font-20">
                                                                    <span class="relative">
                                                                    <i class="fa fa-calendar-alt m-r-5"
                                                                        id="datepicker"></i><input type="hidden"
                                                                        id="dp" />December
                                                                    <div class="tableabsolute">
                                                                        <table border="1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td colspan="3" class="form-group">
                                                                                        <select class="form-control" id="getyear">
                                                                                          <?php for($i=0; $i < 5; $i++){ 
                                                                                                 
                                                                                               
                                                     
                                                           ?>
                                            <option value="<?php echo ($current_year+$i); ?>" <?php echo ($future_year == $current_year+$i)?'selected':'';?>><?php echo ($current_year+$i); ?></option>
                                        <?php } ?>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tr>
                                                                                <td  onclick="getresult(01,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')"  >Jan</td>
                                                                                <td  onclick="getresult(02,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Feb</td>
                                                                                <td   onclick="getresult(03,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Mar</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  onclick="getresult(04,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Apr</td>
                                                                                <td  onclick="getresult(05,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >May</td>
                                                                                <td   onclick="getresult(06,'{{$weekcountpassed}}','{{$currentweekCount}}','{{$totalweekCount}}','time')" >Jun</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  onclick="getresult(07,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Jul</td>
                                                                                <td  onclick="getresult(08,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Aug</td>
                                                                                <td  onclick="getresult(09,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Sep</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td onclick="getresult(10,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Oct</td>
                                                                                <td  onclick="getresult(11,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Nov</td>
                                                                                <td  onclick="getresult(12,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Dec</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    </span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-t-20">
                                                        <div class="col-sm-12 btn-tab">
                                                            <ul class="nav nav-tabs small justify-content-end"
                                                                role="tablist">
                                                                <li class="nav-item"><a class="nav-link active"
                                                                        data-toggle="tab" href="#tab1" role="tab">Week
                                                                        1</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#tab2" role="tab">Week
                                                                        2</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#tab3" role="tab">Week
                                                                        3</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#tab4" role="tab">Week
                                                                        4</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#tab5" role="tab">Week
                                                                        5</a></li>
                                                            </ul>
                                                            <div class="tab-content py-4">
                                                                <div class="tab-pane active" id="tab1" role="tabpanel">
                                                                    <div class="col-sm-12 p-0 timesheet">

                                                                        <ul class="bg-gray nav nav-tabs small justify-content-end"
                                                                            role="tablist">
                                                                            <li class="nav-item"><a
                                                                                    class="nav-link active"
                                                                                    data-toggle="tab" href="#tab1"
                                                                                    role="tab">Sun 27
                                                                                    Dec </a>
                                                                            </li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab2"
                                                                                    role="tab">Mon 28 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab3"
                                                                                    role="tab">Tue 29 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab4"
                                                                                    role="tab">Wed 30 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab5"
                                                                                    role="tab">Thurs 31 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab6"
                                                                                    role="tab">Fri 1 Jan</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab7"
                                                                                    role="tab">Sat 2 Jan</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-12 p-0 treeview">
                                                                        <ul class="evendiv float-left width100">
                                                                            <li><span
                                                                                    class="caret p-level1-span">Salesforce</span>
                                                                                <span class="float-right">
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                    <span class="span_hr bg-equalhr">8
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">6
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-approx">9
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-equalhr">8
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">6
                                                                                        hrs</span>
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                </span>
                                                                                <ul class="nested">
                                                                                    <li>
                                                                                        <span
                                                                                            class="caret p-level2-span">HSBC</span>
                                                                                        <span class="span_45hr">45
                                                                                            Hr</span>
                                                                                        <ul class="nested lastul">
                                                                                            <li>
                                                                                                <span>Design</span>
                                                                                                <span
                                                                                                    class="float-right">
                                                                                                    <span
                                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                                    <span
                                                                                                        class="span_hr bg-equalhr">8
                                                                                                        hrs</span>
                                                                                                    <span
                                                                                                        class="span_hr bg-free">6
                                                                                                        hrs</span>
                                                                                                    <span
                                                                                                        class="span_hr bg-approx">9
                                                                                                        hrs</span>
                                                                                                    <span
                                                                                                        class="span_hr bg-equalhr">8
                                                                                                        hrs</span>
                                                                                                    <span
                                                                                                        class="span_hr bg-free">6
                                                                                                        hrs</span>
                                                                                                    <span
                                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                                </span>
                                                                                                <div
                                                                                                    class="text-right float-right padding-5 inline-block">
                                                                                                    <span
                                                                                                        class="timespan">--
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <button
                                                                                                            class="timebtn"><i
                                                                                                                class="far fa-clock"></i></button>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="-"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#filltimesheet">
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <button
                                                                                                            class="timebtn"><i
                                                                                                                class="far fa-clock"></i></button>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="-"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#filltimesheet"></span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <button
                                                                                                            class="timebtn"><i
                                                                                                                class="far fa-clock"></i></button>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="-"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#filltimesheet"></span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <button
                                                                                                            class="timebtn"><i
                                                                                                                class="far fa-clock"></i></button>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="-"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#filltimesheet"></span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <button
                                                                                                            class="timebtn"><i
                                                                                                                class="far fa-clock"></i></button>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="-"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#filltimesheet"></span>
                                                                                                    <span
                                                                                                        class="timespan">--
                                                                                                    </span>
                                                                                                </div>

                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                            </li>
                                                                        </ul>
                                                                        <!-- </li>
                                                                        </ul> -->
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab2" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">Primary</h3>
                                                                            <p class="card-text">With supporting text
                                                                                below as a natural
                                                                                lead-in to additional content.</p>
                                                                            <a href="#"
                                                                                class="btn btn-outline-secondary">Outline</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">Primary</h3>
                                                                            <p class="card-text">With supporting text
                                                                                below as a natural
                                                                                lead-in to additional content.</p>
                                                                            <a href="#"
                                                                                class="btn btn-outline-secondary">Outline</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab3" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week3</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab4" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week4</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab5" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week5</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 m-t-20">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div>
                                                                        <label>Weekly Notes</label>
                                                                    </div>
                                                                    <div>
                                                                        <textarea class="form-control"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 m-t-20">
                                                                    <div class="float-right">
                                                                        <button class="btn btn-primary">Save</button>
                                                                        <button class="btn btn-success">Submit for
                                                                            Approval</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane p-3" id="timeallocation" role="tabpanel">
                                                    <div class="col-sm-12 p-0 m-t-20">
                                                        <div class="row">
                                                            <div class="col-sm-6 p-r-0">
                                                                <h6 class="m-0 bg-naviblue">Name</h6>
                                                            </div>
                                                            <div class="col-sm-6 p-l-0">
                                                                <h6 class="m-0 bg-naviblue text-center">Allocation Hours
                                                                    in Week 1</h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 p-r-0">
                                                                <h6 class="m-0 bg-light padding-5">
                                                                    <form role="search" class="app-search"
                                                                        style="height: 0;">
                                                                        <div class="form-group mb-0">
                                                                            <input type="text" class="form-control m-0"
                                                                                placeholder="Search by Name..">
                                                                            <button type="submit" style="top:10px"><i
                                                                                    class="fa fa-search"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-t-20">
                                                        <div class="col-sm-12 btn-tab">
                                                            <ul class="nav nav-tabs small justify-content-end"
                                                                role="tablist">
                                                                <li class="nav-item"><a class="nav-link active"
                                                                        data-toggle="tab" href="#timetab1"
                                                                        role="tab">Week
                                                                        1</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#timetab2"
                                                                        role="tab">Week
                                                                        2</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#timetab3"
                                                                        role="tab">Week
                                                                        3</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#timetab4"
                                                                        role="tab">Week
                                                                        4</a></li>
                                                                <li class="nav-item"><a class="nav-link"
                                                                        data-toggle="tab" href="#timetab5"
                                                                        role="tab">Week
                                                                        5</a></li>
                                                            </ul>
                                                            <div class="tab-content py-4">
                                                                <div class="tab-pane active" id="timetab1"
                                                                    role="tabpanel">
                                                                    <div class="col-sm-12 p-0 timesheet">

                                                                        <ul class="bg-gray nav nav-tabs small justify-content-end"
                                                                            role="tablist">
                                                                            <li class="nav-item"><a
                                                                                    class="nav-link active"
                                                                                    data-toggle="tab" href="#tab1"
                                                                                    role="tab">Sun 27
                                                                                    Dec</a>
                                                                            </li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab2"
                                                                                    role="tab">Mon 28 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab3"
                                                                                    role="tab">Tue 29 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab4"
                                                                                    role="tab">Wed 30 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab5"
                                                                                    role="tab">Thurs 31 Dec</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab6"
                                                                                    role="tab">Fri 1 Jan</a></li>
                                                                            <li class="nav-item"><a class="nav-link"
                                                                                    data-toggle="tab" href="#tab7"
                                                                                    role="tab">Sat 2 Jan</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-12 p-0 treeview">
                                                                        <ul id="" class="evendiv">
                                                                            <li>
                                                                                <span class="caret">Nisha Upreti</span>
                                                                                <span class="float-right">
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                    <span class="span_hr bg-equalhr">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-approx">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-equalhr">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">0
                                                                                        hrs</span>
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                </span>
                                                                                <ul class="nested">
                                                                                    <li><span
                                                                                            class="caret p-level1-span">Salesforce</span>
                                                                                        <span class="span_45hr">0
                                                                                            Hr</span>
                                                                                        <ul class="nested">
                                                                                            <li>
                                                                                                <span
                                                                                                    class="caret p-level2-span">HSBC</span>
                                                                                                <span
                                                                                                    class="span_45hr">0
                                                                                                    Hr</span>
                                                                                                <ul
                                                                                                    class="nested lastul">
                                                                                                    <li>
                                                                                                        <span>Design</span>
                                                                                                        <div
                                                                                                            class="text-right float-right padding-5 inline-block">
                                                                                                            <span
                                                                                                                class="timespan">--
                                                                                                            </span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00">
                                                                                                            </span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan">--
                                                                                                            </span>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="text-right col-sm-12 m-t-10">
                                                                                                            <button
                                                                                                                class="btn btn-primary">Assign</button>
                                                                                                            <button
                                                                                                                class="btn btn-default">Cancel</button>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-12 p-0 treeview">
                                                                        <ul id="" class="odd">
                                                                            <li>
                                                                                <span class="caret">Ujjwal
                                                                                    Srivastva</span>
                                                                                <span class="float-right">
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                    <span class="span_hr bg-equalhr">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-approx">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-equalhr">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">0
                                                                                        hrs</span>
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                </span>
                                                                                <ul class="nested">
                                                                                    <li><span
                                                                                            class="caret p-level1-span">Salesforce</span>
                                                                                        <span class="span_45hr">0
                                                                                            Hr</span>
                                                                                        <ul class="nested">
                                                                                            <li>
                                                                                                <span
                                                                                                    class="caret p-level2-span">HSBC</span>
                                                                                                <span
                                                                                                    class="span_45hr">0
                                                                                                    Hr</span>
                                                                                                <ul
                                                                                                    class="nested lastul">
                                                                                                    <li>
                                                                                                        <span>Design</span>
                                                                                                        <div
                                                                                                            class="text-right float-right padding-5 inline-block">
                                                                                                            <span
                                                                                                                class="timespan">--
                                                                                                            </span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00">
                                                                                                            </span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan">--
                                                                                                            </span>
                                                                                                            </span>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-12 p-0 treeview">
                                                                        <ul id="" class="evendiv">
                                                                            <li>
                                                                                <span class="caret">Poonam
                                                                                    Kashyap</span>
                                                                                <span class="float-right">
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                    <span class="span_hr bg-equalhr">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-approx">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-equalhr">0
                                                                                        hrs</span>
                                                                                    <span class="span_hr bg-free">0
                                                                                        hrs</span>
                                                                                    <span
                                                                                        class="span_hr bg-weekend">NA</span>
                                                                                </span>
                                                                                <ul class="nested">
                                                                                    <li><span
                                                                                            class="caret p-level1-span">Salesforce</span>
                                                                                        <span class="span_45hr">0
                                                                                            Hr</span>
                                                                                        <ul class="nested">
                                                                                            <li>
                                                                                                <span
                                                                                                    class="caret p-level2-span">HSBC</span>
                                                                                                <span
                                                                                                    class="span_45hr">0
                                                                                                    Hr</span>
                                                                                                <ul
                                                                                                    class="nested lastul">
                                                                                                    <li>
                                                                                                        <span>Design</span>
                                                                                                        <div
                                                                                                            class="text-right float-right padding-5 inline-block">
                                                                                                            <span
                                                                                                                class="timespan">--
                                                                                                            </span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00">
                                                                                                            </span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan p-lr-0">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    placeholder="00:00"></span>
                                                                                                            <span
                                                                                                                class="timespan">--
                                                                                                            </span>
                                                                                                            </span>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="timetab2" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">Primary</h3>
                                                                            <p class="card-text">With supporting text
                                                                                below as a natural
                                                                                lead-in to additional content.</p>
                                                                            <a href="#"
                                                                                class="btn btn-outline-secondary">Outline</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">Primary</h3>
                                                                            <p class="card-text">With supporting text
                                                                                below as a natural
                                                                                lead-in to additional content.</p>
                                                                            <a href="#"
                                                                                class="btn btn-outline-secondary">Outline</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="timetab3" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week3</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="timetab4" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week4</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="timetab5" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week5</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane p-3 active" id="profile1" role="tabpanel">
                                                    <div class="col-sm-12 m-t-10 btn-tab">
                                                          <ul class="nav nav-tabs small justify-content-end"
                                                                role="tablist">
                                                                <div class="absolutemonth">
                                                                      <h6
                                                                    class="m-0 text-center relative bg-light p-10 cursorpointer font-20">
                                                                    <i class="fa fa-calendar-alt m-r-5"
                                                                        id="datepicker"></i><input type="hidden"
                                                                        id="dp" />{{$everyMonth}}
                                                                    <div class="tableabsolute">
                                                                        <table border="1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td colspan="3" class="form-group">
                                                                                        <select class="form-control" id="getyear">
                                                                                             <?php for($i=0; $i < 5; $i++){ 
                                                                                                 
                                                                                               
                                                     
                                                           ?>
                                            <option value="<?php echo ($current_year+$i); ?>" <?php echo ($future_year == $current_year+$i)?'selected':'';?>><?php echo ($current_year+$i); ?></option>
                                        <?php } ?>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </thead>
                                                             <tr>
                                                                                <td  onclick="getresult(01,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')"  >Jan</td>
                                                                                <td  onclick="getresult(02,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Feb</td>
                                                                                <td   onclick="getresult(03,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Mar</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  onclick="getresult(04,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Apr</td>
                                                                                <td  onclick="getresult(05,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >May</td>
                                                                                <td   onclick="getresult(06,'{{$weekcountpassed}}','{{$currentweekCount}}','{{$totalweekCount}}','time')" >Jun</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  onclick="getresult(07,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Jul</td>
                                                                                <td  onclick="getresult(08,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Aug</td>
                                                                                <td  onclick="getresult(09,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Sep</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td onclick="getresult(10,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Oct</td>
                                                                                <td  onclick="getresult(11,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Nov</td>
                                                                                <td  onclick="getresult(12,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Dec</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </h6>
                                                                </div>
                                                                @for($i = 1;$i <= $totalweekCount;$i++)
                                                                 @if($i== $weekcountpassed)
                                                                   <?php
                                                                   $ac ='active';
                                                                   ?>
                                                                 @else
                                                                 
                                                                  <?php
                                                                   $ac ='';
                                                                   ?>
                                                                 
                                                                 @endif
                                                                <li  class="nav-item"><a class="nav-link {{$ac}} font-14"
                                                                    onclick="assignHour('{{$PaginationDate}}','{{$i}}','{{$totalweekCount}}','time')" href="javascript:void(0)">Week
                                                                        {{$i}}</a></li>
                                                                @endfor    
                                                            </ul>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span class="float-right">
                                                                    <!--<span-->
                                                                    <!--    class="div-right-b padding-5 cursorpointer text-primary">Monthly-->
                                                                    <!--    View</span>-->
                                                                       
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row m-t-20">
                                                            <div class="col-sm-6">
                                                                <ul class="simpleul">
                                                                    <li class="active cursorpointer" onclick="getweekandmonthtimesheet('{{$userid}}','all','{{$daterange[0]}}','{{$daterange[6]}}','{{$weekcountpassed}}')">All</li>
                                                                    <li class="cursorpointer" onclick="getweekandmonthtimesheet('{{$userid}}','approved','{{$daterange[0]}}','{{$daterange[6]}}','{{$weekcountpassed}}')">For Approval</li>
                                                                    <li class="cursorpointer" onclick="getweekandmonthtimesheet('{{$userid}}','rejected','{{$daterange[0]}}','{{$daterange[6]}}','{{$weekcountpassed}}')">Rejected</li>
                                                                    <li class="cursorpointer" onclick="getweekandmonthtimesheet('{{$userid}}','blocked','{{$daterange[0]}}','{{$daterange[6]}}','{{$weekcountpassed}}')">Blocked</li>
                                                                    <li class="cursorpointer"  onclick="getweekandmonthtimesheet('{{$userid}}','enabled','{{$daterange[0]}}','{{$daterange[6]}}','{{$weekcountpassed}}')">Enabled</li>
                                                                    <li class="cursorpointer" onclick="getweekandmonthtimesheet('{{$userid}}','approved','{{$daterange[0]}}','{{$daterange[6]}}','{{$weekcountpassed}}')">Approved</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="d-flex flex-row-reverse">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row approvel_status">
                                                            
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
@stop

@section('extra_js')




<script>

function assignHour(yearMonth,currentweek,totalWeek,time){
    
    base_url = $('#base_url').val();
  
      var editurl =   base_url+'/emp-timesheet/'+yearMonth+'/'+currentweek+'/'+totalWeek+'/'+time;
 

     
          window.location = editurl;
    

    
}



var user = '{{$userid}}';
var type = 'all';

var weekstartdate = '{{$daterange[0]}}';
var weekenddate = '{{$daterange[6]}}';
var currentweek = '{{$weekcountpassed}}';


 getweekandmonthtimesheet(user,type,weekstartdate,weekenddate,currentweek);

 function getweekandmonthtimesheet(curent_user,type,sweekdate,eweekdate,cweek){
     

    

   //  $('#loadingDiv').show();
 
      var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/getweektimsheet',
        type: "post",
        data: {"_token": _token,"curent_user":curent_user,"type":type,"sweekdate":sweekdate,"eweekdate":eweekdate,"cweek":cweek},
        dataType: 'JSON',
         
        success: function (data) {
        // this is good
       
      $('#loadingDiv').hide();
        $('.approvel_status').html(data.approvellist);
          
        }
      });
    
    
}



function empApproveTimesheet(useri_d,status_id,week,repoting_id,status){


      $('#loadingDiv').show();
      var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/approvestatus',
        type: "post",
        data: {"_token": _token,"useri_d":useri_d,"status_id":status_id,"week":week,"repoting_id":repoting_id,"status":status},
        dataType: 'JSON',
         
        success: function (data) {
        // this is good
        
          $('#loadingDiv').hide();
       
    if(data.status == 200){
        
     
          getweekandmonthtimesheet(user,type,weekstartdate,weekenddate,currentweek);
        
          alertify.success(data.msg);
        
        
    }
     
          
        }
      });
    
}

function empRejectTimesheet(useri_d,status_id,week,repoting_id){
    
    
      var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/rejectstatus',
        type: "post",
        data: {"_token": _token,"useri_d":useri_d,"status_id":status_id,"week":week,"repoting_id":repoting_id},
        dataType: 'JSON',
         
        success: function (data) {
        // this is good
       
    if(data.status == 200){
        
         getweekandmonthtimesheet(user,type,weekstartdate,weekenddate,currentweek);
        
          alertify.success(data.msg);
         
        
    }
     
          
        }
      });
    
}


function getresult(month,week,currentweek,totalweek,time){
    
     base_url = $('#base_url').val();
    
   var year = $('#getyear').val();
   
 //  var rurl = base_url+'/emp-timesheet/'+year+'-'+month+'/'+week+'/'+time;
     var rurl = base_url+'/emp-timesheet/'+year+'-'+month+'/'+week+'/'+totalweek+'/'+time;
     window.location = rurl;
   
   
    
}

  </script>

<script>





      $("form#timealocationentrytime").submit(function(e) {

 
            e.preventDefault();



   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/hourdefinproject',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             alertify.success(data.msg);

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
           alertify.success(data.msg);
           // location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
          alertify.success(data.msg);
               location.reload();

          }else{

             $('#loadingDiv').hide();
            
            alertify.success(data.msg);

          }
          
        }
      });

            

          });

 $('.number').keypress(function(event) {
     
    

     if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) 
          return true;

     else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
          event.preventDefault();

});

    function validateHhMm(inputField) {
        var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);

        if (isValid) {
            inputField.style.backgroundColor = '#bfa';
        } else {
            inputField.style.backgroundColor = '#fba';
        }

        return isValid;
    }
    
    $(document).on("click", ".relative", function () {
  $(".tableabsolute").css("display", "block");
  event.stopPropagation();
})
$('body').click(function () {
  $(".tableabsolute").css("display", "none");
})
</script>




@stop