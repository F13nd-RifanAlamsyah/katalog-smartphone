<?php
require 'function.php';

$id_akun=$_GET["id_akun"];
if(hapusAdmin($id_akun)>0){
    echo "
    <script>
        document.location.href='../index.php?page=kelolaAdmin';
    </script>
    ";
}
