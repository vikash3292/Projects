@extends('layouts.superadmin_layout')

   @section('content')

   

            <!-- Start content -->

            <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6 col-6">

                                <h4 class="page-title">Performance Appraisal Form</h4>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="index.html">GRC</a></li>

                                    <li class="breadcrumb-item active"><a href="#">Performance

                                            Appraisal Form</a></li>

                                </ol>

                            </div>
                             <div class="col-sm-6 col-6 text-right">
                               <button class="btn btn-primary">Save</button>
                             </div>

                        </div>

                    </div>

                    <!-- end row -->

                    <!-- end row -->

                    <form id="appraisalinsert" method="post">

                    <div class="row">

                        <div class="col-12">

                            <div class="card m-t-20">

                                <div class="card-body">

                                    <div class="col-sm-12 p-0 table-responsive mb-0" data-pattern="priority-columns">

                                        <table id="tech-companies-1" border="1"

                                            class="table appraisal_form_fill text-center">

                                            <thead>

          @if(!empty($appraisalfilledform))



            @php($usermarks = json_decode($appraisalfilledform->user_values))

            @php($codintormarks = json_decode($appraisalfilledform->codinator_values))

             @php($headmarks = json_decode($appraisalfilledform->head_values))



             @endif

                                                <tr>

                                                    <th>S.No</th>

                                                       @if(PermissionHelper::frontendPermission('appraisal-form-limit-1'))

                                                    <th data-priority="1" class="font-600">Activities, Traits,

                                                        Parameters

                                                    </th>

                                                    @endif

                                                       @if(PermissionHelper::frontendPermission('appraisal-form-limit-2'))

                                                    <th data-priority="3" class="font-600">Maximum Marks</th>

                                                     @endif

                                                       @if(PermissionHelper::frontendPermission('appraisal-form-limit-3'))

                                                    <th data-priority="1" class="font-600">Self-Marking</th>

                                                     @endif

                                                       @if(PermissionHelper::frontendPermission('appraisal-form-limit-4'))

                                                    <th data-priority="3" class="font-600">Marking by

                                                        Coordinator Scale

                                                        of 1 to 10), 10

                                                        being highest</th>

                                                         @endif

                                                           @if(PermissionHelper::frontendPermission('appraisal-form-limit-5'))

                                                    <th data-priority="3" class="font-600">Marking by

                                                        HoD Scale of 1 to

                                                        10),

                                                        10 being highest</th>

                                                         @endif

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @php($i = 1)

                                                @foreach($appraisalform as $k => $appraisalforms)

                                                <tr>

                                                    <th>{{$i++}}</th>



                                        @if(PermissionHelper::frontendPermission('appraisal-form-limit-1'))

                                                    <td>{{$appraisalforms->categary}}</td>

                                                    @endif



                                         @if(PermissionHelper::frontendPermission('appraisal-form-limit-2'))

                                                    <td class="font-500">{{$appraisalforms->max_value}}</td>



                                                        @endif



                                     @if(PermissionHelper::frontendPermission('appraisal-form-limit-3'))

                                                    <td>



                                            <select class="form-control userval" id="usermarksval[]" name="usermarksval[]">





                                                

                                                  @for ($i =0; $i <= 20; $i++)

                                                <option data-typeid="{{ $i }}" value="{{ $i }}" @if(!empty($usermarks)) @if($i==$usermarks[$k]) selected=""   @endif @endif>{{ $i }}</option>

                                                   @endfor    

                                            </select>

                                                    </td>

                                                        @endif

                                @if(PermissionHelper::frontendPermission('appraisal-form-limit-4'))



                                                    <td>

                                            <select class="form-control condinator" id="condinatorval[]" name="condinatorval[]">





                                                

                                                  @for ($i =0; $i <= 20; $i++)

                                                <option value="{{ $i }}"  @if(!empty($codintormarks)) @if($i==$codintormarks[$k]) selected=""   @endif @endif>{{ $i }}</option>

                                                   @endfor    

                                            </select>

                                                  </td>

                                                      @endif





                                          @if(PermissionHelper::frontendPermission('appraisal-form-limit-5'))





                                                    <td>

                                                        

                                            <select class="form-control head" id="headval[]" name="headval[]">





                                                

                                                  @for ($i =0; $i <= 20; $i++)

                                                <option value="{{ $i }}" @if(!empty($headmarks)) @if($i==$headmarks[$k]) selected=""   @endif @endif>{{ $i }}</option>

                                                   @endfor    

                                            </select> 



                                                    </td>

                                                        @endif

                                                </tr>



                                                @endforeach





                                            </tbody>



                                               <input type="hidden" id="appraisal_request_id" name="appraisal_request_id" value="{{$appraisal_request_id??0}}">

                                                <input type="hidden" name="usertotal" id="usertotal" value="{{$appraisalfilledform->total_user_mark??0}}">

                                                <input type="hidden" name="condinatortotal" id="condinatortotal" value="{{$appraisalfilledform->total_codinator_mark??0}}">

                                                <input type="hidden" name="headtotal" id="headtotal" value="{{$appraisalfilledform->total_head_mark??0}}">



                                          @if(PermissionHelper::frontendPermission('appraisal-total'))

                                            <tfoot>

                                                <tr class="text-center font-600">

                                                    <td colspan="2">Grand Total (Out of 100)</td>

                                                    <td>100</td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                         

                                                <tr class="text-center font-600" value="0">

                                                    <td colspan="2">Weightage (%)</td>

                                                    <td>x-x</td>

                                                    <td id="usermarks">{{$appraisalfilledform->total_user_mark??0}}</td>

                                                    <td id="codinatormarks">{{$appraisalfilledform->total_codinator_mark??0}}</td>

                                                    <td id="headmarks">{{$appraisalfilledform->total_head_mark??0}}</td>

                                                </tr>

                                            </tfoot>

                                            @endif

                                        </table>

                                       

                                    </div>
       <div class="form-group row m-0">
         <label for="empcode" class="col-lg-12 col-form-label p-0">Description
           <span class="text-danger">*</span></label>
           <div class="col-lg-12 col-form-label p-0">
             <textarea class="form-control" rows="3" id="Description"></textarea> 
             <div id="desc"></div>
           </div>
         </div>
