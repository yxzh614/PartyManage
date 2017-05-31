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
                switch ($_POST["type"]) {
                    case 'del':{
                        $checkbox = $_POST['onetodel'];
                        for ($i = 0; $i < count($checkbox); $i++) {
                            $sqlToDel = "DELETE FROM `personnelinformation` WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                            echo $sqlToDel;
                        }
                    }break;
                    case 'save_LJJ_time':{
                        $checkbox = $_POST['onetodel'];
                        for ($i = 0; $i < count($checkbox); $i++) {
                            $sqlToDel = "UPDATE `personnelinformation` SET `LJJ_time`='" . $_POST["LJJ_time"] . "' WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                            echo $sqlToDel;
                        }
                    }break;
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