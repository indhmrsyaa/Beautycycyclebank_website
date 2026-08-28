<?php
$ambil=$koneksi->query("SELECT * FROM sampah WHERE ID_Sampah='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM sampah WHERE ID_Sampah='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=sampah';</script>";
?>