<div class="col-sm-12 p-0">
   @php($userid = Auth::guard('main_users')->user()->id)

                                         @if(!empty($appraisalfilledform->user_id))

                                        @if(!in_array($userid,json_decode($appraisalfilledform->user_id)))

                                       <button type="button" id="intappral" class="btn btn-primary addemp">Save</button>



                                       @endif

                                       @endif



                                          @if(empty($appraisalfilledform->user_id))



                                          <button type="button" id="intappral" class="btn btn-primary addemp">Save</button>



                                          @endif
</div>
                                </div>

                            </div>

                        </div>

                        <!-- end col -->

                    </div>

                    </form>

                    <!-- end row -->

                </div>

                <!-- container-fluid -->

            </div>

         @stop



           @section('extra_js')



           <script type="text/javascript">

               



     $(document).on('change','.userval',function(){



            var totalMoney = 0; 

            $('.userval').each(function(){

               totalMoney += parseInt(this.value);

            });



          //  console.log(totalMoney);

            $("#usermarks").text(totalMoney);

            $('#usertotal').val(totalMoney);





     });



        $(document).on('change','.condinator',function(){



            var totalMoney = 0; 

            $('.condinator').each(function(){

               totalMoney += parseInt(this.value);

            });



           // console.log(totalMoney);

            $("#codinatormarks").text(totalMoney);

            $('#condinatortotal').val(totalMoney);





     });



       $(document).on('change','.head',function(){



            var totalMoney = 0; 

            $('.head').each(function(){

               totalMoney += parseInt(this.value);

            });



            //console.log(totalMoney);

            $("#headmarks").text(totalMoney);

            $('#headtotal').val(totalMoney);





     });



