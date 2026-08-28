<?php
   session_start();
   if(isset($_SESSION['Email'])) {
   header(''); }
   require_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    BeautyCycleBank
  </title>
  <!-- Favicon -->
  <link href="../assets/img/brand/ikonn.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="bg-pink">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
      <a class="navbar-brand" href="index.php">
          <img src="assets/img/brand/logo2.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
              <a class="navbar-brand" href="index.php">
          <img src="assets/img/brand/logo2.png" />
        </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../index.php">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Menu utama</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../login.php">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Login Pengguna</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="login.php">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-purple py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome To BeautyCycleBank !</h1>
              <p class="text-lead text-light">Beauty For Earth</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">

      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-dark text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-dark mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form" method="post" action="proses_login.php">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input name="Email" type="Email" class="form-control" data-edit="placeholder" placeholder="Enter email" required>
                  </div>
                </div>
                <div class="form-group mb-3s">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input name="Password" type="Password" class="form-control" data-edit="placeholder" placeholder="Enter password" required>
                  </div>
                  <div class="ebook-email-sec">
                   <br>
                    Level : <select class="form-control" name="Level" required>
                    <option value="" >--Pilih Level--</option>
                    <option value="Admin" > Admin </option>
                    <option value="Super_Admin"> Super Admin </option>
                    </select></br>   
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" name="login">Sign in</button>
                </div>
              </form>
            </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="../login.php" class="text-dark"><small>Login sebagai pengguna</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>