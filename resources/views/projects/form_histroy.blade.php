@extends('layouts.superadmin_layout')
@section('content')


<div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Activity History</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                           <li class="breadcrumb-item active"><a href="client_mngt.html.html">Activity History</a>
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body projectviewtab p-0">
                            <div class="col-sm-12">
                                <h5 class="m-t-20">TimeLine</h5>
                            </div>
                           <div id="cd-timeline">
                               <ul class="timeline list-unstyled">


                                @foreach($get_form as $k => $get_forms)
                                <?php
                                 if($k%2 ==1){

                                  $class = 'timeline-list right clearfix';

                                 }else{

                                  $class = 'timeline-list';

                                 }

                                ?>
                                  <li class="{{$class}}">
                                     <div class="cd-timeline-content bg-light p-10">
                                        <h5 class="mt-0 mb-2">{{$get_forms->userfullname}}</h5>
                                        <p class="mb-2">Submitted</p>
                                        <p class="mb-0"></p>
                                        <div class="date bg-primary">
                                           <h5 class="mt-0 mb-0">{{date('d',strtotime($get_forms->created_at))}}</h5>
                                           <p class="mb-0 text-white-50">{{date('M',strtotime($get_forms->created_at))}}</p>
                                        </div>
                                     </div>
                                  </li>
                                  @endforeach
                          
                               </ul>
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