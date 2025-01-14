<?php
$host   = "localhost";
$use    = "root";
$pass   = "";
$db     = "septi_belajar";

$koneksi = new mysqli($host, $use, $pass, $db);

//cek koneksi ke DB 
if($koneksi->connect_error){
    die("Koneksi gagal: ".$koneksi->connect_error);
}