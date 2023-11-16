<?php


require_once("db_connect1.php");

$coupon_code=$_POST["coupon_code"];
$discount=$_POST["discount"];
$start_date=$_POST["start_date"];
$end_date=$_POST["end_date"];
$discount_type=$_POST["discount_type"];
$discount_amount=$_POST["discount_amount"];
$usage_limit=$_POST["usage_limit"];
$level=$_POST["level"];



// echo "$name,$phone,$email";

$sql="INSERT INTO coupon (coupon_code,discount,start_date,end_date,discount_type,discount_amount,usage_limit,valid,level) VALUES ('$coupon_code','$discount'
,'$start_date','$end_date','$discount_type','$discount_amount','$usage_limit',1,$level) ";

if ($conn->query($sql) === TRUE) {
    header("location:coupon-list.php");
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();
