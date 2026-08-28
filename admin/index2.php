<?php 
session_start();
$koneksi=new mysqli ("localhost","root", "", "bank_sampah");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    WASTE WISE "Limbah Bijaksana"
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/bank sampah.jpg" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  </head>
    <body class="sb-nav-fixed"; style="background-image:URL(assets/img/theme/backround.jpg); background-size: cover ; background-position: center">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-4"href="index.php">"Limbah Bijaksana" </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search " aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a href="profile.php" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="profile.php" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                    </ul>
                </li>
            </ul>
        </nav>

<?php if(isset($_SESSION["admin"])):?>
        <!-- Navigation -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion"style="width:248px">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <center>
                        <a class="navbar-brand pt-3" href="index.php">
                        <img src="assets/img/brand/bank sampah.jpg" class="navbar-brand-img"style="width:50px" alt="">
                         </a>
                        </center>
                        <?php if ($_SESSION['admin']['level']=='admin') { ?>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                        <?php } ?>   
                        <?php if ($_SESSION['admin']['level']=='super_sdmin') { ?>
                            <div class="sb-sidenav-menu-heading">Super Admin</div>
                        <?php } ?>
                            <ul class="navbar-nav">
                              <li class="nav-item">
                                <a class="nav-link " href="index.php">
                                  <div class="sb-nav-link-icon"><i class="ni ni-tv-2 text-primary"></i></div> 
                                  <span class="text-black">Dashboard</span> 
                                </a>
                              </li>
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=akun">
                                   <div class="sb-nav-link-icon"><i class="ni ni-single-02 text-yellow"></i></div> 
                                   <span class="text-black">Akun</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=jenis_akun">
                                   <div class="sb-nav-link-icon"><i class="ni ni-single-02 text-yellow"></i></div> 
                                   <span class="text-black">Jenis Akun</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=cabang_bank">
                                  <div class="icon-copy fi-marker"><i class="ni ni-key-25 text-info"></i></div>
                                  <span class="text-black">Cabang Bank</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=kota">
                                  <div class="icon-copy fi-marker"><i class="ni ni-key-25 text-info"></i></div>
                                  <span class="text-black">Kota</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=sampah">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Sampah</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=jenis_sampah">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Jenis Sampah</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=jenis_satuan">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Jenis Satuan</span> 
                                </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?halaman=hadiah">
                                   <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                   <span class="text-black">Hadiah</span> 
                                  </a>
                                  </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=nota_gift">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Nota Gift</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=transaksi_gift">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Transaksi Gift</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=status_klaim">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Status Klaim</span> 
                                </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?halaman=nota_setor">
                                    <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                    <span class="text-black">Nota Setor</span> 
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?halaman=status_setor">
                                    <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                    <span class="text-black">Status setor</span> 
                                  </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=transaksi_nota_keluar">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Transaksi Stok Sampah</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=transaksi_setor_sampah">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Transaksi Setor Sampah</span> 
                                </a>
                                <?php if ($_SESSION['admin']['Level']=='Super_Admin') { ?>
                                <a class="nav-link" href="index.php?halaman=admin">
                                    <div class="sb-nav-link-icon"><i class="fas fa-admin"></i></div>
                                    <i class="text-success"> USER </i>
                                </a>
                                <?php } ?>
                                <a class="nav-link" href="logout.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                    <i class="text-danger"> LOGOUT </i>
                                </a>
                            </div>
                        </div>
                      <div class="sb-sidenav-footer">
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
<?php else: ?>
        <!-- Navigation -->
        <div id="layoutSidenav">                
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion"style="width:248px">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <center>
                        <a class="navbar-brand pt-3" href="index.php">
                        <img src="assets/img/brand/bank sampah.jpg" class="navbar-brand-img"style="width:180px" alt="">
                         </a>
                        </center>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <ul class="navbar-nav">
                              <li class="nav-item">
                                <a class="nav-link " href="index.php">
                                  <div class="sb-nav-link-icon"><i class="ni ni-tv-2 text-primary"></i></div> 
                                  <span class="text-black">Dashboardtttt</span> 
                                </a>
                              </li>
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=akun">
                                   <div class="sb-nav-link-icon"><i class="ni ni-single-02 text-yellow"></i></div> 
                                   <span class="text-black">Akun</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=jenis_akun">
                                   <div class="sb-nav-link-icon"><i class="ni ni-single-02 text-yellow"></i></div> 
                                   <span class="text-black">Jenis Akun</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=cabang_bank">
                                  <div class="icon-copy fi-marker"><i class="ni ni-key-25 text-info"></i></div>
                                  <span class="text-black">Cabang Bank</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=kota">
                                  <div class="icon-copy fi-marker"><i class="ni ni-key-25 text-info"></i></div>
                                  <span class="text-black">Kota</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=sampah">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Sampah</span> 
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=jenis_sampah">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Jenis Sampah</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=jenis_satuan">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Jenis Satuan</span> 
                                </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?halaman=hadiah">
                                   <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                   <span class="text-black">Hadiah</span> 
                                  </a>
                                  </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=nota_gift">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Nota Gift</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=transaksi_gift">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Transaksi Gift</span> 
                                </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=status_klaim">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Status Klaim</span> 
                                </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?halaman=nota_setor">
                                    <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                    <span class="text-black">Nota Setor</span> 
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?halaman=status_setor">
                                    <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                    <span class="text-black">Status setor</span> 
                                  </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=transaksi_setor_sampah">
                                  <div class="sb-nav-link-icon"><i class="ni ni-key-25 text-info"></i></div> 
                                  <span class="text-black">Transaksi Setor Sampah</span> 
                                </a>
                                <a class="nav-link" href="logout.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                    <i class="text-danger"> LOGOUT </i>
                                </a>
                            </div>
                        </div>
                      <div class="sb-sidenav-footer">
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

