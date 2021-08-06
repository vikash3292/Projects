



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

.caret_row1{

    display:none;

}

.caret_row2{

    display:none;

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

                                <!--<span class="float-right">-->

                                <!--     <span class="font-600 m-r-10">Legend:</span>-->

                                <!--<span class="span_hr bg-blank widthauto float-none">Leave</span>-->

                                <!--<span class="span_hr bg-weekend widthauto float-none">Week Off</span>-->

                                <!--<span class="span_hr bg-approx widthauto float-none">Estimate Hr</span>-->

                                <!--<span class="span_hr bg-equalhr widthauto float-none">Actual Hr</span>-->

                                <!--<span class="span_hr bg-free widthauto float-none">Free Hr</span>-->

                                <!--</span>-->

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

                                                <li  class="nav-item"><a href="{{URL::to('/user-timesheet')}}" onclick="timesheet('user')" class="nav-link active" ><span class="d-block d-sm-none"><i

                                                                class="fas fa-home"></i></span> <span

                                                            class="d-none d-sm-block">Timesheet</span></a></li>

                                                            @endif
<!-- 
                                                       @if(PermissionHelper::frontendPermission('assign-timesheet'))        

                                                <li class="nav-item"><a  href="{{URL::to('/timesheet')}}" onclick="timesheet('allocation')" class="nav-link" ><span

                                                            class="d-block d-sm-none"><i class="far fa-user"></i></span>

                                                        <span class="d-none d-sm-block">Timesheet Allocation</span></a>

                                                </li>

                                                      @endif -->

                                                   @if(PermissionHelper::frontendPermission('emp-approvel'))        

                                                <li  class="nav-item"><a href="{{URL::to('/emp-timesheet')}}" onclick="timesheet('emp')" class="nav-link " ><span class="d-block d-sm-none"><i

                                                                class="far fa-user"></i></span> <span

                                                            class="d-none d-sm-block">Employee Timesheet</span></a></li>

                                                                  @endif

                                            </ul>

                                            <!-- Tab panes -->

                                                                                       <div class="tab-content">

                                                <div class="tab-pane active p-3" id="home1" role="tabpanel">

                                                  

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

                                                                           $applyMonth = date('M',strtotime($daterange[6]));
                                                                           $applyYear = date('Y',strtotime($daterange[6]));


                                                                          $first_sat =  date("Y-m-d", strtotime("first Saturday of ".$applyMonth." ".$applyYear.""));


                                                                            ?>  

                                                    <form id="filltimesheetuser" method="post">

                                                    

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

                                                                                        <select class="form-control mb-0" id="getyear">

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

                                                                    onclick="assignHour('{{$paginationDate}}','{{$i}}','{{$totalweekCount}}','time')" href="javascript:void(0)">Week

                                                                        {{$i}}</a></li>

                                                                @endfor    

                                                            </ul>

                                                            

                                                           

                                                          

                                                            <div class="tab-content py-2 float-left width100">

                                                                

                                                             

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

                                                                

                                                                <div class=" {{$ac}}" id="tab1" role="tabpanel">

                                                                    

                                                                    <div

                                                                        class="col-sm-12 table-responsive table_timesheet">

                                                                        <table border="0" class="table font-14" width="100%"

                                                                            class="text-center table">

                                                                            <thead>

                                                                                <tr>

                                                                                    <th class="bg-naviblue">Project

                                                                                    </th>

                                                                                    <th class="bg-naviblue text-center" colspan="8">

                                                                                       Actual

                                                                    Hours

                                                                    in Week {{$weekcountpassed??1}}</th class="p-10">

                                                                                </tr>

                                                                            </thead>

                                                                            <tbody>

                                                                                

                                                                                

                                                                                <tr

                                                                                    class="bg-dark color-white float-none">

                                                                                    <td>&nbsp;</td>

                                                                                 @foreach($daterange as $k => $dateranges)

                                                                         

                                                                      

                                                                            <?php

                                                                            

                                                                            if($k == 0 ){

                                                                                

                                                                                $CL = 'disabledTab';

                                                                                $cutome = '';

                                                                                

                                                                            }else{

                                                                                

                                                                                  $CL = '';

                                                                                  $cutome = 'cursorpointer';

                                                                                

                                                                            }

                                                                            

                                                                            ?>

                                                                            

                                                                              <?php

                                                                                            

                                                                                             if(isset($tm_status->week_status)){



                                                                                                

                                                                                             if($tm_status->week_status == 'submitted' || $tm_status->week_status == 'approved' ){

                                                                                            

                                                                                                $dis = 'disabled';

                                                                                                

                                                                                          

                                                                                                

                                                                                            }else{

                                                                                                

                                                                                                  $dis = '';

                                                                                                   

                                                                                                

                                                                                            }

                                                                                            

                                                                                            }else{

                                                                                                

                                                                                                $dis = '';

                                                                                                 

                                                                                                

                                                                                            }

                                                                                            

                                                                                            ?>

                                                                 <td>

                                                                        {{date('D d M',strtotime($dateranges))}}

                                                                                 <i class="fas fa-clipboard-list {{$CL}} {{$cutome}}"  data-toggle="modal" data-target="#filltimesheet{{$k}}"></i>

                                                                 </td>

                                                                     

                                                                  <div id="filltimesheet{{$k}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

        aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title mt-0" id="myModalLabel">Time Entry:   {{date('D d M Y',strtotime($dateranges))}}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>

                <div class="modal-body">

                    <div class="form-group row note_entry">

                        <label for="example-text-input" class="col-sm-4 col-form-label">Add Note</label>

                        <div class="col-sm-8">

                            <textarea rows="3" {{$dis}} name="DailyNote[]"  class="form-control">{{$noteList[$k]??''}}</textarea>

                            <input type="hidden" name="noteDate[]"  value="{{$dateranges}}">

                        </div>

                    </div>

                </div>

                

                <?php

                if($dis != 'disabled'){

                ?>

                <div class="modal-footer">

                 

                    <button type="button" class="btn btn-success"

                        data-dismiss="modal">Save</button>

                </div>

                <?php } ?>

                

            </div>

            <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

    </div>

    

     @endforeach 

     

    

     

    

                                                                                    <td>Hours</td>

                                                                                </tr>

                                                                            <?php $i=0; ?>

                                                                                  @foreach($projectlist as $projectlists)

                                                                                 <?php $i++; $id="caret-$i";?>

                                                                                  

                                                                                <tr class="caret_row" data-id='{{$id}}'>

                                                                                    <td class="width20">

                                                                                        <span class="caret">{{$projectlists->project_name??''}}</span>

                                                                                    </td>

                                                                                    <td>

                                                                                     <span class=" p-2 width100 ">{{$projectlists->user_hour_sun??'00:00'}}

                                                                                        </span> 

                                                                                      

                                                                                    </td>

                                                                                    <td>



                                                                                       

                                                                                    <span class=" p-2 width100 ">{{$projectlists->user_hour_mon??'00:00'}}

                                                                                        </span> 

                                                                                    

                                                                                    </td>

                                                                                    <td>



                               

                        <span class=" p-2 width100 ">{{$projectlists->user_hour_tue??'00:00'}}

                                                                                        </span> 

                                                                                    

                                                                                    </td>

                                                                                    <td>



                                                                                       

                          <span class=" p-2 width100 ">{{$projectlists->user_hour_wed??'00:00'}}

                                                                                        </span> 

                                                                                      

                                                                                    </td>

                                                                                    <td>



                                                                                       

                                                 <span class=" p-2 width100 ">{{$projectlists->user_hour_thu??'00:00'}}

                                                                                        </span> 

                                                                                       

                                                                                    </td>

                                                                                    <td>

                                                                                     

                           <span class=" p-2 width100 ">{{$projectlists->user_hour_fri??'00:00'}}

                                                                                        </span>  

                                                                                     

                                                                                    </td>

                                                                                    <td>

                                                                                     <span class=" p-2 width100 ">{{$projectlists->user_hour_sat??'00:00'}}

                                                                                        </span>  

                                                                                    </td>

                                                                                    <td>

                                                                                      <span class="p-2 width100 ">{{$projectlists->userhour??'00:00'}}

                                                                                        </span> 

                                                                                      





                                                                                    </td>

                                                                                </tr>

                                                                                 <input type="hidden" name="currentweek" value="{{$weekcountpassed??1}}">

                                                                                         <input type="hidden" name="stime" id="stime" value="{{$startDate??''}}">

                                                                                          <input type="hidden" name="etime" id="etime" value="{{$endDate??''}}">

                                                                                        <input type="hidden" name="project_id[]" id="project_id[]" value="{{$projectlists->project_id??0}}">

                                                                                         <input type="hidden" name="emp_id" id="emp_id" value="{{$projectlists->emp_id??0}}">

                                                                                             @foreach($projectlists->tasklist as $tasklist)

                                                                                            

                                                                                            <?php

                                                                                            

                                                                                             if(isset($tm_status->week_status)){

                                                                                             if($tm_status->week_status == 'submitted' || $tm_status->week_status == 'approved' ){

                                                                                            

                                                                                                $dis = 'disabled';

                                                                                                

                                                                                          

                                                                                                

                                                                                            }else{

                                                                                                

                                                                                                  $dis = '';

                                                                                                   

                                                                                                

                                                                                            }

                                                                                            }else{

                                                                                                

                                                                                                $dis = '';

                                                                                                 

                                                                                                

                                                                                            }

                                                                                            

                                                                                            ?>

                                                                                         <tr class="caret_row1 {{$id}}">

                                                                                               <td><span class="p-l-15">{{$tasklist->task??''}}</span></td> 

                                                                                               <input type="hidden" name="project_taskId[{{$projectlists->project_id}}][]" id="project_taskId[{{$projectlists->project_id}}][]" value="{{$tasklist->id}}">

                                                                                                        @foreach($daterange as $t => $dateranges)

                                                                                                              

                                                                                                              <?php

                                                                                                              $find_holy_day = DB::table('main_holidaydates')->whereDate('org_open_date',$dateranges)->count();
                                                                                                              $show_find_holy_day = DB::table('main_holidaydates')->whereDate('holidaydate',$dateranges)->whereNull('org_open_date')->count();


                                                                                                           
                                                                                                                  $curredate = strtotime(date('Y-m-d'));

                                                                                                                   $daterangevalidate = strtotime($dateranges);

                                                                                                                   

                                                                                                                   if($curredate < $daterangevalidate){

                                                                                                                       

                                                                                                                       $validateDate = 'futurDate';

                                                                                                                       

                                                                                                                   }else{

                                                                                                                       

                                                                                                                        $validateDate = '';

                                                                                                                       

                                                                                                                   }

                                                                                                              

                                                                                                              $Day =  date('D',strtotime($dateranges));

                                                                                                               $onlyday =  date('d',strtotime($dateranges));

                                                                                                                $onlyMonth =  date('M',strtotime($dateranges));

                                                                                                                 $onlyYear =  date('Y',strtotime($dateranges));

                                                                                                              

                                                                                                                if ($Day == 'Sun' && $find_holy_day == 0){

                                                                                                                   

                                                                                                                    $cl = 'readonly';

                                                                                                                    $class="clr";

                                                                                                                     $pop = '#';

                                                                                                                       $colorweeked = 'bg-weekend';

                                                                                                                       $time_nonedit='';

                                                                                                                 }else if($Day != 'Sun' && $show_find_holy_day > 0){  

                                                                                                                                                                                                                                         $cl = 'readonly';

                                                                                                                    $class="clr";

                                                                                                                     $pop = '#';

                                                                                                                       $colorweeked = 'bg-weekend';

                                                                                                                       $time_nonedit='';


                                                                                                                 }else if($Day == 'Sun' && $find_holy_day > 0){  


                                                                                                                      $cl = '';

                                                                                                                       $class="";

                                                                                                                       

                                                                                                                        $pop = '#filltimesheet'.$t;

                                                                                                                         $colorweeked = '';

                                                                                                                          $time_nonedit='time_nonedit';
                                


                                                                                                               }else if($first_sat == $dateranges){ 

                                                                                                                     $cl = 'readonly';

                                                                                                                    $class="clr";

                                                                                                                     $pop = '#';

                                                                                                                     $colorweeked = 'bg-weekend';

                                                                                                                       $time_nonedit='';


                                                                                                                }else if($find_holy_day > 0){ 


                                                                                                                    
                                                                                                                      $cl = '';

                                                                                                                       $class="";

                                                                                                                       

                                                                                                                        $pop = '#filltimesheet'.$t;

                                                                                                                         $colorweeked = '';

                                                                                                                          $time_nonedit='time_nonedit';

                                                                                               

                                                                                                                    

                                                                                                                }else{

                                                                                                                    

                                                                                                                      $cl = '';

                                                                                                                       $class="";

                                                                                                                       

                                                                                                                        $pop = '#filltimesheet'.$t;

                                                                                                                         $colorweeked = '';

                                                                                                                          $time_nonedit='time_nonedit';

                                                                                                                    

                                                                                                                }

                                                                                                                

                                                                                                              ?>

                                                                                                                <td>

                                                                                                    

                                                                                                                 <span

                                                                                                        class="span_hr {{$colorweeked??''}}">

                                                                                                        

                                                                                    

                                                                                        <span class="p-2 width100">

                                                        <input  class="defaultEntry without_ampm {{$class??''}} {{$colorweeked??''}}  @if($projectlists->project_id != 30)  {{$validateDate??''}}  @endif"

                                                                                                                    type="text"    {{$cl}} {{$dis}}  

                                                                                                                    placeholder="00:00" name = "entryhour[{{$projectlists->project_id??0}}][{{$tasklist->id??0}}][]" value="{{$tasklist->duration[$t]??'00:00'}}">

                                                                                        </span>

                                                                                                            

                                                                                                             <input type="hidden" {{$cl}} name = "entrydate[{{$projectlists->project_id??0}}][{{$tasklist->id??0}}][]" value="{{$dateranges??''}}">

                                                                                                               

                                                                                                            

                                                                                                    </span>

                                                                                                      

                                                                                               </td>

                                                                                                 @endforeach

                                                                                               <td>{{$tasklist->totaltaskhour??'00:00'}}</td>

                                                                                         </tr>

                                                                                        

                                                                                          @endforeach

                                                                                         

                                                                                 @endforeach

                                                                                 <tr class="text-center">

                                                                                     <td>&nbsp;</td>

                                                                                     <td>{{$allsun??'00:00'}} hr</td>

                                                                                      <td>{{$allmon??'00:00'}} hr</td>

                                                                                       <td>{{$alltue??'00:00'}} hr</td>

                                                                                        <td>{{$allwed??'00:00'}} hr</td>

                                                                                         <td>{{$allthu??'00:00'}} hr</td>

                                                                                          <td>{{$allfri??'00:00'}} hr</td>

                                                                                           <td>{{$allsat??'00:00'}}  hr</td>

                                                                                            <td rowspan="2" class="bg-success color-white">

                                                                                        <span>

                                                                                            

                                                                                            {{$allhour??'00:00'}}

                                                                                        </span>

                                                                                    </td>

                                                                                 </tr>

                                                                                   <tr class="text-center">

                                                                                    <td>

                                                                                        &nbsp;

                                                                                    </td>

                                                                                  

                                                                                    <?php 
                                                                                    
                                                                                    $show_find_holy_sun = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[0])->count();

                                                                                    ?>

                                                                                      <td class="{{$show_find_holy_sun >0?'text-danger':'text-warning'}}">

                                                                                       {{$show_find_holy_sun > 0?'Holiday':$tm_status->sun_status??'No Entry'}}

                                                                                    </td>

                                                                                    

                                                                                <?php 
                                                                                    
                                                                                    $show_find_holy_mon = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[1])->count();

                                                                                    ?>
                                                                                     <td class="{{$show_find_holy_mon >0?'text-danger':'text-warning'}}">
                                                                                  
                                                                                         {{$show_find_holy_mon > 0?'Holiday':$tm_status->mon_status??'No Entry'}}


                                                                                    </td>

                                                                                    

                                                                                <?php 
                                                                                    
                                                                                    $show_find_holy_tue = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[2])->count();

                                                                                    ?>
                                                                                         <td class="{{$show_find_holy_tue >0?'text-danger':'text-warning'}}">
                                                                                  
                                                                                      
                                                                                         {{$show_find_holy_tue > 0?'Holiday':$tm_status->tue_status??'No Entry'}}


                                                                                    </td>

                                                                                   

                                                                                                                                                             <?php 
                                                                                    
                                                                                    $show_find_holy_wed = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[3])->count();

                                                                                    ?>
                                                                                     <td class="{{$show_find_holy_wed >0?'text-danger':'text-warning'}}">
                                                                                  
                                                                                     
                                                                                        {{$show_find_holy_wed > 0?'Holiday':$tm_status->wed_status??'No Entry'}}


                                                                                    </td>

                                                                                  

                                                                                                                                                             <?php 
                                                                                    
                                                                                    $show_find_holy_thu = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[4])->count();

                                                                                    ?>

                                                                                      <td class="{{$show_find_holy_thu >0?'text-danger':'text-warning'}}">
                                                                                  

                                                                                     
                                                                                          {{$show_find_holy_thu > 0?'Holiday':$tm_status->thu_status??'No Entry'}}


                                                                                    </td>

                                                                                   

                                                                                                                                                             <?php 
                                                                                    
                                                                                    $show_find_holy_fri = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[5])->count();

                                                                                    ?>

                                                                                     <td class="{{$show_find_holy_fri >0?'text-danger':'text-warning'}}">
                                                                                  

                           
                                                                                          {{$show_find_holy_fri > 0?'Holiday':$tm_status->fri_status??'No Entry'}}


                                                                                    </td>

                                                                                  

                                                                                    <?php 
                                                                                    
                                                                                    $show_find_holy_sat = DB::table('main_holidaydates')->whereDate('holidaydate',$daterange[6])->count();

                                                                                    ?>

                                                                                    <td class="{{$show_find_holy_sat >0?'text-danger':'text-warning'}}">
                                                                                  

                                                                                       
                                                                                         {{$show_find_holy_sat > 0?'Holiday':$tm_status->sat_status??'No Entry'}}


                                                                                    </td>

                                                                                   

                                                                                </tr>

                                                                            </tbody>

                                                                        </table>

                                                                    </div>

                                                                        <div class="col-sm-12 m-t-20">

                                                            <div class="row">

                                                                <div class="col-sm-12">

                                                                    <div>

                                                                        <label>Weekly Notes</label>

                                                                    </div>

                                                                    <div>

                                                                        <textarea class="form-control"

                                                                            rows="3" name="weeknotes" {{$dis??''}} id="weeknotes">{{$weeknote->week_note??''}}</textarea>

                                                                    </div>

                                                                </div>

                                                                <input type="hidden" name="submitvalue" id="submitvalue">

                                                                <div class="col-sm-12 m-t-20">

                                                                    <div class="float-right">

                                                                              <?php

                                                                        if(isset($tm_status->week_status)){

                                                                        if($tm_status->week_status == 'submitted' || $tm_status->week_status == 'approved' ){ ?>

                                                                            

                                                                        

                                                                            

                                                                       <?php }else{ ?>

                                                                       

                                                                               <button type="submit"   data-value="1" value="1" class="btn btn-primary">Save</button>

                                                                        <button type="submit"   data-value="2" value="2" class="btn btn-success">Save And Submit

                                                                            </button>

                                                                            

                                                                         

                                                                      <?php      

                                                                        }

                                                                        }else{

                                                                            ?>

                                                                            

                                                                                    <button type="submit"   data-value="1" value="1" class="btn btn-primary">Save</button>

                                                                        <button type="submit"   data-value="2" value="2" class="btn btn-success">Save And Submit</button>

                                                                            

                                                                              

                                                                            

                                                                      <?php

                                                                      }

                                                                        

                                                                        ?>

                                                                

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                       

                                                        

                                                         </form>

                                                        

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

                                                            

                                                            <div class="col-sm-6 p-l-0">

                                                                <h6

                                                                    class="m-0 text-center relative bg-light p-10 cursorpointer font-20">

                                                                    <i class="fa fa-calendar-alt m-r-5"

                                                                        id="datepicker"></i><input type="hidden"

                                                                        id="dp" />December

                                                                    <div class="tableabsolute">

                                                                        <table border="1">

                                                                            <thead>

                                                                                <tr>

                                                                                    <td colspan="3" class="form-group">

                                                                                        <select class="form-control">

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

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row m-t-10">

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

                                                            <div class="tab-content py-2">

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

                                                <div class="tab-pane p-3" id="profile1" role="tabpanel">

                                                    <div class="col-sm-12 m-t-10">

                                                        <div class="row">

                                                            <div class="col-sm-6">

                                                                <span class="cursorpointer relative"><i

                                                                        class="fa fa-calendar-alt m-r-5"></i>

                                                                    January

                                                                    <div class="tableabsolute position"

                                                                        style="display: block;">

                                                                        <table border="1">

                                                                            <thead>

                                                                                <tr>

                                                                                    <td colspan="3" class="form-group">

                                                                                        <select class="form-control">

                                                                                            <option>2019</option>

                                                                                            <option>2020</option>

                                                                                        </select>

                                                                                    </td>

                                                                                </tr>

                                                                            </thead>

                                                                            <tbody>

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

                                                                            </tbody>

                                                                        </table>

                                                                    </div>

                                                                </span>

                                                            </div>

                                                            <div class="col-sm-6">

                                                                <span class="float-right">

                                                                    <span

                                                                        class="div-right-b padding-5 cursorpointer text-primary">Monthly

                                                                        View</span>

                                                                    <span

                                                                        class="text-dark cursorpointer padding-5">Weekly

                                                                        View</span>

                                                                </span>

                                                            </div>

                                                        </div>

                                                        <div class="row m-t-20">

                                                            <div class="col-sm-6">

                                                                <ul class="simpleul">

                                                                    <li class="active">All</li>

                                                                    <li>For Approval</li>

                                                                    <li>Rejected</li>

                                                                    <li>Blocked</li>

                                                                    <li>Enabled</li>

                                                                    <li>Approved</li>

                                                                </ul>

                                                            </div>

                                                            <div class="col-sm-6">

                                                                <div class="d-flex flex-row-reverse">

                                                                    <div class="p-2">

                                                                        <form role="search" class="app-search m-0"

                                                                            style="height: 0;">

                                                                            <div class="form-group mb-0">

                                                                                <input type="text"

                                                                                    class="form-control m-0"

                                                                                    placeholder="Search by Employee..">

                                                                                <button type="submit"

                                                                                    style="top:10px"><i

                                                                                        class="fa fa-search"></i></button>

                                                                            </div>

                                                                        </form>

                                                                    </div>

                                                                    <div class="p-2">

                                                                        <select

                                                                            class="form-control js-example-basic-single"

                                                                            name="state">

                                                                            <option value="1">Reporting To Me</option>

                                                                            <option value="2">Associated with project

                                                                            </option>

                                                                            <option value="3">All</option>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                                <!-- <div class="float-right">

                                                                    <span>

                                                                      

                                                                    </span>

                                                                    <span class="form-group">

                                                                      

                                                                    </span>

                                                                </div> -->

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-3">

                                                                <div class="card m-b-10 float-left width100 box-shadow">

                                                                    <div class="media p-l-5 p-r-5 p-t-5">

                                                                        <div class="media-body">

                                                                            <h6 class="mt-0 mb-0 font-16 text-info">

                                                                                Nisha

                                                                                Upreti</h6>

                                                                            <div class="m-t-10 m-b-10">

                                                                                <table rules="rows" width="100%"

                                                                                    class="emp_status">

                                                                                    <tbody>

                                                                                        <tr>

                                                                                            <th>Status</th>

                                                                                            <td class="text-danger">No

                                                                                                Entery</td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <th>Total Hrs</th>

                                                                                            <td class="text-dark">

                                                                                                00:00

                                                                                            </td>

                                                                                        </tr>

                                                                                    </tbody>

                                                                                </table>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="mainhilight">

                                                                        <button class="btn btn-success">Enable</button>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                <div class="card m-b-10 float-left width100 box-shadow">

                                                                    <div class="media p-l-5 p-r-5 p-t-5">

                                                                        <div class="media-body">

                                                                            <h6 class="mt-0 mb-0 font-16 text-info">

                                                                                Amit

                                                                                Singh</h6>

                                                                            <div class="m-t-10 m-b-10">

                                                                                <table rules="rows" width="100%"

                                                                                    class="emp_status">

                                                                                    <tbody>

                                                                                        <tr>

                                                                                            <th>Status</th>

                                                                                            <td class="text-blocked">

                                                                                                Blocked</td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <th>Total Hrs</th>

                                                                                            <td class="text-dark">

                                                                                                00:00

                                                                                            </td>

                                                                                        </tr>

                                                                                    </tbody>

                                                                                </table>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="mainhilight">

                                                                        <button class="btn btn-success">Enable</button>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                <div class="card m-b-10 float-left width100 box-shadow">

                                                                    <div class="media p-l-5 p-r-5 p-t-5">

                                                                        <div class="media-body">

                                                                            <h6 class="mt-0 mb-0 font-16 text-info">

                                                                                Ujjwal Srivastava

                                                                            </h6>

                                                                            <div class="m-t-10 m-b-10">

                                                                                <table rules="rows" width="100%"

                                                                                    class="emp_status">

                                                                                    <tbody>

                                                                                        <tr>

                                                                                            <th>Status</th>

                                                                                            <td class="text-info">Yet to

                                                                                                Submit

                                                                                            </td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <th>Total Hrs</th>

                                                                                            <td class="text-dark">

                                                                                                09:00

                                                                                            </td>

                                                                                            <td>

                                                                                                <a href="emp_timesheet.html"

                                                                                                    class="text-info">

                                                                                                    <i

                                                                                                        class="fa fa-eye m-r-5"></i>View

                                                                                                    Time

                                                                                                </a>

                                                                                            </td>

                                                                                        </tr>

                                                                                    </tbody>

                                                                                </table>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="mainhilight">

                                                                        <button class="btn btn-success">Enable</button>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                <div class="card m-b-10 float-left width100 box-shadow">

                                                                    <div class="media p-l-5 p-r-5 p-t-5">

                                                                        <div class="media-body">

                                                                            <h6 class="mt-0 mb-0 font-16 text-info">

                                                                                Poonam Kashyap

                                                                            </h6>

                                                                            <div class="m-t-10 m-b-10">

                                                                                <table rules="rows" width="100%"

                                                                                    class="emp_status">

                                                                                    <tbody>

                                                                                        <tr>

                                                                                            <th>Status</th>

                                                                                            <td class="text-dark">

                                                                                                Enabled

                                                                                            </td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <th>Total Hrs</th>

                                                                                            <td class="text-dark">

                                                                                                09:00

                                                                                            </td>

                                                                                            <td>

                                                                                                <a href="emp_timesheet.html"

                                                                                                    class="text-info">

                                                                                                    <i

                                                                                                        class="fa fa-eye m-r-5"></i>View

                                                                                                    Time

                                                                                                </a>

                                                                                            </td>

                                                                                        </tr>

                                                                                    </tbody>

                                                                                </table>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="mainhilight">



                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                <div class="card m-b-10 float-left width100 box-shadow">

                                                                    <div class="media p-l-5 p-r-5 p-t-5">

                                                                        <div class="media-body">

                                                                            <h6 class="mt-0 mb-0 font-16 text-info">

                                                                                Monika Pandit

                                                                            </h6>

                                                                            <div class="m-t-10 m-b-10">

                                                                                <table rules="rows" width="100%"

                                                                                    class="emp_status">

                                                                                    <tbody>

                                                                                        <tr>

                                                                                            <th>Status</th>

                                                                                            <td class="text-dark">

                                                                                                For Approval

                                                                                            </td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <th>Total Hrs</th>

                                                                                            <td class="text-dark">

                                                                                                09:00

                                                                                            </td>

                                                                                            <td>

                                                                                                <a class="text-info"

                                                                                                    href="emp_timesheet.html"><i

                                                                                                        class="fa fa-eye m-r-5"></i>View

                                                                                                    Time

                                                                                                </a>

                                                                                            </td>

                                                                                        </tr>

                                                                                    </tbody>

                                                                                </table>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="mainhilight">

                                                                        <button class="btn btn-primary">Approve</button>

                                                                        <button class="btn btn-danger">Reject</button>

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

   

   var rurl = base_url+'/user-timesheet/'+year+'-'+month+'/'+week+'/'+totalweek+'/'+time;

   

     window.location = rurl;

   

   

    

}



