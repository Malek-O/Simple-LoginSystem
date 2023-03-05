<?php

function emptyInputSginIp($name, $email, $username, $pwd, $rpwd)
{
    $result = "";
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($rpwd)) {
        $result = true;
    } else {
        $result = false;

    }
    return $result;
}

function invalidUid($username)
{
    $result = "";
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $rpwd)
{
    $result = "";
    if ($pwd !== $rpwd) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($con, $username, $email)
{
    $result = "";

    $sql = "select * from users where user_uid = ? OR user_email = ?;";
    // create a prepared statment
    $stmt = mysqli_stmt_init($con);
    // prepare the prepared statment
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    } else {
        // Bind parameters to placeholder
        mysqli_stmt_bind_param($stmt, "ss", $username, $email); // if we have multiple ???? just add more ssss
        // Run paramenters inside the database
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($res)) {
            $result = $row;
            return $result;
        } else {
            $result = false;
            return $result;
        }
    }
    mysqli_stmt_close($stmt);
}

function createUser($con, $name, $email, $username, $pwd)
{

    $sql = "insert into users values(null,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    // hashing the password
    $hashedPWd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPWd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = "";
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;

    }
    return $result;
}

function loginUser($con, $username, $pwd)
{

    $uidExists = uidExists($con, $username, $username);

    if (!$uidExists) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    $pwsHashed = $uidExists['user_pwd'];
    $dehshing = password_verify($pwd, $pwsHashed);

    if (!$dehshing) {
        header("Location: ../login.php?error=wrongpass");
        exit();
    } else {
        session_start();
        $_SESSION["user_id"] = $uidExists['user_id'];
        $_SESSION["uid"] = $uidExists['user_uid'];
        header("Location: ../index.php");
        exit();
    }

}
