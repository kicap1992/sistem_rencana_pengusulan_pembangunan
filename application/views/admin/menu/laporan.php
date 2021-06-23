<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('admin/head') ?>

<body class="">
  <div class="wrapper ">
    
    <?php $this->load->view('admin/sidebar') ?>

    <div class="main-panel">
      
      <?php $this->load->view('admin/navbar') ?>
 
      <div class="content">

        <?php $this->load->view('admin/atas') ?>

        <!-- sini letak main -->
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">List Pengusulan Rencana Pembangunan</h5>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      $data = $this->model->custom_query("SELECT DISTINCT EXTRACT( YEAR_MONTH FROM `tanggal_upload` ) FROM tb_rencana_pembangunan");
                      foreach ($data->result_array() as $key => $value) { 
                        $bulan = substr($value["EXTRACT( YEAR_MONTH FROM `tanggal_upload` )"],4);
                        $bulan1 = $this->model->bulan($bulan);
                        $tahun = substr($value["EXTRACT( YEAR_MONTH FROM `tanggal_upload` )"],0,4);
                        ?>
                        <tr>
                          <td><?=$bulan1?></td>
                          <td><?=$tahun?></td>
                          <td>
                            <a class="btn btn-primary btn-sm nc-icon nc-zoom-split" href="<?=base_url()?>admin/laporan/<?=$tahun.'-'.$bulan?>"></a>
                          </td>
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> 

        
        <!-- sini akhir letak main -->

      </div>
      


      <?php $this->load->view('admin/footer') ?>
    </div>
  </div>
  
  <?php $this->load->view('admin/script') ?>
  <!-- bawah sini letak js tambahan -->
  <script src="<?=base_url()?>assets/js/datatables/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.js"></script>
  
  
  

  
  <script>
    $(document).ready(function(){

      $('#tabel-data').DataTable();
    })
  </script>

</body>

</html>
