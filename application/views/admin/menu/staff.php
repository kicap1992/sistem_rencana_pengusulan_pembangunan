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
          <div class="col-md-4" >
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title" >Form Tambah Staff</h5>
              </div>
              <div class="card-body">
                <form  id="sini_form">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru" disabled="" data-bv-notempty="true" data-bv-notempty-message="NIK Harus Terisi" name="nik" id="nik" minlength="16" maxlength="16">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <select class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru" disabled="" data-bv-notempty="true" data-bv-notempty-message="Kelurahan Harus Terpilih" name="kelurahan" id="kelurahan">
                          <option value="" selected="" disabled="">-Pilih Kelurahan </option>
                          <option value="1">Galong Maloang</option>
                          <option value="2">Lemoe</option>
                          <option value="3">Lumpue</option>
                          <option value="4">Watang Bacukiki</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama </label>
                        <input type="text" title="Klik Tambah Staff Untuk Menambah Staff Baru" class="form-control" id="nama" name="nama" data-bv-notempty="true" data-bv-notempty-message="Nama Harus Terisi" disabled="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email </label>
                        <input type="text" class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru" id="email" name="email" data-bv-notempty="true" data-bv-notempty-message="Email Harus Terisi" disabled="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No Telpon </label>
                        <input type="text" class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru" id="no_telpon" name="no_telpon" data-bv-notempty="true" data-bv-notempty-message="No Telpon Harus Terisi" minlength="11" maxlength="13" disabled="">
                      </div>
                    </div>
                  </div>

                  
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="form-group" style="overflow-x: auto; text-align: center">
                        <button type="button" class="btn btn-warning btn-round" id="tambah_staff">Tambah Staff Baru</button> <br>
                        <div class="cancel_tambah" style="display: none" ><button type="button" class="btn btn-danger btn-round" id="cancel_tambah">Cancel</button></div>
                        <input type="submit" name="tambah_staff" style="display: none" id="submit_tambah_staff">

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
                <h5 class="card-title">List Staff</h5>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kelurahan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list_staff->result() as $key => $value): 
                      $kelurahan = $this->model->tampil_data_where('tb_kelurahan',array('no' => $value->kelurahan));
                      ?>
                      <tr>
                        <td><?=$i;$i++?></td>
                        <td><?=$value->nama?></td>
                        <td><?=$kelurahan->result()[0]->kelurahan?></td>
                        <td><a data-toggle="modal" data-id="<?=$value->nik?>" title="Lihat Informasi Staff" class="lihat_informasi btn btn-primary btn-sm nc-icon nc-zoom-split" href="#lihat_informasi" id="klik_<?=$value->nik?>"></a></td>
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
  </script>

  <script type="text/javascript">
    $("#tambah_staff").click(function(){
      $("#tambah_staff").attr({
        'class' : "btn btn-success btn-round",
        'onclick' : 'tambahkan_staff()'
      });
      $('.cancel_tambah').css('display','block');

      $("#nik").attr({
        'required' : "",
        'title' : 'Isikan NIK',
        'placeholder' : 'Isikan NIK'
      });
      $("#nik").removeAttr('disabled');

      $("#kelurahan").attr({
        'required' : "",
        'title' : 'Pilih Kelurahan'
      });
      $("#kelurahan").removeAttr('disabled');

      $("#nama").attr({
        'required' : "",
        'title' : 'Isikan Nama',
        'placeholder' : 'Isikan Nama'
      });
      $("#nama").removeAttr('disabled');

      $("#email").attr({
        'required' : "",
        'title' : 'Isikan Email',
        'placeholder' : 'Isikan Email'
      });
      $("#email").removeAttr('disabled');

      $("#no_telpon").attr({
        'required' : "",
        'title' : 'Isikan No Telpon',
        'placeholder' : 'Isikan No Telpon'
      });
      $("#no_telpon").removeAttr('disabled');
    });

    $("#cancel_tambah").click(function(){
      $("#tambah_staff").attr({
        'class' : "btn btn-warning btn-round"
      });

      $("#tambah_staff").removeAttr('onclick');

      $('.cancel_tambah').css('display','none');

      $("#nik").attr({
        'disabled' : "true"
      });
      $("#nik").removeAttr('required title placeholder');

      $("#kelurahan").attr({
        'disabled' : "true"
      });
      $("#kelurahan").removeAttr('required title placeholder');

      $("#nama").attr({
        'disabled' : ""
      });
      $("#nama").removeAttr('required title placeholder');

      $("#email").attr({
        'disabled' : ""
      });
      $("#email").removeAttr('required title placeholder');

      $("#no_telpon").attr({
        'disabled' : ""
      });
      $("#no_telpon").removeAttr('required title placeholder');
    });
  </script>

  <script type="text/javascript">
    function tambahkan_staff(){
      $('#sini_form').submit();
      var data = $('#sini_form').serializeArray();

      // data = jQuery.grep(data, function(value) {
      //   return value['file'] != 'id';
      // });

      var error = $('#sini_form').find(".has-error").length;
      // console.log(error);
      if (error == 0) {
        $.ajax({
          url: "<?=base_url()?>admin/staff",
          type: 'post',
          data: {data :data , info : "tambah"},
          // dataType: "json",
          beforeSend: function(res) {   
            $("#tambah_staff").html('<i class="fa fa-circle-o-notch fa-spin"></i> Mohon Bersabar');            
            $("#tambah_staff").attr('disabled' , '');            
          },
          success: function (response) {
            // console.log(response);
            location.reload();
            // $("submit_tambah_staff").click();
            
          }
        });
      }
    }
  </script>

  <script type="text/javascript">
    $(document).on("click", ".lihat_informasi", function () {
      var id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "<?=base_url()?>admin/staff",
        type: 'post',
        data: {id :id , info : "lihat"},
        dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          var html =  '<div class="form-group">'+
                        '<label>NIK</label>'+
                        '<input type="text" class="form-control" maxlength="11" value="'+response['nik']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Kelurahan</label>'+
                        '<input type="text" class="form-control" maxlength="11" value="'+response['kelurahan']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Nama</label>'+
                        '<input type="text" class="form-control" maxlength="11" value="'+response['nama']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Email</label>'+
                        '<input type="text" class="form-control"  maxlength="11" value="'+response['email']+'" disabled>'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>No Telpon</label>'+
                        '<input type="text" class="form-control"  maxlength="11" value="'+response['no_telpon']+'" disabled>'+
                      '</div>';
          $("#lihat_informasi .modal-body #sini_body").html(html);

          $("#lihat_informasi .modal-body #judul_modal").html("Informasi Staff");

           var footer = '<button class="btn btn-warning btn-sm waves-effect waves-light" onclick="edit_staff('+response['nik']+')">Edit Informasi Staff</button> &nbsp <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"  onclick="hapus_staff('+response['nik']+')">Hapus Staff</button></form>'
          $(".modal-footer #sini_button_modal").html(footer);
        }
      });
    });

    function edit_staff(e){
      var id = e;
      // console.log(id);
      $.ajax({
        url: "<?=base_url()?>admin/staff",
        type: 'post',
        data: {id :id , info : "lihat"},
        dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          var html =  '<form id="sini_form_edit"><div class="form-group">'+
                        '<label>NIK</label>'+
                        '<input type="text" class="form-control" maxlength="16" minlength="16" value="'+response['nik']+'" required="" id="nik" name="nik" data-bv-notempty="true" data-bv-notempty-message="NIK Harus Terisi">'+
                      '</div>'+
                      '<div class="form-group">'+
                        '<label>Kelurahan</label>';
          html +=   response['select_kelurahan']+'</div>'+
                    '<div class="form-group">'+
                      '<label>Nama</label>'+
                       '<input type="text" class="form-control" value="'+response['nama']+'" required="" name="nama" data-bv-notempty="true" data-bv-notempty-message="Nama Harus Terisi">'+
                    '</div>'+
                    '<div class="form-group">'+
                      '<label>Email</label>'+
                      '<input type="emai" class="form-control"  value="'+response['email']+'" required="" name="email" data-bv-notempty="true" data-bv-notempty-message="Email Harus Terisi">'+
                    '</div>'+
                    '<div class="form-group">'+
                      '<label>No Telpon</label>'+
                      '<input type="text" class="form-control"  maxlength="13" minlength="11" value="'+response['no_telpon']+'" required="" id="no_telpon" name="no_telpon" data-bv-notempty="true" data-bv-notempty-message="No Telpon Harus Terisi">'+
                    '</div></form>'+response['script1'];
          $("#lihat_informasi .modal-body #sini_body").html(html);

          $("#lihat_informasi .modal-body #judul_modal").html("Informasi Staff");

           var footer = '<button class="btn btn-success btn-sm waves-effect waves-light" onclick="edit_staff_konfirm('+response['nik']+')">Edit Informasi Staff</button> &nbsp <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" data-dismiss="modal">Cancel Edit</button></form>'+response['script2'];
          $(".modal-footer #sini_button_modal").html(footer);
          
        }
      });
    }

  </script>


  <script type="text/javascript">
    function edit_staff_konfirm(e) {
      $('#sini_form_edit').submit();
      var data = $('#sini_form_edit').serializeArray();

      // data = jQuery.grep(data, function(value) {
      //   return value['file'] != 'id';
      // });
      console.log(data)
      var error = $('#sini_form_edit').find(".has-error").length;
      $.ajax({
        url: "<?=base_url()?>admin/staff",
        type: 'post',
        data: {id :e , info : "edit" , data : data},
        // dataType: "json",
        beforeSend: function(res) {                   
        },
        success: function (response) {
          // console.log(response);
          location.reload()
        }
      });
    }
  </script>

  <script>
    $(document).ready(function(){
      $('#tabel-data').DataTable();
    })
  </script>

  <script type="text/javascript">
    function setInputFilter(textbox, inputFilter) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
          if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          } else {
            this.value = "";
          }
        });
      });
    }


    // Install input filters.
    setInputFilter(document.getElementById("nik"), function(value) {
      return /^-?\d*$/.test(value); });
  </script>

</body>

</html>
