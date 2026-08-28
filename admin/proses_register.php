<?php
   require_once("koneksi.php");
   $Email = $_POST['Email'];
   $Nama_Admin = $_POST['Nama_Admin'];
   $Password = $_POST['Password'];
   $Level = $_POST['Level'];
   $sql = "SELECT * FROM admin WHERE Email = '$Email'";
   $query = $koneksi->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'><h1>Email Sudah Terdaftar! <a href='register.php'>Back?</a></div>";
   } else {
     if(!$Email|| !$Nama_Admin || !$Password || !$Level){
     } else {
       $data = "INSERT INTO admin VALUES ('$Email','$Nama_Admin','$Password','$Level')";
       $simpan = $koneksi->query($data);
       if($simpan) {
         echo "<script> alert('Pendaftaran Sukses, Silahkan Login');</script>";
         echo "<script> location='login.php';</script>";
       } else {
         echo "<div align='center'><h1>Proses Gagal!</h1></div>";
       }
     }
   }
?>