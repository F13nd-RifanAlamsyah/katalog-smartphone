<?php 
if(!$_SESSION['login']=='admin'){
    header("Location: index.php");
    exit;
}
$produk=query("SELECT * FROM produk");
?>
<div class="card bg-dark text-white text-center">
    <h4>Pengelolaan Produk</h4>
</div><br>
<div class="row">
    <div class="col-md-6">
        <div class="card bg-dark text-white">
            <div class="card-header">
                <h5>Semua Produk</h5>
                <span class="small">Menu ini digunakan untuk mengelola produk yang ditampilkan di toko</span>
                <a href="index.php?page=kelolaProduk&tambah_produk=true" class="btn btn-success btn-sm btn-block" role="button" aria-pressed="true">Tambah Produk</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Smartphone</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach($produk as $row): ?>
                            <tr>
                                <th scope="row"><?= $i;?></th>
                                <td><?= $row["nama_produk"];?></td>
                                <td>Rp <?= $row["harga"];?>,-</td>
                                <td>
                                    <a href="index.php?page=kelolaProduk&id_produk=<?= $row["id_produk"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Edit</a>
                                    <a href="function/hapusProduk.php?id_produk=<?= $row["id_produk"];?>" class="btn btn-danger btn-sm" role="button" aria-pressed="true" onclick="return confirm('yakin mau menghapus data?')">Hapus</a>
                                </td>
                            </tr>
                        <?php 
                        $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <?php 
        if(isset($_GET["tambah_produk"])){ 
            require_once 'module/produk/tambahProduk.php';
        }else if(isset($_GET["id_produk"])){
            $id_produk=$_GET["id_produk"];
            $produkEdit=query("SELECT * FROM produk WHERE id_produk=$id_produk"); 
            require_once 'module/produk/editProduk.php';  
        }
    ?>
    
</div>
