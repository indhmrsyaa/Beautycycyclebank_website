<?php
   session_start();
   if(isset($_SESSION['ID_Akun'])) {
   header(''); }
   require_once("admin/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Beautycycebank
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

<body class="bg-default">
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
                <a href="index.php">
                  <img src="assets/img/brand/blue.png">
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
              <a class="nav-link nav-link-icon" href="index.php">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Menu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="register.php">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Register</span>
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
    <div class="header bg-gradient-success py-7 py-lg-8">
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
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign up with credentials</small>
              </div>
                <form role="form" action="proses_register.php" method="post">
                <a>Username : <input autocomplete="off" name="ID_Akun" type="text" class="form-control" placeholder="Masukkan Username" required></a>
                <a> Nama Lengkap :<input autocomplete="off" name="Nama_Lengkap" type="text" class="form-control" placeholder="Masukkan Nama Lengkap" required></a>
                <a> Nomor Handphone :<input autocomplete="off" name="No_Hp" type="text" class="form-control" placeholder="Masukkan Nomor Handphone" required></a>
                <a> Email : <input autocomplete="off" name="Email" type="text" class="form-control" placeholder="Masukkan Email" required></a>
                <a> Password : <input name="Password" type="password" class="form-control" placeholder="Masukkan Password" required></a>
                <a> Alamat Rumah :<input autocomplete="off" name="Alamat_Rumah" type="text" class="form-control" placeholder="Masukkan Alamat Rumah" required></a>
              <div class="form-group">
                <label> Jenis Akun </label>
                <select class="form-control" name="IDjenisakun">
              <option value="">--Pilih Jenis Akun--</option>
                <?php $ambil=$koneksi->query("SELECT * FROM jenis_akun");?>
                <?php while($pecah=$ambil->fetch_assoc()){?>
              <option value="<?php echo $pecah['ID_jenis_akun']?>" required><?php echo $pecah['ID_jenis_akun']?>-<?php echo $pecah['jenis_akun']?></option>
              <?php } ?>
                </select>
              </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create account</button>
                </div>
                <h5>Sudah Punya Akun? <span><a href="login.php"> Login Disini </span> </h5>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>
</body>
</html>