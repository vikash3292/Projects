

@extends('layouts.superadmin_layout')
@section('content')
<?php 
 
 $current_year = date('Y')-1;
  $future_year = date('Y');


   ?>
@section('extra_css')

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
option:hover{
    background:red;
}
/*.caret_row1{*/
/*    display:table-row;*/
/*}*/
/*.caret_row2{*/
/*    display:table-row;*/
/*}*/
/*.row_update {*/
/*    display: table-row;*/
/*}*/
.pagination{
    margin:0;
    float:right;
}
.page_spe .pagination{
    margin-right:10px;
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
                                <!--<div class="float-right">-->
                                <!--<span class="font-600 m-r-10">Legend:</span>-->
                                <!--<span class="span_hr bg-blank widthauto float-none">Leave</span>-->
                                <!--<span class="span_hr bg-weekend widthauto float-none">Week Off</span>-->
                                <!--<span class="span_hr bg-approx widthauto float-none">Estimate Hr</span>-->
                                <!--<span class="span_hr bg-equalhr widthauto float-none">Actual Hr</span>-->
                                <!--<span class="span_hr bg-free widthauto float-none">Free Hr</span>-->
                                <!--</div>-->
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
                                                <li  class="nav-item"><a href="{{URL::to('/user-timesheet')}}" onclick="timesheet('user')" class="nav-link" ><span class="d-block d-sm-none"><i
                                                                class="fas fa-home"></i></span> <span
                                                            class="d-none d-sm-block">Timesheet</span></a></li>
                                                            @endif
                                                       @if(PermissionHelper::frontendPermission('assign-timesheet'))        
                                                <li class="nav-item"><a  href="{{URL::to('/timesheet')}}" onclick="timesheet('allocation')" class="nav-link active" ><span
                                                            class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                        <span class="d-none d-sm-block">Timesheet Allocation</span></a>
                                                </li>
                                                      @endif
                                                   @if(PermissionHelper::frontendPermission('emp-approvel'))        
                                                <li  class="nav-item"><a href="{{URL::to('/emp-timesheet')}}" onclick="timesheet('emp')" class="nav-link " ><span class="d-block d-sm-none"><i
                                                                class="far fa-user"></i></span> <span
                                                            class="d-none d-sm-block">Employee Timesheet</span></a></li>
                                                                  @endif
                                            </ul>
                                            
                                            
                                            
                                            <!--<ul class="nav nav-tabs nav-tabs-custom" role="tablist">-->
                                            <!--    <li class="nav-item"><a class="nav-link active" data-toggle="tab"-->
                                            <!--            href="#home1" role="tab"><span class="d-block d-sm-none"><i-->
                                            <!--                    class="fas fa-home"></i></span> <span-->
                                            <!--                class="d-none d-sm-block">Timesheet</span></a></li>-->
                                            <!--    <li class="nav-item"><a class="nav-link" data-toggle="tab"-->
                                            <!--            href="#timeallocation" role="tab"><span-->
                                            <!--                class="d-block d-sm-none"><i class="far fa-user"></i></span>-->
                                            <!--            <span class="d-none d-sm-block">Timesheet Allocation</span></a>-->
                                            <!--    </li>-->
                                            <!--    <li class="nav-item"><a class="nav-link" data-toggle="tab"-->
                                            <!--            href="#profile1" role="tab"><span class="d-block d-sm-none"><i-->
                                            <!--                    class="far fa-user"></i></span> <span-->
                                            <!--                class="d-none d-sm-block">Employee Timesheet</span></a></li>-->
                                            <!--</ul>-->
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane p-3" id="home1" role="tabpanel">
                                                    <div class="row m-t-10">
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
                                                            <div class="tab-content py-2">
                                                                <div class="tab-pane active" id="tab1" role="tabpanel">
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
                                                                        <!-- <ul id="" class="evendiv">
                                                                            <li>
                                                                                <span class="caret">Nisha Upreti</span>
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
                                                                                </span> -->
                                                                        <ul class="evendiv">
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
                                                                                                <div
                                                                                                    class="text-right float-right padding-5 inline-block width85">
                                                                                                    <span
                                                                                                        class="timespan">--
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <input
                                                                                                            type="time" onkeypress="preventNonNumericalInput(event)"
                                                                                                            placeholder="00:00">
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <input
                                                                                                            type="time" onkeypress="preventNonNumericalInput(event)"
                                                                                                            placeholder="00:00"></span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <input
                                                                                                            type="time" onkeypress="preventNonNumericalInput(event)"
                                                                                                            placeholder="00:00"></span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <input
                                                                                                            type="time" onkeypress="preventNonNumericalInput(event)"
                                                                                                            placeholder="00:00"></span>
                                                                                                    <span
                                                                                                        class="timespan p-lr-0">
                                                                                                        <input
                                                                                                            type="time" onkeypress="preventNonNumericalInput(event)"
                                                                                                            placeholder="00:00"></span>
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
                                                                        <button class="btn btn-success">Save &
                                                                            Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                               
                                                <div class="tab-pane active p-3" id="timeallocation" role="tabpanel">
                                                    <div class="col-sm-12 p-0 m-t-20">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                            <h6 class="m-0 padding-5">
                                                                                        <form id="timesheet_search" method="post" class="app-search m-0" style="height: 0;">
                                                                                            <div class="form-group mb-0">
                                                                                                <input type="hidden" name="currentweek" value="{{$currentweekCount??0}}">
                                                                                                <input type="hidden" name="totalweek" value="{{$totalweekCount??0}}">
                                                                                                <input type="hidden" name="paginationDate" value="{{$PaginationDate??0}}">
                                                
                                                                                                <input type="text" class="form-control m-0" placeholder="Search by Name.." name="timesheet_name" >
                                                                                                <button type="submit" style="top:10px"><i class="fa fa-search"></i></button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </h6>
                                                                                    </div>
                                                                                     <div class="col-sm-6 float-right page_spe">
                                                                                          {{ $assignproject->appends(request()->query())->links() }}
                                                                                     </div>
                                                                                    </div>
                                                    </div>
                                                     <?php
                                                                            
                                                                            $startDate = $daterange[0];
                                                                            $showDate = date('Y-m',strtotime($startDate));
                                                                            $showMonth = date('F',strtotime($daterange[6]));
                                                                             $endtDate = $daterange[1];
                                                                             $startDay = date('d',strtotime($startDate));
                                                                            $endDay = date('d',strtotime($endtDate));
                                                                            //dd($showDate);
                                                                          
                                                                            ?>     
                                                    <div class="row m-t-10">
                                                        <div class="col-sm-12 btn-tab">
                                                          
                                                            <ul class="nav nav-tabs small justify-content-end"
                                                                role="tablist">
                                                                <div class="absolutemonth">
                                                                       <h6
                                                                    class="m-0 text-center relative bg-light padding-5 cursorpointer font-20">
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
                                                                <li  class="nav-item"><a class="nav-link {{$ac}}"
                                                                    onclick="assignHour('{{$PaginationDate}}','{{$i}}','{{$totalweekCount}}','time')" href="javascript:void(0)">Week
                                                                        {{$i}}</a></li>
                                                                @endfor        
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#timetab2" role="tab">Week-->
                                                                <!--        2</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#timetab3" role="tab">Week-->
                                                                <!--        3</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#timetab4" role="tab">Week-->
                                                                <!--        4</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#timetab5" role="tab">Week-->
                                                                <!--        5</a></li>-->
                                                            </ul>
                                                            <div class="tab-content py-2">
                                                                
                                                               
                                                                
                                                                  @for($i = 1;$i <= $currentweekCount;$i++)
                                                                  
                                                                   @if($i== $currentweekCount)
                                                                   <?php
                                                                   $ac ='active';
                                                                   ?>
                                                                 @else
                                                                 
                                                                  <?php
                                                                   $ac ='';
                                                                   ?>
                                                                 
                                                                 @endif
                                                                 
                                                                        @endfor
                                                                            
                                                                              
                                                                   
                                                                            
                                                                         
                                                                
                                                                <div class=" {{$ac}}" id="timetab1" role="tabpanel">
                                                                      <div
                                                                        class="col-sm-12 table-responsive table_timesheet">
                                                                        <table border="0" width="100%" 
                                                                            class="table text-center font-14" id="myTable">
                                                                            <thead>
                                                                                
                                                                            
                                                                                
                                                                                 <?php
                                    $managerlist = DB::table('main_users')->where('emprole',3)->where('isactive',1)->orderBy('userfullname','ASC')->get();
                                    ?>
                                                                                <tr>
                                                                                    <th class="bg-naviblue text-left">Name
                                                                                    </th>
                                                                                    <th class="bg-naviblue text-center">
                                                                                        <form class="m-0" method="GET">
                                                                                        <input type="hidden" name="all" value="{{$_GET['all']??''}}">
                                                                                        <select onchange="this.form.submit()" name="mid" id="mid" style="height: 22px;border-radius: 0;font-size: 14px;padding: 0px;border: none;">
                                                                                            <option value="">Select Manager</option>
                                                                                            @foreach($managerlist as $managerlists)
                                                        <option value="{{$managerlists->id}}" @if(!empty($_GET['mid'])) @if($_GET['mid'] == $managerlists->id) selected @endif @endif>{{$managerlists->userfullname}}</option>
                                                        @endforeach
                                                                                        </select> 
                                                                                        </form>
                                                                                       <form class="m-0" method="GET">
                                                                                            <input type="hidden" name="mid" value="{{$_GET['mid']??''}}">
                                                                                        <input type="checkbox"  onclick="this.form.submit()"  @if(!empty($_GET['all'])) checked  @endif name="all" value="alluser">
                                                                                        </form>
                                                                                    </th>
                                                                                    <th class="bg-naviblue text-center" colspan="8">
                                                                                        Allocation Hours
                                                                    in Week {{$weekcountpassed??1}}</th class="p-10">
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr
                                                                                    class="bg-dark color-white float-none">
                                                                                    <td>&nbsp;</td>
                                                                                      <td>&nbsp;</td>
                                                                                   @foreach($daterange as $dateranges)
                                                                                   <?php
                                                                                  $hideDate= date('D',strtotime($dateranges));
                                                                                   ?>
                                                                                  
                                                                 <td class="{{$hideDate}}">
                                                                        {{date('D d M',strtotime($dateranges))}}
                                                                 </td>
                                                                     @endforeach
                                                                                    <td>Hours</td>
                                                                                </tr>
                                                                                     
                                                                                   @foreach($assignproject as $key => $userprojects)
                                                                                     <?php 
                                                                                    
                                                                                     
                                                                                     $s_id = 'caret_'.$key;
                                                                                     ?>
                                                                       <form method="post" id="timealocationentrytime">
                                                                                <tr class="caret_row" data-sid = "{{$s_id}}">
                                                                                    <td class="width20 text_ellipses text-left" data-toggle="tooltip" title="{{ucwords($userprojects->userfullname??'')}}"><span class="caret">{{ucwords($userprojects->userfullname??'')}}</span></td>
                                                                                    <td>{{$userprojects->repotingmanager??''}}</td>
                                                                                    <td class="text-left">
                                                                                        <span>Free: 0 Hrs</span>
                                                                                    </td>
                                                                                   
                                                                                    <td class="text-left {{(abs($userprojects->user_hour_mon_diff) == 0)?'':$userprojects->user_hour_mon_color}} ">
                                                                                        <span>{{($userprojects->user_hour_mon_color == 'bg-red')?'Extra: ':'Free: '}} {{abs($userprojects->user_hour_mon_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_tue_diff) == 0)?'':$userprojects->user_hour_tue_color}}">
                                                                                        <span>{{($userprojects->user_hour_tue_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_tue_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_wed_diff) == 0)?'':$userprojects->user_hour_wed_color}}">
                                                                                        <span>{{($userprojects->user_hour_wed_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_wed_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_thu_diff) == 0)?'':$userprojects->user_hour_thu_color}}">
                                                                                        <span>{{($userprojects->user_hour_thu_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_thu_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_fri_diff) == 0)?'':$userprojects->user_hour_fri_color}}">
                                                                                        <span>{{($userprojects->user_hour_fri_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_fri_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left">
                                                                                        <span>Free: 0 Hrs</span>
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{$userprojects->userhour??'00:00'}}
                                                                                    </td>
                                                                                </tr>
                                                                                  <input type="hidden" name="currentweek" value="{{$weekcountpassed}}">
                                                                                  <input type="hidden" name="emp_id[]" value="{{$userprojects->emp_id}}">
                                                                                  
                                                                                    @php($i = 1)
                                                                                    @foreach($userprojects->userproject as $projects)
                                                                                    
                                                                                    
                                                                                   
                                                                                     <form method="post" id="timealocationentrytime">
                                                                                <tr class="caret_row1" data-sid = "{{$s_id}}">
                                                                                     <td class="width20 text_ellipses text-left" data-toggle="tooltip" title="{{ucwords($projects->project_name)}}"><span class="caret p-l-15">{{ucwords($projects->project_name)}}</span></td>
                                                                                     <td>&nbsp;</td>
                                                                                     <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                    <td class="text-left ">
                                                                        <span>{{abs($projects->project_hour_mon??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left ">
                                                                        <span> {{abs($projects->project_hour_tue??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($projects->project_hour_wed??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($projects->project_hour_thu??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($projects->project_hour_fri??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                      {{$projects->project_hour??'00:00'}}
                                                                    </td>
                                                                                </tr>
                                                                                
                                                                                 <input type="hidden" name="project_id[]" value="{{$projects->project_id}}">
                                                                                  @foreach($projects->gettask as $ke =>  $gettask)
                                                                                  
                                                                                   <input type="hidden" name="project_taskId[{{$projects->project_id}}][]" value="{{$gettask->project_task_id}}">
                                                                                <tr class="caret_row2" data-sid = "{{$s_id}}">
                                                                                    <td class="text-left width20 text_ellipses text-left" data-toggle="tooltip" title="{{ucwords($gettask->task)}}">
                                                                                        <span
                                                                                            class="p-l-35">{{ucwords($gettask->task)}}</span>
                                                                                    </td>
                                                                                    <td>&nbsp;</td>
                                                                                    @foreach($daterange as $t => $dateranges)
                                                                                                              
                                                                                                              <?php
                                                                                                              
                                                                                                              $Day =  date('D',strtotime($dateranges));
                                                                                                              
                                                                                                                if ($Day== 'Sun' || $Day == 'Sat'){
                                                                                                                    $display = 'none';
                                                                                                                    $cl = 'readonly';
                                                                                                                    $class="clr";
                                                                                                                    
                                                                                                                }else{
                                                                                                                    
                                                                                                                     $display = 'block';
                                                                                                                    
                                                                                                                      $cl = '';
                                                                                                                       $class="";
                                                                                                                    
                                                                                                                }
                                                                                                                
                                                                                                                   if(in_array($projects->project_id,$projectidlist) || in_array($userprojects->emp_id,$emp_list)){
                                                                                                                    $projectenbled = '';
                                                                                                                }else{
                                                                                                                     $projectenbled = 'futurDate';
                                                                                                                }
                                                                                                                
                                                                                                                
                                                                                                              
                                                                                                              ?>
                                                                                                              
                                                                                                              
                                                                                                            <td
                                                                                                                class="timespan">
                                                                                                                <input type="hidden" {{$cl}} name = "entrydate[{{$projects->project_id}}][{{$gettask->project_task_id}}][]" value="{{$dateranges}}">
                                                                                                                <input class="defaultEntry without_ampm {{$class}} {{$projectenbled}}"
                                                                                                                    type="text" step="1800" min="00:00" max="23:59"  required class="without" autofocus {{$cl}}  
                                                                                                                    placeholder="00:00" name = "entryhour[{{$projects->project_id}}][{{$gettask->project_task_id}}][]" value="{{$gettask->duration[$t]??'00:00'}}">
                                                                                                            </td>
                                                                                                           
                                                                                                            @endforeach
                                                                                                            <td>{{$gettask->task_hour}}</td>
                                                                                </tr>
                                                                                  @endforeach
                                                                             
                                                                                @endforeach
                                                                                
                                                                                   <tr class="row_update {{$s_id}}" >
                                                                                    <td colspan="10">
                                                                                          <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                                                                                    </td>
                                                                                </tr>
                                                                                 </form>
                                                                      @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                        {{ $assignproject->appends(request()->query())->links() }}
                                                                    </div>
                                                                </div>
                                                                 <div class="tab-pane" id="timetab2" role="tabpanel">
                                                                    week2
                                                                    
                                                                </div>
                                                                   <div class="tab-pane" id="timetab3" role="tabpanel">
                                                                    week3
                                                                    
                                                                </div>
                                                                   <div class="tab-pane" id="timetab4" role="tabpanel">
                                                                    week4
                                                                    
                                                                </div>
                                                                   <div class="tab-pane" id="timetab5" role="tabpanel">
                                                                    week5
                                                                    
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
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
@stop

@section('extra_js')




<script>

var currentweek = '{{$weekcountpassed}}';

function getresult(month,week,currentweek,totalweek,time){
    
     base_url = $('#base_url').val();
    
   var year = $('#getyear').val();
   

   
      var rurl = base_url+'/timesheet/'+year+'-'+month+'/'+week+'/'+totalweek+'/'+time;
   
     window.location = rurl;
   
   
    
}



  $("form#timesheet_search").submit(function(e) {

 
            e.preventDefault();

 $('#loadingDiv').show();

   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/search_timesheet_name',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        
        success: function (data) {
        console.log(data); // this is good
         $('#loadingDiv').hide();
        
         $("#myTable tbody").html(data);
          
        }
      });

            

          });


 $('.datetime').datetimepicker({
        dateFormat: '', 
        timeFormat: 'hh:mm z', 
        timeOnly: true,
        showTimezone: true,
        timezone: "+0100"
    });
  </script>

<script>

   function timesheet(valname){
       
      
       
        base_url = $('#base_url').val();
        
        if(valname == 'user'){
            
              var URLval = base_url+'/user-timesheet/';
               
            
        }else if(valname == 'allocation'){
            
                var URLval = base_url+'/timesheet/';
                
        }else if(valname == 'emp'){
            
               var URLval = base_url+'/emp-timesheet/';
            
        }
         // $('#loadingDiv').show();
         
        // alert(URLval);

        window.location.href = URLval;

      
   }




 

     

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
</script>


<script>



function assignHour(yearMonth,currentweek,totalWeek,time){
    
    base_url = $('#base_url').val();

    var onSite = "{{$_GET['all']??''}}";
    var onmanager = "{{$_GET['mid']??''}}";

    var status = '?all='+onSite+'&mid='+onmanager
  
      var editurl =   base_url+'/timesheet/'+yearMonth+'/'+currentweek+'/'+totalWeek+'/'+time + status;
 

     
          window.location = editurl;
    

    
}
$(document).ready(function(){
    $(".caret_row1").css("display","none");
    $(".caret_row2").css("display","none");
    $(".row_update").css("display","none");
});
$(document).on("click",".caret_row",function(){
    debugger
    $(this).toggleClass("open").nextUntil(".caret_row").toggle();
    $(this).siblings('.caret_row2').hide(); 
     $(this).find(".caret").toggleClass("rotate");
      //  $(this).siblings('.row_update').hide(); 
      
      var sid = $(this).data('sid');
      
      $('.'+sid).toggle(); 
      $('.'+sid).hide(); 
    //   $(this).siblings('.caret_row1').toggle();
    //   $(this).find(".caret").toggleClass("rotate");
    //   if($('.caret_row2').css('display') == 'table-row'){
    //       debugger
          //  $(this).siblings('.caret_row2').hide(); 
    //   }
    //      if($('.row_update').css('display') == 'table-row'){
    //          $(this).siblings('.row_update').toggle(); 
    //   }
});
$(document).on("click",".caret_row1",function(){
    //debugger
     $(this).toggleClass("open").nextUntil(".caret_row1").toggle();
     //$(this).nextUntil(".row_update").show();
      $(this).find(".caret").toggleClass("rotate");
    //   $(this).siblings('.caret_row2').toggle(); 
    //   $(this).siblings('.row_update').toggle();
    //     $(this).find(".caret").toggleClass("rotate");
    
         var sid = $(this).data('sid');
        
        $('.'+sid).toggle();
          $('.'+sid).show();
})

</script>
<script src="http://keith-wood.name/js/jquery.plugin.js"></script>
<script src="http://keith-wood.name/js/jquery.timeentry.js"></script>
<script>
$(function () {
	$('.defaultEntry').timeEntry({show24Hours: true,initialField:0,spinnerImage:'', defaultTime:"00:00"});
});
 $(document).on("click", ".relative", function () {
  $(".tableabsolute").css("display", "block");
  event.stopPropagation();
})
$('body').click(function () {
  $(".tableabsolute").css("display", "none");
})
// search
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


      $("form#timealocationentrytime").submit(function(e) {

 
            e.preventDefault();

  $('#loadingDiv').show();

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

           // location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
             alertify.success(data.msg);
           // location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
              alertify.success(data.msg);
               //location.reload();

          }else{

             $('#loadingDiv').hide();
            
             alertify.success(data.msg);

          }
          
        }
      });

      });  


</script>
@stop