<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Input;
use Mail;
use URL;
use Hash;
use Auth;
use Validator;
use App\main_users;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request){

              dd($request);


    }
}
