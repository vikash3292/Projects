@extends('layouts.superadmin_layout')

   @section('content')

   <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Advance Requisition Form</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="#">Advance Requisition Form</a>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <a href="work_order.html" class="btn btn-primary float-right">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <div style="background-color: #eee;">
                                    <h5 style="margin:0;width:100%;font-size:16px;text-align: center;">
                                        <p style="margin:0">GRASS ROOTS RESEARCH &amp; CREATION INDIA (P) LTD</p>
                                        <p style="margin:0">ADVANCE REQUISITION FORM</p>
                                    </h5>
                                </div>
                                <div style="border:1px solid #dee2e6!important">
                                    <div>
                                        <table width="100%" border="1" style="border-color: #ededed;font-size: 13px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding:5px;font-weight: 500">
                                                       Name
                                                    </td>
                                                    <td style="padding:5px">
                                                         {{$view->name}} 
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                        Designation
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                    {{$view->degination}}  
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td style="padding:5px;font-weight: 500">
                                                       Section
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->section}}   
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                        Place to be Visit
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->visit}} 
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td style="padding:5px;font-weight: 500">
                                                       Journey Start Date &amp; Time
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->journey_start_date}} 
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                        Journey End Date &amp; Time
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->journey_end_date}}  
                                                    </td>
                                                </tr>
                                                     <tr>
                                                    <td style="padding:5px;font-weight: 500">
                                                       Project Name
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->project_name}}  
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                        Project Code
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->project_code}}  
                                                    </td>
                                                </tr>
                                                         <tr>
                                                    <td style="padding:5px;font-weight: 500">
                                                       Project Sector
                                                    </td>
                                                    <td  style="padding:5px;">
                                                    {{$view->project_sector}}
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                        A/C Number(If Other than Salary A/C)
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->ac_no}}
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td style="padding:5px;font-weight: 500">
                                                       Priority
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->priority}}
                                                    </td>
                                                    <td style="padding:5px;font-weight: 500">
                                                        Mode of Payment
                                                    </td>
                                                    <td style="padding:5px;">
                                                    {{$view->mode_of_pay}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:5px;font-weight: 500">Detail of the Tour</td>
                                                    <td colspan="3"  style="padding:5px">
                                                    {{$view->desc}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"  style="padding:5px;">
                                                             <table style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 13px">
                                                <thead>
                                                    <tr>
                                                        <th style="padding:5px;">S.No</th>
                                                        <th style="padding:5px;">PARTICULARS</th>
                                                        <th style="padding:5px;">AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                               
                                                @php($i = 1)
                                                @foreach(json_decode($view->particular) as $k => $value)
                                                      <tr>
                                                        <td style="padding:5px;">{{$i++}}</td>
                                                        <td style="padding:5px;">{{$value}}</td>
                                                        <td style="padding:5px;">{{json_decode($view->amount)[$k]}}</td>
                                                    </tr>

                                                  @endforeach
                                                    <tr>
                                                        <td  style="padding:5px;"></td>
                                                        <td style="text-align:right; font-weight:600;padding:5px">TOTAL</td>
                                                        <td style="padding:5px;">{{$view->total_amt}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   
                                                    <td  style="padding:5px;font-weight: 500">HOD/COORDINATOR</td>
                                                      <td  style="padding:5px;font-weight: 500">ACCOUNTS MANAGER</td>
                                                    <td  style="padding:5px;font-weight: 500">PRESIDENT</td>
                                                </tr>
                                                 <tr>
                                                    
                                                    <td  style="padding:5px;">

                                                   
                                                    
                                                    {{$view->hod_name}}

                                                    @if($view->hod_approvel == 0 && $approval > 0 && in_array($role,[30,31]))
                                                     
                                                    <div>

                                                    <span onclick="approvel_status('{{$view->id}}',1)"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    <span onclick="approvel_status('{{$view->id}}',2)"> <i class="fa fa-times" aria-hidden="true"></i></span>
                                                     </div>
                                                   

                                                    @else
                                                    <div>
                                                    {{($view->hod_approvel ==1?'Approved' : ($view->hod_approvel ==2?'Reject' : 'Pending'))}}
                                                      
                                                    </div>
                                                    @endif
                                                    
                                                    </td>
                                                    <td  style="padding:5px;">{{$view->ac_name}}
                                                    
                                                    @if($view->account_mnt_approval == 0 && $approval > 0 && in_array($role,[11]))
                                                    <div>
<span onclick="approvel_status('{{$view->id}}',1)"><i class="fa fa-check" aria-hidden="true"></i></span>
<span onclick="approvel_status('{{$view->id}}',2)"> <i class="fa fa-times" aria-hidden="true"></i></span>
</div>


@else 
<div>
{{($view->account_mnt_approval ==1?'Approved' : ($view->account_mnt_approval ==2?'Reject' : 'Pending'))}}
</div>
@endif

                                                    
                                                    
                                                    </td>
                                                    <td  style="padding:5px;"> {{$view->direct_name}} 
                                                    
                                                    
                                                    @if($view->director_approvel == 0 && $approval > 0 && in_array($role,[1]))
                                                    <div>
<span onclick="approvel_status('{{$view->id}}',1)"><i class="fa fa-check" aria-hidden="true"></i></span>
<span onclick="approvel_status('{{$view->id}}',2)"> <i class="fa fa-times" aria-hidden="true"></i></span>
</div>


@else 
 <div>
{{($view->director_approvel ==1?'Approved' : ($view->director_approvel ==2?'Reject' : 'Pending'))}}
</div>

@endif

                                                    
                                                    
                                                     </td>
                                                </tr>
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


@stop


@section('extra_js')

<script>

function approvel_status(advance_id,status){

    var _token = "{{csrf_token()}}";


$.ajax({
url: '/aproval_status',
type: "post",
data: {"_token": _token,"advance_id" : advance_id,"status" : status},
dataType: 'JSON',
  beforeSend: function() {
// setting a timeout
$('#loadingDiv').show();
},
success: function (data) {
  //console.log(data); // this is good

  $('#loadingDiv').hide();

  alertify.success(data.msg); 

  location.reload();


  
   
}

});

}

</script>

@stop