function validateTime(s) {

  var t = s.split(':');



  return /^\d\d:\d\d:\d\d$/.test(s) &&

         t[0] >= 0 && t[0] < 25 &&

         t[1] >= 0 && t[1] < 60 &&

         t[2] >= 0 && t[2] < 60;

}





      $("form#filltimesheetuser").submit(function(e) {

          

 

            e.preventDefault();

            

var submitclick =  $(document.activeElement).val();



if(submitclick == 2){

    var result = confirm("Are Sure To Submit Week" + currentweek);

if (result) {

    

      $('#submitvalue').val(submitclick);



   var token = "{{csrf_token()}}"; 

$('#loadingDiv').show();



  $.ajax({

        url: '/enterfilluseproject',

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

              // location.reload();



          }else{



             $('#loadingDiv').hide();

            

           alertify.success(data.msg);



          }

          

        }

      });

   

}

}else{

    

      $('#submitvalue').val(submitclick);



   var token = "{{csrf_token()}}"; 

$('#loadingDiv').show();



  $.ajax({

        url: '/enterfilluseproject',

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

              // location.reload();



          }else{



             $('#loadingDiv').hide();

            

           alertify.success(data.msg);



          }

          

        }

      });

    

}







            



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

</script>





<script>







function assignHour(yearMonth,currentweek,totalWeek,time){

    

    base_url = $('#base_url').val();

  

      var editurl =   base_url+'/user-timesheet/'+yearMonth+'/'+currentweek+'/'+totalWeek+'/'+time;

 



     

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

     cls=$(this).data('id');

       $('.'+cls).toggle();

       debugger

        $(this).find(".caret").toggleClass("rotate");

        $(this).toggleClass("open");

});

$(document).on("click",".caret_row1",function(){

       $(this).siblings('.caret_row2').toggle(); 

       $(this).siblings('.row_update').toggle();

        $(this).find(".caret").toggleClass("rotate");

})



$(document).on("click", ".relative", function () {

  $(".tableabsolute").css("display", "block");

  event.stopPropagation();

})

$('body').click(function () {

  $(".tableabsolute").css("display", "none");

})

</script>



<script src="http://keith-wood.name/js/jquery.plugin.js"></script>

<script src="http://keith-wood.name/js/jquery.timeentry.js"></script>

<script>

$(function () {

    $('.defaultEntry').timeEntry({show24Hours: true,initialField:0,spinnerImage:'', defaultTime:"00:00"});

});

</script>

@stop