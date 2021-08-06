 

@extends('layouts.superadmin_layout')
   @section('content')

 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Department List</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Department List</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <a href="add_dept.html" class="btn btn-primary">
                                        Add Department</a>
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
                                                <th>Department ID</th>
                                                <th>Department Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>01</td>
                                                <td>IT</td>
                                                <td>Recovery</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>02</td>
                                                <td>Project Execution</td>
                                                <td>Project Execution</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>03</td>
                                                <td>Administration</td>
                                                <td>Administration</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>04</td>
                                                <td>IT</td>
                                                <td>IT</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>05</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td>06</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7
                                                </td>
                                                <td>07</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8
                                                </td>
                                                <td>08</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9
                                                </td>
                                                <td>09</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10
                                                </td>
                                                <td>10</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    11
                                                </td>
                                                <td>11</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    12
                                                </td>
                                                <td>12</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    13
                                                </td>
                                                <td>13</td>
                                                <td>Accounts</td>
                                                <td>Account</td>
                                                <td>
                                                    <i class="mdi mdi-pen text-warning"></i>
                                                    <i class="mdi mdi-check font-green"></i>
                                                    <div class="custom-control custom-switch inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
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