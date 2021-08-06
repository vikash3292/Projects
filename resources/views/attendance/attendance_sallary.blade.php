@extends('layouts.superadmin_layout')
@section('extra_css')
   

@stop
@section('content')
         
      <!-- Start content -->
                 <div class="content p-0">
             <div class="container-fluid">
                 <div class="page-title-box">
                     <div class="row align-items-center bredcrum-style">
                         <div class="col-sm-6">
                             <h4 class="page-title">Employee Attendance</h4>
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                 <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Employee Attendance</a></li>
                             </ol>
                         </div>


                         <div class="col-sm-6 state_dist">
                                
                                <form method="GET" >
                               <input type="hidden" name="export" value="export">
                                <input type="hidden" name="month" value="{{$month??0}}">
                                <input type="hidden" name="year" value="{{$year??0}}">
                                  <button  type="submit" class="btn btn-primary float-right advance_setting">export <i class="fa fa-angle-right"></i></button>
                                       
                                    </form>
                                  </div>
                     </div>
                 </div>
                 <!-- end row -->
                 <!-- end row -->
                 <div class="row">
                     <div class="col-12">
                         <div class="card m-t-20">
                             <div class="card-body correctionform">
                                <div class="row">
                                   <div class="col-sm-12">
                                      <div class="row">
                                         <div class="col-sm-3">
                                            <label>Total Working Days:</label>
                                            <span>{{$workingday??0}}</span>
                                         </div>
                                         <div class="col-sm-3">
                                          <label>Week Offs:</label>
                                          <span>{{$weekendof??0}}</span>
                                         </div>
                                         <div class="col-sm-3">
                                          <label>Holidays:</label>
                                          <span>{{$holidayall??0}}</span>
                                         </div>
                                         <div class="col-sm-3">
                                          <label>Total Days:</label>
                                          <span>{{$totalday??0}}</span>
                                         </div>
                                      </div>
				      <div class="col-sm-12 p-0">
					<hr class="m-t-5 m-b-5">
				      </div>
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-sm-12 m-t-10">
                                      <table id="datatable" class="datatable table appraisal_form_fill">
                                         <thead>
                                            <tr>
                                               <th>S.No</th>
                                               <th>Employee Name</th>
                                               <th>Present</th>
                                               <th>Leaves</th>
                                               <th>Absent/FTS</th>
                                               <th>Data NA</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                          @php($i = 1)
                                          @foreach($userlist as $userlists)
                                            <tr>
					                                     <td>{{$i++}}</td>
                                               <td>{{$userlists->userfullname??''}}</td>
                                               <td>{{$userlists->present??0}}</td>
                                               <td>{{$userlists->leaveCount??0}}</td>
                                               <td>{{$userlists->absent??0}}</td>
                                               <td>{{$userlists->datanot}}</td>
                                            </tr>

                                            @endforeach
                                         </tbody>
                                      </table>
                                   </div>
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
        @stop
        