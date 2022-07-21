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
       <?php 
            if (($userdata->role == 'administrator' || $userdata->unit == 'D323') && $userdata->role != 'pimpinan') {
                echo "<a href='#' data-toggle='modal' data-target='#addModal' class='form-control btn btn-primary'><i class='glyphicon glyphicon-pencil'></i> Tambah Data</a>";
            }
        ?>          
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width:5%"><center>#</center></th>
          <th><center>Nama Instansi</center></th>
          <th><center>Nama CSIRT</center></th>
          <th><center>Detail</center></th>
          <?php 
                if ( $userdata->role != 'pimpinan') {
           ?>
                  <th><center>Dokumen</center></th> 
           <?php
                }
          ?> 

          <?php 
                if (($userdata->role == 'administrator' || $userdata->unit == 'D323') && $userdata->role != 'pimpinan') {
                  echo "<th style='text-align: center;width: 5%;'>Aksi</th>";
                }
          ?>           
        </tr>
      </thead>
      <tbody id="data-instansi">
        <?php
          $no = 1;
          foreach ($dataCsirt as $csirt) {
            ?>
            <tr>
              <td><center><?php echo $no; ?></center></td>
              <td><?php echo $csirt->Nama_Instansi; ?></td>
              <td><center><?php echo $csirt->Nama_CSIRT ?></center></td>
              <td>
                <center>
                  <a href="#" data-toggle="modal" data-target="#detailModal<?=$csirt->Id_CSIRT?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                </center>
              </td>
              <?php 
                if ( $userdata->role != 'pimpinan') {
               ?>
                       <td>
                        <center>
                          <?php
                              if ($csirt->Dokumen==NUlL) {
                                  echo "Belum Diunggah";
                              }else{
                          ?>
                              <a href="<?= base_url('assets')?>/pdf_files/csirt/<?= $csirt->Dokumen?>" download="<?php echo "CSIRT-".$csirt->Nama_Instansi."-".$csirt->Tahun?>" class="btn btn-success btn-sm"><center><i class="glyphicon glyphicon-download"></i>Unduh</center></a>
                          <?php
                              }
                          ?>
                        </center>
                      </td>
               <?php
                    }
              ?> 
             
              
                <?php 
                    if (($userdata->role == 'administrator' || $userdata->unit == 'D323') && $userdata->role != 'pimpinan') {
                ?>
                      <td class="text-center" style="min-width:230px;">
                        <a href="#" data-toggle="modal" data-target="#updateModal<?=$csirt->Id_CSIRT?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-repeat"></i> Update</a>
                        <?php 
                          if ($userdata->role == 'administrator'){
                        ?>
                            <a href="#" data-toggle="modal" data-target="#deleteModal<?=$csirt->Id_CSIRT?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a> 
                        <?php
                          }
                        ?>                        
                      </td>
                <?php
                    }
                ?>   
              
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
<?php foreach ($dataCsirt as $value): ?>
    <div class="modal fade" id="detailModal<?= $value->Id_CSIRT ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">             
                <div class="modal-header">
                     <center><h3 class="modal-title" id="exampleModalLabel">Data CSIRT<br> <b><?= $value->Nama_Instansi ?></b></h3></center>
                </div>
                <div class="modal-body">
                  <table class="table table-striped">
                    <tr>
                      <td style="width:40%"><b>Status</b></td>
                      <td><?php echo $value->Status ?></td>
                    </tr>
                    <tr>
                      <td><b>Tgl Launching</b></td>
                      <td><?php echo date('d F Y', strtotime(str_replace('/', '-', $value->Tgl_Launching)));?></td>
                    </tr>
                    <tr>
                      <td><b>Nama CSIRT</b></td>
                      <td><?php echo $value->Nama_CSIRT ?></td>
                    </tr>
                    <tr>
                      <td><b>Tgl STR</b></td>
                      <td><?php echo date('d F Y', strtotime(str_replace('/', '-', $value->Tgl_STR)));?></td>
                    </tr>
                    <tr>
                      <td><b>No.Sertifikat</b></td>
                      <td><?php echo $value->Nomor_Sertifikat ?></td>
                    </tr>
                    <tr>
                      <td><b>Narahubung</b></td>
                      <td><?php  
                              if (empty($value->Narahubung)) {
                                echo   "-";
                              }else{
                                echo nl2br($value->Narahubung);
                              }
                          ?>
                            
                      </td>
                    </tr>
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
              <form id="form-add-csirt" method="POST" action="<?php echo base_url('Csirt/prosesTambah'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Tambah Data CSIRT</h3></center>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Instansi"><strong>Instansi</strong></label>
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
                    <div class="form-group">
                        <label for="Tahun"><strong>Tahun</strong></label>
                        <select name="Tahun" placeholder="Pilih Tahun">
                          <option value="" selected disabled>--Pilih--</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Nama_CSIRT"><strong>Nama CSIRT</strong></label>
                              <input type="text" class="form-control" placeholder="Nama CSIRT" name="Nama_CSIRT" aria-describedby="sizing-addon2" required>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Tgl_Launching"><strong>Tanggal Launching</strong></label>
                              <input type="date" class="form-control" name="Tgl_Launching" aria-describedby="sizing-addon2" required>
                          </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Nomor_Sertifikat"><strong>Nomor Sertifikat</strong></label>
                              <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="Nomor_Sertifikat" aria-describedby="sizing-addon2" required>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Tgl_STR"><strong>Tanggal STR</strong></label>
                              <input type="date" class="form-control" name="Tgl_STR" aria-describedby="sizing-addon2">
                          </div>
                        </div>
                    </div>

                    <!-- <div id="dynamic_field">
                      <div class="row">
                          <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Nama_Narahubung"><strong>Nama Narahubung</strong></label>
                                <input type="text" id="name" class="form-control" placeholder="Nama Narahubung" name="Nama_Narahubung[]" aria-describedby="sizing-addon2">
                            </div> 
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Nomor_HP"><strong>Nomor HP</strong></label>
                                <input type="number" id="mobno" class="form-control" placeholder="Nomor HP" name="Nomor_HP[]" aria-describedby="sizing-addon2" min="0">
                            </div> 
                          </div>
                          <div class="col-sm-1">
                            <div class="form-group">
                              <label for="Nomor_HP"><strong>Tambah</strong></label>
                                <button type="button" name="add" id="add" class="btn btn-success">+</button>
                            </div> 
                          </div>
                      </div>   
                    </div> -->    
                    <div class="form-group">
                          <label for="Narahubung"><strong>Narahubung</strong></label>
                          <textarea class="form-control" name="Narahubung" placeholder="Narahubung" required rows="5" required></textarea>
                    </div>        
                    
                    <div class="form-group">
                      <label for="Dokumen"><strong>Unggah Dokumen:</strong></label>
                      <br>                      
                      <input type="file" class="form-control" name="Dokumen"><br><small>*file format .pdf dengan ukuran maksimal 30Mb</small><strong></strong>
                    </div> 
                            
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <input type="submit" name="" class="btn btn-warning" value="Tambah Data">
                </div>
              </form>
            </div>
        </div>
    </div>
<!--End of Modal Add-->

<!--Modal Update-->
  <?php foreach ($dataCsirt as $value): ?>
    <div class="modal fade" id="updateModal<?=$value->Id_CSIRT?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form id="form-update-ikami" method="POST" action="<?php echo base_url('Csirt/prosesUpdate'); ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <center><h3 class="modal-title" id="exampleModalLabel">Update Data CSIRT<br> <b><?= $value->Nama_Instansi ?></b></h3></center>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="Id_CSIRT" value="<?php echo $value->Id_CSIRT?>">
                   <div class="form-group">
                        <label for="Instansi"><strong>Instansi</strong></label>
                        <select name="Instansi" placeholder="Pilih instansi...">
                          <option value="" selected>--Instansi--</option>
                          <?php
                            foreach ($dataInstansi as $instansi) {
                              ?>
                              <option value="<?=$instansi->Id_Instansi ?>" <?php if ($value->Instansi == $instansi->Id_Instansi) : ?> selected<?php endif; ?>>
                                <?= $instansi->Nama_Instansi ?></option>
                          <?php
                            }
                          ?>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="Tahun"><strong>Tahun</strong></label>
                        <select name="Tahun" placeholder="Pilih Tahun">
                            <option value="" selected disabled>--Pilih--</option>
                            <option value="2018" <?php if ($value->Tahun == "2018") : ?> selected<?php endif; ?>>2018</option>
                            <option value="2019" <?php if ($value->Tahun == "2019") : ?> selected<?php endif; ?>>2019</option>
                            <option value="2020" <?php if ($value->Tahun == "2020") : ?> selected<?php endif; ?>>2020</option>
                            <option value="2021" <?php if ($value->Tahun == "2021") : ?> selected<?php endif; ?>>2021</option>
                            <option value="2022" <?php if ($value->Tahun == "2022") : ?> selected<?php endif; ?>>2022</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Nama_CSIRT"><strong>Nama CSIRT</strong></label>
                              <input type="text" class="form-control" placeholder="Nama CSIRT" name="Nama_CSIRT" aria-describedby="sizing-addon2" required value="<?= $value->Nama_CSIRT?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Tgl_Launching"><strong>Tanggal Launching</strong></label>
                              <input type="date" class="form-control" name="Tgl_Launching" aria-describedby="sizing-addon2" max="<?= date("Y-m-d") ?>" required value="<?= $value->Tgl_Launching?>">
                          </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Nomor_Sertifikat"><strong>Nomor Sertifikat</strong></label>
                              <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="Nomor_Sertifikat" aria-describedby="sizing-addon2" required value="<?= $value->Nomor_Sertifikat?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Tgl_STR"><strong>Tanggal STR</strong></label>
                              <input type="date" class="form-control" name="Tgl_STR" aria-describedby="sizing-addon2" max="<?= date("Y-m-d") ?>" required value="<?= $value->Tgl_STR?>">
                          </div>
                        </div>
                    </div>

                    <?php 
                        // $data = array();
                        // $data = explode(',', $value->Narahubung);
                        //   //print_r ($val);
                         
                        // foreach($data as $key => $val) {
                        //     $new = explode('-',$val);
                        //     $data[$key] = $new;
                        // }
                        // $output = $data;

                        if ($value->Narahubung == NULL) {
                    ?>
                        <!-- <div id="dynamic_fields"> -->
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="Nama_Narahubung"><strong>Nama Narahubung</strong></label>
                                  <input type="text" id="names" class="form-control" placeholder="Nama Narahubung" name="Nama_Narahubung[]" aria-describedby="sizing-addon2" required>
                               </div> 
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="Nomor_HP"><strong>Nomor HP</strong></label>
                                  <input type="text" id="mobnos" class="form-control" placeholder="Nomor HP" name="Nomor_HP[]" aria-describedby="sizing-addon2" min="0" required>
                              </div> 
                            </div> 
                                        <!-- <div class="col-sm-1">
                                          <div class="form-group">
                                            <label for="Nomor_HP"><strong>Tambah</strong></label>
                                              <button type="button" name="adds" id="adds" class="btn btn-success">+</button>
                                          </div> 
                                        </div>  -->                     
                          </div>
                        <!-- </div> -->                                   

                    <?php
                            
                        }else{
                    ?>     
                           <div class="form-group">
                            <label for="Narahubung"><strong>Narahubung</strong></label>
                            <textarea class="form-control" name="Narahubung" placeholder="Narahubung" required rows="5"><?= $value->Narahubung ?></textarea>
                          </div>
                    <?php

                        }                       
                    // echo '<pre>';
                    // print_r($output);
                    ?>
                    
                    <div class="row">
                        <div class="col-sm-6">
                             <?php
                                if ($value->Dokumen==NUlL) {
                                    echo "Dokumen Belum Diunggah";
                                }else{
                            ?>
                               <a target="_blank" href="<?= base_url('assets')?>/pdf_files/csirt/<?= $value->Dokumen?>"><img src="<?= base_url('assets')?>/img/PDF_icon.png" width="20%"><br><?= $value->Dokumen ?></a>
                            <?php
                                }
                            ?>
                            
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" name="recent_dokumen" value="<?php echo $value->Dokumen?>">
                            <div class="form-group">
                              <label for="Dokumen"><strong>Unggah Dokumen:</strong></label>
                              <br>                      
                              <input type="file" class="form-control" name="Dokumen"><br><small>*file format .pdf dengan ukuran maksimal 30Mb</small>      
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

<!--Modal Delete-->
  <?php foreach ($dataCsirt as $value): ?>
    <div class="modal fade" id="deleteModal<?=$value->Id_CSIRT?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data ini?</h5>
                </div>
                <div class="modal-body">Anda yakin ingin menghapus data CSIRT instansi <b><?=  $value->Nama_Instansi ?></b>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a href="<?= base_url('Csirt/archieve/' . $value->Id_CSIRT) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach ?>
<!--End of Modal Delete-->

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'"><div class="row"><div class="col-sm-5"><div class="form-group"><label for="Nama_Narahubung">Nama Narahubung</label><input type="text" id="name" class="form-control" placeholder="Nama Narahubung" name="Nama_Narahubung[]" aria-describedby="sizing-addon2"></div></div><div class="col-sm-5"><div class="form-group"><label  for="Nomor_HP">Nomor HP</label><input type="number" class="form-control" id="mobno" placeholder="Nomor HP" name="Nomor_HP[]" aria-describedby="sizing-addon2"></div></div><div class="col-sm-1"><div class="form-group"><label for="x"><strong>Hapus</strong></label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Hapus form ini?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  


     var j=1;  
   
      $('#adds').click(function(){  
           j++;             
           $('#dynamic_fields').append('<div id="rows'+j+'"><div class="row"><div class="col-sm-5"><div class="form-group"><label for="Nama_Narahubung">Nama Narahubung</label><input type="text" id="names" class="form-control" placeholder="Nama Narahubung" name="Nama_Narahubung[]" aria-describedby="sizing-addon2"></div></div><div class="col-sm-5"><div class="form-group"><label  for="Nomor_HP">Nomor HP</label><input type="number" class="form-control" id="mobnos" placeholder="Nomor HP" name="Nomor_HP[]" aria-describedby="sizing-addon2"></div></div><div class="col-sm-1"><div class="form-group"><label for="x"><strong>Hapus</strong></label><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_removes">X</button></div></div></div>');
     });
     
     $(document).on('click', '.btn_removes', function(){  
           var button_ids = $(this).attr("id"); 
           var ress = confirm('Hapus form ini?');
           if(ress==true){
           $('#row'+button_ids+'').remove();  
           $('#'+button_ids+'').remove();  
           }
      });  
  
    });

</script>

<script type="text/javascript">
    $('#addModal').on('hidden.bs.modal', function () {
         location.reload();
        })
</script>

<?php
/* End of file home.php */
/* Location: ./application/views/csirt/home.php */
?>