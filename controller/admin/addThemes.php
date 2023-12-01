<?php
include ("../../config/db.php");
if (isset($_POST["add_theme"])){
    insertThemes();
}

function insertThemes(){
    global $connection;
    // get variables from post
    $theme_name = $_POST['theme_name'];
    $theme_desc = $_POST['theme_desc'];
    $theme_tags = $_POST['theme_tags'];
    // turn tags string into array
    $json_tags = json_encode($theme_tags);
    // get file tmp_name
    $tmp_name = $_FILES['theme_image']['tmp_name'];
    // read the file content
    $theme_image = file_get_contents($tmp_name);

    $query = "INSERT INTO theme (theme_name, theme_image, theme_desc, theme_tags) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sbss', $theme_name, $theme_image, $theme_desc, $json_tags);
    mysqli_stmt_send_long_data($stmt, 1, $theme_image);

    $result = mysqli_execute($stmt);
    if ($result){
        echo '<script>alert("Theme inserted successfully!");</script>';
    }else {
        echo mysqli_error($connection);
    }
}


