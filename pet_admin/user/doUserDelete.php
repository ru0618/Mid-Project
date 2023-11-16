<?php

if(!isset($_GET["id"])){
   die("無法作業"); 
}
require_once("db_connect1.php");

$id=$_GET["id"];


$sql="UPDATE users SET valid=0 WHERE user_id = '$id'";

if ($conn->query($sql) === TRUE) {

    header("location: user-list.php");

} else {
    echo "刪除資料錯誤: " . $conn->error;
}
