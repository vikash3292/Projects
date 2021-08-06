



@extends('layouts.superadmin_layout')

   @section('content')

            <!-- Start content -->

            <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6">

                                <h3 class="page-title">Apply Leave</h3>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>

                                    <li class="breadcrumb-item active">Apply Leave</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end row -->

                    <form method="post" id="myleave">

                    <div class="row">

                        <div class="col-12">

                            <div class="card m-t-20">

                                <div class="card-body">

                                    <div class="row align-items-center justify-content-center m-b-20">

                                        <div class="col-4 justify-div">

                                            <div class="form-group row m-0">

                                                <label for="empcode" class="col-lg-4 col-form-label p-l-0">Leave

                                                    Type</label>

                                                <div class="col-lg-8 p-r-0">

                                                     <?php

                                            

                                            $leave = Db::table('main_employeeleavetypes')->where('isactive',1)->get();

                                            

                                            ?>

                                                    <select class="form-control"onchange="leavetype(this.value)" name="leavemode" id="leavemode">

                                                    @foreach($leave as $leaves)

                                                        

                                                         <option value="{{$leaves->id}}#{{$leaves->numberofdays}}#{{$leaves->leavecode}}">{{$leaves->leavetype}}</option>

                                                        

                                                        @endforeach

                                                       

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div id="calendar"></div>

                                            <div style="clear:both"></div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="table-responsive">

                                                <table class="table mb-0 fixed_header" id="appendDate" name="appendDate">

                                                    <thead>

                                                        <tr>

                                                            <th>Date</th>

                                                            

                                                            <th>Leave Type</th>

                                                            <th>Leave Timing</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>



                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                    <hr>



                                     <?php

                                    $user_id = Auth::guard('main_users')->user()->id;

                                     $totalleave = DB::table('total_leave_list')->where('user_id',$user_id)->first();                         

                                    ?>

                                    <div class="row m-t-20">

                                        <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empcode" class="col-lg-4 col-form-label">Leave Days</label>

                                                <div class="col-lg-8">

                                                    <input id="leavedays" value="0" name="leavedays" type="text"  readonly

                                                        class="form-control">

                                                </div>

                                            </div>

                                        </div>

                                        <?php

                                     $manager = DB::table('main_users')->where('emprole',3)->where('isactive',1)->get();



                                        ?>

                                        <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empid" class="col-lg-4 col-form-label">Approving

                                                    Manager</label>

                                                <div class="col-lg-8">

                                                    <select class="form-control" id="manager" name="manager" required>

                                                        <option value="">Select</option>

                                                        @foreach( $manager as  $managers)

                                                        <option value="{{$managers->id}}">{{$managers->userfullname}}</option>

                                                        @endforeach

                                                       

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    

                                    <div class="row">

                                        <div class="col-md-6">

                                         <!--    <div class="form-group row">

                                                <label for="empid" class="col-lg-4 col-form-label">Available Leaves(In

                                                    Month)</label>

                                                <div class="col-lg-8">

                                                    <input id="leaveinmonth" value="0"  name="leaveinmonth" type="text"  readonly

                                                        class="form-control">

                                                </div>

                                            </div> -->

                                        </div>



                                         <?php

                                     $hr = DB::table('main_users')->where('emprole',4)->where('isactive',1)->get();



                                        ?>

                                        <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empid" class="col-lg-4 col-form-label">Approving

                                                    HR</label>

                                                <div class="col-lg-8">

                                                    <select class="form-control" id="hr" name="hr" required>

                                                        <option value="">Select</option>

                                                        @foreach($hr as  $hrs)

                                                        <option value="{{$hrs->id}}">{{$hrs->userfullname}}</option>

                                                        @endforeach

                                                       

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empcode" class="col-lg-4 col-form-label">Available Leaves(In

                                                    Month)</label>

                                                <div class="col-lg-8">

                                                    <input id="leaveinyear"  name="leaveinyear" type="hidden" value="18" readonly

                                                        class="form-control">
                                                         <input id="show_month_leave"  name="show_month_leave" type="text"  readonly

                                                        class="form-control">

                                                </div>

                                            </div>

                                        </div>





                                         <?php

                                     $admin = DB::table('main_users')->where('emprole',16)->where('isactive',1)->get();



                                        ?>

                                        <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empid" class="col-lg-4 col-form-label" required="">Approving

                                                    Admin</label>

                                                <div class="col-lg-8">

                                                    <select class="form-control" id="admin" name="admin" required>

                                                        <option value="">Select</option>

                                                       @foreach($admin as  $admins)

                                                        <option value="{{$admins->id}}">{{$admins->userfullname}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <?php

                               

                                     $commnet = DB::table('main_commnet_list')->where('status',1)->get();                         

                                    ?>

                                    <div class="row">

                                            <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empcode" class="col-lg-4 col-form-label">Unpaid Leave</label>

                                                <div class="col-lg-8">

                                                <input id="Unpaid"  value="0" name="Unpaid" type="text" readonly

                                                        class="form-control">

                                                </div>

                                            </div>

                                        </div>



                                         <?php

                                     $Director = DB::table('main_users')->where('emprole',1)->where('isactive',1)->get();



                                        ?>

                                         <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empid" class="col-lg-4 col-form-label">Approving

                                                Director</label>

                                                <div class="col-lg-8">

                                                    <select class="form-control" disabled="" required id="Director" name="Director" required="">

                                                        <option value="">Select</option>

                                                        @foreach($Director as  $Directors)

                                                        <option value="{{$Directors->id}}">{{$Directors->userfullname}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                 

                                        </div>

                                        <div class="row">

                                          <div class="col-md-6">

                                            <div class="form-group row">

                                                <label for="empcode" class="col-lg-4 col-form-label">Comment By

                                                    Applicant</label>

                                                <div class="col-lg-8">

                                                    <select class="form-control" id="select_commnet" name="select_commnet" required="">

                                                        <option value="">Select</option>

                                                        @foreach($commnet as  $commnets)

                                                        <option>{{$commnets->commnet}}</option>

                                                        @endforeach

                                                      

                                                        <option>Other</option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                             <div class="col-md-6" id="commnettext">

                                           

                                        </div>

                                    </div>



                                        <div class="col-md-12">

                                            <button id="apply_leave" class="btn btn-primary float-right">Apply</button>

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





                <div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

           <h5 class="modal-title mt-0">Cancel Leave</h5>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

       

      </div>

      <div class="modal-body">

        <div id="details"></div>

      </div>

      

    </div>



  </div>

</div>



          

         @stop



         @section('extra_js')



<script type="text/javascript">



         

  var count = 1;

  var leavecount = 1;

  $(document).on('click', '.fc-day-number', function () {

    var a = $(this).attr("data-date");

        var leavemode =   $('#leavemode').val();

     var leavedata =  leavemode.split("#");

    if(a){



 var _token = "{{csrf_token()}}";



$.ajax({

 url: "{{URL::to('checkdate')}}",

  type: "post",

 data: {"_token": _token,"selectedDate":a,"leavemode":leavemode},

 dataType: 'JSON',

  

 success: function (data) {

  // console.log(data);



   if(data.status ==200){



    countval = count++;

    var leavecount1 = leavecount++;



   

    var dateval =[];

    $("input[name^='leaveDate']").each(function() {

          dateval.push($(this).val());

});

       if($('#leavemode').val() == '1#12#PL'){

            var leavetype = '<select name="leavetype" data-count="' + leavecount1 + '" class="form-control leavecalcute" required><option value="1.0">Full Day</option> </select> ';

            var leavetime = '<select id="leavetime' + leavecount1 + '" name="leavetime" class="form-control" required disabled><option value="">Select</option><option value="1">First Half</option><option value="2">Second Half</option></select>';

       }else if($('#leavemode').val() == '2#6#CL'){

            var leavetype = '<select name="leavetype" data-count="' + leavecount1 + '" class="form-control leavecalcute" required><option value="0.5">Half Day</option></select> ';

            var leavetime = '<select id="leavetime' + leavecount1 + '" name="leavetime" class="form-control" required><option value="">Select</option><option value="1">First Half</option><option value="2">Second Half</option></select>';

        }else{

                var leavetype = '<select name="leavetype" data-count="' + leavecount1 + '" class="form-control leavecalcute" required><option value="">Select</option><option value="0.5">Half Day</option><option value="1.0">Full Day</option> </select> ';

                var leavetime = '<select id="leavetime' + leavecount1 + '" name="leavetime" class="form-control" required><option value="">Select</option><option value="1">First Half</option><option value="2">Second Half</option></select>';

        }




    

    var action = '<i data-del="' + leavecount1 + '" class="mdi mdi-close text-danger delete-row"></i>';

 



 

  if(leavedata[2] == 'MyL'){

       console.log(dateval.length);

      

      if(dateval.length == 0){

          

          var appendDate = "<tr><td><input type='hidden' id='leave_" + (countval) + "' name='leaveDate'/>" + a + "</td><td>" + leavetype + "</td><td>" + leavetime + "</td><td class='text-center'>" + action + "</td></tr>"

      $("table#appendDate tbody").append(appendDate);

       

          

      }else{

          

          alert('Not Add More My Leave');

          

      }

      

  }else if(leavedata[2] == 'ML'){

      

  if(dateval.length == 0){

          

          var appendDate = "<tr><td><input type='hidden' id='leave_" + (countval) + "' name='leaveDate'/>" + a + "</td><td>" + leavetype + "</td><td>" + leavetime + "</td><td class='text-center'>" + action + "</td></tr>"

      $("table#appendDate tbody").append(appendDate);

       

          

      }else{

          

          alert('Not Add More Maternity Leave');

          

      }

        

  }else{

     console.log(dateval);


      if($.inArray(a, dateval) != -1) {

         console.log("Not is in array");

   alert('Same Date Not Apply leave Again');

  

} else {

     console.log("is in array");

   if(dateval.length == 3){
    alert('You Have Apply Leave More then 4 Leave Approval For Director ');
    $('#Director').removeAttr("disabled");
   }else if(dateval.length > 3){
   	 $('#Director').attr("disabled");

   }

     var appendDate = "<tr><td><input type='hidden' id='leave_" + (countval) + "' name='leaveDate'/>" + a + "</td><td>" + leavetype + "</td><td>" + leavetime + "</td><td class='text-center'>" + action + "</td></tr>"

      $("table#appendDate tbody").append(appendDate);

    

}

}





 



    $('#leave_' + countval).val(a);

  



     

   }else if(data.status ==203){



    $('#details').html(data.details);

    $('#myModal').modal('show');







   }else{



    alert(data.msg);



   }

   

 }

});



    }

   

  });



   function cancelleave(leaveid){



   // alert(type);





var _token = "{{csrf_token()}}";



    $.ajax({

 url: '/cancelleave',

 type: "post",

 data: {"_token": _token,"leaveid":leaveid},

 dataType: 'JSON',

  

 success: function (data) {

   //console.log(data);



   if(data.status == 200){



     swal("Remove job!", data.msg, "success");



            location.reload();



   }else{



     swal("Worng", data.msg, "success");



            location.reload();



   }





}



});

    



  }





  // end get time from calender and append in table





  // delete row of table

  $("table#appendDate tbody").on("click", ".delete-row", function () {

    var del = $(this).data('del');



    if (del > 4) {



      $('#Director').removeAttr('disabled');



    } else {



      $('#Director').attr('disabled', 'disabled');



    }

    $(this).parent().parent().remove();

  });

  // end delete row of table

  



  

  

  leavetype('1#18#PL');

  

  function leavetype(val){

   

      var leavetype = val;


      var _token = "{{csrf_token()}}";



    $.ajax({

 url: "{{URL::to('/leave-type')}}",

 type: "post",

 data: {"_token": _token,"leavetype":leavetype},

 //dataType: 'JSON',

  

 success: function (data) {

   console.log(data);

   

   

   

   if(data < 0){

       

       unsigned_value = Math.abs(data);

       

       $('#Unpaid').val('0');

        $('#leaveinyear').val('0');

       show_month_leave

   }else{

        $('#Unpaid').val('0');

       $('#leaveinyear').val(data);

       if(leavetype=='2#6#CL'){
        var multi = 2;
       }else{

        var multi = 1;

       }

       $('#show_month_leave').val(data*multi);
       

   }

   







}



});

      

  }

  

//   $(document).on('change','#leavemode', function(){

//       var leavetype = this.value;

//       var _token = "{{csrf_token()}}";



//     $.ajax({

//  url: '/leavetype',

//  type: "post",

//  data: {"_token": _token,"leavetype":leavetype},

//  dataType: 'JSON',

  

//  success: function (data) {

//   console.log(data);

//   $('#leaveinyear').val(data);







// }



// });

//   })





//   (document).on('change','#leavemode',function(){

      

//       $('#appendDate tbody').find('tr:last').remove();

      

//   });



        





  // end get time from calender and append in table





  // delete row of table

  $("table#appendDate tbody").on("click", ".delete-row", function () {

    var del = $(this).data('del');



    if (del > 4) {



      $('#Director').removeAttr('disabled');



    } else {



      $('#Director').attr('disabled', 'disabled');



    }

    $(this).parent().parent().remove();

  });

  // end delete row of table





         </script>



         @stop