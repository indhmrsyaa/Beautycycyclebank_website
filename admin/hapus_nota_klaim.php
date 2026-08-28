<?php
$idmem = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM nota_gift JOIN akun ON nota_gift.ID_Akun=Akun.ID_Akun WHERE nota_gift.ID_Nota_Gift='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>

<?php 
{
$koneksi->query("UPDATE nota_gift JOIN Akun ON nota_gift.ID_Akun=akun.ID_Akun SET Total_Poin_Akun=Total_Poin_Akun+Poin_Klaim WHERE ID_Nota_gift='$idmem' AND nota.gift='SK000002'");
$koneksi->query("UPDATE nota_gift INNER JOIN transaksi_gift ON transaksi_gift.ID_Nota_Gift=nota_gift.ID_Nota_Gift Join hadiah on transaksi_gift.ID_Gift=hadiah.ID_Gift SET Stok_Gift=Stok_Gift-QTY WHERE ID_Nota_gift='$idmem'");

$ambil=$koneksi->query("SELECT * FROM nota_Gift WHERE ID_Nota_Gift='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
}

$koneksi->query("DELETE FROM nota_gift WHERE ID_Nota_Gift='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=notagift';</script>";
?>

