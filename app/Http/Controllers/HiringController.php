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
use App\Requisition;
use PDF;


class HiringController extends Controller
{
    
    public function vacancylist_mangment(){

		$todaye = date('Y-m-d');

    	$hiring = DB::table('main_vacancy_list')->where('status',1)->get();

    	return view('vacancy.vacancy_list',['hiring' => $hiring]);
    }

    public function addvacancy_mangment(Request $request){

     

             if($request->hasFile('file')) {

           $file = $request->file('file');



             $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;

           $file->move(public_path().'/uploads/attach/', $name);

           $image = '/uploads/attach/'. $name;

        

        }else{

             $image = '';

        }

    	$addhiring = array(
    		'designation' => $request->designation,
    		'department' => $request->department,
    		'files' =>  $image,
    		'exp' => $request->exp,
    		'dead_line' => $request->deadline,
    		'status' => 1,
    	
    	);

    	$addvacany = DB::table('main_vacancy_list')->insert($addhiring);

    	if($addvacany){

			$useremail = array();

			$userlist = DB::table('main_users')->whereNotIn('emprole',[1,2,3,4])->where('isactive',1)->select('emailaddress','userfullname')->get();

    		foreach ($userlist  as $key => $userlists) {

				$useremail[] = 	$userlists->emailaddress;
    			
    		}
            if(isset($useremail)){

			$subject = 'vacancy';
    		$from = 'ujjval@mailinator.com';
			$fromname = 'Ujjval Srivastava';
			$content = '';
    		$content .= 'vacancy Can Create Please Refence Gegination is a'.$request->designation;


    	      $mailToAll = MultiSendEmail($useremail, $subject, $from, $fromname, $content);

    		
           if($mailToAll){

           		return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

           }else{

           		return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

           }

			}else{

				return response()->json(['status' => 201, 'msg' => 'Email Not Send']);

			}
    		
    		

    	}else{

    		return response()->json(['status' => 201, 'msg' => 'Not add']);

    	}

    }


    public function addnewrequest(){

		$dept = DB::table('main_departments')->where('isactive',1)->get();
		$user = DB::table('main_users')->where('isactive',1)->get();
		$role = DB::table('main_roles')->where('isactive',1)->get();

    	return view('vacancy.add_request',['role' => $role,'dept' => $dept,'user' => $user]);
    }

     public function recruitmenttracker(){

     	$reqruiment = Requisition::leftjoin('main_roles','main_reqruiment.role', '=', 'main_roles.id')->leftjoin('main_users as reporting','reporting.id', '=', 'main_reqruiment.reporting_to')->leftjoin('main_departments','main_departments.id', '=', 'main_reqruiment.deportment')->select('main_reqruiment.*','reporting.userfullname as reporting_user','main_departments.deptname','main_roles.rolename')->get();

    	return view('vacancy.reqruiment',['reqruiment' => $reqruiment]);
    }

    function addreqruitment(Request $request){

		$userid = Auth::guard('main_users')->user()->id;

		if(isset($request->requisition_id)){

			$add = Requisition::where('id',$request->requisition_id)->update($request->all());

			return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);

		}else{

			$add = Requisition::create($request->all());

			return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

		}
		
		
	
    }


 function edit_requisition($id){

	$dept = DB::table('main_departments')->where('isactive',1)->get();
		$user = DB::table('main_users')->where('isactive',1)->get();
		$role = DB::table('main_roles')->where('isactive',1)->get();

	$list = Requisition::where('id',$id)->first();

    return view('vacancy.edit_requisition',['list' => $list,'role' => $role,'dept' => $dept,'user' => $user]);

 }

  function view_requisition($id){

	$list = Requisition::leftjoin('main_roles','main_reqruiment.role', '=', 'main_roles.id')->leftjoin('main_users as reporting','reporting.id', '=', 'main_reqruiment.reporting_to')->leftjoin('main_departments','main_departments.id', '=', 'main_reqruiment.deportment')->where('main_reqruiment.id',$id)->select('main_reqruiment.*','reporting.userfullname as reporting_user','main_departments.deptname','main_roles.rolename')->first();

	return view('vacancy.view_requisition',['list' => $list]);

 }



 function delete_requisition($id){

	Requisition::where('id',$id)->delete();
	return redirect()->back();

 }

 function download_requisition($id){

	$data['list'] = Requisition::leftjoin('main_roles','main_reqruiment.role', '=', 'main_roles.id')->leftjoin('main_users as reporting','reporting.id', '=', 'main_reqruiment.reporting_to')->leftjoin('main_users as request_by','request_by.id', '=', 'main_reqruiment.req_by')->leftjoin('main_departments','main_departments.id', '=', 'main_reqruiment.deportment')->where('main_reqruiment.id',$id)->select('main_reqruiment.*','reporting.userfullname as reporting_user','main_departments.deptname','main_roles.rolename','request_by.userfullname as req_name')->first();

  $pdf = PDF::loadView('vacancy.pdf',$data);
  return $pdf->download('pdfview.pdf');

 }


 


}
