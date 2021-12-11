<?php
session_start();
require("../database/database.php");

//changing profile picture





if (!empty($_FILES["fileToUpload"])){
    $file = $_FILES["fileToUpload"];
    $targetFolder = "../images/profile/";

    $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $fileName = $_SESSION["first_name"].time().".".$fileType;
    
    
    //file upload plus validation
    if ($fileType == "png" || $fileType == "jpg" || $fileType == "jpeg") {
        if ($file["size"] < 2000000) {
        move_uploaded_file($file["tmp_name"], $targetFolder . $fileName);
            $picture = "images/profile/". $fileName;
            //saving photo into database. 
            //CALL addPicture (profile_picture);
            $sql= "CALL addPicture($_SESSION[userid], '$picture');";
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
        