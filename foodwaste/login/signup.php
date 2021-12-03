<?php
session_start();
$email;
$password;
$firstName;
$lastName;

require("../database/database.php");
if (ISSET($_POST)){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //add user call CALL addUSer("email", "hashedpassword", "first name", "last name")
    $sql = "CALL addUser('$email', '$password', '$firstName', '$lastName')";


    if($mySQL->query($sql) === true){
       header("location: welcome.php?signup=succes");
        exit;
    } else {
        header("location: welcome.php?signup=error");
        exit;
    }

}
