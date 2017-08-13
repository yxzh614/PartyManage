<!DOCTYPE html>
<html lang="en">
  <head>
  <script type="text/javascript" language="javaScript">
function selectAll() {
	    $(".act").attr("checked", true); //全部选中
	    return false;
}
</script>
       <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php");
	 if(isset($_COOKIE["PHPSESSID"])){
	 	session_id($_COOKIE["PHPSESSID"]);
	 	if(isset($_SESSION["right"])&&$_SESSION["right"]==0){ 
	 		if(isset($_POST["save"])&&$_POST["save"]=='保存'){
	 			date_default_timezone_set('PRC');
	 			$creatid=date("YmdHis");
	 			$sqlAddduty="INSERT INTO `activity` (`Datetime`, `site`, `Department_ID`,`activity_theme`,`othert_member`)
     			VALUES ('".$_POST["dateTime"]."', '".$_POST["place"]."','".$_POST["Department"]."','".$_POST["activity_theme"]."','".$_POST["else_member"]."')";
	 			$result=mysqli_query($db,$sqlAddduty) or die("Invalid quary.".mysqli_error($db));
	 			$result7=mysqli_query($db,"SELECT * FROM personnelinformation where person_cate2='01' OR person_cate2='02' OR person_cate2='03' OR person_cate2='04'");
	 			while($row7=mysqli_fetch_assoc($result7))
	 			{
	 				$ADD="INSERT INTO unappearance (`Activity_ID`,`ID_number`,`absent_reason`) VALUES ('".$creatid."','".$row7["ID_number"]."','因事')";
	 				$ADDre=mysqli_query($db,$ADD);
	 			}
	 		}	
	 		if(isset($_POST["del1"])&&$_POST["del1"]=='删除'){//删除
	 		if(!empty($_POST['del']))
	 		{
	 			$ids=$_POST['del'];
	 			{
	 				foreach($ids as $ide){
	 					$Del="DELETE  FROM activity WHERE Activity_ID=$ide";
	 					$Delre=mysqli_query($db,$Del);
	 					$Del="DELETE FROM unappearance WHERE Activity_ID=$ide";
	 					$Delre=mysqli_query($db,$Del);
	 					$Del="DELETE FROM appearance WHERE Activity_ID=$ide";
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
            <h1 class="page-title">活动信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
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
  <form action='1_pam_activity.php' method='post'> 
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
      <?php
      if($result100=mysqli_query($db,'SELECT * FROM activity'))
      while($row=mysqli_fetch_assoc($result100))
      {
      	$id=$row["Department_ID"];
      	echo $id;
      	$result2=mysqli_query($db,"SELECT * FROM organization WHERE `Department_ID`='".$id."'");
      	while($row2=mysqli_fetch_assoc($result2))
      	{
      		$name=$row2["name"];
      	}
      	echo "
        <tr>
          <td><input type='checkbox' name='del[]' value={$row["Activity_ID"]} id={$row["Activity_ID"]} class='act'></td>
          <td>{$row["activity_theme"]}</td>
          <td>{$row["Datetime"]}</td>
          <td>{$row["site"]}</td>
          <td>$name</td>
          <td><a href='1_pam_activity_information.php?id={$row["Activity_ID"]}'>详细信息</a></td>
          <td>
              <a href='#delete' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
          </td>
        </tr>
        ";
      }
      ?>
      </tbody>
    </table>
</div>
<div class="btn-toolbar">
     <input type="button" class="btn btn-primary" onclick="selectAll()" value="全选">
    <input type="submit" name="del1" class="btn" id="btn_change_sava"  value="删除" >
    </form>
</div>

<!--新建信息-->
<div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab" action="1_pam_activity.php" method="post">
     	<label>活动主题</label>
        <input type="text" name="activity_theme" id="activity_theme" value="" class="input-xlarge">
        <label>日期时间</label>
        <input type="date" name="dateTime">
        <label>地点</label>
        <input type="text" name="place" id="place" value="" class="input-xlarge">
        <label>召集部门</label>  
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
         <label>参与人员类别</label>
        <select name='else_member'>
        <option value='全部'>全部</option>
        <option value='党员'>党员</option>
        <option value='积极分子'>积极分子</option>
        </select>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
          <input type="submit" name="save" class="btn btn-danger" id="btn_change_sava" value="保存" >
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


