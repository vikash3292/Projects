@extends('layouts.superadmin_layout')



@section('extra_css')
<style type="text/css">
    /* The switch - the box around the slider*/
    /* .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    float: right;
  } */

    /* Hide default HTML checkbox */
    /* .switch input {
    display: none;
  } */

    /* The slider */
    /* .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input.default:checked+.slider {
    background-color: #444;
  }

  input.primary:checked+.slider {
    background-color: #2196F3;
  }

  input.success:checked+.slider {
    background-color: #8bc34a;
  }

  input.info:checked+.slider {
    background-color: #3de0f5;
  }

  input.warning:checked+.slider {
    background-color: #FFC107;
  }

  input.danger:checked+.slider {
    background-color: #f44336;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
    /* .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  } */



    ul.submenu li.coman {
        list-style: none;
        /* background: #efeeee; */
        padding: 10px;
        margin-bottom: 10px;
    }

    /* ul.submenu li ul.submenu li.coman:last-child {
    border-bottom: 0px;
  } */

    ul.submenu li.coman input[type="checkbox"] {
        width: 15px;
        height: 15px;
        margin: 0px 10px 0 0;

    }

    /* .submenu{
    border:1px solid #ccc;
  } */
    .coman {
        border: 1px solid #aaa;
        margin: 10px;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }

    li.coman ul {
        display: none;
        cursor: default;
    }
</style>

@stop


