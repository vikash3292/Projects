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



class BdController extends Controller

{

   public function __construct()
    {
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function viewLeadList(){

        $userid = Auth::guard('main_users')->user()->id;

         $role = Auth::guard('main_users')->user()->emprole;

    	$lead_lest = DB::table('main_lead_list')->leftjoin('main_users','main_lead_list.owner','main_users.id')->where('status',1)->whereNotIn('lead_status',[5]);

    

    	if($role != 1){

    	    $lead_lest->where('owner',$userid);

    	}

    	

    	$lead_lest = $lead_lest->select('main_lead_list.*','main_users.userfullname')->get();



    	return  view('bd.lead_list',['leadlist' => $lead_lest]);

    }



    public function createLead(Request $request){



    	 $userid = Auth::guard('main_users')->user()->id;


    	 $useridlist = [];

    	 $useridlist[] = $userid;

    	 $leadowner = DB::table('main_users')->where('reporting_manager','=',(int)$userid)->where('isactive',1)->whereIn('emprole',[12,13,14])->select('id')->get();

          // dd($leadowner);

    	 if(isset($leadowner) && !empty($leadowner)){

    	 foreach($leadowner as $leadowners){

    	     $useridlist[] = $leadowners->id;

    	     if(isset($leadowners->id)){

    	         $secoundemp = DB::table('main_users')->where('reporting_manager',(int)$leadowners->id)->where('isactive',1)->whereIn('emprole',[12,13,14])->select('id')->get();

    	         if(isset($secoundemp)){

    	             foreach($secoundemp as $secoundemps){

    	                 $useridlist[] = $secoundemps->id;

    	             }

    	         }

    	     }

    	   

    	 }

    	 }

    	 

    

    	 

    	 $userlistbd = DB::table('main_users')->whereIn('id',array_unique($useridlist))->where('isactive',1)->get();



    	if($request->isMethod('post')) {

    	    

    	    //dd($request->all());



          $lead = array(



          	'owner' => $request->lead_ownere,

          	'phone' => $request->p_phone_no,

          	'mobile' => $request->a_phone_no,

          	'prefix' => $request->prefix,

          	'fname' => $request->f_name,

          	'lname' => $request->l_name,

          	'company' => $request->ac_name,

          	'fax' => $request->fax,

          	

          	'email' => $request->email,

          	'sourse' => $request->lead_source,

          	'website' => $request->website,

          	'industry' => $request->industry,

          	'lead_status' => $request->lead_status,

          	'annual_revenue' => $request->annual_revenue,

          	'rating' => $request->rating,

          	'no_of_emp' => $request->no_of_emp,

          	

          	'product_type' => $request->project_type,

          	'country' => $request->country,

          	'state' => $request->state,

          	'city' => $request->city,

          	'zipcode' => $request->zip,

          	'street' => $request->street,

          	'created_at' => date('Y-m-d H:i:s'),

          	'status' => 1,

          	'created_by' =>  $userid,

          	

          );

          

         



          $leadinst = DB::table('main_lead_list')->insertGetId($lead);
               



          if($leadinst){

            DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $leadinst,'lead_status' => 4,'msg' => 'Lead Created','created_at' => date('Y-m-d h:i:s')]);

          	return redirect('viewLead/'.$leadinst)->with('msg','Successfully insert Lead');



          }else{



          	return redirect()->back()->with('msg','Not insert Lead');



          }







    	}



