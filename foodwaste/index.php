<?php
session_start();

if (empty($_SESSION)){
    header("location: login/welcome.php");
    exit;
}

?>

<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&display=swap" rel="stylesheet">

<body>
<div class="header">

            <a href="index.php" class="nav_link logo"><img src="./icon/MinMad.png" alt="logo" class="logo"></a>
            <input class="menu-btn" type="checkbox" id="menu-btn">
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="dropdown_menu">
                <li class="menu_item"><a href="" class="nav_link">
                    <img src="."
                        Home
                    </a></li>

                <li class="menu_item"><a href="" class="nav_link">
                        Chat
                    </a>
                </li>

                <li class="menu_item"><a href="profile.php" class="nav_link">
                        Profile
                    </a>
                </li>

                <li class="menu_item"><a href="" class="nav_link">
                    <form action="logout.php" method="GET">
                        <input class="logOut" name="logout" type=submit value="Log out">
                    </form>
                    </a>
                </li>
            </ul>

        </div>
        <div class="mainButtons">
            <div class="mainGreen">
                <p class="subtitle">You have excess food?</p>
                <a href=addPost.php class="mainButton">Create post</a>
            </div>
            
            <div class="mainWhite">
                <p class="subtitle">You want to find free food?</p>
                <a href=map.php class="mainButton">Check map</a>
            </div>
        </div>

</body>
