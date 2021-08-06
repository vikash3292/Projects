    @extends('layouts.superadmin_layout')
   @section('content')
   
               <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6 col-6">
                                <h4 class="page-title">Organization</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Organization</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="float-right d-md-block">
                                    <div class="dropdown">
                                       
                                            <a href="{{URL::to('add-account')}}"
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                >
                                               Add New Organization</a>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Organization Name</th>
                                                <th>Organization Site</th>
                                                <th>Phone</th>
                                                <th>Organization Owner</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                        </tbody>
                                    </table>
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
           @stop

           @section('extra_js')

         <script>  
         
         var userid = '{{$userid}}';
         
         getaccount(userid);
         
         function getaccount(user_id){
             
      var _token = "{{csrf_token()}}";
     

  $.ajax({
        url: '/get_account',
        type: "post",
        data: {"_token": _token,"user_id":user_id},
        dataType: 'JSON',
         
        success: function (data) {
      
          $("#datatable tbody").html(data.account);
    
          
        }
      });
             
         }
         
//          function save_log(){
//           error = 1;  
//         var choose_date = $('#choose_date').val();
//         var commu_type = $('#commu_type').val();
//         var comment = $('#comment').val();
//         var next_date = $('#next_date').val();
//         var lead_log_id = $('#lead_log_id').val();
        
             
//          if(choose_date ==''){
//          $('#choose_date_error').text('Date is Required').attr('style','color:red');
//          $('#choose_date_error').show();
//           error = 0;
//               return false;

//       }else{$('#choose_date_error').hide();  error = 1;}
      
//       if(commu_type ==''){
//          $('#commu_type_error').text('Communication Type is Required').attr('style','color:red');
//          $('#commu_type_error').show();
//           error = 0;
//               return false;

//       }else{$('#commu_type_error').hide();  error = 1;}
      
//       if(comment ==''){
//          $('#comment_error').text('Comment is Required').attr('style','color:red');
//          $('#comment_error').show();
//           error = 0;
//               return false;

//       }else{$('#comment_error').hide();  error = 1;}
      
//       if(next_date ==''){
//          $('#next_date_error').text('Next Date is Required').attr('style','color:red');
//          $('#next_date_error').show();
//           error = 0;
//               return false;

//       }else{$('#next_date_error').hide();  error = 1;}
      
//       if(error == 1){
          
//   var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/save_lead_logs',
//         type: "post",
//         data: {"_token": _token,"choose_date":choose_date,"commu_type":commu_type,"comment":comment,"next_date":next_date,"lead_id" :lead_id,"lead_log_id":lead_log_id},
//         dataType: 'JSON',
         
//         success: function (data) {
//             if(data.status == 200){
//                 alertify.success(data.msg); 
//                 getLeadlog(userid,lead_id);
                
//             }else{
                
//                  alertify.success(data.msg); 
                
//             }
      
       
    
          
//         }
//       });
          
//       }
             
//          }
         
         function delete_account_lead(thisval,account_lead){
             
         
             
             var result = confirm("Want to delete?");
if (result) {
    //Logic to delete the item

              var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/delete_account_data',
        type: "post",
        data: {"_token": _token,"account_lead":account_lead},
        dataType: 'JSON',
         
        success: function (data) {
            
            if(data.status == 200){
                 alertify.success(data.msg); 
                 $(thisval).closest("tr").remove();
                
            }else{
                 alertify.success(data.msg); 
            }
            
            
     
        }
      });
}
             
         }
         
//          function edit_lead_log(thisval,lead_log_id){
             
//      var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/edit_lead_logs',
//         type: "post",
//         data: {"_token": _token,"lead_log_id":lead_log_id},
//         dataType: 'JSON',
         
//         success: function (data) {
            
//         var choose_date = $('#choose_date').val(data.lead_detail.date);
//         var commu_type = $('#commu_type').val();
//         var comment = $('#comment').val(data.lead_detail.comment);
//         var next_date = $('#next_date').val(data.lead_detail.next_date);
//                         $('#lead_log_id').val(lead_log_id);
//                           $('.float-right').text('Edit');
                          
//                           $("#commu_type > option").each(function() {
//                               if(this.text == data.lead_detail.communication_type){
//                                  $('#commu_type').val(data.lead_detail.communication_type).attr("selected"); 
//                               }
                         
//                           });
                          
        
            
         
//         }
//       });
             
//          }
         
         </script>

           @stop