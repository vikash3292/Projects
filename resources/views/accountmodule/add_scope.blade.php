@extends('layouts.superadmin_layout')
@section('content')

 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6 col-6">
                                <h4 class="page-title">Add Scope of Work</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="{{URL::to('/add_scope')}}">Add Scope of Work</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6 col-6">
                                <a href="{{URL::to('scope-of-work')}}" class="btn btn-primary float-right">Back to List</a>
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
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">
                                                    Name of SOW<span class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="scope_name" class="form-control"> 
                                                     <span id="scope_name_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Organization <span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="org_name" class="form-control">
                                                   <span id="org_name_error"></span>
                                                     </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="prifix" class="col-lg-4 col-form-label">Work Order Name<span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <select class="form-control" id="work_order">
                                                        <option value="">Select Option</option>
                                                        @foreach($work_order as $work_orders)
                                                         <option value="{{$work_orders->id}}">{{$work_orders->work_order_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="work_order_error"></span>

                                                 </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Contact <span
                                                        class="text-danger"> *</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="content_no" maxlength="10"  onkeypress="preventNonNumericalInput(event)" class="form-control"> 
                                                   <span id="content_no_error"></span>
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
                                        <div class="col-sm-12 text-center">
                                           <button onclick="add_scope()" class="btn btn-primary m-t-20">Save</button>
                                           
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

<script type="text/javascript">
	
function add_scope(){

error = 1;
var scope_name = $('#scope_name').val();
var org_name = $('#org_name').val();
var work_order = $('#work_order').val();
var content_no = $('#content_no').val();
 var scope_file = $('.Editor-editor').html();

   if(scope_name ==''){
          $('#scope_name_error').text('Scope of Work Name is Required').attr('style','color:red');
          $('#scope_name_error').show();
            error = 0;
               return false;
       }else{$('#scope_name_error').hide();  error = 1;}

       if(org_name ==''){
          $('#org_name_error').text('Organization is Required').attr('style','color:red');
          $('#org_name_error').show();
            error = 0;
               return false;
       }else{$('#org_name_error').hide();  error = 1;}

       if(work_order ==''){
          $('#work_order_error').text('Scope of Work Name is Required').attr('style','color:red');
          $('#work_order_error').show();
            error = 0;
               return false;
       }else{$('#work_order_error').hide();  error = 1;}

       if(content_no ==''){
          $('#content_no_error').text('Scope of Work Name is Required').attr('style','color:red');
          $('#content_no_error').show();
            error = 0;
               return false;
       }else{$('#content_no_error').hide();  error = 1;}

        if(error ==1){
            $(this).attr('disabled','disabled');
             var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/insert_scope',
        type: "post",
        data: {"_token": _token,"scope_name":scope_name,"org_name":org_name,"work_order":work_order,"content_no" : content_no,"scope_file":scope_file},
        dataType: 'JSON',
         
        success: function (data) {
            
             $(this).removeAttr('disabled','disabled');
            
            if(data.status == 200){
                
                 alertify.success(data.msg); 
                  window.location.href = "{{URL::to('/scope-of-work')}}";
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