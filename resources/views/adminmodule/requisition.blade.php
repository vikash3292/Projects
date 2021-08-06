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

                    <h3 class="page-title">Requisition List</h3>

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                        <li class="breadcrumb-item active"><a href="bill_master.html">Requisition List</a>

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
                            <div class="col-md-6">
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-4 col-form-label">Select Form
           <span class="text-danger">*</span></label>
           <div class="col-lg-8 col-form-label">
             <select class="form-control" onchange="form_show(this.value)">
                 <option value="advance">Advance Requisition Form</option>
                 <option value="ta_da">Claiming TA/DA</option>
                 <option value="claim_form">Claiming Form</option>
                 
             </select>
             <div id="assets_name_error"></div>
           </div>
         </div>
       </div>
                        </div>
                       
                        <div class="row show_form advance">

                        <form id="advance_requisation_form">
                            <h5 class="text-center display-block width100 m-0">GRASS ROOTS RESEARCH & CREATION INDIA (P) LTD</h5>
                            <h5 class="text-center display-block width100 m-t-0">ADVANCE REQUISITION FORM</h5>
                            <div class="col-sm-12">
                                  <table width="100%" border="1" style="border-color: #ededed;font-size: 13px;">
                                <tbody>
                                    <tr>
                                        <td class="padding-5 font-500">
                                           Name
                                        </td class="padding-5">
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="name" name="name" required> 
                                        </td>
                                        <td class="padding-5 font-500">
                                            Designation
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="designation" name="designation" required> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td class="padding-5 font-500">
                                           Section
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="section" name="section" required> 
                                        </td>
                                        <td class="padding-5 font-500">
                                            Place to be Visit
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="visit" name="visit" required> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td class="padding-5 font-500">
                                           Journey Start Date & Time
                                        </td>
                                        <td class="padding-5">
                                             <input type="date" class="form-control m-0" id="s_date" name="s_date" required> 
                                        </td>
                                        <td class="padding-5 font-500">
                                            Journey End Date & Time
                                        </td>
                                        <td class="padding-5 font-500">
                                             <input type="date" class="form-control m-0" id="e_date" name="e_date" required> 
                                        </td>
                                    </tr>
                                         <tr>
                                        <td class="padding-5 font-500">
                                           Project Name
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="project_name" name="project_name" required> 
                                        </td>
                                        <td class="padding-5 font-500">
                                            Project Code
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="project_code" name="project_code" required> 
                                        </td>
                                    </tr>
                                             <tr>
                                        <td class="padding-5 font-500">
                                           Project Sector
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="project_sector" name="project_sector" required > 
                                        </td>
                                        <td class="padding-5 font-500">
                                            A/C Number(If Other than Salary A/C)
                                        </td>
                                        <td class="padding-5">
                                             <input type="text" class="form-control m-0" id="ac" name="ac" required> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td class="padding-5 font-500">
                                           Priority
                                        </td>
                                        <td class="padding-5">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="normal" checked value="Normal" name="priority" class="custom-control-input checkval">
                                                    <label class="custom-control-label" for="normal">Normal</label></div>
                                                     <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="urgent"  value="Urgent" name="priority" class="custom-control-input checkval">
                                                    <label class="custom-control-label" for="urgent">Urgent</label></div>
                                        </td>
                                        <td class="padding-5 font-500">
                                            Mode of Payment
                                        </td>
                                        <td class="padding-5">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="cash" value="Cash In Person" checked name="payment" class="custom-control-input checkval">
                                                    <label class="custom-control-label" for="cash">Cash In Person</label></div>
                                                     <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="modeofpayment" value="Deposite in A/C" name="payment" class="custom-control-input checkval">
                                                    <label class="custom-control-label" for="modeofpayment">Deposite in A/C</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="padding-5 font-500">Detail of the Tour</td>
                                        <td colspan="3" class="padding-5">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="padding-5">
                                        <span id="addMore">Add More</span>
                                    <table id="datatable1" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 13px">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>PARTICULARS</th>
                                            <th>AMOUNT</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                     
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                            <td colspan="2" class="text-right font-600">TOTAL</td>
                                            <td><input type="text" class="form-control m-0" id="total_amt" name="total_amt"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                        </td>
                                    </tr>
                                      <tr>
                                        
                                        <td class="font-500 padding-5">HOD/COORDINATOR</td>
                                          <td class="font-500 padding-5">ACCOUNTS MANAGER</td>
                                        <td class="font-500 padding-5">PRESIDENT</td>
                                    </tr>
                                     <tr>
                                       <?php 
                                       
                                       $hod = DB::table('main_users')->whereIn('emprole',[30,31])->where('isactive',1)->get();
                                       
                                       ?>
                                        <td class="padding-5">
                                           
                                            <select class="form-control m-0" name="hod" id="hod" required>
                                             <option value=""> select Option</option>
                                             @foreach($hod as $hods)
                                             <option value="{{$hods->id}}">{{$hods->userfullname}}</option>
                                             @endforeach
                                            </select>
                                        </td>

                                        <td class="padding-5">
                                        <?php 
                                       
                                       $acc = DB::table('main_users')->where('emprole',11)->where('isactive',1)->get();
                                       
                                       ?>
                                        <select class="form-control m-0" name="acountant" id="acountant" required>
                                        <option value=""> select Option</option>
                                        @foreach($acc as $accs)
                                             <option value="{{$accs->id}}">{{$accs->userfullname}}</option>
                                             @endforeach
                                            </select>
                                        </td>

                                        <?php 
                                       
                                         $acc = DB::table('main_users')->where('emprole',1)->where('isactive',1)->get();
                                       
                                       ?>

                                        <td class="padding-5">
                                        <select class="form-control m-0" name="director" id="director" required>
                                        <option value=""> select Option</option>
                                           @foreach($acc as $accs)
                                             <option value="{{$accs->id}}">{{$accs->userfullname}}</option>
                                             @endforeach
                                            </select>
                                            
                                            </td>


                                       
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;text-align: right;" colspan="4">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            </div>
                            <div class="col-sm-12 m-t-20">
                             <!--    <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#addrequisition">Add Requisition</button> -->
                                <table id="datatable" class="advance_requisition table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Place to be Visit</th>
                                            <th>J Date</th>
                                            <th>Mode of Payment</th>
                                            <th>Amount</th>
                                            <th>PDF</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                            </from>

                        </div>


                        <div class="row show_form ta_da" style="display:none;">

                        
                            <h5 class="text-center display-block width100 m-0">GRASS ROOTS RESEARCH & CREATION INDIA (P) LTD</h5>
                            <h5 class="text-center display-block width100 m-t-0">FORM FOR CLAIMING TA/DA</h5>
                            
                            <div class="col-sm-12">
                               <table width="100%" border="1" style="border-color: #ededed;font-size: 13px;">
                                <tbody>
                                    <tr>
                                        <td class="padding-5 font-500">
                                            Name
                                        </td>
                                        <td>
                                         <input type="text" class="form-control m-0" id="ta_name" name="ta_name" > 
                                     </td>
                                     <td class="padding-5 font-500">
                                        Designation
                                    </td>
                                    <td class="padding-5">
                                     <input type="text" class="form-control m-0" id="ta_designation" name="ta_designation" > 
                                 </td>
                             </tr>
                             <tr>
                                <td class="padding-5 font-500">
                                   Section
                               </td>
                               <td>
                                <input type="text" class="form-control m-0" id="ta_section" name="ta_section" > 
                            </td>
                            <td class="padding-5 font-500">
                                Place to be Visit
                            </td>
                            <td class="padding-5">
                             <input type="text" class="form-control m-0" id="ta_visit" name="ta_visit" > 
                         </td>
                     </tr>
                     <tr>
                        <td class="padding-5 font-500">
                           OFF. CTGRY
                       </td>
                       <td>
                        <input type="text" class="form-control m-0" id="ta_ctgry" name="ta_ctgry" > 
                    </td>
                    <td class="padding-5 font-500">
                        ADV. REQ#
                    </td>
                    <td class="padding-5">
                     <input type="text" class="form-control m-0" id="ta_adv" name="ta_adv" > 
                 </td>
             </tr>
             <tr>
                <td class="padding-5 font-500">
                   Start Date(MM/DD/YY HH:HRS)
               </td>
               <td>
                 <input type="date" class="form-control m-0" id="ta_s_date" name="ta_s_date" > 
             </td>
             <td class="padding-5 font-500">
                End Date
            </td>
            <td class="padding-5 font-500">
             <input type="date" class="form-control m-0" id="ta_e_date" name="ta_e_date" > 
         </td>
     </tr>
     <tr>
        <td class="padding-5 font-500">
           Project ID
       </td>
       <td>
         <input type="text" class="form-control m-0" id="ta_project_id" name="ta_project_id" > 
     </td>
     <td class="padding-5 font-500">
        Project Name
    </td>
    <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_project_name" name="ta_project_name" > 
 </td>
