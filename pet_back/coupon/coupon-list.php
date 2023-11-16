<?php

$page=$_GET["page"] ?? 1;

$type=$_GET["type"] ?? 1;

$category=$_GET["category"] ?? "all";



require_once("./db_connect1.php");



if(isset($_GET["start"])||isset($_GET["end"])){
    $start=$_GET["start"];
    $end=$_GET["end"];
    if($start=="")$start="2023-01-01";
    if($end=="")$end="2023-12-31";
    $date="AND start_date BETWEEN '$start'AND'$end' AND end_date NOT BETWEEN '$start'AND'$end'";
}else{
    $date="";
}


if($category=="all"){
    $coupontype="";
}elseif($category=="off"){
    $coupontype="discount_type='off' AND";
}elseif($category=="minus"){
    $coupontype="discount_type='minus' AND";
}


$sqlTotal = "SELECT coupon_id FROM coupon WHERE $coupontype valid=1 $date";
$resultTotal=$conn->query($sqlTotal);
$totalCoupon=$resultTotal->num_rows;


$perPage=10;
$startItem=($page - 1)*$perPage;
$totalPage=ceil($totalCoupon/$perPage);


if($type==1){
    $orderBy=" ORDER BY coupon_id ASC";
}elseif($type==2){
    $orderBy="ORDER BY coupon_id DESC";   
}else{
    header("location:../404.php");
}

$sql = "SELECT * FROM coupon WHERE $coupontype valid=1 $date $orderBy LIMIT $startItem,$perPage";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);




?>




<!doctype html>
<html lang="en">

<head>
  <title>Coupon list</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-3"><i class="fa-solid fa-paw"></i>&nbsp;優惠券總表&nbsp;<i class="fa-solid fa-paw"></i></h1>



        <ul class="nav nav-underline mb-3">
                <li class="nav-item">
                    <a class="nav-link <?php if ($category=="all") echo "active"
                    ?>" aria-current="page" href="coupon-list.php?category=all">全部</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php
                    if ($category=="off") echo "active"
                    ?>" href="coupon-list.php?category=off">off</a>
                </li>
                <li class="nav-item">
                <a class="nav-link  <?php
                    if ($category=="minus") echo "active"
                    ?>" href="coupon-list.php?category=minus">minus</a>
                </li>
            </ul>


        <div class="py-2">
            <label for="" class="form-label">請選擇要搜尋的區間</label>
                <form action="coupon-list.php?category=<?=$category?>&start=<?php if(isset($_GET["start"])) echo $_GET["start"]?>&end=<?php if(isset($_GET["end"])) echo $_GET["end"]?>">
                <input type="hidden" name="category" value=<?=$category?>>
                    <div class="row align-items-center gx-2">
                    <div class="col-auto">
                            <input type="date" class="form-control"name="start" value="<?php if(isset($_GET["start"])) echo $_GET["start"]?>">
                        </div>
                        <div class="col-auto">
                            to
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control"name="end" value="<?php if(isset($_GET["end"])) echo $_GET["end"]?>">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-info" type="submit">搜尋</button>
                        </div>
                    </div>
                </form>
        </div>

        <?php
        $user_count=$result->num_rows;
        ?>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <a class="btn btn-success" href="create-coupon.php">新增</a>
        </div>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <div>
                共 <?=$totalCoupon?> 筆 ,第<?=$page?>頁
            </div>    
            <div class="btn-group">
                <a href="coupon-list.php?page=<?=$page?>&type=1&category=<?=$category?><?php if(isset($_GET["start"])) echo "&start=$start"?><?php if(isset($_GET["end"])) echo"&end=$end"?>"class="btn btn-outline-secondary <?php if($type==1)echo "active";?>">編號<i class="fa-solid fa-arrow-down-short-wide"></i></a>
                <a href="coupon-list.php?page=<?=$page?>&type=2&category=<?=$category?><?php if(isset($_GET["start"])) echo "&start=$start"?><?php if(isset($_GET["end"])) echo"&end=$end"?>" class="btn btn-outline-secondary <?php if($type==2)echo "active";?>">編號<i class="fa-solid fa-arrow-down-wide-short"></i></a>
            </div>
        </div>


        <table class="table table-bordered mt-2">
           
            <thead>
                <tr>
                    <th>編號</th>
                    <th>優惠券code</th>
                    <th>優惠券折扣數</th>
                    <th>起始日期</th>
                    <th>結束日期</th>
                    <th>優惠券類型</th>
                    <th>顯示詳細內容</th>
                </tr>
            </thead>
            <?php foreach ($rows as $row):?>
            <tbody>
                <tr>
                    <td><?=$row["coupon_id"]?></td>
                    <td><?=$row["coupon_code"]?></td>
                    <td><?=$row["discount"]?></td>
                    <td><?=$row["start_date"]?></td>
                    <td><?=$row["end_date"]?></td>
                    <td><?=$row["discount_type"]?></td>
                    <td><a href="coupon.php?coupon_id=<?=$row["coupon_id"]?>" class="btn btn-warning">顯示</a></td>
                </tr>
            </tbody>
            <?php endforeach;?>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for($i=1;$i<=$totalPage;$i++): ?>
                <li class="page-item <?php if($i==$page) echo "active";?>"><a class="page-link border-warning <?php if($i==$page) echo "bg-warning"?> text-dark" href="coupon-list.php?page=<?=$i?>&type=<?=$type?>&category=<?=$category?><?php if(isset($_GET["start"])) echo "&start=$start"?><?php if(isset($_GET["end"])) echo"&end=$end"?>"><?=$i?></a></li>
                <?php endfor;?>
            </ul>
        </nav>












    </div>










  
</body>

</html>