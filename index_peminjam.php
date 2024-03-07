<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    *{
     font-family: 'Poppins', sans-serif;
    }
     .navbar-nav .nav-link {
    color: #ffffff !important;
    }
     .navbar-nav .nav-link :hover {
    color: black !important;
    }
</style>

<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan Digital</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
        /* Tambahkan gaya CSS berikut untuk mengubah warna teks navbar menjadi putih */
        .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        </style>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="MS-4 navbar-nav">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-door-open"></i>
        </a>
    </div>
    <!-- Navbar Brand-->
    <a class="navbar-brand ms-4 disabled" href="#">Your<span class="text-warning">Library.</span></a>
    <!-- Tambahkan div untuk mengelompokkan elemen navbar -->
    <div class="d-flex justify-content-end me-5 collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <!-- Link-menu navbar -->
            <li class="nav-item">
                <a class="nav-link" href="?page=daftarbuku">
                    <i class="fas"></i> Daftar Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=peminjaman">
                    <i class="fas"></i> Peminjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=koleksi_saya">
                    <i class="fas"></i> Koleksi saya
                </a>
            </li>
        </ul>
    </div>
</nav>


        <!-- Isi halaman untuk peminjam -->
        <div class="container-fluid px-4 mt-5 pt-3">
            <?php
                $page = isset($_GET['page']) ? $_GET['page']: 'home';
                if (file_exists($page . '.php')){
                    include $page . '.php';
                }else {
                    include '404.php';
                }
            ?>
        </div>
        
        <!-- Footer seperti yang ada sebelumnya -->
    </body>
</html>
