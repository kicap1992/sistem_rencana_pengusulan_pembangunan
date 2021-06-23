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
        
        <div class="modal fade" id="lihat_informasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <h5 class="card-title" id="judul_modal"></h5>
                <div id="sini_body"></div>             
              </div>
              <div class="modal-footer">
                <div id="sini_button_modal"></div>
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">List Rencana Pembangunan Yang Disahkan Camat</h5>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Waktu Pengusulan</th>
                      <th>Kelurahan</th>
                      <th>Anggaran</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list->result() as $key => $value): 
                      $cek_status = $this->model->tampil_data_where('tb_status',array('no' => $value->status));
                      $cek_staff = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik'  => $value->nik))->result();
                      $cek_kelurahan = $this->model->tampil_data_where('tb_kelurahan',array('no' => $cek_staff[0]->kelurahan))->result();
                      foreach ($cek_status->result() as $key1 => $value1) ;
                      ?>
                      <tr style="background: #8FF085;">
                        <td><?=$i;$i++?></td>
                        <td><?=$value->tanggal_upload?></td>
                        <td><?=$cek_kelurahan[0]->kelurahan?></td>
                        <td>Rp. <?=$value->biaya?></td>
                        <td><?=$value1->status?></td>
                        <td>
                          <a data-toggle="modal" data-id="<?=$value->no?>" title="Lihat Informasi Pengusulan Rencana Pembangunan" class="lihat_informasi btn btn-primary btn-sm nc-icon nc-zoom-split" href="#lihat_informasi" id="klik_<?=$value->no?>"></a>
                        </td>
                      </tr>
                    <?php endforeach ?>
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
  
  <script type="text/javascript">
    $(document).on("click", ".lihat_informasi", function () {
      var id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "<?=base_url()?>admin/rencana_pembangunan",
        type: 'post',
        data: {id :id , info : "lihat"},
        dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          var html =  '<div class="form-group">'+
                        '<label>Kelurahan</label>'+
                        '<input type="text" class="form-control" maxlength="11" value="'+response['kelurahan']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Tanggal Pengusulan</label>'+
                        '<input type="text" class="form-control" maxlength="11" value="'+response['tanggal_upload']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Judul Laporan Rencana Pembangunan</label>'+
                        '<textarea class="form-control" name="judul" style="resize: none;" disabled>'+response['judul']+'</textarea>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Jumlah Anggaran Biaya Pembangunan <b><i>(Rp. )</i></b></label>'+
                        '<input type="text" class="form-control"  maxlength="11" value="'+response['biaya']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Status</label>'+
                        '<input type="text" class="form-control"  maxlength="11" value="'+response['ket_status']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<a onclick="window.open('+"'"+'ms-excel:ofe|u|<?=base_url()?>'+response['exel_url']+"'"+')"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" >Lihat Laporan Rencana Pembangunan</button></a><br><a href="<?=base_url()?>'+response['exel_url']+'"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" >Download Laporan Rencana Pembangunan</button></a>'+
                      '</div>'+
                      '<div class="sini_tolak_textarea form-group">'+
                      '</div>';
          $("#lihat_informasi .modal-body #sini_body").html(html);

          $("#lihat_informasi .modal-body #judul_modal").html("Informasi Laporan <br> Rencana Pembangunan");
        }
      });
    });
  </script>

  <script>
    $(document).ready(function(){
      $('#tabel-data').DataTable();
    })
  </script>

</body>

</html>
