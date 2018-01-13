<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
session_id($_COOKIE["PHPSESSID"]);
if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

if(isset($_POST["submit"])&&$_POST["submit"]) {
            $sqlUpdateStu = "
UPDATE `personnelinformation` ,`excellentyouth`,`activist`
SET 
`name`='" . $_POST['name'] . "',                                                    /*姓名*/
`SQRD_time`='" . ($_POST["SQRD_time"] ? $_POST["SQRD_time"] : "0000-01-01") . "',   /*申请入党时间*/
`instructor_ID`='" . $_POST['instructor_ID'] . "',                                  /*辅导员*/
`sex`='" . $_POST["sex"] . "',                                                      /*性别*/
`floor_number`='" . $_POST["floor_number"] . "',                                    /*楼号*/
`dormitory_number`='" . $_POST["dormitory_number"] . "',                            /*寝室号*/
`bed_number`='" . $_POST["bed_number"] . "',                                        /*床号*/
`all_funkobject_amount`='" . $_POST["all_funkobject_amount"] . "',                  /*全学程挂科数*/
`LJJ_time`='" . ($_POST["LJJ_time"] ? $_POST["LJJ_time"] : "0000-01-01") . "',      /*列积极分子时间*/
`nation`='" . $_POST["nation"] . "',                                                /*民族*/
`police_station`='" . $_POST["police_station"] . "',                                /*派出所*/
`Department_ID`='" . $_POST["Department_ID"] . "',                                  /*所属组织*/
`state`='" . $_POST["state"] . "',                                                  /*状态*/
`edu`='" . $_POST["edu"] . "',                                                      /*学历*/
`strong_point`='" . $_POST["strong_point"] . "',                                    /*特长*/
`tel`='" . $_POST["tel"] . "',                                                      /*电话*/
`reward_condtion`='" . $_POST["reward_condtion"] . "',                              /*获奖情况*/
`YorNwrong`='" . $_POST["YorNwrong"] . "',                                          /*处分情况*/
`remark`='" . $_POST["remark"] . "',                                                /*备注*/
`TC_and_BZ`='" . $_POST["TC_and_BZ"] . "',                                          /*备注*/
`major`='" . $_POST["major"] . "',                                                  /*专业*/
`ranking`='" . $_POST["ranking"] . "',                                              /*排名*/
`politics_status`='" . $_POST['politics_status'] . "',                              /*政治面貌*/
`zip_code`='" . $_POST["zip_code"] . "',                                            /*邮编*/
`native_place`='".$_POST["native_place"]."',                                        /*籍贯*/

`activist`.`GZRX_date`='" . ($_POST["GZRX_date"] ? $_POST["GZRX_date"] : "0000-01-01") . "',/*高中入学日期*/
`activist`.`GZBY_date`='" . ($_POST["GZBY_date"] ? $_POST["GZBY_date"] : "0000-01-01") . "',/*高中入学日期*/
`excellentyouth`.`join_T_time`='" . ($_POST["join_T_time"]?$_POST["join_T_time"]:"0000-01-01") . "'/*入团时间*/

 WHERE `personnelinformation`.`ID_number` = '" . $_POST["ID_number"] . "' 
 AND `excellentyouth`.`ID_number`= '" . $_POST["ID_number"] . "'";
            echo $sqlUpdateStu;
            if (mysqli_query($db, $sqlUpdateStu)) {
                ?>
                <script>
                    alert('添加成功！');
                    window.location="<?php echo $_POST['url']?>";
                </script>
            <?php
                }
            ?>
            <script>
                //alert("数据不能为空！");
                //window.location = "1_DRM_stu_list.php";
            </script>
        <?php
}
?>
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

<form action="../footer/footer_pmd_applicant_stu.php?ID=<?php echo $_GET["ID"];?>" method="post" id="edit">
    <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
    <div class="btn-toolbar">
        <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="">
    </div>
