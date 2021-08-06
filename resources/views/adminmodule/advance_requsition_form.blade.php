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