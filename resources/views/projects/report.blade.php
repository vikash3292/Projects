@extends('layouts.superadmin_layout')
@section('content')


 <?php 
 
 $current_year = date('Y')-1;
  $future_year = date('Y');


   ?>

  <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Report</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Report</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right">
                                    <span class="font-600">Legend:</span>
                                    <span class="time_legend bg-blank">Over</span>
                                    <span class="time_legend bg-approx">Under</span>
                                    <span class="time_legend bg-equalhr">Good</span>
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
                                    <div id="accordion">
                                        <div class="card mb-1">
                                            <div class="card-header p-3" id="headingOne">
                                                <a href="#collapseOne" class="text-dark" data-toggle="collapse"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <h6 class="m-0 font-14 actualreport"><i
                                                            class="fa fa-angle-right m-r-5"></i> Allocation
                                                        Report
                                                    </h6>
                                                </a>
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
                                                                            //dd($showDate);
                                                                          
                                                                            ?>      
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">

                                                                <div class="col-sm-3 p-r-0">
                                                                  
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 p-r-0">
                                                                    <h6 class="m-0 bg-light padding-5">
                                                                         <form id="report_search" method="post" class="app-search m-0" style="height: 0;">
                                                                                            <div class="form-group mb-0">
                                                                                                <input type="hidden" name="currentweek" value="{{$currentweekCount??0}}">
                                                                                                <input type="hidden" name="totalweek" value="{{$totalweekCount??0}}">
                                                                                                <input type="hidden" name="paginationDate" value="{{$PaginationDate??0}}">
                                                
                                                                                                <input type="text" class="form-control m-0" placeholder="Search by Name.." name="report_name" >
                                                                                                <button type="submit" style="top:10px"><i class="fa fa-search"></i></button>
                                                                                            </div>
                                                                                        </form>
                                                                            </div>
                                                                              <div class="col-sm-6 p-l-0">
                                                                    <h6
                                                                        class="m-0 text-center bg-light font-20 p-10 cursorpointer">
                                                                        <span class="relative">
                                                                        <i class="fa fa-calendar-alt m-r-5"></i>{{$everyMonth}} 
                                                                        <div class="tableabsolute">
                                                                            <table border="1">
                                                                                <thead>

                                                                                        <td colspan="3"
                                                                                            class="form-group">
                                                                                            <select
                                                                                                class="form-control" id="getyear">
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
                                                                        </form>
                                                                    </h6>
                                                                </div>
                                                                
                                                               
                                                                
                                                              
                                                            </div>
                                                        </div>
                                                        <div class="row m-t-10">
                                                        <div class="col-sm-12 btn-tab">
   <form class="m-0" method="GET" class="absolutemonth">
                                                                                            
                                                                                        <input type="checkbox"  onclick="this.form.submit()"  @if(!empty($_GET['all'])) checked  @endif name="all" value="alluser">
<label>On Site</label>
                                                                                        </form>
                                                            <ul class="nav nav-tabs small justify-content-end font-18"
                                                                role="tablist"> 
                                                                
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
                                                                
                                                               
                                                        
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#tab2" role="tab">Week-->
                                                                <!--        2</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#tab3" role="tab">Week-->
                                                                <!--        3</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#tab4" role="tab">Week-->
                                                                <!--        4</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#tab5" role="tab">Week-->
                                                                <!--        5</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#tab6" role="tab">Week-->
                                                                <!--        6</a></li>-->
                                                                <!--<li class="nav-item"><a class="nav-link"-->
                                                                <!--        data-toggle="tab" href="#tab7" role="tab">Week-->
                                                                <!--        7</a></li>-->
                                                            </ul>
                                                            <div class="tab-content py-2">
                                                                <div class="tab-pane active" id="tab1" role="tabpanel">
                                                                    <div class="col-sm-12">
                                                                        <table class="table text-center font-14" id="myTable">
                                                                            <!--<thead class="bg-gray float-none">-->
                                                                            <!--    <tr>-->
                                                                            <!--          <th class="width20">&nbsp;</th>-->
                                                                            <!--           @foreach($daterange as $k => $dateranges)-->
                                                                                  
                                                                            <!--        <th> {{date('D d M',strtotime($dateranges))}}</th>-->
                                                                            <!--        @endforeach-->
                                                                            <!--    </tr>-->
                                                                            <!--</thead>-->
                                                                          
                                                                            {{$projectlist->links()}}
                                                                            
                                                                            <thead>
