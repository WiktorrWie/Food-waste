<?php
require("database/database.php");
session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}

?>
<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>

<body>
<?php include('header.php'); ?> 
<h1 class="pageName"> My profile </h1>
<div class="borderBottom marginF"></div>
<div>
<?php
if("$_SESSION[profile_picture]" == NULL){
    echo "<img class='userImage' src='./icon/user.png'>";
}
else{
    echo "<img class='userImage' src='$_SESSION[profile_picture]'>";
}
?>
    <form name="pictureUpload" action="upload/addProfilePic.php" method ="POST" enctype="multipart/form-data">
         <label class="uploadLabel">Upload picture (Max 2MB)</label>
        <br>
        <input class="postInput fileUpload" required type="file" name="fileToUpload">
        <br>
        <input class="submitPost" type=submit value="Post">
    </form>



<!---
<form action="upload/addProfilePic.php" method="post" enctype="multipart/form-data">
<input class="postInput fileUpload" required type="file" name="pictureToUpload" id="upload" hidden>
<label for="upload">
<img class="changePhoto" for="upload" src="./icon/camera.png">
<input class="submitPost" type=submit value="Post">
</label>
</form>
-->
</div>
<div id="reviewScore"></div>

<?php
echo "<h1>$_SESSION[first_name]</h1>";

$reviewScore = "$_SESSION[review_score]";
if($reviewScore > 0 && $reviewScore < 1.5){
    echo "<div class='stars'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    </div>";
}
else if($reviewScore >= 1.5 && $reviewScore < 2.5){
    echo "<div class='stars'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    </div>";
}
else if($reviewScore >= 2.5 && $reviewScore < 3.5){
    echo "<div class='stars'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    </div>";
}
else if($reviewScore >= 3.5 && $reviewScore < 4.5){
    echo "<div class='stars'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star.png'>
    </div>";
}
else if($reviewScore >= 4.5){
    echo "<div class='stars'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    <img class='star' src='./icon/star-full.png'>
    </div>";
}
else{
    echo "<div class='stars'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    <img class='star' src='./icon/star.png'>
    </div>";
}
?>

<div class="borderBottom marginD"></div>
<h1>Meals saved from waste</h1>
<img class="plate" src="./icon/plate.png">


<?php
echo "<h1 class='soldCount'>$_SESSION[soldCount]</h1>"
?>
<div class="borderBottom marginE"></div>

<div class="listings">
        <div class="listingsHeader">
            <h4 class="profileListingsText">My listings</h4>
        </div>
<?php
// Displaying the user posts
// CLASS object with static list of all of its kind
class Posts {
    public static $postList = [];

    //Class constructor
    public function __construct() {
        self::$postList[]= $this;
    }

    //Print function for printing the information. 
    public function print() {
        echo "
        <div class='listing'>
            <img class='listingImage' src='$this->picture'>
            <div class='listingText'>
                <h1 class='title'>$this->title</h1>
                <p class='description'>";
                //predefined PHP function limits number of characters to 60
                echo substr($this->description, 0, 60);
                echo "...</p>
                <h2 class='nameDate'>$this->first_name - $this->date_added</h2>
            </div>
            <h2 class='city'>$this->city</h2>
        </div>";
    }
}
//SQL stuff
$sql = "SELECT first_name, title, description, date_added, picture, city FROM activeposts WHERE userid = $_SESSION[userid];";
$result = $mySQL->query($sql);


if (mysqli_num_rows($result) == 0) { 
   echo "<p> No active posts</p>";
} else {
    while($row = mysqli_fetch_object($result, "Posts"))
    {
        $row->print();
    }
}


?>
</div>



</body>