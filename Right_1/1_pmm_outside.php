<!DOCTYPE html>
<html lang="en">
  <head>
      <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");?>

  </head>

<body class="">   
	<?php include("1_footer_body_pmm.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">调出人员信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar"> 
    <button class="btn btn-primary"><font color="#F7F8F7">导出Excel表格</font></button>
    </div>
    <!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                	<input class="input-slarge" placeholder="身份证号" id="id" type="text">
                    <input class="input-small" placeholder="姓名" id="name" type="text">
                    <input class="input-slarge" placeholder="原所在支部" id="new-branch" type="text">
                    <input class="input-slarge" placeholder="调出至" id="" type="text">
                    调出日期：<input type="date" id="date">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
  
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th>姓名</th>
          <th>调出原因</th>
          <th>原所在支部</th>
          <th>调出至</th>
          <th>调出日期</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>张三</td>
          <td>毕业</td>
          <td>第一支部</td>
          <td>XXXXXXXXXXXX</td>
          <td>2016年03月11日</td>
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

<!--编辑信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>原所在支部</label>
        <select name="">
        	<option value="0">第一支部</option>
            <option value="1">第二支部</option>
        </select>
        <label>调出至</label>
        <input type="text" name="" value="" class="input-xlarge">
        <label>调出日期</label>
        <input type="date" name="">
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>
    
</div>

<!--删除信息-->
<div class="modal small hide fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">删除信息</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定删除这条信息吗？</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" data-dismiss="modal">删除</button>
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


