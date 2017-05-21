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
            
            <h1 class="page-title">党员信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<!--表格信息-->
<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7"><i class="icon-plus"></i>新建</font></a></button>
    <button class="btn"><a href="#out" role="button" data-toggle="modal"><font color="#404040">调出</font></a></button>
    <button class="btn">导出Excel表格</button>
  
</div>
<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
<div class="well">
    <table class="table">
      <thead>
        <tr> 
          <th >&nbsp;</th>
          <th>身份证号</th>
          <th>姓名</th>
          <th>类别</th>
          <th>基本信息</th>
          <th>发展情况</th>
          <th>在校情况</th>
          <th>参与活动</th>
          <th>民主评议</th>
          <th>奖惩情况</th>
          <th>文档信息</th>
          <th>备注</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>134567543243213453</td>
          <td>张三</td>
          <td>正式党员</td>
          <td><a href="1_pmm_information_basic_stu.php">基本信息</a></td>
          <td><a href="1_pmm_information_development.php">发展情况</a></td>
          <td><a href="1_pmm_information_atSchool_stu.php">在校情况</a></td>
          <td><a href="1_pmm_information_activities.php">参与活动</a></td>
          <td><a href="1_pmm_information_appraisement.php">民主评议</a></td>
          <td><a href="1_pmm_information_rorp.php">奖惩情况</a></td>
          <td><a href="1_pmm_information_regular_doc.php">文档信息</a></td>
          <td><a href="1_pmm_information_note.php">备注</a></td>
          <td> 
             <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="2"></td>
          <td>134567543243213453</td>
          <td>李四</td>
          <td>预备党员</td>
          <td><a href="1_pmm_information_basic_tea.php">基本信息</a></td>
          <td><a href="1_pmm_information_development.php">发展情况</a></td>
          <td><a href="1_pmm_information_atSchool_tea.php">在校情况</a></td>
          <td><a href="1_pmm_information_activities.php">参与活动</a></td>
          <td><a href="1_pmm_information_appraisement.php">民主评议</a></td>
          <td><a href="1_pmm_information_rorp.php">奖惩情况</a></td>
          <td><a href="1_pmm_information_probationary_doc.php">文档信息</a></td>
          <td><a href="1_pmm_information_note.php">备注</a></td>
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


<!--编辑信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
     	<label>身份证号</label>
        <input type="text" name="ID_number" value="" class="input-medium">
        <label>姓名</label>
        <input type="text" name="name" value="" class="input-medium">
        <label>类别</label>
        <select name="type" class="input-medium">
        	<option value="0">正式党员</option>
            <option value="1">预备党员</option>
        </select>
        
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>
    
</div>
<!--调出-->
<div class="modal small hide fade" id="out" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">调出信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
    	<label>调出原因</label>
        <select class="input-medium" name="">
        	<option value="0">毕业</option>
            <option value="0">退休</option>
        </select>
        <label>调出至</label>
        <input type="text" name="" value="" class="input-xlarge">
        <label>调出日期</label>
        <input type="date" name="">
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">确定</button>
    </div>
    	<br/><br/><br/>
  </div>
    
</div>
<!--删织信息-->
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


 <?php include("../footer/footer_bottom.php"); ?>
                    
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


