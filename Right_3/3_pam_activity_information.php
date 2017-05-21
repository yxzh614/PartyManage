<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php"); ?>
  </head>

<body class="">   
	<?php include("3_footer_body_pam.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">活动详细信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="3_index.php">返回首页</a> / <a href="3_pam_activity.php">活动信息表</a> / <span class="divider">活动详细信息</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<?php include("../footer/footer_pam_activity_look.php");?>
<?php include("../footer/footer_pam_attend_look.php");?>
<?php include("../footer/footer_pam_unattend_look.php");?>


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


