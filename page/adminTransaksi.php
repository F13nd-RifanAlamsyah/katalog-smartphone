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
            <!-- tahap 4 konfirmasi barang sampai -->
            <div class="card ">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                            Pesanan Belum Dibayar <span class="badge badge-light"><?= $adminPending; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $f=1;
                                foreach($adminTransaksiPending as $row): ?>
                                    <tr>
                                        <th><?= $f; ?></th>
                                        <td><?= $row["nama_akun"]; ?></td>
                                        <td><?= $row["nama_produk"]; ?></td>
                                        <td><?= $row["harga"]; ?></td>
                                    </tr>
                                <?php 
                                $f++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                            Pesanan Sudah Dibayar <span class="badge badge-light"><?= $adminPendingConfirm; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Bukti Bayar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $f=1;
                                foreach($adminTransaksiPendingConfirm as $row): ?>
                                    <tr>
                                        <th><?= $f;?></th>
                                        <td><?= $row["nama_akun"]; ?></td>
                                        <td><?= $row["nama_produk"]; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#bukti_bayar<?= $f;?>">Lihat Bukti Bayar</button>
                                        </td>
                                        <td>
                                            <a href="index.php?page=adminTransaksi&id_transaksi_setujui=<?= $row["id_transaksi"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Setujui</a>
                                            <a href="index.php?page=adminTransaksi&id_transaksi_batal=<?= $row["id_transaksi"];?>" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Tolak</a>
                                        </td>
                                        
                                        <!-- modal bukti bayar -->
                                        <div class="modal fade" id="bukti_bayar<?= $f;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img class="card-img-top" src="img/<?=$row["bukti_bayar"];?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                <?php 
                                $f++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="card ">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-danger btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Pesanan Dibatalkan <span class="badge badge-light"><?= $adminTolak;  ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Alasan Pembatalan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $f=1;
                                foreach($adminTransaksiTolak as $row): ?>
                                    <tr>
                                        <th><?= $f; ?></th>
                                        <td><?= $row["nama_akun"]; ?></td>
                                        <td><?= $row["nama_produk"]; ?></td>
                                        <td><?= $row["alasan_tolak"]; ?></td>
                                    </tr>
                                <?php 
                                $f++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            Pesanan Dalam Pengiriman <span class="badge badge-light"><?= $adminKirim;  ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $f=1;
                                foreach($adminTransaksiKirim as $row): ?>
                                    <tr>
                                        <th><?= $f; ?></th>
                                        <td><?= $row["nama_akun"]; ?></td>
                                        <td><?= $row["nama_produk"]; ?></td>
                                        <td><?= $row["resi"]; ?></td>
                                    </tr>
                                <?php 
                                $f++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-warning btn-block" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                            Pesanan Sampai <span class="badge badge-light"><?= $adminSampai; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $f=1;
                                foreach($adminTransaksiSampai as $row): ?>
                                    <tr>
                                        <th><?= $f; ?></th>
                                        <td><?= $row["nama_akun"]; ?></td>
                                        <td><?= $row["nama_produk"]; ?></td>
                                        <td><?= $row["resi"]; ?></td>
                                    </tr>
                                <?php 
                                $f++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                            Transaksi Pesanan Selesai <span class="badge badge-light"><?= $adminSelesai; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $f=1;
                                foreach($adminTransaksiSelesai as $row): ?>
                                    <tr>
                                        <th><?= $f; ?></th>
                                        <td><?= $row["nama_akun"]; ?></td>
                                        <td><?= $row["nama_produk"]; ?></td>
                                    </tr>
                                <?php 
                                $f++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php 
    if(isset($_GET["id_transaksi_setujui"])) {
        $id_transaksi_setujui=$_GET["id_transaksi_setujui"];
        $transaksiSetujui=query("$transaksi && transaksi.status='pending' && transaksi.id_transaksi='$id_transaksi_setujui'")[0];
        ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Lengkapi Pembayaran</h6>
                </div>
                <div class="card-body"> 
                    <form action="" method="post" enctype="multipart/form-data">    
                        <input type="hidden" value="<?= $_GET["id_transaksi_setujui"];?>" name="id_transaksi">
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
                            <input type="text" class="form-control form-control-sm" id="resi" aria-describedby="notelp" placeholder="masukan resi pengiriman" name="resi">
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
        $transaksiBatal=query("$transaksi && transaksi.status='pending' && transaksi.id_transaksi='$id_transaksi_batal'")[0];
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
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan_tolak"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm" name="pending_to_tolak">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <?php    
    } ?>

</div>
