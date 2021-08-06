     @extends('layouts.superadmin_layout')
     @section('content')

     @section('extra_css')
     <!-- funnel chart -->
     <link href="https://cdn-na.infragistics.com/igniteui/latest/css/themes/infragistics/infragistics.theme.css"
     rel="stylesheet">
  </link>
  <link href="https://cdn-na.infragistics.com/igniteui/latest/css/structure/infragistics.css" rel="stylesheet">
</link>
<link href="https://igniteui.com/css/charts/chart-samples.css" type="text/css" rel="stylesheet">
</link>
@stop
<div class="content p-0">
   <div class="container-fluid">
      <div class="page-title-box">
         <div class="row align-items-center bredcrum-style m-b-20 p-10">
            <div class="col-sm-6">
               <h4 class="page-title text-left">Dashboard</h4>
            </div>
         </div>
      </div>
      <!-- end row -->
      <div class="float-left width100">
         <div class="row">
            <div class="col-sm-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="mt-0 header-title mb-4 text-left">Leads by Stages
                              <!-- <a href="#" class="float-right panel-fullscreen1" id="panel-fullscreen" role="button"
                                 title="Toggle fullscreen">
                                 <i class="fa fa-expand"></i>
                              </a> -->
                           </h4>
                           <div class="chartContainer chartContainer3" style="width: 100%;">
                              <div id="chartNormal"></div>
                           </div>
                           <div class="m-t-10 float-left width100"><a href="#" class="float-right text-info">View More
                              (Enquiries with
                              Status)
                              <i class="mdi mdi-arrow-right h5 font-14"></i>
                           </a></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4 text-left">Accounts By Industry
                              <!-- <a href="#" class="float-right panel-fullscreen1" id="panel-fullscreen" role="button"
                                 title="Toggle fullscreen">
                                 <i class="fa fa-expand"></i>
                              </a> -->
                           </h4>
                           <div id="chartContainer" style="height: 300px; width: 100%;">
                              <canvas id="leavechart1"></canvas>
                           </div>
                           <div class="float-left width100"><a href="#" class="float-right text-info">View
                              More
                              (Sales Pipeline)
                              <i class="mdi mdi-arrow-right h5 font-14"></i>
                           </a></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4 text-left">Opportunities By Stage
                              <!-- <a href="#" class="float-right panel-fullscreen1" id="panel-fullscreen" role="button"
                                 title="Toggle fullscreen">
                                 <i class="fa fa-expand"></i>
                              </a> -->
                           </h4>
                           <div id="chartContainer" style="height: 300px; width: 100%;">
                              <canvas id="projectstage"></canvas>
                           </div>
                           <div class="float-left width100"><a href="#" class="float-right text-info">View
                              More
                              (Project By Stage)
                              <i class="mdi mdi-arrow-right h5 font-14"></i>
                           </a></div>

                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-5">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="mt-0 header-title mb-4 text-left">Opportunities By Industry
                              <a href="#" class="float-right panel-fullscreen1" id="panel-fullscreen" role="button"
                              title="Toggle fullscreen">
                              <i class="fa fa-expand"></i>
                           </a>
                        </h4>
                        <div id="chartContainer" style="height: 300px; width: 100%;">
                           <canvas id="myChart2"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-7">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="mt-0 header-title mb-4 text-left">Leads By Industry
                           <a href="#" class="float-right panel-fullscreen1" id="panel-fullscreen" role="button"
                           title="Toggle fullscreen">
                           <i class="fa fa-expand"></i>
                        </a>
                     </h4>
                     <div id="chartContainer1" style="height: 300px; width: 100%;">
                        <canvas id="myChart1"></canvas>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container-fluid -->
</div>
@stop

@section('extra_js')

