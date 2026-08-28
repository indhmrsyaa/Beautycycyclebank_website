<?php 

  require_once "koneksi.php";

$ID_Provinsi = $_POST['ID_Provinsi'];

$sql = mysqli_query($koneksi, "SELECT * FROM kota WHERE ID_Provinsi = '$ID_Provinsi' ");
echo '<option> Pilih Kota </option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['ID_Kota'].'">'.$row['Nama_Kota'].'</option>';
}

?>

