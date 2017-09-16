<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   include("../footer/footer_head.php");
   require_once("../public/config.php"); ?>
  </head>

 
  <body class=""> 
   <?php include("2_footer_body_pam.php"); ?>
    
<div class="content">
        
   <div class="header">       
    	<h1 class="page-title">组织机构信息表</h1>
   </div>        
   <ul class="breadcrumb">
        <li><a href="2_index.php">返回首页</a> / <span class="divider">组织机构信息表</span></li>
   </ul>
	<div class="container-fluid">
      <div class="row-fluid">
           
         <div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> <a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
    <button class="btn">导入</button>
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
          <th width="50">&nbsp;</th>
          <th>上级组织机构</th>
          <th>名称</th>
          <th>简称</th>
          <th>状态</th>
          <th>生效日期</th>
          <th>失效日期</th>
          <th>职务表</th>
          <th>奖惩情况</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>信息科学与工程学院党委</td>
          <td>信息科学与工程学院党支部</td>
          <td>信息党委</td>
          <td>有效</td>
          <td>2008年12月21日</td>
          <td>2018年06月23日</td>
          <td><a href="2_pam_organization_duty.php">职务表</a></td>
          <td><a href="2_pam_organization_rorp.php">奖惩情况</a></td>
          <td>
              <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
              <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
     
      
      </tbody>
    </table>
</div>
<div class="btn-toolbar">
    <button class="btn btn-primary">全选</button>
    <button class="btn">删除</button> 
</div>  
                
<?php include("../footer/footer_pam_origization.php");?>
  
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


