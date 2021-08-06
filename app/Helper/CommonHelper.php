<?php

use Carbon\Carbon as Carbon;

use Illuminate\Support\Facades\Cache as Cache;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\AttendancModel;

if (!function_exists('sendMail')) {



 function sendMail($to, $subject, $from, $fromname, $content)

    {

        try {

            Mail::send([], [], function ($message) use ($to, $subject, $from,$fromname, $content) {



                $message->from($from, $fromname);

                $message->to($to);

                $message->subject($subject);

                $message->setBody($content, 'text/html'); // for HTML rich messages

            });



           if(Mail:: failures()){



           return false;



              }else{



              return true;



              }

        } catch (Exception $e) {

            return $e->getMessage();

        }

    }

}



if (!function_exists('autoincrement')) {



 function autoincrement()

    {



        $startval = 1;



        $incremnt = DB::table('main_settings')->orderBy('id','desc')->first();

        
 return  $incremnt->emp_code; 


    
        

    }



}



if (!function_exists('MultiSendEmail')) {



 function MultiSendEmail($emaiArr = [],$subject,$from,$fromname,$content)

    {

        

         $fromname  =  config('constants.fromName');

           $from  =  config('constants.sendEmil');

try {

Mail::send([], [], function($message) use ($emaiArr,$subject, $from, $fromname, $content)

{    

                $message->from($from, $fromname);

                $message->to($emaiArr);

                $message->subject($subject);

                $message->setBody($content, 'text/html'); // for HTML rich messages   

});

if(Mail:: failures()){



    return false;



 }else{



    return true;



 }

  } catch (Exception $e) {

    return $e->getMessage();

        }

}

}





if (!function_exists('getAttendeceRecoud')) {

function getAttendeceRecoud($userid,$datedate){



    try {



    return $getIntime = DB::table('main_attendance')->where('user_id',$userid)->whereDate('entry_date','=',$datedate)->first();



  //return AttendancModel::where('user_id',$userid)->whereDate('entry_date','=',$datedate)->where('status','=',$status)->firstOrFail();





     } catch (Exception $e) {

            throw new HttpException(500, $e->getMessage());

        }

  



}

}





if (!function_exists('sum_the_time')) {



function sum_the_time($time1, $time2) {

   return  date( "h:i:s", strtotime($time2) - strtotime($time1));



     

    }

    }

    

    if (!function_exists('org_number')) {



function org_number() {

    

    

 $getorgno = DB::table('org')->orderby('id','DESC')->first();

 

 if(isset($getorgno)){

     

     return str_pad($getorgno->org_code, 4, '0', STR_PAD_LEFT);  

 }else{

     

     

       return str_pad(1, 4, '0', STR_PAD_LEFT);  

 }



     

    }

    }

    

        if (!function_exists('time_to_sec')) {

    function time_to_sec($time) {

list($h, $m) = explode (":", $time);

$seconds = 0;

$seconds += (intval($h) * 3600);

$seconds += (intval($m) * 60);



return $seconds;

}

}



  if (!function_exists('explode_time')) {

function explode_time($time) { //explode time and convert into seconds

        $time = explode(':', $time);

        $time = $time[0] * 3600 + $time[1] * 60;

        return $time;

}

}



  if (!function_exists('second_to_hhmm')) {

function second_to_hhmm($time) { //convert seconds to hh:mm

        $hour = floor($time / 3600);

        $minute = strval(floor(($time % 3600) / 60));

        if ($minute == 0) {

            $minute = "00";

        } else {

            $minute = $minute;

        }

        $time = $hour . ":" . $minute;

        return $time;

}

}



  if (!function_exists('time_convert')) {

function time_convert($s) { 

    $m = 0; $hr = 0; $td = "now";

    if ($s > 59) { 

        $m = (int)($s/60); 

        $s = $s-($m*60); // sec left over 

        $td = "$m min"; 

    } 

    if ($m > 59) { 

        $hr = (int)($m / 60); 

        $m = $m - ($hr*60); // min left over 

        $td = "$hr hr"; 

        if ($hr > 1) {

            $td .= "s";

        }

        if ($m > 0) {

            $td .= ", $m min";

        }

    } 



    return $td; 

} 

}



    if (!function_exists('templete_attendace_request')) {



function templete_attendace_request($userName='',$manager='',$applyDate='',$inTime='',$outTime='',$presentStatus='',$currentStatus='') {

    

    $att_req_temp = DB::table('email_templete')->where('id',2)->first();

   $login = URL::to('/');

  $description=str_replace('{userName}',ucwords(trim($userName)),$att_req_temp->temp_thems);

  $description=str_replace('{manager}',ucwords(trim($manager)),$description);

  $description=str_replace('{applyDate}',$applyDate,$description);

  $description=str_replace('{inTime}',$inTime,$description);

  $description=str_replace('{outTime}',$outTime,$description);

  $description=str_replace('{presetStatus}',$presentStatus,$description);

  $description=str_replace('{login}',$login,$description);

  return $description=str_replace('{currentStatus}',$currentStatus,$description);

 

     

    }

    }



    if (!function_exists('templete_attendace_confirmation')) {



function templete_attendace_confirmation($userName='',$applyDate='',$presentStatus='',$currentStatus='',$reason='',$manager='') {

    

    $att_req_temp = DB::table('email_templete')->where('id',1)->first();

   $login = URL::to('/');

  $description=str_replace('{userName}',ucwords(trim($userName)),$att_req_temp->temp_thems);

  $description=str_replace('{applyDate}',$applyDate,$description);

  $description=str_replace('{reason}',$reason,$description);

  $description=str_replace('{manager}',$manager,$description);

  $description=str_replace('{presentStatus}',$presentStatus,$description);

  $description=str_replace('{login}',$login,$description);

  return $description=str_replace('{CurrentStatus}',$currentStatus,$description);

 

     

    }

    }



        if (!function_exists('templete_leave_confirmation')) {



function templete_leave_confirmation($userName='',$applyDate='',$day='',$leavetype,$status='',$reason='') {

    

    $att_req_temp = DB::table('email_templete')->where('id',4)->first();

   $login = URL::to('/');

  $description=str_replace('{userName}',ucwords(trim($userName)),$att_req_temp->temp_thems);

  $description=str_replace('{formDate}',$applyDate,$description);

    $description=str_replace('{toDate}',$applyDate,$description);

       $description=str_replace('{day}',$day,$description);

         $description=str_replace('{LeaveType}',$leavetype,$description);

  $description=str_replace('{Reason}',$reason,$description);

  $description=str_replace('{login}',$login,$description);

  return $description=str_replace('{staus}',$status,$description);

 

     

    }

    }



   

        if (!function_exists('templete_leave_request')) {



function templete_leave_request($userName='',$manager='',$applyDate='',$day='',$leavetype,$reason='') {

    

    $att_req_temp = DB::table('email_templete')->where('id',4)->first();

   $login = URL::to('/');

  $description=str_replace('{userName}',ucwords(trim($userName)),$att_req_temp->temp_thems);

   $description=str_replace('{manager}',ucwords(trim($manager)),$description);

  $description=str_replace('{formDate}',$applyDate,$description);

    $description=str_replace('{toDate}',$applyDate,$description);

       $description=str_replace('{day}',$day,$description);

         $description=str_replace('{LeaveType}',$leavetype,$description);

  $description=str_replace('{Reason}',$reason,$description);

     $description=str_replace('{staus}','Pending',$description);

  

  return $description=str_replace('{login}',$login,$description);

  

 

     

    }

    }



