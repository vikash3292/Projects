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

use PDF;




class AccountModuleController extends Controller

{
 function client_management(){


 	return view('accountmodule.client_mng');
 }

 public function add_client(){

 	return view('accountmodule.add_client');

 }


    public function get_account_client(Request $request){

        

         $userid = Auth::guard('main_users')->user()->id;

        

        $html = '';

        

        $getAccount = DB::table('main_lead_list')->leftjoin('main_users','main_lead_list.created_by','=','main_users.id')->where('main_lead_list.created_by',$userid)->where('lead_status',5)->select('main_lead_list.*','main_users.userfullname')->get();

        

        $i = 1;

        if(isset($getAccount)){

        foreach($getAccount as $getAccounts){

            

            $edit = URL::to('edit-client').'/'.$getAccounts->id;

             $view = URL::to('view-account').'/'.$getAccounts->id;

            

        $html .='      <tr>

                                                <td>'.$i++.'</td>

                                                <td>'.$getAccounts->company.'</td>

                                                 <td>'.$getAccounts->fname.' '.$getAccounts->lname.'</td>

                                                <td>'.$getAccounts->website.'</td>

                                                <td>'.$getAccounts->phone.'</td>

                                                <td>'.$getAccounts->userfullname.'</td>

                                                <td title="View">

                                                   

                                                    <a href="'.$edit.'"> <i class="mdi mdi-pen text-warning"

                                                            title="Edit"></i></a>

                                                            

                                                    

                                                </td>

                                            </tr>';

        }

        }

        if(count($getAccount) == 0){

            

             $html .='      <tr>

                                                <td colspan="6">No Record Found</td>

                                               

                                            </tr>';

            

        }

        

        if($getAccount){

            

            	return response()->json(['status' => 200, 'msg' => 'successfully', 'account' => $html]);

            

        }else{

            

            	return response()->json(['status' => 202, 'msg' => 'Not successfully']);

            

        }

        

    }

    

