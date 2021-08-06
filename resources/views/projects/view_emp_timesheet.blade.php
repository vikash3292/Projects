

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
                                <h4 class="page-title">Employee Timesheet</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a  href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Employee
                                            Timesheet</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
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
                                            <h6>
                                                <span class="text-muted">Status:</span>
                                                <span class="text-blocked m-r-5">{{$tm_emp_status->week_status??''}}</span>
                                                @if(!empty($tm_emp_status->id)))
                                                <span class="float-right">
                                                    <button   onclick="empApproveTimesheet('{{$userdetails->id}}','{{$tm_emp_status->id??''}}','{{$weekcountpassed}}','{{$userdetails->reporting_manager}}',1)" class="btn btn-primary">Approve</button>
                                                    <button  onclick="empRejectTimesheet('{{$userdetails->id}}','{{$tm_emp_status->id??''}}','{{$weekcountpassed}}','{{$userdetails->reporting_manager}}')" class="btn btn-danger">Reject</button>
                                                </span>
                                                @endif
                                            </h6>
                                        </div>

                                        <!-- <div class="row m-t-20">
                                           
                                        </div> -->

                                    </div>
                                    <div class="row" id="weekviewdiv">
                                        <div class="col-sm-12 m-t-20">
                                            <div class="row">
                                                <div class="col-sm-6 p-r-0">
                                                    <h6 class="m-0 bg-light padding-5">
                                                        <form role="search" class="app-search" style="height: 0;">
                                                            <div class="form-group mb-0">
                                                                <input type="text" class="form-control m-0"
                                                                    placeholder="Search by Name..">
                                                                <button type="submit" style="top:10px"><i
                                                                        class="fa fa-search"></i></button>
                                                            </div>
                                                        </form>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-6 p-l-0">
                                                    <h6
                                                        class="m-0 text-center relative bg-light p-10 cursorpointer font-20">
                                                        <i class="fa fa-calendar-alt m-r-5"></i>{{$everyMonth}}
                                                        <div class="tableabsolute">
                                                            <table border="1">
                                                                <thead>
                                                                    <tr>
                                                                        <td colspan="3" class="form-group">
                                                                            <select class="form-control"  id="getyear">
                                                                            <?php for($i=0; $i < 5; $i++){ 
                                                                                           ?>
                                                                                  <option value="<?php echo ($current_year+$i); ?>" <?php echo ($future_year == $current_year+$i)?'selected':'';?>><?php echo ($current_year+$i); ?></option>
                                                                              <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                               
                                                                <tr>
                                                                                <td  onclick="getresult('{{$userid}}',01,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')"  >Jan</td>
                                                                                <td  onclick="getresult('{{$userid}}',02,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Feb</td>
                                                                                <td   onclick="getresult('{{$userid}}',03,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Mar</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  onclick="getresult('{{$userid}}',04,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Apr</td>
                                                                                <td  onclick="getresult('{{$userid}}',05,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >May</td>
                                                                                <td   onclick="getresult'{{$userid}}',(06,'{{$weekcountpassed}}','{{$currentweekCount}}','{{$totalweekCount}}','time')" >Jun</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  onclick="getresult('{{$userid}}',07,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Jul</td>
                                                                                <td  onclick="getresult('{{$userid}}',08,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Aug</td>
                                                                                <td  onclick="getresult('{{$userid}}',09,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Sep</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td onclick="getresult('{{$userid}}',10,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Oct</td>
                                                                                <td  onclick="getresult('{{$userid}}',11,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Nov</td>
                                                                                <td  onclick="getresult('{{$userid}}',12,1,'{{$currentweekCount}}','{{$totalweekCount}}','time')" >Dec</td>
                                                                            </tr>
                                                                            
                                                            </table>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </div>
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

                                        <div class="col-sm-12 btn-tab m-t-20">
                                            <ul class="nav nav-tabs small justify-content-end" role="tablist">
                                                <!-- <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                        href="#tab1" role="tab">Week
                                                        1</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"
                                                        role="tab">Week
                                                        2</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"
                                                        role="tab">Week
                                                        3</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"
                                                        role="tab">Week
                                                        4</a></li> -->
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
                                                                    onclick="assignHour('{{$userid}}','{{$paginationDate}}','{{$i}}','{{$totalweekCount}}','time')" href="javascript:void(0)">Week
                                                                        {{$i}}</a></li>
                                                                @endfor
                                            </ul>
                                            <div class="tab-content py-2">
                                                <div class="tab-pane active" id="tab1" role="tabpanel">
                                                    <div class="col-sm-12 table-responsive table_timesheet">
                                                        <table border="0" width="100%" class="table text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="bg-naviblue">Project Name
                                                                    </th>
                                                                    <th class="bg-naviblue" colspan="8">
                                                                        Actual Hours in Week
                                                                        {{$weekcountpassed??1}}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="bg-dark color-white float-none">
                                                                    <td>&nbsp;</td>
                                                                   
                                                                    @foreach($daterange as $k => $dateranges)
                                                                         
                                                                      
                                                                   
                                                              <td>
                                                                     {{date('D d M',strtotime($dateranges))}}
                                                                              <i class="fas fa-clipboard-list "  data-toggle="modal" data-target="#filltimesheet{{$k}}"></i>
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
                         <textarea rows="3"  name="DailyNote[]"  class="form-control">{{$noteList[$k]??''}}</textarea>
                         <input type="hidden" name="noteDate[]"  value="{{$dateranges}}">
                     </div>
                 </div>
             </div>
             
 
             <div class="modal-footer">
              
                 <button type="button" class="btn btn-success"
                     data-dismiss="modal">Save</button>
             </div>
           
             
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 
  @endforeach 


                                                                    <td>Hours</td>
                                                                </tr>
                                                                <tr>
                                                                <td>&nbsp;</td> 
                                                                @foreach($daterange as $k => $dateranges)

                                                                <?php
                                                                                                                   
                                                                                                               
                                                                                                               $Day =  date('D',strtotime($dateranges));
                                                                                                               
                                                                                                                 if ($Day== 'Sun' || $Day == 'Sat'){
                                                                                                                    
                                                                                                                     $cl = 'readonly';
                                                                                                                    
                                                                                                                     
                                                                                                                 }else{
                                                                                                                     
                                                                                                                       $cl = '';
                                                                                                                       
                                                                                                                     
                                                                                                                 }
                                                                            
                                                                                            ?>
                                                           
                                                                 
                                                                    <td>

                                                                    @if(empty($cl) && !empty($tm_emp_status->id))
                                                                        <div>
                                                                            <i  onclick="indiviablestatus('{{$userdetails->id}}','{{$tm_emp_status->id??''}}','{{$weekcountpassed}}','{{$userdetails->reporting_manager}}','{{$dateranges}}',1)" class="fa fa-check text-primary m-r-10"
                                                                                title="Approve"></i>
                                                                            <i onclick="indiviablestatus('{{$userdetails->id}}','{{$tm_emp_status->id??''}}','{{$weekcountpassed}}','{{$userdetails->reporting_manager}}','{{$dateranges}}',2)" class="fa fa-ban text-danger"
                                                                                title="Reject"></i>
                                                                        </div>
                                                                        @endif
                                                                    </td>
                                                                    
                                                                   
                                                               

                                                                @endforeach
                                                                <td>&nbsp;</td> 
                                                                </tr>

                                                                <?php $i=0; ?>
                                                    @foreach($projectlist as $projectlists)

                                                                <tr>
                                                                    <td class="text-left">
                                                                        <span class="caret">{{$projectlists->project_name??''}}</span>
                                                                    </td>

                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">00:00
                                                                            </span>
                                                                            <span class="p-2">
                                                                                00:00
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>

                                                                            <span
                                                                                class="div-right-b p-2 width100 time_nonedit">{{$projectlists->assign_hour_mon??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2 width100">
                                                                            {{$projectlists->user_hour_mon??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">{{$projectlists->assign_hour_tue??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$projectlists->user_hour_tue??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">{{$projectlists->assign_hour_wed??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$projectlists->user_hour_wed??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">{{$projectlists->assign_hour_thu??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$projectlists->user_hour_thu??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">{{$projectlists->assign_hour_fri??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$projectlists->user_hour_fri??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">00:00
                                                                            </span>
                                                                            <span class="p-2">
                                                                                00:00
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">{{$projectlists->assign_userhour??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$projectlists->userhour??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                   
                                                                </tr>


                                                                @foreach($projectlists->tasklist as $tasklist)
                                                                <tr>
                                                                    <td class="text-left">
                                                                        <span class="p-l-15">{{$tasklist->task??''}}</span>
                                                                    </td>

                                                                    @foreach($daterange as $t => $dateranges)
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit">{{$tasklist->assintime[$t]??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$tasklist->duration[$t]??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>

                                                                    @endforeach
                                                                  
                                                                    <td>
                                                                        <span>
                                                                            <span
                                                                                class="div-right-b p-2 time_nonedit"> {{$tasklist->assigntotaltaskhour??'00:00'}}
                                                                            </span>
                                                                            <span class="p-2">
                                                                            {{$tasklist->totaltaskhour??'00:00'}}
                                                                            </span>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                     @endforeach

                                                               
                                                                <tr class="bg-eee">
                                                                    <td>
                                                                        &nbsp;
                                                                    </td>
                                                                    <td class="text-danger">
                                                                    {{ucwords($tm_emp_status->sun_status??'No Entry')}}
                                                                    </td>
                                                                    <td class="text-warning">
                                                                    {{ucwords($tm_emp_status->mon_status??'No Entry')}}
                                                                    </td>
                                                                    <td class="text-warning">
                                                                    {{ucwords($tm_emp_status->tue_status??'No Entry')}}
                                                                    </td>
                                                                    <td class="text-warning">
                                                                    {{ucwords($tm_emp_status->wed_status??'No Entry')}}
                                                                    </td>
                                                                    <td class="text-warning">
                                                                    {{ucwords($tm_emp_status->thu_status??'No Entry')}}
                                                                    </td>
                                                                    <td class="text-warning">
                                                                    {{ucwords($tm_emp_status->fri_status??'No Entry')}}
                                                                    </td>
                                                                    <td class="text-danger">
                                                                    {{ucwords($tm_emp_status->sat_status??'No Entry')}}
                                                                    </td>
                                                                    <td rowspan="2" class="bg-success color-white">
                                                                        <span>
                                                                        {{$allhour??'00:00'}}
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="bg-eee">
                                                                    <td>
                                                                        <span>&nbsp;</span>
                                                                    </td>

                                                                    <td>
                                                                        <span>
                                                                        00:00
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                        {{$allmon??'00:00'}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                        {{$alltue??'00:00'}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                        {{$allwed??'00:00'}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                        {{$allthu??'00:00'}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                        {{$allfri??'00:00'}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                            00:00
                                                                        </span>
                                                                    </td>
                                                                   

                                                                </tr class="bg-eee">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab2" role="tabpanel">
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Primary</h3>
                                                            <p class="card-text">With supporting text
                                                                below as a natural
                                                                lead-in to additional content.</p>
                                                            <a href="#" class="btn btn-outline-secondary">Outline</a>
                                                        </div>
                                                    </div>
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Primary</h3>
                                                            <p class="card-text">With supporting text
                                                                below as a natural
                                                                lead-in to additional content.</p>
                                                            <a href="#" class="btn btn-outline-secondary">Outline</a>
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

                                    </div>
                                    <div class="row" id="monthviewdiv">
                                        <div class="col-sm-12 m-t-20">
                                            <div id="calendar"></div>
                                            <div style="clear:both"></div>
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


function indiviablestatus(useri_d,status_id,week,repoting_id,applyDate,status){

    $('#loadingDiv').show();
var _token = "{{csrf_token()}}";

$.ajax({
  url: '/indiviable_Statua',
  type: "post",
  data: {"_token": _token,"useri_d":useri_d,"status_id":status_id,"week":week,"repoting_id":repoting_id,"status":status,'applyDate':applyDate},
  dataType: 'JSON',
   
  success: function (data) {
  // this is good
  
    $('#loadingDiv').hide();
 
if(data.status == 200){
  

    alertify.success(data.msg);
    location.reload();
  
}

    
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
  

    alertify.success(data.msg);
    location.reload();
  
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
  
  
    alertify.success(data.msg);
    
    location.reload();
  
}

    
  }
});

}



var currentweek = '{{$weekcountpassed}}';
var userid ='{{$userid}}';
function getresult(userid,month,week,currentweek,totalweek,time){

     base_url = $('#base_url').val();
    
   var year = $('#getyear').val();
   
   var rurl = base_url+'/view-emp-timesheet/'+userid+'/'+year+'-'+month+'/'+week+'/'+totalweek+'/'+time;
   
     window.location = rurl;
   
   
    
}

function validateTime(s) {
  var t = s.split(':');

  return /^\d\d:\d\d:\d\d$/.test(s) &&
         t[0] >= 0 && t[0] < 25 &&
         t[1] >= 0 && t[1] < 60 &&
         t[2] >= 0 && t[2] < 60;
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



function assignHour(userid,yearMonth,currentweek,totalWeek,time){
    
    base_url = $('#base_url').val();
  
      var editurl =   base_url+'/view-emp-timesheet/'+userid+'/'+yearMonth+'/'+currentweek+'/'+totalWeek+'/'+time;
 

     
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