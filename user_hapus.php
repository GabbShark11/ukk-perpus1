<?php
$id = $_GET['id'];
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=0");
$query = mysqli_query($koneksi, "DELETE FROM user WHERE user_id=$id");
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=1");
?>
<script>
    alert('Hapus User Berhasil')
    location.href ="index.php?page=user";
</script>