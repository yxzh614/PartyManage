<!DOCTYPE html>
<html lang="en">
  <head>
      <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");?>

  </head>

 
  <body class=""> 
   <?php include("1_footer_body_pam.php"); ?>
    
<div class="content">
        
   <div class="header">       
    	<h1 class="page-title">组织机构奖惩表</h1>
   </div>        
   <ul class="breadcrumb">
        <li><a href="1_index.php">返回首页</a> / <a href="1_pam_organization.php">组织机构信息表</a> /<span class="divider">组织机构奖惩表</span></li>
   </ul>
	<div class="container-fluid">
      <div class="row-fluid">
             
                
<?php include("../footer/footer_rorp.php");?>
  
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


