<?php
require_once("db_connect.php");

$page = $_GET["page"] ?? 1;
$type = $_GET["type"] ?? 1;
$category = $_GET["category"] ?? -1;

if ($category == -1) {
    $sqlTotal = "SELECT id FROM article WHERE valid = 1";
} else {
    $sqlTotal = "SELECT id FROM article WHERE valid = 1 AND category = $category";
}

$resultTotal = $conn->query($sqlTotal);
$totalArticle = $resultTotal->num_rows;

$perPage = 10;
$startItem = ($page - 1) * $perPage;
$totalPage = ceil($totalArticle / $perPage);


$sql = "SELECT article.id AS article_id , article.title, article.abstract, article.published_date, article.created_date, article.category, article_category.name AS category_name
JOIN article_category ON article.category = article_category.id
ORDER BY id ASC LIMIT $startItem, $perPage";


if ($type == 1) {
    $sql  = "SELECT article.id AS article_id, article.title, article.abstract, article.published_date, article.created_date, article_category.name AS category_name
            FROM article 
            JOIN article_category ON article.category = article_category.id
            WHERE valid = 1 
            ORDER BY article.created_date ASC 
            LIMIT $startItem, $perPage";
    $Orderby = 'ASC';
} else if ($type == 2) {
    $sql  = "SELECT article.id AS article_id, article.title, article.abstract, article.published_date, article.created_date, article_category.name AS category_name
            FROM article 
            JOIN article_category ON article.category = article_category.id
            WHERE valid = 1 
            ORDER BY article.created_date DESC 
            LIMIT $startItem, $perPage";
    $Orderby = 'DESC';
} else {
    header("location:../404.php");
}



$sqlCategory = "SELECT * FROM article_category ORDER BY id ASC";
$resultCate = $conn->query($sqlCategory);
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);


if ($category == -1) {
    $sql = "SELECT article.id AS article_id, article.title , article.abstract, article.published_date, article.created_date, article_category.name AS category_name
    FROM article 
    JOIN article_category ON article.category = article_category.id
    WHERE valid = 1 
    ORDER BY article.created_date $Orderby
    LIMIT $startItem, $perPage
    ";
    }else if($category == 1) {
    $sql = "SELECT article.id AS article_id, article.title , article.abstract, article.published_date, article.created_date, article_category.name AS category_name
    FROM article 
    JOIN article_category ON article.category = article_category.id
    WHERE valid = 1 AND article.category = 1 
    ORDER BY article.created_date $Orderby
    LIMIT $startItem, $perPage
    ";
} else if ($category == 2) {
    $sql = "SELECT article.id AS article_id, article.title , article.abstract, article.published_date, article.created_date, article_category.name AS category_name
    FROM article 
    JOIN article_category ON article.category = article_category.id
    WHERE valid = 1 AND article.category = 2 
    ORDER BY article.created_date $Orderby
    LIMIT $startItem, $perPage
    ";

} else if ($category == 3) {
    $sql = "SELECT article.id AS article_id, article.title , article.abstract, article.published_date, article.created_date, article_category.name AS category_name
    FROM article 
    JOIN article_category ON article.category = article_category.id
    WHERE valid = 1 AND article.category = 3 
    ORDER BY article.created_date $Orderby
    LIMIT $startItem, $perPage
    ";
} else {
    header("Location:article-list.php");
    exit;
}

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>


<!doctype html>
<html lang="en">

<head>
    <title>Article List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css.php">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="nav py-4">
            <h1>文章列表頁</h1>
        </div>
        <div class="pb-5">
            <div class="py-2">
                <form>
                    <ul class="nav nav-underline mb-3">
                        <li class="nav-item">
                            <a class="nav-link 
                    <?php
                    if (!isset($_GET["category"])) echo "active"
                    ?>" aria-current="page" href="article-list.php?type=<?= $type ?>">全部</a>
                        </li>
                        <?php foreach ($cateRows as $category) : ?>
    <li class="nav-item">
        <a class="nav-link 
        <?php
        if (isset($_GET["category"]) && $_GET["category"] == $category["id"]) echo "active";
        ?>" href="article-list.php?page=<?= $page ?>&category=<?= $category["id"] ?>&type=<?= $type ?>">
            <?= $category["name"] ?>
        </a>
    </li>
<?php endforeach; ?>
                    </ul>
                </form>
            </div>
            <form action="article_search.php">
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="輸入關鍵字搜尋文章" name="keyword">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-warning" type="submit">搜尋</button>
                    </div>
                </div>
            </form>
            <div class="col-1 pt-4">
                <a class="btn btn-warning" href="create-article.php">新增文章</a>
            </div>
            <form action="article-list.php">
                <div class="py-2 d-flex justify-content-end">
                    <div class="btn-group">
                        <a href="article-list.php?page=<?= $page ?>&type=1&category=<?= isset($_GET["category"]) ? $_GET["category"] : -1 ?>" class="btn btn-warning border <?php
                                                                                                            if ($type == 1) echo "active";
                                                                                                            ?>">舊到新 </a>
                        <a href="article-list.php?page=<?= $page ?>&type=2&category=<?= isset($_GET["category"]) ? $_GET["category"] : -1 ?>" class="btn btn-warning border <?php
                                                                                                            if ($type == 2) echo "active";
                                                                                                            ?>">新到舊 </a>
                    </div>

                </div>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>文章編號</th>
                    <th>文章類別</th>
                    <th>文章標題</th>
                    <th>文章摘要</th>
                    <th>發佈時間</th>
                    <th>建立時間</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row["article_id"] ?></td>
                        <td><?= $row["category_name"] ?></td>
                        <td><?= $row["title"] ?></td>
                        <td><?= $row["abstract"] ?></td>
                        <td><?= $row["published_date"] ?></td>
                        <td><?= $row["created_date"] ?></td>
                        <td><a href="article.php?id=<?= $row["article_id"] ?>" class="btn btn-warning">顯示</a></td>
                        <td><a href="article-edit.php?id=<?= $row["article_id"] ?>" class="btn btn-secondary">編輯</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <li class="page-item <?php if ($i == $page) echo "active"; ?>">
    <a class="page-link" href="article-list.php?page=<?= $i ?>&type=<?= $type ?>&category=<?= isset($_GET["category"]) ? $_GET["category"] : -1 ?>"><?= $i ?></a>
</li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <?php include("../js.php") ?>
    <script>

    </script>
</body>

</html>