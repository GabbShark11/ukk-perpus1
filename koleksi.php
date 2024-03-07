<?php
require("koneksi.php");
$user_id=$_SESSION['user']['user_id'];

if (isset($_GET['id'])) {
    $buku_id = $_GET['id'];

    $query_cek_koleksi = mysqli_query($koneksi, "SELECT * FROM koleksi_pribadi WHERE buku_id = '$buku_id' AND user_id = '$user_id'");
    $jumlah_koleksi = mysqli_num_rows($query_cek_koleksi);

    if ($jumlah_koleksi > 0) {
        echo "<script>alert('Buku Ini Sudah Di Simpan!');</script>";
        echo "<script>window.location.href='index_peminjam.php?page=daftarbuku';</script>";
    } else {
        $query = "INSERT INTO koleksi_pribadi (user_id, buku_id) VALUES ('$user_id', '$buku_id')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Buku berhasil di Simpan!');</script>";
            header('location:index_peminjam.php?page=daftarbuku');
        } else {
            echo "<script>alert('Gagal menyimpan buku!');</script>";
            echo "<script>window.location.href='';</script>";
        }
    }
    
}
?>
