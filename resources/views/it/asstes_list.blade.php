 @extends('layouts.superadmin_layout')

 @section('content')

 <div class="content p-0">
  <div class="container-fluid">
   <div class="page-title-box">
    <div class="row align-items-center bredcrum-style">
     <div class="col-sm-6 col-6">
      <h3 class="page-title">Assets Master</h3>
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
       <li class="breadcrumb-item active"><a href="assets_list.html">Assets Master</a>
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
     <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#assetlist"
        role="tab"><span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
        <span class="d-none d-sm-block">Asset List</span></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#emplist"
          role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
          <span class="d-none d-sm-block">Employee List</span></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active p-3" id="assetlist" role="tabpanel">
           <div class="row">
            <div class="col-sm-12 m-t-20">
              <button class="btn btn-primary m-r-5 float-right" onclick="show_add_assest()">Add Asset</button>
             <a href="{{URL::to('download_assets')}}"><button class="btn btn-primary float-right m-r-5">Download CSV</button></a>
             <table id="datatable" class="table table-bordered dt-responsive nowrap assets_list"
             style="border-collapse: collapse; border-spacing: 0; width: 100%;">
             <thead>
               <tr>
                 <th>S.No</th>
                 <th>Asset Name</th>
                 <th>Asset Type</th>
                 <th>Serial No.</th>
                 <th>AMC Start Date</th>
                 <th>AMC End Date</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>

             </tbody>
           </table>
         </div>
        
       </div>
     </div>
     <div class="tab-pane p-3" id="emplist" role="tabpanel">
      <div class="row">
       <div class="col-sm-12 m-t-20">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#assignasset">Assign Assets</button>
        <table id="datatable2" class="table table-bordered dt-responsive nowrap assign_assets"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Employee Name</th>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Serial No.</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
 
  </div>
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

<!-- add asset modal-->
<div id="addasset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title mt-0" id="myModalLabel">Add Asset</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  </div>
  <div class="modal-body">
    <div class="row">
     <div class="col-md-6">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Asset Name
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <input type="text" class="form-control" id="assets_name"> 
             <div id="assets_name_error"></div>
           </div>
         </div>
       </div>
       <?php
        $asset = DB::table('asset_master')->get();
       ?>
       <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Asset Type<span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <select class="form-control" id="assets_type"> 
                <option value="">Select Option</option>
              @foreach($asset as $assets)
                <option>{{$assets->asset_name}}</option>
                @endforeach
             </select>
             <div id="assets_type_error"></div>
           </div>
         </div>
       </div>
     </div>
     <div class="row">
      <div class="col-md-6">
        <div class="form-group row m-0">
          <label for="empcode" class="col-lg-4 col-form-label">Serial Number
            <span class="text-danger">*</span></label>
            <div class="col-lg-8 col-form-label">
              <input type="text" class="form-control" id="serial_no"> 
              <div id="serial_no_error"></div></div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-sm-12 p-lr-30">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" name="remember" id="amcCheckbox">
              <!--  <input type="checkbox" class="custom-control-input" id="customControlInline"> -->
              <label class="custom-control-label" for="amcCheckbox">Is AMC Applicable</label>
            </div>
          </div>
        </div>
        <div class="display-none" id="amcpanel">
        <div class="row AMC">
         <div class="col-md-6">
          <div class="form-group row m-0">
            <label for="empid" class="col-lg-4 col-form-label p-r-0">AMC Start Date<span class="text-danger">*</span></label>
            <div class="col-lg-8 col-form-label">
              <input type="date" class="form-control" id="start_date"> 
              <div id="start_date_error"></div>
            </div>
          </div>
        </div>
        <input type="hidden" id="assets_id">
        <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empcode" class="col-lg-4 col-form-label p-r-0">AMC End Date 
             <span class="text-danger">*</span></label>
             <div class="col-lg-8 col-form-label">
               <input type="date" class="form-control" id="end_date">
               <div id="end_date_error"></div>
             </div>
           </div>
         </div>
       </div>
     </div> 
     </div>
     <div class="modal-footer">
      <div class="row">
       <div class="col-sm-12">
        <button  onclick="add_assets()" class="btn btn-primary add_assets">Add</button>
        <button class="btn btn-default">Cancel</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- add asset end  modal-->
