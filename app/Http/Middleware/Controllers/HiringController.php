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


class HiringController extends Controller
{
    
    public function vacancylist_mangment(){

		$todaye = date('Y-m-d');

    	$hiring = DB::table('main_vacancy_list')->whereDate('dead_line','>=',$todaye)->where('status',1)->get();

    	return view('vacancy.vacancy_list',['hiring' => $hiring]);
    }

    public function addvacancy_mangment(Request $request){

           $userid = Auth::guard('main_users')->user()->id;

         if($request->hasFile('file')) {

           $file = $request->file('file');



             $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;


           $file->move(public_path().'/uploads/attach/', $name);

           $files = '/uploads/attach/'. $name;

          // $user->save();

        }else{

            $files = '';

        }


    	$addhiring = array(
    		'designation' => $request->designation??'',
    		'department' => $request->department??'',
    		'sanctioned_post' => $request->sancpost??'',
    		'exp' => $request->exp??'',
    		'dead_line' => $request->deadline??'',
            'files' =>  $files,
    		'status' => 1,
            'created_by' => $userid,
            'updated_by' => $userid,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
    	
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

    	return view('vacancy.add_request');
    }

     public function recruitmenttracker(){

     	$reqruiment = DB::table('main_reqruiment')->join('main_users','main_users.id', '=', 'main_reqruiment.created_by')->where('main_reqruiment.status',1)->select('main_reqruiment.*','main_users.userfullname')->get();

    	return view('vacancy.reqruiment',['reqruiment' => $reqruiment]);
    }

    function addreqruitment(Request $request){

    	$userid = Auth::guard('main_users')->user()->id;


    	$addreqruitment = array(
    		'designation' => $request->designation,
    		'requisition_date' => $request->requistion,
    		'experience' => $request->exp,
    		'deadline_date' => $request->deadline,
    		'department' => $request->department,
    		'sanctioned' => $request->sanction,
    		'actual_date' => $request->actualdate,
    		'remark' => $request->remark,
    		'remark_director' => $request->remark_director,
    		'remark_mang' => $request->remark_management,
    		'created_by' => $userid,
    		'status' => $request->status,

    	);

    	$add = DB::table('main_reqruiment')->insert($addreqruitment);

    	if($add){

    		return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

    	}else{

    		return response()->json(['status' => 201, 'msg' => 'Not add']);

    	}
    }
}
