<?php
session_start();
require("../database/database.php");

//changing profile picture

if (!empty($_POST)){
    $file = $_FILES["pictureToUpload"];
    $targetFolder = "../images/profile/";
    $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $fileName = $_SESSION["first_name"].time().".".$fileType;
    var_dump($file);
    
    //file upload plus validation
    if ($fileType == "png" || $fileType == "jpg" || $fileType == "jpeg") {
        if ($file["size"] < 2000000) {
        move_uploaded_file($file["tmp_name"], $targetFolder . $fileName);
            $picture = "images/profile/". $fileName;
            //saving photo into database. 
            //CALL addPicture (profile_picture);
            $sql= "CALL addPicture('$_SESSION[userid]', '$profile_picture');";
            
            if($mySQL->query($sql) === true){
                 header("location: ../profile.php?post=succes");
                exit;
                }
            }
        else{
            header("location: ../profile.php?error=large");
            exit;
        }
    } 
    else{
        
        header("location: ../profile.php?error=format");
            exit;
    }
        
        
}
else{
    echo "nope";
}
        
        
?>
        