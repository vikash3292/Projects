@extends('layouts.superadmin_layout')
@section('content')

 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Work Order</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="work_order.html">Work Order</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{URL::to('add-work-order')}}">
                                            <button
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                type="button">
                                                Add Work Order</button>
                                        </a>
                                       
                                    </div>
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
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Work Order Name</th>
                                                <th>Work Order No.</th>
                                                <th>Work Order Date.</th>
                                                <th>Amount</th>
                                                <th>Project
                                                    Name</th>
                                                <th>Sales Person</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach($work_order_list as $work_order_lists)
                                            <tr onclick="window.location='{{URL::to('view-work-order')}}/{{$work_order_lists->id}}'">
                                                <td>{{$i++}}</td>
                                                <td>{{$work_order_lists->work_order_name}}
                                                </td>
                                                <td>{{$work_order_lists->work_order_no}}</td>
                                                 <td>{{$work_order_lists->order_date}}</td>
                                                <td>{{$work_order_lists->work_amt}}</td>
                                                <td>{{$work_order_lists->project_name}}</td>
                                                <td>{{$work_order_lists->userfullname}}</td></td>
                                                <td><span class="text-info">{{($work_order_lists->status == 1?'Pending':($work_order_lists->status == 2?'In-Proccess':'Complete'))}}</span></td>
                                                <td>
                                                  <!--   <a href="{{URL::to('view-work-order')}}/{{$work_order_lists->id}}" class="font-blue"><i
                                                            class="fa fa-eye"></i></a> -->
                                                    <a href="{{URL::to('edit-work-order')}}/{{$work_order_lists->id}}"> <i class="mdi mdi-pen text-warning"
                                                            title="Edit"></i></a>

                                                <a onclick="return confirm('Are you sure you want to delete this?');" href="{{URL::to('delete-work-order')}}/{{$work_order_lists->id}}"> 
                                                    <i class="mdi mdi-delete text-danger" id="sa-params"
                                                        title="Delete"></i>

                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

