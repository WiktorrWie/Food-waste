<?php
session_start();
if (ISSET($_GET)){
   session_destroy();
   header("location: index.php");
    }

    ?>