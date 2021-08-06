@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center bredcrum-style">

                <div class="col-sm-6 col-6">

                    <h3 class="page-title">Vendor List</h3>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                        <li class="breadcrumb-item active"><a href="bill_master.html">Vendor List</a>

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
                                    data-target="#addvendor">Add Vendor</button>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Vendor Name</th>
                                            <th class="text_ellipses">Discription</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i =1)
                                        @foreach($list as $lists)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$lists->vendor_name}}</td>
                                            <td>{{$lists->desc}}</td>
                                            <td>{{$lists->type}}</td>
                                            <td>
                                                <i title="View" class="mdi mdi-eye text-info" data-toggle="modal"
                                                    data-target="#viewvendor_{{$lists->id}}"></i>


                                                  <div id="viewvendor_{{$lists->id}}" class="modal fade" role="dialog">
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
                                            <label for="prifix" class="col-lg-4 col-form-label">Vender Name</label>
                                            <div class="col-lg-8">
                                               <label class="myprofile_label">{{$lists->vendor_name}}</label>
                                                <span id="comment_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-4 col-form-label">Type</label>
                                            <div class="col-lg-8">
                                                <label class="myprofile_label">{{$lists->type}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-lg-2 col-form-label">Description</label>
                                            <div class="col-lg-10">
                                                <label class="myprofile_label">{{$lists->desc}}</label>
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


                                                <i title="Edit" class="mdi mdi-pencil text-warning" onclick="edit_vendor('{{$lists->id}}')"></i>

                                                   <a  onclick="return confirm('Are you sure you want to delete this ?');" href="{{URL::to('delete-venodor')}}/{{$lists->id}}"> 
                                                <i title="Delete" class="mdi mdi-delete text-danger"></i>
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
              add new vendor -->
    <div id="addvendor" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="vendor_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label">Vendor Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="text" class="form-control" id="vendorname" name="vendorname" required="">
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                           <div class="col-sm-6">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-4 col-form-label p-r-0">Type<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <input type="text" class="form-control" id="type" name="type" required="">
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden"  id="vendor_id" name="vendor_id">
                        <div class="col-sm-12">
                            <div class="form-group row m-0">
                                <label for="empid" class="col-lg-2 col-form-label">Description<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10 col-form-label">
                                    <textarea class="form-control" rows="3" name="desc" id="desc"></textarea>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-12 m-t-10 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button  type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
        <!-- View vendor -->
     
      @stop
    @section('extra_js')

    <script type="text/javascript">
        

   function edit_vendor(v_id){

       var _token = "{{csrf_token()}}";

        $.ajax({
        url: '/edit_vendor_data',
        type: "post",
        data: {"_token": _token,"v_id":v_id},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          //console.log(data); // this is good

          $('#loadingDiv').hide();

              billname = $('#vendorname').val(data.vendor.vendor_name);
               $('#type').val(data.vendor.type);
               $('#desc').val(data.vendor.desc);
                $('#vendor_id').val(data.vendor.id);
               $('.modal-title').text('Edit');

           $('#addvendor').modal('show');

      
        },
       
      });

        }
        

         $("form#vendor_form").submit(function(e) {

 
            e.preventDefault();

var formData = new FormData($(this)[0]);

   var token = "{{csrf_token()}}"; 
    

  $.ajax({
        url: '/add_vendor',
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