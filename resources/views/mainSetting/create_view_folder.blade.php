@extends('layouts.superadmin_layout')

@section('content')



  <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6">

                                <h4 class="page-title">File Manager</h4>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                                    <li class="breadcrumb-item active"><a href="expenses.html">File Manager</a>

                                    </li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end row -->

                    <!-- end row -->

                    <div class="row">

                        <div class="col-12">

                            <div class="card m-t-20">

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-8">

                                            <div class="form-group row">

                                                <label for="empcode" class="col-lg-4 col-form-label">Create New Folder

                                                    <span class="text-danger"></span>

                                                </label>

                                                <div class="col-lg-5">

                                                    <input type="text" id="folder_name" class="form-control">

                                                     <span id="folder_name_error"><span>

                                                </div>

                                                <div class="col-lg-3">

                                                    <button onclick="creatfolder()" class="btn btn-primary">Create</button>

                                                   

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group row">

                                                <label for="empcode" class="col-lg-4 col-form-label">In Progress

                                                    <span class="text-danger"></span>

                                                </label>

                                                <div class="col-lg-8">

                             <select class="form-control" onchange="show_folder(this.value)">
                                                <option value="all">All</option>
                                                <option value="in-progress">In Progress</option>
                                                <option value="hold">Hold</option>
                                                <option value="completed">Completed</option>

                                                        <option>sfsdf</option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row m-t-20 show_folder">

                                        

                                    
                                    </div>

                                  

                                </div>

                            </div>

                        </div>

                        <!-- end col -->

                    </div>

                    <!-- end row -->

                </div>

                <!-- container-fluid -->

            </div>

@stop



@section('extra_js')



<script>

 

 function doubleclick(element,folder_id){

     

     var Base_url = '{{URL::to('/')}}';

     window.location.href = Base_url+"/view_file/"+folder_id;

     

 }

var type = 'all';

 show_folder(type);

 function show_folder(type){

  var _token = "{{csrf_token()}}";



        $.ajax({

            url: '/show_folder',

            type: "post",

            data: { "_token": _token,'type':type},

            dataType: 'JSON',



            success: function (data) {

            $('.show_folder').html(data.show_folder);

            }

        });
 }



    function creatfolder(){

        var folder_name = $('#folder_name').val();

         if(folder_name == ''){

            $('#folder_name_error').html('Please Enter Folder Name').css("color", "red").show();

            error = 0;

            return false;

        }else{

            $('#folder_name_error').hide();

            error = 1;

            

        }

        

        var _token = "{{csrf_token()}}";

$('#loadingDiv').show();

        $.ajax({

            url: '/create_folder',

            type: "post",

            data: { "_token": _token,'folder_name':folder_name},

            dataType: 'JSON',



            success: function (data) {

                $('#loadingDiv').hide();
                $('#folder_name').val('');

                    alertify.success(data.msg);

                    show_folder(type);



            }

        });





    }







$(function () {

            $("#form-horizontal").steps({

                headerTag: "h3",

                bodyTag: "fieldset",

                transitionEffect: "slide"

            });

        });

    </script>

    <script>

    

     function save_content(element,folder_id) {

       element.contentEditable=false;  

       

      var content =  $(element).text();

      

         var _token = "{{csrf_token()}}";



        $.ajax({

            url: '/rename_folder',

            type: "post",

            data: { "_token": _token,'folder_id':folder_id,'content':content},

            dataType: 'JSON',



            success: function (data) {

              

                    alertify.success(data.msg);

                  



            }

        });

       

     }

    

    

        function listenForDoubleClick(element) {

          element.contentEditable = true;

         

      

        

          setTimeout(function() {

            if (document.activeElement !== element) {

                

                  console.log(element);

              element.contentEditable = false;

                

            }

          }, 300);

        }

        

        

        

        </script>



@stop