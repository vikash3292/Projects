@extends('layouts.superadmin_layout')

@section('content')

 <?php
     $get_user = DB::table('main_users')->where('isactive',1)->get();
       ?>

   <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6 col-6">

                                <h3 class="page-title">Training Plan</h3>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                                    <li class="breadcrumb-item active"><a href="#">Training Plan</a></li>

                                </ol>

                            </div>

                        </div>
    <div class="row">

                        <div class="col-12">

                            <div class="card m-t-20">

                                <div class="card-body">
                                	<div class="row">
                                		<div class="col-sm-12">
                                			<button class="btn btn-primary float-right" data-toggle="modal" data-target="#newtraining">Add New Training Plan</button>
                                			  <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        	<thead>
                                        		<tr>
                                        			<th>Date</th>
                                        			<th>Start Time</th>
                                        			<th>End Time</th>
                                        			<th>Training Name</th>
                                        			<th>Action</th>
                                        		</tr>
                                        	</thead>
                                        	<tbody>
                                            @foreach($training_plan as $training_plan)
                                        		<tr>
                                        			<td>{{$training_plan->date}}</td>
                                        			<td>{{$training_plan->start_time}}</td>
                                        			<td>{{$training_plan->end_time}}</td>
                                        			<td>{{$training_plan->training_name}}</td>
                                        			<td>

                                  <i title="View" class="mdi mdi-eye text-info" data-toggle="modal" data-target="#viewtraining{{$training_plan->id}}"></i>


            <div id="viewtraining{{$training_plan->id}}" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0">Training View</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
                                      <div class="row">
                                           <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Date</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$training_plan->date}}</label>
           </div>
         </div>
       </div>
        <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Traning Name</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$training_plan->training_name}}</label>
           </div>
         </div>
       </div>
       <div class="col-sm-12">
       <div class="row">
           <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Start Time</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$training_plan->start_time}}<</label>
           </div>
         </div>
       </div>
          <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">End Time<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$training_plan->end_time}}</label>
           </div>
         </div>
       </div>
       </div>
   </div>
         
         <div class="col-md-12">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Selected Empoyee</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">
             <!--   selected employee view here in li -->
                <ul>
                  <li></li>
                </ul>
              </label>
           </div>
         </div>
       </div>
                                      </div>

                                    </div>
                                  </div>
                                  
                                </div>
        </div>



                          <i title="Edit" class="mdi mdi-pencil text-warning" onclick="edit_traning_plance('{{$training_plan->id}}')"></i>




                                                <a onclick="return confirm('Are you sure you want to delete this Training?');" href="{{URL::to('delete-training')}}/{{$training_plan->id}}">
                                        				<i title="Delete" class="mdi mdi-delete text-danger"></i>

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
            </div>
<!-- 
add new training plan -->
  <div id="newtraining" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">
    <!-- Modal content-->

    <form id="training_plan_form_data">
    <div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0">New Training Plan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <div class="modal-body">


                <div class="row">
               <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Date<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="date" class="form-control" id="date" name="date" required=""> 
             <div id="date"></div>
           </div>
         </div>
       </div>
       <div class="col-sm-12">
       <div class="row">
       	   <div class="col-md-8">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-6 col-form-label p-r-0">Start Time<span class="text-danger">*</span></label>
           <div class="col-lg-6 col-form-label">
                <input type="time" class="form-control" id="s_time" name="s_time"> 
             <div id="date"></div>
           </div>
         </div>
       </div>
          <div class="col-md-4">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label p-0">End Time<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="time" class="form-control" id="e_time" name="e_time" required=""> 
             <div id="date"></div>
           </div>
         </div>
       </div>
       </div>
   </div>
          <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Traning Name<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="text" class="form-control" id="training_name" name="training_name" required=""> 
             <div id="assets_type_error"></div>
           </div>
         </div>
       </div>
       
         <div class="col-md-12">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Select Empoyee
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <select class="form-control" id='testSelect1' multiple name="selected_user[]">
               <option value="">Select</option>
              @foreach($get_user as $get_users)
             	<option value="{{$get_users->id}}">{{$get_users->userfullname}}</option>
              @endforeach
             
              </select>
             <div id="select_emp"></div>
           </div>
         </div>
       </div>
         <div class="col-md-12">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Selected Empoyee
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <textarea class="form-control" rows="3"></textarea> 
             <div id="select_emp"></div>
           </div>
         </div>
       </div>
                                			</div>

                                		</div>
<div class="modal-footer">
	<div class="row">
                                				<div class="col-sm-12 m-t-10 text-center">
                                <button type="submit" class="btn btn-primary training">Add</button>
                                					<button type="reset" class="btn btn-default">Cancel</button>
                                				</div>
                                			</div>
</div>

                                	</div>
                                  </form>
                                	
                                </div>
      	</div>

   <div id="edit_training_plan" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg edit_traning">
    <!-- Modal content-->

  </div>

</div>


      	<!-- view training plan -->

      </div>
  </div>
</div>
@stop
@section('extra_js')
<script type="text/javascript">



   
    function edit_training_plan(){

      date= $('#edit_date').val();
      s_time = $('#edit_s_time').val();
      e_time = $('#edit_e_time').val();
       training_name = $('#edit_training_name').val();
         training_plan_id = $('#training_plan_id').val();
         

      var selected=[];
     $('#edit_selected_user :selected').each(function(){
         selected.push($(this).val());
        });

     var users = JSON.stringify(selected);
    

   
$('#loadingDiv').show();

         var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/edit_training_data',
  type: "post",
  data: { "_token": _token, "date": date,'training_name':training_name,'s_time':s_time,"e_time":e_time,"training_plan_id":training_plan_id,"users":users},
  dataType: 'JSON',

  success: function (data) {

    $('#loadingDiv').hide();
                //console.log(data.allclient); // this is good
                $('#edit_training_plan').modal('hide');
               swal("Good job!", "Added Successfully", "success");
                
               location.reload();



              }
            }); 

    }

   $("#training_plan_form_data").submit(function(e) {

 
            e.preventDefault();

   

   var token = "{{csrf_token()}}"; 

$('#loadingDiv').show();
  $.ajax({
        url: '/add_training_plan',
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
   


function edit_traning_plance(training_id){

    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/edit_traning_plan',
      type: "post",
      data: { "_token": _token,"training_id":training_id},
    

      success: function (data) {
               // console.log(data.milstone); // this is good
              $('.edit_traning').html(data);
              $('#edit_training_plan').modal('show');

             }
           });

}






  document.multiselect('#testSelect1')
    .setCheckBoxClick("checkboxAll", function(target, args) {
      console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
    })
    .setCheckBoxClick("1", function(target, args) {
      console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
    });




</script>







@stop