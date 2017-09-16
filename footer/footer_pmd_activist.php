<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){
        ?>
        <h2>入党积极分子阶段信息</h2>
        <div class="btn-toolbar">
            <button class="btn btn-primary" id="FPmdActivist" type="button">保存</button>
        </div>
        <div class="well" align="center">
                <table width="694" >
                    <tbody>
                    <?php
                    $sqlGetStuR1="SELECT Tmember_meet_time,JJPX_time,JJPX_mark,Department_ID,ZQ_positivemeet_ID FROM personnelinformation WHERE personnelinformation.ID_number='".$_GET["ID"]."'";
                    if($resGSR1=mysqli_query($db,$sqlGetStuR1)){
                        while ($rowsGSR1=mysqli_fetch_assoc($resGSR1)){
                            ?>
                            <tr align="right">
                                <td width="231">支部确定入党积极分子会议：</td>
                                <td width="203" align="left"><select title="ZQ_positivemeet_ID" id="ZQ_positivemeet_ID" class="input-medium">
                                        <?php
                                        $sqlGetMeeting="SELECT conference_ID AS ZQ_positivemeet_ID,meeting_theme FROM conference WHERE Department_ID='000000000' OR Department_ID=".$rowsGSR1["Department_ID"];
                                        GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"ZQ_positivemeet_ID","meeting_theme");
                                        ?>
                                    </select></td>
                                <td width="92">团推优时间：</td>
                                <td width="103" align="left">
                                    <input type="date" id="Tmember_meet_time" title="Tmember_meet_time" class="input-medium" value="<?php echo $rowsGSR1['Tmember_meet_time'];?>">
                                </td>
                            </tr>
                            <tr align="right">
                                <td>入党积极分子分子培训时间：</td>
                                <td align="left"><input type="date" id="JJPX_time" title="JJPX_time" class="input-medium" value="<?php echo $rowsGSR1['JJPX_time'];?>"></td>
                                <td>培训成绩：</td>
                                <td align="left"><input type="number" id="JJPX_mark" max=100 title="JJPX_mark" class="input-medium" value="<?php echo $rowsGSR1['JJPX_mark'];?>"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <script>
            $("#FPmdActivist").on('click',function () {
                $.post(
                    "../back-end/ajax_footer_pmd_activist.php",
                    {
                        ZQ_positivemeet_ID:$("#ZQ_positivemeet_ID").val(),
                        Tmember_meet_time:$("#Tmember_meet_time").val(),
                        JJPX_time:$("#JJPX_time").val(),
                        JJPX_mark:$("#JJPX_mark").val(),
                        ID:'<?php echo $_GET['ID'];?>'
                    },
                    function () {
                        alert("保存成功！");
                    }
                )
            });

        </script>
        <?php

    }else{
        ?>
        <script>
            alert("权限不足！");
            window.location = "../sign-in.php";
        </script>
        <?php
    }
}
else{
    ?>
    <script>
        alert("请登录！");
        window.location = "../sign-in.php";
    </script>
    <?php
}

?>
