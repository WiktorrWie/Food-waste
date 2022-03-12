<?php
session_start();
ob_start();
 // header("location: login/welcome.php");

if (empty($_SESSION)){
    header("location: login/welcome.php");
    ob_end_flush();
    exit;
}
?>

<!DOCTYPE html>
<?php

require("./database/database.php");

ob_start();



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
        <a href=addPost.php class="decoration">
        <div class="mainGreen">
            <img class="mainIcon" src="./icon/to-do-list.png">
            <div class="mainText">
                <p class="mainMargin">You have excess food?</p>
                <p class="mainButton textWhite">Create post</p>
            </div>
            <img class="mainIconNext" src="./icon/next-white.png">
        </div> 
        </a> 

        <div class="mainWhite" onclick="openMap()">
            <img class="mainIcon" src="./icon/location.png">
            <div class="mainText">
                <p class="mainMargin">You want to find food?</p>
                <p class="mainButton textBlack">Check map</p>
            </div>
            <img class="mainIconNext" src="./icon/next-black.png">
        </div>
    </div>

    <div class="listings">
        <div class="listingsHeader">
            <h4 class="listingsText">Nearby listings</h4>
            
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

            // print() function for printing the listings.
            public function print() {
                echo "<div class='listing' id='$this->id' onclick='openListing($this->id)'>
                <img class='listingImage' src='$this->picture'>
                <div class='listingText'>
                <h1 class='title'>$this->title</h1>
                <div class='openListing'>";
                
                if("$this->profile_picture" == NULL){
                    echo "<img class='listingUserImage' src='./icon/user.png'>";
                }
                else{
                    echo "<img class='listingUserImage' src='$this->profile_picture'>";
                }
                
                echo "
                <div class='openListingDetails'>
                <h2 class='nameDate nameAndDate'>$this->first_name - $this->date_added</h2>
                <h2 class='nameDate fullName'>$this->first_name $this->last_name</h2>
                <h2 class='nameDate contact'> $this->contact </h2>
                <h2 class='nameDate cityOpen'>$this->city  - $this->date_added</h2>
                </div>
                </div>";
                echo "<p class='description shortDescription'>";
                //predefined PHP function limits number of characters to 60
                echo substr($this->description, 0, 60);
                echo "...</p>";
                echo "<p class='description fullDescription'>";
                echo $this->description;
                echo "</p>";
                echo "</div>
                <h2 class='city' id='city$this->id'>$this->city</h2>
                <h2 class='closeListing' id='close$this->id' onclick='closeListing($this->id)'>Close</h2>
                </div>";
            }
            
        }
        //Changed select takes all posts
        $sql = "SELECT * FROM activeposts ORDER BY date_added DESC;";
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
    <div id="map">
    <button id="closeMap" onclick="closeMap()">Close map</button>
    <iframe width='100%' height='400px' src="https://api.mapbox.com/styles/v1/wiktorrwie/ckx0u00a22c0j14pc09k1xcf7.html?title=false&access_token=pk.eyJ1Ijoid2lrdG9ycndpZSIsImEiOiJjazdkMWI0OXYwamFyM2ZwYWtnN3h1cWM4In0.XF6ccwQBjTFA1NLSmPaGxA&zoomwheel=false#11.71/56.1507/10.2252" title="Basic" style="border:none;"></iframe>
    </div>
    </body>
</html>


<?php
    $jsonString = '{"Databases":10,"Frontend":10,"Interaction":10,"Backend":"no grade"}';
    // Decoding $jsonString into JSON object
    $decoded = json_decode($jsonString);
    // Display information about one or more variables
    var_dump($decoded);
    // Result: object(stdClass)#5 (4) { ["Databases"]=> int(10) ["Frontend"]=> int(10) ["Interaction"]=> int(10) ["Backend"]=> string(8) "no grade" }
    $decoded->Backend = 10;
    // changing grade to 10
    $encoded = json_encode($decoded);
    echo $encoded;
    // Result: {"Databases":10,"Frontend":10,"Interaction":10,"Backend":10}
    file_put_contents('file.json', $encoded);
    // generating file.json file

    $grades = array(
        "Databases"=>10, 
        "Frontend"=>10, 
        "Interaction"=>10, 
        "Backend"=>"no grade"
    );
    echo '<pre>'; print_r($grades); echo '</pre>';
?>