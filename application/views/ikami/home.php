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
            if ($userdata->role == 'administrator' || $userdata->unit == 'D322') {
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
          <th><center>Tahun</center></th>
          <th><center>Hasil</center></th>          
          <th>Detail</th>
          <th>Dokumen</th>
            <?php 
                if ($userdata->role == 'administrator' || $userdata->unit == 'D322') {
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
          foreach ($dataIkami as $ikami) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $ikami->Nama_Instansi; ?></td>
              <td><center><?php echo $ikami->Tahun ?></center></td>
              <td><center><?php echo $ikami->Hasil_IKAMI ?></center></td>
              <td>
                <a href="#" data-toggle="modal" data-target="#detailModal<?=$ikami->Id_IKAMI?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
              </td>
              <td>
                <?php
                    if ($ikami->Dokumen==NUlL) {
                        echo "Belum Diunggah";
                    }else{
                ?>
                    <a target="_blank" href="<?= base_url('assets')?>/pdf_files/ikami/<?= $ikami->Dokumen?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Download</center></a>
                <?php
                    }
                ?>
              </td>
              <td class="text-center" style="min-width:230px;">
                <?php 
                    if ($userdata->role == 'administrator' || $userdata->unit == 'D322') {
                ?>
                         <a href="#" data-toggle="modal" data-target="#updateModal<?=$ikami->Id_IKAMI?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                <?php
                    }

                    if ($userdata->role == 'administrator') {
                ?> 
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?=$ikami->Id_IKAMI?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Arsipkan</a>     
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
<?php foreach ($dataIkami as $value): ?>
    <div class="modal fade" id="detailModal<?= $value->Id_IKAMI ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">             
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Hasil IKAMI <br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                </div>
                <div class="modal-body">
                  <table class="table table-striped">
                    <tr>
                      <td style="width:40%"><b>Hasil IKAMI</b></td>
                      <td><?php echo $value->Hasil_IKAMI ?></td>
                    </tr>
                    <tr>
                      <td><b>Kategori SE</b></td>
                      <td><?php echo $value->Kategori_SE ?></td>
                    </tr>
                    <tr>
                      <td><b>Nilai</b></td>
                      <td><?php echo $value->Nilai ?></td>
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
              <form id="form-add-ikami" method="POST" action="<?php echo base_url('Ikami/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data IKAMI</h3></center>
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
                        <label for="Hasil_IKAMI"><strong>Hasil IKAMI</strong></label>
                        <select name="Hasil_IKAMI" placeholder="Hasil IKAMI">
                          <option value="" selected disabled>--Pilih--</option>
                          <option value="Baik">1. Baik (584-645)</option>
                          <option value="Cukup Baik">2. Cukup Baik (456-583)</option>
                          <option value="Pemenuhan KK Dasar">3. Pemenuhan KK Dasar (175-312)</option>
                          <option value="Tidak Layak">4. Tidak Layak (0-174)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Kategori_SE"><strong>Kategori SE</strong></label>
                        <select name="Kategori_SE" placeholder="Kategori SE">
                          <option value="" selected disabled>--Pilih--</option>
                          <option value="Strategis">1. Strategis (35-50)</option>
                          <option value="Tinggi">2. Tinggi (16-34)</option>
                          <option value="Rendah">3. Rendah (10-15)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nilai_IKAMI"><strong>Nilai IKAMI</strong></label>
                        <input type="number" class="form-control" placeholder="Nilai IKAMI" name="Nilai" aria-describedby="sizing-addon2" min="0" required>
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
  <?php foreach ($dataIkami as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_IKAMI?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-ikami" method="POST" action="<?php echo base_url('Ikami/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data IKAMI<br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="Id_IKAMI" value="<?php echo $value->Id_IKAMI?>">
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
                    <div class="form-group">
                        <label for="Tahun"><strong>Tahun</strong></label>
                        <input type="number" class="form-control" placeholder="Tahun" name="Tahun" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Tahun ?>">
                    </div>
                    <div class="form-group">
                        <label for="Hasil_IKAMI"><strong>Hasil IKAMI</strong></label>
                        <select name="Hasil_IKAMI" placeholder="Hasil IKAMI">
                          <option value="Baik" <?php if ($value->Hasil_IKAMI == "Baik") : ?> selected<?php endif; ?> >1. Baik (584-645)</option>
                          <option value="Cukup Baik" <?php if ($value->Hasil_IKAMI == "Cukup") : ?> selected<?php endif; ?> >2. Cukup Baik (456-583)</option>
                          <option value="Pemenuhan KK Dasar" <?php if ($value->Hasil_IKAMI == "Pemenuhan KK Dasar") : ?> selected<?php endif; ?> >3. Pemenuhan KK Dasar (175-312)</option>
                          <option value="Tidak Layak" <?php if ($value->Hasil_IKAMI == "Tidak Layak") : ?> selected<?php endif; ?> >4. Tidak Layak (0-174)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Kategori_SE"><strong>Kategori SE</strong></label>
                        <select name="Kategori_SE" placeholder="Kategori SE">
                          <option value="Strategis" <?php if ($value->Kategori_SE == "Strategis") : ?> selected<?php endif; ?> >1. Strategis (35-50)</option>
                          <option value="Tinggi" <?php if ($value->Kategori_SE == "Tinggi") : ?> selected<?php endif; ?> >2. Tinggi (16-34)</option>                          
                          <option value="Rendah" <?php if ($value->Kategori_SE == "Rendah") : ?> selected<?php endif; ?> >3. Rendah (10-15)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nilai_IKAMI"><strong>Nilai IKAMI</strong></label>
                        <input type="number" class="form-control" placeholder="Nilai IKAMI" name="Nilai" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Nilai ?>">
                    </div>  
                    <div class="row">
                        <div class="col-sm-6">
                             <?php
                                if ($value->Dokumen==NUlL) {
                                    echo "Dokumen Belum Diunggah";
                                }else{
                            ?>
                               <a target="_blank" href="<?= base_url('assets')?>/pdf_files/ikami/<?= $value->Dokumen?>"><img src="<?= base_url('assets')?>/img/PDF_icon.png" width="20%"><br><?= $value->Dokumen ?></a>
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
  <?php foreach ($dataIkami as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_IKAMI?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Arsipkan data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin mengarsipkan data IKAMI instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('Ikami/archieve/' . $value->Id_IKAMI) ?>" class="btn btn-danger">Arsipkan</a>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Delete-->

<?php
/* End of file home.php */
/* Location: ./application/views/ikami/home.php */
?>