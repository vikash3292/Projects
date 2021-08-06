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




class ItController extends Controller

{
   function assets_list(){



   	return view('it.asstes_list');

   }

   function all_assets(Request $Request){

   	$main_assets = DB::table('main_assets')->where('status',1)->get();
   	$html = '';
   	$i = 1;
   	foreach ($main_assets as $key => $main_asset) {
   	$url = URL::to('view-assets').'/'.$main_asset->id;

    $html .= '<tr title="View"> 
                                               <td>'.$i++.'</td>
                                               <td>'.$main_asset->assets_name.'</td>
                                               <td>'.$main_asset->assets_type.'</td>
                                               <td>'.$main_asset->asstes_serial.'</td>
                                               <td>'.$main_asset->start_date.'</td>
                                               <td>'.$main_asset->end_date.'</td>
                                               <td>

                                                <a  href="'.$url.'"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  &nbsp;
                                                   <a onclick="edit_assets(this,'.$main_asset->id.')" href="javascript:void(0)"> <i class="mdi mdi-pen text-warning"
                                                           title="Edit"></i></a>
                                                           <a onclick="delete_assets(this,'.$main_asset->id.')" href="javascript:void(0)"> <i class="fa fa-trash text-danger"
                                                           title="Edit"></i></a>
                                                         
                                                          
                                               </td>
                                           </tr>';

   	}

   	  	return response()->json(['status' => 200, 'assets' => $html]);


   }

   function add_assets(Request $request){

   	  $userid = Auth::guard('main_users')->user()->id;

        

   	$arr = array(

'assets_name' => $request->assets_name,
'assets_type' => $request->assets_type,
'asstes_serial' => $request->serial_no,
'start_date' => $request->start_date,
'end_date' => $request->end_date,
'created_by' =>  $userid,
'updated_by' =>  $userid,
'created_at' => date('Y-m-d h:i:s'),
'updated_at' => date('Y-m-d h:i:s'),

   	);

if(isset($request->assets_id)){
	   	DB::table('main_assets')->where('id',$request->assets_id)->update($arr);


  DB::table('asset_timeline')->insert(['asset_id' => $request->assets_id,'mag' =>'Update Assets','created_by' =>  $userid,'updated_by' => $userid,'created_at' =>date('Y-m-d h:i:s'),'updated_at' =>date('Y-m-d h:i:s') ]);

   		return response()->json(['status' => 200, 'msg' => 'Successfully Updated']);


}else{

	  $asset_id =	DB::table('main_assets')->insertGetId($arr);

        DB::table('asset_timeline')->insert(['asset_id' => $asset_id,'mag' =>'Add New Assets','created_by' =>  $userid,'updated_by' => $userid,'created_at' =>date('Y-m-d h:i:s'),'updated_at' =>date('Y-m-d h:i:s') ]);

   		return response()->json(['status' => 200, 'msg' => 'Successfully Added']);


}


   }
	
	function edit_assets(Request $request){

		$get_asset = DB::table('main_assets')->where('id',$request->asset_id)->first();
   		return response()->json(['status' => 200, 'assets' => $get_asset]);


	}

	function download_assets(){


     $userid = Auth::guard('main_users')->user()->id;

     
   $all_assets = DB::table('main_assets')->where('status',1)->get();



    $columns = array('S.No', 'Assets Name', 'Assets Type', 'Serial No', 'Start Date','End Date');

    
    $filename = public_path("uploads/csv/Assets_'".time()."'_asset.csv");
    $handle = fopen($filename, 'w+');
    fputcsv($handle, $columns);

         $i = 1;
        foreach($all_assets as $review) {

           fputcsv($handle, array($i++, ucwords($review->assets_name), $review->assets_type, $review->asstes_serial, $review->start_date, $review->end_date));
        }
        
       fclose($handle);

       $headers = array(
        'Content-Type' => 'text/csv'
       
        );


    return Response()->download($filename);


	}

	function assign_assets(Request $request){


   	$assign_assets = DB::table('grc_assets')->join('main_users','main_users.id','=','grc_assets.user_id')->where('grc_assets.status',1)->select('grc_assets.*','main_users.userfullname')->get();
   	$html = '';
   	$i = 1;
   	foreach ($assign_assets as $key => $assign_asset) {
   	$url = URL::to('view-assign-user').'/'.$assign_asset->id;

    $html .= '<tr title="View"> 
                                               <td>'.$i++.'</td>
                                               <td>'.$assign_asset->userfullname.'</td>
                                               <td>'.$assign_asset->name.'</td>
                                              <td>'.$assign_asset->type.'</td>
                                               <td>'.$assign_asset->number.'</td>
                                               
                                               <td>

                                                <a  href="'.$url.'"> <i class="fa fa-eye" aria-hidden="true"></i></a>

                                                 &nbsp;
                                                   <a  onclick="delete_assign_assets(this,'.$assign_asset->id.')" href="javascript:void(0)"> <i class="fa fa-trash text-danger"
                                                           title="Edit"></i></a>
           
                                                           
                                               </td>
                                           </tr>';

   	}

   	  	return response()->json(['status' => 200, 'assets' => $html]);

	}

