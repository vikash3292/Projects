                                                                                  <tr
                                                                                    class="bg-dark color-white float-none">
                                                                                    <td>&nbsp;</td>
                                                                                      <td>&nbsp;</td>
                                                                                   @foreach($daterange as $dateranges)
                                                                                   <?php
                                                                                  $hideDate= date('D',strtotime($dateranges));
                                                                                   ?>
                                                                                  
                                                                 <td class="{{$hideDate}}">
                                                                        {{date('D d M',strtotime($dateranges))}}
                                                                 </td>
                                                                     @endforeach
                                                                                    <td>Hours</td>
                                                                                </tr>
                                                                                     
                                                                                   @foreach($assignproject as $key => $userprojects)
                                                                                     <?php 
                                                                                    
                                                                                     
                                                                                     $s_id = 'caret_'.$key;
                                                                                     ?>
                                                                       <form method="post" id="timealocationentrytime">
                                                                                <tr class="caret_row" data-sid = "{{$s_id}}">
                                                                                    <td class="width20 text_ellipses text-left" data-toggle="tooltip" title="{{ucwords($userprojects->userfullname??'')}}"><span class="caret">{{ucwords($userprojects->userfullname??'')}}</span></td>
                                                                                    <td>{{$userprojects->repotingmanager??''}}</td>
                                                                                    <td class="text-left">
                                                                                        <span>Free: 0 Hrs</span>
                                                                                    </td>
                                                                                   
                                                                                    <td class="text-left {{(abs($userprojects->user_hour_mon_diff) == 0)?'':$userprojects->user_hour_mon_color}} ">
                                                                                        <span>{{($userprojects->user_hour_mon_color == 'bg-red')?'Extra: ':'Free: '}} {{abs($userprojects->user_hour_mon_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_tue_diff) == 0)?'':$userprojects->user_hour_tue_color}}">
                                                                                        <span>{{($userprojects->user_hour_tue_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_tue_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_wed_diff) == 0)?'':$userprojects->user_hour_wed_color}}">
                                                                                        <span>{{($userprojects->user_hour_wed_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_wed_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_thu_diff) == 0)?'':$userprojects->user_hour_thu_color}}">
                                                                                        <span>{{($userprojects->user_hour_thu_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_thu_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left {{(abs($userprojects->user_hour_fri_diff) == 0)?'':$userprojects->user_hour_fri_color}}">
                                                                                        <span>{{($userprojects->user_hour_fri_color == 'bg-red')?'Extra: ':'Free: '}}  {{abs($userprojects->user_hour_fri_diff)}} Hrs</span>
                                                                                    </td>
                                                                                     <td class="text-left">
                                                                                        <span>Free: 0 Hrs</span>
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{$userprojects->userhour??'00:00'}}
                                                                                    </td>
                                                                                </tr>
                                                                                  <input type="hidden" name="currentweek" value="{{$weekcountpassed}}">
                                                                                  <input type="hidden" name="emp_id[]" value="{{$userprojects->emp_id}}">
                                                                                  
                                                                                    @php($i = 1)
                                                                                    @foreach($userprojects->userproject as $projects)
                                                                                    
                                                                                    
                                                                                   
                                                                                     <form method="post" id="timealocationentrytime">
                                                                                <tr class="caret_row1" data-sid = "{{$s_id}}">
                                                                                     <td class="width20 text_ellipses text-left" data-toggle="tooltip" title="{{ucwords($projects->project_name)}}"><span class="caret p-l-15">{{ucwords($projects->project_name)}}</span></td>
                                                                                     <td>&nbsp;</td>
                                                                                     <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                    <td class="text-left ">
                                                                        <span>{{abs($projects->project_hour_mon??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left ">
                                                                        <span> {{abs($projects->project_hour_tue??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($projects->project_hour_wed??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($projects->project_hour_thu??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> {{abs($projects->project_hour_fri??'')}} Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                        <span> 0 Hrs</span>
                                                                    </td>
                                                                     <td class="text-left">
                                                                      {{$projects->project_hour??'00:00'}}
                                                                    </td>
                                                                                </tr>
                                                                                
                                                                                 <input type="hidden" name="project_id[]" value="{{$projects->project_id}}">
                                                                                  @foreach($projects->gettask as $ke =>  $gettask)
                                                                                  
                                                                                   <input type="hidden" name="project_taskId[{{$projects->project_id}}][]" value="{{$gettask->project_task_id}}">
                                                                                <tr class="caret_row2" data-sid = "{{$s_id}}">
                                                                                    <td class="text-left width20 text_ellipses text-left" data-toggle="tooltip" title="{{ucwords($gettask->task)}}">
                                                                                        <span
                                                                                            class="p-l-35">{{ucwords($gettask->task)}}</span>
                                                                                    </td>
                                                                                    <td>&nbsp;</td>
                                                                                    @foreach($daterange as $t => $dateranges)
                                                                                                              
                                                                                                              <?php
                                                                                                              
                                                                                                              $Day =  date('D',strtotime($dateranges));
                                                                                                              
                                                                                                                if ($Day== 'Sun' || $Day == 'Sat'){
                                                                                                                    $display = 'none';
                                                                                                                    $cl = 'readonly';
                                                                                                                    $class="clr";
                                                                                                                    
                                                                                                                }else{
                                                                                                                    
                                                                                                                     $display = 'block';
                                                                                                                    
                                                                                                                      $cl = '';
                                                                                                                       $class="";
                                                                                                                    
                                                                                                                }
                                                                                                                
                                                                                                                   if(in_array($projects->project_id,$projectidlist) || in_array($userprojects->emp_id,$emp_list)){
                                                                                                                    $projectenbled = '';
                                                                                                                }else{
                                                                                                                     $projectenbled = 'futurDate';
                                                                                                                }
                                                                                                                
                                                                                                                
                                                                                                              
                                                                                                              ?>
                                                                                                              
                                                                                                              
                                                                                                            <td
                                                                                                                class="timespan">
                                                                                                                <input type="hidden" {{$cl}} name = "entrydate[{{$projects->project_id}}][{{$gettask->project_task_id}}][]" value="{{$dateranges}}">
                                                                                                                <input class="defaultEntry without_ampm {{$class}} {{$projectenbled}}"
                                                                                                                    type="text" step="1800" min="00:00" max="23:59"  required class="without" autofocus {{$cl}}  
                                                                                                                    placeholder="00:00" name = "entryhour[{{$projects->project_id}}][{{$gettask->project_task_id}}][]" value="{{$gettask->duration[$t]??'00:00'}}">
                                                                                                            </td>
                                                                                                           
                                                                                                            @endforeach
                                                                                                            <td>{{$gettask->task_hour}}</td>
                                                                                </tr>
                                                                                  @endforeach
                                                                             
                                                                                @endforeach
                                                                                
                                                                                   <tr class="row_update {{$s_id}}" >
                                                                                    <td colspan="10">
                                                                                          <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                                                                                    </td>
                                                                                </tr>
                                                                                 </form>
                                                                      @endforeach