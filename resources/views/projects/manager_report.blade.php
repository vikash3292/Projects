
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
                                <h4 class="page-title">Project Manager Report</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Project Manager
                                            Report</a>
                                    </li>
                                </ol>
                            </div>
                            {{-- <div class="col-sm-6">
                                <button class="btn btn-primary float-right">Export CSV</button>
                            </div> --}}
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
                                                                            
                                                                           
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <form method="GET">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Project
                                                    Status</label>
                                              
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="status" required>
                                                        <option value="">--Select--</option>
                                                      @foreach($arr as $arrs)
                                                      <option value="{{$arrs}}"   @if(!empty($_GET['status'])) @if($_GET['status'] == $arrs) selected @endif @endif>{{ucwords($arrs)}}</option>
                                                      @endforeach
                                                        <option @if(!empty($_GET['status'])) @if($_GET['status'] == 'All') selected @endif @endif>All</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                           <?php
                                    $managerlist = DB::table('main_users')->where('emprole',3)->where('isactive',1)->orderBy('userfullname','ASC')->get();
                                    ?>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Project
                                                    Manager</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="mid" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($managerlist as $managerlists)
                                                        <option value="{{$managerlists->id}}" @if(!empty($_GET['mid'])) @if($_GET['mid'] == $managerlists->id) selected @endif @endif>{{$managerlists->userfullname}}</option>
                                                        @endforeach
                                                        <option @if(!empty($_GET['mid'])) @if($_GET['mid'] == 'All') selected @endif @endif>All</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $category = DB::table('main_project_category')->where('status',1)->get();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Category
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" name="cat" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($category as $categorys)
                                                        <option value="{{$categorys->id}}" @if(!empty($_GET['cat'])) @if($_GET['cat'] == $categorys->id) selected @endif @endif>{{$categorys->cat_name}}</option>
                                                        @endforeach
                                                       <option @if(!empty($_GET['cat'])) @if($_GET['cat'] == 'All') selected @endif @endif>All</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-sm-12">
                                               <button class="btn btn-primary float-right">Submit</button>
                                            </div>
                                        </div>
                                         </div>
                                    </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12 m-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <div class="col-sm-12 btn-tab">
                                            <ul class="nav nav-tabs small justify-content-end" role="tablist">
                                                <form class="absolutecheckbox">
                                                    <input type="checkbox"    @if(!empty($_GET['outall'])) checked  @endif name="outall" value="alluser">
                                                    <label>On Site</label>
                                                </form>
                                                 <div class="absolutemonth">
                                                                       <h6
                                                                    class="m-0 text-center relative bg-light padding-5 cursorpointer font-20">
                                                                    <i class="fa fa-calendar-alt m-r-5"
                                                                        id="datepicker"></i><input type="hidden"
                                                                        id="dp" />{{$everyMonth??''}}
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
                                                <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"-->
                                                <!--        role="tab">Week-->
                                                <!--        2</a></li>-->
                                                <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"-->
                                                <!--        role="tab">Week-->
                                                <!--        3</a></li>-->
                                                <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"-->
                                                <!--        role="tab">Week-->
                                                <!--        4</a></li>-->
                                                <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5"-->
                                                <!--        role="tab">Week-->
                                                <!--        5</a></li>-->
                                            </ul>
                                            <div class="tab-content py-2">
                                                <div class="tab-pane active" id="tab1" role="tabpanel">
                                                    <div class="col-sm-12 table-responsive table_timesheet">
                                                        <table border="0" width="100%" class="text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="bg-naviblue text-left">Project Manager
                                                                    </th>
                                                                    <th class="bg-naviblue" colspan="8">
                                                                        Actual Hours in Week
                                                                        {{$weekcountpassed}}</th class="p-10">
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="bg-dark color-white float-none">
                                                                    <td>&nbsp;</td>
                                                                    
                                                                      @foreach($daterange as $dateranges)
                                                                 <td>
                                                                        {{date('D d M',strtotime($dateranges))}}
                                                                 </td>
                                                                     @endforeach
                                                                                                                                   
                                                                  <td>Hours</td>
                                                                </tr>
                                                                <?php
                                                                $i = 1;
                                                                ?>
                                                                
                                                                @if(count($managerlist_data) == 0)
                                                                
                                                                <tr class="caret_row2" style="display: none;">
                                                                    <td colspan="8">
                                                                        No Record Found
                                                                    </td>  
                                                                    
                                                                    <tr>
                                                                
                                                                @endif
                                                               
                                                                @if(isset($managerlist_data) && !empty($managerlist_data))
                                                                @foreach($managerlist_data as $managerlists)
                                                               
                                                                <tr class="caret_row">
                                                                    <td class="width20 text_ellipses text-left" colspan="9" data-toggle="tooltip" title="" data-original-title="{{$managerlists->userfullname??''}}"><span class="caret">{{$managerlists->userfullname??''}}</span></td>
                                                                   
                                                                </tr> 
                                                                @if(isset($managerlists->project_list) && !empty($managerlists->project_list))
                                                                 @foreach($managerlists->project_list as $project_list_data)
                                                                <tr class="caret_row1" style="display: none;">
                                                                     <td class="width20 text_ellipses text-left" data-toggle="tooltip" title="" data-original-title="{{$project_list_data->project_name??''}}"><span class="caret p-l-15">{{$project_list_data->project_name??''}}</span></td>
                                                                   
                                                                         <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                    <td class="text-left ">
                                                                        <span>{{abs($project_list_data->project_hour_mon??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left ">
                                                                        <span> {{abs($project_list_data->project_hour_tue??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($project_list_data->project_hour_wed??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($project_list_data->project_hour_thu??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($project_list_data->project_hour_fri??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                      {{abs($project_list_data->project_hour??'')}}
                                                                    </td>
                                                                   
                                                                </tr>
                                                                 @if(isset($project_list_data->emplistthisproject) && !empty($project_list_data->emplistthisproject))
                                                               @foreach($project_list_data->emplistthisproject as $emp_list)
                                                                <tr class="caret_row2" style="display: none;">
                                                                    <td class="text-left width20 text_ellipses" data-toggle="tooltip" title="" data-original-title="{{$emp_list->userfullname??''}}">
                                                                        <span class="p-l-35">{{$emp_list->userfullname??''}}</span>
                                                                    </td>                                                                      
                                                                   <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                    <td class="text-left {{(abs($emp_list->user_hour_mon_diff) == 0)?'bg-green':$emp_list->user_hour_mon_color}}">
                                                                        <span>{{abs($emp_list->user_hour_mon_diff??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left {{(abs($emp_list->user_hour_tue_diff) == 0)?'bg-green':$emp_list->user_hour_tue_color}} ">
                                                                        <span> {{abs($emp_list->user_hour_tue_diff??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left {{(abs($emp_list->user_hour_wed_diff) == 0)?'bg-green':$emp_list->user_hour_wed_color}} ">
                                                                        <span> {{abs($emp_list->user_hour_wed_diff??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left {{(abs($emp_list->user_hour_thu_diff) == 0)?'bg-green':$emp_list->user_hour_thu_color}} ">
                                                                        <span> {{abs($emp_list->user_hour_thu_diff??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left {{(abs($emp_list->user_hour_fri_diff) == 0)?'bg-green':$emp_list->user_hour_fri_color}}">
                                                                        <span> {{abs($emp_list->user_hour_fri_diff??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                    <td class="text-left">
                                                                      {{abs($emp_list->userhour??'')}}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                 @endif
                                                                  @endforeach
                                                                  @endif
                                                                @endforeach
                                                                @endif
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
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
                <div id="filltimesheet" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Time Entry:Wed 5th, February,2020</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Task</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="Design" placeholder="Design" disabled
                                id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Project</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="HSBC" disabled placeholder="HSBC"
                                id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row time_entry">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Time Entry</label>
                        <div class="col-sm-8">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row note_entry">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Add Note</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input bg-gray" class="col-sm-12 col-form-label">
                            <i class="far fa-clock"></i>
                            Total Time: 0 hours 0 mins</label>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect">Save Changes</button>
                    <button type="button" class="btn btn-secondary waves-effect waves-light"
                        data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
   
   
   @stop
   
   @section('extra_js')
   <script>
   
  
   
   function getresult(month,week,currentweek,totolweek,time){
       
        var status_project = "{{$_GET['status']??''}}";
     var mid = "{{$_GET['mid']??''}}";
       var cat = "{{$_GET['cat']??''}}";
      
      if(status_project && mid && cat){
          
          var status = '?status='+status_project+'&mid='+mid+'&cat='+cat;
          
      }else{
          
          var status= '';
      }
      
 
    
     base_url = $('#base_url').val();
    
   var year = $('#getyear').val();
   
  
    var rurl = base_url+'/manager-report/'+year+'-'+month+'/'+week+'/'+totolweek+'/'+time+status;
   
     window.location = rurl;

}

function assignHour(yearMonth,currentweek,totalWeek,time){
    
     var status_project = "{{$_GET['status']??''}}";
     var mid = "{{$_GET['mid']??''}}";
       var cat = "{{$_GET['cat']??''}}";
       
        if(status_project && mid && cat){
          
          var status = '?status='+status_project+'&mid='+mid+'&cat='+cat;
          
      }else{
          
          var status= '';
      }
    
    base_url = $('#base_url').val();
  
      var editurl =   base_url+'/manager-report/'+yearMonth+'/'+currentweek+'/'+totalWeek+'/'+time + status;
 

     
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
    // $(this).toggleClass("open").nextUntil(".caret_row").toggle();
    // $(this).siblings('.caret_row2').hide(); 
    //  $(this).find(".caret").toggleClass("rotate");
      //  $(this).siblings('.row_update').hide(); 
    
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
    debugger
    $(this).toggleClass("open").nextUntil(".caret_row1").toggle();
      $(this).find(".caret").toggleClass("rotate");
    //  $(this).nextUntil(".row_update").show();
    //   $(this).find(".caret").toggleClass("rotate");
    //   $(this).siblings('.caret_row2').toggle(); 
    //   $(this).siblings('.row_update').toggle();
    //     $(this).find(".caret").toggleClass("rotate");
})
 $(document).on("click", ".relative", function () {
  $(".tableabsolute").css("display", "block");
  event.stopPropagation();
})
$('body').click(function () {
  $(".tableabsolute").css("display", "none");
})
</script>
@stop
   