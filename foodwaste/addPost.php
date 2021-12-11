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
    <h1 class="pageName"> Create listing </h1>
    <div class="borderBottom marginD fullWidth"></div>
    <form action="upload/createpost.php" method = "post" enctype="multipart/form-data">
        <input class="postInput" required type="text" name="title" placeholder="Title">
        <br>
        <textarea class="postInput" required rows="4" cols="50" name="description" placeholder="Description"></textarea>
        <br>
        <input class="postInput" required type="text" name="city" placeholder = "City">
        <br>
        <label class="uploadLabel">Upload picture (Max 2MB)</label>
        <br>
        <input class="postInput fileUpload" required type="file" name="fileToUpload">
        <br>
        <input class="submitPost" type=submit value="Post">
    </form>

    </section>  
</body>

