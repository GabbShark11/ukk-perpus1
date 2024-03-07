<style>
    a{
        text-decoration: none;
        color: black;
    }
    h5{
        font-size: 1rem;
    }
</style>
<h1 class="mt-2"><b>Daftar Buku</b></h1>
<div class="row mt-4">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM buku");
    while ($data = mysqli_fetch_array($query)) {
    ?>
    <div class="col-md-2">
        <div class="card mb-4" style="width: 235px; height: 400px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body" style="padding: 15px;">
            <a href="?page=detail&&id=<?php echo $data['buku_id']; ?>">

                <img class="card-img-top" src="./assets/upload/<?php echo $data['cover_buku']; ?>" alt="Card image cap" style="width: 200px; height: 250px; border-radius: 10px;">
                <h5 class="card-title mt-2 text-secondary" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $data['penulis']; ?></h5>
                <h4 class="card-title mt-2 fs-4 text-dark" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $data['judul']; ?></h4>
                <?php
                $buku_id = $data['buku_id'];
                $queryUlasan = mysqli_query($koneksi, "SELECT AVG(rating) AS average_rating FROM ulasan WHERE buku_id='$buku_id'");
                $rating_data = mysqli_fetch_assoc($queryUlasan);
                $average_rating = $rating_data['average_rating'];
                ?>
                <p class="mt-4 d-flex justify-content-end card-text text-secondary">Rating: <?php echo number_format($average_rating, 1); ?></p>
            </a>

            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
