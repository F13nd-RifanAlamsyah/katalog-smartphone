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
                        <?php 
                        $b=1;
                        foreach ($transaksiTolak as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $b; ?></th>
                                    <td><?= $row["nama_produk"];  ?></td>
                                    <td><?= $row["alasan_tolak"];  ?></td>
                                </tr>
                            <?php
                        $b++;
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