<!DOCTYPE html>
<html>
<head>
    <title>DATA MAHASISWA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada kiriman form dari method POST
    $status = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = input($_POST["nama"]);
        $nim = input($_POST["nim"]);
        $alamat = input($_POST["alamat"]);
        $prodi = input($_POST["prodi"]);

        //Query input menginput data ke tabel
        $sql = "INSERT INTO datamahasiswa (nama, nim, alamat, prodi) VALUES ('$nama', '$nim', '$alamat', '$prodi')";
        $hasil = mysqli_query($kon, $sql);

        // Simpan status untuk JavaScript
        if ($hasil) {
            $status = "success";
        } else {
            $status = "error";
        }
    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan Nim" required />
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required />
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Prodi" required />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Cek status dari PHP
    let status = "<?php echo $status; ?>";
    if (status === "success") {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data berhasil disimpan.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location = "index.php";
        });
    } else if (status === "error") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Data gagal disimpan.',
            confirmButtonText: 'Coba Lagi'
        });
    }
</script>
</body>
</html>
