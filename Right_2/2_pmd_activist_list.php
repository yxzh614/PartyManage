<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   include("../footer/footer_head.php");
   require_once("../public/config.php"); ?>
  </head>

<body class="">   
	<?php include("2_footer_body_pmd.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">积极分子人员信息</h1>
        </div>
        
          <ul class="breadcrumb">
            <li><a href="2_index.php">返回首页</a> / <span class="divider">积极分子人员信息</span></li>                       
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
                    <input class="input-xlarge" placeholder="根据身份证号查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
<div class="well">
    <table width="66%" height="82"  class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th width="138">姓名</th>
          <th width="154">人员类别</th>
          <th width="132">详细信息</th>
          <th width="26" style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>张三</td>
          <td>本科生</td>
          <td><a href="2_pmd_activist_stu.php">详细信息</a></td>
          <td>
            <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="2"></td>
          <td>李四</td>
          <td>教师</td>
          <td><a href="2_pmd_activist_tea.php">详细信息</a></td>
          <td>
            <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="btn-toolbar">
    <button class="btn btn-primary">全选</button>
    <button class="btn">删除</button>
     <button class="btn"><a href="#jieduan" role="button" data-toggle="modal"><font color="#000000">录入阶段信息</font></a></button>
</div>
</div>
</div>

<!--新建信息-->
<div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
     	<label>身份证号</label>
        <input type="text" name="ID_number" value="" class="input-xlarge">
        <label>姓名</label>
        <input type="text" name="name" value="" class="input-xlarge">
        <label>人员类别</label>
        <select name="Person_cate1">
        	<option value="0">教师</option>
            <option value="1">研究生</option>
            <option value="2">本科生</option>
        </select> 
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>    
</div>
<!--录入阶段信息-->
<div class="modal small hide fade" id="jieduan" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">录入阶段信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab" action="2_pmd_activist_list.php" method="post">
    	<label>积极分子分子培训时间</label>
        <input type="date" name="JJPX_time">
    	<label>培训总结时间</label>
        <input type="date" name="summary" /> 
        <label>教材名称</label>
        <input type="text" name="book_name" value="" class="input-xlarge">
        <label>分学校意见</label>
        <input type="text" name="opinion" value="" class="input-xlarge"> 
        <label>考试日期</label>
        <input type="date" name="date" /> 	
   
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存" >
    </div>
     </form>
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


