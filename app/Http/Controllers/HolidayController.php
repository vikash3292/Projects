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
use App\Holiday;

class HolidayController extends Controller
{
    /***************************************Start Holiday Management*****************************************/
  /*Fetch All Holiday data*/
   public function holiday_mngmnt()
    { 
       
        $holidayData = DB::table('main_holidaydates')
     				 ->select('*','main_holidaydates.id')
                      ->leftJoin('main_holidaygroups','main_holidaygroups.id', '=', 'main_holidaydates.groupid')
                      ->where('main_holidaydates.isactive', 1)->get();
        return view('holiday.holiday_management',['holidayData'=>$holidayData]);
    }



    /*Function for Delete Holiday */
    public function delete_holiday($id){

        $delete = DB::table('main_holidaydates')->where('id', $id)->delete();
        return back()->with('warning','Holiday  successfully deleted!');
        return redirect('/holidayManagement');
    }


/*Function For Add Holiday.*/
public function add_holiday(Request $request){

    if($request->isMethod('post')) {
            $insert_items = DB::table('main_holidaydates')
                    ->insert([
                    	'holidayname' => $request->holidayname,
                        'groupid' => $request->groupid,
                        'holidaydate' => $request->holidaydate,
                        'description' => $request->description,
                        'isactive' => 1,
                    ]);
            $request->session()->flash('alert-success', 'Holiday  successfully added!'); 
            return redirect('/holidayManagement');
    }else{
        return view('holiday.holiday_add'); 
    }
        
}

    /*Function for edit Holiday details according to Holiday id.*/
    public function edit_holiday($id){
      
        $detail = DB::table('main_holidaydates')->where('id', $id)->first();
        return view('holiday.holiday_edit',['detail'=>$detail]);
    }

    public function update_holiday(REQUEST $request) {
    	if($request->isMethod('post')) {

         $id = $request->id;
         $update = DB::table('main_holidaydates')
            ->where('id',$id)
            ->update([  'holidayname' => $request->holidayname,
                        'groupid' => $request->groupid,
                        'holidaydate' => $request->holidaydate,
                        'description' => $request->description,
                        'isactive' => 1,
                    ]);   
                   $request->session()->flash('alert-success', 'Holiday  successfully updated!');
                  return redirect('/holidayManagement');
      }else{
         
         return redirect('/holidayManagement');
    }
}
/********************End Holiday Management*******************/
}
