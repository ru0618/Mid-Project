<?php
if (!isset($_GET["order_id"])) {
    header("location: ./404.php");
}
$order_id = $_GET["order_id"];

require_once("./db_connect.php");
$sql = "SELECT orders.*, users.username AS user_name, order_status.status_name AS status_name 
FROM orders  
JOIN users ON users.user_id = orders.user_id
JOIN order_status ON order_status.status_id = orders.status_id
WHERE order_id= $order_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>


<!doctype html>
<html lang="en">

<head>
    <title>修改訂單狀態</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">訊息</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    確認取消訂單?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a href="doDelete.php?id=<?= $id ?>" class="btn btn-danger">確認</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="py-3 text-start">
            <?php if (isset($_GET["order_id"])) : ?>
                <a class="btn btn-light shadow  bg-body-tertiary rounded" href="order-list.php">回訂單列表</a>
            <?php endif; ?>
        </div>

        <div class="my-3">
            <?php
            if (isset($_GET["message"])) {
                $message = $_GET["message"];
                echo '<div class="alert alert-danger">' . $message . '</div>';
            }
            ?>
        </div>

        <form action="order-doUpdate.php" method="post">
            <table class="table table-bordered my-5 text-center">
                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                <tr>
                    <th>訂單編號</th>
                    <td><?= $row["order_id"] ?></td>
                </tr>
                <tr>
                    <th>會員姓名</th>
                    <td><?= $row["user_name"] ?></td>
                </tr>
                <tr>
                    <th>訂單狀態</th>
                    <td class="text-danger"><?= $row["status_name"] ?></td>
                </tr>
                <tr>
                    <th>下單時間</th>
                    <td><?= $row["created_at"] ?></td>
                </tr>
                <tr>
                    <th>總金額</th>
                    <td>$<?= $row["total_amount"] ?></td>
                </tr>
            </table>
            <!-- <div class="py-2 d-flex justify-content-center ">
                <button class="btn btn-dark mx-2" type="submit">出貨</button>
                <button class="btn btn-danger mx-2" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">取消訂單</button>
            </div> -->

            <div class="py-2 d-flex justify-content-end">
                <?php if ($row["status_id"] == 1) : ?>
                    <button class="btn btn-info mx-2" type="submit" name="action" value="ship">出貨</button>
                    <button class="btn btn-danger mx-2" type="submit" name="action" value="cancel">取消訂單</button>
                <?php elseif ($row["status_id"] == 2 || $row["status_id"] == 3) : ?>
                    <button class="btn btn-danger mx-2" type="submit"   name="action" value="cancel" >取消訂單</button>
                <?php elseif ($row["status_id"] == 4) : ?>
                    <a class="btn btn-light mx-2" href="./order-list.php">訂單已取消，回訂單列表</a>
                <?php endif; ?>
            </div>
        </form>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>