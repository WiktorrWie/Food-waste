<?php 
session_start();


?>

<form action="upload/createpost.php" method = "post" enctype="multipart/form-data">
    <input required type="text" name="title" placeholder="title your post">
    <br>
    <textarea required rows="4" cols="50" name="description" placeholder="Describe yourself here..."></textarea>
    <br>
    <input required type="text" name="city" placeholder = "city">
    <br>
    <label>Upload picture (Max 2MB)</label>
    <br>
    <input required type="file" name="fileToUpload">
    <br>

    <input type=submit>
</form>
