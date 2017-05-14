<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    session_start();//huihua
    include("footer/footer_head.php");
    require_once("config.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_id($_COOKIE["PHPSESSID"]);
        if(isset($_SESSION["right"]) &&$_SESSION["right"]==0){
            if(isset($_POST["submit"])&&$_POST["submit"]) {

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