    	return  view('bd.create_lead',['userlist' => $userlistbd]);

    }



    public function edit_Lead(Request $request,$id='')

    {

      

         $userid = Auth::guard('main_users')->user()->id;

    	 

    	 	 

    	 $useridlist = [];

    	 $useridlist[] = $userid;

    	 $leadowner = DB::table('main_users')->where('reporting_manager','=',(int)$userid)->where('isactive',1)->whereIn('emprole',[12,13,14])->select('id')->get();

          // dd($leadowner);

    	 if(isset($leadowner) && !empty($leadowner)){

    	 foreach($leadowner as $leadowners){

    	     $useridlist[] = $leadowners->id;

    	     if(isset($leadowners->id)){

    	         $secoundemp = DB::table('main_users')->where('reporting_manager',(int)$leadowners->id)->where('isactive',1)->whereIn('emprole',[12,13,14])->select('id')->get();

    	         if(isset($secoundemp)){

    	             foreach($secoundemp as $secoundemps){

    	                 $useridlist[] = $secoundemps->id;

    	             }

    	         }

    	     }

    	   

    	 }

    	 }

    	 

          

    	 $edit_lead = DB::table('main_lead_list')->where('id',$id)->first();

    	 $userlistbd = DB::table('main_users')->whereIn('id',array_unique($useridlist))->where('isactive',1)->get();

    	 

    	 

        	if($request->isMethod('post')) {

    	    

    	    //dd($request->all());



          $lead = array(



          	'owner' => $request->lead_ownere,

          	'phone' => $request->p_phone_no,

          	'mobile' => $request->a_phone_no,

          	'prefix' => $request->prefix,

          	'fname' => $request->f_name,

          	'lname' => $request->l_name,

          	'company' => $request->ac_name,

          	'fax' => $request->fax,

          	

          	'email' => $request->email,

          	'sourse' => $request->lead_source,

          	'website' => $request->website,

          	'industry' => $request->industry,

          	'lead_status' => $request->lead_status,

          	'annual_revenue' => $request->annual_revenue,

          	'rating' => $request->rating,

          	'no_of_emp' => $request->no_of_emp,

          	

          	'product_type' => $request->project_type,

          	'country' => $request->country,

          	'state' => $request->state,

          	'city' => $request->city,

          	'zipcode' => $request->zip,

          	'street' => $request->street,

          	'created_at' => date('Y-m-d H:i:s'),

          	'status' => 1,

          	'created_by' =>  $userid,

          	

          );

          

          

          if(isset($request->lead_id)){

               DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->lead_id,'lead_status' => 4,'msg' => 'Lead Updated','created_at' => date('Y-m-d h:i:s')]);


               $leadinst = DB::table('main_lead_list')->where('id',$request->lead_id)->update($lead);

              

          }else{

              

               $leadinst = DB::table('main_lead_list')->insert($lead);

              

          }

         



         



          if($leadinst){



          	return redirect('viewLeadList')->with('msg','Successfully insert Lead');



          }else{



          	return redirect()->back()->with('msg','Not insert Lead');



          }







    	}

    	 

    	   return view('bd.edit_lead',['userlist' => $userlistbd,'lead_id' => $id,'leadedit' => $edit_lead ]);

    	

    	

    }



    function view_Lead($id=''){

        

        $userid = Auth::guard('main_users')->user()->id;

        

          $role = Auth::guard('main_users')->user()->emprole;



    	//$lead_lest = DB::table('main_lead_list')->join('main_countries','main_lead_list.country','=','main_countries.id')->join('alm_states','main_lead_list.state','=','alm_states.id')->join('alm_cities','main_lead_list.city','=','alm_cities.id')->where('main_lead_list.id',$id)->select('main_lead_list.*','main_countries.country','alm_states.name as state','alm_cities.name as city')->first();

        

           $lead_lest = DB::table('main_lead_list')->leftjoin('main_users','main_lead_list.created_by','main_users.id')->leftjoin('main_countries','main_lead_list.country','=','main_countries.id')->leftjoin('alm_states','main_lead_list.state','=','alm_states.id')->leftjoin('alm_cities','main_lead_list.city','=','alm_cities.id')->where('main_lead_list.status',1);

    

    	if($role != 1){

    	    $lead_lest->where('main_lead_list.created_by',$userid);

    	}

    	

    	$lead_lest = $lead_lest->where('main_lead_list.id',$id)->select('main_lead_list.*','main_users.userfullname','main_countries.country','alm_states.name as state','alm_cities.name as city')->first();

         

    	return  view('bd.view_lead',['lead' => $lead_lest,'lead_id' => $id]);



	}

  function timeline(Request $request){



    $timeline = DB::table('bd_timeline')->join('main_users','main_users.id','=','bd_timeline.user_id')->where('bd_timeline.lead_id',$request->lead_id)->where('bd_timeline.lead_status',$request->status)->select('bd_timeline.*','main_users.userfullname')->get();


    
      return  view('timeline',['timeline' => $timeline]);


  }

	

	function update_lead_status(Request $request){



		DB::table('main_lead_list')->where('id',$request->lead_id)->update(['lead_status' => $request->status]);



		return response()->json(['status' => 200, 'msg' => 'Successfully Change Status']);



	}