$("#intappral").click(function(e) {



  e.preventDefault();



  var totalusermarks = $('#usertotal').val();

   var condinatortotal = $('#condinatortotal').val();

    var headtotal = $('#headtotal').val();

    var appraisal_request_id = $('#appraisal_request_id').val();



    

    





      var usermarksval = new Array();

          $("select[name='usermarksval[]'] option:selected").each(function() {

              usermarksval.push($(this).val());

          });





            var condinatorval = new Array();

          $("select[name='condinatorval[]'] option:selected").each(function() {

              condinatorval.push($(this).val());

          });



            var headval = new Array();

          $("select[name='headval[]'] option:selected").each(function() {

              headval.push($(this).val());

          });



          console.log(usermarksval);





    $('#loadingDiv').show();

            

   var token = "{{csrf_token()}}"; 





  $.ajax({

        url: '/addappraisalform',

        headers: {'X-CSRF-TOKEN': token}, 

        type: "post",

      //  data:$(this).serialize()+'&usermarksval='+JSON.stringify(usermarksval)+'&condinatorval='+JSON.stringify(condinatorval)+'&headval='+JSON.stringify(headval),

        data: {

        usermarksval: JSON.stringify(usermarksval), 

          condinatorval: JSON.stringify(condinatorval),

           headval: JSON.stringify(headval),

           totalusermarks :totalusermarks,

           condinatortotal :condinatortotal,

           headtotal :headtotal,

           appraisal_request_id:appraisal_request_id

      },

        

        success: function (data) {

        //console.log(data.city); // this is good

    

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

               location.reload();



          }else{



             $('#loadingDiv').hide();

            

             swal("Good job!", "You clicked the button!", "error");



          }

          

        }

      });







});



        //  $("form#appraisalinsertform").submit(function(e) {



 

          //  e.preventDefault();



       // alert('asdf');



              //  return false;





          // var usermarksval = new Array();

          // $("select[name='usermarksval[]'] option:selected").each(function() {

          //     usermarksval.push($(this).val());

          // });





          //   var condinatorval = new Array();

          // $("select[name='condinatorval[]'] option:selected").each(function() {

          //     condinatorval.push($(this).val());

          // });



          //   var headval = new Array();

          // $("select[name='headval[]'] option:selected").each(function() {

          //     headval.push($(this).val());

          // });



       



         

  //   $('#loadingDiv').show();

            

  //  var token = "{{csrf_token()}}"; 





  // $.ajax({

  //       url: '/addappraisalform',

  //       headers: {'X-CSRF-TOKEN': token}, 

  //       type: "post",

  //       data:$(this).serialize()+'&usermarksval='+JSON.stringify(usermarksval)+'&condinatorval='+JSON.stringify(condinatorval)+'&headval='+JSON.stringify(headval),

  //     //   data: {

  //     //   leaveDate: JSON.stringify(leaveDate), 

  //     //     leavetype: JSON.stringify(leavetype),

  //     //      leavetime: JSON.stringify(leavetime),

  //     //      formdata : $(this).serialize(),

  //     // },

        

  //       success: function (data) {

  //       //console.log(data.city); // this is good

    

  //         if(data.status ==200){

  //            $('#loadingDiv').hide();

         

             

  //            swal("Good job!", "Added Successfully", "success");



  //           location.reload();



  //         }else if(data.status ==202){



  //             $('#loadingDiv').hide();

  //           swal("Good job!", "User alert Exist", "success");

  //           location.reload();



  //             }else if(data.status ==203){



  //             $('#loadingDiv').hide();

  //           swal("Good job!", "Successfully Updated", "success");

  //              location.reload();



  //         }else{



  //            $('#loadingDiv').hide();

            

  //            swal("Good job!", "You clicked the button!", "error");



  //         }

          

  //       }

  //     });



       

         //  });







           </script>



            @stop