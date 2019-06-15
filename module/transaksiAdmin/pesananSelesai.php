 <div class="card ">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-clipboard-list"></i> Transaksi Pesanan Selesai <span class="badge badge-light"><?= $adminSelesai; ?></span>
            </button>
        </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $f=1;
                    foreach($adminTransaksiSelesai as $row): ?>
                        <tr>
                            <th><?= $f; ?></th>
                            <td><?= $row["nama_akun"]; ?></td>
                            <td><?= $row["nama_produk"]; ?></td>
                        </tr>
                    <?php 
                    $f++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>