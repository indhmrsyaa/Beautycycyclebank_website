<?php
$ambil=$koneksi->query("SELECT * FROM admin WHERE Email='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM admin WHERE Email='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=admin';</script>";
?>