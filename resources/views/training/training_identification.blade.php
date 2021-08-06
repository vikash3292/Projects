@extends('layouts.superadmin_layout')

@section('content')

 <div class="content p-0">

                <div class="container-fluid">

                    <div class="page-title-box">

                        <div class="row align-items-center bredcrum-style">

                            <div class="col-sm-6 col-6">

                                <h3 class="page-title">Training Need Identification</h3>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{$mainsetting->site_title}}</a></li>

                                    <li class="breadcrumb-item active"><a href="#">Training Need Identification</a></li>

                                </ol>

                            </div>

                        </div>

                    </div>
                        <div class="row">

                        <div class="col-12">

                            <div class="card m-t-20">

                                <div class="card-body">
                                	<div class="col-sm-12">
                                		<div class="row">
                                			<div class="col-sm-6">
                                		 		<div id="calendar1"></div>
                                			</div>
                                	<div class="col-sm-6">
                                		  <table id="datatable" class="table traning table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        	<thead>
                                        		<tr>
                                        			<th>Date</th>
                                        			<th>Training Name</th>
                                        			<th>Description</th>
                                              <th>Action</th>
                                        		</tr>
                                        	</thead>
                                        	<tbody>
                                        		
                                        	</tbody>
                                        </table>
                                	</div>
                                		</div>
                                	</div>
                                	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- calendar popup -->
        <div id="calendarpopup" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg view_list">
    <!-- Modal content-->
    
  </div>
</div>
@stop

@section('extra_js')

<script type="text/javascript">
  
$(document).on('click','.fc-day-number',function(){

var click_date = $(this).data('date');


var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/get_date_training',
  type: "post",
  data: { "_token": _token,"click_date":click_date},
  dataType: 'JSON',

  success: function (data) {


    if(data.status == 200){

      $('.view_list').html(data.view_training);
      $('#calendarpopup').modal('show');

    }else{

      

 $('.view_list').html(data.addtraning);
$('#calendarpopup').modal('show');

    }          
  

              }
            }); 





})

get_training();

function get_training(){

  var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/get_all_training',
  type: "post",
  data: { "_token": _token},
  dataType: 'JSON',

  success: function (data) {
              
   $('table.traning tbody').html(data.training);

              }
            }); 


}


function add_training(){

  var click_date = $('#click_date').val();
  var training_name = $('#training_name').val();
  var training_desc = $('#training_desc').val();
   var training_id = $('#training_id').val();

  
   if(training_name == ''){
    $('#training_name_error').html('Please Enter Tranning').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#training_name_error').hide();
    error = 1;

  }

   if(training_desc == ''){
    $('#training_desc_error').html('Please Enter Tranning Desc').css("color", "red").show();
    error = 0;
    return false;
  }else{
    $('#training_desc_error').hide();
    error = 1;

  }



   var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/add_training',
  type: "post",
  data: { "_token": _token, "click_date": click_date,'training_name':training_name,'training_desc':training_desc,"training_id":training_id},
  dataType: 'JSON',

  success: function (data) {
                //console.log(data.allclient); // this is good
                $('#calendarpopup').modal('hide');
                alertify.success(data.msg);
                 $("#calendar1").fullCalendar("refetchEvents");
                get_training();



              }
            }); 

}

function delete_traing(element,traing_id){

   var result = confirm("Are Your Delete?");
    if (result) {

  var _token = "{{csrf_token()}}";
 $.ajax({
  url: '/delete_training',
  type: "post",
  data: { "_token": _token, "traing_id": traing_id},
  dataType: 'JSON',

  success: function (data) {
                //console.log(data.allclient); // this is good
                
                alertify.success(data.msg);
                $("#calendar1").fullCalendar("refetchEvents");
                get_training();



              }
            });

}

}

function edit_traing(element,traing_id){

  var _token = "{{csrf_token()}}";

 $.ajax({
  url: '/edit_training',
  type: "post",
  data: { "_token": _token, "traing_id": traing_id},
  dataType: 'JSON',

  success: function (data) {
                //console.log(data.allclient); // this is good

                 $('.view_list').html(data.training);

                $('#calendarpopup').modal('show');



              }
            });

}

</script>


   
<script type="text/javascript">
   
   
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#calendar1').fullCalendar({
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
              
                 @foreach($training as $trainings)
                {
                    title : '{{ $trainings->training_name}}',
                    start : '{{ $trainings->date }}',
                   
                },
                @endforeach
            ],
    });
</script>



@stop