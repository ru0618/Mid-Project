<?php include("db_connect.php") ?>
<?php
if (!isset($_GET["id"])) {
    die("請依正常管道進入");
}
$id = $_GET["id"];

$sql = "SELECT c.category_name, c.category_id, s.subcategory_id, s.subcategory_name, s.valid
FROM subcategory AS s
JOIN category AS c
ON s.category_id = c.category_id
WHERE s.subcategory_id = $id
";
$resultCateE = $conn->query($sql);
$rowCateE = $resultCateE->fetch_all(MYSQLI_ASSOC);

//var_dump($rowCateE);
echo "<br>";


$sqlCategory = "SELECT * FROM category ";
$resultCategory = $conn->query($sqlCategory);
$cateMainRows = $resultCategory->fetch_all(MYSQLI_ASSOC);

//var_dump($cateMainRows);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
    <div class="col-8 m-auto p-0">
            <a class="btn btn-primary" href="category.php">回類別頁面</a>
        </div>
    </div>
    <div class="container  d-flex flex-column align-items-center mb-5" style="height: 70%">
        
        <div class="card col-8 p-0">
            <div class="card-header text-center">編輯</div>
            <div class="card-body">
                <form action="doedit-category.php" method="post">
                    <?php foreach ($rowCateE as $row) : ?>
                        <div class="form-group mb-2">
                            <label class="" for="exampleFormControlInput1">ID</label>
                            <!-- <input disabled type="text" value="<?= $row["subcategory_id"] ?>"
                         class="form-control" id="exampleFormControlInput1" name="subcategory_id"> -->
                            <input readonly type="text" value="<?= $row["subcategory_id"] ?>" class="form-control" id="exampleFormControlInput1" name="subcategory_id">
                        </div>

                        <div class="form-group mb-2">
                            <label class="" for="exampleFormControlInput1">子類別名稱</label>
                            <input type="text" value="<?= $row["subcategory_name"] ?>" class="form-control" id="exampleFormControlInput1" name="subcategory">
                        </div>

                        <div class="form-group mb-2">
                            <label class="" for="exampleFormControlInput1">狀態</label>
                            <select class="form-select" aria-label="Default select example" name="valid">
                                <?php
                                $selectedOne = ($row["valid"] == 1) ? "selected" : "";
                                $selectedZero = ($row["valid"] == 0) ? "selected" : "";
                                ?>
                                <option <?= $selectedOne ?> value="1">顯示</option>
                                <option <?= $selectedZero ?> value="0">隱藏</option>

                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleFormControlSelect1">主類別</label>
                            <select class="form-select" aria-label="Default select example" name="maincategory">
                                <?php foreach ($cateMainRows as $mainCATE) : ?>
                                    <?php $selected = ($mainCATE["category_id"] == $row["category_id"]) ? "selected" : ""; ?>
                                    <option <?= $selected ?> value="<?= $mainCATE["category_id"] ?>">
                                        <?= $mainCATE["category_name"] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>

                    <button class="btn btn-outline-primary" type="submit"> 確認</button>
                </form>


            </div>
        </div>

    </div>

    <div class="container"></div>
    <div class="container"></div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>