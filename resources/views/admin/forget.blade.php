@extends('layouts.dashboard_layout')
@section('content')
          <div class="col-sm-6">
               <div class="wrapper-page wrapper-page-margin">
                  <div class="overflow-hidden account-card mx-3">
                     <div class="account-card-content">
                        <div class="text-center position-relative">
                           <h1 class="m-b-30">GRC MAIN ERP</h1>
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
                           <img src="{{URL::to('/public')}}{{$mainsetting->company_logo}}" height="100" alt="logo">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        <div class="col-md-6">
            <div class="wrapper-page">
                <div class="card overflow-hidden account-card mx-3">
                  @if(Session::has('message'))
                     <p class="alert alert-info">{{ Session::get('message') }}</p>
                   @endif
                <div class="account-card-content">
                <div class="text-center position-relative">
                        <h4 class="font-30 m-b-5">{{ __('Forgot Password') }}</h4>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="form-horizontal m-t-30" action="{{URL::to('sendlink')}}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group">
                        <div class="row">
                              <div class="col-1 p-r-0">
                                    <i class="mdi mdi-email-mark-as-unread font-20"></i>
                              </div>
                              <div class="col-11">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" maxlength="60" required placeholder="Registered Email Id">
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                     </div>
                  </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <button type="submit" class="btn btn-primary loginbtn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
              
        </div>
    </div>
</div>
</div>
@endsection
