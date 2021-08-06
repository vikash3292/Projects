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

class AppraisalController extends Controller
{

	public function appraisal_list(){

		$today = date('m');

$appraisal_list = DB::table('main_yealy_appraisal_list')->join('main_users','main_yealy_appraisal_list.user_id','main_users.id')->leftjoin('main_employmentstatus','main_users.employee_status','main_employmentstatus.id')->where('main_users.emprole','!=',1)->where(DB::raw("(DATE_FORMAT(main_users.join_date,'%m'))"), "=",$today)->where('main_yealy_appraisal_list.status',1)->select('main_users.*','main_employmentstatus.workcode')->get();



		return view('appraisal.appraisal_list',['apraisal_list' => $appraisal_list]);
	}

	public function appraisal_fill_form($id){


        $year = date('Y');


        $appraisalform = DB::table('appraisal_form')->where('status',1)->get();

          $appraisalfilledform = DB::table('users_appraisal_form')->where('appraisal_list_id','=',$id)->where(DB::raw("(DATE_FORMAT(users_appraisal_form.date,'%Y'))"), "=",$year)->first();



		return view('appraisal.appraisal_form_fill',['appraisalform' =>$appraisalform,'appraisal_request_id' => $id,'appraisalfilledform' => $appraisalfilledform ]);
	}

		public function user_appraisal_list(){

			$userid = Auth::guard('main_users')->user()->id;



			$user_appraisal_list = DB::table('appraisal_list')->join('main_users','appraisal_list.user_id','main_users.id')->whereRaw("find_in_set($userid,emp_id)")->select('appraisal_list.*','main_users.userfullname')->get();

      foreach ($user_appraisal_list as $key => $user_appraisal_lists) {

        $user_appraisal_lists->fill_status = DB::table('users_appraisal_form')->where('appraisal_list_id',$user_appraisal_lists->id)->count();

      
      }

          //dd($user_appraisal_list);

           

		return view('appraisal.appraisal_form',['userAppraisal' =>$user_appraisal_list]);
	}


	
    

    public function sendappraisalemail(Request $request){

      //  return $request->all();

    	 $emailArray = json_decode(stripslashes($request->email),true);


    		$subject = 'Appraisal Email';
    		$from = 'ujjval@mailinator.com';
    		$fromname = 'Ujjval Srivastava';
    		
    			$content = '';
    			$content .= 'Appraisal Email please Portal';



    	 for($i=0;$i<count($emailArray);$i++){

    	 	$user = DB::table('main_users')->where('emailaddress','=',$emailArray[$i])->first();

        $appraisaluser = array($user->id,$user->reporting_manager,1);

    	 	$arr = array(
          'user_id' => $user->id,
    	 		'emp_id' => implode(',', $appraisaluser),
    	 		'date' => date('Y-m-d'),
    	 		'status' =>0

    	 	);

    	 	$int = DB::table('appraisal_list')->insert($arr);
    	


    	 }

    	   if($int){
    	       
    	          $semdemail = MultiSendEmail($emailArray, $subject, $from, $fromname, $content);
    	          
    	          if($semdemail){
    	              
    	              return response()->json(['status' => 200, 'msg' => 'Successfully Send Email']);
    	              
    	          }else{
    	              
    	              return response()->json(['status' => 201, 'msg' => 'Not Send Email']);
    	              
    	          }

           		

           }else{

           		return response()->json(['status' => 201, 'msg' => 'not Send Email']);

           }


    	
    }

    public function addappraisalform(Request $request){

        $userid = Auth::guard('main_users')->user()->id;

        $year = date('Y');
  
       
        $arr['appraisal_list_id'] = $request->appraisal_request_id;
        
         
            $arr['user_values'] = $request->usermarksval;
              $arr['codinator_values'] = $request->condinatorval??0;
               $arr['head_values'] = $request->headval??0;
                $arr['total_user_mark'] = $request->totalusermarks??0;
                 $arr['total_codinator_mark'] = $request->condinatortotal??0;
                  $arr['total_head_mark'] = $request->headtotal??0;
                  $arr['date'] = date('Y-m-d');


        
        $cnt = DB::table('users_appraisal_form')->where('appraisal_list_id','=',$request->appraisal_request_id)->where(DB::raw("(DATE_FORMAT(users_appraisal_form.date,'%Y'))"), "=",$year);
       
       if($cnt->count() > 0){
        $formdetails = $cnt->first(); 


              $oldusers = json_decode($formdetails->user_id);
              $currentuser = array($userid);

              $merge = array_merge($currentuser,$oldusers);

              $arr['user_id'] = json_encode($merge);

        $appraisal = DB::table('users_appraisal_form')->where('appraisal_list_id','=',$request->appraisal_request_id)->update($arr);

       }else{

         $arr['user_id'] = json_encode(array($userid));

        $appraisal = DB::table('users_appraisal_form')->insert($arr);


       }

     
         if($appraisal){

                return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

           }else{

                return response()->json(['status' => 201, 'msg' => 'not added']);

           }


    }
    
    public function cronyealyappraisaladd(){
        
        $today = date('m-d');
        
        $user = DB::table('main_users')->whereNotIn('emprole',[1,2,3,4])->get();
        
        foreach($user as $key => $users){
            
            $joindate = date('m-d',strtotime('-1 day',strtotime($users->join_date)));
            $curentdate = date('m-d',strtotime('+1 day',strtotime(date('Y-m-d')))); 
            
            if($joindate == $today){
                
                DB::table('main_yealy_appraisal_list')->insert(['user_id' => $users->id,'date' =>$curentdate,'status' => 1]);
            }
            
        }
        
        
    }
    
    
}
