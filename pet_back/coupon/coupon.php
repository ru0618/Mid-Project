<?php
require_once("./db_connect1.php");

if(!isset($_GET["coupon_id"])){
header("location:/404.php");
}

$coupon_id=$_GET["coupon_id"];

$sql = "SELECT * FROM coupon WHERE coupon_id=$coupon_id";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Coupon<?=$_GET["coupon_id"]?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a href="coupon-list.php" class="btn btn-outline-primary">回優惠券列表</a>
        </div>
        <table class="table table-bordered mt-2">
               <tr>
                   <th>優惠券code</th>
                    <td><?=$row["coupon_code"]?></td>
               </tr>   
                <tr>
                   <th>優惠券折扣數</th>
                   <td><?=$row["discount"]?></td>
                </tr>
                <tr>
                   <th>起始日期</th>
                   <td><?=$row["start_date"]?></td>
                </tr> 
                <tr>
                   <th>結束日期</th>
                   <td><?=$row["end_date"]?></td>
                </tr>
                <tr>
                   <th>優惠券類型</th>
                   <td><?=$row["discount_type"]?></td>
                </tr>
                <tr>
                    <th>優惠券折扣上限</th>
                    <td><?=$row["discount_amount"]?></td>
                </tr>
                <tr>
                    <th>優惠券數量</th>
                    <td><?=$row["usage_limit"]?></td>
                </tr>
                <tr>
                    <th>適用會員等級</th>
                    <td><?=$row["level"]?></td>
                </tr>
       </table>
        <a href="coupon-edit.php?coupon_id=<?=$row["coupon_id"]?>" class="btn btn-warning">編輯</a>
    </div>

 
</body>

</html>