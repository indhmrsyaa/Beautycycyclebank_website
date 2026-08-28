<?php
$ambil=$koneksi->query("SELECT * FROM cabang_bank_sampah WHERE ID_Cabang_Bank='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM cabang_bank_sampah WHERE ID_Cabang_Bank='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=cabangbank';</script>";
?>