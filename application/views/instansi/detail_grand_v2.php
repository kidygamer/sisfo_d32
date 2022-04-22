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

   <center><strong><h3><?= $dataInstansi->Nama_Instansi ?></h3></strong></center>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-striped">
      <?php
        foreach ($dataGrand as $value) {
      ?>
          <tr>
            <td colspan="8" class="bg-gray" style="text-align: center;">Tahun<h3><?= $value->Tahun ?></h3></td>
            <td>
              <table class="table table-bordered">
                <tr>
                   <th style="text-align:center;width: 21%;" colspan="2" class="bg-green">Laporan Persandian</th>
                   <th style="text-align:center;width: 20%;" colspan="2" class="bg-yellow">IKAMI</th>
                   <th style="text-align:center;width: 20%;" colspan="2" class="bg-aqua">CSM</th>
                   <th style="text-align:center;width: 20%;" colspan="2" class="bg-red">CSIRT</th>
                   <th style="text-align:center;width: 19%;" colspan="2" class="bg-purple">TMPI</th>
                </tr>
                <tr>
                  <td><b>Kebijakan</b></td><td><?php echo empty($value->Jml_Kebijakan) ? "-" : $value->Jml_Kebijakan; ?></td>  
                  <td><b>Hasil IKAMI</b></td><td><?php echo empty($value->Hasil_IKAMI) ? "-" : $value->Hasil_IKAMI; ?></td>
                  <td><b>Skor</b></td><td><?php echo empty($value->Skor) ? "-" : $value->Skor; ?></td>
                  <td><b>Status</b></td><td><?php echo empty($value->Status) ? "-" : $value->Status; ?></td>
                  <td><b>Nilai TMPI</b></td><td><?php echo empty($value->Nilai_TMPI) ? "-" : $value->Nilai_TMPI; ?></td>
                </tr>
                <tr>
                  <td><b>SDM</b></td><td><?php echo empty($value->Jml_SDM) ? "-" : $value->Jml_SDM; ?></td> 
                  <td><b>Kategori SE</b></td><td><?php echo empty($value->Kategori_SE) ? "-" : $value->Kategori_SE; ?></td> 
                  <td><b>Lv Kematangan</b></td><td><?php echo empty($value->Lv_Kematangan) ? "-" : $value->Lv_Kematangan; ?></td>
                  <td><b>Tgl Launching</b></td><td><?php echo empty($value->Tgl_Launching) ? "-" : date('d F Y', strtotime(str_replace('/', '-', $value->Tgl_Launching))); ?></td>
                  <td><b>Level</b></td><td><?php echo empty($value->Level) ? "-" : $value->Level; ?></td>
                </tr>
                <tr>
                  <td><b>Peralatan Sandi</b></td><td><?php echo empty($value->Jml_Palsan) ? "-" : $value->Jml_Palsan; ?></td>
                  <td><b>Nilai</b></td><td><?php echo empty($value->Nilai) ? "-" : $value->Nilai; ?></td>
                  <td></td>
                  <td></td>
                  <td><b>Nama CSIRT</b></td><td><?php echo empty($value->Nama_CSIRT) ? "-" : $value->Nama_CSIRT; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>APU</b></td><td><?php echo empty($value->Jml_APU) ? "-" : $value->Jml_APU; ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>Narahubung</b></td><td><?php echo empty($value->Narahubung) ? "-" : $value->Narahubung; ?></td>
                  <td></td> 
                  <td></td>
                  <td></td>                 
                </tr>
                <tr>
                  <td><b>Sistem Elektornik</b></td><td><?php echo empty($value->Jml_SE) ? "-" : $value->Jml_SE; ?></td>
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
                  <td><b>Pengelolaan Dokumen</b></td><td><?php echo empty($value->Jml_PDok) ? "-" : $value->Jml_PDok; ?></td>
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
                  <td><b>Layanan Kamsi</b></td><td><?php echo empty($value->Jml_LKamsi) ? "-" : $value->Jml_LKamsi; ?></td>
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
                  <td><b>PHKS</b></td><td><?php echo empty($value->Jml_PHKS) ? "-" : $value->Jml_PHKS; ?></td>
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



<?php
/* End of file detail_grand.php */
/* Location: ./application/views/instansi/detail_grand.php */
?>