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





class EmpController extends Controller

{







   public function addEmp(Request $request){



   	$password = mt_rand(1000,99999);

    if(!isset($request->userid)){

     $validator = Validator::make($request->all(), [
       
             'sarvor_id' => 'unique:main_users,savior_card_id|required',
              'empcode' => 'unique:main_users,employeeId|required',
              'emaildata' => 'unique:main_users,emailaddress',
            
           
        ]);

            if($validator->fails()){
          return response()->json(['status' => 202,'msg' => $validator->errors()->first()], 200);
            }
          }


if(isset($request->doj) && isset($request->dol)){
  if($request->doj > $request->dol){
      return response()->json(['status' => 202, 'msg' => 'Date DOJ and DOL in Worng']);
  }
}



   $arr = array(

    'emprole' =>$request->role,

    'emp_category' =>$request->emp_category,

    'card_number' =>$request->crdno,

    'bussinessunit' =>$request->bsnit??0,

    'userstatus' =>'new',

    'prefix' =>$request->prefix,

    'firstname' =>$request->fname,

    'lastname' =>$request->lname,

    'join_date' =>$request->doj,

    'leave_date' =>$request->dol,

    'experience' =>$request->yoe,

    'workphone' =>$request->workphn,

    'extension' =>$request->extno,

    'modeofentry' =>$request->modeemp,

    'userfullname' =>$request->fname.' '.$request->lname,

    'emailaddress' =>$request->emaildata,
    'savior_card_id' =>$request->sarvor_id,

    'medicalpolicy' =>$request->mpcst,

    'emp_type' =>$request->emp_type,

    'position_id' =>$request->positions??0,

    'createddate' =>date('Y-m-d H:i:s'),

    'isactive' =>1,

    'employeeId' =>$request->empcode??0,

    'userid' =>$request->empid??0,

    'employee_status' =>$request->empstatus??0,

    'reporting_manager' =>$request->reptmng??0,

    'company_id' =>0,

    'department_id' =>$request->dprt??0,

    'jobtitle_id' =>$request->jobtitle??0,

    'tourflag' =>0,

    'themes' =>'default',





   );



 



   if(isset($request->userid)){



    $updateuser = DB::table('main_users')->where('id',$request->userid)->update($arr);



      return response()->json(['status' => 203, 'msg' => 'Update successfully']);





   }else{



    $array = array(

    'password' => Hash::make($password)

    );



    $merge = array_merge($arr,$array);

   

   $userlastid = DB::table('main_users')->insertGetId($merge);





   if($userlastid){

if(isset($request->email)){

   	    $to = $request->email;

        $subject = 'Create password';

        $from = 'ujjval000@gmail.com';

        $fromname = 'ujjval';

        $content = '';

        $content .= 'Dear '.$request->fname.' '.$request->lname.' Your password is '.$password.''; 





   	$mail = $this->sendpassword($to,$subject,$from,$fromname,$content);

   }else{

      return response()->json(['status' => 200, 'msg' => 'successfully Create User Check Mail in password','userid' =>$userlastid]);

   }

   	if($mail){



     



   		return response()->json(['status' => 200, 'msg' => 'successfully Create User Check Mail in password','userid' =>$userlastid]);





   	}else{



   		 return response()->json(['status' => 200, 'msg' => 'successfully Create User Check Mail in password','userid' =>$userlastid]);



   	}



        

   }else{



   	 return response()->json(['status' => 201, 'state' => 'Not add']);

   }



   }



   }







           protected function sendpassword($to, $subject, $from, $fromname, $content)

