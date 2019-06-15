<div class="card ">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-money-check"></i> Pesanan Belum Dibayar <span class="badge badge-light"><?= $adminPending; ?></span>
            </button>
        </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $f=1;
                    foreach($adminTransaksiPending as $row): ?>
                        <tr>
                            <th><?= $f; ?></th>
                            <td><?= $row["nama_akun"]; ?></td>
                            <td><?= $row["nama_produk"]; ?></td>
                            <td><?= $row["harga"]; ?></td>
                        </tr>
                    <?php 
                    $f++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>