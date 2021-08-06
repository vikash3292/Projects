@extends('layouts.superadmin_layout')
@section('content')
<?php  //echo "<pre>"; print_r($classData); ?>
<!-- Content Wrapper. Contains page content -->

      <!-- Start content -->
      <div class="content p-0">
         <div class="container-fluid">
            <div class="page-title-box">
               <div class="row align-items-center bredcrum-style">
                  <div class="col-sm-6 col-6">
                     <h4 class="page-title">Add Holiday</h4>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">GRC</a></li>
                        <li class="breadcrumb-item active"><a href="#">Add Holiday</a></li>
                     </ol>
                  </div>
                  <div class="col-sm-6 col-6">
                     <a href="javascript:void(0)"  onclick="window.history.go(-1)"  class="btn btn-primary float-right">Back to List</a>
                  </div>
               </div>
            </div>
            <div class="">
               @if(Session::has('alert-success'))
               <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert-success') }}</p>
               @endif
               @if ($message = Session::get('warning'))
               <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
               </div>
               @endif
            </div>
            <!-- end row -->
            <!-- end row -->
            <div class="row">
               <div class="col-12">

                  

<div class="card m-t-20">
   <div class="card-body">
                  <form class="court-info-form"  role="form" method="POST" action="{{URL::to('/holidayManagement/addHoliday')}}"  enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Holiday
                                                    Date</label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" name="holidaydate" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Holiday
                                                    Name</label>
                                                <div class="col-lg-8">
                                                    <input type="text" maxlength="30" placeholder="" class="form-control" name="holidayname" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Holiday
                                                    Type</label>
                                                <div class="col-lg-8">
                                                   <?php 
                                                         $group = DB::table('main_holidaygroups')->get(); 
                                                   ?>


                                                    <select class="form-control" id="il" name="groupid" required="">
                                                      <option value="">Select option</option>
                                                      @foreach($group as $val)
                                                        <option value="{{$val->id}}">{{$val->groupname}}</option>
                                                      @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 display-none" id="ildate">
                            <div class="form-group row m-0">
                                <label for="empcode" class="col-lg-4 col-form-label">IL Date
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                  <input type="date" class="form-control" id="org_open_date" name="org_open_date">
                                    <div id="assets_name_error"></div>
                                 </div>
                            </div>
                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Description</label>
                                                <div class="col-lg-8">
                                                    <textarea rows="3" maxlength="500" class="form-control" name="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary float-right">Save</button>
                                        </div>
                                    </div>
                                

                  </form>
                </div>
                </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
         </div>
         <!-- container-fluid -->
      </div>
   </div>
</div>
<!-- /.content-wrapper -->				
@endsection
@section('extra_js')
<script>
   $('select').on('change', function() {
  if($(this).val()==4){
    
    $("#ildate").css('display','block');
    $("#org_open_date").attr("required", "required");
    
  }
  else{
      $("#ildate").css('display','none');
      $("#org_open_date").removeAttr("required", "required");
  }
});
</script>
@stop