@extends('layouts.dashboard_layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-sm-6">
               <div class="wrapper-page wrapper-page-margin">
                  <div class="overflow-hidden account-card mx-3">
                     <div class="account-card-content">
                        <div class="text-center position-relative">
                           <h1 class="m-b-30">GRC GREEN ERP</h1>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection