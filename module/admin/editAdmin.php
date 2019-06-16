<?php 
if(isset($_POST["edit_admin"])){
    if(editAkun($_POST)>0){
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
            <h5>Edit Data Admin</h5>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-row">
                    <input type="hidden" value="<?= $row["id_akun"];?>" name="id_akun">
                    <input type="hidden" value="<?= $row["gambar"];?>" name="gambarLama">
                    <input type="hidden" value="<?= $row["password"];?>" name="passwordLama">
                    <div class="form-group col-12">
                        <label for="nama_admin">Nama Admin</label>
                        <input type="text" class="form-control form-control-sm" id="nama_admin" placeholder="Masukan nama admin" name="nama_akun" value="<?= $row["nama_akun"];?>" autofocus autocomplete="off">
                    </div>
                    <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" placeholder="Masukan email" name="email_akun" value="<?= $row["email_akun"];?>" autocomplete="off">
                    </div>
                    <div class="form-group col-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" aria-describedby="passwordHelp" placeholder="masukan password" name="password" autocomplete="off">
                        <small id="emailHelp" class="form-text text-muted">Isi kolom password apabila ingin mengubah password. Kosongkan apabila tidak ingin mengubah password.</small>
                    </div>
                    <div class="form-group col-12">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control form-control-sm" id="password2" aria-describedby="password2Help" placeholder="konfirmasi password" name="password2" autocomplete="off">
                        <small id="emailHelp" class="form-text text-muted">konfirmasi kolom password apabila ingin mengubah password. Kosongkan apabila tidak ingin mengubah password.</small>
                    </div>
                    <div class="form-group">    
                        <input type="file" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-sm" name="edit_admin">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>