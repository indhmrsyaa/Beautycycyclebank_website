<div class="container-fluid px-4">
<i><b><h5> Berdasarkan : </h5></b></i>
                   <form method="post">
                <input type="radio" name="sampah"/> Hadiah
                <input type="radio" name="jenis_sampah"/> Cabang bank
                <button type="submit" class="btn btn-danger" name="tampil" value="lihat">Lihat
                <button type="submit" class="btn btn-success square-btn-adjust" class="fa fa-refresh" name="submit" value="Search">Refresh 
                </form>
      <?php
    if(isset($_POST["tampil"]))
    {
      if(isset($_POST["sampah"]))
      {
          echo "<script>location='index.php?halaman=laporantotalhadiah';</script>"; 
      }
      elseif(isset($_POST["jenis_sampah"]))
      {
          echo "<script>location='index.php?halaman=laporancabangbankberdasarkantotalhadiah';</script>"; 
      }

     }

    if(isset($_POST["submit"]))
    {
          echo "<script>location='index.php?halaman=laporanhadiahklaim';</script>"; 
    }
      ?>