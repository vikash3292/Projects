
@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">

	<div class="container-fluid">

		<div class="page-title-box">

			<div class="row align-items-center bredcrum-style">

				<div class="col-sm-6 col-6">

					<h3 class="page-title">Check List Master</h3>

					<ol class="breadcrumb">

						<li class="breadcrumb-item"><a href="index.html">GRC</a></li>

						<li class="breadcrumb-item active"><a href="bill_master.html">Check list Master</a>

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
										<th>Deportment</th>
                                                                      <th>HOD</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                                              @php($i = 1)
                                                               @foreach($check_list as $check_lists)
									<tr>
										<td>{{$i++}}</td>
							<td>{{$check_lists->check_list_name}}</td>
							<td>{{$check_lists->deptname}}</td>
                                                 <td>{{$check_lists->userfullname}}</td>
										<td>
							<i title="View" class="mdi mdi-eye text-info" data-toggle="modal" data-target="#viewaudit_{{$check_lists->id}}"></i>

						<i title="Edit" class="mdi mdi-pencil text-warning" onclick="get_checklist('{{$check_lists->id}}')"></i>


						<a  onclick="return confirm('Are you sure you want to delete this ?');" href="{{URL::to('delete-checklist')}}/{{$check_lists->id}}"><i title="Delete" class="mdi mdi-delete text-danger"></i></a>
										</td>
									</tr>


                                                               <div id="viewaudit_{{$check_lists->id}}" class="modal fade" role="dialog">

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
                                                               <label for="empid" class="col-lg-4 col-form-label"> Name<span class="text-danger">*</span></label>
                                                               <div class="col-lg-8 col-form-label">
                                                                      <label class="myprofile_label">{{$check_lists->check_list_name}}</label>
                                                               </div>
                                                        </div>

                                                        <div class="form-group row m-0">
                                                               <label for="empid" class="col-lg-4 col-form-label"> Deportment<span class="text-danger">*</span></label>
                                                               <div class="col-lg-8 col-form-label">
                                                                      <label class="myprofile_label">{{$check_lists->deptname}}</label>
                                                               </div>
                                                        </div>

                                                        <div class="form-group row m-0">
                                                               <label for="empid" class="col-lg-4 col-form-label"> HOD<span class="text-danger">*</span></label>
                                                               <div class="col-lg-8 col-form-label">
                                                                      <label class="myprofile_label">{{$check_lists->userfullname}}</label>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="col-sm-12">
                                                                      <div class="form-group row m-0">
                                                                             <label for="empid" class="col-lg-4 col-form-label p-r-0">Description<span class="text-danger">*</span></label>
                                                                             <div class="col-lg-8 col-form-label">
                                                                                    <label class="myprofile_label">{{$check_lists->desc}}</label>
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
       	<div id="newaudit" class="modal fade" role="dialog">

       		<div class="modal-dialog modal-lg">
       			<!-- Modal content-->
       			<div class="modal-content">
       				<div class="modal-header">
       					<h5 class="modal-title mt-0">Add Check list</h5>
       					<button type="button" class="close" data-dismiss="modal">&times;</button>
       				</div>
                                   <form id="checklist_form">
       				<div class="modal-body">
       					<div class="row">
       						<div class="col-md-12">
       							<div class="form-group row m-0">
       								<label for="empid" class="col-lg-4 col-form-label">Check list<span class="text-danger">*</span></label>
       								<div class="col-lg-8 col-form-label">
       									<input type="text" class="form-control" id="checklist" name="checklist"> 
       									<div id=""></div>
       								</div>
       							</div>
       						</div>

                                                 <?php

                            $Deportment = DB::table('main_departments')->where('isactive',1)->get();
                                                 ?>

                                                 <div class="col-md-12">
                                                        <div class="form-group row m-0">
                                                               <label for="empid" class="col-lg-4 col-form-label">Deportment<span class="text-danger">*</span></label>
                                                               <div class="col-lg-8 col-form-label">
                                                      <select class="form-control" id="deportment" name="deportment" required=""  onchange="hod_list(this.value)">
                                                       <option value=""> select Option</option>
                                                       @foreach($Deportment as $Deportments)
                                                         <option value="{{$Deportments->id}}">{{$Deportments->deptname}}</option>
                                                       @endforeach
                                                      </select>
                                                                      <div id=""></div>
                                                               </div>
                                                        </div>
                                                 </div>

                                                        <div class="col-md-12">
                                                        <div class="form-group row m-0">
                                                               <label for="empid" class="col-lg-4 col-form-label">HOD<span class="text-danger">*</span></label>
                                                               <div class="col-lg-8 col-form-label">
                                                 <select class="form-control" id="hod" name="hod" required>
                                                       <option value=""> select Option</option>
                                                  
                                                      </select>
                                                                      <div id=""></div>
                                                               </div>
                                                        </div>
                                                 </div>

                                   <input type="hidden" name="checklist_id" id="checklist_id">

       						<div class="col-sm-12">
       						<div class="form-group row m-0">
       						<label for="empid" class="col-lg-4 col-form-label p-r-0">Description<span class="text-danger">*</span></label>
       						<div class="col-lg-8 col-form-label">
       					  <textarea class="form-control" rows="3" name="desc" id="desc" required=""></textarea> 
       											<div id=""></div>
       										</div>
       									</div>
       						</div>
       					</div>

       				</div>
       				<div class="modal-footer">
       					<div class="row">
       						<div class="col-sm-12 m-t-10 text-center">
       			<button type="submit
                                   " class="btn btn-primary">save</button>
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


                     function hod_list(dept_id){

                      var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/get_hod_list',
        type: "post",
        data: {"_token": _token,"dept_id":dept_id},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good

        $('#hod').html(data.hod_list);
    
        }
      });

                     }

                     function get_checklist(checklist_id){

                               var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/get_checklist',
        type: "post",
        data: {"_token": _token,"checklist_id":checklist_id},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good

        $('#checklist').val(data.checklist.check_list_name);
        $('#desc').val(data.checklist.desc);
         $('#desc').val(data.checklist.desc);
           $('#checklist_id').val(data.checklist.id);
         
        $('.modal-title').text('Edit Check List');

        $("#deportment > option").each(function() {
         if($(this).val() == data.checklist.deportment_id){
            $('#deportment').val(data.checklist.deportment_id).attr("selected"); 
         }

      });

                   hod_list(data.checklist.deportment_id);

         $("#hod > option").each(function() {
         if($(this).val() == data.checklist.hod_user_id){
            $('#hod').val(data.checklist.hod_user_id).attr("selected"); 
         }

      });


          $('#newaudit').modal('show');
    
        }
      });

                     }
                     
                 $("form#checklist_form").submit(function(e) {

 
            e.preventDefault();



   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/add_checklist_master',
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