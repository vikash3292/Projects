 
@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Letter Master</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="letter_master.html">Letter Master</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a class="btn btn-primary" href="{{URL::to('add-latter')}}">
                                            Add New Letter</a>
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
                                                <th>Letter Name</th>
                                                <th>Issued Till Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @php($i =1)
                                            @foreach($latter_list as $latter_lists)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    {{$latter_lists->latter_name}}
                                                </td>
                                                <td>{{$latter_lists->updated_at}}</td>
                                                <td>
                                                    <a href="{{URL::to('edit-latter')}}/{{$latter_lists->id}}">
                                                    <i class="mdi mdi-pen text-warning" data-toggle="modal"
                                                        data-target="#editemp" title="Edit"></i></a>
                                                    <div class="togglebutton custom-control custom-switch inline-block label_pseudoelement"
                                                        title="Active">
                                                        <input type="checkbox"
                                                            onclick="changestatus('{{$latter_lists->is_active}}','{{$latter_lists->id}}',' latter_management')" 

                                                            @if($latter_lists->is_active == 1) 

                                                            checked=""

                                                            @endif
                                                            class="custom-control-input" id="customSwitches33">
                                                        <label class=" custom-control-label" for="customSwitches33">
                                                        </label>
                                                    </div>
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