<!DOCTYPE html>
<?php
require("./database/database.php");

session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}

?>

<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&display=swap" rel="stylesheet">
<html>
<body>
    <?php include('header.php'); ?>
    <section class="content">
    <h1 class="pageName"> Chat </h1>
    <div class="borderBottom marginD fullWidth"></div>
    </section>  
</body>