@section('content')
<div class="content-page">
    <div class="content p-0">
        <div class="container-fluid" style="background:#fff; padding:10px;">
            <div class="row">
                <div class="col-md-12">
                    @php($roles = DB::table('main_roles')->where('id', '=', $roll)->first())
                    <div class="grid-title no-border">
                        <h4><span class="semi-bold">Permission {{$roles->rolename??''}}</span></h4>
                        <a class="btn btn-primary btn-cons pull-right" href="javascript: history.go(-1)">Back</a>

                    </div>
                    <span id="msg"></span>
                </div>
            </div>
            <div class="row">

                <input type="hidden" id="roll" name="roll" value="{{$roll}}">
                {!! csrf_field() !!}
                <div class="col-md-10 col-md-offset-1">
                    <ul class="submenu">

                        @if(!empty($menus))
                        @foreach($menus as $menu1)
                        <?php
          if (in_array($menu1['id'], $arr)) {
            $c = "checked";
          } else {
            $c = "";
          } ?>
                        <li class="coman"><input type="checkbox" {{$c}} id="int{{$menu1['id']}}" name="permission[]"
                                class="parent"> {{$menu1['title']}}

                            <ul class="submenu">
                                <?php
              $getpermission =  DB::table('module_permission')->Join('permissions', 'module_permission.permission_id', '=', 'permissions.id')->where('module_permission.sidebar_id', '=', $menu1['id'])->select('permissions.slug as controller_action', 'module_permission.sidebar_id', 'module_permission.permission_id')->get();
              ?>
                                @if(!empty($getpermission))
                                @foreach($getpermission as $submenu1)
                                <?php
              if (in_array($submenu1->permission_id, $arr1)) {
                $c3 = "checked";
              } else {
                $c3 = "";
              }
              ?>
                                <li class="coman">
                                    <input type="hidden" id="permi<?php echo $submenu1->permission_id; ?>"
                                        name="rollpermisionid[]" disabled="" value="{{$submenu1->permission_id}}">
                                    <input type="checkbox" {{$c3}} name="permission[]"
                                        value="{{$submenu1->permission_id}}" class="child child1"
                                        onchange="childdata(this,<?php echo $submenu1->sidebar_id; ?>,<?php echo  $submenu1->permission_id; ?>);">
                                    {{$submenu1->controller_action}}
                                </li>
                                @endforeach
                                @endif
                            </ul>


                            <ul class="submenu">
                                @if(!empty($menu1['sub']))
                                @foreach($menu1['sub'] as $submenu)
                                <?php
              if (in_array($submenu['id'], $arr)) {
                $c1 = "checked";
              } else {
                $c1 = "";
              }
              ?>
                                <li class="coman"><input type="checkbox" id="int{{$submenu['id']}}" {{$c1}}
                                        name="permission[]" class="child "
                                        onchange="childdata(this,<?php echo $submenu['parentid']; ?>);">
                                    {{$submenu['title']}}

                                    <ul class="submenu">
                                        <?php
                  $getpermission1 =  DB::table('module_permission')->Join('permissions', 'module_permission.permission_id', '=', 'permissions.id')->where('module_permission.sidebar_id', '=', $submenu['id'])->select('permissions.slug as controller_action', 'module_permission.sidebar_id', 'module_permission.permission_id')->get();
                  ?>
                                        @if(!empty($getpermission1))
                                        @foreach($getpermission1 as $subsubsubmenu)
                                        <?php
                  if (in_array($subsubsubmenu->permission_id, $arr1)) {
                    $c3 = "checked";
                  } else {
                    $c3 = "";
                  }
                  ?>
                                        <li class="coman">
                                            <input type="hidden" id="permi<?php echo $subsubsubmenu->permission_id; ?>"
                                                name="rollpermisionid[]" disabled=""
                                                value="{{$subsubsubmenu->permission_id}}">
                                            <input type="checkbox" {{$c3}} name="permission[]"
                                                value='{{$subsubsubmenu->permission_id}}' class="child child1"
                                                onchange="childdata(this,<?php echo $subsubsubmenu->sidebar_id; ?>,<?php echo  $subsubsubmenu->permission_id; ?>);">
                                            {{$subsubsubmenu->controller_action}}
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>





                                    <ul class="submenu">
                                        @if(!empty($submenu['sub']))
                                        @foreach($submenu['sub'] as $subsubmenu)
                                        <?php
                  if (in_array($subsubmenu['id'], $arr)) {
                    $c2 = "checked";
                  } else {
                    $c2 = "";
                  }
                  ?>
                                        <li class="coman"><input type="checkbox" {{$c2}} id="int{{$subsubmenu['id']}}"
                                                name="permission[]" class="child"
                                                onchange="childdata(this,<?php echo $subsubmenu['parentid']; ?>);">{{$subsubmenu['title']}}

                                            <ul class="submenu">
                                                <?php
                      $getpermission =  DB::table('module_permission')->Join('permissions', 'module_permission.permission_id', '=', 'permissions.id')->where('module_permission.sidebar_id', '=', $subsubmenu['id'])->select('permissions.slug as controller_action', 'module_permission.sidebar_id', 'module_permission.permission_id')->get();
                      ?>
                                                @if(!empty($getpermission))
                                                @foreach($getpermission as $subsubsubsubmenu)
                                                <?php
                      if (in_array($subsubsubsubmenu->permission_id, $arr1)) {
                        $c3 = "checked";
                      } else {
                        $c3 = "";
                      }
                      ?>
                                                <input type="hidden"
                                                    id="permi<?php echo $subsubsubsubmenu->permission_id; ?>"
                                                    name="rollpermisionid[]" disabled=""
                                                    value="{{$subsubsubsubmenu->permission_id}}">
                                                <li class="coman"><input type="checkbox" {{$c3}} name="permission[]"
                                                        value="{{$subsubsubsubmenu->permission_id}}"
                                                        class="child child1"
                                                        onchange="childdata(this,<?php echo $subsubsubsubmenu->sidebar_id; ?>,<?php echo  $subsubsubsubmenu->permission_id; ?>);">
                                                    {{$subsubsubsubmenu->controller_action}}
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>

                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

@stop

@section('extra_js')


