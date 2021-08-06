@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center bredcrum-style">

                <div class="col-sm-6 col-6">

                    <h3 class="page-title">Purchase Orders</h3>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                        <li class="breadcrumb-item active"><a href="purchase_order.html">Purchase Orders</a>

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
                                    data-target="#addpurchase">Add Purchase Order</button>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Purchase Order No.</th>
                                            <th>Purchase Order Name</th>
                                            <th>Date</th>
                                            <th class="text_ellipses">Discription</th>
                                            <th>Uploaded PDF</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php($i = 1)
                                        @foreach($plist as $plists)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$plists->pm_order_no}}</td>
                                            <td>{{$plists->pm_order_name}}</td>
                                            <td>{{$plists->date}}<</td>
                                            <td class="text_ellipses">{{$plists->desc}}<</td>
                                            <td>
                                             <a download="" href="{{URL::to('/public/')}}/{{$plists->files}}">Dwonload</a>
                                            </td>
                                            <td>{{($plists->status == 1 ? 'pending' : ($plists->status == 2? 'Approved':'Reject'))}}</td>
                                            <td>
                                                <i title="View" class="mdi mdi-eye text-info" data-toggle="modal"
                                                    data-target="#viewpurchase_{{$plists->id}}"></i>

                                        <div id="viewpurchase_{{$plists->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">View Bill Payment</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                           <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="prifix" class="col-lg-4 col-form-label">Purchase Order No.</label>
                                            <div class="col-lg-8">
                                               <label class="myprofile_label">{{$plists->pm_order_no}}</label>
                                                <span id="comment_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-4 col-form-label">Purchase Order Name</label>
                                            <div class="col-lg-8">
                                                <label class="myprofile_label">{{$plists->pm_order_name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-4 col-form-label">Date<span
                                                    style="color:red">*</span></label>
                                            <div class="col-lg-8">
                                                <label class="myprofile_label">{{$plists->date}}</label>
                                            </div>
                                        </div>
                                    </div>  
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-4 col-form-label">Uploaded File</label>
                                            <div class="col-lg-8">
                                                <label class="myprofile_label">  <a download="" href="{{URL::to('/public/')}}/{{$plists->files}}">Dwonload</a></label>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-4 col-form-label">Status</label>
                                            <div class="col-lg-8">
                                                <label class="myprofile_label">{{($plists->status == 1 ? 'pending' : ($plists->status == 2? 'Approved':'Reject'))}}</label>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                  
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-2 col-form-label">Description</label>
                                            <div class="col-lg-10">
                                                <label class="myprofile_label">{{$plists->desc}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                         <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-12 m-t-10 text-center">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    </div>
                   
                </div>

            </div>
        </div>



                                                <i title="Edit" class="mdi mdi-pencil text-warning" onclick="edit_purchage('{{$plists->id}}')"></i>

                                                <a  onclick="return confirm('Are you sure you want to delete this ?');" href="{{URL::to('delete_purchage')}}/{{$plists->id}}">
                                                <i title="Delete" class="mdi mdi-delete text-danger"></i></a>
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
              add new addpurchase -->
    <div id="addpurchase" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="add_purchage_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label">Purchase Order No.<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                    <input type="text" class="form-control" name="purchase_order_no" id="purchase_order_no" required="">
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                           <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Purchase Order Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="text" class="form-control" id="purchase_order_name" name="purchase_order_name" required="">
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Date<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="date" class="form-control" name="date" id="date" required="">
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Upload PDF<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="file" name="files" id="files" required="">
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Status<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                     <select class="form-control" name="status" id="status" required="">
                                                    <option value="1">Pending</option>
                                                    <option value="2">Approve</option>
                                                    <option value="3">Reject</option>
                                                </select>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-12">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-2 col-form-label">Description<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10 col-form-label">
                                    <textarea class="form-control" rows="3" name="desc" id="desc" required=""></textarea>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
                <input type="hidden" name="purchase_order_id" id="purchase_order_id">
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-12 m-t-10 text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
        <!-- View Purchase Order -->
       
      @stop
    @section('extra_js')

    <script type="text/javascript">

        function edit_purchage(p_id){
             var _token = "{{csrf_token()}}";

   
        $.ajax({
        url: '/edit_purchage',
        type: "post",
        data: {"_token": _token,"p_id":p_id},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          //console.log(data); // this is good

          $('#loadingDiv').hide();

              billname = $('#purchase_order_no').val(data.p_list.pm_order_no);
               $('#purchase_order_name').val(data.p_list.pm_order_name);
               $('#date').val(data.p_list.date);
               $('#desc').val(data.p_list.desc);
              
               $('#purchase_order_id').val(data.p_list.id);
               $('.modal-title ').text('Edit');

        $("#status > option").each(function() {
         if($(this).val() == data.p_list.status){
            $('#status').val(data.p_list.status).attr("selected"); 
         }

      });
     
      

        
           $('#addpurchase').modal('show');

      
        },
       
      });

        }
        

         $("form#add_purchage_form").submit(function(e) {

 
            e.preventDefault();

var formData = new FormData($(this)[0]);

   var token = "{{csrf_token()}}"; 
    

  $.ajax({
        url: '/add_purchage_order',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:formData,
        contentType: false,
        processData: false,   
        cache: false,  
        
        success: function (data) {
        //console.log(data.city); // this is good
    
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
          
        }
      });

            

          });

    </script>  
    @stop