<script>$(function () {
   $(".knob").knob();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<!-- Project Delay Report -->
<script>
   var ctx = document.getElementById('myChart2').getContext('2d');
   var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
         labels: ['Civil', 'Manufacturing', 'FMCG'],
         datasets: [{
            label: 'Some of Days Late',
            data: [11, 19, 25],
            backgroundColor: [
            'rgb(115, 166, 244)',
            'rgb(95, 227, 132)',
            '#7446b9'
            ],
            borderColor: [
            'rgb(115, 166, 244)',
            'rgb(95, 227, 132)',
            '#7446b9'
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
                  stepSize: 10,
                  stepValue: 6,
                     max: 30 //max value for the chart is 60
                  }
               }]
            }
         }
      });

   </script>
   <!-- Project Assesment Report -->
   <script>
      var ctx = document.getElementById('myChart1').getContext('2d');
      var myChart1 = new Chart(ctx, {
         type: 'horizontalBar',
         data: {
            labels: ['Civil', 'Manufacturing', 'FMCG'],
            datasets: [{
               label: 'Some of Days Late',
               data: [2, 3, 5],
               backgroundColor: [
               '#2e9ca5',
               '#7446b9',
               '#f89800'
               ],
               borderColor: [
               '#2e9ca5',
               '#7446b9',
               '#f89800'
               ],
               // borderWidth: 1,
               // barThickness: 2,
               // maxBarThickness: 8,
               // minBarLength: 2,
              //  barPercentage: 0.2
            }]
         },
         options: {
            legend: {
               display: false
            },
            scales: {
                 xAxes: [{
          
        }],
               yAxes: [{
                 stacked: true,
                   barPercentage: 0.4
                  // ticks: {
                  //    beginAtZero: true,
                  //    steps: 5,
                  //    stepSize: 5,
                  //   // stepValue: 2,
                  //   // max: 10 //max value for the chart is 20
                  // }
               }]
            }
         }
      });

   </script>
   <script>
      var ctx = document.getElementById('leavechart1');
      ctx.width = 400;
      ctx.height = 300;
      var leavechart1 = new Chart(ctx, {
         type: 'doughnut',
         data: {
            datasets: [{
               data: [2, 4, 15, 5],
               backgroundColor: [
               '#2e9ca5',
               '#7446b9',
               '#f76232',
               '#f89800'
               ],
               borderColor: [
               '#2e9ca5',
               '#7446b9',
               '#f76232',
               '#f89800'
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
            'Manufacturing',
            'IT',
            'FMCG',
            'Civil'
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
      var ctx = document.getElementById('projectstage');
      ctx.width = 400;
      ctx.height = 300;
      var leavechart = new Chart(ctx, {
         type: 'pie',
         data: {
            datasets: [{
               data: [2, 4, 5, 5, 3,7,1,2],
               backgroundColor: [
               '#2e9ca5',
               '#7446b9',
               '#f76232',
               '#f89800',
               '#dc3e76',
               'red',
               'green',
               'orange'
               ],
               borderColor: [
               '#2e9ca5',
               '#7446b9',
               '#f76232',
               '#f89800',
               '#dc3e76',
               'red',
               'green',
               'orange' 
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
            'Prospecting',
            'Qualification',
            'Need Analysis',
            'Value Proposition',
            'Id. Decision Marker',
            'Perception Analysis',
            'Propoosal/Price Quote',
            'Negotiation/Review'
            ]
         },
         options: {
            title: {
               display: true,
               // text: 'Predicted world population (millions) in 2050'
            }
         }


      });
   </script>
   <script>
      $('#colorPanel').ColorPanel({
         styleSheet: '#cpswitch'
         , animateContainer: '#wrapper'
         , colors: {
            '#5fe384': 'assets/css/style.css'
            , '#8a2be2': 'assets/css/primary.css'
            ,
         }
      });

      $(document).ready(function () {
         //Toggle fullscreen
         $(".panel-fullscreen1").click(function (e) {
            e.preventDefault();

            var $this = $(this);

            if ($this.children('i').hasClass('fa-expand')) {
               $this.children('i').removeClass('fa-expand');
               $this.children('i').addClass('fa-compress');
            }
            else if ($this.children('i').hasClass('fa-compress')) {
               $this.children('i').removeClass('fa-compress');
               $this.children('i').addClass('fa-expand');
            }
            $(this).closest('.card-body').toggleClass('panel-fullscreen');
         });
      });
   </script>
   <script src="https://igniteui.com/js/modernizr.min.js"></script>
   <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
   <script src="https://cdn-na.infragistics.com/igniteui/latest/js/infragistics.core.js"></script>
   <script src="https://cdn-na.infragistics.com/igniteui/latest/js/infragistics.dv.js"></script>
   <script src="https://cdn-na.infragistics.com/igniteui/latest/js/infragistics.lob.js"></script>
   <script type="text/javascript">
      var data = [
      { Budget: 50, Department: "Converted" },
      { Budget: 60, Department: "Working-Contacted" },
      { Budget: 50, Department: "Closed-Not Converted" },
      { Budget: 100, Department: "Open-Not Contacted" }
      ];

      $(function () {
         //  Create a basic funnel chart
         $("#chartNormal").igFunnelChart({
            width: "100%",  //"325px",
            height: "289px",
            dataSource: data,
            valueMemberPath: "Budget",
            innerLabelMemberPath: "Budget",
            innerLabelVisibility: "visible",
            outerLabelMemberPath: "Department",
            outerLabelVisibility: "visible"
         });
      });
   </script>

   @stop