@extends('layouts.superadmin_layout')

   @section('content')

  

            <!-- Start content -->

            <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6">

                                <h4 class="page-title">Performance Appraisal of Employees</h4>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                                    <li class="breadcrumb-item active"><a href="appraisal_form.html">Performance

                                            Appraisal of Employees</a>

                                    </li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end row -->

                    <!-- end row -->

                    <div class="row">

                        <div class="col-12">

                            <div class="row">



              @if(isset($userAppraisal) && !empty($userAppraisal))

              @foreach($userAppraisal as $userAppraisal)



                                <div class="col-sm-3">

                                    <div class="card m-t-20">

                                        <div class="card-body">

                                            @if($userAppraisal->status ==1)



                                             <a href="#">





                                            @else



                                             <a href="{{URL::to('/appraisalfillform/'.$userAppraisal->id)}}">





                                            @endif

                           

                                                <div class="col-sm-12">

                                                    <div class="row">

                                                        <div class="col-sm-12 font-18" title="Employee Name">

                                                            <i class="mdi mdi-face m-r-5 font-green font-20"></i>

                                                            <span>{{ucwords($userAppraisal->userfullname)}}</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Year">

                                                            <a href="appraisal_rating.html">

                                                                <i

                                                                    class="mdi mdi-calendar font-green m-r-5 font-20"></i>

                                                            </a>

                                            <span>{{date('Y',strtotime($userAppraisal->date))}}</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Status">

                                                            <div class="row">

                                                                <div class="col-sm-12 font-18">

                                                                    <a href="appraisal_rating.html">

                                                                        <i

                                                                            class="mdi mdi-account-search font-green m-r-5 font-20"></i>

                                                                    </a>

                                                                    @if($userAppraisal->fill_status ==0)

                                                                    <span>Awaited</span>



                                                                    @else



                                                                         <span>Submitted</span>

                                                                  @endif






                                                                   

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                    </div>

                                </div>



                                @endforeach



                                @else



                   <div class="col-sm-12">No Appraisal Found</div>





                                @endif

                           <!--      <div class="col-sm-3">

                                    <div class="card m-t-20">

                                        <div class="card-body">

                                            <div class="row"

                                                onclick="window.location.href = 'appraisal_form_fill.html'">

                                                <div class="col-sm-12">

                                                    <div class="row">

                                                        <div class="col-sm-12 font-18" title="Employee Name">

                                                            <i class="mdi mdi-face m-r-5 font-green font-20"></i>

                                                            <span>Rishabh </span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Year">

                                                            <a href="appraisal_rating.html">

                                                                <i

                                                                    class="mdi mdi-calendar font-green m-r-5 font-20"></i>

                                                            </a>

                                                            <span>2019</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Status">

                                                            <div class="row">

                                                                <div class="col-sm-12 font-18">

                                                                    <a href="appraisal_rating.html">

                                                                        <i

                                                                            class="mdi mdi-account-search font-green m-r-5 font-20"></i>

                                                                    </a>

                                                                    <span>Approved</span>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-3">

                                    <div class="card m-t-20">

                                        <div class="card-body">

                                            <div class="row"

                                                onclick="window.location.href = 'appraisal_form_fill.html'">

                                                <div class="col-sm-12">

                                                    <div class="row">

                                                        <div class="col-sm-12 font-18" title="Employee Name">

                                                            <i class="mdi mdi-face m-r-5 font-green font-20"></i>

                                                            <span>Diksha</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Year">

                                                            <a href="appraisal_rating.html">

                                                                <i

                                                                    class="mdi mdi-calendar font-green m-r-5 font-20"></i>

                                                            </a>

                                                            <span>2019</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Status">

                                                            <div class="row">

                                                                <div class="col-sm-12 font-18">

                                                                    <a href="appraisal_rating.html">

                                                                        <i

                                                                            class="mdi mdi-account-search font-green m-r-5 font-20"></i>

                                                                    </a>

                                                                    <span>Approved</span>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-3">

                                    <div class="card m-t-20">

                                        <div class="card-body">

                                            <div class="row"

                                                onclick="window.location.href = 'appraisal_form_fill.html'">

                                                <div class="col-sm-12">

                                                    <div class="row">

                                                        <div class="col-sm-12 font-18" title="Employee Name">

                                                            <i class="mdi mdi-face m-r-5 font-green font-20"></i>

                                                            <span>Rajesh Yadav</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Year">

                                                            <a href="appraisal_rating.html">

                                                                <i

                                                                    class="mdi mdi-calendar font-green m-r-5 font-20"></i>

                                                            </a>

                                                            <span>2019</span>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12" title="Status">

                                                            <div class="row">

                                                                <div class="col-sm-12 font-18">

                                                                    <a href="appraisal_rating.html">

                                                                        <i

                                                                            class="mdi mdi-account-search font-green m-r-5 font-20"></i>

                                                                    </a>

                                                                    <span>Approved</span>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div> -->

                            </div>

                            <!-- <table id="datatable" class="table table-bordered dt-responsive nowrap"

                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                        <thead>

                                            <tr>

                                                <th>S.No</th>

                                                <th>Activities/Traits/Parameters</th>

                                                <th>Max Marks</th>

                                                <th>Self- Marking</th>

                                                <th>Marks by Coordinator [1-10]</th>

                                                <th>Marks by HoD [1-10]</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>

                                                <td>1</td>

                                                <td>

                                                    Java Developer

                                                </td>

                                                <td>IT</td>

                                                <td>Experienced</td>

                                                <td>3 yr</td>

                                                <td>

                                                    10/12/2019

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table> -->



                        </div>

                        <!-- end col -->

                    </div>

                    <!-- end row -->

                </div>

                <!-- container-fluid -->

            </div>

         @stop