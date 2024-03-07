<?php
include "koneksi.php";   
?>

<style>
        body{
            background-image: url('https://nibble-images.b-cdn.net/nibble/original_images/perpustakaan_di_jakarta_2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(3px);
        }

        .container{
            position: relative;
            top: 2.5pc;
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
    <title>Register</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card bg-light shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Daftar ke Your<span class="text-warning">Library.</span></h3></div>
                                <div class="card-body">
                                    <?php
                                    if(isset($_POST['Register'])){
                                        $nama_lengkap = $_POST['nama_lengkap'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $username = $_POST['username'];
                                        $password = md5($_POST['password']);
                                        
                                        // Set level pengguna berdasarkan alamat email
                                        $level = ($email == 'admin@gmail.com') ? 'admin' : 'peminjam';

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap,email,alamat,username,password, level) VALUES ('$nama_lengkap','$email','$alamat','$username','$password','$level')");

                                        if($insert){
                                            echo '<script>alert("Selamat, register berhasil! Silahkan Login."); location.href="login.php"</script>';
                                        }else{
                                            echo '<script>alert("Register gagal, silahkan ulangi kembali.")</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" required name="nama_lengkap" placeholder="Nama Lengkap" />
                                            <label for="inputEmail">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" required name="email" placeholder="Email" />
                                            <label for="inputEmail">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                        <textarea name="alamat" rows="5" placeholder="alamat" required class="form-control"></textarea>
                                            <label for="inputAlamat">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" type="text" required name="username" placeholder="Username" />
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" required name="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex flex-column gap-2 align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-warning w-50" type="submit" name="Register" value="Register">Register</button>
                                        </div>
                                        <p class="d-flex justify-content-center mt-4"> Sudah Punya Akun?<a class="text-warning" href="login.php">‎ Login</a> </p>
                                    </form>
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
