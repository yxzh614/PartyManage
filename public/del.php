<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    session_start();//huihua
    require_once("config.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_id($_COOKIE["PHPSESSID"]);
        if (isset($_SESSION["right"]) && $_SESSION["right"] == 0) {
        if (isset($_POST["submit"]) && $_POST["submit"]) {
            echo $_POST['type'];
        switch ($_POST["type"]) {
            case 'del': {
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "DELETE FROM `personnelinformation` WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                    echo $sqlToDel;
                    if (mysqli_query($db, $sqlToDel)) {
                        echo "<script>alert('删除成功！');</script>";
                    }else{
                        echo $sqlToDel;
                    }
                }
            }
                break;
            case 'save_LJJ_time': {
                $checkbox = $_POST['onetodel'];
                $success = true;
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "UPDATE `personnelinformation` SET `LJJ_time`='" . $_POST["LJJ_time"] . "', person_cate2 = 4 WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";

                    if(!mysqli_query($db, $sqlToDel)) {
                        $success = false;
                    } else {
                        echo $sqlToDel;
                    }
                    if($success) {
                        echo "<script>alert('修改成功！');</script>";
                        echo "<script>window.location = '../Right_1/1_pmd_applicant_list.php';</script>";
                    }
                }
            }
                break;
                case 'save_JJPX_time': {
                    $checkbox = $_POST['onetodel'];
                    $success = true;
                    for ($i = 0; $i < count($checkbox); $i++) {
                        $sqlToDel = "UPDATE `personnelinformation` SET `JJPX_time`='" . $_POST["JJPX_time"] . "', person_cate2 = 2 WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";

                        if(!mysqli_query($db, $sqlToDel)) {
                            $success = false;
                        } else {
                            echo $sqlToDel;
                        }
                        if($success) {
                            echo "<script>alert('修改成功！');</script>";
                            echo "<script>window.location = '../Right_1/1_pmd_applicant_list.php';</script>";
                        }
                    }
                }
                    break;
                case 'save_doc_2': {
                    $sqlDelOldDate = "DELETE FROM `stage` WHERE ID_number='" . $_POST["ID_number"] . "' AND docu_type='2'";
                    mysqli_query($db, $sqlDelOldDate);
                    $sqlNewDate = "INSERT INTO `stage`(ID_number, docu_type, sub_date, remark) VALUES ('" . $_POST["ID_number"] . "','2','" . $_POST["date"] . "',NULL)";
                    if (mysqli_query($db, $sqlNewDate)) {
                            echo $sqlNewDate;
                            // echo "==插入成功==";
                            echo "<script>alert('修改成功！');</script>";
                        }else{
                            echo $sqlNewDate;
                        }
                        
                echo "<script>window.location = '../Right_1/1_pmd_applicant_list.php';</script>";
                }
                    break;
            case 'out': {
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "UPDATE `personnelinformation` SET `out_time`='" . $_POST["out_time"] . "',`gowhere`='" . $_POST["gowhere"] . "',`state`='" . $_POST["state"] . "' WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                    if (mysqli_query($db, $sqlToDel)) {
                        // echo "==插入成功==";
                        echo "<script>alert('删除成功！');</script>";
                    }else{
                        echo $sqlToDel;
                    }
                    ?><?php
                }
                echo "<script>window.location = 'Right_1/1_pmm_information.php';</script>";
            }
                break;
            case 'delAppraisement': {
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "DELETE FROM `appraisement` WHERE `appraisement_id` = '" . $checkbox[$i] . "'";
                    echo $sqlToDel;
                    if (mysqli_query($db, $sqlToDel)) {
                        // echo "==插入成功==";
                        echo "<script>alert('删除成功！');</script>";
                    }else{
                        echo $sqlToDel;
                    }
                    ?><?php
                }
                echo "<script>window.location = \"Right_1/1_pmm_information.php\";</script>";
            }
                break;
            case 'delArrears': {
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "DELETE FROM `arrears` WHERE `arrears_id` = '" . $checkbox[$i] . "'";
                    echo $sqlToDel;
                    if (mysqli_query($db, $sqlToDel)) {
                        // echo "==插入成功==";
                        echo "<script>alert('删除成功！');</script>";
                    }
                    ?><?php
                }
                echo "<script>window.location = \"Right_1/1_pmm_arrears.php\";</script>";
            }
                break;
            case 'delRorp': {
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "DELETE FROM `rorp` WHERE `reward_id` = '" . $checkbox[$i] . "'";
                    if (mysqli_query($db, $sqlToDel)) {
                        // echo "==插入成功==";
                        echo "<script>alert('删除成功！');</script>";
                    }
                    ?><?php
                }
                echo "<script>window.location = \"Right_1/1_pmm_information.php\";</script>";
            }
                break;
        case 'editTrain':{
            $sqlUpdateTrain="UPDATE train 
                    SET
                    `train_memory`='".$_POST['train_memory']."',
                    `bookname`='".$_POST['bookname']."',
                    `mark`='".$_POST['mark']."',
                    `Fschool_advise`='".$_POST['Fschool_advise']."',
                    `exam_date`='" . ($_POST["exam_date"] ? $_POST["exam_date"] : "0000-01-01") . "'
                    WHERE
                    ID='".$_POST['ID']."'";
        if (mysqli_query($db, $sqlUpdateTrain)) {
            ?>
            <script>
                alert('修改成功！');
                window.location="<?php echo $_POST['url']?>";
            </script>
        <?php
        }else{
            echo $sqlUpdateTrain;
        }
        }break;
        case 'editLetter': {
        $sqlUpdateLetter="UPDATE confirmationletter 
                    SET
                    `QS_organization`='".$_POST['QS_organization']."',
                    `QS_name`='".$_POST['QS_name']."',
                    `QS_profession`='".$_POST['QS_profession']."',
                    `QS_politics`='".$_POST['QS_politics']."',
                    `relative`='".$_POST['relative']."',
                    `FC_time`='" . ($_POST["FC_time"] ? $_POST["FC_time"] : "0000-01-01") . "',
                    `FH_time`='" . ($_POST["FH_time"] ? $_POST["FH_time"] : "0000-01-01") . "'
                    WHERE
                    ID='".$_POST['ID']."'";
        if (mysqli_query($db, $sqlUpdateLetter)) {
        ?>
            <script>
                alert('修改成功！');
                window.location="<?php echo $_POST['url']?>";
            </script>
            <?php
        }else{
            echo $sqlUpdateLetter;
        }}break;
            case 'delLetter':{
                echo 1;
                $checkbox = $_POST['onetodel'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $sqlToDel = "DELETE FROM `confirmationletter` WHERE `ID` = '" . $checkbox[$i] . "'";
                    if (mysqli_query($db, $sqlToDel)) {
                        // echo "==插入成功==";
                        echo "<script>alert('删除成功！');</script>";
                        echo "<script>window.location = \"Right_1/1_pmm_information.php\";</script>";
                    }else{
                        echo $sqlToDel;
                    }
                    ?><script>
                        window.location="<?php echo $_POST['url']?>";
                    </script><?php
                }}break;
        case 'delTrain' :{
            echo 1;
            $checkbox = $_POST['onetodel'];
        for ($i = 0; $i < count($checkbox); $i++) {
            $sqlToDel = "DELETE FROM `train` WHERE `ID` = '" . $checkbox[$i] . "'";
            if (mysqli_query($db, $sqlToDel)) {
                // echo "==插入成功==";
                echo "<script>alert('删除成功！');</script>";
            }else{
                echo $sqlToDel;
            }
            ?><script>
            window.location="<?php echo $_POST['url']?>";
        </script><?php
        }
        }break;
        case 'delYUBEI':{
            $checkbox = $_POST['onetodel'];
            for ($i = 0; $i < count($checkbox); $i++) {
                $sqlToDel = "DELETE FROM `personnelinformation` WHERE `personnelinformation`.`ID_number` = '" . $checkbox[$i] . "'";
                echo $sqlToDel;
                if (mysqli_query($db, $sqlToDel)) {
                    // echo "==插入成功==";
                    echo "<script>alert('删除成功！');</script>";
                }else{
                    echo $sqlToDel;
                }
            }
        }break;
        }

        } else {
            echo 'not submit';
        }
        } else {
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
