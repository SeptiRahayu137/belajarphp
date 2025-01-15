<?php
session_start();
include "koneksi.php";

// Menampilkan notifikasi jika ada
if (isset($_SESSION['status'])) {
    echo "<div class='alert alert-" . $_SESSION['status_type'] . "'>" . $_SESSION['status'] . "</div>";
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
}

// Cek apakah ada kiriman form dari method get (delete)
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);
    $sql = "DELETE FROM datamahasiswa WHERE id='$id' ";
    $hasil = mysqli_query($kon, $sql);

    if ($hasil) {
        $_SESSION['status'] = 'Data berhasil dihapus.';
        $_SESSION['status_type'] = 'success';
    } else {
        $_SESSION['status'] = 'Data gagal dihapus.';
        $_SESSION['status_type'] = 'danger';
    }

    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Septi Rahayu</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">SEPTI RAHAYU</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DATA MAHASISWA</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from datamahasiswa where id='$id' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>ID</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Alamat</th>
            <th>Prodi</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from datamahasiswa order by id desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["nim"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["prodi"];   ?></td>
                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
