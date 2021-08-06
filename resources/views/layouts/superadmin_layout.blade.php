
  <?php use App\Http\Controllers\CommonController;

   //$theme = CommonController::fetch_themeData()->theme; 

   $theme = Auth::guard('main_users')->user()->themes;

 
 if($theme=='Light'){
  $themeName = "style.css";
 }else if($theme=='Dark'){
   $themeName = "primary.css";
 }else{
   $themeName = 'primary.css';
 }



  ?>
<script>var siteurl = window.location.origin;
//alert(siteurl);

</script>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
   <title>Admin Dashboard</title>
   <meta content="Admin Dashboard" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta content="kloudrac" name="author">
   <link rel="shortcut icon" href="{{URL::to('assets/images/logo.png')}}">
   <!--Chartist Chart CSS -->
   <!-- <link rel="stylesheet" href="{{URL::to('assets/css/chartist.min.css')}}"> -->
  

    <link rel="stylesheet" href="{{URL::to('assets/css/chartist.min.css')}}">
   <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/multiselect.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/'.$themeName)}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/jquery.steps.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="{{URL::to('assets/css/bootstrap-datepicker.min.css')}}">
   <!-- full calender css -->
   <link href="{{URL::to('/assets/css/fullcalendar.min.css')}}" rel="stylesheet">
  <link href="{{URL::to('/assets/css/editor.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/responsive.bootstrap4.min.css')}}" rel="stylesheet">

   <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://projectdemoonline.com/grcgreentest/assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
 <!--<link rel="stylesheet" href="{{URL::to('assets/css/summernote-bs4.css')}} " type="text/css">-->
   <style type="text/css">
      
   #loadingDiv{
  position:absolute;
  top:0px;
  right:0px;
  width:100%;
  height:100%;
  background-color:#666;
  background-image:url("{{URL::asset('public/uploads/ajax-loader.gif')}}");
  background-repeat:no-repeat;
  background-position:center;
  z-index:10000000;
  opacity: 0.4;
  filter: alpha(opacity=40); /* For IE8 and earlier */
}
   </style>
</head>

<body>

  <div id="wrapper">


   <div id="loadingDiv" style="display: none;"></div>
     <input type="hidden" id="crturl" value="{{ Request::segment(1) }}">
        <input type="hidden" id="crturl2" value="{{ Request::segment(3) }}">
         <input type="hidden" id="base_url" value="{{ URL::to('/') }}">
          <input type="hidden" id="querystring" value="{{$_GET['profile']??''}}">



            <?php 
                              

                             if(Auth::guard('main_users')->check()){

                             $id =  Auth::guard('main_users')->user()->id;
                              $name =  Auth::guard('main_users')->user()->userfullname;
                               $role =  Auth::guard('main_users')->user()->emprole;
                               
                               $getrole = DB::table('main_roles')->where('id', $role)->first();
                               
                                $profileimg =  Auth::guard('main_users')->user()->profileimg;
                             
                             }else{

                              $id = '';
                               $profileimg = URL::to('public/assets/images/profile.png');

                             }

                           
                    
                        ?>


@include('common.superadmin_header')
   @include('common.superadmin_leftsidebar')


   
   @yield('extra_css') 
    <div class="content-page">
  @yield('content') 
     @include('common.superadmin_footer')
     </div>
     <?php

     $userid = Auth::guard('main_users')->user()->id;
     
      
    $appointments= DB::table('grc_employeeleaves')->where('user_id',$userid)->where(function($query)
                {
                    $query->where('manager', '=',0)
                    ->Where('admin', '=',0)
                    ->Where('hr', '=',0);

                })->where(function($query)
                {
                    $query->orWhere('director', '=',0);
                    
                })->where('status',1)->get();


     
     ?>


     
  


      </div>
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
   </div>
   
   

  <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!-- full calender -->
   <script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
   <script src="{{ asset('assets/js/moment.js')}}"></script>
    <script src="{{ asset('assets/js/fullcalendar.min.js')}}"></script>
   <script src="{{ asset('assets/js/calendar-init.js')}}"></script>
   <!--end full calender -->
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ asset('assets/js/metisMenu.min.js')}}"></script>
   <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
   <script src="{{ asset('assets/js/waves.min.js')}}"></script>

   <!--Chartist Chart-->
   <script src="{{ asset('assets/js/chartist.min.js')}}"></script>
   <script src="{{ asset('assets/js/chartist-plugin-tooltip.min.js')}}"></script>

   <script src="{{ asset('assets/js/chart.min.js')}}"></script>
   <script src="{{ asset('assets/pages/chartjs.init.js')}}"></script>
   <!-- peity JS -->
   <script src="{{ asset('assets/js/jquery.peity.min.js')}}"></script>
   <script src="{{ asset('assets/js/dashboard.js')}}"></script>
   <!-- App js -->
   <script src="{{ asset('assets/js/app.js')}}"></script>
   <script src="{{ asset('assets/js/jquery-knob/excanvas.js')}}"></script>
   <script src="{{ asset('assets/js/jquery-knob/jquery.knob.js')}}"></script>
   <script src="{{ asset('assets/js/jquery.steps.min.js')}}"></script>
   <script src="{{ asset('assets/js/bootstrap-datepicker.js')}}"></script>
   <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.min.js')}}"></script>
   <script src="{{ asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
   <script src="{{ asset('assets/js/form-advanced.js')}}"></script>
   <script src="{{ asset('assets/js/select2.min.js')}}"></script>
   <script src="{{ asset('assets/js/custom.js')}}"></script>
   <script src="{{ asset('assets/js/multiselect.min.js')}}"></script>
   <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
   <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
   <script src="{{ asset('assets/js/datatables.init.js')}}"></script>
   <script src="{{ asset('assets/js/dataTables.responsive.min.js')}}"></script>
<!--<script src="{{ asset('assets/js/summernote-bs4.min.js')}}"></script>-->
<!--<script src="{{ asset('assets/js/form-editors.int.js')}}"></script>-->
<script src="{{ asset('assets/js/editor.js')}}"></script>

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

  

@yield('extra_js') 

   <script>//console.log(my_ajax_object);
   function preventNonNumericalInput(e) {
      e = e || window.event;
       if (e.which == 8 || e.which >= 48 &&  e.which <= 57 ) {
       }else{
         e.preventDefault();
       }
   }
   //// Code For Order Now Page End</script>
   
   
     
