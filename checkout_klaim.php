<?php
session_start();

$koneksi=new mysqli("localhost","root","","beautycyclebank");
?>

<!DOCTYPE html>
<html>
<head>
	<title> beautycyclebank </title>
	<!-- Favicon -->
	<link href="assets/img/brand/ikonn.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body style="background-image:URL(Photo/bg4.jpg)">
<?php include'menu.php'?>
<section class="konten">
	<div class="container">
	<h1> Checkout Klaim </h1>
		<hr>
		<table class= "table table-bordered" style="background-color:cornsilk;" >
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Hadiah</th>
					<th>Besar Poin</th>
					<th>Sub Hadiah</th>
					<th>Sub Poin Klaim</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php $Sub_Poin_Klaim=0;?>
				<?php $Total_Hadiah=0;?>
				<?php $Poin_Klaim=0;?>
				<?php foreach ($_SESSION['keranjang_klaim'] as $ID_Hadiah=> $QTY):?>
				<!-- menampilkan produk yg sedang diperulangkan brdsrkan ID_Hadiah-->
				<?php
					$ambil=$koneksi->query("SELECT*FROM hadiah WHERE ID_Gift ='$ID_Hadiah'");
					$pecah=$ambil->fetch_assoc();
					$Sub_Poin_Klaim=$pecah["Poin_Gift"]*$QTY;
					$Total_Hadiah+=$QTY;		
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["Nama_Gift"];?> </td>
					<td><?php echo number_format($pecah['Poin_Gift']);?> Poin</td>
					<td><?php echo number_format($QTY);?></td>
					<td><?php echo number_format($Sub_Poin_Klaim,0,',','.')?> Poin</td>
				</tr>
				<?php $Poin_Klaim+=$Sub_Poin_Klaim;?>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="3">Total Hadiah</th>
					<th><?php echo number_format($Total_Hadiah)?>
				</tr>
				<tr>
					<th colspan="4">Poin Klaim</th>
					<th><?php echo number_format($Poin_Klaim)?> Poin
				</tr>
			</tfoot>
		</table>
		<form method="post">	
			<div class="row">
				<div class="col-md-4">
					<label>Nama Lengkap</label>
					<div class="form-group" name="Nama_Lengkap">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["Nama_Lengkap"]?>" 
						class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<label>Cabang Bank</label>
					<select class="form-control" name="ID_Cabang_Bank">
						<option value="">--Pilih Cabang Bank--</option>
						<?php
						$ambil=$koneksi->query("SELECT * FROM cabang_bank_sampah");
						while($pecahh=$ambil->fetch_assoc()){
						?>
						<option value="<?php echo $pecahh['ID_Cabang_Bank']?>">
							<?php echo $pecahh['Nama_Bank']?>
						</option>
						<?php }?>
					</select>
				</div>
				<div class="col-md-4">
					<label>Nomor Handphone</label>
					<div class="form-group" name="Nomor_Handphone">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["No_Hp"]?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label>Email</label>
					<div class="form-group" name="Email">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["Email"]?>" class="form-control">
					</div>
				</div>	
				<div class="col-md-4">
					<label>Alamat Rumah</label>
					<div class="form-group" name="Alamat_Rumah">
						<input type="text" readonly value="<?php echo $_SESSION["akun"]["Alamat_Rumah"]?>" class="form-control">
					</div>
				</div>
			</div>
			<br>				
			<div class="form-group">
				<label>Alamat Lengkap</label>	
				<textarea class="form-control" name="Alamat_Lengkap" placeholder="Masukkan Alamat Lengkap"></textarea>
			</div>				
				<button class="btn btn-primary" name="checkout_klaim">Checkout</button>
		</form>
		<?php $ambil=$koneksi->query("SELECT*FROM nota_gift JOIN akun ON nota_gift.ID_Akun=akun.ID_Akun
									JOIN status_klaim ON nota_gift.ID_Statusklaim=status_klaim.ID_Statusklaim 
									JOIN cabang_bank_sampah ON nota_gift.ID_Cabang_Bank=cabang_bank_sampah.ID_Cabang_Bank");?>	
		<?php
		if(isset($_POST["checkout_klaim"]))
		{
			if((empty($_POST['ID_Cabang_Bank']) OR (empty($_POST['Alamat_Lengkap'])))):
				if((empty($_POST['ID_Cabang_Bank']) AND (empty($_POST['Alamat_Lengkap'])))):
					echo "<script>alert('Harap Semua Data Diisi');</script>";
					echo "<script>location='checkout_klaim.php';</script>";
			endif;
			else:
			$ID_Member=$_SESSION["akun"]["ID_Akun"];
			$ID_Cabangbank=$_POST["ID_Cabang_Bank"];
			$ID_Statusklaim="SK000002";
			$Tanggal_Klaim=date("Y-m-d");
			$tgl_update=date("Y-m-d");
			$Alamat_Lengkap=$_POST["Alamat_Lengkap"];
			$query=mysqli_query($koneksi, "SELECT max(ID_Nota_Gift) as kodeTerbesar FROM nota_gift");
			$data=mysqli_fetch_array($query);
			$idnotaklaim=$data['kodeTerbesar'];
			$urutan=(int)substr($idnotaklaim, 6, 6);
			$urutan++;
			$huruf="NK";
			$id_notaklaim=$huruf.sprintf("%06s", $urutan);
			//$a="NS00";
			//$b=$Kode_Konsumen;
			//$ID_Notasetor=$a.$b.rand(100,999);
			//menyimpan data ke tabel nota_klaim
			$koneksi->query("INSERT INTO nota_gift (ID_Nota_Gift, ID_Akun, ID_Cabang_Bank, Tanggal_Klaim, Poin_Klaim , ID_Statusklaim) 
			VALUES ('$id_notaklaim', '$ID_Member', '$ID_Cabangbank ',  '$Tanggal_Klaim' ,  '$Poin_Klaim' , '$ID_Statusklaim')");
			//mendapatkan id Faktur barusan
			//$id_pembelian_barusan=$kode_auto_faktur;
			//$ambil=$koneksi->query("SELECT*FROM nota_setor") ;
			//$pecahh=$ambil->fetch_assoc();
			//$idnotasetorbaru=$pecahh['ID_Notasetor'];
			foreach($_SESSION["keranjang_klaim"] as $ID_Hadiah=> $QTY)
			{
				$ambils=$koneksi->query("SELECT * FROM hadiah WHERE ID_Gift='$ID_Hadiah'");
				$perproduk=$ambils->fetch_assoc();
				$Sub_Poin_Klaim=$perproduk['Poin_Gift']*$QTY;
				$stokhadiah= $perproduk["Stok_Gift"]-$QTY;
				$koneksi->query("INSERT INTO transaksi_gift (ID_Gift, ID_Nota_Gift,  QTY, sub_poin) 
				VALUES ('$ID_Hadiah', '$id_notaklaim', '$QTY', '$Sub_Poin_Klaim')");
                $koneksi->query("UPDATE hadiah SET Stok_Gift=Stok_Gift-$QTY WHERE ID_Gift='$ID_Hadiah'");
				$koneksi->query("UPDATE transaksi_stok_hadiah SET Stok_Hadiah=Stok_Hadiah-$QTY , Tanggal_Update='$tgl_update' WHERE ID_Gift='$ID_Hadiah' AND ID_Cabang_Bank='$ID_Cabangbank'");
			}	
			//skrip Total Poin

				//skrip update stok
			
			//mengosongkan keranjang_klaim belanja
			unset ($_SESSION ["keranjang_klaim"]);
				echo "<script>alert('Klaim Hadiah Sukses');</script>";
				echo "<script>location='nota_klaim.php?id=$id_notaklaim';</script>";		
		endif;
		}
		?>	
	</div>
</section>
</body>
</html>