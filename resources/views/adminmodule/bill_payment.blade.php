@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center bredcrum-style">

                <div class="col-sm-6 col-6">

                    <h3 class="page-title">Bill Payments</h3>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>

                        <li class="breadcrumb-item active"><a href="bill_master.html">Bill Payments</a>

                        </li>

                    </ol>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="card m-t-20">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#newbillpayment">Add Bill Payment</button>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Bill Name</th>
                                            <th>Bill No.</th>
                                            <th>Bill Amount</th>
                                            <th>Vendor</th>
                                            <th>files</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php($i=1)
                                        @foreach($bill_pay as $bill_pays)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$bill_pays->bill_name}}</td>
                                            <td>{{$bill_pays->bill_no}}</td>
                                            <td>{{$bill_pays->bill_amt}}</td>
                                            <td>{{$bill_pays->vendor_name}}</td>
                                            <td><a href="{{URL::to('/')}}/{{$bill_pays->vendor_name}}">Download</a></td>
                                             <td>{{($bill_pays->status == 1?'Pending':($bill_pays->status == 2?'Aproved':'Reject'))}}</td>
                                            <td>

                                                 <a  href="{{URL::to('view-bill')}}/{{$bill_pays->id}}">
                                                <i title="View" class="mdi mdi-eye text-info" ></i>
                                               </a>

                                                <i title="Edit" class="mdi mdi-pencil text-warning"  onclick="edit_bill('{{$bill_pays->id}}')"></i>
                                                <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{URL::to('delete-bill')}}/{{$bill_pays->id}}">
                                                <i title="Delete" class="mdi mdi-delete text-danger"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- 
              add new Bill -->
    <div id="newbillpayment" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Bill Payment</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="bill_payment_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label">Bill Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="text" class="form-control" id="billname" name="billname" >
                                    <div id="billname_error"></div>
                                </div>
                            </div>
                        </div>
                         <?php
                        $bill_type=DB::table('tm_bill_master')->where('status',1)->get();
                        ?>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Type<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" name="bill_type" id="bill_type">
                                        <option value=""> Select option</option>
                                        @foreach($bill_type as $bill_types)
                         <option value="{{$bill_types->id}}">{{$bill_types->bill_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <div id="bill_type_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Number<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="text" class="form-control" id="bill_no" name="bill_bo" required="">
                                    <div id="bill_no_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Amount<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="number" class="form-control" id="bill_amt" name="bill_amt" required="">
                                    <div id="bill_amt_error"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $vendor=DB::table('tm_vendor')->where('status',1)->get();
                        ?>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Choose Vendor<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                         <select class="form-control" name="vendor" id="vendor" required="">
                                        <option value=""> Select option</option>
                                        @foreach($vendor as $vendors)
                         <option value="{{$vendors->id}}">{{$vendors->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="vendor_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Payment Type<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" id="paytype" name="paytype" onchange="get_pay_type(this.value)" required="">
                                    	<option value="">--Select--</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="onetime">One Time</option>
                                    </select>
                                    <div id="paytype_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 display-none" id="quarterly">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Quarterly<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" id="Quarter1" onchange="get_quarter(this.value)">
                                         <option value="">Select Option</option>
                                        <option value="1">Quarter 1</option>
                                        <option value="2">Quarter 2</option>
                                        <option value="3">Quarter 3</option>
                                        <option value="4">Quarter 4</option>
                                    </select>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>

                          <div class="col-sm-6 display-none" id="month_panel">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Monthly<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" id="choose_month" onchange="get_month(this.value)">
                                        
                                    </select>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>


                          <div class="col-sm-6 display-none" id="day_panel">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Day<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" id="choose_day">
                                        
                                    </select>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 display-none" id="startduedate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row m-0">
                                        <label for="empid" class="col-lg-4 col-form-label p-r-0">Start Date<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8 col-form-label">
                                            <input type="date" class="form-control" id="start_date" name="start_date" >
                                            <div id="start_date_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row m-0">
                                        <label for="empid" class="col-lg-4 col-form-label p-r-0">Due Date<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8 col-form-label">
                                            <input type="date" class="form-control" id="due_date" name="due_date">
                                            <div id="due_date_error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="bill_id">

                         <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Bill Upload<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <div class="col-lg-8 col-form-label">
                                            <input type="file"  id="files" name="files" class="form-control" name="due_date">
                                            <div id="files_error"></div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Status<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" name="status"  id="status">
                                        <option value="1">Pending</option>
                                        <option value="2">Approve</option>
                                        <option value="3">Reject</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-12 m-t-10 text-center">
                                <button  id="bill_payment" class="btn btn-primary">Submit to Account</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
        <!-- View Bill -->
      
    @stop
    @section('extra_js')
    <script type="text/javascript">


        function get_quarter(quarter_id){

            var quater_html = '';
            if(quarter_id == 1){

                quater_html +='<option value=""> Select Option </option><option value="03">March</option><option value="04">April</option><option value="05">May</option>';

            }else if(quarter_id == 2){

                   quater_html +='<option value=""> Select Option </option><option value="06">June</option><option value="07">July</option><option value="08">August</option>';

                    }else if(quarter_id == 3){

                   quater_html +='<option value=""> Select Option </option><option value="09">September</option><option value="10">October</option><option value="11">november</option>';

                    }else if(quarter_id == 4){

                   quater_html +='<option value=""> Select Option </option><option value="12">December</option><option value="1">January</option><option value="2">February</option>';

            }

            $('#choose_month').html(quater_html);
            $('#month_panel').show();

        }


function get_month(month_val){

    var today = new Date();
     makeDate = today.getFullYear()+'-'+month_val+'-01';

    var getDate = new Date(makeDate);
var lastDayOfMonth = new Date(getDate.getFullYear(), getDate.getMonth()+1, 0);
var lastday = lastDayOfMonth.getDate();
var day = '';
for (i = 1; i < lastday; i++) {

       day +='<option value='+i+'>'+i+'</option>';
    
}

       $('#choose_day').html(day);
         $('#day_panel').show();

}



        function edit_bill(bill_id){

       var _token = "{{csrf_token()}}";

   
        $.ajax({
        url: '/edit_bill',
        type: "post",
        data: {"_token": _token,"bill_id":bill_id},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          //console.log(data); // this is good

          $('#loadingDiv').hide();

              billname = $('#billname').val(data.bill.bill_name);

        $("#bill_type > option").each(function() {
         if($(this).val() == data.bill.bill_type){
            $('#bill_type').val(data.bill.bill_type).attr("selected"); 
         }

      });
     
      bill_no = $('#bill_no').val(data.bill.bill_no);
       bill_amt = $('#bill_amt').val(data.bill.bill_amt);

          $("#vendor > option").each(function() {
         if($(this).val() == data.bill.vendor){
            $('#vendor').val(data.bill.vendor).attr("selected"); 
         }

      });
        
          $("#paytype > option").each(function() {
         if($(this).val() == data.bill.payment_type){
            $('#paytype').val(data.bill.payment_type).attr("selected"); 
         }

      });
       
          start_date = $('#start_date').val(data.bill.start_date);
          due_date = $('#due_date').val(data.bill.due_date);

           $("#status > option").each(function() {
         if($(this).val() == data.bill.status){
            $('#status').val(data.bill.status).attr("selected"); 
         }

      });

            get_pay_type(data.bill.payment_type);

            if(data.bill.payment_type == 'quarterly'){

                

                get_quarter(data.bill.quarter);

                $("#Quarter1 > option").each(function() {
         if($(this).val() == data.bill.quarter){
            $('#Quarter1').val(data.bill.quarter).attr("selected"); 
         }
         });

                   get_month(data.bill.month);

                   $("#choose_month > option").each(function() {
         if($(this).val() == data.bill.month){
            $('#choose_month').val(data.bill.month).attr("selected"); 
         }
         });
                

                   
                  $("#choose_day > option").each(function() {
         if($(this).val() == data.bill.day){
            $('#choose_day').val(data.bill.day).attr("selected"); 
         }
         });


            }else{


                    $("#quarterly").css("display","none");
                     $("#month_panel").css("display","none");
                     $('#choose_month').val('');
                     $('#choose_day').val('');
                       $('#day_panel').hide();

            }

             
          $('#bill_id').val(data.bill.id);

           $('#newbillpayment').modal('show');

      
        },
       
      });

        }


         $(document).on('click','#bill_payment',function(event){
            event.preventDefault();

          

          
        var error = 1;
      billname = $('#billname').val();
      bill_type = $('#bill_type').val();
      bill_no = $('#bill_no').val();
       bill_amt = $('#bill_amt').val();

        vendor = $('#vendor').val();
         paytype = $('#paytype').val();
          start_date = $('#start_date').val();
          due_date = $('#due_date').val();
              status = $('#status').val();
               status = $('#status').val();
            bill_id =  $('#bill_id').val();
            choose_month =  $('#choose_month').val();
            choose_day =  $('#choose_day').val();
            Quarter1 =  $('#Quarter1').val();
             status =  $('#status').val();
            


   
      var attach = $('#files').val();

      if(billname == ''){
        $('#billname_error').html('Enter Bill Name').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#billname_error').hide();
          error = 1;

      }
       if(bill_type == ''){
        $('#bill_type_error').html('Enter Bill Type').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#bill_type_error').hide();
          error = 1;

      }
       if(bill_no == ''){
        $('#bill_no_error').html('Enter Bill No').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#bill_no_error').hide();
          error = 1;

      }
       if(bill_amt == ''){
        $('#bill_amt_error').html('Enter Bill Amount').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#bill_amt_error').hide();
          error = 1;

      }
       if(vendor == ''){
        $('#vendor_error').html('Enter Vendor Name').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#vendor_error').hide();
          error = 1;

      }
       if(paytype == ''){
        $('#paytype_error').html('Enter Payment Type').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#paytype_error').hide();
          error = 1;

      }
       if(status == ''){
        $('#status_error').html('Choose Status').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#status_error').hide();
          error = 1;

      }
       if(attach == ''){
        $('#files_error').html('Choose File').css("color", "Red").show();
        error = 0;
        return false;

      }else{

         $('#files_error').hide();
          error = 1;

      }


 formData  =  new FormData();
  var files = $('#files')[0].files[0];

formData.append('billname', billname);
formData.append('bill_type', bill_type);
formData.append('bill_no', bill_no);
formData.append('bill_amt', bill_amt);
formData.append('vendor', vendor);
formData.append('paytype', paytype);
formData.append('start_date', start_date);
formData.append('due_date', due_date);
formData.append('file', files);
formData.append('bill_id', bill_id);
formData.append('choose_month', choose_month);
formData.append('choose_day', choose_day);
formData.append('Quarter1', Quarter1);
formData.append('status', status);

        if(attach !=''){
              if($('#files')[0].files[0].size > 2000000) {
             alert("Please upload file less than 2MB. Thanks!!");
             $('#files')[0].files[0].val('');
             return false;
           }
        }
if(attach !=''){
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(attach)){
       
         $('#files_error').html('Worng Ext').show();
           error = 0;
        files.value = '';
        return false;
           }
         }
   

if(error == 1){

      $('#bill_payment').attr( 'disabled', 'disabled' );

       $('#loadingDiv').show();
              
    
      var token = "{{csrf_token()}}"; 
    

   
      $.ajax({
      url: '/bill_payment_add',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){


        $("form#bill_payment_form")[0].reset();
               if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Added Successfully", "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");
               location.reload();


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
       },
    });


   }

          });



    
               function get_pay_type(paytype){

            
           		if(paytype =='yearly'){
           			$("#startduedate").css("display","block");
                     $("#quarterly").css("display","none");
           		}
           		else if(paytype =='monthly'){
           			$("#startduedate").css("display","block");
                     $("#quarterly").css("display","none");
           		}
           		else if(paytype =='onetime'){
           			$("#startduedate").css("display","block");
                      $("#quarterly").css("display","none");
           		}
           		else if(paytype =='quarterly'){
           			$("#quarterly").css("display","block");
                    $("#startduedate").css("display","none");
           		}
           		else{
           			$("#startduedate").css("display","none");
                    $("#quarterly").css("display","none");
                     $("#month_panel").css("display","none");
                     $('#choose_month').val('');
                     $('#choose_day').val('');
                       $('#day_panel').hide();
                    
           		}
          }
    
    </script>
    @stop
    