<div class="well">
    <div align="center">
        <table width="916" height="500" border="0">
            <tbody>
            <?php
            $sqlGetStuR1="SELECT
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
            Pinfo.instructor_ID,
            Pinfo.major,
            Pinfo.nation,
            Pinfo.Department_ID,
            Pinfo.SQRD_time,
            Pinfo.LJJ_time,
            Pinfo.adminis_fun,
            Pinfo.state,
            Pinfo.tel,
            Pinfo.ranking,
            Pinfo.zip_code,
            Pinfo.all_funkobject_amount,
            Pinfo.floor_number,
            Pinfo.dormitory_number,
            Pinfo.bed_number,
            Pinfo.reward_condtion,
            Pinfo.remark,
            Pinfo.YorNwrong,
            Pinfo.TC_and_BZ,

            -- trainer
            excellentyouth.`join_T_time` AS join_T_time,/*入团时间*/
            activist.`GZRX_date` AS GZRX_date,/*高中入学日期*/
            activist.`GZBY_date` AS GZBY_date/*高中毕业日期*/
            FROM
            personnelinformation AS Pinfo
            LEFT JOIN excellentyouth
            ON excellentyouth.ID_number = Pinfo.ID_number
            LEFT JOIN `activist`
            ON `activist`.ID_number=Pinfo.ID_number
            WHERE Pinfo.ID_number='".$_GET["ID"]."'";
            if($resGSR1=mysqli_query($db,$sqlGetStuR1)) {
                while ($rowsGSR1 = mysqli_fetch_assoc($resGSR1)) {
                    ?>
                    <tr>
                        <td width="120">
                            <div align="right">姓名：</div>
                        </td>
                        <td width="201">
                            <input type="text" name="name" value="<?php echo $rowsGSR1["name"]; ?>" class="input-medium">
                        </td>
                        <td width="152">
                            <div align="right">辅导员：</div>
                        </td>
                        <td width="185">
                            <select name="instructor_ID" class="input-medium">
                                <?php
                                $sqlInstructorGroups="SELECT ID_number AS instructor_ID,name FROM personnelinformation WHERE instructor_mark=1";
                                GetSelectGroup($db,$rowsGSR1,$sqlInstructorGroups,"instructor_ID","name");
                                ?>
                            </select>
                        </td>
                        <td width="236" rowspan="5">
                            <img src="../images/photo.png" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">性别：</div>
                        </td>
                        <td>
                            <?php
                            if ($rowsGSR1["sex"] == 0) {
                                ?>
                                <input type="radio" name="sex" value="0" id="sex_0" checked="checked"/> 男
                                <input type="radio" name="sex" value="1" id="sex_1"/>女
                                <?php
                            }else{
                                ?>
                                <input type="radio" name="sex" value="0" id="sex_0" /> 男
                                <input type="radio" name="sex" value="1" id="sex_1" checked="checked"/>女
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <div align="right">专业：</div>
                        </td>
                        <td>
                            <select name="major" class="input-medium">
                                <?php
                                GetSelectGroup($db,$rowsGSR1,"SELECT major,major_name FROM major_bmb","major","major_name");
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">出生年月：</div>
                        </td>
                        <td>
                            <input type="month" name="datetime" value="<?php
                            echo substr($rowsGSR1["ID_number"], 6, 4).'-'.substr($rowsGSR1["ID_number"], 10, 2);
                            ?>" class="input-medium" readonly="readonly"/>
                        </td>
                        <td>
                            <div align="right">高中入学日期：</div>
                        </td>
                        <td><input type="date" name="GZRX_date" value="<?php echo $rowsGSR1["GZRX_date"]; ?>" class="input-medium"/></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">民族：</div>
                        </td>
                        <td>
                            <select name="nation" class="input-medium">
                                <?php
                                $sqlAllNation = "SELECT * FROM nation_bmb";
                                GetSelectGroup($db,$rowsGSR1,$sqlAllNation,"nation","nation_name");
                                ?>
                            </select>
                        </td>
                        <td>
                            <div align="right">高中毕业日期：</div>
                        </td>
                        <td><input type="date" name="GZBY_date" value="<?php echo $rowsGSR1["GZBY_date"]; ?>" class="input-medium"></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">籍贯：</div>
                        </td>
                        <td>
                            <input type="text" onclick="setPCD('getNativeName')" value="<?php echo $rowsGSR1["native_place"]; ?>" href="#distPicker" role="button" data-toggle="modal" class="input-medium" name="native_place" id="getNativeName" readonly="readonly">
<?php
if($rowsGSR1["native_place"]==""){
    $PCDArray = array('—— 省 ——','—— 市 ——','—— 区 ——');
    }else{
    $PCDArray=explode('-',$rowsGSR1["native_place"]);//分割籍贯
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
                                        <select id="selectP" data-province="<?php echo $PCDArray[0];?>"></select>
                                        <select id="selectC" data-city="<?php echo $PCDArray[1];?>"></select>
                                        <select id="selectD" data-district="<?php echo $PCDArray[2];?>"></select>
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
                            <div align="right">入团时间：</div>
                        </td>
                        <td>
                            <input type="date" name="join_T_time" value="<?php echo $rowsGSR1["join_T_time"]; ?>" class="input-medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">户口所在派出所：</div>
                        </td>
                        <td>
                            <input type="text" name="police_station" value="<?php echo $rowsGSR1["police_station"]; ?>" class="input-medium">
                        </td>
                        <td>
                            <div align="right">申请入党时间：</div>
                        </td>
                        <td>
                            <input type="date" name="SQRD_time" value="<?php echo $rowsGSR1["SQRD_time"]; ?>" class="input-medium">
                        </td>
                        <td width="236" align="center">
                            <input type="file" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">家庭住址：</div>
                        </td>
                        <td>
                            <input type="text" name="Home_Add" value="<?php echo $rowsGSR1["Home_Add"]; ?>" class="input-medium">
                        </td>
                        <td>
                            <div align="right">列积极分子时间：</div>
                        </td>
                        <td>
                            <input type="date" name="LJJ_time" value="<?php echo $rowsGSR1["LJJ_time"]; ?>" class="input-medium"/>
                        </td>
                        <td width="236">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">身份证号：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="ID_number"
                                   readonly="readonly"
                                   value="<?php echo $rowsGSR1["ID_number"]; ?>"
                                   class="input-medium">
                        </td>
                        <td>
                            <div align="right">培养人：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="trainer" value="??"
                                   class="input-medium"/>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">政治面貌：</div>
                        </td>
                        <td>
                            <select name="politics_status" class="input-medium">
                                <?php
                                $sqlAllPolity = "SELECT * FROM polity_bmb";
                                GetSelectGroup($db,$rowsGSR1,$sqlAllPolity,"politics_status","name");
                                ?>
                            </select>
                        </td>
                        <td>
                            <div align="right">所属组织：</div>
                        </td>
                        <td>
                            <select name="Department_ID" class="input-medium">
                                <?php
                                $sqlAllDepartment = "SELECT * FROM `organization`";
                                GetSelectGroup($db,$rowsGSR1,$sqlAllDepartment,"Department_ID","name");
                                
                                ?>
                            </select>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">学历：</div>
                        </td>
                        <td>
                            <select name="edu" class="input-medium">
                                <?php
                                $sqlAllEdu = "SELECT * FROM edu_bmb";
                                if ($resAE = mysqli_query($db, $sqlAllEdu)) {
                                    while ($rowsAE = mysqli_fetch_assoc($resAE)) {
                                        if($rowsGSR1["edu"]==$rowsAE["edu"]){
                                            ?>
                                            <option selected="true" value="<?php echo $rowsAE["edu"]; ?>"><?php echo $rowsAE["edu_name"]; ?></option>
                                            <?php

                                        }else{
                                            ?>
                                            <option value="<?php echo $rowsAE["edu"]; ?>"><?php echo $rowsAE["edu_name"]; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <div align="right">行政职务：</div>
                        </td>
                        <td>
                            <select name="Adminis_fun" class="input-medium">
                                <option value="0">无</option>
                                <option value="1">党委书记</option>
                                <option value="2">党委副书记</option>
                                <option value="3">党委组织委员</option>
                                <option value="4">党委宣传委员</option>
                                <option value="5">党委群工委员</option>
                                <option value="6">党委体育委员</option>
                                <option value="7">党支部书记</option>
                                <option value="8">党支部组织委员</option>
                                <option value="9">党支部宣传委员</option>
                                <option value="10">党小组</option>
                            </select>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">个人特长：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="strong_point"
                                   value="<?php echo $rowsGSR1["strong_point"]; ?>"
                                   class="input-medium">
                        </td>
                        <td>
                            <div align="right">状态：</div>
                        </td>
                        <td>
                            <select name="state" class="input-medium">
                                <?php
                                        switch($rowsGSR1["state"]){
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
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">联系电话：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="tel"
                                   value="<?php echo $rowsGSR1["tel"]; ?>"
                                   class="input-medium">
                        </td>
                        <td>
                            <div align="right">排名：</div>
                        </td>
                        <td>
                            <input type="number" name="ranking" step="0.001" min="0" value="<?php echo $rowsGSR1["ranking"]?$rowsGSR1["ranking"]:0; ?>" class="input-medium">
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">邮编：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="zip_code"
                                   value="<?php echo $rowsGSR1["zip_code"]; ?>"
                                   class="input-medium">
                        </td>
                        <td>
                            <div align="right">挂科数：</div>
                        </td>
                        <td>
                            <input type="number" name="all_funkobject_amount" value="<?php echo $rowsGSR1["all_funkobject_amount"]; ?>" class="input-medium">
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">寝室楼号：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="floor_number"
                                   value="<?php echo $rowsGSR1["floor_number"]; ?>"
                                   class="input-medium">
                        </td>
                        <td rowspan="2">
                            <div align="right">获奖情况：</div>
                        </td>
                        <td rowspan="2">
                            <textarea form="edit" name="reward_condtion" ><?php echo $rowsGSR1["reward_condtion"]; ?></textarea>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">寝室号：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="dormitory_number"
                                   value="<?php echo $rowsGSR1["dormitory_number"]; ?>"
                                   class="input-medium">
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">床号：</div>
                        </td>
                        <td>
                            <input type="text" name="bed_number" value="<?php echo $rowsGSR1["bed_number"]; ?>" class="input-medium">
                        </td>
                        <td>
                            <div align="right">处分情况：</div>
                        </td>
                        <td>
                            <?php
                            if ($rowsGSR1["YorNwrong"] == 0) {
                                ?>
                                <input type="radio" name="YorNwrong" value="0" id="sex_0" checked="checked"/>否 
                                <input type="radio" name="YorNwrong" value="1" id="sex_1"/>是
                                <?php
                            } else {
                                ?>
                                <input type="radio" name="YorNwrong" value="0" id="sex_0"/> 否
                                <input type="radio" name="YorNwrong" value="1" id="sex_1" checked="checked"/>是
                                <?php
                            }
                            ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">备注：</div>
                        </td>
                        <td>
                            <input type="text"
                                   name="remark"
                                   value="<?php echo $rowsGSR1["remark"]; ?>"
                                   class="input-medium" />
                        </td>
                        <td rowspan="2">
                            <div align="right">突出表现和存在不足：</div>
                        </td>
                        <td rowspan="2">
                            <textarea form="edit" name="TC_and_BZ" ><?php echo $rowsGSR1["TC_and_BZ"]; ?></textarea>
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
</form>