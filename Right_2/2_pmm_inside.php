<!DOCTYPE html>
<html lang="en">
  <head>
      <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");?>

  </head>

<body class="">   
	<?php include("2_footer_body_pmm.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">调入人员信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="2_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar"> 
	<button class="btn btn-primary"><a href="#new" role="button" data-toggle="modal"><font color="#F7F8F7">调入</font></a></button>
    <button class="btn">导出Excel表格</button>
    </div>
    <!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                	<input class="input-slarge" placeholder="身份证号" id="name" type="text">
                    <input class="input-small" placeholder="姓名" id="name" type="text">
                    <input class="input-slarge" placeholder="现所在支部" id="now-branch" type="text">
                    <input class="input-slarge" placeholder="调入自" id="" type="text">
                    调入日期：<input type="date" id="date">
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
          <th>现所在支部</th>
          <th>调入自</th>
          <th>调入日期</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>张三</td>
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
        <label>现所在支部</label>
        <select name="">
        	<option value="0">第一支部</option>
            <option value="1">第二支部</option>
        </select>
        <label>调入自</label>
        <input type="text" name="" value="" class="input-xlarge">
        <label>调入日期</label>
        <input type="date" name="">
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
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
    	身份证号：<input type="text" name="ID_number" value="" class="input-meduim"></br>
        姓名：<input type="text" name="name" value="" class="input-meduim"></br>
        性别：<?php
                if ($rowsGTR1["sex"] == 0) {
                    ?>
                    <input type="radio" name="sex" value="男" id="sex_0" checked="checked"/> 男
                    <input type="radio" name="sex" value="女" id="sex_1"/>女
                    <?php
                }else{
                    ?>
                    <input type="radio" name="sex" value="男" id="sex_0" /> 男
                    <input type="radio" name="sex" value="女" id="sex_1" checked="checked"/>女
                    <?php
                }
                            ?></br>
        民族：
        <select name="nation" class="input-medium">
        	 <?php
                                $sqlAllNation="SELECT * FROM nation_bmb";
                                if($resAN=mysqli_query($db,$sqlAllNation)){
                                    while($rowsAN=mysqli_fetch_assoc($resAN)){
                                        ?>
                                        <option value="<?php echo $rowsAN["nation"]; ?>"><?php echo $rowsAN["nation_name"]; ?></option>
                                <?php
                                    }
                                }
                                ?>
        </select></br>
       籍贯:
        <select name="province" class="input-small">
        	<option value="0">辽宁</option>
            <option value="1">河北</option>
            <option value="2">黑龙江</option>
        </select>
        <select name="city" class="input-small">
        	<option value="0">沈阳</option>
            <option value="1">本溪</option>
        </select>
        <select name="district" class="input-small">
        	<option value="0">浑南新区</option>
            <option value="1">皇姑区</option>
        </select></br>
        出生年月：<input type="month"  name="datetime" value="<?php echo substr($rowsGTR1["ID_number"], 6, 8); ?>"  class="input-medium"/></br>
        入党时间：<input type="date" name="Join_T_time" value="<?php echo $rowsGTR1["join_T_time"]; ?>" class="input-medium"></br>
        是否正式：
        <select name="" class="input-medium">
        	<option value="0">是</option>
            <option value="1">否</option>
        </select></br>
        联系电话：<input type="text" name="tel" value="<?php echo $rowsGTR1["tel"]; ?>" class="input-medium"></br>
        学号：<input type="text" name="number" class="input-medium"></br>
        专业：
        <select name="">
        	<option value="0">计算机科学与技术</option>
            <option value="1">自动化</option>
        </select></br>
        调入支部：
        <select name="">
        	<option value="0">第一支部</option>
            <option value="1">第二支部</option>
        </select></br>
        &nbsp;&nbsp;调入自：<input type="text" name="" value="" class="input-medium"></br>
        调入日期：<input type="date" name="" class="input-medium"></br>
        
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
  </div>
</div>
<!--批量调入-->
<div class="modal small hide fade" id="batch" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">批量调入</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>调入支部</label>
        <select name="">
        	<option value="0">第一支部</option>
            <option value="1">第二支部</option>
        </select>
        <label>调入日期</label>
        <input type="date" name="">
        <label>详细信息:</label>
        <input type="file">
        
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
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


