<div class="card ">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-danger btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-skull"></i> Pesanan Dibatalkan <span class="badge badge-light"><?= $adminTolak;  ?></span>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $g=1;
                    foreach($adminTransaksiTolak as $row): ?>
                        <tr>
                            <th><?= $g; ?></th>
                            <td><?= $row["nama_akun"]; ?></td>
                            <td><?= $row["nama_produk"]; ?></td>
                            <td><?= $row["alasan_tolak"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#bukti_bayar_batal<?= $g;?>">Lihat Bukti Bayar</button>
                            </td>
                            <!-- modal bukti bayar -->
                            <div class="modal fade" id="bukti_bayar_batal<?= $g;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="card">
                                            <div class="card-body">
                                                <img class="card-img-top" src="img/<?=$row["bukti_bayar"];?>" alt="<?=$row["bukti_bayar"];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>

                    <?php 
                    $g++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>