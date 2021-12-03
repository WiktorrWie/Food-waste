<?php 
    $server = "localhost"; //localhost
    $username = "root"; //probably root
    $password = "";
    $database = "foodwaste";
    $mySQL = new mysqli($server, $username, $password, $database);

    if (!$mySQL) {
        die("Could not connect to the MySQL server: " . mysqli_connect_error());
    }


    ?>