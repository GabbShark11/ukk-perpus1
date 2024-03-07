<h1 class="mt-4">Buku</h1>
<div class="card bg-white">
    <div class="card-body">
    <div class="row">
<div class ="col_md_12">
  <form method="post" enctype="multipart/form-data">
          <?php
              if(isset($_POST['submit'])){
                $kategori_id = $_POST['kategori_id'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $fileBuku = $_FILES['coverBuku'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];

                $fileBuku = $_FILES['coverBuku'];
                $fileType = explode("image/", $fileBuku["type"]);
                $fileName = rand(100000, 999999) . '.' . end($fileType);
                move_uploaded_file($fileBuku['tmp_name'], './assets/upload/' . $fileName);

                $query = mysqli_query($koneksi, "INSERT  INTO buku(kategori_id,judul,penulis, cover_buku,penerbit,tahun_terbit,deskripsi)values ('$kategori_id','$judul','$penulis', '$fileName', '$penerbit','$tahun_terbit','$deskripsi')");

                if($query){
                  echo '<script>alert("Tambah Data Berhasil.");</script>';
                }else{
                  echo '<script>alert("Tambah Data Gagal.");</script>';
                }
              }
           ?>
    <div class="row mb-3">
        <div class="col-md-2">cover buku</div>
        <div class="col-md-8"><input type="file" class="form-control" name="coverBuku"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">Kategori</div>
        <div class="col-md-8">
            <select name="kategori_id" class="form-control">
                <?php
                    $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                    while ($kategori = mysqli_fetch_array($kat)) {
                        ?>
                        <option value="<?php echo $kategori['kategori_id']; ?>"><?php echo $kategori['kategori']; ?></option>;
                        <?php
                    }
                ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-2">Judul</div>
        <div class="col-md-8"><input type="text" class="form-control" name="judul"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">Penulis</div>
        <div class="col-md-8"><input type="text" class="form-control" name="penulis"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">Penerbit</div>
        <div class="col-md-8"><input type="text" class="form-control" name="penerbit"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">Tahun Terbit</div>
        <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">Deskripsi</div>
        <div class="col-md-8">
            <textarea name="deskripsi" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-8">
                 <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                 <button type="reset" class="btn btn-secondary">reset</button>
                 <a href="?page=buku" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </form> 
    </div>
</div>