    @extends('layouts.superadmin_layout')
   @section('content')
            
         <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Lead</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Lead</a></li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{URL::to('/createLead')}}">
                                            <button
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                type="button">
                                                Create Lead</button>
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
                          @if(session()->has('msg'))
                        <div class="alert alert-success">
                            {{ session()->get('msg') }}
                        </div>
                           @endif
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Lead</th>
                                                <th>Organization</th>
                                                <th>Email</th>
                                                <th>Lead Owner</th>
                                                <th>Created Date</th>
                                                <th>Project Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach($leadlist as $leadlists)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    {{$leadlists->title}}
                                                </td>
                                                <td> {{$leadlists->company}}</td>
                                                <td>
                                                   {{$leadlists->email}}
                                                </td>
                                                <td> {{$leadlists->userfullname}}
                                                </td>
                                                <td>{{date('d-M-Y', strtotime($leadlists->created_at))}}</td>
                                                <td>{{$leadlists->product_type}}</td>
                                                <td>
                                                    <a href="{{URL::to('viewLead')}}/{{$leadlists->id}}"><i class="mdi mdi-eye font-blue"
                                                            title="View"></i></a>
                                                    <a href="{{URL::to('editLead')}}/{{$leadlists->id}}"> <i class="mdi mdi-pen text-warning"
                                                            title="Edit"></i>
                                                       <a onclick="return confirm('Are you sure you want to delete?');" href="{{URL::to('deletelead')}}/{{$leadlists->id}}"> <i class="mdi mdi-delete text-danger" id="sa-params"
                                                            title="Delete"></i>
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

           @section('extra_js')



           @stop