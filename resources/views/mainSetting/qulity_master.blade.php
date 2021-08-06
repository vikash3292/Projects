
@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">

	<div class="container-fluid">

		<div class="page-title-box">

			<div class="row align-items-center bredcrum-style">

				<div class="col-sm-6 col-6">

					<h3 class="page-title">Audit Master</h3>

					<ol class="breadcrumb">

						<li class="breadcrumb-item"><a href="index.html">GRC</a></li>

						<li class="breadcrumb-item active"><a href="bill_master.html">Audit Master</a>

						</li>

					</ol>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-12">

				<div class="card m-t-20">

					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<button class="btn btn-primary float-right" data-toggle="modal" data-target="#newaudit">Add Audit</button>
								<table id="datatable" class="table table-bordered dt-responsive nowrap"
								style="border-collapse: collapse; border-spacing: 0; width: 100%;">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Audit Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td>
											<i title="View" class="mdi mdi-eye text-info" data-toggle="modal" data-target="#viewaudit"></i>
											<i title="Edit" class="mdi mdi-pencil text-warning" data-toggle="modal" data-target="#newaudit"></i>
											<i title="Delete" class="mdi mdi-delete text-danger"></i>
										</td>
									</tr>
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
       <!-- 
       	add new Bill -->
       	<div id="newaudit" class="modal fade" role="dialog">

       		<div class="modal-dialog modal-lg">
       			<!-- Modal content-->
       			<div class="modal-content">
       				<div class="modal-header">
       					<h5 class="modal-title mt-0">Add Audit</h5>
       					<button type="button" class="close" data-dismiss="modal">&times;</button>
       				</div>
       				<div class="modal-body">
       					<div class="row">
       						<div class="col-md-12">
       							<div class="form-group row m-0">
       								<label for="empid" class="col-lg-4 col-form-label">Audit Name<span class="text-danger">*</span></label>
       								<div class="col-lg-8 col-form-label">
       									<input type="text" class="form-control" id="billname"> 
       									<div id=""></div>
       								</div>
       							</div>
       						</div>
       						<div class="col-sm-12">
       									<div class="form-group row m-0">
       										<label for="empid" class="col-lg-4 col-form-label p-r-0">Description<span class="text-danger">*</span></label>
       										<div class="col-lg-8 col-form-label">
       											<textarea class="form-control" rows="3"></textarea> 
       											<div id=""></div>
       										</div>
       									</div>
       						</div>
       					</div>

       				</div>
       				<div class="modal-footer">
       					<div class="row">
       						<div class="col-sm-12 m-t-10 text-center">
       							<button class="btn btn-primary">Add</button>
       							<button class="btn btn-default" data-dismiss="modal">Cancel</button>
       						</div>
       					</div>
       				</div>
       			</div>

       		</div>
       	</div>
       	  <!-- View Bill -->
       	<div id="viewaudit" class="modal fade" role="dialog">

       		<div class="modal-dialog modal-lg">
       			<!-- Modal content-->
       			<div class="modal-content">
       				<div class="modal-header">
       					<h5 class="modal-title mt-0">View Audit</h5>
       					<button type="button" class="close" data-dismiss="modal">&times;</button>
       				</div>
       				<div class="modal-body">
       					<div class="row">
       						<div class="col-md-12">
       							<div class="form-group row m-0">
       								<label for="empid" class="col-lg-4 col-form-label">Audit Name<span class="text-danger">*</span></label>
       								<div class="col-lg-8 col-form-label">
       									<label class="myprofile_label">Electricity</label>
       								</div>
       							</div>
       						</div>
       						<div class="col-sm-12">
       									<div class="form-group row m-0">
       										<label for="empid" class="col-lg-4 col-form-label p-r-0">Description<span class="text-danger">*</span></label>
       										<div class="col-lg-8 col-form-label">
       											<label class="myprofile_label">dummy</label>
       										</div>
       									</div>
       						</div>
       					</div>

       				</div>
       				<div class="modal-footer">
       					<div class="row">
       						<div class="col-sm-12 m-t-10 text-center">
       							<button class="btn btn-default" data-dismiss="modal">Close</button>
       						</div>
       					</div>
       				</div>
       			</div>

       		</div>
       	</div>
       	@stop