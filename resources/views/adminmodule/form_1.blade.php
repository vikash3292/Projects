@extends('layouts.superadmin_layout')
@section('extra_css')
<style type="text/css">
    .custom-control-label::after{
        top: 0.12rem;
    }
    .custom-control-label::before{
        top: 0.12rem;
    }
    .modal-header .close{
        position: absolute;
        right: -3px;
        top: 2px;
        background: #fff;
        border-radius: 50%;
        padding: 0; 
        height: 20px;
        width: 20px;
        line-height: 20px;
    }
</style>
@stop
@section('content')
<div class="content p-0">

    <div class="container-fluid">

        <div class="page-title-box">

            <div class="row align-items-center bredcrum-style">

                <div class="col-sm-6 col-6">

                    <h3 class="page-title">Claiming TA/DA</h3>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                        <li class="breadcrumb-item active"><a href="bill_master.html">Claiming TA/DA</a>

                        </li>

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
                                <button class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#addrequisition">Add Claiming TA/DA</button>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Claim Number</th>
                                        <th>Designation</th>
                                        <th>Place to be Visit</th>
                                        <th>Mode of Payment</th>
                                        <th>Project ID</th>
                                        <th>PDF</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="fa fa-download"></i></td>
                                        <td>
                                            <i title="View" class="mdi mdi-eye text-info" data-toggle="modal"
                                            data-target="#viewrequisition"></i>
                                            <i title="Edit" class="mdi mdi-pencil text-warning" data-toggle="modal"
                                            data-target="#addrequisition"></i>
                                            <a  onclick="return confirm('Are you sure you want to delete this ?');" href=""> 
                                                <i title="Delete" class="mdi mdi-delete text-danger"></i>
                                            </td>
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
     <!-- 
      add new requisition form -->
      <div id="addrequisition" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-gray float-none p-0">
                   <h5 class="m-0 text-center width100 font-16">
                    <p class="m-0">GRASS ROOTS RESEARCH & CREATION INDIA (P) LTD</p>
                    <p class="m-0">FORM FOR CLAIMING TA/DA</p>
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="vendor_form">
                <div class="modal-body  modal-height">
                    <div class="border">
                        <div class="col-sm-12 p-0">
                            <table width="100%" border="1" style="border-color: #ededed;font-size: 13px;">
                                <tbody>
                                    <tr>
                                        <td class="padding-5 font-500">
                                            Name
                                        </td class="padding-5">
                                        <td>
                                         <input type="text" class="form-control m-0" id="name"> 
                                     </td>
                                     <td class="padding-5 font-500">
                                        Designation
                                    </td>
                                    <td class="padding-5">
                                     <input type="text" class="form-control m-0" id="designation"> 
                                 </td>
                             </tr>
                             <tr>
                                <td class="padding-5 font-500">
                                   Section
                               </td>
                               <td>
                                <input type="text" class="form-control m-0" id="name"> 
                            </td>
                            <td class="padding-5 font-500">
                                Place to be Visit
                            </td>
                            <td class="padding-5">
                             <input type="text" class="form-control m-0" id="designation"> 
                         </td>
                     </tr>
                     <tr>
                        <td class="padding-5 font-500">
                           OFF. CTGRY
                       </td>
                       <td>
                        <input type="text" class="form-control m-0" id="name"> 
                    </td>
                    <td class="padding-5 font-500">
                        ADV. REQ#
                    </td>
                    <td class="padding-5">
                     <input type="text" class="form-control m-0" id="designation"> 
                 </td>
             </tr>
             <tr>
                <td class="padding-5 font-500">
                   Start Date(MM/DD/YY HH:HRS)
               </td>
               <td>
                 <input type="text" class="form-control m-0" id="name"> 
             </td>
             <td class="padding-5 font-500">
                End Date
            </td>
            <td class="padding-5 font-500">
             <input type="text" class="form-control m-0" id="designation"> 
         </td>
     </tr>
     <tr>
        <td class="padding-5 font-500">
           Project ID
       </td>
       <td>
         <input type="text" class="form-control m-0" id="name"> 
     </td>
     <td class="padding-5 font-500">
        Project Name
    </td>
    <td class="padding-5">
     <input type="text" class="form-control m-0" id="designation"> 
 </td>
