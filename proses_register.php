<?php
   require_once("admin/koneksi.php");
   $ID_Akun = $_POST['ID_Akun'];
   $ID_jenis_akun = $_POST['IDjenisakun'];  
   $Nama_Lengkap = $_POST['Nama_Lengkap'];
   $No_Hp = $_POST['No_Hp'];   
   $Email = $_POST['Email'];
   $Password = $_POST['Password'];
   $Alamat_Rumah = $_POST['Alamat_Rumah'];
   $Total_Poin=0;
    
   $sql = "SELECT * FROM Akun WHERE ID_Akun = '$ID_Akun'";
   $query = $koneksi->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'><h1>Email Sudah Terdaftar! <a href='register.php'>Back?</a></div>";
   } else {
     if(!$ID_Akun || !$ID_jenis_akun || !$Nama_Lengkap || !$No_Hp || !$Email || !$Password || !$Alamat_Rumah  ) {
     } else {
       $data = "INSERT INTO Akun VALUES ('$ID_Akun','$ID_jenis_akun','$Nama_Lengkap','$Alamat_Rumah','$No_Hp','$Email','$Password','$Total_Poin')";
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