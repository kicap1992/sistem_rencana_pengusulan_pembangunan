<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('user/head') ?>

<body class="">
  <div class="wrapper ">
    
    <?php $this->load->view('user/sidebar') ?>

    <div class="main-panel">
      
      <?php $this->load->view('user/navbar') ?>
 
      <div class="content">

        <?php $this->load->view('user/atas') ?>
       
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
          <div class="col-md-4" >
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title" >Form Pengusulan <br> Rencana Pembangunan</h5>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data" id="sini_form">
                  
                  <div class="row">
                    <div class="col-md-12">
                      <label>Upload Laporan Rencana Pembangunan</label>
                      <input type="file"  name="file" id="file" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Laporan Rencana Pembangunan Harus Dipilih">
                    </div>
                  </div>

                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Judul Laporan Rencana Pembangunan</label>
                        <textarea class="form-control" name="judul" id="judul" style="resize: none;" title="Isikan Judul Laporan Rencana Pembangunan" placeholder="Isikan Judul Laporan Rencana Pembangunan" data-bv-notempty="true" data-bv-notempty-message="Judul Laporan Pembangunan Harus Terisi"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jumlah Anggaran Biaya Pembangunan <b><i>(Rp. )</i></b></label>
                        <input type="text" class="form-control" placeholder="Isikan Jumlah Biaya Pembangunan" id="biaya" name="biaya" data-bv-notempty="true" data-bv-notempty-message="Jumlah Anggaran Biaya Pembangunan Harus Terisi" maxlength="11">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RT / RW</label>
                        <select data-bv-notempty="true" data-bv-notempty-message="RT / RW Harus Dipilih" title="Pilih RT / RW" class="form-control" name="rtrw">
                          <option selected="" value="" disabled="">-Pilih RT / RW</option>
                          <?php foreach ($rtrw->result() as $key => $value): ?>
                            <option value="<?=$value->no?>"><?=$value->rt.'/'.$value->rw?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="form-group" style="overflow-x: auto; text-align: center">
                        <button  class="btn btn-primary btn-round" id="usulkan">Usulkan Rencana Pembangunan</button>
                        <div id="sinidia"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">List Pengusulan Rencana Pembangunan</h5>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Waktu Pengusulan</th>
                      <th>Judul</th>
                      <th>RT / RW</th>
                      <th>Anggaran</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($usulan->result() as $key => $value): 
                      $cek_status = $this->model->tampil_data_where('tb_status',array('no' => $value->status));
                      $cek_rtrw = $this->model->tampil_data_where('tb_rtrw',array('no' => $value->rtrw));
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
                        <td><?=$value->judul?></td>
                        <td><?=$cek_rtrw->result()[0]->rt?>/<?=$cek_rtrw->result()[0]->rw?></td>
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
      


      <?php $this->load->view('user/footer') ?>
    </div>
  </div>
  
  <?php $this->load->view('user/script') ?>
  <!-- bawah sini letak js tambahan -->
  <script src="<?=base_url()?>assets/js/datatables/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/bootstrap-validator/js/bootstrapValidator.min.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#sini_form').bootstrapValidator({
          message: 'This value is not valid',
          feedbackIcons: {
            // valid: 'fa fa-check',
            invalid: 'fa fa-close',
            validating: 'fa fa-circle-o-notch'
          },
        excluded: ':disabled'
      })
    })


    $("#usulkan").click(function (){
      $('#sini_form').submit();
      var data = $('#sini_form').serializeArray();
      var form_data = new FormData();
      
      var totalfiles = document.getElementById('file').files.length;

      data = jQuery.grep(data, function(value) {
        return value['file'] != 'id';
      });

      data = JSON.stringify(data);
      form_data.append('data', data);

      var error = $('#sini_form').find(".has-error").length;

      if (error == 0) {
        if (totalfiles == 0) {
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

          toastr.warning("<center><b>File Laporan Rencana Pembangunan Harus Diupload</b></ccenter>");
          $("#file").focus();
        }else{
          var name = document.getElementById('file').files[0]['name'];
          name = name.split('.').pop().trim();
          // console.log(name);
          if (name !== 'pdf') {
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

            toastr.warning("<center><b>Ekstensi Laporan Yang Diupload Harus Berbentuk <i>.pdf</i> </b></ccenter>");
            $("#file").val();
            $("#file").focus();
          }else{
            form_data.append("file", document.getElementById('file').files[0]);
            console.log(document.getElementById('file').files[0])
            // $.ajax({
            //   url: "<?=base_url()?>user/rencana_pembangunan/usulkan",
            //   type: 'post',
            //   data: form_data,
            //   // dataType: 'json',
            //   contentType: false,
            //   processData: false,
            //   beforeSend: function(res) {                   
            //     $("#sinidia").html('<button class="btn btn-primary btn-round" disabled><i class="fa fa-circle-o-notch fa-spin"></i> Mohon Bersabar</button>');
            //     $("#usulkan").hide();
            //   },
            //   success: function (response) {
            //     window.location.replace('<?=base_url()?>user/rencana_pembangunan');

            //   }
            // });
          }
        }
      }
    })

    $(document).on("click", ".lihat_informasi", function () {
      var id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "<?=base_url()?>user/rencana_pembangunan",
        type: 'post',
        data: {id :id , info : "lihat"},
        dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          var html = '<div class="form-group">'+
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
                      '</div>';
                      

          if (response['status'] == 1) {
            var footer = '<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" onclick="edit_usulan('+response['no']+')">Edit Laporan</button>'
          }else if (response['status'] == 3) {
            var footer = '<button type="button" class="btn btn-success btn-sm waves-effect waves-light" disabled="">Rencana Pembangunan Diterima</button>'
          }else if (response['status'] == 2){
            var footer = '<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" disabled="">Dalam Pengesahan</button>'
          }else if (response['status'] == 4){
            var footer = '<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" disabled="">Ditolak Oleh Camat</button>';
            html += '<div class="form-group">'+
                      '<label>Alasan Penolakan Camat</label>'+
                      '<textarea class="form-control" name="judul" style="resize: none;" disabled>'+response['ket']+'</textarea>'+
                    '</div>';
          }else if (response['status'] == 5){
            var footer = '<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" disabled="">Ditolak Oleh Admin</button>';
            html += '<div class="form-group">'+
                      '<label>Alasan Penolakan Admin</label>'+
                      '<textarea class="form-control" name="judul" style="resize: none;" disabled>'+response['ket']+'</textarea>'+
                    '</div>';
          }

          html += '<div class="form-group">'+
                    '<a href="<?=base_url()?>'+response['exel_url']+'" target="blank"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" >Download Laporan Rencana Pembangunan</button></a>'+
                  '</div>';
          $(".modal-body #sini_body").html(html);

          
          

          $(".modal-footer #sini_button_modal").html(footer);
        }
      });
    });

    function edit_usulan(e){
      $.ajax({
        url: "<?=base_url()?>user/rencana_pembangunan",
        type: 'post',
        data: {id :e },
        dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          var html = '<form enctype="multipart/form-data" id="sini_form_edit"><div class="form-group">'+
                        '<label>Judul Laporan Rencana Pembangunan</label>'+
                        '<textarea class="form-control" name="judul" style="resize: none;" placeholder="Isikan Judul Laporan Rencana Pembangunan" title="Isikan Judul Laporan Rencana Pembangunan" data-bv-notempty="true" data-bv-notempty-message="Judul Laporan Pembangunan Harus Terisi">'+response['judul']+'</textarea>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Jumlah Anggaran Biaya Pembangunan <b><i>(Rp. )</i></b></label>'+
                        '<input type="text" class="form-control"  maxlength="11" value="'+response['biaya']+'" id="biaya1" name="biaya" data-bv-notempty="true" data-bv-notempty-message="Jumlah Anggaran Biaya Pembangunan Harus Terisi" placeholder="Isikan Jumlah Biaya Pembangunan" title="Isikan Jumlah Biaya Pembangunan">'+
                      '</div>'+
                      '<div class="yang_lama form-group">'+
                        '<a href="<?=base_url()?>'+response['exel_url']+'" target="blank"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" >Download Laporan Rencana Pembangunan</button></a>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<input type="radio" name="laporan" value="tetap" style="display: inline;" checked="" onclick="klik_upload(1)"><label class="text-black" for="email">Kekalkan Laporan Lama</label> &nbsp &nbsp<input type="radio" name="laporan" value="upload_baru" style="display: inline;" onclick="klik_upload(2)"><label class="text-black" for="email">Upload Laporan Baru</label>'+
                      '</div><div class="sini_laporan_upload"></div>'+response['script']+response['script2'];
          $(".modal-body #sini_body").html(html);

          var footer = '<button class="edit_laporannya btn btn-primary btn-sm waves-effect waves-light" onclick="usulkan_edit('+response['no']+')">Edit Rencana Pembangunan</button><button type="button" class="btn btn-danger btn-sm waves-effect waves-light"  data-dismiss="modal">batalkan</button></form>'
          $(".modal-footer #sini_button_modal").html(footer);
        }
      });
    }

    function klik_upload(e){
      // console.log(e);
      if (e == 1) {
        $(".yang_lama").show();
        $(".file1").val(null);
        var html = "";
      }else if (e == 2) {
        $(".yang_lama").hide();
        var html = '<label>Upload Laporan Rencana Pembangunan</label><input type="file"  name="file" id="file1" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Laporan Rencana Pembangunan Harus Dipilih">'
      }

      $(".sini_laporan_upload").html(html);
    }

    function usulkan_edit(e){
      $('#sini_form_edit').submit();
      var data = $('#sini_form_edit').serializeArray();
      var form_data = new FormData();
      
      var totalfiles = document.getElementById('file').files.length;

      data = jQuery.grep(data, function(value) {
        return value['file'] != 'id';
      });

      data = JSON.stringify(data);
      form_data.append('data', data);
      form_data.append('id', e);

      var error = $('#sini_form_edit').find(".has-error").length;

      if (error == 0) {
        var laporan = $( "input[name='laporan']:checked" ).val();
        if (laporan == 'upload_baru') {
          // console.log("sini upload baru");
          var totalfiles = document.getElementById('file1').files.length;
          if (totalfiles == 0) {
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

            toastr.warning("<center><b>File Laporan Rencana Pembangunan Harus Diupload</b></ccenter>");
            $("#file1").focus();
            throw "stop execution";
          }else{
            var name = document.getElementById('file1').files[0]['name'];
            name = name.split('.').pop().trim();
            // console.log(name);
            if (name !== 'pdf') {
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

              toastr.warning("<center><b>Ekstensi Laporan Yang Diupload Harus Berbentuk <i>.pdf</i></b></center>");
              $("#file1").val();
              $("#file1").focus();
              throw "stop execution";
            }else{
              form_data.append("file", document.getElementById('file1').files[0]);
            }
          }
        }


        
        $.ajax({
          url: "<?=base_url()?>user/rencana_pembangunan/usulkan_edit",
          type: 'post',
          data: form_data,
          // dataType: 'json',
          contentType: false,
          processData: false,
          beforeSend: function(res) {                   
            $(".edit_laporannya").html('<i class="fa fa-circle-o-notch fa-spin"></i> Mohon Bersabar');
            $(".edit_laporannya").attr({
              "class" : "edit_laporannya btn btn-primary btn-sm waves-effect waves-light",
              "disabled" : ""
            })
            // $("#usulkan").hide();
          },
          success: function (response) {
            // console.log(response);
            window.location.replace('<?=base_url()?>user/rencana_pembangunan');

          }
        });
      }
    }

  </script>

  <script type="text/javascript">
    var elem = document.getElementById("biaya");

    elem.addEventListener("keydown",function(event){
        var key = event.which;
        if((key<48 || key>57) && key != 8) event.preventDefault();
    });

    elem.addEventListener("keyup",function(event){
        var value = this.value.replace(/,/g,"");
        this.dataset.currentValue=parseInt(value);
        var caret = value.length-1;
        while((caret-3)>-1)
        {
            caret -= 3;
            value = value.split("");
            value.splice(caret+1,0,",");
            value = value.join("");
        }
        this.value = value;
    });
  </script>


  <script>
    $(document).ready(function(){

      $('#tabel-data').DataTable();
    })
  </script>

  <?php if ($this->session->flashdata('klik')): ?>
    <script type="text/javascript">
      document.getElementById("klik_<?=$this->session->flashdata('klik')?>").click();
    </script>
  <?php endif ?>
  
</body>

</html>
