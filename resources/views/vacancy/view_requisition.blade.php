  @section('extra_css')
  <style>
table.requistion_table ul{
   list-style:unset;
}
.width30{
   width: 30%;
}
.width2{
   width:2%;
}
</style>
@stop
    @extends('layouts.superadmin_layout')

   @section('content')

            

         <!-- Start content -->

         <div class="content p-0">

            <div class="container-fluid">

               <div class="page-title-box">

                  <div class="row align-items-center bredcrum-style">

                     <div class="col-sm-6 col-6">

                        <h3 class="page-title">View Requisition</h3>

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                           <li class="breadcrumb-item active"><a href="{{URL::to('/view-requisition')}}/{{$list->id}}">View Requisition</a>

                           </li>

                        </ol>

                     </div>

                  </div>

               </div>

               <!-- end row -->

               <div class="row">

                  <div class="col-12">

                     <div class="card m-t-20">

                        <div class="card-body">
                           <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Number Of Position
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                              <label class="myprofile_label">{{$list->no_position}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Job Title
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->job_title}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Department
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->deptname}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <h5 class="bg-primary padding-5 font-18">KRA'S</h5>
                           </div>
                           <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Role Objective
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <label class="myprofile_label">{{$list->rolename}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Responsibilities
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <label class="myprofile_label">{!!$list->responbilities!!}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                            <div class="col-sm-12">
                              <h5 class="bg-primary padding-5 font-18">Key Skill/Abilities</h5>
                           </div>
                            <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Skills
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <label class="myprofile_label">{{$list->skill}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Experience
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->exp}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                            <div class="col-sm-12">
                              <h5 class="bg-primary padding-5 font-18">Experience Required</h5>
                           </div>
                            <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Experience Required
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                              <label class="myprofile_label">{{$list->exp_req}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                            <div class="col-sm-12">
                              <h5 class="bg-primary padding-5 font-18">Other Details</h5>
                           </div>
                            <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Qualification
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                              <label class="myprofile_label">{{$list->qualification}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Gender
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->gender}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Job Location
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->job_location}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                       <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Reporting To
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                                <label class="myprofile_label">{{$list->reporting_user}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Interviewers
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->interviewer}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Tentative DOJ
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->boj}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Proposed Salary
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">{{$list->salary}}</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                              <!-- <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Requested By
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">dummy</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Signature
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <label class="myprofile_label">dummy</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div> -->
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