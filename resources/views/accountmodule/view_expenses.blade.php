@extends('layouts.superadmin_layout')
@section('content')

  <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Expenses View</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="expenses_view.html.html">Expenses View</a></li>
                                </ol>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="expenses.html" class="btn btn-primary">Back to List</a>
                                <button class="btn btn-primary"><i class="fa fa-download"></i> Download</button>
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
                                                <label for="empcode" class="col-lg-4 col-form-label">Employee Name
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->userfullname??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Expense Name
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->expense_name??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Project</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->project_name??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Category
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->cat_name??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Expense Date</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->expeses_date??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Reimbursable
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">

                                                        @if($expense_view->Reimbursable_amt==1)
                                                            Yes
                                                        @else
                                                           No
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Reimbursable Amount
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->raimbs_amt??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Amount
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->  expenses_amt??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Advance</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <label class="myprofile_label">
                                                        @if($expense_view->advanse==1)
                                                            No Advance
                                                        @else
                                                            Advance
                                                        @endif</label>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Add To Trip</label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->  trip??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Description
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label">{{$expense_view->  desc??''}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Uploaded
                                                    Receipt</label>
                                                    <div class="col-lg-8 col-form-label">
                                                        <label class="myprofile_label">{{$expense_view->upload_reciept??''}}</label>
                                                        
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Status
                                                </label>
                                                <div class="col-lg-8 col-form-label">
                                                    <label class="myprofile_label"> @if($expense_view->status==1)
                                                            Submited
                                                        @else
                                                            Reimburse
                                                        @endif</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="p-lr-20">TimeLine</h4>
                                        </div>
                                    </div>
                                    <div id="cd-timeline">
                                        <ul class="timeline list-unstyled">

                                            @foreach($expense_timeline as $k => $expense_timelines)

                                            @if($k%2==0)
                                            @php($class='timeline-list')
                                            @else
                                            @php($class='timeline-list  right clearfix')
                                            @endif
                                           <li class="{{$class}}">
                                              <div class="cd-timeline-content bg-light p-10">
                                                 <h5 class="mt-0 mb-2">{{ucwords($expense_timelines->userfullname)}}</h5>
                                                 <p class="mb-2">{{$expense_timelines->msg}}</p>
                                                 <p class="mb-0"></p>
                                                 <div class="date bg-primary">
                                                    <h5 class="mt-0 mb-0">{{date('d',strtotime($expense_timelines->created_at))}}</h5>
                                                    <p class="mb-0 text-white-50">{{date('M',strtotime($expense_timelines->created_at))}}</p>
                                                 </div>
                                              </div>
                                           </li>
                                           @endforeach
                                          <!--  <li class="timeline-list right clearfix">
                                              <div class="cd-timeline-content bg-light p-10">
                                                 <h5 class="mt-0 mb-2">Himanshu Pawar</h5>
                                                 <p>Reimbursable</p>
                                                 <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light m-t-5">See more detail</button>
                                                 <div class="date bg-primary">
                                                    <h5 class="mt-0 mb-0">23</h5>
                                                    <p class="mb-0 text-white-50">Jan</p>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="timeline-list">
                                              <div class="cd-timeline-content bg-light p-10">
                                                 <h5 class="mt-0 mb-2">Nisha Upreti</h5>
                                                 <p>Reimburse</p>
                                                 <img src="assets/images/small/img-1.jpg" alt="" class="rounded mr-1" width="120"> <img src="assets/images/small/img-2.jpg" alt="" class="rounded" width="120">
                                                 <div class="date bg-primary">
                                                    <h5 class="mt-0 mb-0">24</h5>
                                                    <p class="mb-0 text-white-50">Jan</p>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="timeline-list right clearfix">
                                              <div class="cd-timeline-content bg-light p-10">
                                                 <h5 class="mt-0 mb-2">Timeline Event Four</h5>
                                                 <p class="mb-2">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental</p>
                                                 <p class="mb-0">languages are members of the same family. Their separate existence is a myth... <a href="#" class="text-primary">Read More</a></p>
                                                 <div class="date bg-primary">
                                                    <h5 class="mt-0 mb-0">25</h5>
                                                    <p class="mb-0 text-white-50">Jan</p>
                                                 </div>
                                              </div>
                                           </li> -->
                                        </ul>
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