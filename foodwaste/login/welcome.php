<?php

?>

<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>

<div id="welcome">
    <h5>Welcome to</h5>
    

</div>

<h2 id="openSignUp" onclick="openSignUp()">Signup</h2>
<div id="signUp">
<form action="signup.php" method="POST">
    <input type="text" name="firstName" placeholder="First name">
    <input type="text" name="lastName" placeholder="Last name">
    <input type="email" name=email placeholder="email">
    <input type="password" name=password placeholder="password">
    <input type=submit>
</form>
<button type="button" id="closeSignUp" onclick="closeSignUp()">Close</button>
</div>
<?php 
if (isset($_GET["signup"])){
    if ($_GET["signup"]=="error"){
        echo "<p>Something went wrong. Try again</p>";
    } 
    if ($_GET["signup"]=="succes"){
        echo "<p>You did it now login!</p>";
    } 
}
?>


<h2 id="openLogIn" onclick="openLogIn()">Log In</h2>
<div id="logIn">
<form action="login.php" method="POST">
    <input type="email" name=email placeholder="email">
    <input type="password" name=password placeholder="password">
    <input type=submit value=login>
</form>
<button type="button" id="closeLogIn" onclick="closeLogIn()">Close</button>
</div>
<?php 
if (isset($_GET["signin"])){
    if ($_GET["signin"]=="error"){
        echo "<p>wrong information</p>";
    } 
}

?>