	function delete_assign_assets(Request $request){

      $userid = Auth::guard('main_users')->user()->id;

    $assign_assets = DB::table('grc_assets')->where('id',$request->assign_id)->first();
    $main_assets = DB::table('main_assets')->where('asstes_serial',$assign_assets->number)->first();


     DB::table('asset_timeline')->insert(['asset_id' => $main_assets->id,'user_id' =>$assign_assets->user_id,'mag' =>'Return Assets','created_by' =>  $userid,'updated_by' => $userid,'created_at' =>date('Y-m-d h:i:s'),'updated_at' =>date('Y-m-d h:i:s') ]);


		DB::table('grc_assets')->where('id',$request->assign_id)->update(['status' => 0,'updated_at' =>date('Y-m-d h:i:s')]);



			return response()->json(['status' => 200, 'msg' => 'Successfully deleted']);

	}

	function all_user_assets(Request $request){

		$main_assets = DB::table('main_assets')->where('status',1)->get();
         $user_assign_list = [];
         $assign_assets = DB::table('grc_assets')->where('status',1)->get();

         foreach ($assign_assets as $key => $assign_assetss) {
         $user_assign_list[] = $assign_assetss->number;
         }

   	$html = '';
   	$i = 1;
   	foreach ($main_assets as $key => $main_asset) {

   	
   	

    $html .= '<tr title="View">'; 

if(!in_array($main_asset->asstes_serial, $user_assign_list)){

	$html .= '<td>  <div class="custom-control custom-checkbox"><input
                                 type="checkbox" name="assign_assets"  value='.$main_asset->id.' class="custom-control-input user_assign_new_assets"
                                 id="customControlInline'.$i.'"> <label
                                 class="custom-control-label"
                                 for="customControlInline'.$i.'"></label>
                     </div></td>';

                         $html .= '<td>'.$i++.'</td>
                                               <td>'.$main_asset->assets_name.'</td>
                                               <td>'.$main_asset->assets_type.'</td>
                                               <td>'.$main_asset->asstes_serial.'</td>
                                               <td>'.$main_asset->start_date.'</td>
                                               <td>'.$main_asset->end_date.'</td>
                                               
                                           </tr>';

}


                                 

   	}

   	  	return response()->json(['status' => 200, 'assets' => $html]);

	}


function user_assign_assets(Request $request){
	$assets = json_decode($request->assets_id);

   $userid = Auth::guard('main_users')->user()->id;

	foreach ($assets as $key => $value) {

	$get_main_assets = DB::table('main_assets')->where('id',$value)->first();
    DB::table('grc_assets')->where('number',$get_main_assets->asstes_serial)->where('user_id',$request->user_id)->delete();
	DB::table('grc_assets')->insert([
      'user_id' => $request->user_id,
      'name' => $get_main_assets->assets_name,
      
      'type' => $get_main_assets->assets_type,
      'number' => $get_main_assets->asstes_serial,
      'created_at' => date('Y-m-d h:s:i'),
     
      'status' => 1

	]);


   DB::table('asset_timeline')->insert(['asset_id' => $get_main_assets->id,'user_id' =>$request->user_id,'mag' =>'Assign Assets','created_by' =>  $userid,'updated_by' => $userid,'created_at' =>date('Y-m-d h:i:s'),'updated_at' =>date('Y-m-d h:i:s') ]);

	}

	return response()->json(['status' => 200, 'msg' =>'Successfully Assign Assets']);

}

function ticket(){
    $userid= Auth::guard('main_users')->user()->id;

  $role = Auth::guard('main_users')->user()->emprole;

  $ticket = DB::table('main_ticket')->join('main_users','main_users.id','=','main_ticket.user_id');

  if($role !=1 && $role !=6){
   $ticket->where('user_id', $userid);
  }
  $ticket =$ticket->select('main_ticket.*','main_users.userfullname')->get();



   return view('it.ticket_list',['ticket' =>$ticket]);
}

function ticket_view($id){

  $get_ticket = DB::table('main_ticket')->where('id',$id)->first();

   return view('it.ticket_view',['view_ticket' => $get_ticket]);

}


function add_ticket(Request $request){

     $userid = Auth::guard('main_users')->user()->id;
     if($request->selectother == 'other'){
     $assetnane = $request->assets_name; 
     }else{
      $assetnane = $request->selectother; 
     }

  DB::table('main_ticket')->insert(
    ['user_id' => $userid,
    'ticket_name' =>  $assetnane ,
    'subject' => $request->subject,
    'desc' => $request->desc,
    'created_by' => $userid,
    'update_by' => $userid,
    'created_at' => date('Y-m-d h:i:s'),
    'update_at' => date('Y-m-d h:i:s'),


  ]

  );

    return response()->json(['status' => 200, 'msg' =>'Successfully Added']);


}

function add_comment_ticket(Request $request){

  DB::table('main_ticket')->where('id',$request->ticket_id)->update(['status' => $request->status,'commnet' => $request->comment]);

   return response()->json(['status' => 200, 'msg' =>'Successfully Added Commnent']);

}

function view_assets($id){

  $asset_view = DB::table('main_assets')->first();
  $asset_timeline = DB::table('main_assets')->leftjoin('grc_assets','grc_assets.number','=','main_assets.asstes_serial')->leftjoin('main_users','main_users.id','=','grc_assets.user_id')->where('main_assets.id',$id)->select('main_assets.*','main_users.userfullname','main_assets.assets_name as main_asset_name','grc_assets.created_at as assign_date','grc_assets.updated_at as return_date')->get();

 

  return view('it.view_asset',['view_assets' => $asset_view,'timeline' => $asset_timeline,'asset_id' =>$id ]);

}

function view_assign_user($id){



   $asset_timeline = DB::table('main_assets')->leftjoin('grc_assets','grc_assets.number','=','main_assets.asstes_serial')->leftjoin('main_users','main_users.id','=','grc_assets.user_id')->where('grc_assets.id',$id)->select('main_assets.*','main_users.userfullname','main_assets.assets_name as main_asset_name','grc_assets.created_at as assign_date','grc_assets.updated_at as return_date','grc_assets.user_id')->first();

    $timeline = DB::table('main_assets')->leftjoin('grc_assets','grc_assets.number','=','main_assets.asstes_serial')->leftjoin('main_users','main_users.id','=','grc_assets.user_id')->where('grc_assets.user_id',$asset_timeline->user_id)->select('main_assets.*','main_users.userfullname','main_assets.assets_name as main_asset_name','grc_assets.created_at as assign_date','grc_assets.updated_at as return_date')->get();



   return view('it.view_user_asset',['viewuuser_asset' => $asset_timeline,'timeline' => $timeline ]);

}

function delete_assets(Request $request){

     $userid = Auth::guard('main_users')->user()->id;

  DB::table('asset_timeline')->insert(['asset_id' => $request->asset_id,'mag' =>'Delete Assets','created_by' =>  $userid,'updated_by' => $userid,'created_at' =>date('Y-m-d h:i:s'),'updated_at' =>date('Y-m-d h:i:s') ]);

  DB::table('main_assets')->where('id',$request->asset_id)->update(['status' => 0]);

   return response()->json(['status' => 200, 'msg' =>'Successfully Delete Assets']);

}

function download_asset($id){

    $asset_timeline = DB::table('main_assets')->leftjoin('grc_assets','grc_assets.number','=','main_assets.asstes_serial')->leftjoin('main_users','main_users.id','=','grc_assets.user_id')->where('main_assets.id',$id)->select('main_assets.*','main_users.userfullname','main_assets.assets_name as main_asset_name','grc_assets.created_at as assign_date','grc_assets.updated_at as return_date')->get();




    $columns = array('S.No', 'Employee Name', 'Assign Date', 'Assign Time', 'Return Date','Return Time');


    $filename = public_path("uploads/csv/asset_'".time()."'_report.csv");

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $columns);



