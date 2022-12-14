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
    <div class="col-md-3">
         <a href="#" data-toggle="modal" data-target="#addModal" class="form-control btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width:5%"><center>#</center></th>
          <th><center>Username</center></th>
          <th><center>Nama</center></th>
          <th><center>Aksi</center></th>
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataPengguna as $user) {
            ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><?php echo $user->username; ?></td>
              <td><?php echo $user->nama ?></td>
              <td class="text-center" style="min-width:230px;">
                 <a href="#" data-toggle="modal" data-target="#detailModal<?=$user->id?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
              	 <a href="#" data-toggle="modal" data-target="#rpModal<?=$user->id?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-wrench"></i> Reset Password</a>
                 <a href="#" data-toggle="modal" data-target="#updateModal<?=$user->id?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                 <a href="#" data-toggle="modal" data-target="#deleteModal<?=$user->id?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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

<!--Modal Detail-->
<?php foreach ($dataPengguna as $value): ?>
    <div class="modal fade" id="detailModal<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">             
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Detail Data Pengguna</b></h3></center>
                </div>
                <div class="modal-body">
                	<table class="table table-striped">
                		<tr><td><b>Nama</b></td><td><?= $value->nama ?></td></tr>
                		<tr><td><b>NIP</b></td><td><?= $value->nip ?></td></tr>
                		<tr><td><b>Jabatan</b></td><td><?= $value->jabatan ?></td></tr>
                        <tr><td><b>Sub-unit</b></td><td><?= $value->unit ?></td></tr>
                		<tr><td><b>Email</b></td><td><?= $value->email ?></td></tr>
                		<tr><td><b>Role</b></td><td><?= $value->role ?></td></tr>
                	</table>
                 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>              
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Detail-->

<!--Modal Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-lapsan" method="POST" action="<?php echo base_url('Pengguna/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Nama"><strong>Nama Lengkap</strong></label>
                                <input type="text" class="form-control" name="nama" aria-describedby="sizing-addon2" required placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="NIP"><strong>NIP</strong></label>
                                <input type="number" class="form-control" name="nip" aria-describedby="sizing-addon2" required minlength="18" min="0" placeholder="NIP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Jabatan"><strong>Jabatan</strong></label>
                                <input type="text" class="form-control" name="jabatan" aria-describedby="sizing-addon2" required placeholder="Jabatan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Email"><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email" aria-describedby="sizing-addon2" required placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Role"><strong>Role</strong></label>
                                <select name="role" required>
                                    <option value="">--Role--</option>
                                    <option value="editor">Editor</option>
                                    <option value="pimpinan">Pimpinan</option>
                                    <option value="administrator">Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="unit"><strong>Unit</strong></label>
                                <select name="unit" required>
                                    <option value="">--Unit--</option>
                                    <option value="D32">D32</option>
                                    <option value="D321">D321</option>
                                    <option value="D322">D322</option>
                                    <option value="D323">D323</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                        
                            <div class="form-group">
                                <label for="Username"><strong>Username</strong></label>
                                <input type="text" class="form-control" name="username" aria-describedby="sizing-addon2" required placeholder="Username">
                            </div>
                       
                            <div class="form-group">
                                <label for="Password"><strong>Password</strong></label>
                                <input type="password" class="form-control" name="password" aria-describedby="sizing-addon2" required placeholder="Password (*Kombinasi huruf dan angka, min. 10 karakter,maks. 20 karakter)">
                            </div>
                      
                    
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
  <?php foreach ($dataPengguna as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-lapsan" method="POST" action="<?php echo base_url('Pengguna/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data Pengguna</center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $value->id?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Nama"><strong>Nama Lengkap</strong></label>
                                <input type="text" class="form-control" name="nama" aria-describedby="sizing-addon2" required value="<?= $value->nama ?>" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nip"><strong>NIP</strong></label>
                                <input type="number" class="form-control" name="nip" aria-describedby="sizing-addon2" required value="<?= $value->nip ?>" minlength="18" min="0" placeholder="NIP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Jabatan"><strong>Jabatan</strong></label>
                                <input type="text" class="form-control" name="jabatan" aria-describedby="sizing-addon2" required value="<?= $value->jabatan ?>" placeholder="Jabatan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Email"><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email" aria-describedby="sizing-addon2" required value="<?= $value->email ?>" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Role"><strong>Role</strong></label>
                                <select name="role" required>
                                    <option value="">--Role--</option>
                                    <option value="editor" <?php if ($value->role == "editor") : ?> selected<?php endif; ?> >Editor</option>
                                    <option value="pimpinan" <?php if ($value->role == "pimpinan") : ?> selected<?php endif; ?> >Pimpinan</option>
                                    <option value="administrator" <?php if ($value->role == "administrator") : ?> selected<?php endif; ?> >Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="unit"><strong>Sub-unit</strong></label>
                                <select name="unit" required>
                                    <option value="">--Unit--</option>
                                    <option value="D32" <?php if ($value->unit == "D32") : ?> selected<?php endif; ?>>D32</option>
                                    <option value="D321" <?php if ($value->unit == "D321") : ?> selected<?php endif; ?>>D321</option>
                                    <option value="D322" <?php if ($value->unit == "D322") : ?> selected<?php endif; ?>>D322</option>
                                    <option value="D323" <?php if ($value->unit == "D323") : ?> selected<?php endif; ?>>D323</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Username"><strong>Username</strong></label>
                                <input type="text" class="form-control" name="username" aria-describedby="sizing-addon2" required value="<?= $value->username ?>" placeholder="Username">
                            </div>
                        </div>
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

<!--Modal Update Password-->
  <?php foreach ($dataPengguna as $value): ?>
    <div class="modal fade" id="rpModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-password" method="POST" action="<?php echo base_url('Pengguna/resetPassword'); ?>">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Reset Password <br> <b><?= $value->nama." - ".$value->username ?></b></h3></center>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $value->id?>">
                   
                    <div class="form-group">
                        <label for="Password_Baru"><strong>Password Baru</strong></label>
                        <input type="password" class="form-control" name="passBaru" aria-describedby="sizing-addon2" required placeholder="Password Baru (*Kombinasi huruf dan angka, min. 10 karakter,maks. 20 karakter)">
                    </div>
                      
                    <div class="form-group">
                        <label for="Password_Lama"><strong>Konfirmasi Password</strong></label>
                        <input type="password" class="form-control" name="passKonf" aria-describedby="sizing-addon2" required placeholder="Konfirmasi Password (*Ketikkan kembali password baru Anda)">
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
<!--End of Modal Update Password-->

<!--Modal Delete-->
  <?php foreach ($dataPengguna as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin menghapus data Pengguna ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Pengguna/archieve/' . $value->id) ?>" class="btn btn-danger">Hapus</a>
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
/* End of file laporan_persandian.php */
/* Location: ./application/views/laporan_persandian/home.php */
?>