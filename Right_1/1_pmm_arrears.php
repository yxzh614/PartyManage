<!DOCTYPE html>
<html lang="en">
  <head>
      <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php");
      if(isset($_POST["submit"])&&$_POST["submit"]){
      $sqlAddStu = "INSERT INTO arrears (ID_number, QJ_should,QJ_reality,QJ_money, QJ_starttime, QJ_endtime, QJ_reason, hand_advise, remark) VALUES ( '"
      . $_POST['ID_number'] . "','". $_POST['QJ_should'] . "','" . $_POST['QJ_reality'] . "','" . ($_POST['QJ_should']-$_POST['QJ_reality']) . "','"
          . $_POST['QJ_starttime'] . "','" . $_POST['QJ_endtime'] . "','" . $_POST['QJ_reason'] . "','"
          . $_POST['hand_advise'] . "','" . $_POST['remark'] . "')";
      if (mysqli_query($db, $sqlAddStu)) {
      // echo "==插入成功==";
      echo "<script>alert('添加成功！')</script>";
      }
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
   <?php include("1_footer_body_pmm.php"); ?>
    
<div class="content">
        
   <div class="header">       
    	<h1 class="page-title">欠缴党费表</h1>
   </div>        
   <ul class="breadcrumb">
        <li><a href="1_index.php">返回首页</a> / <span class="divider">欠缴党费表</span></li>
   </ul>
	<div class="container-fluid">
      <div class="row-fluid">
                
<?php include("../footer/footer_pmm_arrears.php");?>
  
<?php include("../footer/footer_bottom.php");?>
     </div>
	</div>
</div>

    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


