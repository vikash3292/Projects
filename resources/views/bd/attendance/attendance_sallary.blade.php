@extends('layouts.superadmin_layout')
@section('extra_css')
   

@stop
@section('content')
         
      <!-- Start content -->
                 <div class="content p-0">
             <div class="container-fluid">
                 <div class="page-title-box">
                     <div class="row align-items-center bredcrum-style">
                         <div class="col-sm-6">
                             <h4 class="page-title">Employee Attendance</h4>
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                                 <li class="breadcrumb-item active"><a href="javascript: history.go(-1)">Employee Attendance</a></li>
                             </ol>
                         </div>


                         <div class="col-sm-6 state_dist">
                                
                                <form method="GET" >
                               <input type="hidden" name="export" value="export">
                                <input type="hidden" name="month" value="{{$month??0}}">
                                <input type="hidden" name="year" value="{{$year??0}}">
                                  <button  type="submit" class="btn btn-primary float-right advance_setting">export <i class="fa fa-angle-right"></i></button>
                                       
                                    </form>
                                  </div>
                     </div>
                 </div>
                 <!-- end row -->
                 <!-- end row -->
                 <div class="row">
                     <div class="col-12">
                         <div class="card m-t-20">
                             <div class="card-body correctionform">
                                <div class="row">
                                   <div class="col-sm-12">
                                      <div class="row">
                                         <div class="col-sm-3">
                                            <label>Total Working Days:</label>
                                            <span>{{$workingday??0}}</span>
                                         </div>
                                         <div class="col-sm-3">
                                          <label>Week Offs:</label>
                                          <span>{{$weekendof??0}}</span>
                                         </div>
                                         <div class="col-sm-3">
                                          <label>Holidays:</label>
                                          <span>{{$holidayall??0}}</span>
                                         </div>
                                         <div class="col-sm-3">
                                          <label>Total Days:</label>
                                          <span>{{$totalday??0}}</span>
                                         </div>
                                      </div>
				      <div class="col-sm-12 p-0">
					<hr class="m-t-5 m-b-5">
				      </div>
                                   </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <strong>Select Language:</strong>
                                    <select id="lstFruits" multiple="multiple">
        <option value="0">S.No</option>
        <option value="1">Employee Name</option>
        <option value="2">Present</option>
        <option value="3">Leaves</option>
        <option value="4">Absent/FTS</option>
        <option value="5">Data NA</option>
        
    </select>
                                 </div>
                                   <div class="col-sm-12 m-t-10">
                                      <table id="datatable" class="datatable table appraisal_form_fill">
                                         <thead>
                                            <tr>
                                               <th>S.No</th>
                                               <th>Employee Name</th>
                                               <th>Present</th>
                                               <th>Leaves</th>
                                               <th>Absent/FTS</th>
                                               <th>Data NA</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                          @php($i = 1)
                                          @foreach($userlist as $userlists)
                                            <tr>
					                                     <td>{{$i++}}</td>
                                               <td>{{$userlists->userfullname??''}}</td>
                                               <td>{{$userlists->present??0}}</td>
                                               <td>{{$userlists->leaveCount??0}}</td>
                                               <td>{{$userlists->absent??0}}</td>
                                               <td>{{$userlists->datanot}}</td>
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
        @stop
        @section('extra_js')
 
	    <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable( {
            responsive: true,
            colReorder: true
        } );
        } );
        $(document).ready(function() {
            var my_table = $("#datatable").DataTable();

            $('#lstFruits').multiselect({
                includeSelectAllOption: true,

            });

            $(document).on("change", ".checkbox", function() {
                $("#lstFruits option").each(function(i, v) {

if (v.selected) {
    my_table.column($(this).val()).visible(false);
} else {
    my_table.column($(this).val()).visible(true);
}

});
    
                // let selectedOptions = $("#lstFruits option:checked").map(function() {
                //     return $(this).val();
                // })
                // let UnselectedOptions = $("#lstFruits option:not(:checked)").map(function() {
                //     return $(this).val();
                // })

                // if (selectedOptions.length > 0) {
                //     for (i = 0; i < selectedOptions.length; i++) {
                //         columns = my_table.column(parseInt(selectedOptions[i])).visible(false);

                //     }
                // }

                // if (UnselectedOptions.length > 0) {
                //     for (i = 0; i < UnselectedOptions.length; i++) {
                //         columns = my_table.column(parseInt(UnselectedOptions[i])).visible(true);

                //     }
                // }


            });
        });
    </script>
    @stop