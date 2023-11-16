<?php
require_once("../db_connect1.php");//檢查連線


if(!isset($_POST["name"])){
    die("請依正常管道進入");
}

if(empty($_POST["name"])){
    die("請輸入姓名");
}

if(empty($_POST["email"])){
    die("請輸入Email");
}

if(empty($_POST["password"])){
    die("請輸入密碼");
}

$name=$_POST["name"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$email=$_POST["email"];
$now=date('Y-m-d H:i:s');

if($password!=$repassword){
    die("密碼前後不一致");
}

$password=md5($password);


$sql="INSERT INTO users (username,email,password,created_at,updated_at,valid) VALUES ('$name','$email','$password','$now','$now',1)";



if ($conn->query($sql) === TRUE) {

    header("location:user-list.php");
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$sql="INSERT INTO userinfo (name,email,created_at,updated_at,gender,address,phone,level_id,cover_photo) VALUES ('$name','$email','$now','$now','尚未填寫','尚未填寫','尚未填寫',1,'pic1.png')";



if ($conn->query($sql) === TRUE) {

    header("location:user-list.php");
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

?>