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
        //$dt = new DateTime();
        //$dt->format('Y-m-d H:i:s');
        $sqlUpdateTea="UPDATE `personnelinformation` 
SET 
`nation`=".$_POST['nation'].",
`native_place`=".$_POST['native_place'].",
`SQRD_time`='".$_POST["SQRD_time"]."',
`tel`='".$_POST["tel"]."',
`politics_status`=".$_POST['politics_status'].",
`Department_ID`='".$_POST["Department_ID"]."',
`join_T_time`='".$_POST["join_T_time"]."',
`graduation_date`='".$_POST["graduation_date"]."',
`zip_code`='".$_POST["zip_code"]."',
`LJJ_time`='".$_POST["LJJ_time"]."'
 WHERE `personnelinformation`.`ID_number` = '".$_POST["ID_number"]."';";
        echo $sqlUpdateTea;
        if(mysqli_query($db,$sqlUpdateTea)){
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
                    

 <?php include("../footer/footer_pmd_applicant_tea.php"); ?>
 <?php include("../footer/footer_pmd_doc_applicant.php"); ?>

                    
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