    {

        try {

            $mail = Mail::send([], [], function ($message) use ($to, $subject, $from, $fromname, $content) {



                $message->from($from, $fromname);

                $message->to($to);

                $message->subject($subject);

                $message->setBody($content, 'text/html'); // for HTML rich messages

            });



            if ($mail) {

                return true;

            } else {

                return false;

            }

        } catch (Exception $e) {

            throw new HttpException(500, $e->getMessage());

        }

    }





public function addsalary($id){



   $gatsalay = DB::table('grc_empsalarydetails')->where('user_id',$id)->first();





 

 return view('admin.add_sallary',['getsalary' =>  $gatsalay]);



}



public function insetsalary(Request $request){



$inst = array(

'ifsc' => $request->acclassType,

'accountnumber' => $request->accno,

'account_type' => $request->acctype,

'accountholder_name' => $request->actname,

'bankname' => $request->bankname,

'currency_id' => $request->currncy,

'salary' => $request->salaryamt,

'user_id' => $request->userid,

'salarytype' => $request->pay,

'project_commission' => $request->procommison,

'status' => 1,

'created_at' => date('Y-m-d H:i:s'),

'updated_at' => date('Y-m-d H:i:s'),

);







 if(sizeof(DB::table('grc_empsalarydetails')->where('user_id','=',$request->userid)->get()) > 0){



      DB::table('grc_empsalarydetails')->where('user_id','=',$request->userid)->update($inst);



    return response()->json(['status' => 203, 'msg' => 'Update successfully']);

    }else{



       DB::table('grc_empsalarydetails')->insert($inst);

      return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



    }





}



public function addpersaninfo($id){



  $getpersion = DB::table('grc_emppersonaldetails')->where('user_id',$id)->first();

 // dd($getpersion);

 

 return view('admin.personalinfo',['persoanlinfo' => $getpersion]);



}







public function insetpersanalinfo(Request $request){


$user_details = DB::table('main_users')->where('id',$request->userid)->first();

if($user_details->join_date > $request->dob){

  return response()->json(['status' => 205, 'msg' => 'DOB Greter Then Joining Date']);

}


  $pernal = array(

  'user_id' => $request->userid,

   'blood_group' => $request->bloodgroup,

    'ethnic_code' => $request->ethnic,

     'genderid' => $request->gender,

      'maritalstatusid' => $request->maritalstaus,

      'nationalityid' => $request->nationalty,

       'race_code' => $request->racecode,

        'dob' => $request->dob,

        'status' =>1,

        'created_at' => date('Y-m-d H:i:s'),

         'updated_at' => date('Y-m-d H:i:s'),





  );



   if(sizeof(DB::table('grc_emppersonaldetails')->where('user_id','=',$request->userid)->get()) > 0){



      DB::table('grc_emppersonaldetails')->where('user_id','=',$request->userid)->update($pernal);



    return response()->json(['status' => 203, 'msg' => 'Update successfully']);

    }else{



       DB::table('grc_emppersonaldetails')->insert($pernal);

      return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



    }

}



public function addcontact($id){



  $contatinfo= DB::table('grc_empcommunicationdetails')->where('user_id',$id)->first();

 

 return view('admin.add_contact',['contactinfo' => $contatinfo]);



}



public function addexperiance($id){



  $experience = DB::table('grc_empexperiancedetails')->where('user_id',$id)->where('status',1)->get();





 

 return view('admin.add_exeperiance',compact('experience'));



}



public function addeducation($id){



   $education = DB::table('grc_empeducationdetails')->join('main_education_list','main_education_list.id','=','grc_empeducationdetails.education_level')->join('main_course_list','main_course_list.id','=','grc_empeducationdetails.course')->where('grc_empeducationdetails.user_id',$id)->where('grc_empeducationdetails.status',1)->select('grc_empeducationdetails.*','main_education_list.name as eduname','main_course_list.name as coursename')->get();

  // dd($education);

 

 return view('admin.add_education',compact('education'));



}



public function addtraining($id){



    $training = DB::table('main_training')->where('user_id',$id)->where('status',1)->get();

 

 return view('admin.add_training',compact('training'));



}



public function addvisa($id){



   $visa = DB::table('grc_empvisadetails')->where('user_id',$id)->where('status',1)->get();

 

 return view('admin.add_visa',compact('visa'));



}



public function addassetes($id){



     $assest = DB::table('grc_assets')->where('user_id',$id)->where('status',1)->get();

 

 return view('admin.add_assets',compact('assest'));



}



public function deleteemp($id){

  

     $del = Main_users::where('id','=',$id)->delete();

     if($del){

      return redirect('employees')->with('message', 'Successfully Delete Users');;

     }

    

}



public function editemp($id){

  

     $editData = Main_users::where('id','=',$id)->first();



     return view('admin.add_emp',compact('editData'));

    

}











public function getstate(Request $request){





 $getstate = DB::table('alm_states')->where('country_id','=',$request->countryid)->get();

  $state = '';

 $state .= '<select class="form-control" id="state"><option value="">Select State</option>';





 foreach ($getstate as $key => $value) {



 $state .= '<option value='.$value->id.'>'.$value->name.'</option>';

  

 }



 $state .= '</select>';



 return response()->json(['status' => 200, 'state' => $state]);









}





public function getcourse(Request $request){





 $getstate = DB::table('main_course_list')->where('edu_id','=',$request->eduid)->get();

  $state = '';

 $state .= '<select class="form-control" id="coursedate"><option value="">Select State</option>';





 foreach ($getstate as $key => $value) {



 $state .= '<option value='.$value->id.'>'.$value->name.'</option>';

  

 }



 $state .= '</select>';



 return response()->json(['status' => 200, 'course' => $state]);





}



public function getreportingmanager(Request $request){





 $getstate = DB::table('main_users')->where('department_id','=',$request->departid)->get();

  $state = '';

 $state .= '<select class="form-control" id="state"><option value="">Select Manager</option>';



  if(!empty($getstate)){

 foreach ($getstate as $key => $value) {



 $state .= '<option value='.$value->id.'>'.$value->userfullname.'</option>';

  

 }

}



 $state .= '</select>';



 return response()->json(['status' => 200, 'manager' => $state]);









}







public function getcity(Request $request){



   $getcity = DB::table('alm_cities')->where('state_id','=',$request->stateid)->get();

  $state = '';

 $state .= '<select class="form-control" id="city"><option value="">Select City</option>';





 foreach ($getcity as $key => $value) {



 $state .= '<option value='.$value->id.'>'.$value->name.'</option>';

  

 }



 $state .= '</select>';



 return response()->json(['status' => 200, 'city' => $state]);

}





public function insertcontact(Request $request){



   $conct  = array(

    'user_id' =>$request->userid,

    'personalemail' =>$request->email,

    'personal_streetaddress' =>$request->p_Street,

    'perm_country' =>$request->country,

    'perm_state' =>$request->state,

    'perm_city' =>$request->city,

    'perm_pincode' =>$request->p_postalcode, 





     'current_streetaddress' =>$request->c_Street,

    

    'current_country' =>$request->c_Country,

    'current_state' =>$request->c_state,

    'current_city' =>$request->c_city,

    'current_pincode' =>$request->c_postalcode, 



    'emergency_number' =>$request->contactno,

    'emergency_name' =>$request->name,

    'emergency_email' =>$request->contact_email,

    'emergentcy_address' =>$request->offadd,

   

    'status' => 1,

    'created_at' =>date('Y-m-d H:i:s'),

    'updated_at'  => date('Y-m-d H:i:s'),

 

   );



    if(sizeof(DB::table('grc_empcommunicationdetails')->where('user_id','=',$request->userid)->get()) > 0){



      DB::table('grc_empcommunicationdetails')->where('user_id','=',$request->userid)->update($conct);



    return response()->json(['status' => 203, 'msg' => 'Update successfully']);

    }else{



       DB::table('grc_empcommunicationdetails')->insert($conct);

      return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



    }



}





public function insertexp(Request $request){

  
          


   $exp  = array(

    'user_id' =>$request->userid,

    'comp_name' =>$request->commpanyname,

    'comp_website' =>$request->website,

    'designation' =>$request->Designation,

    'from_date' =>$request->fromdate,

    'to_date' =>$request->todate,

    

    'status' => 1,

    'created_at' =>date('Y-m-d H:i:s'), 

    'updated_at' => date('Y-m-d H:i:s'),

 

   );



if(!empty($request->expid)){



   $exp12  = DB::table('grc_empexperiancedetails')->where('id',$request->expid)->update($exp);



       if($exp12){



         return response()->json(['status' => 203, 'msg' => 'Addedd successfully']);



       }





}else{



  

       $exp12  = DB::table('grc_empexperiancedetails')->insert($exp);



       if($exp12){



         return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



       }



}


}

function get_edu_data(Request $request){

  $get_edu = DB::table('grc_empeducationdetails')->where('id',$request->edu_id)->first();

   return response()->json(['status' => 200, 'msg' => 'edu successfully','edu' => $get_edu]);
}



public function delexp(Request $request){



  $userid = $request->userid;



 



  $del = DB::table('grc_empexperiancedetails')->where('id',$userid)->delete();

   if($del){



         return response()->json(['status' => 200, 'msg' => 'Delete successfully']);



       }



}



public function delassest(Request $request){



  $userid = $request->userid;







 



  $del = DB::table('grc_assets')->where('id',$userid)->delete();

   if($del){



         return response()->json(['status' => 200, 'msg' => 'Delete successfully']);



       }



}







public function insertedu(Request $request){

    

   $userid = Auth::guard('main_users')->user()->id;

  



   $edu  = array(

    'user_id' =>$request->userid,

    'education_level' =>$request->education,

    'institute_name' =>$request->Institution,

    'course' =>$request->course,

    'from_date' =>$request->fromdate,

    'to_date' =>$request->todate,

    

    'status' => 1,

    'created_at' =>date('Y-m-d H:i:s'), 

    'updated_at' => date('Y-m-d H:i:s'),

 

   );









if(!empty($request->edu_id)){



   $exp12  = DB::table('grc_empeducationdetails')->where('id',$request->edu_id)->update($edu);

    return response()->json(['status' => 203, 'msg' => 'Updated successfully']);



}else{



  

       $exp12  = DB::table('grc_empeducationdetails')->insert($edu);
        return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



}

}





public function delete_education(Request $request){



    $userid = $request->userid;



 



  $del = DB::table('grc_empeducationdetails')->where('id',$userid)->delete();

   if($del){



         return response()->json(['status' => 200, 'msg' => 'Delete successfully']);



       }



}



public function deltraining(Request $request){



    $userid = $request->id;



 



  $del = DB::table('main_training')->where('id',$userid)->delete();

   if($del){



         return response()->json(['status' => 200, 'msg' => 'Delete successfully']);



       }



}



public function delvisa(Request $request){



    $userid = $request->id;



 



  $del = DB::table('grc_empvisadetails')->where('id',$userid)->delete();

   if($del){



         return response()->json(['status' => 200, 'msg' => 'Delete successfully']);



       }



}

function get_trainig_data(Request $request){

  $get_traning = DB::table('main_training')->where('id',$request->tranig_id)->first();
    return response()->json(['status' => 200, 'msg' => 'Delete successfully', 'training' => $get_traning]);


}



public function updatefiletraining(Request $request){

    

   

      if($request->hasFile('editfile')) {

           $file = $request->file('editfile');



             $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;


           $file->move(public_path().'/uploads/attach/', $name);

           $image['attachfile'] = '/uploads/attach/'. $name;

          // $user->save();

        }

        

            

                if($request->trainingeditid){

                   

                     $exp12  = DB::table('main_training')->where('id',$request->trainingeditid)->update($image);

                      return response()->json(['status' => 203, 'msg' => 'update successfully']);



               }

            


    

}









