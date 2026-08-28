<?php 
session_start();
$koneksi=new mysqli ("localhost","root", "", "beautycyclebank");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>
    ADMIN | BeautyCycleBank
  </title>
  <!-- Favicon -->
  <link href="../assets/img/brand/ikonn.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,6600,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white"  id="sidenav-main" >
    <div class="container-fluid">
        
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="sidenav-header  align-items-center">
      <a class="navbar-brand " ref="javascript:void(0)">
        <img src="assets/img/brand/logo2.png"  class="navbar-brand-img" style="height:80px" width="80px" alt="">
      </a>
    </div>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <!-- Form -->
        <!-- Navigation -->
            <div class="sb-sidenav-menu-heading">Admin</div>
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-danger"></i><span class="text-darker">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=akun">
              <i class="ni ni-badge text-green"></i> <span class="text-darker">Akun</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=cabangbank">
              <i class="ni ni-pin-3 text-orange"></i> <span class="text-darker">Cabang Bank</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=sampah">
              <i class="ni ni-shop text-red"></i> <span class="text-darker">Sampah</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=hadiah">
              <i class="ni ni-shop text-red"></i> <span class="text-darker">Hadiah</span>
            </a>
          </li>
          <li class="nav-item dropdown">
             <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-tag text-purple"></i>
            <span class="text-darker">Nota</span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-center" aria-labelledby="navbar-default_dropdown_1">
                   <a class="dropdown-item" href="index.php?halaman=notasetor">Nota Setor</a>
                   <a class="dropdown-item" href="index.php?halaman=notagift">Nota Gift</a>
                </div>
          </li>
          <li class="nav-item dropdown">
             <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-tag text-purple"></i>
                <span class="text-darker">
                      Transaksi
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-center" aria-labelledby="navbar-default_dropdown_1">
                   <a class="dropdown-item" href="index.php?halaman=transaksisetor">Transaksi Setor</a>
                   <a class="dropdown-item" href="index.php?halaman=transaksigift">Transaksi klaim Gift</a>
                   <a class="dropdown-item" href="index.php?halaman=transaksistok">Transaksi Stok sampah</a>
                   <a class="dropdown-item" href="index.php?halaman=transaksistokhadiah">Transaksi Stok hadiah</a>
                </div>
          </li>
          <li class="nav-item dropdown">
             <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-key-25 text-pink"></i>
                    <span class="text-darker">
                      jenis
                    </span>
                </a>
                <div class="dropdown-menu  dropdown-menu-center" aria-labelledby="navbar-default_dropdown_1">
                   <a class="dropdown-item" href="index.php?halaman=jenisakun">Jenis Akun</a>
                   <a class="dropdown-item" href="index.php?halaman=jenissampah">Jenis Sampah</a>
                   <a class="dropdown-item" href="index.php?halaman=jenissatuan">Jenis Satuan </a>
                </div>
          </li>

          <li class="nav-item dropdown">
             <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-key-25 text-pink"></i>
                    <span class="text-darker">
                      Status
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-center" aria-labelledby="navbar-default_dropdown_1">
                   <a class="dropdown-item" href="index.php?halaman=statussetor">Status Setor</a>
                   <a class="dropdown-item" href="index.php?halaman=statusklaim">Status klaim Gift</a>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=kota">
              <i class="ni ni-pin-3 text-danger"></i> <span class="text-darker">Kota</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=provinsi">
              <i class="ni ni-pin-3 text-danger"></i> <span class="text-darker">Provisi</span>
            </a>
          </li>
           <!-- <a class="nav-link" href="index.php?halaman=admin">
                  <div class="sb-nav-link-icon"><i class="fas fa-admin"></i></div>
                    <i class="text-success"> USER </i> -->
            </a>
          <a class="nav-link" href="logout.php">
                <div class="ni ni-link-icon"></div>
                <i class="text-danger"> Logout </i>
          </a>
        </ul>
        </ul>
      </div>
    </div>
  </nav>
  </body>

  <!-- Header -->
  <div class="main-content" id="panel">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php"></a>
        <!-- Form -->
        <!-- User -->

      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header  pb-8 pt-5 pt-md-8"  style="background-image: url('../Photo/bg0.jpg'); background-size: cover; background-position: center;">  
      <div class="container-fluid">
        <div class="header-body">
    </div>
  </div>
  
  <?php

        if (isset($_GET['halaman']))
         {
            if($_GET['halaman']=="admin")
            {
                include 'admin.php';
            }
            elseif($_GET['halaman']=="cabangbank")
            {
                include 'cabang_bank.php';
            } 
            elseif($_GET['halaman']=="hadiah")
            {
                include 'hadiah.php';
            }
            elseif($_GET['halaman']=="jenisakun")
            {
                include 'jenis_akun.php';
            }   
            elseif($_GET['halaman']=="jenissampah")
            {
                include 'jenis_sampah.php';
            }            
            elseif($_GET['halaman']=="jenissatuan")
            {
                include 'jenis_satuan.php';
            }
            elseif($_GET['halaman']=="akun")
            {
                include 'akun.php';
            }
            elseif($_GET['halaman']=="stokhadiahcabang")
            {
                include 'stok_hadiah_cabang.php';
            }
            
            elseif($_GET['halaman']=="laporanhadiahklaim")
            {
                include 'laporan_hadiah_klaim.php';
            }
            elseif($_GET['halaman']=="stokhadiah")
            {
                include 'stok_hadiah.php';
            }
            elseif($_GET['halaman']=="notasetor")
            {
                include 'nota_setor.php';
            }
            elseif($_GET['halaman']=="notagift")
            {
                include 'nota_gift.php';
            }
            elseif($_GET['halaman']=="sampah")
            {
                include 'sampah.php';
            }            
            elseif($_GET['halaman']=="statusklaim")
            {
                include 'status_klaim.php';
            }
            elseif($_GET['halaman']=="statussetor")
            {
                include 'status_setor.php';
            }
            elseif($_GET['halaman']=="kota")
            {
                include 'kota.php';
            }
            elseif($_GET['halaman']=="provinsi")
            {
                include 'provinsi.php';
            }
            elseif($_GET['halaman']=="transaksisetor")
            {
                include 'transaksi_setor.php';
            }
            elseif($_GET['halaman']=="transaksistok")
            {
                include 'transaksi_stok.php';
            }
            
            elseif($_GET['halaman']=="transaksistokhadiah")
            {
                include 'transaksi_stok_hadiah.php';
            }
            elseif($_GET['halaman']=="detailtransaksi")
            {
                include 'detail_transaksi_setor.php';
            }
            elseif($_GET['halaman']=="detailtransaksigift")
            {
                include 'detail_transaksi_gift.php';
            }
            elseif($_GET['halaman']=="transaksigift")
            {
                include 'transaksi_klaim.php';
            }
            elseif($_GET['halaman']=="laporanakun")
            {
                include 'laporan_akun.php';
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
            elseif($_GET['halaman']=="laporanmember")
            {
                include 'laporan_member.php';
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
            elseif($_GET['halaman']=="laporantotalberatberdasarkanjenissampah")
            {
                include 'laporan_total_berat_berdasarkan_jenis_sampah.php';
            }  
            elseif($_GET['halaman']=="laporantotalberatberdasarkansampah")
            {
                include 'laporan_total_berat_berdasarkan_sampah.php';
            }
            elseif($_GET['halaman']=="laporantotalhadiah")
            {
                include 'laporan_total_hadiah.php';
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
            elseif($_GET['halaman']=="semualaporantotalhadiah")
            {
                include 'semua_laporan_total_hadiah.php';
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
            elseif($_GET['halaman']=="laporanstoksampah")
            {
                include 'laporan_stok_sampah.php';
            }
            elseif($_GET['halaman']=="laporanstoksampahberdasarkancabangbank")
            {
                include 'laporan_stok_sampah_berdasarkan_cabang_bank.php';
            }
            elseif($_GET['halaman']=="laporanstoksampahberdasarkankota")
            {
                include 'laporan_stok_sampah_berdasarkan_kota.php';
            }
            elseif($_GET['halaman']=="laporanstoksampahberdasarkanprovinsi")
            {
                include 'laporan_stok_sampah_berdasarkan_provinsi.php';
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
            elseif($_GET['halaman']=="hapusadmin")
            {
                include 'hapus_admin.php';
            }
            elseif($_GET['halaman']=="hapuscabangbank")
            {
                include 'hapus_cabang_bank.php';
            }
            elseif($_GET['halaman']=="hapuscabangpabrik")
            {
                include 'hapus_cabang_pabrik.php';
            }
            elseif($_GET['halaman']=="hapushadiah")
            {
                include 'hapus_hadiah.php';
            }
            elseif($_GET['halaman']=="hapusjenisakun")
            {
                include 'hapus_jenis_akun.php';
            }
            elseif($_GET['halaman']=="hapusjenissampah")
            {
                include 'hapus_jenis_sampah.php';
            }     
            elseif($_GET['halaman']=="hapusjenissatuan")
            {
                include 'hapus_jenis_satuan.php';
            }       
            elseif($_GET['halaman']=="hapusmember")
            {
                include 'hapus_member.php';
            } 
            elseif($_GET['halaman']=="hapusprovinsi")
            {
                include 'hapus_provinsi.php';
            }
            elseif($_GET['halaman']=="hapusnotaklaim")
            {
                include 'hapus_nota_klaim.php';
            }   
            elseif($_GET['halaman']=="hapusnotasetor")
            {
                include 'hapus_nota_setor.php';
            }    
            elseif($_GET['halaman']=="hapussampah")
            {
                include 'hapus_sampah.php';
            }      
            elseif($_GET['halaman']=="hapusstatusklaim")
            {
                include 'hapus_status_klaim.php';
            } 
            elseif($_GET['halaman']=="hapusstatussetor")
            {
                include 'hapus_status_setor.php';
            }
            elseif($_GET['halaman']=="hapusdaftarstoksampah")
            {
                include 'hapus_daftar_stok_sampah.php';
            }
            elseif($_GET['halaman']=="hapuskota")
            {
                include 'hapus_kota.php';
            }
            elseif($_GET['halaman']=="konfirmasinotasetor")
            {
                include 'konfirmasi_nota_setor.php';
            }
            elseif($_GET['halaman']=="pencarianlaporanstokhadiah")
            {
                include 'pencarian_laporan_stok_hadiah.php';
            }
            elseif($_GET['halaman']=="pencarianadmin")
            {
                include 'pencarian_admin.php';
            }
            elseif($_GET['halaman']=="pencarianakun")
            {
                include 'pencarian_akun.php';
            }
            elseif($_GET['halaman']=="pencariancabangbank")
            {
                include 'pencarian_cabang_bank.php';
            }
            elseif($_GET['halaman']=="pencariancabangpabrik")
            {
                include 'pencarian_cabang_pabrik.php';
            }
            elseif($_GET['halaman']=="pencarianhadiah")
            {
                include 'pencarian_hadiah.php';
            }
            elseif($_GET['halaman']=="pencarianjenisakun")
            {
                include 'pencarian_jenis_akun.php';
            }
            elseif($_GET['halaman']=="pencarianjenissampah")
            {
                include 'pencarian_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="pencarianjenissatuan")
            {
                include 'pencarian_jenis_satuan.php';
            }
            elseif($_GET['halaman']=="pencarianmember")
            {
                include 'pencarian_member.php';
            }
            elseif($_GET['halaman']=="pencarianprovinsi")
            {
                include 'pencarian_provinsi.php';
            }
            elseif($_GET['halaman']=="pencariansampah")
            {
                include 'pencarian_sampah.php';
            }
            elseif($_GET['halaman']=="pencariandaftarstoksampah")
            {
                include 'pencarian_daftar_stok_sampah.php';
            }
            elseif($_GET['halaman']=="pencarianstatusklaim")
            {
                include 'pencarian_status_klaim.php';
            }
            elseif($_GET['halaman']=="pencarianstatussetor")
            {
                include 'pencarian_status_setor.php';
            }
            
            elseif($_GET['halaman']=="tambahstok")
            {
                include 'tambah_stok.php';
            }
            elseif($_GET['halaman']=="pencariansemuanotasetor")
            {
                include 'pencarian_semua_nota_setor.php';
            }
            elseif($_GET['halaman']=="pencariankota")
            {
                include 'pencarian_kota.php';
            }
            elseif($_GET['halaman']=="tambahadmin")
            {
                include 'tambah_admin.php';
            }    
            elseif($_GET['halaman']=="tambahcabangbank")
            {
                include 'tambah_cabang_bank.php';
            }
            elseif($_GET['halaman']=="tambahcabangpabrik")
            {
                include 'tambah_cabang_pabrik.php';
            }
            elseif($_GET['halaman']=="tambahhadiah")
            {
                include 'tambah_hadiah.php';
            }
            elseif($_GET['halaman']=="tambahprovinsi")
            {
                include 'tambah_provinsi.php';
            }
            elseif($_GET['halaman']=="tambahjenisakun")
            {
                include 'tambah_jenis_akun.php';
            }
            elseif($_GET['halaman']=="tambahjenissampah")
            {
                include 'tambah_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="tambahjenissatuan")
            {
                include 'tambah_jenis_satuan.php';
            }
            elseif($_GET['halaman']=="tambahmember")
            {
                include 'tambah_member.php';
            }
            elseif($_GET['halaman']=="tambahnotaklaim")
            {
                include 'tambah_nota_klaim.php';
            }
            elseif($_GET['halaman']=="tambahnotasetor")
            {
                include 'tambah_nota_setor.php';
            }
            elseif($_GET['halaman']=="tambahsampah")
            {
                include 'tambah_sampah.php';
            }
            elseif($_GET['halaman']=="tambahdaftarstoksampah")
            {
                include 'tambah_daftar_stok_sampah.php';
            }          
            elseif($_GET['halaman']=="tambahstatusklaim")
            {
                include 'tambah_status_klaim.php';
            }    
            elseif($_GET['halaman']=="tambahstatussetor")
            {
                include 'tambah_status_setor.php';
            }
            elseif($_GET['halaman']=="tambahkota")
            {
                include 'tambah_kota.php';
            }
            elseif($_GET['halaman']=="ubahadmin")
            {
                include 'ubah_admin.php';
            }
            elseif($_GET['halaman']=="ubahcabangbank")
            {
                include 'ubah_cabang_bank.php';
            }
            elseif($_GET['halaman']=="ubahcabangpabrik")
            {
                include 'ubah_cabang_pabrik.php';
            }
            elseif($_GET['halaman']=="ubahhadiah")
            {
                include 'ubah_hadiah.php';
            }
            elseif($_GET['halaman']=="ubahprovinsi")
            {
                include 'ubah_provinsi.php';
            }
            elseif($_GET['halaman']=="ubahjenisakun")
            {
                include 'ubah_jenis_akun.php';
            }
            elseif($_GET['halaman']=="ubahjenissampah")
            {
                include 'ubah_jenis_sampah.php';
            }
            elseif($_GET['halaman']=="ubahjenissatuan")
            {
                include 'ubah_jenis_satuan.php';
            }
            elseif($_GET['halaman']=="ubahakun")
            {
                include 'ubah_akun.php';
            }
            elseif($_GET['halaman']=="konfirmasinotaklaim")
            {
                include 'konfirmasi_nota_klaim.php';
            }

            elseif($_GET['halaman']=="ubahsampah")
            {
                include 'ubah_sampah.php';
            } 
            elseif($_GET['halaman']=="ubahstatussetor")
            {
                include 'ubah_status_setor.php';
            }            
            elseif($_GET['halaman']=="ubahstatusklaim")
            {
                include 'ubah_status_klaim.php';
            }
            elseif($_GET['halaman']=="ubahdaftarstoksampah")
            {
                include 'ubah_daftar_stok_sampah.php';
            }
            elseif($_GET['halaman']=="ubahkota")
            {
                include 'ubah_kota.php';
            } 
            elseif($_GET['halaman']=="laporanstokhadiahkosong")
            {
                include 'laporan_stok_hadiah_yang_kosong.php';
            } 
            elseif($_GET['halaman']=="laporanstokhadiahberdasarkankota")
            {
                include 'laporan_stok_hadiah_berdasarkan_kota.php';
            } 
            elseif($_GET['halaman']=="laporanstokhadiahberdasarkanprovinsi")
            {
                include 'laporan_stok_hadiah_berdasarkan_provinsi.php';
            } 
            elseif($_GET['halaman']=="laporanstokhadiahberdasarkancabangbank")
            {
                include 'laporan_stok_hadiah_berdasarkan_cabang_bank.php';
            } 
         }        
         else
         {
            include 'home.php';
         }               
  ?>
  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>