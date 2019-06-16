<?php 
require 'function/prosesTransaksi.php';
if(!$_SESSION['login']=='admin'||!$_SESSION['login']=='user'){
    header("Location: index.php");
    exit;
}
 
?>

<div class="card text-center mb-3">
    <div class="card-header">
        <h4>Transaksi</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="accordion" id="accordionExample">
            
        <?php 
            include_once 'module/transaksiAdmin/belumDibayar.php';
            include_once 'module/transaksiAdmin/sudahDibayar.php';
            include_once 'module/transaksiAdmin/transaksiBatal.php';
            include_once 'module/transaksiAdmin/dalamPengiriman.php';
            include_once 'module/transaksiAdmin/pesananSampai.php';
            include_once 'module/transaksiAdmin/pesananSelesai.php';

        ?>

        </div>
    </div>

    <?php 
    if(isset($_GET["id_transaksi_setujui"])) {
        $id_transaksi_setujui=$_GET["id_transaksi_setujui"];
        $transaksiSetujui=query("$transaksi && transaksi.id_transaksi='$id_transaksi_setujui'")[0];
        ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Lengkapi Pembayaran</h6>
                </div>
                <div class="card-body"> 
                    <form action="" method="post" enctype="multipart/form-data">    
                        <input type="hidden" value="<?= $_GET["id_transaksi_setujui"];?>" name="id_transaksi">
                        <input type="hidden" value="<?= $transaksiSetujui["stok"];?>" name="stok">
                        <input type="hidden" value="<?= $transaksiSetujui["id_produk"];?>" name="id_produk">
                        <img src="img/<?= $transaksiSetujui["gambar"]; ?>" alt="" class="card-img-top">
                        <p class="text-center"><?= $transaksiSetujui["nama_produk"]; ?></p>
                        <div class="form-group">
                            <label for="nama">Nama Pembeli</label>
                            <input type="text" class="form-control form-control-sm" id="nama" aria-describedby="notelp" placeholder="masukan nama pembeli" name="nama" value="<?= $transaksiSetujui["nama_akun"]; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" disabled><?= $transaksiSetujui["alamat"]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="resi">Resi Pengiriman</label>
                            <input type="text" class="form-control form-control-sm" id="resi" aria-describedby="notelp" placeholder="masukan resi pengiriman" name="resi" required autocomplete="off" autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" name="pending_to_kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <?php    
    } ?>

    <?php 
    if(isset($_GET["id_transaksi_batal"])) {
        $id_transaksi_batal=$_GET["id_transaksi_batal"];
        $transaksiBatal=query("$transaksi && transaksi.id_transaksi='$id_transaksi_batal'")[0];
        ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Pembatalan Pembayaran Transaksi</h6>
                </div>
                <div class="card-body"> 
                    <form action="" method="post" enctype="multipart/form-data">    
                        <input type="hidden" value="<?= $_GET["id_transaksi_batal"];?>" name="id_transaksi">
                        <input type="hidden" value="<?= $_SESSION["akun"];?>" name="role">
                        <img src="img/<?= $transaksiBatal["gambar"]; ?>" alt="" class="card-img-top">
                        <p class="text-center"><?= $transaksiBatal["nama_produk"]; ?></p>
                        <div class="form-group">
                            <label for="nama">Nama Pembeli</label>
                            <input type="text" class="form-control form-control-sm" id="nama" aria-describedby="notelp" placeholder="masukan nama pembeli" name="nama" value="<?= $transaksiBatal["nama_akun"]; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" disabled><?= $transaksiBatal["alamat"]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alasan_tolak">Alasan Pembatalan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan_tolak" autofocus></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm" name="pending_to_tolak">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <?php    
    } ?>

</div>
