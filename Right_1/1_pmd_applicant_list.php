<!DOCTYPE html>
<html lang="en">
<?php
require "../footer/footer_head.php";
require_once "../public/config.php";
session_start();
if(hasChookie()){
    session_id($_COOKIE["PHPSESSID"]);
}
if(hasRight(0)){
?>
<body>
<?php
include("../Right_1/1_footer_body_pmd.php");
?>
<div class="content">
    <div class="header">
        <h1 class="page-title">申请入党人员信息</h1>
    </div>
    <ul class="breadcrumb">
        <li><a href="1_index.php">返回首页</a>/<span class="divider">申请入党人员信息</span></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary" href="#change" role="button" data-toggle="modal"><i class="icon-plus"></i>新建</button>
                <button class="btn">导入</button>
                <a href="../getExcel.php" class="btn">导出</a>
            </div>
            <!--搜索框-->
            <div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
            </div>
            <form action="../public/del.php" method="post">
                <input id="submitType" type="hidden" name="type" value="">
                <div class="well">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>姓名</th>
                            <th>人员类别</th>
                            <th>&nbsp;</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sqlCate25StudentsR1="SELECT *,Person_cate1_name FROM personnelinformation,person_cate1_bmb WHERE `person_cate2`=5 AND person_cate1=Person_cate1_";
                        if($resC25SR1=mysqli_query($db,$sqlCate25StudentsR1)){
                            while ($rowsC25SR1=mysqli_fetch_assoc($resC25SR1)){
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="onetodel[]" class="onetodel" value="<?php echo $rowsC25SR1["ID_number"];?>"></td>
                                    <td><?php echo $rowsC25SR1["name"];?></td>
                                    <td><?php echo $rowsC25SR1["Person_cate1_name"];?></td>
                                    <?php
                                    if($rowsC25SR1["person_cate1"]==1){
                                        echo "<td><a href='../Right_1/1_pmd_applicant_tea.php?ID=".$rowsC25SR1["ID_number"]."'>详细信息</a></td>";
                                    }
                                    else{
                                        echo "<td><a href='../Right_1/1_pmd_applicant_stu.php?ID=".$rowsC25SR1["ID_number"]."'>详细信息</a></td>";
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
                            <input  class="btn btn-primary" type="submit" id="del" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('submitType').value='del';})();" value="删除">
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
                        <label>列积极分子时间</label>
                        <input type="date" name="LJJ_time">
                        <div class="modal-footer">
                            <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                            <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" onclick="return allUncheck()&&(()=>{document.getElementById('submitType').value='save_LJJ_time';})();" value="保存" >
                        </div>
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
                    <label>身份证号</label>
                    <input type="text" name="ID_number" id='ID_number' class="input-xlarge">
                    <label>姓名</label>
                    <input type="text" name="name" id='name' value="" class="input-xlarge">
                    <label>人员类别</label>
                    <select name="person_cate1" id='person_cate1'>
                        <option value="1">教师</option>
                        <option value="2">研究生</option>
                        <option value="3">本科生</option>
                    </select>
                    <div class="modal-footer">
                        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                        <button class="btn btn-danger" id="FPmdActivist" data-dismiss="modal">保存</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../footer/footer_bottom.php");?>
</div>

<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
    $("#FPmdActivist").on('click',function () {
        $.post(
            "../back-end/ajax_1_pmd_applicant_list.php",
            {
                ID_number:$("#ID_number").val(),
                name:$("#name").val(),
                person_cate1:$("#person_cate1").val(),
            },
            function () {
                alert("保存成功！");
            }
        )
    });
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
    function SearchPage() {

    }
    $(function() {$('input').attr('autocomplete','off')});//关闭输入补全
    // 验证身份证号
    $('form #ID_number').blur(function(){
        var $parent=$(this).parent();
        $parent.find('.formtipsID').remove();
        if(this.value===""||this.value.length!=18){
            $(this).after("<span class='formtipsID onError'>请输入正确的18位身份证号</span>");
        }
    });
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
}