<?php
require_once "../public/config.php";
session_start();
if(hasChookie()){
    session_id($_COOKIE["PHPSESSID"]);
}
if(hasRight(0)){
    if(isset($_POST["ID_number"])){
        $sql="INSERT INTO `personnelinformation` (ID_number,name,person_cate1,person_cate2)
 VALUES 
 ( '".$_POST['ID_number']."','".$_POST['name']."',".$_POST['person_cate1'].",5)";
        if(mysqli_query($db,$sql)){
            echo "<script>alert('添加成功！')</script>";
        }else{
            echo "<script>alert('".$sql."')</script>";
        }
    }
}
?>

