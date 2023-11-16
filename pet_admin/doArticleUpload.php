<?php

require_once("../db_connect.php");

$article_id = $_POST["article_id"];

if ($_FILES["file"]["error"] == 0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../article_images/" . $_FILES["file"]["name"])) {

        $filename = $_FILES["file"]["name"];
        echo "上傳成功, 檔名為" . $filename;

        $sql = "INSERT INTO article_images (article_id, img) VALUES ('$article_id', '$filename')";


        if ($conn->query($sql) === TRUE) {

            $latestId = $conn->insert_id;
            echo "圖片新增資料完成, id 為 $latestId";
            header("location: article-list.php");

        } else {
            echo "新增圖片錯誤: " . $conn->error;
        }
    } else {
        echo "上傳失敗";
    }
} else {
    var_dump($_FILES["file"]["error"]);
}
