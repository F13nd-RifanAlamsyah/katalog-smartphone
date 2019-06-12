<?php 
if(!$_SESSION['login']=='admin'){
    header("Location: index.php");
    exit;
}
$admin=query("SELECT * FROM akun WHERE role='admin'");
?>
<div class="card bg-dark text-white text-center">
    <h4>Pengelolaan Admin</h4>
</div><br>
<div class="row">
    <div class="col-md-8">
        <div class="card bg-dark text-white">
            <div class="card-header">
                <h5>Semua Produk</h5>
                <span class="small">Menu ini digunakan untuk mengelola admin yang bertugas di toko</span>
                <a href="index.php?page=kelolaAdmin&tambah_admin=true" class="btn btn-success btn-sm btn-block" role="button" aria-pressed="true">Tambah Admin</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Admin</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach($admin as $row): ?>
                            <tr>
                                <th scope="row"><?= $i;?></th>
                                <td><?= $row["nama_akun"];?></td>
                                <td><?= $row["email_akun"];?></td>
                                <td>
                                    <a href="index.php?page=kelolaAdmin&id_admin=<?= $row["id_akun"];?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Edit</a>
                                    <a href="function/hapusAdmin.php?id_akun=<?= $row["id_akun"];?>" class="btn btn-danger btn-sm" role="button" aria-pressed="true" onclick="return confirm('yakin mau menghapus data?')">Hapus</a>
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
        if(isset($_GET["tambah_admin"])){ 
            require_once 'module/admin/tambahAdmin.php';
        }else if(isset($_GET["id_admin"])){
            $id_admin=$_GET["id_admin"];
            $adminEdit=query("SELECT * FROM akun WHERE id_akun='$id_admin'"); 
            require_once 'module/admin/editAdmin.php';  
        }
    ?>
    
</div>
