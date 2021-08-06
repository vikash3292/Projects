@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Scope of Work</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active">Scope of Work
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{URL::to('/add_scope')}}">
                                            <button
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                type="button">
                                                Add Scope of Work</button>
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
                                                <th>Name of SOW</th>
                                                <th>Organization</th>
                                                <th>Work Order</th>
                                                <th>Contact</th>
                                                <th>Created By</th>
                                                <th>Modified By</th>
                                                <th>Modified DateTime</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@php($i = 1)
                                        	@foreach($scope_list as $scope_lists)
                                            <tr >
                                                <td>{{$i++}}</td>
                                                <td>{{$scope_lists->scope_name}}
                                                </td>
                                                <td>{{$scope_lists->org_name}}</td>
                                                <td>{{$scope_lists->work_order_name}}</td>
                                                <td>{{$scope_lists->contact_no}}</td>
                                                <td>{{$scope_lists->created_name}}</td>
                                                <td>{{$scope_lists->modifile_name}}</td>
                                                <td>{{$scope_lists->modifiled_at}}</td>
                                                <td>

                                                    <a href="{{URL::to('download_scope')}}/{{$scope_lists->id}}" class="font-blue">

                                                    <i class="mdi mdi-download" title="View" id="sa-params"
                                                        title="Pdf Download"></i> </a>
                                                    <a href="{{URL::to('view_scope')}}/{{$scope_lists->id}}" class="font-blue"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{URL::to('edit_scope')}}/{{$scope_lists->id}}"> <i class="mdi mdi-pen text-warning"
                                                            title="Edit"></i></a>
                                                   <a onclick="return confirm('Are you sure you want to delete this?');" href="{{URL::to('delete_scope')}}/{{$scope_lists->id}}">

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