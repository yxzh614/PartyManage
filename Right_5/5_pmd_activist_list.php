<!DOCTYPE html>
<html lang="en">
  <head>
     <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php"); ?>
  </head>

<body class="">   
	<?php include("5_footer_body_pmd.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">积极分子人员信息</h1>
        </div>
        
          <ul class="breadcrumb">
            <li><a href="5_index.php">返回首页</a> / <span class="divider">积极分子人员信息</span></li>                       
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
    <table width="66%" height="82"  class="table">
      <thead>
        <tr>
          <th width="138">姓名</th>
          <th width="154">人员类别</th>
          <th width="132">详细信息</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>张三</td>
          <td>本科生</td>
          <td><a href="5_pmd_activist_stu.php">详细信息</a></td>
        </tr>
        <tr>
          <td>李四</td>
          <td>教师</td>
          <td><a href="5_pmd_activist_tea.php">详细信息</a></td>
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