  public function inserttraning(Request $request){



   // return $request->all();

   

   

   $userid = Auth::guard('main_users')->user()->id;



        

       if($request->hasFile('file')) {

           $file = $request->file('file');



             $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;



           //using the array instead of object

           //$image['filePath'] = $name;

           $file->move(public_path().'/uploads/attach/', $name);

           $image['attachfile'] = '/uploads/attach/'. $name;

          // $user->save();

        }







         $image['user_id'] = $request->userid;

         $image['coursetype'] = $request->courseType;

          $image['courselevel'] = $request->courselevel;

           $image['trainingby'] = $request->trainingby;

            $image['fromdate'] = $request->fromdate;

             $image['todate'] = $request->todate;

              $image['descdata'] = $request->descdata;

               $image['status'] = 1;

               

               

               if($request->traning_id){

                   

                     $exp12  = DB::table('main_training')->where('id',$request->traning_id)->update($image);



                   if($exp12){

            

                     return response()->json(['status' => 203, 'msg' => 'Update successfully']);

            

                   }

                   

               }else{

                   

                     $exp12  = DB::table('main_training')->insert($image);



                   if($exp12){

            

                     return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);

            

                   }

                               

                   

               }



            }



  public function insertvisa(Request $request){





         $image['user_id'] = $request->userid;

         $image['passport_number'] = $request->passportno;

          $image['passport_issue_date'] = $request->passportissue;

           $image['passport_expiry_date'] = $request->passportexpair;

            $image['visa_number'] = $request->visano;

             $image['visa_type'] = $request->visatype;

              $image['created_at'] = date('Y-m-d H:i:s');

               $image['updated_at'] = date('Y-m-d H:i:s');

               $image['status'] = 1;



               if(isset($request->edit_visa)){



                  $exp12  = DB::table('grc_empvisadetails')->where('id',$request->edit_visa)->update($image);



       if($exp12){



         return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



       }



               }else{



                  $exp12  = DB::table('grc_empvisadetails')->insert($image);



       if($exp12){



         return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



       }



               }





       $exp12  = DB::table('grc_empvisadetails')->insert($image);



       if($exp12){



         return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



       }



  }



  public function insertassest(Request $request){







      $image['user_id'] = $request->userid;

         $image['name'] = $request->assestname;

          $image['number'] = $request->serialno;

           $image['descdata'] = $request->descdata;

           

              $image['created_at'] = date('Y-m-d H:i:s');

               $image['updated_at'] = date('Y-m-d H:i:s');

               $image['status'] = 1;



               if(isset($request->edit_asset)){



                   $exp12  = DB::table('grc_assets')->where('id',$request->edit_asset)->update($image);



               if($exp12){



                 return response()->json(['status' => 203, 'msg' => 'Addedd successfully']);



               }





               }else{

          $exp12  = DB::table('grc_assets')->insert($image);



       if($exp12){



         return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



       }



               }





      



  }







public function updateprofile(Request $request){



         if($request->hasFile('profile')) {

           $file = $request->file('profile');



           $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;



           //you also need to keep file extension as well

          // $name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();



           //using the array instead of object

           //$image['filePath'] = $name;

           $file->move(public_path().'/uploads/attach/', $name);

           $image['profileimg'] = '/uploads/attach/'. $name;

          // $user->save();

        }



       



          if(isset($request->userid)){



                   $exp12  = DB::table('main_users')->where('id',$request->userid)->update($image);



               if($exp12){



                 return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



               }else{





                  return response()->json(['status' => 201, 'msg' => 'Not Change']);

               }



}



}





public function changepassord(Request $request){







   $email = Auth::guard('main_users')->user()->emailaddress;



   $oldpass  = Hash::make($request->cpassword);

    $newpass  = Hash::make($request->newpsd);





   $checkpass = DB::table('main_users')->where('id',$request->userid)->first();



   



    if (!Hash::check($request->cpassword, $checkpass->password)) {

      

         return response()->json(['status' => 201, 'msg' => 'Not Password successfully']);

    }



      $upated =  DB::table('main_users')->where('emailaddress',$email)->update(['password' =>$newpass]);





  if($upated){



        return response()->json(['status' => 200, 'msg' => 'Change Password successfully']);



      }









}





