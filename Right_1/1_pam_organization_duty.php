<!DOCTYPE html>
<html lang="en">
  <head>
        <script type="text/javascript" language="javaScript">
function selectAll() {
	    $(".duty").attr("checked", true); //全部选中
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
	 		$id=$_GET['id'];
	 		if(isset($_POST["save"])&&$_POST["save"]){
	 			$state=$_POST["state"];
	 			$sqlAddduty="INSERT INTO `duty` (`Department_ID`, `job_name`, `ID_number`, `state`,`effective_date`,`expiry_date`)
     			VALUES ('".$id."','".$_POST["Job_name"]."', '".$_POST["ID_number"]."', $state,'".$_POST["Effective_date"]."', '".$_POST["Expiry_date"]."')";
	 			$result=mysqli_query($db,$sqlAddduty) or die("Invalid quary.".mysqli_error($db));
	 		}
	 		if(isset($_POST["del1"])&&$_POST["del1"]=='删除'){//删除
	 			if(!empty($_POST['del']))
	 			{
	 				$ids=$_POST['del'];
	 					foreach($ids as $ide){
	 						$Del="DELETE  FROM duty WHERE Department_ID=$id AND ID_number=$ide";
	 						$Delre=mysqli_query($db,$Del);
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
    	<h1 class="page-title">组织机构职务表</h1>
   </div>        
   <ul class="breadcrumb">
        <li><a href="1_index.php">返回首页</a> / <a href="1_pam_organization.php">组织机构信息表</a> /<span class="divider">组织机构职务表</span></li>
   </ul>
	<div class="container-fluid">
      <div class="row-fluid">
             
                
<?php include("../footer/footer_pam_origization_duty.php");?>
  
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


