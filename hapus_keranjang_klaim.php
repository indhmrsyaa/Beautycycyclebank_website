<?php
session_start();
$ID_Hadiah=$_GET["id"];
unset($_SESSION["keranjang_klaim"][$ID_Hadiah]);

	echo "<script>alert('Produk Berhasil Dihapus dari Keranjang');</script>";
	echo "<script>location='keranjang_klaim.php';</script>";
?>