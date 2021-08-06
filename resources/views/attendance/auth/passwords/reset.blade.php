@extends('layouts.dashboard_layout')
@section('content')
<div class="container">
<div class="row justify-content-center">
   <div class="col-sm-6">
      <div class="wrapper-page wrapper-page-margin">
         <div class="overflow-hidden account-card mx-3">
            <div class="account-card-content">
               <div class="text-center position-relative">
                  <h1 class="m-b-30">GRC GREEN ERP </h1>
                  <p class="m-b-30">
                     GRC India has the in-house and empanelled experts for all the 12 functional
                     areas required, in order to successful culmination of project within a
                     definite time frame. Besides, the company has a pool of experts for the
                     entire range of functional areas, who can provide the most satisfactory 
                     solutions in the complete gamut of consultancy services in the environment 
                     fields.
                  </p>
               </div>
               <div class="text-left">
                  <a href="{{URL::to('/')}}" class="logo">
                  <img src="{{asset('/assets/images/logo.png')}}" height="100" alt="logo">
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 ">
      <div class="wrapper-page">
         <div class="card overflow-hidden account-card mx-3">
            <div class="account-card-content">
               <div class="text-center position-relative">
                  <h4 class="font-30 m-b-5">{{ __('Reset Password') }}</h4>
               </div>
               <form class="form-horizontal m-t-20" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-1 p-r-0">
                           <i class="mdi mdi-email-mark-as-unread font-20"></i>
                        </div>
                        <div class="col-11">
                           <input id="" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter Email ID" required autofocus>
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                 </div>
                     <div class="form-group">
                     <div class="row">
                        <div class="col-1 p-r-0">
                           <i class="mdi mdi-lock font-20"></i>
                        </div>
                        <div class="col-11">
                           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="New Password" required>
                           @if ($errors->has('password'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-1 p-r-0">
                           <i class="mdi mdi-lock font-20"></i>
                        </div>
                        <div class="col-11">
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group m-t-10 mb-0 row">
                     <div class="col-12 m-t-20">
                        <button type="submit" class="btn btn-primary loginbtn">
                        {{ __('Reset Password') }}
                        </button>
                        <!-- <button class="btn btn-primary btn-block waves-light" onclick="location.href='login.html'" type="submit">Confirm</button> -->
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection