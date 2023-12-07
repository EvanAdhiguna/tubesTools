<?php

$host="localhost";
$user="root";
$pass="";
$database="tugasbesar";

$koneksi=mysqli_connect($host, $user, $pass);
if($koneksi){
    $buka=mysqli_select_db($koneksi,$database);
}

?>