public function changethemes(Request $request){



  //return $request->all();



  $checkpass = DB::table('main_users')->where('id',$request->userid)->update(['themes' => $request->themes]);



  if($checkpass){



        return response()->json(['status' => 200, 'msg' => 'Change themes']);



      }else{



         return response()->json(['status' => 201, 'msg' => 'Not Change']);





      }



}



public function appyleave(){

   



    

    return view('admin.applyleave');

    

}









public function addappyleave(Request $request){



 

   $leavedate = json_decode($request->leaveDate);

   $leavetype = json_decode($request->leavetype);

   $leavetime = json_decode($request->leavetime);


     $leavedate = array_unique($leavedate);
     $countdate = count(array_unique($leavedate));



     if($request->select_commnet == 'Other'){



      $comment = $request->commnet;



     }else{



       $comment = $request->select_commnet;



     }





        list($leaveid,$totalleave,$leavecode) = explode('#',$request->leavemode);

     



     if($leaveid == 1){



      $color = '#FF0000';



     }else if($leaveid == 2){



        $color = '#49FF33';



     }else{



        $color = '#334FFF';

    }



 

   

    $userid = Auth::guard('main_users')->user()->id;

     $userEmail = Auth::guard('main_users')->user()->emailaddress;



    $showuserid = array($userid,$request->manager??0,$request->hr??0,$request->admin??0,$request->Director??0);

    $arrayDate = array();

    

     $leaveavail = $request->leaveinyear;



    for($i=0; $i<$countdate; $i++){



      $leaveavail -=  $leavetype[$i];





        $leave = array(

        

        'user_id' => $userid,

        'leave_mode'=>$leavecode,

        'alloted_year' => date('Y'),

        'leave_type' => $leavetype[$i],

        'leave_timing' =>$leavetime[$i]??'fullday', 

        'leaveTitle' => $leavecode,

        'leaveDate' => $leavedate[$i],

        'comment' => $comment,

        'leaveColor' => $color,

        'lwp' => ($leaveavail < 0)?abs($leaveavail):0,

        'avail' => ($leaveavail > 0)?$leaveavail:0,

        'roll_over' =>  $leaveavail,

       

        'create_by' => 1,

        'last_modified_by' => 1,

        'status' => 1,

        'created_at' => date('Y-m-d H:i:s'),

        'updated_at' => date('Y-m-d H:i:s'),

        'show_user_id' => implode(',', $showuserid)

     

        

        );



        

         $exp12  = DB::table('grc_employeeleaves')->insert($leave);

       



    }

    



       if($exp12){





      



         return response()->json(['status' => 200, 'msg' => 'Addedd successfully']);



       }else{

           

             return response()->json(['status' => 201, 'msg' => 'not Addedd successfully']);



           

       }

     

    

    

}





public function leavelist(){



   $userid = Auth::guard('main_users')->user()->id;



   $month = date('m');



  $leavelist = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->leftJoin('total_leave_list', 'total_leave_list.user_id', '=', 'grc_employeeleaves.user_id')->whereRaw("find_in_set($userid,show_user_id)")->orderBy('id','DESC')



  ->select('grc_employeeleaves.*','total_leave_list.total_year_leave','total_leave_list.month_leave','total_leave_list.used_leave','total_leave_list.unpaid_leave','main_users.userfullname')

  ->get();

  foreach ($leavelist as $key => $leavelists) {
   $leavelists->approval_status = DB::table('leave_approval')->where('leave_id',$leavelists->id)->where('user_id',$userid)->count();

   $leavelists->show_status_name = DB::table('leave_approval')->Join('main_users','main_users.id','=','leave_approval.user_id')->where('leave_approval.leave_id',$leavelists->id)->select('leave_approval.*','main_users.userfullname')->get();
  
  }

//dd($leavelist);



$getleavecount = DB::table('grc_employeeleaves')->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%m'))"), ">=", $month)->select(DB::raw('SUM(grc_employeeleaves.leave_type) AS leaveCount'))->first();



if(isset($getleavecount)){



  $getleavecount->drtDate =date('M');



}





   return view('admin.applyaproval',['leavelist' =>$leavelist,'getleavecount' => $getleavecount ]);



}



public function leavereport(){





 



   $userid = Auth::guard('main_users')->user()->id;



   $month = date('m');





  $leavelist = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->leftJoin('total_leave_list', 'total_leave_list.user_id', '=', 'grc_employeeleaves.user_id')->whereRaw("find_in_set($userid,show_user_id)")



  ->select('grc_employeeleaves.*','total_leave_list.total_year_leave','total_leave_list.month_leave','total_leave_list.used_leave','total_leave_list.unpaid_leave','main_users.userfullname','main_users.employeeId')

  ->get();





   $leavename = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->whereRaw("find_in_set($userid,show_user_id)")->groupBy('grc_employeeleaves.user_id')



  ->select('grc_employeeleaves.*','main_users.userfullname','main_users.id as userid')

  ->get();







$getleavecount = DB::table('grc_employeeleaves')->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%m'))"), ">=", $month)->select(DB::raw('SUM(grc_employeeleaves.leave_type) AS leaveCount'))->first();



if(isset($getleavecount)){



  $getleavecount->drtDate =date('M');



}





   return view('admin.leave_report',['leavelist' =>$leavelist,'getleavecount' => $getleavecount,'leavename' =>$leavename]);





}



public function exportcsv(Request $request)

