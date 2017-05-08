<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("../footer/footer_head.php");
    require_once ("../config.php");
    session_start();
    if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){
    if(isset($_POST["submit"])&&$_POST["submit"]){
        //$dt = new DateTime();
        //$dt->format('Y-m-d H:i:s');
        $sqlAddStu="INSERT INTO `personnelinformation` (ID_number,name,person_cate1,person_cate2)
 VALUES 
 ( '".$_POST['ID_number']."','".$_POST['name']."',".$_POST['person_cate1'].",5)";
        if(mysqli_query($db,$sqlAddStu)){
           // echo "==插入成功==";
		echo "<script>alert('添加成功！')</script>";
        }
        ?>
        <script>
            //alert("数据不能为空！");
            //window.location = "1_DRM_stu_list.php";
        </script>
        <?php
    }
    ?>
  </head>

<body class="">   
	<?php include("../Right_1/1_footer_body_pmd.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">申请入党人员信息</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a> /<span class="divider">申请入党人员信息</span></li>
        </ul>

        <div class="container-fluid">
        <div class="row-fluid">
     	<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7"><i class="icon-plus"></i>新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button> 
    	</div>
    	<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
	</div>
  
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr> 
          <th width="100">&nbsp;</th>
          <th width="308">姓名</th>
          <th width="233">人员类别</th>
          <th width="213">&nbsp;</th>
          <th width="43" style="width: 26px;"></th>
        </tr>
      </thead>
        <tbody>

        <?php
        $sqlAllStudents="SELECT *,Person_cate1_name FROM personnelinformation,person_cate1_bmb WHERE `person_cate2`=5 AND person_cate1=Person_cate1_";
        if($resAS=mysqli_query($db,$sqlAllStudents)){
            while ($rows=mysqli_fetch_assoc($resAS)){
                echo "<tr>";
                echo "<td><input type='checkbox' name='onetodel' value='".$rows["ID_number"]."'></td>";
                echo "<td>".$rows["name"]."</td>";
                echo "<td>".$rows["Person_cate1_name"]."</td>";
                if($rows["person_cate1"]==1){
                    echo "<td><a href='../Right_1/1_pmd_applicant_tea.php?ID=".$rows["ID_number"]."'>详细信息</a></td>";
                }
                else{
                    echo "<td><a href='../Right_1/1_pmd_applicant_stu.php?ID=".$rows["ID_number"]."'>详细信息</a></td>";
                }
                echo "<td>";
                ?>
                <form action="../del.php" method="post">
                <input type="hidden" name="ID_number" value="<?php echo $rows["ID_number"];?>">
                <input type="hidden" name="type" value="stu">
               
                </form><?php
                echo " </td>";
                echo "</tr>";
            }
        }
        ?>

 
        </tbody>

    </table>       
   
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="btn-toolbar">
  <button class="btn btn-primary">全选</button>
   <th width="213">&nbsp;</th>
        <input  class="btn btn-primary" type="submit" name="submit" value="删除">
  <th width="213">&nbsp;</th>
        <button class="btn"><a href="#jieduan" role="button" data-toggle="modal"><font color="#000000">录入阶段信息</font></a></button>       
</div>
</div>
</div>

<!--录入阶段信息-->
<div class="modal small hide fade" id="jieduan" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">录入阶段信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab" action="1_pmd_activist_list.php" method="post">
    	 <label>列积极分子时间</label>
        <input type="date" name="LJJ_time" />
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存" >
    </div>
     </form>
    	<br/><br/><br/>
  </div>    
</div>

<!--编辑信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab" action="1_pmd_applicant_list.php" method="post">
     	<label>身份证号</label>
        <input type="text" name="ID_number" value="" class="input-xlarge">
        <label>姓名</label>
        <input type="text" name="name" value="" class="input-xlarge">
        <label>人员类别</label>
        <select name="person_cate1">
        	<option value="1">教师</option>
            <option value="2">研究生</option>
            <option value="3">本科生</option>
        </select> 

    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存" >
    </div>
    </form>
    	<br/><br/><br/>
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
<?php
}else{
    ?>
    <script>
        alert("未登录或权限不足！");
        window.location = "../sign-in.php";
    </script>
    <?php
}
}
else{
    ?>
    <script>
        window.location = "../sign-in.php";
    </script>
    <?php
}

