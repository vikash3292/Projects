@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
	<div class="container-fluid">
		<div class="page-title-box">
			<div class="row align-items-center bredcrum-style">
				<div class="col-sm-6">
					<h4 class="page-title">Audit List</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">GRC</a></li>
						<li class="breadcrumb-item active"><a href="{{URL::to('/audit')}}">Audit List</a>
						</li>
					</ol>
				</div>
				<div class="col-sm-6">
					<div class="float-right d-none d-md-block">
						<div class="dropdown">
							<a href="{{URL::to('/add-audit')}}">
								<button
								class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
								type="button">
							Add New Audit</button>
						    </a>
					    </div>
				    </div>
			    </div>
		    </div>
	    </div>
	    <div class="row">
			<div class="col-12">
				<div class="card m-t-20">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<table id="datatable" class="table table-bordered dt-responsive nowrap"
					style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Audit Checklist</th>
											<th>Main Person Responsible</th>
											<th>Audit Status</th>
											<th>QMS Observations</th>
											<th>Compilance Status by HOD/Coordinator</th>
											<th>Management Remarks</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                       @php($i =1)
										@foreach($audit as $audits)
				                       <tr>
											<td>{{$i++}}</td>
											<td>{{$audits->check_list == 1?'Pending' : 'Complete'}}</td>
											<td>{{$audits->userfullname}}</td>
											<td>{{$audits->aduit_status == 1?'Pending':'Complete'}}</td>
											<td>{{$audits->qms}}</td>
											<td>{{$audits->mng_remark}}</td>

									    <td>{{$audits->compaine_status == 1?'Pending':'Complete'}}</td>
											
											<td>
												<i class="mdi mdi-eye" data-toggle="tooltip" title="View" data-toggle="modal" data-target="#viewaudit"></i>
                                               
                                               <a href="{{URL::to('edit-audit')}}/{{$audits->id}}">

                                                <i class="mdi mdi-pen text-warning" data-toggle="modal" data-target="#editaudit" title="Edit"></i></a>

                                                <a href="{{URL::to('delete-audit')}}/{{$audits->id}}">
                                                <i class="mdi mdi-delete text-danger" data-toggle="modal" data-target="#deletemp" title="Delete"></i>

                                            </a>
                                            </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
@stop