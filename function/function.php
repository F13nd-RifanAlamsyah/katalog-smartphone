<?php
//koneksi database
$conn=mysqli_connect("localhost","root","","ac");

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
    // $nama_akun=htmlspecialchars($data["nama_akun"]);
    // $email_akun=htmlspecialchars($data["email_akun"]);
    // $password=htmlspecialchars($data["password"]);
    // $password2=htmlspecialchars($data["password2"]);

    //query insert data
    $query="INSERT INTO transaksi
                VALUES
                ('','$id_akun','$id_produk','pending','','','','','','')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}