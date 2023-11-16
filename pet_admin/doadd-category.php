<?php include("db_connect.php")?>
<?php

if(!isset($_POST["subcategory"])){
    die("請依正常管道進入");
}

$subcategory = $_POST["subcategory"];
$maincategory = $_POST["maincategory"];

$sql = "INSERT INTO subcategory (subcategory_name, category_id, valid) VALUES ('$subcategory', '$maincategory',1)";
echo $sql;


if($conn->query($sql) === TRUE){

    $latestID = $conn->insert_id;
    echo "類別資料新增完成，最新資料id為 $latestID";
    header("location: category.php");

}else{
    echo "新增資料錯誤："   .$conn->error;
}

$conn->close();
