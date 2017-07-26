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
<h2>入党积极分子阶段信息</h2>
<form action="../footer/footer_pmd_activist.php?ID=<?php echo $_GET["ID"];?>" method="post" id="edit">
    <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
    <div class="btn-toolbar">
        <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="">
    </div>
<div class="well">
    <div align="center">
      <table width="694" >
        <tbody>
        <?php
        $sqlGetStuR1="SELECT Tmember_meet_time,JJPX_time,JJPX_mark,Department_ID,ZQ_positivemeet_ID FROM personnelinformation WHERE personnelinformation.ID_number='".$_GET["ID"]."'";
        if($resGSR1=mysqli_query($db,$sqlGetStuR1)){
            while ($rowsGSR1=mysqli_fetch_assoc($resGSR1)){
                ?>
                <tr align="right">
                    <td width="231">支部确定入党积极分子会议：</td>
                    <td width="203" align="left"><select name="ZQ_positivemeet_ID" class="input-medium">
                        <?php 
                            $sqlGetMeeting="SELECT conference_ID AS ZQ_positivemeet_ID,meeting_theme FROM conference WHERE Department_ID='000000000' OR Department_ID=".$rowsGSR1["Department_ID"];
                            GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"ZQ_positivemeet_ID","meeting_theme");
                        ?>
                        </select></td>
                    <td width="92">团推优时间：</td>
                    <td width="103" align="left">
                        <input type="date" name="Tmember_meet_time" class="input-medium" value="<?php echo $rowsGSR1['Tmember_meet_time'];?>">
                        </td>
                </tr>
                <tr align="right">
                    <td>入党积极分子分子培训时间：</td>
                    <td align="left"><input type="date" name="JJPX_time" class="input-medium" value="<?php echo $rowsGSR1['JJPX_time'];?>"></td>
                    <td>培训成绩：</td>
                    <td align="left"><input type="number" max=100 name="JJPX_mark" class="input-medium" value="<?php echo $rowsGSR1['JJPX_mark'];?>"></td>
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
