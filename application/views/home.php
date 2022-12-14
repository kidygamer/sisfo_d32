<script>
    jQuery(document).ready(function() {
      jQuery('#vmap').vectorMap({ 
        map: 'indonesia_id',
          enableZoom: true,
          showTooltip: true,
          selectedColor: null,
      backgroundColor: '#3c8dbc',
      color: '#FFFFFF',
      hoverColor: '#F8F8FF',
      legend:{
        horizontal: true,
        title:'Warna'
      },
      onLabelShow: function(event, label, code)
      {
          var vcsirtstatla = "Sudah Launching";
          var vcsirtstatlm = "Belum Launching";
          var map_path = [
            <?php
            foreach ($sel_map_status as $map_status) {
            echo '"';
            echo $map_status->code_vmap;
            echo '",';
            }  
          ?>
          ];
          console.log(code);
          if(map_path.indexOf(code) !== -1){
            label.append("<br> CSIRT :"+vcsirtstatla);
          }
          else{
            label.append("<br> CSIRT :"+vcsirtstatlm);
          }
      },
      onRegionClick: function(event, code, region){
        console.log(code);
        var map_code = [
            <?php
            foreach ($sel_vmap_code as $map_code) {
            echo '"';
            echo $map_code->code_vmap;
            echo '",';
            }  
          ?>
        ];
        if(map_code.indexOf(code) !== -1){
          window.location.href ="<?php echo base_url('Instansi/instansi_by_prov/'); ?>"+code;
        }else{
           window.location.href ="<?php echo base_url('Home'); ?>";
        }
        
      }
      });

    jQuery('#vmap').vectorMap('set','colors',{
      <?php
              foreach ($sel_map3 as $codevmap3) {
              echo $codevmap3->code_vmap;
              echo ":'#29cc54',";
              }  
        ?>
    });

    jQuery('#vmap').vectorMap('set','colors',{
      <?php
              foreach ($sel_map2 as $codevmap2) {
              echo $codevmap2->code_vmap;
              echo ":'#faec2f',";
              }  
        ?>
    });

    jQuery('#vmap').vectorMap('set','colors',{
      <?php
              foreach ($sel_map1 as $codevmap1) {
              echo $codevmap1->code_vmap;
              echo ":'#eb1325',";
              }  
        ?>
    });
    });
    </script>

<div class="row">

  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?php echo $jml_instansi; ?></h3>

        <p>Instansi</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="<?php echo base_url('Instansi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_laporan_persandian; ?></h3>

        <p> Data Evaluasi Laksan</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="<?php echo base_url('Laporan_Persandian') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_ikami; ?></h3>

        <p> Data IKAMI</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="<?php echo base_url('Ikami') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3><?php echo $jml_csm; ?></h3>

        <p> Data CSM</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="<?php echo base_url('Csm') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $jml_csirt; ?></h3>

        <p> Data CSIRT</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="<?php echo base_url('Csirt') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-4">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_tmpi; ?></h3>

        <p> Data TMPI</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="<?php echo base_url('Tmpi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-map"></i>
        <h3 class="box-title">INDONESIA</h3>
        
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">

        <div id="vmap" style="height: 600px;">
        <div style= "width:100px; height:25px; background-color:#ffffff; top:15px; left:55px; position:relative; float:left; text-align:center; border-radius: 25px;"><strong> Belum TMPI  </strong></div>
        <div style= "width:60px; height:25px; background-color:#eb1325; top:15px; left:55px; position:relative; float:left; text-align:center; border-radius: 25px;"><strong> Level 1 </strong></div>
        <div style= "width:60px; height:25px; background-color:#faec2f; top:15px; left:55px; position:relative; float:left; text-align:center; border-radius: 25px;"><strong> Level 2 </strong></div>
        <div style= "width:60px; height:25px; background-color:#29cc54; top:15px; left:55px; position:relative; float:left; text-align:center; border-radius: 25px;"><strong> Level 3 </strong></div>
        </div>

      </div>
    </div>
  </div>

 
  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-pie-chart"></i>
        <h3 class="box-title">CSIRT <small>Provinsi</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 45%; left: 0; margin-top: -20px; line-height:19px; text-align: center;"> <h1><b><?php echo $jml_statcsirt; ?></b></h1> </div>
        <canvas id="pieChart" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-pie-chart"></i>
        <h3 class="box-title">CSIRT <small>Kab./Kota</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 45%; left: 0; margin-top: -20px; line-height:19px; text-align: center;"> <h1><b><?php echo $jml_csirtkab; ?></b></h1> </div>
        <canvas id="pieChartkab" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">TMPI 2019<small></small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 20%; left: 0; margin-top: -20px; line-height:19px; text-align: center;"> <h1><b><?php echo $jml_tmpi19; ?> Provinsi</b></h1> </div>
        <canvas id="barChart2019" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">TMPI 2020: <small><b><?php echo $jml_tmpi20; ?> Provinsi</b></small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 20%; left: 0; margin-top: -20px; line-height:19px; text-align: center;"> </div>
        <canvas id="barChart2020" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">TMPI 2021: <small><b><?php echo $jml_tmpi21; ?> Provinsi</b></small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 20%; left: 28%; margin-top: -20px; line-height:19px; text-align: center;"></div>
        <canvas id="barChart2021" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

   <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-pie-chart"></i>
        <h3 class="box-title">Evaluasi Laksan Provinsi 2020</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 45%; left: 0; margin-top: -20px; line-height:19px; text-align: center;"> <h1><b><?php echo $jml_lapsan; ?></b></h1> </div>
        <canvas id="pieChartlapsan" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">Evaluasi Laksan 2020</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="barChartlapsan" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">Cyber Security Maturity <small>Data CSM <b><?php echo $jml_csm; ?></b></small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
      <div style="width: 100%; height: 40px; position: absolute; top: 10%; left: 0; margin-top: -20px; line-height:19px; text-align: center;"> <h1><b><?php echo $jml_csm; ?></b></h1> </div>
        <canvas id="barChartcsm" style="height:250px" ></canvas>
      </div>
    </div>
  </div>

 

 <!--  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">IKAMI <small>Jawa Barat</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="lineChart" style="height:250px" ></canvas>
      </div>
    </div>
  </div> -->

