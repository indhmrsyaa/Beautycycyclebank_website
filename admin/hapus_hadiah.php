<?php
$ambil=$koneksi->query("SELECT * FROM hadiah WHERE ID_Gift='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM hadiah WHERE ID_Gift='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=hadiah';</script>";
?>