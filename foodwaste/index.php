<?php
session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}
echo "<h3>Hey $_SESSION[first_name]</h3>";





?>
<a href=addPost.php>Create post </a>
<form action="logout.php" method="GET">
<input name="logout "type=submit value="log-out">
</form>

