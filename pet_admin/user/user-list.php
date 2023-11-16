<?php

$page=isset($_GET["page"])?$_GET["page"]:1;
$type=isset($_GET["type"])?$_GET["type"]:1;
$kind=isset($_GET["kind"])?$_GET["kind"]:1;

require_once("./db_connect1.php");//檢查連線


$sqlTotal="SELECT user_id FROM users WHERE valid=1";
$resultTotal = $conn->query($sqlTotal);
$totalUser = $resultTotal->num_rows;

$perPage=10;
$startItem=($page-1)*$perPage;
$totalPage=ceil($totalUser/$perPage); //計算總共頁數(ceil無條件進位)

if($type==1 && $kind==1){
    $orderby="ORDER BY user_id ASC";
}elseif($type==2 && $kind==1){
    $orderby="ORDER BY user_id DESC";
}elseif($type==1 && $kind==2){
    $orderby="ORDER BY username ASC";
}elseif($type==2 && $kind==2){
    $orderby="ORDER BY username DESC";
}elseif($type==1 && $kind==3){
    $orderby="ORDER BY birthday ASC";
}elseif($type==2 && $kind==3){
    $orderby="ORDER BY birthday DESC";
}elseif($type==1 && $kind==4){
    $orderby="ORDER BY pet_number ASC";
}elseif($type==2 && $kind==4){
    $orderby="ORDER BY pet_number DESC";
}else{
    header("location:./404.php");
}

$sql="SELECT users.*,userinfo.gender AS gender,userinfo.birthday AS birthday,userinfo.pet_number AS pet_number FROM users 
JOIN userinfo ON userinfo.user_id=users.user_id
WHERE valid=1 $orderby LIMIT $startItem,$perPage";
$result=$conn->query($sql);
$user_count=$result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);


?>
<!doctype html>
<html lang="en">

<head>
  <title>user-list</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>

    </style>

</head>

<body>
    <div class="container">
        <h1 class="text-center pt-4"><i class="fa-solid fa-paw text-warning"></i>&nbsp;小貓兩三隻&nbsp;<i class="fa-solid fa-paw text-warning"></i></h1>
        <h2 class="text-center m-4">會員總表</h2>
        <div class="my-4">
            <form action="userSearch.php">
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="搜尋會員名字" name="name">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-warning" type="submit">搜尋</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-flex justify-content-end">
            <a href="create-user.php" class="btn btn-outline-warning">新增會員</a>
        </div>    
        <div class="py-2 d-flex justify-content-between align-items-center">

            <div class="d-flex">
                <form  class="me-3 ">
                    <select name="kind" id="" class="form-control " onchange="this.form.submit()">
                        <option value="1" <?php if($kind==1)echo"selected"?> >id</option>
                        <option value="2" <?php if($kind==2)echo"selected"?>>姓名</option>
                        <option value="3" <?php if($kind==3)echo"selected"?> >生日</option>
                        <option value="4" <?php if($kind==4)echo"selected"?>>寵物數量</option>
                    </select>  
                </form>
                <div class="btn-group">
                    <a href="user-list.php?page=<?=$page?>&kind=<?=$kind?>&type=1" class="btn btn-warning <?php if($type==1)echo"active";?>"><i class="fa-solid fa-arrow-down-short-wide"></i></a>
                    <a href="user-list.php?page=<?=$page?>&kind=<?=$kind?>&type=2" class="btn btn-warning <?php if($type==2)echo"active";?>"><i class="fa-solid fa-arrow-down-wide-short"></i></a>
                </div>
            </div>
            <div>
                第<?=$page?>頁，共 <?= $user_count ?> 人，會員總人數<?= $totalUser ?>人
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>id</th>
                    <th>姓名</th>
                    <th>性別</th>
                    <th>生日</th>
                    <th>email</th>
                    <th>寵物數量</th>
                    <th>註冊時間</th>
                    <th>更新時間</th>
                    <th>會員詳細資料</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($rows as $row) :?>
                    <tr>
                        <td><?= $row["user_id"] ?></td>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["gender"] ?></td>
                        <td><?= $row["birthday"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["pet_number"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                        <td class="text-center"><a href="user.php?id=<?= $row["user_id"] ?>" class="btn btn-warning ">顯示</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination ">
                <?php for($i=1;$i<=$totalPage;$i++):?>
                <li class=" page-item <?php if($i==$page)echo"active "?>"><a class="page-link text-dark  border-warning <?php if($i==$page)echo"bg-warning "?>" href="user-list.php?page=<?=$i?>&kind=<?=$kind?>&type=<?=$type?>"><?=$i?></a></li><?php endfor;?>
            </ul>
        </nav>

    </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>