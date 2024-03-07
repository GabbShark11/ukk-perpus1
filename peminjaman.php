<?php
// require("koneksi.php");

$id = $_SESSION['user']['user_id'];
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status_peminjaman = 'dipinjam' AND user_id='$id'");
?>

<h1 class="mt-2">Daftar Buku yang Sedang Dipinjam</h1>
<div class="row">
    <?php
    while ($data = mysqli_fetch_array($query)) {
        if ($data['status_peminjaman'] == 'dipinjam') {
            $id_buku = $data['buku_id'];
            $query_buku = mysqli_query($koneksi, "SELECT judul, cover_buku FROM buku WHERE buku_id = '$id_buku'");
            $buku = mysqli_fetch_array($query_buku);
            
            // Ambil data ulasan dari database untuk menghitung rata-rata rating
            $queryUlasan = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE buku_id='$id_buku'");
            $totalRating = 0;
            $totalUlasan = mysqli_num_rows($queryUlasan);
            while ($row = mysqli_fetch_assoc($queryUlasan)) {
                $totalRating += $row['rating'];
            }
            // Hitung rata-rata rating
            $average_rating = $totalUlasan > 0 ? $totalRating / $totalUlasan : 0;
    ?>
            <div class="col-md-2 mb-4">
                <div class="card mb-4 mt-3" style="width: 235px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 15px;">
                        <img src="./assets/upload/<?php echo $buku['cover_buku']; ?>" class="card-img-top" alt="Card image cap" style="width: 200px; height: 250px; border-radius: 10px;">
                        <h5 class="card-title" style="margin-top: 10px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $buku['judul']; ?></h5>
                        <p class="card-text" style="color: #555;">
                            Rating: <?php echo number_format($average_rating, 1); ?><br>
                            Tanggal Pengembalian: <?php echo $data['tanggal_pengembalian']; ?>
                        </p>
                        <!-- Tambah tombol "Tambah Ulasan" di samping tombol "Kembalikan" -->
                        <a href="ulasan_tambah.php?id=<?php echo $id_buku; ?>" class="btn btn-primary mt-1" style="background-color: #3498db; border-color: #3498db;">Tambah Ulasan</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
