    @extends('layouts.superadmin_layout')

   @section('content')

 

            <!-- Start content -->

            <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6 col-6">

                                <h4 class="page-title">Site Menus</h4>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                                    <li class="breadcrumb-item active"><a href="menu_list.html">Site Menus</a></li>

                                </ol>

                            </div>

                            <div class="col-sm-6 col-6">

                                <div class="float-right d-md-block">

                                    <div class="dropdown">

                                        <a href="{{URL::to('/menuManagement')}}">

                                            <button

                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"

                                                type="button">

                                                Add Menu</button>

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

                            @if(session()->has('message'))

                        <div class="alert alert-success">

                            {{ session()->get('message') }}

                        </div>

                           @endif

                            <div class="card m-t-20">

                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"

                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                        <thead>

                                            <tr>

                                                <th>S.No</th>

                                                <th>Menu Title</th>

                                                <th>URL</th>

                                               

                                                

                                              

                                               

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                         @php($i = 1)

                                          @foreach($menulist as $menulists)

                                            <tr>

                                                <td>{{$i++}}</td>

                                                <td>

                                                   {{$menulists->menu_title}}

                                                </td>

                                                <td>{{$menulists->url}}</td>

                                               

                                                

                                                <td>

                                                    <a href="{{URL::to('/editmunu/')}}/{{$menulists->id}}">

                                                        <i class="mdi mdi-pen text-warning" data-toggle="modal" data-target="#editemp" title="Edit"></i></a>





                                                        <a href="{{URL::to('/deletemunu/')}}/{{$menulists->id}}" onclick="return confirm('Are you sure you want to delete ?');">



                                                        <i class="mdi mdi-delete text-danger" data-toggle="modal" data-target="#deletemp" title="Delete"></i></a>





                                                    <div class="togglebutton custom-control custom-switch inline-block">

                                                        <input type="checkbox" onclick="changestatus('{{$menulists->is_active}}','{{$menulists->id}}','site_menu')" @if($menulists->is_active ==1) checked @else notchecked @endif class="custom-control-input"

                                                            id="customSwitches{{$menulists->id}}">

                                                        <label class="custom-control-label" for="customSwitches{{$menulists->id}}">

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

         <!-- content -->

           @stop