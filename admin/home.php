<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mt-2 bg-transparent">
            <li class="breadcrumb-item active">Laporan / </li>

<?php if(isset($_SESSION["admin"])):?>
            <?php if ($_SESSION['admin']['Level']=='Admin') { ?>
            <i class="text-success"> Admin </i>
            <?php } ?> 
            <?php if ($_SESSION['admin']['Level']=='Super_Admin') { ?>
            <i class="text-success"> Super Admin </i>
            <?php } ?> 
        </ol>

<?php else: ?>
            <i class="text-success"> Admin </i>

<?php endif?>
            <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Transaksi Setor</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporantransaksisetor">View Details</a>
                        <div class="small text-pink"><i class="fa fa-calendar fa-2x"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Transaksi Klaim</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporantransaksiklaim">View Details</a>
                        <div class="small text-pink"><i class="fa fa-calendar fa-2x"></i></div>
                    </div>
                </div>
            </div>  
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Stok Sampah </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporanstoksampah">View Details</a>
                        <div class="small text-pink"><i class="fa fa-inbox fa-2x"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Stok Hadiah</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporanstokhadiah">View Details</a>
                        <div class="small text-pink"><i class="fa fa-inbox fa-2x"></i></div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Total Hadiah Berhasil Klaim</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporancabangbankberdasarkantotalhadiah">View Details</a>
                        <div class="small text-pink"><i class="fa fa-inbox fa-2x"></i></div>
                    </div>
                </div>
            </div>      
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Member</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporanmember">View Details</a>
                        <div class="small text-pink"><i class="fa fa-star fa-2x"></i></div>
                    </div>
                </div>
            </div>  
 
                  
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Status Setor</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporanstatussetor">View Details</a>
                        <div class="small text-pink"><i class="fas fa-search fa-2x"></i></div>
                    </div>
                </div>
            </div>              
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">Laporan Status Klaim</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-blue stretched-link" href="index.php?halaman=laporanstatusklaim">View Details</a>
                        <div class="small text-pink"><i class="fa fa-search fa-2x"></i></div>
                    </div>
                </div>
            </div>

        </div>
  
