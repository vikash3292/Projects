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



class OpportunityController extends Controller

{


 public function __construct()
    {
        date_default_timezone_set('Asia/Calcutta'); 
    }

   function list_opportunity(){



    $userid = Auth::guard('main_users')->user()->id;

       

    $opp_list = DB::table('opportunity')->leftjoin('main_lead_list','main_lead_list.id','=','opportunity.account_id')->leftjoin('main_users','opportunity.created_by','=','main_users.id')->where('opportunity.owner',$userid)->select('opportunity.*','main_users.userfullname','main_lead_list.company')->get();

     

    

     

       

       return view('opportunity.list_opportunity',['opp_list' => $opp_list ]);

   }



   function delete_opportunity($id){


     $userid = Auth::guard('main_users')->user()->id;
    $det = DB::table('opportunity')->where('id',$id)->delete();


DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $id,'lead_status' =>3,'msg' => 'opportunity Deleted','created_at' => date('Y-m-d h:i:s')]);
    

    return redirect()->back()->with('msg','successfully Deleted');





   }

   

   function add_opportunity(){

       $Country = DB::table('main_countries')->where('isactive','=',1)->get();
      // $state = DB::table('alm_states')->get();
      // $alm_cities = DB::table('alm_cities')->get();

  return view('opportunity.add_opportunity',['Country' => $Country]);

   }

   

    function view_opportunity($id){



        $userid = Auth::guard('main_users')->user()->id;

       $timeline = DB::table('bd_timeline')->join('main_users','main_users.id','=','bd_timeline.user_id')->where('bd_timeline.lead_id',$id)->where('bd_timeline.lead_status',3)->select('bd_timeline.*','main_users.userfullname')->get();


        $get_opp = DB::table('opportunity')->leftjoin('main_lead_list','main_lead_list.id','=','opportunity.account_id')->leftjoin('main_users','opportunity.created_by','=','main_users.id')->leftjoin('alm_states','opportunity.opp_state','=','alm_states.id')->leftjoin('alm_cities','opportunity.opp_city','=','alm_cities.id')->leftjoin('main_countries','opportunity.opp_country','=','main_countries.id')->where('opportunity.owner',$userid)->where('opportunity.id',$id)->select('opportunity.*','main_users.userfullname','main_lead_list.company','alm_cities.name as city','alm_states.name as state','main_countries.country','main_lead_list.sourse')->first();

      



       

       return view('opportunity.view_opportunity',['view_opp' => $get_opp,'opp_id' =>  $id,'timeline' => $timeline]);

   }

   

   function edit_opportunity($id){


    $get_opp = DB::table('opportunity')->where('id',$id)->first();
   
    
    $Country = DB::table('main_countries')->where('isactive','=',1)->get();
    $state = DB::table('alm_states')->where('country_id',$get_opp->opp_country??0)->get();
    $alm_cities = DB::table('alm_cities')->where('state_id',$get_opp->opp_state??0)->get();

      

       return view('opportunity.edit_opportunity',['edit_opp' => $get_opp,'Country' => $Country,'state'=>$state,'alm_cities' =>$alm_cities ]);

   }





   public function insert_opp(Request $request){



    $userid = Auth::guard('main_users')->user()->id;



    $opp_inst = array(

         'account_id' => $request->ac_name,

         'owner' => $userid ,

         'status' => $request->ac_name,

         'created_by' => $request->ac_name,

         'amount' => $request->opp_amount,

         'exp_revance' => $request->opp_exp_revenue,

         'close_date' => $request->opp_close_date,

         'opp_name' => $request->opp_name,

         'project_intrest' => $request->opp_product_inst,

         'org_name' => $request->opp_org_name,

         'opp_country' => $request->country,

         'opp_state' => $request->state,

         'opp_city' => $request->city,

         'opp_street' => $request->opp_street,

         'opp_zip' => $request->opp_zip,





    );





    if(isset($request->opp_id)){


    DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $request->opp_id,'lead_status' =>3,'msg' => 'opportunity updated','created_at' => date('Y-m-d h:i:s')]);
    
        DB::table('opportunity')->where('id',$request->opp_id)->update($opp_inst);

        return response()->json(['status' => 200, 'msg' => 'successfully Updated']);



    }else{



      $opp_id =  DB::table('opportunity')->insertGetId($opp_inst);

          DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' => $opp_id,'lead_status' =>3,'msg' => 'opportunity Created','created_at' => date('Y-m-d h:i:s')]);

        return response()->json(['status' => 200, 'msg' => 'successfully Added']);



    }



   }

   

    function sales_dashboard(){

       

       return view('opportunity.dashboard');

   }

   

   

}

