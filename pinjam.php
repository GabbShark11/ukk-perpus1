<?php
require("koneksi.php");
$id=$_SESSION['user']['user_id'];

if (isset($_GET['id'])) {
    $buku_id = $_GET['id'];

    // Periksa apakah buku sudah pernah dipinjam oleh pengguna yang sama pada saat yang sama
    $query_cek_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE buku_id = '$buku_id' AND user_id = '$id' AND status_peminjaman = 'Dipinjam'");
    $jumlah_peminjaman = mysqli_num_rows($query_cek_peminjaman);

    if ($jumlah_peminjaman > 0) {
        echo "<script>alert('Buku Ini Sudah Dipinjam!');</script>";
        echo "<script>window.location.href='index_peminjam.php?page=detail&&id= $buku_id';</script>";
    } else {
        // Hitung tanggal pengembalian 7 hari dari tanggal peminjaman
        $tanggal_peminjaman = date('Y-m-d');
        $tanggal_pengembalian = date('Y-m-d', strtotime($tanggal_peminjaman . ' + 7 days'));

        // Simpan data peminjaman ke tabel peminjaman bersamaan dengan tanggal pengembalian
        $query_simpan_peminjaman = mysqli_query($koneksi, "INSERT INTO peminjaman (user_id,buku_id, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES ('$id','$buku_id', '$tanggal_peminjaman', '$tanggal_pengembalian', 'Dipinjam')");

        if ($query_simpan_peminjaman) {
                echo "<script>alert('Buku berhasil dipinjam! Maksimal Tanggal Pengembalian: $tanggal_pengembalian');</script>";
                echo "<script>window.location.href='index_peminjam.php?page=detail&&id= $buku_id';</script>";
        } else {
            echo "<script>alert('Gagal meminjam buku!');</script>";
            echo "<script>window.location.href='';</script>";
        }
    }
}
?>
