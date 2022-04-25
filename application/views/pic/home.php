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
          <th>Nama PIC</th>
          <th>Nomor HP</th>
          <th>Kategori</th>
          <th style="text-align: center;">Detail</th>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataPic as $pic) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pic->Nama_Instansi; ?></td>
              <td><?php echo $pic->nama; ?></td>
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
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data PIC</h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
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
    <div class="modal fade" id="updateModal<?=$value->Id_Instansi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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