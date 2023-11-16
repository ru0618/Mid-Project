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
  <title>Coupon edit <?=$_GET["coupon_id"]?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">警示訊息</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            確認刪除?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            <a href="doCouponDelete.php?coupon_id=<?=$coupon_id?>"class="btn btn-danger">確認</a>
        </div>
        </div>
    </div>
    </div>


      <div class="container">
        <div class="py-2">
            <a href="coupon-list.php" class="btn btn-outline-primary">回優惠券列表</a>
        </div>
        <form action="doCouponUpdate.php" method="post">
            <table class="table table-bordered mt-2">
                <input type="hidden" name="coupon_id" value="<?=$row["coupon_id"]?>">
               <tr>
                   <th>優惠券code</th>
                    <td><input type="text"class="form-control"value="<?=$row["coupon_code"]?>" name="coupon_code"></td>
               </tr>   
                <tr>
                   <th>優惠券折扣數</th>
                   <td><input type="text"class="form-control"value="<?=$row["discount"]?>" name="discount"></td>
                </tr>
                <tr>
                   <th>起始日期</th>
                   <td><input type="date"class="form-control"value=<?=$row["start_date"]?> name="start_date"></td>
                </tr> 
                <tr>
                   <th>結束日期</th>
                   <td><input type="date"class="form-control"value=<?=$row["end_date"]?> name="end_date"></td>
                </tr>
                <tr>
                   <th>優惠券類型</th>
                   <td><select name="discount_type" id="" class="form-control" value="<?=$row["discount_type"]?>">
                            <option value="off"<?php if($row["discount_type"]=="off") echo"selected"?>>off</option>
                            <option value="minus"<?php if($row["discount_type"]=="minus") echo"selected"?>>minus</option>
                       </select></td>
                </tr>
                <tr>
                    <th>優惠券折扣上限</th>
                    <td><input type="number"class="form-control"value="<?=$row["discount_amount"]?>" name="discount_amount"></td>
                </tr>
                <tr>
                    <th>優惠券數量</th>
                    <td><input type="number"class="form-control"value="<?=$row["usage_limit"]?>"name="usage_limit"></td>
                </tr>
                <tr>
                    <th>適用會員等級</th>
                    <td><input type="text"class="form-control"value="<?=$row["level"]?>"name="level"></td>
                </tr>
            </table>
        
         <div class="row justift-content-between">
            <div class="col">
                <button class="btn btn-warning" type="submit">儲存</button>
                <a href="coupon-edit.php?coupon_id=<?=$row["coupon_id"]?>" class="btn btn-warning">取消</a>
            </div>
            <div class="col-auto">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">刪除</button>
            </div>
         </div>
        </form>
    </div>
  
</body>

</html>