<!DOCTYPE html>
<html lang="en">
  <head>

   <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php");
   if(isset($_COOKIE["PHPSESSID"])){
   session_id($_COOKIE["PHPSESSID"]);
   if(isset($_SESSION["right"]) &&$_SESSION["right"]==0){
   if(isset($_POST["submit"])&&$_POST["submit"]){
       $dt = new DateTime();
       $dt->format('Y-m-d H:i:s');
       $sqlAddNews="INSERT INTO `news` (`NewsId`, `NewsTitle`, `NewsContent`, `NewsDate`) VALUES (NULL, '".$_POST["title"]."', '".$_POST["content"]."', '".date('Y-m-d H:i:s')."')";
       if(mysqli_query($db,$sqlAddNews)){
       }
   }
   ?>
  </head>
  <body class=""> 
    <?php include("1_footer_body_pmd.php"); ?>

    
    <div class="content">
        
        <div class="header">
            <div class="stats">
</div>
            <h1 class="page-title">近期工作摘要</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
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
<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#publish" role="button" data-toggle="modal"><font color="#F7F8F7"><i class="icon-plus"></i>发布信息</font></a></button>
</div>

<!--点击发布的信息直接显示在通知公告栏里-->
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

<!--发布信息-->
<div class="modal small hide fade" id="publish" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">发布信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
     	<label>标题</label>
        <input type="text" name="name" id="name" value="张三" class="input-xlarge">
        <label>日期</label>
        <input type="date" name="date">
        <label>内容</label>
        <textarea name="content"></textarea>   
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">发布</button>
    </div>
    	<br/><br/><br/>
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
<?php
}else{
    ?>
    <script>
        alert("未登录或权限不足！");
        window.location = "../sign-in.php";
    </script>
    <?php
}
}
else{
    ?>
    <script>
        window.location = "../sign-in.php";
    </script>
    <?php
}

