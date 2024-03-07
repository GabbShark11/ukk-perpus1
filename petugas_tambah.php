<h1 class="mt-4">Tambah petugas</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form method="post">
          <?php
          if (isset($_POST['submit'])) {
            $nama_petugas = $_POST["nama_petugas"];
            $username_petugas = $_POST["username_petugas"];
            $email_petugas = $_POST["email_petugas"];
            $alamat_petugas = $_POST["alamat_petugas"];
            $password_petugas = md5($_POST["password_petugas"]);

            $query = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap, username, email, alamat, password, level) values('$nama_petugas','$username_petugas','$email_petugas', '$alamat_petugas','$password_petugas','petugas')");

            if ($query) {
              echo '<script>alert("Data Berhasil Ditambah."); </script>';
            } else {
              echo '<script>alert("Data Gagal Ditamabah."); </script>';
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Nama</div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="nama_petugas" placeholder="masukkan nama petugas">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Username</div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="username_petugas" placeholder="masukkan username petugas">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2" style="font: 1em sans-serif;">Email</div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="email_petugas" placeholder="masukkan email petugas">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2" style="font: 1em sans-serif;">Alamat</div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="alamat_petugas" placeholder="masukkan alamat petugas">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-2" style="font: 1em sans-serif;">Password</div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="password_petugas" placeholder="masukkan password petugas">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <button type="submit" class="btn btn-warning" name="submit" value="submit">Simpan</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
              <a href="?page=petugas" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>