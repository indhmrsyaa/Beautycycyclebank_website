<?php
$ambil=$koneksi->query("SELECT * FROM jenis_sampah WHERE ID_Jenis_Sampah='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label> Id Jenis Sampah </label>
    <input type="text" class="form-control" name="IdJenisSampah"  value="<?php echo $pecah['ID_Jenis_Sampah'];?>"required>
  </div>
  <div class="form-group">
    <label> Jenis Sampah </label>
    <input type="text" class="form-control" name="JenisSampah" value="<?php echo $pecah['Jenis_Sampah'];?>"required>
  </div>
  <button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
  $koneksi->query("UPDATE jenis_sampah SET ID_Jenis_Sampah='$_POST[IdJenisSampah]',Jenis_Sampah='$_POST[JenisSampah]' WHERE Id_Jenis_Sampah='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=jenissampah';</script>";
}

?>