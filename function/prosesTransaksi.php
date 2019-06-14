<?php 
$id_akun=$_SESSION["id_akun"];

// query umum
$transaksi="SELECT akun.id_akun,akun.nama_akun ,transaksi.id_transaksi,transaksi.status, transaksi.bukti_bayar,transaksi.no_telp,transaksi.alamat,transaksi.resi,transaksi.review,transaksi.alasan_tolak,produk.id_produk,produk.stok,produk.nama_produk, produk.harga,produk.gambar 
	FROM akun JOIN 
	transaksi ON akun.id_akun=transaksi.id_akun JOIN
	produk ON transaksi.id_produk=produk.id_produk
	";

// query user
$transaksiPending=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='pending'");
$transaksiTolak=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='tolak'");
$transaksiKirim=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='kirim'");
$transaksiSampai=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='sampai'");
$transaksiSelesai=query("$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='selesai'");

// query admin
$adminTransaksiPending=query("$transaksi WHERE transaksi.status='pending' && transaksi.bukti_bayar=''");
$adminTransaksiPendingConfirm=query("$transaksi WHERE transaksi.status='pending'");
$adminTransaksiTolak=query("$transaksi WHERE transaksi.status='tolak'");
$adminTransaksiKirim=query("$transaksi WHERE transaksi.status='kirim'");
$adminTransaksiSampai=query("$transaksi WHERE transaksi.status='sampai'");
$adminTransaksiSelesai=query("$transaksi WHERE transaksi.status='selesai'");

// penghitungan tiap tabel transaksi user
$countPending=mysqli_query($conn,"$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='pending'");
$pending=mysqli_num_rows($countPending);

$countTolak=mysqli_query($conn,"$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='tolak'");
$tolak=mysqli_num_rows($countTolak);

$countKirim=mysqli_query($conn,"$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='kirim'");
$kirim=mysqli_num_rows($countKirim);

$countSampai=mysqli_query($conn,"$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='sampai'");
$sampai=mysqli_num_rows($countSampai);

$countSelesai=mysqli_query($conn,"$transaksi WHERE transaksi.id_akun='$id_akun' && transaksi.status='selesai'");
$selesai=mysqli_num_rows($countSelesai);

// perhitungan tiap tabel transaksi admin
$countAdminPending=mysqli_query($conn,"$transaksi WHERE transaksi.status='pending' && transaksi.bukti_bayar=''");
$adminPending=mysqli_num_rows($countAdminPending);

$countAdminPendingConfirm=mysqli_query($conn,"$transaksi WHERE transaksi.status='pending'");
$adminPendingConfirm=mysqli_num_rows($countAdminPendingConfirm);

$countAdminTolak=mysqli_query($conn,"$transaksi WHERE transaksi.status='tolak'");
$adminTolak=mysqli_num_rows($countAdminTolak);

$countAdminKirim=mysqli_query($conn,"$transaksi WHERE transaksi.status='kirim'");
$adminKirim=mysqli_num_rows($countAdminKirim);

$countAdminSampai=mysqli_query($conn,"$transaksi WHERE transaksi.status='sampai'");
$adminSampai=mysqli_num_rows($countAdminSampai);

$countAdminSelesai=mysqli_query($conn,"$transaksi WHERE transaksi.status='selesai'");
$adminSelesai=mysqli_num_rows($countAdminSelesai);





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

if(isset($_POST["pending_to_bayar"])){
    if(pendingToBayar($_POST)>0){
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

if(isset($_POST["pending_to_tolak"])){
    if(pendingToTolak($_POST)>0){
        if($_SESSION["akun"]=="admin"){
            echo "
                <script>
                    document.location.href='index.php?page=adminTransaksi';
                </script>
            ";
        }else{
            echo "
                <script>
                    document.location.href='index.php?page=keranjang';
                </script>
            ";
        }
    }else{
        echo "
            <script>
                alert('gagal');
                //document.location.href='index.php?page=keranjang';
            </script>
        ";
    }
}

if(isset($_POST["pending_to_kirim"])){
    if(pendingToKirim($_POST)>0){
        echo "
            <script>
                document.location.href='index.php?page=adminTransaksi';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                document.location.href='index.php?page=adminTransaksi';
            </script>
        ";
    }
}

if(isset($_GET["id_transaksi_terima_barang"])){
    $id_transaksi=$_GET["id_transaksi_terima_barang"];
    if(kirimToSampai($id_transaksi)>0){
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

if(isset($_POST["sampai_to_selesai"])){
    if(sampaiToSelesai($_POST)>0){
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