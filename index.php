<?php
require 'function/function.php';
require 'function/login.php';

$toko=query("SELECT * FROM toko")[0];

$produkList=query("SELECT DISTINCT merk FROM produk ORDER BY merk");
if(isset($_SESSION["id_akun"])){
    $id_akun=$_SESSION["id_akun"];
    $akun=query("SELECT * FROM akun WHERE id_akun='$id_akun'")[0];    
}


$login=true;
if($login){
    $page=isset($_GET["page"])?$_GET["page"]:false;
}else{
    echo "halaman tidak tersedia";
}

if(isset($_POST["register"])){
    if(register($_POST)>0){
        echo "
            <script>
                document.location.href='index.php?page=kelolaUser';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambah');
                document.location.href='index.php?page=kelolaUser';
            </script>
        ";
    }
}

if(isset($_POST["edit_informasi"])){
    if(editAkun($_POST)>0){
        echo "
            <script>
                document.location.href='index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                document.location.href='index.php';
            </script>
        ";
    }
}

if(isset($_POST["edit_toko"])){
    if(editToko($_POST)>0){
        echo "
            <script>
                document.location.href='index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                //document.location.href='index.php';
            </script>
        ";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>F13nd</title>
</head>
<body >
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="img/<?= $toko["logo"]?>" alt="" class="" style="width: 40px;height: auto;z-index: 3;position: absolute;margin-top: -10px;"><span class="ml-5"><?= $toko["nama_toko"];?></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET["page"]=='dashboard'){echo 'active'; } ?>" href="index.php?page=dashboard"><i class="fas fa-bars"></i> Dashboard</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if($_GET["page"]=='produk'){echo 'active'; } ?>" href="?page=admin" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i class="fas fa-mobile-alt"></i> Produk
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=produk">Semua</a>
                        <?php ; 
                        foreach($produkList as $row):
                        ?>
                            <a class="dropdown-item" href="index.php?page=produk&merk=<?= $row["merk"];?>"><?= $row["merk"];?></a>
                        <?php endforeach; ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if($_GET["page"]=='profil'){echo 'active'; } ?>" href="index.php?page=profil"><i class="fas fa-id-card"></i> Profil</a>
                </li>
                
                <?php
                if(isset($_SESSION["login"])){
                    if($_SESSION["login"]=='user'){ ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET["page"]=='keranjang'){echo 'active'; } ?>" href="index.php?page=keranjang"><i class="fas fa-shopping-cart"></i> Keranjang <span class="badge badge-light"><?= $hasilTransaksi ?></span></a>
                    </li>
                <?php
                    }
                } ?>
                
                <?php 
                if(isset($_SESSION["login"])){
                    if($_SESSION["login"]=='admin'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if($_GET["page"]=='adminTransaksi'||$_GET["page"]=='kelolaProduk'||$_GET["page"]=='kelolaAdmin'){echo 'active'; } ?>" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-lock"></i> Admin <span class="badge badge-light"><?= $hasilTransaksiAdmin ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php if($_GET["page"]=='adminTransaksi'){echo 'active'; } ?>" href="index.php?page=adminTransaksi"><i class="fas fa-shopping-basket"></i> Transaksi <span class="badge badge-dark"><?= $hasilTransaksiAdmin ?></a>
                        <a class="dropdown-item <?php if($_GET["page"]=='kelolaProduk'){echo 'active'; } ?>" href="index.php?page=kelolaProduk"><i class="fas fa-mobile"></i> Kelola Produk</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#toko"><i class="fas fa-store"></i> Profil Toko</a>
                        <a class="dropdown-item <?php if($_GET["page"]=='kelolaAdmin'){echo 'active'; } ?>" href="index.php?page=kelolaAdmin"><i class="fas fa-users-cog"></i> Kelola Admin</a>                        
                    </div>
                </li>
                <?php }
                } ?>
            </ul>
            
            <?php if(!isset($_SESSION["login"])){ ?>
            <form class="form-inline my-2 my-lg-0">
                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#login">Login</button>
            </form>
            <?php }else{?>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#akun">Hi, <?= $akun["nama_akun"];?><img src="img/<?= $akun["gambar"];?>" class="img-fluid" alt="" style="width: 36px; height: auto;">
                </button>
            <?php } ?>
        </div>
    </nav>

    <!-- /Navbar -->
    <!-- konten -->
    <div class="content">
        <div class="container">
            <!-- dismiss -->
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php if(isset($akun["nama_akun"])){ ?>
                    <strong>Hai <?= $akun["nama_akun"]; ?>!</strong>
                <?php } ?>
                 Ingin tau bagaimana pembelian produk di <?= $toko["nama_toko"] ?> 
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#info">
                    Klik disini
                </button>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <?php
                $file="page/$page.php";
                if(file_exists("$file")){
                    include_once($file);
                }else{
                ?>
                    <?php include 'page/dashboard.php'; ?>
                <?php
                }
            ?>
                
        </div>
    </div>
    <!-- /konten -->
    

    <!--  modal  -->
    <?php require 'module/modals/modals.php'; ?>
    <!-- /modal -->

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>