      function delete_account_data(Request $request){

           // dd($request->all());

            $get = DB::table('main_lead_list')->where('id',$request->account_lead)->delete();

            DB::table('addition_info')->where('lead_id',$request->account_lead)->delete();

            DB::table('bill_address')->where('lead_id',$request->account_lead)->delete();

             DB::table('shipping_address')->where('lead_id',$request->account_lead)->delete();

             

             return response()->json(['status' => 200, 'msg' => 'successfully Delected']);

            

        } 

function edit_client($id){

	$account_edit = DB::table('main_lead_list')->where('id',$id)->first();

	

	return view('accountmodule.edit_client',['acc_edit' => $account_edit,'client_id' =>$id ]);
}

function edit_account_client(Request $request){
	$arr = array(
     'owner' => $request->lead_ownere,
     'phone' => $request->phone,
     'fname' => $request->fname,
     'company' => $request->company,
     'website' => $request->website,
     'ac_type' => $request->ac_type,
     'street' => $request->address,
     'desc' => $request->desc,
     'lead_status' => 5,

	);

if(isset($request->client_id)){

	DB::table('main_lead_list')->where('id',$request->client_id)->update($arr);
	 	return response()->json(['status' => 200, 'msg' => 'successfully updated']);

}else{

	DB::table('main_lead_list')->insert($arr);
	 	return response()->json(['status' => 200, 'msg' => 'successfully Add']);

}

}


function work_order(){

	$userid = Auth::guard('main_users')->user()->id;
	$getworkorder = DB::table('tm_work_order')->join('main_users','main_users.id','=','tm_work_order.sale_persone')->where('tm_work_order.created_by',$userid)->select('tm_work_order.*','main_users.userfullname')->get();

	return view('accountmodule.work_order',['work_order_list' => $getworkorder]);
}

function add_work_order(){

  $userid = Auth::guard('main_users')->user()->id;
  $scope_data = DB::table('tm_scope')->get();
  $get_org = DB::table('main_lead_list')->where('owner',$userid)->get();

	return view('accountmodule.add_work_order',['get_org' => $get_org,'scope_data' => $scope_data]);

}

function work_order_add(Request $request){
 
  $userid = Auth::guard('main_users')->user()->id;



    if(isset($request->work_id)){


    $arr = array(
         'work_order_name' => $request->work_order_name,
         'work_order_no' => $request->work_order_no,
         'order_date' => $request->work_order_date,
         'work_amt' => $request->work_amt,
         'project_name' => $request->project_name,
         'sale_persone' => $request->sales,
         'status' => $request->status,
         'contact_id' => $request->contact,
         'org_id' => $request->org,
         'stage' => $request->stage,
         'scope_id' => $request->sowchoose,
         'updated_by' => $userid,
        
         'updated_at' => date('Y-m-d h:i:s'),

        );

        DB::table('tm_work_order')->where('id',$request->work_id)->update($arr);
        DB::table('tm_scope')->where('id',$request->sowchoose)->update(['text_msg' => $request->text_file]);
    return response()->json(['status' => 200, 'msg' => 'successfully Updated']);

    }else{


    $arr = array(
         'work_order_name' => $request->work_order_name,
         'work_order_no' => $request->work_order_no,
         'work_amt' => $request->work_amt,
         'project_name' => $request->project_name,
         'sale_persone' => $request->sales,
         'status' => $request->status,
         'scope_id' => $request->sowchoose,
         'contact_id' => $request->contact,
         'org_id' => $request->org,
         'stage' => $request->stage,
         'created_by' => $userid,
         'updated_by' => $userid,
         'created_at' => date('Y-m-d h:i:s'),
         'updated_at' => date('Y-m-d h:i:s'),

        );

        DB::table('tm_work_order')->insert($arr);
        DB::table('tm_scope')->where('id',$request->sowchoose)->update(['text_msg' => $request->text_file]);
    return response()->json(['status' => 200, 'msg' => 'successfully Added']);

    }
	
}

function edit_work_order($id){

  $scope_data = DB::table('tm_scope')->get();

    $edit_work_order = DB::table('tm_work_order')->where('id',$id)->first();
    $single_milestone = DB::table('work_order_milestone')->where('work_order_id',$id)->orderBy('id','DESC')->first();

return view('accountmodule.edit_work_order',['edit_list' => $edit_work_order,'work_id' => $id,'single_milestone' => $single_milestone,'scope_data' => $scope_data ]);
}

function view_work_order($id){


 $milestone = DB::table('work_order_milestone')->where('work_order_id',$id)->get();

    $view_order = DB::table('tm_work_order')->join('main_users','main_users.id','=','tm_work_order.sale_persone')->where('tm_work_order.id',$id)->select('tm_work_order.*','main_users.userfullname')->first();

       $scope_view = DB::table('tm_scope')->join('tm_work_order','tm_work_order.id','=','tm_scope.work_order_id')->join('main_users','main_users.id','=','tm_scope.created_by')->join('main_users as modified','modified.id','=','tm_scope.updated_by')->where('tm_scope.work_order_id',$id)->select('tm_scope.*','main_users.userfullname as created_name','modified.userfullname as modifile_name','tm_work_order.work_order_name')->first();

return view('accountmodule.view_work_order',['view_work' => $view_order,'get_milestone' => $milestone,'work_id' => $id,'scope_view' => $scope_view]);
}

function delete_work_order($id){

DB::table('tm_work_order')->where('id',$id)->delete();
echo "<script>alertify.success('Successfully Delected'); </script>";
return redirect()->back();

}

function send_letter(){

    $user_list = DB::table('main_users')->where('isactive',1)->orderBy('userfullname','ASC')->get();
    $letter_list = DB::table('latter_management')->where('is_active',1)->get();

    return view('accountmodule.add_letter',['user_list' =>$user_list,'letter_list' => $letter_list]);
}

function get_letter(Request $request){

     $letter_list = DB::table('latter_management')->where('id',$request->letter_id)->first();
         return response()->json(['status' => 200, 'letter' => $letter_list->letter]);


}

function send_email(Request $request){

    $user_list = DB::table('main_users')->where('id',$request->users)->first();
     $letter_list = DB::table('latter_management')->where('id',$request->letter)->first();

      $subject = $letter_list->latter_name;
    $from = 'usrivastava@kloudrac.com';
    $fromname = 'no_reply';
    $content = $request->letter_data;
    $sendemail = sendMail($user_list->emailaddress,$subject,$from,$fromname,$content);
    if($sendemail){
   return response()->json(['status' => 200, 'msg' => 'Successfully Send Email']);
    }else{

    	 return response()->json(['status' => 200, 'msg' => 'Not Send Email']);

    }

   

}


function add_milstone_work_order(Request $request){

      $user_id =  Auth::guard('main_users')->user()->id;

    $addArr = array(
      'work_order_id' => $request->work_id,
      'milestone_name' => $request->milestone_name,
      'start_date' => $request->milestone_start_date,
      'end_date' => $request->milestone_end_date,
      'created_by' =>  $user_id,
      'modifed_by' =>  $user_id,
      'created_at' => date('Y-m-d h:i:s'),
      'modifed_at' => date('Y-m-d h:i:s'),
      'color' => $request->milestone_color,
      'description' => $request->milestone_desc,


    );
   if(isset($request->milstone_id)){

    $inst = DB::table('work_order_milestone')->where('id',$request->milstone_id)->update($addArr);
    return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

   }else{

    $inst = DB::table('work_order_milestone')->insert($addArr);
    return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

   }
    

}

function edit_milstone_work_order(Request $request){

        $milestone = DB::table('work_order_milestone')->where('id',$request->milstone_id)->first();

    return response()->json(['status' => 200, 'milstone' => $milestone]);

}

function delete_milstone_work_order(Request $request){

    $del = DB::table('tm_milestone')->where('id',$request->milstone_id)->delete();

    return response()->json(['status' => 200, 'msg' => 'Successfully Deleteed']);


}

function all_milstone_work_order(Request $request){


$get_milestone = DB::table('work_order_milestone')->where('work_order_id',$request->work_id)->orderBy('id','ASC')->get();


$single_milestone = DB::table('work_order_milestone')->where('work_order_id',$request->work_id)->orderBy('id','DESC')->first();


$html = '';
$i = 1;
foreach ($get_milestone as $key => $get_milestones) {
    $html .= '<tr>
    <td>'.$i++.'</td>
    <td>'.$get_milestones->milestone_name.'</td>
    <td>'.$get_milestones->color.'</td>
    <td>'.$get_milestones->start_date.'</td>
    <td>'.$get_milestones->end_date.'</td>
    <td>'.substr($get_milestones->description,0,20).'</td>';


    $html .= '<td>';
  
    

    $html .= '<i  onclick="edit_milstonr('.$get_milestones->id.')" class="mdi mdi-pencil text-warning" data-toggle="tooltip" title="" data-original-title="Edit"></i>';

 if($get_milestones->id == $single_milestone->id){

$html .= '<i onclick="delete_milstonr(this,'.$get_milestones->id.')" class="fa fa-trash font-blue" data-toggle="tooltip" title="" data-original-title="Delete"></i>';

                                                     
    }


    $html .= '</td></tr>';
}


return response()->json(['status' => 200, 'milstone' => $html]);




}


function get_last_work_order(Request $request){


        $milestone = DB::table('work_order_milestone')->where('work_order_id',$request->work_id)->orderBy('id','DESC')->first();
        if(isset($milestone) && !empty($milestone)){

            return response()->json(['status' => 200, 'milstone' => $milestone->end_date]);


        }else{

            return response()->json(['status' => 201, 'milstone' => '']);


        }
        

}

function add_new_project_work_order(Request $request){



     $user_id =  Auth::guard('main_users')->user()->id;

     //    $project_name = DB::table('tm_projects')->where('project_name',$request->project)->count();

     // if($project_name > 0){

     //           return response()->json(['status' => 202, 'msg' => ' Project Allready Exist']);

     //          }


       $project12 = array(

           'project_name' => $request->project,

            'project_status' => $request->project_status,

             'base_project' => $request->base_project,

              'project_category' => $request->category,

               'builder' => $request->builder,
               'location' => $request->location,
               'project_temp_id' => $request->project_temp_id,
               'temp_id' => $request->temp_id,
               'work_order_no' => $request->work_order_no,
               'description' => $request->project,

                'client_id' => $request->project_client,

                'currency_id' => $request->currecy,

                 'project_type' => $request->checkval,

                  'estimated_hrs' => $request->estimated,

                   'start_date' => $request->from_date,

                   'end_date' => $request->to_date,

                   'created_by' => $user_id,

                   'modified_by' => $user_id,

                   'manager_id' => $request->manager,
                   'coordinator' => $request->coordinator,
                   'stage' => $request->stage,

                   'is_active' => 1,

                   'created' => date('Y-m-d h:i:s'),

                   'modified' => date('Y-m-d h:i:s'),

           

           );

       

             $lastinstid = DB::table('tm_projects')->insertGetId($project12);
      
             $lastinstid = DB::getPdo()->lastInsertId();
   
            

           if($lastinstid){

            $get_work_mistone = DB::table('work_order_milestone')->where('work_order_id',$request->work_id)->get();

            foreach ($get_work_mistone as $key => $get_work_mistones) {
                
                $addArr = array(
      'project_id' => $lastinstid,
      'milestone_name' => $get_work_mistones->milestone_name,
      'start_date' => $get_work_mistones->start_date,
      'end_date' => $get_work_mistones->end_date,
      'created_by' =>  $user_id,
      'modifed_by' =>  $user_id,
      'created_at' => date('Y-m-d h:i:s'),
      'modifed_at' => date('Y-m-d h:i:s'),
      'color' => $get_work_mistones->color,
      'description' => $get_work_mistones->description,
    );

                    $inst = DB::table('tm_milestone')->insert($addArr);

            }

               

               $addmanager = array(

                   'project_id' => $lastinstid,

                   'emp_id' => $request->manager,

                   'manager_id' => 1,

                   'created_by' => $user_id,

                   'modified_by' =>  $user_id,

                   'is_active' => 1,

                   'created' => date('Y-m-d h:i:s'),

                   'modified' =>  date('Y-m-d h:i:s'),

                   

                   );

               $folder = array(
              'project_id' => $lastinstid,
              'folder_name' => $request->project,
              'created_by' => $user_id,
              'create_at' => date('Y-m-d h:i:s')

                );

                  DB::table('tm_folder')->insert($folder);

    

          DB::table('tm_project_employees')->insert($addmanager);

          

           $addcreator = array(

                   'project_id' => $lastinstid,

                   'emp_id' => $user_id,

                   'created_by' => $user_id,

                   'modified_by' =>  $user_id,

                   'manager_id' => 2,

                   'is_active' => 1,

                   'created' => date('Y-m-d h:i:s'),

                   'modified' =>  date('Y-m-d h:i:s'),

                   

                   );

                 
                 DB::table('tm_project_employees')->insert($addcreator);
                 DB::table('tm_work_order')->where('id',$request->work_id)->update(['status' => 2]);

                 return response()->json(['status' => 200, 'msg' => 'Successfully add Project','project_id'=>$lastinstid]);

               

           }else{

               

         return response()->json(['status' => 201, 'msg' => 'Not add Project']);

               

           }

        

}

function scope_of_work(){

  $scopelist = DB::table('tm_scope')->join('tm_work_order','tm_work_order.id','=','tm_scope.work_order_id')->join('main_users','main_users.id','=','tm_scope.created_by')->join('main_users as modified','modified.id','=','tm_scope.updated_by')->select('tm_scope.*','main_users.userfullname as created_name','modified.userfullname as modifile_name','tm_work_order.work_order_name')->get();

  return view('accountmodule.scope_of_work',['scope_list' =>$scopelist]);
}

function add_scope(){


     $user_id =  Auth::guard('main_users')->user()->id;

     $work_order = DB::table('tm_work_order')->where('created_by',$user_id)->get();

  return view('accountmodule.add_scope',['work_order' => $work_order]);

}

function insert_scope(Request $request){

//dd($request->all());

   $user_id =  Auth::guard('main_users')->user()->id;

   if(isset($request->scope_id)){

      DB::table('tm_scope')->where('id',$request->scope_id)->update([
  'scope_name' => $request->scope_name,
  'work_order_id' => $request->work_order,
  'org_name' => $request->org_name,
  'contact_no' => $request->content_no,
  'text_msg' => $request->scope_file,
  'updated_by' => $user_id,
 
  'modifiled_at' => date('Y-m-d h:i:s'),
  


  ]);

   }else{

      DB::table('tm_scope')->insert([
  'scope_name' => $request->scope_name,
  'work_order_id' => $request->work_order,
  'org_name' => $request->org_name,
  'contact_no' => $request->content_no,
  'text_msg' => $request->scope_file,
  'created_by' => $user_id,
  'updated_by' => $user_id,
  'created_at' => date('Y-m-d h:i:s'),
  'modifiled_at' => date('Y-m-d h:i:s'),
  


  ]);

   }




         return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

     

}

function view_scope($id){

    $view_scope = DB::table('tm_scope')->join('tm_work_order','tm_work_order.id','=','tm_scope.work_order_id')->join('main_users','main_users.id','=','tm_scope.created_by')->join('main_users as modified','modified.id','=','tm_scope.updated_by')->where('tm_scope.id',$id)->select('tm_scope.*','main_users.userfullname as created_name','modified.userfullname as modifile_name','tm_work_order.work_order_name')->first();


   return view('accountmodule.view_scope',['view_scope' => $view_scope]);


}

function edit_scope($id){
  $user_id =  Auth::guard('main_users')->user()->id;

   $work_order = DB::table('tm_work_order')->where('created_by',$user_id)->get();


    $edit_scope = DB::table('tm_scope')->where('tm_scope.id',$id)->first();
   return view('accountmodule.edit_scope',['edit_scope' => $edit_scope,'work_order' => $work_order,'scope_id' => $id]);


}

function delete_scope($id){

DB::table('tm_scope')->where('id',$id)->delete();
return redirect()->back();

}

function expense(){


 $project_list = [];
  $user_id =  Auth::guard('main_users')->user()->id;
  $role =  Auth::guard('main_users')->user()->emprole;


  if(!empty($_GET['user'])){

      $project_list = DB::table('tm_project_employees')->join('tm_projects','tm_projects.id','=','tm_project_employees.project_id')->where('tm_project_employees.emp_id','=',$_GET['user'])->select('tm_projects.*')->get();

  }
  

  $user_list = DB::table('main_users')->where('isactive',1)->whereNull('extension')->select('id','userfullname')->get();



  $expense_list = DB::table('tm_expenses')->leftjoin('tm_projects','tm_projects.id','=','tm_expenses.project_id')->join('main_users','main_users.id','=','tm_expenses.user_id');
  if($role !=1 && $role !=11){
   $expense_list->where('tm_expenses.user_id',$user_id)->where('tm_expenses.submit_status',2);
  }

 if(!empty($_GET['user'])){
if($_GET['user'] != 1000){
 $expense_list->where('tm_expenses.user_id',$_GET['user']);
}

if($_GET['project'] != 1000){
 $expense_list->where('tm_projects.id',$_GET['project']);
}

 
$expense_list->where(DB::raw("(DATE_FORMAT(tm_expenses.expeses_date,'%Y'))"), "=", $_GET['year']);
$expense_list->where(DB::raw("(DATE_FORMAT(tm_expenses.expeses_date,'%m'))"), "=", $_GET['month']);
 
 }


  $expense_list = $expense_list->select('tm_expenses.*','tm_projects.project_name','main_users.userfullname')->get();
  return view('accountmodule.expenses_list',['userlist' => $user_list,'expense_list' => $expense_list, 'project_list' => $project_list]);


}

function get_user_project(Request $request){

  $role = Auth::guard('main_users')->user()->emprole;
  $project_list = DB::table('tm_project_employees')->join('tm_projects','tm_projects.id','=','tm_project_employees.project_id')->where('tm_project_employees.emp_id','=',$request->user_id)->select('tm_projects.*')->get();

  $html = '';
   $html .= '<option value="">Select Option</option>';
  foreach ($project_list as $key => $project_list) {
   $html .= '<option value='.$project_list->id.'>'.$project_list->project_name.'</option>';
  }
  if( $role ==1 ||  $role == 11)
  {
 $html .= '<option value="1000">All Project</option>';   
  }
   

       return response()->json(['status' => 200, 'project' => $html]);


}

function add_expense(){

    $user_id =  Auth::guard('main_users')->user()->id;


  $project_list = DB::table('tm_project_employees')->join('tm_projects','tm_projects.id','=','tm_project_employees.project_id')->where('tm_project_employees.emp_id','=',$user_id)->select('tm_projects.*')->get();


   return view('accountmodule.add_expenses',['project_list' => $project_list]);


}

function all_trip(Request $request){

  $get_trip = DB::table('tm_trip')->get();

  $html = '';
   $html .= '<option value="">Select Option</option>';
  foreach ($get_trip as $key => $get_trips) {
   $html .= '<option value='.$get_trips->id.'>'.$get_trips->trip.'</option>';
  }

       return response()->json(['status' => 200, 'trip' => $html]);


}

function add_trip(Request $request){

    $user_id =  Auth::guard('main_users')->user()->id;


  $arr = array(
    'trip' => $request->trip_name,
    'from_date' => $request->from_date,
    'to_date' => $request->to_date,
    'desc' => $request->desc,
    'created_by' => $user_id,
    'updated_by' => $user_id,
    'created_at' => date('Y-m-d h:i:s'),
    'updated_at' => date('Y-m-d h:i:s'),


  );

  DB::table('tm_trip')->insert( $arr);

    return response()->json(['status' => 200, 'msg' => 'Successfully Added']);


}

function insert_expeses(Request $request){

      $user_id =  Auth::guard('main_users')->user()->id;



       $filename = array();
      if($request->hasFile('images')) {

          
           foreach($request->file('images') as $file){

           $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;

           $file->move(public_path().'/uploads/attach/files/', $name);

           $filename[] = '/uploads/attach/files/'. $name;

          
        }


          $arr = array(
          'user_id' => $user_id,
          'project_id' => $request->project_list,
          
          'expense_name' => $request->expenses_name,
          'expeses_date' => $request->expenses_date,
          'expenses_amt' => $request->expenses_amt,
          'category_id' => $request->category,
          'Reimbursable_amt' => $request->reim,
          'raimbs_amt' => $request->reimbursable_amt,
          'currency' => $request->currency,
          'advanse' => $request->advance,
          'trip_id' => $request->trip,
          'desc' => $request->desc,
          'upload_reciept' => implode(',',$filename),
          'status' => $request->status,
          'submit_status' => $request->submit_status,
          'created_by' => $user_id,
          'update_by' => $user_id,
          'created_at' => date('Y-m-d h:i:s'),
          'updated_at' => date('Y-m-d h:i:s'),
        );

        }else{

            $arr = array(
          'user_id' => $user_id,
          'project_id' => $request->project_list,
          
          'expense_name' => $request->expenses_name,
          'expeses_date' => $request->expenses_date,
          'expenses_amt' => $request->expenses_amt,
          'category_id' => $request->category,
          'Reimbursable_amt' => $request->reim,
          'raimbs_amt' => $request->reimbursable_amt,
          'currency' => $request->currency,
          'advanse' => $request->advance,
          'trip_id' => $request->trip,
          'desc' => $request->desc,
          
          'status' => $request->status,
          'submit_status' => $request->submit_status,
          'created_by' => $user_id,
          'update_by' => $user_id,
          'created_at' => date('Y-m-d h:i:s'),
          'updated_at' => date('Y-m-d h:i:s'),
        );


        }
  

      
        if(isset($request->expense_id)){

          $inst  = DB::table('tm_expenses')->where('id',$request->expense_id)->update($arr);

            DB::table('tm_expenses_timeline')->insert(['user_id' =>$user_id,'expense_id' =>$request->expense_id,'msg' =>($request->submit_status ==1)?'Save This expense':'Submited This expense' ]);


            if($inst){

              return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);



        }else{

              return response()->json(['status' => 201, 'msg' => 'Not Successfully Updated']);


        }

        }else{

          $inst  = DB::table('tm_expenses')->insertGetId($arr);



          DB::table('tm_expenses_timeline')->insert(['user_id' =>$user_id,'expense_id' =>$inst,'msg' =>($request->submit_status ==1)?'Save This expense':'Submited This expense' ]);

            if($inst){

              return response()->json(['status' => 200, 'msg' => 'Successfully Added']);



        }else{

              return response()->json(['status' => 201, 'msg' => 'Not Successfully Added']);


        }

        }

        

      


}

