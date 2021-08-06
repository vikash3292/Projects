@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
	<div class="container-fluid">
		<div class="page-title-box">
			<div class="row align-items-center bredcrum-style">
				<div class="col-sm-6">
					<h4 class="page-title">Add New Audit</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">GRC</a></li>
						<li class="breadcrumb-item active"><a href="#">Add New Audit</a>
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
	                                  	<form id="add_aduit_form">
	                                      <div class="tab-pane p-3 active" id="details" role="tabpanel">
	                                      		<div class="row m-t-20">
	                                      			<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Name<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                        <input id="name" name="name" type="text" class="form-control" required="">
				                                              <div id="empid_error"></div>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Audit Status<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                  <select class="form-control" name="audit_ststus" required="">
				                                             	<option value="1">Pending</option>
				                                             	<option value="2">Complete</option>
				                                             	
				                                             </select>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Audit CheckList<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                             <select class="form-control" name="check_list_ststus" required="">
				                                             	<option value="1">Pending</option>
				                                             	<option value="2">Complete</option>
				                                             </select>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Management Remarks<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                            <input type="text" class="form-control" name="remarks" required="">
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<?php
                                         $user = DB::table('main_users')->where('isactive',1)->get();
                                    				?>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Main Person Responsible<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                             <select class="form-control" name="user_id" required="">
				                                             	@foreach($user as $users)
				                                             	<option value="{{$users->id}}">{{$users->userfullname}}</option>

				                                             	@endforeach
				                                             </select>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Compilance Status by HOD/Coordinator<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                             <select class="form-control" name="Compilance_status" required="">
				                                              <option value="1">Pending</option>
				                                             <option value="2">All Compiled</option>
				                                             </select>
				                                          </div>
				                                       </div>
                                    				</div>
                                    					<div class="col-md-12">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-2 col-form-label">QMS Observations<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-10">
				                                             <textarea class="form-control" name="qms" rows="3" required=""></textarea>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<div class="col-sm-12 text-right">
                                    					<button type="submit" class="btn btn-primary">Save</button>
                                    					<button type="reset" class="btn btn-default">Cancel</button>
                                    				</div>
	                                      		</div>
	                                      </div>
	                                  </form>
	                            <!--            <div class="tab-pane p-3" id="checklist" role="tabpanel">
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
											<td>
												<select class="form-control">
													<option>Umang</option>
												</select>
											</td>
											<td>
												<input type="text" class="form-control" name="">
											</td>
											<td>
												<select class="form-control">
													<option>Umang</option>
												</select>
											</td>
										</tr>
									</tbody>
								</table>
	                                      			</div>
	                                      		</div> -->
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


   $("form#add_aduit_form").submit(function(e) {

 
            e.preventDefault();



   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/add_audit_data',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
            $('#loadingDiv').hide();
        
             swal("Good job!", "Added Successfully", "success");

              window.location.href = "{{URL::to('/edit-audit')}}/"+data.audit_last_id;

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");
            

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");
               

          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        }
      });

            

          });




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