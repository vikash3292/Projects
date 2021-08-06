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


class AdminController extends Controller
{

function requisition(){

	return view('adminmodule.requisition');
}

function vendor_management(){

	return view('adminmodule.vendor_management');
}

function purchase_order(){

	return view('adminmodule.purchase_order');
}

function bill_payment(){

	$pay = DB::table('tm_bill_payment')->join('tm_vendor','tm_vendor.id','=','tm_bill_payment.vendor')->select('tm_bill_payment.*','tm_vendor.vendor_name')->get();

	return view('adminmodule.bill_payment',['bill_pay' => $pay]);
}


function bill_payment_add(Request $request){

	   $userid = Auth::guard('main_users')->user()->id;

       // dd($request->all());

	  if($request->hasFile('file')) {

           $file = $request->file('file');



             $original_name = strtolower(trim($file->getClientOriginalName()));

             $name = time().rand(100,999).$original_name;


           $file->move(public_path().'/uploads/attach/', $name);

           $image['files'] = '/uploads/attach/'. $name;

          // $user->save();

        }

        $image['bill_name'] = $request->billname;
         $image['bill_type'] = $request->bill_type;
          $image['bill_no'] = $request->bill_no;
           $image['bill_amt'] = $request->bill_amt;
            $image['vendor'] = $request->vendor;
             $image['payment_type'] = $request->paytype;
             if($request->paytype =='quarterly'){

             	$image['month'] = $request->choose_month;
             	$image['day'] = $request->choose_day;
             	$image['quarter'] = $request->Quarter1;
             	
             }
              $image['start_date'] = $request->start_date;
               $image['due_date'] = $request->due_date;
                $image['created_by'] = $userid ;
                 $image['update_by'] = $userid ;
                 $image['created_at'] = date('Y-m-d h:i:s');
                 $image['update_at'] = date('Y-m-d h:i:s');


                 if(isset($request->bill_id)){

                 	         DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' =>$request->bill_id,'lead_status' => 5,'msg' => 'Lead Update','created_at' => date('Y-m-d h:i:s')]);


                 	DB::table('tm_bill_payment')->where('id',$request->bill_id)->update($image);
                 return response()->json(['status' => 200, 'msg' => ' successfully updated']);

                 }else{

                 	$leadid = DB::table('tm_bill_payment')->insertGetId($image);

             DB::table('bd_timeline')->insert(['user_id' => $userid ,'lead_id' =>$leadid ,'lead_status' => 5,'msg' => 'Bill Lead Created','created_at' => date('Y-m-d h:i:s')]);

                 return response()->json(['status' => 200, 'msg' => ' successfully Added']);

                 }

                 


        

}

function delete_bill($id){

	DB::table('tm_bill_payment')->where('id',$id)->delete();
	return redirect()->back();

}

function edit_bill(Request $request){

	$get_bill = DB::table('tm_bill_payment')->where('id',$request->bill_id)->first();

	 return response()->json(['status' => 200, 'msg' => ' successfully Added','bill' => $get_bill ]);

}

function view_bill($id){

  $get_bill = DB::table('tm_bill_payment')->join('main_users','main_users.id','=','tm_bill_payment.created_by')->join('tm_vendor','tm_vendor.id','=','tm_bill_payment.vendor')->join('tm_bill_master','tm_bill_master.id','=','tm_bill_payment.bill_type')->select('tm_bill_payment.*','tm_vendor.vendor_name','main_users.userfullname','tm_bill_master.bill_name')->where('tm_bill_payment.id',$id)->first();

	return view('adminmodule.view_bill_payement',['view_bill' => $get_bill,'lead_id' => $id ]);

}

function add_purchage_order(Request $request){

    $userid = Auth::guard('main_users')->user()->id;

  

    if($request->hasFile('files')) {
           $file = $request->file('files');

             $original_name = strtolower(trim($file->getClientOriginalName()));
             $name = time().rand(100,999).$original_name;

           //using the array instead of object
           //$image['filePath'] = $name;
           $file->move(public_path().'/uploads/attach/', $name);
           $file_name = '/uploads/attach/'. $name;
          // $user->save();
        }else{

          $file_name  = '';

        }

        $arr = array(
          'pm_order_no' => $request->purchase_order_no,
          'pm_order_name' => $request->purchase_order_name,
          'date' => $request->date,
          'desc' => $request->desc,
          'status' => $request->status,
          'files' => $file_name,
          'created_by' => $userid,
          'updated_by' => $userid,
          'created_at' => date('Y-m-d h:i:s'),
           'updated_at' => date('Y-m-d h:i:s'),
    
        );
        DB::table('tm_purchage_order')->insert($arr);

         return response()->json(['status' => 200, 'msg' => ' successfully Added']);



}


}