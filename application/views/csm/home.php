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
          <th><center>Skor</center></th>
          <th><center>Level Kematangan</center></th>  
           <?php 
                if ( $userdata->role != 'pimpinan') {
           ?>
                  <th><center>Dokumen</center></th> 
           <?php
                }
          ?> 
            <?php 
                if (($userdata->role == 'administrator' || $userdata->unit == 'D322') && $userdata->role != 'pimpinan') {
                    echo "<th style='text-align: center;width: 5%;'>Aksi</th>";
                }
            ?>  
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataCsm as $csm) {
            ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><?php echo $csm->Nama_Instansi; ?></td>
              <td><center><?php echo $csm->Tahun ?></center></td>
              <td><center><?php echo $csm->Skor ?></center></td>
              <td><center><?php echo $csm->Lv_Kematangan ?></center></td>
               <?php 
                if ( $userdata->role != 'pimpinan') {
               ?>
                       <td>
                        <center>
                          <?php
                              if ($csm->Dokumen==NUlL) {
                                  echo "Belum Diunggah";
                              }else{
                          ?>
                              <a href="<?= base_url('assets')?>/pdf_files/csm/<?= $csm->Dokumen?>" download="<?php echo "CSM-".$csm->Nama_Instansi."-".$csm->Tahun?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Unduh</center></a>
                          <?php
                              }
                          ?>
                        </center>
                      </td>
               <?php
                    }
              ?> 
              
                <?php 
                    if (($userdata->role == 'administrator' || $userdata->unit == 'D322') && $userdata->role != 'pimpinan') {
                ?>
                        <td class="text-center" style="min-width:230px;">
                         <a href="#" data-toggle="modal" data-target="#updateModal<?=$csm->Id_CSM?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                        <?php 
                          if ($userdata->role == 'administrator'){
                        ?>
                            <a href="#" data-toggle="modal" data-target="#deleteModal<?=$csm->Id_CSM?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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

<!--Modal Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-add-Csm" method="POST" action="<?php echo base_url('Csm/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data CSM</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                        <select name="Tahun" placeholder="Pilih Tahun">
                          <option value="" selected disabled>--Pilih--</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Skor"><strong>Skor</strong></label>
                        <input type="number" class="form-control" placeholder="Skor" name="Skor" aria-describedby="sizing-addon2" min="0" required step="any">
                    </div>
                    <div class="form-group">
                        <label for="Lv_Kematangan"><strong>Level Kematangan</strong></label>
                        <input type="text" class="form-control" placeholder="Level Kematangan" name="Lv_Kematangan" aria-describedby="sizing-addon2" required>
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
  <?php foreach ($dataCsm as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_CSM?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-Csm" method="POST" action="<?php echo base_url('Csm/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data CSM<br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                        <select name="Tahun" placeholder="Pilih Tahun">
                            <option value="" selected disabled>--Pilih--</option>
                            <option value="2018" <?php if ($value->Tahun == "2018") : ?> selected<?php endif; ?>>2018</option>
                            <option value="2019" <?php if ($value->Tahun == "2019") : ?> selected<?php endif; ?>>2019</option>
                            <option value="2020" <?php if ($value->Tahun == "2020") : ?> selected<?php endif; ?>>2020</option>
                            <option value="2021" <?php if ($value->Tahun == "2021") : ?> selected<?php endif; ?>>2021</option>
                            <option value="2022" <?php if ($value->Tahun == "2022") : ?> selected<?php endif; ?>>2022</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Skor"><strong>Skor</strong></label>
                        <input type="number" class="form-control" placeholder="Skor" name="Skor" aria-describedby="sizing-addon2" min="0" required step="any" value="<?= $value->Skor ?>">
                    </div>
                    <div class="form-group">
                        <label for="Lv_Kematangan"><strong>Level Kematangan</strong></label>
                        <input type="text" class="form-control" placeholder="Level Kematangan" name="Lv_Kematangan" aria-describedby="sizing-addon2" required value="<?= $value->Lv_Kematangan?>">
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
  <?php foreach ($dataCsm as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_CSM?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin menghapus data CSM instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Csm/archieve/' . $value->Id_CSM) ?>" class="btn btn-danger">Hapus</a>
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
/* Location: ./application/views/csm/home.php */
?>