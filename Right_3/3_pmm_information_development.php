<!DOCTYPE html>
<html lang="en">
  <head>
     <?php include("footer/footer_head.php"); ?>
  </head>
 
  <body class=""> 
    
 <?php include("3_footer_body_pmm.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">发展情况</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="3_index.php">返回首页</a> /<a href="3_pmm_information.php">党员信息表</a> /<span class="divider">发展情况</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_development.php"); ?>


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


