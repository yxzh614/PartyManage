<!DOCTYPE html>
<html lang="en">
  <head>
         <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php"); if(isset($_POST["submit"])&&$_POST["submit"]) {
             $sqlUpdateStu = "
UPDATE `personnelinformation` 
SET 
`join_T_time`= ".($_POST['join_t_time']==""?"null":("'".$_POST['join_t_time']."'")).",
`SQRD_time`= ".($_POST['SQRD_time']==""?"null":("'".$_POST['SQRD_time']."'")).",
`LJJ_time`= ".($_POST['LJJ_time']==""?"null":("'".$_POST['LJJ_time']."'")).",
`JJPX_time`= ".($_POST['JJPX_time']==""?"null":("'".$_POST['JJPX_time']."'")).",
`Tmember_meet_time`= ".($_POST['Tmember_meet_time']==""?"null":("'".$_POST['Tmember_meet_time']."'")).",
`LFZobject_time`= ".($_POST['LFZobject_time']==""?"null":("'".$_POST['LFZobject_time']."'")).",
`DQPX_time`= ".($_POST['DQPX_time']==""?"null":("'".$_POST['DQPX_time']."'")).",
`developmentplan_time`= ".($_POST['Developmentplan_time']==""?"null":("'".$_POST['Developmentplan_time']."'")).",
`publicity_time`= ".($_POST['Publicity_time']==""?"null":("'".$_POST['Publicity_time']."'")).",
`ZZ_publicity_time`= ".($_POST['ZZ_publicity_time']==""?"null":("'".$_POST['ZZ_publicity_time']."'")).",
`bec_official_time`= ".($_POST['Bec_official_time']==""?"null":("'".$_POST['Bec_official_time']."'")).",
`RD_datetime`= ".($_POST['RD_datetime']==""?"null":("'".$_POST['RD_datetime']."'")).",
`Department_ID`= ".($_POST['Department_ID']==""?"null":("'".$_POST['Department_ID']."'")).",
`talk_site`= ".($_POST['Talk_site']==""?"null":("'".$_POST['Talk_site']."'")).",
`talker_ID`= ".($_POST['Talker_ID']==""?"null":("'".$_POST['Talker_ID']."'")).", 
`talk_time`= ".($_POST['Talk_time']==""?"null":("'".$_POST['Talk_time']."'"))."
 WHERE `personnelinformation`.`ID_number` = '" . $_GET["stuId"] . "'";
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


