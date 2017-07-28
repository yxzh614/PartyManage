<!DOCTYPE html>
<html lang="en">
    <head>
      <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php");
	 $id=$_GET['id'];
	 if(isset($_COOKIE["PHPSESSID"])){
	 	session_id($_COOKIE["PHPSESSID"]);
	 	if(isset($_SESSION["right"])&&$_SESSION["right"]==0){
	 if(isset($_POST["save1"])&&$_POST["save1"]=='保存'){//编辑信息
	 	$sqlAdd="UPDATE `task` SET `remark`='".$_POST["remark"]."', `Department_ID`='".$_POST["Department"]."' ,`job_theme`='".$_POST["job_theme"]."',`job_content`='".$_POST["job_content"]."',`Datetime`='".$_POST["dateTime"]."' ,`performance`='".$_POST["performance"]."'
	 	where `job_ID`=$id ";
	 	if($result=mysqli_query($db,$sqlAdd)) {}
	 }
	 if(isset($_POST["save2"])&&$_POST["save2"]=='保存'){//工作
	 	if(!empty($_POST['save']))
	 	{
	 		$ids=$_POST['save'];
	 		foreach($ids as $ide){	 	
	 				$Add="INSERT INTO `participator`(`ID_number`,`job_ID`,`take_job`) VALUES ('".$ide."','".$id."','待添加')";
	 				$Adder=mysqli_query($db,$Add);
	 		}
	 	}
	 }
	 if(isset($_POST["del1"])&&$_POST["del1"]=='删除'){//删除
	 	if(!empty($_POST['del']))
	 	{
	 		$idd=$_POST['del'];
	 		{
	 			foreach($idd as $ide){
	 				$Del="DELETE  FROM participator WHERE job_ID=$id AND ID_number=$ide";
	 				$Deler=mysqli_query($db,$Del);
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
            
            <h1 class="page-title">参与工作人员表</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> / <a href="1_pam_task.php">开展工作情况表</a> / <span class="divider">参与工作人员表</span></li>
        </ul>
          <div class="container-fluid">
            <div class="row-fluid">
	  <?php include("../footer/footer_pam_task.php"); ?>
      <?php include("../footer/footer_pam_task_participator.php"); ?>
        </div>
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


