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
    <div class="col-md-6">
        <?php 
            if ($userdata->role == 'administrator' || $userdata->unit == 'D321') {
        ?>
                <a href="#" data-toggle="modal" data-target="#addModal" class="form-control btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</a>
        <?php
            }
        ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Instansi</th>
          <th>Tahun</th>
          <th>Detail</th>
          <th>Dokumen</th>
            <?php 
                if ($userdata->role == 'administrator' || $userdata->unit == 'D321') {
            ?>
                    <th style="text-align: center;width: 5%;">Aksi</th>
            <?php
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
              <td><?php echo $no; ?></td>
              <td><?php echo $lapsan->Nama_Instansi; ?></td>
              <td><?php echo $lapsan->Tahun ?></td>
              <td>
              	<a href="#" data-toggle="modal" data-target="#detailModal<?=$lapsan->Id_LapSan?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Buka</a>
              </td>
              <td>
                <?php
                    if ($lapsan->Dokumen==NUlL) {
                        echo "Belum Diunggah";
                    }else{
                ?>
                    <a target="_blank" href="<?= base_url('assets')?>/pdf_files/laporan_persandian/<?= $lapsan->Dokumen?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Download</center></a>
                <?php
                    }
                ?>
              </td>
              <td class="text-center" style="min-width:230px;">
                <?php 
                    if ($userdata->role == 'administrator' || $userdata->unit == 'D321') {
                ?>
                         <a href="#" data-toggle="modal" data-target="#updateModal<?=$lapsan->Id_LapSan?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                <?php
                    }

                    if ($userdata->role == 'administrator') {
                ?> 
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?=$lapsan->Id_LapSan?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Arsipkan</a>     
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
                			<td><b><?php echo $value->Jml_SDM ?></b> orang</td>
                		</tr>
                        <tr>
                            <td><b>Jumlah Kebijakan Kamsi</b></td>
                            <td><b><?php echo $value->Jml_Kebijakan ?></b> kebijakan</td>
                        </tr>
                		<tr>
                			<td><b>Jumlah Alat Sandi</b></td>
                			<td><b><?php echo $value->Jml_Palsan ?></b> buah</td>
                		</tr>
                		<tr>
                			<td><b>Jumlah APU</b></td>
                			<td><b><?php echo $value->Jml_APU ?></b> buah</td>
                		</tr>
                		<tr>
                			<td><b>Jumlah Sistem Elektronik</b></td>
                			<td><b><?php echo $value->Jml_SE ?></b> sistem</td>
                		</tr>
                        <tr>
                            <td><b>Jumlah Pengelolaan Dokumen</b></td>
                            <td><b><?php echo $value->Jml_PDok ?></b></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Layanan Kamsi</b></td>
                            <td><b><?php echo $value->Jml_LKamsi ?></b> layanan</td>
                        </tr>
                        <tr>
                            <td><b>Jumlah PHKS</b></td>
                            <td><b><?php echo $value->Jml_PHKS ?></b> JKS</td>
                        </tr>
                		<tr>
                			<td><b>Saran untuk BSSN</b></td>
                			<td><p><?php echo nl2br($value->Saran_uBSSN) ?></p></td>
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
                    <div class="form-group">
                        <label for="Tahun"><strong>Tahun</strong></label>
                        <input type="number" class="form-control" placeholder="Tahun" name="Tahun" aria-describedby="sizing-addon2" min="0" required>
                    </div>
                    <div class="form-group">
                      <label for="Saran_uBSSN"><strong>Saran untuk BSSN</strong></label>
                      <textarea class="form-control" name="Saran_uBSSN" placeholder="Saran untuk BSSN" required rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Kebijakan"><strong>Jumlah Kebijakan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_Kebijakan" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PHKS"><strong>Jumlah Pola Hubungan Komunikasi Sandi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_PHKS" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SDM"><strong>Jumlah SDM Persandian</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_SDM" aria-describedby="sizing-addon2" min="0" required >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Palsan"><strong>Jumlah Peralatan Sandi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_Palsan" aria-describedby="sizing-addon2" min="0" required >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_APU"><strong>Jumlah APU</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_APU" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SE"><strong>Jumlah Sistem Elektronik</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_SE" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PDok"><strong>Jumlah Pengelolaan Dokumen</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_PDok" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_LKamsi"><strong>Jumlah Layanan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_LKamsi" aria-describedby="sizing-addon2" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="Dokumen"><strong>Unggah Dokumen:</strong></label>
                      <br>                      
                      <input type="file" class="form-control" name="Dokumen">
                    </div>   
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
                        <label for="Tahun"><strong>Tahun</strong></label>
                        <input type="number" class="form-control" placeholder="Tahun" name="Tahun" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Tahun ?>">
                    </div>
                    <div class="form-group">
                      <label for="Saran_uBSSN"><strong>Saran untuk BSSN</strong></label>
                      <textarea class="form-control" name="Saran_uBSSN" placeholder="Saran untuk BSSN" required rows="5"><?= $value->Saran_uBSSN ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Kebijakan"><strong>Jumlah Kebijakan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_Kebijakan" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_Kebijakan ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PHKS"><strong>Jumlah Pola Hubungan Komunikasi Sandi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_PHKS" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_PHKS ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SDM"><strong>Jumlah SDM Persandian</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_SDM" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_SDM ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_Palsan"><strong>Jumlah Peralatan Sandi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_Palsan" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_Palsan ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_APU"><strong>Jumlah APU</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_APU" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_APU ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_SE"><strong>Jumlah Sistem Elektronik</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_SE" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_SE ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_PDok"><strong>Jumlah Pengelolaan Dokumen</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_PDok" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_PDok ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="Jml_LKamsi"><strong>Jumlah Layanan Keamanan Informasi</strong></label>
                              <input type="number" class="form-control" placeholder="0" name="Jml_LKamsi" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Jml_LKamsi ?>">
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
                              <input type="file" class="form-control" name="Dokumen">      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Arsipkan data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin mengarsipkan data Laporan Persandian instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('Laporan_Persandian/archieve/' . $value->Id_LapSan) ?>" class="btn btn-danger">Arsipkan</a>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Delete-->

<?php
/* End of file laporan_persandian.php */
/* Location: ./application/views/laporan_persandian/home.php */
?>