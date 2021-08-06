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




class PermissionController extends Controller
{
   	public function ajexinsertpermissioncontrollerdelete(Request $request)
	{
		$data = $request->all();
		$getpermision =  DB::table('role_permissions')->where('role_id', $data['roll'])->where('permission_id', $data['permisionid'])->delete();
		if ($getpermision) {
			return response()->json(['status' => 200, 'msg' => 'Successfully Delete Permission']);
		} else {
			return response()->json(['status' => 201, 'msg' => 'Controller Action Not Define']);
		}
	}

    	public function deleletepermission(Request $request)
	{
		$data = $request->all();
		$deldata = json_decode(stripslashes($data['deldata']));
		$cnt = count($deldata);
		for ($i = 0; $i < $cnt; $i++) {
			$getpermision =  DB::table('role_permissions')->where('role_id', $data['roll'])->where('permission_id', $deldata[$i])->delete();
		}

		if ($getpermision) {
			return response()->json(['status' => 200, 'msg' => 'Successfully Delete Permission']);
		} else {
			return response()->json(['status' => 201, 'msg' => 'Controller Action Not Define']);
		}
	}



	public function ajexinsertpermission(Request $request)
	{
		$data = $request->all();
		$arrdata = json_decode(stripslashes($data['arrdata']));
		// $cnt = count($arrdata);
		if (!empty($arrdata)) {
			$getpermision =  DB::table('module_permission');
			$getpermision->whereIn('permission_id', $arrdata);
			$vdata = $getpermision->get();
			$permissiondata[] = $vdata;
			//$getpermision->where('sidebar_id','=',$arrdata[$j]);
		}

		if (!empty($permissiondata)) {
			for ($i = 0; $i < count($permissiondata); $i++) {
				for ($k = 0; $k < count($permissiondata[$i]); $k++) {
					$arr1 = array(
						'role_id' => $data['roll'],
						'permission_id' => $permissiondata[$i][$k]->permission_id,
						
						'site_menu_id' => $permissiondata[$i][$k]->sidebar_id,
					);
					DB::table('role_permissions')->where('role_id', '=', $data['roll'])->where('permission_id', '=', $permissiondata[$i][$k]->permission_id)->where('site_menu_id', '=', $permissiondata[$i][$k]->sidebar_id)->delete();
					$res = DB::table('role_permissions')->insert($arr1);
				}
			}
		}

		if ($res) {
			return response()->json(['status' => 200, 'msg' => 'Successfully Inserted Permission']);
		} else {
			return response()->json(['status' => 201, 'msg' => 'Controller Action Not Define']);
		}
	}

		public function ajexinsertpermissioncontroller(Request $request)
	{
		$data = $request->all();
		$getpermision =  DB::table('module_permission');
		$getpermision->where('permission_id', $data['permisionid']);
		$vdata1 = $getpermision->first();
		$arr11 = array(
			'role_id' => $data['roll'],
			'permission_id' => $vdata1->permission_id,
			
			'site_menu_id' => $vdata1->sidebar_id,

		);



		DB::table('role_permissions')->where('role_id', '=', $data['roll'])->where('permission_id', '=', $vdata1->permission_id)->where('site_menu_id', '=', $vdata1->sidebar_id)->delete();

		$res = DB::table('role_permissions')->insert($arr11);
		if ($res) {
			return response()->json(['status' => 200, 'msg' => 'Successfully Inserted Permission']);
		} else {
			return response()->json(['status' => 201, 'msg' => 'Controller Action Not Define']);
		}
	}






}
