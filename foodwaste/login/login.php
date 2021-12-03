<?php
session_start();
require("../database/database.php");
$email;
$password;





if(isset($_POST)){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql = "SELECT hashedPassword, id FROM users WHERE email='$email'";

    $user = $mySQL->query($sql)->fetch_object();



    if (password_verify($password, $user->hashedPassword)) {
        $_SESSION["email"] = $email;
        $_SESSION["userid"] = $user->id;
        header("location: ../index.php");
        exit;
    } else {
        header("location: welcome.php?signin=error");
        exit;
    }

}



?>