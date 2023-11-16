<?php

require_once("../db_connect1.php");

if(!isset($_POST["id"])){
    $data=[
        "status"=>0,
        "message"=>"無有效參數"
    ];
        echo json_encode($data);  
    exit;
}

$id=$_POST["id"];

$sql="SELECT * FROM coupon WHERE coupon_code='$id'";
$result=$conn->query($sql);
$coupon=$result->fetch_assoc();

$data=[
    "status"=>1,
    "coupon"=>$coupon
];
echo json_encode($data);