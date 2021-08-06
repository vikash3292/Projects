  
@extends('layouts.superadmin_layout')
@section('content')

 <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Edit Work Order</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="{{URL::to('/edit-work-order/')}}/{{$edit_list->id}}">Edit Work Order</a>
                           </li>
                        </ol>
                     </div>
                     <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="{{URL::to('/work-order')}}">
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
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#detail" role="tab"><span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                      <span class="d-none d-sm-block">Detail</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#milestone" role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                      <span class="d-none d-sm-block">Milestone</span></a></li>
                                   <!--    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#invoice" role="tab"><span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Invoices</span></a></li> -->
                             </ul>
                             <!-- Tab panes -->
                             <div class="tab-content">
                                <div class="tab-pane active p-10" id="detail" role="tabpanel">
                                     
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empcode" class="col-lg-4 col-form-label">Work Order
                                                    Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text"id="work_order_name" name="work_order_name" class="form-control"  value="{{$edit_list->work_order_name}}">
                                                    <span id="work_order_name_error"></span>
                                                     </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Work Order No.<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="work_order_no" class="form-control" value="{{$edit_list->work_order_no}}"> 
                                                   <span id="work_order_no_error"></span>
                                                  </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Work Order Date.<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="date" id="work_order_date" class="form-control" value="{{$edit_list->order_date}}"> 
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
                                                      <option value="{{$stages->stage}}"  @if($edit_list->stage == $stages->stage) selected    @endif>{{$stages->stage}}</option>
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
                                                     <option value="{{$orgs->id}}"  @if($edit_list->org_id == $orgs->id) selected    @endif>{{$orgs->company}}</option>
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
                                                     <option value="{{$contacts->id}}"   @if($edit_list->contact_id == $contacts->id) selected    @endif>{{$contacts->first_name}} {{$contacts->last_name}}</option>
                                                     @endforeach
                                                   
                                                   </select> 
                                                   <span id="contact_error"></span>
                                                  </div>
                                            </div>
                                        </div>


                                         <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="empid" class="col-lg-4 col-form-label">Scope Of Work<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                       <select class="form-control" id="sowchoose" onchange="get_scope(this.value)">
                                                   <option value="">Select Option</option>
                                                    @foreach($scope_data as $scope_datas)
                                                     <option value="{{$scope_datas->id}}"  @if($edit_list->scope_id == $scope_datas->id)   selected  @endif>{{$scope_datas->scope_name}}</option>
                                                     @endforeach
                                                   </select> 
                                                   <span id="work_order_date_error"></span>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="prifix" class="col-lg-4 col-form-label">Amount<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="work_amt" class="form-control" value="{{$edit_list->work_amt}}"> 
                                                      <span id="work_amt_error"></span>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row m-0">
                                                <label for="firstname" class="col-lg-4 col-form-label">Project Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-form-label">
                                                    <input type="text" id="project_name" class="form-control" value="{{$edit_list->project_name}}">
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
                                              <option value="{{$seless->id}}" @if($edit_list->sale_persone == $seless->id)  selected @endif>{{$seless->userfullname}}</option>
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
                                                        <option value="1" @if($edit_list->sale_persone == 1)  selected @endif>Pending</option>
                                                        <option value="2"  @if($edit_list->sale_persone == 2)  selected @endif>In-Proccess</option>
                                                        <option value="3" @if($edit_list->sale_persone == 3)  selected @endif>Complete</option>
                                                    </select>
                                                     <span id="status_error"></span>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row display-none" id="editsow">
                                      <div class="col-sm-12">
                                          <textarea  id="letter_data"></textarea> 
                                             <span id="letter_data_error"></span>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center m-t-20">
                                            <button onclick="work_order()" class="btn btn-primary">Update</button>
                                            <a href="{{URL::to('work-order')}}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                 </div>
                                <div class="tab-pane p-10" id="milestone" role="tabpanel">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <button class="btn btn-primary float-right" onclick="show_milstone()">Add Milestone</button>
                                         <table id="datatable" class="table table-bordered dt-responsive nowrap order_milstone" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                           <thead>
                                              <tr>
                                                <th>S.No</th>
                                                <th>Milestone Name</th>
                                                <th>Milestone Color</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                           </thead>
                                           <tbody>
                                              </tbody>
                                        </table>
                                    </div>
                                  </div>
                                
                                </div>
                             <!--    <div class="tab-pane p-10" id="invoice" role="tabpanel">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcode" class="col-lg-4 col-form-label">Company Name
                                             </label>
                                          <div class="col-lg-8 col-form-label">
                                            <input type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empid" class="col-lg-4 col-form-label">City</label>
                                          <div class="col-lg-8 col-form-label">
                                            <input type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcode" class="col-lg-4 col-form-label">Phone
                                             </label>
                                          <div class="col-lg-8 col-form-label">
                                            <input type="number" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empid" class="col-lg-4 col-form-label">Date</label>
                                          <div class="col-lg-8 col-form-label">
                                            <input type="date" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empcode" class="col-lg-4 col-form-label">Due Date
                                             </label>
                                          <div class="col-lg-8 col-form-label">
                                            <input type="date" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="empid" class="col-lg-4 col-form-label">Customer ID</label>
                                          <div class="col-lg-8 col-form-label">
                                            <input type="text" class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12 text-center">
                                     <button class="btn btn-primary">Save</button>
                                    </div>
                                 </div>
                                </div> -->
                            
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
             <div id="addmilestone" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Milestone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Milestone Name
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" id="milestone_name" placeholder="Milestone Name" class="form-control">
                                    <span id="milestone_name_error"><span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="milstone_id">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Milestone Color
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="color" id="milestone_color" placeholder="Milestone Color" class="form-control">
                                    <span id="milestone_color_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">Start Date <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date"  id="milestone_start_date"  placeholder="small Description" class="form-control">

                                     <span id="milestone_start_date_error"><span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-4 col-form-label">End Date
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" id="milestone_end_date" placeholder="small Description" class="form-control">
                                     <span id="milestone_end_date_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="empid" class="col-lg-2 col-form-label">Description<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" id="milestone_desc" rows="2"></textarea>
                                     <span id="milestone_desc_error"><span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save_milstone()" class="add-edit btn btn-primary waves-effect">Add</button>
                <button type="button" class="btn btn-secondary waves-effect waves-light" data-
                    dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>

         </div>
       </div>
     </div>
   </div>
 </div>

         @stop

          @section('extra_js')

