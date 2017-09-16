<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../public/config.php"); ?>
  </head>

 
  <body class=""> 
   <?php include("3_footer_body_pam.php"); ?>
    
<div class="content">
        
   <div class="header">       
    	<h1 class="page-title">组织机构信息表</h1>
   </div>        
   <ul class="breadcrumb">
        <li><a href="3_index.php">返回首页</a> / <span class="divider">组织机构信息表</span></li>
   </ul>
	<div class="container-fluid">
      <div class="row-fluid">
           
         <div class="btn-toolbar">
    <button class="btn">导出</button>
</div>
<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据组织机构ID查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>上级组织机构</th>
          <th>名称</th>
          <th>简称</th>
          <th>状态</th>
          <th>生效日期</th>
          <th>失效日期</th>
          <th>职务表</th>
          <th>奖惩情况</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>信息科学与工程学院党委</td>
          <td>信息科学与工程学院党支部</td>
          <td>信息党委</td>
          <td>有效</td>
          <td>2008年12月21日</td>
          <td>2018年06月23日</td>
          <td><a href="3_pam_organization_duty.php">职务表</a></td>
          <td><a href="3_pam_organization_rorp.php">奖惩情况</a></td>
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


