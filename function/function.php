<?php
session_start();
//koneksi database
$conn=mysqli_connect("localhost","root","","ac");

if(isset($_SESSION["id_akun"])){
    $id_akun=$_SESSION["id_akun"];
    $transaksi="SELECT akun.id_akun,akun.nama_akun ,transaksi.id_transaksi,transaksi.status, transaksi.bukti_bayar,transaksi.no_telp,transaksi.alamat,transaksi.resi,transaksi.review,transaksi.alasan_tolak,produk.id_produk,produk.nama_produk, produk.harga,produk.gambar 
    FROM akun JOIN 
    transaksi ON akun.id_akun=transaksi.id_akun JOIN
    produk ON transaksi.id_produk=produk.id_produk
    WHERE transaksi.id_akun='$id_akun'";
    $transaksiSelesai=mysqli_query($conn,"$transaksi && transaksi.status='selesai'");
    $transaksiTolak=mysqli_query($conn,"$transaksi && transaksi.status='tolak'");
    $countTransaksi=mysqli_query($conn,"$transaksi");
    $hasilTransaksi=mysqli_num_rows($countTransaksi)-mysqli_num_rows($transaksiSelesai)-mysqli_num_rows($transaksiTolak);
}

$transaksiAdmin="SELECT akun.id_akun,akun.nama_akun ,transaksi.id_transaksi,transaksi.status, transaksi.bukti_bayar,transaksi.no_telp,transaksi.alamat,transaksi.resi,transaksi.review,transaksi.alasan_tolak,produk.id_produk,produk.nama_produk, produk.harga,produk.gambar 
FROM akun JOIN 
transaksi ON akun.id_akun=transaksi.id_akun JOIN
produk ON transaksi.id_produk=produk.id_produk
";

$countTransaksiAdmin=mysqli_query($conn,"$transaksiAdmin WHERE transaksi.status='dibayar'");
$hasilTransaksiAdmin=mysqli_num_rows($countTransaksiAdmin);


//fungsi query
function query($query){
    global $conn;
    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result) ){
        $rows[]=$row;
    }
    return $rows;
}

