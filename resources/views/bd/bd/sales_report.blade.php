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

                        <h3 class="page-title">Sales Report</h3>

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>

                           <li class="breadcrumb-item active"><a href="#">Sales Report</a></li>

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

        					   <option value="1">Sales Manager</option>

        					   <option value="2">Category</option>

        					   <option value="3">Location</option>

        					   <option value="4">Distributor</option>

        					   <option Value="5">Customer</option>

        					   <option value="6">Product Category</option>

        					   <option value="7">Product</option>

        					   <option value="8">Jan</option>

        					   <option value="9">Feb</option>

        					   <option value="10">Mar</option>

        					   <option Value="11">Apr</option>

   						   <option value="12">May</option>

        					   <option value="13">June</option>

        					   <option value="14">Jul</option>

    						</select>

					</div>

					<div class="col-sm-12 m-t-10 table-responsive">

					        <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>

                <tr>

                    <th>S.No</th>

                    <th>Sales Manager</th>

                    <th>Category</th>

                    <th>Location</th>

                    <th>Distributor</th>

                    <th>Customer</th>

                    <th>Product Category</th>

                    <th>Product</th>

                    <th>Jan</th>

                    <th>Feb</th>

                    <th>Mar</th>

                    <th>Apr</th>

		    <th>May</th>

		    <th>Jun</th>

		    <th>Jul</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>

                    <td>Amit Sharma</td>

                    <td>Other</td>

                    <td>Delhi</td>

                    <td>Mk Foods</td>

                    <td>My Shop Narella</td>

                    <td>Cheese Sauce</td>

                    <td>Melted Cheese - 500g</td>

                    <td>140</td>

                    <td></td>

                    <td></td>

                    <td></td>

 		    <td></td>

                    <td></td>

                    <td></td>

                </tr>

                <tr>

                    <td>2</td>

                    <td>Amit Sharma</td>

                    <td>Other</td>

                    <td>Delhi</td>

                    <td>Mk Foods</td>

                    <td>My Shop Narella</td>

                    <td>Cheese Sauce</td>

                    <td>Melted Cheese - 500g</td>

                    <td>140</td>

                    <td></td>

                    <td></td>

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

        $('#example').DataTable( {

            responsive: false,

            colReorder: true

        } );

        } );

        $(document).ready(function() {

            var my_table = $("#example").DataTable();



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



         