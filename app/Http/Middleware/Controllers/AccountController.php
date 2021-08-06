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



class AccountController extends Controller

{

   public function __construct()
    {
        date_default_timezone_set('Asia/Calcutta'); 
    }


   public function account(){

       

       return view('account.account_list');

   }

    

    public function  add_account(){

        	 $userid = Auth::guard('main_users')->user()->id;
            $role = Auth::guard('main_users')->user()->emprole;

        

            	 $useridlist = [];

    	 $leadowner = DB::table('main_users');
       if($role !=1){
        $leadowner->where('reporting_manager','=',(int)$userid);
       }
       


     $leadowner = $leadowner->where('isactive',1)->whereIn('emprole',[12,13,14])->select('id')->get();

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

    	 $parent_account = DB::table('main_lead_list');
   if($role !=1){
        $parent_account->where('owner',$userid);
       }
     
     $parent_account = $parent_account->where('lead_status',5)->get();

    	

        

          return view('account.add_account',['userlist' => $userlistbd,'parent_ac' => $parent_account]);

        

    }

    

    function insert_account(Request $request){

        

       

        

         $userid = Auth::guard('main_users')->user()->id;

       

                 $lead = array(



          	'owner' => $request->lead_ownere,

          	'phone' => $request->phone,

             'ac_type' => $request->ac_type,

          	'ac_no' =>  $request->ac_no,

          	'company' => $request->account_name,

          	'fax' => $request->fax,

          	'ownership' => $request->ownership,

          	'stage' => $request->stage,

          'parent_ac' (!empty($request->p_other_ac)?$request->p_other_ac??'':$request->parent_ac??''),

          	'website' => $request->website,

          	'industry' => $request->industry,

          	'lead_status' => 5,

          	'annual_revenue' => $request->ann_rev,

          	'rating' => $request->rating,

          	'no_of_emp' => $request->emp,

          	'created_at' => date('Y-m-d H:i:s'),

          	'status' => 1,

          	'created_by' =>  $userid,

          	

          );

          

          

          if(isset($request->lead_id)){

               DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->lead_id,'lead_status' =>1,'msg' => 'Account updated','created_at' => date('Y-m-d h:i:s')]);


              $leadinst = DB::table('main_lead_list')->where('id',$request->lead_id)->update($lead);

