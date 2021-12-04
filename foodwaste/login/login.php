<?php
session_start();
require("../database/database.php");
$email;
$password;





if(isset($_POST)){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql = "SELECT hashedPassword, id, first_name, last_name, review_score, profile_picture, soldCount FROM userinformation WHERE email='$email'";
   

    $user = $mySQL->query($sql)->fetch_object();
    


    if (password_verify($password, $user->hashedPassword)) {
        

        $_SESSION["first_name"] = $user->first_name;
        $_SESSION["userid"] = $user->id;
        $_SESSION["review_score"] = $user->review_score;
        $_SESSION["profile_picture"] = $user->profile_picture;
        $_SESSION["soldCount"] = $user->soldCount;
        header("location: ../index.php");
        exit;
    } else {
        header("location: welcome.php?signin=error");
        exit;
    }

}



?>