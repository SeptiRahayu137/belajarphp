<?php
$pass   = "bismillah";
$mail  = "rhysepti900@gmail.com";

if($_POST['email']!="" and $_POST['password']!=""){

    if($_POST['email']==$mail){
        if($_POST['password']==$pass){
            echo "Login berhasil";
        }else{
            echo "Password yang anda masukan salah!!";
        }
    }else{
        echo "Email yang anda masukan salah!!";
    }
}else{
    echo "Masukan email dan password!!";
}
