<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    session_start();//huihua
    include("footer/footer_head.php");
    require_once("config.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_id($_COOKIE["PHPSESSID"]);
        if (isset($_SESSION["right"]) && $_SESSION["right"] == 0){
            if (isset($_POST["submit"]) && $_POST["submit"]) {
                switch ($_POST["type"]) {
                    case 'del': {
                    $checkbox = $_POST['onetodel'];
                    for ($i = 0; $i < count($checkbox); $i++) {
                        $sqlToDel = "DELETE FROM `personnelinformation` WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                        echo $sqlToDel;
                        mysqli_query($db,$sqlToDel);
                    }
                }break;
                    case 'save_LJJ_time': {
                    $checkbox = $_POST['onetodel'];
                    for ($i = 0; $i < count($checkbox); $i++) {
                        $sqlSaveLJJTime = "UPDATE `personnelinformation` SET `LJJ_time`='" . $_POST["LJJ_time"] . "' WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                        echo $sqlSaveLJJTime;
                        mysqli_query($db,$sqlSaveLJJTime);
                    }
                }break;
                    case 'out': {
                $checkbox = $_POST['onetodel'];
            for ($i = 0;
                 $i < count($checkbox);
                 $i++) {
                $sqlToDel = "UPDATE `personnelinformation` SET `out_time`='" . $_POST["out_time"] . "',`gowhere`='" . $_POST["gowhere"] . "',`state`='" . $_POST["state"] . "' WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                if (mysqli_query($db, $sqlToDel)) {
                    // echo "==插入成功==";
                    echo "<script>alert('调出成功！');window.location = \"Right_1/1_pmm_outside.php\";</script>";
                }
                ?>
                <script>
                    //alert("数据不能为空！");
                    //window.location = "1_DRM_stu_list.php";
                </script>
            <?php
            }
            }break;
                    case 'save_JJPX_time': {
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "UPDATE `personnelinformation` SET `LJJ_time`='" . $_POST["JJPX_time"] . "',`LJJ_time`='" . $_POST["JJPX_time"] . "' WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
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
    }else{
    ?>
    <script>
        window.location = "../sign-in.php";
    </script>
<?php
}
