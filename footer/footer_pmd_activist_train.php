<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

        if(isset($_POST["submit"])&&$_POST["submit"]) {
            echo $_POST['mark'];
            $sqlUpdateTrain="INSERT INTO train (`ID_number`,`train_memory`,`bookname`,`mark`,`Fschool_advise`,`exam_date`)
                    VALUES ('".$_POST["ID_number"]."','".$_POST['train_memory']."','".$_POST['bookname']."','".$_POST['mark']."','".$_POST['Fschool_advise']."','" . ($_POST["exam_date"] ? $_POST["exam_date"] : "0000-01-01") . "')";
            if (mysqli_query($db, $sqlUpdateTrain)) {
                ?>
                <script>
                    alert('添加成功！');
                    window.location="<?php echo $_POST['url']?>";
                </script>
                <?php
            }else{
                echo $sqlUpdateTrain;
            }
        }else{
            ?>
            <form action="../del.php" id="out" method="post">
                <input id="type" type="hidden" name="type" value="">
                <h4><span style="color: #0F258F; ">积极分子培训信息</span></h4>
                <div class="btn-toolbar">
                    <button class="btn btn-primary" type="button" href="#change_3" role="button" data-toggle="modal"><i class="icon-plus"></i> 新建</button>
                    <button class="btn">导入</button>
                    <button class="btn">导出</button>
                    <div class="btn-group">
                    </div>
                </div>
                <div class="well">
                    <table id="JJPX" class="table">
                        <thead>
                        <tr>
                            <th width="50">&nbsp;</th>
                            <th>培训总结</th>
                            <th>教材名称</th>
                            <th>考试成绩</th>
                            <th>分学校意见</th>
                            <th>考试日期</th>
                            <th style="width: 26px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sqlGetTrain="SELECT * FROM train WHERE ID_number='".$_GET["ID"]."'";
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
                                        <td class="showValue"><?php echo $rowsGT["train_memory"];?></td>
                                        <td class="hideInput"><input class="input-medium" type='text' name='train_memory' id='in1' value="<?php echo $rowsGT["train_memory"];?>"></td>
                                        <td class="showValue"><?php echo $rowsGT["bookname"];?></td>
                                        <td class="hideInput"><input class="input-medium" type='text' name='bookname' value="<?php echo $rowsGT["bookname"];?>"></td>
                                        <td class="showValue"><?php echo $rowsGT["mark"];?></td>
                                        <td class="hideInput"><input class="input-medium" type='number' max=100 name='mark' value="<?php echo $rowsGT["mark"];?>"></td>
                                        <td class="showValue"><?php echo $rowsGT["Fschool_advise"];?></td>
                                        <td class="hideInput"><input class="input-medium" type='text' name='Fschool_advise' value="<?php echo $rowsGT["Fschool_advise"];?>"></td>
                                        <td class="showValue"><?php echo $rowsGT["exam_date"];?></td>
                                        <td class="hideInput"><input class="input-medium" type='date' name='exam_date' value="<?php echo $rowsGT["exam_date"];?>"></td>
                                        <td><input class="btn btn-primary" name='submit' type='submit' onclick="return confirm('确定要编辑吗？')&&(()=>{document.getElementById('type').value='editTrain';})();" value='保存'></td>
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
                    <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('type').value='delTrain';})();" value="删除">
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
            <div class="modal small hide fade" id="change_3" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">新建信息</h3>
                </div>
                <div class="modal-body">
                    <form action="../footer/footer_pmd_activist_train.php" method="post">
                        <input type="hidden" name="NewOREdit" value="new">
                        <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
                        <input type="hidden" name="ID_number" value="<?php echo $_GET['ID'];?>">
                        <label>培训总结</label>
                        <input type="text" name='train_memory' />
                        <label>教材名称</label>
                        <input type="text" name="bookname" value="" class="input-xlarge">
                        <label>考试成绩</label>
                        <input type='number' max=100 name='mark' value="" class="input-xlarge">
                        <label>分学校意见</label>
                        <input type="text" name='Fschool_advise' value="" class="input-xlarge">
                        <label>考试日期</label>
                        <input type="date" name='exam_date' />
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
