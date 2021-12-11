<?php
session_start();
require("../database/database.php");

if (!empty($_POST)){
$file = $_FILES["fileToUpload"];
$title = $_POST["title"];
$description = $_POST["description"];
$city = $_POST["city"];
$contact = $_POST["contact"];

$targetFolder = "../images/posts/";
$fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));


$fileName = $_SESSION["first_name"].time().".".$fileType;
var_dump($file);
//file upload plus validation
if ($fileType == "png" || $fileType == "jpg" || $fileType == "jpeg") {
    if ($file["size"] < 2000000) {
    move_uploaded_file($file["tmp_name"], $targetFolder . $fileName);
        $picture = "images/posts/". $fileName;
        //saving post into database. 
        //CALL addPost (userid, "title", "description", "image", "city");
        $sql= "CALL addPost('$_SESSION[userid]', '$title', '$description', '$picture', '$city', '$contact')";
        
        if($mySQL->query($sql) === true){
             header("location: ../index.php?post=succes");
            exit;
            }
        else {
             header("location: ../addPost.php?post=error");
            exit;
        }
    
    }
    else 
{
    header("location: ../addPost.php?error=large");
    exit;
}
} else 
{
    header("location: ../addPost.php?error=format");
    exit;
}


}


?>

