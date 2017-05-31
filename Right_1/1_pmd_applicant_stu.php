<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../footer/footer_head.php");
    require_once ("../config.php");
    session_start();
    if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

    if(isset($_POST["submit"])&&$_POST["submit"]){
        $sqlUpdateStu="
UPDATE `personnelinformation` ,`excellentyouth`,`activist`
SET 
`name`='".$_POST['name']."', /*姓名*/
`SQRD_time`='".($_POST["SQRD_time"]?$_POST["SQRD_time"]:"0000-01-01")."', /*申请入党时间*/
`sex`='".$_POST["sex"]."', /*性别*/
`floor_number`='".$_POST["floor_number"]."', /*楼号*/
`dormitory_number`='".$_POST["dormitory_number"]."', /*寝室号*/
`bed_number`='".$_POST["bed_number"]."', /*床号*/
`all_funkobject_amount`='".$_POST["all_funkobject_amount"]."', /*全学程挂科数*/
`LJJ_time`='".($_POST["LJJ_time"]?$_POST["LJJ_time"]:"0000-01-01")."',/*列积极分子时间*/
/*`native_place`='".$_POST['native_name']."',*//*籍贯*/
`nation`='".$_POST["nation"]."',/*民族*/
`Department_ID`='".$_POST["Department_ID"]."',/*所属组织*/
`state`='".$_POST["state"]."',/*状态*/
`edu`='".$_POST["edu"]."',/*学历*/
`strong_point`='".$_POST["strong_point"]."',/*特长*/
`tel`='".$_POST["tel"]."',/*电话*/
`reward_condtion`='".$_POST["reward_condtion"]."',/*获奖情况*/
`YorNwrong`='".$_POST["YorNwrong"]."',/*处分情况*/
`remark`='".$_POST["remark"]."',/*备注*/
`TC_and_BZ`='".$_POST["TC_and_BZ"]."',/*备注*/
`major`='".$_POST["major"]."',/*专业*/
`ranking`='".$_POST["ranking"]."',/*排名*/
`politics_status`='".$_POST['politics_status']."',/*政治面貌*/
`zip_code`='".$_POST["zip_code"]."',/*邮编*/

`activist`.`GZRX_date`='".($_POST["GZRX_date"]?$_POST["GZRX_date"]:"0000-01-01")."',/*高中入学日期*/
`activist`.`GZBY_date`='".($_POST["GZBY_date"]?$_POST["GZBY_date"]:"0000-01-01")."',/*高中入学日期*/

`excellentyouth`.`join_T_time`='".$_POST["join_T_time"]."'/*入团时间*/

 WHERE `personnelinformation`.`ID_number` = '".$_POST["ID_number"]."' 
 AND `excellentyouth`.`ID_number`= '".$_POST["ID_number"]."'
 ";
        echo $sqlUpdateStu;
        if(mysqli_query($db,$sqlUpdateStu)){
            // echo "==插入成功==";
            echo "<script>alert('添加成功！')</script>";
        }
        //echo $sqlAddStu;
        ?>
        <script>
            //alert("数据不能为空！");
            //window.location = "1_DRM_stu_list.php";
        </script>
        <?php
    }
    ?>
</head>
  <body class="">
 <?php include("../Right_1/1_footer_body_pmd.php"); ?>
    <div class="content">
        <div class="header">
            <h1 class="page-title">详细信息</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="../Right_1/1_index.php">返回首页</a> /<a href="../Right_1/1_pmd_applicant_list.php">申请入党人员信息</a> /<span class="divider">详细信息</span></li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include("../footer/footer_pmd_applicant_stu.php"); ?>
                <?php include("../footer/footer_pmd_doc_applicant.php"); ?>
                <?php include("../footer/footer_bottom.php"); ?>
            </div>
        </div>
    </div>

<!--导航动态下拉框-->
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>
<?php
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


