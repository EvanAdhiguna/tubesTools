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
    </style>
</head>
<body>
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
    <h3 style ="color: white;">Tabel Pelanggan</h3>

    <!-- Form Tambah Pelanggan -->
    <form action="" method="post">
    <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_pelanggan</td>
                <td><input type="text" name="id_pelanggan"></td>
            </tr>
            <tr>
                <td width="130">nama</td>
                <td><input type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td width="130">alamat</td>
                <td><input type="text" name="alamat_pelanggan"></td>
            </tr>
            <tr>
                <td width="130">email</td>
                <td><input type="text" name="email_pelanggan"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses_pelanggan"></td>
            </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    // Proses penambahan data pelanggan
    if (isset($_POST['proses_pelanggan'])) {
        mysqli_query($koneksi,"INSERT INTO tb_pelanggan SET
        id_pelanggan = '$_POST[id_pelanggan]',
        nama = '$_POST[nama_pelanggan]',
        alamat = '$_POST[alamat_pelanggan]',
        email = '$_POST[email_pelanggan]' ");
    }
    ?>


    <?php
    include "koneksi.php";
    // Menampilkan data pelanggan
    echo '<h3 style="color: white;">Data Pegawai</h3>';
    echo "<table class='table table-bordered' style='background-color: rgba(108, 117, 125, 0.5); color: white;'>
        <tr>
            <th>id_pelanggan</th>
            <th>nama</th>
            <th>alamat</th>
            <th>email</th>
            <th>Aksi</th>
        </tr>";

    $ambildata_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
    while ($tampil_pelanggan = mysqli_fetch_array($ambildata_pelanggan)) {
        echo "
        <tr id='row_pelanggan_{$tampil_pelanggan['id_pelanggan']}'>
            <td>{$tampil_pelanggan['id_pelanggan']}</td>
            <td>{$tampil_pelanggan['nama']}</td>
            <td>{$tampil_pelanggan['alamat']}</td>
            <td>{$tampil_pelanggan['email']}</td>
            <td>
                <a href='pelanggan.php?edit_pelanggan={$tampil_pelanggan['id_pelanggan']}' class='btn btn-primary'>Edit</a>
                <form method='post' action='' style='display:inline;'>
                    <input type='hidden' name='hapus_pelanggan_id' value='{$tampil_pelanggan['id_pelanggan']}'>
                    <button type='submit' class='btn btn-danger'>Hapus</button>
                </form>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>

<?php
    include "koneksi.php";

    // Proses penghapusan data pelanggan
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_pelanggan_id'])) {
        $id_pelanggan_hapus = $_POST['hapus_pelanggan_id'];

        $query_hapus_pelanggan = "DELETE FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan_hapus";
        $hasil_hapus_pelanggan = mysqli_query($koneksi, $query_hapus_pelanggan);
    }
    ?>

    <!-- Output pesan hasil penghapusan -->
    <div id="result_pelanggan">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_pelanggan_id'])) {
            // Output pesan hasil penghapusan
            echo "Data pelanggan berhasil dihapus.";
        }
        ?>
    </div>

    <!-- Form Edit Pelanggan -->
    <h3 style="color: white;"> Form Edit Pelanggan </h3>
    <form action="" method="post">
        <?php
        if (isset($_GET['edit_pelanggan'])) {
            $id_pelanggan_edit = $_GET['edit_pelanggan'];
            $query_edit_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan_edit");
            $data_edit_pelanggan = mysqli_fetch_array($query_edit_pelanggan);
        ?>
        <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_pelanggan</td>
                <td><input type="text" name="id_pelanggan_edit" value="<?php echo $data_edit_pelanggan['id_pelanggan']; ?>" readonly></td>
            </tr>
            <tr>
                <td width="130">nama</td>
                <td><input type="text" name="nama_pelanggan_edit" value="<?php echo $data_edit_pelanggan['nama']; ?>"></td>
            </tr>
            <tr>
                <td width="130">alamat</td>
                <td><input type="text" name="alamat_pelanggan_edit" value="<?php echo $data_edit_pelanggan['alamat']; ?>"></td>
            </tr>
            <tr>
                <td width="130">email</td>
                <td><input type="text" name="email_pelanggan_edit" value="<?php echo $data_edit_pelanggan['email']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="proses_edit_pelanggan"></td>
            </tr>
        </table>
        <?php } ?>
    </form>

    <!-- Logika Edit Data Pelanggan -->
    <?php
    if (isset($_POST['proses_edit_pelanggan'])) {
        $id_pelanggan_edit = $_POST['id_pelanggan_edit'];
        $nama_pelanggan_edit = $_POST['nama_pelanggan_edit'];
        $alamat_pelanggan_edit = $_POST['alamat_pelanggan_edit'];
        $email_pelanggan_edit = $_POST['email_pelanggan_edit'];

        // Lakukan validasi dan sanitasi input jika diperlukan

        $query_update_pelanggan = "UPDATE tb_pelanggan SET
                        nama = '$nama_pelanggan_edit',
                        alamat = '$alamat_pelanggan_edit',
                        email = '$email_pelanggan_edit'
                        WHERE id_pelanggan = $id_pelanggan_edit";

        $hasil_update_pelanggan = mysqli_query($koneksi, $query_update_pelanggan);

        if ($hasil_update_pelanggan) {
            echo "Data pelanggan berhasil diupdate.";
        } else {
          echo "Gagal mengupdate data pelanggan: " . mysqli_error($koneksi);
        }
    }
    ?>
</div>

</body>
</html>