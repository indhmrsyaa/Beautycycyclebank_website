<!DOCTYPE html>
<html>
<head>
 
    <link rel="stylesheet" href="css/style.css" />
 
</head>
 
<body>
    <nav>
    <ul>
			<li><a href="index.php">Menu Utama</a></li>
			<li><a href="setor_sampah.php">Setor Sampah</a></li>
			<li><a href="klaim_hadiah.php">Klaim Hadiah</a></li> 
      <li class="dropdown"><a href="#">Keranjang</a>
          <ul> 
                
                <li>  <a href="keranjang_setor.php"><div class="one-line">Keranjang setor</div></a></li>
					      <li>  <a href="keranjang_klaim.php"><div class="one-line">Keranjang klaim</div></a></li>
          </ul>
      </li>
      <li class="dropdown"><a href="#">Riwayat</a>
          <ul> 
              <li><a href="riwayat_setor.php"><div class="one-line">Riwayat Setor</div></a></li>
			        <li><a href="riwayat_klaim.php"><div class="one-line">Riwayat Klaim</div></a></li>
          </ul>
      </li>
      <li class="dropdown"><a href="#">Akun</a>
          <ul> 
               <?php if(isset($_SESSION["akun"])):?>
				              <li><a href="logout.php"><div class="one-line">Log Out</div></a></li>
                      <li><a href="profile.php"><div class="one-line">Profile</div></a></li>
			          <!-- selain itu -->
			         <?php else: ?>
				              <li><a href="login.php">Login</a></li>
                      <li><a href="registrasi.php">Registrasi</a></li>
			        <?php endif?>
          </ul>
      </li>


      <li>
            <form action="pencarian_index.php" method="get" class="navbar-form navbar-right" >
			           <input type="text" class="form-control" name="keyword">
			      <button class="btn btn-primary"> Cari </button>
            </li>
		</form>
        </ul>
        
        
    </nav>
 
</body>
 
</html>