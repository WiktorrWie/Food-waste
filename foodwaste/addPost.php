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
        <input class="postInput" required type="text" name="contact" placeholder = "Contact number or other form">
        <br>
        <label class="uploadLabel">Upload picture (Max 2MB)</label>
        <br>
        <input class="postInput fileUpload" required type="file" name="fileToUpload">
        <br>
        <input class="submitPost" type=submit value="Post">
    </form>

    </section>  
</body>
















<?php


/* class Human {

    // Properties
    private $height;
    private $weight;
    private $speed;
    
    // Methods
    public function run($distance) {
    echo "on $distance meters your time would be: ";
    echo round($distance / $this -> speed * 3.6, 2);
    echo " seconds </br>";
    }
    function kick() {
    echo "kick strength: "; 
    echo $this -> weight * $this -> height;
    }
    
    function __construct($height, $weight, $speed) {
    $this->height = $height;
    $this->weight = $weight;
    $this->speed = $speed;
    }
}
    
    $Wiktor = new Human(1.85, 78, 28);
    
    $Wiktor ->run(100);
    // Result: on 100 meters your time would be: 12.86 seconds
    
    $Wiktor ->kick();
    // Result: kick strength: 144.3
*/

class Human {
    // Properties
    private $hobby;
    public static $specie = "Homo sapiens";

    // Methods
    function message() {
      echo "My hobby is: $this -> hobby ";
    }
  }
 echo Human::$specie ;

?>










