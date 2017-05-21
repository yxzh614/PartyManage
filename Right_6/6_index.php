<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php"); ?>
  </head>
  <body class=""> 
    <?php include("6_footer_body.php"); ?>

    
    <div class="content">
        
        <div class="header">
            <div class="stats">
</div>
            <h1 class="page-title">近期工作摘要</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="6_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>
<div class="copyrights"><a href="http://218.25.35.28/"  title="沈阳理工大学官网">沈阳理工大学官网</a></div>
        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
       <font color="#DDE1DD"><strong>欢迎来到:</strong>沈阳理工大学信息科学与工程学院党务工作信息系统</font></div>
    </div>
</div>

<div class="block">
             <p class="block-heading">通知公告栏</p>
                <div class="block-body">
                <table width="996">
 					 <tbody>
   						<tr>
      						<td width="738"><a href="#">What if I have a question?</a></td>
     						<td width="242">2014/12/03</td>
    					</tr>
                        <tr>
                        	<td><a href="#">Where can I get support?</a></td>
                            <td>2014/12/03</td>
                        </tr>
                        <tr>
                        	<td><a href="#">How long does it take to fix a problem?</a></td>
                            <td>2014/12/03</td>
                        </tr>
                        <tr>
                        	<td><a href="#">Who can help me out?</a></td>
                            <td>2014/12/03</td>
                        </tr>
                        <tr>
                        	<td><a href="#">Where are you located?</a></td>
                            <td>2014/12/03</td>
                        </tr>
  					</tbody>
				</table>

                   
                </div>
</div>
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


