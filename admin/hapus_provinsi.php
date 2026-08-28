<?php
$ambil=$koneksi->query("SELECT * FROM provinsi WHERE ID_Provinsi='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM provinsi WHERE ID_Provinsi='$_GET[id]'");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=provinsi';</script>";
?>