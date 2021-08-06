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

class CommonController extends Controller
{
/****************DASHBOARD FUCTION*****************************/

 /*   public static function login_user_details(){

         $id = session('id');

          if((session('role')=='school') || (session('role')=='superadmin') ){
            $userDetails = DB::table('school')->where('school_id', $id)->first();
          }elseif (session('role')=='teacher') {
             $userDetails = DB::table('users')
            ->select('*','users.id','users.photo','users.defTheme')
            ->join('school','school.school_id','=','users.school_id')->where('id', $id)->first();
          }elseif (session('role')=='student') {
            $userDetails = DB::table('users')
            ->select('*','users.id','users.photo','users.defTheme')
            ->join('school','school.school_id','=','users.school_id')->where('id', $id)->first();
          } 

        return $userDetails;
    }*/

/***********************HOME PAGE FETCH DATA*******************************/

 public static function fetch_themeData(){
    $globalSetting = DB::table('main_organisationinfo')->where('id', 1)->first();
    return $globalSetting;

  }

}//endClass
