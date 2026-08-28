<?php
$idmem = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM nota_setor JOIN akun ON nota_setor.ID_Akun=akun.ID_Akun WHERE nota_setor.ID_Nota_Setor='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>

<?php 
{
$koneksi->query("UPDATE nota_setor JOIN akun ON nota_setor.ID_Akun=akun.ID_Akun SET Total_Poin_Akun=Total_Poin_Akun-Total_Poin WHERE ID_Nota_Setor='$idmem' AND nota_setor.ID_Statussetor='SS000001'");

$ambil=$koneksi->query("SELECT * FROM nota_setor WHERE ID_Nota_Setor='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
}

$koneksi->query("DELETE FROM nota_setor WHERE ID_Nota_Setor='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=notasetor';</script>";
?>



