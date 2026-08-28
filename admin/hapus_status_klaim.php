<?php
$ambil=$koneksi->query("SELECT * FROM status_klaim WHERE ID_Statusklaim='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM status_klaim WHERE ID_Statusklaim='$_GET[id]'");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=statusklaim';</script>";
?>