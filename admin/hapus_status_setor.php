<?php
$ambil=$koneksi->query("SELECT * FROM status_setor WHERE ID_Statussetor='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM status_setor WHERE ID_Statussetor='$_GET[id]'");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=statussetor';</script>";
?>