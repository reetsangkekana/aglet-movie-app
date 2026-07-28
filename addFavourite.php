<?php

session_start();

include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$movie_id = $_POST['movie_id'];
$title = $_POST['title'];
$poster_path = $_POST['poster_path'];
$release_date = $_POST['release_date'];

// Check if movie is already a favourite
$sql = "SELECT id FROM favourites WHERE user_id = ? AND movie_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $user_id, $movie_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {

    $sql = "INSERT INTO favourites
            (user_id, movie_id, title, poster_path, release_date)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "iisss",
        $user_id,
        $movie_id,
        $title,
        $poster_path,
        $release_date
    );

    mysqli_stmt_execute($stmt);
}

header("Location: index.php");
exit;