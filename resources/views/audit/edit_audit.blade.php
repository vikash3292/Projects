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
						<li class="breadcrumb-item active"><a href="#">Edit New Audit</a>
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
				                                        <input id="name" name="name" type="text" class="form-control" required="" value="{{$edit_audit->aduit_name}}">
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
				                          <option value="1" @if($edit_audit->aduit_status == 1) selected @endif>Pending</option>
				                          <option value="2" @if($edit_audit->aduit_status == 2) selected @endif>Complete</option>
				                                             	
				                                             </select>
				                                          </div>
				                                       </div>
                                    				</div>
                                    				
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Management Remarks<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                            <input type="text" class="form-control" name="remarks" required="" value="{{$edit_audit->mng_remark}}">
				                                          </div>
				                                       </div>
                                    				</div>
                                    				<?php
                      $user = DB::table('main_users')->where('isactive',1)->where('emprole',18)->get();
                                    				?>
                                    				<div class="col-md-6">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-4 col-form-label">Main Person Responsible<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-8">
				                                             <select class="form-control" name="user_id" required="">
				                                             	@foreach($user as $users)
				                                             	<option value="{{$users->id}}"  @if($edit_audit->user_id == $users->id) selected @endif>{{$users->userfullname}}</option>

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
				                                              <option value="1"  @if($edit_audit->compaine_status == 1) selected @endif>Pending</option>
				                                             <option value="2" @if($edit_audit->compaine_status == 2) selected @endif>All Compiled</option>
				                                             </select>
				                                          </div>
				                                       </div>
                                    				</div>
                                    					<div class="col-md-12">
				                                       <div class="form-group row">
				                                          <label for="name" class="col-lg-2 col-form-label">QMS Observations<span class="text-danger p-l-5">*</span>
														  </label>
				                                          <div class="col-lg-10">
				                                             <textarea class="form-control" name="qms" rows="3" required="" >{{$edit_audit->qms}}</textarea>
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
	                                       <div class="tab-pane p-3" id="checklist" role="tabpanel">
	                                      		<div class="row m-t-20">
	                                      			<div class="col-sm-12">
	                                      				

                                 <form id="checklist_save_form">

	                                      				<table id="datatable" class="table table-bordered dt-responsive nowrap"
					style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Checklist</th>
											<th>Main Person Responsible</th>
											<th>QMS Observations</th>
											<th>Compilance Status</th>
											@if($show_hod > 0)

                                            <th>QMS </th>
											<th> Status</th>

											@endif
										</tr>
									</thead>
									
									<tbody>
										
										@php($i = 1)
										@foreach($checklist_master as $checklist_masters)
				                       <tr>
											<td>{{$i++}}</td>
											<td>{{$checklist_masters->check_list_name}}</td>
											<td>
								<select class="form-control" name="responsible_user_id[]" required=""  @if(!empty($checklist_masters->get_data))  readonly   @endif>
													<option value="">Select Option</option>
													@foreach($user as $users)
				       <option value="{{$users->id}}"

				        @if(!empty($checklist_masters->get_data))
				         @if($users->id == $checklist_masters->get_data->user_id)  selected    @endif  @endif

				        >{{$users->userfullname}}</option>
				                                      @endforeach
												</select>
											</td>
											<td>
												<input type="text" class="form-control" name="qms[]" required=""  @if(!empty($checklist_masters->get_data))  value="{{$checklist_masters->get_data->msq}}"  readonly @endif>
											</td>
											<td>
					<input type="hidden" name="audi_id" value="{{$audit_id}}">
					<input type="hidden" name="hod_id[]" value="{{$checklist_masters->hod_user_id}}">
						
						<input type="hidden" name="checklist_id[]" value="{{$checklist_masters->id}}">
										<select class="form-control" name="Compilance_status[]" required="" @if(!empty($checklist_masters->get_data))  readonly   @endif>
		<option value="1" @if(!empty($checklist_masters->get_data)) @if($checklist_masters->get_data->complice_status == 1) selected   @endif @endif>Pending</option>
		<option value="2"  @if(!empty($checklist_masters->get_data)) @if($checklist_masters->get_data->complice_status == 2) selected   @endif  @endif>Complete</option>
												</select>
											</td>

                                               <td>
                                              @if($checklist_masters->check_hod > 0)
                                             
												<input type="text" class="form-control" name="msq_hod[]" required=""  @if(!empty($checklist_masters->get_data))  value="{{$checklist_masters->get_data->msq_hod}}"   @endif>

												@endif
											</td>


                                             <td>

                                             	 @if($checklist_masters->check_hod > 0)
                                             <select class="form-control" name="complice_status_hod[]" required="">
	<option value="1" @if(!empty($checklist_masters->get_data)) @if($checklist_masters->get_data->complice_status_hod == 1) selected   @endif @endif>Pending</option>
	<option value="2" @if(!empty($checklist_masters->get_data)) @if($checklist_masters->get_data->complice_status_hod == 2) selected   @endif @endif>Complete</option>
												</select>

                                                @endif

											</td>
											


										</tr>

										@endforeach

									</tbody>

								
								</table>

								<div class="col-sm-12 text-right">
                                    					<button type="submit" class="btn btn-primary">Save</button>
                                    					<button type="reset" class="btn btn-default">Cancel</button>
                                    				</div>
								</form>
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
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");
               location.reload();

          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        }
      });

            

          });


         $("form#checklist_save_form").submit(function(e) {

 
            e.preventDefault();



   var token = "{{csrf_token()}}"; 
 
   $('#loadingDiv').show();

  $.ajax({
        url: '/save_check_list_data',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        
        success: function (data) {
        //console.log(data.city); // this is good
    
             if(data.status ==200){
            $('#loadingDiv').hide();
        
             swal("Good job!", "Added Successfully", "success");
             location.reload();
           
          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");
               location.reload();

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