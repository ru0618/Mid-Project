<?php include("db_connect.php") ?>

<?php
$sqlCategory = "SELECT * FROM category ";
$resultCategory = $conn->query($sqlCategory);
$cateMainRows = $resultCategory->fetch_all(MYSQLI_ASSOC);
// 抓取頁數------------------------------------
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$type = isset($_GET["type"]) ? $_GET["type"] : 1;

$sqlPage = "SELECT subcategory_id FROM subcategory WHERE valid=1";
$resultPage = $conn->query($sqlPage);
$totalUser = $resultPage->num_rows;
$resultV = $resultPage->fetch_all(MYSQLI_ASSOC);
//var_dump($resultV);
//var_dump($totalUser);

$perPage = 10;
$startItem = ($page - 1) * $perPage;
//頁數計算
$totalPage = ceil($totalUser / $perPage);
//var_dump($totalPage);

//----------------------------------------
if (isset($_GET["category"])) {
  // 類別篩選
  $getCate = $_GET["category"];

  $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
  FROM subcategory AS s
  JOIN category AS c
  ON s.category_id = c.category_id
  WHERE s.category_id = $getCate
";
} elseif ($type == 1) {
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;
  $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
  FROM subcategory AS s
  JOIN category AS c
  ON s.category_id = c.category_id
  WHERE valid = 1
  ORDER BY s.subcategory_id ASC
  LIMIT $startItem,$perPage
  ";
} elseif ($type == 2) {
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;
  $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
  FROM subcategory AS s
  JOIN category AS c
  ON s.category_id = c.category_id
  WHERE valid = 1
  ORDER BY s.subcategory_id DESC
  LIMIT $startItem,$perPage
  ";
} else {
  $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
  FROM subcategory AS s
  JOIN category AS c
  ON s.category_id = c.category_id
";
}

$resultCate = $conn->query($sql);

$subcategory_count = $resultCate->num_rows;
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);

//var_dump($cateSbRows);
?>

<!doctype html>
<html lang="en">

<head>
  <title>category</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
  <div class="container my-3">
    <!-- <?= $totalPage ?> -->
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="category.php">全部主類別</a>
      </li>
      <?php foreach ($cateMainRows as $mainCATE) : ?>
        <li class="nav-item">
          <a class="nav-link" href="category.php?category=<?= $mainCATE["category_id"] ?>"><?= $mainCATE["category_name"] ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="container">
    <div class="py-2 px-3">
      <form action="search-category.php">
        <div class="row gx-2">
          <div class="col">
            <input type="text" class="form-control" placeholder="搜尋子類別" name="name">
          </div>
          <div class="col-auto">
            <button class="btn btn-primary">搜尋</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="py-2 d-flex justify-content-between px-1">
      <div class="col">
        <a  href="category.php?page=<?= $page ?>&type=1" class="btn btn-primary <?php if($type == 1)echo "active";?>">id<i class="fa-solid fa-arrow-down-1-9 "></i></a>
        <a href="category.php?page=<?= $page ?>&type=2" class="btn btn-primary <?php if($type == 2)echo "active";?>">id
          <i class="fa-solid fa-arrow-down-9-1"></i></a>
      </div>
      <div class="col-auto">
        <a class="btn btn-primary" href="add-category.php"> 新增子類別</a>
      </div>

    </div>
    <div class="table-wrapper m-3 border border-1 rounded">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">子類別名稱</th>
            <th scope="col">狀態</th>
            <th scope="col">主類別</th>
            <th scope="col">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cateRows as $subCATE) : ?>
            <tr>
              <th scope="row"><?= $subCATE["subcategory_id"] ?></th>
              <td><?= $subCATE["subcategory_name"] ?></td>
              <td>
                <?php if ($subCATE["valid"] == "1") {
                  echo " 顯示";
                } elseif ($subCATE["valid"] == "0") {
                  echo " 隱藏";
                } ?>
              </td>
              <td>
                <a href="category.php?category=<?= $subCATE["category_id"] ?>" class="text-decoration-none">
                  <?= $subCATE["category_name"] ?>
                </a>
              </td>
              <td>
                <div class="d-flex justify-content-around">
                  <div class="col-auto ">
                    <a class="btn btn-outline-primary" href="edit-category.php?id=<?= $subCATE["subcategory_id"] ?>">編輯</a>
                  </div>
                  <div class="col-auto ">
                    <form action="dodeleted-category.php" method="post" id="deleteForm">
                      <input type="hidden" value="<?= $subCATE["subcategory_id"] ?>" name="subcategory">
                      <input class="btn btn-danger" type="submit" value="刪除" name="delete">
                    </form>
                  </div>

              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
        <tr>
          <td colspan="6" class="text-end px-4">總共 <?= $totalUser ?> 筆資料， 每頁 <?= $subcategory_count ?> 筆資料 </td>
        </tr>
      </table>

    </div>
    <div class="container mx-3 d-flex justify-content-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <li class="page-item <?php if ($i == $page) echo "active"; ?>">
              <a class="page-link" href="category.php?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php endfor; ?>
        </ul>
      </nav>
    </div>
  </div>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>