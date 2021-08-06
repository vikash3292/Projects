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

                        <h3 class="page-title">Requisition New Request</h3>

                        <ol class="breadcrumb">

                      <li class="breadcrumb-item"><a href="#">GRC</a></li>

                           <li class="breadcrumb-item active"><a href="new_request.html">Requisition New Request</a>

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
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Number Of Position<span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="number" class="form-control m-0" name="no_position" id="no_position" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Job Title<span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="job_title" id="job_title" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Department<span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               
                                               <select class="form-control m-0" name="deportment" id="deportment" Required> 
                                               <option value="">Select option</option>
                                               @foreach($dept as $depts)
                                               <option value="{{$depts->id}}">{{$depts->deptname}}</option>

                                               @endforeach
                                                
                                               </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>


                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Role Objective<span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                             <select class="form-control m-0" name="role" id="role" Required> 
                                               <option value="">Select option</option>
                                               @foreach($role as $roles)
                                               <option value="{{$roles->id}}">{{$roles->rolename}}</option>

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
                           


                                                           

                                    <div class="col-md-12">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Responsibilities<span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-12">
                                             <div class="input-group">
                                              
                                               <textarea rows="3" cols="8" name="responbilities" id="responbilities" maxlenght="500" class="wpcf7-form-control wpcf7-textarea form-control event-tag-name" aria-invalid="false"></textarea>
                                   
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
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Skills <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="skill" id="skill" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Experience <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="exp" id="exp" Required>
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
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Experience Required <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="exp_req" id="exp_req" Required>
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
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Qualification <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="qualification" id="qualification" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Gender <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                             <select class="form-control m-0" name="gender" id="gender" Required> 
                                               <option value="">Select option</option>
                                               <option value="Male">Male</option>
                                               <option value="Female">Female</option>
                                             
                                               </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Job Location <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="job_location" id="job_location" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                       <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Reporting To <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                             <select class="form-control m-0" name="reporting_to" id="reporting_to" Required> 
                                             @foreach($user as $users)
                                               <option value="{{$users->id}}">{{$users->userfullname}}</option>

                                               @endforeach
                                               </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Interviewers <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="interviewer" id="interviewer" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Tentative DOJ <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="date" class="form-control m-0" name="doj"  id="doj" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Proposed Salary <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                               <input type="text" class="form-control m-0" name="salary" name="salary" Required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                       <div class="form-group row">
                                          <label for="txtholiday" class="col-lg-4 col-form-label">Requested By <span class="text-danger p-l-5">*</span>
                                          </label>
                                          <div class="col-lg-8">
                                             <div class="input-group">
                                             <select class="form-control m-0" name="req_by" id="req_by" required=""> 
                                             @foreach($user as $users)
                                               <option value="{{$users->id}}">{{$users->userfullname}}</option>

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