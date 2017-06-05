<?php
require_once ("../config.php");

if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

        if(isset($_POST["submit"])&&$_POST["submit"]){
                    $sqlUpdateTea=" 
UPDATE `personnelinformation` 
SET 
`name`='".$_POST['name']."', /*姓名*/
`SQRD_time`='".($_POST["SQRD_time"]?$_POST["SQRD_time"]:"2000-01-01")."', /*申请入党时间*/
`sex`='".$_POST["sex"]."', /*性别*/
`LJJ_time`='".($_POST["LJJ_time"]?$_POST["LJJ_time"]:"2000-01-01")."',/*列积极分子时间*/
/*`native_place`='".$_POST['native_name']."',*//*籍贯*/
`nation`='".$_POST["nation"]."',/*民族*/
`Department_ID`='".$_POST["Department_ID"]."',/*所属组织*/
`state`='".$_POST["state"]."',/*状态*/
`edu`='".$_POST["edu"]."',/*学历*/
`strong_point`='".$_POST["strong_point"]."',/*特长*/
`tel`='".$_POST["tel"]."',/*电话*/
`reward_condtion`='".$_POST["reward_condtion"]."',/*获奖情况*/
`YorNwrong`='".$_POST["YorNwrong"]."',/*处分情况*/
`remark`='".$_POST["remark"]."',/*备注*/
`TC_and_BZ`='".$_POST["TC_and_BZ"]."',/*备注*/
`politics_status`='".$_POST['politics_status']."',/*政治面貌*/
`zip_code`='".$_POST["zip_code"]."'/*邮编*/
 WHERE `personnelinformation`.`ID_number` = '".$_POST["ID_number"]."'";
                    echo $sqlUpdateTea;
                    if(mysqli_query($db,$sqlUpdateTea)){
                        // echo "==插入成功==";
                        ?>
                        <script>
                            alert('添加成功！');
                            window.location="<?php echo $_POST['url']?>";
                        </script>
                        <?php
                    }
                    //echo $sqlAddStu;
                    ?>
                    <script>
                        //alert("数据不能为空！");
                        //window.location = "1_DRM_stu_list.php";
                    </script>
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
<form action="../footer/footer_pmd_applicant_tea.php" method="post" id="edit">
    <input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>">
<div class="btn-toolbar">
    <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="showAreaID()">
</div>
<div class="well">
    <div align="center">
      <table width="916" height="500" border="0">
  <tbody>
  <?php
  $sqlGetTeaR1="SELECT
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
  organization.name AS department_name/* 所属组织机构*/
FROM
  personnelinformation
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
WHERE ID_number='".$_GET["ID"]."'";
  if($resGTR1=mysqli_query($db,$sqlGetTeaR1)) {
      while ($rowsGTR1 = mysqli_fetch_assoc($resGTR1)) {
          ?>
          <tr>
              <td width="120">
                  <div align="right">姓名：</div>
              </td>
              <td width="201">
                  <input type="text" name="name" value="<?php echo $rowsGTR1["name"]; ?>" class="input-medium">
              </td>
              <td width="152">
                  <div align="right">申请入党时间：</div>
              </td>
              <td width="185">
                  <input type="date" name="SQRD_time" value="<?php echo $rowsGTR1["SQRD_time"]; ?>" class="input-medium"/>
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
                      <input type="radio" name="sex" value="0" id="sex_0" checked="checked"/> 男
                      <input type="radio" name="sex" value="1" id="sex_1"/>女
                      <?php
                  } else {
                      ?>
                      <input type="radio" name="sex" value="0" id="sex_0"/> 男
                      <input type="radio" name="sex" value="1" id="sex_1" checked="checked"/>女
                      <?php
                  }
                  ?>
              </td>
              <td>
                  <div align="right">列积极分子时间：</div>
              </td>
              <td>
                  <input type="date" name="LJJ_time" value="<?php echo $rowsGTR1["LJJ_time"]; ?>" class="input-medium"/>
              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">出生年月：</div>
              </td>
              <td>
                  <input type="month" name="datetime" value="<?php
                  echo substr($rowsGTR1["ID_number"], 6, 4).'-'.substr($rowsGTR1["ID_number"], 10, 2);
                  ?>" class="input-medium" readonly="readonly"/>
              </td>
              <td>
                  <div align="right">培养人：</div>
              </td>
              <td>
                  <input type="text" name="trainer" value="??" class="input-medium"/>
              </td>
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
                              if($rowsGTR1["nation"]==$rowsAN["nation"]){
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
                  <div align="right">所属组织：</div>
              </td>
              <td>
                  <select name="Department_ID" class="input-medium">
                      <?php
                      $sqlAllDepartment = "SELECT * FROM `organization`";
                      if ($resAD = mysqli_query($db, $sqlAllDepartment)) {
                          while ($rowsAD = mysqli_fetch_assoc($resAD)) {
                              if($rowsGTR1["Department_ID"]==$rowsAD["Department_ID"]){
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
          </tr>
          <tr>
              <td>
                  <div align="right">籍贯：</div>
              </td>
              <td>
                  <input type="text" href="#distPicker" role="button" data-toggle="modal" class="input-medium" name="native_name" id="getNativeName" readonly="readonly">
                  </td>
              <td>
                  <div align="right">行政职务：</div>
              </td>
              <td>
                  <select name="Adminis_fun" class="input-medium">
                      <?php
                      $sqlAllState = "SELECT * FROM state_bmb";
                      if ($resAS = mysqli_query($db, $sqlAllState)) {
                          while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                              if($rowsGTR1["state"]==$rowsAS["state"]){
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
          </tr>
          <tr>
              <td>
                  <div align="right">户口所在派出所：</div>
              </td>
              <td>
                  <input type="text" name="police_station" value="<?php echo $rowsGTR1["police_station_name"]; ?>" class="input-medium" placeholder="false">
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
                              if($rowsGTR1["state"]==$rowsAS["state"]){
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
              <td width="236" align="center">
                  <input type="file"/>
              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">家庭住址：</div>
              </td>
              <td>
                  <input type="text" name="address" value="<?php echo $rowsGTR1["home_add_name"] . $rowsGTR1["Home_Add_Detail"]; ?>" class="input-medium" placeholder="false">
              </td>
              <td rowspan="2">
                  <div align="right">获奖情况：</div>
              </td>
              <td rowspan="2">
                  <textarea form="edit" name="reward_condtion" title=""><?php echo $rowsGTR1["reward_condtion"]; ?></textarea>
              </td>
              <td width="236">

              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">身份证号：</div>
              </td>
              <td>
                  <input readonly="readonly" type="text" name="ID_number" value="<?php echo $rowsGTR1["ID_number"]; ?>" class="input-medium">
              </td>
              <td>
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
                              if($rowsGTR1["politics_status"]==$rowsAP["Politics_status"]){
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
                  <div align="right">处分情况：</div>
              </td>
              <td>
                      <?php
                      if ($rowsGTR1["YorNwrong"] == 0) {
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
                  <div align="right">学历：</div>
              </td>
              <td>
                  <select name="edu" class="input-medium">
                      <?php
                      $sqlAllEdu = "SELECT * FROM edu_bmb";
                      if ($resAE = mysqli_query($db, $sqlAllEdu)) {
                          while ($rowsAE = mysqli_fetch_assoc($resAE)) {
                              if($rowsGTR1["edu"]==$rowsAE["edu"]){
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
              <td rowspan="2">
                  <div align="right">突出表现和存在不足：</div>
              </td>
              <td rowspan="2">
                  <textarea form="edit" name="TC_and_BZ"><?php echo $rowsGTR1["TC_and_BZ"]; ?></textarea>
              </td>
              <td>

              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">个人特长：</div>
              </td>
              <td>
                  <input type="text" name="strong_point" value="<?php echo $rowsGTR1["strong_point"]; ?>" class="input-medium">
              </td>
              <td>

              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">联系电话：</div>
              </td>
              <td>
                  <input type="text" name="tel" value="<?php echo $rowsGTR1["tel"]; ?>" class="input-medium">
              </td>
              <td rowspan="2">
                  <div align="right">备注：</div>
              </td>
              <td rowspan="2">
                  <input type="text" name="remark" value="<?php echo $rowsGTR1["remark"]; ?>" class="input-medium"/>
              </td>
              <td>

              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">邮编：</div>
              </td>
              <td>
                  <input type="text" name="zip_code" value="<?php echo $rowsGTR1["zip_code"]; ?>" class="input-medium">
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
<!--选择籍贯-->
<div class="modal small hide fade" id="distPicker" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">选择籍贯</h3>
    </div>
    <div class="modal-body">
        <div data-toggle="distpicker">
            <select data-province="---- 选择省 ----"></select>
            <select data-city="---- 选择市 ----"></select>
            <select data-district="---- 选择区 ----"></select>
        </div>
        <div class="modal-footer">
            <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
            <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">确定</button>
        </div>
        <br/><br/><br/>
    </div>

</div>
