<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("footer/footer_head.php"); ?>
  </head>

  
  <body class=""> 
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="Right_1/1_index.php"><span class="first">信息科学与工程学院</span> <span class="second">党务工作信息系统</span></a>
        </div>
    </div>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">重置密码</p>
            <div class="block-body">
                <form>
                    <label>原始密码：</label>
                    <input type="text" name="oldPassword" id="oldPassword" class="span12"></input>
                     <label>新密码：</label>
                    <input type="text" name="newPassword" id="newPassword" class="span12"></input>
                    <a href="#" class="btn btn-primary pull-right">Send</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <a href="sign-in.php">Sign in to your account</a>
    </div>
</div>

    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


