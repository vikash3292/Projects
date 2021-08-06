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
use PermissionHelper;
use App\Department;
use Validator;

class DepartmentController extends Controller
{
    //

    public function mainsetting(){

         $mainsetting = DB::table('main_settings')->where('id',1)->where('isactive', 1)->first();


         return view('mainSetting.mainSetting',['mainsetting' => $mainsetting]);

    }

    public function updatecompany(Request $request){

        $userid = Auth::guard('main_users')->user()->id;

        // $validator = Validator::make($request->all(), [
        //       'companylogo' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        //     ]);

        // if($validator->fails()){

        //      return redirect('/mainsetting')->with('message',$validator->messages()->first());

        // }

       if($request->hasFile('companylogo')) {
           $file = $request->file('companylogo');

             $original_name = strtolower(trim($file->getClientOriginalName()));
             $name = time().rand(100,999).$original_name;

           //using the array instead of object
           //$image['filePath'] = $name;
           $file->move(public_path().'/uploads/attach/', $name);
           $company['company_logo'] = '/uploads/attach/'. $name;
          // $user->save();
        }
         $company['userid'] = $userid;
         $company['thems'] = $request->themes;
          $company['currentcy'] = $request->currency;
           $company['lang'] = $request->lag;
            $company['emp_code'] = $request->empcode;
             $company['company_name'] = $request->compname;
               $company['bussines_unit'] = $request->bussnissunit;
               $company['admin_name'] = $request->adminname;
                $company['address'] = $request->address;
                 $company['city'] = $request->city;
                  $company['pin_code'] = $request->pincode;
                   $company['provinal_leave'] = $request->txtleave;
                    $company['total_casual_leave'] = $request->txtcasual;
                     $company['created_at'] =  date('Y-m-d H:i:s');
                      $company['updated_at'] = date('Y-m-d H:i:s');
                       $company['isactive'] = 1;

    $mainsetting = DB::table('main_settings')->where('id',1)->where('isactive', 1)->update($company);

    if($mainsetting){

        return redirect('/mainsetting')->with('message', 'Successfully updated');

    }else{

        return redirect('/mainsetting')->with('message', 'Not successfully updated');

    }




    }


/***************************************Start Department Management*****************************************/
  /*Fetch All Department data*/
   public function department_mngmnt()
    {  
        $departmentData = DB::table('main_departments')->where('isactive', 1)->get();
        return view('department.department_management',['departmentData'=>$departmentData]);
    }



    /*Function for Delete Department */
    public function delete_department($id){

        $delete = DB::table('main_departments')->where('id', $id)->delete();
        return back()->with('warning','Department  successfully deleted!');
        return redirect('/departmentManagement');
    }

          function generateTree1($items = array(), $parent_id = 0)
    {
        $pages = array();
        for ($i = 0, $ni = count($items); $i < $ni; $i++) {
            if ($items[$i]['parent_menu_id'] == $parent_id) {


                //$tree[] = '<input type="checkbox" value="'.$items[$i]['id'].'">';
                $page['id'] = $items[$i]['id'];
                $page['title'] = $items[$i]['menu_title'];
                $page['parentid'] = $items[$i]['parent_menu_id'];
                $page['sub'] = $this->generateTree1($items, $items[$i]['id']);
                $pages[] = $page;
            }
        }

        return $pages;
    }



