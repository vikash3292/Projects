

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
                                    <li class="breadcrumb-item"><a href="index.html">Leave</a></li>
                                    <li class="breadcrumb-item active"><a href="leaveapprove.html">Leaves Report</a>
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
                                                        <option value="01">January</option>
                                                        <option value="02">February</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
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
                                                <th>Employee Name</th>
                                                <th>Employee Code</th>
                                                <th>Date of Leave</th>
                                                <th>Type of Leave</th>
                                                <th>Comments</th>
                                                <th>Approver Status</th>
                                                <th>Leave Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                             @php($i = 1)
                                            @foreach($leavelist as $leavelists)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{ucwords($leavelists->userfullname)}}</td>
                                                <td>  {{$leavelists->employeeId}}</td>
                                                <td> {{date('d-M-Y',strtotime($leavelists->leaveDate))}}</td>
                                                <td>{{$leavelists->leave_mode}}</td>
                                                <td>{{$leavelists->comment}}</td>
                                                <td>

                                                @php($useridshowid = array_filter(explode(',',$leavelists->show_user_id)))
                                                 

                                                    @if($leavelists->manager ==1)
                                                        <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>

                                                    @elseif($leavelists->manager ==0)

                                                       <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="pending"></i>
                                                      @else

                                                       <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                      
                                                      @endif  
                                                       @if($leavelists->hr ==1)
                                                        <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>

                                                      @elseif($leavelists->hr ==0)

                                                       <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="pending"></i>
                                                      @else

                                                       <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                      
                                                      @endif  
                                                       @if($leavelists->admin ==1)
                                                        <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                        @elseif($leavelists->admin ==0)

                                                       <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="pending"></i>

                                                      @else

                                                       <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                      
                                                      @endif  
                                                       @if($leavelists->director ==1 && count($useridshowid) > 5)
                                                        <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>

                                                           @elseif($leavelists->director ==0 && count($useridshowid) > 5)

                                                       <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="pending"></i>
                                                      @elseif(count($useridshowid) > 5)

                                                       <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                      
                                                      @endif  
                                                   <!--  <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i> -->
                                                </td>
                                                @if(count($useridshowid) > 5)
                                               

                                               @if($leavelists->manager ==1 && $leavelists->hr ==1 && $leavelists->admin ==1 && $leavelists->director == 1)

                                            
                                               <td class="approve-bg">
                                                   Approved
                                               </td>
                                               @elseif($leavelists->manager == 2 || $leavelists->hr ==2 || $leavelists->admin ==2 || $leavelists->director ==2)

                                               <td class="reject-bg">
                                                   Rejected 
                                               </td>

                                               @else

                                          
                                                <td class="pending-bg">
                                                   Pending
                                               </td>

                                               @endif

                                               @else

                                               @if($leavelists->manager ==1 && $leavelists->hr ==1 && $leavelists->admin ==1 )

                                            
                                               <td class="approve-bg">
                                                   Approved
                                               </td>
                                               @elseif($leavelists->manager == 2 || $leavelists->hr ==2 || $leavelists->admin ==2 )

                                               <td class="reject-bg">
                                                   Rejected 
                                               </td>

                                               @else

                                          
                                                <td class="pending-bg">
                                                   Pending
                                               </td>

                                               @endif

                                               @endif

                                            </tr>
                                            @endforeach

                                            @if(count($leavelist) == 0)
                                            <tr><td colspan="9">No Recoud Found</td></tr>

                                            @endif
                                            <!-- <tr>
                                                <td>2</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                </td>
                                                <td class="pending-bg"> Pending</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                </td>
                                                <td class="approve-bg">Approved</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>Nisha Upreti</td>
                                                <td>KSPL070</td>
                                                <td>1-sep-2019</td>
                                                <td>CL</td>
                                                <td>Health Issue</td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle approved"
                                                        title="Approved"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle pending"
                                                        title="Pending"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                    <i class="mdi mdi-checkbox-blank-circle rejected"
                                                        title="Rejected"></i>
                                                </td>
                                                <td class="reject-bg"> Rejected</td>
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

    
          
         @stop