</tr>
<tr>
    <td class="padding-5 font-500">
       Project Sector
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_sector" name="ta_sector" > 
 </td>
 <td class="padding-5 font-500">
    Advance
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="ta_advance" name="ta_advance" > 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">
       DA Claiming
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_da_claim" name="ta_da_claim" > 
 </td>
 <td class="padding-5 font-500">
    DAY/HR S
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="ta_day_hr" name="ta_day_hr" > 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">
       Claim Number
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_claim_no" name="ta_claim_no" > 
 </td>
 <td class="padding-5 font-500">
    DA Amount
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="ta_da_amt" name="ta_da_amt" > 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">Tour Details</td>
    <td colspan="3" class="padding-5">
        <textarea class="form-control" rows="3" id="ta_desc" name="ta_desc" ></textarea>
    </td>
</tr>

                                    
</tbody>
</table>    
                            </div>

                            <div class="col-sm-12 m-t-20">
                             <!--    <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#addrequisition">Add Requisition</button> -->
                                    <table border="1" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 13px;border-color: #ededed">
                                                <thead>
                                                    <tr>
                                                      
                                                        <th style="padding:5px">Expense Head</th>
                                                        <th style="padding:5px">Trnpt Mode</th>
                                                        <th style="padding:5px">Start Date</th>
                                                        <th style="padding:5px">From Location</th>
                                                        <th style="padding:5px">To Location</th>
                                                        <th style="padding:5px">End Date</th>
                                                        <th style="padding:5px">Remarks</th>
                                                        <th style="padding:5px">Exp MET</th>
                                                        <th style="padding:5px">City CAT</th>
                                                        <th style="padding:5px">KM/Days/Number</th>
                                                        <th style="padding:5px">Rate/Price/Amount</th>
                                                        <th style="padding:5px">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_expense_head"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_trnpt_mode"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_start_date"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_from_location"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_to_location"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_end_date"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_remark"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_exp_met"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_city"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_days"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_rate"></td>
                                                        <td style="padding:5px"><input type="text" class="form-control" id="ta_expense_total_amt"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px"></td>
                                                        <td colspan="11" style="text-align:right;font-weight:600; padding:5px;">TOTAL
                                                        </td>
                                                        <td style="padding:5px">0.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%" border="1" style="border-color: #ededed;font-size:13px">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center padding-5" colspan="6">
                                                            <h5>SUMMARY</h5>
                                                        </th>
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
                                                        <td class="padding-5"><input type="text" class="form-control"></td>
                                                        <td class="padding-5"><input type="text" class="form-control"></td>
                                                        <td class="padding-5"><input type="text" class="form-control"></td>
                                                        <td class="padding-5"><input type="text" class="form-control"></td>
                                                        <td class="padding-5"><input type="text" class="form-control"></td>
                                                        <td class="padding-5"><input type="text" class="form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top:20px">
                                            <table border="0" width="100%" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                        
                                        <td class="font-500 padding-5">HOD/COORDINATOR</td>
                                          <td class="font-500 padding-5">ACCOUNTS MANAGER</td>
                                        <td class="font-500 padding-5">PRESIDENT</td>
                                    </tr>
                                     <tr>
                                       <?php 
                                       
                                       $hod = DB::table('main_users')->whereIn('emprole',[30,31])->where('isactive',1)->get();
                                       
                                       ?>
                                        <td class="padding-5">
                                           
                                            <select class="form-control m-0" name="ta_hod" id="ta_hod" >
                                             <option value=""> select Option</option>
                                             @foreach($hod as $hods)
                                             <option value="{{$hods->id}}">{{$hods->userfullname}}</option>
                                             @endforeach
                                            </select>
                                        </td>

                                        <td class="padding-5">
                                        <?php 
                                       
                                       $acc = DB::table('main_users')->where('emprole',11)->where('isactive',1)->get();
                                       
                                       ?>
                                        <select class="form-control m-0" name="ta_acountant" id="ta_acountant" >
                                        <option value=""> select Option</option>
                                        @foreach($acc as $accs)
                                             <option value="{{$accs->id}}">{{$accs->userfullname}}</option>
                                             @endforeach
                                            </select>
                                        </td>

                                        <?php 
                                       
                                         $acc = DB::table('main_users')->where('emprole',1)->where('isactive',1)->get();
                                       
                                       ?>

                                        <td class="padding-5">
                                        <select class="form-control m-0" name="ta_director" id="ta_director" >
                                        <option value=""> select Option</option>
                                           @foreach($acc as $accs)
                                             <option value="{{$accs->id}}">{{$accs->userfullname}}</option>
                                             @endforeach
                                            </select>
                                            
                                            </td>


                                       
                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="margin-top:10px;margin-bottom: 10px;padding: 10px;text-align: right;">
                                            <button  onclick="ta_da_data()" style="padding: .375rem .75rem;background-color: #5fe384;border: 1px solid #5fe384;border-radius: 3px;font-size: 14px;cursor:pointer;color:#fff">Save</button>
                                         
                                        </div>
                    
                            </div>
                            
                            <div class="col-sm-12 m-t-20">
                             <!--    <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#addrequisition">Add Requisition</button> -->
                                <table id="datatable" class="ta_da_list table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Place to be Visit</th>
                                            <th>Claim Number</th>
                                            <th>Project Name</th>
                                            <th>Amount</th>
                                            <th>PDF</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>



                          



                        </div>


                        <div class="row show_form claim_form" style="display:none;">

                        <div class="row">
                            <h5 class="text-center display-block width100 m-0">GRASS ROOTS RESEARCH & CREATION INDIA (P) LTD</h5>
                            <h5 class="text-center display-block width100 m-t-0">CLAIM FORM</h5>
                            <div class="col-sm-12">
                               <table width="100%" border="1" style="border-color: #ededed;font-size: 13px;">
                                <tbody>
                                    <tr>
                                        <td class="padding-5 font-500">
                                          Claimant Name
                                        </td>   
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
                                Requisition Number
                            </td>
                            <td class="padding-5">
                             <input type="text" class="form-control m-0" id="designation"> 
                         </td>
                     </tr>
                     <tr>
                        <td class="padding-5 font-500">
                           Start Date
                       </td>
                       <td>
                        <input type="text" class="form-control m-0" id="name"> 
                    </td>
                    <td class="padding-5 font-500">
                        End Date
                    </td>
                    <td class="padding-5">
                     <input type="text" class="form-control m-0" id="designation"> 
                 </td>
             </tr>
             <tr>
                <td class="padding-5 font-500">
                   Place of Visit
               </td>
               <td>
                 <input type="text" class="form-control m-0" id="name"> 
             </td>
             <td class="padding-5 font-500">
                Advance Token
            </td>
            <td class="padding-5 font-500">
             <input type="text" class="form-control m-0" id="designation"> 
         </td>
     </tr>
