@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
	<div class="container-fluid">
		<div class="page-title-box">
			<div class="row align-items-center bredcrum-style">
				<div class="col-sm-6">
					<h4 class="page-title">View Audit</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">GRC</a></li>
						<li class="breadcrumb-item active"><a href="#">View Audit</a>
						</li>
					</ol>
				</div>
				<div class="col-sm-6">
					<div class="float-right d-none d-md-block">
						<div class="dropdown">
							<a href="javascript: history.go(-1)">
								<button
								class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
								type="button">
							Back</button>
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
				<div class="card m-t-20">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								 <ul class="nav nav-tabs nav-tabs-custom" role="tablist" id="myTab">
	                                 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"
	                                    role="tab"><span class="d-block d-sm-none"><i class="fas fa-info"></i></span>
	                                    <span class="d-none d-sm-block">Details</span></a></li>
	                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#checklist"
	                                       role="tab"><span class="d-block d-sm-none"><i class="far fa-list"></i></span>
	                                       <span class="d-none d-sm-block">CheckList</span></a></li>
	                                  </ul>
	                                  <div class="tab-content">
	                                      <div class="tab-pane p-3 active profilepage" id="details" role="tabpanel">
	                                      		<div class="row m-t-20">
	                                      			<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Name
														  </label>
				                                          <div class="col-lg-8">
				                                             <label class="myprofile_label">Nisha Upreti</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Audit Status
														  </label>
				                                          <div class="col-lg-8">
				                                             <label class="myprofile_label">Complete</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Audit CheckList
														  </label>
				                                          <div class="col-lg-8">
				                                             <label class="myprofile_label">Complete</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Management Remarks
														  </label>
				                                          <div class="col-lg-8">
				                                            <label class="myprofile_label">dummy</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Main Person Responsible
														  </label>
				                                          <div class="col-lg-8">
				                                             <label class="myprofile_label">dummy</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Compilance Status by HOD/Coordinator
														  </label>
				                                          <div class="col-lg-8">
				                                             <label class="myprofile_label">dummy</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    					<div class="col-md-12">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-2 col-form-label">QMS Observations
														  </label>
				                                          <div class="col-lg-10">
				                                              <label class="myprofile_label">dummy</label>
				                                          </div>
				                                       </div>
                                    				</div>
                                    			</div>
	                                      </div>
	                                       <div class="tab-pane p-3" id="checklist" role="tabpanel">
	                                      		<div class="row m-t-20">
	                                      			<div class="col-sm-12">
	                                      				<table id="datatable" class="table table-bordered dt-responsive nowrap"
					style="border-collapse: collapse; border-spacing: 0; width: 100%;">
															<thead>
																<tr>
																	<th>S.No</th>
																	<th>Checklist</th>
																	<th>Main Person Responsible</th>
																	<th>QMS Observations</th>
																	<th>Compilance Status</th>
																</tr>
															</thead>
															<tbody>
										                       <tr>
																	<td>1</td>
																	<td>Has the Person did this XYZ Task?</td>
																	<td>Umang
																	</td>
																	<td>dummy
																	</td>
																	<td>Umang
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
			</div>
		</div>
	</div>
</div>
@stop
@section('extra_js')
<script type="text/javascript">
	$(document).ready(function(){
		$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                            localStorage.setItem('activeTab', $(e.target).attr('href'));
                        });
                        var activeTab = localStorage.getItem('activeTab');
                        if (activeTab) {
                            $('#myTab a[href="' + activeTab + '"]').tab('show');
                        }
                    })
 </script>
@stop