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


class MenuController extends Controller
{

	

	public function menulist_mngmnt(){

		$menulist = DB::table('site_menu')->where('menu_title','!=','menu')->get();

		
		return view('menu.menu_list',['menulist' => $menulist]);

	}

	public function menu_mngmnt(){

		return view('menu.add_menu');
	}

	public function insertmenu_mngmnt(Request $request){


        $validator = Validator::make($request->all(), [
            'menu_title' => 'required|unique:site_menu|max:255',
            'icons' => 'required',
            'status' =>  'required',
           

        ]);

        if ($validator->fails()) {
            return redirect('/menuManagement')
                        ->withErrors($validator)
                        ->withInput();
        }

        $arra = array(
        	'menu_title' => $request->menu_title,
        	'icon' => $request->icons,
        	'parent_menu_id' => $request->parentid??0,
        	'url' => $request->url,
        	'sort' => $request->sort,
        	
        	'is_active' => $request->status,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),

        );
       
		
		$inst = DB::table('site_menu')->insert($arra);
		if($inst){

			 return redirect('/menuManagement')->with('message','Succefully Added');

		}else{

			 return redirect('/menuManagement')->with('message','Succefully Added');

		}

	}


	public function menulist_delete($id){


		$del = DB::table('site_menu')->where('id',$id)->delete();
		if($del){

			 return redirect('/menulist')->with('message','Delete Succefully ');

		}else{

			 return redirect('/menulist')->with('message',' Not Succefully');

		}

	}

	public function menulist_edit($id){

		$editmenu = DB::table('site_menu')->where('id',$id)->first();

		return view('menu.add_menu',['editmenu' => $editmenu]);

	}

	public function menulist_update(Request $request){

		$edit_id = $request->edit_menu_id;

	       $validator = Validator::make($request->all(), [
            'menu_title' => 'required',
            'icons' => 'required',
            'status' =>  'required',
           

        ]);

        if ($validator->fails()) {
            return redirect('/menuManagement')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->fails()) {
            return redirect('/menuManagement')
                        ->withErrors($validator)
                        ->withInput();
        }

        $arra = array(
        	'menu_title' => $request->menu_title,
        	'icon' => $request->icons,
        	'parent_menu_id' => $request->parentid??0,
        	'sort' => $request->sort,
        	'url' => $request->url,
        	'role_id' => $request->role,
        	'is_active' => $request->status,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),

        );

		$update = DB::table('site_menu')->where('id',$edit_id)->update($arra);
		if($update){

			 return redirect('/editmunu/'.$edit_id)->with('message','Updated Succefully ');

		}else{

			 return redirect('/editmunu/'.$edit_id)->with('message',' Not Succefully');

		}



	}

	public function changestatus(Request $request){

		//return  $request->all();

		if($request->menustaus ==1){

			$st = 2;
			$msg = 'InActive Succefully';

		}else{

			$st = 1;
			$msg = 'Active Succefully';

		}

		if($request->table == 'main_users'){

			$sttaustable = 'isactive';

		}else{

			$sttaustable = 'is_active';

		}

		$update = DB::table($request->table)->where('id',$request->menuid)->update([$sttaustable => $st]);

			if($update){

				return response()->json(['status' => 202, 'msg' => $msg]);

		}else{

				return response()->json(['status' => 201, 'msg' => 'Not Update']);

		}


	

	}

	public function myprofile($id = ''){


		if(isset($id) && !empty($id)){

			$userId = $id;

		}else{

			$userId = Auth::guard('main_users')->user()->id??'';

		}

	  	$currentuserId = Auth::guard('main_users')->user()->id??0;

		  

		  $info = Main_users::
		  leftJoin('grc_empsalarydetails','main_users.id','=','grc_empsalarydetails.user_id')
		  ->leftJoin('grc_emppersonaldetails','main_users.id','=','grc_emppersonaldetails.user_id')
		  ->leftJoin('grc_empcommunicationdetails as addressD','main_users.id','=','addressD.user_id')
		  ->leftJoin('grc_empvisadetails','main_users.id','=','grc_empvisadetails.user_id')
		  ->leftJoin('main_prefix','main_users.prefix','=','main_prefix.id')
		  ->leftJoin('main_mode_emploment','main_users.modeofentry','=','main_mode_emploment.id')
		  ->leftJoin('main_roles','main_users.emprole','=','main_roles.id')
		  ->leftJoin('main_businessunits','main_users.bussinessunit','=','main_businessunits.id')
		    ->leftJoin('main_departments','main_users.department_id','=','main_departments.id')

		      ->leftjoin('main_users as users','main_users.id','=','users.reporting_manager')
		       ->leftJoin('main_jobtitles','main_users.jobtitle_id','=','main_jobtitles.id')
		        ->leftJoin('main_positions','main_users.position_id','=','main_positions.id')

		      ->leftJoin('main_countries','addressD.perm_country','=','main_countries.id')
                ->leftJoin('alm_states','addressD.perm_state','=','alm_states.id')
                ->leftJoin('alm_cities','addressD.perm_city','=','alm_cities.id')


		          ->leftJoin('main_currency','grc_empsalarydetails.currency_id','=','main_currency.id')
		            ->leftJoin('main_gender','grc_emppersonaldetails.genderid','=','main_gender.id')
		             ->leftJoin('main_maritalstatus','grc_emppersonaldetails.maritalstatusid','=','main_maritalstatus.id')
		              ->leftJoin('main_nationality','grc_emppersonaldetails.nationalityid','=','main_nationality.id')




		  ->leftJoin('main_employmentstatus','main_users.employee_status','=','main_employmentstatus.id')
            ->leftJoin('total_leave_list','main_users.id','=','total_leave_list.user_id')
		  ->where('main_users.id',$userId)->where('main_users.isactive',1)

		  ->select('main_users.*','main_prefix.prefix as prefixname','main_mode_emploment.name as modename','main_roles.rolename','main_businessunits.unitname','main_departments.deptname','users.userfullname as reportingmng','main_jobtitles.jobtitlename','main_positions.positionname','main_employmentstatus.workcode','total_leave_list.total_year_leave','total_leave_list.used_leave','total_leave_list.month_leave','total_leave_list.unpaid_leave','grc_empsalarydetails.salarytype','grc_empsalarydetails.salary','grc_empsalarydetails.ifsc','grc_empsalarydetails.bankname','grc_empsalarydetails.accountholder_name','grc_empsalarydetails.accountnumber','grc_empsalarydetails.account_type','grc_empsalarydetails.project_commission','main_currency.currencyname','grc_emppersonaldetails.ethnic_code','grc_emppersonaldetails.race_code','grc_emppersonaldetails.dob','grc_emppersonaldetails.blood_group','main_gender.gendername','main_maritalstatus.maritalstatusname','main_nationality.nationalitycode','addressD.personalemail','addressD.personal_streetaddress','addressD.perm_pincode','addressD.current_streetaddress','addressD.current_country','addressD.current_state','addressD.current_city','addressD.current_pincode','addressD.emergency_number','addressD.emergency_name','addressD.emergency_email','addressD.perm_country','addressD.perm_state','addressD.perm_city','addressD.emergentcy_address','main_countries.country','alm_states.name as statename','alm_cities.name as cityname')->first();

		// dd($info);

		  if(isset($info)){

		  	$info->experiance = DB::table('grc_empexperiancedetails')->where('user_id',  $userId)->get();

		  }

		   if(isset($info)){

		  	$info->education = DB::table('grc_empeducationdetails')->leftJoin('main_education_list','grc_empeducationdetails.education_level','=','main_education_list.id')->leftJoin('main_course_list','grc_empeducationdetails.course','=','main_course_list.id')->where('user_id',  $userId)->select('grc_empeducationdetails.*','main_education_list.name as eduname','main_course_list.name as coursename')->get();

		  }

		   if(isset($info)){

		  	$info->training = DB::table('main_training')->where('user_id',  $userId)->get();

		  }

		    if(isset($info)){

		  	$info->assets = DB::table('grc_assets')->where('user_id',  $userId)->get();

		  }

		    if(isset($info)){

		  	$info->visa = DB::table('grc_empvisadetails')->where('user_id',  $userId)->where('status',1)->get();

		  }

// 		  if(isset($info)){

// 		  $info->leave = DB::table('grc_employeeleaves')
// 		  ->where('grc_employeeleaves.status',1)->where('grc_employeeleaves.user_id',$userId)
// 		  ->select(DB::raw("grc_employeeleaves.*","total_leave_list.*","SUM(grc_employeeleaves.leave_type) as leavetotal"))
// 		  ->groupBy('grc_employeeleaves.leave_mode')->get();

// 		}

		 if(isset($info)){

		  $info->holiday = DB::table('main_holidaydates')->leftjoin('main_groups','main_holidaydates.groupid','=','main_groups.id')
		  ->where('main_holidaydates.isactive',1)
		  ->select('main_holidaydates.*','main_groups.group_name')->get();
		 

		}

		return view('admin.profile',['info' =>  $info,'userid' => $userId,'currentuser' => $currentuserId]);

	}

		public function getControllerAction()
	{
		$controllers = array();
		// foreach (glob(app_path() . '/Http/Controllers/*Controller.php') as $controller) {
		// 	$className = 'App\\Http\\Controllers\\' . basename($controller, '.php');
		// 	$controllers[$className] = [];
		// 	$methods = (new \ReflectionClass($className))->getMethods(\ReflectionMethod::IS_PUBLIC);
		// 	foreach ($methods as $method) {
		// 		// if (\Phalcon\Text::endsWith($method->name, 'Action')) {
		// 		$controllers[$className][] = $method->name;
		// 		// }
		// 	}
		// }
		//dd(base_path());
		foreach(file(base_path()."/routes/web.php") as $line) {
			if(Str::contains($line,'@')){
				$chunks = explode(',',$line);
				// $chunks[1] = trim($chunks[1]);
				// $actions = substr($chunks[1],0,-2);
				// $actions = trim($actions,"'");
				// $actions = trim($actions,'"');
				// $chunks = explode('@',$actions);
				array_push($controllers,$chunks);
			}
		}
		sort($controllers);
		echo '<pre style="background:black; color:#56cf5b;">';
		print_r($controllers);
	}
    
}
