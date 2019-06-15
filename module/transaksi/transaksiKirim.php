<!-- tahap 3 pengiriman -->
<div class="card bg-dark text-white">
    <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-paper-plane"></i> Dalam Pengiriman <span class="badge badge-light"><?= $kirim; ?></span>
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
                                    <td>
                                        <a href="index.php?page=keranjang&id_transaksi_terima_barang=<?= $row["id_transaksi"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true" name="terimaBarang">Terima Barang</a>
                                    </td>
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