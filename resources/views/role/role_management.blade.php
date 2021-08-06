@extends('layouts.superadmin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->

      <div class="col-xs-8">
         @if(Session::has('alert-success'))
         <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alert-success') }}</p>
         @endif
         @if ($message = Session::get('warning'))
         <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
         </div>
         @endif
      </div>
      <!-- Start content -->
      <div class="content p-0">
         <div class="container-fluid">
            <div class="page-title-box">
               <div class="row align-items-center bredcrum-style">
                  <div class="col-sm-6">
                     <h4 class="page-title">Role List</h4>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">GRC</a></li>
                        <li class="breadcrumb-item active"><a href="#">Role List</a>
                        </li>
                     </ol>
                  </div>
                  <div class="col-sm-6">
                     <div class="float-right d-none d-md-block">
                        <a href="{{url('/roleManagement/addRole')}}" class="btn btn-primary">
                        Add Role</a>
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
                                 <th>S.N.</th>
                                 <th>Role Name</th>
                                 <th>Role Type</th>
                                
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($departmentData as $key => $value) 
                              <tr>
                                 <td>{{ ++$key }}</td>
                                 <td>{{$value->rolename}}</td>
                                 <td>{{$value->roletype}} </td>
                                 
                                 <td>{{ $value->isactive == 1 ? "Active" : "Inactive" }}</td>
                                 <td>

                                 @if(PermissionHelper::frontendPermission('edit-role'))
                                 
                                 <a  href="{{URL::to('/roleManagement/editRole/'.$value->id)}}"><i class="fa fa-pencil"></i> <i class="mdi mdi-pen text-warning" data-toggle="modal" data-target="#editemp" title="Edit"></i></a>  

                                @endif

                                 @if(PermissionHelper::frontendPermission('delete-role'))
                                   <a  href="{{URL::to('/roleManagement/deleteRole/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Role?');"><i class="fa fa-trash-o"></i> <i class="mdi mdi-delete text-danger" data-toggle="modal" data-target="#deletemp" title="Delete"></i></a>
                                 @endif

                                 @if(PermissionHelper::frontendPermission('view-permission'))
                                 <a  href="{{URL::to('/allpermissionmodual/'.$value->id)}}"><i class="fa fa-pencil"></i> <i class="fa fa-tasks" aria-hidden="true"></i></a>
                                 @endif
                                
                                 </td>
                              </tr>
                              @endforeach 
                              @if(count($departmentData) == 0)
                              <tr>
                                 <td colspan = '4' align = 'center'> <b> No Data Found</b>
                                 </td>
                              </tr>
                              @endif
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
   </div>
</div>
<!-- /.content-wrapper -->
@stop