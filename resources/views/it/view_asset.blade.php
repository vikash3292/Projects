@extends('layouts.superadmin_layout')

@section('content')

<div class="content p-0">
	<div class="container-fluid">
		<div class="page-title-box">
    <div class="row align-items-center bredcrum-style">
     <div class="col-sm-6 col-6">
      <h3 class="page-title">Assets View</h3>
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
       <li class="breadcrumb-item active"><a href="assets_list.html">Assets View</a>
       </li>
     </ol>
   </div>
    <div class="col-sm-6 col-6">
    	<a class="btn btn-primary float-right" href="javascript: history.go(-1)">Back</a>
    </div>
 </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card m-t-20">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Asset Name</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$view_assets->assets_name??''}}</label>
           </div>
         </div>
       </div>
        <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Assets Type</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$view_assets->assets_type??''}}</label>
           </div>
         </div>
       </div>
   </div>
   	<div class="row">
					<div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">Serial No.</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$view_assets->asstes_serial??''}}</label>
           </div>
         </div>
       </div>
        <div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">AMC Start Date</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$view_assets->start_date??''}}</label>
           </div>
         </div>
       </div>
   </div>
      	<div class="row">
					<div class="col-md-6">
         <div class="form-group row m-0">
           <label for="empid" class="col-lg-4 col-form-label">AMC End Date</label>
           <div class="col-lg-8 col-form-label">
              <label class="myprofile_label">{{$view_assets->end_date??''}}</label>
           </div>
         </div>
       </div>
   </div>
   <div class="col-sm-12 m-t-20">
                      <h5 class="h5after"><span>Activity TimeLine</span>
                      </h5>
         </div>
         <div class="col-sm-12 m-t-10">
         <a href="{{URL::to('download-asset')}}/{{$asset_id}}" class="btn btn-primary float-right">Export CSV</a>
               <table id="datatable" class="table table-bordered dt-responsive nowrap assets_list"
             style="border-collapse: collapse; border-spacing: 0; width: 100%;">
             <thead>
               <tr>
                 <th>S.No</th>
                 <th>Employee Name</th>
                 <th>Assign Date</th>
                 <th>Assign Time</th>
                 <th>Return Date</th>
                 <th>Return Time</th>
                
               </tr>
             </thead>
             <tbody>
             	@php($i = 1)
             	@foreach($timeline as $timelines)
             	  <tr>
  <td>{{$i++}}</td>
<td>{{$timelines->userfullname}}</td>
<td>{{date('d M Y',strtotime($timelines->assign_date))}}</td>
<td>{{date('h:i:s',strtotime($timelines->assign_date))}}</td>
<td>
    @if(!empty($timelines->return_date))
	{{date('d M Y',strtotime($timelines->return_date))}}
	@endif

</td>
<td>
     @if(!empty($timelines->return_date))
	{{date('h:i:s',strtotime($timelines->return_date))}}
    @endif
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


@stop