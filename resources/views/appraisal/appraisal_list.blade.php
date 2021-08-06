@extends('layouts.superadmin_layout')
   @section('content')
 
            <!-- Start content -->
            <div class="content p-0">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center bredcrum-style">
                            <div class="col-sm-6">
                                <h4 class="page-title">Performance Appraisal List</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>
                                    <li class="breadcrumb-item active"><a href="appraisal_form.html">Performance
                                            Appraisal List</a>
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
                                    <button class="btn btn-primary float-right" id="sendappraisal">Send From</button>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Select
                                                </th>
                                                <th>S.No</th>
                                                <th>Employee Name</th>
                                                <th>Employee Code</th>
                                                <th>Date of Joining</th>
                                                <th>Employee Status</th>
                                                <th>Form Status</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i=1)
                                            @foreach($apraisal_list as $apraisal_lists)
                                            @php(

                                            $sendcount = DB::table('appraisal_list')->where('user_id',$apraisal_lists->id)->where('status',0)->count()
                                            )
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" data-email="{{$apraisal_lists->emailaddress}}" value="{{$apraisal_lists->userfullname}}" class="custom-control-input appraisalallname"
                                                            id="customControlInline{{$apraisal_lists->id}}">
                                                        <label class="custom-control-label"
                                                            for="customControlInline{{$apraisal_lists->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{$i++}}</td>
                                                <td>
                                                   {{$apraisal_lists->userfullname}}
                                                </td>
                                                <td>  {{$apraisal_lists->employeeId}}</td>
                                                <td>{{$apraisal_lists->join_date}}</td>
                                                <td>{{$apraisal_lists->workcode}}</td>

                                                @if($sendcount > 0)

                                                <td><span style="color:green">Send</span></td>

                                                @else

                                                <td><span style="color:red">Not Sent</span></td>


                                                @endif
                                                <td>Score</td>
                                            </tr>

                                            @endforeach
                                     <!--        <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customControlInline">
                                                        <label class="custom-control-label"
                                                            for="customControlInline"></label>
                                                    </div>
                                                </td>
                                                <td>1</td>
                                                <td>
                                                    Rajesh Yadav
                                                </td>
                                                <td>KSPL0023</td>
                                                <td>12-12-2017</td>
                                                <td>Permanent</td>
                                                <td>Not Sent</td>
                                            </tr> -->
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

                <div id="sendform" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="font-18 font-green text-center">Form Sucessfully Sent to:</p>
                            <form id="sendappraisal" method="post">
                            <ul id="appraisalname">
                              <!--   <li>Rishabh Dargen</li>
                                <li>Rajesh Yadav</li> -->
                            </ul>
                            </form>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button  id="sendAppraisalEmail" type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
         @stop

        @section('extra_js')
   <script type="text/javascript">
       

          $(document).on('click','#sendappraisal',function(){


     yourArray = [];
    appraisalEmail = [];
    // if is checked
    if ($('.appraisalallname').is(':checked')) {


      $('.appraisalallname').parent().find('input[type=checkbox]:checked').each(function() {
        yourArray.push($(this).val());
         appraisalEmail.push($(this).data('email'));
      });

      console.log(appraisalEmail);

      var str = '';

     for(i = 0; i < yourArray.length; i++) {

   
     str = str + '<li><input name="apprailEmail[]" id="count_'+i+'" type="hidden">'+yourArray[i]+'</li>';
        
    
      }

    //  console.log(str);

       $('#appraisalname').html(str);

      $('#sendform').modal('show');

        for(i = 0; i < yourArray.length; i++) {

       $('#count_'+i).val(appraisalEmail[i]);


             }

            }


        });

          
  $(document).on('click','#sendAppraisalEmail',function(){

      
          email = [];
      //  var emails = $("input[name^= 'apprailEmail']").val();


    $('input[name="apprailEmail[]"]').map(function () {
      email.push(this.value);
       }).get();

          sendemail = JSON.stringify(email);

 $('#loadingDiv').show();
   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/sendappraisalemail',
        type: "post",
        data: {"_token": _token,email:sendemail},
       // dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", data.msg, "success");

            location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!",data.msg, "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", data.msg, "error");

          }
          
        }
      });
      

    });





   </script>

          @stop