  public function allpermissionmodualroll($roll = 0){



        $arr = array();
        $arr1 = array();
        $sidebar =  DB::table('role_permissions')->where('role_id', '=', $roll)->get();

      

        foreach ($sidebar as $sidebars) {
            $parrentdata = DB::table('site_menu')->where('id', '=', $sidebars->site_menu_id)->first();
            if (!empty($parrentdata)) {
                $subparrentdata = DB::table('site_menu')->where('id', '=', $parrentdata->parent_menu_id)->first();
                if (!empty($subparrentdata)) {
                    $arr[] = $subparrentdata->parent_menu_id;
                }
                //$rol_per->parrentid = $parrentdata->parent_menu_id;
                if ($parrentdata->parent_menu_id != 0 || $sidebars->site_menu_id != 0) {
                    $arr[] = $parrentdata->parent_menu_id;
                    $arr[] = $sidebars->site_menu_id;
                }
                //$arr[] =  $sidebars->site_menu_id??0;
            }
        }
       
        $sidebar1 =  DB::table('role_permissions')->where('role_id', '=', $roll)->get();

        foreach ($sidebar1 as $sidebarsdata) {
            $arr1[] =  $sidebarsdata->permission_id ?? 0;
        }
        
        $items =  DB::table('site_menu')->where('is_active', 1)->get();

        foreach ($items as $object) {
            $arrays[] =  (array) $object;
        }

        $menu = $this->generateTree1($arrays);

       

        return view('permission_module', ['menus' => $menu, 'roll' => $roll, 'arr' =>  $arr, 'arr1' => array_unique($arr1)]);
    }




/*Function For Add Department.*/
public function add_department(Request $request){



    if($request->isMethod('post')) {


            $validator = Validator::make($request->all(), [
              'department_name' => 'required',
               'department_code' => 'required',

            ]);

        if($validator->fails()){

            
             
             return redirect('/departmentManagement/addDepartment')->with('message',$validator->messages()->first());

        }


            $insert_items = DB::table('main_departments')
                    ->insert([
                    	'deptname' => $request->department_name,
                        'deptcode' => $request->department_code,
                        'address1' => $request->description,
                        'isactive' => $request->status
                    ]);
            $request->session()->flash('alert-success', 'Department  successfully added!'); 
            return redirect('/departmentManagement');
       
    }else{
         
        return view('department.department_add'); 
    }
        
}



    /*Function for edit Department details according to Department id.*/
    public function edit_department($id){
      
        $department_detail = DB::table('main_departments')->where('id', $id)->first();
        return view('department.department_edit',['department_detail'=>$department_detail]);
    }

    public function update_department(Request $request) {

        $depart = [  'deptname' => $request->department_name,
                        'deptcode' => $request->department_code,
                        'address1' => $request->description,
                        'isactive' => $request->status,
                    ];

                   


         $did = $request->id;
         $updatedata = Department::where('id','=',$request->id)->update($depart);

         // dd($updatedata);

         if($updatedata){

            
             
                     $request->session()->flash('alert-success', 'Department  successfully updated!');
                     return redirect('/departmentManagement');
  
         }else{

                    $request->session()->flash('warning', 'Not Update');
                     return redirect('/departmentManagement');
  

         }
                
}
/********************End Department Management*******************/



/**************Start Role Management****************/
  /*Fetch All Role data*/
   public function role_mngmnt()
    {       
        $departmentData = DB::table('main_roles')->get();
        return view('role.role_management',['departmentData'=>$departmentData]);
    }



    /*Function for Delete Role */
    public function delete_role($id){
        $delete = DB::table('main_roles')->where('id', $id)->delete();
        return back()->with('warning','Role  successfully deleted!');
        return redirect('/roleManagement');
    }


/*Function For Add Role.*/
public function add_role(Request $request){

    if($request->isMethod('post')) {


        $validator = Validator::make($request->all(), [
              'rolename' => 'required',
             

            ]);

        if($validator->fails()){

            
             
             return redirect('roleManagement/addRole')->with('alert-success',$validator->messages()->first());

        }

            $insert_items = DB::table('main_roles')
                    ->insert([
                    	'rolename' => $request->rolename,
                        'roletype' => $request->roletype,
                        'roledescription' => $request->description,
                        'isactive' => $request->status
                    ]);
            $request->session()->flash('alert-success', 'Role  successfully added!'); 
            return redirect('/roleManagement');
    }else{
        return view('role.role_add'); 
    }
        
}

    /*Function for edit Role details according to Role id.*/
    public function edit_role($id){
      
        $department_detail = DB::table('main_roles')->where('id', $id)->first();
        return view('role.role_edit',['department_detail'=>$department_detail]);
    }

    public function update_role(REQUEST $request) {
    	if($request->isMethod('post')) {

             $validator = Validator::make($request->all(), [
              'rolename' => 'required',
             

            ]);

        if($validator->fails()){

            
             
             return redirect('roleManagement/editRole/'.$request->id)->with('alert-success',$validator->messages()->first());

        }

         $id = $request->id;
         $update = DB::table('main_roles')
            ->where('id',$id)
            ->update([  'rolename' => $request->rolename,
                        'roletype' => $request->roletype,
                        'roledescription' => $request->description,
                        'isactive' => $request->status
                    ]);   
                   $request->session()->flash('alert-success', 'Role  successfully updated!');
                  return redirect('/roleManagement');
      }else{
         
         return redirect('/roleManagement');
    }
}


}//endClass
