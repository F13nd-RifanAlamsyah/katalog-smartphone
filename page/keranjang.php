<?php 
require 'function/prosesTransaksi.php';
if(!$_SESSION['login']=='admin'||!$_SESSION['login']=='user'){
    header("Location: index.php");
    exit;
}
 
?>

<div class="card bg-dark text-white text-center mb-3">
    <div class="card-header">
        <h5>Keranjang Transaksi</h5>    
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="accordion" id="accordionExample">
            <?php 
                require 'module/transaksi/transaksiPending.php';
                require 'module/transaksi/transaksiTolak.php';
                require 'module/transaksi/transaksiKirim.php';
                require 'module/transaksi/transaksiSampai.php';
                require 'module/transaksi/transaksiSelesai.php';
             ?>
        </div>       
    </div>
    
    <!-- modal bayar -->
    <?php 
    if(isset($_GET["id_transaksi"])) {
        $id_transaksiGET=$_GET["id_transaksi"];
        $transaksiPendingGET=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='pending' && transaksi.id_transaksi='$id_transaksiGET'")[0];
        if($transaksiPendingGET['bukti_bayar']==''){
        ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-center">Lengkapi Pembayaran</h6>
                    </div>
                    <div class="card-body"> 
                        <form action="" method="post" enctype="multipart/form-data">    
                            <input type="hidden" value="<?= $_GET["id_transaksi"];?>" name="id_transaksi">
                            <img src="img/<?= $transaksiPendingGET["gambar"]; ?>" alt="" class="card-img-top">
                            <p class="text-center"><?= $transaksiPendingGET["nama_produk"]; ?></p>
                            <div class="form-group">
                                <label for="notelp">No Telp</label>
                                <input type="number" class="form-control form-control-sm" id="notelp" aria-describedby="notelp" placeholder="masukan nomor telp" name="no_telp">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat Lengkap</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Bukti Bayar</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="pending_to_bayar">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php    
        }else{
            ?> 
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-center">Bukti Pembayaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput11">No Telepon</label>
                            <input type="text" class="form-control" id="exampleFormControlInput11" value="<?=$transaksiPendingGET["no_telp"];?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea11">Alamat Pengiriman</label>
                            <textarea class="form-control" id="exampleFormControlTextarea11" rows="3" disabled><?=$transaksiPendingGET["alamat"];?></textarea>
                        </div>
                        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#bukti_bayar">Lihat Bukti Bayar</button>

                        <div class="modal fade" id="bukti_bayar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="card-img-top" src="img/<?=$transaksiPendingGET["bukti_bayar"];?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
    } ?>
    
    <!-- modal batal -->
    <?php 
    if(isset($_GET["id_transaksi_batal"])){
        $id_transaksi_batalGET=$_GET["id_transaksi_batal"];
        $transaksiPendingBatalGET=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='pending' && transaksi.id_transaksi='$id_transaksi_batalGET'")[0];
        if($transaksiPendingBatalGET['bukti_bayar']==''){
        ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-center">Alasan Penolakan</h6>
                    </div>
                    <div class="card-body"> 
                        <form action="" method="post" enctype="multipart/form-data">    
                            <input type="hidden" value="<?= $_GET["id_transaksi_batal"];?>" name="id_transaksi">
                            <img src="img/<?= $transaksiPendingBatalGET["gambar"]; ?>" alt="" class="card-img-top">
                            <p class="text-center"><?= $transaksiPendingBatalGET["nama_produk"]; ?></p>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alasan Penolakan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan_tolak"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm" name="pending_to_tolak">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php    
        }
    }
    ?>

    <!-- modal review -->
    <?php 
    if(isset($_GET["id_transaksi_review"])){
        $id_transaksi_review=$_GET["id_transaksi_review"];
        $transaksiSampaiGET=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='sampai' && transaksi.id_transaksi='$id_transaksi_review'")[0];
        ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Alasan Penolakan</h6>
                </div>
                <div class="card-body"> 
                    <form action="" method="post" enctype="multipart/form-data">    
                        <input type="hidden" value="<?= $_GET["id_transaksi_review"];?>" name="id_transaksi">
                        <img src="img/<?= $transaksiSampaiGET["gambar"]; ?>" alt="" class="card-img-top">
                        <p class="text-center"><?= $transaksiSampaiGET["nama_produk"]; ?></p>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Review</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm" name="sampai_to_selesai">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    <?php    
    }
    ?>
</div>