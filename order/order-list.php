<?php
require_once("./db_connect.php");

//分頁
$page = $_GET["page"] ?? 1;
$type = $_GET["type"] ?? 1;
$value = $_GET["value"] ?? 1;

// 查詢isset後 符合條件的訂單數
$sqlTotal = "SELECT order_id FROM orders";
// $sqlTotal = "SELECT COUNT(*) AS totalOrder FROM orders $whereClause";
$resultTotal = $conn->query($sqlTotal);
$totalOrder = $resultTotal->num_rows;
// $totalOrder = $resultTotal->fetch_assoc()["totalOrder"];

$perPage = 5;
$startItem = ($page - 1) * $perPage;  //每一頁開始的資料序號
$totalPage = ceil($totalOrder / $perPage);  //計算總共頁數


//排序
if ($type == 1) {
    $orderBy = "ORDER BY order_id ASC";
} else if ($type == 2) {
    $orderBy = "ORDER BY order_id DESC";
} elseif ($type == 3) {
    $orderBy = "ORDER BY total_amount ASC";
} elseif ($type == 4) {
    $orderBy = "ORDER BY total_amount DESC";
} else {
    header("location:./404.php");
}

//isset篩選條件
$whereClouse = "";

if (isset($_GET["start"])) {
    $start = $_GET["start"];
    $end = $_GET["end"];
    if ($start == "") $start = "2023-01-01";
    if ($end == "") $end = "2023-12-31";
    $whereClouse = "WHERE orders.created_at BETWEEN '$start' AND '$end' ";
}

if (isset($_GET["status_id"])) {
    $status = $_GET["status_id"];
    $whereClouse = "WHERE orders.status_id=$status";
}


// isset status_id時 就不分頁了 之後要想好一點的方法 有想到的話 保留if裡面的程式碼就好 if else可拿掉
if (!isset($_GET["status_id"])) {
    $sql = "SELECT orders.*, users.username AS user_name, order_status.status_name AS status_name 
    FROM orders
    JOIN users ON users.user_id = orders.user_id
    JOIN order_status ON order_status.status_id = orders.status_id
    $whereClouse
    $orderBy LIMIT $startItem, $perPage";
} else {
    $sql = "SELECT orders.*, users.username AS user_name, order_status.status_name AS status_name 
    FROM orders
    JOIN users ON users.user_id = orders.user_id
    JOIN order_status ON order_status.status_id = orders.status_id
    $whereClouse";
}

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
    <title>訂單資料</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

</head>

<body>
    <div class="container  ">

        <div class="py-2">
            <?php if (isset($_GET["start"]) || isset($_GET["order_id"])) : ?>
                <a class="btn btn-warning" href="order-list.php">回訂單列表</a>
            <?php endif; ?>
        </div>

        <div class="py-2 text-center">
            <?php
            $title = "訂單資料";
            if (isset($_GET["order_id"])) {
                $title = "訂單編號：" . $_GET["order_id"];
            }
            if (isset($_GET["start"])) {
                $title = $_GET["start"] . "~" . $_GET["end"] . "訂單資料";
            }
            ?>
            <h1> <?= $title ?> </h1>
        </div>


        <div class="py-2 d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center ">
                按照
                <select class="form-select  mx-2" aria-label="Default select example" style="width: 200px;">
                    <option value="1" >訂單編號</option>
                    <option value="2">總金額</option>
                </select>
                <a class="btn btn-dark mx-1" href="order-list.php?page=<?= $page ?>&type=1 <?php if ($value == 1) ?> ">遞增排序</a>
                <a class="btn btn-dark mx-1" href="order-list.php?page=<?= $page ?>&type=2 <?php if ($value == 1) ?> ">遞減排序</a>
            </div>

            <!-- <div class="d-flex align-items-center">
                按照
                <select class="form-select mx-2" name="sort_by" aria-label="Default select example" style="width: 200px;">
                    <option value="order_id" <?php if ($type == 1 || $type == 2) echo 'selected'; ?>>訂單編號</option>
                    <option value="total_amount" <?php if ($type == 3 || $type == 4) echo 'selected'; ?>>總金額</option>
                </select>
                <button class="btn btn-dark mx-1" type="submit" name="sort_order" value="asc">遞增排序</button>
                <button class="btn btn-dark mx-1" type="submit" name="sort_order" value="desc">遞減排序</button>
            </div> -->


            

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
                        <button class="btn btn-dark" type="submit">搜尋</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        $order_count = $result->num_rows;
        ?>


        <div class="py-2 d-flex justify-content-between align-items-center">
            <nav class="navbar  mb-3">
                <button class="nav-item  text-light bg-dark " >
                    <a class="nav-link  
                    <?php
                    if (!isset($_GET["status_id"])) echo "active" ?>" aria-current="page" href="order-list.php">全部</a>
                </button>
                <?php foreach ($statusRows as $status) : ?>
                    <button class="nav-item ">
                        <a class="nav-link  <?php if (isset($_GET["status_id"]) && $_GET["status_id"] == $status["status_id"]) echo "active"; ?>" href="order-list.php?status_id=<?= $status["status_id"] ?>"><?= $status["status_name"] ?></a>
                    </button>
                <?php endforeach; ?>
            </nav>

            <!-- 每頁顯示筆數明細 -->
            <?php if (!isset($_GET["status_id"])) : ?>
                <!-- isset status_id時 隱藏此區塊 之後要想好一點的方法-->
                <div class="py-2">
                    第 <?= $page ?> 頁 / 共 <?= $totalPage ?> 頁 , 共 <?= $totalOrder ?> 筆
                </div>
            <?php endif; ?>
        </div>



        <table class="table table-bordered align-middle text-center">
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
                        <td><a href="order-update.php?order_id=<?= $row["order_id"] ?> " class="btn btn-info shadow   rounded">編輯</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <?php if (!isset($_GET["status_id"])) : ?>
            <!-- isset status_id時 隱藏pagination 之後要想好一點的方法-->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                        <li class="page-item <?php if ($i == $page) echo "active"; ?>"><a class="page-link " href="order-list.php?page=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>

</body>

</html>