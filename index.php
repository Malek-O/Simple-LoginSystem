
<?php
include_once 'header.php';
?>

    <div class="container py-5 text-light">
        <?php
if (isset($_SESSION["user_id"])) {

    echo "<h1>Welcome " . $_SESSION['uid'] . " ! </h1>";
} else {
    echo '<h1>Welcome to the main page !</h1>';
}
?>
    </div>


<?php
include_once 'footer.php';
