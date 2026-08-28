<div class="container-fluid px-4">
<i><b><h5> Berdasarkan : </h5></b></i>
                   <form method="post">
                <input type="radio" name="cabang_bank"/> Cabang Bank
                <input type="radio" name="kota"/> Kota
                <input type="radio" name="provinsi"/> Provinsi
                <input type="radio" name="kosong"/> Stok Kosong 
                <button type="submit" class="btn btn-danger" name="tampil" value="lihat">Lihat
                <button type="submit" class="btn btn-success square-btn-adjust" class="fa fa-refresh" name="submit" value="Search">Refresh 
                </form>
      <?php
    if(isset($_POST["tampil"]))
    {
      if(isset($_POST["cabang_bank"]))
      {
          echo "<script>location='index.php?halaman=laporanstokhadiahberdasarkancabangbank';</script>"; 
      }
      elseif(isset($_POST["kota"]))
      {
          echo "<script>location='index.php?halaman=laporanstokhadiahberdasarkankota';</script>"; 
      }
      elseif(isset($_POST["provinsi"]))
      {
          echo "<script>location='index.php?halaman=laporanstokhadiahberdasarkanprovinsi';</script>"; 
      }
      elseif(isset($_POST["kosong"]))
      {
          echo "<script>location='index.php?halaman=laporanstokhadiahkosong';</script>"; 
      }
     }

    if(isset($_POST["submit"]))
    {
          echo "<script>location='index.php?halaman=laporanstokhadiah';</script>"; 
    }
      ?>
