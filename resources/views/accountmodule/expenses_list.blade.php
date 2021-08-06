
@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
	<div class="container-fluid">
		<div class="page-title-box">
			<div class="row align-items-center bredcrum-style">
				<div class="col-sm-6">
					<h4 class="page-title">All Expenses</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">GRC</a></li>
						<li class="breadcrumb-item active"><a href="{{URL::to('/expense')}}">All Expenses</a>
						</li>
					</ol>
				</div>
				<div class="col-sm-6">
					<div class="float-right d-none d-md-block">
						<div class="dropdown">
							<a href="{{URL::to('/add-expense')}}">
								<button
								class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
								type="button">
							Add New Expenses</button>
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
					<form method="GET">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="empcode" class="col-lg-4 col-form-label">Select Year
										<span class="text-danger"></span>
									</label>
									<div class="col-lg-8">
										<select class="form-control" name="year" required="">
											<option value="">Select Month</option>
											@for($i=date('Y')-1;$i <= date('Y'); $i++ )
											<option @if(!empty($_GET['year']))  @if($_GET['year'] == $i) selected    @endif @endif>{{$i}}</option>

											@endfor

										</select>


									</div>
								</div>

							</div>
							<div class="col-md-6">
									<div class="form-group row">
										<label for="empcode" class="col-lg-4 col-form-label">Select Month
											<span class="text-danger"></span>
										</label>
										<div class="col-lg-8">
											<select class="form-control" name="month" required="">
												<option value="">Select Month</option>
												<option value="1" @if(!empty($_GET['month']))  @if($_GET['month'] == 1) selected    @endif @endif>January</option>
												<option value="2" @if(!empty($_GET['month']))  @if($_GET['month'] == 2) selected    @endif @endif>February</option>
												<option value="3" @if(!empty($_GET['month']))  @if($_GET['month'] == 3) selected    @endif @endif>March</option>
												<option value="4" @if(!empty($_GET['month']))  @if($_GET['month'] == 4) selected    @endif @endif>April</option>
												<option value="5" @if(!empty($_GET['month']))  @if($_GET['month'] == 5) selected    @endif @endif>May</option>
												<option value="6" @if(!empty($_GET['month']))  @if($_GET['month'] == 6) selected    @endif @endif>June</option>
												<option value="7" @if(!empty($_GET['month']))  @if($_GET['month'] == 7) selected    @endif @endif>July</option>
												<option value="8" @if(!empty($_GET['month']))  @if($_GET['month'] == 8) selected    @endif @endif>August</option>
												<option value="9" @if(!empty($_GET['month']))  @if($_GET['month'] == 9) selected    @endif @endif>September</option>
												<option value="10" @if(!empty($_GET['month']))  @if($_GET['month'] == 10) selected    @endif @endif>October</option>
												<option value="11" @if(!empty($_GET['month']))  @if($_GET['month'] == 11) selected    @endif @endif>November</option>
												<option value="12" @if(!empty($_GET['month']))  @if($_GET['month'] == 12) selected    @endif @endif>December</option>
											</select>
										</div>
									</div>
								</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="empcode" class="col-lg-4 col-form-label">Employee Name
										<span class="text-danger"></span>
									</label>
									<div class="col-lg-8">
										<select class="form-control" name="user" id="user" onchange="get_project(this.value)" required="">
											<option value="">Select Name</option>
											@foreach($userlist as $userlists)
											<option value="{{$userlists->id}}" @if(!empty($_GET['user']))  @if($_GET['user'] == $userlists->id) selected    @endif @endif>{{$userlists->userfullname}}</option>
											@endforeach
											@if($role ==1 || $role ==11 )
                                           <option value="1000" @if(!empty($_GET['user']))  @if($_GET['user'] == 1000) selected    @endif @endif>All EMP</option>
											@endif

										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="empcode" class="col-lg-4 col-form-label">Project Name
										<span class="text-danger"></span>
									</label>
									<div class="col-lg-8">
										<select class="form-control" id="project" name="project" required="">
											<option>Select Project</option>

											@if(!empty($_GET['user']))
											@foreach($project_list as $project_lists)
											<option value="{{$project_lists->id}}"  @if($_GET['project'] == $project_lists->id) selected    @endif >{{$project_lists->project_name}}</option>
											@endforeach
											@endif

											@if($role == 1 || $role ==11 )
                                           <option value="1000" @if(!empty($_GET['project']))  @if($_GET['project'] == 1000) selected    @endif @endif>All Project</option>
											@endif

										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</div>

					</form>
					<hr>
					<!-- <button class="btn btn-primary float-right">Reimburse</button> -->
					<table id="datatable" class="table table-bordered dt-responsive nowrap"
					style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>S.No</th>
						<!-- 	<th>
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input checkall" type="checkbox" name="checkall" id="remember">
									<label class="custom-control-label" for="customControlInline remember">
									</label>
								</div>
							</th> -->
							<th>Employee Name</th>
							<th>Expense Name</th>
							<th>Project</th>
							<th>Expense Date</th>
							<th tooltip="Reimbursable Amount" data-toggle="tooltip">R.Amount</th>
							<th>Amount</th>
							<th>Uploaded Receipt</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                       @php($i = 1)
						@foreach($expense_list as $expense_lists)
						<tr>
							<td>{{$i++}}</td>
							<!-- <td>
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" name="checkall" id="remember" value="{{$expense_lists->id}}">
									<label class="custom-control-label" for="customControlInline remember">
									</label>
								</div>
							</td> -->
							<td>{{$expense_lists->userfullname}}</td>
							<td>
								{{$expense_lists->expense_name}}
							</td>
							<td>{{$expense_lists->project_name??''}}</td>
							<td>
								{{date('d-M-Y',strtotime($expense_lists->expeses_date))}}
							</td>
							<td>
								<span id="r_amount_{{$expense_lists->id}}">{{$expense_lists->raimbs_amt??''}}</span>
                                  
								<i class="mdi mdi-pen text-warning" id="edit_icon_{{$expense_lists->id}}" onclick="show_input('{{$expense_lists->id}}')"  style="display:{{($expense_lists->status == 2)?"none":"block"}}"></i>
                                      

								<span style="display:none" id="editText_{{$expense_lists->id}}">
									<input type="text" class="form-control inline-block" id="r_amt_{{$expense_lists->id}}" style="width: auto;">
									<i onclick="update_r_amt('{{$expense_lists->id}}')" class="btn btn-primary mdi mdi-check"></i>
									<i onclick="close_r_amt('{{$expense_lists->id}}')" class="btn btn-danger mdi mdi-window-close"></i>
								</span>
							</td>
							<td>{{$expense_lists->expenses_amt??''}}</td>
							<td>
								
								@if(!empty($expense_lists->upload_reciept))
								<ul>
								@foreach(explode(',',$expense_lists->upload_reciept) as $files)
								<li>
								<a href="{{URL::to('/public')}}/{{$files??''}}">Recipt_{{mt_rand(1000,9999)}}</a>
							     </li>
								@endforeach
								</ul>
								@endif
                                
							</td>
							<td>
								<select class="form-control" id="status" onchange="update_status('{{$expense_lists->id}}',this.value)">
									<option value="1" @if($expense_lists->status == 1)  selected @endif>Submited</option>
									<option value="2"  @if($expense_lists->status == 2)  selected @endif>Reimburse</option>
									<option value="3"  @if($expense_lists->status == 3)  selected @endif>Approved</option>
									<option value="4"  @if($expense_lists->status == 4)  selected @endif>Reject</option>
								</select>
							</td>
							<td>
								<a href="{{URL::to('view_expenses')}}/{{$expense_lists->id}}"><i class="mdi mdi-eye font-blue"
									data-toggle="tooltip" title="Active"></i></a>
									<a href="{{URL::to('edit_expenses')}}/{{$expense_lists->id}}"><i class="mdi mdi-pen text-warning"
										data-toggle="tooltip"
										title="Edit"></i></a>

										<a onclick="return confirm('Are you sure you want to delete this?');" href="{{URL::to('delete_expenses')}}/{{$expense_lists->id}}">       
											<i class="mdi mdi-delete text-danger" data-toggle="modal"
											data-target="#deletemp" title="Delete"></i>

										</a>
									</td>
								</tr>

								@endforeach
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

