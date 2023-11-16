<?php include("db_connect.php")?>

<?php 
$id = $_POST["subcategory_id"];

$subcategory = $_POST["subcategory"];
$category = $_POST["maincategory"];
$valid = $_POST["valid"];


$sql ="UPDATE subcategory AS s
JOIN category AS c
ON s.category_id = c.category_id
SET s.subcategory_name = '$subcategory',s.category_id = '$category', s.valid ='$valid'
WHERE s.subcategory_id = $id";

$resultEdit = $conn->query($sql);


echo $resultEdit;

if($conn->query($sql) === TRUE){
    echo "修改成功"; 
    header("location:category.php");
}else{
    echo "修改資料錯誤" .$conn->error;
}
?>