function register($data){
    global $conn;
    $nama_akun=htmlspecialchars($data["nama_akun"]);
    $email_akun=htmlspecialchars($data["email_akun"]);
    $password=htmlspecialchars($data["password"]);
    $password2=htmlspecialchars($data["password2"]);
    
    //cek apakah username telah tersedia atau tidak
    $result=mysqli_query($conn, "SELECT email_akun FROM akun WHERE email_akun='$email_akun'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('email yang dipilih sudah terdaftar');
            </script>
        ";
        return false;
    }
    //cek konfirmasi password
    if($password!==$password2){
    echo "<script>
            alert('password tidak sesuai');
        </script>";
        return false;   
    }

    $gambar =upload();
    if(!$gambar){
        return false;
    }

    //enkripsi password 
    $password= password_hash($password,PASSWORD_DEFAULT);

    //query insert data
    $query="INSERT INTO akun
                VALUES
                ('','$nama_akun','$email_akun','$password','user','$gambar')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahAdmin($data){
    global $conn;
    $nama_akun=htmlspecialchars($data["nama_akun"]);
    $email_akun=htmlspecialchars($data["email_akun"]);
    $password=htmlspecialchars($data["password"]);
    $password2=htmlspecialchars($data["password2"]);
    
    //cek apakah username telah tersedia atau tidak
    $result=mysqli_query($conn, "SELECT email_akun FROM akun WHERE email_akun='$email_akun'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('email yang dipilih sudah terdaftar');
            </script>
        ";
        return false;
    }
    //cek konfirmasi password
    if($password!==$password2){
    echo "<script>
            alert('password tidak sesuai');
        </script>";
        return false;   
    }

    $gambar =upload();
    if(!$gambar){
        return false;
    }

    //enkripsi password 
    $password= password_hash($password,PASSWORD_DEFAULT);

    //query insert data
    $query="INSERT INTO akun
                VALUES
                ('','$nama_akun','$email_akun','$password','admin','$gambar')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahProduk($data){
    global $conn;
    $merk=htmlspecialchars($data["merk"]);
    $nama_produk=htmlspecialchars($data["nama_produk"]);
    $harga=htmlspecialchars($data["harga"]);
    $deskripsi=htmlspecialchars($data["deskripsi"]);
    $layar=htmlspecialchars($data["layar"]);
    $os=htmlspecialchars($data["os"]);
    $chipset=htmlspecialchars($data["chipset"]);
    $cpu=htmlspecialchars($data["cpu"]);
    $gpu=htmlspecialchars($data["gpu"]);
    $ram=htmlspecialchars($data["ram"]);
    $internal=htmlspecialchars($data["internal"]);
    $fcamera=htmlspecialchars($data["fcamera"]);
    $mcamera=htmlspecialchars($data["mcamera"]);
    $baterai=htmlspecialchars($data["baterai"]);
    $resolusi_layar=htmlspecialchars($data["resolusi_layar"]);
    $stok=htmlspecialchars($data["stok"]);

    $gambar =upload();
    if(!$gambar){
        return false;
    }


    $query="INSERT INTO produk
                VALUES
                ('','$merk','$nama_produk','$harga','$deskripsi','$layar','$resolusi_layar','$os','$chipset','$cpu','$gpu','$ram','$internal','$fcamera','$mcamera','$baterai','$gambar','stok')
                ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile =$_FILES['gambar']['name'];
    $ukuranFile=$_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName=$_FILES['gambar']['tmp_name'];

    if($error===4){
        echo "<script>
                alert('pilih gambar terlebih dahulu !!!');
            </script>";
        return false;
    }

    $extensiGambarValid=['jpg','jpeg','png','gif'];
    $extensiGambar=explode('.',$namaFile);
    $extensiGambar=strtolower(end($extensiGambar));
    
    if(!in_array($extensiGambar,$extensiGambarValid)){
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    if($ukuranFile > 10000000){
        echo "<script>
                alert('gambar yang anda masukan terlalu besar');
            </script>";
        return false;
    }

    $namaFileBaru = 'img_';
    $namaFileBaru .= uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;

    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    return $namaFileBaru;
}

function editProduk($data){
    global $conn;
    $id_produk=$data["id_produk"];
    $merk=htmlspecialchars($data["merk"]);
    $nama_produk=htmlspecialchars($data["nama_produk"]);
    $harga=htmlspecialchars($data["harga"]);
    $deskripsi=htmlspecialchars($data["deskripsi"]);
    $layar=htmlspecialchars($data["layar"]);
    $os=htmlspecialchars($data["os"]);
    $chipset=htmlspecialchars($data["chipset"]);
    $cpu=htmlspecialchars($data["cpu"]);
    $gpu=htmlspecialchars($data["gpu"]);
    $ram=htmlspecialchars($data["ram"]);
    $internal=htmlspecialchars($data["internal"]);
    $fcamera=htmlspecialchars($data["fcamera"]);
    $mcamera=htmlspecialchars($data["mcamera"]);
    $baterai=htmlspecialchars($data["baterai"]);
    $resolusi_layar=htmlspecialchars($data["resolusi_layar"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);
    $stok=htmlspecialchars($data["stok"]);

    if($_FILES['gambar']['error']===4){
        $gambar=$gambarLama;
    }else{
        $gambar=upload();
    }

    $query="UPDATE produk SET
                merk='$merk',
                nama_produk='$nama_produk',
                harga='$harga',
                deskripsi='$deskripsi',
                layar='$layar',
                os='$os',
                chipset='$chipset',
                cpu='$cpu',
                gpu='$gpu',
                ram='$ram',
                internal='$internal',
                fcamera='$fcamera',
                mcamera='$mcamera',
                baterai='$baterai',
                resolusi_layar='$resolusi_layar',
                gambar='$gambar',
                stok='$stok'
                
                WHERE id_produk=$id_produk
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editToko($data){
    global $conn;
    $id_toko=$data["id_toko"];
    $nama_toko=htmlspecialchars($data["nama_toko"]);
    $nomor_rekening=htmlspecialchars($data["nomor_rekening"]);
    $no_telepon=htmlspecialchars($data["no_telepon"]);
    $whatsapp=htmlspecialchars($data["whatsapp"]);
    $instagram=htmlspecialchars($data["instagram"]);
    $instagram_link=htmlspecialchars($data["instagram_link"]);
    $facebook=htmlspecialchars($data["facebook"]);
    $facebook_link=htmlspecialchars($data["facebook_link"]);

    if($_FILES['gambar']['error']===4){
        $gambar=$gambarLama;
    }else{
        $gambar=upload();
    }

    $query="UPDATE toko SET
                nama_toko='$nama_toko',
                nomor_rekening='$nomor_rekening',
                no_telepon='$no_telepon',
                whatsapp='$whatsapp',
                instagram='$instagram',
                instagram_link='$instagram_link',
                facebook='$facebook',
                facebook_link='$facebook_link',
                logo='$gambar'
                
                WHERE id_toko=$id_toko
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editAkun($data){
    global $conn;
    $id_akun=$data["id_akun"];
    $nama_akun=htmlspecialchars($data["nama_akun"]);
    $email_akun=htmlspecialchars($data["email_akun"]);
    $password=htmlspecialchars($data["password"]);
    $password2=htmlspecialchars($data["password2"]);
    $passwordLama=htmlspecialchars($data["passwordLama"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);

    if($_FILES['gambar']['error']===4){
        $gambar=$gambarLama;
    }else{
        $gambar=upload();
    }

    if($password==''&&$password2=''){
        $password=$passwordLama;
    }else if($password!==$password2){
        echo "<script>
            alert('password tidak sesuai');
        </script>";
        return false;   
    }else if($password==$password2){
        $password=password_hash($password,PASSWORD_DEFAULT);
    }

    $query="UPDATE akun SET
                nama_akun='$nama_akun',
                email_akun='$email_akun',
                password='$password',
                gambar='$gambar'
                
                WHERE id_akun=$id_akun
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id_produk){
    global $conn;
    mysqli_query($conn,"DELETE FROM produk WHERE id_produk=$id_produk");    
    return mysqli_affected_rows($conn);
}

function hapusAdmin($id_akun){
    global $conn;
    mysqli_query($conn,"DELETE FROM akun WHERE id_akun=$id_akun");    
    return mysqli_affected_rows($conn);
}

function transaksi($id_produk,$id_akun){
    global $conn;
    //query insert data
    $query="INSERT INTO transaksi
                VALUES
                ('','$id_akun','$id_produk','pending','','','','','','')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//proses transaksi
function pendingToBayar($data){
    global $conn;
    $id_transaksi=$data["id_transaksi"];
    $no_telp=htmlspecialchars($data["no_telp"]);
    $alamat=htmlspecialchars($data["alamat"]);

    $gambar =upload();
    if(!$gambar){
        return false;
    }

    $query="UPDATE transaksi SET
                no_telp='$no_telp',
                alamat='$alamat',
                bukti_bayar='$gambar',
                status='dibayar'
                
                WHERE id_transaksi=$id_transaksi
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function pendingToTolak($data){
    global $conn;
    $id_transaksi=$data["id_transaksi"];
    $alasan_tolak=htmlspecialchars($data["alasan_tolak"]);
    $role=htmlspecialchars($data["role"]);

    if($role=='admin'){
        $alasan_tolak="Admin : $alasan_tolak";
    }

    $query="UPDATE transaksi SET
                alasan_tolak='$alasan_tolak',
                status='tolak'
                
                WHERE id_transaksi=$id_transaksi
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function pendingToKirim($data){
    global $conn;
    $id_transaksi=$data["id_transaksi"];
    $id_produk=$data["id_produk"];
    $stok=$data["stok"]-1;
    $resi=htmlspecialchars($data["resi"]);

    $query="UPDATE transaksi, produk SET
                transaksi.resi='$resi',
                transaksi.status='kirim',
                produk.stok=$stok
                
                WHERE transaksi.id_transaksi=$id_transaksi AND produk.id_produk=$id_produk
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function kirimToSampai($id_transaksi){
    global $conn;

    $query="UPDATE transaksi SET
                status='sampai'
                
                WHERE id_transaksi=$id_transaksi
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function sampaiToSelesai($data){
    global $conn;
    $id_transaksi=$data["id_transaksi"];
    $review=htmlspecialchars($data["review"]);

    $query="UPDATE transaksi SET
                review='$review',
                status='selesai'
                
                WHERE id_transaksi=$id_transaksi
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}