<tr>
    <td class="padding-5 font-500">Detail of the claim</td>
    <td class="padding-5">
        <textarea class="form-control" rows="3"></textarea>
    </td>
    <td class="padding-5 font-500">Project Code/ Project Name</td>
    <td class="padding-5">
        <input type="text" class="form-control m-0" id="designation"> 
    </td>
</tr>
</tbody>
</table> 
<table class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;border-color: #ededed;font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Expense Head</th>
                                            <th>Date</th>
                                            <th>From Place</th>
                                            <th>To Place</th>
                                            <th>Ordered By</th>
                                            <th>Perpose/Remarks</th>
                                            <th>KM/Date/Number</th>
                                            <th>Rate/Price/Amount</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                            <td><input class="form-control" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="8" class="text-right font-500">Total</td>
                                            <td>0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
<div style="margin-top:20px">
                                            <table border="0" width="100%" style="font-size: 13px;">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th class="padding-5 font-500 p-t-10">CLAIMANT</th>
                                                        <th class="font-500 padding-5 p-t-10">HOD/COORDINATOR</th>
                                                        <th class="font-500 padding-5 p-t-10">ACCOUNTS MANAGER</th>
                                                        <th class="font-500 padding-5 p-t-10">PRESIDENT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="text-align: center;">
                                                        <td class="padding-5">
                                                            <select class="form-control">
                                                                <option></option>
                                                            </select>
                                                        </td>
                                                        <td class="padding-5">
                                                             <select class="form-control">
                                                                <option></option>
                                                            </select>
                                                        </td>
                                                        <td class="padding-5">
                                                             <select class="form-control">
                                                                <option></option>
                                                            </select>
                                                        </td>
                                                        <td class="padding-5">
                                                             <select class="form-control">
                                                                <option></option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
   
                            </div>
                            <div class="col-sm-12 m-t-20">
                             <!--    <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#addrequisition">Add Requisition</button> -->
                                  <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Claimant Name</th>
                                            <th>Designation</th>
                                            <th>Place to be Visit</th>
                                            <th>Requisition Number</th>
                                            <th>Project ID/Name</th>
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
</div>
    
        
    </div>
      @stop
  @section('extra_js')


