<!DOCTYPE html>
<html lang="en">
  <head>
         <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../config.php"); if(isset($_POST["submit"])&&$_POST["submit"]) {
             $sqlUpdateStu = "
UPDATE `personnelinformation` 
SET 
`join_T_time`= '".$_POST['join_t_time']."'/*,
`SQRD_time`= '".$_POST['SQRD_time']."',
`LJJ_time`= '".$_POST['LJJ_time']."',
`JJPX_time`= '".$_POST['JJPX_time']."',
`Tmember_meet_time`= '".$_POST['Tmember_meet_time']."',
`LFZobject_time`= '".$_POST['LFZobject_time']."',
`DQPX_time`= '".$_POST['DQPX_time']."',
`developmentplan_time`= '".$_POST['Developmentplan_time']."',
`publicity_time`= '".$_POST['Publicity_time']."',
`ZZ_publicity_time`= '".$_POST['ZZ_publicity_time']."',
`bec_official_time`= '".$_POST['bec_official_time']."',
`RD_datetime`= '".$_POST['RD_datetime']."',
`Department_ID`= '".$_POST['Department_ID']."',
`talk_site`= '".$_POST['talk_site']."',
`talker_ID`= '".$_POST['talker_ID']."', 
`talk_time`= '".$_POST['Talk_time']."'*/ 
 WHERE `personnelinformation`.`ID_number` = '" . $_GET["stuId"] . "'";
             echo $sqlUpdateStu;
             if (mysqli_query($db, $sqlUpdateStu)) {
                 echo "<script>alert('修改成功！')</script>";
             }
         }
         ?>

  </head>
 
  <body class=""> 
    
 <?php include("1_footer_body_pmm.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">发展情况</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> /<a href="1_pmm_information.php">党员信息表</a> /<span class="divider">发展情况</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

 <?php include("../footer/footer_pmm_development.php"); ?>


 <?php include("../footer/footer_bottom.php"); ?>
                    
            </div>
        </div>
    </div>

<!--导航动态下拉框-->
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


