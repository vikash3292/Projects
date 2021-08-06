

@extends('layouts.superadmin_layout')
   @section('content')
            <!-- Start content -->
                   <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Leaves Report</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Leaves Report</a>
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
                                  <form method="get" action="{{URL::to('/exportcsv')}}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Select
                                                    Month <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="month" required="">
                                                        <option value="">Select</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Employee <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="id" required="">
                                                        <option value="">Select</option>
                                                        @foreach($leavename as $leavenames)
                                                        <option value="{{$leavenames->userid}}">{{$leavenames->userfullname}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @if(PermissionHelper::frontendPermission('report-export-filter'))
                                        <div class="col-sm-2">
                                          <input type="submit" class="btn btn-primary " value="Generate Report">
                                          
                                        </div>
                                        @endif
                                    </div>
                                  </form>

                                    <hr>
                                    @if(PermissionHelper::frontendPermission('report-export-all'))
                                    <div class="row float-right">
                                    <a href="{{URL('/exportcsv')}}" class="btn btn-primary m-r-15">Export</a>
                                    </div>
                                    @endif
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                             <tr>
                                                <th>S.No</th>
                                                <th>
                                                    Employee
                                                </th>
                                                <th>Leave Type</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>No. of Days</th>
                                                
                                                <th>Leave Status</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>

                                                                  @php($i = 1)
                                            @foreach($leavelist as $leavelists)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                       {{ucwords($leavelists->userfullname)}}
                                                    </div>
                                                </td>
                                                
                                                   <?php
                    
                    if($leavelists->leavetypeid ==1){
                        $title = 'CL';
                       
                    }else if($leavelists->leavetypeid ==2){
                         $title = 'RH';
                        
                    }else if($leavelists->leavetypeid ==5){
                          $title = 'MyLeave';
                         
                    }else if($leavelists->leavetypeid ==4){
                        
                         $title = 'Maternity Leave';
                      
                        
                    }
                    
                    ?>
                                                <td>  {{$title}}</td>
                                                <td>  {{$leavelists->from_date}}</td>
                                                <td>  {{$leavelists->to_date}}</td>
                                                <td>{{$leavelists->appliedleavescount}}</td>
                                    
                                              
                                                <td class="bg-success text-white">
                                                    {{$leavelists->leavestatus}}
                                                </td>
                                            

                                               

                                    
 </div>

                                            @endforeach

                                            @if(count($leavelist) == 0)
                                            <tr><td colspan="9">No Recoud Found</td></tr>

                                            @endif
                                            
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