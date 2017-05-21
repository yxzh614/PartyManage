<!DOCTYPE html>
<html lang="en">
  <head>
     <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php"); ?>
  </head>
 
  <body class=""> 
    
 <?php include("4_footer_body_pmm.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">在校情况</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="4_index.php">返回首页</a> /<a href="4_pmm_information.php">党员信息表</a> /<span class="divider">在校情况</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_atSchool_stu_look.php"); ?>


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


