<?php

if (isset($_POST['submit'])) {

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['pwdrepeat'];

    if (emptyInputSginIp($name, $email, $username, $pwd, $rpwd) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("Location: ../signup.php?error=invaliduid");
        exit();
    }
    if (pwdMatch($pwd, $rpwd) !== false) {
        header("Location: ../signup.php?error=pwdmismatch");
        exit();
    }
    if (uidExists($con, $username, $email) !== false) {
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($con, $name, $email, $username, $pwd);

} else {
    header("Location: ../signup.php");
    exit();
}
