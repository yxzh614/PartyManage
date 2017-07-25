<?php
require_once ("../config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

        if(isset($_POST["submit"])&&$_POST["submit"]) {
            echo $_POST['ZQ_positivemeet_ID'];
            echo $_POST['Tmember_meet_time'];
            echo $_POST['JJPX_time'];
            echo $_POST['JJPX_mark'];
            $sqlUpdateStu = "UPDATE personnelinformation
            SET 
            `Tmember_meet_time`='" . ($_POST["Tmember_meet_time"] ? $_POST["Tmember_meet_time"] : "0000-01-01") . "',
            `JJPX_time`='" . ($_POST["JJPX_time"] ? $_POST["JJPX_time"] : "0000-01-01") . "',
            `JJPX_mark`='" . $_POST["JJPX_mark"] . "',
            `ZQ_positivemeet_ID`='" . $_POST["ZQ_positivemeet_ID"] . "'
            WHERE personnelinformation.ID_number='".$_GET["ID"]."'";
            echo $sqlUpdateStu;
            if (mysqli_query($db, $sqlUpdateStu)) {
                ?>
                <script>
                    alert('添加成功！');
                    window.location="<?php echo $_POST['url']?>";
                </script>
                <?php
            }
        }else{
?>
<h4><font color="#0F258F">积极分子培训信息</font></h4>                  
<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#change_3" role="button" data-toggle="modal"><font color="#F7F8F7"><i class="icon-plus"></i> 新建</font></a></button>
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
                    <tr>
                        <td><input type="checkbox" name="onetodel[]" class="onetodel" value="<?php echo $rowsGT["ID_number"];?>"></td>
                        <td class="showValue"><?php echo $rowsGT["train_memory"];?></td>
                        <td class="hideInput"><input type='text' id='in1' value="<?php echo $rowsGT["train_memory"];?>"></td>
                        <td class="showValue"><?php echo $rowsGT["bookname"];?></td>
                        <td class="hideInput"><input type='text' value="<?php echo $rowsGT["bookname"];?>"></td>
                        <td class="showValue"><?php echo $rowsGT["mark"];?></td>
                        <td class="hideInput"><input type='text' value="<?php echo $rowsGT["mark"];?>"></td>
                        <td class="showValue"><?php echo $rowsGT["Fschool_advise"];?></td>
                        <td class="hideInput"><input type='text' value="<?php echo $rowsGT["Fschool_advise"];?>"></td>
                        <td class="showValue"><?php echo $rowsGT["exam_date"];?></td>
                        <td class="hideInput"><input type='text' value="<?php echo $rowsGT["exam_date"];?>"></td>
                        <td> </td>
                    </tr>
                    <?php
                }
            }
        ?>
      </tbody>
    </table>
  
</div>

<div class="btn-toolbar">
    <button class="btn btn-primary">全选</button>
    <button class="btn">删除</button> 
</div>
<script>
    let nodelist=document.getElementsByClassName('hideInput');
    [].slice.call(nodelist).map(function (item){ return item.style.display="none";});
    $(function(){
        $('.hideInput').hide();
$('.showValue').on('click',function(){
                //console.info($(this).text());
                var oldVal = $(this).text();
                var inputTd = $(this).next();
                console.log(inputTd);
                var input=inputTd.children()[0];
                console.log(input);
                inputTd.show();
                $(this).hide();
                document.getElementById('in1').focus();
                input.focus();
                input.blur(function(){
                    oldVal=input.val();
                    inputTd.hide();
                    $(this).show();
                    if($(this).val() != ''){
                       oldVal = $(this).val();
                    }
                    //closest：是从当前元素开始，沿Dom树向上遍历直到找到已应用选择器的一个匹配为止。
                   $(this).closest('td').text(oldVal);
                   input.hide();
                });
            });
});
</script>
<!--修改信息-->
<div class="modal small hide fade" id="change_3" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">修改信息</h3>
    </div>
    <div class="modal-body">
    <form id="tab">
     	<label>培训总结</label>
        <input type="date" name="summary" /> 
        <label>教材名称</label>
        <input type="text" name="book_name" value="" class="input-xlarge">
        <label>考试成绩</label>
        <input type="text" name="score" value="" class="input-xlarge">
        <label>分学校意见</label>
        <input type="text" name="opinion" value="" class="input-xlarge"> 
        <label>考试日期</label>
        <input type="date" name="date" />      
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>
    
</div>
<!--删除信息-->
<div class="modal small hide fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">删除信息</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定删除这条信息吗？</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" data-dismiss="modal">删除</button>
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
