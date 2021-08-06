
@extends('layouts.superadmin_layout')
@section('content')

<div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Edit Organization</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                           <li class="breadcrumb-item active"><a href="edit_organization.html">Edit Organization</a></li>
                        </ol>
                     </div>
                     <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="client_mngt.html">
                                 <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button">
                                    Back</button>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empcode" class="col-lg-4 col-form-label">Organization Name
                                          <span class="text-danger"></span>
                                      </label>
                                      <div class="col-lg-8">
                                          <input type="text" value="{{$acc_edit->company}}" name="company" id="company" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empcode" class="col-lg-4 col-form-label">Client Name
                                          <span class="text-danger"></span>
                                      </label>
                                      <div class="col-lg-8">
                                          <input type="text" value="{{$acc_edit->fname}}" name="fname" id="fname" class="form-control">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empcode" class="col-lg-4 col-form-label">Organization Site
                                          <span class="text-danger"></span>
                                      </label>
                                      <div class="col-lg-8">
                                          <input type="text" value="{{$acc_edit->website}}" name="website" id="website" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empcode" class="col-lg-4 col-form-label">Phone
                                          <span class="text-danger"></span>
                                      </label>
                                      <div class="col-lg-8">
                                          <input type="number" value="{{$acc_edit->phone}}" name="phone" id="phone" class="form-control">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php

                           $leadowner = DB::table('main_users')->where('isactive',1)->whereIn('emprole',[12,13,14])->select('id','userfullname')->get();
                           
                          ?>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empid" class="col-lg-4 col-form-label">Organization Owner</label>
                                      <div class="col-lg-8">
                                          <select class="form-control" name="lead_ownere" id="lead_ownere">
                                           <option value="">Select Option</option>
                                           @foreach($leadowner as $leadowners)
                                           <option value="{{$leadowners->id}}" @if($acc_edit->owner == $leadowners->id)  selected @endif>{{$leadowners->userfullname}}</option>
                                           @endforeach
                                             </select>
                                      </div>
                                  </div>
                              </div>
                          
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empid" class="col-lg-4 col-form-label">Type
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="col-lg-8">
                                          <input type="text" id="ac_type" value="{{$acc_edit->ac_type}}" name="ac_type" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label for="empid" class="col-lg-4 col-form-label">Billing Address
                                          <span class="text-danger">*</span>
                                      </label>
                                      <div class="col-lg-8">
                                          <input type="text" value="{{$acc_edit->street}}" id="address" name="address" class="form-control">
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
                                                    <textarea class="form-control" rows="3" name="desc" id="desc">{{$acc_edit->desc}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           <div class="row">
                              <div class="col-sm-12 text-center m-t-20">
                                 <button onclick="client_edit()" class="btn btn-primary m-r-5">Update</button>
                                 <button type="reset" class="btn btn-default">Cancel</button>
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

<script type="text/javascript">

	var client_id = '{{$client_id}}';
	 var _token = "{{csrf_token()}}";
function client_edit(){
 var company = $('#company').val();
  var fname = $('#fname').val();
   var website = $('#website').val();
    var phone = $('#phone').val();
     var lead_ownere = $('#lead_ownere').val();
      var ac_type = $('#ac_type').val();
       var address = $('#address').val();
         var desc = $('#desc').val();

  $.ajax({
        url: '/edit_account_client',
        type: "post",
        data: {"_token": _token,"client_id":client_id,"company":company,"fname":fname,"website":website,"phone":phone,"lead_ownere":lead_ownere,"ac_type":ac_type,"address":address,"desc":desc},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){
                
                 alertify.success(data.msg); 
                  window.location.href = "{{URL::to('/client-management')}}";
            }else{
                 alertify.success(data.msg); 
            }
            
            
     
        }
      });

}


</script>
@stop