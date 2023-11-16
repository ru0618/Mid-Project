<?php include("db_connect.php")?>

<?php



$sqlCategory="SELECT * FROM category ";
$resultCategory = $conn->query($sqlCategory);
$cateMainRows = $resultCategory->fetch_all(MYSQLI_ASSOC);

//----------------------------------------
if(isset($_GET["category"])){
  // 類別篩選
  $getCate = $_GET["category"];

  $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
  FROM subcategory AS s
  JOIN category AS c
  ON s.category_id = c.category_id
  WHERE s.category_id = $getCate
";
}elseif(isset($_GET["name"])){
    $name = $_GET["name"];
    $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
    FROM subcategory AS s
    JOIN category AS c
    ON s.category_id = c.category_id
    WHERE s.subcategory_name LIKE '%$name%'

    ";
}else{
  $sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
FROM subcategory AS s
JOIN category AS c
ON s.category_id = c.category_id
";
}

$resultCate = $conn->query($sql); 
$subcategory_count = $resultCate->num_rows;
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);

//var_dump($cateRows);

?>

<!doctype html>
<html lang="en">
<head>
  <title>category</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
 
  <div class="container " style="height: 80%">
     <div class="container">
    <div class="py-2 mt-4">
    <a class="btn btn-primary mx-3" href="category.php"> 回類別列表</a>
    </div>
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
      <div class="d-flex justify-content-between align-items-center px-3">
        <div>共有<?=$subcategory_count?>筆資料</div>
      </div>
    </div>

  <div class="container">
    <div class="table-wrapper m-3 border border-1 rounded">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">子類別名稱</th>
            <th scope="col">狀態</th>
            <th scope="col">主類別</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($cateRows as $subCATE): ?>
        <tr>
            <th scope="row"><?=$subCATE["subcategory_id"]?></th>
            <td><?=$subCATE["subcategory_name"]?></td>
            <td>
              <?php if($subCATE["valid"] == "1"){
                echo" 顯示";
              }elseif($subCATE["valid"] == "0"){
                echo" 隱藏";
              }?>
            </td>
            <td>
              <a href="category.php?category=<?=$subCATE["category_id"]?>" class="text-decoration-none"> 
              <?=$subCATE["category_name"]?>
            </a>
        </td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>
    
    </div>
    </div>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>