<!-- Assign asset modal-->
<div id="assignasset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title mt-0" id="myModalLabel">Assign Asset</h5>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   </div>
   <?php
   $user_list = DB::table('main_users')->where('isactive',1)->get();
   ?>
   <div class="modal-body">
     <div class="row">
      <div class="col-md-8 p-0">
        <div class="form-group row m-0">
          <label for="empcode" class="col-lg-4 col-form-label">Employee Name
            <span class="text-danger">*</span></label>
            <div class="col-lg-8 col-form-label">
              <select class="form-control" id="user_list" onchange="get_assign_asset(this.value)">
                <option value="">select option</option>
                @foreach($user_list as $user_lists) 
                <option value="{{$user_lists->id}}">{{$user_lists->userfullname}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-md-12">
        <button onclick="assign_new_assets()" class="btn btn-primary float-right">Assign</button>
        <table id="datatable" class="table table-bordered dt-responsive nowrap user_assign_assets"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
          <tr>
           <th>
             <div class="custom-control custom-checkbox"><input
              type="checkbox" class="custom-control-input"
              id="customControlInline"> <label
              class="custom-control-label"
              for="customControlInline"></label>
            </div>
          </th>
          <th>S.No</th>
          <th>Asset Name</th>
          <th>Asset Type</th>
          <th>Serial No.</th>
          <th>AMC Start Date</th>
          <th>AMC End Date</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</div>

@stop

@section('extra_js')

<script language="javascript" type="text/javascript">
  $(document).ready(function() {
    $('#datatable1').DataTable();
  });
// is AMC checked
$(function() {
  $("#amcCheckbox").on("click",function() {
    $("#amcpanel").toggle(this.checked);
  });
});
  function assign_new_assets(){
    checked_assetes = [];
    $('input[name="assign_assets"]:checked').each(function() {
      checked_assetes.push($(this).val());

    });

    var assets_id = JSON.stringify(checked_assetes);
    var user_id = $('#user_list').val();

    if(assets_id == ''){
      alert('Plase Choose Assets');
      return false;
    }

     if(user_id == ''){
      alert('Plase Choose Users');
      return false;
    }

    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/user_assign_assets',
      type: "post",
      data: { "_token": _token,"assets_id":assets_id,"user_id":user_id},
      dataType: 'JSON',

      success: function (data) {
       assign_assets();
       $('#assignasset').modal('hide');
       alertify.success(data.msg);


     }
   });

  }

  get_assets();

  function get_assets() {



    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/all_assets',
      type: "post",
      data: { "_token": _token},
      dataType: 'JSON',

      success: function (data) {
               // console.log(data.milstone); // this is good
               $('table.assets_list tbody').html(data.assets);


             }
           });
  }

  function get_assign_asset(user_id){

    get_user_assets(user_id);

  }

  function get_user_assets(user_id) {



    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/all_user_assets',
      type: "post",
      data: { "_token": _token,"user_id":user_id},
      dataType: 'JSON',

      success: function (data) {
               // console.log(data.milstone); // this is good
               $('table.user_assign_assets tbody').html(data.assets);


             }
           });
  }


  assign_assets();
  function assign_assets() {



    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/assign_assets',
      type: "post",
      data: { "_token": _token},
      dataType: 'JSON',

      success: function (data) {
               // console.log(data.milstone); // this is good
               $('table.assign_assets tbody').html(data.assets);


             }
           });
  }


  function delete_assign_assets(element,assign_id){

    var result = confirm("Are Your Sure to Return Assets?");
    if (result) {
    //Logic to delete the item

    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/delete_assign_assets',
      type: "post",
      data: { "_token": _token,"assign_id":assign_id},
      dataType: 'JSON',

      success: function (data) {
               // console.log(data.milstone); // this is good
               alertify.success(data.msg);
               assign_assets();


             }
           });
  }

}

