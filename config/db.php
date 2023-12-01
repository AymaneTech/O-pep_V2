<?php

$connection = mysqli_connect("localhost", "root", "", "opep_v2");

if (!$connection) {
    die("there is an error in connection to db homie !! : ". mysql_error());
}
