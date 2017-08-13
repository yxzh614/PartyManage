<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../public/config.php"); ?>
  </head>

<body class="">   
	<?php include("4_footer_body_pmd.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">预备党员转正表</h1>
        </div>
        
          <ul class="breadcrumb">
            <li><a href="4_index.php">返回首页</a> / <span class="divider">预备党员转正表</span></li>                       
         </ul>

	  <div class="container-fluid">
            <div class="row-fluid">
                    <div class="btn-toolbar">
    <button class="btn">导出</button>
</div>
<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>        
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>姓名</th>
          <th>人员类别</th>
          <th>预备党员转正公示表</th>
          <th>详细信息</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>张三</td>
          <td>本科生</td>
          <td><a href="4_pmd_regular_probationary.php">预备党员转正公示表</a></td>
          <td><a href="4_pmd_regular_stu.php">详细信息</a></td>
        </tr>
        <tr>
          <td>李四</td>
          <td>教师</td>
          <td><a href="4_pmd_regular_probationary.php">预备党员转正公示表</a></td>
          <td><a href="4_pmd_regular_tea.php">详细信息</a></td>
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


