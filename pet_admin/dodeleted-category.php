<?php include("db_connect.php")?>
<?php
// if(!isset($_GET["dodeleted"])){
//     die("請依正常管道進入");
// }



if(isset($_POST["delete"])){
    $subcategory_id = $_POST["subcategory"];
    $sql = "DELETE FROM subcategory WHERE subcategory_id = '$subcategory_id'";
    $resultDelete = $conn->query($sql);

    echo $resultDelete;
    echo "刪除成功";
    header("location: category.php");
}else{
    echo "資料刪除失敗" .$conn->error;
}

// $id = $_POST["deleted"];

// $sql = "DELETE FROM subcategory WHERE subcategory_id = $id";
// $resultDelete = $conn->query($sql);
// if($resultDelete){
//     echo "資料刪除成功";
// }else{
//     echo "資料刪除失敗" .$conn->error;
// }
