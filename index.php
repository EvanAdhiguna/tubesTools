<?php
include "koneksi.php";

$message = ""; 

if(isset($_POST['proseslog'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan pemeriksaan kredensial ke database
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah data yang cocok ditemukan
    if(mysqli_num_rows($result) > 0){
        header("Location: home.php");
        exit();
    } else {

        $message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      background-image: url('img/background5.jpg');
      background-size: cover;
      background-color: #f4f4f4;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      border: 2px solid #ccc;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      text-align: center;
      background-color: #fff;
    }

    .login-container h2 {
      color: #333;
    }

    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      box-sizing: border-box;
    }

    .login-container button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .login-container button:hover {
      background-color: #45a049;
    }

    .error-message {
      color: #ff0000;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <br>
      <input type="password" name="password" placeholder="Password" required>
      <br>
      <button type="submit" name="proseslog">Login</button>
    </form>
    <p class="error-message"><?php echo $message; ?></p>
  </div>
</body>
</html>
