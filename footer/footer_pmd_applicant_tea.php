

<form action="../Right_1/1_pmd_applicant_tea.php?ID=<?php echo $_GET["ID"];?>" method="post" id="edit">
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
  department_id_bmb.Department AS department_name/* 所属组织机构*/
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
LEFT JOIN department_id_bmb
ON department_id_bmb.Department_ID=personnelinformation.Department_ID
WHERE ID_number='".$_GET["ID"]."'";
  if($resGTR1=mysqli_query($db,$sqlGetTeaR1)) {
      while ($rowsGTR1 = mysqli_fetch_assoc($resGTR1)) {
          $prov=substr($rowsGTR1["native_name"],0,2);
          $city=substr($rowsGTR1["native_name"],2,2);
          $dist=substr($rowsGTR1["native_name"],4,2);
          ?>
          <script>
              $(function (){
                  initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '<?php echo $prov?>', '<?php echo $city?>', '<?php echo $dist?>');
              });
          </script>
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
              <td width="185"><input type="date" name="SQRD_time" value="<?php echo $rowsGTR1["SQRD_time"]; ?>"
                                     class="input-medium"/></td>
              <td width="236" rowspan="5"><img src="../images/photo.png"/></td>
          </tr>
          <tr>
              <td>
                  <div align="right">性别：</div>
              </td>
              <td> <?php
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
                  ?></td>
              <td>
                  <div align="right">列积极分子时间：</div>
              </td>
              <td><input type="date" name="LJJ_time" value="<?php echo $rowsGTR1["LJJ_time"]; ?>" class="input-medium"/>
              </td>
          </tr>
          <tr>
              <td>
                  <div align="right">出生年月：</div>
              </td>
              <td><input type="month" name="datetime" value="<?php echo substr($rowsGTR1["ID_number"], 6, 4).'-'.substr($rowsGTR1["ID_number"], 10, 2); ?>"
                         class="input-medium" readonly="true"/></td>
              <td>
                  <div align="right">培养人：</div>
              </td>
              <td><input type="text" name="trainer" value="??" class="input-medium"/></td>
          </tr>
          <tr>
              <td>
                  <div align="right">民族：</div>
              </td>
              <td><select name="nation" class="input-medium">
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
                  </select></td>
              <td>
                  <div align="right">所属组织：</div>
              </td>
              <td><select name="Department_ID" class="input-medium">
                      <?php
                      $sqlAllDepartment = "SELECT * FROM department_id_bmb";
                      if ($resAD = mysqli_query($db, $sqlAllDepartment)) {
                          while ($rowsAD = mysqli_fetch_assoc($resAD)) {
                              if($rowsGTR1["Department_ID"]==$rowsAD["Department_ID"]){
                                  ?>
                                  <option selected="true" value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["Department"]; ?></option>
                                  <?php

                              }else{
                                  ?>
                                  <option value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["Department"]; ?></option>
                                  <?php

                              }
                          }
                      }
                      ?>
                  </select></td>
          </tr>
          <tr>
              <td>
                  <div align="right">籍贯：</div>

                  <input type="text" name="native_name" id="getNativeName" value="">
              </td>
              <td>
                  <select class="input-medium" id="seachprov" name="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>
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
          </tr>
          <tr>
              <td>
                  <div align="right"></div>
              </td>
              <td>
                  <select class="input-medium" id="seachcity" name="homecity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>
              </td>
              <td>
                  <div align="right">状态：</div>
              </td>
              <td><select name="state" class="input-medium">
                      <option value="0">在校</option>
                      <option value="1">毕业</option>
                      <option value="2">调出</option>
                  </select></td>
              <td width="236" align="center"><input type="file"/></td>
          </tr>
          <tr>
              <td>
                  <div align="right"></div>
              </td>
              <td>
                  <span id="seachdistrict_div"><select  class="input-medium" id="seachdistrict" name="seachdistrict"></select></span>
              </td>
              <td rowspan="2">
                  <div align="right">获奖情况：</div>
                  <div align="right"></div>
              </td>
              <td rowspan="2"><textarea form="edit" name="reward_condtion" title=""><?php echo $rowsGTR1["reward_condtion"]; ?></textarea>
              </td>
              <td width="236">&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">户口所在派出所：</div>
              </td>
              <td><input type="text" name="police_station" value="<?php echo $rowsGTR1["police_station_name"]; ?>"
                         class="input-medium"></td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">家庭住址：</div>
              </td>
              <td><input type="text" name="address"
                         value="<?php echo $rowsGTR1["home_add_name"] . $rowsGTR1["Home_Add_Detail"]; ?>"
                         class="input-medium"></td>
              <td>
                  <div align="right">处分情况：</div>
              </td>
              <td><select name="YorNwrong" class="input-medium">
                      <option value="0">是</option>
                      <option value="1">否</option>
                  </select></td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">身份证号：</div>
              </td>
              <td><input readonly="readonly" type="text" name="ID_number" value="<?php echo $rowsGTR1["ID_number"]; ?>"
                         class="input-medium">
              </td>
              <td rowspan="2">
                  <div align="right">突出表现和存在不足：</div>
                  <div align="right"></div>
              </td>
              <td rowspan="2"><textarea name="TC_and_BZ"><?php echo $rowsGTR1["TC_and_BZ"]; ?></textarea></td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">政治面貌：</div>
              </td>
              <td><select name="politics_status" class="input-medium">
                      <?php
                      $sqlAllPolity = "SELECT * FROM polity_bmb";
                      if ($resAP = mysqli_query($db, $sqlAllPolity)) {
                          while ($rowsAP = mysqli_fetch_assoc($resAP)) {
                              ?>
                              <option value="<?php echo $rowsAP["Politics_status"]; ?>"><?php echo $rowsAP["name"]; ?></option>
                              <?php
                          }
                      }
                      ?>
                  </select></td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">学历：</div>
              </td>
              <td><select name="edu" class="input-medium">
                      <?php
                      $sqlAllEdu = "SELECT * FROM edu_bmb";
                      if ($resAE = mysqli_query($db, $sqlAllEdu)) {
                          while ($rowsAE = mysqli_fetch_assoc($resAE)) {
                              ?>
                              <option value="<?php echo $rowsAE["edu"]; ?>"><?php echo $rowsAE["edu_name"]; ?></option>
                              <?php
                          }
                      }
                      ?>
                  </select></td>
              <td rowspan="2">
                  <div align="right">备注：</div>
                  <div align="right"></div>
              </td>
              <td rowspan="2"><input type="text" name="remark" value="<?php echo $rowsGTR1["remark"]; ?>"
                                     class="input-medium"/></td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">个人特长：</div>
              </td>
              <td><input type="text" name="strong_point" value="<?php echo $rowsGTR1["strong_point"]; ?>"
                         class="input-medium"></td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">联系电话：</div>
              </td>
              <td><input type="text" name="tel" value="<?php echo $rowsGTR1["tel"]; ?>" class="input-medium"></td>
              <td rowspan="2">&nbsp;</td>
              <td rowspan="2">&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <div align="right">邮编：</div>
              </td>
              <td><input type="text" name="zip_code" value="<?php echo $rowsGTR1["zip_code"]; ?>" class="input-medium">
              </td>
              <td>&nbsp;</td>
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