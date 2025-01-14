<?php
if(isset($_POST['nama'])){
    $Nama       =$_POST['nama'];
    $Alamat     =$_POST['alamat'];
    $Tanggallahir    =$_POST['tanggallahir'];

    $data = "Nama: $Nama alamat: $Alamat Tanggallahir: $Tanggallahir\n";

    $file = "Kontak.txt";
    File_put_contents($file, $data, FILE_APPEND);

    echo "Data berhasil disimpan!";
}else
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From login</title>
</head>
<body>
<form action="" method="POST">
    <label>Nama</label> 
    <input type="text" name="nama" placeholder="Masukan nama" required>
    <br>
    <label>Alamat</label>
    <input type="text" name="alamat" placeholder="Masukan alamat" required>
    <br>
    <label>Tanggal lahir</label>
    <input type="date" name="tanggallahir" placeholder="Masukan tanggallahir" required>
    <br>
    <button type="submit">Masukan data</button>
</form>

</body>
</html>
