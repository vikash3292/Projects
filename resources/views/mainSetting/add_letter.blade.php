 
@extends('layouts.superadmin_layout')
@section('content')


 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Add New Letter</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="add_new_letter.html">Add New Letter</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a class="btn btn-primary" href="letter_master.html">
                                            Back</a>
                                    </div>
                                </div>
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
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Letter Name</label>
                                                <div class="col-lg-8">
                                                    <input id="letter_name" type="text" class="form-control">
                                              <span id ="letter_name_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Letter Type</label>
                                                <div class="col-lg-8">
                                                    <input id="letter_type" type="text" class="form-control">
                                                    <span id ="letter_name_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <textarea id="letter_data"></textarea> 
                                             <span id ="letter_error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button onclick="add_new_letter()" class="btn btn-primary">Save</button>
                                           
                                        </div>
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

<script language="javascript" type="text/javascript">
    function add_new_letter() {
        var error = 1;
       var letter_name = $('#letter_name').val();
        var letter_type = $('#letter_type').val();
         var letter = $('.Editor-editor').html();
       
         
         if(letter_name ==''){
          $('#letter_name_error').text('Letter Name is Required').attr('style','color:red');
          $('#letter_name_error').show();
            error = 0;
               return false;
       }else{$('#letter_name_error').hide();  error = 1;}
       
            if(letter_type ==''){
          $('#letter_type_error').text('Letter is Required').attr('style','color:red');
          $('#letter_type_error').show();
            error = 0;
               return false;
       }else{$('#letter_type_error').hide();  error = 1;}
       
         if(letter ==''){
          $('#letter_error').text('Letter is Required').attr('style','color:red');
          $('#letter_error').show();
            error = 0;
               return false;
       }else{$('#letter_error').hide();  error = 1;}
       
     

        if(error ==1){
             var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/save_letter',
        type: "post",
        data: {"_token": _token,"letter_name":letter_name,"letter_type":letter_type,"letter":letter},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){
                
                 alertify.success(data.msg); 
                  window.location.href = "{{URL::to('/latter-history')}}";
            }else{
                 alertify.success(data.msg); 
            }
            
        }
      });
        }
       
    }

    $(document).ready(function() {
        $("#letter_data").Editor();
      });
</script>

           @stop