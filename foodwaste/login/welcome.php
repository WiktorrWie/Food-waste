
<?php

?>

<body>
<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&display=swap" rel="stylesheet">

<div id="welcome">
    <h1 class="subtitle">Welcome to</h1>
    <img id="welcomeLogo" src="../icons/MinMad.png">
    <h1 class="subtitle">Ready to help the environment?</h1>
    <img id="cooking" src="../icons/cooking.png">
</div>

<h5 id="openSignUp" onclick="openSignUp()">Sign Up</h5>
<div id="signUp">
<form action="signup.php" method="POST">
    <input type="text" name="firstName" placeholder="First name">
    <input type="text" name="lastName" placeholder="Last name">
    <input type="email" name=email placeholder="email">
    <input type="password" name=password placeholder="password">
    <input id="submit" type=submit>
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

<h5 class="subtitle marginA"> Already have an account? </h5>
<h5 id="openLogIn" onclick="openLogIn()">Log In</h5>
<div id="logIn">
<form action="login.php" method="POST">
    <input type="email" name=email placeholder="email">
    <input type="password" name=password placeholder="password">
    <input type=submit value=login>
</form>
<button type="button" id="closeLogIn" onclick="closeLogIn()">Close</button>
</div>

</body>
<?php 
if (isset($_GET["signin"])){
    if ($_GET["signin"]=="error"){
        echo "<p>wrong information</p>";
    } 
}

?>