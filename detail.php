<?php
// include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id='$id'");
$buku = mysqli_fetch_array($query);

// Ambil data ulasan dari database
$queryUlasan = mysqli_query($koneksi, "SELECT ulasan.*, user.username
FROM ulasan
JOIN user ON ulasan.user_id = user.user_id WHERE buku_id='$id'");
$ulasan = [];
while ($row = mysqli_fetch_assoc($queryUlasan)) {
    $ulasan[] = $row;
}
$totalRating = 0;
$totalUlasan = count($ulasan);
foreach ($ulasan as $row) {
    $totalRating += $row['rating'];
}

// Calculate average rating only if there are reviews available
if ($totalUlasan > 0) {
    $averageRating = $totalRating / $totalUlasan;
} else {
    $averageRating = 0; // Set average rating to 0 if there are no reviews
}
?>

<style>
    .bookmarkWrapper{
        color: whitesmoke;
    }
    .bookmarkWrapper .fa-bookmark :hover{
        color: whitesmoke;
    }
</style>

<h1 class="ms-2 mt-2 mb-4">Tentang Buku</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 mb-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">
                        <?= $buku['judul']; ?>
                    </h3>
                    <tr>
                        <td style="width: 200px; height: 150px;">
                            <img class="w-100" src="./assets/upload/<?= $buku['cover_buku']; ?>" alt="Cover Buku">
                        </td>
                    </tr>
                    <ul class="list-group list-group-unbordered mb-3 mt-2">
                        <li class="list-group-item">
                            <b>Rating</b>
                            <label style="color:black" class="badge badge-success float-right">
                                <?= number_format($averageRating, 2); ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Penulis</b>
                            <label style="color:black" class="badge badge-dark">
                                <?= $buku['penulis']; ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Penerbit</b>
                            <label style="color:black" class="badge badge-info float-right">
                                <?= $buku['penerbit']; ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Terbit</b>
                            <label style="color:black" class="badge badge-info float-right">
                                <?= $buku['tahun_terbit']; ?>
                            </label>
                        </li>
                        <li class="mt-2 d-flex justify-content-center">
                            <a href="pinjam.php?id=<?= $buku['buku_id']; ?>" class=" w-100 btn btn-warning btn-block mt-2">
                                <b>Pinjam</b>
                            </a>
                            <a href="koleksi.php?id=<?php echo $id;?>" class=""> 
                                <div class="text-dark ms-2 mt-2 fs-1 fas fa-solid fa-bookmark"></div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4>Deskripsi Buku</h4>
                </div>

                <div class="card-body">
                    <!-- Tambahkan deskripsi buku di sini -->
                    <p>
                        <?= $buku['deskripsi']; ?>
                    </p>
                </div>
            </div>
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h4>Ulasan</h4>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Pemberi Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ulasan as $row): ?>
                                <tr>
                                    <td>
                                        <?= $row['ulasan']; ?>
                                    </td>
                                    <td>
                                        <?= $row['rating']; ?>
                                    </td>
                                    <td>
                                        <?= $row['username']; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
