<?php
    require("database/database.php");

    $sql = "SELECT * FROM activeposts";
    $result = $mySQL->query($sql);

    $emparray = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }

    return json_encode($emparray);
?>