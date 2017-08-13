<?php
/**
 * Created by PhpStorm.
 * User: 52668
 * Date: 17/7/28
 * Time: 12:03
 */
require_once ("../public/config.php");

if(!isset($_SESSION)){ session_start(); }

if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

        if(isset($_POST["name"])&&$_POST["name"]) {
            $sqlUpdateTea=" 
UPDATE `personnelinformation` 
SET 
`name`='".$_POST['name']."',                                                    /*姓名*/
`SQRD_time`='".($_POST["SQRD_time"]?$_POST["SQRD_time"]:"2000-01-01")."',       /*申请入党时间*/
`sex`='".$_POST["sex"]."',                                                      /*性别*/
`LJJ_time`='".($_POST["LJJ_time"]?$_POST["LJJ_time"]:"2000-01-01")."',          /*列积极分子时间*/
`nation`='".$_POST["nation"]."',                                                /*民族*/
`Department_ID`='".$_POST["Department_ID"]."',                                  /*所属组织*/
`state`='".$_POST["state"]."',                                                  /*状态*/
`edu`='".$_POST["edu"]."',                                                      /*学历*/
`strong_point`='".$_POST["strong_point"]."',                                    /*特长*/
`tel`='".$_POST["tel"]."',                                                      /*电话*/
`reward_condtion`='".$_POST["reward_condtion"]."',                              /*获奖情况*/
`YorNwrong`='".$_POST["YorNwrong"]."',                                          /*处分情况*/
`remark`='".$_POST["remark"]."',                                                /*备注*/
`TC_and_BZ`='".$_POST["TC_and_BZ"]."',                                          /*备注*/
`politics_status`='".$_POST['politics_status']."',                              /*政治面貌*/
`zip_code`='".$_POST["zip_code"]."',                                            /*邮编*/
`native_place`='".$_POST["native_place"]."'                                     /*籍贯*/
 WHERE `personnelinformation`.`ID_number` = '".$_POST["ID_number"]."'";
            if(mysqli_query($db,$sqlUpdateTea)){
                jsAlert("yes");
            }
        }else{
            jsAlert("no");
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
