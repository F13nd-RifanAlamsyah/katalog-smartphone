
<!-- modal login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    Login
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp" placeholder="masukan email" name="email_akun" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" placeholder="masukan" name="password" required>
                        </div>
                       
                        <button type="submit" class="btn btn-primary btn-sm" name="login">Login</button>
                    </form>
                    <small id="emailHelp" class="form-text text-muted">Jika belum punya akun, <a href="" data-toggle="modal" data-target="#register">register</a>.</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal login-->

<!-- modal akun -->
<div class="modal fade" id="akun" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card text-center">
                <div class="card-header">
                    <h5>
                        Informasi Akun
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $akun["nama_akun"]; ?></h5>
                    <img class="card-img-top" style="width: 300px; height: auto; " src="img/<?= $akun["gambar"];?>" alt="">
                    <p class="card-text text-muted"><?= $akun["role"]; ?></p>    
                </div>
                <div class="card-footer">
                    <a href="function/logout.php" class="btn btn-success float-left btn-sm" role="button" aria-pressed="true" data-toggle="modal" data-target="#informasi">Edit Informasi Akun</a>

                    <a href="function/logout.php" class="btn btn-danger float-right btn-sm" role="button" aria-pressed="true">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal akun -->

<!-- modal register -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    Register
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama" aria-describedby="namaHelp" placeholder="masukan nama" name="nama_akun">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp" placeholder="masukan email" name="email_akun">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" aria-describedby="passwordHelp" placeholder="masukan password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" class="form-control form-control-sm" id="password2" aria-describedby="password2Help" placeholder="konfirmasi password" name="password2">
                        </div>
                        <div class="form-group">
                            <input type="file" name="gambar">    
                        </div>
                        <button type="submit mt-3 d-block p-2" class="btn btn-primary btn-sm" name="register">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- /modal register-->

<!-- modal edit akun sendiri -->
<div class="modal fade" id="informasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Informasi Akun
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-row">
                            <input type="hidden" value="<?= $akun["id_akun"];?>" name="id_akun">
                            <input type="hidden" value="<?= $akun["gambar"];?>" name="gambarLama">
                            <input type="hidden" value="<?= $akun["password"];?>" name="passwordLama">
                            <div class="form-group col-12">
                                <label for="nama_admin">Nama Admin</label>
                                <input type="text" class="form-control form-control-sm" id="nama_admin" placeholder="Masukan nama admin" name="nama_akun" value="<?= $akun["nama_akun"];?>">
                            </div>
                            <div class="form-group col-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" placeholder="Masukan email" name="email_akun" value="<?= $akun["email_akun"];?>">
                            </div>
                            <div class="form-group col-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-sm" id="password" aria-describedby="passwordHelp" placeholder="masukan password" name="password">
                                <small id="emailHelp" class="form-text text-muted">Isi kolom password apabila ingin mengubah password. Kosongkan apabila tidak ingin mengubah password.</small>
                            </div>
                            <div class="form-group col-12">
                                <label for="password2">Konfirmasi Password</label>
                                <input type="password" class="form-control form-control-sm" id="password2" aria-describedby="password2Help" placeholder="konfirmasi password" name="password2">
                                <small id="emailHelp" class="form-text text-muted">konfirmasi kolom password apabila ingin mengubah password. Kosongkan apabila tidak ingin mengubah password.</small>
                            </div>
                            <div class="form-group">    
                                <input type="file" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-sm" name="edit_informasi">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal edit akun sendiri -->