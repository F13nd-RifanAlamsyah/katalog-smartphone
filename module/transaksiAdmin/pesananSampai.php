<div class="card ">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-warning btn-block" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-truck-loading"></i> Pesanan Sampai <span class="badge badge-light"><?= $adminSampai; ?></span>
            </button>
        </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Resi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $f=1;
                    foreach($adminTransaksiSampai as $row): ?>
                        <tr>
                            <th><?= $f; ?></th>
                            <td><?= $row["nama_akun"]; ?></td>
                            <td><?= $row["nama_produk"]; ?></td>
                            <td><?= $row["resi"]; ?></td>
                        </tr>
                    <?php 
                    $f++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>