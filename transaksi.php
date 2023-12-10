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
                  <li><a class="dropdown-item" href="pengembalian.php"> TabelPengembalian</a></li>
                  
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
    <h3 style="color: white"> Tabel Transaksi</h3>

    <!-- Form Tambah Transaksi -->
    <form action="" method="post">
        <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_transaksi</td>
                <td><input type="text" name="id_transaksi"></td>
            </tr>
            <tr>
                <td width="130">id_pelanggan</td>
                <td><input type="text" name="id_pelanggan"></td>
            </tr>
            <tr>
                <td width="130">id_pegawai</td>
                <td><input type="text" name="id_pegawai"></td>
            </tr>
            <tr>
                <td width="130">tanggal_transaksi</td>
                <td><input type="date" name="tanggal_transaksi"></td>
            </tr>
            <tr>
                <td width="130">Deskripsi_transaksi</td>
                <td><input type="text" name="deskripsi_transaksi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses_transaksi" class="btn btn-success"></td>
            </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    // Proses penambahan data transaksi
    if (isset($_POST['proses_transaksi'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $id_pegawai = $_POST['id_pegawai'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $deskripsi_transaksi = $_POST['deskripsi_transaksi'];

        $query_insert_transaksi = "INSERT INTO tb_transaksi (id_transaksi, id_pelanggan, id_pegawai, tanggal_transaksi, deskripsi_transaksi)
                        VALUES ('$id_transaksi', '$id_pelanggan', '$id_pegawai', '$tanggal_transaksi', '$deskripsi_transaksi')";

        if (mysqli_query($koneksi, $query_insert_transaksi)) {
            echo "Data transaksi berhasil disimpan";
        } else {
            echo "Error: " . $query_insert_transaksi . "<br>" . mysqli_error($koneksi);
        }
    }
    ?>

    <!-- Menampilkan data transaksi -->
    <h3 style='color: white;'> Data Transaksi </h3>
    <table class='table table-bordered' style='background-color: rgba(108, 117, 125, 0.5); color: white;'>
        <tr>
            <th>id_transaksi</th>
            <th>id_pelanggan</th>
            <th>id_pegawai</th>
            <th>tanggal_transaksi</th>
            <th>deskripsi_transaksi</th>
            <th>action</th>
        </tr>

        <?php
        $ambildata_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
        $no = 1;
        while ($tampil_transaksi = mysqli_fetch_array($ambildata_transaksi)) {
            echo "
            <tr>
                <td>{$tampil_transaksi['id_transaksi']}</td>
                <td>{$tampil_transaksi['id_pelanggan']}</td>
                <td>{$tampil_transaksi['id_pegawai']}</td>
                <td>{$tampil_transaksi['tanggal_transaksi']}</td>
                <td>{$tampil_transaksi['deskripsi_transaksi']}</td>
                <td>
                    <a href='transaksi.php?edit_transaksi={$tampil_transaksi['id_transaksi']}' class='btn btn-primary'>Edit</a>
                    <form method='post' action='' style='display:inline;'>
                        <input type='hidden' name='hapus_transaksi_id' value='{$tampil_transaksi['id_transaksi']}'>
                        <button type='submit' class='btn btn-danger'>Hapus</button>
                    </form>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>

    <!---hapus--->
    <?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_transaksi_id'])) {
    $id_transaksi_hapus = $_POST['hapus_transaksi_id'];

    $query_hapus_transaksi = "DELETE FROM tb_transaksi WHERE id_transaksi = $id_transaksi_hapus";
    $hasil_hapus_transaksi = mysqli_query($koneksi, $query_hapus_transaksi);

    if ($hasil_hapus_transaksi) {
        echo "Data transaksi berhasil dihapus.";
    } else {
        echo "Gagal menghapus data transaksi: " . mysqli_error($koneksi);
    }
}
?>




    <!-- Form Edit Transaksi -->
    <h3 style="color: white;"> Form Edit Transaksi </h3>
    <form action="" method="post">
        <?php
        if (isset($_GET['edit_transaksi'])) {
            $id_transaksi_edit = $_GET['edit_transaksi'];
            $query_edit_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi = $id_transaksi_edit");
            $data_edit_transaksi = mysqli_fetch_array($query_edit_transaksi);
        ?>
        <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
            <tr>
                <td width="130">id_transaksi</td>
                <td><input type="text" name="id_transaksi_edit" value="<?php echo $data_edit_transaksi['id_transaksi']; ?>" readonly></td>
            </tr>
            <tr>
                <td width="130">id_pelanggan</td>
                <td><input type="text" name="id_pelanggan_edit" value="<?php echo $data_edit_transaksi['id_pelanggan']; ?>"></td>
            </tr>
            <tr>
                <td width="130">id_pegawai</td>
                <td><input type="text" name="id_pegawai_edit" value="<?php echo $data_edit_transaksi['id_pegawai']; ?>"></td>
            </tr>
            <tr>
                <td width="130">tanggal_transaksi</td>
                <td><input type="date" name="tanggal_transaksi_edit" value="<?php echo $data_edit_transaksi['tanggal_transaksi']; ?>"></td>
            </tr>
            <tr>
                <td width="130">deskripsi_transaksi</td>
                <td><input type="text" name="deskripsi_transaksi_edit" value="<?php echo $data_edit_transaksi['deskripsi_transaksi']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="proses_edit_transaksi" class="btn btn-success"></td>
            </tr>
        </table>
        <?php } ?>
    </form>

    <!-- Logika Edit Data Transaksi -->
    <?php
    if (isset($_POST['proses_edit_transaksi'])) {
        $id_transaksi_edit = $_POST['id_transaksi_edit'];
        $id_pelanggan_edit = $_POST['id_pelanggan_edit'];
        $id_pegawai_edit = $_POST['id_pegawai_edit'];
        $tanggal_transaksi_edit = $_POST['tanggal_transaksi_edit'];
        $deskripsi_transaksi_edit = $_POST['deskripsi_transaksi_edit'];

        // Lakukan validasi dan sanitasi input jika diperlukan

        $query_update_transaksi = "UPDATE tb_transaksi SET
                        id_pelanggan = '$id_pelanggan_edit',
                        id_pegawai = '$id_pegawai_edit',
                        tanggal_transaksi = '$tanggal_transaksi_edit',
                        deskripsi_transaksi = '$deskripsi_transaksi_edit'
                        WHERE id_transaksi = $id_transaksi_edit";

        $hasil_update_transaksi = mysqli_query($koneksi, $query_update_transaksi);

        if ($hasil_update_transaksi) {
            echo "Data transaksi berhasil diupdate.";
        } else {
            echo "Gagal mengupdate data transaksi: " . mysqli_error($koneksi);
        }
    }
    ?>
</div>

</body>
</html>