{









   // $reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();



     $userid = Auth::guard('main_users')->user()->id;



   $month = date('m');





if(isset($_GET['month']) && isset($_GET['id'])){



  $month = $_GET['month'];

  $userid = $_GET['id'];







    $reviews = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->leftJoin('total_leave_list', 'total_leave_list.user_id', '=', 'grc_employeeleaves.user_id')->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%m'))"), "=",$month)->where('grc_employeeleaves.user_id',$userid)



  ->select('grc_employeeleaves.*','total_leave_list.total_year_leave','total_leave_list.month_leave','total_leave_list.used_leave','total_leave_list.unpaid_leave','main_users.userfullname','main_users.employeeId')

  ->get();





}else{



    $reviews = DB::table('grc_employeeleaves')->leftJoin('main_users', 'main_users.id', '=', 'grc_employeeleaves.user_id')->leftJoin('total_leave_list', 'total_leave_list.user_id', '=', 'grc_employeeleaves.user_id')->whereRaw("find_in_set($userid,show_user_id)")



  ->select('grc_employeeleaves.*','total_leave_list.total_year_leave','total_leave_list.month_leave','total_leave_list.used_leave','total_leave_list.unpaid_leave','main_users.userfullname','main_users.employeeId')

  ->get();



}







    $columns = array('S.No', 'Employee Name', 'Employee Code', 'Date of Leave', 'Type of Leave','Comments','Status');



    

    $filename = public_path("uploads/csv/leave_'".time()."'_report.csv");

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $columns);



         $i = 1;

        foreach($reviews as $review) {



        $useridshowid = array_filter(explode(',',$review->show_user_id));

                                                

            if(count($useridshowid) > 5){



              if($review->manager ==1 && $review->hr ==1 && $review->admin ==1 && $review->director == 1){

                $status = 'Approved';

  

              }else if($review->manager == 2 || $review->hr ==2 || $review->admin ==2 || $review->director == 2){

  

                $status = 'Rejected';

  

              }else{

  

                $status = 'Pending';

  

              }



            }else{



              if($review->manager ==1 && $review->hr ==1 && $review->admin ==1){

                $status = 'Approved';

  

              }else if($review->manager == 2 || $review->hr ==2 || $review->admin ==2){

  

                $status = 'Rejected';

  

              }else{

  

                $status = 'Pending';

  

              }



            }



            

 



           fputcsv($handle, array($i++, ucwords($review->userfullname), $review->employeeId, $review->leaveDate, $review->leave_mode, $review->comment,$status));

        }

        

       fclose($handle);



       $headers = array(

        'Content-Type' => 'text/csv'

       

        );





    return Response()->download($filename);

 

 

}





