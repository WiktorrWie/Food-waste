<!DOCTYPE html>
<?php
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


    <div class="mainButtons">
        <div class="mainGreen">
            <p class="subtitle">You have excess food?</p>
            <a href=addPost.php class="mainButton">Create post</a>
        </div>
            
        <div class="mainWhite">
            <p class="subtitle">You want to find free food?</p>
            <a href=map.php class="mainButton">Check map</a>
        </div>
    </div>

</body>
</html>
