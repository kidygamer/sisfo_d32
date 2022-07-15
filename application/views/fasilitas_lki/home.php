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
                    if (($userdata->role == 'administrator' || $userdata->unit == 'D322') && $userdata->role != 'pimpinan') {
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
          <th style="width:5%"><center>#</center></th>
          <th><center>No.Surat</center></th>
          <th><center>Tgl Pelaksanaan</center></th>
          <th><center>Instansi</center></th>
          <th><center>Kegiatan</center></th> 
          <th><center>Detail</center></th> 
          <th><center>Laporan</center></th> 
          <th><center>Aksi</center></th>
        </tr>
      </thead>
      <tbody id="data-fasilitas_lki">
        <?php
          $no = 1;
          foreach ($dataFasilitas_Lki as $flki) {
            ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><?php echo $flki->No_Surat; ?></td>
              <td><center><?php echo date('d M Y', strtotime(str_replace('/', '-', $flki->Tgl_Pelaksanaan))) ?></center></td>
              <td><center><?php echo $flki->Nama_Instansi ?></center></td>
              <td><center><?php echo $flki->Jenis_LKI ?></center></td>
              <td>
                <center>
                    <a href="#" data-toggle="modal" data-target="#detailModal<?=$flki->Id_FLKI?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                </center>
              </td>
              <td>
               <center>
                 <?php
                     if ($flki->Laporan_Kegiatan==NUlL) {
                         echo "Belum Diunggah";
                     }else{
                 ?>
                     <a href="<?= base_url('assets')?>/pdf_files/laporan_kegiatan_LKI/<?= $flki->Laporan_Kegiatan?>" download="<?php echo "Laporan Kegiatan-".$flki->Jenis_LKI."-".$flki->Nama_Instansi?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Unduh</center></a>
                <?php
                    }
                ?>
              </center>
              </td>
             
                <?php 
                    if (($userdata->role == 'administrator' || $userdata->unit == 'D322') && $userdata->role != 'pimpinan') {
                ?>
                        <td class="text-center" style="min-width:100px;">
                         <a href="#" data-toggle="modal" data-target="#updateModal<?=$flki->Id_FLKI?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                        <?php 
                          if ($userdata->role == 'administrator'){
                        ?>
                            <a href="#" data-toggle="modal" data-target="#deleteModal<?=$flki->Id_FLKI?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                        <?php
                          }
                        ?>
                        </td>
                <?php
                    }
                ?>   
              
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
<?php foreach ($dataFasilitas_Lki as $value): ?>
    <div class="modal fade" id="detailModal<?= $value->Id_FLKI ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">             
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Kegiatan <br> <b><?= $value->Jenis_LKI ?> <?= $value->Nama_Instansi ?></b></h3></center>
                </div>
                <div class="modal-body">
                  <table class="table table-striped">
                    <tr>
                      <td style="width:40%"><b>Tgl Pelaksanaan</b></td>
                      <td><?php echo date('d M Y', strtotime(str_replace('/', '-', $value->Tgl_Pelaksanaan))) ?></td>
                    </tr>
                    <tr>
                      <td style="width:40%"><b>Jenis Kegiatan</b></td>
                      <td><?php echo $value->Jenis_LKI ?></td>
                    </tr>
                    <tr>
                      <td><b>Nama Kegiatan</b></td>
                      <td><?php echo $value->Keterangan_Kegiatan ?></td>
                    </tr>
                    <tr>
                      <td><b>PIC</b></td>
                      <td><?php echo $value->PIC ?></td>
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
              <form id="form-add-FLKI" method="POST" action="<?php echo base_url('Fasilitas_Lki/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas LKI</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                          <label for="No_Surat"><strong>Nomor Surat (Internal/Eksternal)</strong></label>
                          <textarea class="form-control" name="No_Surat" placeholder="Nomor Surat" required rows="1" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                          <label for="Tgl_Pelaksanaan"><strong>Tanggal Pelaksanaan</strong></label>
                                          <input type="date" class="form-control" name="Tgl_Pelaksanaan" aria-describedby="sizing-addon2" required>
                                </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="Instansi"><strong>Instansi</strong></label>
                                <select name="Instansi" placeholder="Pilih instansi..." required>
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
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="Jenis_LKI"><strong>Jenis LKI</strong></label>
                                <select name="Jenis_LKI" placeholder="Pilih Jenis LKI" required>
                                  <option value="" selected disabled>--Pilih--</option>
                                  <option value="Workshop">Workshop</option>
                                  <option value="Sosialisasi">Sosialiasi</option>
                                  <option value="Bimtek">Bimtek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                  <label for="Keterangan_Kegiatan"><strong>Nama Kegiatan</strong></label>
                                  <textarea class="form-control" name="Keterangan_Kegiatan" placeholder="Nama Kegiatan" required rows="2" required></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                              <div class="form-group">
                              <label for="PIC"><strong>PIC</strong></label>
                              <input type="text" class="form-control" placeholder="PIC" name="PIC" aria-describedby="sizing-addon2" required>
                    </div>
                        </div>
                        <div class="col-sm-6">
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
                    <input type="submit" name="" class="btn btn-warning" value="Tambah Data">
                </div>
              </form>
            </div>
        </div>
    </div>
<!--End of Modal Add-->

<!--Modal Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-add-FLKI" method="POST" action="<?php echo base_url('Fasilitas_Lki/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas LKI</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                          <label for="No_Surat"><strong>Nomor Surat (Internal/Eksternal)</strong></label>
                          <textarea class="form-control" name="No_Surat" placeholder="Nomor Surat" required rows="1" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                          <label for="Tgl_Pelaksanaan"><strong>Tanggal Pelaksanaan</strong></label>
                                          <input type="date" class="form-control" name="Tgl_Pelaksanaan" aria-describedby="sizing-addon2" required>
                                </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="Instansi"><strong>Instansi</strong></label>
                                <select name="Instansi" placeholder="Pilih instansi..." required>
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
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="Jenis_LKI"><strong>Jenis LKI</strong></label>
                                <select name="Jenis_LKI" placeholder="Pilih Jenis LKI" required>
                                  <option value="" selected disabled>--Pilih--</option>
                                  <option value="Workshop">Workshop</option>
                                  <option value="Sosialiasi">Sosialiasi</option>
                                  <option value="Bimtek">Bimtek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                  <label for="Keterangan_Kegiatan"><strong>Nama Kegiatan</strong></label>
                                  <textarea class="form-control" name="Keterangan_Kegiatan" placeholder="Nama Kegiatan" required rows="2" required></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                              <div class="form-group">
                              <label for="PIC"><strong>PIC</strong></label>
                              <input type="text" class="form-control" placeholder="PIC" name="PIC" aria-describedby="sizing-addon2" required>
                    </div>
                        </div>
                        <div class="col-sm-6">
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
                    <input type="submit" name="" class="btn btn-warning" value="Tambah Data">
                </div>
              </form>
            </div>
        </div>
    </div>
<!--End of Modal Add-->

<!--Modal Update-->
<?php foreach ($dataFasilitas_Lki as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_FLKI?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-add-FLKI" method="POST" action="<?php echo base_url('Fasilitas_Lki/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas LKI</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="Id_FLKI" value="<?php echo $value->Id_FLKI?>">
                    <div class="form-group">
                          <label for="No_Surat"><strong>Nomor Surat (Internal/Eksternal)</strong></label>
                          <textarea class="form-control" name="No_Surat" required rows="1" required><?= $value->No_Surat ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                          <label for="Tgl_Pelaksanaan"><strong>Tanggal Pelaksanaan</strong></label>
                                          <input type="date" class="form-control" name="Tgl_Pelaksanaan" aria-describedby="sizing-addon2" value="<?= $value->Tgl_Pelaksanaan ?>" required>
                                </div>
                        </div>
                        <div class="col-sm-6">
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
                        </div>
                    </div>

                   
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="Jenis_LKI"><strong>Jenis LKI</strong></label>
                                <select name="Jenis_LKI" placeholder="Pilih Jenis LKI" required>
                                  <option value="" selected disabled>--Pilih--</option>
                                  <option value="Workshop" <?php if ($value->Jenis_LKI == "Workshop") : ?> selected<?php endif; ?>>Workshop</option>
                                  <option value="Sosialisasi" <?php if ($value->Jenis_LKI == "Sosialisasi") : ?> selected<?php endif; ?>>Sosialisasi</option>
                                  <option value="Bimtek" <?php if ($value->Jenis_LKI == "Bimtek") : ?> selected<?php endif; ?>>Bimtek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                  <label for="Keterangan_Kegiatan"><strong>Nama Kegiatan</strong></label>
                                  <textarea class="form-control" name="Keterangan_Kegiatan" required rows="2" required><?= $value->Keterangan_Kegiatan ?></textarea>
                             </div>
                        </div>
                    </div>
                    
                        
                    <div class="form-group">
                        <label for="PIC"><strong>PIC</strong></label>
                        <input type="text" class="form-control" value="<?= $value->PIC ?>" name="PIC" aria-describedby="sizing-addon2" required>
                    </div>
                        
                    <div class="row">
                        <div class="col-sm-6">
                             <?php
                                if ($value->Laporan_Kegiatan==NUlL) {
                                    echo "Dokumen Belum Diunggah";
                                }else{
                            ?>
                               <a target="_blank" href="<?= base_url('assets')?>/pdf_files/laporan_kegiatan_LKI/<?= $value->Laporan_Kegiatan?>"><img src="<?= base_url('assets')?>/img/PDF_icon.png" width="20%"><br><?= $value->Laporan_Kegiatan ?></a>
                            <?php
                                }
                            ?>
                            
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" name="recent_dokumen" value="<?php echo $value->Laporan_Kegiatan?>">
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
                    <input type="submit" name="" class="btn btn-warning" value="Update Data">
                </div>
              </form>
            </div>
        </div>
    </div>
    <?php endforeach ?>
<!--End of Modal Update-->


<!--Modal Delete-->
  <?php foreach ($dataFasilitas_Lki as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_FLKI?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin menghapus data <?=  $value->Jenis_LKI ?> instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Fasilitas_Lki/archieve/' . $value->Id_FLKI) ?>" class="btn btn-danger">Hapus</a>
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
/* End of file home.php */
/* Location: ./application/views/fasilitas_lki/home.php */
?>