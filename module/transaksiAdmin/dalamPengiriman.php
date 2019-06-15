<div class="card ">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-paper-plane"></i> Pesanan Dalam Pengiriman <span class="badge badge-light"><?= $adminKirim;  ?></span>
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
                        <th></th>
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
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#bukti_bayar_kirim<?= $f;?>">Lihat Bukti Bayar</button>
                            </td>
                            <!-- modal bukti bayar -->
                            <div class="modal fade" id="bukti_bayar_kirim<?= $f;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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