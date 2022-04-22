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
          <th>Nama Instansi</th>
          <th>Provinsi</th>
          <th style="text-align: center;">Detail</th>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataInstansi as $instansi) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $instansi->Nama_Instansi; ?></td>
              <td><?php echo $instansi->nama; ?></td>
              <td class="text-center" style="min-width:230px;">
                  <a href="<?php echo base_url('Instansi/detail_grand/'.$instansi->Id_Instansi); ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                  <?php 
                      if ($userdata->role == 'administrator') {
                  ?>
                        <a href="#" data-toggle="modal" data-target="#updateModal<?=$instansi->Id_Instansi?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?=$instansi->Id_Instansi?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Arsipkan</a>
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
              <form id="form-add-Instansi" method="POST" action="<?php echo base_url('Instansi/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Provinsi"><strong>Provinsi</strong></label>
                        <select name="Provinsi" placeholder="Provinsi">
                          <option value="" selected>--Provinsi--</option>
                          <?php
                            foreach ($dataProvinsi as $prov) {
                              ?>
                              <option value="<?=$prov->id ?>"><?= $prov->nama ?></option>
                          <?php
                            }
                          ?>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="Nama_Instansi"><strong>Nama Instansi</strong></label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="Nama_Instansi" aria-describedby="sizing-addon2" required>
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
  <?php foreach ($dataInstansi as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_Instansi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-instansi" method="POST" action="<?php echo base_url('Instansi/prosesUpdate'); ?>">
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Update Data Instansi<br> <b><?= $value->Nama_Instansi ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="Id_Instansi" value="<?php echo $value->Id_Instansi?>">
                        <label for="Provinsi"><strong>Provinsi</strong></label>
                        <select name="Provinsi" placeholder="Provinsi">
                          <option value="" selected>--Provinsi--</option>
                          <?php
                            foreach ($dataProvinsi as $prov) {
                              ?>
                              <option value="<?=$prov->id ?>" <?php if ($value->Provinsi == $prov->id) : ?> selected<?php endif; ?>>
                                <?= $prov->nama ?></option>
                          <?php
                            }
                          ?>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="Nama_Instansi"><strong>Nama Instansi</strong></label>
                        <input type="text" class="form-control" placeholder="Nama Instansi" name="Nama_Instansi" aria-describedby="sizing-addon2" required value="<?= $value->Nama_Instansi?>">
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
  <?php foreach ($dataInstansi as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_Instansi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Arsipkan data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin mengarsipkan data instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Instansi/archieve/' . $value->Id_Instansi) ?>" class="btn btn-danger">Arsipkan</a>
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
/* Location: ./application/views/instansi/home.php */
?>