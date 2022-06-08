<div class="box">
  <div class="box-header">
    <div class="col-md-2">
      <a href="<?php echo base_url('Instansi'); ?>" class="form-control btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>         
    </div>
    <div class="row" >
      <form method="POST" action="<?php echo base_url('Instansi/detail_by_year'); ?>">
        <input type="hidden" name="Id_Instansi" value="<?= $dataInstansi->Id_Instansi ?>">
        <div class="col-md-2">
          <div class="form-group">
            <select name="Tahun" placeholder="Pilih Tahun">
            <option value="" selected>--Tahun--</option>
            <option value="all">Semua Tahun</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            </select>    
          </div>
        </div>
        <div class="col-md-3">
          <input type="submit" name="" class="btn btn-primary" value="Cari">
        </div>
      </form>
    </div>

   <center>
    <strong><h3><?= $dataInstansi->Nama_Instansi ?></h3></strong>
    <?php 
        if (empty($statusCsirt)) {
          echo "<b>[Belum CSIRT]</b>";
        }else {
          echo "<b>[Sudah CSIRT]</b>";
        }
    ?>    
  </center>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <!-- <div class="col-md-3">
        <a href='#' data-toggle='modal' data-target='#showModal' class='form-control btn btn-primary'><i class='glyphicon glyphicon-signal'></i> Tampilkan Grafik</a>
    </div> -->

    <div class="row">
      <div class="col-sm-7">
        <!-- lineChart -->
        <div class="col-lg-12 col-xs-12">
          <div class="box box-info ">
            <div class="box-header with-border">
              <i class="fa  fa-area-chart"></i>
              <h3 class="box-title">Grafik IKAMI <small><?= $dataInstansi->Nama_Instansi ?></small></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <?php 
                if (empty($det_ikami)) {
                  echo "Data IKAMI tidak ditemukan";
                }else {
              ?>
                  <canvas id="lineChart" style="height:250px" ></canvas>
              <?php
                }
              ?>              
            </div>
          </div>
        </div>
        <!-- end of lineChart -->
      </div>
      <div class="col-sm-5">
       
          <div class="box box-info ">
            <div class="box-header with-border">
              <i class="fa fa-male"></i>
              <h3 class="box-title">PIC <small><?= $dataInstansi->Nama_Instansi ?></small></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <?php 
                if (count($dataPic)==0) {
                  echo "Data PIC tidak ditemukan";
                }else {
              ?>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Bag.</th>
                        <th>Nama</th>
                        <th>No.HP</th>
                      </tr>
                    </thead>
                    <tbody id="data-instansi">
                      <?php
                        $no = 1;
                        foreach ($dataPic as $pic) {
                          ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><b><?php echo $pic->Kategori; ?></b></td>
                            <td><center><?php echo $pic->Nama_PIC ?></center></td>
                            <td><center><?php echo $pic->Nomor_HP ?></center></td>
                          </tr>
                          <?php
                          $no++;
                        }
                      ?>
                    </tbody>
                    
                  </table>
              <?php
                }
              ?>     
            
            </div>
          </div>
        
      </div>
    </div>

    <table class="table table-striped">
      <?php
        foreach ($dataGrand as $value) {
      ?>
          <tr>
            <td colspan="8" class="bg-gray" style="text-align: center;">Tahun<h3><?= $value->Tahun ?></h3></td>
            <td>
              <table class="table table-bordered">
                <tr>
                   <th style="text-align:center;width: 21%;" colspan="2" class="bg-green">Evaluasi Laksan</th>
                   <th style="text-align:center;width: 20%;" colspan="2" class="bg-yellow">IKAMI</th>
                   <th style="text-align:center;width: 20%;" colspan="2" class="bg-aqua">CSM</th>
                   <th style="text-align:center;width: 20%;" colspan="2" class="bg-red">CSIRT</th>
                   <th style="text-align:center;width: 19%;" colspan="2" class="bg-purple">TMPI</th>
                </tr>
                <tr>
                  <td><b>Kebijakan</b></td>
                    <td><?php echo empty($value->Jml_Kebijakan) ? "-" : $value->Jml_Kebijakan; ?></td>  
                  <td><b>Hasil IKAMI</b></td>
                    <td><?php echo empty($value->Hasil_IKAMI) ? "-" : $value->Hasil_IKAMI; ?></td>
                  <td><b>Skor</b></td>
                    <td><?php echo empty($value->Skor) ? "-" : $value->Skor; ?></td>
                  <td><b>Status</b></td>
                    <td><?php echo empty($value->Status) ? "-" : $value->Status; ?></td>
                  <td><b>Nilai TMPI</b></td>
                    <td><?php echo empty($value->Nilai_TMPI) ? "-" : $value->Nilai_TMPI; ?></td>
                </tr>
                <tr>
                  <td><b>SDM</b></td>
                    <td><?php echo empty($value->Jml_SDM) ? "-" : $value->Jml_SDM; ?></td> 
                  <td><b>Kategori SE</b></td>
                    <td><?php echo empty($value->Kategori_SE) ? "-" : $value->Kategori_SE; ?></td> 
                  <td><b>Lv Kematangan</b></td>
                    <td><?php echo empty($value->Lv_Kematangan) ? "-" : $value->Lv_Kematangan; ?></td>
                  <td><b>Tgl Launching</b></td>
                    <td><?php echo empty($value->Tgl_Launching) ? "-" : date('d F Y', strtotime(str_replace('/', '-', $value->Tgl_Launching))); ?></td>
                  <td><b>Level</b></td>
                    <td><?php echo empty($value->Level) ? "-" : $value->Level; ?></td>
                </tr>
                <tr>
                  <td><b>Peralatan Sandi</b></td>
                    <td><?php echo empty($value->Jml_Palsan) ? "-" : $value->Jml_Palsan; ?></td>
                  <td><b>Nilai</b></td>
                    <td><?php echo empty($value->Nilai) ? "-" : $value->Nilai; ?></td>
                  <td></td>
                    <td></td>
                  <td><b>Nama CSIRT</b></td>
                    <td><?php echo empty($value->Nama_CSIRT) ? "-" : $value->Nama_CSIRT; ?></td>
                  <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td><b>APU</b>
                    </td><td><?php echo empty($value->Jml_APU) ? "-" : $value->Jml_APU; ?></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td><b>Narahubung</b></td>
                    <td><?php echo empty($value->Narahubung) ? "-" : $value->Narahubung; ?></td>
                  <td></td> 
                    <td></td>             
                </tr>
                <tr>
                  <td><b>Sistem Elektornik</b></td>
                    <td><?php echo empty($value->Jml_SE) ? "-" : $value->Jml_SE; ?></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td><b>Pengelolaan Dokumen</b></td>
                    <td><?php echo empty($value->Jml_PDok) ? "-" : $value->Jml_PDok; ?></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td><b>Layanan Kamsi</b></td>
                    <td><?php echo empty($value->Jml_LKamsi) ? "-" : $value->Jml_LKamsi; ?></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td><b>PHKS</b></td>
                    <td><?php echo empty($value->Jml_PHKS) ? "-" : $value->Jml_PHKS; ?></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td><b>Nilai Evaluasi Laksan</b></td>
                    <td><?php echo empty($value->Nilai_Eval) ? "-" : $value->Nilai_Eval; ?></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                  <td></td>
                    <td></td>
                </tr>
              </table>
            </td>
           
          </tr>
         
      <?php
        }
      ?>
        
      
    </table>
    
  </div>
</div>

<!--Modal Grafik-->
<!--     <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Grafik Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div> -->
<!--End of Modal Grafik-->

<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>

<script type="text/javascript">
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

<?php
/* End of file detail_grand.php */
/* Location: ./application/views/instansi/detail_grand.php */
?>