<?php
session_start();
require 'function/function.php';
require 'function/login.php';
$produkList=query("SELECT DISTINCT merk FROM produk");
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
                //document.location.href='index.php';
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
    <title>Hello, world!</title>
</head>
<body >
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Agung Cellular</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="?page=admin" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produk
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=produk">All</a>
                        <?php ; 
                        foreach($produkList as $row):
                        ?>
                            <a class="dropdown-item" href="index.php?page=produk&merk=<?= $row["merk"];?>"><?= $row["merk"];?></a>
                        <?php endforeach; ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=keranjang">Keranjang <span class="badge badge-light">4</span></a>
                </li>
                
                <?php 
                if(isset($_SESSION["login"])){
                    if($_SESSION["login"]=='admin'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=kelolaProduk">Kelola Produk</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Profil Toko</a>
                        <a class="dropdown-item" href="index.php?page=kelolaAdmin">Kelola Admin</a>                        
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
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#akun">Hi, <?= $akun["nama_akun"];?> <img src="img/<?= $akun["gambar"];?>" class="img-fluid" alt="" style="width: 36px; height: auto;">
                </button>
            <?php } ?>
        </div>
    </nav>

    <!-- /Navbar -->
    <!-- konten -->
    <div class="content">
        <div class="container">
            
            <?php
                $file="page/$page.php";
                if(file_exists("$file")){
                    include_once($file);
                }else{
                    ?>
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <h3 class="text-center">Halaman Belum dibuat</h3>
                        </div>
                    </div>
                <?php
                }
            ?>
                
        </div>
    </div>
    <!-- /konten -->

    <!--  modal  -->
    <?php require 'page/modal.php'; ?>
    <!-- /modal -->

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script>
        $custom-file-text:(
          en: "Browse",
          es: "Elegir"
        );
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>