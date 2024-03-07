<?php
include "koneksi.php";
// session_start(); // Memulai sesi

if(isset($_POST['login'])){
    // Mendapatkan data dari form login
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    // Melakukan sanitasi input untuk mencegah SQL injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Mengeksekusi query untuk mencari pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah pengguna ditemukan
    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        // Menyimpan informasi pengguna ke dalam sesi
        $_SESSION['user'] = $user;

        // Menentukan pengalihan berdasarkan peran pengguna
        if($user['level'] == 'peminjam'){
            echo '<script>alert("Login Berhasil!!!"); location.href="index_peminjam.php?page=daftarbuku";</script>';
            exit();
        }else{
            header('location:index.php');
            exit();
        }
    }else{
        echo '<script>alert("Login gagal, silahkan ulangi kembali :(");</script>';
    }
}
?>
 <style>
    .backgroundWrapper{
            background-image: url('https://nibble-images.b-cdn.net/nibble/original_images/perpustakaan_di_jakarta_2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(3px);
        }

        .container{
            position: relative;
            top: 7.7pc;
        }

        .btnWrapper :hover{
            background-color: whitesmoke;
            border: none;
        }
        a{  
            text-decoration: none;
            color: black;
        }
        .fa-arrow-left{
            width: 30px;
            height: 30px;
        }
 </style>


<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="backgroundWrapper">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Your<span class="text-warning">Library.</span></h3></div>
                                    <div class="card-body">
                                    <form method="post">
                                            <div class="form-floating mt-3 mb-4">
                                                <input class="form-control py-3" id="inputUsername" type="text" name="username" placeholder="Enter username"/>
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-3" id="inputPassword" type="password" name="password" placeholder="Enter password"/>
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                            </div>
                                            <div class="btnWrapper d-flex align-items-center justify-content-center mt-5 mb-0">
                                                <button class="w-50 btn btn-warning" type="submit" name="login" value="login">Masuk</button>
                                            </div>
                                            <p class="d-flex justify-content-center mt-4"> Belum Punya Akun? <a class="text-warning" href="register.php">‎ Daftar</a> </p>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Your<span class="text-warning">Library.</span></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>