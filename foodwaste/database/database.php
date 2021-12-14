<?php 
    $server = "22585.m.tld.pl"; //localhost
    $username = "admin22585_food_waste"; //probably root
    $password = "Qwer1234.";
    $database = "baza22585_food_waste";
    $mySQL = new mysqli($server, $username, $password, $database);

    if (!$mySQL) {
        die("Could not connect to the MySQL server: " . mysqli_connect_error());
    }


    ?>