public function get_lead_logs(Request $request){

    

   // dd($request->all());

    $html = '';

    $lead_log = DB::table('lead_logs')->leftjoin('main_users','lead_logs.created_by','main_users.id')->where('lead_logs.lead_id',$request->lead_id)->where('lead_logs.created_by',$request->user_id);

  

  if(isset($request->convert)){

      $lead_log->where('lead_logs.status',$request->convert);

  }



  if(isset($request->status)){

	$lead_log->where('lead_logs.status',$request->status);

}



  

    

    $lead_log = $lead_log->select('lead_logs.*','main_users.userfullname')->get();

    $i = 1;

    

    if(count($lead_log) == 0){

           $html .= '<tr>

                                             <td colspan="7"> No Record Found</td>

                                            

                                          </tr>' ;

        

    }

    

    if(isset($lead_log)){

        foreach($lead_log as $lead_logs){

           $html .= '           <tr>

                                             <td>'. $i++.'</td>

                                             <td>

                                                '.$lead_logs->date.'

                                             </td>

                                             <td>'.$lead_logs->communication_type.'</td>

                                             <td>

                                                  '.$lead_logs->comment.'

                                             </td>

                                             <td> '.$lead_logs->userfullname.'

                                             </td>

                                             <td>  '.$lead_logs->next_date.'</td>

                                             <td>

                                                <a href="javascript:void(0)" onclick=edit_lead_log(this,'.$lead_logs->id.')> 

                                                <i class="mdi mdi-pen text-warning"

                                                      title="Edit">

                                                    

                                                </i>

                                                   <i class="mdi mdi-delete text-danger" href="javascript:void(0)"  onclick=delete_lead_log(this,'.$lead_logs->id.') id="sa-params"

                                                      title="Delete">

                                                   </i>

                                             </td>

                                          </tr>' ;

        }

   

        

        

                                   

    }

    

    	return response()->json(['status' => 200, 'msg' => 'successfully', 'lead_log' => $html]);

    

}



public function save_lead_logs(Request $request){

    

      $userid = Auth::guard('main_users')->user()->id;

    

   $logs = array(

       'lead_id' => $request->lead_id,

       'date' => $request->choose_date,

       'communication_type' => $request->commu_type,

       'comment' => $request->comment,

       'next_date' => $request->next_date,

       'created_by' => $userid,

	   'updated_by' => $userid,

	   'status' => $request->status??0,

       

       

       );
   


       if(isset($request->lead_log_id)){

        if($request->status == 0){
       $timeline = 4;
       $msg = 'Lead log Updated';
      }else if($request->status == 2){
         $timeline = 1;
         $msg = 'Account log Updated';
      }else if($request->status == 3){
        $timeline = 2;
         $msg = 'Contact log Updated';

       }else if($request->status == 5){
        $timeline = 5;
         $msg = 'Bill log Updated';

      }else{
         $timeline = 3;
          $msg = 'opportunity log Updated';
      }
       

       DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->lead_id,'lead_status' =>  $timeline,'msg' => $msg,'created_at' => date('Y-m-d h:i:s')]);

           

            $ist = DB::table('lead_logs')->where('id',$request->lead_log_id)->update($logs);

           

       }else{

       if($request->status == 0){
       $timeline = 4;
       $msg = 'Lead log Created';
      }else if($request->status == 2){
         $timeline = 1;
         $msg = 'Account log Created';
      }else if($request->status == 3){
        $timeline = 2;
         $msg = 'Contact log Created';

      }else if($request->status == 5){

        $timeline = 5;
         $msg = 'Bill log Created';

      }else{
         $timeline = 3;
          $msg = 'opportunity log Created';
      }

           
             DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->lead_id,'lead_status' =>  $timeline,'msg' => $msg,'created_at' => date('Y-m-d h:i:s')]);


            $ist = DB::table('lead_logs')->insert($logs);

           

       }

       

      

       

       if($ist){

           

           	return response()->json(['status' => 200, 'msg' => 'successfully Added']);

           

       }else{

           

            	return response()->json(['status' => 202, 'msg' => 'Not successfully Added']);

           

       }

    

}



