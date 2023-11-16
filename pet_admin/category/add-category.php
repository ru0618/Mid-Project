<?php include("db_connect.php") ?>

<?php

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
    <div class="container"></div>

    <div class="container">
    <div class="col-8 m-auto p-0">
            <a class="btn btn-primary" href="category.php">回類別頁面</a>
        </div>
    </div>
    <div class="container " style="height: 70%">
    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
        <div class="card col-8 p-0">
            <div class="card-header text-center ">
                新增
            </div>
            <div class="card-body">
                <form action="doadd-category.php" method="post">

                    <div class="form-group mb-2">
                        <label class="" for="exampleFormControlInput1">子類別名稱</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="請輸入子類別名稱" name="subcategory">
                    </div>


                    <div class="form-group mb-2">
                        <label for="exampleFormControlSelect1">主類別</label>
                        <select class="form-select" aria-label="Default select example" name="maincategory">
                            <?php foreach ($cateMainRows as $mainCATE) : ?>
                                <option value="<?= $mainCATE["category_id"] ?>">
                                    <?= $mainCATE["category_name"] ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <button class="btn btn-outline-primary" type="submit"> 送出</button>
                </form>


            </div>
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