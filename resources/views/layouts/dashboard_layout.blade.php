<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
   <title>Admin Dashboard</title>
   <meta content="Admin Dashboard" name="description">
   <meta content="kloudrac" name="author">
   <link rel="shortcut icon" href="{{URL::to('assets/images/logo.png')}}">
   <!--Chartist Chart CSS -->
   <link rel="stylesheet" href="{{URL::to('assets/css/chartist.min.css')}}">
   <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/style.css')}}" id="cpswitch" rel="stylesheet" type="text/css">
   <link href="{{URL::to('assets/css/jquery.colorpanel.css')}}" rel="stylesheet" type="text/css">
</head>
   <body>
      <div id="wrapper">
      <div class="row columnreverse">


  @yield('content') 

      </div>
</div>
 @include('common.superadmin_footer')
      <!-- end wrapper-page -->
      <!-- jQuery  -->
     
      <script src="{{URL::to('assets/js/custom.js')}}"></script>
   <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
   <script src="{{URL::to('assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{URL::to('assets/js/metisMenu.min.js')}}"></script>
   <script src="{{URL::to('assets/js/jquery.slimscroll.js')}}"></script>
   <script src="{{URL::to('assets/js/waves.min.js')}}"></script>
   <script src="{{URL::to('assets/js/app.js')}}"></script>

   <script type="text/javascript">
      
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

  $(document).on('click','#login',function(){
          // event.preventDefault();
            var email = $('#emaildata').val();
            var password = $('#password').val();

          //alert(email);
         if(email.length==0){
         $('#email_error').text('Savior Card No is Required').attr('style','color:red');
         $('#email_error').show();
           error = 0;
              return false;

      // }else if(validate(email) == false){
      //    $('#email_error').text('Enter valid Email').attr('style','color:red');
      //    $('#email_error').show();
      //      error = 0;
      //         return false;

      }else{$('#email_error').hide();  error = 1;}

         if(password.length==0){
         $('#password_error').text('Password is Required').attr('style','color:red');
         $('#password_error').show();
           error = 0;
          return false;

      }else{$('#password_error').hide();  error = 1;}

         });

   </script>
   </body>
</html>