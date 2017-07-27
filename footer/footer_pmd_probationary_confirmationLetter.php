<?php
require_once ("../config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
session_id($_COOKIE["PHPSESSID"]);
if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

if(isset($_POST["submit"])&&$_POST["submit"]) {
    $sqlNewLetter="INSERT INTO confirmationletter (`ID_number`,`QS_organization`,`QS_name`,`QS_politics`,`QS_profession`,`relative`,`FC_time`,`FH_time`)
                    VALUES ('".$_POST["ID_number"]."','".$_POST["QS_organization"]."','".$_POST['QS_name']."','".$_POST['QS_politics']."','".$_POST['QS_profession']."','".$_POST['relative']."','" . ($_POST["FC_time"] ? $_POST["FC_time"] : "") . "','" . ($_POST["FH_time"] ? $_POST["FH_time"] : "NULL") . "')";
    if (mysqli_query($db, $sqlNewLetter)) {
        ?>
        <script>
            alert('添加成功！');
            window.location="<?php echo $_POST['url']?>";
        </script>
        <?php
    }else{
        echo $sqlNewLetter;
    }
}else{
?>
<form action="../del.php" id="out" method="post">
    <input id="type" type="hidden" name="type" value="">
    <div class="btn-toolbar">
        <button class="btn btn-primary" type="button" href="#change" role="button" data-toggle="modal"><i class="icon-plus"></i> 新建</button>
        <button class="btn">导入</button>
        <button class="btn">导出</button>
        <div class="btn-group">
        </div>
    </div>
    <div class="well">
        <table class="table">
            <thead>
            <tr>
                <th width="50">&nbsp;</th>
                <th>亲属所在党组织</th>
                <th>亲属姓名</th>
                <th>亲属职业</th>
                <th>亲属政治面貌</th>
                <th>与本人关系</th>
                <th>发出时间</th>
                <th>返回时间</th>
                <th style="width: 26px;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sqlGetTrain="SELECT * FROM confirmationletter WHERE ID_number='".$_GET["ID"]."'";
            if($resGT=mysqli_query($db,$sqlGetTrain)){
                while($rowsGT=mysqli_fetch_assoc($resGT)){
                    ?>
                    <form  id='inform' action="../footer/footer_pmd_activist_train.php" method="post">
                        <input type="hidden" name="edit" id="editORdel" value=true>
                        <input type="hidden" name="ID" value="<?php echo $rowsGT["ID"];?>">
                        <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
                        <input type="hidden" name="ID_number" value="<?php echo $_GET["ID"]?>">
                        <tr>
                            <td><input form="out" type="checkbox" name="onetodel[]" class="onetodel" value="<?php echo $rowsGT["ID"];?>"></td>
                            <td class="showValue"><?php echo $rowsGT["QS_organization"];?></td>
                            <td class="hideInput"><input class="input-medium" type='text' name='QS_organization' id='in1' value="<?php echo $rowsGT["QS_organization"];?>"></td>

                            <td class="showValue"><?php echo $rowsGT["QS_name"];?></td>
                            <td class="hideInput"><input class="input-medium" type='text' name='QS_name' value="<?php echo $rowsGT["QS_name"];?>"></td>

                            <td class="showValue"><?php echo $rowsGT["QS_profession"];?></td>
                            <td class="hideInput"><input class="input-medium" type='text' name='QS_profession' value="<?php echo $rowsGT["QS_profession"];?>"></td>

                            <td class="showValue"><?php echo $rowsGT["QS_politics"];?></td>
                            <td class="hideInput"><input class="input-medium" type='text' name='QS_politics' value="<?php echo $rowsGT["QS_politics"];?>"></td>

                            <td class="showValue"><?php echo $rowsGT["relative"];?></td>
                            <td class="hideInput"><input class="input-medium" type='text' name='relative' value="<?php echo $rowsGT["relative"];?>"></td>

                            <td class="showValue"><?php echo $rowsGT["FC_time"];?></td>
                            <td class="hideInput"><input class="input-medium" type='date' name='FC_time' value="<?php echo $rowsGT["FC_time"];?>"></td>

                            <td class="showValue"><?php echo $rowsGT["FH_time"];?></td>
                            <td class="hideInput"><input class="input-medium" type='date' name='FH_time' value="<?php echo $rowsGT["FH_time"];?>"></td>


                            <td><input class="btn btn-primary" name='submit' type='submit' onclick="return confirm('确定要编辑吗？')&&(()=>{document.getElementById('type').value='editLetter';})();" value='保存'></td>
                        </tr>
                    </form>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>

    </div>
    <div class="btn-toolbar">
        <button class="btn btn-primary" type="button" name="allChecked" id="allChecked" onclick="DoCheck()">全选</button>
        <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('type').value='delLetter';})();" value="删除">
    </div>
</form>
<script>
    $(function() {$('input').attr('autocomplete','off')});//关闭输入补全
    let nodeArray=[].slice.call(document.getElementsByClassName('hideInput'));
    nodeArray.map(function (item){ return item.style.display="none";});
    $(function(){
        $('.hideInput').hide();
        $('.showValue').on('click',function(){
            //TODO 只有变input好使
            //console.info($(this).text());
            let oldVal = $(this).text();
            let inputTd = $(this).next();
            console.log(inputTd);
            let input = inputTd.children()[0];
            console.log(input);
            inputTd.show();
            $(this).hide();
            document.getElementById('in1').focus();
            input.focus();
            input.blur(function(){
                oldVal=input.val();
                inputTd.hide();
                $(this).show();
                if($(this).val() !== ''){
                    oldVal = $(this).val();
                }
                //closest：是从当前元素开始，沿Dom树向上遍历直到找到已应用选择器的一个匹配为止。
                $(this).closest('td').text(oldVal);
                input.hide();
            });
        });
    });
</script>
<!--xinjian-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <div class="modal-body">
        <form action="../footer/footer_pmd_probationary_confirmationLetter.php" method="post">
            <input type="hidden" name="NewOREdit" value="new">
            <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
            <input type="hidden" name="ID_number" value="<?php echo $_GET['ID'];?>">
            <label>亲属所在党组织</label>
            <input class="input-xlarge" type="text" name='QS_organization' required="required">
            <label>亲属姓名</label>
            <input class="input-xlarge" type="text" name="QS_name" required="required">
            <label>亲属职业</label>
            <input class="input-xlarge" type='text' name='QS_profession' required="required">
            <label>亲属政治面貌</label>
            <input class="input-xlarge" type="text" name='QS_politics' required="required">
            <label>与本人关系</label>
            <input class="input-xlarge" type="text" name='relative' required="required">
            <label>发出时间</label>
            <input class="input-xlarge" type="date" name='FC_time' required="required">
            <label>返回时间</label>
            <input class="input-xlarge" type="date" name='FH_time' required="required">
            <div class="modal-footer">
                <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                <input class="btn btn-danger" type="submit" name="submit" id="btn_change_sava" value="保存">
            </div>
        </form>
        <br/><br/><br/>
    </div>
</div>


    <?php
}
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

?>

