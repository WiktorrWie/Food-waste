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


    <div class="mainButtons">
        <div class="mainGreen">
            <img class="mainIcon" src="./icon/to-do-list.png">
            <div class="mainText">
                <p class="mainMargin">You have excess food?</p>
                <a href=addPost.php class="mainButton textWhite">Create post</a>
            </div>
            <img class="mainIconNext" src="./icon/next-white.png">
        </div>
            
        <div class="mainWhite">
            <img class="mainIcon" src="./icon/location.png">
            <div class="mainText">
                <p class="mainMargin">You want to find food?</p>
                <a href=map.php class="mainButton textBlack">Check map</a>
            </div>
            <img class="mainIconNext" src="./icon/next-black.png">
        </div>
    </div>

    <div class="listings">
        <div class="listingsHeader">
            <h4 class="listingsText">Nearby Listings</h4>
        </div>
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
            echo "<div class='listing'>
            <h1>$this->title</h1>
            <h2>$this->first_name</h2>
            <h2>$this->date_added</h2>
            <img class='listingImage' src='$this->picture'>
            <h2>$this->city</h2>
            </div>"
            ;
        }
        }
        //Changed select takes all posts
        $sql = "SELECT * FROM activeposts;";
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
</html>
