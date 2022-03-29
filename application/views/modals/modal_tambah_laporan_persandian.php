<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Laporan Persandian</h3>

  <form id="form-tambah-instansi" method="POST" action="<?php echo base_url('Laporan_Persandian/prosesTambah'); ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <textarea class="form-control" name="Saran_uBSSN" placeholder="Saran untuk BSSN" required></textarea>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah SDM Persandian" name="Jml_SDM" aria-describedby="sizing-addon2" min="0" value="0" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Peralatan Sandi" name="Jml_Palsan" aria-describedby="sizing-addon2" min="0" value="0" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah APU" name="Jml_APU" aria-describedby="sizing-addon2" min="0" value="0" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Sistem Elektronik" name="Jml_SE" aria-describedby="sizing-addon2" min="0" value="0" required>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>