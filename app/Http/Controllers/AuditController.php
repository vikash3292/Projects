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



class AuditController  extends Controller

{

   public function __construct()
    {
        date_default_timezone_set('Asia/Calcutta'); 
    }


  	function audit(){

  $audit = DB::table('tm_audit')->join('main_users','tm_audit.user_id','=','main_users.id')->select('tm_audit.*','main_users.userfullname')->get();

		return view('audit.audit',['audit' => $audit ]);
	}

	function add_audit(){

		return view('audit.add_audit');
	}

	function view_audit(){

		return view('audit.view_audit');
	}

	function add_audit_data(Request $request){

			$userid = Auth::guard('main_users')->user()->id;


		$array = array(
			'aduit_name' => $request->name,
			'aduit_status' => $request->audit_ststus,
			'check_list' => $request->check_list_ststus,
			'mng_remark' => $request->remarks,
			'user_id' => $request->user_id,
			'compaine_status' => $request->Compilance_status,
			'qms' => $request->qms,
			'created_by' => $userid,
		'updated_by' =>$userid,
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s'),


		);

		if(isset($request->audit_id)){

			 $last_id = DB::table('tm_audit')->where('id')->update($array);

  		 return response()->json(['status' => 200, 'msg' => 'Added successfully','audit_last_id' =>  $request->audit_id]);

		}else{

			 $last_id = DB::table('tm_audit')->insertGetId($array);

  		 return response()->json(['status' => 200, 'msg' => 'Added successfully','audit_last_id' =>  $last_id]);

		}

		
	}

	function edit_audit($id){

			$userid = Auth::guard('main_users')->user()->id;

		$check_master = DB::table('checklist_master')->get();

      $hodCount =  DB::table('audi_check_data')->where('audit_id',$id)->where('hod_user_id',$userid)->count();
		foreach ($check_master as $key => $check_masters) {
		$check_masters->check_hod = DB::table('audi_check_data')->where('audit_id',$id)->where('chceck_list_id',$check_masters->id)->where('hod_user_id',$userid)->count();

		  $check_masters->get_data = DB::table('audi_check_data')->where('audit_id',$id)->where('chceck_list_id',$check_masters->id)->first();
		}

    

    $edit_audi = DB::table('tm_audit')->where('id',$id)->first();

    return view('audit.edit_audit',['edit_audit' => $edit_audi,'audit_id' => $id,'checklist_master' => $check_master,'show_hod' => $hodCount ]);
	}

	function delete_audit($id){
		DB::table('tm_audit')->where('id',$id)->delete();
		return redirect()->back();
	}


function save_check_list_data(Request $request){

		$userid = Auth::guard('main_users')->user()->id;


	foreach ($request->checklist_id as $key => $checklist) {

		DB::table('audi_check_data')->where('audit_id',$request->audi_id)->where('chceck_list_id',$checklist)->delete();

		$array = array(
			'audit_id' => $request->audi_id,
			'chceck_list_id' => $checklist,
			'user_id' => $request->responsible_user_id[$key],
			'hod_user_id' => $request->hod_id[$key],
			'msq' => $request->qms[$key],
			'msq_hod' => $request->msq_hod[$key]??'',
			'complice_status' => $request->Compilance_status[$key],
			'complice_status_hod' => $request->complice_status_hod[$key]??'',
			'created_by' => $userid,
			'updated_by' => $userid,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),

		);

		DB::table('audi_check_data')->insert($array);



	}

	return response()->json(['status' => 200, 'msg' => 'Added successfully']);
}



}

?>