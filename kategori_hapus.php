<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id=$id");
?>
<script>
    alert('hapus data berhasil');
    location.href = "index.php?page=kategori";
</script>