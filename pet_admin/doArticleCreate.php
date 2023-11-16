<?php
if (!isset($_POST["title"])) {
    die("請依正常管道到此頁");
}

require_once("db_connect.php");

$title = $_POST["title"];
$abstract = $_POST["abstract"];
$content = $_POST["content"];
$category = $_POST["category"];
$now = date('Y-m-d H:i:s');
$valid = 1;
$image = ""; // 設置預設值

$sql = "INSERT INTO article (title, abstract, content, category, created_date, valid) VALUES ('$title', '$abstract', '$content', '$category', '$now', '$valid')";

if ($conn->query($sql) === TRUE) {
    $latestId = $conn->insert_id; // 取得最新插入的文章 ID
    echo "文章新增完成，文章編號為 $latestId";
    
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];

        // 移動上傳的文件到目的地
        move_uploaded_file($image_tmp, "article_images/" . $image);

        // 插入圖片檔名到 article_images 資料表
        $sqlImage = "INSERT INTO article_images (img, article_id) VALUES ('$image', '$latestId')";
        $conn->query($sqlImage);
    }
    
    header("location: article-list.php");
} else {
    echo "新增文章錯誤：" . $conn->error;
}

$conn->close();
?>