<?php





namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

//use Illuminate\Support\Facades\Auth;

use DB;

use Session;

use Auth;

use Mail;

use URL;

use Hash;

use Validator;

use Illuminate\Support\Str;

use App\Main_users;

use DateTime;



class TrainingController  extends Controller

{

public function training_need_identification(){

	$training = DB::table('traning')->get();

	return view('training.training_identification',['training' =>$training]);
}

function add_training(Request $request){

	$userid = Auth::guard('main_users')->user()->id;


	$arr = array(
		'user_id' => $userid,
		'training_name' =>$request->training_name,
		'date' => $request->click_date,
		'desc' => $request->training_desc,
		'created_by' => $userid,
		'updated_by' =>$userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),


	);

	if(isset($request->training_id)){

		DB::table('traning')->where('id',$request->training_id)->update($arr);

	return response()->json(['status' => 203, 'msg' => 'Updated successfully']);

	}else{

		DB::table('traning')->insert($arr);

	return response()->json(['status' => 203, 'msg' => 'Added successfully']);

	}

	


}



public function add_training_plan(Request $request){

	$userid = Auth::guard('main_users')->user()->id;

	$arrat = array(
		'training_name' => $request->training_name,
		'date' => $request->date,
		'start_time' => $request->s_time,
		'end_time' => $request->e_time,
		'emp_id' => json_encode($request->selected_user),
		'created_by' => $userid,
		'updated_by' =>$userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),


);

	$arr = array(
		'user_id' => $userid,
		'training_name' =>$request->training_name,
		'date' => $request->date,
		'created_by' => $userid,
		'updated_by' =>$userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),


	);


		if(isset($request->training_plan_id)){

  		DB::table('tm_traning_plan')->where('id',$request->training_plan_id)->update($arrat);

  		 return response()->json(['status' => 203, 'msg' => 'updated successfully']);

  	}else{

  		DB::table('tm_traning_plan')->insert($arrat);

  		DB::table('traning')->insert($arr);

  		 return response()->json(['status' => 200, 'msg' => 'Added successfully']);

  	}




}

function edit_training(Request $request){

	$list = DB::table('traning')->where('id',$request->traing_id)->first();

         $html = '';
		  $html .='<div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0">Edit Training Plan</h5>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
      <div class="modal-body">
              <div class="row">

               <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Training Name<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="text" class="form-control" value="'.$list->training_name.'" id="training_name" name="training_name" > 
             <div id="training_name_error"></div>
           </div>
         </div>

         <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Description<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="text" class="form-control" value="'.$list->desc.'" id="training_desc" name="training_desc" > 
             <div id="training_desc_error"></div>
           </div>
         </div>

         <input type="hidden" id="training_id" value="'.$list->id.'">

         <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Date<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="date" class="form-control" id="click_date" value="'.$list->date.'" name="click_date" readonly> 
             <div id="click_date_error"></div>
           </div>
         </div>

       <div class="modal-footer">
	<div class="row">
                                				<div class="col-sm-12 m-t-10 text-center">
                                <button onclick="add_training()" class="btn btn-primary training">save</button>
                                					
                                				</div>
                                			</div>
</div>

                                	</div>
       </div>
      </div>
      </div>
';


	return response()->json(['status' => 200, 'msg' => 'Added successfully','training' => $html ]);
}


function get_all_training(Request $request){

	$traning = DB::table('traning')->where('training_plan_status',0)->get();

	$html = '';
	foreach ($traning as $key => $tranings) {
    $html .='<tr>
                                        			<th>'.$tranings->date.'</th>
                                        			<th>'.$tranings->training_name.'</th>
                                        			<th>'.$tranings->desc.'</th>
                                              <th><i title="Edit" class="mdi mdi-pencil text-warning" onclick="edit_traing(this,'.$tranings->id.')"></i>

                                             <i title="Edit" class="mdi mdi-delete text-danger" onclick="delete_traing(this,'.$tranings->id.')"></i>

                                              </th>
                                        		</tr>';
	}

	 return response()->json(['status' => 203, 'msg' => 'updated successfully','training' =>$html]);


}



function edit_training_data(Request $request){

	$userid = Auth::guard('main_users')->user()->id;


	$arrat = array(
		'training_name' => $request->training_name,
		'date' => $request->date,
		'start_time' => $request->s_time,
		'end_time' => $request->e_time,
		'emp_id' => $request->selected_user,
		'created_by' => $userid,
		'updated_by' =>$userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),


);

	DB::table('tm_traning_plan')->where('id',$request->training_plan_id)->update($arrat);

  		 return response()->json(['status' => 203, 'msg' => 'updated successfully']);



}

public function edit_traning_plan(Request $request){

	$plan = DB::table('tm_traning_plan')->where('id',$request->training_id)->first();

	return view('training.edit_training_plan',['plan' => $plan]);

}

 public function training_plan(){

 	$training_plan = DB::table('tm_traning_plan')->get();

	return view('training.training_plan',['training_plan' => $training_plan]);
}


function get_date_training(Request $request){

	$get_training = DB::table('traning')->whereDate('date',$request->click_date);

	
	$html = '';
	if($get_training->count() > 0){

     $html .='<div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0">New Training Plan</h5>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
      <div class="modal-body">

       <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Training Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>';
      
foreach ($get_training->get() as $key => $get_trainings) {
	# code...

      $html .='<tr>
        <td>'.$get_trainings->date.'</td>
        <td>'.$get_trainings->training_name.'</td>
        <td>'.$get_trainings->desc??''.'</td>
      </tr>';

  }
     
    $html .='</tbody>
  </table></div></div>
';


 return response()->json(['status' => 200, 'msg' => 'updated successfully','view_training' => $html]);


	}else{

		  $html .='<div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0">New Training Plan</h5>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
      <div class="modal-body">
              <div class="row">

               <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Training Name<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="text" class="form-control" id="training_name" name="training_name" > 
             <div id="training_name_error"></div>
           </div>
         </div>

          <input type="hidden" id="training_id" >

         <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Description<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="text" class="form-control" id="training_desc" name="training_desc" > 
             <div id="training_desc_error"></div>
           </div>
         </div>

         <div class="col-md-12">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Date<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="date" class="form-control" id="click_date" value="'.$request->click_date.'" name="click_date" readonly> 
             <div id="click_date_error"></div>
           </div>
         </div>

       <div class="modal-footer">
	<div class="row">
                                				<div class="col-sm-12 m-t-10 text-center">
                                <button onclick="add_training()" class="btn btn-primary training">Add</button>
                                					
                                				</div>
                                			</div>
</div>

                                	</div>
       </div>
      </div>
      </div>
';

 return response()->json(['status' => 203, 'msg' => 'updated successfully','addtraning' => $html]);


	}


}




}





?>