<script>

fetch_advance_requisition();

function fetch_advance_requisition(){

var _token = "{{csrf_token()}}";


 $.ajax({
 url: '/fetch_advance',
 type: "post",
 data: {"_token": _token},
 dataType: 'JSON',
   beforeSend: function() {
 // setting a timeout
 $('#loadingDiv').show();
},
 success: function (data) {
   //console.log(data); // this is good

   $('#loadingDiv').hide();

   $('.advance_requisition').html(data.advance);

    
 }

});

 }


 fetch_ta_da();

function fetch_ta_da(){

var _token = "{{csrf_token()}}";


 $.ajax({
 url: '/fetch_ta_da',
 type: "post",
 data: {"_token": _token},
 dataType: 'JSON',
   beforeSend: function() {
 // setting a timeout
 $('#loadingDiv').show();
},
 success: function (data) {
   //console.log(data); // this is good

   $('#loadingDiv').hide();

   $('.ta_da_list').html(data.ta_da);

    
 }

});

 }

 function delete_advance(advance_id){

    var r = confirm("Are You Sure to delete!");

  if(r){

  
var _token = "{{csrf_token()}}";


$.ajax({
url: '/delete_advance',
type: "post",
data: {"_token": _token,"advance_id" : advance_id},
dataType: 'JSON',
  beforeSend: function() {
// setting a timeout
$('#loadingDiv').show();
},
success: function (data) {
  //console.log(data); // this is good

  $('#loadingDiv').hide();

  fetch_advance_requisition();
   
}

});

  }

 }


 $("form#advance_requisation_form").submit(function(e) {

 
e.preventDefault();



var token = "{{csrf_token()}}"; 


$.ajax({
url: '/add_advance_requisation',
headers: {'X-CSRF-TOKEN': token}, 
type: "post",
data:$(this).serialize(),

success: function (data) {
//console.log(data.city); // this is good



if(data.status ==200){
 $('#loadingDiv').hide();

alertify.success(data.msg); 
fetch_advance_requisition();
$('#advance_requisation_form')[0].reset();

}else if(data.status ==202){

  $('#loadingDiv').hide();
  alertify.success(data.msg); 
  fetch_advance_requisition();

  }else if(data.status ==203){


  $('#loadingDiv').hide();
  alertify.success(data.msg); 
  fetch_advance_requisition();


}else{

 $('#loadingDiv').hide();
 alertify.success(data.msg); 
 fetch_advance_requisition();


}

}
});



});

