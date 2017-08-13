<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../public/config.php"); ?>
  </head>

<body class="">   
	<?php include("5_footer_body_pam.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">开展工作情况表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="5_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
	<div class="btn-toolbar">
    <button class="btn">导出</button> 
</div>
 <!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据工作ID查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>工作主题</th>
          <th>日期时间</th>
          <th>完成情况</th>
          <th>承担部门</th>
          <th>详细信息</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>工作主题</td>
          <td>2012.03.04</td>
          <td>完成情况</td>
          <td>承担部门</td>
          <td><a href="5_pam_task_information.php">详细信息</a></td>
        </tr>
     
      </tbody>
    </table>
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


