    @extends('layouts.superadmin_layout')
   @section('content')
   
   
   <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Opportunity</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Opportunity</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{URL::to('add-opportunity')}}">
                                            <button
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                type="button">
                                                Add Opportunity</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">

                        <div class="col-12">

                        
                    @if(session()->has('msg'))
    <div class="alert alert-success">
        {{ session()->get('msg') }}
    </div>
@endif
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Opportunity Owner</th>
                                                <th>Amount</th>
                                                <th>Expected Revenue</th>
                                                <th>Opportunity
                                                    Name</th>
                                                <th>Close Date</th>
                                                <th>Product Interest</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php($i = 1)
                                        @foreach($opp_list as $opp_lists)
                              
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                {{$opp_lists->userfullname}}
                                                </td>
                                                <td> {{$opp_lists->amount}}</td>
                                                <td> {{$opp_lists->exp_revance}}</td>
                                                <td> {{$opp_lists->opp_name}}</td>
                                                <td>{{$opp_lists->close_date}}</td>
                                                <td>{{$opp_lists->project_intrest}}</td>
                                                <td title="View"><a href="{{URL::to('view-opportunity')}}/{{$opp_lists->id}}" class="font-blue"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{URL::to('edit-opportunity')}}/{{$opp_lists->id}}"> <i class="mdi mdi-pen text-warning"
                                                            title="Edit"></i></a>
                                                            <a onclick="return confirm('Are you sure you want to delete ?');" href="{{URL::to('delete-opportunity')}}/ {{$opp_lists->id}}">   <i class="mdi mdi-delete text-danger" id="sa-params"
                                                        title="Delete"></i>

                                                        </a>
                                                </td>
                                            </tr>

                                            @endforeach
                                           
                                            <!--<tr>-->
                                            <!--    <td>4</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td>5</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td>6</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td>7</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td>8</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td>9</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td>10</td>-->
                                            <!--    <td>Rishabh Dargan-->
                                            <!--    </td>-->
                                            <!--    <td>14500000</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>dummy</td>-->
                                            <!--    <td>12-12-2019</td>-->
                                            <!--    <td>80%</td>-->
                                            <!--    <td title="View"><a href="opportunity_view.html" class="font-blue"><i-->
                                            <!--                class="fa fa-eye"></i></a>-->
                                            <!--        <a href="edit_opportunity.html"> <i class="mdi mdi-pen text-warning"-->
                                            <!--                title="Edit"></i></a>-->
                                            <!--        <i class="mdi mdi-delete text-danger" id="sa-params"-->
                                            <!--            title="Delete"></i>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
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