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
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-tambah_ikami"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
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
          <th><center>Kategori SE</center></th>
          <th><center>Nilai</center></th>
          <th style="text-align: center;width: 5%;">Aksi</th>
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
              <td><center><?php echo $ikami->Kategori_SE ?></center></td>
              <td><center><?php echo $ikami->Nilai ?></center></td>
              <td class="text-center" style="min-width:230px;">
                  <a href="#" data-toggle="modal" data-target="#updateModal<?=$ikami->Id_IKAMI?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                 <a href="#" data-toggle="modal" data-target="#deleteModal<?=$ikami->Id_IKAMI?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Arsipkan</a>
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

<?php echo $modal_tambah_ikami; ?>

<?php
  // $data['judul'] = 'Kota';
  // $data['url'] = 'Kota/import';
  // echo show_my_modal('modals/modal_import', 'import-kota', $data);
?>

<!--Modals-->

<!--Modal Update-->
  <?php foreach ($dataIkami as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_IKAMI?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-ikami" method="POST" action="<?php echo base_url('Laporan_Persandian/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data IKAMI<br> <b><?= $value->Nama_Instansi ?></b> Tahun <b><?= $value->Tahun ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="Id_IKAMI" value="<?php echo $value->Id_IKAMI?>">
                  <input type="hidden" name="Instansi" value="<?php echo $value->Instansi?>">
                    <div class="form-group">
                        <label for="Tahun"><strong>Tahun</strong></label>
                        <input type="number" class="form-control" placeholder="Tahun" name="Tahun" aria-describedby="sizing-addon2" min="0" required value="<?= $value->Tahun ?>">
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
/* End of file laporan_persandian.php */
/* Location: ./application/views/laporan_persandian/home.php */
?>