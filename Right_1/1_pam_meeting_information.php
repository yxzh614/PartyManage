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
	 			$sqlAddduty="UPDATE `conference` SET   `site`='".$_POST["place"]."' , `Department_ID`='".$_POST["Department"]."' ,`meeting_theme`='".$_POST["activity_theme"]."',`meeting_detail`='".$_POST["activity_content"]."',`Datetime`='".$_POST["dateTime"]."' ,`conference_type`='".$_POST["Conference_type"]."',`else_member`='".$_POST["else_member"]."'
	 			where `conference_ID`='".$id."' ";
	 			$result=mysqli_query($db,$sqlAddduty) or die("Invalid quary.".mysqli_error($db));
	 		}
	 		if(isset($_POST["save2"])&&$_POST["save2"]=='保存'){//出席情况	 			
	 			if(!empty($_POST['save']))
	 			{
	 		$ids=$_POST['save'];
	 		{
	 		foreach($ids as $ide){	 	
	 			$check="SELECT * FROM attend WHERE conference_ID='".$id."' and ID_number='".$ide."'";
	 		    $result3=mysqli_query($db,$check);	
	 			if(!mysqli_fetch_assoc($result3))
	 			{	
	 				$Addattend="INSERT INTO `attend`(`ID_number`,`conference_ID`) VALUES ('".$ide."','".$id."')";
	 				$result4=mysqli_query($db,$Addattend);	
	 				$Delunattend="DELETE  FROM unattend WHERE conference_ID=$id AND ID_number=$ide";
	 				$delun=mysqli_query($db,$Delunattend);
	 			}
	 		}
	 		}
	 		}
	 		}
	 if(isset($_POST["del1"])&&$_POST["del1"]=='删除'){//删除
	 	if(!empty($_POST['del']))
	 	{
	 		$idd=$_POST['del'];
	 		{
	 			foreach($idd as $ide){
	 				$Addunattend="INSERT INTO `unattend`(`ID_number`,`conference_ID`,`absent_reason`) VALUES ('".$ide."','".$id."','因事')";
	 				$Addunatt=mysqli_query($db,$Addunattend);
	 				$Delattend="DELETE  FROM attend WHERE conference_ID=$id AND ID_number=$ide";
	 				$Delatt=mysqli_query($db,$Delattend);
	 			}
	 		}
	 	}
	 }
	 }
	 }
	 ?>
  </head>

<body class="">   
	<?php include("../Right_1/1_footer_body_pam.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">会议详细信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="../1_index.php">返回首页</a> / <a href="../Right_1/1_pam_meeting.php">会议信息表</a> / <span class="divider">会议详细信息</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<?php include("../footer/footer_pam_meeting.php");?>
<?php include("../footer/footer_pam_attend.php");?>
<?php include("../footer/footer_pam_unattend.php");?>


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


