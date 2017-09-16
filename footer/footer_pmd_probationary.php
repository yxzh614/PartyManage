<?php
require_once ("../public/config.php");
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
<h2>预备党员阶段信息</h2>
<div class="btn-toolbar">
    <button class="btn btn-primary" ><font color="#F7F8F7">保存</font></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
      <table width="795">
        <tbody>
          <tr align="right">
            <td width="202">支部确定发展对象会议：</td>
            <td width="171" align="left">
            <select name="ZQ_devemembermeet" class="input-medium">
        		<option value="会议ID">会议主题1</option>
            	<option value="会议ID">会议主题2</option>
        	</select></td>
            <td width="179">列发展对象时间：</td>
            <td width="215"  align="left"><input type="date" name="LFZobject_time" class="input-medium"/></td>
          </tr>
          <tr align="right">
            <td>支部接收预备党员会议：</td>
            <td  align="left"><select name="ZJ_readymeet" class="input-medium">
              <option value="会议ID">会议主题1</option>
              <option value="会议ID">会议主题2</option>
            </select></td>
            <td>计划发展时间：</td>
            <td align="left"><input type="date" name="Developmentplan_time" class="input-medium"/></td>
          </tr>
          <tr align="right">
            <td>谈话人：</td>
            <td align="left"><select name="talker_name1" class="input-medium">
              <option value="0">谈话人1</option>
              <option value="1">李四</option>
            </select></td>
            <td>接收预备党员公示时间：</td>
            <td align="left"><input type="date" name="Publicity_time" class="input-medium"/></td>
          </tr>
          <tr align="right">
            <td>&nbsp;</td>
            <td align="left"><select name="talker_name2" class="input-medium">
              <option value="0">谈话人2</option>
              <option value="1">李四</option>
            </select></td>
            <td>谈话地点：</td>
            <td align="left"><input type="text" name="Talk_site" class="input-medium"/></td>
          </tr>
          <tr align="right">
            <td>谈话时间：</td>
            <td align="left"><input type="date" name="input" class="input-medium"/></td>
            <td>党委审批预备党员会议：</td>
            <td align="left"><select name="DS_readymeet" class="input-medium">
              <option value="会议ID">会议主题1</option>
              <option value="会议ID">会议主题2</option>
            </select></td>
          </tr>
          <tr align="right">
            <td>党前培训时间：</td>
            <td align="left"><input type="date" name="DQPX_time" class="input-medium"/></td>
            <td>培训成绩：</td>
            <td align="left"><input type="text" name="DQPX_mark" class="input-medium" /></td>
          </tr>
        </tbody>
      </table>
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