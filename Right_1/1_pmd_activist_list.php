<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../footer/footer_head.php");
    require_once("../config.php");
    session_start();
    if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){
    if(isset($_POST["submit"])&&$_POST["submit"]){
        $sqlAddStu="INSERT INTO `personnelinformation` (ID_number,name,person_cate1,person_cate2)
 VALUES 
 ( '".$_POST['ID_number']."','".$_POST['name']."',".$_POST['person_cate1'].",4)";
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
        <h1 class="page-title">积极分子人员信息</h1>
    </div>
    <ul class="breadcrumb">
        <li><a href="1_index.php">返回首页</a> / <span class="divider">积极分子人员信息</span></li>
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
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
            </div>
            <form action="../del.php" method="post">
                <input id="submitType" type="hidden" name="type" value="">
                <div class="well">
                    <table width="66%" height="82"  class="table">
                        <thead>
                        <tr>
                            <th width="50">&nbsp;</th>
                            <th width="138">姓名</th>
                            <th width="154">人员类别</th>
                            <th width="132">&nbsp;</th>
                            <th width="26" style="width: 26px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sqlCate24StudentsR1="SELECT *,Person_cate1_name FROM personnelinformation,person_cate1_bmb WHERE `person_cate2`=4 AND person_cate1=Person_cate1_";
                        if($resC24SR1=mysqli_query($db,$sqlCate24StudentsR1)){
                            while ($rowsC24SR1=mysqli_fetch_assoc($resC24SR1)){
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="onetodel[]" class="onetodel" value="<?php echo $rowsC24SR1["ID_number"];?>"></td>
                                    <td><?php echo $rowsC24SR1["name"];?></td>
                                    <td><?php echo $rowsC24SR1["Person_cate1_name"];?></td>
                                    <?php
                                    if($rowsC24SR1["person_cate1"]==1){
                                        echo "<td><a href='../Right_1/1_pmd_activist_tea.php?ID=".$rowsC24SR1["ID_number"]."'>详细信息</a></td>";
                                    }
                                    else{
                                        echo "<td><a href='../Right_1/1_pmd_activist_stu.php?ID=".$rowsC24SR1["ID_number"]."'>详细信息</a></td>";
                                    }
                                    ?>
                                    <td>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="btn-toolbar">
                            <button class="btn btn-primary" type="button" name="allChecked" id="allChecked" onclick="DoCheck()">全选</button>
                            <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('submitType').value='del';})();" value="删除">
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
                            <label>积极分子分子培训时间</label>
                            <input type="date" name="JJPX_time">
                            <label>培训总结时间</label>
                            <input type="date" name="summary" />
                            <label>教材名称</label>
                            <input type="text" name="book_name" value="" class="input-xlarge">
                            <label>分学校意见</label>
                            <input type="text" name="opinion" value="" class="input-xlarge">
                            <label>考试日期</label>
                            <input type="date" name="date" />

                            <div class="modal-footer">
                                <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                                <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存" >
                            </div>
                        </form>
                        <br/><br/><br/>
                    </div>
                </div>
            </form>

            <!--新建信息-->
            <div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">新建信息</h3>
                </div>
                <div class="modal-body">
                    <form id="tab" action="1_pmd_activist_list.php" method="post">
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

