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
          <th><center>Skor</center></th>
          <th><center>Level Kematangan</center></th>
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

<?php //echo $modal_tambah_ikami; ?>

<?php
  // $data['judul'] = 'Kota';
  // $data['url'] = 'Kota/import';
  // echo show_my_modal('modals/modal_import', 'import-kota', $data);
?>

<!--Modals-->


<?php
/* End of file laporan_persandian.php */
/* Location: ./application/views/laporan_persandian/home.php */
?>