<?php
/**
 * Created by PhpStorm.
 * User: 52668
 * Date: 17/7/28
 * Time: 10:26
 */
require_once ("../config.php");

if(!isset($_SESSION)){ session_start(); }

if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

        if(isset($_POST["ZQ_positivemeet_ID"])) {
            echo $_POST['ZQ_positivemeet_ID'];
            echo $_POST['Tmember_meet_time'];
            echo $_POST['JJPX_time'];
            echo $_POST['JJPX_mark'];
            $sqlUpdateStu = "UPDATE personnelinformation
            SET 
            `Tmember_meet_time`='" . ($_POST["Tmember_meet_time"] ? $_POST["Tmember_meet_time"] : "0000-01-01") . "',
            `JJPX_time`='" . ($_POST["JJPX_time"] ? $_POST["JJPX_time"] : "0000-01-01") . "',
            `JJPX_mark`='" . $_POST["JJPX_mark"] . "',
            `ZQ_positivemeet_ID`='" . $_POST["ZQ_positivemeet_ID"] . "'
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

