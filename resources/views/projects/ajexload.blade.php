                                 @foreach($newuserlist as $newuserlists)
                                                   
                                                        <div class="col-sm-6 append_div cursorpointer">
                                                            <div class="card m-b-10 float-left width100 box-shadow">
                                                                <div class="media p-l-5 p-r-5 p-t-5">
                                                                    
                                                                    
                                                                   @if(!empty($newuserlists->profileimg))
                            <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/')}}/{{$newuserlists->profileimg}}" alt="Generic placeholder image" height="40">
                              @elseif($newuserlists->prefix == 1)
                              
                               <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/male.png')}}" alt="Generic placeholder image" height="40">
                              
                              @elseif($newuserlists->prefix == 2 || $newuserlists->prefix == 3)
                              
                                <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/female.png')}}" alt="Generic placeholder image" height="40">
                              
                              @else
                              
                              <img class="d-flex mr-3 rounded-circle"
                              src="{{URL::to('public/uploads/human.png')}}" alt="Generic placeholder image" height="40">
                              
                              @endif
                              
                              
                                                                 <input type="hidden" class="user_id" value="{{$newuserlists->id}}">   
                                                                        
                                                                        
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 mb-0 font-16 text-info">{{$newuserlists->userfullname}}
                                                                            </h6>
                                                                        <p class="m-0 font-12">{{$newuserlists->employeeId}}</p>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="mainhilight">
                                                                    <span class="font-500">{{$newuserlists->jobtitlename}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  
                                                        @endforeach