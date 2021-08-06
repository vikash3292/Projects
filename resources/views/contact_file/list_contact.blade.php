    @extends('layouts.superadmin_layout')
   @section('content')
                       <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Contact</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Kloudrac-HRMS</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Contact</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{URL::to('/add-contact')}}">
                                            <button
                                                class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                                type="button">
                                                New Contact</button>
                                        </a>
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
                                                <th>Name</th>
                                                <th>Account Name</th>
                                                <th>Deportment</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Contact Owner</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach($contact_list as $contact_lists)
                                            
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$contact_lists->salutation}} {{$contact_lists->first_name}}</td>
                                                <td>{{$contact_lists->company}}
                                                </td>
                                                <td>{{$contact_lists->deportment}}</td>
                                                <td>{{$contact_lists->other_phone}}</td>
                                                <td>{{$contact_lists->email}}</td>
                                                <td>{{$contact_lists->userfullname}}</td>
                                                <td title="View">
                                                    <a href="{{URL::to('view-contact')}}/{{$contact_lists->id}}" class="font-blue"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{URL::to('edit-contact')}}/{{$contact_lists->id}}"> <i class="mdi mdi-pen text-warning"
                                                            title="Edit"></i></a>
                                                    <i onclick="delete_contact(this,'{{$contact_lists->id}}')" class="mdi mdi-delete text-danger" id="sa-params"
                                                        title="Delete"></i>
                                                </td>
                                            </tr>
                                            @endforeach
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
           @stop

           @section('extra_js')

<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
        var error = 1;
       var f_name = $('#f_name').val();
        var l_name = $('#l_name').val();
         var ac_name = $('#ac_name').val();
          var lead_status = $('#lead_status').val();
         
         if(f_name ==''){
          $('#f_name_error').text('First Name is Required').attr('style','color:red');
          $('#f_name_error').show();
            error = 0;
               return false;
       }else{$('#f_name_error').hide();  error = 1;}
       
            if(l_name ==''){
          $('#l_name_error').text('Last Name is Required').attr('style','color:red');
          $('#l_name_error').show();
            error = 0;
               return false;
       }else{$('#l_name_error').hide();  error = 1;}
       
         if(ac_name ==''){
          $('#ac_name_error').text('Account Name is Required').attr('style','color:red');
          $('#l_name_error').show();
            error = 0;
               return false;
       }else{$('#ac_name_error').hide();  error = 1;}
       
        if(lead_status ==''){
          $('#lead_status_error').text('Status is Required').attr('style','color:red');
          $('#lead_status_error').show();
            error = 0;
               return false;
       }else{$('#lead_status_error').hide();  error = 1;}
       
        if(error ==1){
            $("#formlead").submit();
        }
       
    }
    
    
             function delete_contact(thisval,contact_id){
             
             
             var result = confirm("Want to delete?");
if (result) {
    //Logic to delete the item

               var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/delete_contact',
        type: "post",
        data: {"_token": _token,"contact_id":contact_id},
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
</script>

           @stop