<script language="javascript" type="text/javascript">

var work_id = '{{$work_id}}';

function show_milstone(){

     var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/get_last_work_order',
            type: "post",
            data: { "_token": _token, "work_id": work_id },
            dataType: 'JSON',

            success: function (data) {

                document.getElementById('milestone_start_date').readOnly = false;
      
              
              if(data.status ==200){

        document.getElementById('milestone_start_date').readOnly = true;
         
         $('#milestone_start_date').val(data.milstone);

           $('#milestone_name').val('');
          $('#milestone_color').val('');
      
         $('#milestone_end_date').val('');
        $('#milestone_desc').val('');
       
        
       

              }else{



         $('#milestone_start_date').val('');
        
       

              }

         $('#addmilestone').modal('show');

            }
        });

}

    function work_order() {
        var error = 1;
        var work_id = '{{$work_id}}';
       var work_order_name = $('#work_order_name').val();
        var work_order_no = $('#work_order_no').val();
         var work_amt = $('#work_amt').val();
          var project_name = $('#project_name').val();

          var sales = $('#sales').val();
          var status = $('#status').val();
           var work_order_date = $('#work_order_date').val();

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
        data: {"_token": _token,"work_order_name":work_order_name,"work_order_no":work_order_no,"work_amt":work_amt,"project_name" : project_name,"sales":sales,"status":status,"work_id":work_id,"work_order_date" : work_order_date,"sowchoose":sowchoose,"text_file":text_file,"stage":stage,"org":org,"contact":contact},
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



  function save_milstone(){

       
   

        var error = 1;
        var milestone_name = $('#milestone_name').val();
        var milestone_color = $('#milestone_color').val();
        var milestone_start_date = $('#milestone_start_date').val();
        var milestone_end_date = $('#milestone_end_date').val();
        var milestone_desc= $('#milestone_desc').val();
         var milstone_id= $('#milstone_id').val();
        

        if(milestone_name == ''){
            $('#milestone_name_error').html('Please Enter Milestone Name').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_name_error').hide();
            error = 1;
            
        }

       
         if(milestone_start_date == ''){
            $('#milestone_start_date_error').html('Please Choose Start Date').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_start_date_error').hide();
            error = 1;
           
        }

         if(milestone_end_date == ''){
            $('#milestone_end_date_error').html('Please Choose End Date').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_end_date_error').hide();
            error = 1;
           
        }

         if(milestone_desc == ''){
            $('#milestone_desc_error').html('Please Enter Milestone DESC').css("color", "red").show();
            error = 0;
            return false;
        }else{
            $('#milestone_desc_error').hide();
            error = 1;
           
        }

                 var d111 = Date.parse(milestone_start_date);
                  var d222 = Date.parse(milestone_end_date);
                  if (d111 > d222) {
                       $('#milestone_end_date_error').html('Please Wrong  Date').css("color", "red").show();
            error = 0;
            return false;
                  }
     

              var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/add_milstone_work_order',
            type: "post",
            data: { "_token": _token, "work_id": work_id,'milestone_name':milestone_name,'milestone_color':milestone_color,'milestone_start_date':milestone_start_date,'milestone_end_date':milestone_end_date,'milestone_desc':milestone_desc,'milstone_id':milstone_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.allclient); // this is good
              $('#addmilestone').modal('hide');
                  get_milestone(work_id);
                 


            }
        });
        

    }



