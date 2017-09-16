<!DOCTYPE html>
<html lang="en">
<?php
require "../footer/footer_head.php";
require_once "../public/config.php";
session_start();
if(hasChookie()){
    session_id($_COOKIE["PHPSESSID"]);
}
if(hasRight(0)){
?>
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
}
