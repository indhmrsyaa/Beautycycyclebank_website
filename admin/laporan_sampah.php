<div class="container-fluid px-4">
<i><b><h5> Berdasarkan : </h5></b></i>
                   <form method="post">
                <input type="radio" name="sampah"/> Cabang bank
                <input type="radio" name="jenis_sampah"/> Kota
                <input type="radio" name="jenis_sampah"/> Provinsi
                <button type="submit" class="btn btn-danger" name="tampil" value="lihat">Lihat
                <button type="submit" class="btn btn-success square-btn-adjust" class="fa fa-refresh" name="submit" value="Search">Refresh 
                </form>
      <?php
    if(isset($_POST["tampil"]))
    {
      if(isset($_POST["sampah"]))
      {
          echo "<script>location='index.php?halaman=laporanstoksampah';</script>"; 
      }
      elseif(isset($_POST["jenis_sampah"]))
      {
          echo "<script>location='index.php?halaman=laporancabangbankberdasarkantotalsampah';</script>"; 
      }

     }

    if(isset($_POST["submit"]))
    {
          echo "<script>location='index.php?halaman=laporansampahklaim';</script>"; 
    }
      ?>