function edit_milstonr(milstone_id){



     var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/edit_milstone_work_order',
            type: "post",
            data: { "_token": _token, "milstone_id": milstone_id },
            dataType: 'JSON',

            success: function (data) {
              
              
         $('#milestone_name').val(data.milstone.milestone_name);
         $('#milestone_color').val(data.milstone.color);
         $('#milestone_start_date').val(data.milstone.start_date);
        $('#milestone_end_date').val(data.milstone.end_date);
        $('#milestone_desc').val(data.milstone.description);
         $('#milstone_id').val(data.milstone.id);
         $('.add-edit').text('Edit');
       
         $('#addmilestone').modal('show');

            }
        });

}


  get_milestone(work_id);

    function get_milestone(work_id) {



        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/all_milstone_work_order',
            type: "post",
            data: { "_token": _token, "work_id": work_id },
            dataType: 'JSON',

            success: function (data) {
                console.log(data.milstone); // this is good
              $('table.order_milstone tbody').html(data.milstone);


            }
        });
    }


function delete_milstonr(thisval,milstone_id){

      var _token = "{{csrf_token()}}";



        $.ajax({
            url: '/delete_milstone',
            type: "post",
            data: { "_token": _token, "milstone_id": milstone_id },
            dataType: 'JSON',

            success: function (data) {
                if(data.status == 200){
                    $(thisval).parent().parent().remove();
                     get_milestone(work_id);
                      alertify.success(data.msg);

                }
                 


            }
        });

}


var  scope_id  = '{{$edit_list->scope_id}}';

get_scope(scope_id);

function get_scope(scope_id){

           var _token = "{{csrf_token()}}";
            $.ajax({
        url: '/get_scope_text',
        type: "post",
        data: {"_token": _token,"scope_id":scope_id},
        dataType: 'JSON',
         
        success: function (data) {
            console.log(data.scope);
            $("#editsow").css("display","block");
            $("#letter_data").Editor();
           $('.Editor-editor').html(data.scope); 
            
        }
      });
    }
</script>

           @stop