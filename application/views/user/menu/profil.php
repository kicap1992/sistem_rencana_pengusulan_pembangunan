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

        <div class="row">
          <div class="col-md-4" >
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title" >Form Detail Diri</h5>
              </div>
              <div class="card-body">
                <form  id="sini_form">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" value="<?=$user->nik?>" disabled="" title="NIK">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" class="form-control" value="<?=$kelurahan?>" disabled="" title="kelurahan">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama </label>
                        <input type="text" class="form-control" placeholder="Isikan Nama" title="Isikan Nama" id="nama" name="nama" data-bv-notempty="true" data-bv-notempty-message="Nama Harus Terisi" value="<?=$user->nama?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email </label>
                        <input type="text" class="form-control" placeholder="Isikan Email" title="Isikan Email" id="email" name="email" data-bv-notempty="true" data-bv-notempty-message="Email Harus Terisi" value="<?=$user->email?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No Telpon </label>
                        <input type="text" class="form-control" placeholder="Isikan No Telpon" title="Isikan No Telpon" id="no_telpon" name="no_telpon" data-bv-notempty="true" data-bv-notempty-message="No Telpon Harus Terisi" value="<?=$user->no_telpon?>" minlength="11" maxlength="13">
                      </div>
                    </div>
                  </div>

                  
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="form-group" style="overflow-x: auto; text-align: center">
                        <button  class="btn btn-primary btn-round" id="edit_info_diri">Edit Informasi Diri</button>
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
                <h5 class="card-title">Form Username Dan Password</h5>
              </div>
              <div class="card-body" style="overflow-x: auto">
                <form  id="sini_form_user_pass">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username Lama</label>
                        <input type="text" class="form-control" placeholder="Isikan Username Lama" title="Isikan Username Lama" id="username_lama" name="username_lama" data-bv-notempty="true" data-bv-notempty-message="Username Lama Harus Terisi" minlength="8">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username Baru</label>
                        <input type="text" class="form-control" placeholder="Isikan Username Baru" title="Isikan Username Baru" id="username" name="username" data-bv-notempty="true" data-bv-notempty-message="Username Baru Harus Terisi" minlength="8">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password Lama</label>
                        <input type="text" class="form-control" placeholder="Isikan Password Lama" title="Isikan Password Lama" id="password_lama" name="password_lama" data-bv-notempty="true" data-bv-notempty-message="Password Lama Harus Terisi" minlength="8">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password Baru</label>
                        <input type="text" class="form-control" placeholder="Isikan Passwod Baru" title="Isikan Password Baru" id="password" name="password" data-bv-notempty="true" data-bv-notempty-message="Password Baru Harus Terisi" minlength="8">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="text" class="form-control" placeholder="Isikan Konfirmasi Passwod Baru" title="Isikan Konfirmasi Password Baru" id="konfirmasi_password" name="konfirmasi_password" data-bv-notempty="true" data-bv-notempty-message="Konfirmasi Password Baru Harus Terisi" minlength="8">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="form-group" style="overflow-x: auto; text-align: center">
                        <button  class="btn btn-primary btn-round" id="ganti_user_pass">Ganti Username Dan Password</button>
                      </div>
                    </div>
                  </div>
                </form>
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

    $("#edit_info_diri").click(function (){
      $('#sini_form').submit();
      var data = $('#sini_form').serializeArray();
    
      // data = jQuery.grep(data, function(value) {
      //   return value['file'] != 'id';
      // });

      var error = $('#sini_form').find(".has-error").length;

      if (error == 0) {
        $.ajax({
        url: "<?=base_url()?>user/profil",
        type: 'post',
        data: {data :data , info : "detail"},
        // dataType: "json",
        beforeSend: function(res) {  
          $("#edit_info_diri").html('<i class="fa fa-circle-o-notch fa-spin"></i> Harap Bersabar');
          $("#edit_info_diri").attr({
            "class" : "btn btn-warning btn-round",
            "disabled" : ""
          });                
        },
        success: function (response) {
          window.location.replace(response);
        }
      });
      }
      
    })

    $(document).ready(function(){

      $('#sini_form_user_pass').bootstrapValidator({
          message: 'This value is not valid',
          feedbackIcons: {
            // valid: 'fa fa-check',
            invalid: 'fa fa-close',
            validating: 'fa fa-circle-o-notch'
          },
        excluded: ':disabled'
      })
    })

    $("#ganti_user_pass").click(function (){
      $('#sini_form_user_pass').submit();
      var data = $('#sini_form_user_pass').serializeArray();
      // console.log(data);
      // data = jQuery.grep(data, function(value) {
      //   return value['file'] != 'id';
      // });

      var error = $('#sini_form_user_pass').find(".has-error").length;

      if (error == 0) {
        $.ajax({
        url: "<?=base_url()?>user/profil",
        type: 'post',
        data: {data :data , info : "user_pass"},
        dataType: "json",
        beforeSend: function(res) {  
          $("#ganti_user_pass").html('<i class="fa fa-circle-o-notch fa-spin"></i> Harap Bersabar');
          $("#ganti_user_pass").attr({
            "class" : "btn btn-warning btn-round",
            "disabled" : ""
          });                
        },
        success: function (response) {
          console.log(response['no']);
          // window.location.replace(response);
          if (response['no'] == 0) {
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

            toastr.error("<b>Error </b><br>"+response['ket']);
            $("#ganti_user_pass").html('Ganti Username Dan Password');
            $('#ganti_user_pass').removeAttr("disabled")
            $("#ganti_user_pass").attr({
              "class" : "btn btn-primary btn-round"
            });
          }else{
            window.location.replace(response['ket']);
          }
        }
      });
      }
      
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
    setInputFilter(document.getElementById("no_telpon"), function(value) {
      return /^-?\d*$/.test(value); });
  </script>
  
</body>

</html>
