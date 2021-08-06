    @extends('layouts.superadmin_layout')
   @section('content')
       
         <!-- Start content -->
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                        <h4 class="page-title">Vacancy List</h4>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>
                           <li class="breadcrumb-item active"><a href="{{URL::to('/vacancylist')}}">Vacancy List</a></li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card m-t-20">
                        <div class="card-body">
                             @if(PermissionHelper::frontendPermission('add-new-vacancy'))
                 
                           <button class="btn btn-primary float-right" data-toggle="modal"
                              data-target="#add_vacancy">Add New Vacancy</button>
                              @endif
                           <table id="datatable" class="table table-bordered dt-responsive nowrap"
                              style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Position/Designation</th>
                                    <th>Department</th>
                                    <th>Sanctioned Post</th>
                                    <th>Year of Experience</th>
                                  
                                 </tr>
                              </thead>
                              <tbody>
                                 @php($i = 1)
                                 @foreach($hiring as $hirings)
                                 <tr>
                                    <td class="text_ellipses">{{$i++}}</td>
                                    <td class="text_ellipses">
                                       {{$hirings->designation}}
                                    </td>
                                    <td class="text_ellipses"> {{$hirings->department}}</td>
                                    <td class="text_ellipses">{{$hirings->sanctioned_post}}</td>
                                    <td class="text_ellipses">{{$hirings->exp}}</td>
                                  
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
         <!-- content -->


      <div id="add_vacancy" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title mt-0" id="myModalLabel">Add New Vacancy</h5>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Position/Designation</label>
                  <div class="col-sm-8">
                     <input class="form-control" id="designation" type="text" maxlength="60" id="example-text-input" require>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Department</label>
                  <div class="col-sm-8">
                     <input class="form-control" id="department" type="text" maxlength="60" id="example-text-input" require>
                  </div>
               </div>
             <!--   <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Sanctioned Post</label>
                  <div class="col-sm-8">
                     <input class="form-control" id="sancpost" type="text" id="example-text-input">
                  </div>
               </div> -->
               <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Year of Experience</label>
                  <div class="col-sm-8">
                     <input class="form-control" id="exp" onkeypress="preventNonNumericalInput(event)" maxlength="10" type="text" id="example-text-input" require>
                  </div>
               </div>
           
                  <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label">File Upload</label>
                  <div class="col-sm-8">
                     <input type="file" id="file" name="file" class="form-control" require>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button id="vacancyadd" type="button" class="btn btn-primary waves-effect">Save</button>
               <button type="button" class="btn btn-secondary waves-effect waves-light"
                  data-dismiss="modal">Cancel</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
           @stop

           @section('extra_js')

           <script type="text/javascript">



  

       $(document).on('click','#vacancyadd',function(event){
            event.preventDefault();

            $('#vacancyadd').attr( 'disabled', 'disabled' );

          
        var error = 1;
      userid = $('#userid').val();
      designation = $('#designation').val();
      department = $('#department').val();
      sancpost = '';
      exp = $('#exp').val();
      
      var attach = $('#file').val();

              
 formData  =  new FormData();
  var files = $('#file')[0].files[0];

formData.append('userid', userid);
formData.append('designation', designation);
formData.append('department', department);
formData.append('exp', exp);

formData.append('file', files);

        if(attach !=''){
              if($('#file')[0].files[0].size > 2000000) {
             alert("Please upload file less than 2MB. Thanks!!");
             $('#file')[0].files[0].val('');
             return false;
           }
        }
if(attach !=''){
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(attach)){
        alert("Please Upload JPG, GIF,PNG,PDF");
         $('#profile_error').show();
           error = 0;
        files.value = '';
        return false;
           }
         }
   

    
      var token = "{{csrf_token()}}"; 
    

   
      $.ajax({
      url: '/addvacancy',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){
               if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Added Successfully", "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
       },
    });




          });




           </script>

                      @stop