<?php require 'function/prosesTransaksi.php'; ?>

<div class="card bg-dark text-white text-center mb-3">
    <h4>Keranjang Transaksi</h4>
</div>

<div class="accordion" id="accordionExample">
    
    <!-- tahap 1 pembayaran -->
    <div class="card bg-dark text-white">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-secondary btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Belum Dibayar <span class="badge badge-light">4</span>
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
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
                        <?php foreach ($transaksiPending as $row) {
                            ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?= $row["nama_produk"];?></td>
                                    <td><img src="img/<?= $row["gambar"];?>" alt="" style="width: 36px; height: auto;"></td>
                                    <td><?= $row["harga"];?></td>
                                    <td><button class="btn btn-primary btn-sm">Lengkapi Pembayaran</button></td>
                                </tr>
                            <?php
                        } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- tahap opsional apabila pembelian ditolak -->
    <div class="card bg-dark text-white">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-danger btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Pembelian Ditolak <span class="badge badge-light">4</span>
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
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
            </div>
        </div>
    </div>
    
    <!-- tahap 3 pengiriman -->
    <div class="card bg-dark text-white">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                    Dalam Pengiriman <span class="badge badge-light">4</span>
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
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
            </div>
        </div>
    </div>
    
    <!-- tahap 4 konfirmasi barang sampai -->
    <div class="card bg-dark text-white">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    Barang Sampai <span class="badge badge-light">4</span>
                </button>
            </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
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
            </div>
        </div>
    </div>
    
    <!-- tahap 5 transaksi selesai -->
    <div class="card bg-dark text-white">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                    Transaksi Selesai <span class="badge badge-light">4</span>
                </button>
            </h2>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
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
            </div>
        </div>
    </div>
</div>