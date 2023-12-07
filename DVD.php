<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyewaan DVD</title>
    <style>
        body {
            background-image: url('img/background5.jpg');
            background-size: cover;
        }
    </style>
</head>

<body class="light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Penyewaan DVD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Data Tabel
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="DVD.php">Tabel Barang</a></li>
                  <li><a class="dropdown-item" href="pegawai.php"> TabelPegawai</a></li>
                  <li><a class="dropdown-item" href="pelanggan.php">Tabel Pelanggan</a></li>
                  <li><a class="dropdown-item" href="transaksi.php"> Tabel Transaksi</a></li>
                  <li><a class="dropdown-item" href="dt_transaksi.php">Tabel Detail Transaksi</a></li>
                  <li><a class="dropdown-item" href="pengembalian.php"> Tabel Pengembalian</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="index.php" method="get">
            <button class="btn btn-danger" type="submit">Logout</button>
           </form>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


 <div class="container mt-3">
 <h3 style="color: white;"> Tabel Barang </h3>

    <!-- Form Tambah Barang -->
    <form action="" method="post">
    <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_barang</td>
                <td><input type="text" name="id_barang"></td>
            </tr>
            <tr>
                <td width="130">nama_barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td width="130">jumlah_stok</td>
                <td><input type="text" name="jumlah_stok"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses" class="btn btn-success"></td>
            </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    // Proses penambahan data barang
    if (isset($_POST['proses'])) {
        mysqli_query($koneksi, "INSERT INTO tb_barang SET
        id_barang = '$_POST[id_barang]',
        nama_barang = '$_POST[nama_barang]',
        jumlah_stok = '$_POST[jumlah_stok]'");
    
    }
    ?>

    <?php
    include "koneksi.php";

    // Proses penghapusan data barang
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_id'])) {
        $id_barang_hapus = $_POST['hapus_id'];

        $query_hapus = "DELETE FROM tb_barang WHERE id_barang = $id_barang_hapus";
        $hasil_hapus = mysqli_query($koneksi, $query_hapus);
    }
    ?>

    <?php
    include "koneksi.php";
    // Menampilkan data barang
    echo '<h3 style="color: white;">Data Barang</h3>';
    echo "<table class='table table-bordered' style='background-color: rgba(108, 117, 125, 0.5); color: white;'>
        <tr>
            <th>id_barang</th>
            <th>nama_barang</th>
            <th>jumlah_stok</th>
            <th>Aksi</th>
        </tr>";

    $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_barang");
    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr id='row_{$tampil['id_barang']}'>
            <td>{$tampil['id_barang']}</td>
            <td>{$tampil['nama_barang']}</td>
            <td>{$tampil['jumlah_stok']}</td>
            <td>
                <a href='DVD.php?edit={$tampil['id_barang']}' class='btn btn-primary'>Edit</a>
                <form method='post' action='' style='display:inline;'>
                    <input type='hidden' name='hapus_id' value='{$tampil['id_barang']}'>
                    <button type='submit' class='btn btn-danger'>Hapus</button>
                </form>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>

    <!-- Output pesan hasil penghapusan -->
    <div id="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_id'])) {
            // Output pesan hasil penghapusan
            echo "Data berhasil dihapus.";
        }
        ?>
    </div>
    <!-- Form Edit Barang -->
    <h3 style="color : white"> Form Edit Barang </h3>
    <form action="" method="post">
        <?php
        if (isset($_GET['edit'])) {
            $id_barang_edit = $_GET['edit'];
            $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = $id_barang_edit");
            $data_edit = mysqli_fetch_array($query_edit);
        ?>
                <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_barang</td>
                <td><input type="text" name="id_barang_edit" value="<?php echo $data_edit['id_barang']; ?>" readonly></td>
            </tr>
            <tr>
                <td width="130">nama_barang</td>
                <td><input type="text" name="nama_barang_edit" value="<?php echo $data_edit['nama_barang']; ?>"></td>
            </tr>
            <tr>
                <td width="130">jumlah_stok</td>
                <td><input type="text" name="jumlah_stok_edit" value="<?php echo $data_edit['jumlah_stok']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="proses_edit"></td>
            </tr>
        </table>
        <?php } ?>
    </form>

    <!-- Logika Edit Data -->
    <?php
    if (isset($_POST['proses_edit'])) {
        $id_barang_edit = $_POST['id_barang_edit'];
        $nama_barang_edit = $_POST['nama_barang_edit'];
        $jumlah_stok_edit = $_POST['jumlah_stok_edit'];

        // Lakukan validasi dan sanitasi input jika diperlukan

        $query_update = "UPDATE tb_barang SET
                        nama_barang = '$nama_barang_edit',
                        jumlah_stok = '$jumlah_stok_edit',
                        WHERE id_barang = $id_barang_edit";

        $hasil_update = mysqli_query($koneksi, $query_update);

        if ($hasil_update) {
            echo "Data berhasil diupdate.";
        } else {
            echo "Gagal mengupdate data: " . mysqli_error($koneksi);
        }
    }
    ?>
</div>

</body>

</html>