<script type="text/javascript">
   
   
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      events : [
                @foreach($appointments as $appointment)
                {
                    title : '{{ $appointment->leaveTitle}}',
                    start : '{{ $appointment->leaveDate }}',
                    @if ($appointment->finish_time)
                            end: '{{ $appointment->finish_time }}',
                    @endif
                    
                     @if ($appointment->leaveColor)
                            backgroundColor:'{{ $appointment->leaveColor }}',
                    @endif
                   
                   
                },
                @endforeach
            ],
    });
</script>


   <script type="text/javascript">

 

function checkurl(textval) {
    var urlregex = /^(https?|ftp):\/\/([a-zA-Z0-9.-]+(:[a-zA-Z0-9.&%$-]+)*@)*((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|([a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+\.(com|in|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(:[0-9]+)*(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
    return urlregex.test(textval);
}


var user_id = '{{$userid}}';

  
setInterval(function(){ getnotification(user_id); }, 100000);


function getnotification(userid){
    
    var _token = "{{csrf_token()}}";
    
      $.ajax({
        url: '/shownotification',
        type: "post",
        data: {"_token": _token,"current_user_id":userid},
        dataType: 'JSON',
         
        success: function (data) {
           // console.log(data.notifiction); // this is good
            $('.totalnotidata').html(data.totalcount);
            $('.shownotification').html(data.notifiction);
        

          }
          
        
      });
    
    
}

        function validate(email) {

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            //var address = document.getElementById[email].value;
            if (reg.test(email) == false) 
            {
               
                return (false);
            }else{

                 return (true);

            }
 }


function uploadeditimg(edittrainingid){
    


    formData = new FormData();
    var files = $('#editfile')[0].files[0];
formData.append('editfile', files);
formData.append('trainingeditid', edittrainingid);


//   error =1;


//       if(error ==1){

          $('#loadingDiv').show();

      var token = "{{csrf_token()}}"; 
    
   
      $.ajax({
      url: '/updatefiletraining',
      headers: {'X-CSRF-TOKEN': token},                          
      type: "POST",
      cache: false,
      dataType:'json',
      processData: false,
      contentType: false,
      data:formData,
      success:function(data){
          
          console.log(data);
          
         // return false
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
      error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
    });
    
    
}


function today(date_val){
    
    var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = yyyy + '-' + mm + '-' + dd;

                  var d1 = Date.parse(today);
                  var d2 = Date.parse(date_val);
                  if (d1 < d2) {
                      
                      return false;
                  }else{
                      return true;
                      
                  }
}

 function uploadprofile(){

  var userid = $('#crturl2').val();
  var profile = $('#profile').val();

     if(profile ==''){
         $('#profile_error').text('Profile Pic is Required').attr('style','color:red');
         $('#profile_error').show();
           error = 0;
              return false;
      }else{$('#profile_error').hide();   $("#uploadImg").removeAttr("disabled");  error = 1;}

  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(profile)){
        $('#profile_error').text('Valid Image').attr('style','color:red');
         $('#profile_error').show();
           error = 0;
        fileInput.value = '';
        return false;
    }


  



   formData  =  new FormData();
  var files = $('#profile')[0].files[0];
formData.append('profile', files);
formData.append('userid', userid);

   error =1;


      if(error ==1){

          $('#loadingDiv').show();

      var token = "{{csrf_token()}}"; 
    

   
      $.ajax({
      url: '/updateprofile',
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
       error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
    });

      }


 }

 
function checkspecial(string){

 //var pwd = "asdfds1234";
var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

if(!string.match(Exp))
  return false;
else
    return true;

}





   $(document).on('click','#changepassord',function(event){
            event.preventDefault();
             var userid = $('#crturl2').val();
              var cpassword = $('#cpassword').val();
                var newpsd = $('#newpsd').val();
                  var cnfpsd = $('#cnfpsd').val();
                    var themes = $('#themes').val();

        if(cpassword ==''){
         $('#cpassword_error').text('Password is Required').attr('style','color:red');
         $('#cpassword_error').show();
           error = 0;
              return false;
      }else{$('#coursetype_error').hide();  error = 1;}


        if(newpsd ==''){
         $('#newpsd_error').text('New Password is Required').attr('style','color:red');
         $('#newpsd_error').show();
           error = 0;
              return false;

       
      }else{$('#newpsd_error').hide();  error = 1;}


         if(cnfpsd ==''){
         $('#cnfpsd_error').text('Confirm Password is Required').attr('style','color:red');
         $('#cnfpsd_error').show();
           error = 0;
              return false;

            }else if(newpsd != cnfpsd){
          $('#cnfpsd_error').text('Password does not match').attr('style','color:red');
         $('#cnfpsd_error').show();
           error = 0;
              return false;
      }else{$('#cnfpsd_error').hide();  error = 1;}

                      if(error ==1){

  

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/changepassord',
        type: "post",
        data: {"_token": _token,"userid":userid,"cpassword":cpassword,"newpsd":newpsd},
        dataType: 'JSON',
         
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


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }



});


 function editexp(id,comname,website,designation,fromdate,todate,){

   $('#expid').val(id);
    $('#commpanyname').val(comname);
     $('#website').val(website);
      $('#fromdate').val(fromdate);
       $('#todate').val(todate);
        $('#Designation').val(designation);
        $('#SaveExp').text('Edit');
 }

 //$("form#training").submit(function(event){

   
 

      $(document).on('change','#themesdate',function(event){
            event.preventDefault();
          
             var userid = $('#crturl2').val();
             var themes = this.value;

  

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/changethemes',
        type: "post",
        data: {"_token": _token,"userid":userid,"themes":themes},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", "Change Successfully", "success");

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
            
             swal("Good job!", "Not change", "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      


          });


   

       $(document).on('click','#saveAssest',function(event){
            event.preventDefault();
              error = 1;
             var userid = $('#crturl2').val();
              var assestname = $('#assestname').val();
               var serialno = $('#serialno').val();
                var descdata = $('#descdata').val();
                 var edit_asset = $('#edit_asset').val();

          if(assestname ==''){
         $('#assestname_error').text('Assest Name No is Required').attr('style','color:red');
         $('#assestname_error').show();
           error = 0;
              return false;
      }else{$('#assestname_error').hide();  error = 1;}


          if(serialno ==''){
         $('#serialno_error').text('Serial no Name No is Required').attr('style','color:red');
         $('#serialno_error').show();
           error = 0;
              return false;
      }else{$('#serialno_error').hide();  error = 1;}


      //     if(descdata ==''){
      //    $('#descdata_error').text('Desc No is Required').attr('style','color:red');
      //    $('#descdata_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#descdata_error').hide();  error = 1;}


                 if(error ==1){

  

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/insertassest',
        type: "post",
        data: {"_token": _token,"userid":userid,"assestname":assestname,"serialno":serialno,"descdata":descdata,"edit_asset":edit_asset},
        dataType: 'JSON',
         
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
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }

             

                
          });

   

    $(document).on('click','#saveVisa',function(event){
            event.preventDefault();

            $("#saveVisa").attr( "disabled", "disabled" );

            error = 1;

             var userid = $('#crturl2').val();
              var passportno = $('#passportno').val();
               var passportissue = $('#passportissue').val();
                var passportexpair = $('#passportexpair').val();
                 var visatype = $('#visatype').val();
                  var visano = $('#visano').val();
                   var edit_visa = $('#edit_visa').val();

                   var d1 = Date.parse(passportissue);
              var d2 = Date.parse(passportexpair);
              if (d1 > d2) {
                  alert ("Please choose Correct Date!");
                      return false;
              }else{

                  error = 1;
                

              }

               var d1 = Date.parse(passportissue);
              var d2 = Date.parse(passportexpair);
              if (d1 > d2) {
                  alert ("Please choose Correct Date!");
                      return false;
              }else{

                  error = 1;
                

              }

                 var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = yyyy + '-' + mm + '-' + dd;

                  var d1 = Date.parse(today);
                  var d2 = Date.parse(passportissue);
                  if (d1 < d2) {
                      alert ("Please Select Valid Date");
                      return false;
                  }
                   
           


                      if(passportno ==''){
         $('#passportno_error').text('Passport No is Required').attr('style','color:red');
         $('#passportno_error').show();
           error = 0;
              return false;
      }else{$('#passportno_error').hide();  error = 1;}

          if(passportissue ==''){
         $('#passportissue_error').text('Passport Issue is Required').attr('style','color:red');
         $('#passportissue_error').show();
           error = 0;
              return false;
      }else{$('#passportissue_error').hide();  error = 1;}

          if(passportexpair ==''){
         $('#passportexpair_error').text('passport Expaired is Required').attr('style','color:red');
         $('#passportexpair_error').show();
           error = 0;
              return false;
      }else{$('#passportexpair_error').hide();  error = 1;}


      //     if(visatype ==''){
      //    $('#visatype_error').text('Visa Type is Required').attr('style','color:red');
      //    $('#visatype_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#visatype_error').hide();  error = 1;}


      //     if(visano ==''){
      //    $('#visano_error').text('Visa is Required').attr('style','color:red');
      //    $('#visano_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#visano_error').hide();  error = 1;}

                 if(error ==1){

  

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/insertvisa',
        type: "post",
        data: {"_token": _token,"userid":userid,"passportno":passportno,"passportissue":passportissue,"passportexpair":passportexpair,"visatype":visatype,"visano":visano,"edit_visa":edit_visa},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good

          $("#saveVisa").removeAttr( "disabled", "disabled" );
    
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
        error: function(xhr, status, error) {

            $("#saveVisa").removeAttr( "disabled", "disabled" );
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }

                


          });


    
          

          
           $("form#myleave").submit(function(e) {

 
            e.preventDefault();
            
           
           $("#apply_leave").attr( "disabled", "disabled" );
             var leaveDate = new Array();
          $("input[name^='leaveDate']").each(function() {
              leaveDate.push($(this).val());
          });


            var leavetype = new Array();
          $("select[name^='leavetype']").each(function() {
              leavetype.push($(this).val());
          });

            var leavetime = new Array();
          $("select[name^='leavetime']").each(function() {
              leavetime.push($(this).val());
          });

      

          if(leaveDate.length === 0){

            alert('Please Select Date');
            return false;

          }


         

   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: "{{URL::to('/addappyleave')}}",
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize()+'&leaveDate='+JSON.stringify(leaveDate)+'&leavetype='+JSON.stringify(leavetype)+'&leavetime='+JSON.stringify(leavetime),

           beforeSend: function() {    
       
        $('#loadingDiv').show();
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
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });

       
           });
          


          
          
         


        $("form#edittrainingpage").submit(function(e) {

 
            e.preventDefault();



   var token = "{{csrf_token()}}"; 


  $.ajax({
        url: '/inserttraning',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        
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
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });

            

          });

    $("form#editeducation").submit(function(e) {

    

     //  $(document).on('click','#saveEductionEdit',function(event){
            event.preventDefault();
              error = 1
             var userid = $('#crturl2').val();
              var education = $('#educationDate1').val();
               var Institution = $('#Institution1').val();
                var fromdate = $('#fromdate1').val();
                 var todate = $('#todate1').val();
                  var course = $('#coursedate1').val();
                   var eduid = $('#eduid').val();
                   
                    var d1 = Date.parse(fromdate);
                  var d2 = Date.parse(todate);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      var error = 0;
                      return false;
                  }
                   
                   ;

            //   console.log();
            //     return false;

                   var form = $(this);
                  // console.log($('#editeducation').serialize());


              
      //     if(education ==''){
      //    $('#education1_error').text('Education is Required').attr('style','color:red');
      //    $('#education1_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#education1_error').hide();  error = 1;}

      //     if(Institution ==''){
      //    $('#Institution1_error').text('Institution is Required').attr('style','color:red');
      //    $('#Institution1_error').show();
      //      error = 0;
      //         return false;
        

      // }else{$('#Institution1_error').hide();  error = 1;}

      //   if(fromdate ==''){
      //    $('#fromdate1_error').text('Form Date is Required').attr('style','color:red');
      //    $('#fromdate1_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#fromdate1_error').hide();  error = 1;}

      //   if(todate ==''){
      //    $('#todate1_error').text('To Date is Required').attr('style','color:red');
      //    $('#todate1_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#todate1_error').hide();  error = 1;}

      //   if(course ==''){
      //    $('#course1_error').text('Course is Required').attr('style','color:red');
      //    $('#course1_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#course1_error').hide();  error = 1;}


           if(error ==1){

  

   var token = "{{csrf_token()}}";

  $.ajax({
        url: '/insertedu',
        headers: {'X-CSRF-TOKEN': token}, 
        type: "post",
        data:$(this).serialize(),
        
         
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
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }


          });




    $(document).on('click','#SaveExp',function(event){
            event.preventDefault();

            $("#SaveExp").attr( "disabled", "disabled" );
              error = 1
             var userid = $('#crturl2').val();
              var commpanyname = $('#commpanyname').val();
               var website = $('#website').val();
                var fromdate = $('#fromdate').val();
                 var todate = $('#todate').val();
                  var Designation = $('#Designation').val();
                   var expid = $('#expid').val();

                   

                   var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = yyyy + '-' + mm + '-' + dd;

                  var d1 = Date.parse(fromdate);
                  var d2 = Date.parse(todate);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      return false;
                  }

                  //  var d111 = Date.parse(today);
                  // var d222 = Date.parse(todate);
                  // if (d111 < d222) {
                  //     alert ("Please Select Valid Date");
                  //      return false;
                  // }
        if(website !=''){
        if(checkurl(website) == false){

          $('#website_error').text('Valid is Required').attr('style','color:red');
         $('#website_error').show();
         error = 0;
         return false;


      }else{$('#website_error').hide();  error = 1;}
    }

             
                  

      //     if(commpanyname ==''){
      //    $('#commpanyname_error').text('Company is Required').attr('style','color:red');
      //    $('#commpanyname_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#commpanyname_error').hide();  error = 1;}

      //     if(website ==''){
      //    $('#website_error').text('Company is Required').attr('style','color:red');
      //    $('#website_error').show();
      //      error = 0;
      //         return false;
      //   }else if(checkurl(website) == false){

      //     $('#website_error').text('Valid is Required').attr('style','color:red');
      //    $('#website_error').show();
      //    error = 0;
      //    return false;


      // }else{$('#website_error').hide();  error = 1;}

      //   if(fromdate ==''){
      //    $('#fromdate_error').text('Form Date is Required').attr('style','color:red');
      //    $('#fromdate_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#fromdate_error').hide();  error = 1;}

      //   if(todate ==''){
      //    $('#todate_error').text('To Date is Required').attr('style','color:red');
      //    $('#todate_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#todate_error').hide();  error = 1;}

      //   if(Designation ==''){
      //    $('#Designation_error').text('Designation is Required').attr('style','color:red');
      //    $('#Designation_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#Designation_error').hide();  error = 1;}


           if(error ==1){

  

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/insertexp',
        type: "post",
        data: {"_token": _token,"commpanyname":commpanyname,"website":website,"fromdate":fromdate,"todate":todate,"Designation":Designation,"userid":userid,'expid':expid},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good

         $("#SaveExp").removeAttr( "disabled", "disabled" );
    
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
            
             swal("Sorry!", data.msg, "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }


          });

   $(document).on('click','#SaveContact',function(event){
            event.preventDefault();



            error = 1
           var userid = $('#crturl2').val();
          var email = $('#emaildata').val();
           var country = $('#country').val();
            var state = $('#state').val();
             var city = $('#city').val();
              var p_Street = $('#p_Street').val();
               var p_postalcode = $('#p_postalcode').val();


            var c_Country = $('#c_Country').val();
            var c_state = $('#c_state').val();
             var c_city = $('#c_city').val();
              var c_Street = $('#c_Street').val();
               var c_postalcode = $('#c_postalcode').val();

               var name = $('#name').val();

               var contact_email = $('#contact_email').val();

               var contactno = $('#contactno').val();

               var offadd = $('#offadd').val();


            

          if(email ==''){
         $('#emaildata_error').text('Email is Required').attr('style','color:red');
         $('#emaildata_error').show();
           error = 0;
              return false;

      }else if(validate(email) == false){
         $('#emaildata_error').text('Enter valid Email').attr('style','color:red');
         $('#emaildata_error').show();
           error = 0;
              return false;

      }else{$('#emaildata_error').hide();  error = 1;}

        if(name ==''){
         $('#name_error').text('Name is Required').attr('style','color:red');
         $('#name_error').show();
           error = 0;
              return false;
      }else{$('#name_error').hide();  error = 1;}


          if(contact_email ==''){
         $('#contact_email_error').text('Email is Required').attr('style','color:red');
         $('#contact_email_error').show();
           error = 0;
              return false;

      }else if(validate(contact_email) == false){
         $('#contact_email_error').text('Enter valid Email').attr('style','color:red');
         $('#contact_email_error').show();
           error = 0;
              return false;

      }else{$('#contact_email_error').hide();  error = 1;}


          if(contactno ==''){
         $('#contactno_error').text('Cobtact no is Required').attr('style','color:red');
         $('#contactno_error').show();
           error = 0;
              return false;
      }else{$('#contactno_error').hide();  error = 1;}

           if(offadd ==''){
         $('#offadd_error').text('Address is Required').attr('style','color:red');
         $('#offadd_error').show();
           error = 0;
              return false;
      }else{$('#offadd_error').hide();  error = 1;}

      //   if(p_Street ==''){
      //    $('#p_Street_error').text('Street is Required').attr('style','color:red');
      //    $('#p_Street_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#p_Street_error').hide();  error = 1;}

      //  if(p_postalcode ==''){
      //    $('#p_postalcode_error').text('Street is Required').attr('style','color:red');
      //    $('#p_postalcode_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#p_postalcode_error').hide();  error = 1;}


      if(error ==1){


   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/insertcontact',
        type: "post",
        data: {"_token": _token,"email":email,"country":country,"state":state,"city":city,"p_Street":p_Street,"p_postalcode":p_postalcode,"userid":userid,"c_Country":c_Country,"c_state":c_state,"c_city":c_city,"c_Street":c_Street,"c_postalcode":c_postalcode,"name":name,"contact_email":contact_email,"contactno":contactno,"offadd":offadd},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.city); // this is good
    
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             $("#salary")[0].reset();
             swal("Good job!", "Added Successfully", "success");

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
      }



            });

   

   $('#dprt').on('change', function() {

  var departid = this.value;

   var _token = "{{csrf_token()}}";

     $.ajax({
        url: '/getreportingmanager',
        type: "post",
        data: {"_token": _token,"departid":departid},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.state); // this is good
      //$('#loadingDiv').hide();
        $('#reptmng').html(data.manager);

          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });



});

$('#country').on('change', function() {
  var countryid = this.value;

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/getstate',
        type: "post",
        data: {"_token": _token,"countryid":countryid},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.state); // this is good
      //$('#loadingDiv').hide();
        $('#state').html(data.state);

          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
});

$('#educationDate').on('change', function() {

  var eduid = this.value;
 

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/getcourse',
        type: "post",
        data: {"_token": _token,"eduid":eduid},
        dataType: 'JSON',
         
        success: function (data) {
        //console.log(data.state); // this is good
      //$('#loadingDiv').hide();
        $('#coursedate').html(data.course);

          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
});




function editasset(id,name,number,desc){

    $('#edit_asset').val(id);
    $('#assestname').val(name);
    $('#serialno').val(number);
      $('#descdata').val(desc);
      $('#saveAssest').text('Edit');

      


}

function editvisha(id,passpostno,issue,expaire,visatype,vishano){

    $('#edit_visa').val(id);
    $('#passportno').val(passpostno);
    $('#passportissue').val(issue);
      $('#passportexpair').val(expaire);
      $('#visatype').val(visatype);
      $('#visano').val(vishano);
      $('#saveVisa').text('Edit');

      


}







// $('#country').on('change', function() {
//   var countryid = this.value;

//    var _token = "{{csrf_token()}}";

//   $.ajax({
//         url: '/getstate',
//         type: "post",
//         data: {"_token": _token,"countryid":countryid},
//         dataType: 'JSON',
         
//         success: function (data) {
//         //console.log(data.state); // this is good
//       //$('#loadingDiv').hide();
//         $('#state').html(data.state);

          
//         }
//       });
// });

function delexp(userid) {

  swal({
      title: "Confirm?",
      text: "Are you sure Delete?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Confirm",
      cancelButtonText: "Back"
      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {
           var _token = "{{csrf_token()}}";

       $.ajax({
        url: '/delexp',
        type: "post",
        data: {"_token": _token,"userid":userid},
        dataType: 'JSON',
         
        success: function (data) {
          console.log(data);

          if(data.status ==200){

            location.reload();
          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
        }
      },
      function() {
         console.log('BACK');
      }
    );

 

}

function delassest(userid) {




swal({
      title: "Confirm?",
      text: "Are you sure To Delete?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Confirm",
      cancelButtonText: "Back"
      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {
        var _token = "{{csrf_token()}}";

       $.ajax({
        url: '/delassest',
        type: "post",
        data: {"_token": _token,"userid":userid},
        dataType: 'JSON',
         
        success: function (data) {
          console.log(data);

          if(data.status ==200){

            location.reload();
          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });

        }
      },
      function() {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    );



}



function delvisa(id) {

    swal({
      title: "Confirm?",
      text: "Are you sure Delete?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Confirm",
      cancelButtonText: "Back"
      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {
             var _token = "{{csrf_token()}}";

       $.ajax({
        url: '/delvisa',
        type: "post",
        data: {"_token": _token,"id":id},
        dataType: 'JSON',
         
        success: function (data) {
          console.log(data);

          if(data.status ==200){

            location.reload();
          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
        }
      },
      function() {
         console.log('BACK');
      }
    );



}




function deltraining(id) {

    swal({
      title: "Confirm?",
      text: "Are you sure Delete?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Confirm",
      cancelButtonText: "Back"
      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {
             var _token = "{{csrf_token()}}";

       $.ajax({
        url: '/deltraining',
        type: "post",
        data: {"_token": _token,"id":id},
        dataType: 'JSON',
         
        success: function (data) {
          console.log(data);

          if(data.status ==200){

            location.reload();
          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
        }
      },
      function() {
         console.log('BACK');
      }
    );



}




function deledu(userid) {

    swal({
      title: "Confirm?",
      text: "Are you sure Delete?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Confirm",
      cancelButtonText: "Back"
      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {
          var _token = "{{csrf_token()}}";

       $.ajax({
        url: '/delete_education',
        type: "post",
        data: {"_token": _token,"userid":userid},
        dataType: 'JSON',
         
        success: function (data) {
          console.log(data);

          if(data.status ==200){

            location.reload();
          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
        }
      },
      function() {
         console.log('BACK');
      }
    );

  

}






$('#state').on('change', function() {
  var stateid = this.value;

   var _token = "{{csrf_token()}}";

  $.ajax({
        url: '/getcity',
        type: "post",
        data: {"_token": _token,"stateid":stateid},
        dataType: 'JSON',
         
        success: function (data) {
        console.log(data.city); // this is good
      //$('#loadingDiv').hide();
        $('#city').html(data.city);

          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
});
 


    $(document).on('click','#addPersonalInfo',function(event){
            event.preventDefault();

            error = 1;

               var gender = $('#gender').val();
                  var maritalstaus = $('#maritalstaus').val();
                     var nationalty = $('#nationalty').val();
                        var ethnic = $('#ethnic').val();
                           var racecode = $('#racecode').val();
                              var dob = $('#dob').val();
                              var bloodgroup = $('#bloodgroup').val();
                              var userid = $('#crturl2').val();

                                var today = new Date();
                 var dd = String(today.getDate()).padStart(2, '0');
                 var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                 var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;
                var today = Date.parse(today);
                 var dob1 = Date.parse(dob);

                 if(dob1 > today){
                  alert('please Choose Valid Date');
                  return false;
                 }
                               
      //    if(gender ==''){
      //    $('#gender_error').text('Gender is Required').attr('style','color:red');
      //    $('#gender_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#gender_error').hide();  error = 1;}

      //     if(maritalstaus ==''){
      //    $('#maritalstaus_error').text('Marial status is Required').attr('style','color:red');
      //    $('#maritalstaus_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#maritalstaus_error').hide();  error = 1;}  

      //     if(colortype ==''){
      //    $('#colortype_error').text('Gender is Required').attr('style','color:red');
      //    $('#colortype_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#colortype_error').hide();  error = 1;}  

      //     if(ethnic ==''){
      //    $('#ethnic_error').text('Ethnic Code is Required').attr('style','color:red');
      //    $('#ethnic_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#ethnic_error').hide();  error = 1;}  

      //     if(racecode ==''){
      //    $('#racecode_error').text('Race Code is Required').attr('style','color:red');
      //    $('#racecode_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#racecode_error').hide();  error = 1;}                         


      //     if(dob ==''){
      //    $('#dob_error').text('DOB is Required').attr('style','color:red');
      //    $('#dob_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#dob_error').hide();  error = 1;}  

      //     if(bloodgroup ==''){
      //    $('#bloodgroup_error').text('Blood Group is Required').attr('style','color:red');
      //    $('#bloodgroup_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#bloodgroup_error').hide();  error = 1;}  


          var _token = "{{csrf_token()}}";

      if(error ==1){

        $.ajax({
        url: '/insetpersanalinfo',
        type: "post",
        data: {"_token": _token,"userid":userid,"gender":gender,"maritalstaus":maritalstaus,"nationalty":nationalty,"ethnic":ethnic,"racecode":racecode,"dob":dob,"bloodgroup":bloodgroup},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          console.log(data); // this is good

          if(data.status ==200){
             $('#loadingDiv').hide();
         
             $("#salary")[0].reset();
             swal("Good job!", "Added Successfully", "success");
             location.reload();

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");
             location.reload();


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", data.msg, "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });


     }


          });


    $(document).on('click','#saveSalary',function(event){
            event.preventDefault();
            
             var userid = $('#crturl2').val();
            var currncy = $('#currncy').val();
              var pay = $('#pay').val();
                var salaryamt = $('#salaryamt').val();
                  var bankname = $('#bankname').val();
                    var actname = $('#actname').val();
                      var acclassType = $('#acclassType').val();
                        var acctype = $('#acctype').val();
                          var accno = $('#accno').val();
                            var procommison = $('#procommison').val();

          if(currncy ==''){
         $('#currncy_error').text('Currency is Required').attr('style','color:red');
         $('#currncy_error').show();
           error = 0;
           return false;

      }else{$('#currncy_error').hide();  error = 1;}
        if(pay ==''){
         $('#pay_error').text('Pay Frequency is Required').attr('style','color:red');
         $('#pay_error').show();
           error = 0;
           return false;

      }else{$('#pay_error').hide();  error = 1;}
      if(salaryamt ==''){
         $('#salaryamt_error').text('Salary is Required').attr('style','color:red');
         $('#salaryamt_error').show();
           error = 0;
           return false;

      }else{$('#salaryamt_error').hide();  error = 1;}

      //  if(bankname ==''){
      //    $('#bankname_error').text('Bank is Required').attr('style','color:red');
      //    $('#bankname_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#bankname_error').hide();  error = 1;}

      //  if(actname ==''){
      //    $('#actname_error').text('Acoount is Required').attr('style','color:red');
      //    $('#actname_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#actname_error').hide();  error = 1;}

      //   if(acclassType ==''){
      //    $('#acclassType_error').text('Acoount Type is Required').attr('style','color:red');
      //    $('#acclassType_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#acclassType_error').hide();  error = 1;}

      //  if(acctype ==''){
      //    $('#acctype_error').text('Acoount Type is Required').attr('style','color:red');
      //    $('#acctype_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#acctype_error').hide();  error = 1;}
      //  if(accno ==''){
      //    $('#accno_error').text('Acoount No is Required').attr('style','color:red');
      //    $('#accno_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#accno_error').hide();  error = 1;}

      //  if(procommison ==''){
      //    $('#procommison_error').text('Commission is Required').attr('style','color:red');
      //    $('#procommison_error').show();
      //      error = 0;
      //      return false;

      // }else{$('#procommison_error').hide();  error = 1;}

          var _token = "{{csrf_token()}}";

      if(error ==1){

        $.ajax({
        url: '/insetsalary',
        type: "post",
        data: {"_token": _token,"currncy":currncy,"pay":pay,"salaryamt":salaryamt,"bankname":bankname,"actname":actname,"acclassType":acclassType,"acctype":acctype,"accno":accno,"procommison":procommison,"userid":userid},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          console.log(data); // this is good

          if(data.status ==200){
             $('#loadingDiv').hide();
         
             $("#salary")[0].reset();
             swal("Good job!", "Added Successfully", "success");

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", "User alert Exist", "success");

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!", "Successfully Updated", "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });


     }



   });


   $(document).on('click','.addemp',function(event){
            event.preventDefault();

    

      var error = 1;
      userid = $('#userid').val();

      var empcode = $('#empcode').val();
       var empid = $('#empid').val();
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var email = $('#emaildata').val();
      var mpcst = $('#mpcst').val();
      var modeemp = $('#modeemp').val();
      var role = $('#role').val();
        var prefix = $('#prefix').val();
      
        var crdno = $('#crdno').val();
          var bsnit = $('#bsnit').val();
         var dprt = $('#dprt').val();
         var reptmng = $('#reptmng').val();
          var jobtitle = $('#jobtitle').val();
         var positions = $('#positions').val();
          var empstatus = $('#empstatus').val();
           var doj = $('#doj').val();
           var dol = $('#dol').val();
           var yoe = $('#yoe').val();
           var workphn = $('#workphn').val();
           var extno = $('#extno').val();
           var emp_category = $('#emp_category').val();
           var emp_type = $('#emp_type').val();

           var sarvor_id = $('#sarvor_id').val();
             if(dol !=''){

               var d1 = Date.parse(doj);
                var d2 = Date.parse(dol);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      return false;
                  }

             }
            

                  var today = new Date();
                 var dd = String(today.getDate()).padStart(2, '0');
                 var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                 var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;
                var today = Date.parse(today);

                if(today > d1){

                   alert ("Please Select Valid Date");
                      return false;

                }



 
    
      if(empcode ==''){
         $('#empode_error').text('Employee code is Required').attr('style','color:red');
         $('#empode_error').show();
           error = 0;
           return false;
      // }else if(empcode.length > 6){

      //     $('#empode_error').text('6 digit emp code is Required').attr('style','color:red');
      //    $('#empode_error').show();
      //      error = 0;
      //      return false;

      }else{$('#empode_error').hide();  error = 1;}
       if(empid ==''){
         $('#empid_error').text('User ID is Required').attr('style','color:red');
         $('#empid_error').show();
           error = 0;
              return false;

      }else{$('#empid_error').hide();  error = 1;}


         if(sarvor_id ==''){
         $('#sarvor_id_error').text('Savior Card No is Required').attr('style','color:red');
         $('#sarvor_id_error').show();
           error = 0;
               return false;
      }else{$('#sarvor_id_error').hide();  error = 1;}
      
      //   if(prefix ==''){
      //    $('#prefix_error').text('Prefix is Required').attr('style','color:red');
      //    $('#prefix_error').show();
      //      error = 0;
      //          return false;
      // }else{$('#prefix_error').hide();  error = 1;}
      
       if($.trim(fname) ==''){
         $('#fname_error').text('First Name is Required').attr('style','color:red');
         $('#fname_error').show();
           error = 0;
               return false;
      }else{$('#fname_error').hide();  error = 1;}
       if($.trim(lname) ==''){
         $('#lname_error').text('Last Name is Required').attr('style','color:red');
         $('#lname_error').show();
           error = 0;
              return false;
      }else{$('#lname_error').hide();  error = 1;}
      //  if(email ==''){
      //    $('#email_error').text('Email is Required').attr('style','color:red');
      //    $('#email_error').show();
      //      error = 0;
      //         return false;

      // }else if(validate(email) == false){
      //    $('#email_error').text('Enter valid Email').attr('style','color:red');
      //    $('#email_error').show();
      //      error = 0;
      //         return false;

      // }else{$('#email_error').hide();  error = 1;}

      //  if(mpcst ==''){
      //    $('#mpcst_error').text('Medical Policy Customer is Required').attr('style','color:red');
      //    $('#mpcst_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#mpcst_error').hide();  error = 1;}

      //   if(modeemp ==''){
      //    $('#modeemp_error').text('Mode of Employement is Required').attr('style','color:red');
      //    $('#modeemp_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#modeemp_error').hide();  error = 1;}

        if(role ==''){
         $('#role_error').text('Role is Required').attr('style','color:red');
         $('#role_error').show();
           error = 0;
              return false;
      }else{$('#role_error').hide();  error = 1;}

      //  if(crdno ==''){
      //    $('#crdno_error').text('Card No Required').attr('style','color:red');
      //    $('#crdno_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#crdno_error').hide();  error = 1;}

    //   if(role !=6){

    //    if(bsnit ==''){
    //      $('#bsnit_error').text('Business Unit is Required').attr('style','color:red');
    //      $('#bsnit_error').show();
    //        error = 0;
    //           return false;
    //   }else{$('#bsnit_error').hide();  error = 1;}
    // }else{

    //   $('#bsnit_error').hide();  error = 1;

    // }

      //  if(dprt ==''){
      //    $('#dprt_error').text('Department is Required').attr('style','color:red');
      //    $('#dprt_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#dprt_error').hide();  error = 1;}


       if(reptmng ==''){
         $('#reptmng_error').text('Reporting Manager is Required').attr('style','color:red');
         $('#reptmng_error').show();
           error = 0;
              return false;
      }else{$('#reptmng_error').hide();  error = 1;}

      //  if(jobtitle ==''){
      //    $('#jobtitle_error').text('Job Title is Required').attr('style','color:red');
      //    $('#jobtitle_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#jobtitle_error').hide();  error = 1;}

    //   if(role !=6){

    //    if(positions ==''){
    //      $('#positions_error').text('Positions is Required').attr('style','color:red');
    //      $('#positions_error').show();
    //        error = 0;
    //           return false;
    //   }else{$('#positions_error').hide();  error = 1;}

    // }else{

    //   $('#positions_error').hide();  error = 1;

    // }

      //  if(empstatus ==''){
      //    $('#empstatus_error').text('Employee Status is Required').attr('style','color:red');
      //    $('#empstatus_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#empstatus_error').hide();  error = 1;}

       if(doj ==''){
         $('#doj_error').text('Date of Joining is Required').attr('style','color:red');
         $('#doj_error').show();
           error = 0;
              return false;
      }else{$('#doj_error').hide();  error = 1;}

         var _token = "{{csrf_token()}}";

      if(error ==1){

         $(".addemp").attr( "disabled", "disabled" );

        $.ajax({
        url: '/addemp',
        type: "post",
        data: {"_token": _token,"empcode":empcode,"empid":empid,"fname":fname,"lname":lname,"email":email,"mpcst":mpcst,"modeemp":modeemp,"role":role,"prefix":prefix,"crdno":crdno,"bsnit":bsnit,"dprt":dprt,"reptmng":reptmng,"jobtitle":jobtitle,"positions":positions,"empstatus":empstatus,"doj":doj,"dol":dol,"yoe":yoe,"workphn":workphn,"extno":extno,"userid":userid,"emp_category":emp_category,"emp_type":emp_type,"sarvor_id":sarvor_id},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          //console.log(data); // this is good

          $('.addemp').removeAttr("disabled")

           // return false;
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             $("#offical")[0].reset();
             swal("Good job!", "Successfully Added  Users", "success");

             window.location.href = "/emp/edit/"+data.userid;

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!", data.msg, "error");

              }else if(data.status ==203){

              $('#loadingDiv').hide();
              swal("Good job!", "Successfully Updated", "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!", "You clicked the button!", "error");

          }
          
        },
       
      });

    
      }
    
   });   
   
  

function changestatus(menustaus,menuid,table){
  
   var _token = "{{csrf_token()}}";

    $.ajax({
        url: '/changestatus',
        type: "post",
        data: {"_token": _token,"menuid":menuid,"menustaus":menustaus,'table':table},
        dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          //console.log(data); // this is good

           // return false;
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             $("#offical")[0].reset();
             swal("Good job!", data.msg, "success");

             

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!",  data.msg, "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!",  data.msg, "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!",  data.msg, "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });
}







    $(document).on('click','#addreqruitment',function(event){

         event.preventDefault();

         error =1;

         var designation = $('#designation').val();
       var department = $('#department').val();
        var requistion = $('#requistion').val();
         var sanction = $('#sanction').val();
          var exp = $('#exp').val();
           var deadline = $('#deadline').val();
            var actualdate = $('#actualdate').val();
             var remark = $('#remark').val();
              var remark_director = $('#remark_director').val();
               var remark_management = $('#remark_management').val();
               var status = $('#status').val();


               var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = yyyy + '-' + mm + '-' + dd;

                  var d1 = Date.parse(today);
                  var d2 = Date.parse(deadline);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      var error = 0;
                      return false;
                  }



                  var d1 = Date.parse(today);
                  var d2 = Date.parse(actualdate);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      var error = 0;
                      return false;
                  }


                
                  var d1 = Date.parse(today);
                  var d2 = Date.parse(requistion);
                  if (d1 > d2) {
                      alert ("Please Select Valid Date");
                      var error = 0;
                      return false;
                  }

               

      //   if(designation ==''){
      //    $('#designation_error').text('Designation is Required').attr('style','color:red');
      //    $('#designation_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#designation_error').hide();  error = 1;}

      //  if(department ==''){
      //    $('#department_error').text('Department is Required').attr('style','color:red');
      //    $('#department_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#department_error').hide();  error = 1;}

      //  if(requistion ==''){
      //    $('#requistion_error').text('Requistion is Required').attr('style','color:red');
      //    $('#requistion_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#requistion_error').hide();  error = 1;}

       if(sanction ==''){
         $('#sanction_error').text('Sanction is Required').attr('style','color:red');
         $('#sanction_error').show();
           error = 0;
              return false;
      }else{$('#sanction_error').hide();  error = 1;}

      //  if(exp ==''){
      //    $('#exp_error').text('Experiance is Required').attr('style','color:red');
      //    $('#exp_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#exp_error').hide();  error = 1;}

      //  if(deadline ==''){
      //    $('#deadline_error').text('Dead Line is Required').attr('style','color:red');
      //    $('#deadline_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#deadline_error').hide();  error = 1;}

      //  if(actualdate ==''){
      //    $('#actualdate_error').text('Actual Date is Required').attr('style','color:red');
      //    $('#actualdate_error').show();
      //      error = 0;
      //         return false;
      // }else{$('#actualdate_error').hide();  error = 1;}

        if(remark ==''){
         $('#remark_error').text('Remark is Required').attr('style','color:red');
         $('#remark_error').show();
           error = 0;
              return false;
      }else{$('#remark_error').hide();  error = 1;}

      if(remark_director ==''){
         $('#remark_director_error').text('Remark is Required').attr('style','color:red');
         $('#remark_director_error').show();
           error = 0;
              return false;
      }else{$('#remark_director_error').hide();  error = 1;}

      if(remark_management ==''){
         $('#remark_management_error').text('Remark is Required').attr('style','color:red');
         $('#remark_management_error').show();
           error = 0;
              return false;
      }else{$('#remark_management_error').hide();  error = 1;}


       if(status ==''){
         $('#status_error').text('Status is Required').attr('style','color:red');
         $('#status_error').show();
           error = 0;
              return false;
      }else{$('#status_error').hide();  error = 1;}

      if(error == 1){

          var _token = "{{csrf_token()}}";

    $.ajax({
        url: '/addreqruitment',
        type: "post",
        data: {"_token": _token,"designation":designation,"department":department,'requistion':requistion,"exp":exp,"deadline":deadline,"actualdate":actualdate,"remark":remark,"remark_director":remark_director,"remark_management":remark_management,"sanction":sanction,"status":status},
       // dataType: 'JSON',
          beforeSend: function() {
        // setting a timeout
        $('#loadingDiv').show();
    },
        success: function (data) {
          //console.log(data); // this is good

           // return false;
          if(data.status ==200){
             $('#loadingDiv').hide();
         
             
             swal("Good job!", data.msg, "success");
              location.reload();

             

          }else if(data.status ==202){

              $('#loadingDiv').hide();
            swal("Good job!",  data.msg, "success");
            location.reload();

              }else if(data.status ==203){

              $('#loadingDiv').hide();
            swal("Good job!",  data.msg, "success");


          }else{

             $('#loadingDiv').hide();
            
             swal("Good job!",  data.msg, "error");

          }
          
        },
        error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
         }
      });

      }



    });






   

   </script>

   <script>
      $(function () {
         $("#form-horizontal").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide"
         });
      });
   </script>
   <script>$(function () {
         $(".knob").knob();
      });
   </script>
   <script src="{{ asset('https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

   <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
            labels: ['Design', 'Development', 'Sales', 'Marketing', 'HR', 'Finance', 'Support', 'Management', 'QA'],
            datasets: [{
               label: 'Department',
               data: [10, 19, 30, 50, 50, 30, 60, 70, 47, 40, 80, 70],
               backgroundColor: [
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
               ],
               borderColor: [
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
                  'rgb(115, 166, 244)',
                  'rgb(95, 227, 132)',
               ],
               borderWidth: 1
            }]
         },
         options: {
            legend: {
               display: false
            },
            scales: {
               yAxes: [{
                  ticks: {
                     beginAtZero: true,
                     steps: 10,
                     stepSize: 5,
                     stepValue: 6,
                     max: 50 //max value for the chart is 60
                  }
               }]
            }
         }
      });

   </script>
   <script>
      var ctx = document.getElementById('leavechart');
      ctx.width = 400;
      ctx.height = 300;
      var leavechart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            datasets: [{
               data: [7000, 3000],
               backgroundColor: [
                  'rgb(185, 246, 202)',
                  'rgb(115,166,244,1)'

               ],
               borderColor: [
                  'rgb(185, 246, 202)',
                  'rgb(255, 179, 0)'

               ],
               borderWidth: 0,
               // label: 'Dataset 1'

            }],

            dataLabels: {
               style: {
                  fontSize: 20
               }
            },


            labels: [
               'Panding',
               'Completed'
            ]
         },
         options: {
            responsive: true,
            cutoutPercentage: 50,
            legend: {
               fontColor: "white",
               fontSize: 10,
               position: 'bottom'
            },

         }


      });
   </script>
   <script>




//$('.leavecalcute').on('change', function() {
  $(document).on('change','.leavecalcute', function(){
   val = $(this).find(":selected").val();


   if ($(this).val() == 1) {
      var leavetypecount = $(this).data('count');
      $("#leavetime" + leavetypecount + "").attr('disabled', 'disabled');
      $("#leavetime" + leavetypecount + "").val('');
    }
    else if ($(this).val() == 0.5) {
      var leavetypecount = $(this).data('count');
      $("#leavetime" + leavetypecount + "").removeAttr('disabled', 'disabled');
    }

  var leave = $('#leavedays').val();
  var monthleave = $('#leaveinmonth').val();
  var leaveinyear = $('#leaveinyear').val();
    var varunpaid   = $('#Unpaid').val();

  

  var todayleave  = parseFloat(leave) + parseFloat(val);
  var monthremainingleave = parseFloat(monthleave) - parseFloat(val);
  var yearremainingleave = parseFloat(leaveinyear) - parseFloat(val);


  $('#leavedays').val(todayleave);
  
   

    if(monthremainingleave<0){

       totalupaid  = parseFloat(varunpaid) + parseFloat(val);

      $('#Unpaid').val(totalupaid);

    }else{

       $('#leaveinmonth').val(monthremainingleave);
       $('#leaveinyear').val(yearremainingleave);

    }

  

});

$('#select_commnet').on('change', function() {
   val = $(this).find(":selected").val();



    if(val == 'Other'){

      $('#commnettext').append('<div class="form-group row"><label for="empid" class="col-lg-4 col-form-label">Reason   </label>  <div class="col-lg-8"> <textarea class="form-control"  id=" commnet" name="commnet" required=""></textarea>  </div> </div>');
 
    }else{

        $('#commnettext').hide();
      

    }

     
});


      function openTab(evt, tabName) {
        base_url = $('#base_url').val();
        crturl2 = $('#crturl2').val();
      CURRENTURL = $('#crturl').val();
       querystring = $('#querystring').val();

     // alert(crturl2);
       
       if(CURRENTURL == tabName){

         $('#loadingDiv').show();

        window.location.href = tabName;

       }else if(crturl2 !='' && querystring ==''){
          $('#loadingDiv').show();

      var editurl =   base_url+'/edit/'+tabName+'/'+crturl2;
 

          //window.location.href = editurl;
          window.location = editurl;

        }else if(crturl2 !='' && querystring !=''){

            var editurl =   base_url+'/edit/'+tabName+'/'+crturl2+'?profile='+querystring;
 

          //window.location.href = editurl;
          window.location = editurl;

       }else{

        swal("Sorry First Fill Form");

       }

     
      
      }

      // setTimeout("pageRedirect()", 50000);
      // Get the element with id="defaultOpen" and click on it
      //document.getElementById("defaultOpen").click();
   </script>
 </div>
</body>

</html>