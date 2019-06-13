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
                                    <td><?= $row["review"];?></td>
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