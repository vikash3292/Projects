
                          
  
  <div class="left side-menu">
         <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->


               <ul class="metismenu" id="side-menu">
                  <!-- <li class="menu-title">Main</li> -->

                  @php($role_id = Auth::guard('main_users')->user()->emprole)

                  @if(!empty($menu))
                  @foreach($menu as $menus)

                  @if($role_id == 1)

                  @php($roll  = (in_array($role_id,[1])))


                  @else 

                    @php($roll  = (in_array($menus['id'],$rolldata)))

                  @endif



                  @if($roll)


                  <li>
                     <a href="{{$menus['url']}}" class="waves-effect"><?php echo $menus['icon']; ?><span> {{$menus['title']}}
                           <span class="float-right menu-arrow">
                               @if(!empty($menus['sub']))
                              <i class="mdi mdi-chevron-right"></i>
                               @endif
                           </span></span></a>
                     <ul class="submenu">
                         @if(!empty($menus['sub']))
                      @foreach($menus['sub'] as $submenu)

                       @if($role_id == 1)

                  @php($roll  = (in_array($role_id,[1])))


                  @else 

                    @php($roll  = (in_array($submenu['id'],$rolldata)))

                  @endif

                  @if($roll)
                        <li>
                           <a href="{{$submenu['url']}}" class="waves-effect"><span> {{$submenu['title']}}
                                 <span class="float-right menu-arrow">
                                       @if(!empty($submenu['sub']))
                              <i class="mdi mdi-chevron-right"></i>
                               @endif

                                    </span></span></a>
                           
                               @if(!empty($submenu['sub']))

                               <ul class="submenu">
                             @foreach($submenu['sub'] as $subsubmenu)


                  @if($role_id == 1)

                   @php($roll  = (in_array($role_id,[1])))


                  @else 

                    @php($roll  = (in_array($subsubmenu['id'],$rolldata)))

                  @endif

                  @if($roll)
                              <li><a href="{{$subsubmenu['url']}}">{{$subsubmenu['title']}}</a></li>
                              @endif
                                @endforeach

                                </ul>
                                 @endif
                             
                           
                        </li>
                        @endif
                           @endforeach
                           @endif

                       
                     </ul>
                  </li>
                  @endif

                    @endforeach
                  @endif


               
                  <li>
                     <a href="{{url('edit/myprofile/'.$id)}}" class="waves-effect"><i class="ti-face-smile"></i> <span>My Profile
                        </span></a>
                  </li>
                
                    <li>
                    <a class="waves-effect" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  </li>
               </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>
         </div>
         <!-- Sidebar -left -->
      </div>
    