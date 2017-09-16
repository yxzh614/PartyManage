<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../footer/footer_head.php");
    require_once("../public/config.php");
    session_start();
    if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

    if(isset($_POST["submit"])&&$_POST["submit"]){
        //$dt = new DateTime();
        //$dt->format('Y-m-d H:i:s');
        $sqlAddStu="INSERT INTO `personnelinformation` (ID_number,name,person_cate1,person_cate2)
 VALUES 
 ( '".$_POST['ID_number']."','".$_POST['name']."',".$_POST['person_cate1'].",2)";
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
        <h1 class="page-title">预备党员列表</h1>
    </div>

    <ul class="breadcrumb">
        <li><a href="../Right_1/1_index.php">返回首页</a> / <span class="divider">预备党员列表</span></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
            <button class="btn btn-primary" href="#change" role="button" data-toggle="modal"><i class="icon-plus"></i>新建</button>
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
                    <table class="table" >
                        <thead>
                        <tr>
                            <th width="50">&nbsp;</th>
                            <th>姓名</th>
                            <th>人员类别</th>
                            <th>函调证明材料表</th>
                            <th>详细信息</th>
                            <th style="width: 26px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sqlAllStudents="SELECT *,Person_cate1_name FROM personnelinformation,person_cate1_bmb WHERE `person_cate2`=2 AND person_cate1=Person_cate1_";
                        if($resAS=mysqli_query($db,$sqlAllStudents)){
                            while ($rows=mysqli_fetch_assoc($resAS)){
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="onetodel[]" class="onetodel" value="<?php echo $rows["ID_number"];?>"></td>
                                    <td><?php echo $rows["name"];?></td>
                                    <td><?php echo $rows["Person_cate1_name"];?></td>
                                    <td><a href="../Right_1/1_pmd_probationary_confirmationLetter.php?ID=<?php echo $rows["ID_number"];?>">函调证明材料表</a></td>
                                    <?php
                                    if($rows["person_cate1"]==1){
                                        echo "<td><a href='../Right_1/1_pmd_probationary_tea.php?ID=".$rows["ID_number"]."'>详细信息</a></td>";
                                    }
                                    else{
                                        echo "<td><a href='../Right_1/1_pmd_probationary_stu.php?ID=".$rows["ID_number"]."'>详细信息</a></td>";
                                    }
                                    ?>
                                    <td>
                                    </td>
                                </tr>
                                <?php
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
                        <form id="tab" action="1_pmd_probationary_list.php" method="post">
                            <label>支部确定发展对象会议</label>
                            <select name="ZQ_devemembermeet">
                                <option value="会议ID">会议主题1</option>
                                <option value="会议ID">会议主题2</option>
                            </select>
                            <label>计划发展时间</label>
                            <input type="date" name="Developmentplan_time"/>
                            <label>支部接收预备党员会议</label>
                            <select name="ZJ_readymeet">
                                <option value="会议ID">会议主题1</option>
                                <option value="会议ID">会议主题2</option>
                            </select>
                            <label>接收预备党员公示时间</label>
                            <input type="date" name="Publicity_time"/>
                            <label>谈话人1</label>
                            <select name="talker_name1">
                                <option value="0">张三</option>
                                <option value="1">李四</option>
                            </select>
                            <label>谈话人2</label>
                            <select name="talker_name2">
                                <option value="0">张三</option>
                                <option value="1">李四</option>
                            </select>
                            <label>谈话地点</label>
                            <input type="text" name="Talk_site" />
                            <label>谈话时间</label>
                            <input type="date" name=""/>
                            <label>党委审批预备党员会议</label>
                            <select name="DS_readymeet">
                                <option value="会议ID">会议主题1</option>
                                <option value="会议ID">会议主题2</option>
                            </select>
                            <label>党前培训时间</label>
                            <input type="date" name="DQPX_time"/>
                            <label>列发展对象时间</label>
                            <input type="date" name="LFZobject_time"/>

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
            <div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">编辑信息</h3>
                </div>
                <div class="modal-body">
                    <form id="tab" action="1_pmd_probationary_list.php" method="post">
                        <label>身份证号</label>
                        <input type="text" name="ID_number" id='ID_number' class="input-xlarge">
                        <label>姓名</label>
                        <input type="text" name="name" id='name' value="" class="input-xlarge">
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
    });// 验证身份证号
    $('form #ID_number').blur(function(){
        var $parent=$(this).parent();
        $parent.find('.formtipsID').remove();
        if(this.value===""||this.value.length!=18){
            $(this).after("<span class='formtipsID onError'>请输入正确的18位身份证号</span>");
        }
    });
    $(function() {$('input').attr('autocomplete','off')});//关闭输入补全
    // 验证姓名
    $('form #name').blur(function(){
        var $parent=$(this).parent();
        $parent.find('.formtipsN').remove();
        if(this.value===""){
            $(this).after("<span class='formtipsN onError'>请输入姓名</span>");
        }else if(this.value.length>9){
            $(this).after("<span class='formtipsN onError'>姓名不能超过10个字符</span>");
        }
    });
    //验证提交
    $('#tab').submit(function(e){
        $('form :input').trigger('blur');
        if($('form .onError').length){
            e.preventDefault();
        }
    })
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

