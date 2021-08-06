
@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">

	<div class="container-fluid">

		<div class="page-title-box">

			<div class="row align-items-center bredcrum-style">

				<div class="col-sm-6 col-6">

					<h3 class="page-title">Bill Master</h3>

					<ol class="breadcrumb">

						<li class="breadcrumb-item"><a href="index.html">GRC</a></li>

						<li class="breadcrumb-item active"><a href="bill_master.html">Bill Master</a>

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
								<button class="btn btn-primary float-right" data-toggle="modal" data-target="#newtraining">Add New </button>
								<table id="datatable" class="table table-bordered dt-responsive nowrap"
								style="border-collapse: collapse; border-spacing: 0; width: 100%;">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Bill Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                                               @php($i =1)
                                                               @foreach($bill as $bills)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$bills->bill_name}}</td>
										<td>{{$bills->desc}}</td>
										<td>
											<i title="View" class="mdi mdi-eye text-info" data-toggle="modal" data-target="#viewbill_{{$bills->id}}"></i>





					<i title="Edit" class="mdi mdi-pencil text-warning"  onclick="edit_bill('{{$bills->id}}','{{$bills->bill_name}}','{{$bills->desc}}')" ></i>

                                   <a   onclick="return confirm('Are you sure you want to delete this ?');" href="{{URL::to('delete-bill-master')}}/{{$bills->id}}">
											<i title="Delete" class="mdi mdi-delete text-danger"></i>

                                                                      </a>
										</td>
									</tr>

                                                               <div id="viewbill_{{$bills->id}}" class="modal fade" role="dialog">

                     <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title mt-0">View Bill</h5>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>
                                   <div class="modal-body">
                                          <div class="row">
                                                 <div class="col-md-12">
                                                        <div class="form-group row m-0">
                                                               <label for="empid" class="col-lg-4 col-form-label">Bill Name<span class="text-danger">*</span></label>
                                                               <div class="col-lg-8 col-form-label">
                                                                      <label class="myprofile_label">{{$bills->bill_name}}</label>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="col-sm-12">
                                                                      <div class="form-group row m-0">
                                                                             <label for="empid" class="col-lg-4 col-form-label p-r-0">Description<span class="text-danger">*</span></label>
                                                                             <div class="col-lg-8 col-form-label">
                                                                                    <label class="myprofile_label">{{$bills->desc}}</label>
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
       <!-- 
       	add new Bill -->
       	<div id="newtraining" class="modal fade" role="dialog">

       		<div class="modal-dialog modal-lg">
       			<!-- Modal content-->
       			<div class="modal-content">
       				<div class="modal-header">
       					<h5 class="modal-title mt-0">Add Bill</h5>
       					<button type="button" class="close" data-dismiss="modal">&times;</button>
       				</div>
                                   <form id="bill_master_form">
       				<div class="modal-body">
       					<div class="row">
       						<div class="col-md-12">
       							<div class="form-group row m-0">
       								<label for="empid" class="col-lg-4 col-form-label">Bill Name<span class="text-danger">*</span></label>
       								<div class="col-lg-8 col-form-label">
       									<input type="text" class="form-control" id="billname" name="billname" required=""> 
       									<div id=""></div>
       								</div>
       							</div>
       						</div>
                                                 <input type="hidden" name="bill_id" id="bill_id">
       						<div class="col-sm-12">
       				<div class="form-group row m-0">
       		<label for="empid" class="col-lg-4 col-form-label p-r-0">Description<span class="text-danger">*</span></label>
       	<div class="col-lg-8 col-form-label">
       	<textarea class="form-control" rows="3" id="desc" name="desc" required=""></textarea> 
       											<div id=""></div>
       										</div>
       									</div>
       						</div>
       					</div>

       				</div>
       				<div class="modal-footer">
       					<div class="row">
       						<div class="col-sm-12 m-t-10 text-center">
       							<button type="submit" class="btn btn-primary">Add</button>
       							<button class="btn btn-default" data-dismiss="modal">Cancel</button>
       						</div>
       					</div>
       				</div>
                            </form>
       			</div>

       		</div>
       	</div>
       	  <!-- View Bill -->
       	
       	@stop

              @section('extra_js')

              <script type="text/javascript">


                     function edit_bill(bill_id,bill_name,desc){

                     $('.modal-title').text('Edit Bill');
                     $('#bill_id').val(bill_id);
                     $('#billname').val(bill_name);
                     $('#desc').val(desc);

                    

                      $('#newtraining').modal('show');

                     }
                     
                 $("form#bill_master_form").submit(function(e) {

 
            e.preventDefault();



   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/add_bill_master',
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


              </script>

              @stop