function ta_da_data(){

 var ta_name = $('#ta_name').val();
 var ta_designation = $('#ta_designation').val();
 var ta_section = $('#ta_section').val();
 var ta_visit = $('#ta_visit').val();
 var ta_ctgry = $('#ta_ctgry').val();
 var ta_adv = $('#ta_adv').val();
 var ta_s_date = $('#ta_s_date').val();
 var ta_e_date = $('#ta_e_date').val();
 var ta_project_id = $('#ta_project_id').val();
 var ta_project_name = $('#ta_project_name').val();
 var ta_sector = $('#ta_sector').val();
 var ta_advance = $('#ta_advance').val();
 var ta_da_claim = $('#ta_da_claim').val();
 var ta_day_hr = $('#ta_day_hr').val();
 var ta_claim_no = $('#ta_claim_no').val();
 var ta_da_amt = $('#ta_da_amt').val();
 var ta_desc = $('#ta_desc').val();

 var ta_hod = $('#ta_hod').val();
 var ta_acountant = $('#ta_acountant').val();
 var ta_director = $('#ta_director').val();
  

  var _token = "{{csrf_token()}}";


$.ajax({
url: '/add_ta_da',
type: "post",
data: {"_token": _token,"ta_name" : ta_name,"ta_designation":ta_designation,"ta_section":ta_section,"ta_visit":ta_visit
,"ta_ctgry":ta_ctgry,"ta_adv":ta_adv,"ta_s_date":ta_s_date,"ta_e_date":ta_e_date,"ta_project_id":ta_project_id,"ta_project_name":ta_project_name
,"ta_sector":ta_sector,"ta_advance":ta_advance,"ta_da_claim":ta_da_claim,"ta_day_hr":ta_day_hr,"ta_claim_no":ta_claim_no,"ta_da_amt":ta_da_amt,"ta_desc":ta_desc,"ta_hod":ta_hod,"ta_acountant":ta_acountant,"ta_director":ta_director},
dataType: 'JSON',
  beforeSend: function() {
// setting a timeout
$('#loadingDiv').show();
},
success: function (data) {
  //console.log(data); // this is good
  fetch_ta_da();

  $('#loadingDiv').hide();
  alertify.success(data.msg); 
   
}

});


}


