@extends('layouts.dashboard_layout')
 @section('extra_css')
   <style>
      <?php
      
      $imgurl = URL::to('public/assets/images/Frame 2131.png');
      
     ?>
      body {
         background-image: url('{{$imgurl}}');
         background-repeat: no-repeat;
         background-size: cover;
      }

      * {
         padding: 0;
         margin: 0;

      }

      .signUpWrapper {

         display: flex;
         width: 100%;
      }

      .formWrapper {
         width: 60%;
         /* background: #fff; */
         box-sizing: border-box;
         box-shadow: 2px 1px 28px #6967675c;
         border-radius: 5px;
         display: flex;
         height: 60vh;
         position: absolute;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         -ms-transform: translate(-50%, -50%);
         /* for IE 9 */
         -webkit-transform: translate(-50%, -50%);
         /* for Safari */

         /* optional size in px or %: */
         /* width: 100px;
         height: 100px; */
      }

      .welcome-Box {
         width: 40%;
         transition: all .5s;
         /* height: 100vh; */
         background: #0989eb70;
         /* align-items: stretch; */
         flex: 1;
         align-items: center;
         padding: 70px;
         color: #fff;
      }

      .welcome-Box.bgsecendry {
         background: #2974b6a1;
      }

      .CreateAccount-Box {
         width: 60%;
         display: flex;
         padding: 70px;
         align-items: center;
         transition: all .5s;
         background: #fff;
      }
