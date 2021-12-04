<?php
include("./database/database.php");
session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}


$sessionUserName = "$_SESSION[first_name]";
$sqlTwo = "SELECT first_name, title, description, date_added, picture, city FROM activeposts WHERE first_name ='$sessionUserName'";
$user = $mySQL->query($sqlTwo)->fetch_object();
$nam = $_SESSION["first_name"] = $user->first_name;
$tit = $_SESSION["title"] = $user->title;
$des = $_SESSION["description"] = $user->description;
$dat = $_SESSION["date_added"] = $user->date_added;
$pic = $_SESSION["picture"] = $user->picture;
$cit = $_SESSION["city"] = $user->city;
?>
<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>

<body>
<h1> My profile <h1>
<div class="border-bottom"></div>
<div>
<?php
if("$_SESSION[profile_picture]" == NULL){
    echo "<img class='userImage' src='./icons/user.png'>";
}
else{
    echo "<img class='userImage' src='$_SESSION[profile_picture]'>";
}
?>

<img class="changePhoto" src="./icons/camera.png">
</div>
<div id="reviewScore"></div>
<?php
echo "<h1>$_SESSION[first_name]</h1>";

$reviewScore = "$_SESSION[review_score]";
if($reviewScore > 0 && $reviewScore < 1.5){
    echo "<div class='stars'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    </div>";
}
else if($reviewScore >= 1.5 && $reviewScore < 2.5){
    echo "<div class='stars'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    </div>";
}
else if($reviewScore >= 2.5 && $reviewScore < 3.5){
    echo "<div class='stars'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    </div>";
}
else if($reviewScore >= 3.5 && $reviewScore < 4.5){
    echo "<div class='stars'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star.png'>
    </div>";
}
else if($reviewScore >= 4.5){
    echo "<div class='stars'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    <img class='star' src='./icons/star-full.png'>
    </div>";
}
else{
    echo "<div class='stars'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    <img class='star' src='./icons/star.png'>
    </div>";
}
?>

<div class="borderBottom"></div>
<h1>Meals saved from waste</h1>
<img class="plate" src="./icons/plate.png">
<?php
echo "<h1 class='soldCount'>$_SESSION[soldCount]</h1>"
?>
<div class="borderBottom"></div>
<?php
// foreach loop
echo "<div class='listing'>
<img src='$pic'>
<h1>$tit</h1>
<h2>$des</h2>
<h2>$nam</h2>
<h2>$dat</h2>
<h2>$cit</h2>
</div>";

?>



</body>