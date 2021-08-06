@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6 col-6">
                        <h3 class="page-title">SOW View</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                           <li class="breadcrumb-item active"><a href="scope_view.html">SOW View</a></li>
                        </ol>
                     </div>
                     <div class="col-sm-6 col-6">
                        <div class="float-right d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('edit_scope')}}/{{$view_scope->id}}">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Edit SOW</button></a>
                                   <a href="{{URL::to('scope-of-work')}}"> <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Back</button>
                                 </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="width-float">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="empcode" class="col-lg-4 col-form-label">Name of SOW</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->scope_name??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="empid" class="col-lg-4 col-form-label">Organization</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->org_name??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="prifix" class="col-lg-4 col-form-label">Work Order</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->work_order_name??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="firstname" class="col-lg-4 col-form-label">Contact</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->contact_no??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="logo" class="col-lg-4 col-form-label">Created By</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->created_name??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="email" class="col-lg-4 col-form-label">Modified By</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->modifile_name??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="cid" class="col-lg-4 col-form-label">Modified DateTime</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->modifiled_at??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row m-0">
                                       <label for="mode" class="col-lg-4 col-form-label">Created Time</label>
                                       <div class="col-lg-8 col-form-label">
                                          <label class="myprofile_label">{{$view_scope->created_at??''}}</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-12">
                                       <h5>Editor View</h5>
                                       {!!$view_scope->text_msg??''!!}

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