<?php endif?>
    <!-- Header -->
  <?php

        if (isset($_GET['halaman']))
         {
            if($_GET['halaman']=="admin")
            {
                include 'admin.php';
            }
            elseif($_GET['halaman']=="cabang_bank")
            {
                include 'cabang_bank.php';
            }
            elseif($_GET['halaman']=="kota")
            {
                include 'kota.php';
            } 
            elseif($_GET['halaman']=="hadiah")
            {
                include 'hadiah.php';
            }
            elseif($_GET['halaman']=="jenis_akun")
            {
                include 'jenis_akun.php';
            }   
            elseif($_GET['halaman']=="jenis_sampah")
            {
                include 'jenis_sampah.php';
            }
            elseif($_GET['halaman']=="jenis_satuan")
            {
                include 'jenis_satuan.php';  
            }          
            elseif($_GET['halaman']=="akun")
            {
                include 'akun.php';
            }          
            elseif($_GET['halaman']=="nota_gift")
            {
                include 'nota_gift.php';
            }
            elseif($_GET['halaman']=="nota_setor")
            {
                include 'nota_setor.php';
            }
            elseif($_GET['halaman']=="sampah")
            {
                include 'sampah.php';
            }            
            elseif($_GET['halaman']=="status_setor")
            {
                include 'status_setor.php';
            }          
            elseif($_GET['halaman']=="status_klaim")
            {
                include 'status_klaim.php';
            }
            elseif($_GET['halaman']=="transaksi_gift")
            {
                include 'transaksi_gift.php';
            }              
            elseif($_GET['halaman']=="transaksi_setor_sampah")
            {
                include 'transaksi_setor_sampah.php';
            }
            elseif($_GET['halaman']=="laporanmember")
            {
                include 'laporan_member.php';
            }
            elseif($_GET['halaman']=="konfirmasiklaimhadiah")
            {
                include 'konfirmasi_klaim_hadiah.php';
            }
            elseif($_GET['halaman']=="konfirmasinotasetor")
            {
                include 'konfirmasi_nota_setor.php';
            }
            elseif($_GET['halaman']=="konfirmasinotagift")
            {
                include 'konfirmasi_nota_gift.php';
            }
            elseif($_GET['halaman']=="halamankonfirmasisetor")
            {
                include 'halaman_konfirmasi_setor.php';
            }
             elseif($_GET['halaman']=="halamankonfirmasiklaim")
            {
                include 'halaman_konfirmasi_klaim.php';
            } 
            elseif($_GET['halaman']=="laporancabangbank")
            {
                include 'laporan_cabang_bank.php';
            } 
            elseif($_GET['halaman']=="laporancabangbankberdasarkantotalhadiah")
            {
                include 'laporan_cabang_bank_berdasarkan_total_hadiah.php';
            } 
            elseif($_GET['halaman']=="laporancabangbankberdasarkantotaljenishadiah")
            {
                include 'laporan_cabang_bank_berdasarkan_total_jenis_hadiah.php';
            }             
            elseif($_GET['halaman']=="laporancabangbankberdasarkanberattotaljenissampah")
            {
                include 'laporan_cabang_bank_berdasarkan_berat_total_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="laporancabangbankberdasarkanberattotalsampah")
            {
                include 'laporan_cabang_bank_berdasarkan_berat_total_sampah.php';
            }     
            elseif($_GET['halaman']=="laporanmemberklaim")
            {
                include 'laporan_member_klaim.php';
            }            
            elseif($_GET['halaman']=="laporanmembersetor")
            {
                include 'laporan_member_setor.php';
            }
            elseif($_GET['halaman']=="laporanstatusklaim")
            {
                include 'laporan_status_klaim.php';
            }
            elseif($_GET['halaman']=="laporanstatussetor")
            {
                include 'laporan_status_setor.php';
            }
            elseif($_GET['halaman']=="laporantotalberat")
            {
                include 'laporan_total_berat.php';
                        }
            elseif($_GET['halaman']=="laporantotalhadiah")
            {
                include 'laporan_total_hadiah.php';
            }  
            elseif($_GET['halaman']=="laporantotalberatberdasarkanjenissampah")
            {
                include 'laporan_total_berat_berdasarkan_jenis_sampah.php';
            }  
            elseif($_GET['halaman']=="laporantotalberatberdasarkansampah")
            {
                include 'laporan_total_berat_berdasarkan_sampah.php';
            }
            elseif($_GET['halaman']=="laporantotalhadiahberdasarkanhadiah")
            {
                include 'laporan_total_hadiah_berdasarkan_hadiah.php';
            } 
            elseif($_GET['halaman']=="laporantotalhadiahberdasarkanjenishadiah")
            {
                include 'laporan_total_hadiah_berdasarkan_jenis_hadiah.php';
            } 
            elseif($_GET['halaman']=="laporantransaksiklaim")
            {
                include 'laporan_transaksi_klaim.php';
            }
            elseif($_GET['halaman']=="laporantransaksisetor")
            {
                include 'laporan_transaksi_setor.php';
            }
            elseif($_GET['halaman']=="laporanstokhadiah")
            {
                include 'laporan_stok_hadiah.php';
            }
            elseif($_GET['halaman']=="laporanstokhadiahyangkosong")
            {
                include 'laporan_stok_hadiah_yang_kosong.php';
            }
            elseif($_GET['halaman']=="laporanstoksampah")
            {
                include 'laporan_stok_sampah.php';
            }
            elseif($_GET['halaman']=="semualaporanmemberklaim")
            {
                include 'semua_laporan_member_klaim.php';
            }            
            elseif($_GET['halaman']=="semualaporanmembersetor")
            {
                include 'semua_laporan_member_setor.php';
            }
            elseif($_GET['halaman']=="semualaporanstatusklaim")
            {
                include 'semua_laporan_status_klaim.php';
            }
            elseif($_GET['halaman']=="semualaporanstatussetor")
            {
                include 'semua_laporan_status_setor.php';
            } 
            elseif($_GET['halaman']=="semualaporancabangbankberdasarkantotalhadiah")
            {
                include 'semua_laporan_cabang_bank_berdasarkan_total_hadiah.php';
            } 
            elseif($_GET['halaman']=="semualaporancabangbankberdasarkantotaljenishadiah")
            {
                include 'semua_laporan_cabang_bank_berdasarkan_total_jenis_hadiah.php';
            }             
            elseif($_GET['halaman']=="semualaporancabangbankberdasarkanberattotaljenissampah")
            {
                include 'semua_laporan_cabang_bank_berdasarkan_berat_total_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="semualaporancabangbankberdasarkanberattotalsampah")
            {
                include 'semua_laporan_cabang_bank_berdasarkan_berat_total_sampah.php';
            }  
            elseif($_GET['halaman']=="semualaporantotalhadiahberdasarkanhadiah")
            {
                include 'semua_laporan_total_hadiah_berdasarkan_hadiah.php';
            }  
            elseif($_GET['halaman']=="semualaporantotalhadiahberdasarkanjenishadiah")
            {
                include 'semua_laporan_total_hadiah_berdasarkan_jenis_hadiah.php';
            }  
            elseif($_GET['halaman']=="semualaporantotalberatberdasarkanjenissampah")
            {
                include 'semua_laporan_total_berat_berdasarkan_jenis_sampah.php';
            }  
            elseif($_GET['halaman']=="semualaporantotalberatberdasarkansampah")
            {
                include 'semua_laporan_total_berat_berdasarkan_sampah.php';
            }    
            elseif($_GET['halaman']=="semualaporantransaksiklaim")
            {
                include 'semua_laporan_transaksi_klaim.php';
            }            
            elseif($_GET['halaman']=="semualaporantransaksisetor")
            {
                include 'semua_laporan_transaksi_setor.php';
            }
            elseif($_GET['halaman']=="semuanotagift")
            {
                include 'semua_nota_gift.php';
            }
            elseif($_GET['halaman']=="semuanotasetor")
            {
                include 'semua_nota_setor.php';
            }
            elseif($_GET['halaman']=="detailnotaklaim")
            {
                include 'detail_nota_klaim.php';
            }            
            elseif($_GET['halaman']=="detailnotasetor")
            {
                include 'detail_nota_setor.php';
            }
            elseif($_GET['halaman']=="hapus_admin")
            {
                include 'hapus_admin.php';
            }
            elseif($_GET['halaman']=="hapus_cabang_bank")
            {
                include 'hapus_cabang_bank.php';
            }
            elseif($_GET['halaman']=="hapus_kota")
            {
                include 'hapus_kota.php';
            } 
            elseif($_GET['halaman']=="hapus_hadiah")
            {
                include 'hapus_hadiah.php';
            }
            elseif($_GET['halaman']=="hapus_jenis_akun")
            {
                include 'hapus_jenis_akun.php';
            }   
            elseif($_GET['halaman']=="hapus_jenis_sampah")
            {
                include 'hapus_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="hapus_jenis_satuan")
            {
                include 'hapus_jenis_satuan.php';  
            }          
            elseif($_GET['halaman']=="hapus_akun")
            {
                include 'hapus_akun.php';
            }          
            elseif($_GET['halaman']=="hapus_nota_gift")
            {
                include 'hapus_nota_gift.php';
            }
            elseif($_GET['halaman']=="hapus_nota_setor")
            {
                include 'hapus_nota_setor.php';
              }
            elseif($_GET['halaman']=="hapus_status_setor")
            {
                include 'hapus_status_setor.php';
            }
            elseif($_GET['halaman']=="hapus_sampah")
            {
                include 'hapus_sampah.php';
            }            
            elseif($_GET['halaman']=="hapus_transaksi_gift")
            {
                include 'hapus_transaksi_gift.php';
             }            
            elseif($_GET['halaman']=="hapus_status_klaim")
            {
                include 'hapus_status_klaim.php';
            }
            elseif($_GET['halaman']=="hapus_transaksi_stok_sampah")
            {
                include 'hapus_transaksi_stok_sampah.php';
            }
            elseif($_GET['halaman']=="hapus_transaki_setor_sampah")
            {
                include 'hapus_transaksi_setor_sampah.php';
            }
            elseif($_GET['halaman']=="pencarian_admin")
            {
                include 'pencarian_admin.php';
            }
            elseif($_GET['halaman']=="pencarian_cabang_bank")
            {
                include 'pencarian_cabang_bank.php';
            }
            elseif($_GET['halaman']=="pencarian_kota")
            {
                include 'pencarian_kota.php';
            } 
            elseif($_GET['halaman']=="pencarian_hadiah")
            {
                include 'pencarian_hadiah.php';
                            } 
            elseif($_GET['halaman']=="pencarianlaporanstokhadiah")
            {
                include 'pencarian_laporan_stok_hadiah.php';
            }
            elseif($_GET['halaman']=="pencarian_jenis_akun")
            {
                include 'pencarian_jenis_akun.php';
            }   
            elseif($_GET['halaman']=="pencarian_jenis_sampah")
            {
                include 'pencarian_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="pencarian_jenis_satuan")
            {
                include 'pencarian_jenis_satuan.php';  
            }          
            elseif($_GET['halaman']=="pencarian_akun")
            {
                include 'pencarian_akun.php';
            }          
            elseif($_GET['halaman']=="pencarian_nota_gift")
            {
                include 'pencarian_nota_gift.php';
                        }          
            elseif($_GET['halaman']=="pencariansemuanotaklaim")
            {
                include 'pencarian_semua_nota_klaim.php';
                                    }          
            elseif($_GET['halaman']=="pencariansemuanotasetor")
            {
                include 'pencarian_semua_nota_setor.php';
            }
            elseif($_GET['halaman']=="pencarian_nota_setor")
            {
                include 'pencarian_nota_setor.php';
            }
            elseif($_GET['halaman']=="pencarian_status_setor")
            {
                include 'pencarian_status_setor.php';
            }
            elseif($_GET['halaman']=="pencarian_sampah")
            {
                include 'pencarian_sampah.php';
            }            
            elseif($_GET['halaman']=="pencarian_transaksi_gift")
            {
                include 'pencarian_transaksi_gift.php';
            }            
            elseif($_GET['halaman']=="pencarian_status_klaim")
            {
                include 'pencarian_status_klaim.php';
            }
            elseif($_GET['halaman']=="pencarian_transaksi_stok_sampah")
            {
                include 'pencarian_transaksi_stok_sampah.php';
            }
            elseif($_GET['halaman']=="pencarian_transaki_setor_sampah")
            {
                include 'pencarian_transaksi_setor_sampah.php';
            }
            elseif($_GET['halaman']=="semua_nota_setor")
            {
                include 'semua_nota_setor.php';
            }
            elseif($_GET['halaman']=="semua_nota_gift")
            {
                include 'semua_nota_gift.php';
            }
            elseif($_GET['halaman']=="tambah_admin")
            {
                include 'tambah_admin.php';
            }
            elseif($_GET['halaman']=="tambah_cabang_bank")
            {
                include 'tambah_cabang_bank.php';
            }
            elseif($_GET['halaman']=="tambah_kota")
            {
                include 'tambah_kota.php';
            } 
            elseif($_GET['halaman']=="tambah_hadiah")
            {
                include 'tambah_hadiah.php';
            }
            elseif($_GET['halaman']=="tambah_jenis_akun")
            {
                include 'tambah_jenis_akun.php';
            }   
            elseif($_GET['halaman']=="tambah_jenis_sampah")
            {
                include 'tambah_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="tambah_jenis_satuan")
            {
                include 'tambah_jenis_satuan.php';  
            }          
            elseif($_GET['halaman']=="tambah_akun")
            {
                include 'tambah_akun.php';
            }        
            elseif($_GET['halaman']=="tambah_nota_gift")
            {
                include 'tambah_nota_gift.php';
            }
            elseif($_GET['halaman']=="tambah_nota_setor")
            {
                include 'tambah_nota_setor.php';
            }
            elseif($_GET['halaman']=="tambah_status_setor")
            {
                include 'tambah_status_setor.php';
            }
            elseif($_GET['halaman']=="tambah_sampah")
            {
                include 'tambah_sampah.php';
            }            
            elseif($_GET['halaman']=="tambah_transaksi_gift")
            {
                include 'tambah_transaksi_gift.php';
             }            
            elseif($_GET['halaman']=="tambah_status_klaim")
            {
                include 'tambah_status_klaim.php';
            }
            elseif($_GET['halaman']=="tambah_transaksi_stok_sampah")
            {
                include 'tambah_transaksi_stok_sampah.php';
            }
            elseif($_GET['halaman']=="tambah_transaki_setor_sampah")
            {
                include 'tambah_transaksi_setor_sampah.php';
            }
            elseif($_GET['halaman']=="ubah_admin")
            {
                include 'ubah_admin.php';
            }
            elseif($_GET['halaman']=="ubah_cabang_bank")
            {
                include 'ubah_cabang_bank.php';
            }
            elseif($_GET['halaman']=="ubah_kota")
            {
                include 'ubah_kota.php';
            } 
            elseif($_GET['halaman']=="ubah_hadiah")
            {
                include 'ubah_hadiah.php';
            }
            elseif($_GET['halaman']=="ubah_jenis_akun")
            {
                include 'ubah_jenis_akun.php';
            }   
            elseif($_GET['halaman']=="ubah_jenis_sampah")
            {
                include 'ubah_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="ubah_jenis_satuan")
            {
                include 'ubah_jenis_satuan.php';  
            }          
            elseif($_GET['halaman']=="ubah_akun")
            {
                include 'ubah_akun.php';
            }          
            elseif($_GET['halaman']=="ubah_nota_gift")
            {
                include 'ubah_nota_gift.php';
            }
            elseif($_GET['halaman']=="ubah_nota_setor")
            {
                include 'ubah_nota_setor.php';
            }
            elseif($_GET['halaman']=="ubah_status_setor")
            {
                include 'ubah_status_setor.php';
            }
            elseif($_GET['halaman']=="ubah_sampah")
            {
                include 'ubah_sampah.php';
            }            
            elseif($_GET['halaman']=="ubah_transaksi_gift")
            {
                include 'ubah_transaksi_gift.php';
                        }            
            elseif($_GET['halaman']=="ubah_status_klaim")
            {
                include 'ubah_status_klaim.php';
            }
            elseif($_GET['halaman']=="ubah_transaksi_stok_sampah")
            {
                include 'ubah_transaksi_stok_sampah.php';
            }
            elseif($_GET['halaman']=="ubah_transaki_setor_sampah")
            {
                include 'ubah_transaksi_setor_sampah.php';
            }
         }
        else
         {
            include 'home.php';
         }                 
  ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>