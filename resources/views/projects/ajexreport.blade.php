 <?php $i = 1;?>
 @foreach($projectlist as $projectlists)
                                                                              <?php $i++; $id="caret-$i";?>
                                                                                <tr class="caret_row" data-id='{{$id}}'>
                                                                                    <td class="table_text_ellipses text-left" data-toggle="tooltip" title="{{$projectlists->userfullname}}"><span class="caret">{{$projectlists->userfullname}}</span></td>
                                                                                    <td>{{$projectlists->day??0}} Days</td>
                                                                                    <td>{{$projectlists->hour??0}} Hours</td>
                                                                                    <td class="bg-gray">{{$projectlists->all_assign_hour_in_user_all}}</td>
                                                                                    <td class="">{{$projectlists->all_hour_in_user_all}}</td>
                                                                                    <td>{{$projectlists->fool_hour_in_user_all??'00:00'}} Hours</td>
                                                                                    </tr>
                                                                                    @foreach($projectlists->project as $projectlist)
                                                                                      <tr class="caret_row1 {{$id}}">
                                                                                    <td class="table_text_ellipses text-left" data-toggle="tooltip" title="{{$projectlist->project_name??''}}">{{$projectlist->project_name??''}}</td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td class="bg-gray">
                                                                                        {{$projectlist->all_assign_hour_in_project_all??'00:00'}}
                                                                                    </td>
                                                                                    <td class="{{$projectlist->all_hour_in_project_all_color}}">
                                                                                        {{$projectlist->all_hour_in_project_all??'00:00'}}
                                                                                    </td>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                  @endforeach
                                                                                </tr>
                                                                                
                                                                                @endforeach
                                                             