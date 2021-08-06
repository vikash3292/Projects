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






class AuditController extends Controller
{


public function audit(){

	return view('audit.audit');

}



}