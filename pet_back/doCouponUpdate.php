<?php
$coupon_id=$_POST["coupon_id"];
$coupon_code=$_POST["coupon_code"];
$discount=$_POST["discount"];
$start_date=$_POST["start_date"];
$end_date=$_POST["end_date"];
$discount_type=$_POST["discount_type"];
$discount_amount=$_POST["discount_amount"];
$usage_limit=$_POST["usage_limit"];
$level=$_POST["level"];




require_once("db_connect1.php");

$sql="UPDATE coupon SET coupon_id='$coupon_id',coupon_code='$coupon_code',discount='$discount',start_date='$start_date',end_date='$end_date',discount_type='$discount_type',discount_amount='$discount_amount',usage_limit='$usage_limit',level='$level' WHERE coupon_id=$coupon_id";

if ($conn->query($sql) === TRUE) {
    header("location: coupon.php?coupon_id=".$coupon_id);
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();