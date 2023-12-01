<?php
include ("../../config/db.php");

function insertThemes(){

    $json_tags = json_encode($theme_tags);

    global $connection;
    $query = "INSERT INTO theme (theme_name, theme_image, theme_desc, theme_tags) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sbss', $theme_name, $theme_image, $theme_desc, $convert);

    $result = mysqli_execute($stmt);
    if ($result){
        echo  "dima koukab";
    }else {
        echo mysqli_error($connection);
    }
}

print_r($_POST);    