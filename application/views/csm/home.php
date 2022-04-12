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
        <a href="#" data-toggle="modal" data-target="#addModal" class="form-control btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</a>
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
          <th><center>Skor</center></th>
          <th><center>Level Kematangan</center></th>          
          <th>Dokumen</th>
          <th style="text-align: center;width: 5%;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataCsm as $csm) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $csm->Nama_Instansi; ?></td>
              <td><center><?php echo $csm->Tahun ?></center></td>
              <td><center><?php echo $csm->Skor ?></center></td>
              <td><center><?php echo $csm->Lv_Kematangan ?></center></td>
              <td>
                <?php
                    if ($csm->Dokumen==NUlL) {
                        echo "Belum Diunggah";
                    }else{
                ?>
                    <a target="_blank" href="<?= base_url('assets')?>/pdf_files/csm/<?= $csm->Dokumen?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Download</center></a>
                <?php
                    }
                ?>
              </td>
              <td class="text-center" style="min-width:230px;">
                  <a href="#" data-toggle="modal" data-target="#updateModal<?=$csm->Id_CSM?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                 <a href="#" data-toggle="modal" data-target="#deleteModal<?=$csm->Id_CSM?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Arsipkan</a>
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
              <form id="form-add-Csm" method="POST" action="<?php echo base_url('Csm/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Csm</h3></center>
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
                        <label for="Skor"><strong>Skor</strong></label>
                        <input type="number" class="form-control" placeholder="Skor" name="Skor" aria-describedby="sizing-addon2" min="0" required step="any">
                    </div>
                    <div class="form-group">
                        <label for="Lv_Kematangan"><strong>Level Kematangan</strong></label>
                        <input type="number" class="form-control" placeholder="Level Kematangan" name="Lv_Kematangan" aria-describedby="sizing-addon2" min="0" required>
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
  <?php foreach ($dataCsm as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_CSM?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-Csm" method="POST" action="<?php echo base_url('Csm/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data Csm<br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="Id_CSM" value="<?php echo $value->Id_CSM?>">
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
                        <label for="Skor"><strong>Skor</strong></label>
                        <input type="number" class="form-control" placeholder="Skor" name="Skor" aria-describedby="sizing-addon2" min="0" required step="any" value="<?= $value->Skor ?>">
                    </div>
                    <div class="form-group">
                        <label for="Lv_Kematangan"><strong>Lv Kematangan</strong></label>
                        <input type="number" class="form-control" placeholder="Level Kematangan" name="Lv_Kematangan" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Lv_Kematangan?>">
                    </div>  
                    <div class="row">
                        <div class="col-sm-6">
                             <?php
                                if ($value->Dokumen==NUlL) {
                                    echo "Dokumen Belum Diunggah";
                                }else{
                            ?>
                               <a target="_blank" href="<?= base_url('assets')?>/pdf_files/csm/<?= $value->Dokumen?>"><img src="<?= base_url('assets')?>/img/PDF_icon.png" width="20%"><br><?= $value->Dokumen ?></a>
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
  <?php foreach ($dataCsm as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_CSM?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Arsipkan data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin mengarsipkan data CSM instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('Csm/archieve/' . $value->Id_CSM) ?>" class="btn btn-danger">Arsipkan</a>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Delete-->


<?php
/* End of file home.php */
/* Location: ./application/views/csm/home.php */
?>