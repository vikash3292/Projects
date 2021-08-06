 @extends('layouts.superadmin_layout')
   @section('content')
            <!-- Start content -->
            <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6 col-6">
                                <h4 class="page-title">All Employees</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active">All Employees</li>
                                </ol>
                            </div>
                              
                            <div class="col-sm-6 col-6 state_dist">
                                        @if(PermissionHelper::frontendPermission('add-users'))
                                        <a href="{{URL::to('/add-employees')}}">
                                           <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                            type="button">
                                            Add New Employee</button>
                                    </a>

                                       @endif
                                        <button class="btn btn-primary advance_setting">Import User <i class="fa fa-angle-right"></i></button>

                                <form method="post" class="state_dist_wrapper" action="{{URL::to('uploadusercsv')}}" enctype='multipart/form-data'>

                                       

                                        <div class="">

                                            <div class="close_popup">

                                                <img src="../public/assets/images/close_icon.png" alt="" title="">

                                            </div>

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">

                                                      <input type="file" required="" name="upload_users"  class="form-control" style="padding:3px;"  />

                                                       {{ csrf_field() }}

                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12">

                                                    <div class="form-group">

                                                      <input type="submit" name="upload" value="Upload" class="btn btn-primary float-right">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </form>
                              @if(PermissionHelper::frontendPermission('import-user-csv'))
                                    
                                     @endif
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->

                       

                    <div class="row">
                            <div class="col-12">
                                 @if(Session::has('message'))
                     <div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{ Session::get('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                              @endif

                             
                                <div class="card m-t-20">
                                    <div class="card-body">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="datatable" class="table appraisal_form_fill">
                                       <thead>
                                       <tr>          <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Employee ID</th>
                                                    <th>Contact No.</th>
                                                    <th>Email ID</th>
                                                    <th>Department</th>
                                                    <th>Date of Joining</th>
                                                    <th>Action</th>
                                                </tr>
                                       </thead>
                                       <tbody>
                                       <tr >  
                                              @php($i = 1)
                                                    @foreach($listData as $result)
                                                     <td>{{$i++}}
                                                        
                                                    </td>
                                                    <td>{{$result->userfullname}}
                                                        
                                                    </td>
                                                    <td>{{$result->employeeId}}</td>
                                                    <td>{{$result->workphone}}</td>
                                                    <td>
                                                        {{$result->emailaddress}}
                                                    </td>
                                                    <td>{{$result->deptname}}</td>
                                                   

                                                    <td>{{date('d-m-Y',strtotime($result->usercreateddate))}}</td>
                                                    <td>

                                                          @if(PermissionHelper::frontendPermission('view-users'))
                                                        <a href="{{url('/edit/myprofile')}}/{{$result->id}}"><i class="mdi mdi-eye" data-toggle="tooltip" title="View"></i></a>
                                                          @endif


                                                          @if(PermissionHelper::frontendPermission('edit-users'))
                                                           <a href="{{URL::to('emp/edit')}}/{{$result->id}}">
                                                        <i class="mdi mdi-pen text-warning" data-toggle="modal" data-target="#editemp" title="Edit"></i></a>
                                                          @endif

                                                          @if(PermissionHelper::frontendPermission('delete-users'))
                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="{{URL::to('delete/')}}/{{$result->id}}">
                                                        <i class="mdi mdi-delete text-danger" data-toggle="modal" data-target="#deletemp" title="Delete"></i></a>

                                                        @endif

                                                         @if(PermissionHelper::frontendPermission('status-users'))

                                                        <div class="togglebutton custom-control custom-switch inline-block" @if($result->isactive ==1) title="Active" @else title="InActive" @endif >
                                                        <input type="checkbox" onclick="changestatus('{{$result->isactive}}','{{$result->id}}','main_users')" @if($result->isactive ==1) checked @else notchecked @endif class="custom-control-input"
                                                            id="customSwitches{{$result->id}}">
                                                        <label class="custom-control-label" for="customSwitches{{$result->id}}">
                                                        </label>
                                                        @endif
                                                    </td>
                                                </tr>
                                               @endforeach 

                                               @if(count($listData) == 0)

                                               <td colspan="8">No Record Found</td>

                                               @endif
                                       </tbody>
                                    </table>
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
            <!-- content -->
        @stop