<?php

namespace App\Helper;
use Carbon\Carbon as Carbon;

use Illuminate\Support\Facades\Cache as Cache;
use App\Main_users;

use App\Permission;
use Validator;
use Auth;
use DB;
use DateTime;
use Mail;



class PermissionHelper {
    public static function frontendPermission($permission = ""){
        $userData = Auth::guard('main_users')->user();
        $permission = Permission::where('slug','=',$permission)->where('status','=',1)->first();
        
        //dd($permission->role);
        if($permission && $userData){
            $roles = $permission->role;

            if($userData->emprole ==1){

                 return true;

            }
          

            if(isset($roles) && !empty($roles)){

             foreach ($roles as $key => $r) {
                if((int)$userData->emprole == (int)$r->id){
                    return true;
                }
            }

            }
            
          
        }

        return false;
        //abort(404);
        //abort(404, 'Something went wrong');
    }   
}