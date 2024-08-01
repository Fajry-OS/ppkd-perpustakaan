<?php

$host_koneksi = "localhost";
$username_koneksi = "root";
$password_koneksi = "";
$database_koneksi = "db_perpustakaan";

$koneksi = mysqli_connect($host_koneksi, $username_koneksi, $password_koneksi, $database_koneksi);

// if (!$koneksi) {
//     die("Koneksi gagal: " . mysqli_error($koneksi));
// }
