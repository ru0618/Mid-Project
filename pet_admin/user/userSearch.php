<?php
if (!empty($_GET["name"])){
    $name=$_GET["name"];


    require_once("./db_connect1.php"); //檢查連線

    $sql="SELECT * FROM users WHERE username LIKE '%$name%' AND valid=1";
    $result = $conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);

    $user_count = $result->num_rows;

}else{
    $user_count=0;  
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>user-search</title>
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
            <a href="user-list.php" class="btn btn-warning">回會員總表</a>
        </div>
        <div class="py-2">
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

        <div class="py-2 d-flex justify-content-between align-items-center">
            <?php if(!empty($_GET["name"])):?>
            <div>
                搜尋<?=$name?>的結果，共有 <?= $user_count ?> 筆符合的資料
            </div>
            <?php endif;?>
        </div>
        <?php if($user_count!=0):?>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>id</th>
                    <th>姓名</th>
                    <th>email</th>
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
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                        <td class="text-center"><a href="user.php?id=<?= $row["user_id"] ?>" class="btn btn-warning ">顯示</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif?>

    </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>