<tr>
<td class="bg-naviblue text-left"><h6 class="m-0 ">Name</h6></td>
<td colspan="5" class="bg-naviblue">  <h6 class="m-0  text-center">Actual Hours
                                                                        in Week {{$weekcountpassed}}</h6></td>
</tr>
                                                                                    <tr>
                                                                                <tr>
                                                                                    <th class="table_text_ellipses text-left">Employee Name</th>
                                                                                    <th>Working Days</th>
                                                                                    <th>Working Hours</th>
                                                                                      <th>Allocated Hours</th>
                                                                                      <th>Actual Hours</th>
                                                                                      <th>Free Pool</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                             @foreach($projectlist as $projectlists)
                                                                              <?php $i++; $id="caret-$i";?>
                                                                                <tr class="caret_row" data-id='{{$id}}'>
                                                                                    <td class="table_text_ellipses text-left" data-toggle="tooltip" title="{{$projectlists->userfullname}}"><span class="caret">{{$projectlists->userfullname}}</span></td>
                                                                                    <td>{{$projectlists->day??0}} Days</td>
                                                                                    <td>{{$projectlists->hour??0}} Hours</td>
                                                                                    <td class="bg-gray">{{$projectlists->all_assign_hour_in_user_all}}</td>
                                                                                    <td class="">{{$projectlists->all_hour_in_user_all}}</td>
                                                                                    <td>{{$projectlists->fool_hour_in_user_all??'00:00'}} Hours</td>
                                                                                    </tr>
                                                                                    @foreach($projectlists->project as $projectlist)
                                                                                      <tr class="caret_row1 {{$id}}">
                                                                                    <td class="table_text_ellipses text-left" data-toggle="tooltip" title="{{$projectlist->project_name??''}}">{{$projectlist->project_name??''}}</td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td class="bg-gray">
                                                                                        {{$projectlist->all_assign_hour_in_project_all??'00:00'}}
                                                                                    </td>
                                                                                    <td class="{{$projectlist->all_hour_in_project_all_color}}">
                                                                                        {{$projectlist->all_hour_in_project_all??'00:00'}}
                                                                                    </td>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                  @endforeach
                                                                                </tr>
                                                                                
                                                                                @endforeach
                                                             
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                       
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
                                                                <div class="tab-pane" id="tab6" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week6</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="tab7" role="tabpanel">
                                                                    <div class="card border-primary mb-3">
                                                                        <div class="card-body">
                                                                            <h3 class="card-title">week7</h3>

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
                                        <div class="card mb-1">
                                            <!--<div class="card-header p-3" id="headingTwo">-->
                                            <!--    <a href="#collapseTwo" class="text-dark collapsed"-->
                                            <!--        data-toggle="collapse" aria-expanded="false"-->
                                            <!--        aria-controls="collapseTwo">-->
                                            <!--        <h6 class="m-0 font-14 actualreport"><i-->
                                            <!--                class="fa fa-angle-right m-r-5"></i> Allocation-->
                                            <!--            Report</h6>-->
                                            <!--    </a>-->
                                            <!--</div>-->
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <!-- <div class="col-sm-6 p-l-0">
                                                                    <h6
                                                                        class="m-0 text-center relative bg-light p-10 cursorpointer">
                                                                        <i class="fa fa-calendar-alt m-r-5"></i>December
                                                                        <div class="tableabsolute">
                                                                            <table border="1">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td colspan="3"
                                                                                            class="form-group">
                                                                                            <select
                                                                                                class="form-control">
                                                                                                <option>2019</option>
                                                                                                <option>2020</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tr>
                                                                                    <td>Jan</td>
                                                                                    <td>Feb</td>
                                                                                    <td>Mar</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Apr</td>
                                                                                    <td>May</td>
                                                                                    <td>Jun</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Jul</td>
                                                                                    <td>Aug</td>
                                                                                    <td>Sep</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Oct</td>
                                                                                    <td>Nov</td>
                                                                                    <td>Dec</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </h6>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-t-20">
                                                        <div class="col-sm-12">
                                                            <form id="searchReportfrom" method="post">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group row m-0">
                                                                        <label for="empid"
                                                                            class="col-lg-4 col-form-label">Select Year
                                                                            <span class="text-danger"></span></label>
                                                                        <div class="col-lg-8 col-form-label">
                                                                            <select class="form-control" name="searchYear" id="searchYear" required>
                                                                                  <?php for($i=0; $i < 5; $i++){ 
                                                                                                 
                                                                                               
                                                     
                                                           ?>
                                            <option value="<?php echo ($current_year+$i); ?>" <?php echo ($future_year == $current_year+$i)?'selected':'';?>><?php echo ($current_year+$i); ?></option>
                                        <?php } ?>
                                                                            </select>
                                                                            <span id="searchYear_error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group row m-0">
                                                                        <label for="empid"
                                                                            class="col-lg-4 col-form-label">Select Month
                                                                            <span class="text-danger"></span></label>
                                                                        <div class="col-lg-8 col-form-label">
                                                                            <select class="form-control" name="searchMonth" id="searchMonth" required>
                                                                                 <option value="">Select Option</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                                <option>6</option>
                                                                                <option>7</option>
                                                                                <option>8</option>
                                                                                <option>9</option>
                                                                                <option>10</option>
                                                                                <option>11</option>
                                                                                <option>12</option>
                                                                            </select>
                                                                              <span id="searchMonth"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group row m-0 p-10">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input" value="0" name="inactive" id="inactive"
                                                                                id="customControlInline"> <label
                                                                                class="custom-control-label p-2"
                                                                                for="customControlInline">Inactive
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        
                                                        $getcategory = DB::table('main_project_category')->where('status',1)->get();
                                                        
                                                        ?>
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group row m-0">
                                                                        <label for="empid"
                                                                            class="col-lg-4 col-form-label">Select
                                                                            Category
                                                                            <span class="text-danger"></span></label>
                                                                        <div class="col-lg-8 col-form-label">
                                                                            <select class="form-control" name="searchCat" id="searchCat" required>
                                                                                <option value="">Select Category</option>
                                                                                @foreach($getcategory as $getcategorys)
                                                                                  <option value="{{$getcategorys->id}}">{{$getcategorys->cat_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span id="searchCat"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <?php
                                                                
                                                                $arr = ['in-progress','initiated','hold','completed'];
                                                                ?>
                                                                <div class="col-md-4">
                                                                    <div class="form-group row m-0">
                                                                        <label for="empid"
                                                                            class="col-lg-4 col-form-label">Select
                                                                            Status
                                                                            <span class="text-danger"></span></label>
                                                                        <div class="col-lg-8 col-form-label">
                                                                            <select class="form-control" name="searchStatus" id="searchStatus" required>
                                                                                <option value="">Select Status</option>
                                                                                @foreach($arr as $arrs)
                                                                                <option value="{{$arrs}}">{{$arrs}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                             <span id="searchStatus"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                   
                                                <?php
                                                
                                                $project = DB::table('tm_projects')->where('is_active',1)->get();
                                                
                                                ?> 
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group row m-0">
                                                                        <label for="empid"
                                                                            class="col-lg-4 col-form-label">Select
                                                                            Project
                                                                            <span class="text-danger"></span></label>
                                                                        <div class="col-lg-8 col-form-label">
                                                                            <select class="form-control" name="searchProject" id="searchProject" required>
                                                                                <option value="">Select Project</option>
                                                                                @foreach($project as $projects)
                                                                                 <option value="{{$projects->id}}">{{$projects->project_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        
                                                          <div class="col-sm-12 btn-tab m-t-10" id="SearchReportalluser">
                                                           
                                                          
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
You have made no changes to save.
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>

@stop


@section('extra_js')

<script>



  $("form#report_search").submit(function(e) {

 
            e.preventDefault();

 $('#loadingDiv').show();

   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/search_report_name',
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


    $("form#searchReportfrom").submit(function(e) {
        e.preventDefault();
   var token = "{{csrf_token()}}"; 
$('#loadingDiv').show();

  $.ajax({
        url: '/searchReport',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        dataType: 'JSON',
        success: function (data) {
        console.log(data.report); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
            $('#SearchReportalluser').html(data.report);
            

          //  location.reload();

          }else if(data.status ==201){

              $('#loadingDiv').hide();
            alertify.success(data.msg);
           // location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
          alertify.success(data.msg);
              // location.reload();

          }else{

             $('#loadingDiv').hide();
            
           alertify.success(data.msg);

          }
          
        }
      });
      
    });
    
    
function getresultweekly(year,month,currentweek,Totalweek){
    
var year = $('#searchYear').val();
var month = $('#searchMonth').val();   
var cat = $('#searchCat').val();  
var status = $('#searchStatus').val();  
var project = $('#searchProject').val();  
       
  
  $('#loadingDiv').show();
   var _token = "{{csrf_token()}}";
    
      $.ajax({
        url: '/searchReport',
        type: "post",
        data: {"_token": _token,"year":year,"month":month,"currentweek":currentweek,"Totalweek":Totalweek,"searchYear":year,"searchMonth":month,"searchCat":cat,"searchStatus":status,"searchProject":project},
        dataType: 'JSON',
         
        success: function (data) {
           // console.log(data.notifiction); // this is good
                    if(data.status ==200){
             $('#loadingDiv').hide();
         
            $('#SearchReportalluser').html(data.report);
            

          //  location.reload();

          }else if(data.status ==201){

              $('#loadingDiv').hide();
            alertify.success(data.msg);
           // location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
          alertify.success(data.msg);
              // location.reload();

          }else{

             $('#loadingDiv').hide();
            
           alertify.success(data.msg);

          }

          }
          
        
      });
  
}


function getresult(month,week,currentweek,totalweek,time){
    
     base_url = $('#base_url').val();
    
   var year = $('#getyear').val();
   
  // var rurl = base_url+'/report/'+year+'-'+month+'/'+week+'/'+time;
      var rurl = base_url+'/report/'+year+'-'+month+'/'+week+'/'+totalweek+'/'+time;
     window.location = rurl;
   
   
    
}

function assignHour(yearMonth,currentweek,totalWeek,time){
    
    base_url = $('#base_url').val();
  
      var editurl =   base_url+'/report/'+yearMonth+'/'+currentweek+'/'+totalWeek+'/'+time;
 

     
          window.location = editurl;
    

    
}

$(document).ready(function()
{
  $("tr.caret_row:odd").css({
    "background-color":"#ededed",
    "color":"#212529"});
     $("tr.caret_row1:odd").css({
    "background-color":"#ededed",
    "color":"#212529"});
});
$(document).on("click",".caret_row",function(){
    debugger
     $(this).find(".caret").toggleClass("rotate");
     cls=$(this).data('id');
       $('.'+cls).toggle();
         $(this).toggleClass("open");
});
$(document).on("click",".caret_row1",function(){
       $(this).siblings('.caret_row2').toggle(); 
       $(this).siblings('.row_update').toggle();
        $(this).find(".caret").toggleClass("rotate");
})
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

 $(document).on("click", ".relative", function () {
  $(".tableabsolute").css("display", "block");
  event.stopPropagation();
})
$('body').click(function () {
  $(".tableabsolute").css("display", "none");
})
</script>


@stop