<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyewaan</title>
    <style>
        body {
            background-image: url('img/background5.jpg');
            background-size: cover;
        }
        .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1;
    }

    .edit-form {
      background: #fff;
      padding: 20px;
      max-width: 400px;
      margin: auto;
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
                  <li><a class="dropdown-item" href="pegawai.php"> Tabel Pegawai</a></li>
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
<h3 style="color: white;"> Tabel pegawai</h3>

    <!-- Form Tambah Pegawai -->
    <form action="" method="post">
    <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_pegawai</td>
                <td><input type="text" name="id_pegawai"></td>
            </tr>
            <tr>
                <td width="130">nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td width="130">alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td width="130">no telepon</td>
                <td><input type="text" name="no_telp"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses" class="btn btn-success"></td>
            </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    // Proses penambahan data pegawai
    if (isset($_POST['proses'])) {
        mysqli_query($koneksi,"INSERT INTO tb_pegawai SET
        id_pegawai = '$_POST[id_pegawai]',
        nama = '$_POST[nama]',
        alamat = '$_POST[alamat]',
        no_telp = '$_POST[no_telp]' ");
    }
    ?>



<?php
include "koneksi.php";
// Menampilkan data pegawai
echo '<h3 style="color: white;">Data Pegawai</h3>';
echo "<table class='table table-bordered' style='background-color: rgba(108, 117, 125, 0.5); color: white;'>
    <tr>
        <th>id_pegawai</th>
        <th>nama</th>
        <th>alamat</th>
        <th>no_telp</th>
        <th>Aksi</th>
    </tr>";

$ambildata = mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
while ($tampil = mysqli_fetch_array($ambildata)) {
    echo "
    <tr id='row_{$tampil['id_pegawai']}'>
        <td>{$tampil['id_pegawai']}</td>
        <td>{$tampil['nama']}</td>
        <td>{$tampil['alamat']}</td>
        <td>{$tampil['no_telp']}</td>
        <td>
            <a href='pegawai.php?edit={$tampil['id_pegawai']}' class='btn btn-primary'>Edit</a>
            <form method='post' action='' style='display:inline;'>
                <input type='hidden' name='hapus_id' value='{$tampil['id_pegawai']}'>
                <button type='submit' class='btn btn-danger'>Hapus</button>
            </form>
        </td>
    </tr>";
}
echo "</table>";
?>

<?php
include "koneksi.php";

// Proses penghapusan data pegawai
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_id'])) {
    $id_pegawai_hapus = $_POST['hapus_id'];

    $query_hapus = "DELETE FROM tb_pegawai WHERE id_pegawai = $id_pegawai_hapus";
    $hasil_hapus = mysqli_query($koneksi, $query_hapus);
}
?>



<!-- Output pesan hasil penghapusan -->
<div id="result">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_id'])) {
    }
    ?>
</div>


    <!-- Form Edit Pegawai -->
    <h3 style="color: white;"> Form Edit Pegawai</h3>

    <form action="" method="post">
        <?php
        if (isset($_GET['edit'])) {
            $id_pegawai_edit = $_GET['edit'];
            $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE id_pegawai = $id_pegawai_edit");
            $data_edit = mysqli_fetch_array($query_edit);
        ?>
        <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_pegawai</td>
                <td><input type="text" name="id_pegawai_edit" value="<?php echo $data_edit['id_pegawai']; ?>" readonly></td>
            </tr>
            <tr>
                <td width="130">nama</td>
                <td><input type="text" name="nama_edit" value="<?php echo $data_edit['nama']; ?>"></td>
            </tr>
            <tr>
                <td width="130">alamat</td>
                <td><input type="text" name="alamat_edit" value="<?php echo $data_edit['alamat']; ?>"></td>
            </tr>
            <tr>
                <td width="130">no telepon</td>
                <td><input type="text" name="no_telp_edit" value="<?php echo $data_edit['no_telp']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="proses_edit" class="btn btn-primary"></td>
            </tr>
        </table>
        <?php } ?>
    </form>



    <!-- Logika Edit Data -->
    <?php
    if (isset($_POST['proses_edit'])) {
        $id_pegawai_edit = $_POST['id_pegawai_edit'];
        $nama_edit = $_POST['nama_edit'];
        $alamat_edit = $_POST['alamat_edit'];
        $no_telp_edit = $_POST['no_telp_edit'];

        $query_update = "UPDATE tb_pegawai SET
                        nama = '$nama_edit',
                        alamat = '$alamat_edit',
                        no_telp = '$no_telp_edit'
                        WHERE id_pegawai = $id_pegawai_edit";

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
