<?php
session_start();

$pass = "punyasaya";
$email = "rhysepti900@gmail.com";

if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($_POST['email'] == $email) {
        if ($_POST['password'] == $pass) {
            $_SESSION['email'] = $email;
            header("Location: simpan.php");
            exit();
        } else {
            header("Location: login.php?status=gagal");
            exit();
        }
    } else {
        header("Location: login.php?status=gagal");
        exit();
    }
} else {
    header("Location: login.php?status=gagal");
    exit();
}
?>