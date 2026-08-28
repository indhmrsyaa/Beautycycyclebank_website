<?php
$ambil=$koneksi->query("SELECT * FROM jenis_akun WHERE ID_Jenis_Akun='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM jenis_akun WHERE ID_Jenis_Akun='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenisakun';</script>";
?>