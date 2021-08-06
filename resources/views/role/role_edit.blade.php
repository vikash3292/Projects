@extends('layouts.superadmin_layout')
@section('content')
<?php  //echo "<pre>"; print_r($classData); ?>
<!-- Content Wrapper. Contains page content -->

      <!-- Start content -->
      <div class="content p-0">
         <div class="container-fluid">
            <div class="page-title-box">
               <div class="row align-items-center bredcrum-style">
                  <div class="col-sm-6">
                     <h4 class="page-title">Edit Role</h4>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">GRC</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit Role</a></li>
                     </ol>
                  </div>
               <!--    <div class="col-sm-6">
                     <a href="#" class="btn btn-primary float-right">Back to List</a>
                  </div> -->
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
                  <form class="court-info-form"  role="form" method="POST" action="{{URL::to('/update_role')}}"  enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empcode" class="col-lg-4 col-form-label">Role
                                    Type</label>
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control" name="roletype" value="{{$department_detail->roletype}}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empcode" class="col-lg-4 col-form-label">Role
                                    Name</label>
                                    <div class="col-lg-8">
                                       <input type="text" placeholder="" class="form-control" name="rolename" value="{{$department_detail->rolename}}">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empid" class="col-lg-4 col-form-label">Description</label>
                                    <div class="col-lg-8">
                                       <textarea rows="3" class="form-control" name="description">{{$department_detail->roledescription}}</textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                              	<div class="form-group row">
                               <label for="empid" class="col-lg-4 col-form-label">Status <font color="red">*</font></label>
                             <div class="col-lg-8">
                              <select name="status" placeholder="" class="form-control" value="" required="required">
                                 <option value="1" @if($department_detail->isactive==1) selected @endif >Active</option>
                                 <option value="2" @if($department_detail->isactive==2) selected @endif>Inactive</option>
                              </select>
                          </div>
                          </div>
                           </div>
                           </div>
                           <input type="hidden" name="id" value="{{$department_detail->id}}">
                           <div class="row">
                              <div class="col-md-12">
                                 <button class="btn btn-primary float-right">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
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