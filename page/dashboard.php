<?php 
$infoProduk=mysqli_query($conn,"SELECT * FROM produk");
$countInfoProduk=mysqli_num_rows($infoProduk);

$infoMerk=mysqli_query($conn,"SELECT DISTINCT merk FROM produk");
$countInfoMerk=mysqli_num_rows($infoMerk);

$infoTransaksi=mysqli_query($conn,"SELECT * FROM transaksi");
$countInfoTransaksi=mysqli_num_rows($infoTransaksi);

$infoPengguna=mysqli_query($conn,"SELECT * FROM akun WHERE role='user'");
$countInfoPengguna=mysqli_num_rows($infoPengguna);
?>

<div class="jumbotron">
    <div class="cover">
	    <h1 class="display-4">Selamat Datang!</h1>
		<p class="lead">Website ini diperuntukan untuk katalog smartphone dan juga transaksi penjualan online dari toko Agung Cellular.</p>
	</div>
	<hr class="my-4">
	<div class="row">
		<div class="col-md-3">
			<div class="card text-white bg-primary mb-3" >
				<div class="card-header">Produk</div>
				<div class="card-body">
				    <h1 class="card-title text-center"><?= $countInfoProduk;?></h1>
				    <p class="card-text text-center">Jumlah Produk</p>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-white bg-danger mb-3" >
				<div class="card-header">Merk</div>
				<div class="card-body">
				    <h1 class="card-title text-center"><?= $countInfoMerk;?></h1>
				    <p class="card-text text-center">Merk Smartphone</p>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-white bg-dark mb-3" >
				<div class="card-header">Transaksi</div>
				<div class="card-body">
				    <h1 class="card-title text-center"><?= $countInfoTransaksi;?></h1>
				    <p class="card-text text-center">Transaksi Online</p>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-white bg-success mb-3" >
				<div class="card-header">Pengguna</div>
				<div class="card-body">
				    <h1 class="card-title text-center"><?= $countInfoPengguna;?></h1>
				    <p class="card-text text-center">Pengguna Terdaftar</p>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<a href="index.php?page=produk" class="btn btn-block btn-outline-dark" role="button" aria-pressed="true">Produk</a>
		</div>
		
		<div class="col-md-12 mt-3">
			<p class="float-right">
				<a href="" class="btn btn-success btn-sm"><i class=""></i> <?= $toko["whatsapp"]; ?></a>
				<a href="<?= $toko["instagram_link"] ?>" class="btn btn-danger btn-sm"><i class=""></i> <?= $toko["instagram"]; ?></a>
				<a href="<?= $toko["facebook_link"] ?>" class="btn btn-primary btn-sm"><i class=""></i> <?= $toko["facebook"]; ?></a>
				<a href="#" class="btn btn-dark btn-sm"><i class=""></i> <?= $toko["no_telepon"]; ?></a>
			</p>
		</div>
	</div>
</div>