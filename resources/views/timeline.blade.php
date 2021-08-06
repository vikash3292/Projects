 @foreach($timeline as $k => $timelines)
                                       <?php

                                       if($k % 2 ==0 ){
                                       $class='timeline-list';
                                       $otherclass="float-right";
                                       }else{

                                         $class='timeline-list right clearfix';
                                          $otherclass="float-left";
                                       }

                                       ?>
                                        <li class="{{$class}}">
                                           <div class="cd-timeline-content bg-light p-10">
                                              <h5 class="mt-0 mb-2">{{$timelines->userfullname}} <span class="text-primary {{$otherclass}}">{{date('h:i', strtotime($timelines->created_at))}}</span></h5>
                                            {{$timelines->msg}}
                                              <div class="date bg-primary">
                                                 <h5 class="mt-0 mb-0">{{date('d',strtotime($timelines->created_at))}}</h5>
                                                 <p class="mb-0 text-white-50">{{date('M',strtotime($timelines->created_at))}}</p>
                                              </div>
                                           </div>
                                        </li>
                                        @endforeach