<?php
require_once("./db_connect.php");


if (!isset($_GET["order_id"])) {
    header("location: ./404.php");
}

$order_id = $_GET["order_id"];

if(isset($_POST["couponcode"])){
    $code=$_POST["couponcode"];
    $coupon_id=$_POST["coupon_id"];
    $pricetotal=$_POST["price"];

    // var_dump($coupon_id);
    $sql="UPDATE order_details SET coupon_id='$coupon_id' WHERE order_id='$order_id'";
    $sql1="UPDATE orders SET total_amount='$pricetotal' WHERE order_id='$order_id'";
    if ($conn->query($sql) === TRUE) {
        // header("location:order-list.php");
    } else {
        echo "修改資料表錯誤: " . $conn->error;
    }
    if ($conn->query($sql1) === TRUE) {
        // header("location:order-list.php");
    } else {
        echo "修改資料表錯誤: " . $conn->error;
    }
}

$sql = "SELECT order_details.*, products.product_name AS product_name, products.price, products.image, userinfo.name, userinfo.phone, userinfo.email, userinfo.address, orders.created_at AS created_at, coupon.discount AS discount, coupon.coupon_code AS coupon_code
FROM order_details  
JOIN products ON products.product_id = order_details.product_id
JOIN orders ON orders.order_id = order_details.order_id
JOIN userinfo ON userinfo.user_id = orders.user_id
JOIN coupon ON coupon.coupon_id = order_details.coupon_id
WHERE order_details.order_id= $order_id
";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rowone = $result->fetch_assoc();


$sqlcoupon="SELECT * FROM coupon";
$resultcoupon=$conn->query($sqlcoupon);
$rowcoupon=$resultcoupon->fetch_all(MYSQLI_ASSOC);


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
    <style>
        .edit1{
            background-color: 	#ECECFF;
            color: #000;
        }
        .edit2{
            background-color: #C4E1FF;
            color: #000;
        }
    </style>
   
    
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


        <form action="order-details.php?order_id=<?=$order_id?>" method="post">
        <table class="table table-bordered mb-5 text-center ">
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
                            if($row["discount"]<=1){
                                $price=round($total*$row["discount"]);
                                }else {
                                    $price=$total-$row["discount"];
                                    if($price<=0){
                                        $price=0;
                                    }
                                }
                            ?>
                            $<?= $subtotal ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <tr>
                    <td class="text-end fs-4" colspan="5">訂單總金額:$<?= $total ?></td>
                </tr>
                <tr>
                    <td class="text-end fs-4" colspan="5">優惠券
                        <select name="couponcode" id="coupon">
                            <?php foreach ($rowcoupon as $coupon):?>
                            <option value="<?=$coupon["coupon_code"]?>" <?php if($row["coupon_id"]==$coupon["coupon_id"]) echo "selected" ?>><?=$coupon["coupon_code"]?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                </tr>
                <input type="hidden" name="coupon_id" id="coupon_id" value="<?=$row["coupon_id"]?>">
               
                <tr>
                    <td class="text-end fs-4" colspan="5" id="sub" >
                        折扣後總金額:<?=$price?>
                    </td>
                </tr>
                <input type="hidden" name="price" id="price" value="<?=$price?>">
            </tbody>
        </table>

        <div class="my-2 text-end">
        <a href="order-update.php?order_id=<?= $row["order_id"] ?> " class="btn  shadow  bg-body-tertiary rounded edit2 mr-2">編輯訂單狀態</a>
        <button class="btn edit1" type="submit">儲存</button>
        </div>
        </form>

    </div>

    <script>
        const coupon=document.querySelector("#coupon")
        const coupon_id=document.querySelector("#coupon_id")
        
            coupon.addEventListener("change", function(){
                let newcoupon=document.getElementById("coupon").value
                

                console.log(newcoupon)

                $.ajax({
                    method: "POST",  //or GET
                    url:"/pet_back/coupon/couponapi.php",
                    dataType: "json",
                    data:{
                        id:newcoupon
                    }

                    })
                    .done(function( response ) {
                        let status=response.status;

                        if(status==1){
                        
                        let discountValue=response.coupon.discount
                        let couponid=response.coupon.coupon_id
                        coupon_id.value=couponid
                        console.log(couponid)
                        console.log(coupon_id.value)
                        console.log(discountValue)
                        if(discountValue<=1){
                        $coupontotal=<?= $total ?>*discountValue
                        $sub=Math.round($coupontotal)
                        }else{
                            $sub=<?= $total ?>-discountValue
                            if( $sub<=0){
                                $sub=0
                            }
                        }
                        sub.innerText="總金額:$"+$sub 
                        price.value=$sub
                        coupon_id.innerText=couponid
                        
                        }else{//無資料或是參數錯誤 
                            alert(status.message)

                        }

                    }).fail(function( jqXHR, textStatus ) {
                        console.log( "Request failed: " + textStatus );
                    });

            })





    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</body>

</html>