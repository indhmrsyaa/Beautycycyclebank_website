<?php
session_start();
//mendapatkan kode_produk dari url
$ID_Hadiah = $_GET['id'];


// jika sudah ada produk itu dikeranjang maka produk itu jumlahnya ditambah 1
if(isset($_SESSION['keranjang_klaim'][$ID_Hadiah] ))
{
	$_SESSION['keranjang_klaim'][$ID_Hadiah ]+=1;

}

//selain itu(blm ada dikeranjang, maka produk dianggap dibeli 1
else
{
	$_SESSION['keranjang_klaim'][$ID_Hadiah ]=1;

}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

	//larikan ke halaman keranjang
	echo "<script>alert('Barang telah masuk ke keranjang belanja!');</script>";
	echo "<script>location='klaim_hadiah.php';</script>";
?>