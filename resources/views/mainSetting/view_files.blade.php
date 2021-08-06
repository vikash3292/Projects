@extends('layouts.superadmin_layout')
@section('content')

 <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">File List</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="expenses.html">File List</a>
                                    </li>
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable" class="show_all_files table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th width="6%">S.No</th>
                                                    <th>File Name</th>
                                                    <th width="6%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-12 p-0">
                    <div class="form-group row">
                        <div class="col-sm-12 m-t-30">
                            <form action="#" class="dropzone">
                                <div class="fallback"><input name="files[]" type="file" multiple="multiple"></div>
                            </form>
                        </div>
                        <div class="col-sm-12 text-center m-t-15">
                            <button type="button" onclick="upload_file()" class="btn btn-primary waves-effect waves-light">Upload Files</button>
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


@section('extra_js')

<script>

  var folder_id = '{{$folder_id}}';
  
  
  

    function upload_file(){

  
 
  var files = $('#files').val();

     if(files ==''){
       alert('Please Select files')
              return false;
      }

  // var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  //   if(!allowedExtensions.exec(profile)){
  //       $('#profile_error').text('Valid Image').attr('style','color:red');
  //        $('#profile_error').show();
  //          error = 0;
  //       fileInput.value = '';
  //       return false;
  //   }


  



   formData  =  new FormData();
  //var files = $('#files')[0].files[0];

  console.log( $('input[type=file]')[0].files);


 var files =$('input[type=file]')[0].files;
    console.log(files.length);

    for(var i=0;i<files.length;i++){
        formData.append("images[]", files[i], files[i]['name']);

    }



formData.append('folder_id', folder_id);

   error =1;


      if(error ==1){

          $('#loadingDiv').show();

           var token = "{{csrf_token()}}";

    

   
      $.ajax({
      url: '/upload_file_folder_withoud_project',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){

        if(data.status ==200){
          alertify.success(data.msg); 
           $('#loadingDiv').hide(); 
           get_files(folder_id);

       }
     }
      });

      }


 }



    get_files(folder_id);

    function get_files(folder_id) {



        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/all_files',
            type: "post",
            data: { "_token": _token, "folder_id": folder_id },
            dataType: 'JSON',

            success: function (data) {
              //  console.log(data.allclient); // this is good
              $('table.show_all_files tbody').html(data.all_files);


            }
        });
    }
    
     function delete_file(element,file_id) {



        var _token = "{{csrf_token()}}";

        $.ajax({
            url: '/delete_files',
            type: "post",
            data: { "_token": _token, "file_id": file_id },
            dataType: 'JSON',

            success: function (data) {
              //  console.log(data.allclient); // this is good
              //$('table.show_all_files tbody').html(data.all_files);
              $(element).parent().parent().remove();
               alertify.success(data.msg);
              get_files(folder_id);


            }
        });
    }
    
    </script>


@stop