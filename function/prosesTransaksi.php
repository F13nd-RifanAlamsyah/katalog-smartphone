<?php 
$id_akun=$_SESSION["id_akun"];

$transaksi="SELECT akun.id_akun,akun.nama_akun ,transaksi.id_transaksi,transaksi.status, transaksi.bukti_bayar,transaksi.no_telp,transaksi.alamat,transaksi.resi,transaksi.review,transaksi.alasan_tolak,produk.id_produk,produk.nama_produk, produk.harga,produk.gambar 
	FROM akun JOIN 
	transaksi ON akun.id_akun=transaksi.id_akun JOIN
	produk ON transaksi.id_produk=produk.id_produk
	WHERE transaksi.id_akun='$id_akun'";

$transaksiPending=query("$transaksi && transaksi.status='pending'");
$transaksiTolak=query("$transaksi && transaksi.status='tolak'");
$transaksiKirim=query("$transaksi && transaksi.status='kirim'");
$transaksiSampai=query("$transaksi && transaksi.status='sampai'");
$transaksiSelesai=query("$transaksi && transaksi.status='selesai'");

// penghitungan tiap tabel transaksi

$countPending=mysqli_query($conn,"$transaksi && transaksi.status='pending'");
$pending=mysqli_num_rows($countPending);

$countTolak=mysqli_query($conn,"$transaksi && transaksi.status='tolak'");
$tolak=mysqli_num_rows($countTolak);

$countKirim=mysqli_query($conn,"$transaksi && transaksi.status='kirim'");
$kirim=mysqli_num_rows($countKirim);

$countSampai=mysqli_query($conn,"$transaksi && transaksi.status='sampai'");
$sampai=mysqli_num_rows($countSampai);

$countSelesai=mysqli_query($conn,"$transaksi && transaksi.status='selesai'");
$selesai=mysqli_num_rows($countSelesai);

if(isset($_GET["id_produk"])){
	$id_produk=$_GET["id_produk"];
	$id_akun=$_SESSION["id_akun"];
    if(transaksi($id_produk,$id_akun)>0){
        echo "
            <script>
                document.location.href='index.php?page=keranjang';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                document.location.href='index.php?page=keranjang';
            </script>
        ";
    }
}

if(isset($_POST["pending_to_kirim"])){
    if(pendingToKirim($_POST)>0){
        echo "
            <script>
                //document.location.href='index.php?page=kelolaAdmin';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                //document.location.href='index.php?page=kelolaAdmin';
            </script>
        ";
    }
}