<!DOCTYPE html>
<html lang="en">
<head>

<?php
session_start();
include("footer/footer_head.php");
require_once("config.php");
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"]) &&$_SESSION["right"]==0){
        if(isset($_POST["submit"])&&$_POST["submit"]) {
            $checkbox = $_POST['onetodel'];

            for ($i = 0; $i < count($checkbox); $i++) {
                $sqlToDel = "DELETE FROM `personnelinformation` WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                echo $sqlToDel;
            }
        }else{
            echo 33;
        }
        }else{
        ?>
        <script>
            alert("未登录或权限不足！");
            window.location = "../sign-in.php";
        </script>
        <?php
    }
}
else{
?>
    <script>
        window.location = "../sign-in.php";
    </script>
<?php
}
