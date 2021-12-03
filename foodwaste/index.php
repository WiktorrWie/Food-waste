<?php
session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}
echo "<h3>Hey $_SESSION[email]</h3>";


if (!empty($_GET)){

    session_destroy();
    header("location: index.php");
}
?>

<form action="?" method="GET">
<input name="logout "type=submit value="log-out">
<form>