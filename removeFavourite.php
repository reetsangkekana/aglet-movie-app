<?php

session_start();

include "db.php";

if(!isset($_SESSION['user_id']))
{
    header("Location:login.php");
    exit;
}

$id = $_POST['id'];

$user_id = $_SESSION['user_id'];

$sql = "DELETE
        FROM favourites
        WHERE id = ?
        AND user_id = ?";

$stmt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param(
    $stmt,
    "ii",
    $id,
    $user_id
);

mysqli_stmt_execute($stmt);

header("Location:favourites.php");

exit;