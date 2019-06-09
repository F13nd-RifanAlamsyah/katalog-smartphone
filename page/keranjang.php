<?php 
require 'function/prosesTransaksi.php';
if(!$_SESSION['login']=='admin'||!$_SESSION['login']=='user'){
    header("Location: index.php");
    exit;
}
 
?>

<div class="card bg-dark text-white text-center mb-3">
    <h4>Keranjang Transaksi</h4>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="accordion" id="accordionExample">
            <!-- tahap 1 pembayaran -->
            <div class="card bg-dark text-white">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-secondary btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Belum Dibayar <span class="badge badge-light"><?= $pending;?></span>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php 
                        if($pending>0){ ?>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Gambar Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>       
                                    <?php 
                                    foreach ($transaksiPending as $row):
                                        ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?= $row["nama_produk"];?></td>
                                                <td><img src="img/<?= $row["gambar"];?>" alt="" style="width: 36px; height: auto;"></td>
                                                <td><?= $row["harga"];?></td>
                                                <td>
                                                    <a href="index.php?page=keranjang&id_transaksi=<?= $row["id_transaksi"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true" name="lengkapiPembayaran">Lengkapi Pembayaran</a>
                                                    <a href="index.php?page=keranjang&id_transaksi=<?= $row["id_transaksi"];?>" class="btn btn-danger btn-sm" role="button" aria-pressed="true" name="lengkapiPembayaran">Batalkan Tranksaksi</a>
                                                </td>
                                            </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        <?php 
                        }else{ ?>
                            <div class="text-center">
                                <h5>Tidak ada transaksi yang belum dibayar</h5>
                                <p>
                                    <a href="index.php?page=produk" class="btn btn-primary" role="button" aria-pressed="true">Produk</a>
                                </p>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            
            <!-- tahap opsional apabila pembelian ditolak -->
            <div class="card bg-dark text-white">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-danger btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Pembelian Ditolak <span class="badge badge-light"><?= $tolak; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php
                        if($tolak>0){?>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Alasan Ditolak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksiTolak as $row) {
                                        ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?= $row["nama_produk"];  ?></td>
                                                <td><?= $row["alasan_tolak"];  ?></td>
                                            </tr>
                                        <?php
                                    } ?>
                                    
                                </tbody>
                            </table>
                        <?php
                        }else{ ?>
                            <div class="text-center">
                                <h5>Tidak ada transaksi dilakukan</h5>
                                <p>
                                    <a href="index.php?page=produk" class="btn btn-primary" role="button" aria-pressed="true">Produk</a>
                                </p>
                            </div>
                        <?php
                        } ?>

                    </div>
                </div>
            </div>
            
            <!-- tahap 3 pengiriman -->
            <div class="card bg-dark text-white">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                            Dalam Pengiriman <span class="badge badge-light"><?= $kirim; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php 
                        if($kirim>0){ ?>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Resi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksiKirim as $row) {
                                        ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?= $row["nama_produk"];?></td>
                                                <td><?= $row["resi"];?></td>
                                                <td><button class="btn-primary btn-sm btn">Terima Barang</button></td>
                                            </tr>
                                        <?php
                                    } ?>
                                </tbody>
                            </table>
                        <?php 
                        }else{ ?>
                            <div class="text-center">
                                <h5>Tidak ada transaksi dalam pengiriman</h5>
                                <p>
                                    <a href="index.php?page=produk" class="btn btn-primary" role="button" aria-pressed="true">Produk</a>
                                </p>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            
            <!-- tahap 4 konfirmasi barang sampai -->
            <div class="card bg-dark text-white">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            Barang Sampai <span class="badge badge-light"><?php $sampai; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php 
                        if($sampai>0){ ?>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksiSampai as $row) {
                                        ?>
                                            <tr>
                                                <th></th>
                                                <td><?= $row["nama_produk"];?></td>
                                                <td><?= $row["harga"];?></td>
                                                <td><?= $row["alamat"];?></td>
                                                <td><button class="btn-primary btn-sm btn">Review</button></td>
                                            </tr>
                                        <?php
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        }else{ ?>
                            <div class="text-center">
                                <h5>Tidak ada transaksi</h5>
                                <p>
                                    <a href="index.php?page=produk" class="btn btn-primary" role="button" aria-pressed="true">Produk</a>
                                </p>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            
            <!-- tahap 5 transaksi selesai -->
            <div class="card bg-dark text-white">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                            Transaksi Selesai <span class="badge badge-light"><?= $selesai; ?></span>
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php
                        if($selesai>0){ ?>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksiSelesai as $row) {
                                        ?>
                                            <tr>
                                                <th>1</th>
                                                <td><?= $row["nama_produk"];?></td>
                                                <td><?= $row["harga"];?></td>
                                                <td><?= $row["status"];?></td>
                                            </tr>
                                        <?php
                                    } ?>

                                </tbody>
                            </table>
                        <?php
                        }else{ ?>
                            <div class="text-center">
                                <h5>Tidak ada transaksi selesai</h5>
                                <p>
                                    <a href="index.php?page=produk" class="btn btn-primary" role="button" aria-pressed="true">Produk</a>
                                </p>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>       
    </div>
    
    <?php if(isset($_GET["id_transaksi"])) {
    ?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Lengkapi Pembayaran</h5>
            </div>
            <div class="card-body">
                
                <form action="" method="post" enctype="multipart/form-data">    
                    <input type="hidden" value="<?= $_GET["id_transaksi"];?>" name="id_transaksi">
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
                    <button type="submit" class="btn btn-primary btn-sm" name="pending_to_kirim">Kirim</button>
                </form>

            </div>
        </div>
    </div>
    <?php    
    } ?>
    
</div>



