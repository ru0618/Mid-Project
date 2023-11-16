<?php
// session_start();
// include("../pet_back/dashboard_back.php");
require_once('connect.php');
$account = $_SESSION['account'];
$password = $_SESSION['password'];
$stmt = $conn->prepare("SELECT * FROM vendor WHERE account = ? AND password = ? LIMIT 1");
$stmt->bind_param("ss", $account, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


$vendorInfo = array(
    "商家編號" => $row['vendor_id'],
    "商家名稱" => $row['name'],
    "使用者帳號" => $row['account'],
    "商家地址" => $row['company_location'],
    "註冊時間" => $row['created_at'],
    "上次更新時間" => $row['updated_at']

);
?>

<!doctype html>
<html lang="en">

<head>
    <title>HTML樣式</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../vendorUsers/homepage.css" /> -->
    <style>
        .header-img {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            display: block;
            text-align: center;
        }

        .container-frame {
            border: 2px solid #ddd;
            border-radius: 20px;
            padding: 20px;
            margin-top: 30px;
            width: 70%;
        }

        .page-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .name {
            font-size: 40px;
        }

        .circle {
            width: 250px;
            height: 250px;
            border: 2px solid rgb(61, 56, 56);
            border-radius: 50%;
            position: relative;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .circle input {
            width: 20px;
            height: 30px;
        }

        .editBtn {
            width: 60px;
        }
    </style>

</head>

<body>
    <div class="container d-flex justify-content-center align-content-center">
        <div class="container-frame row">
            <h2 class="page-title col-12">歡迎廠商 <?php echo "<span class='name'>" . $vendorInfo['商家名稱'] . "</span>" ?>，登入後台管理系統</h2>
            <div class="circle">
                <!-- 路徑有變的話需更改(改成加了nav的Homepage相對於vendorLogo資料夾的位置) -->
                <img src="../vendorUsers/vendorLogo/<?php echo  $row['logo_image'] ?>" alt="vendorImage" class="header-img">
            </div>
            <div class="row mt-5 col-12 offset-2">
                <div class="col-8">
                    <table class="table">
                        <tbody>
                            <?php foreach ($vendorInfo as $key => $value) : ?>
                                <tr>
                                    <th><?php echo $key; ?></th>
                                    <td><?php echo $value; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- 路徑有變的話需更改(改成加了nav的editHomepage的位置) -->
            <a href="editHomepage.php" class="btn btn-dark editBtn m-auto">編輯</a>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script> -->
    <script>
        let editBtn = document.querySelector(".editBtn");
        editBtn.addEventListener("click", () => {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "editHomepage.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    var paginationContainer = document.body;
                    paginationContainer.innerHTML = response;
                }
            };
            xhr.send();
        })

        function onsubmit(event) {
            event.preventDefault();
            const name = document.getElementById("name").value;
            const account = document.getElementById("account").value;
            if (name == '') {
                alert("廠商名稱及使用者帳號禁止空白");
                return false;
            }
            window.form[0].submit();
        }
    </script>
</body>

</html>