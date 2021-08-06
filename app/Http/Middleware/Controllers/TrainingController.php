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

use App\Mail\sendEmail;

use Carbon\Carbon;




class TrainingController extends Controller

{



public function training_need_identification(){

 $userid = Auth::guard('main_users')->user()->id;
 $role = Auth::guard('main_users')->user()->emprole;

 $get_training = DB::table('traning')->where('status',1);
  if($role !=1 && $role !=16){
  $get_training->where('user_id',$userid);	
  }
  $get_training  = $get_training->get();



	return view('training.training_identification',['training' => $get_training ]);
}

public function training_plan(){

	$training_plan = DB::table('tm_traning_plan')->where('status',1)->get();

	return view('training.training_plan',['training_plan' => $training_plan]);
}

function add_training(Request $request){

	$userid = Auth::guard('main_users')->user()->id;

	$arr = array(
     'user_id' => $userid,
     'training_name' => $request->training_name,
     'date' => $request->click_date,
     'desc' =>  $request->training_desc,
     'created_by' => $userid,
     'updated_by' => $userid,
     'created_at' => date('Y-m-d h:i:s'),
     'updated_at' => date('Y-m-d h:i:s'),

	);

	if(isset($request->training_id)){

		DB::table('traning')->where('id',$request->training_id)->update($arr);

		 return response()->json(['status' => 200, 'msg' => 'Successfully Update Training' ]);

	}else{

		DB::table('traning')->insert($arr);

		 return response()->json(['status' => 200, 'msg' => 'Successfully Add' ]);

	}

	

	

}

function get_all_training(Request $request){

 $userid = Auth::guard('main_users')->user()->id;
 $role = Auth::guard('main_users')->user()->emprole;

 $get_training = DB::table('traning')->where('status',1)->where('training_plan_status',0);
  if($role !=1 && $role !=16){
  $get_training->where('user_id',$userid);	
  }
  $get_training  = $get_training->get();
  $html = '';
  foreach ($get_training as $key => $get_trainings) {

  	$html .= '<tr>                                   <td>'.$get_trainings->date.'</td>
                                        			<td>'.$get_trainings->training_name.'</td>
                                        			<td>'.$get_trainings->desc.'</td>
                                        			<td class="text_ellipses">

                                                       
                                                   <a onclick="edit_traing(this,'.$get_trainings->id.')" href="javascript:void(0)"> <i class="mdi mdi-pen text-warning"
                                                           title="Edit"></i></a>
                                                           <a onclick="delete_traing(this,'.$get_trainings->id.')" href="javascript:void(0)"> <i class="fa fa-trash text-danger"
                                                           title="Edit"></i></a>

                                        			</td>
                                        		</tr>';
  
  }


  	 return response()->json(['status' => 200, 'msg' => 'Successfully','training' => $html]);

 

}

function delete_training(Request $request){

	DB::table('traning')->where('id',$request->traing_id)->delete();

	 return response()->json(['status' => 200, 'msg' => 'Successfully Delete']);

}

function edit_training(Request $request){

	$training  = DB::table('traning')->where('id',$request->traing_id)->first();

 return response()->json(['status' => 200, 'msg' => 'Successfully Delete' ,'training' => $training]);

}

function add_training_plan(Request $request){
	 $userid = Auth::guard('main_users')->user()->id;

	$arr = array(
		'training_name' => $request->training_name,
		'date' => $request->date,
		'start_time' => $request->s_time,
		'end_time' => $request->e_time,
		'emp_id' => json_encode($request->selected_user),
		'created_by' => $userid,
		'updated_by'  => $userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),

	);

	$traning = array(
        'user_id' => $userid,
        'training_name' =>  $request->training_name,
        'date' => $request->date,
        'created_by' => $userid,
		'updated_by'  => $userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),
		'training_plan_status' => 1,

		);

	if(isset($request->training_plan_id)){

		DB::table('tm_traning_plan')->where('id',$request->training_plan_id)->update($arr);

		DB::table('traning')->where('training_name',$request->training_name)->where('date',$request->date)->update($traning);

		 return response()->json(['status' => 200, 'msg' => 'Successfully Add Training']);

	}else{

		DB::table('tm_traning_plan')->insert($arr);
		DB::table('traning')->insert($traning);

		 return response()->json(['status' => 200, 'msg' => 'Successfully Add Training']);

	}

	

	

}

function edit_training_data(Request $request){

	

	 $userid = Auth::guard('main_users')->user()->id;

	$arr = array(
		'training_name' => $request->training_name,
		'date' => $request->date,
		'start_time' => $request->s_time,
		'end_time' => $request->e_time,
		'emp_id' => $request->users,
		'created_by' => $userid,
		'updated_by'  => $userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),

	);

		DB::table('tm_traning_plan')->where('id',$request->training_plan_id)->update($arr);

		 return response()->json(['status' => 200, 'msg' => 'Successfully update Training']);

}

function delete_training_plan($id){

	DB::table('tm_traning_plan')->where('id',$id)->delete();
	return redirect()->back();
}

function edit_traning_plan(Request $request){

	$get_training = DB::table('tm_traning_plan')->where('id',$request->training_id)->first();

	
 
	return view('training.edit_training_plan',['plan' => $get_training ]);

}

function get_date_training(Request $request){

	$get_details = DB::table('traning')->whereDate('date',$request->click_date);
	$html = '';
	$html .= '  <div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0 model_training">View  TNI</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <table class="table">
    <thead>
      <tr>
        <th>Traning Name</th>
        <th>Date</th>
        <th>Desc</th>
      </tr>
    </thead>
    <tbody>';
	foreach ($get_details->get() as $key => $get_detailss) {

     $html .= ' <tr>
        <td>'.$get_detailss->training_name.'</td>
        <td>'.$get_detailss->date.'</td>
        <td>'.$get_detailss->desc.'</td>
      </tr>';
      }
     
    $html .= '</tbody>
      </table>';


  if($get_details->count() > 0){

	return response()->json(['status' => 200, 'view_training' => $html ]);

}else{

	$addhtml = '';
	$addhtml .= '<div class="modal-content">
      <div class="modal-header">
           <h5 class="modal-title mt-0 model_training">Add New TNI</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body ">
       <div class="row">	

        <div class="col-md-6">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Date
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <input type="date" class="form-control" value="'.$request->click_date.'" id="click_date" readonly=""> 
            
           </div>
         </div>
       </div>

  
              <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Traning Name<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
                <input type="text" class="form-control" id="training_name"> 
             <div id="training_name_error"></div>
           </div>
         </div>
       </div>
     </div> 
     <input type="hidden" id="training_id">
            <div class="row">
     <div class="col-md-6">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Description
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <textarea class="form-control" id="training_desc"></textarea> 
             <div id="training_desc_error"></div>
           </div>
         </div>
       </div>
       </div>  	
      </div>
      <div class="modal-footer">
      	<div class="col-sm-12 text-right">
      		<button  onclick="add_training()" class="btn btn-primary">Save</button>
      		<button class="btn btn-default">Cancel</button>
      	</div>
      </div>
    </div>';

	return response()->json(['status' => 203, 'addtraning' => $addhtml]);

}

		
	}



 


}