function update_r_amt(Request $request){

      $user_id =  Auth::guard('main_users')->user()->id;


  DB::table('tm_expenses')->where('id',$request->expenses_id)->update(['raimbs_amt' => $request->r_amount]);
   DB::table('tm_expenses_timeline')->insert(['user_id' =>$user_id,'expense_id' =>$request->expenses_id,'msg' =>'Reimbursable Amount Updated']);
    return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);

}

function update_status_expeses(Request $request){
    
    $user_id =  Auth::guard('main_users')->user()->id;

    DB::table('tm_expenses')->where('id',$request->exp_id)->update(['status' => $request->status]);

    DB::table('tm_expenses_timeline')->insert(['user_id' =>$user_id,'expense_id' =>$request->exp_id,'msg' =>'Status have Changed']);
    return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);


}

function edit_expenses($id){

      $user_id =  Auth::guard('main_users')->user()->id;


  $project_list = DB::table('tm_project_employees')->join('tm_projects','tm_projects.id','=','tm_project_employees.project_id')->where('tm_project_employees.emp_id','=',$user_id)->select('tm_projects.*')->get();

  $expense_edit = DB::table('tm_expenses')->where('id',$id)->first();


   return view('accountmodule.edit_expenses',['project_list' => $project_list,'expense_edit' => $expense_edit,'expense_id' => $id]);



}

