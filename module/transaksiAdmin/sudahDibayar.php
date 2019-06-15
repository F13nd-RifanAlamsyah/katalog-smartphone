<div class="card ">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-money-bill-alt"></i> Pesanan Sudah Dibayar <span class="badge badge-light"><?= $adminPendingConfirm; ?></span>
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