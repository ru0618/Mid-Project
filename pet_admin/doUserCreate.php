<?php
if(!isset($_POST["name"])){
    die ("請依正常管道到此頁");
}

require_once("db_connect1.php");//檢查連線


$name=$_POST["name"];
$gender=$_POST["gender"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$birthday=$_POST["birthday"];
$email=$_POST["email"];
$password=$_POST["password"];
$password=md5($password);
$pet_number=$_POST["pet_number"];
$now=date('Y-m-d H:i:s');



if($_FILES["file"]["error"]==0){
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"])){

        $filename=$_FILES["file"]["name"];
        echo "上傳成功，檔名為".$filename;


        $sql="INSERT INTO users (username,email,password,created_at,updated_at,valid) VALUES ('$name','$email','$password','$now','$now',1)";

        $sql1="INSERT INTO userinfo (name,gender,phone,address,birthday,email,pet_number,created_at,updated_at,level_id,cover_photo) VALUES ('$name','$gender','$phone','$address','$birthday','$email','$pet_number','$now','$now',1,'$filename')";

        if ($conn->query($sql) === TRUE) {
            header("location:user-list.php");
        } else {
            echo "新增資料錯誤: " . $conn->error;
        }
        
        if ($conn->query($sql1) === TRUE) {
            header("location:user-list.php");
        } else {
            echo "新增資料錯誤: " . $conn->error;
        }


    }else{
        echo "上傳失敗";
    }

}else{
    var_dump($_FILES["file"]["error"]);
}

$conn->close();