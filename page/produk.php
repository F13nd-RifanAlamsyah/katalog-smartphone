<?php 
if(!isset($_GET["merk"])){
    $produk=query("SELECT * FROM produk");
?>
    <div class="card bg-dark text-white text-center">
        <h4>Semua Produk</h4>
    </div>
<?php
}else{
    $merk=$_GET["merk"];
    $produk=query("SELECT * FROM produk WHERE merk='$merk'");
    $produkMerk=query("SELECT DISTINCT merk FROM produk WHERE merk='$merk'");
?>
    <div class="card bg-dark text-white text-center">
        <?php foreach ($produkMerk as $row) {
            ?>
                <h4>Semua Produk <?= $row["merk"];?></h4>
            <?php
        } ?>
        
    </div>
<?php
}

?>
<br>
<div class="card-columns">
    <?php foreach($produk as $row):?>
        <div class="card text-white bg-dark">
            <img src="img/<?= $row["gambar"];?>" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title"><?= $row["nama_produk"];?></h5>
                <p class="card-text">(<?= $row["ram"];?>/<?= $row["internal"];?>)</p>
                <p><strong>Harga Rp <?= $row["harga"];?> ,-</strong></p>
                <?php if($_SESSION["akun"]=='user'){ ?>
                    <a href="index.php?page=keranjang&id_produk=<?= $row["id_produk"];?>" class="btn btn-danger btn-sm btn-block" role="button" aria-pressed="true">Beli</a>
                <?php } ?>
                <a href="index.php?page=detailProduk&id_produk=<?= $row["id_produk"];?>" class="btn btn-primary btn-sm btn-block" role="button" aria-pressed="true">Detail</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>