</tr>
<tr>
    <td class="padding-5 font-500">
       Project Sector
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="name"> 
 </td>
 <td class="padding-5 font-500">
    Advance
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="designation"> 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">
       DA Claiming
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="name"> 
 </td>
 <td class="padding-5 font-500">
    DAY/HR S
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="designation"> 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">
       Claim Number
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="name"> 
 </td>
 <td class="padding-5 font-500">
    DA Amount
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="designation"> 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">Tour Details</td>
    <td colspan="3" class="padding-5">
        <textarea class="form-control" rows="3"></textarea>
    </td>
</tr>
</tbody>
</table>
</div>
<div class="col-sm-12 p-0 table-responsive">
   <table id="datatable2" class="table table-bordered dt-responsive nowrap"
   style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 13px;border-color: #ededed">
   <thead>
    <tr>
     <th>S.No</th>
     <th>Expense Head</th>
     <th>Trnpt Mode</th>
     <th>Start Date</th>
     <th>From Location</th>
     <th>To Location</th>
     <th>End Date</th>
     <th>Remarks</th>
     <th>Exp MET</th>
     <th>City CAT</th>
     <th>KM/Days/Number</th>
     <th>Rate/Price/Amount</th>
     <th>Amount</th>
 </tr>
</thead>
<tbody>
   <tr>
    <td class="padding-5">1</td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
</tr>
<tr>
    <td class="padding-5"></td>
    <td colspan="11" class="text-right font-600 padding-5">TOTAL</td>
    <td class="padding-5"><input type="text" class="form-control m-0"></td>
</tr>
</tbody>
</table>

</div>
<div class="col-sm-12 p-0 m-t-10">
   <table width="100%" border="1" style="border-color: #ededed;font-size:13px">
    <thead>
        <tr>
            <th class="text-center padding-5" colspan="6"><h5>SUMMARY</h5></th>
        </tr>
        <tr>
            <th class="padding-5">Officer Claimed</th>
            <th class="padding-5">Spent by GRC</th>
            <th class="padding-5">Total Claimed</th>
            <th class="padding-5">Approved AMT</th>
            <th class="padding-5">Bal-Officer/Bal-GRC Claimed</th>
            <th class="padding-5">Bal to GRC/Bal-Officer Approved</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="padding-5"><input type="text" class="form-control m-0"></td>
            <td class="padding-5"><input type="text" class="form-control m-0"></td>
            <td class="padding-5"><input type="text" class="form-control m-0"></td>
            <td class="padding-5"><input type="text" class="form-control m-0"></td>
            <td class="padding-5"><input type="text" class="form-control m-0"></td>
            <td class="padding-5"><input type="text" class="form-control m-0"></td>
        </tr>
    </tbody>
</table>
</div>
<div class="cl-sm-12 p-0 m-t-20">
    <table border="0" width="100%" style="font-size: 13px;">
        <thead>
            <tr style="text-align: center;">
                <th class="padding-5 font-500 p-t-10">Travelled Officer</th>
                <th class="font-500 padding-5 p-t-10">Coordinator/HOD</th>
                <th class="font-500 padding-5 p-t-10">Accounts Manager</th>
                <th class="font-500 padding-5 p-t-10">Approved by President</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center;">
                <td class="padding-5"><input type="text" class="form-control m-0"></td>
                <td class="padding-5"><input type="text" class="form-control m-0"></td>
                <td class="padding-5"><input type="text" class="form-control m-0"></td>
                <td class="padding-5"><input type="text" class="form-control m-0"></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-sm-12 m-t-10 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
            <button  type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
<!-- view requisition form -->
<div id="viewrequisition" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-gray float-none p-0">
               <h5 class="m-0 text-center width100 font-16">
                <p class="m-0">GRASS ROOTS RESEARCH & CREATION INDIA (P) LTD</p>
                <p class="m-0">ADVANCE REQUISITION FORM</p>
            </h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="vendor_form">
            <div class="modal-body modal-height">
                <div class="border">
                    <div class="col-sm-12 p-0">
                        <table width="100%" border="1" style="border-color: #ededed;font-size: 13px;">
                            <tbody>
                                <tr>
                                    <td class="padding-5 font-500">
                                     Name
                                 </td>
                                 <td class="padding-5">
                                   dummy 
                               </td>
                               <td class="padding-5 font-500">
                                Designation
                            </td>
                            <td class="padding-5">
                               dummy 
                           </td>
                             <td class="padding-5 font-500">
                         Section
                     </td>
                     <td class="padding-5">
                       dummy 
                   </td>        
                   <td class="padding-5 font-500">
                    Place to be Visit
                </td>
                <td class="padding-5">
                   dummy 
               </td>
                       </tr>
                       <tr>
    <td class="padding-5 font-500">
     OFF. CTGRY
 </td>
 <td class="padding-5">
   dummy
