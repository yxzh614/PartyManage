<?php
/**
 * Created by PhpStorm.
 * User: 52668
 * Date: 17/7/28
 * Time: 10:26
 */
require_once ("../public/config.php");

if(!isset($_SESSION)){ session_start(); }

if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

        if(isset($_POST["bec_officialmeet_ID"])) {
            echo $_POST['bec_officialmeet_ID'];
            echo $_POST['ZZ_publicity_time'];
            echo $_POST['bec_official_time'];
            echo $_POST['RD_datetime'];
            $sqlUpdateStu = "UPDATE personnelinformation
            SET 
            `bec_officialmeet_ID`='" . ($_POST["bec_officialmeet_ID"]) . "',
            `ZZ_publicity_time`='" . ($_POST["ZZ_publicity_time"] ? $_POST["ZZ_publicity_time"] : "0000-01-01") . "',
            `bec_official_time`='" . ($_POST["bec_official_time"]?$_POST["bec_official_time"] : "0000-01-01") . "',
            `RD_datetime`='" . ($_POST["RD_datetime"]?$_POST["RD_datetime"] : "0000-01-01") . "'
            WHERE personnelinformation.ID_number='".$_POST["ID"]."'";
            if (mysqli_query($db, $sqlUpdateStu)) {
                echo 'success';
            }
        }else{
            echo 'no post';
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

?>

