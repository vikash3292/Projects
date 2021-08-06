                         
                         <table width="100%" border="1" style="border-color: #ededed;">
                              <tbody>
                                <tr>
                                  <th style="padding: 10px;width: 49%">Number of Position </th>
                                  <td style="padding: 10px;width: 2%">:</td>
                                  <td style="padding: 10px;width: 49%">{{$list->no_position}}</td>
                                </tr>
                                 <tr>
                                  <th style="padding: 10px">Job Title</th>
                                  <td style="padding: 10px">:</td>
                                  <td style="padding: 10px">{{$list->job_title}}</td>
                                </tr>
                                 <tr>
                                  <th style="padding: 10px">Department</th>
                                  <td style="padding: 10px">:</td>
                                  <td style="padding: 10px">{{$list->deptname}}</td>
                                </tr>
                                   </tbody>
                            </table>
                             <table width="100%" border="1" style="border-color: #ededed;margin-top: 20px">
                              <tbody>
                                <tr>
                                  <td colspan="4" style="background: #5fe384!important;padding: 10px;font-weight: 500">KRA'S</td>
                                </tr>
                                  <tr>
                                  <th  style="padding: 10px;width: 49%">&nbsp;</th>
                                  <td style="padding: 10px;width: 2%">:</td>
                                  <td  style="padding: 10px;">Role Objective</td>
                                </tr>
                                  <tr>
                                  <th  style="padding: 10px;width: 49%">&nbsp;</th>
                                  <td style="padding: 10px;width: 2%">:</td>
                                  <td style="padding: 10px;">
                                    <ul>
                                      <li>{{$list->rolename}}</li>
                                    </ul>
                                  </td>
                                </tr>
                                <tr>
                                  <th style="padding: 10px;width: 49%">&nbsp;</th>
                                  <td style="padding: 10px;width: 2%">:</td>
                                  <td style="padding: 10px">Responsibilities</td>
                                </tr>
                                  <tr>
                                  <th style="padding: 10px 0;">&nbsp;</th>
                                  <td style="padding: 10px;width: 2%">:</td>
                                  <td style="padding: 10px 0;">
                                    <ul>
                                      <li>{!!$list->responbilities!!}</li>
                                    </ul>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                              <table width="100%" border="1" style="border-color: #ededed;margin-top: 20px">
                              <tbody>
                                <tr>
                                  <td colspan="4" style="background: #5fe384!important;padding: 10px;font-weight: 500">Key Skill/Abilities</td>
                                </tr>
                                <tr>
                                  <th  style="padding: 10px;width: 49%">&nbsp;</th>
                                  <td  style="padding: 10px;">Skills & Experience </td>
                                </tr>
                                <tr>
                                  <th  style="padding: 10px;width: 49%">&nbsp;</th>
                                  <td style="padding: 10px;">
                                    <ul>
                                      <li>{{$list->skill}} & {{$list->exp}}</li>
                                    </ul>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                               <table width="100%" border="1" style="border-color: #ededed;margin-top: 20px">
                              <tbody>
                                <tr>
                                  <td colspan="4" style="background: #5fe384!important;padding: 10px;font-weight: 500">Experience Required</td>
                                </tr>
                                <tr>
                                  <th  style="padding: 10px;width: 50%">{{$list->exp_req}}</th>
                                  <td  style="padding: 10px;width: 50%">&nbsp;</td>
                                </tr>
                               <tr>
                                  <th  style="padding: 10px;width: 50%">&nbsp;</th>
                                  <td  style="padding: 10px;width: 50%">&nbsp;</td>
                                </tr>
                              </tbody>
                            </table>
                              <table width="100%" border="1" style="border-color: #ededed;margin-top: 20px">
                              <tbody>
                                <tr>
                                  <td colspan="6" style="background: #5fe384!important;padding: 10px;font-weight: 500">Other Details</td>
                                </tr>
                                <tr>
                                  <td style="padding: 10px;width: 24%">Qualification</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->qualification}}</td>
                                    <td style="padding: 10px;width: 24%">Gender</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->gender}}</td>
                                </tr>
                                 <tr>
                                  <td style="padding: 10px;width: 24%">Job Location</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->job_location}}</td>
                                    <td style="padding: 10px;width: 24%">Reporting To</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->reporting_user}}</td>
                                </tr>
                                 <tr>
                                  <td style="padding: 10px;width: 24%">Interviewers</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->interviewer}}</td>
                                    <td style="padding: 10px;width: 24%">Tentative DOJ</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->boj}}</td>
                                </tr>
                              </tbody>
                            </table>
                              <table width="100%" border="1" style="border-color: #ededed;margin-top: 20px">
                              <tbody>
                                 <tr>
                                  <td style="padding: 10px;width: 24%">Proposed Salary</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->salary}}</td>
                                    <td style="padding: 10px;width: 24%">&nbsp;</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">&nbsp;</td>
                                </tr>
                                 <tr>
                                  <td style="padding: 10px;width: 24%"></td>
                                  <td style="padding: 10px;width: 2%"></td>
                                   <td style="padding: 10px;width: 24%"></td>
                                    <td style="padding: 10px;width: 24%">Requested By</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">{{$list->req_name}}</td>
                                </tr>
                                 <tr>
                                  <td style="padding: 10px;width: 24%"></td>
                                  <td style="padding: 10px;width: 2%"></td>
                                   <td style="padding: 10px;width: 24%"></td>
                                    <td style="padding: 10px;width: 24%">Signature</td>
                                  <td style="padding: 10px;width: 2%">:</td>
                                   <td style="padding: 10px;width: 24%">&nbsp;</td>
                                </tr>
                              </tbody>
                            </table>

                            <div style="border-bottom: 2px solid;margin-top: 40px">
                             <div style="width:35%;display: inline-block;">Prepared By:HR</div>
                             <div style="width:35%;display: inline-block;">Controlled Version</div>
                             <div style="width:29%;display: inline-block;">Approved By: DGM(Admin)</div>
                           </div>