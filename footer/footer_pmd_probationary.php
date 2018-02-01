<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
session_id($_COOKIE["PHPSESSID"]);
if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

if(isset($_POST["submit"])&&$_POST["submit"]) {
    echo $_POST['ZQ_devemembermeet_ID'];
    echo $_POST['LFZobject_time'];
    echo $_POST['ZJ_readymeet_ID'];
    echo $_POST['developmentplan_time'];
    echo $_POST['talker_ID'];
    echo $_POST['ZZ_publicity_time'];
    echo $_POST['talk_site'];
    echo $_POST['talk_time'];
    echo $_POST['DS_readymeet_ID'];
    echo $_POST['DQPX_time'];
    echo $_POST['DQPX_mark'];
    $sqlUpdateStu = "UPDATE personnelinformation
            SET 
            ZQ_devemembermeet_ID = '".$_POST['ZQ_devemembermeet_ID']."',
            LFZobject_time = '".($_POST["LFZobject_time"] ? $_POST["LFZobject_time"] : "0000-01-01")."',
            ZJ_readymeet_ID = '".$_POST['ZJ_readymeet_ID']."',
            developmentplan_time = '".($_POST["developmentplan_time"] ? $_POST["developmentplan_time"] : "0000-01-01")."',
            talker_ID = '".$_POST['talker_ID']."',
            ZZ_publicity_time = '".($_POST["ZZ_publicity_time"] ? $_POST["ZZ_publicity_time"] : "0000-01-01")."',
            talk_site = '".$_POST['talk_site']."',
            talk_time = '".($_POST["talk_time"] ? $_POST["talk_time"] : "0000-01-01")."',
            DS_readymeet_ID = '".$_POST['DS_readymeet_ID']."',
            DQPX_time = '".($_POST["DQPX_time"] ? $_POST["DQPX_time"] : "0000-01-01")."',
            DQPX_mark = '".($_POST["DQPX_time"] ? $_POST["DQPX_time"] : "0")."'
            WHERE personnelinformation.ID_number='".$_POST["ID_number"]."'";
    echo $sqlUpdateStu;
    if (mysqli_query($db, $sqlUpdateStu)) {
        ?>
        <script>
            alert('保存成功！');
            window.location="<?php echo $_POST['url']?>";
        </script>
        <?php
    }
}else{
?>
<h2>预备党员阶段信息</h2>
<form action="../footer/footer_pmd_probationary.php" method="post">
<input type="hidden" name="url" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>">
<input type="hidden" name="ID_number" value="<?php echo $_GET["ID"] ?>">
<div class="btn-toolbar">
    <input class="btn btn-primary" type="submit" name="submit" value="保存">
  <div class="btn-group">
  </div>
</div>
<div class="well">
  <div align="center">
      <table width="795">
        <tbody>
            <?php
            $sqlGetStuR1="SELECT * FROM personnelinformation WHERE personnelinformation.ID_number='".$_GET["ID"]."'";
            if($resGSR1=mysqli_query($db,$sqlGetStuR1)){
                while ($rowsGSR1=mysqli_fetch_assoc($resGSR1)){
                    ?>
                    <tr align="right">
                        <td width="231">支部确定发展对象会议：</td>
                        <td width="203" align="left">
                        <select title="ZQ_devemembermeet_ID" name="ZQ_devemembermeet_ID" class="input-medium">
                                <?php
                                $sqlGetMeeting="SELECT conference_ID AS ZQ_devemembermeet_ID,meeting_theme FROM conference WHERE Department_ID='000000000' OR Department_ID=".$rowsGSR1["Department_ID"];
                                GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"ZQ_devemembermeet_ID","meeting_theme");
                                ?>
                            </select>
                            </td>
                        <td width="92">列发展对象时间：</td>
                        <td width="103" align="left">
                            <input type="date" name="LFZobject_time" title="LFZobject_time" class="input-medium" value="<?php echo $rowsGSR1['LFZobject_time'];?>">
                        </td>
                    </tr>
                    <tr align="right">
                      <td>支部接收预备党员会议：</td>
                      <td width="203" align="left">
                      <select title="ZJ_readymeet_ID" name="ZJ_readymeet_ID" class="input-medium">
                              <?php
                              $sqlGetMeeting="SELECT conference_ID AS ZJ_readymeet_ID,meeting_theme FROM conference WHERE Department_ID='000000000' OR Department_ID=".$rowsGSR1["Department_ID"];
                              GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"ZJ_readymeet_ID","meeting_theme");
                              ?>
                          </select>
                          </td>
                      <td>计划发展时间：</td>
                      <td align="left"><input type="date" name="developmentplan_time" class="input-medium" value="<?php echo $rowsGSR1['developmentplan_time'];?>"/></td>
                    </tr>
                    <tr align="right">
                      <td>谈话人：</td>
                      <td align="left"><select name="talker_ID" class="input-medium" value="<?php echo $rowsGSR1['talker_ID'];?>">
                      <?php
                      $sqlGetMeeting="SELECT ID_number,name FROM personnelinformation";
                      GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"ID_number","name");
                      ?>
                      </select></td>
                      <td>接收预备党员公示时间：</td>
                      <td align="left"><input type="date" name="ZZ_publicity_time" class="input-medium" value="<?php echo $rowsGSR1['ZZ_publicity_time'];?>"/></td>
                    </tr>
                    <tr align="right">
                      <td>&nbsp;</td>
                      <td align="left"></td>
                      <td>谈话地点：</td>
                      <td align="left"><input type="text" name="talk_site" class="input-medium" value="<?php echo $rowsGSR1['talk_site'];?>"/></td>
                    </tr>
                    <tr align="right">
                      <td>谈话时间：</td>
                      <td align="left"><input type="date" name="talk_time" class="input-medium" value="<?php echo $rowsGSR1['talk_time'];?>"/></td>
                      <td>党委审批预备党员会议：</td>
                      <td align="left"><select name="DS_readymeet_ID" class="input-medium" value="<?php echo $rowsGSR1['DS_readymeet_ID'];?>">
                      <?php
                      $sqlGetMeeting="SELECT conference_ID AS DS_readymeet_ID,meeting_theme FROM conference WHERE Department_ID='000000000' OR Department_ID=".$rowsGSR1["Department_ID"];
                      GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"DS_readymeet_ID","meeting_theme");
                      ?>
                      </select></td>
                    </tr>
                    <tr align="right">
                      <td>党前培训时间：</td>
                      <td align="left"><input type="date" name="DQPX_time" class="input-medium" value="<?php echo $rowsGSR1['DQPX_time'];?>"/></td>
                      <td>培训成绩：</td>
                      <td align="left"><input type="number" name="DQPX_mark" class="input-medium" value="<?php echo $rowsGSR1['DQPX_mark'];?>"/></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
      </table>
  </div>
</div>
</form>

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