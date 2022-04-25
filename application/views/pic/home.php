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
            if ($userdata->role == 'administrator') {
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
          <th>Kategori</th>
          <th>Instansi</th>
          <th>Nama PIC</th>
          <th>Nomor HP</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataPic as $pic) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pic->Kategori; ?></td>
              <td><?php echo $pic->Nama_Instansi; ?></td>
              <td><?php echo $pic->Nama_PIC; ?></td>
              <td><?php echo $pic->Nomor_HP; ?></td>
              <td class="text-center" style="min-width:230px;">
                  <?php 
                      if ($userdata->role == 'administrator' || $userdata->role == 'editor') {
                  ?>
                        <a href="#" data-toggle="modal" data-target="#updateModal<?=$pic->Id_PIC?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?=$pic->Id_PIC?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
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

<!--Modal Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-add-Pic" method="POST" action="<?php echo base_url('Pic/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data PIC Instansi Pemda</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Instansi"><strong>Instansi</strong></label>
                        <select name="Id_Instansi" placeholder="Pilih instansi...">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Nama"><strong>Nama Lengkap</strong></label>
                                <input type="text" class="form-control" name="Nama_PIC" aria-describedby="sizing-addon2" required placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Nomor_HP"><strong>Nomor HP</strong></label>
                                <input type="number" class="form-control" name="Nomor_HP" aria-describedby="sizing-addon2" required minlength="0" min="0" placeholder="Nomor HP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Jabatan"><strong>Jabatan</strong></label>
                                <input type="text" class="form-control" name="Jabatan" aria-describedby="sizing-addon2" required placeholder="Jabatan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                                <label for="Kategori"><strong>Kategori PIC</strong></label>
                                <select name="Kategori" placeholder="Pilih" required>
                                    <option value="">--Pilih--</option>
                                    <option value="Csirt">Csirt</option>
                                    <option value="CSM">CSM</option>
                                    <option value="IKAMI">IKAMI</option>
                                    <option value="Laporan Persandian">Laporan Persandian</option>
                                    <option value="TMPI">TMPI</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                                 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <input type="submit" name="" class="btn btn-success" value="Tambah Data">
                </div>
              </form>
            </div>
        </div>
    </div>
<!--End of Modal Add-->

<!--Modal Update-->
  <?php foreach ($dataPic as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_PIC?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-instansi" method="POST" action="<?php echo base_url('Pic/prosesUpdate'); ?>">
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Update Data PIC<br> <b><?= $value->Kategori ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <input type="hidden" name="Id_PIC" value="<?php echo $value->Id_PIC?>">
                    <div class="form-group">
                        <label for="Instansi"><strong>Instansi</strong></label>
                        <select name="Id_Instansi" placeholder="Pilih instansi...">
                          <option value="" selected>--Instansi--</option>
                          <?php
                            foreach ($dataInstansi as $instansi) {
                              ?>
                              <option value="<?=$instansi->Id_Instansi ?>" <?php if ($value->Id_Instansi == $instansi->Id_Instansi) : ?> selected<?php endif; ?>>
                                <?= $instansi->Nama_Instansi ?></option>
                          <?php
                            }
                          ?>
                        </select>    
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Nama"><strong>Nama Lengkap</strong></label>
                                <input type="text" class="form-control" name="Nama_PIC" aria-describedby="sizing-addon2" required placeholder="Nama Lengkap" value="<?= $value->Nama_PIC?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Nomor_HP"><strong>Nomor HP</strong></label>
                                <input type="number" class="form-control" name="Nomor_HP" aria-describedby="sizing-addon2" required minlength="0" min="0" placeholder="Nomor HP" value="<?= $value->Nomor_HP?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Jabatan"><strong>Jabatan</strong></label>
                                <input type="text" class="form-control" name="Jabatan" aria-describedby="sizing-addon2" required placeholder="Jabatan" value="<?= $value->Jabatan?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                                <label for="Kategori"><strong>Kategori PIC</strong></label>
                                <select name="Kategori" placeholder="Pilih" required>
                                    <option value="">--Pilih--</option>
                                    <option value="Csirt" <?php if ($value->Kategori == "Csirt") : ?> selected<?php endif; ?>>Csirt</option>
                                    <option value="CSM" <?php if ($value->Kategori == "CSM") : ?> selected<?php endif; ?>>CSM</option>
                                    <option value="IKAMI" <?php if ($value->Kategori == "IKAMI") : ?> selected<?php endif; ?>>IKAMI</option>
                                    <option value="Laporan Persandian" <?php if ($value->Kategori == "Laporan Persandian") : ?> selected<?php endif; ?>>Laporan Persandian</option>
                                    <option value="TMPI" <?php if ($value->Kategori == "TMPI") : ?> selected<?php endif; ?>>TMPI</option>
                                </select>
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
  <?php foreach ($dataPic as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_PIC?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin menghapus data instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Pic/archieve/' . $value->Id_PIC) ?>" class="btn btn-danger">Hapus</a>
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
/* Location: ./application/views/pic/home.php */
?>