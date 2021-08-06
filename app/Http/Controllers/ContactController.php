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



class ContactController extends Controller

{

   public function __construct()
    {
        date_default_timezone_set('Asia/Calcutta'); 
    }


    function contact_list(){


     $userid = Auth::guard('main_users')->user()->id;

        

        $contact_list = DB::table('main_contact')->leftjoin('main_lead_list','main_lead_list.id','=','main_contact.account_id')->leftjoin('main_users','main_contact.created_by','=','main_users.id')->where('main_contact.owner',$userid)->select('main_contact.*','main_users.userfullname','main_lead_list.company')->get();

        

        return view('contact_file.list_contact',['contact_list' => $contact_list]);

    }





function add_contact(){

    

    return view('contact_file.add_contact');

    

}



public function insert_contact(Request $request){

    

    $userid = Auth::guard('main_users')->user()->id;

    

   $addCount = array(

        'account_id' =>  $request->ac_name,

        'salutation' => $request->salutation,

        'phone' => $request->phone,

        'first_name' => $request->first_name,

        'last_name' => $request->last_name,

        'title' => $request->title,

        'other_phone' => $request->other_phone,

        

        'mobile' => $request->mobile,

        'deportment' => $request->deportment,

        'fax' => $request->fax,

        'dob' => $request->dob,

        'email' => $request->email,

        'report_to' => $request->report_to,

        'assistant' => $request->assistant,

        'lead_sourse' => $request->lead_source,

        'desc' => $request->desc,

        'level' => $request->level,

         'lang' => $request->lang,

        'created_by' => $userid,

       

       

       );
       
      

       

        if(isset($request->contact_id)){

            DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->contact_id,'lead_status' =>2,'msg' => 'Contact updated','created_at' => date('Y-m-d h:i:s')]);

             $insertcontact = DB::table('main_contact')->where('id',$request->contact_id)->update($addCount);

              $insertcontact = $request->contact_id;

       }else{

           

            $insertcontact = DB::table('main_contact')->insertGetId($addCount);

             DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $insertcontact,'lead_status' =>2,'msg' => 'Contact created','created_at' => date('Y-m-d h:i:s')]);

       }

       

     

       

         

          $billing = array(

              

              'lead_id' => $insertcontact,

              'street' => $request->billing_street,

              'contry' => $request->bill_country,

              'state' => $request->billing_state,

              'city' => $request->billing_city,

              'zip' => $request->billing_zip,

              );

               if(isset($request->contact_id)){

                   

                    DB::table('bill_address')->where('lead_id',$request->contact_id)->update($billing);

                   

               }else{

                   

                    DB::table('bill_address')->insert($billing);

               }

             

              

                $shipping = array(

              

              'lead_id' => $insertcontact,

              'street' => $request->shipping_street,

              'contry' => $request->shipping_country,

              'state' => $request->shipping_state,

              'city' => $request->shipping_city,

              'zip' => $request->shipping_zip,

              );

              

               if(isset($request->contact_id)){

                   

                    DB::table('shipping_address')->where('lead_id',$request->contact_id)->update($shipping);

                   

               }else{

                   

                    DB::table('shipping_address')->insert($shipping);

                   

               }

               

                 if($insertcontact){

                  

                  	return response()->json(['status' => 200, 'msg' => 'Added successfully']);

                  

              }else{

                  

                  	return response()->json(['status' => 202, 'msg' => 'Notsuccessfully']);

                  

              }

    

}



 public function edit_contact($id){

        

           $editcontact = DB::table('main_contact')->where('id',(int)$id)->first();

           $editbill = DB::table('bill_address')->where('lead_id',(int)$id)->first();

           $editshipp = DB::table('shipping_address')->where('lead_id',(int)$id)->first();

          

           return view('contact_file.edit_contact',['editContact' => $editcontact,'contact_id' => $id,'editbill' => $editbill,'editshipp' => $editshipp]);

           

       }

       

       function view_contact($id){

           

           

            $viewcontact = DB::table('main_contact')->leftjoin('main_users','main_contact.created_by','=','main_users.id')->where('main_contact.id',(int)$id)->select('main_contact.*','main_users.userfullname')->first();

          
              $timeline = DB::table('bd_timeline')->join('main_users','main_users.id','=','bd_timeline.user_id')->where('bd_timeline.lead_id',$id)->where('bd_timeline.lead_status',2)->select('bd_timeline.*','main_users.userfullname')->get();

          

           $viewbill = DB::table('bill_address')->where('lead_id',(int)$id)->first();

           $viewshipp = DB::table('shipping_address')->where('lead_id',(int)$id)->first();

          

           return view('contact_file.view_contact',['viewcontact' => $viewcontact,'contact_id' => $id,'viewbill' => $viewbill,'viewshipp' => $viewshipp,'timeline' => $timeline]);

           

           

       }



    

}

