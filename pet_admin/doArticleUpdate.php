<?php

$id=$_POST["id"];
$title=$_POST["title"];
$abstract=$_POST["abstract"];
$content=$_POST["content"];

require_once("db_connect.php");


if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $image = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    
    // 移動上傳的文件到目的地
    move_uploaded_file($image_tmp, "article_images/".$image);
    
    // 更新 article_images 資料表中的圖片檔名
    $sqlImage = "UPDATE article_images SET img = '$image' WHERE article_id = $id";
    $conn->query($sqlImage);
}

$sql = "UPDATE article SET title='$title', abstract='$abstract', content='$content' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location: article-edit.php?id=".$id);
} else {
    echo "修改文章失敗: " . $conn->error;
}
