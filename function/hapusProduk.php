<?php
require 'function.php';

$id_produk=$_GET["id_produk"];
if(hapus($id_produk)>0){
    echo "
    <script>
        document.location.href='../index.php?page=kelolaProduk';
    </script>
    ";
}
