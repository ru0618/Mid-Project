<?php

if(!isset($_GET["coupon_id"])){
    die("無法作業");
}
// var_dump($_GET["coupon_id"]);


require_once("db_connect1.php");


$coupon_id=$_GET["coupon_id"];
// echo $id;

$sql="UPDATE coupon SET valid=0 WHERE coupon_id='$coupon_id'";
// var_dump($coupon_id);

if ($conn->query($sql) === TRUE) {
   header("location:coupon-list.php");
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();