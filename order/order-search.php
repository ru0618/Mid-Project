<?php
//isset
$whereClouse = "";

if (isset($_GET["start"])) {
    require_once("./db_connect.php");
    $start = $_GET["start"];
    $end = $_GET["end"];
    if ($start == "") $start = "2023-01-01";
    if ($end == "") $end = "2023-12-31";
    $sql = "SELECT orders.*, users.username AS user_name, order_status.status_name AS status_name 
    FROM orders
JOIN users ON users.user_id = orders.user_id
JOIN order_status ON order_status.status_id = orders.status_id
WHERE orders.created_at BETWEEN '$start' AND '$end'
ORDER BY order_id ASC
";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $start_count = $result->num_rows;
} else {
    $start_count = 0;
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>訂單搜尋</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container ">
        <div class="py-2 ">
            <a class="btn btn-dark" href="order-list.php">回訂單列表</a>
        </div>

        <div class="py-2 ">
            <?php
            $title = "訂單資料";
            if (isset($_GET["start"])) {
                $title = $_GET["start"] . "~" . $_GET["end"] . "訂單資料";
            }
            ?>
            <h1 class="h2"> <?= $title ?> </h1>
        </div>

        <div class="py-2 d-flex justify-content-end align-items-center ">

            <form action="order-search.php">
                <div class="row align-items-center gx-2">
                    <div class="col-auto">
                        <input type="date" class="form-control" name="start" value="<?php if (isset($_GET["start"])) echo $_GET["start"] ?>">
                    </div>
                    <div class="col-auto">
                        ～
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="end" value="<?php if (isset($_GET["end"])) echo $_GET["end"] ?>">
                    </div>
                    <div class="col-auto py-3">
                        <button class="btn btn-dark " type="submit">搜尋</button>
                    </div>
                </div>
            </form>
        </div>

        

        <table class="table table-bordered align-middle text-center ">
            <thead>
                <tr>
                    <th>訂單編號</th>
                    <th>會員名稱</th>
                    <th>訂單狀態</th>
                    <th>下單時間</th>
                    <th>總金額</th>
                    <th>修改訂單狀態</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) :
                ?>
                    <tr>
                        <td>
                            <a href="order-details.php?order_id=<?= $row["order_id"] ?> " class="text-decoration-none">
                                <?= $row["order_id"] ?>
                            </a>
                        </td>
                        <td><?= $row["user_name"] ?></td>
                        <td><?= $row["status_name"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td>
                        $<?= $row["total_amount"] ?>
                        </td>
                        <td><a href="order-update.php?order_id=<?= $row["order_id"] ?> " class="btn btn-info shadow  rounded">編輯</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>