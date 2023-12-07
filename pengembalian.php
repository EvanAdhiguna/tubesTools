<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyewaan</title>
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
</body>
</html>


<h3> Tabel pengembalian</h3>

<form action="" method="post">
    <table>
        <tr>
            <td width="130">id_pengembalian</td>
            <td><input type="text" name="id_transaksi"></td>
        </tr>
        <tr>
        <td width="130">id_dt_transaksi</td>
            <td><input type="text" name="id_dt_transaksi"></td>
        </tr>
        <tr>
        <td width="130">tanggal_pengembalian</td>
            <td><input type="date" name="tanggal_pengembalian"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="simpan" name="proses"></td>
        </tr>


</table>
</form>


<?php
    include "koneksi.php";

    if (isset($_POST['proses'])) {
        $id_pengembalian = $_POST['id_pengembalian'];
        $id_dt_transaksi = $_POST['id_dt_transaksi'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];


        $query_insert = "INSERT INTO id_pengembalian( id_pengembalian, id_dt_transaksi, tanggal_pengembalian)
                        VALUES ('$id_pengembalian', '$id_dt_transaksi', '$tanggal_pengembalian',)";

        if (mysqli_query($koneksi, $query_insert)) {
            echo "Data pengembalian berhasil disimpan";
        } else {
            echo "Error: " . $query_insert . "<br>" . mysqli_error($koneksi);
        }
    }
    ?>

    <h3> Data pengembalian </h3>

    <table border="1">
        <tr>
            <th>no</th>
            <th>id_pengembalian</th>
            <th>id_dt_transaksi</th>
            <th>tanggal_pengembalian</th>
        </tr>
        <?php
        include "koneksi.php";
        $no = 1;
        $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian");
        while ($tampil = mysqli_fetch_array($ambildata)) {
            echo "
            <tr>
                <td>$no</td>
                <td>$tampil[id_pengembalian]</td>
                <td>$tampil[id_dt_transaksi]</td>
                <td>$tampil[tanggal_pengembalian]</td>
            </tr>";
            $no++;
        }
        ?>
    </table>