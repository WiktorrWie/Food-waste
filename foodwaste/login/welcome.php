
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

<h5 id="openSignUp" class="button" onclick="openSignUp()">Sign Up</h5>
<div id="signUp">
<form action="signup.php" method="POST">
    <input type="text" name="firstName" placeholder="First name">
    <input type="text" name="lastName" placeholder="Last name">
    <input type="email" name=email placeholder="Email">
    <input type="password" name=password placeholder="Password">
    <input class="submit" type=submit value="Sign Up">
</form>
<h5 class="subtitle marginA black center"> Already have an account? </h5>
<h5 id="openLogIn" class="white logIn center" onclick="openLogIn(), closeSignUp()">Log In</h5>
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
<h5 id="openLogIn" class="white logIn" onclick="openLogIn()">Log In</h5>
<div id="logIn">
<form action="login.php" method="POST">
    <input type="email" class="marginB" name=email placeholder="Email">
    <input type="password" class="marginC" name=password placeholder="Password">
    <input class="submit" type=submit value="Log in">
</form>
<h5 class="subtitle marginA black center"> Don't have an account? </h5>
<h5 class="subtitle center white" id="signUpButton" onclick="openSignUp(), closeLogIn()">Sign Up</h5>
</div>

</body>
<?php 
if (isset($_GET["signin"])){
    if ($_GET["signin"]=="error"){
        echo "<p>wrong information</p>";
    } 
}

?>