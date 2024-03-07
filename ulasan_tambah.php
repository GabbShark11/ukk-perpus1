<?php
include 'koneksi.php';

// Periksa apakah parameter 'id' ada dalam URL
if (!isset($_GET['id'])) {
    // Parameter 'id' tidak ada, beri tahu pengguna atau kembalikan ke halaman sebelumnya
    echo '<script>alert("Tidak ada buku yang dipilih!");</script>';
    header("Location: halaman_sebelumnya.php");
    exit();
}

$idbuku = $_GET['id'];

// Periksa apakah buku dengan ID yang diberikan ada
$query_check_book = "SELECT * FROM buku WHERE buku_id = '$idbuku'";
$result_check_book = mysqli_query($koneksi, $query_check_book);

if (!$result_check_book || mysqli_num_rows($result_check_book) == 0) {
    // Buku tidak ditemukan, beri tahu pengguna atau kembalikan ke halaman sebelumnya
    echo '<script>alert("Buku tidak ditemukan!");</script>';
    header("Location: halaman_sebelumnya.php");
    exit();
}

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    // Validasi form
    if (empty($ulasan) || empty($rating)) {
        echo '<script>alert("Semua kolom harus diisi!");</script>';
    } else {
        // Simpan ulasan ke database
        $user_id = $_SESSION['user']['user_id']; // Ambil user_id dari sesi
        $query = "INSERT INTO ulasan (buku_id, user_id, ulasan, rating) VALUES ('$idbuku', '$user_id', '$ulasan', '$rating')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Ulasan berhasil ditambahkan!");</script>';
            header("Location: index_peminjam.php?page=peminjaman");
            exit();
        } else {
            echo '<script>alert("Gagal menambahkan ulasan: ' . mysqli_error($koneksi) . '");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Ulasan Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Tambah Ulasan Buku</h1>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="ulasan">Ulasan</label>
                        <textarea class="form-control" name="ulasan" id="ulasan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <select class="form-control" name="rating" id="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="index_peminjam.php?page=detail&id=<?php echo $idbuku; ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
