<?php
$user_id = $_SESSION['user']['user_id'];
$query = "SELECT * FROM koleksi_pribadi WHERE user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

?>
<h1 class="mt-2">Koleksi Saya</h1>
<div class="row">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $buku_id = $data['buku_id'];
            $query_buku = "SELECT * FROM buku WHERE buku_id = '$buku_id'";
            $result_buku = mysqli_query($koneksi, $query_buku);
            // Periksa apakah query mendapatkan hasil yang valid
            if ($result_buku && mysqli_num_rows($result_buku) > 0) {
                $buku_data = mysqli_fetch_assoc($result_buku);
                $query_rating = "SELECT AVG(rating) AS average_rating FROM ulasan WHERE buku_id = '$buku_id'";
                $result_rating = mysqli_query($koneksi, $query_rating);
                $rating_data = mysqli_fetch_assoc($result_rating);
                $average_rating = $rating_data['average_rating'];
    ?>
            <div class="col-md-2 mb-4">
                <div class="card mt-3" style="width: 235px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 15px;">
                    <img src="./assets/upload/<?php echo $buku_data['cover_buku']; ?>" class="card-img-top" alt="Card image cap" style="width: 200px; height: 250px; border-radius: 10px;">
                        <h5 class="card-title" style="margin-top: 10px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $buku_data['judul']; ?></h5>
                        <p class="card-text">
                            Rating: <?php echo number_format($average_rating, 1); ?><br>
                        </p>
                        <a href="?page=detail&&id=<?php echo $data['buku_id']; ?>" class="btn btn-info">Detail</a>
                        <a href="?page=koleksi_hapus&&id=<?php echo $data['koleksi_id']; ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
    <?php
            }
        }
    } else {
        echo "<p>Tidak ada buku dalam koleksi Anda.</p>";
    }
    ?>
</div>
