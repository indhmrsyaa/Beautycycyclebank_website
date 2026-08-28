<?php
session_start();
//mendapatkan kode_produk dari url
$ID_Sampah = $_GET['id'];

// jika sudah ada produk itu dikeranjang maka produk itu jumlahnya ditambah 1
if(isset($_SESSION['keranjang_setor'][$ID_Sampah]))
{
	$_SESSION['keranjang_setor'][$ID_Sampah]+=1;
}

//selain itu(blm ada dikeranjang, maka produk dianggap dibeli 1
else
{
	$_SESSION['keranjang_setor'][$ID_Sampah]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

	//larikan ke halaman keranjang
	echo "<script>alert('Barang telah masuk ke keranjang belanja!');</script>";
	echo "<script>location='setor_sampah.php';</script>";
?>