public function aproveleave(Request $request){

 

  $userid = Auth::guard('main_users')->user()->emprole;

  $approval_user_id = Auth::guard('main_users')->user()->id;

 $leaveid = $request->leaveid;

 $user_id = $request->user_id;

 $leavecount = $request->leavecount;



   $leavereject = DB::table('grc_employeeleaves')->where('id',$leaveid)->first();

   $leaveuser = DB::table('main_users')->where('id',$leavereject->user_id)->select('userfullname','emailaddress')->first();



   if($request->status == 'Approve'){



    $status = 1;

    $subject = 'Leave Approve ';

    $from = 'ujjval000@gmail.com';

    $fromname = 'ujjval';

    $content = '';

    $content .='Dear '.$leaveuser->userfullname.' Your Leave Approved by'.Auth::guard('main_users')->user()->userfullname;





   }else{



     $status = 2;



     

    $subject = 'Leave Approve Details';

    $from = 'ujjval000@gmail.com';

    $fromname = 'ujjval';

    $content = '';

    $content .='Dear '.$leaveuser->userfullname.' Your Leave Rejected by'.Auth::guard('main_users')->user()->userfullname;


   };

  

  if($userid == 1){



  $updatedate = DB::table('grc_employeeleaves')->where('id',$leaveid)->update(['director'=>$status]);

     DB::table('leave_approval')->insert(['leave_id' =>$leaveid,'user_id' => $approval_user_id,'created_at' =>date('Y-m-d h:i:s')]);

   if($request->status == 'Approve'){

    $leavereject = DB::table('grc_employeeleaves')->where('id',$leaveid)->first();

      if(($leavereject->manager ==1 && $leavereject->hr ==1 && $leavereject->admin==1 || $leavereject->director==1)){

       $this->attedanceStatus($leaveid,$user_id);

     }



   }



  if($updatedate){


 return response()->json(['status' => 200, 'msg' => 'Successfully Added']);


    // $userEmail  = sendMail($leaveuser->emailaddress,$subject,$from,$fromname,$content);



  }else{



     return response()->json(['status' => 201, 'msg' => 'Not Successfully Added']);



  }



  }elseif ($userid == 3) {


     $updatedata = DB::table('grc_employeeleaves')->where('id',$leaveid)->update(['manager'=>$status,'reason' => $request->reason]);

     DB::table('leave_approval')->insert(['leave_id' =>$leaveid,'user_id' => $approval_user_id,'created_at' =>date('Y-m-d h:i:s')]);

     if($request->status == 'Approve'){

       $leavereject = DB::table('grc_employeeleaves')->where('id',$leaveid)->first();

    
      if(($leavereject->manager ==1 && $leavereject->hr ==1 && $leavereject->admin==1 || $leavereject->director==1)){

       $this->attedanceStatus($leaveid,$user_id);

     }



   }





  if($updatedata){

    return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

    // $userEmail  = sendMail($leaveuser->emailaddress,$subject,$from,$fromname,$content);


  }else{



     return response()->json(['status' => 201, 'msg' => 'Not Successfully Added']);



  }

    # code...

  }elseif ($userid == 4) {





     $updatedata = DB::table('grc_employeeleaves')->where('id',$leaveid)->update(['hr'=>$status]);

       DB::table('leave_approval')->insert(['leave_id' =>$leaveid,'user_id' => $approval_user_id,'created_at' =>date('Y-m-d h:i:s')]);



if($request->status == 'Approve'){

   $leavereject = DB::table('grc_employeeleaves')->where('id',$leaveid)->first();



      if(($leavereject->manager ==1 && $leavereject->hr ==1 && $leavereject->admin==1 || $leavereject->director==1)){
       $this->attedanceStatus($leaveid,$user_id);

     }



   }



  if($updatedata){



   return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

    // $userEmail  = sendMail($leaveuser->emailaddress,$subject,$from,$fromname,$content);



  }else{



     return response()->json(['status' => 201, 'msg' => 'Not Successfully Added']);



  }

   

  }else{



   $updatedata = DB::table('grc_employeeleaves')->where('id',$leaveid)->update(['admin'=>$status]);

  DB::table('leave_approval')->insert(['leave_id' =>$leaveid,'user_id' => $approval_user_id,'created_at' =>date('Y-m-d h:i:s')]);

       if($request->status == 'Approve'){

         $leavereject = DB::table('grc_employeeleaves')->where('id',$leaveid)->first();



      if(($leavereject->manager ==1 && $leavereject->hr ==1 && $leavereject->admin==1 || $leavereject->director==1)){
       $this->attedanceStatus($leaveid,$user_id);

     }



   }

 


  if($updatedata){



     return response()->json(['status' => 200, 'msg' => 'Successfully Added']);

    // $userEmail  = sendMail($leaveuser->emailaddress,$subject,$from,$fromname,$content);



  }else{



     return response()->json(['status' => 201, 'msg' => 'Not Successfully Added']);



  }



   }


}




   private function attedanceStatus($leaveid,$user_id){



    $leave_details = DB::table('grc_employeeleaves')->where('id',$leaveid)->first();

           if(empty($leave_details->leave_timing)){

            $timeing = 1;

           }else{

            $timeing = 2;

           }

        
              $user_details = DB::table('main_users')->where('id', $user_id)->first();

               if($leave_details->leave_mode == 'PL'){

     DB::table('main_users')->where('id', $user_id)->update(['leave_pl' => $user_details->leave_pl - $leave_details->leave_type]);

              }else if($leave_details->leave_mode == 'CL'){

                 DB::table('main_users')->where('id', $user_id)->update(['leave_cl' => $user_details->leave_cl  - $leave_details->leave_type]);


              }

            

             if($leave_details->lwp > 0){

                 

                 $staus = ($leave_details->lwp == 1.0)?'LWP':'HPL';

                 

             }else if($leave_details->avail > 0){

                 

                 if($timeing == 1 && $leave_details->avail >= 0){

                        $staus = "L" ;   

                 }else if($timeing  == 1 && $leave_details->avail >= 1.0){

                      $staus = "L"   ;

                 }else if($timeing  == 2 && $leave_details->avail >= 0.5){

                      $staus = "HL"  ;

                 }else{

                      $staus = "HL"  ;

                 }

                 
             }else if($timeing  == 1 && $leave_details->avail == 0){

                 

                $staus = 'L';

                 

             }else{

                 

                   $staus = 'HL';

                 

             }





             

             // $t = preg_replace('/[^0-9]/i', '',$user_details->employeeId);

             // $venc = (int)$t;

              // $leave_emp  = DB::table('main_employeeleaves')->where('user_id',$leave_details->user_id)->first();

                 DB::table('main_attendance')->where('user_id',$leave_details->user_id)->whereDate('entry_date',$leave_details->leaveDate)->delete();

              $addAttance = array(

                  'user_id' => $leave_details->user_id,

                  'empid' => $user_details->employeeId,

                  'reporting_to' => $user_details->reporting_manager,

                  'shift' => 'GS',

                  'intime'  => '00:00:00',

                  'outtime'  => '00:00:00',

                  'entry_date' => $leave_details->leaveDate, 

                  'status'  => $staus,

                 

                  );

                  

                  DB::table('main_attendance')->insert($addAttance);



                  return true;





   }



   public function checkdateleave(Request $request){



   //dd($request->all());



    list($leaveid,$leavecount,$leavecode) = explode('#',$request->leavemode);



    $userid = Auth::guard('main_users')->user()->id;

      $applyMonth = date('M',strtotime($request->selectedDate));
       $applyYear = date('Y',strtotime($request->selectedDate));

    $pre_date = date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m-d')))); 
    $futur_date = date('Y-m-d', strtotime('+1 months', strtotime(date('Y-m-d'))));

  
     $date =  date("Y-m-d", strtotime("first Saturday of ".$applyMonth." ".$applyYear.""));
     $dayname = date('D', strtotime($request->selectedDate));
    $get_holi_open = DB::table('main_holidaydates')->whereDate('org_open_date',$request->selectedDate)->count();

    if($get_holi_open > 0){

    return response()->json(['status' => 200, 'msg' => 'added']);

    }
   
    if($dayname == 'Sun'){
      return response()->json(['status' => 202, 'msg' => 'Weeked Off']);

    }else if($date == $request->selectedDate){

      return response()->json(['status' => 202, 'msg' => 'Weeked Off']);

    }



    $checkleave  = DB::table('grc_employeeleaves')->whereDate('leaveDate',$request->selectedDate)->where('user_id',$userid)->where(function($query)
                {
                    $query->orWhere('manager', '!=',2)
                    ->orWhere('admin', '!=',2)
                    ->orWhere('hr', '!=',2)
                    ->orWhere('director', '!=',2);

                })->count();

    if($checkleave ==0){

     if($leavecode == 'MyL'){
          $myleave  = DB::table('grc_employeeleaves')->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y'))"), "=", date('Y'))->where('leave_mode','MyL')->where('user_id',$userid)->where(function($query)
                {
                    $query->Where('manager', '!=',2)
                    ->orWhere('admin', '!=',2)
                    ->orWhere('hr', '!=',2)
                    ->orWhere('director', '!=',2);

                })->count();

          if($myleave == 0){

             return response()->json(['status' => 200, 'msg' => 'added']);

          }else{

              return response()->json(['status' => 202, 'msg' => 'you have Already Apply Myleave']);

          }

     }



       if($pre_date < $request->selectedDate && $futur_date > $request->selectedDate){

      return response()->json(['status' => 200, 'msg' => 'added']);

    }else{

       return response()->json(['status' => 202, 'msg' => 'Only Apply 1 Month Back and 1 Month Future']);

    }



    //  $holidatleave  = DB::table('main_holidaydates')->whereDate('holidaydate',$request->selectedDate)->count();



    $holidatleave  = DB::table('main_holidaydates')->whereDate('holidaydate',$request->selectedDate);

    // dd($holidatleave->first()->groupid);

      if($holidatleave->count() == 0 && $leavecode == 'PL'){



        return response()->json(['status' => 200, 'msg' => 'added']);

       

      }else if($holidatleave->count() == 0  && $leavecode == 'CL'){ 

        

        return response()->json(['status' => 200, 'msg' => 'added']);

        

      }else if($holidatleave->count() == 0  && $leavecode == 'ML'){ 

        

        return response()->json(['status' => 200, 'msg' => 'added']);

        

      }else if($holidatleave->count() == 0  && $leavecode == 'CL'){

          

              return response()->json(['status' => 201, 'msg' => 'Apply Leave In PL']);

           

        

      }else if($holidatleave->count() == 0 && $leavecode == 'MyL'){

          

           return response()->json(['status' => 200, 'msg' => 'added']);



      }else if($holidatleave->count() != 0 && $holidatleave->first()->groupid == 2){   



           return response()->json(['status' => 201, 'msg' => 'Fixed HoliDay']);

           

    

      }else if($holidatleave->count() != 0 && $leavecode == 'CL'){

          

          

           return response()->json(['status' => 201, 'msg' => 'Not Apply Leave In PL']);

          

        

          

      }else{



        return response()->json(['status' => 201, 'msg' => ' Apply CL For This Date']);



      }

    



    }else{



     // return response()->json(['status' => 203, 'msg' => 'already add Leave']);



     

      $userdetails = DB::table('grc_employeeleaves')->leftJoin('main_users','grc_employeeleaves.user_id','=','main_users.id')->leftJoin('main_users as rmuser','main_users.reporting_manager','=','rmuser.id')->where('user_id', $userid)->whereDate('leaveDate',$request->selectedDate)->select('grc_employeeleaves.*','main_users.userfullname','rmuser.userfullname as reportingmanager')->first();







      if($userdetails->leave_type == 1.0){



        $days =  'Full Day';



      }else{



         $days =  'Half Day';



      }

      

                   $title = $userdetails->leave_mode;

                    

       $html = '';

      $html .= '<div class="row">

                 <div class="col-md-3">

                   <label class="col-form-label"> Employee</label>

                 </div>

                  <div class="col-md-3">

                    '.$userdetails->userfullname.'

                 </div>

                  <div class="col-md-3">

                  <label class="col-form-label"> Leave Type</label>

                 </div>

                  <div class="col-md-3">

                 '.$title.'

                 </div>

                  <div class="col-md-3">

                  <label class="col-form-label"> Date</label>

                 </div>

                  <div class="col-md-3">

                    '.date('d-M-Y',strtotime($userdetails->leaveDate)).'

                 </div>

                 <div class="col-md-3">

                   <label class="col-form-label">Status</label>

                 </div>

                  <div class="col-md-3">';

                

                 if($userdetails->manager ==1 && $userdetails->hr ==1 && $userdetails->admin ==1 ){



                                             

                                                

                                                    $html .= 'Approved';

                                             

                    }else if($userdetails->manager == 2 || $userdetails->hr ==2 || $userdetails->admin ==2 ){

 

                                                

                                                    $html .= 'Rejected ';

                                             



                                                }else{



                                           

                                               

                                                   $html .= ' Pending ';

                                              

                                                  }

           

                 $html .= '</div>

                 <div class="col-md-3">

                  <label class="col-form-label"> Leave For</label>

                 </div>

                  <div class="col-md-3">

                    '.$days.'

                 </div>

                 <div class="col-md-3">

                  <label class="col-form-label"> Days</label>

                 </div>

                  <div class="col-md-3">

                    1

                 </div>



                  <div class="col-md-3">

                   <label class="col-form-label"> Reporting Manager</label>

                 </div>

                  <div class="col-md-3">

                    '.$userdetails->reportingmanager.'

                 </div>';

                 

if($userdetails->manager ==0 && $userdetails->hr ==0 && $userdetails->admin ==0 ){



    

                  $html .= '<div class="col-md-6">

<button class="btn float-right bg-danger text-white" onclick="cancelleave('.$userdetails->id.')">Cancel</button>

                 </div>';

                 

                 }

                

              $html .= '</div>';





      return response()->json(['status' => 203, 'msg' => 'already add Leave','details' =>  $html ]);





    }





   }





   public function cancelleave(Request $request){



 // return $request->all();



  $userid = Auth::guard('main_users')->user()->id;



 // $getleave = DB::table('main_leaverequest')->where('id',$request->leaveid)->first();

 // $totalgetleave = DB::table('total_leave_list')->where('user_id',$userid)->first();





//   if($getleave->leave_mode == 'Casual Leave'){



//     $arr = array(

//      'total_year_leave' => (int)$totalgetleave->total_year_leave + 1

//     );



//   }else if($getleave->leave_mode == 'Restricted Leave'){

//      $arr = array(

//      'restricted' => $totalgetleave->restricted + 1

//     );



//   }else if($getleave->leave_mode == 'Maternity Leave'){

//      $arr = array(

//      'maternity' => $totalgetleave->maternity + 1

//     );



//      }else if($getleave->leave_mode == 'Maternity Leave'){

//      $arr = array(

//      'myleave' => $totalgetleave->myleave + 1

//     );



//   }



  //$updattotalleave = DB::table('total_leave_list')->where('user_id',$userid)->update($arr);

  $updattotalleave = DB::table('grc_employeeleaves')->where('id',$request->leaveid)->delete();



   if($updattotalleave){



    return response()->json(['status' => 200, 'msg' => 'Successfully Remove Leave' ]);



   }else{



    return response()->json(['status' => 201, 'msg' => 'Something Went to Worng']);



   }



}

   

   

   public function addyearlyleave(){

       

       $month = date('m');

       

       // $userid = Auth::guard('main_users')->user()->id;

        

        $totalleave = DB::table('total_leave_list')->get();

         $leave = 0;

        foreach($totalleave as $totalleaves){

            

         

            

            DB::table('total_leave_list')->where('user_id',$totalleaves->user_id)->update(['total_year_leave' =>$totalleaves->total_year_leave + 18 ]);

            

        }

       

   }

   

   public function add_month_leave(){



  $gettotoleleave = DB::table('main_users')->where('isactive',1)->get();

  if(isset($gettotoleleave)){



    foreach($gettotoleleave as  $gettotoleleaves){

      DB::table('main_users')->where('id',$gettotoleleaves->id)->update(['leave_pl' => $gettotoleleaves->leave_pl + 1.0,'leave_cl' => $gettotoleleaves->leave_cl + 0.5]);

    }


  }





}





