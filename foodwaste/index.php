<?php
session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}
echo "<h3>Hey $_SESSION[first_name]</h3>";

?>

<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&display=swap" rel="stylesheet">

<body>
<div class="header">
            <a href="index.html" class="nav_link logo"><img src="./icons/MinMad.png" alt="logo" class="logo"></a>

            <input class="menu-btn" type="checkbox" id="menu-btn">
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="dropdown_menu">
                <li class="menu_item"><a href="" class="nav_link">
                        <h2 class="">Home</h2>
                    </a></li>

                <li class="menu_item"><a href="" class="nav_link">
                        <h2 class="">Chat</h2>
                    </a>
                </li>

                <li class="menu_item"><a href="profile.php" class="nav_link">
                        <h2 class="">Profile</h2>
                    </a>
                </li>

                <li class="menu_item"><a href="" class="nav_link">
                    <form action="logout.php" method="GET">
                        <input name="logout "type=submit value="log-out">
                    </form>
                    </a>
                </li>
            </ul>

        </div>
        <a href=addPost.php>Create post </a>

</body>
