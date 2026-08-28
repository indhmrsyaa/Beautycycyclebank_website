<?php
$ambil=$koneksi->query("SELECT * FROM Jenis_Satuan WHERE ID_Satuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label> Id Jenis Satuan </label>
    <input type="text" class="form-control" name="IDSatuan"  value="<?php echo $pecah['ID_Satuan'];?>"required>
  </div>
  <div class="form-group">
    <label> Jenis Satuan </label>
    <input type="text" class="form-control" name="Jenissatuan" value="<?php echo $pecah['Jenis_Satuan'];?>"required>
  </div>
  <button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
  $koneksi->query("UPDATE Jenis_Satuan SET ID_Satuan='$_POST[IDSatuan]',Jenis_Satuan='$_POST[Jenissatuan]' WHERE ID_Satuan='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=jenissatuan';</script>";
}

?>