public function uploadusercsv(Request $request){



        if ($request->input('upload') != null ){

  

        $file = $request->file('upload_users');

  

        // File Details 

        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        $tempPath = $file->getRealPath();

        $fileSize = $file->getSize();

        $mimeType = $file->getMimeType();

  

        // Valid File Extensions

        $valid_extension = array("csv");



    // $subject = 'User Password Details';

    // $from = 'usrivastava@kloudrac.com';

    // $fromname = 'Not_Reply';

    // $content = '';


        // 2MB in Bytes

        $maxFileSize = 2097152; 

  

        // Check file extension

        if(in_array(strtolower($extension),$valid_extension)){

  

          // Check file size

          if($fileSize <= $maxFileSize){

  

            // File upload location

            $location = 'uploadcsv';

  

            // Upload file

              $file->move(public_path().'/uploadcsv/', $filename);
            // Import CSV to Database
            $filepath = public_path($location."/".$filename);

           // dd($filepath);
  
            // Reading file
            $file = fopen($filepath,"r");

  

            $importData_arr = array();

            $i = 0;

  

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {

               $num = count($filedata);

               

               // Skip first row (Remove below comment if you want to skip the first row)

               if($i == 0){

                  $i++;

                  continue; 

               }

               for ($c=0; $c < $num; $c++) {

                  $importData_arr[$i][] = $filedata[$c];

               }

               $i++;

            }

            fclose($file);

  

       //dd($importData_arr);

  

            // Insert to MySQL database

            foreach($importData_arr as $importData){


            //  $role = DB::table('main_roles')->where('rolename',trim($importData[0]))->first();

               //  $password = uniqid();


                // $content = 'Dear Your Email is '.$importData[4].'and Password is '.$password;

                 

              //if(isset($role)){



               //  $userExsitcount = DB::table('main_users')->where('emailaddress',trim($importData[4]))->count();

               // if($userExsitcount ==0){

                $insertData = array(

                'emprole' =>   5,
                'savior_card_id' =>$importData[1], 

                'userfullname' => $importData[2],

                'password' => '$2y$10$vJm88yNiQfL8uT01EZb18eWBO6z688E0IlBnUbBDh3BdA1EbsfXMW',

                 'isactive' =>1,

                 'employeeId' => str_replace('GRC/DEL/', '', $importData[0]),
                 'reporting_manager' => 179,

                 'themes' => 'default',

                

                );

            // sendMail($importData[4],$subject,$from,$fromname,$content);

             $lastid = DB::table('main_users')->insertGetId($insertData);



           

              Session::flash('message','Import Successful.');

              Session::flash('alert','primary');

          //  }



              // }else{



              //    Session::flash('message','Something went to Worng');

              //    Session::flash('alert','danger');



              // }

              

  

            }

  

           

          }else{

            Session::flash('message','File too large. File must be less than 2MB.');

            Session::flash('alert','danger');

          }

  

        }else{

           Session::flash('message','Invalid File Extension.');

           Session::flash('alert','danger');

        }

  

        // Redirect to index

      return redirect()->back();

  

      }



}







