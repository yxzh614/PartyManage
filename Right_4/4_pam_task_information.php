<!DOCTYPE html>
<html lang="en">
  <head>
    <head>
   <?php include("footer/footer_head.php"); ?>
  </head>
  <body class=""> 
    
 <?php include("4_footer_body_pam.php"); ?>

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">参与工作人员表</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="4_index.php">返回首页</a> / <a href="4_pam_task.php">开展工作情况表</a> / <span class="divider">参与工作人员表</span></li>
        </ul>
          <div class="container-fluid">
            <div class="row-fluid">
	  <?php include("../footer/footer_pam_task.php"); ?>
      <?php include("../footer/footer_pam_task_participator.php"); ?>
        </div>
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


