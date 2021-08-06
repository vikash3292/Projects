@extends('layouts.superadmin_layout')
@section('content')

  <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Add Expenses</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="add_expenses.html">Add
                                            Expenses</a></li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <a href="expenses.html" class="btn btn-primary float-right">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <form id="add_expenses_form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Expense Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                     <input type="text" class="form-control"  id="expenses_name" name="expenses_name">
                                                     <span id="expenses_name_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Project
                                                    <span class="text-danger"></span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="project_list" name="project_list">
                                                        <option value="">select option</option>
                                                        @foreach($project_list as $project_lists)
                                                        <option value="{{$project_lists->id}}">{{$project_lists->project_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $cat = DB::table('expenses_category')->get();
                                    ?>
                                    <div class="row">  
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empcode" class="col-lg-4 col-form-label">Category
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="category" name="category">
                                                        <option value="">Select Category</option>
                                                        @foreach($cat as $cats)
                                                        <option value="{{$cats->id}}">{{$cats->cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="category_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Expense Date <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" id="expenses_date" name="expenses_date">
                                                     <span id="expenses_date_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                         <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Amount
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-sm-3 p-r-0">
                                                            <select class="form-control" name="currency" id="currency">
                                                                <option>INR</option>
                                                                <option>USD</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-sm-9 p-l-0">
                                                            <input type="text" class="form-control" id="expenses_amt" name="expenses_amt">
                                                             <span id="expenses_amt_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Reimbursable<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <span>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="reim" name="reim" class="custom-control-input" value="2"> <label class="custom-control-label p-3" for="customRadioInline1">Yes</label></div>
                                                            </span>
                                                            <span>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="reim" name="reim" class="custom-control-input" checked="" value="1"> <label class="custom-control-label p-3" for="customRadioInline1">No</label></div>
                                                            </span>

                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Reimbursable Amount</label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="reimbursable_amt" name="reimbursable_amt">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                         </div>
                                        
                                   
                                    <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Select
                                                    Advance</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="advance" name="advance">
                                                        <option value="1">No Advance</option>
                                                         <option value="2"> Advance</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Add To Trip</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="trip" name="trip">
                                                        <option>Select Trip</option>
                                                    </select>
                                                    <span class="text-info cursorpointer" data-toggle="modal" data-target="#addtrip">Add to Trip</span>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    
                                    <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Upload
                                                    Receipt</label>
                                                <div class="col-lg-8">
                                                    <input type="file" multiple="" name="receipt[]" id="receipt" class="form-control" style="height:auto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="empid" class="col-lg-4 col-form-label">Status
                                                </label>
                                                <div class="col-lg-8">
                                                   <select class="form-control" id="status" name="status">
                                                       <option value="1">Submitted</option>
                                                       <option value="2">Reimburse</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="empid" class="col-lg-2 col-form-label">Description
                                                    </label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                      
                                    </div>
                                    <input type="hidden" name="submit_status" id="submit_status">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                        <button type="submit" value="1" class="btn btn-primary">Save</button>
                                         <button type="submit" value="2" class="btn btn-primary">Save & Submit</button>
                                          
                                            <button class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>


                <div id="addtrip" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Trip
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="trip_name">
                            <span id="trip_name_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">From Date</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="date" value="" id="example-text-input" id="from_date">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">To Date</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="date" value="" id="example-text-input" id="to_date">
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Description</label>
                         <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="desc"></textarea>
                        </div>
                        </div>
                    </div>
              
                <div class="modal-footer">
                    <button type="button" onclick="save_trip()" class="btn btn-primary waves-effect">Save</button>
                    <button type="button" class="btn btn-secondary waves-effect waves-light"
                        data-dismiss="modal">Cancel</button>
                </div>
                  </div>
            </div>
        </div>
    </div>
            

@stop

@section('extra_js')

<script type="text/javascript">
    all_trip(); 
  function all_trip(){

              var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/all_trip',
        type: "post",
        data: {"_token": _token},
        dataType: 'JSON',
         
        success: function (data) {
        
        $('#trip').html(data.trip);
          
        }
      });
  }  


function save_trip(){

            var error = 1;
       var trip_name = $('#trip_name').val();
        var from_date = $('#from_date').val();
         var to_date = $('#to_date').val();
          var desc = $('#desc').val();

         if(trip_name ==''){
          $('#trip_name_error').text('Trip Name is Required').attr('style','color:red');
          $('#trip_name_error').show();
            error = 0;
               return false;
       }else{$('#trip_name_error').hide();  error = 1;}

         if(error ==1){
             var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/add_trip',
        type: "post",
        data: {"_token": _token,"trip_name":trip_name,"from_date":from_date,"to_date":to_date,"desc" : desc},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){
                
                 alertify.success(data.msg); 
                 all_trip(); 
                 $('#addtrip').modal('hide');
                 
            }else{
                 alertify.success(data.msg); 
            }
            
        }
      });
        }
}


$("form[id='add_expenses_form']").submit(function(e) {
    e.preventDefault();

    var submitclick =  $(document.activeElement).val();
   $('#submit_status').val(submitclick);

var expenses_name =  $('#expenses_name').val();
var category =  $('#category').val();
var expenses_date =  $('#expenses_date').val();
var expenses_amt =  $('#expenses_amt').val();
var reim =  $('#reim:checked').val();
    if(expenses_name ==''){
          $('#expenses_name_error').text('Expenses is Required').attr('style','color:red');
          $('#expenses_name_error').show();
            error = 0;
               return false;
       }else{$('#expenses_name_error').hide();  error = 1;}

       if(category ==''){
          $('#category_error').text('Category is Required').attr('style','color:red');
          $('#category_error').show();
            error = 0;
               return false;
       }else{$('#category_error').hide();  error = 1;}


if(expenses_date ==''){
          $('#expenses_date_error').text('Expenses is Required').attr('style','color:red');
          $('#expenses_date_error').show();
            error = 0;
               return false;
       }else{$('#expenses_date_error').hide();  error = 1;}


if(expenses_amt ==''){
          $('#expenses_amt_error').text('Amount is Required').attr('style','color:red');
          $('#expenses_amt_error').show();
            error = 0;
               return false;
       }else{$('#expenses_amt_error').hide();  error = 1;}



  var formData = new FormData($(this)[0]);

   var files =$('input[type=file]')[0].files;
    console.log(files.length);

    for(var i=0;i<files.length;i++){
        formData.append("images[]", files[i], files[i]['name']);

    }


    var token = "{{csrf_token()}}"; 

  $.ajax({
    url: "/insert_expeses",
    headers: {'X-CSRF-TOKEN': token}, 
    type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
    success: function (data) {
       if(data.status == 200){
                
                 alertify.success(data.msg); 
                  window.location.href = "{{URL::to('/expense')}}";
            }else{
                 alertify.success(data.msg); 
            }
    },
   
  });

  
});
I

</script>

@stop