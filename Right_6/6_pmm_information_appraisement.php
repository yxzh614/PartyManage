<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../public/config.php"); ?>
  </head>
 
  <body class=""> 
    
 <?php include("6_footer_body.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">民主评议</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="6_index.php">返回首页</a> /<span class="divider">民主评议</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_appraisement_look.php"); ?>


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


