<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data IKAMI</h3>

  <form id="form-tambah-instansi" method="POST" action="<?php echo base_url('Ikami/prosesTambah'); ?>" enctype="multipart/form-data">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
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
     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <select name="Hasil_IKAMI" placeholder="Hasil IKAMI">
        <option value="Pemenuhan KK Dasar" selected >Pemenuhan KK Dasa</option>
        <option value="Baik">Baik</option>
        <option value="Cukup">Cukup</option>
        <option value="Tidak Layak">Tidak Layak</option>
      </select>    
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Tahun" name="Tahun" aria-describedby="sizing-addon2" min="0" required>
    </div>
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
      <input type="number" class="form-control" placeholder="Jumlah SDM Persandian" name="Jml_SDM" aria-describedby="sizing-addon2" min="0" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Peralatan Sandi" name="Jml_Palsan" aria-describedby="sizing-addon2" min="0" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah APU" name="Jml_APU" aria-describedby="sizing-addon2" min="0" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Sistem Elektronik" name="Jml_SE" aria-describedby="sizing-addon2" min="0" required>
    </div>
    <div class="input-group form-group">
      <label for="Dokumen"><strong>Unggah Dokumen:</strong></label>
      <br>                      
      <input type="file" class="form-control" name="Dokumen" required>      
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>