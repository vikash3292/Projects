
@extends('layouts.superadmin_layout')
@section('content')


 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6 col-6">
                                <h4 class="page-title">Send Letter</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="add_new_letter.html">Send Letter</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="float-right d-md-block">
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
                                     <select class="form-control" id="letter" onchange="get_letter(this.value)">
                                             <option value="">Select Option</option>

                                             @foreach($letter_list as $letter_lists)

                                              <option value="{{$letter_lists->id}}">{{$letter_lists->latter_name}}</option>

                                              @endforeach
                                                    </select>
                                                    <span id="letter_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">To</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="users">
                                             <option value="">Select Option</option>

                                             @foreach($user_list as $user_lists)

                                              <option value="{{$user_lists->id}}">{{$user_lists->userfullname}}</option>

                                              @endforeach
                                                    </select>
                                                    <span id="users_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <textarea  id="letter_data"></textarea> 
                                             <span id="letter_data_error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button onclick="send_email()" class="btn btn-primary">Send</button>
                                            <button class="btn btn-default">Cancel</button>
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
    function get_letter(letter_id) {

       var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/get_letter',
        type: "post",
        data: {"_token": _token,"letter_id":letter_id},
        dataType: 'JSON',
         
        success: function (data) {
          console.log(data.letter);
            $("textarea#letter_data").val(data.letter);
            $("textarea#letter_data").parent('body').find('iframe').contents().find('.wysihtml5-editor').html('I changed!');
            $('.Editor-editor').html(data.letter);

        }
      });

       
    }


    function send_email() {
        var error = 1;
       var letter = $('#letter').val();
        var users = $('#users').val();
         var letter_data = $('.Editor-editor').html();
         
        
         
         if(letter ==''){
          $('#letter_error').text('Letter is Required').attr('style','color:red');
          $('#letter_error').show();
            error = 0;
               return false;
       }else{$('#letter_error').hide();  error = 1;}
       
            if(users ==''){
          $('#users_error').text('User is Required').attr('style','color:red');
          $('#users_error').show();
            error = 0;
               return false;
       }else{$('#users_error').hide();  error = 1;}
       
         if(letter_data ==''){
          $('#letter_data_error').text('Contect is Required').attr('style','color:red');
          $('#letter_data_error').show();
            error = 0;
               return false;
       }else{$('#letter_data_error').hide();  error = 1;}
       
       $('#loadingDiv').show();

        if(error ==1){
             var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/send_email',
        type: "post",
        data: {"_token": _token,"letter":letter,"users":users,"letter_data":letter_data},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){

                $('#loadingDiv').hide();
                
                 alertify.success(data.msg); 
                  
            }else{

                  $('#loadingDiv').hide();
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
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>tinymce.init({selector:'textarea'});</script>-->
           @stop