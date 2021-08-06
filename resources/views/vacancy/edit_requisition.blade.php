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

                        <h3 class="page-title">Requisition Edit Request</h3>

                        <ol class="breadcrumb">

                           <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                           <li class="breadcrumb-item active"><a href="{{URL::to('/addreqruitment')}}">Requisition edit Request</a>

                           </li>

                        </ol>

                     </div>

                  </div>

               </div>

               <!-- end row -->

               <div class="row">

                  <div class="col-12">

                     <div class="card m-t-20">
                        <form id="requisition_form">
                        <div class="card-body">

                           <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Number Of Position
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="number" class="form-control m-0" name="no_position" id="no_position" Required value="{{$list->no_position}}">
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
                                               <input type="text" class="form-control m-0" name="job_title" id="job_title" Required value="{{$list->job_title}}">
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
                                               
                                               <select class="form-control m-0" name="deportment" id="deportment" Required > 
                                               <option value="">Select option</option>
                                               @foreach($dept as $depts)
                                               <option value="{{$depts->id}}" @if($list->deportment == $depts->id) selected @endif>{{$depts->deptname}}</option>

                                               @endforeach
                                                
                                               </select>
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
                                             <select class="form-control m-0" name="role" id="role" Required value="{{$list->role}}"> 
                                               <option value="">Select option</option>
                                               @foreach($role as $roles)
                                               <option value="{{$roles->id}}" @if($list->role == $roles->id) selected @endif>{{$roles->rolename}}</option>

                                               @endforeach
                                               </select>
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
                                              
                                               <textarea rows="3" cols="8" name="responbilities" id="responbilities" maxlenght="500" class="wpcf7-form-control wpcf7-textarea form-control event-tag-name" aria-invalid="false">{!!$list->responbilities!!}</textarea>
                                   
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
                                               <input type="text" class="form-control m-0" name="skill" id="skill" Required value="{{$list->skill}}">
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
                                               <input type="text" class="form-control m-0" name="exp" id="exp" Required value="{{$list->exp}}">
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
                                               <input type="text" class="form-control m-0" name="exp_req" id="exp_req" Required value="{{$list->exp_req}}">
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
                                               <input type="text" class="form-control m-0" name="qualification" id="qualification" Required value="{{$list->qualification}}">
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
                                             <select class="form-control m-0" name="gender" id="gender" Required> 
                                               <option value="">Select option</option>
                                               <option value="Male" @if($list->gender == 'Male') selected @endif>Male</option>
                                               <option value="Female"  @if($list->gender == 'Female') selected @endif>Female</option>
                                             
                                               </select>
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
                                               <input type="text" class="form-control m-0" name="job_location" id="job_location" Required value="{{$list->job_location}}">
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
                                             <select class="form-control m-0" name="reporting_to" id="reporting_to" Required > 
                                             @foreach($user as $users)
                                               <option value="{{$users->id}}" @if($list->reporting_to == $users->id) selected @endif>{{$users->userfullname}}</option>

                                               @endforeach
                                               </select>
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
                                               <input type="text" class="form-control m-0" name="interviewer" id="interviewer" Required value="{{$list->interviewer}}">
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
                                               <input type="date" class="form-control m-0" name="doj"  id="doj" Required value="{{$list->doj}}">
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
                                               <input type="text" class="form-control m-0" name="salary" name="salary" Required value="{{$list->salary}}">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                              <input type="hidden" value="{{$list->id}}" id="requisition_id" name="requisition_id">
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Requested By
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                             <select class="form-control m-0" name="req_by" id="req_by" requRequiredire> 
                                             @foreach($user as $users)
                                               <option value="{{$users->id}}" @if($list->req_by == $users->id) selected @endif>{{$users->userfullname}}</option>

                                               @endforeach
                                               </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                  
                              </div>
                           </div>


                           <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                        </div>
                        </form>

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


       function edit_bill(bill_id,bill_name,desc){

       $('.modal-title').text('Edit Bill');
       $('#bill_id').val(bill_id);
       $('#billname').val(bill_name);
       $('#desc').val(desc);

      

        $('#newtraining').modal('show');

       }
       
   $("form#requisition_form").submit(function(e) {


e.preventDefault();

for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}



var token = "{{csrf_token()}}"; 

$('#loadingDiv').show();
$.ajax({
url: '/addreqruitment',
headers: {'X-CSRF-TOKEN': token}, 
type: "post",
dataType: 'JSON',
data:$(this).serialize(),

success: function (data) {
//console.log(data.city); // this is good

if(data.status ==200){
$('#loadingDiv').hide();


alertify.success(data.msg);

window.location = "{{URL::to('recruitmenttracker')}}";



}else if(data.status ==202){

$('#loadingDiv').hide();
alertify.success(data.msg);

}else if(data.status ==203){

$('#loadingDiv').hide();
alertify.success(data.msg);

}else{

$('#loadingDiv').hide();

alertify.error(data.msg);

}

}
});



});


</script>

<script>
   CKEDITOR.replace( 'responbilities' );
</script>

@stop