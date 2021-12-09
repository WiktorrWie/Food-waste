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

if (!empty($_POST)){
$file = $_FILES["fileToUpload"];
$targetFolder = "../images/profile/";
$fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
$fileName = $_SESSION["first_name"].time().".".$fileType;
var_dump($file);

//file upload plus validation
if ($fileType == "png" || $fileType == "jpg" || $fileType == "jpeg") {
    if ($file["size"] < 2000000) {
    move_uploaded_file($file["tmp_name"], $targetFolder . $fileName);
        $picture = "images/profile/". $fileName;
        //saving post into database. 
        //CALL addPost (userid, "title", "description", "image", "city");
        $sql= "CALL addPost('$_SESSION[userid]', '$title', '$description', '$picture', '$city')";
        
        if($mySQL->query($sql) === true){
             header("location: ../index.php?post=succes");
            exit;
            }
        else {
             header("location: ../addPost.php?post=error");
            exit;
        }
    
    }
    else{ 
        echo "wrong file size";
    }
}
else{
    echo "wrong file type";
}
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
// displaying the user posts

//CLASS object with static list of all of its kind

class Posts {
    public static $postList = [];

    //Class constructor
    public function __construct() {
        self::$postList[]= $this;
    }

    //Print function for printing the information. 
    public function print() {
        echo "<div>
        <h1>$this->title</h1>
        <h2>$this->first_name</h2>
        <h2>$this->date_added</h2>
        <h2>$this->picture</h2>
        <h2>$this->city</h2>
        </div>"
        ;
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




</body>