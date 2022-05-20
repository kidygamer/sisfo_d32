<div class="box">
   <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php elseif($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
  <div class="box-header">
    <div class="col-md-3">
        <?php 
            if (($userdata->role == 'administrator' || $userdata->unit == 'D321') && $userdata->role != 'pimpinan') {
                echo "<a href='#' data-toggle='modal' data-target='#addModal' class='form-control btn btn-primary'><i class='glyphicon glyphicon-pencil'></i> Tambah Data</a>";
            }
        ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width:5%"><center>#</center></th>
          <th><center>Nama Instansi</center></th>
          <th><center>Tahun</center></th>
          <th><center>Detail</center></th>
          <th><center>Dokumen</center></th>
            <?php 
                if (($userdata->role == 'administrator' || $userdata->unit == 'D321') && $userdata->role != 'pimpinan') {
                    echo "<th style='text-align: center;width: 5%;'>Aksi</th>";
                }
            ?>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataLaporan_Persandian as $lapsan) {
            ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><?php echo $lapsan->Nama_Instansi; ?></td>
              <td><center><?php echo $lapsan->Tahun ?></center></td>
              <td>
                <center>
              	 <a href="#" data-toggle="modal" data-target="#detailModal<?=$lapsan->Id_LapSan?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                </center>
              </td>
              <td>
                <center>
                    <?php
                        if ($lapsan->Dokumen==NUlL) {
                            echo "Belum Diunggah";
                        }else{
                    ?>
                        <a href="<?= base_url('assets')?>/pdf_files/laporan_persandian/<?= $lapsan->Dokumen?>" download="<?php echo "Laporan Persandian-".$lapsan->Nama_Instansi."-".$lapsan->Tahun?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Unduh</center></a>
                    <?php
                        }
                    ?>
                </center>
              </td>
              
                <?php 
                    if (($userdata->role == 'administrator' || $userdata->unit == 'D321') && $userdata->role != 'pimpinan') {
                ?>
                        <td class="text-center" style="min-width:230px;">
                         <a href="#" data-toggle="modal" data-target="#updateModal<?=$lapsan->Id_LapSan?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                        <?php 
                          if ($userdata->role == 'administrator'){
                        ?>
                            <a href="#" data-toggle="modal" data-target="#deleteModal<?=$lapsan->Id_LapSan?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>  
                        <?php
                          }
                        ?> 
                        </td> 
                <?php
                    }
                ?>   
              </td>                       
            </tr>
            <?php
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!--Modals-->

<!--Modal Detail-->
<?php foreach ($dataLaporan_Persandian as $value): ?>
    <div class="modal fade" id="detailModal<?= $value->Id_LapSan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">             
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Laporan Persandian <br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                </div>
                <div class="modal-body">
                	<table class="table table-striped">
                		<tr>
                			<td style="width:40%"><b>Jumlah SDM Persandian</b></td>
                			<td><b><?php echo empty($value->Jml_SDM) ? "0" : $value->Jml_SDM; ?></b> orang</td>
                		</tr>
                        <tr>
                            <td><b>Jumlah Kebijakan Kamsi</b></td>
                            <td><b><?php echo empty($value->Jml_Kebijakan) ? "0" : $value->Jml_Kebijakan; ?></b> kebijakan</td>
                        </tr>
                		<tr>
                			<td><b>Jumlah Alat Sandi</b></td>
                			<td><b><?php echo empty($value->Jml_Palsan) ? "0" : $value->Jml_Palsan; ?></b> buah</td>
                		</tr>
                		<tr>
                			<td><b>Jumlah APU</b></td>
                			<td><b><?php echo empty($value->Jml_APU) ? "0" : $value->Jml_APU; ?></b> buah</td>
                		</tr>
                		<tr>
                			<td><b>Jumlah Sistem Elektronik</b></td>
                			<td><b><?php echo empty($value->Jml_SE) ? "0" : $value->Jml_SE; ?></b> sistem</td>
                		</tr>
                        <tr>
                            <td><b>Jumlah Pengelolaan Dokumen</b></td>
                            <td><b><?php echo empty($value->Jml_PDok) ? "0" : $value->Jml_PDok; ?></b></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Layanan Kamsi</b></td>
                            <td><b><?php echo empty($value->Jml_LKamsi) ? "0" : $value->Jml_LKamsi; ?></b> layanan</td>
                        </tr>
                        <tr>
                            <td><b>Jumlah PHKS</b></td>
                            <td><b><?php echo empty($value->Jml_PHKS) ? "0" : $value->Jml_PHKS; ?></b> JKS</td>
                        </tr>
                		<tr>
                			<td><b>Saran untuk BSSN</b></td>
                			<td><p><?php echo empty($value->Saran_uBSSN) ? "-" : nl2br($value->Saran_uBSSN); ?></p></td>
                		</tr>
                	</table>
                 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>              
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Detail-->

<!--Modal Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-lapsan" method="POST" action="<?php echo base_url('Laporan_Persandian/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Laporan Persandian</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Instansi"><strong>Instansi</strong></label>
                        <select name="Instansi" placeholder="Pilih instansi...">
                          <option value="" selected>--Instansi--</option>
                          <?php
                            foreach ($dataInstansi as $instansi) {
                              ?>
                              <option value="<?=$instansi->Id_Instansi ?>"><?= $instansi->Nama_Instansi ?></option>
                          <?php
                            }
                          ?>
                        </select>    
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Tahun"><strong>Tahun</strong></label>
                                <select name="Tahun" placeholder="Pilih Tahun">
                                  <option value="" selected disabled>--Pilih--</option>
                                  <option value="2018">2018</option>
                                  <option value="2019">2019</option>
                                  <option value="2020">2020</option>
                                  <option value="2021">2021</option>
                                  <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                              <label for="Saran_uBSSN"><strong>Saran untuk BSSN</strong></label>
                              <textarea class="form-control" name="Saran_uBSSN" placeholder="Saran untuk BSSN" required rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Kebijakan"><strong>Jumlah Kebijakan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_Kebijakan" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PHKS"><strong>Jumlah Pola Hubungan Komunikasi Sandi</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_PHKS" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SDM"><strong>Jumlah SDM Persandian</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_SDM" aria-describedby="sizing-addon2" min="0" required >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Palsan"><strong>Jumlah Peralatan Sandi</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_Palsan" aria-describedby="sizing-addon2" min="0" required >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_APU"><strong>Jumlah APU</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_APU" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SE"><strong>Jumlah Sistem Elektronik</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_SE" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PDok"><strong>Jumlah Pengelolaan Dokumen</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_PDok" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_LKamsi"><strong>Jumlah Layanan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" value="0" name="Jml_LKamsi" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="Dokumen"><strong>Unggah Dokumen:</strong></label>
                      <br>                      
                      <input type="file" class="form-control" name="Dokumen"><br><small>*file format .pdf dengan ukuran maksimal 30Mb</small>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <input type="submit" name="" class="btn btn-warning" value="Tambah Data">
                </div>
              </form>
            </div>
        </div>
    </div>
  
<!--End of Modal Add-->

<!--Modal Update-->
  <?php foreach ($dataLaporan_Persandian as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_LapSan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-lapsan" method="POST" action="<?php echo base_url('Laporan_Persandian/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data Laporan Persandian <br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="Id_LapSan" value="<?php echo $value->Id_LapSan?>">
                  <input type="hidden" name="Instansi" value="<?php echo $value->Instansi?>">
                   <div class="form-group">
                        <label for="Instansi"><strong>Instansi</strong></label>
                        <select name="Instansi" placeholder="Pilih instansi...">
                          <option value="" selected>--Instansi--</option>
                          <?php
                            foreach ($dataInstansi as $instansi) {
                              ?>
                              <option value="<?=$instansi->Id_Instansi ?>" <?php if ($value->Instansi == $instansi->Id_Instansi) : ?> selected<?php endif; ?>>
                                <?= $instansi->Nama_Instansi ?></option>
                          <?php
                            }
                          ?>
                        </select>    
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Tahun"><strong>Tahun</strong></label>
                                <select name="Tahun" placeholder="Pilih Tahun">
                                  <option value="" selected disabled>--Pilih--</option>
                                  <option value="2018" <?php if ($value->Tahun == "2018") : ?> selected<?php endif; ?>>2018</option>
                                  <option value="2019" <?php if ($value->Tahun == "2019") : ?> selected<?php endif; ?>>2019</option>
                                  <option value="2020" <?php if ($value->Tahun == "2020") : ?> selected<?php endif; ?>>2020</option>
                                  <option value="2021" <?php if ($value->Tahun == "2021") : ?> selected<?php endif; ?>>2021</option>
                                  <option value="2022" <?php if ($value->Tahun == "2022") : ?> selected<?php endif; ?>>2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                              <label for="Saran_uBSSN"><strong>Saran untuk BSSN</strong></label>
                              <textarea class="form-control" name="Saran_uBSSN" placeholder="Saran untuk BSSN" required rows="5"><?= $value->Saran_uBSSN ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Kebijakan"><strong>Jumlah Kebijakan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_Kebijakan" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_Kebijakan) ? "0" : $value->Jml_Kebijakan; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PHKS"><strong>Jumlah Pola Hubungan Komunikasi Sandi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_PHKS" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_PHKS) ? "0" : $value->Jml_PHKS; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SDM"><strong>Jumlah SDM Persandian</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_SDM" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_SDM) ? "0" : $value->Jml_SDM; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Palsan"><strong>Jumlah Peralatan Sandi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_Palsan" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_Palsan) ? "0" : $value->Jml_Palsan; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_APU"><strong>Jumlah APU</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_APU" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_APU) ? "0" : $value->Jml_APU; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SE"><strong>Jumlah Sistem Elektronik</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_SE" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_SE) ? "0" : $value->Jml_SE; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PDok"><strong>Jumlah Pengelolaan Dokumen</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_PDok" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_PDok) ? "0" : $value->Jml_PDok; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_LKamsi"><strong>Jumlah Layanan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_LKamsi" aria-describedby="sizing-addon2" min="0" required value="<?php echo empty($value->Jml_LKamsi) ? "0" : $value->Jml_LKamsi; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                             <?php
                                if ($value->Dokumen==NUlL) {
                                    echo "Dokumen Belum Diunggah";
                                }else{
                            ?>
                               <a target="_blank" href="<?= base_url('assets')?>/pdf_files/laporan_persandian/<?= $value->Dokumen?>"><img src="<?= base_url('assets')?>/img/PDF_icon.png" width="20%"><br><?= $value->Dokumen ?></a>
                            <?php
                                }
                            ?>
                            
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" name="recent_dokumen" value="<?php echo $value->Dokumen?>">
                            <div class="form-group">
                              <label for="Dokumen"><strong>Unggah Dokumen:</strong></label>
                              <br>                      
                              <input type="file" class="form-control" name="Dokumen"><br><small>*file format .pdf dengan ukuran maksimal 30Mb</small>      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <input type="submit" name="" class="btn btn-warning" value="Update">
                </div>
              </form>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Update-->

<!--Modal Delete-->
  <?php foreach ($dataLaporan_Persandian as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_LapSan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin menghapus data Laporan Persandian instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Laporan_Persandian/archieve/' . $value->Id_LapSan) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Delete-->

<script type="text/javascript">
    $('#addModal').on('hidden.bs.modal', function () {
         location.reload();
        })
</script>
<?php
/* End of file laporan_persandian.php */
/* Location: ./application/views/laporan_persandian/home.php */
?>