</td>
<td class="padding-5 font-500">
    ADV. REQ#
</td>
<td class="padding-5">
    dummy
</td>
 <td class="padding-5 font-500">
     Start Date(MM/DD/YY HH:HRS)
 </td>
 <td class="padding-5">
    dummy
</td>
<td class="padding-5 font-500">
    End Date
</td>
<td class="padding-5">
   dummy
</td>
</tr>
 <tr>
    <td class="padding-5 font-500">
     Project ID
 </td>
 <td class="padding-5">
   dummy
</td>
<td class="padding-5 font-500">
    Project Name
</td>
<td class="padding-5">
    dummy
</td>
 <td class="padding-5 font-500">
     Project Sector
 </td>
 <td class="padding-5">
    dummy
</td>
<td class="padding-5 font-500">
    Advance
</td>
<td class="padding-5">
   dummy
</td>
</tr>
 <tr>
    <td class="padding-5 font-500">
     DA Claiming
 </td>
 <td class="padding-5">
   dummy
</td>
<td class="padding-5 font-500">
    DAY/HRS
</td>
<td class="padding-5">
    dummy
</td>
 <td class="padding-5 font-500">
     Claim Number
 </td>
 <td class="padding-5">
    dummy
</td>
<td class="padding-5 font-500">
    DA Amount
</td>
<td class="padding-5">
   dummy
</td>
</tr>
<tr>
    <td class="padding-5 font-500">Detail of the Tour</td>
    <td colspan="7" class="padding-5">
        dummy dummy
    </td>
</tr>
</tbody>
</table>

</div>
<div class="col-sm-12 p-0 table-responsive">
   <table id="datatable2" class="table table-bordered dt-responsive nowrap"
   style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 13px;border-color: #ededed">
   <thead>
    <tr>
     <th>S.No</th>
     <th>Expense Head</th>
     <th>Trnpt Mode</th>
     <th>Start Date</th>
     <th>From Location</th>
     <th>To Location</th>
     <th>End Date</th>
     <th>Remarks</th>
     <th>Exp MET</th>
     <th>City CAT</th>
     <th>KM/Days/Number</th>
     <th>Rate/Price/Amount</th>
     <th>Amount</th>
 </tr>
</thead>
<tbody>
   <tr>
       <td class="padding-5">1</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
       <td class="padding-5">dummy</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="11" class="text-right font-600 padding-5">TOTAL</td>
        <td><input type="text" class="form-control m-0"></td>
    </tr>
</tbody>
</table>

</div>
<div class="col-sm-12 p-0 m-t-10">
   <table width="100%" border="1" style="border-color: #ededed;font-size:13px">
    <thead>
        <tr>
            <th class="text-center padding-5" colspan="6"><h5>SUMMARY</h5></th>
        </tr>
        <tr>
            <th class="padding-5">Officer Claimed</th>
            <th class="padding-5">Spent by GRC</th>
            <th class="padding-5">Total Claimed</th>
            <th class="padding-5">Approved AMT</th>
            <th class="padding-5">Bal-Officer/Bal-GRC Claimed</th>
            <th class="padding-5">Bal to GRC/Bal-Officer Approved</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="padding-5">dummy</td>
            <td class="padding-5">dummy</td>
            <td class="padding-5">dummy</td>
            <td class="padding-5">dummy</td>
            <td class="padding-5">dummy</td>
            <td class="padding-5">dummy</td>
        </tr>
    </tbody>
</table>
</div>
<div class="cl-sm-12 p-0 m-t-20">
    <table border="0" width="100%" style="font-size: 13px;">
        <thead>
            <tr style="text-align: center;">
                <th class="padding-5 font-500 p-t-10">Travelled Officer</th>
                <th class="font-500 padding-5 p-t-10">Coordinator/HOD</th>
                <th class="font-500 padding-5 p-t-10">Accounts Manager</th>
                <th class="font-500 padding-5 p-t-10">Approved by President</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center;">
                <td class="padding-5">dummy</td>
                <td class="padding-5">dummy</td>
                <td class="padding-5">dummy</td>
                <td class="padding-5">dummy</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</form>


</div>
</div>
</div>
@stop
@section('extra_js')
<script type="text/javascript">
  //  $("#datatable1").DataTable();
  $("#datatable2").DataTable();
   // $("#datatable4").DataTable();
</script>
@stop