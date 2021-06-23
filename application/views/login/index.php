<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  <link rel="icon" type="image/png" href="assets/img/parepare.png">


  <title>Rencana Pembangunan Bacukiki | Halaman Login</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />


  <!-- PLUGINS CSS STYLE -->
  <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />

  

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="halaman_login/assets/css/sleek.css" />

  <!-- FAVICON -->
  <!-- <link href="halaman_login/assets/img/favicon.png" rel="shortcut icon" /> -->
  <script src="sweet-alert/sweetalert.js"></script>

  

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="halaman_login/assets/plugins/nprogress/nprogress.js"></script>
</head>

</head>
  <body class="" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/index.html">
                  <!-- <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg> -->
                  <img src="assets/img/parepare.png" preserveAspectRatio="xMidYMid" width="40" height="50"
                    viewBox="0 0 30 33">
                  <span class="brand-name">Bacukiki Parepare</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Halaman Login</h4>
              <form method="post">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" class="form-control input-lg" id="username" name="username" placeholder="Isi Username">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Isi Password">
                  </div>
                  <div class="col-md-12">
                    <!-- <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">Remember me
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>

                      </div>
                      <p><a class="text-blue" href="#">Forgot Your Password?</a></p>
                    </div> -->
                    <input type="submit" class="btn btn-lg btn-primary btn-block mb-4" value="Login" name=login>
                    <!-- <p>Don't have an account yet ?
                      <a class="text-blue" href="sign-up.html">Sign Up</a>
                    </p> -->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; 2020 Perencanaan Pembangunan Kecamatan Bacukiki, Parepare ,
          <a class="text-primary" href="" target="_blank">Risma</a>.
        </p>
      </div>
    </div>


  <script src="sweet-alert/sweetalert.js"></script>
  <?php if ($this->session->flashdata('warning')=='1'): ?>
    <script type="text/javascript">
      swal({
          title: "Username dan Password Salah!",
          text: "Silakan login kembali.",
          timer: 2500,
          icon: "warning",
          button: false
        });
    </script> 
  <?php elseif ($this->session->flashdata('warning')=='3'): ?>
    <script type="text/javascript">
      swal({
          title: "Halaman Tidak Bisa Diakses",
          text: "Anda Tidak Bisa Mengakses Halaman Ini Tanpa Login",
          timer: 2500,
          icon: "warning",
          button: false
        });
    </script> 

  <?php elseif ($this->session->flashdata('warning')=='2'): ?>
    <script type="text/javascript">
      swal({
          title: "Anda Telah Logout Dari Sistem",
          text: "Terima Kasih Karena Menggunakan Sistem Ini.",
          timer: 2500,
          icon: "info",
          button: false
        });
    </script> 
  <?php endif ?>

</body>
</html>