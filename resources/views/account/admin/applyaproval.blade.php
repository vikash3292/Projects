

@extends('layouts.superadmin_layout')
   @section('content')
            <!-- Start content -->
            <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Leaves to Approve</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Leaves to Approve</a>
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


    
          
         @stop