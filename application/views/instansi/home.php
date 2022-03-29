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
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-instansi"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Instansi</th>
          <th style="text-align: center;">Aksi</th>
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
              <td class="text-center" style="min-width:230px;">
                  <a href="#" data-toggle="modal" data-target="#updateModal<?=$instansi->Id_Instansi?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                  <a href="#" data-toggle="modal" data-target="#deleteModal<?=$instansi->Id_Instansi?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
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

<?php echo $modal_tambah_instansi; ?>

<?php
  // $data['judul'] = 'Kota';
  // $data['url'] = 'Kota/import';
  // echo show_my_modal('modals/modal_import', 'import-kota', $data);
?>

<!--Modals-->

<!--Modal Update-->
  <?php foreach ($dataInstansi as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_Instansi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-instansi" method="POST" action="<?php echo base_url('Instansi/prosesUpdate'); ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="Id_Instansi" value="<?php echo $instansi->Id_Instansi?>">
                  <div class="input-group form-group">
                    <span class="input-group-addon" id="sizing-addon2">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Nama Instansi" name="Nama_Instansi" aria-describedby="sizing-addon2" value="<?=  $value->Nama_Instansi ?>">
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
  <?php foreach ($dataInstansi as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_Instansi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('Instansi/delete/' . $value->Id_Instansi) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Delete-->

<?php
/* End of file home.php */
/* Location: ./application/views/instansi/home.php */
?>