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
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $f=1;
                    foreach($adminTransaksiTolak as $row): ?>
                        <tr>
                            <th><?= $f; ?></th>
                            <td><?= $row["nama_akun"]; ?></td>
                            <td><?= $row["nama_produk"]; ?></td>
                            <td><?= $row["alasan_tolak"]; ?></td>
                        </tr>
                    <?php 
                    $f++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>