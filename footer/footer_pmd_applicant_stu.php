<?php
require_once ("../config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
session_id($_COOKIE["PHPSESSID"]);
if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

if(isset($_POST["submit"])&&$_POST["submit"]) {
            $sqlUpdateStu = "
UPDATE `personnelinformation` ,`excellentyouth`,`activist`
SET 
`name`='" . $_POST['name'] . "', /*姓名*/
`SQRD_time`='" . ($_POST["SQRD_time"] ? $_POST["SQRD_time"] : "0000-01-01") . "', /*申请入党时间*/
`sex`='" . $_POST["sex"] . "', /*性别*/
`floor_number`='" . $_POST["floor_number"] . "', /*楼号*/
`dormitory_number`='" . $_POST["dormitory_number"] . "', /*寝室号*/
`bed_number`='" . $_POST["bed_number"] . "', /*床号*/
`all_funkobject_amount`='" . $_POST["all_funkobject_amount"] . "', /*全学程挂科数*/
`LJJ_time`='" . ($_POST["LJJ_time"] ? $_POST["LJJ_time"] : "0000-01-01") . "',/*列积极分子时间*/
/*`native_place`='" . $_POST['native_name'] . "',*//*籍贯*/
`nation`='" . $_POST["nation"] . "',/*民族*/
`Department_ID`='" . $_POST["Department_ID"] . "',/*所属组织*/
`state`='" . $_POST["state"] . "',/*状态*/
`edu`='" . $_POST["edu"] . "',/*学历*/
`strong_point`='" . $_POST["strong_point"] . "',/*特长*/
`tel`='" . $_POST["tel"] . "',/*电话*/
`reward_condtion`='" . $_POST["reward_condtion"] . "',/*获奖情况*/
`YorNwrong`='" . $_POST["YorNwrong"] . "',/*处分情况*/
`remark`='" . $_POST["remark"] . "',/*备注*/
`TC_and_BZ`='" . $_POST["TC_and_BZ"] . "',/*备注*/
`major`='" . $_POST["major"] . "',/*专业*/
`ranking`='" . $_POST["ranking"] . "',/*排名*/
`politics_status`='" . $_POST['politics_status'] . "',/*政治面貌*/
`zip_code`='" . $_POST["zip_code"] . "',/*邮编*/

`activist`.`GZRX_date`='" . ($_POST["GZRX_date"] ? $_POST["GZRX_date"] : "0000-01-01") . "',/*高中入学日期*/
`activist`.`GZBY_date`='" . ($_POST["GZBY_date"] ? $_POST["GZBY_date"] : "0000-01-01") . "',/*高中入学日期*/

`excellentyouth`.`join_T_time`='" . $_POST["join_T_time"] . "'/*入团时间*/

 WHERE `personnelinformation`.`ID_number` = '" . $_POST["ID_number"] . "' 
 AND `excellentyouth`.`ID_number`= '" . $_POST["ID_number"] . "'
 ";
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

<form action="../Right_1/1_pmd_applicant_stu.php?ID=<?php echo $_GET["ID"];?>" method="post" id="edit">
    <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
    <div class="btn-toolbar">
        <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="showAreaID()">
    </div>
<div class="well">
    <div align="center">
        <table width="916" height="500" border="1">
            <tbody>
            <?php
            $sqlGetStuR1="SELECT
personnelinformation.*,
person_cate1_bmb.Person_cate1_name AS p1name,/* 类别1*/
person_cate2_bmb.person_cate2_name AS p2name,/* 类别2*/ 
major_bmb.major_name AS major_name,/* 专业*/
nation_bmb.nation_name AS nation_name,/* 民族*/
native_bmb.place_name AS native_name,/* 籍贯*/
polity_bmb.name AS polity_name,/* 政治面貌*/
language_bmb.language_name AS language_name,/* 外语语种*/
edu_bmb.edu_name AS edu_name,/* 学历*/
degree_bmb.degree_name AS degree_name,/* 学位*/
home_add_bmb.place_name AS home_add_name,/* 家庭住址所在地*/
police_station_bmb.place_name AS police_station_name,/* 户口所在派出所*/
  organization.name AS department_name,/* 所属组织机构*/
excellentyouth.`join_T_time` AS join_T_time,/*入团时间*/
`activist`.`GZRX_date` AS GZRX_date,/*高中入学日期*/
`activist`.`GZBY_date` AS GZBY_date/*高中毕业日期*/
FROM
personnelinformation
LEFT JOIN excellentyouth
ON excellentyouth.ID_number = personnelinformation.ID_number
LEFT JOIN person_cate1_bmb
ON person_cate1_bmb.Person_cate1_ = personnelinformation.person_cate1
LEFT JOIN person_cate2_bmb
ON person_cate2_bmb.person_cate2_ = personnelinformation.person_cate2
LEFT JOIN major_bmb
ON major_bmb.major = personnelinformation.major
LEFT JOIN nation_bmb
ON nation_bmb.nation = personnelinformation.nation
LEFT JOIN home_place_bmb AS native_bmb
ON native_bmb.place = personnelinformation.native_place
LEFT JOIN polity_bmb
ON polity_bmb.Politics_status = personnelinformation.politics_status
LEFT JOIN language_bmb
ON language_bmb.language = personnelinformation.language
LEFT JOIN edu_bmb
ON edu_bmb.edu = personnelinformation.edu
LEFT JOIN degree_bmb
ON degree_bmb.degree = personnelinformation.degree
LEFT JOIN home_place_bmb AS home_add_bmb
ON home_add_bmb.place = personnelinformation.Home_Add
LEFT JOIN home_place_bmb AS police_station_bmb
ON police_station_bmb.place = personnelinformation.police_station
LEFT JOIN organization
ON `organization`.Department_ID=personnelinformation.Department_ID
LEFT JOIN `activist`
ON `activist`.ID_number=personnelinformation.ID_number
WHERE personnelinformation.ID_number='".$_GET["ID"]."'";
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
                            <input type="text" name="instructor_ID" value="<?php echo $rowsGSR1["instructor_ID"]; ?>" class="input-medium">
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
                                $sqlAllMajor="SELECT * FROM major_bmb";
                                if($resAM=mysqli_query($db,$sqlAllMajor)){
                                    while($rowsAM=mysqli_fetch_assoc($resAM)){
                                        if($rowsGSR1["major"]==$rowsAM["major"]){
                                            ?>
                                            <option selected="selected" value="<?php echo $rowsAM["major"]; ?>"><?php echo $rowsAM["major_name"]; ?></option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?php echo $rowsAM["major"]; ?>"><?php echo $rowsAM["major_name"]; ?></option>
                                            <?php
                                        }
                                    }
                                }
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
                                if ($resAN = mysqli_query($db, $sqlAllNation)) {
                                    while ($rowsAN = mysqli_fetch_assoc($resAN)) {
                                        if($rowsGSR1["nation"]==$rowsAN["nation"]){
                                            ?>
                                            <option selected="true" value="<?php echo $rowsAN["nation"]; ?>"><?php echo $rowsAN["nation_name"];?></option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?php echo $rowsAN["nation"]; ?>"><?php echo $rowsAN["nation_name"]; ?></option>
                                            <?php
                                        }
                                    }
                                }
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
                            <select name="native_name" class="input-medium">
                                <option value="0">辽宁</option>
                                <option value="1">河北</option>
                                <option value="2">黑龙江</option>
                            </select>
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
                            <div align="right"></div>
                        </td>
                        <td>
                            <select name="city" class="input-medium">
                                <option value="0">沈阳</option>
                                <option value="1">本溪</option>
                            </select>
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
                            <div align="right"></div>
                        </td>
                        <td>
                            <select name="district" class="input-medium">
                                <option value="0">浑南新区</option>
                                <option value="1">皇姑区</option>
                            </select>
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
                            <div align="right">户口所在派出所：</div>
                        </td>
                        <td>
                            <input type="text" name="police_station" value="<?php echo $rowsGSR1["police_station_name"]; ?>" class="input-medium">
                        </td>
                        <td>
                            <div align="right">培养人：</div>
                        </td>
                        <td>
                            <input type="text" name="trainer" value="??" class="input-medium"/>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">家庭住址：</div>
                        </td>
                        <td>
                            <input type="text" name="address" value="<?php echo $rowsGSR1["home_add_name"] . $rowsGSR1["Home_Add_Detail"]; ?>" class="input-medium">
                        </td>
                        <td>
                            <div align="right">所属组织：</div>
                        </td>
                        <td>
                            <select name="Department_ID" class="input-medium">
                                <?php
                                $sqlAllDepartment = "SELECT * FROM `organization`";
                                if ($resAD = mysqli_query($db, $sqlAllDepartment)) {
                                    while ($rowsAD = mysqli_fetch_assoc($resAD)) {
                                        if($rowsGSR1["Department_ID"]==$rowsAD["Department_ID"]){
                                            ?>
                                            <option selected="true" value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["name"]; ?></option>
                                            <?php

                                        }else{
                                            ?>
                                            <option value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["name"]; ?></option>
                                            <?php

                                        }
                                    }
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
                            <div align="right">身份证号：</div>
                        </td>
                        <td>
                            <input type="text" name="ID_number" value="<?php echo $rowsGSR1["ID_number"]; ?>" class="input-medium">
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
                            <div align="right">政治面貌：</div>
                        </td>
                        <td>
                            <select name="politics_status" class="input-medium">
                                <?php
                                $sqlAllPolity = "SELECT * FROM polity_bmb";
                                if ($resAP = mysqli_query($db, $sqlAllPolity)) {
                                    while ($rowsAP = mysqli_fetch_assoc($resAP)) {
                                        if($rowsGSR1["politics_status"]==$rowsAP["Politics_status"]){
                                            ?>
                                            <option selected="true" value="<?php echo $rowsAP["Politics_status"]; ?>"><?php echo $rowsAP["name"]; ?></option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?php echo $rowsAP["Politics_status"]; ?>"><?php echo $rowsAP["name"]; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <div align="right">状态：</div>
                        </td>
                        <td>
                            <select name="state" class="input-medium">
                                <?php
                                $sqlAllState = "SELECT * FROM state_bmb";
                                if ($resAS = mysqli_query($db, $sqlAllState)) {
                                    while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                                        if($rowsGSR1["state"]==$rowsAS["state"]){
                                            ?>
                                            <option selected="true" value="<?php echo $rowsAS["state"]; ?>"><?php echo $rowsAS["state_name"]; ?></option>
                                            <?php

                                        }else{
                                            ?>
                                            <option value="<?php echo $rowsAS["state"]; ?>"><?php echo $rowsAS["state_name"]; ?></option>
                                            <?php

                                        }
                                    }
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
                            <div align="right">排名：</div>
                        </td>
                        <td>
                            <input type="number" name="ranking" step="0.001" min="0" value="<?php echo $rowsGSR1["ranking"]; ?>" class="input-medium">
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
                            <input type="text" name="strong_point" value="<?php echo $rowsGSR1["strong_point"]; ?>" class="input-medium">
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
                            <div align="right">联系电话：</div>
                        </td>
                        <td>
                            <input type="text" name="tel" value="<?php echo $rowsGSR1["tel"]; ?>" class="input-medium">
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
                            <div align="right">邮编：</div>
                        </td>
                        <td>
                            <input type="text" name="zip_code" value="<?php echo $rowsGSR1["zip_code"]; ?>" class="input-medium">
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">寝室楼号：</div>
                        </td>
                        <td>
                            <input type="text" name="floor_number" value="<?php echo $rowsGSR1["floor_number"]; ?>" class="input-medium">
                        </td>
                        <td>
                            <div align="right">处分情况：</div>
                        </td>
                        <td>
                            <?php
                            if ($rowsGSR1["YorNwrong"] == 0) {
                                ?>
                                <input type="radio" name="YorNwrong" value="0" id="sex_0" checked="checked"/> 是
                                <input type="radio" name="YorNwrong" value="1" id="sex_1"/>否
                                <?php
                            } else {
                                ?>
                                <input type="radio" name="YorNwrong" value="0" id="sex_0"/> 是
                                <input type="radio" name="YorNwrong" value="1" id="sex_1" checked="checked"/>否
                                <?php
                            }
                            ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">寝室号：</div>
                        </td>
                        <td>
                            <input type="text" name="dormitory_number" value="<?php echo $rowsGSR1["dormitory_number"]; ?>" class="input-medium">
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
                    <tr>
                        <td>
                            <div align="right">床号：</div>
                        </td>
                        <td>
                            <input type="text" name="bed_number" value="<?php echo $rowsGSR1["bed_number"]; ?>" class="input-medium">
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">备注：</div>
                        </td>
                        <td>
                            <input type="text" name="remark" value="<?php echo $rowsGSR1["remark"]; ?>" class="input-medium" />
                        </td>
                        <td>
                            <div align="right"></div>
                        </td>
                        <td>

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