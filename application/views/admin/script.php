  <script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  
  <script src="<?php echo base_url() ?>sweet-alert/sweetalert.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>sweet-alert/toastr/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>sweet-alert/toastr/toastr.min.css">

  <script type="text/javascript">
    function logout(){
      swal({
        title: "Yakin ingin Logout?",
        text: "Anda akan keluar dari sistem",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((logout) => {
        if (logout) {

          window.location.href ='<?php echo base_url("admin/logout") ?>';
        } else {
          swal("Terima kasih kerana masih di sistem");
        }
      });
    }
  </script>
  
  <?php if ($this->session->flashdata('login_pertama') == 1): ?>
    <script type="text/javascript">
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

      toastr.success("<b>Selamat Datang Admin</b><br> Anda Berhasil Login");
    </script> 
  <?php endif ?>

  <?php if ($this->session->flashdata('success')): ?>
    <script type="text/javascript">
        swal({
          title: "Berhasil",
          text: "<?=$this->session->flashdata('success')?>",
          icon: "success",
          showLoaderOnConfirm: true,
        })
        
      
    </script>
  <?php endif ?>

  <?php if ($this->session->flashdata('error')): ?>
    <script type="text/javascript">
        swal({
          title: "Berhasil",
          text: "<?=$this->session->flashdata('error')?>",
          icon: "error",
          showLoaderOnConfirm: true,
        })
        
      
    </script>
  <?php endif ?>
  