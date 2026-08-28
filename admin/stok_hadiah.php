<?php
$ambil=$koneksi->query("SELECT * FROM hadiah WHERE ID_Gift='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>
<div class="container-fluid px-4">
    <h2 class="mt-0.7"> tambah Stok Hadiah <?php echo $pecah['Nama_Gift'];?> Di cabang </h2>
<div class="container-fluid px-4">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Cabang Bank </label>
		<select class="form-control" name="ID_Cabang_Bank">
	<option style="display :none"value="" disabled selected>--Pilih Cabang Bank--</option>
		<?php $ambil=$koneksi->query("SELECT*FROM cabang_bank_sampah");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['ID_Cabang_Bank']?>" required><?php echo $pecahh['ID_Cabang_Bank']?>-<?php echo $pecahh['Nama_Bank']?></option>
	<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label> Stok di Cabang Bank </label>
		<input type="text" class="form-control" name="Sub_Stok_Gift">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$Tgl_Update=date("Y-m-d");
	$transaksi_stok_hadiah_result = $koneksi->query("SELECT * FROM transaksi_stok_hadiah WHERE ID_Gift='$_GET[id]' AND ID_Cabang_Bank='$_POST[ID_Cabang_Bank]'");
	if ($transaksi_stok_hadiah_result) 
				{
					//jika sudah ada data, update
					if ($transaksi_stok_hadiah_result->num_rows > 0) {


						$transaksi_stok_hadiah = $transaksi_stok_hadiah_result->fetch_assoc();

                        // Memeriksa apakah stok yang diupdate lebih besar dari stok lama
                        if ($_POST['Sub_Stok_Gift'] > $transaksi_stok_hadiah['Stok_Hadiah']) 
                        {
                            // Jika lebih besar, hitung selisih stok
                            $selisihStok = $_POST['Sub_Stok_Gift'] - $transaksi_stok_hadiah['Stok_Hadiah'];

                            // Update transaksi_stok_hadiah
                            $koneksi->query("UPDATE transaksi_stok_hadiah SET Stok_Hadiah='$_POST[Sub_Stok_Gift]', Tanggal_Update='$tgl_update' WHERE ID_Gift='$_GET[id]' AND ID_Cabang_Bank='$_POST[id_cabang_bank]'");

                            // Update hadiah dengan menambahkan selisih stok
                            $koneksi->query("UPDATE hadiah SET Stok_Gift=Stok_Gift+$selisihStok WHERE ID_Gift='$_GET[id]'");
                        } 
                        elseif ($_POST['Sub_Stok_Gift'] < $transaksi_stok_hadiah['Stok_Hadiah']) 
                        {
                            // Jika lebih kecil, hitung selisih stok
                            $selisihStok = $transaksi_stok_hadiah['Stok_Hadiah'] - $_POST['Sub_Stok_Gift'];

                            // Update transaksi_stok_hadiah
                            $koneksi->query("UPDATE transaksi_stok_hadiah SET Stok_Hadiah='$_POST[Sub_Stok_Gift]', Tanggal_Update='$tgl_update' WHERE ID_Gift='$_GET[id]' AND ID_Cabang_Bank='$_POST[id_cabang_bank]'");

                            // Update hadiah dengan mengurangkan selisih stok
                            $koneksi->query("UPDATE hadiah SET Stok_Gift=Stok_Gift-$selisihStok WHERE ID_Gift='$_GET[id]'");
                        } 
                        else 
                        {
                            // Jika stok sama, lakukan update tanpa perubahan stok
                            $koneksi->query("UPDATE transaksi_stok_hadiah SET Stok_Hadiah='$_POST[Sub_Stok_Gift]', Tanggal_Update='$tgl_update' WHERE ID_Gift='$_GET[id]' AND ID_Cabang_Bank='$_POST[id_cabang_bank]'");
                        }
						
					} 
					//jika blm ada data, insert
					else {
						$koneksi->query("INSERT INTO transaksi_stok_hadiah (ID_Cabang_Bank, ID_Gift, Stok_Hadiah, Tanggal_Update) VALUES ('$_POST[ID_Cabang_Bank]', '$_GET[id]', '$_POST[Sub_Stok_Gift]', '$Tgl_Update')");
						$koneksi->query("UPDATE hadiah SET Stok_Gift=Stok_Gift+'$_POST[Sub_Stok_Gift]'WHERE ID_Gift='$_GET[id]' ");
					}
				} 
				else 
				{
					echo "Error in query: " . $koneksi->error;
				}

	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=stokhadiahcabang&id=$_GET[id]'>";
	}
?>  
