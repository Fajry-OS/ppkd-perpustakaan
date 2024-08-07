<?php

session_start();
include 'config/koneksi.php';

//echo "<h1>Selamat Datang " . (isset($_SESSION['NAMA_LENGKAP']) ? $_SESSION['NAMA_LENGKAP'] : '') . "</h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang, </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        nav.menu {
            background-color: white;
            box-shadow: 0 0 3px black;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="menu navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?pg=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=peminjaman">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=level">Pengembalian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=kategori">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=buku">MasterBook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pg=anggota">Anggota</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Master Data
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Buku</a></li>
                                <li><a class="dropdown-item" href="#">Kategori</a></li>
                                <li><a class="dropdown-item" href="#">Anggota</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="?pg=level">Level</a></li>
                                <li><a class="dropdown-item" href="?pg=user">User</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true">Keluar</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Content Here -->
        <?php
        if (isset($_GET['pg'])) {
            if (file_exists('contents/' . $_GET['pg'] . '.php')) {
                include 'contents/' . $_GET['pg'] . '.php';
            } else {
                echo "not found";
            }
        } else {
            include 'contents/home.php';
        }
        ?>
        <!-- End Content -->
    </div>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        $('#id_kategori').change(function() {
            let id = $(this).val(),
                option = "";

            $.ajax({
                url: "ajax/get_buku.php?id_kategori=" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    option += "<option>Pilih Buku</option>"
                    $.each(data, function(key, value) {
                        option += "<option value=" + value.id + ">" + value.judul + "</option>"
                        // console.log("valuenya : ", value);
                    });
                    $('#id_buku').html(option);
                }
            })
        });
    </script>
</body>

</html>