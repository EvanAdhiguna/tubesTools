<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyewaan</title>
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
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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
      <img src="img/background2.jpg" alt="bagus" width="100%">

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>