<div class="box">
  <div class="box-header">
   <center><strong><h3><?= $dataInstansi->Nama_Instansi ?></h3></strong></center>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <?php
        foreach ($dataGrand as $value) {
      ?>
          <tr>
            <td colspan="5" class="bg-gray" style="text-align: center;">Tahun<h3><?= $value->Tahun ?></h3></td>
            <td>
              <table class="table table-bordered">

                <!-- Laporan Persandian  -->
                <tr class="bg-green"><th colspan="5"><center>Laporan Persandian</center></th></tr>
                <?php
                    if ($value->Jml_SDM == Null && $value->Jml_Palsan == Null && $value->Jml_APU == Null && $value->Jml_SE == Null && $value->Dokumen == Null ) {
                  ?>
                    <tr style="text-align:center;">
                      <td colspan="5" class="bg-gray"><strong>---</strong></td>
                    </tr>
                  <?php
                    }else{
                  ?>
                    <tr style="text-align:center;">
                      <td><b>Jml SDM</b></td>
                      <td><b>Jml Palsan</b></td>
                      <td><b>Jml APU</b></td>
                      <td><b>Jml SE</b></td>
                      <td><b>Dokumen</b></td>
                    </tr>
                    <tr style="text-align:center;">
                      <td><?= $value->Jml_SDM?></td>
                      <td><?= $value->Jml_Palsan?></td>
                      <td><?= $value->Jml_APU?></td>
                      <td><?= $value->Jml_SE?></td>
                      <td><a target="_blank" href="<?= base_url('assets')?>/pdf_files/laporan_persandian/<?= $value->Dokumen?>">Download</a></td>
                    </tr>
                  <?php
                    }
                  ?>
                <!-- /Laporan Persandian  -->
               
                <!-- CSIRT  -->
                <tr class="bg-yellow"><th colspan="5"><b><center>CSIRT</center></b></th></tr>
                  <?php
                    if ($value->Nomor_Sertifikat == Null && $value->Nama_CSIRT == Null && $value->Nama_Narahubung == Null && $value->Nomor_HP == Null ) {
                  ?>
                    <tr style="text-align:center;">
                      <td colspan="5" class="bg-gray"><strong>---</strong></td>
                    </tr>
                  <?php
                    }else{
                  ?>
                        <tr style="text-align:center;">
                          <td><b>No.Sertifikat</b></td>
                          <td><b>Nama CSIRT</b></td>
                          <td><b>Nama Narahubung</b></td>
                          <td><b>No.Tlp.</b></td>
                        </tr>
                        <tr style="text-align:center;">
                          <td><?= $value->Nomor_Sertifikat?></td>
                          <td><?= $value->Nama_CSIRT?></td>
                          <td><?= $value->Nama_Narahubung?></td>
                          <td><?= $value->Nomor_HP?></td>
                        </tr>
                  <?php
                    }
                  ?>
                <!-- /CSIRT  -->
                
                <!-- IKAMI  -->
                <tr class="bg-aqua"><th colspan="5"><b><center>IKAMI</center></b></th></tr>
                <?php
                    if ($value->Hasil_IKAMI == Null && $value->Kategori_SE == Null && $value->Nilai == Null) {
                  ?>
                    <tr style="text-align:center;">
                      <td colspan="5" class="bg-gray"><strong>---</strong></td>
                    </tr>
                  <?php
                    }else{
                  ?>  
                    <tr style="text-align:center;">
                      <td><b>Hasil IKAMI</b></td>
                      <td colspan="3"><b>Kategori SE</b></td>
                      <td><b>Nilai</b></td>
                    </tr>
                    <tr style="text-align:center;">
                      <td><?= $value->Hasil_IKAMI?></td>
                      <td colspan="3"><?= $value->Kategori_SE?></td>
                      <td><?= $value->Nilai?></td>
                    </tr>
                        
                  <?php
                    }
                  ?>
                <!-- /IKAMI  -->

                <!-- CSM  -->
                <tr class="bg-yellow"><th colspan="5"><b><center>CSM</b></center></b></th></tr>
                <?php
                    if ($value->Skor == Null && $value->Lv_Kematangan == Null) {
                  ?>
                    <tr style="text-align:center;">
                      <td colspan="5" class="bg-gray"><strong>---</strong></td>
                    </tr>
                  <?php
                    }else{
                  ?>  
                    <tr style="text-align:center;">
                      <td colspan="3"><b>Skor</b></td>
                      <td colspan="2"><b>Level Kematangan</b></td>
                    </tr>
                    <tr style="text-align:center;">
                      <td colspan="3"><?= $value->Skor?></td>
                      <td colspan="2"><?= $value->Lv_Kematangan?></td>
                    </tr>
                        
                  <?php
                    }
                  ?>
                <!-- /CSM  -->

                <!-- TMPI  -->
                <tr class="bg-purple"><th colspan="5"><b><center>TMPI</b></td></tr>
                <?php
                    if ($value->Nilai_TMPI == Null && $value->Level == Null) {
                  ?>
                    <tr style="text-align:center;">
                      <td colspan="5" class="bg-gray"><strong>---</strong></td>
                    </tr>
                  <?php
                    }else{
                  ?>  
                    <tr style="text-align:center;">
                      <td colspan="3"><b>Nilai TMPI</b></td>
                      <td colspan="2"><b>Level</b></td>
                    </tr>
                    <tr style="text-align:center;">
                      <td colspan="3"><?= $value->Nilai_TMPI?></td>
                      <td colspan="2"><?= $value->Level?></td>
                    </tr>
                        
                  <?php
                    }
                  ?>
                  <!-- /TMPI  -->

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