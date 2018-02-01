<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){
        ?>
        <h2>预备党员转正阶段信息</h2>
        <div class="btn-toolbar">
            <button class="btn btn-primary" id="FPmdRegular" type="button">保存</button>
        </div>
        <div class="well" align="center">
                <table width="694" >
                    <tbody>
                    <?php
                    $sqlGetStuR1="SELECT bec_officialmeet_ID,ZZ_publicity_time,bec_official_time,Department_ID,RD_datetime FROM personnelinformation WHERE personnelinformation.ID_number='".$_GET["ID"]."'";
                    if($resGSR1=mysqli_query($db,$sqlGetStuR1)){
                        while ($rowsGSR1=mysqli_fetch_assoc($resGSR1)){
                            ?>
                            <tr align="right">
                                <td width="231">党委审批预备党员转正会议：</td>
                                <td width="203" align="left"><select title="" id="bec_officialmeet_ID" class="input-medium">
                                    <?php
                                    $sqlGetMeeting="SELECT conference_ID AS bec_officialmeet_ID,meeting_theme FROM conference WHERE Department_ID='000000000' OR Department_ID=".$rowsGSR1["Department_ID"];
                                    GetSelectGroup($db,$rowsGSR1,$sqlGetMeeting,"bec_officialmeet_ID","meeting_theme");
                                    ?>
                                    </select></td>
                                <td width="92">预备党员转正公示时间：</td>
                                <td width="103" align="left">
                                    <input type="date" id="ZZ_publicity_time" title="ZZ_publicity_time" class="input-medium" value="<?php echo $rowsGSR1['ZZ_publicity_time'];?>">
                                </td>
                            </tr>
                            <tr align="right">
                                <td>转正时间：</td>
                                <td align="left"><input type="date" id="bec_official_time" title="bec_official_time" class="input-medium" value="<?php echo $rowsGSR1['bec_official_time'];?>"></td>
                                <td>入党时间：</td>
                                <td align="left"><input type="date" id="RD_datetime" title="RD_datetime" class="input-medium" value="<?php echo $rowsGSR1['RD_datetime'];?>"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <script>
            $("#FPmdRegular").on('click',function () {
                $.post(
                    "../back-end/ajax_footer_pmd_regular.php",
                    {
                      bec_officialmeet_ID:$("#bec_officialmeet_ID").val(),
                      ZZ_publicity_time:$("#ZZ_publicity_time").val(),
                      bec_official_time:$("#bec_official_time").val(),
                      RD_datetime:$("#RD_datetime").val(),
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
