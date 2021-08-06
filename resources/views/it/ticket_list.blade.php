 @extends('layouts.superadmin_layout')

@section('content')

<div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Ticket List</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                           <li class="breadcrumb-item active"><a href="ticket.html">Ticket List</a>
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary float-right" data-target="#createticket" data-toggle="modal">Create Ticket</button>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Asset Name</th>
                                    <th>Subject</th>
                                    <th>Desc</th>
                                     <th>EMP</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php($i=1)
                            	@foreach($ticket as $tickets)
                                <tr title="View"> 
                                    <td>{{$i++}}</td>
                                    <td>{{$tickets->ticket_name}}</td>
                                    <td>{{$tickets->subject}}</td>
                                    <td>{{$tickets->desc}}</td>
                                    <td>{{$tickets->userfullname}}</td>
                                  
                                    <td>
                                        <a href="{{URL::to('ticket_view')}}/{{$tickets->id}}"> <i class="fa fa-eye text-info"
                                                title="View"></i></a>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="show_commnet(this.value,'{{$tickets->id}}')" id="status">
                                            <option value="1"  @if($tickets->status==1) selected @endif>Open</option>
                                            <option value="2"   @if($tickets->status==2) selected @endif>Close</option>
                                        </select>
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
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
         <!-- content -->
         <footer class="footer">© 2019 GRC</footer>
      </div>
      <!-- ticketstatus-->
      <div id="ticketstatus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-md">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title mt-0" id="myModalLabel">Add Comment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12">
                         <div class="form-group row m-0">
                             <label for="empcode" class="col-lg-4 col-form-label">Comment
                                 <span class="text-danger">*</span></label>
                             <div class="col-lg-8 col-form-label">
                                 <textarea class="form-control" rows="3" id="comment"></textarea>
                                  <div id="commnet_error"></div>
                                  </div>
                         </div>
                     </div>
                 </div>
               </div>
               <input type="hidden" id="ticket_id">
               <input type="hidden" id="ticket_status">
               <div class="modal-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <button onclick="save_comment()" class="btn btn-primary">Save</button>
                        <button class="btn btn-default">Cancel</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--ticketstatus end  modal-->
        <!-- create ticket-->
        <div id="createticket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title mt-0" id="myModalLabel">Create Ticket</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <?php
                  $asset_list = DB::table('main_assets')->get();
                  ?>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row m-0">
                                <label for="empcode" class="col-lg-4 col-form-label">Choose Asset
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                    <select class="form-control" id="selectother">
                                    	<option value="">Select optioo</option>
                                    	@foreach($asset_list as $asset_lists)
                                        <option>{{$asset_lists->assets_name}}</option>
                                        @endforeach
                                      
                                        <option value="other">Other</option>
                                    </select>
                                    <div id="selectother_error"></div>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-6 display-none" id="assetname">
                            <div class="form-group row m-0">
                                <label for="empcode" class="col-lg-4 col-form-label">Asset Name
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                   <input type="text" class="form-control" id="assets_name">
                                    <div id="assets_name_error"></div>
                                 </div>
                            </div>
                        </div>
                            <div class="col-md-6">
                            <div class="form-group row m-0">
                                <label for="empcode" class="col-lg-4 col-form-label">Subject
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8 col-form-label">
                                   <input type="text" class="form-control" id="subject">

                                    <div id="subject_error"></div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row m-0">
                                <label for="empcode" class="col-lg-2 col-form-label">Description
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-10 col-form-label">
                                   <textarea class="form-control" id="desc" rows="3"></textarea>
                                    <div id="desc_error"></div>
                                 </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <div class="row">
                        <div class="col-sm-12">
                           <button onclick="add_ticket()" class="btn btn-primary">Create</button>
                           <button class="btn btn-default">Cancel</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>



@stop
   @section('extra_js')

 <script>

 	function show_commnet(staus,ticket_id){
 		
 		$('#ticket_id').val(ticket_id);
 		$('#ticket_status').val(staus);
 		$('#ticketstatus').modal('show');

 	}


 	function save_comment(){
        error = 1;
 		var ticket_id = $('#ticket_id').val();
 		var status =$('#ticket_status').val();
          var comment =$('#comment').val();
 	 if(comment == ''){
        $('#commnet_error').html('Please Enter Comment').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#comment_error').hide();
            error = 1;
            
        }


                    var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/add_comment_ticket',
            type: "post",
            data: { "_token": _token, "ticket_id": ticket_id,'status':status,'comment':comment},
            dataType: 'JSON',

            success: function (data) {
              // this is good
            
               alertify.success(data.msg);
               location.reload();
               
                 


            }
        });

 	}

function add_ticket(){

	       var error = 1;
        var selectother = $('#selectother').val();
        var assets_name = $('#assets_name').val();
        var subject = $('#subject').val();
        var desc = $('#desc').val();
       


        

        if(selectother == ''){
            $('#selectother_error').html('Please Enter Assets Name').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#selectother_error').hide();
            error = 1;
            
        }
           if(subject == ''){
            $('#subject_error').html('Please Subject').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#subject_error').hide();
            error = 1;
            
        }
           if(desc == ''){
            $('#desc_error').html('Please Desc').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#desc_error').hide();
            error = 1;
            
        }


                    var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/add_ticket',
            type: "post",
            data: { "_token": _token, "selectother": selectother,'assets_name':assets_name,'subject':subject,'desc':desc},
            dataType: 'JSON',

            success: function (data) {
              // this is good
            
               alertify.success(data.msg);
               location.reload();
               
                 


            }
        });
}



   $('select').on('change', function() {
  if($(this).val()=='other'){
    debugger
    $("#assetname").css('display','block');
  }
  else{
      $("#assetname").css('display','none');
  }
});
   </script>

   @stop