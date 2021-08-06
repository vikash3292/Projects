 
@extends('layouts.superadmin_layout')
@section('content')
<div class="content p-0">
  <div class="container-fluid">
    <div class="page-title-box">
      <div class="row align-items-center bredcrum-style">
        <div class="col-sm-6 col-6">
          <h4 class="page-title">Add Work Order</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
            <li class="breadcrumb-item active"><a href="{{URL::to('dd-work-order')}}">Add Work Order</a>
            </li>
          </ol>
        </div>
        <div class="col-sm-6 col-6">
          <a href="javascript: history.go(-1)" class="btn btn-primary float-right">Back to List</a>
        </div>
      </div>
    </div>
    <!-- end row -->
    <!-- end row -->
    <div class="row">
      <div class="col-12">
        <div class="card m-t-20">
                           <!-- 


                           -->

                           <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row m-0">
                                  <label for="empcode" class="col-lg-4 col-form-label">Work Order
                                    Name<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-form-label">
                                      <input type="text"id="work_order_name" name="work_order_name" class="form-control">
                                      <span id="work_order_name_error"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row m-0">
                                    <label for="empid" class="col-lg-4 col-form-label">Work Order No.<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-form-label">
                                      <input type="text" id="work_order_no" class="form-control"> 
                                      <span id="work_order_no_error"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row m-0">
                                    <label for="empid" class="col-lg-4 col-form-label">Work Order Date.<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-form-label">
                                      <input type="date" id="work_order_date" class="form-control"> 
                                      <span id="work_order_date_error"></span>
                                    </div>
                                  </div>
                                </div>
                              
                                <?php $stage = DB::table('tm_stage')->get();?>

                                <div class="col-md-6">
                                  <div class="form-group row m-0">
                                    <label for="empid" class="col-lg-4 col-form-label">Scope Of Stage<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-form-label">
                                      <select class="form-control" id="stage" >
                                        <option value="">Select Option</option>
                                        @foreach($stage as $stages)
                                        <option value="{{$stages->stage}}" >{{$stages->stage}}</option>
                                        @endforeach


                                      </select> 
                                      <span id="stage_error"></span>
                                    </div>
                                  </div>
                                </div>
                                <?php $org = DB::table('main_lead_list')->where('lead_status',5)->where('owner',$userid)->get();?>
                                <div class="col-md-6">
                                  <div class="form-group row m-0">
                                    <label for="empid" class="col-lg-4 col-form-label">Organization<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-form-label">
                                     <select class="form-control" id="org" >
                                      <option value="">Select Option</option>
                                      @foreach($org as $orgs)
                                      <option value="{{$orgs->id}}">{{$orgs->company}}</option>
                                      @endforeach

                                    </select> 
                                    <span id="org_error"></span>
                                  </div>
                                </div>
                              </div>

                              <?php $contact = DB::table('main_contact')->where('owner',$userid)->get();?>
                              <div class="col-md-6">
                                <div class="form-group row m-0">
                                  <label for="empid" class="col-lg-4 col-form-label">Contact<span class="text-danger">*</span></label>
                                  <div class="col-lg-8 col-form-label">
                                   <select class="form-control" id="contact" >
                                    <option value="">Select Option</option>
                                    @foreach($contact as $contacts)
                                    <option value="{{$contacts->id}}">{{$contacts->first_name}} {{$contacts->last_name}}</option>
                                    @endforeach

                                  </select> 
                                  <span id="contact_error"></span>
                                </div>
                              </div>
                            </div>
                          </div>

                          
                          


                       
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row m-0">
                              <label for="prifix" class="col-lg-4 col-form-label">Amount<span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-form-label">
                                <input type="text" id="work_amt" class="form-control"> 
                                <span id="work_amt_error"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row m-0">
                              <label for="firstname" class="col-lg-4 col-form-label">Project Name<span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-form-label">
                                <input type="text" id="project_name" class="form-control">
                                <span id="project_name_error"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                        $seles = DB::table('main_users')->whereIn('emprole',[12,13,14])->where('isactive',1)->get();
                        ?>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row m-0">
                              <label for="logo" class="col-lg-4 col-form-label">Sales Person<span class="text-danger">*</span></label>
                              <div class="col-lg-8 col-form-label">
                               <select class="form-control" id="sales">
                                <option value="">Select Option</option>
                                @foreach($seles as $seless)
                                <option value="{{$seless->id}}">{{$seless->userfullname}}</option>
                                @endforeach
                              </select>
                              <span id="sales_error"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row m-0">
                            <label for="email" class="col-lg-4 col-form-label">Status</label>
                            <div class="col-lg-8 col-form-label">
                              <select class="form-control" id="status">
                                <option value="1">Pending</option>
                                <option value="2">In-Proccess</option>
                                <option value="3">Complete</option>
                              </select>
                              <span id="status_error"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                                  <div class="form-group row m-0">
                                    <label for="empid" class="col-lg-4 col-form-label">Scope Of Work<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-form-label">
                                      <select class="form-control" id="sowchoose" onchange="get_scope(this.value)">
                                        <option value="">Select Option</option>
                                        @foreach($scope_data as $scope_datas)
                                        <option value="{{$scope_datas->id}}">{{$scope_datas->scope_name}}</option>
                                        @endforeach

                                      </select> 
                                      <span id="work_order_date_error"></span>
                                    </div>
                                  </div>
                                </div>
                      </div>
                      <div class="row" id="editsow">
                        <div class="col-sm-12">
                          <textarea  id="letter_data"></textarea> 
                          <span id="letter_data_error"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 text-center m-t-20">
                          <button onclick="work_order()" class="btn btn-primary">Save</button>
                          <a href="{{URL::to('work-order')}}" class="btn btn-default">Cancel</a>
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
        @stop

        @section('extra_js')

        <script language="javascript" type="text/javascript">
          function work_order() {
            var error = 1;
            var work_order_name = $('#work_order_name').val();
            var work_order_no = $('#work_order_no').val();
            var work_amt = $('#work_amt').val();
            var project_name = $('#project_name').val();
            var work_order_date = $('#work_order_date').val();

            var sales = $('#sales').val();
            var status = $('#status').val();
            var sowchoose = $('#sowchoose').val();

            var text_file = $('.Editor-editor').html();

            var stage = $('#stage').val();
            var contact = $('#contact').val();
            var org = $('#org').val();

            if(work_order_name ==''){
              $('#work_order_name_error').text('Work Order Name is Required').attr('style','color:red');
              $('#work_order_name_error').show();
              error = 0;
              return false;
            }else{$('#work_order_name_error').hide();  error = 1;}

            if(work_order_no ==''){
              $('#work_order_no_error').text('Work Order No is Required').attr('style','color:red');
              $('#work_order_no_error').show();
              error = 0;
              return false;
            }else{$('#work_order_no_error').hide();  error = 1;}

            if(work_order_date ==''){
              $('#work_order_date_error').text('Work Order Date is Required').attr('style','color:red');
              $('#work_order_date_error').show();
              error = 0;
              return false;
            }else{$('#work_order_date_error').hide();  error = 1;}
            if(stage ==''){
              $('#stage_error').text('Stage is Required').attr('style','color:red');
              $('#stage_error').show();
              error = 0;
              return false;
            }else{$('#stage_error').hide();  error = 1;}
            if(contact ==''){
              $('#contact_error').text('contact is Required').attr('style','color:red');
              $('#contact_error').show();
              error = 0;
              return false;
            }else{$('#contact_error').hide();  error = 1;}
            if(org ==''){
              $('#org_error').text('Org is Required').attr('style','color:red');
              $('#org_error').show();
              error = 0;
              return false;
            }else{$('#org_error').hide();  error = 1;}

            if(work_amt ==''){
              $('#work_amt_error').text('Amount is Required').attr('style','color:red');
              $('#work_amt_error').show();
              error = 0;
              return false;
            }else{$('#work_amt_error').hide();  error = 1;}

            if(project_name ==''){
              $('#project_name_error').text('Project Name No is Required').attr('style','color:red');
              $('#project_name_error').show();
              error = 0;
              return false;
            }else{$('#project_name_error').hide();  error = 1;}

            if(status ==''){
              $('#status_error').text('Status is Required').attr('style','color:red');
              $('#status_error').show();
              error = 0;
              return false;
            }else{$('#status_error').hide();  error = 1;}




            if(error ==1){
             var _token = "{{csrf_token()}}";
             $.ajax({
              url: '/work_order_add',
              type: "post",
              data: {"_token": _token,"work_order_name":work_order_name,"work_order_no":work_order_no,"work_amt":work_amt,"project_name" : project_name,"sales":sales,"status":status,"work_order_date":work_order_date,"sowchoose":sowchoose,"text_file":text_file,"stage":stage,"org":org,"contact":contact},
              dataType: 'JSON',

              success: function (data) {

                if(data.status == 200){

                 alertify.success(data.msg); 
                 window.location.href = "{{URL::to('/work-order')}}";
               }else{
                 alertify.success(data.msg); 
               }

             }
           });
           }

         }




         function get_scope(scope_id){

           var _token = "{{csrf_token()}}";
           $.ajax({
            url: '/get_scope_text',
            type: "post",
            data: {"_token": _token,"scope_id":scope_id},
            dataType: 'JSON',

            success: function (data) {
              console.log(data.scope);
           // $("#editsow").css("display","block");
           
           $('.Editor-editor').html(data.scope); 

         }
       });

         }
         $(document).ready(function(){
           $("#letter_data").Editor();
         })


       </script>

       @stop