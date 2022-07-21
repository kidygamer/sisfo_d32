<div class="box">
  <div class="box-header">
    <div class="col-md-1">
      <a href="<?php echo base_url('Home'); ?>" class="form-control btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>         
    </div>

    <center><strong><h3><?= $dataProvinsi->nama ?></h3></strong></center>

  </div>
  <!-- /.box-header -->
  <div class="box-body">

   <table id="list-data" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Instansi</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataInstansi as $instansi) {
            ?>
            <tr>
              <td style="width:5%; text-align: center;"><?php echo $no; ?></td>
              <td><?php echo $instansi->Nama_Instansi; ?></td>
              <td>
                <a href="<?php echo base_url('Instansi/detail_grand/'.$instansi->Id_Instansi); ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
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

<?php
/* End of file instansi_by_prov.php */
/* Location: ./application/views/instansi/instansi_by_prov.php */
?>