</div>

<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.js"></script>
<script>
//data test
var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: <?php echo $jml_statcsirt; ?>,
      color: "#f56954",
      highlight: "#f56954",
      label: "Sudah CSIRT"
    },
    {
      value: <?php $kval=34; echo $kval - $jml_statcsirt; ?>,
      color: "#FFE4E1",
      highlight: "#FFE4E1",
      label: "Belum CSIRT"
    }
  ];
  var pieOptions = {
    segmentShowStroke    : true,
      segmentStrokeColor   : '#fff',
      segmentStrokeWidth   : 2,
      percentageInnerCutout: 50,
      animationSteps       : 100,
      animationEasing      : 'easeOutBounce',
      animateRotate        : true,
      animateScale         : false,
      responsive           : true,
      maintainAspectRatio  : true,
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);

  //data test
  var pieChartCanvas = $("#pieChartkab").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: <?php echo $jml_csirtkab; ?>,
      color: "#f56954",
      highlight: "#f56954",
      label: "Sudah CSIRT"
    },
    {
      value: <?php $kvil=514; echo $kvil - $jml_csirtkab; ?>,
      color: "#FFE4E1",
      highlight: "#FFE4E1",
      label: "Belum CSIRT"
    }
  ];
  var pieOptions = {
    segmentShowStroke    : true,
      segmentStrokeColor   : '#fff',
      segmentStrokeWidth   : 2,
      percentageInnerCutout: 50,
      animationSteps       : 100,
      animationEasing      : 'easeOutBounce',
      animateRotate        : true,
      animateScale         : false,
      responsive           : true,
      maintainAspectRatio  : true,
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
  };
  pieChart.Doughnut(PieData, pieOptions);

  //data test bar
  var barChartCanvas = $("#barChart2019").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas);
  var barData = {
    labels:[
      <?php
        foreach ($lv_tmpi19 as $tmpi19) {
          echo '"';
          echo $tmpi19->Nama_Instansi;
          echo '",';
        }  
      ?>
    ],
        datasets:[{
            label:"Level TMPI",  
            fillColor           : 'rgba(255, 189, 0, 0.8)',
            strokeColor         : 'rgba(255, 189, 0, 0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data:[
              <?php
              foreach ($lv_tmpi19 as $tmpi19) {
              echo '"';
              echo $tmpi19->Level;
              echo '",';
              }  
              ?>
            ]
            }]
          }; 
          
  var barOptions = {
    scaleBeginAtZero        : true,
      scaleShowGridLines      : false,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
  };
  barChart.Bar(barData, barOptions);

  //data test bar 2
  var barChartCanvas = $("#barChart2020").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas);
  var barData = {
    labels:[
      <?php
        foreach ($lv_tmpi20 as $tmpi20) {
          echo '"';
          echo $tmpi20->Nama_Instansi;
          echo '",';
        }  
      ?>
    ],
        datasets:[{
            label:"Level TMPI",  
            label:"Level TMPI",  
            fillColor           : 'rgba(255, 242, 0, 0.83)',
            strokeColor         : 'rgba(255, 242, 0, 0.83)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data:[
              <?php
              foreach ($lv_tmpi20 as $tmpi20) {
              echo '"';
              echo $tmpi20->Level;
              echo '",';
              }  
              ?>
            ]
            }]
          };
  var barOptions = {
    scaleBeginAtZero        : true,
      scaleShowGridLines      : false,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
  };
  barChart.Bar(barData, barOptions);

  //data test bar 3
  var barChartCanvas = $("#barChart2021").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas);
  var barData = {
    labels:[
      <?php
        foreach ($lv_tmpi21 as $tmpi21) {
          echo '"';
          echo $tmpi21->Nama_Instansi;
          echo '",';
        }  
      ?>
    ],
        datasets:[{
            label:"Level TMPI",  
            label:"Level TMPI",  
            fillColor           : 'rgba(231, 255, 0, 0.83)',
            strokeColor         : 'rgba(231, 255, 0, 0.83)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data:[
              <?php
              foreach ($lv_tmpi21 as $tmpi21) {
              echo '"';
              echo $tmpi21->Level;
              echo '",';
              }  
              ?>
            ]
            }]
          };
  var barOptions = {
    scaleBeginAtZero        : true,
      scaleShowGridLines      : false,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
  };
  barChart.Bar(barData, barOptions);

  //data test bar 4
  var barChartCanvas = $("#barChartcsm").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas);
  var barData = {
    labels:[
      <?php
        foreach ($val_csm as $valcsm) {
          echo '"';
          echo $valcsm->Nama_Instansi;
          echo '",';
        }  
      ?>
    ],
        datasets:[{
            label:"Level Kematangan",  
            label:"Level CSM",  
            fillColor           : 'rgba(236, 0, 255, 0.83)',
            strokeColor         : 'rgba(236, 0, 255, 0.83)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data:[
              <?php
        foreach ($val_csm as $valcsm) {
          echo '"';
          echo $valcsm->Skor;
          echo '",';
        }  
      ?>
            ]
            }]
          };
  var barOptions = {
    scaleBeginAtZero        : true,
      scaleShowGridLines      : false,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
  };
  barChart.Bar(barData, barOptions);

  //data test lapsan
  var pieChartCanvas = $("#pieChartlapsan").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: <?php echo $jml_lapsan; ?>,
      color: "#00FF7F",
      highlight: "#00FF7F",
      label: "Sudah Laporan Persandian"
    },
    {
      value: <?php $kvil=34; echo $kvil - $jml_lapsan; ?>,
      color: "#006400",
      highlight: "#006400",
      label: "Belum Laporan Persandian"
    }
  ];
  var pieOptions = {
     segmentShowStroke    : true,
      segmentStrokeColor   : '#fff',
      segmentStrokeWidth   : 2,
      percentageInnerCutout: 50,
      animationSteps       : 100,
      animationEasing      : 'easeOutBounce',
      animateRotate        : true,
      animateScale         : false,
      responsive           : true,
      maintainAspectRatio  : true,
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
  };
  pieChart.Doughnut(PieData, pieOptions);

  //data test bar 5
  var barChartCanvas = $("#barChartlapsan").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas);
  var barData = {
    labels:["Provinsi","Kabupaten/Kota"],
        datasets:[{
            label:"Lapsan",  
            label:"Sudah Lapsan",  
            fillColor           : 'rgba(82, 0, 255, 0.83)',
            strokeColor         : 'rgba(82, 0, 255, 0.83)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data:[<?php echo $jml_lapsan; ?>,<?php echo $jml_lapsankab; ?>]
            }]
          };
  var barOptions = {
    scaleBeginAtZero        : true,
      scaleShowGridLines      : false,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
  };
  barChart.Bar(barData, barOptions);

  //data test line
  var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
  var lineChart = new Chart(lineChartCanvas);
  var lineData = {
    labels: [
      <?php
              foreach ($det_ikami as $detikami) {
              echo '"';
              echo $detikami->Tahun;
              echo '",';
              }  
        ?>
    ],
    datasets: [{
        label               : 'Digital Goods',
        fillColor           : 'rgba(0, 236, 255, 0.8)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)', 
        data: [
          <?php
              foreach ($det_ikami as $detikami) {
              echo '"';
              echo $detikami->Nilai;
              echo '",';
              }  
            ?>
        ],
        label: "Jawa Barat",
        backgroundColor: "rgba(100, 101, 188, 1.0)",
        borderColor: "rgba(100, 101, 188, 0.1)",
        fill: false
      }]
      };
      var lineOptions = {
      showScale               : true,
      scaleShowGridLines      : true,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      bezierCurve             : true,
      bezierCurveTension      : 0.3,
      pointDot                : true,
      pointDotRadius          : 4,
      pointDotStrokeWidth     : 1,
      pointHitDetectionRadius : 20,
      datasetStroke           : true,
      datasetStrokeWidth      : 5,
      datasetFill             : true,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      maintainAspectRatio     : true,
      responsive              : true
    };
  lineChart.Line(lineData, lineOptions);
</script>