<?php

$id=$_POST["id"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$birthday=$_POST["birthday"];
$email=$_POST["email"];
$level_id=$_POST["level_id"];
$pet_number=$_POST["pet_number"];
$updated_at=$_POST["updated_at"];
$now=date('Y-m-d H:i:s');

require_once("db_connect1.php");//檢查連線


$sql="UPDATE userinfo SET name='$name',gender='$gender',phone='$phone',address='$address',birthday='$birthday',email='$email',level_id='$level_id',pet_number='$pet_number',updated_at='$now' WHERE user_id=$id";

$sql1="UPDATE users SET username='$name',email='$email',updated_at='$now' WHERE user_id=$id";



if ($conn->query($sql) === TRUE) {
    header("location:user.php?id=".$id);
} else {
    echo "修改資料錯誤: " . $conn->error;
}

if ($conn->query($sql1) === TRUE) {
    header("location:user.php?id=".$id);
} else {
    echo "修改資料錯誤: " . $conn->error;
}




if($_FILES["file"]["error"]==0){
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"])){

        $filename=$_FILES["file"]["name"];
        echo "上傳成功，檔名為".$filename;

        $sql="UPDATE userinfo SET cover_photo='$filename' WHERE user_id=$id";

        if ($conn->query($sql) === TRUE) {
            
            header("location:user.php?id=".$id);
        } else {
            echo "修改資料錯誤: " . $conn->error;
        }


    }else{
        echo "上傳失敗";
    }

}else{
    var_dump($_FILES["file"]["error"]);
}


?>