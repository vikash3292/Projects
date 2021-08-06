@extends('layouts.superadmin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->

      
      <!-- Start content -->
      <div class="content p-0">
         <div class="container-fluid">
            <div class="page-title-box">
               <div class="row align-items-center bredcrum-style">
                  <div class="col-sm-6">
                     <h4 class="page-title">Holiday List</h4>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">GRC</a></li>
                        <li class="breadcrumb-item active"><a href="#">Holiday List</a>
                        </li>
                     </ol>
                  </div>
                  <div class="col-sm-6">
                     <div class="float-right d-none d-md-block">
                        <a href="{{url('/holidayManagement/addHoliday')}}" class="btn btn-primary">
                        Add Holiday</a>
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
                        <div class="col-xs-8">
         @if (session('alert-success'))
             <div class="alert alert-success">
                 {{ session('alert-success') }}
             </div>
         @endif
        
         @if (session('warning'))
         <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ session('warning') }}</strong>
         </div>
         @endif
      </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                           <thead>
                              <tr>
                                 <th>S.N.</th>
                                 <th>Date</th>
                                 <th>Holiday Name</th>
                                 <th>Type </th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($holidayData as $key => $value) 
                              <tr>
                                 <td>{{ ++$key }}</td>
                                 <td>{{$value->holidaydate}}</td>
                                 <td>{{$value->holidayname}} </td>
                                 <td>{{$value->groupname}} </td>
                                 <td>{{ $value->isactive == 1 ? "Active" : "Inactive" }}</td>
                                 <td><a  href="{{URL::to('/holidayManagement/editHoliday/'.$value->id)}}"><i class="fa fa-pencil"></i> <i class="mdi mdi-pen text-warning" data-toggle="modal" data-target="#editemp" title="Edit"></i></a>    <a  href="{{URL::to('/holidayManagement/deleteHoliday/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Holiday?');"><i class="fa fa-trash-o"></i> <i class="mdi mdi-delete text-danger" data-toggle="modal" data-target="#deletemp" title="Delete"></i></a></td>
                              </tr>
                              @endforeach 
                              @if(count($holidayData) == 0)
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