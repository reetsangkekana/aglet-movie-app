<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reetsang Aglet Movie App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">🎬 Reetsang Aglet Movie App</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex align-items-center gap-2">
                <a href="index.php" class="btn btn-outline-light"><i class="fas fa-film me-1"></i> Movies</a>

                <a href="favourites.php" class="btn btn-outline-light"><i class="fas fa-heart me-1"></i> Favourites</a>

                <a href="contact.php" class="btn btn-outline-light"><i class="fas fa-envelope me-1"></i> Contact</a>

                <?php if(isset($_SESSION['user_id'])) { ?>

                    <a href="logout.php" class="btn btn-danger"><i class="fas fa-right-from-bracket me-1"></i> Logout</a>

                <?php } else { ?>

                    <a href="login.php" class="btn btn-warning"><i class="fas fa-right-to-bracket me-1"></i> Login</a>

                <?php } ?>

            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">