<?php 
if(isset($_POST["edit_produk"])){
    if(editProduk($_POST)>0){
        echo "
            <script>
                document.location.href='index.php?page=kelolaProduk';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                document.location.href='index.php?page=kelolaProduk';
            </script>
        ";
    }
}
?>
<div class="col-md-6">
    <div class="card bg-dark text-white">
        <div class="card-header">
        <h5>Edit data produk</h5>
        </div>
        <?php foreach ($produkEdit as $row): ?>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-row">
                    <input type="hidden" value="<?= $row["id_produk"];?>" name="id_produk">
                    <input type="hidden" value="<?= $row["gambar"];?>" name="gambarLama">
                    <div class="form-group col-7">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm" id="nama_produk" placeholder="Masukan nama produk" name="nama_produk" value="<?= $row["nama_produk"];?>" autocomplete="off">
                        <small id="nama_produk" class="form-text text-white">contoh : Xiaomi Redmi Note 4x</small>
                    </div>
                    <div class="form-group col-5">
                        <label for="merek">Merek</label>
                        <input type="text" class="form-control form-control-sm" id="merek" placeholder="Masukan merk" name="merk" value="<?= $row["merk"];?>" autocomplete="off">
                        <small id="nama_produk" class="form-text text-white">contoh : Xiaomi</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control form-control-sm" id="harga" placeholder="Masukan harga" name="harga" value="<?= $row["harga"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-6">
                        <label for="OS">OS(Operating Sistem)</label>
                        <input type="text" class="form-control form-control-sm" id="OS" placeholder="Masukan OS" name="os" value="<?= $row["os"];?>" autocomplete="off">
                        <small id="nama_produk" class="form-text text-white">contoh : Android 7.1 Nougat</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="layar">Ukuran Layar(inch)</label>
                        <input type="text" class="form-control form-control-sm" id="layar" placeholder="Masukan ukuran layar" name="layar" value="<?= $row["layar"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-6">
                        <label for="lebar">Resolusi layar(px)</label>
                        <input type="text" class="form-control form-control-sm" id="resolusi" placeholder="lebar layar" name="resolusi_layar" value="<?= $row["resolusi_layar"];?>" autocomplete="off">
                        <small id="resolusi" class="form-text text-white">contoh : 1080x1920</small>
                    </div>
                    <div class="form-group col-4">
                        <label for="chipset">Chipset</label>
                        <input type="text" class="form-control form-control-sm" id="OS" placeholder="Masukan Chipset" name="chipset" value="<?= $row["chipset"];?>" autocomplete="off">
                        <small id="nama_produk" class="form-text text-white">contoh : Snapdragon 625</small>
                    </div>
                    <div class="form-group col-4">
                        <label for="cpu">CPU</label>
                        <input type="text" class="form-control form-control-sm" id="cpu" placeholder="Masukan Cpu" name="cpu" value="<?= $row["cpu"];?>" autocomplete="off">
                        <small id="nama_produk" class="form-text text-white">contoh : oktacore 2ghz</small>
                    </div>
                    <div class="form-group col-4">
                        <label for="gpu">GPU</label>
                        <input type="text" class="form-control form-control-sm" id="gpu" placeholder="Masukan gpu" name="gpu" value="<?= $row["gpu"];?>" autocomplete="off">
                        <small id="nama_produk" class="form-text text-white">contoh : Adreno 560</small>
                    </div>
                    <div class="form-group col-4">
                        <label for="internal">Internal(Gb)</label>
                        <input type="number" class="form-control form-control-sm" id="internal" placeholder="Masukan internal" name="internal" value="<?= $row["internal"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-4">
                        <label for="ram">Ram(Gb)</label>
                        <input type="number" class="form-control form-control-sm" id="ram" placeholder="Masukan ram" name="ram" value="<?= $row["ram"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-4">
                        <label for="baterai">Stok</label>
                        <input type="number" class="form-control form-control-sm" id="stok" placeholder="masukan stok" name="stok" value="<?= $row["stok"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-4">
                        <label for="fcamera">Kamera Depan</label>
                        <input type="text" class="form-control form-control-sm" id="fcamera" placeholder="masukan kamera depan" name="fcamera" value="<?= $row["fcamera"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-4">
                        <label for="mcamera">Kamera Belakang</label>
                        <input type="text" class="form-control form-control-sm" id="mcamera" placeholder="masukan kamera belakang" name="mcamera" value="<?= $row["mcamera"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-4">
                        <label for="baterai">Baterai(Mah)</label>
                        <input type="number" class="form-control form-control-sm" id="baterai" placeholder="masukan baterai" name="baterai" value="<?= $row["baterai"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-12">
                        <label for="deskripsi">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" autocomplete="off"><?= $row["deskripsi"];?></textarea>
                    </div>
                    <div class="form-group">    
                        <input type="file" name="gambar" value="<?= $row["gambar"];?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-sm" name="edit_produk">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>