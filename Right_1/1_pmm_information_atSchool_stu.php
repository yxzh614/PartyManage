<!DOCTYPE html>
<html lang="en">
  <head>
        <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");
      if(isset($_POST["submit"])&&$_POST["submit"]){
      $sqlUpdateTea="
      UPDATE `personnelinformation`
      SET
      `ranking`='".$_POST['ranking']."',
      `all_funkobject_amount`='".$_POST['all_funkobject_amount']."',
      `TC_and_BZ`='".$_POST['TC_and_BZ']."',
      `language`='".$_POST['language_name']."',
      `reward_condtion`='".$_POST['reward_condtion']."',
      `YorNwrong`='".$_POST['YorNwrong']."'

      WHERE `personnelinformation`.`ID_number` = '".$_GET["stuId"]."'";
      if(mysqli_query($db,$sqlUpdateTea)){
      // echo "==插入成功==";
      echo "<script>alert('修改成功！')</script>";
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
    
 <?php include("1_footer_body_pmm.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">在校情况</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> /<a href="1_pmm_information.php">党员信息表</a> /<span class="divider">在校情况</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_atSchool_stu.php"); ?>


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


