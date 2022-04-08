<div class="box">
  <div class="box-header">
   
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered" border="1">
      <?php
        foreach ($dataGrand as $value) {
      ?>
          <tr>
            <td colspan="5"><?= $value->Tahun ?></td>
            <td>
              <table>
                <tr><td colspan="5"><b>Laporan Persandian</b></td></tr>
                <tr>
                  <td><b>Jml SDM</b></td>
                  <td><b>Jml Palsan</b></td>
                  <td><b>Jml APU</b></td>
                  <td><b>Jml SE</b></td>
                  <td><b>Jml Dokumen</b></td>
                </tr>
                <tr><td><b>IKAMI</b></td></tr>
                <tr><td><b>CSM</b></td></tr>
                <tr><td><b>TMPI</b></td></tr>
                <tr><td><b>CSIRT</b></td></tr>
              </table>
            </td>
          </tr>
      <?php
        }
      ?>
        
      
    </table>
    
  </div>
</div>



<?php
/* End of file detail_grand.php */
/* Location: ./application/views/instansi/detail_grand.php */
?>