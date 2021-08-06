  <?php
     $get_user = DB::table('main_users')->where('isactive',1)->get();
       ?>



    <div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0">Edit Training Plan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <div class="modal-body">


                <div class="row">
               <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Date<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="date" class="form-control" id="edit_date" value="{{$plan->date}}" name="edit_date" required=""> 
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
                <input type="time" class="form-control" value="{{$plan->start_time}}" id="edit_s_time" name="s_time"> 
             <div id="date"></div>
           </div>
         </div>
       </div>
          <div class="col-md-4">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label p-0">End Time<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="time" class="form-control" value="{{$plan->end_time}}" id="edit_e_time" name="e_time" required=""> 
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
                <input type="text" class="form-control" value="{{$plan->training_name}}" id="edit_training_name" name="training_name" required=""> 
             <div id="assets_type_error"></div>
           </div>
         </div>
       </div>

       <input type="hidden" name="training_plan_id" id="training_plan_id" value="{{$plan->id}}">
       
         <div class="col-md-12">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Select Empoyee
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <select class="form-control" id='edit_selected_user' multiple name="selected_user[]">
               <option value="">Select</option>
              @foreach($get_user as $get_users)
              <?php
              if(in_array($get_users->id,json_decode($plan->emp_id))){

                $select = 'selected';

              }else{

                 $select = '';

              }
              ?>
             	<option value="{{$get_users->id}}" {{$select}}>{{$get_users->userfullname}}</option>
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
                                <button onclick="edit_training_plan()" class="btn btn-primary training">Add</button>
                                					<button type="reset" class="btn btn-default">Cancel</button>
                                				</div>
                                			</div>
</div>

                                	</div>
                                 
      