         $i = 1;

        foreach($asset_timeline as $asset_timelines) {
           $assin_date = date('d M Y',strtotime($asset_timelines->assign_date));
           $assin_time = date('h:i:s',strtotime($asset_timelines->assign_date));
           $return_date = !empty($asset_timelines->return_date)?date('d M Y',strtotime($asset_timelines->return_date)):'';
            $return_time = !empty($asset_timelines->return_date)?date('h:i:s',strtotime($asset_timelines->return_date)):'';


           fputcsv($handle, array($i++, ucwords($asset_timelines->userfullname),$assin_date ,$assin_time,$return_date ,$return_time ));

        }

        

       fclose($handle);



       $headers = array(

        'Content-Type' => 'text/csv'

       

        );


    return Response()->download($filename);

 

}

function download_user_asset($user_id){

   $timeline = DB::table('main_assets')->leftjoin('grc_assets','grc_assets.number','=','main_assets.asstes_serial')->leftjoin('main_users','main_users.id','=','grc_assets.user_id')->where('grc_assets.user_id',$user_id)->select('main_assets.*','main_users.userfullname','main_assets.assets_name as main_asset_name','grc_assets.created_at as assign_date','grc_assets.updated_at as return_date')->get();


    $columns = array('S.No', 'Employee Name', 'Assign Date', 'Assign Time', 'Return Date','Return Time');


    $filename = public_path("uploads/csv/asset_'".time()."'_report.csv");

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $columns);



         $i = 1;

        foreach($timeline as $timelines) {
           $assin_date = date('d M Y',strtotime($timelines->assign_date));
           $assin_time = date('h:i:s',strtotime($timelines->assign_date));
           $return_date = !empty($timelines->return_date)?date('d M Y',strtotime($timelines->return_date)):'';
            $return_time = !empty($timelines->return_date)?date('h:i:s',strtotime($timelines->return_date)):'';


           fputcsv($handle, array($i++, ucwords($timelines->userfullname),$assin_date ,$assin_time,$return_date ,$return_time ));

        }

        

       fclose($handle);



       $headers = array(

        'Content-Type' => 'text/csv'

       

        );


    return Response()->download($filename);

}

}