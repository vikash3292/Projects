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
                                <h4 class="page-title">Export Timssheet</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Export Timssheet
                                            </a></li>
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
                                 <form method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <?php 
                                        $userdetils = DB::table('main_users')->where('isactive',1)->whereNull('extension')->get();
                                        ?>
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Employee <span class="text-danger">*</span></label>
                                                   <div class="col-lg-8">
                                                       <select class="form-control js-example-basic-single" name="user_id" id="user_id" required>
                                                         
                                                         <option value=""> Select Option</option>
                                                           <option value="all"> All Employee</option>
                                                           @foreach($userdetils as $userlist)
                                                           
                                                         <option value="{{$userlist->id}}"  >{{ucwords($userlist->userfullname)}}</option>
                                                         
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
                                      
                                                       <select class="form-control js-example-basic-single" name="month" id="month" required>
                                                        <option value="">Select</option>
                                                        <?php 
                                             for($x = 1; $x <= (int)date('m'); $x++) {
                                              $value = str_pad($x,2,"0",STR_PAD_LEFT); 
                                               $sel=(date('m')==$value)?'selected':'';?>
                                   
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
                                         
                                                     <select class="form-control js-example-basic-single" name="year" id="year" required>
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
                                            <button type="submit" class="btn btn-primary float-right">Export</button>
                                        </div>
                                    </div>
                                   </form>
                                   
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