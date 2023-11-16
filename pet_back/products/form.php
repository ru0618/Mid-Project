<!doctype html>
<html lang="en">

<head>
    <title>form排版</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .dash {

            text-align: center;
            align-items: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <form class="row g-3">
            <div class="col-12">
                <label for="inputname" class="form-label">商品名稱</label>
                <input type="text" class="form-control" id="inputname" placeholder="請輸入關鍵字">
            </div>

            <div class="col-md-6">
                <label for="inputcategory" class="form-label">種類/類別</label>
                <select id="inputcategory" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputquantity" class="form-label">商品數量</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="
                            <?php if (isset($_GET["min"])) echo $_GET["min"] ?>">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="
                        <?php if (isset($_GET["max"])) echo $_GET["max"] ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="inputsold" class="form-label">售出數量</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="
                            <?php if (isset($_GET["min"])) echo $_GET["min"] ?>">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="
                        <?php if (isset($_GET["max"])) echo $_GET["max"] ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="inputprice" class="form-label">價錢篩選</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="
                            <?php if (isset($_GET["min"])) echo $_GET["min"] ?>">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="
                        <?php if (isset($_GET["max"])) echo $_GET["max"] ?>">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">搜尋</button>
                <button type="reset" class="btn btn-danger">重設</button>
            </div>
        </form>

        <!-- 新增商品 -->

        <h1 class="mt-5">新增商品</h1>

        <form class="row g-3">
            <div class="col-12">
                <label for="inputName" class="form-label">商品名稱</label>
                <input type="text" class="form-control" id="inputName" placeholder="">
            </div>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">種類</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">類別</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputPrice" class="form-label">價錢</label>
                <input type="number" class="form-control" name="price" value="">
            </div>
            <div class="col-md-4">
                <label for="inputSpecialoffer" class="form-label">售價</label>
                <input type="number" class="form-control" name="specialoffer" value="">
            </div>
            <div class="col-md-4">
                <label for="inputQuantity" class="form-label">數量</label>
                <input type="number" class="form-control" name="quantity" value="">
            </div>
            <div class="col-12">
                <label for="formFile" class="form-label">上傳圖片</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-12">
                <label for="productDecsription" class="form-label">商品描述</label>
                <textarea class="form-control" id="productDecsription" rows="3"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">送出</button>
                <button type="reset" class="btn btn-danger">重設</button>
            </div>
        </form>
    </div>

    $sql = "SELECT products.*, category.category_name, subcategory.subcategory_name
    FROM products
    JOIN category ON category.category_id = products.category_id
    JOIN subcategory ON subcategory.subcategory_id = products.subcategory_id
    WHERE products.product_id $orderBy
    LIMIT $startItem, $perPage";

    $result = $conn->query($sql);














    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>