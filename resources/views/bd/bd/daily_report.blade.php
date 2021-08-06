    @extends('layouts.superadmin_layout')
@section("extra_css")
<style>
.multiselect .caret::before {
    content: "";
    color: black;
    display: inline-block;
    margin-right: 6px;
}
</style>
@stop
   @section('content')

   	<div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h3 class="page-title">Daily Sales Report</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="#">Daily Sales Report</a></li>
                        </ol>
                     </div>
                  </div>
               </div>
		  <div class="row">
                        <div class="col-12">
                            <div class="card m-t-20">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
					      <select id="lstFruits" multiple="multiple">
        					   <option value="0">S.No</option>
        					   <option value="1">Date</option>
        					   <option value="2">Sales Manager</option>
        					   <option value="3">Customer</option>
        					   <option value="4">Contact Person</option>
        					   <option Value="5">Contact Detail</option>
        					   <option value="6">Location</option>
        					   <option value="7">Category</option>
        					   <option value="8">Remarks</option>
        					   <option value="9">New Customer</option>
        					   <option value="10">No of Repeated Customers</option>
        					   <option Value="11">No of Outlet</option>
   						   <option value="12">Pizza Cheese</option>
        					   <option value="13">Mozzarella</option>
        					   <option value="14">Processed Cheese</option>
    						</select>
					</div>
					<div class="col-sm-12 m-t-10 table-responsive">
					        <table id="example1" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>S.No</th>
		    <th>Date</th>
                    <th>Sales Manager</th>
                    <th>Customer</th>
                    <th>Contact Person</th>
                    <th>Contact Detail</th>
                    <th>Location</th>
                    <th>Category</th>
                    <th>Remarks</th>
                    <th>New Customer</th>
                    <th class="text_ellipses">No of Repeated Customers</th>
                    <th>No of Outlet</th>
                    <th>Pizza Cheese</th>
		    <th>Mozzarella</th>
		    <th>Processed Cheese</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>14-02-2020</td>
                    <td>Amit Sharma</td>
                    <td>Burger Point</td>
                    <td>Mr.Duggal</td>
                    <td>9871048700</td>
                    <td>Gurgaon</td>
                    <td>Qsr</td>
                    <td class="text_ellipses">Got order 2 cs cdp,2cs PJ,2cs Cdc</td>
                    <td>Y</td>
                    <td>3</td>
                    <td>34</td>
                    <td></td>
 		    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>18-02-2020</td>
                    <td>Amit Sharma</td>
                    <td>Burger Point</td>
                    <td>Mr.Duggal</td>
                    <td>9871048700</td>
                    <td>Gurgaon</td>
                    <td>Qsr</td>
                    <td class="text_ellipses">Got order 2 cs cdp,2cs PJ,2cs Cdc</td>
                    <td>Y</td>
                    <td>3</td>
                    <td>34</td>
                    <td></td>
 		    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
					</div>
				    </div>
				</div>
			    </div>
			</div>
		   </div>
	</div>
	</div>

            @section('extra_js')
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable( {
            responsive: false,
            colReorder: true
        } );
        } );
        $(document).ready(function() {
            var my_table = $("#example1").DataTable();

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
           @stop

         