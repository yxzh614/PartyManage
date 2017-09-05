<!DOCTYPE html>
<html lang="en">
  <head>
      <script type="text/javascript" language="javaScript">
function selectAll() {
	    $(".task").attr("checked", true); //全部选中
	    return false;
}
</script>
     <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");	
	 if(isset($_COOKIE["PHPSESSID"])){
	 	session_id($_COOKIE["PHPSESSID"]);
	 	if(isset($_SESSION["right"])&&$_SESSION["right"]==0){ 
	 		if(isset($_POST["save"])&&$_POST["save"]){
	 			date_default_timezone_set('PRC');
	 			$creatid=date("YmdHis");
	 			$sqlAddduty="INSERT INTO `task` (`job_ID`, `Datetime`,`Department_ID`,`performance`,`job_theme`)
     			VALUES ('".$creatid."','".$_POST["dateTime"]."','".$_POST["Department"]."','".$_POST["status"]."','".$_POST["theme"]."')";
	 			$result=mysqli_query($db,$sqlAddduty) or die("Invalid quary.".mysqli_error($db));
	 		}
	 		if(isset($_POST["del1"])&&$_POST["del1"]=='删除'){//删除
	 			if(!empty($_POST['del']))
	 			{
	 				$ids=$_POST['del'];
	 				{
	 					foreach($ids as $ide){
	 						$Del="DELETE  FROM task WHERE job_ID=$ide";
	 						$Delre=mysqli_query($db,$Del);
	 						$Del="DELETE FROM participator WHERE job_ID=$ide";
	 						$Delre=mysqli_query($db,$Del);
	 					}
	 				}
	 			}
	 		}
	 	}
	 }
	 ?>
  </head>

<body class="">   
	<?php include("1_footer_body_pam.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">开展工作情况表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
	<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#new" role="button" data-toggle="modal" ><font color="#F7F8F7"><i class="icon-plus"></i> 新建</font></a></button>
    <button class="btn">导入</button>
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
  <form action='1_pam_task.php' method='post'> 
    <table class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th>工作主题</th>
          <th>日期时间</th>
          <th>完成情况</th>
          <th>承担部门</th>
          <th>详细信息</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($result=mysqli_query($db,'SELECT * FROM task'))
      	while($row=mysqli_fetch_assoc($result))
      	{
      		$id=$row["Department_ID"];
      		$result1=mysqli_query($db,"SELECT * FROM organization WHERE `Department_ID`='".$id."' ");
      		while($row1=mysqli_fetch_assoc($result1))
      		{
      			$name=$row1["name"];
      		}
      		echo "
        <tr>
          <td><input type='checkbox' name='del[]' value={$row["job_ID"]} id={$row["job_ID"]} class='task'></td>
          <td>{$row["job_theme"]}</td>
          <td>{$row["Datetime"]}</td>
          <td>{$row["performance"]}</td>
          <td>$name</td>
          <td><a href='1_pam_task_information.php?id={$row["job_ID"]}'>详细信息</a></td>
          <td>
              <a href='#delete' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
          </td>
        </tr>
        ";
      	}
        ?>
      </tbody>
    </table>
<div class="btn-toolbar">
     <input type="button" class="btn btn-primary" onclick="selectAll()" value="全选">
    <input type="submit" name="del1" class="btn" id="btn_change_sava"  value="删除" >
</div>
</form>
</div>



<!--新建信息-->
<div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab" action="1_pam_task.php" method="post">
        <label>工作主题</label>
        <input type="text" name="theme" id="theme" value="" class="input-xlarge">
        <label>日期时间</label>
        <input type="date" name="dateTime">
        <label>完成情况</label>
        <input type="text" name="status" id="status" value="" class="input-xlarge">
        <label>承担部门</label>
         <select name="Department">
        <?php 
        if($result=mysqli_query($db,"SELECT * FROM organization"))
        	while($row=mysqli_fetch_assoc($result)){
        	echo "
        	<option value={$row["Department_ID"]}>{$row["name"]}</option>
	 			";
        }
        ?>
        </select>
    
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="save" class="btn btn-danger" id="btn_change_sava" value="保存" >
    </div>
    	<br/><br/><br/>
    	</form>
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


