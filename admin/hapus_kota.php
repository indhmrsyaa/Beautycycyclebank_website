<?php
$ambil=$koneksi->query("SELECT * FROM Kota WHERE ID_Kota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM kota WHERE ID_Kota='$_GET[id]'");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kota';</script>";
?>