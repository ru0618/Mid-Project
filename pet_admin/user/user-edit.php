<?php

if (!isset($_GET["id"])) {
    header("location:./404.php");
}

$id = $_GET["id"];
$now=date('Y-m-d H:i:s');
require_once("./db_connect1.php"); //檢查連線
$sql = "SELECT*FROM userinfo WHERE user_id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!doctype html>
<html lang="en">

<head>
  <title>user-edit</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .object-fit-cover{
            border-radius: 50%;
            background-color: white;
            width: 250px;
            height: 250px;
            object-fit: cover;
            overflow: hidden;
        }
    </style>

</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">警示訊息</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    確認永久刪除會員資料?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a href="doUserDelete.php?id=<?=$id?>" class="btn btn-danger">確認</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="py-4">
            <a class="btn btn-warning" href="user-list.php">回會員總表</a>
        </div>
        <form action="doUserUpdate.php" method="post" class="" enctype="multipart/form-data">
        
            <h1 class="mb-3 text-center"><?=$row["name"]?>詳細資料</h1>
            <table class="table table-bordered">
                <input type="hidden" name=id value=<?= $row["user_id"] ?>>
                <tr>
                    <th>會員頭貼</th>
                    <td>
                        <img src="images/<?=$row["cover_photo"]?>" alt="" class="object-fit-cover mb-3 ms-3" id="img">
                        <input type="file" name="file" class="form-control" id="imginput" required>
                    </td>
                </tr>


                <tr>
                    <th>姓名</th>
                    <td>
                        <input type="text" class="form-control" value=<?= $row["name"] ?> name="name" id="">
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <select name="gender" id="" class="form-select">
                            <option value="男" <?php if($row["gender"]=="男")echo "selected"?>>男</option>
                            <option value="女"<?php if($row["gender"]=="女")echo "selected"?>>女</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td>
                        <input type="tel" class="form-control" value=<?= $row["phone"] ?> name="phone" id="">
                    </td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td>
                        <input type="text" class="form-control" value=<?= $row["address"] ?> name="address" id="">
                    </td>
                </tr>
                <tr>
                    <th>生日</th>
                    <td>
                        <input type="date" class="form-control" value=<?= $row["birthday"] ?> name="birthday" id="">
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="email" class="form-control" value=<?= $row["email"] ?> name="email" id="">
                    </td>
                </tr>
                <tr>
                    <th>會員等級</th>
                    <td>
                        <select name="level_id" id="" class="form-control">
                            <option value="1" <?php if($row["level_id"]=="1")echo "selected"?> >Level 1</option>
                            <option value="2" <?php if($row["level_id"]=="2")echo "selected"?> >Level 2</option>
                            <option value="3" <?php if($row["level_id"]=="3")echo "selected"?> >Level 3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>寵物數量</th>
                    <td>
                        <input type="number" class="form-control" value=<?= $row["pet_number"] ?> name="pet_number" id="">
                    </td>
                </tr>
                <tr>
                    <th>註冊時間</th>
                    <td><?= $row["created_at"] ?></td>
                </tr>
                
            </table>

            <div class="py-2 d-flex justify-content-between">
                <div>
                    <button class="btn btn-warning" type="submit">儲存</button>
                    <a href="user.php?id=<?= $row["user_id"] ?>" class="btn btn-warning">取消</a>
                </div>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">刪除</button>
            </div>
        </form>

    </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script
			  src="https://code.jquery.com/jquery-3.7.0.min.js"
			  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
			  crossorigin="anonymous">
</script>

    <script>
        $("#imginput").change(function(){

        readURL(this);

        });

        function readURL(input){

        if(input.files && input.files[0]){

        var reader = new FileReader();

        reader.onload = function (e) {

        $("#img").attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);

        }}
    </script>
</body>

</html>