function delete_assets(element,asset_id){

   var result = confirm("Are Your Delete?");
    if (result) {
    //Logic to delete the item

    var _token = "{{csrf_token()}}";

    $.ajax({
      url: '/delete_assets',
      type: "post",
      data: { "_token": _token,"asset_id":asset_id},
      dataType: 'JSON',

      success: function (data) {
               // console.log(data.milstone); // this is good
               alertify.success(data.msg);
                get_assets();


             }
           });
  }


}

function show_add_assest(){

 $('#myModalLabel').text('Add Asset');
 var assets_name = $('#assets_name').val('');
 var assets_type = $('#assets_type').val('');
 var serial_no = $('#serial_no').val('');
 var start_date = $('#start_date').val('');
 var end_date= $('#end_date').val('');
 var assets_id= $('#assets_id').val('');
 $('#addasset').modal('show');

}

function add_assets(){



  var error = 1;
  var assets_name = $('#assets_name').val();
  var assets_type = $('#assets_type').val();
  var serial_no = $('#serial_no').val();
  var start_date = $('#start_date').val();
  var end_date= $('#end_date').val();
  var assets_id= $('#assets_id').val();
   



  if(assets_name == ''){
    $('#assets_name_error').html('Please Enter Assets Name').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#assets_name_error').hide();
    error = 1;

  }

  if(assets_type == ''){
    $('#assets_type_error').html('Please Enter Assets Type').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#assets_type_error').hide();
    error = 1;

  }

  if(serial_no == ''){
    $('#serial_no_error').html('Please Enter Serial No').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#serial_no_error').hide();
    error = 1;

  }
 if($('#amcCheckbox').is(":checked")){

  if(start_date == ''){
    $('#start_date_error').html('Please Enter Start Date').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#start_date_error').hide();
    error = 1;

  }

  if(end_date == ''){
    $('#end_date_error').html('Please Enter End Date').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#end_date_error').hide();
    error = 1;

  }

 }
  

  var d111 = Date.parse(start_date);
  var d222 = Date.parse(end_date);
  if (d111 > d222) {
   $('#end_date_error').html('Please Wrong  Date').css("color", "red").show();
   error = 0;
   return false;
 }


 var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/add_assets',
  type: "post",
  data: { "_token": _token, "assets_name": assets_name,'assets_type':assets_type,'serial_no':serial_no,'start_date':start_date,'end_date':end_date,'assets_id':assets_id},
  dataType: 'JSON',

  success: function (data) {
                console.log(data.allclient); // this is good
                $('#addasset').modal('hide');
                alertify.success(data.msg);
                get_assets();



              }
            });    
}

function edit_assets(thisval,asset_id){

  var _token = "{{csrf_token()}}";

  $.ajax({
    url: '/edit_assets',
    type: "post",
    data: { "_token": _token, "asset_id": asset_id},
    dataType: 'JSON',

    success: function (data) {



     var assets_name = $('#assets_name').val(data.assets.assets_name);
     var assets_type = $('#assets_type').val(data.assets.assets_type);
     var serial_no = $('#serial_no').val(data.assets.asstes_serial);
     var start_date = $('#start_date').val(data.assets.start_date);
     var end_date= $('#end_date').val(data.assets.end_date);
     var assets_id= $('#assets_id').val(data.assets.id);
     $('#myModalLabel').text('Edit Asset');
     $('#addasset').modal('show');




   }
 }); 

}
$(document).ready(function(){
  $("#datatable1").DataTable();
    $("#datatable2").DataTable();

})
</script>

@stop