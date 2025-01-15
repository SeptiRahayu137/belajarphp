<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    // Include file koneksi, untuk koneksi ke database
    include "koneksi.php";

    // Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id
    if (isset($_GET['id'])) {
        $id = input($_GET["id"]);

        $sql = "SELECT * FROM datamahasiswa WHERE id=$id";
        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    // Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = htmlspecialchars($_POST["id"]);
        $nama = input($_POST["nama"]);
        $nim = input($_POST["nim"]);
        $alamat = input($_POST["alamat"]);
        $prodi = input($_POST["prodi"]);

        // Query update data pada tabel datamahasiswa
        $sql = "UPDATE datamahasiswa SET
                nama='$nama',
                nim='$nim',
                alamat='$alamat',
                prodi='$prodi'
                WHERE id=$id";

        // Mengeksekusi atau menjalankan query di atas
        $hasil = mysqli_query($kon, $sql);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($hasil) {
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan. Error: " . mysqli_error($kon) . "</div>";
        }
    }
    ?>

    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan Nim" value="<?php echo isset($data['nim']) ? $data['nim'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>" required />
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Prodi" value="<?php echo isset($data['prodi']) ? $data['prodi'] : ''; ?>" required />
        </div>
        
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
