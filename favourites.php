<?php

session_start();

include "db.php";
include "includes/header.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM favourites
        WHERE user_id = ?
        ORDER BY created_at DESC";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

?>

<h2 class="mb-4">❤️ My Favourite Movies</h2>

<div class="row">

    <?php while($movie = mysqli_fetch_assoc($result)) { ?>

    <div class="col-md-4 mb-4">
        <div class="card shadow h-100">
            <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path']; ?>">

            <div class="card-body">

                <h5><?= htmlspecialchars($movie['title']); ?></h5>

                <p>Release Date: <?= htmlspecialchars($movie['release_date']); ?></p>

            </div>

        </div>
    </div>

    <form action="removeFavourite.php" method="POST">

        <input type="hidden" name="id" value="<?= $movie['id']; ?>">

        <button class="btn btn-outline-danger w-100"><i class="fa-solid fa-trash"></i>Remove Favourite</button>

    </form>

    <?php } ?>

</div>

<?php include "includes/footer.php"; ?>