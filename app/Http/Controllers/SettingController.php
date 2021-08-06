<?php

namespace App\Http\Controllers;
namespace Illuminate\Support\Facades;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


//use Illuminate\Support\Facades\Auth;
use DB;
use Session;
//use Input;
use Mail;
use URL;
use Hash;
use Auth;
use Validator;
use App\Main_users;
use App\Mail\sendEmail;
use Carbon\Carbon;
use File;


class SettingController extends Controller
{

	public function file_manager(){
   $project_id = [];
    $user_id =  Auth::guard('main_users')->user()->id;
    $role =  Auth::guard('main_users')->user()->emprole;
    $get_Project = DB::table('tm_project_employees')->where('emp_id',$user_id)->get();
   foreach ($get_Project as $key => $get_Projects) {
    $project_id[] = $get_Projects->project_id;
   }


		$file_manager = DB::table('tm_folder');
     if($role !=1){
      $file_manager->whereIn('project_id',$project_id);
     }

   $file_manager =  $file_manager->get();

		return view('mainSetting.create_view_folder',['folder_list' => $file_manager]);
	}
    
    function create_folder(Request $request){


$user_id =  Auth::guard('main_users')->user()->id;

 $arr = array(

'folder_name' => $request->folder_name,
'created_by' => $user_id,
'create_at' => date('Y-m-d h:i:s'),

 );

 $inst = DB::table('tm_folder')->insert($arr);
 	return response()->json(['status' => 200, 'msg' => 'Successfully Added']);


}

public function rename_folder(Request $request){

$update = DB::table('tm_folder')->where('id',$request->folder_id)->update(['folder_name'=>$request->content]);
	return response()->json(['status' => 200, 'msg' => 'Successfully Rename']);
}

public  function view_file($folder_id){

	return view('mainSetting.view_files',['folder_id' => $folder_id]);
}

function all_files(Request $request){

$get_all_files = DB::table('tm_folder_uploads')->where('folder_id',$request->folder_id)->get();

$html = '';
$i = 1;
foreach ($get_all_files as $key => $value) {
$url = URL::to('/').$value->file_name;

$file_name = str_replace('/uploads/attach/files/', '', $value->file_name);

$html .=' <tr>
                                                    <td width="6%">'.$i++.'</td>
                                                    <td>'.$file_name.'</td>
                                                    <td width="6%">
                                                    <a href='.$url.' download>
                                                        <i class="mdi mdi-download text-blue"
                                                                data-toggle="tooltip"
                                                                title="Download"></i></a>
                                                       <a href="javascript:void(0)" onclick="delete_file(this,'.$value->id.')">         
                                                        <i class="mdi mdi-delete text-danger" data-toggle="tooltip" title="Delete"></i></a>
                                                    </td>
                                                </tr>';

}

return response()->json(['status' => 200, 'all_files' => $html]);
}


function forms(){

    return view('mainSetting.form');

}

public function all_forms(Request $request){

  $get_all_files = DB::table('tm_forms')->get();

$html = '';
$i = 1;
foreach ($get_all_files as $key => $value) {
$url = URL::to('/').$value->form_files;

$file_name = str_replace('/uploads/attach/files/', '', $value->form_files);

$html .=' <tr>
                                                    <td width="6%">'.$i++.'</td>
                                                    <td>'.$file_name.'</td>
                                                    <td width="6%">
                                                    <a href='.$url.' download>
                                                        <i class="mdi mdi-download text-blue"
                                                                data-toggle="tooltip"
                                                                title="Download"></i></a>
                                                       <a href="javascript:void(0)" onclick="delete_file(this,'.$value->id.')">         
                                                        <i class="mdi mdi-delete text-danger" data-toggle="tooltip" title="Delete"></i></a>
                                                    </td>
                                                </tr>';

}

return response()->json(['status' => 200, 'all_files' => $html]);

}

public function delete_files(Request $request){

	$del = DB::table('tm_folder_uploads')->where('id',$request->file_id);

   File::delete(public_path().$del->first()->file_name);

  $del->delete();


	return response()->json(['status' => 200, 'msg' => 'Successfully Deleted']);
}

function upload_file_folder_withoud_project(Request $request){



$user_id =  Auth::guard('main_users')->user()->id;

 $get_folder = DB::table('tm_folder')->where('id',$request->folder_id)->first();
 if(isset($get_folder->project_id) && !empty($get_folder->project_id)){
$project_id = $get_folder->project_id;
 }else{

$project_id = null;
 }

         if($request->hasFile('images')) {

          
           foreach($request->file('images') as $file){

           $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;

           $file->move(public_path().'/uploads/attach/files/', $name);

           $filename = '/uploads/attach/files/'. $name;

           $arr = array(


'project_id' => $project_id,
'folder_id' => $request->folder_id,
'file_name' => $filename,
'created_by' => $user_id,
'created_at' => date('Y-m-d h:i:d'),
           );

    $insert = DB::table('tm_folder_uploads')->insert($arr);

       }

        }

          return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);


}

