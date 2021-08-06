    @extends('layouts.superadmin_layout')
   @section('content')
                   
            <!-- Start content -->
            <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Recruitment Tracker</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Leave</a></li>
                                    <li class="breadcrumb-item active"><a href="leaveapprove.html">Recruitment
                                            Tracker</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                     @if(PermissionHelper::frontendPermission('add-recruitment'))
                                    <a href="{{URL::to('/addnewrequest')}}" class="btn btn-primary float-right">New Request</a>
                                    @endif
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>
                                                    Job Title
                                                </th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Reporting By</th>
                                                <th>Skill</th>
                                                <!-- <th>Deadline by Requisitioner (If any)</th> -->
                                                <!-- <th>Deadline By HR</th> -->
                                                <th>Action</th>
                                                <!-- <th>HR Recruiter Assigned</th>
                                                <th>Required Experience</th>
                                                <th>Actual Date of Closure</th>
                                                <th>Remarks by Recruiter</th>
                                                <th>Remarks by Director</th>
                                                <th>Remark By MS[Management
                                                    Secretariat]</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php($i= 1)
                                          @foreach($reqruiment as $reqruiments)
                                            <tr>
                                                <td>{{$i++}}</td>

                                                <td>
                                                   {{$reqruiments->job_title}}
                                                </td>
                                                <td> {{$reqruiments->deptname}}</td>
                                                <td>{{$reqruiments->rolename}}</td>
                                                <td>{{$reqruiments->reporting_user}}</td>
                                                <td>{{$reqruiments->skill}}</td>
                                                <td>
                                                @if(PermissionHelper::frontendPermission('view-recruitment'))
                                                <a href="{{URL::to('downoload-requisition')}}/{{$reqruiments->id}}">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{URL::to('view-requisition')}}/{{$reqruiments->id}}">
                                                <i class="fa fa-eye font-blue m-r-5" title="View"
                                                        data-toggle="modal" data-target="#recruitmentview{{$reqruiments->id}}"></i>
                                                </a>
                                                        <a href="{{URL::to('edit-requisition')}}/{{$reqruiments->id}}">
                                                        <i class="mdi mdi-pen text-warning" title="View"
                                                        data-toggle="modal" data-target="#recruitmentview{{$reqruiments->id}}"></i>
                                                        </a>
                                                        <a href="{{URL::to('delete-requisition')}}/{{$reqruiments->id}}">
                                                    <i class="mdi mdi-delete text-danger" title="View"
                                                        data-toggle="modal" data-target="#recruitmentview{{$reqruiments->id}}"></i>
                                                        </a>

                                                        @endif
                                                </td>
                                            </tr>



                                            @endforeach
                                          <!--   <tr>
                                                <td>2</td>

                                                <td>
                                                    Sales Force Developer
                                                </td>
                                                <td>IT</td>
                                                <td>13/12/2019</td>
                                                <td>Fresher</td>
                                                <td>Avni</td>
                                                <td>
                                                    <i class="fa fa-eye font-blue m-r-5" title="View"
                                                        data-toggle="modal" data-target="#recruitmentview"></i>
                                                </td>
                                            </tr> -->
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