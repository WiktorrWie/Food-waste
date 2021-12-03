<?php

?>

<h2>Signup</h2>

<form action="signup.php" method="POST">
    <input type="text" name="firstName" placeholder="First name">
    <input type="text" name="lastName" placeholder="Last name">
    <input type="email" name=email placeholder="email">
    <input type="password" name=password placeholder="password">
    <input type=submit>
</form>
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


<h2>Log In</h2>

<form action="login.php" method="POST">
    <input type="email" name=email placeholder="email">
    <input type="password" name=password placeholder="password">
    <input type=submit value=login>
</form>

<?php 
if (isset($_GET["signin"])){
    if ($_GET["signin"]=="error"){
        echo "<p>wrong information</p>";
    } 
}

?>