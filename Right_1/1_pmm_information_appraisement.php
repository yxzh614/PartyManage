<!DOCTYPE html>
<html lang="en">
  <head>
         <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php");
      if(isset($_POST["submit"])&&$_POST["submit"]){
      $sqlAddStu = "INSERT INTO `appraisement` (ID_number,PY_time,PY_result,remark) VALUES ( '"
      . $_GET['stuId'] . "','". $_POST['PY_time'] . "','" . $_POST['PY_result'] . "','" . $_POST['remark'] . "')";
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
            
            <h1 class="page-title">民主评议</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> /<a href="1_pmm_information.php">党员信息表</a> /<span class="divider">民主评议</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_appraisement.php"); ?>


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


