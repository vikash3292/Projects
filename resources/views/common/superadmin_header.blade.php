
  
      <!-- Top Bar Start -->
     <div class="topbar">
         <!-- LOGO -->
         <div class="topbar-left">
            <a href="<?php URL::to('dashboard')?>" class="logo">
               <span class="float-left width100 padding-5">
                  <img src="{{URL::to('/')}}{{$mainsetting->company_logo}}" alt="" height="60">
               </span>
               <i class="padding-5"><img src="{{URL::to('/public/')}}{{$mainsetting->company_logo}}" alt="" height="60" width="100%"></i>
            </a>
         </div>
         <nav class="navbar-custom">
            <div class="width-float">
               <ul class="navbar-right list-inline float-right mb-0">
                  <!-- notification -->
                  <li class="dropdown notification-list list-inline-item">
                     <a class="nav-link dropdown-toggle arrow-none waves-effect">Session Timeout In <i
                           class="mdi mdi-timer-sand-empty mdi-spin"></i><span> : </span><span
                           class="text-danger timer">10</span></a>
                  </li>
                  <li class="dropdown notification-list list-inline-item">
                     <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell noti-icon"></i>
                        <span class="badge badge-pill badge-danger noti-icon-badge"><span class="totalnotidata">0</span></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                        <!-- item-->
                              <h6 class="dropdown-item-text">Notifications (<span class="totalnotidata">0</span>)</h6>
                        <div class="slimscroll notification-item-list shownotification" style="height:300px;overflow:hidden;">
                          
                        </div>
                        <!-- All-->
                        <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a> -->
                     </div>
                  </li>
                  
                  
                  <li class="dropdown notification-list list-inline-item hidden-mobile">
                     <a href="{{url('/edit/myprofile/'.$id)}}" class="nav-link dropdown-toggle arrow-none waves-effect text-right" style="position: relative;
                     top: -5px;">
                        <p class="m-0">{{$name??'' }}</p>
                        <p class="m-0">{{$getrole->rolename??''}}</p>
                     </a>
                  </li>
                  <li class="dropdown notification-list list-inline-item">
                     <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                           href="{{url('/edit/myprofile/'.$id)}}" role="button" aria-haspopup="false" aria-expanded="false"><img
                              src="{{URL::to('/')}}{{$profileimg}}" alt="user" class="rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                           <!-- item-->
                           <a class="dropdown-item" href="{{url('/edit/myprofile/'.$id)}}">
                              <i class="mdi mdi-account-circle m-r-5"></i>
                              Profile</a>
                           <div class="dropdown-divider"></div>
                          
                    <a class="dropdown-item waves-effect" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  
                        </div>
                     </div>
                  </li>
               </ul>
               <span class="grcerp">Welcome {{ucwords(Auth::guard('main_users')->user()->userfullname)}} !</span>
               <ul class="list-inline menu-left mb-0">
                  <li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i
                           class="mdi mdi-menu"></i></button></li>
               </ul>
            </div>
         </nav>
      </div>