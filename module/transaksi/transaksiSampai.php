<!-- tahap 4 konfirmasi barang sampai -->
<div class="card bg-dark text-white">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-truck-loading"></i> Barang Sampai <span class="badge badge-light"><?= $sampai; ?></span>
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
                                    <td>
                                        <a href="index.php?page=keranjang&id_transaksi_review=<?= $row["id_transaksi"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Review</a>
                                    </td>
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
                        <a href="index.php?page=produk" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Produk</a>
                    </p>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>
