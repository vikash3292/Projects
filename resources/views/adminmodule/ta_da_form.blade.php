<form id="ta_da_form">
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
                                         <input type="text" class="form-control m-0" id="ta_name" name="ta_name" required> 
                                     </td>
                                     <td class="padding-5 font-500">
                                        Designation
                                    </td>
                                    <td class="padding-5">
                                     <input type="text" class="form-control m-0" id="ta_designation" name="ta_designation" required> 
                                 </td>
                             </tr>
                             <tr>
                                <td class="padding-5 font-500">
                                   Section
                               </td>
                               <td>
                                <input type="text" class="form-control m-0" id="ta_section" name="ta_section" required> 
                            </td>
                            <td class="padding-5 font-500">
                                Place to be Visit
                            </td>
                            <td class="padding-5">
                             <input type="text" class="form-control m-0" id="ta_visit" name="ta_visit" required> 
                         </td>
                     </tr>
                     <tr>
                        <td class="padding-5 font-500">
                           OFF. CTGRY
                       </td>
                       <td>
                        <input type="text" class="form-control m-0" id="ta_ctgry" name="ta_ctgry" required> 
                    </td>
                    <td class="padding-5 font-500">
                        ADV. REQ#
                    </td>
                    <td class="padding-5">
                     <input type="text" class="form-control m-0" id="ta_adv" name="ta_adv" required> 
                 </td>
             </tr>
             <tr>
                <td class="padding-5 font-500">
                   Start Date(MM/DD/YY HH:HRS)
               </td>
               <td>
                 <input type="text" class="form-control m-0" id="ta_s_date" name="ta_s_date" required> 
             </td>
             <td class="padding-5 font-500">
                End Date
            </td>
            <td class="padding-5 font-500">
             <input type="text" class="form-control m-0" id="ta_e_date" name="ta_e_date" required> 
         </td>
     </tr>
     <tr>
        <td class="padding-5 font-500">
           Project ID
       </td>
       <td>
         <input type="text" class="form-control m-0" id="ta_project_id" name="ta_project_id" required> 
     </td>
     <td class="padding-5 font-500">
        Project Name
    </td>
    <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_project_name" name="ta_project_name" required> 
 </td>
</tr>
<tr>
    <td class="padding-5 font-500">
       Project Sector
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_sector" name="ta_sector" required> 
 </td>
 <td class="padding-5 font-500">
    Advance
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="ta_advance" name="ta_advance" required> 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">
       DA Claiming
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_da_claim" name="ta_da_claim" required> 
 </td>
 <td class="padding-5 font-500">
    DAY/HR S
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="ta_day_hr" name="ta_day_hr" required> 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">
       Claim Number
   </td>
   <td class="padding-5">
     <input type="text" class="form-control m-0" id="ta_claim_no" name="ta_claim_no" required> 
 </td>
 <td class="padding-5 font-500">
    DA Amount
</td>
<td class="padding-5">
 <input type="text" class="form-control m-0" id="ta_da_amt" name="ta_da_amt" required> 
</td>
</tr>
<tr>
    <td class="padding-5 font-500">Tour Details</td>
    <td colspan="3" class="padding-5">
        <textarea class="form-control" rows="3" id="ta_desc" name="ta_desc" required></textarea>
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
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Place to be Visit</th>
                                            <th>Particulars</th>
                                            <th>Mode of Payment</th>
                                            <th>Amount</th>
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



                            </form>