function upload_file_form(Request $request){


$user_id =  Auth::guard('main_users')->user()->id;


         if($request->hasFile('images')) {

          
           foreach($request->file('images') as $file){

           $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;

           $file->move(public_path().'/uploads/attach/files/', $name);

           $filename = '/uploads/attach/files/'. $name;

           $arr = array(


'form_files' => $filename,
'created_by' => $user_id,
'created_at' => date('Y-m-d h:i:d'),
           );

    $insert = DB::table('tm_forms')->insert($arr);

       }

        }

          return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);


}


public function show_folder(Request $request){

     $project_id = [];
    $user_id =  Auth::guard('main_users')->user()->id;
    $role =  Auth::guard('main_users')->user()->emprole;
    $get_Project = DB::table('tm_project_employees')->where('emp_id',$user_id)->get();
   foreach ($get_Project as $key => $get_Projects) {
    $project_id[] = $get_Projects->project_id;
   }


    $folder = DB::table('tm_folder');
    

     if($request->type !='all'){

  $folder->join('tm_projects','tm_folder.project_id','=','tm_projects.id')->where('tm_projects.project_status','=',$request->type);
}

 if($role !=1){
      $folder->whereIn('tm_folder.project_id',$project_id);
     }

   $folder =  $folder->select('tm_folder.*')->get();

//   $folder = DB::table('tm_folder');

// if($request->type !='all'){

//   $folder->join('tm_projects','tm_folder.project_id','=','tm_projects.id')->where('tm_projects.project_status','=',$request->type);
// }

//   $folder = $folder->select('tm_folder.*')->get();

  $html = '';
  foreach ($folder as $key => $folder_lists) {
   $html .='  <div class="col text-center">

                          <span ondblclick="doubleclick(this,'.$folder_lists->id.')" ><i class="fa fa-folder-open font-100 text-warning"></i></span>

                            <span class="display-block"  onclick="listenForDoubleClick(this);" onblur="save_content(this,'.$folder_lists->id.')">'.$folder_lists->folder_name.'</span>

                                        </div>';
  }

   return response()->json(['status' => 200, 'show_folder' => $html]);




}


function delete_form(Request $request){

  
  $del = DB::table('tm_forms')->where('id',$request->file_id);

   File::delete(public_path().$del->first()->form_files);

  $del->delete();


  return response()->json(['status' => 200, 'msg' => 'Successfully Deleted']);

}

function letter_managment(){

  $latter_list = DB::table('latter_management')->get();

    return view('mainSetting.letter_managment',['latter_list' =>$latter_list]);
}

function add_letter(){

    return view('mainSetting.add_letter');
}
function edit_latter($id){

  $edit_latter = DB::table('latter_management')->where('id',$id)->first();

    return view('mainSetting.edit_latter',['edit_latter' => $edit_latter,'latter_id' => $id]);
}



function save_letter(Request $request){

   $user_id =  Auth::guard('main_users')->user()->id;

 $arr = array(
  'latter_name' => $request->letter_name,
  'latter_type' => $request->letter_type,
  'letter' => $request->letter,
  'is_active' => 1,
  'created_by' => $user_id,
  'updated_by' => $user_id,
  'created_at' => date('Y-m-d h:i:s'),
  'updated_at' => date('Y-m-d h:i:s'),

 );

 if(isset($request->latter_id)){

   DB::table('latter_management')->where('id',$request->latter_id)->update($arr);
  return response()->json(['status' => 200, 'msg' => 'successfully Updated']);


 }else{

   DB::table('latter_management')->insert($arr);
  return response()->json(['status' => 200, 'msg' => 'successfully Added']);


 }


}

