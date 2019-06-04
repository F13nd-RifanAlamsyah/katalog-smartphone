<?php 
if(isset($_POST["login"])){
    $email_akun = $_POST["email_akun"];
    $password = $_POST["password"];

    $result=mysqli_query($conn, "SELECT * FROM akun WHERE email_akun='$email_akun'");
    $akun=query("SELECT * FROM akun WHERE email_akun='$email_akun'")[0];
    //cek username
    if(mysqli_num_rows($result)===1){
        //cek password
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"]) ){
            //set session
            $_SESSION["masuk"]=true;
            $_SESSION["id_akun"]=$akun["id_akun"];
            $_SESSION["akun"]=$akun["role"];
            // $_SESSION["akun"]=$akun["nama_akun"];
            if($akun["role"]=="admin"){
                $_SESSION["login"] ='admin';
            }else{
                $_SESSION["login"] ='user';
            }
            header("Location: index.php");
            exit;
        }
    }
    $error=true;
}