<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Laporan Persandian Baru</h3>

  <form id="form-tambah-instansi" method="POST" action="<?php echo base_url('Pengguna/prosesTambah'); ?>" enctype="multipart/form-data">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" aria-describedby="sizing-addon2" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="number" class="form-control" placeholder="NIK" name="nik" aria-describedby="sizing-addon2" required minlength="18" min="0">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" aria-describedby="sizing-addon2" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" required>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <select name="role">
        <option value="">--Role--</option>
        <option value="editor">Editor</option>
        <option value="pimpinan">Pimpinan</option>
        <option value="administrator">Administrator</option>
      </select>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">          
          <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon2" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">         
          <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="sizing-addon2" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>