<script type="text/javascript">
    $('input[type=checkbox]').click(function (event) {

        event.stopPropagation()

        yourArray = [];
        // if is checked
        if ($(this).is(':checked')) {
            // check all children
            $(this).parent().find('input[type=checkbox]').prop('checked', true);
            // check all parents
            $(this).parent().prev().prop('checked', true);
            $(this).parent().find('input[type=checkbox]').prop('checked', true).each(function () {
                yourArray.push($(this).val());
            });
            var uniqueNames = [];
            $.each(yourArray, function (i, el) {
                if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
            });
            var array = uniqueNames;
            var index = array.indexOf("on");
            if (index > -10) {
                array.splice(index, 1);
            }

            //ajex 
            if (array != '') {
                $('#loadingDiv').show();
                var roll = $('#roll').val();
                dataString = array; // array?
                var jsonString1 = JSON.stringify(dataString);
                $.ajax({
                    type: "POST",
                    url: "/ajexinsertpermission",
                    data: {
                        _token: '{{csrf_token()}}',
                        arrdata: jsonString1,
                        roll: roll
                    },
                    cache: false,
                    success: function (res12) {
                        console.log(res12);
                        if (res12.status == 200) {
                            alertify.success(res12.msg);
                            $('#loadingDiv').hide();
                        } else if (res12.status == 201) {
                            alertify.success(res12.msg);
                            $('#loadingDiv').hide();
                        }
                    }
                });
            }
        } else {
            $(this).parent().find('input[type=checkbox]').prop('checked', false);
            $(this).parent().find('input[type=checkbox]').prop('checked', false).each(function () {
                yourArray.push($(this).val());
            });
            var uniqueNames = [];
            $.each(yourArray, function (i, el) {
                if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
            });
            var array = uniqueNames;
            var index = array.indexOf("on");
            if (index > -10) {
                array.splice(index, 1);
            }
            console.log(array);

            // ajex 
            if (array != '') {
                $('#loadingDiv').show();
                var roll = $('#roll').val();
                dataString = array; // array?
                var jsonString = JSON.stringify(dataString);
                $.ajax({
                    type: "POST",
                    url: "/deleletepermission",
                    data: {
                        _token: '{{csrf_token()}}',
                        deldata: jsonString,
                        roll: roll
                    },
                    cache: false,
                    success: function (res12) {
                        console.log(res12.status);
                        $('#loadingDiv').hide();
                        if (res12.status == 200) {
                            alertify.success(res12.msg);
                            $('#loadingDiv').hide();
                        } else if (res12.status == 201) {
                            alertify.success(res12.msg);
                        }
                    }
                });
            }
        }
    });


    function childdata(gethtml, check, permision_id = null) {
        if ($(gethtml).is(':checked')) {
            if (permision_id != null) {
                $('#int' + check).prop('checked', true);
                $('#permi' + permision_id).removeAttr("disabled")
                $('#permi' + permision_id).removeAttr("disabled")
                var permisionid = $('#permi' + permision_id).val();
                var roll = $('#roll').val();
                $.ajax({
                    type: "POST",
                    url: "/ajexinsertpermissioncontroller",
                    data: {
                        _token: '{{csrf_token()}}',
                        permisionid: permisionid,
                        roll: roll
                    },
                    cache: false,
                    success: function (res) {
                        console.log(res);
                        if (res.status == 200) {
                            alertify.success(res.msg);
                        } else if (res.status == 201) {
                            alertify.success(res.msg);
                        }
                    }
                });
            }
        } else {
            if (permision_id != null) {
                $('#int' + check).prop('checked', false);
                var permisionid = $('#permi' + permision_id).val();
                var roll = $('#roll').val();
                $.ajax({
                    type: "POST",
                    url: "/ajexinsertpermissioncontrollerdelete",
                    data: {
                        _token: '{{csrf_token()}}',
                        permisionid: permisionid,
                        roll: roll
                    },
                    cache: false,
                    success: function (res) {
                        console.log(res);
                        if (res.status == 200) {
                            alertify.success(res.msg);
                        } else if (res.status == 201) {
                            alertify.success(res.msg);
                        }
                    }
                });
            }
        }
    }

    $(function () {
        $('li.coman').on('click', function (event) {
            event.stopPropagation();
            $(this).children('ul').toggle();
        });
    });

</script>
@stop