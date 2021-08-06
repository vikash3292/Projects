  @extends('layouts.superadmin_layout')

@section('content')


  <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Ticket View</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="ticket_view.html.html">Ticket View</a></li>
                                </ol>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="javascript: history.go(-1)" class="btn btn-primary">Back to List</a>
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
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Asset Name
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$view_ticket->ticket_name??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Subject
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$view_ticket->subject??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Commnet
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$view_ticket->commnet??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Status</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{($view_ticket->status==1)?'Open':'Closed'}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                  <label for="desp" class="col-lg-4 col-form-label">Description</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$view_ticket->desc??''}}</label>
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