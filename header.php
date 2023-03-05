<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #333;
    }
</style>
<body>

   <nav class="navbar navbar-expand-lg bg-light py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
             <?php

if (isset($_SESSION["user_id"])) {
    echo '  <li class="nav-item">
                <a type="button" href="profile.php" class="btn btn-secondary">Profile</a>
            </li>';
    echo '  <li class="nav-item">
                <a type="button" href="includes/logout.inc.php" class="btn btn-secondary">Logout</a>
            </li>';
} else {
    echo '  <li class="nav-item">
                <a type="button" href="signup.php" class="btn btn-secondary">Signup</a>
            </li>';
    echo '  <li class="nav-item">
              <a type="button" href="login.php" class="btn btn-success">Login</a>
            </li>';

}
?>

        </ul>
        </div>
    </div>
</nav>