function view_expenses($id){

    $user_id =  Auth::guard('main_users')->user()->id;


 

  $expense_view = DB::table('tm_expenses')->leftjoin('tm_projects','tm_projects.id','=','tm_expenses.project_id')->leftjoin('main_users','main_users.id','=','tm_expenses.user_id')->leftjoin('expenses_category','expenses_category.id','=','tm_expenses.category_id')->leftjoin('tm_trip','tm_trip.id','=','tm_expenses.trip_id')->where('tm_expenses.id','=',$id)->select('tm_expenses.*','tm_projects.project_name','main_users.userfullname','expenses_category.cat_name','tm_trip.trip')->first();

  $expense_timeline = DB::table('tm_expenses_timeline')->join('tm_expenses','tm_expenses.id','=','tm_expenses_timeline.expense_id')->leftjoin('main_users','main_users.id','=','tm_expenses_timeline.user_id')->where('tm_expenses_timeline.expense_id',$id)->select('tm_expenses_timeline.*','main_users.userfullname')->get();


   return view('accountmodule.view_expenses',['expense_view' => $expense_view,'expense_id' => $id,'expense_timeline' => $expense_timeline ]);

}

function delete_expenses($id){

  DB::table('tm_expenses')->where('id',$id)->delete();
 return redirect()->back();
}

function get_scope_text(Request $request){

  $get_scope = DB::table('tm_scope')->where('id',$request->scope_id)->first();

   return response()->json(['status' => 200, 'msg' => 'Successfully Updated','scope' => $get_scope->text_msg]);

}


function download_scope($id){



  $data['title'] = 'ujjval';

  $pdf = PDF::loadView('accountmodule.dowload_scope_of_work',$data);
  return $pdf->download('pdfview.pdf');
}
      


}