function form_show(form){

  $('.show_form').each(function(){
 
 $(this).hide();
    
});

$('.'+form).show();

}


</script>





  <script type="text/javascript">
        $('#addMore').click(function() {
           var count = 1;
          
           var ht = '';
             ht = ht += ' <tr><td>'+count +'</td>';
                                                                                              
                                                                                   var ht = ht += '  <td style="text-align:center;"><input type="text" size="4" id="particular" name="particular[]"  required class="form-control txt"></td>';
                                                                                      
                                                                                    
                                                                                    
                                                                                    var ht = ht += '  <td style="text-align:center;"><input type="number" size="4" id="to_amt" name="to_amt[]" required  class="to_amt form-control txt"> </td>';
                                                                                      
                                                                                   
        
                                                                                   
                                                                                      var ht = ht += '<td style="text-align:center;"><a href="javascript:void(0)" id="remove"> Remove <a> </tr>';
                                                                                    
                                                        console.log(ht);                            

                                                                               
               
            
            $('#datatable1 tbody').append(ht);
           

           
        });
        
        $("#datatable1").on("click", "#remove", function() {
   $(this).closest("tr").remove();
});
 totalMoney = 0 ;

$(document).on('keyup','.to_amt',function(){
$('.to_amt').each(function(){
    // Performs tasks to each of the links
    amt = $(this).val();
    totalMoney += parseInt( amt );
    
    console.log(amt);
});

//console.log(amt);


$('#total_amt').val(totalMoney);

});

        
    </script>
            



    <script type="text/javascript">
        $("#datatable1").DataTable();
    </script>
  @stop