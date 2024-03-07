<?php
require_once "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM koleksi_pribadi WHERE koleksi_id = '$id'");
echo "<script>location.href = '?page=koleksi_saya'</script>";