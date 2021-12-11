<link rel="stylesheet" href="../css/main.css" type="text/css">
<script src="../js/main.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&display=swap" rel="stylesheet">

<div class="header">
    <a href="index.php" class="nav_link logo"><img src="./icon/MinMad.png" alt="logo" class="logo"></a>
    <input class="menu-btn" type="checkbox" id="menu-btn">
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <div class="dropdown_menu">
        <div class="menu_user">
            <?php
            if("$_SESSION[profile_picture]" == NULL){
                echo "<a href='profile.php'><img class='profile_icon' src='./icon/user.png'></a>";
            }
            else{
                echo "<a href='profile.php'><img class='profile_icon' src='$_SESSION[profile_picture]'></a>";
            }
            ?>
            <p class="profile_name">
                <?php
                    echo "<a href='profile.php' class='decoration white'>$_SESSION[first_name] $_SESSION[last_name]</a>";
                ?>
            </p>
        </div>
        <div class="borderBottom">

        </div>
        <ul class="menu_list">
            <li class="menu_item">
                <a href="index.php" class="nav_link">
                    <img class="menu_item_icon" src="./icon/home.png">
                        Home
                </a></li>

            <li class="menu_item">
                <a href="chat.php" class="nav_link">
                    <img class="menu_item_icon" src="./icon/chat.png">
                        Chat
                </a>
            </li>

            <li class="menu_item">
                <a href="profile.php" class="nav_link">
                    <img class="menu_item_icon" src="./icon/profile.png">
                        Profile
                </a>
            </li>

            <li class="menu_item bottom">
                <a href="" class="nav_link">
                    <img class="menu_item_icon" src="./icon/log-out.png">
                    <form action="logout.php" method="GET" class="no_margin">
                        <input class="log_out" name="logout" type=submit value="Log out">
                    </form>
                </a>
            </li>
        </ul>
    </div>

</div>
