<?php
$ambil=$koneksi->query("SELECT * FROM jenis_satuan WHERE ID_Satuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM jenis_satuan WHERE ID_Satuan='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenissatuan';</script>";
?>