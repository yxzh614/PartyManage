<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){
            ?>

                <div class="btn-toolbar">
                    <button class="btn btn-primary" id="FPmdApplicantTea">保存</button>
                    <div id="back"></div>
                </div>
                <div class="well">
                    <div align="center">
                        <table width="916" height="500" border="0">
                            <tbody>
                            <?php
                            $sqlGetTeaR1="SELECT
  Pinfo.ID_number,
  Pinfo.name,
  Pinfo.sex,
  Pinfo.nation,
  Pinfo.native_place,
  Pinfo.police_station,
  Pinfo.Home_Add,
  Pinfo.politics_status,
  Pinfo.edu,
  Pinfo.strong_point,
  Pinfo.tel,
  Pinfo.zip_code,
  
  Pinfo.SQRD_time,
  Pinfo.LJJ_time,
  Pinfo.Department_ID,
  Pinfo.adminis_fun,
  Pinfo.state,
  Pinfo.reward_condtion,
  Pinfo.YorNwrong,
  Pinfo.TC_and_BZ,
  Pinfo.remark
FROM
  personnelinformation AS Pinfo
WHERE ID_number='".$_GET["ID"]."'";
                            if($resGTR1=mysqli_query($db,$sqlGetTeaR1)) {
                                while ($rowsGTR1 = mysqli_fetch_assoc($resGTR1)) {
                                    ?>
                                    <tr>
                                        <td width="120">
                                            <div align="right">姓名：</div>
                                        </td>
                                        <td width="201">
                                            <input title="" type="text" id="name" value="<?php echo $rowsGTR1["name"]; ?>" class="input-medium">
                                        </td>
                                        <td width="152">
                                            <div align="right">申请入党时间：</div>
                                        </td>
                                        <td width="185">
                                            <input title="" type="date" id="SQRD_time" value="<?php echo $rowsGTR1["SQRD_time"]; ?>" class="input-medium"/>
                                        </td>
                                        <td width="236" rowspan="5">
                                            <img src="../images/photo.png"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">性别：</div>
                                        </td>
                                        <td>
                                            <?php
                                            if ($rowsGTR1["sex"] == 0) {
                                                ?>
                                                <input title="" type="radio" name="sex" value="0" id="sex_0" checked="checked"/> 男
                                                <input title="" type="radio" name="sex" value="1" id="sex_1"/>女
                                                <?php
                                            } else {
                                                ?>
                                                <input title="" type="radio" name="sex" value="0" id="sex_0"/> 男
                                                <input title="" type="radio" name="sex" value="1" id="sex_1" checked="checked"/>女
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div align="right">列积极分子时间：</div>
                                        </td>
                                        <td>
                                            <input  title="" type="date" id="LJJ_time" value="<?php echo $rowsGTR1["LJJ_time"]; ?>" class="input-medium"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">出生年月：</div>
                                        </td>
                                        <td>
                                            <input title="" type="month" id="datetime" value="<?php
                                            echo substr($rowsGTR1["ID_number"], 6, 4).'-'.substr($rowsGTR1["ID_number"], 10, 2);
                                            ?>" class="input-medium" readonly="readonly"/>
                                        </td>
                                        <td>
                                            <div align="right">培养人：</div>
                                        </td>
                                        <td>
                                            <input title="" type="text" id="trainer" value="??" class="input-medium"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">民族：</div>
                                        </td>
                                        <td>
                                            <select title="" id="nation" class="input-medium">
                                                <?php
                                                $sqlAllNation = "SELECT * FROM nation_bmb";
                                                GetSelectGroup($db,$rowsGTR1,$sqlAllNation,"nation","nation_name");
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <div align="right">所属组织：</div>
                                        </td>
                                        <td>
                                            <select title="" id="Department_ID" class="input-medium">
                                                <?php
                                                $sqlAllDepartment = "SELECT * FROM `organization`";
                                                GetSelectGroup($db,$rowsGTR1,$sqlAllDepartment,"Department_ID","name");
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">籍贯：</div>
                                        </td>
                                        <td>
                                            <input title="" type="text" onclick="setPCD('getNativeName')" value="<?php echo $rowsGTR1["native_place"]; ?>" href="#distPicker" role="button" data-toggle="modal" class="input-medium" name="native_place" id="getNativeName" readonly="readonly">
                                            <?php
                                            if($rowsGTR1["native_place"]==""){
                                                $PCDArray = array('—— 省 ——','—— 市 ——','—— 区 ——');
                                            }else{
                                                $PCDArray=explode('-',$rowsGTR1["native_place"]);//分割籍贯
                                            }
                                            ?>
                                            <!--选择籍贯-->
                                            <div class="modal small hide fade" id="distPicker" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 id="myModalLabel">选择籍贯</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div data-toggle="distpicker">
                                                        <select title="" id="selectP" data-province="<?php echo $PCDArray[0];?>"></select>
                                                        <select title="" id="selectC" data-city="<?php echo $PCDArray[1];?>"></select>
                                                        <select title="" id="selectD" data-district="<?php echo $PCDArray[2];?>"></select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                                                        <button class="btn btn-danger" id="btn_change_sava" onclick="getPCD('getNativeName')" data-dismiss="modal">确定</button>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div align="right">行政职务：</div>
                                        </td>
                                        <td>
                                            <select title="" id="state" class="input-medium">
                                                <?php
                                                switch($rowsGTR1["state"]){
                                                    case 1:{
                                                        ?>
                                                        <option selected="selected" value="1">在校</option>
                                                        <option value="2">毕业</option>
                                                        <option value="3">调出</option>
                                                        <?php
                                                    }break;
                                                    case 2:{
                                                        ?>
                                                        <option value="1">在校</option>
                                                        <option selected="selected" value="2">毕业</option>
                                                        <option value="3">调出</option>
                                                        <?php
                                                    }break;
                                                    case 3:{
                                                        ?>
                                                        <option value="1">在校</option>
                                                        <option value="2">毕业</option>
                                                        <option selected="selected" value="3">调出</option>
                                                        <?php
                                                    }break;
                                                    default:{
                                                        ?>
                                                        <option selected="selected" value="1">在校</option>
                                                        <option value="2">毕业</option>
                                                        <option value="3">调出</option>
                                                        <?php
                                                    }break;
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">户口所在派出所：</div>
                                        </td>
                                        <td>
                                            <input type="text" id="police_station" value="<?php echo $rowsGTR1["police_station"]; ?>" class="input-medium" placeholder="false">
                                        </td>
                                        <td>
                                            <div align="right">状态：</div>
                                        </td>
                                        <td>
                                            <select title="" id="state" class="input-medium">
                                                <?php
                                                switch($rowsGTR1["state"]){
                                                    case 1:{
                                                        ?>
                                                        <option selected="selected" value="1">在校</option>
                                                        <option value="2">毕业</option>
                                                        <option value="3">调出</option>
                                                        <?php
                                                    }break;
                                                    case 2:{
                                                        ?>
                                                        <option value="1">在校</option>
                                                        <option selected="selected" value="2">毕业</option>
                                                        <option value="3">调出</option>
                                                        <?php
                                                    }break;
                                                    case 3:{
                                                        ?>
                                                        <option value="1">在校</option>
                                                        <option value="2">毕业</option>
                                                        <option selected="selected" value="3">调出</option>
                                                        <?php
                                                    }break;
                                                    default:{
                                                        ?>
                                                        <option selected="selected" value="1">在校</option>
                                                        <option value="2">毕业</option>
                                                        <option value="3">调出</option>
                                                        <?php
                                                    }break;
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td width="236" align="center">
                                            <input type="file"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">家庭住址：</div>
                                        </td>
                                        <td>
                                            <input type="text" id="address" value="<?php echo $rowsGTR1["Home_Add"]; ?>" class="input-medium" placeholder="false">
                                        </td>
                                        <td rowspan="2">
                                            <div align="right">获奖情况：</div>
                                        </td>
                                        <td rowspan="2">
                                            <textarea form="edit" id="reward_condtion" title=""><?php echo $rowsGTR1["reward_condtion"]; ?></textarea>
                                        </td>
                                        <td width="236">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">身份证号：</div>
                                        </td>
                                        <td>
                                            <input title="" readonly="readonly" type="text" id="ID_number" value="<?php echo $rowsGTR1["ID_number"]; ?>" class="input-medium">
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">政治面貌：</div>
                                        </td>
                                        <td>
                                            <select title="" id="politics_status" class="input-medium">
                                                <?php
                                                $sqlAllPolity = "SELECT * FROM polity_bmb";
                                                GetSelectGroup($db,$rowsGTR1,$sqlAllPolity,"politics_status","name");
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <div align="right">处分情况：</div>
                                        </td>
                                        <td>
                                            <?php
                                            if ($rowsGTR1["YorNwrong"] == 0) {
                                                ?>
                                                <input title="" type="radio" name="YorNwrong" value="0" id="sex_0" checked="checked"/> 是
                                                <input title="" type="radio" name="YorNwrong" value="1" id="sex_1"/>否
                                                <?php
                                            } else {
                                                ?>
                                                <input title="" type="radio" name="YorNwrong" value="0" id="sex_0"/> 是
                                                <input title="" type="radio" name="YorNwrong" value="1" id="sex_1" checked="checked"/>否
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">学历：</div>
                                        </td>
                                        <td>
                                            <select title="" id="edu" class="input-medium">
                                                <?php
                                                $sqlAllEdu = "SELECT * FROM edu_bmb";
                                                GetSelectGroup($db,$rowsGTR1,$sqlAllEdu,"edu","edu_name");
                                                ?>
                                            </select>
                                        </td>
                                        <td rowspan="2">
                                            <div align="right">突出表现和存在不足：</div>
                                        </td>
                                        <td rowspan="2">
                                            <textarea title="" form="edit" id="TC_and_BZ"><?php echo $rowsGTR1["TC_and_BZ"]; ?></textarea>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">个人特长：</div>
                                        </td>
                                        <td>
                                            <input title="" type="text" id="strong_point" value="<?php echo $rowsGTR1["strong_point"]; ?>" class="input-medium">
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">联系电话：</div>
                                        </td>
                                        <td>
                                            <input title="" type="text" id="tel" value="<?php echo $rowsGTR1["tel"]; ?>" class="input-medium">
                                        </td>
                                        <td rowspan="2">
                                            <div align="right">备注：</div>
                                        </td>
                                        <td rowspan="2">
                                            <input title="" type="text" id="remark" value="<?php echo $rowsGTR1["remark"]; ?>" class="input-medium"/>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="right">邮编：</div>
                                        </td>
                                        <td>
                                            <input title="" type="text" id="zip_code" value="<?php echo $rowsGTR1["zip_code"]; ?>" class="input-medium">
                                        </td>
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
                </div>
        <script>
            $("#FPmdApplicantTea").on('click',function () {
                $.post(
                    "../back-end/ajax_footer_pmd_applicant_tea.php",
                    {
                        name:$("#name").val(),
                        SQRD_time:$("#SQRD_time").val(),
                        sex:$('input[name="sex"]:checked').val(),
                        LJJ_time:$("#LJJ_time").val(),
                        nation:$("#nation").val(),
                        Department_ID:$("#Department_ID").val(),
                        state:$("#state").val(),
                        edu:$("#edu").val(),
                        strong_point:$("#strong_point").val(),
                        tel:$("#tel").val(),
                        reward_condtion:$("#reward_condtion").val(),
                        YorNwrong:$("input[name='YorNwrong']:checked").val(),
                        remark:$("#remark").val(),
                        TC_and_BZ:$("#TC_and_BZ").val(),
                        politics_status:$("#politics_status").val(),
                        zip_code:$("#zip_code").val(),
                        native_place:$("#getNativeName").val(),
                        ID_number:$("#ID_number").val(),
                    },
                    function (data) {
                        //$("#back").html(data);
                        alert("保存成功！");
                    };
                )
            });
        </script>
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
?>

