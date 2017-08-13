<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../public/config.php"); ?>
  </head>

<body class="">   
	<?php include("4_footer_body_pam.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">活动信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="4_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#new" role="button" data-toggle="modal"><font color="#F7F8F7"><i class="icon-plus"></i>新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
    </div>
    <!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据活动主题或日期查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
  
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th>活动主题</th>
          <th>日期时间</th>
          <th>地点</th>
          <th>召集部门</th>
          <th>详细信息</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>活动主题</td>
          <td>2012.03.04</td>
          <td>XX227</td>
          <td>XXXX</td>
          <td><a href="4_pam_activity_information.php">详细信息</a></td>
          <td>
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


<!--新建信息-->
<div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
     	<label>活动主题</label>
        <input type="text" name="activity_theme" id="activity_theme" value="" class="input-xlarge">
        <label>日期时间</label>
        <input type="date" name="dataTime">
        <label>地点</label>
        <input type="text" name="place" id="place" value="" class="input-xlarge">
        <label>召集部门</label>
        <select name="Department">
        	<option value="0">XXXX</option>
            <option value="1">VVVV</option>
        </select>
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