function quility_master(){

  return view('mainSetting.qulity_master');
}


function checklist_master(){

          $check_list = DB::table('checklist_master')->join('main_departments','main_departments.id','=','checklist_master.deportment_id')->join('main_users','main_users.id','=','checklist_master.hod_user_id')->select('checklist_master.*','main_departments.deptname','main_users.userfullname')->get();
  
    return view('mainSetting.checklist_master',['check_list' => $check_list]);
}

function delete_checklist($id){
 DB::table('checklist_master')->where('id',$id)->delete();
  return redirect()->back();
}


function get_checklist(Request $request){


    $checklist  = DB::table('checklist_master')->where('id',$request->checklist_id)->first();
    return response()->json(['status' => 200, 'msg' => 'successfully Updated','checklist' =>  $checklist]);

}
function bill_master(){

  $bill = DB::table('tm_bill_master')->get();

  return view('mainSetting.bill_master',['bill' => $bill]);
}

function add_bill_master(Request $request){
   $user_id =  Auth::guard('main_users')->user()->id;

  $arr = array(
       'bill_name' => $request->billname,
        'desc' => $request->desc,
         'created_by' => $user_id ,
          'created_at' => date('Y-m-d h:i:s'),
      
    );

  if(isset($request->bill_id)){
   
     DB::table('tm_bill_master')->where('id',$request->bill_id)->update($arr);
    return response()->json(['status' => 200, 'msg' => 'successfully Updated']);

  }else{

    DB::table('tm_bill_master')->insert($arr);
    return response()->json(['status' => 200, 'msg' => 'successfully Added']);

  }

  

}

function delete_bill_master($id){
  DB::table('tm_bill_master')->where('id',$id)->delete();
  return redirect()->back();
}

function get_hod_list(Request $request){
  $hod_list = DB::table('main_users')->where('emprole',30)->where('department_id',$request->dept_id)->get();

  $html = '';
  $html .= '<option value=""> Select Option</option>';
  if(!empty($hod_list)){
  foreach ($hod_list as $key => $hod_lists) {
   $html .= '<option value="'.$hod_lists->id.'">'.$hod_lists->userfullname.'</option>';
 }
  }else{
    $html .= '<option value=""> No Result </option>';
  }


  return response()->json(['status' => 200, 'msg' => 'successfully Added','hod_list' => $html]);
}

function add_checklist_master(Request $request){
    $user_id =  Auth::guard('main_users')->user()->id;

 $arr = array(
  'check_list_name' => $request->checklist,
  'deportment_id' => $request->deportment,
  'hod_user_id' => $request->hod,
  'desc' => $request->desc,
  'created_by' => $user_id,
  'created_at' => date('Y-m-d h:i:s')

 );


if(isset($request->checklist_id)){


  DB::table('checklist_master')->where('id',$request->checklist_id)->update($arr);
  return response()->json(['status' => 200, 'msg' => 'successfully updated']);

}else{

  DB::table('checklist_master')->insert($arr);

  return response()->json(['status' => 200, 'msg' => 'successfully Added']);
}

}

function announcement(){


  $announcement_master = DB::table('announcement_master')->where('status',1)->get();

  return view('mainSetting.announcement',['list' => $announcement_master]);

}

function delete_annoucement_master($id){
  DB::table('announcement_master')->where('id',$id)->delete();
  return redirect()->back();
}

function add_ann_master(Request $request){

  $user_id =  Auth::guard('main_users')->user()->id;

  $array = array(
  'title' => $request->billname,
  'desc' => $request->desc,
  'created_by' => $user_id,
  'created_at' => date('Y-m-d h:i:s'),
  );

  if(isset($request->bill_id)){

    DB::table('announcement_master')->where('id',$request->bill_id)->update($array);
    return response()->json(['status' => 203, 'msg' => 'successfully update']);

  }else{

    
    DB::table('announcement_master')->insert($array);
    return response()->json(['status' => 200, 'msg' => 'successfully Added']);

  }


}


}