public function leavetype(Request $request){

 
    $userid = Auth::guard('main_users')->user()->id;

    
    list($leaveid,$totalleaveall,$leavecode) = explode('#',$request->leavetype);

    $now = date('Y-m');

    $takenleave = 0;


    $userdetails = DB::table('main_users')->where('id',$userid)->first();


    if($leavecode == 'PL'){

             $takeleave = Db::table('grc_employeeleaves')->where('status',1) 

                  ->where(function($query) {

                         $query->whereIn('manager',[0,1])

                            ->whereIn('hr',[0,1])

                            ->whereIn('admin',[0,1])

                            ->orWhereIn('director', [0,1]);

                   

                    })->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y'))"), "=", date('Y'))->where('leave_mode',$leavecode)->where('user_id',$userid)->select('leave_type as appliedleavescount')->get();

     $takenleave = 0;

    if(isset($takeleave) && !empty($takeleave)){

         foreach($takeleave as $takeleaves){

        $takenleave +=$takeleaves->appliedleavescount;

    }

        

    }else{

        $takenleave = 0;
    }

    	$pl_leave = $userdetails->leave_pl - $takenleave;
      return ($pl_leave > 0)?$pl_leave:0;

    }else if($leavecode == 'CL'){

                   $takeleave = Db::table('grc_employeeleaves')->where('status',1) 

                  ->where(function($query) {

                         $query->whereIn('manager',[0,1])

                            ->whereIn('hr',[0,1])

                            ->whereIn('admin',[0,1])

                            ->orWhereIn('director', [0,1]);

                   

                    })->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y'))"), "=", date('Y'))->where('leave_mode',$leavecode)->where('user_id',$userid)->select('leave_type as appliedleavescount')->get();

     $takenleave = 0;

    if(isset($takeleave) && !empty($takeleave)){

         foreach($takeleave as $takeleaves){

        $takenleave +=$takeleaves->appliedleavescount;

    }

        

    }else{

        $takenleave = 0;
    }

    	$leave_cl = $userdetails->leave_cl - $takenleave;
      return ($leave_cl > 0)? $leave_cl:0;

    }else{

    	 $takeleave = Db::table('grc_employeeleaves')->where('status',1) 

                  ->where(function($query) {

                         $query->whereIn('manager',[0,1])

                            ->whereIn('hr',[0,1])

                            ->whereIn('admin',[0,1])

                            ->orWhereIn('director', [0,1]);

                   

                    })->where(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y'))"), "=", date('Y'))->where('leave_mode',$leavecode)->where('user_id',$userid)->select('leave_type as appliedleavescount')->get();

     $takenleave = 0;

    if(isset($takeleave) && !empty($takeleave)){

         foreach($takeleave as $takeleaves){

        $takenleave +=$takeleaves->appliedleavescount;

    }

        

    }else{

        $takenleave = 0;
    }

         return $totalleaveall - $takenleave??0;

    }

     

}


function update_pl(Request $request){

DB::table('main_users')->where('id',$request->user_id)->update(['leave_pl' => $request->pl]);

   return response()->json(['status' => 200, 'msg' => 'Successfully Update PL Leave' ]);
}

function update_cl(Request $request){

	DB::table('main_users')->where('id',$request->user_id)->update(['leave_cl' => $request->cl]);

   return response()->json(['status' => 200, 'msg' => 'Successfully Update Cl Leave' ]);
	
}

function cron_hourly_peding_leave_remainder(){

   $leave_pending = DB::table('grc_employeeleaves')->where('grc_employeeleaves.status',1)
            ->where(function($query) {

                         $query->where('grc_employeeleaves.manager','=',0)

                            ->where('grc_employeeleaves.hr','=',0)

                            ->where('grc_employeeleaves.admin','=',0);
                       

                    })->where(function($query) {

                            $query->orWhere('grc_employeeleaves.director', '=',0);

                    })

        ->orderBy(DB::raw("(DATE_FORMAT(grc_employeeleaves.leaveDate,'%Y-%m-%d'))"), 'DESC')->get();

    $subject = 'Leave Pending Details';

    $from = 'ujjval000@gmail.com';

    $fromname = 'Not_reply';

    $content = '';

           
          foreach ($leave_pending as $key => $leave_pendings) {
            $user_email = [];
           $leave_user_name = DB::table('main_users')->where('id',$leave_pendings->user_id)->first();
            $leave_user = array((int)$leave_pendings->user_id,1,0);

            $user_pending_leave = explode(',',$leave_pendings->show_user_id);

            $filter_user = array_diff($user_pending_leave,$leave_user);
           
            $get_email = DB::table('main_users')->whereIn('id',$filter_user)->whereNotNull('emailaddress')->select('emailaddress')->get();
            
            if(isset($get_email)){

               foreach ($get_email as $key => $get_emails) {
             
                $user_email[] = $get_emails->emailaddress;
               }

            
            $content .='Dear '.$leave_user_name->userfullname.'Leave Pending';
           
            sendMail($user_email,$subject,$from,$fromname,$content);

             unset($user_email);

            }
           
           
                        
           }        

        
       
}



}

