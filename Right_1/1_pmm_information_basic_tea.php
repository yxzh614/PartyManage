<!DOCTYPE html>
<html lang="en">
  <head>
        <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php");
      if(isset($_POST["submit"])&&$_POST["submit"]){
      $sqlUpdateTea="
      UPDATE `personnelinformation`
      SET
      `name`='".$_POST['name']."', /*姓名*/
`sex`='".$_POST["sex"]."', /*性别*/
`nation`='".$_POST["nation"]."',/*民族*/
`strong_point`='".$_POST["strong_point"]."',/*特长*/
`tel`='".$_POST["tel"]."',/*电话*/
`politics_status`='".$_POST['politics_status']."',/*政治面貌*/
`zip_code`='".$_POST["zip_code"]."',/*邮编*/
`Datetime`='".$_POST["datetime"]."-01"."',/*生日*/
`graduation_date`='".$_POST["graduation_date"]."-01"."'/*毕业日期*/

      WHERE `personnelinformation`.`ID_number` = '".$_POST["ID_number"]."'";
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
            
            <h1 class="page-title">基本信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> /<a href="1_pmm_information.php">党员信息表</a> /<span class="divider">基本信息</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_basic_tea.php"); ?>


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