public function delete_lead_logs(Request $request){

    

	$userid = Auth::guard('main_users')->user()->id;
  
      $lead_log = DB::table('lead_logs')->where('id',$request->lead_log_id)->first();
     
      if($lead_log->status == 0){
        $t_status = 4;

      }else if($lead_log->status == 2){
         $t_status = 1;

      }else if($lead_log->status == 3){
         $t_status = 2;

     }else if($lead_log->status == 5){
         $t_status = 5;



      }else{

         $t_status = 2;

      }
    

    
      DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $lead_log->lead_id,'lead_status' => $t_status,'msg' => ' Logs Deleted','created_at' => date('Y-m-d h:i:s')]);

    $delete_log = DB::table('lead_logs')->where('id',$request->lead_log_id)->delete();

    

      if($delete_log){

           
           


           	return response()->json(['status' => 200, 'msg' => 'successfully Delete']);

           

       }else{

           

            	return response()->json(['status' => 202, 'msg' => 'Not successfully Delete']);

           

       }

    

}



function edit_lead_logs(Request $request){



	$userid = Auth::guard('main_users')->user()->id;

    

     $edit_log = DB::table('lead_logs')->where('id',$request->lead_log_id)->first();

    

      if($edit_log){

           

           	return response()->json(['status' => 200, 'msg' => 'successfully Delete','lead_detail' => $edit_log]);

           

       }else{

           

            	return response()->json(['status' => 202, 'msg' => 'Not successfully edit']);

           

       }

    

}



    public function deletelead($id){



		$userid = Auth::guard('main_users')->user()->id;


   
    	 $leadinst = DB::table('main_lead_list')->where('id',$id)->delete();

        

          if($leadinst){

     DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $id,'lead_status' => 4,'msg' => 'Lead Deleted','created_at' => date('Y-m-d h:i:s')]);


          	return redirect('viewLeadList')->with('msg','Successfully Delete Lead');



          }else{



          	return redirect()->back()->with('msg','Not insert Lead');



          }







    }



function convert_lead(Request $request){





	$userid = Auth::guard('main_users')->user()->id;



	$leadDetails = DB::table('main_lead_list')->where('id',$request->lead_id)->first();




	$addCount = array(

		'account_id' => $request->lead_id,

		'owner' => $leadDetails->owner,

        'salutation' =>$leadDetails->prefix,

        'phone' => $leadDetails->phone,

        'first_name' => $leadDetails->fname,

        'last_name' => $leadDetails->lname,

        'title' => $leadDetails->title,

        'other_phone' => $leadDetails->mobile,

        'account_name' => $leadDetails->company,

        'mobile' => $leadDetails->mobile,

      

        'fax' => $leadDetails->fax,

        

        'email' => $leadDetails->email,

        'created_by' => $userid,

       

       

       );



	$contect_id  = DB::table('main_contact')->insertGetId($addCount);

  if(isset($request->opportunity)){
  $lead = array(

     'account_id' =>  $request->lead_id,

    'owner' => $leadDetails->owner,

    'opp_name' => $leadDetails->company,

    

    'created_at' => date('Y-m-d H:i:s'),

    'status' => 1,

    'created_by' =>  $userid,

  );

  $opportunity_id  = DB::table('opportunity')->insertGetId($lead);
  DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $opportunity_id,'lead_status' => 3,'msg' => 'opportunity Created','created_at' => date('Y-m-d h:i:s')]);

}



	DB::table('main_lead_list')->where('id',$request->lead_id)->update(['lead_status' => 5]);

DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $contect_id,'lead_status' => 2,'msg' => 'Contacted Created','created_at' => date('Y-m-d h:i:s')]);

DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->lead_id,'lead_status' => 1,'msg' => 'Account Created','created_at' => date('Y-m-d h:i:s')]);
DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->lead_id,'lead_status' => 4,'msg' => 'Lead Converted','created_at' => date('Y-m-d h:i:s')]);


	return response()->json(['status' => 200, 'msg' => ' Successfully Convery Lead']);



}

    

}

