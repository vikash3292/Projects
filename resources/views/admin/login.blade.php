@extends('layouts.dashboard_layout')
@section('content')
<div id="wrapper">
   <div class="row columnreverse">
      <div class="col-sm-6">
         <div class="wrapper-page wrapper-page-margin">
            <div class="overflow-hidden account-card mx-3">
               <div class="account-card-content">
                  <div class="text-center position-relative">
                     <h1 class="m-b-30">GRC MAIN ERP</h1>
                     <p class="m-b-30">
                        GRC India has the in-house and empanelled experts for all the 12
                        functional
                        areas required, in order to successful culmination of project
                        within a
                        definite time frame. Besides, the company has a pool of experts
                        for the
                        entire range of functional areas, who can provide the most
                        satisfactory
                        solutions in the complete gamut of consultancy services in the
                        environment
                        field.
                     </p>
                  </div>
                  <div class="text-left">
                     <a href="{{URL::to('admin')}}" class="logo">
                     <img src="{{URL::to('/public/')}}{{$mainsetting->company_logo}}" height="100" alt="logo">
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
                     <h4 class="font-30 m-b-5">Welcome to <span class="primary-color">Login</span></h4>
                  </div>
                  <form class="form-horizontal m-t-20" method="POST" action="{{URL::to('/admin')}}" aria-label="{{ __('Login') }}">
                     @csrf
                     <div class="form-group">
                        <div class="row">
                           <div class="col-1 p-r-0">
                              <i class="mdi mdi-account-circle font-20"></i>
                           </div>
                           <div class="col-11">
                              <input id="emaildata" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" maxlength="60" value="{{ old('email') }}"  autofocus placeholder="Enter valid Savior Card No">
                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                              <div id="email_error"></div>
                           </div>
                        </div>
                        <!--      <div class="row">
                           <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                           
                           <div class="col-md-6">
                               <input id="" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                           
                               @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                           </div> -->
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-1 p-r-0">
                              <i class="mdi mdi-lock font-20"></i>
                           </div>
                           <div class="col-11">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  maxlength="60" placeholder="Enter password">
                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                              <span toggle="#password-field" onclick="login_psd()" class="fa fa-eye field-icon toggle-password"></span>
                            <div id="password_error"></div>
                           </div>
                          
                        </div>
                     </div>
                     <!--      <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div> -->
                     <div class="form-group row m-t-20">
                        <div class="col-md-6">
                           <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <!--  <input type="checkbox" class="custom-control-input" id="customControlInline"> -->
                              <label class="custom-control-label" for="customControlInline remember"> {{ __('Remember Me') }}</label>
                           </div>
                           <!--  <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              
                              <label class="form-check-label" for="remember">
                                  {{ __('Remember Me') }}
                              </label>
                              </div> -->
                        </div>
                        <div class="col-sm-6">
                           <a href="{{URL::to('forget')}}"><i class="mdi mdi-lock"></i>  {{ __('Forgot Your Password?') }}</a>
                        </div>
                     </div>

                      @if(Session::has('message'))
                              <div class="alert alert-danger alert-dismissible">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('message') }}
                       </div>
                          
                          
                            @endif
                     <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                           <button type="submit" id="login" class="btn btn-primary btn-block">
                           {{ __('Login') }}
                           </button>
                           <!--  <a href="index.html" class="loginbtn">LOGIN</a> -->
                        </div>
                     </div>
                     <!--       <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4"> -->
                     <!--   <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                        </button> -->
                     <!--     <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a> -->
                     <!--   </div>
                        </div> -->
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
