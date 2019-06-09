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
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>       
                        <?php 
                        $a=1;
                        foreach ($transaksiPending as $row):
                            ?>
                                <tr>
                                    <th scope="row"><?= $a; ?></th>
                                    <td><?= $row["nama_produk"];?></td>
                                    <td><?= $row["harga"];?></td>
                                    <td>
                                        <?php 
                                        if($row["bukti_bayar"]==''){
                                        ?>
                                            <a href="index.php?page=keranjang&id_transaksi=<?= $row["id_transaksi"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true" name="lengkapiPembayaran">Lengkapi Pembayaran</a>
                                            <a href="index.php?page=keranjang&id_transaksi_batal=<?= $row["id_transaksi"];?>" class="btn btn-danger btn-sm" role="button" aria-pressed="true" name="lengkapiPembayaran">Batalkan Tranksaksi</a>
                                        <?php  
                                        }else{
                                            ?>
                                            <a href="index.php?page=keranjang&id_transaksi=<?= $row["id_transaksi"];?>" class="btn btn-warning btn-sm" role="button" aria-pressed="true" name="lengkapiPembayaran">Lihat Pembayaran</a>
                                            <?php
                                        }?>
                                    </td>
                                </tr>
                            <?php
                        $a++;
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