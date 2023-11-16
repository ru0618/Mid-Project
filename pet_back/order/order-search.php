<?php
// isset
// $whereClouse = "";

// if (isset($_GET["start"])) {
//     require_once("./db_connect.php");
//     $start = $_GET["start"];
//     $end = $_GET["end"];
//     if ($start == "") $start = "2023-01-01";
//     if ($end == "") $end = "2023-12-31";
//     $sql = "SELECT orders.*, users.username AS user_name, order_status.status_name AS status_name 
//     FROM orders
// JOIN users ON users.user_id = orders.user_id
// JOIN order_status ON order_status.status_id = orders.status_id
// WHERE orders.created_at BETWEEN '$start' AND '$end'
// ORDER BY order_id ASC
// ";
//     $result = $conn->query($sql);
//     $rows = $result->fetch_all(MYSQLI_ASSOC);
//     $start_count = $result->num_rows;
// } else {
//     $start_count = 0;
// }


require_once("./db_connect.php");

//定義變數
$page = $_GET["page"] ?? 1;


//isset篩選條件
$whereClouse = "";

if (isset($_GET["start"])) {
    $start = $_GET["start"];
    $end = $_GET["end"];
    if ($start == "") $start = "2023-01-01";
    if ($end == "") $end = "2023-12-31";
    $whereClouse = "WHERE orders.created_at BETWEEN '$start' AND '$end' ";
} else {
    $start_count = 0;
}

$status = isset($_GET["status_id"]) ? $_GET["status_id"] : 0;

if (isset($_GET["status_id"])) {
    $status = $_GET["status_id"];
    // $whereClouse = "WHERE orders.status_id=$status && orders.created_at BETWEEN '$start' AND '$end'";
    // $sqlTotal = "SELECT order_id FROM orders WHERE  status_id = $status";
    if ($whereClouse == "") {
        $whereClouse .= "WHERE orders.status_id=$status";
    } else {
        $whereClouse .= " AND orders.status_id=$status";
    }
} else {
    $status = "";
}
// }else{
//     $whereClouse = "WHERE orders.created_at BETWEEN '$start' AND '$end'";
// }

// 查詢isset後 符合條件的訂單數
$sqlTotal = "SELECT order_id FROM orders $whereClouse";
$resultTotal = $conn->query($sqlTotal);
$totalOrder = $resultTotal->num_rows;

$perPage = 5;
$startItem = ($page - 1) * $perPage;  //每一頁開始的資料序號
$totalPage = ceil($totalOrder / $perPage);  //計算總共頁數



//撈資料
$sql = "SELECT orders.*, users.username AS user_name, order_status.status_name AS status_name 
    FROM orders
    JOIN users ON users.user_id = orders.user_id
    JOIN order_status ON order_status.status_id = orders.status_id
    $whereClouse
    ORDER BY order_id ASC
    LIMIT $startItem, $perPage";



$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

//獲取status列表
$sqlStatus = "SELECT * FROM order_status ORDER BY status_id ASC";
$resultStatus = $conn->query($sqlStatus);
$statusRows = $resultStatus->fetch_all(MYSQLI_ASSOC);


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
    <style>
        .nav-item.active{
            font-weight: 900;
            background-color: #66B3FF;
            color: #fff;
        }
        .edit1{
            background-color: 	#ECECFF;
            color: #000;
        }
        .edit2{
            background-color: #C4E1FF;
            color: #000;
        }
    </style>

</head>

<body>
    <div class="container ">
        <div class="pt-2 pb-1 ">
            <a class="btn btn-dark" href="order-list.php">回訂單列表</a>
        </div>

        <div class="py-1 text-center">
            <?php
            $title = "訂單資料";
            if (isset($_GET["start"])) {
                $title = $_GET["start"] . "~" . $_GET["end"] . "訂單資料";
            }
            ?>
            <h1 class="h2"> <?= $title ?> </h1>
        </div>

        <div class="py-1 d-flex justify-content-end align-items-center ">

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

        <div class="py-2 d-flex justify-content-between align-items-center ">
            <nav class="navbar  mb-3">
                <button class="nav-item  text-light bg-secondary ">
                    <a class="nav-link p-1  
                    <?php
                    if (!isset($_GET["status_id"])) echo "active" ?>" aria-current="page" href="order-search.php?start=<?= $start ?>&end=<?= $end ?>"><i class="fa-solid fa-border-all"></i> 全部</a>
                </button>
                <?php foreach ($statusRows as $status) : ?>
                    <button class="nav-item  <?php if (isset($_GET["status_id"]) && $_GET["status_id"] == $status["status_id"]) echo "active"; ?>" >
                        <a class="nav-link p-1  " href="order-search.php?status_id=<?= $status["status_id"] ?>&start=<?= $start ?>&end=<?= $end ?>"><?= $status["status_name"] ?></a>
                    </button>
                <?php endforeach; ?>
            </nav>

            <!-- 每頁顯示筆數明細 -->
            <div class="py-2">
                共 <?= $totalOrder ?> 筆 , 第 <?= $page ?> 頁 / 共 <?= $totalPage ?> 頁
            </div>
        </div>



        <table class="table table-bordered align-middle text-center ">
            <thead>
                <tr>
                    <th>訂單編號</th>
                    <th>會員名稱</th>
                    <th>訂單狀態</th>
                    <th>下單時間</th>
                    <th>總金額</th>
                    <th>修改優惠券</th>
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
                        <td><a href="order-details.php?order_id=<?= $row["order_id"] ?> " class="btn  shadow   rounded edit1">編輯</a></td>
                        <td><a href="order-update.php?order_id=<?= $row["order_id"] ?> " class="btn  shadow  rounded edit2">編輯</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <li class="page-item <?php if ($i == $page) echo "active"; ?>">
                        <?php if (isset($_GET["start"]) && (isset($_GET["status_id"]))) : ?>
                            <!-- 要注意是$_GET["status_id"]而非$status["status_id"] 這個bug抓很久 一開始用$status 在點擊第二頁時，連結中的 status_id 參數仍然保持之前的值，不會更新為新的$_GET["status_id"] 的值，導致狀態無法正確傳遞给後台。使用 $_GET["status_id"]，可以確保每次連結都會動態獲取最新的狀態ID，並將其傳遞给後台處理。這樣無論是在第一頁還是在其他頁點擊分頁連結，都能正確傳遞狀態ID參數。-->
                            <a class="page-link" href="order-search.php?page=<?= $i ?>&status_id=<?= $_GET["status_id"] ?>&start=<?= $start ?>&end=<?= $end ?>"><?= $i ?></a>
                            <?php elseif (isset($_GET["start"])) : ?> 
                                <a class="page-link" href="order-search.php?page=<?= $i ?>&start=<?= $start ?>&end=<?= $end ?>"><?= $i ?></a>   
                        <?php else : ?>
                            <a class="page-link" href="order-search.php?page=<?= $i ?>"><?= $i ?></a>
                        <?php endif; ?>
                    </li>
                <?php endfor; ?>

            </ul>
        </nav>
    </div>
</body>

</html>