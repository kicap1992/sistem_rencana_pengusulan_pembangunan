<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('camat/head') ?>

<body class="">
  <div class="wrapper ">
    
    <?php $this->load->view('camat/sidebar') ?>

    <div class="main-panel">
      
      <?php $this->load->view('camat/navbar') ?>
 
      <div class="content">

        <?php $this->load->view('camat/atas') ?>

        <!-- sini letak main -->
        
        <div class="modal fade" id="lihat_informasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <h5 class="card-title" id="judul_modal">Informasi Laporan <br>Rencana Pembangunan</h5>
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
                <h5 class="card-title">List Pengusulan Rencana Pembangunan Yang Diterima Admin</h5>
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
                      if ($value->status == 1 or $value->status == 2) {?>
                        <tr style="background: #f6a828; ">
                        <?php
                      }elseif ($value->status == 4 or $value->status == 5) { ?>
                        <tr style="background: #BD4A31; ">
                        <?php
                      }elseif ($value->status == 3) { ?>
                        <tr style="background: #8FF085; ">
                        <?php
                      }
                      foreach ($cek_status->result() as $key1 => $value1) ;
                      ?>
                      
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

        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">List Pengusulan Yang Ditolak Camat</h5>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table id="tabel-data1" class="table table-striped table-bordered" width="100%" cellspacing="0" >
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
                    <?php $i = 1; foreach ($list_ditolak->result() as $key => $value): 
                      $cek_status = $this->model->tampil_data_where('tb_status',array('no' => $value->status));
                      $cek_staff = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik'  => $value->nik))->result();
                      $cek_kelurahan = $this->model->tampil_data_where('tb_kelurahan',array('no' => $cek_staff[0]->kelurahan))->result();
                      if ($value->status == 1 or $value->status == 2) {?>
                        <tr style="background: #f6a828; ">
                        <?php
                      }elseif ($value->status == 4 or $value->status == 5) { ?>
                        <tr style="background: #BD4A31; ">
                        <?php
                      }elseif ($value->status == 3) { ?>
                        <tr style="background: #8FF085; ">
                        <?php
                      }
                      foreach ($cek_status->result() as $key1 => $value1) ;
                      ?>
                      
                        <td><?=$i;$i++?></td>
                        <td><?=$value->tanggal_upload?></td>
                        <td><?=$cek_kelurahan[0]->kelurahan?></td>
                        <td>Rp. <?=$value->biaya?></td>
                        <td><?=$value1->status?></td>
                        <td>
                          <a data-toggle="modal" data-id="<?=$value->no?>" title="Lihat Informasi Pengusulan Rencana Pembangunan" class="lihat_informasi_ditolak btn btn-primary btn-sm nc-icon nc-zoom-split" href="#lihat_informasi" id="klik_<?=$value->no?>"></a>
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
      


      <?php $this->load->view('camat/footer') ?>
    </div>
  </div>
  
  <?php $this->load->view('camat/script') ?>
  <!-- bawah sini letak js tambahan -->
  <script src="<?=base_url()?>assets/js/datatables/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.js"></script>
  
  <script type="text/javascript">
    $(document).on("click", ".lihat_informasi", function () {
      var id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "<?=base_url()?>camat/rencana_pembangunan",
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
          $(".modal-body #sini_body").html(html);

          var footer = '<div id="button_modal"><button type="button" class="sahkan_laporannya btn btn-success btn-sm waves-effect waves-light" onclick="sahkan_usulan('+response['no']+')">Sahkan Usulan</button> <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="tolak_usulan('+response['no']+')">Tolak Usulan</button></div><div id="button_alasan"></div>'
         
          

          $(".modal-footer #sini_button_modal").html(footer);
        }
      });
    });
  </script>

  <script type="text/javascript">
    function sahkan_usulan(e){
      swal({
        title: "Sahkan Usulan Rencana Pembangunan?",
        text: "Anda akan mengesahkan usulan rencana pembangunan yang dimasukkan",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((logout) => {
        if (logout) {
          $.ajax({
            url: "<?=base_url()?>camat/rencana_pembangunan/",
            type: 'post',
            data: {id :e , info : "sahkan"},
            // dataType: 'json',
            beforeSend: function(res) {                   
              $(".sahkan_laporannya").html('<i class="fa fa-circle-o-notch fa-spin"></i> Mohon Bersabar');
              $(".sahkan_laporannya").attr({
                "class" : "btn btn-info btn-sm waves-effect waves-light",
                "disabled" : ""
              })
            },
            success: function (response) {
              // console.log(response);
              window.location.replace('<?=base_url()?>camat/data_usulan');

            }
          });
        } 
      });
    }

    function tolak_usulan(e) {
      // jQuery.noConflict();
      var html =  '<label>Alasan Penolakan</label>'+
                  '<textarea class="form-control" name="alasan" style="resize: none;" placeholder="Isikan Alasan Penolakan" title="Isikan Alasan Penolakan" id="alasan_tolak_textarea"></textarea>';
      $('#button_modal').hide();
      $('.sini_tolak_textarea').html(html);

      var button ='<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" onclick="cancel_alasan()" >Cancel</button> <button type="button" id="yakin_tolak_button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="tolak_usulan_konfirm('+e+')">Yakin Tolak Usulan ?</button>';

      $('#button_alasan').html(button);
    }

    function cancel_alasan() {
      $('.sini_tolak_textarea').html(null);
      $('#button_alasan').html(null);
      $('#button_modal').show();

    }

    function tolak_usulan_konfirm(e){
      var alasan = $("#alasan_tolak_textarea").val();
      // console.log(alasan);
      if (alasan == '' || alasan == null) {
        // console.log("kosong");
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        toastr.error("<b>Alasan Penolakan Usulan Harus Terisi</b>");
        $("#alasan_tolak_textarea").focus();
      }else{
        swal({
          title: "Tolak Usulan Rencana Pembangunan?",
          text: "Anda akan batalkan usulan rencana pembangunan yang dimasukkan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((logout) => {
          if (logout) {
            $.ajax({
              url: "<?=base_url()?>camat/rencana_pembangunan/",
              type: 'post',
              data: {id :e , info : "tolak" ,alasan : alasan},
              // dataType: 'json',
              beforeSend: function(res) {                   
                $("#yakin_tolak_button").html('<i class="fa fa-circle-o-notch fa-spin"></i> Mohon Bersabar');
                $("#yakin_tolak_button").attr({
                  "class" : "btn btn-info btn-sm waves-effect waves-light",
                  "disabled" : ""
                })
              },
              success: function (response) {
                // console.log(response);
                window.location.replace('<?=base_url()?>camat/rencana_pembangunan');

              }
            });
          } else {
            // swal("Terima kasih kerana masih di sistem");
            // console.log("batal");
            cancel_alasan();
          }
        });
      }
        
    }
  </script>

  <script type="text/javascript">
    $(document).on("click", ".lihat_informasi_ditolak", function () {
      var id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "<?=base_url()?>camat/rencana_pembangunan",
        type: 'post',
        data: {id :id , info : "lihat"},
        dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          var html = '<div class="form-group">'+
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
                        '<label>Alasan Penolakan Camat</label>'+
                        '<textarea class="form-control" name="judul" style="resize: none;" disabled>'+response['ket']+'</textarea>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<a onclick="window.open('+"'"+'ms-excel:ofe|u|<?=base_url()?>'+response['exel_url']+"'"+')"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" >Lihat Laporan Rencana Pembangunan</button></a><br><a href="<?=base_url()?>'+response['exel_url']+'"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" >Download Laporan Rencana Pembangunan</button></a>'+
                      '</div>'+
                      '<div class="sini_tolak_textarea form-group">'+
                      '</div>';
          $("#lihat_informasi .modal-body #sini_body").html(html);

          $("#lihat_informasi .modal-body #judul_modal").html("Informasi Laporan  Rencana Pembangunan  Yang Ditolak");

        }
      });
    });
  </script>

  <script>
    $(document).ready(function(){

      $('#tabel-data').DataTable();
      $('#tabel-data1').DataTable();
    })
  </script>

</body>

</html>
