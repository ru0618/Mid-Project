<?php
require_once("./db_connect.php");


if (!isset($_GET["order_id"])) {
    header("location: ./404.php");
}

$order_id = $_GET["order_id"];


$sql = "SELECT order_details.*, products.product_name AS product_name, products.price, products.image, userinfo.name, userinfo.phone, userinfo.email, userinfo.address, orders.created_at AS created_at
FROM order_details  
JOIN products ON products.product_id = order_details.product_id
JOIN orders ON orders.order_id = order_details.order_id
JOIN userinfo ON userinfo.user_id = orders.user_id
WHERE order_details.order_id= $order_id
";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);


// 輸出user_info的數據
$userRow = $rows[0];
$username = $userRow["name"];


// $sql = "SELECT user_order.*, product.name AS product_name, product.price, users.name AS user_name FROM user_order 
// JOIN product ON product.id = user_order.product_id
// JOIN users ON users.id = user_order.user_id
// $whereClouse
// ORDER BY order_date DESC";

?>

<!doctype html>
<html lang="en">

<head>
    <title>訂單明細</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
   
    
</head>

<body>
    <div class="container ">

        <div class="py-3 text-start">
            <?php if (isset($_GET["order_id"])) : ?>
                <a class="btn btn-warning" href="order-list.php">回訂單列表</a>
            <?php endif; ?>
        </div>

        <div class="py-2 ">
            <?php
            $title = "";
            if (isset($_GET["order_id"])) {
                $title = "訂單編號：" . $_GET["order_id"];
            }
            ?>
            <h1 class="h2"> <?= $title ?> </h1>
        </div>



        <table class="table table-bordered mb-5 text-center font-monospace">
                <input type="hidden" name="id" value="<?= $row["order_id"] ?>">
                <tr>
                    <th>訂購者</th>
                    <td><?php echo $username; ?></td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td><?= $userRow["phone"] ?></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><?= $userRow["email"] ?></td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><?= $userRow["address"] ?></td>
                </tr>
                <tr>
                    <th>下單時間</th>
                    <td><?= $userRow["created_at"] ?></td>
                </tr>
        </table>



        <table class="table table-bordered py-3 text-center ">
            <thead>
                <tr>
                    <th>商品名稱</th>
                    <th>商品圖片</th>
                    <th>價錢</th>
                    <th>數量</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
            
                <?php 
                $total=0;
                foreach ($rows as $row) :
                ?>
                    <tr class="align-middle">
                        <td><?= $row["product_name"] ?></td>
                        <td >
                            <img width="120px" src="./images/<?= $row["image"] ?>" alt="">
                        </td>
                        <td>$<?= $row["price"] ?></td>
                        <td><?= $row["quantity"] ?></td>
                        <td>
                            <?php
                            $subtotal = $row["price"] * $row["quantity"];
                            $total += $subtotal;
                            ?>
                            $<?= $subtotal ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="text-end fs-4" colspan="6">
                        總金額:$<?= $total ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="my-2 text-center">
        <a href="order-update.php?order_id=<?= $row["order_id"] ?> " class="btn btn-warning shadow  bg-body-tertiary rounded">編輯</a>
        </div>
    </div>

</body>

</html>