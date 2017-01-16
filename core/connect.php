<?php
/**
 * Created by PhpStorm.
 * User: Haris
 * Date: 30-11-2016
 * Time: 15:28
 */
//connect to mysql database
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>