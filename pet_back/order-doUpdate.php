<?php

if (!isset($_POST["order_id"])) {
    header("location: ./404.php");
}
$order_id = $_POST["order_id"];

require_once("./db_connect.php");

// 根據訂單ID查詢訂單訊息
$sql = "SELECT * FROM orders WHERE order_id = $order_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// 檢查訂單狀態
if ($row["status_id"] == 1) {
    if ($_POST["action"] == "ship") {
        $sqlUpdate = "UPDATE orders SET status_id = 2 WHERE order_id = $order_id";
        $message = "訂單已出貨";
    } elseif ($_POST["action"] == "cancel") {
        $sqlUpdate = "UPDATE orders SET status_id = 4 WHERE order_id = $order_id";
        $message = "訂單已取消";
    }
    $conn->query($sqlUpdate);
} elseif ($row["status_id"] == 2 || $row["status_id"] == 3) {
    $sqlUpdate = "UPDATE orders SET status_id = 4 WHERE order_id = $order_id";
    $conn->query($sqlUpdate);
    $message = "訂單已取消";
} elseif ($row["status_id"] == 4) {
    $message = "訂單已取消";
} else {
    $message = "無法執行操作";
}


$conn->close();

header("location: ./order-update.php?order_id=$order_id&message=$message");
exit;








// $order_id = $_POST["order_id"];
// $status_id = $_POST["status_id"];
// $action = $_POST["action"];

// require_once("./db_connect.php");

//失敗的法一
// if ($status_id === 1) {
//     $sql = "UPDATE orders SET status_id='2' WHERE order_id=$order_id";
// }else {
//     echo "修改資料錯誤: " . $conn->error;
// }


//失敗的法二
// if ($action === "ship") {
//     $sql = "UPDATE orders SET status_id = 2 WHERE order_id = $order_id";
// } elseif ($action === "cancel") {
//     $sql = "UPDATE orders SET status_id = 4 WHERE order_id = $order_id";
// }else {
//     echo "修改資料錯誤: " . $conn->error;
// }

// $conn->close();

?>