@section('extra_js')

<script>$(function () {
	$("#form-horizontal").steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slide"
	});
});
// $(document).ready(function(){
//   $(".editable").on("click", function(){
//     alert("The paragraph was clicked.");
//   });
// });
function show_input(exp_id){

	var amt = $('#r_amount_'+exp_id).text();
	
    $('r_amt_'+exp_id).val(amt);
	$('#editText_'+exp_id).show();
	$('#r_amount_'+exp_id).hide();
	$('#edit_icon_'+exp_id).hide();

}

function close_r_amt(exp_id){

	$('#r_amount_'+exp_id).show();
	$('#editText_'+exp_id).hide();
      $('#edit_icon_'+exp_id).show();
}

function update_r_amt(expenses_id){



	var r_amount = $('#r_amt_'+expenses_id).val();

	var _token = "{{csrf_token()}}";
	$.ajax({
		url: '/update_r_amt',
		type: "post",
		data: {"_token": _token,"expenses_id":expenses_id,"r_amount":r_amount},
		dataType: 'JSON',

		success: function (data) {

			if(data.status == 200){

				$('#editText_'+expenses_id).hide();
				$('#r_amount_'+expenses_id).show();
				$('#r_amount_'+expenses_id).text(r_amount);
                 $('#edit_icon_'+expenses_id).show();

				alertify.success(data.msg); 

			}else{
				alertify.success(data.msg); 
			}

		}
	});
}



function get_project(user_id){


	var _token = "{{csrf_token()}}";
	$.ajax({
		url: '/get_user_project',
		type: "post",
		data: {"_token": _token,"user_id":user_id},
		dataType: 'JSON',

		success: function (data) {

			$('#project').html(data.project);

		}
	});

}

function update_status(exp_id,status){

	


	            if(status == 2){
					
                 $('#edit_icon_'+exp_id).hide();
				
                }else{
                 $('#edit_icon_'+exp_id).show();	
                }
              


	var _token = "{{csrf_token()}}";
	$.ajax({
		url: '/update_status_expeses',
		type: "post",
		data: {"_token": _token,"exp_id":exp_id,"status":status},
		dataType: 'JSON',

		success: function (data) {

			if(data.status == 200){





				alertify.success(data.msg); 

			}else{
				alertify.success(data.msg); 
			}

		}
	});

}



</script>


@stop