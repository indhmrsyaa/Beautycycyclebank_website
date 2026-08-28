<?php
session_start();
$ID_Sampah=$_GET["id"];
unset($_SESSION["keranjang_setor"][$ID_Sampah]);

	echo "<script>alert('Produk Berhasil Dihapus dari Keranjang');</script>";
	echo "<script>location='keranjang_setor.php';</script>";
?>