              $leadinst = $request->lead_id;

          }else{

              

               $leadinst = DB::table('main_lead_list')->insertGetId($lead);

          }

          DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $leadinst,'lead_status' =>1,'msg' => 'Account created','created_at' => date('Y-m-d h:i:s')]);



         

          

          $billing = array(

              

              'lead_id' => $leadinst,

              'street' => $request->bill_street,

              'contry' => $request->bill_country,

              'state' => $request->bill_state,

              'city' => $request->bill_city,

              'zip' => $request->bill_zip,

              );

               if(isset($request->lead_id)){

                   

                    DB::table('bill_address')->where('lead_id',$request->lead_id)->update($billing);

                   

               }else{

                   

                    DB::table('bill_address')->insert($billing);

               }

             

              

                $shipping = array(

              

              'lead_id' => $leadinst,

              'street' => $request->shipping_street,

              'contry' => $request->shipping_country,

              'state' => $request->shipping_state,

              'city' => $request->shipping_city,

              'zip' => $request->shipping_zip,

              );

              

               if(isset($request->lead_id)){

                   

                    DB::table('shipping_address')->where('lead_id',$request->lead_id)->update($shipping);

                   

               }else{

                   

                    DB::table('shipping_address')->insert($shipping);

                   

               }

             

              

               $add_info = array(

              

              'lead_id' => $leadinst,

              'cust_priority' => $request->cust_pri,

              'sla' => $request->sla,

              'sla_date' => $request->sla_date,

              'sla_no' => $request->sla_serial,

              'no_of_location' => $request->no_location,

              'upsell_opportunity' => $request->upsell,

              'active' => $request->shipping_zip,

              'long_desc' => $request->desc,

              

              );

              

               if(isset($request->lead_id)){

                   

                   DB::table('addition_info')->where('lead_id',$request->lead_id)->update($add_info);

                   

               }else{

                   

                   DB::table('addition_info')->insert($add_info);

                   

               }

              

              

              if($leadinst){

                  

                  	return response()->json(['status' => 200, 'msg' => 'Added successfully']);

                  

              }else{

                  

                  	return response()->json(['status' => 202, 'msg' => 'Notsuccessfully']);

                  

              }

              

              

       

    }

    

    

    public function edit_account($id){

        

         $userid = Auth::guard('main_users')->user()->id;

         

                     	 $useridlist = [];

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

    	       $parent_account = DB::table('main_lead_list')->where('status',5)->get();

    	       $edit_lead = DB::table('main_lead_list')->where('id',$id)->first();

    	        $edit_info = DB::table('addition_info')->where('lead_id',$id)->first();

    	        $edit_billing = DB::table('bill_address')->where('lead_id',$id)->first();

    	         $editshipping = DB::table('shipping_address')->where('lead_id',$id)->first();

    	       

                 

        

          return view('account.edit_account',['userlist' => $userlistbd,'parent_ac' => $parent_account,'editLead' =>$edit_lead,'editinfo' => $edit_info,'editbill' => $edit_billing,'editshipping' =>$editshipping,'lead_id' => $id ]);

    	 

        

        

        

    }

    

    public function get_account(Request $request){

        

         $userid = Auth::guard('main_users')->user()->id;

        

        $html = '';

        

        $getAccount = DB::table('main_lead_list')->leftjoin('main_users','main_lead_list.created_by','=','main_users.id')->where('main_lead_list.created_by',$userid)->where('lead_status',5)->select('main_lead_list.*','main_users.userfullname')->get();

        

        $i = 1;

        if(isset($getAccount)){

        foreach($getAccount as $getAccounts){

            

            $edit = URL::to('edit-account').'/'.$getAccounts->id;

             $view = URL::to('view-account').'/'.$getAccounts->id;

            

        $html .='      <tr>

                                                <td>'.$i++.'</td>

                                                <td>'.$getAccounts->company.'</td>

                                                <td>'.$getAccounts->website.'</td>

                                                <td>'.$getAccounts->phone.'</td>

                                                <td>'.$getAccounts->userfullname.'</td>

                                                <td title="View">

                                                    <a href="'.$view.'" class="font-blue"><i

                                                            class="fa fa-eye"></i></a>

                                                    <a href="'.$edit.'"> <i class="mdi mdi-pen text-warning"

                                                            title="Edit"></i></a>

                                                            

                                                    <i onclick="delete_account_lead(this,'.$getAccounts->id.')" class="mdi mdi-delete text-danger" id="sa-params"

                                                        title="Delete"></i>

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

          $userid = Auth::guard('main_users')->user()->id;

            $get = DB::table('main_lead_list')->where('id',$request->account_lead)->delete();

            DB::table('addition_info')->where('lead_id',$request->account_lead)->delete();

            DB::table('bill_address')->where('lead_id',$request->account_lead)->delete();

             DB::table('shipping_address')->where('lead_id',$request->account_lead)->delete();

              DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->account_lead,'lead_status' =>1,'msg' => 'Account Delected','created_at' => date('Y-m-d h:i:s')]);

             return response()->json(['status' => 200, 'msg' => 'successfully Delected']);

            

        } 

        

       function view_account($id){

           

            $role = Auth::guard('main_users')->user()->emprole;



            $timeline = DB::table('bd_timeline')->join('main_users','main_users.id','=','bd_timeline.user_id')->where('bd_timeline.lead_id',$id)->where('bd_timeline.lead_status',1)->select('bd_timeline.*','main_users.userfullname')->get();


           $lead_lest = DB::table('main_lead_list')->leftjoin('shipping_address','main_lead_list.id','shipping_address.lead_id')->leftjoin('bill_address','main_lead_list.id','bill_address.lead_id')->leftjoin('addition_info','main_lead_list.id','addition_info.lead_id')->leftjoin('main_users','main_lead_list.created_by','main_users.id')->leftjoin('main_countries','main_lead_list.country','=','main_countries.id')->leftjoin('alm_states','main_lead_list.state','=','alm_states.id')->leftjoin('alm_cities','main_lead_list.city','=','alm_cities.id')->where('main_lead_list.status',1);

    

    	if($role != 1){

    	    $lead_lest->where('main_lead_list.created_by',$userid);

    	}

    	

    	$lead_lest = $lead_lest->where('main_lead_list.id',$id)->select('main_lead_list.*','main_users.userfullname','main_countries.country','alm_states.name as state','alm_cities.name as city','shipping_address.street as shipping_street','bill_address.street as billing_address','addition_info.*')->first();



         

           return view('account.view_account',['lead' => $lead_lest,'lead_id' => $id,'timeline' => $timeline]);

       }

       

       function delete_contact(Request $request){

             $userid = Auth::guard('main_users')->user()->id;

           $deel = DB::table('main_contact')->where('id',$request->contact_id)->delete();

            DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->contact_id,'lead_status' =>2,'msg' => 'Contact Delected','created_at' => date('Y-m-d h:i:s')]);

             return response()->json(['status' => 200, 'msg' => 'successfully Delected']);

           

       }

       

      

    

}

