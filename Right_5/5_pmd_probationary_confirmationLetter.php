<!DOCTYPE html>
<html lang="en">
  <head>
     <style type="text/css">
     .brand1 {font-family: georgia, serif; }
     </style>
     <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../public/config.php"); ?>
  </head>
 	
  <body class="">
   <?php include("5_footer_body_pmd.php"); ?>
  <div class="content">
        
      <div class="header">
            
            <h1 class="page-title">函调证明材料</h1>
    </div>
        
                <ul class="breadcrumb">
            <li><a href="5_index.php">返回首页</a> / <a href="5_pmd_probationary_list.php">预备党员列表</a> / <span class="divider">群众座谈记录</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
   <?php include("../footer/footer_pmd_probationary_confirmationLetter_look.php"); ?>

 <?php include("../footer/footer_bottom.php"); ?>
                    
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


