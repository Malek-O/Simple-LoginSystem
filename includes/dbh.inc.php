<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "loginsystem";
$con = mysqli_connect($server, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
