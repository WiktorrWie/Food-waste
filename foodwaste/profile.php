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
<div class="profilePic">
<?php
if("$_SESSION[profile_picture]" == NULL){
    echo "<img class='userImage' src='./icon/user.png'>";
}
else{
    echo "<img class='userImage' src='$_SESSION[profile_picture]'>";
}
?>
    <form name="pictureUpload" id="profilePicForm" action="upload/addProfilePic.php" method ="POST" enctype="multipart/form-data">
        <br>
        <input class="postInput fileUpload" required type="file" name="fileToUpload" id="upload" hidden/>
        <br>
    <label class="labelCenter" for="upload">
    <img id="changePhoto" for="upload" src="./icon/camera.png" onclick="showSubmit()">
    <input class="submitPost" id="profilePicSubmit" type=submit value="Post">
    <label class="uploadLabel" id="profilePicLabel">Upload picture (Max 2MB)</label>
    </label>
    </form>

</div>
<div id="reviewScore"></div>

<?php
echo "<h1>$_SESSION[first_name] $_SESSION[last_name]</h1>";

echo "<h1>Feedback</h1>";

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
                <img id='deleteListing' src='./icon/close-black.png'>
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


    //Deleting posts//


    if(isset($_POST['delete'])){
        $id = $_POST['deletePost'];  
        $query = "UPDATE posts SET active=0 WHERE id=$id"; 
        $result = $mySQL->query($query);
     }
 
     $query = "SELECT * FROM posts WHERE userid=$_SESSION[userid] AND active=1;";
     $result = $mySQL->query($query); 
     while ($row = mysqli_fetch_array($result)) { 
             $id = $row['id'];
             $title = $row['title'];

         ?>

            <form id="delete" method="post" action="">
            <input type="hidden" name="deletePost" value="<?php print $id; ?>"/> 
            <input type="submit" name="delete" value="Delete!"/>    
 
            </form>
         <?php
    }   


?>
</div>



</body>