<?php

require_once("db_connect.php");
$id = $_GET["id"];

$sql = "SELECT * FROM article WHERE id='$id'";
$result = $conn->query($sql);
$article = $result->fetch_assoc();


$sqlImages = "SELECT * FROM article_images 
WHERE article_id = '$id'
ORDER BY id DESC";
$resultImages = $conn->query($sqlImages);
$articleImages = $resultImages->fetch_assoc();
?>



<!doctype html>
<html lang="en">

<head>
    <title>Article</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="nav py-4">
            <a class="btn btn-warning" href="article-list.php">回文章列表</a>
        </div>
        <h1><?= $article["title"] ?></h1>
        <figure>
            <img src="article_images/<?= $articleImages["img"] ?>" alt="">
        </figure>
        <div>
            <?= $article["content"] ?>
        </div>
        <div class="nav py-4">
            <a class="btn btn-warning" href="article-edit.php?id=<?= $article["id"] ?>">編輯</a>
        </div>
    </div>

</body>

</html>