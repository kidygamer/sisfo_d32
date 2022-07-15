<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Instansi</h3>

  <form id="form-update-instansi" method="POST" action="<?php echo base_url('Instansi/prosesTambah'); ?>">
    <input type="hidden" name="Id_Instansi" value="<?php echo $instansi->Id_Instansi?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Kota" name="Nama_Instansi" aria-describedby="sizing-addon2" value="<?php echo $instansi->Id_Instansi; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>