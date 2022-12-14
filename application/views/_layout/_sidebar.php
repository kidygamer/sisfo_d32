<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      <?php if ($userdata->foto==NUlL) {
          ?>
            <img src="<?php echo base_url(); ?>assets/img/ProfilePicture-1.jpg" class="user-circle" alt="User Image">
          <?php
          }else{
          ?>
             <div class="image-cropper2">
              <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="rounded2" />
            </div>
          <?php
          } ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <i class="fa fa-circle text-success"></i> <?php echo $userdata->role." - ".$userdata->unit; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Beranda</span>
        </a>
      </li>

      <li <?php if ($page == 'instansi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Instansi'); ?>">
          <i class="fa fa-building"></i>
          <span>INSTANSI PEMDA</span>
        </a>
      </li>
      
      <?php 
        if ($userdata->role == 'administrator' || $userdata->role == 'pimpinan' || $userdata->unit == 'D321') {
      ?>

        <li <?php if ($page == 'laporan_persandian') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Laporan_Persandian'); ?>">
            <i class="fa fa-book"></i>
            <span>Evaluasi Laksan</span>
          </a>
        </li>
      <?php
        }
      ?>

      <?php 
        if ($userdata->role == 'administrator' || $userdata->role == 'pimpinan' || $userdata->unit == 'D322') {
      ?>

        <li <?php if ($page == 'ikami') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Ikami'); ?>">
            <i class="fa fa-book"></i>
            <span>IKAMI</span>
          </a>
        </li>

        <li <?php if ($page == 'csm') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Csm'); ?>">
            <i class="fa fa-book"></i>
            <span>CSM</span>
          </a>
        </li>
      <?php
        }
      ?>

      <?php 
        if ($userdata->role == 'administrator' || $userdata->role == 'pimpinan' || $userdata->unit == 'D323') {
      ?>
         <li <?php if ($page == 'csirt') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Csirt'); ?>">
            <i class="fa fa-book"></i>
            <span>CSIRT</span>
          </a>
        </li>

         <li <?php if ($page == 'tmpi') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Tmpi'); ?>">
            <i class="fa fa-book"></i>
            <span>TMPI</span>
          </a>
        </li>
      <?php
        }
      ?>

      <li <?php if ($page == 'fasilitas_lki') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Fasilitas_Lki'); ?>">
          <i class="fa fa-building"></i>
          <span>Fasilitas LKI</span>
        </a>
      </li>

      <?php 
        if ($userdata->role == 'administrator' || $userdata->role == 'editor') {
      ?>
         <li <?php if ($page == 'pic') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Pic'); ?>">
            <i class="fa fa-male"></i>
            <span>PIC Instansi</span>
          </a>
        </li>
      <?php
        }
      ?>

      <?php 
        if ($userdata->role == 'administrator') {
      ?>
          <li <?php if ($page == 'pengguna') {echo 'class="active"';} ?>>
            <a href="<?php echo base_url('Pengguna'); ?>">
              <i class="fa fa-user"></i>
              <span>Data Pengguna</span>
            </a>
          </li>

          <!-- <li <?php //if ($page == 'provinsi') {echo 'class="active"';} ?>>
            <a href="<?php //echo base_url('Instansi/dashboard'); ?>">
              <i class="fa fa-building"></i>
              <span>Provinsi</span>
            </a>
          </li> -->
      <?php
        }
      ?>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>