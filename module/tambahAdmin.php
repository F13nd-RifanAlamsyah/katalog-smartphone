<?php 
if(isset($_POST["tambah_admin"])){
    if(tambahAdmin($_POST)>0){
        echo "
            <script>
                document.location.href='index.php?page=kelolaAdmin';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal');
                document.location.href='index.php?page=kelolaAdmin';
            </script>
        ";
    }
}
?>
<div class="col-md-4">
    <div class="card bg-dark text-white">
        <div class="card-header">
        <h5>Tambah Data Admin</h5>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="nama_admin">Nama Admin</label>
                        <input type="text" class="form-control form-control-sm" id="nama_admin" placeholder="Masukan nama admin" name="nama_akun">
                    </div>
                    <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" placeholder="Masukan email" name="email_akun">
                    </div>
                    <div class="form-group col-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" aria-describedby="passwordHelp" placeholder="masukan password" name="password">
                    </div>
                    <div class="form-group col-12">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control form-control-sm" id="password2" aria-describedby="password2Help" placeholder="konfirmasi password" name="password2">
                    </div>
                    <div class="form-group">    
                        <input type="file" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-sm" name="tambah_admin">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>