.CreateAccount-Box h4{
    background: linear-gradient(to right, #45daec 0%, #a254e7 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

      .loginfWrapper {
         display: none;
         float: left;
         width: 100%;
      }

      .ccc {
         transform: translateX(187%);
         right: 0;
         z-index: 1;
         transition: all .5s;
      }

      .bb {
         transform: translateX(-51%);
         transition: all .5s;
      }

      .footer-login {
         position: fixed;
         border-top: 2px solid #5fe384;
         width: 100%;
         bottom: 0;
         text-align: center !important;
         padding: 19px 30px 20px;
         background-color: #f1f2f5;
         font-family: Sarabun, sans-serif;
      }

      .toggleBtn {
         border: 1px solid #fff;
         background: transparent;
         color: #fff;
         padding: 10px 20px;
         border-radius: 20px;
      }

      .toggleBtnfilled {
         border: 1px solid #2974b6;
         background: #2974b6;
         color: #fff;
         padding: 10px 20px;
         border-radius: 20px;
      }

      .footer-login {
         border-top: 2px solid #eee !important;
         padding:2px;
             background-color: #f1f2f591;
      }
        .logo_css{
        font-size: 35px;
        margin: 0 auto;
        margin-top: 45px;
        text-align: center;
        padding: 12px 30px;
      }
        .logo_css h6{
         background: linear-gradient(to right, #45daec 0%, #a254e7 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 30px;
    }
       @media (max-width:414px){
.welcome-Box .position-relative h5{
          font-size:16px !important;
         }
         .CreateAccount-Box .position-relative h4{
          margin-top: 30px;
          margin-bottom: 15px;
          font-size:20px !important;
         }
         .welcome-Box .position-relative p{
          font-size:12px !important;
         }
         .CreateAccount-Box form{
          margin-top: 0 !important;
         }
         .CreateAccount-Box form i{
          font-size: 15px;
         }
          .CreateAccount-Box form .form-control{
          font-size: 10px;
          height: calc(1.1em + .65rem + 1px);
         }
         .field-icon {
    font-size: 10px !important;
    margin-top: -16px;
    }
    .CreateAccount-Box form .col-md-6{
      font-size: 10px !important;
    }
  }
      @media (max-width:576px) {
         .formWrapper {
            width: 80%;
         }

         .welcome-Box {
            padding: 10px;
         }

         .CreateAccount-Box {
            padding: 26px;
         }
         .welcome-Box .position-relative h5{
          font-size:16px !important;
          margin-top: 110px !important;
         }
         .welcome-Box .position-relative p{
          font-size:12px !important;
         }
         .alert-info {
              font-size: 10px;
              padding: 0px 5px;
              color: #38a4f8;
              background-color: #e4f3fe;
          }
            .CreateAccount-Box button{
          padding: 5px 25px;
    font-size: 10px;
        }
          .logo_css h6{
         background: linear-gradient(to right, #45daec 0%, #a254e7 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 30px;
    }
      }
   </style>
  
  @stop
@section('content')
  <span class="logo_css">
       <a href="http://hrms.projectdemoonline.com"><h6><img src="{{URL::to('public/assets/images/hrms_logo.png')}}" alt="" height="40">KLOUDRAC HRMS</h6></a>
  </span>
 <div class="formWrapper">
     
      <div class="signUpWrapper">
         <div class="welcome-Box">
            <div class="text-center position-relative">
               <h5 class="font-30 m-b-20" style="margin-top:60px">CRM + HRMS</h5>
               <p>Reset Password Your Password</p>
            </div>
         </div>
          <div class="CreateAccount-Box">
               <div class="row">
                  @if(Session::has('message'))
                     <p class="alert alert-info">{{ Session::get('message') }}</p>
                   @endif
                <div class="account-card-content row">
                <div class="text-center position-relative col-sm-12">
                        <h4 class="font-30 m-b-5 text-center">{{ __('Forgot Password') }}</h4>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                             <form  method="POST" class="form-horizontal m-t-20 col-sm-12" action="{{URL::to('password/reset')}}" aria-label="{{ __('Reset Password') }}">
                  <div class="form-group">
                        <div class="row">
                              <div class="col-1 p-r-0">
                                    <i class="mdi mdi-lock font-20"></i>
                              </div>
                              {{ csrf_field() }}
                              <input type="hidden" name="token" value="{{$token??0}}">
                              <div class="col-11">
                     <input type="password" value="{{ old('password') }}" maxlength="60" name="password" class="form-control" id="userpassword" placeholder="New Password">
                        <i id="eye" class="fa fa-eye field-icon" onclick="show_psd()"></i>
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
                           <input type="password"  value="{{ old('cpassword') }}" maxlength="60" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password">
                           <i class="fa fa-eye field-icon" id="cnf_eye" onclick="cnf_psd()"></i>
                           @if ($errors->has('cpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpassword') }}</strong>
                                    </span>
                                @endif
                       </div>
                       </div>
                        </div>
                  <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20 text-center">

                           <button type="submit" class="btn toggleBtnfilled">
                                    {{ __('CONFIRM') }}
                                </button>
                             <!--  <a href="login.html" class="loginbtn">CONFIRM</a> -->
                              <!-- <button class="btn btn-primary btn-block waves-light" onclick="location.href='login.html'" type="submit">Confirm</button> -->
                        </div>
                  </div>
               </form>

              
        </div>
    </div>
          </div>
      </div>
 </div>
<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--          <div class="col-sm-6">-->
<!--               <div class="wrapper-page wrapper-page-margin">-->
<!--                  <div class="overflow-hidden account-card mx-3">-->
<!--                     <div class="account-card-content">-->
<!--                        <div class="text-center position-relative">-->
<!--                           <h1 class="m-b-30">GRC MAIN ERP</h1>-->
<!--                           <p class="m-b-30">-->
<!--                              GRC India has the in-house and empanelled experts for all the 12 functional-->
<!--                              areas required, in order to successful culmination of project within a-->
<!--                              definite time frame. Besides, the company has a pool of experts for the-->
<!--                              entire range of functional areas, who can provide the most satisfactory -->
<!--                              solutions in the complete gamut of consultancy services in the environment -->
<!--                              fields.-->
<!--                           </p>-->
<!--                        </div>-->
<!--                        <div class="text-left">-->
<!--                           <a href="{{URL::to('/')}}" class="logo">-->
<!--                           <img src="{{URL::to('/public')}}{{$mainsetting->company_logo}}" height="100" alt="logo">-->
<!--                           </a>-->
<!--                        </div>-->
<!--                     </div>-->
<!--                  </div>-->
<!--               </div>-->
<!--            </div>-->
<!--        <div class="col-md-6">-->
<!--            <div class="wrapper-page">-->
<!--                <div class="card overflow-hidden account-card mx-3">-->
<!--                  @if(Session::has('message'))-->
<!--                     <p class="alert alert-info">{{ Session::get('message') }}</p>-->
<!--                   @endif-->
<!--                <div class="account-card-content">-->
<!--                <div class="text-center position-relative">-->
<!--                        <h4 class="font-30 m-b-5">{{ __('Forgot Password') }}</h4>-->
<!--                </div>-->
<!--                    @if (session('status'))-->
<!--                        <div class="alert alert-success" role="alert">-->
<!--                            {{ session('status') }}-->
<!--                        </div>-->
<!--                    @endif-->

<!--                             <form  method="POST" class="form-horizontal m-t-20" action="{{URL::to('password/reset')}}" aria-label="{{ __('Reset Password') }}">-->
<!--                  <div class="form-group">-->
<!--                        <div class="row">-->
<!--                              <div class="col-1 p-r-0">-->
<!--                                    <i class="mdi mdi-lock font-20"></i>-->
<!--                              </div>-->
<!--                              {{ csrf_field() }}-->
<!--                              <input type="hidden" name="token" value="{{$token??0}}">-->
<!--                              <div class="col-11">-->
<!--                     <input type="password" value="{{ old('password') }}" maxlength="60" name="password" class="form-control" id="userpassword" placeholder="New Password">-->
<!--                        <i id="eye" class="fa fa-eye field-icon" onclick="show_psd()"></i>-->
<!--                       @if ($errors->has('password'))-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('password') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                 </div>-->
<!--                 </div>-->
<!--                  </div>-->
<!--                  <div class="form-group">-->
<!--                              <div class="row">-->
<!--                                    <div class="col-1 p-r-0">-->
<!--                                          <i class="mdi mdi-lock font-20"></i>-->
<!--                                    </div>-->
<!--                                    <div class="col-11">-->
<!--                           <input type="password"  value="{{ old('cpassword') }}" maxlength="60" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password">-->
<!--                           <i class="fa fa-eye field-icon" id="cnf_eye" onclick="cnf_psd()"></i>-->
<!--                           @if ($errors->has('cpassword'))-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('cpassword') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                       </div>-->
<!--                       </div>-->
<!--                        </div>-->
<!--                  <div class="form-group m-t-10 mb-0 row">-->
<!--                        <div class="col-12 m-t-20">-->

<!--                           <button type="submit" class="btn btn-primary loginbtn">-->
<!--                                    {{ __('CONFIRM') }}-->
<!--                                </button>-->
                             <!--  <a href="login.html" class="loginbtn">CONFIRM</a> -->
                              <!-- <button class="btn btn-primary btn-block waves-light" onclick="location.href='login.html'" type="submit">Confirm</button> -->
<!--                        </div>-->
<!--                  </div>-->
<!--               </form>-->

              
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<script>
// new password
function show_psd() {
  
  var a = document.getElementById("userpassword");
  var b = document.getElementById("eye");
  if (a.type == "password") {
    a.type = "text";
    b.className = 'fa fa-eye-slash field-icon';
  } else {
    a.type = "password";
    b.className = 'fa fa-eye field-icon';
  }
}
</script>
@endsection
