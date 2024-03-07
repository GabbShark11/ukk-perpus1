<?php
$id = $_GET['id'];
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=0");
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE buku_id=$id");
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=1");
?>
<script>
    alert('hapus data berhasil');
    location.href = "index.php?page=buku";
</script>