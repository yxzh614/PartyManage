<!DOCTYPE html>
<html lang="en">
  <head>
        <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");?>

  </head>
 
  <body class=""> 
    
 <?php include("1_footer_body_pmd.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">详细信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> /<a href="1_pmd_probationary_list.php">预备党员列表</a> /<span class="divider">详细信息</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmd_applicant_tea.php"); ?>
 <?php include("../footer/footer_pmd_activist.php"); ?>
 <?php include("../footer/footer_pmd_activist_train.php"); ?>
 <?php include("../footer/footer_pmd_probationary.php"); ?>


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


