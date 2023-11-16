<?php

if(!isset($_GET["id"])){
    // die("資料不存在");
    header("location: /404.php");
}

require_once("./db_connect1.php"); //檢查連線

$id = $_GET["id"];

$sql = "SELECT userinfo.*,memberlevels.level_name AS level_name FROM userinfo JOIN memberlevels ON userinfo.level_id=memberlevels.level_id WHERE user_id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>
<!doctype html>
<html lang="en">

<head>
    <title>user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .object-fit-cover{
            border-radius: 50%;
            width: 300px;
            height: 300px;
            object-fit: cover;
            background: white;
        }

        .main{
            height: 80vh;
        }
/* 
        body{
            background: url(images/bg2.jpg) center center/cover ;
            background-repeat: no-repeat;
            height: 100vh;
        } */
    </style>

</head>

<body>
    <div class="container ">
        <div class="py-4 ps-5">
            <a class="btn btn-outline-warning" href="user-list.php">回會員總表</a>
        </div>
        
        <div class="row align-items-center justify-content-center main">
            <div class="col-12 col-lg-4 text-center mb-3">
                <h1 class="mb-5 text-center"><?=$row["name"]?>詳細資料</h1>
                <img src="images/<?=$row["cover_photo"]?>" alt="" class="object-fit-cover " >
                
            </div>
            <div class="col-12 col-lg-6">
            <table class="table table-bordered ">

                <tr>
                    <th>姓名</th>
                    <td><?= $row["name"] ?></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td><?= $row["gender"] ?></td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td><?= $row["phone"] ?></td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><?= $row["address"] ?></td>
                </tr>
                <tr>
                    <th>生日</th>
                    <td><?= $row["birthday"] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $row["email"] ?></td>
                </tr>
                <tr>
                    <th>會員等級</th>
                    <td><?= $row["level_name"] ?></td>
                </tr>
                <tr>
                    <th>寵物數量</th>
                    <td><?= $row["pet_number"] ?></td>
                </tr>
                <tr>
                    <th>註冊時間</th>
                    <td><?= $row["created_at"] ?></td>
                </tr>
                <tr>
                    <th>更新時間</th>
                    <td><?= $row["updated_at"] ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><a class="btn btn-warning" href="user-edit.php?id=<?= $row["user_id"] ?>">編輯</a></td>
                </tr>
            </table>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>