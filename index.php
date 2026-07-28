<?php

session_start();

include "includes/header.php";

include "config.php";

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Prevent invalid page numbers
if ($page < 1) {
    $page = 1;
}

if ($page > 5) {
    $page = 5;
}

$url = "https://api.themoviedb.org/3/movie/popular?api_key=$apiKey&page=$page";

$response = file_get_contents($url);

$data = json_decode($response, true);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie App</title>
</head>
<body>

<h2 class="mb-4">Popular Movies</h2>

<div class="row">

    <?php

    $count = 0;

    foreach($data['results'] as $movie){

        if($count == 9)
            break;

        $count++;

    ?>

    <div class="col-md-4 mb-4">
        <div class="card shadow h-100">
            <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path'] ?>">

            <div class="card-body">

                <h5><?= htmlspecialchars($movie['title']) ?></h5>

                <p>Release Date

                <br>

                <?= htmlspecialchars($movie['release_date']) ?>

                </p>

                <form action="addFavourite.php" method="POST">

                    <input type="hidden" name="movie_id" value="<?= $movie['id']; ?>">

                    <input type="hidden" name="title" value="<?= htmlspecialchars($movie['title']); ?>">

                    <input type="hidden" name="poster_path" value="<?= $movie['poster_path']; ?>">

                    <input type="hidden" name="release_date" value="<?= $movie['release_date']; ?>">

                    <button type="submit" class="btn btn-danger w-100">
                        ❤️ Add to Favourites
                    </button>

                </form>

            </div>

        </div>

    </div>


    <?php
    }
    ?>

    <div class="d-flex justify-content-between mt-4">

        <?php if($page > 1){ ?>

            <a href="?page=<?= $page-1 ?>" class="btn btn-secondary">
                 ← Previous
            </a>

        <?php } else { ?>

        <button class="btn btn-secondary" disabled>
            ← Previous
        </button>

        <?php } 

        if($page < 5){ ?>

            <a href="?page=<?= $page+1 ?>" class="btn btn-primary">
                Next →
            </a>

        <?php } else { ?>

            <button class="btn btn-primary" disabled>
                Next →
            </button>

        <?php } ?>

    </div>

</div>
</body>
</html>

<?php
    include "includes/footer.php";
?>