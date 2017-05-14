<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
      <table width="740" border="1">
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
        if($resGTR1=mysqli_query($db,$sqlGetTeaR1)){
            while ($rowsGTR1=mysqli_fetch_assoc($resGTR1)) {
                ?>
                <tr align="center">
                    <td width="127">姓名</td>
                    <td width="112"><?php echo $rowsGTR1["name"]; ?></td>
                    <td width="77">性别</td>
                    <td width="75"><?php echo $rowsGTR1["sex"] ? "女" : "男" ?></td>
                    <td width="140">出生日期</td>
                    <td width="97"><?php echo substr($rowsGTR1["ID_number"], 6, 8); ?></td>
                    <td width="66" rowspan="3">&nbsp;</td>
                </tr>
                <tr align="center">
                    <td>民族</td>
                    <td><?php echo $rowsGTR1["nation_name"]; ?></td>
                    <td>籍贯</td>
                    <td colspan="3"><?php echo $rowsGTR1["native_name"]; ?></td>
                </tr>
                <tr align="center">
                    <td>申请入党时间</td>
                    <td colspan="2"><?php echo $rowsGTR1["SQRD_time"]; ?></td>
                    <td>联系电话</td>
                    <td colspan="2"><?php echo $rowsGTR1["tel"]; ?></td>
                </tr>
                <tr align="center">
                    <td>政治面貌</td>
                    <td colspan="2"><?php echo $rowsGTR1["polity_name"]; ?></td>
                    <td>身份证号</td>
                    <td><?php echo $rowsGTR1["ID_number"]; ?></td>
                    <td>所属组织</td>
                    <td><?php echo $rowsGTR1["department_name"]; ?></td>
                </tr>
                <tr align="center">
                    <td>入团时间</td>
                    <td colspan="2"><?php echo $rowsGTR1["join_T_time"]; ?></td>
                    <td>毕业日期</td>
                    <td><?php echo $rowsGTR1["graduation_date"]; ?></td>
                    <td>教工号</td>
                    <td><?php echo $rowsGTR1["ID_number"]; ?></td>
                </tr>
                <tr align="center">
                    <td>列积极分子时间</td>
                    <td colspan="2"><?php echo $rowsGTR1["LJJ_time"]; ?></td>
                    <td>学历</td>
                    <td><?php echo $rowsGTR1["edu_name"]; ?></td>
                    <td>邮编</td>
                    <td><?php echo $rowsGTR1["zip_code"]; ?></td>
                </tr>
                <tr align="center">
                    <td>家庭住址</td>
                    <td colspan="3"><?php echo $rowsGTR1["home_add_name"] . $rowsGTR1["Home_Add_Detail"]; ?></td>
                    <td> 培养人</td>
                    <td colspan="2">？？</td>
                </tr>
                <tr align="center">
                    <td>户口所在派出所</td>
                    <td colspan="3"><?php echo $rowsGTR1["police_station_name"]; ?></td>
                    <td>行政职务</td>
                    <td colspan="2">??</td>
                </tr>
                <tr align="center">
                    <td>个人特长</td>
                    <td colspan="6"><?php echo $rowsGTR1["strong_point"]; ?></td>
                </tr>
                <tr align="center">
                    <td>突出表现和存在不足</td>
                    <td colspan="6"><?php echo $rowsGTR1["TC_and_BZ"]; ?></td>
                </tr>
                <tr align="center">
                    <td>获奖情况</td>
                    <td colspan="6"><?php echo $rowsGTR1["reward_condtion"]; ?></td>
                </tr>
                <tr align="center">
                    <td>处分情况</td>
                    <td colspan="6"><?php echo $rowsGTR1["YorNwrong"]; ?></td>
                </tr>
                <tr align="center">
                    <td>备注</td>
                    <td colspan="6"><?php echo $rowsGTR1["remark"]; ?></td>
                </tr>
                <!--修改组织信息-->
                <div class="modal small hide fade" id="change_1" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">编辑信息</h3>
                </div>
                <div class="modal-body">
                <form id="tab" action="../Right_1/1_pmd_applicant_tea.php?ID=<?php echo $_GET["ID"] ?>" method="post">
                    <input type="hidden" name="ID_number" value="<?php echo $rowsGTR1['ID_number'];?>">
                <label>姓名</label>
                <input type="text" name="name" value="<?php echo $rowsGTR1["name"]; ?>" class="input-xlarge" title="name">
                <label>性别</label>
                <?php
                if ($rowsGTR1["sex"] == 0) {
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
                            <label>照片</label>
                            <input type="file" name="image" />
                            <label>民族</label>
                            <select name="nation">
                                <?php
                                $sqlAllNation="SELECT * FROM nation_bmb";
                                if($resAN=mysqli_query($db,$sqlAllNation)){
                                    while($rowsAN=mysqli_fetch_assoc($resAN)){
                                        ?>
                                        <option value="<?php echo $rowsAN["nation"]; ?>"><?php echo $rowsAN["nation_name"]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <label>籍贯test</label>
                    <input type="hidden" id="native_place" name="native_place" value="000000">
                    <div style="text-align: center;">
                        <select id="seachprov" name="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
                        <select id="seachcity" name="homecity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                        <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"></select></span>
                    </div>

                            <label>申请入党时间</label>
                            <input type="date" name="SQRD_time"  value="<?php echo $rowsGTR1["SQRD_time"]; ?>">
                            <label>联系电话</label>
                            <input type="text" name="tel" value="<?php echo $rowsGTR1["tel"]; ?>" class="input-xlarge">
                            <label>政治面貌</label>
                            <select name="politics_status">
                                <?php
                                $sqlAllPolity="SELECT * FROM polity_bmb";
                                if($resAP=mysqli_query($db,$sqlAllPolity)){
                                    while($rowsAP=mysqli_fetch_assoc($resAP)){
                                        ?>
                                        <option value="<?php echo $rowsAP["Politics_status"]; ?>"><?php echo $rowsAP["name"]; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <label>所属组织</label>
                            <select name="Department_ID">
                                <?php
                                $sqlAllDepartment="SELECT * FROM department_id_bmb";
                                if($resAD=mysqli_query($db,$sqlAllDepartment)){
                                    while($rowsAD=mysqli_fetch_assoc($resAD)){
                                        ?>
                                        <option value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["Department"]; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <label>入团时间</label>
                            <input type="date" name="join_T_time" value="<?php echo $rowsGTR1["join_T_time"]; ?>">
                            <label>毕业日期</label>
                            <input type="date" name="graduation_date" value="<?php echo $rowsGTR1["graduation_date"]; ?>">
                            <label>教工号</label>
                            <input type="number" name="tea_number" value="<?php echo $rowsGTR1["ID_number"]; ?>">
                            <label>列积极分子时间</label>
                            <input type="date" name="LJJ_time" value="<?php echo $rowsGTR1["LJJ_time"]; ?>" />
                            <label>学历</label>
                            <input type="text" name="edu" value="<?php echo $rowsGTR1["edu_name"]; ?>"/>
                            <label>邮编</label>
                            <input type="text" name="zip_code" value="<?php echo $rowsGTR1["zip_code"]; ?>" class="input-xlarge">
                            <label>家庭住址</label>
                            <input type="text" name="address" value="<?php echo $rowsGTR1["home_add_name"] . $rowsGTR1["Home_Add_Detail"]; ?>" class="input-xlarge">
                            <label>培养人</label>
                            <input type="text" name="trainer" value="??"/>
                            <label>高中入学日期</label>
                            <input type="date" name="GZRX_date" value="??"/>
                            <label>高中毕业日期</label>
                            <input type="date" name="GZBY_date" value="??"/>
                            <label>户口所在派出所</label>
                            <input type="text" name="police_station" value="<?php echo $rowsGTR1["police_station_name"]; ?>" class="input-xlarge">
                            <label>行政职务</label>
                            <select name="Adminis_fun">
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
                            <label>个人特长</label>
                            <input type="text" name="strong_point" value="<?php echo $rowsGTR1["strong_point"]; ?>" class="input-xlarge">
                            <label>突出表现和存在不足</label>
                            <textarea name="TC_and_BZ" ><?php echo $rowsGTR1["TC_and_BZ"]; ?></textarea>
                            <label>获奖情况</label>
                            <textarea name="Reward_condtion" ><?php echo $rowsGTR1["reward_condtion"]; ?></textarea>
                            <label>处分情况</label>
                            <select name="YorNwrong">
                                <option value="0">是</option>
                                <option value="1">否</option>
                            </select>
                            <label>备注</label>
                            <input type="text" name="remark" value="<?php echo $rowsGTR1["remark"]; ?>" />

                        <div class="modal-footer">
                            <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                            <input type="submit" name="submit" class="btn btn-danger" onclick="showAreaID()" id="btn_change_sava"  value="保存">
                        </div>
                </form>
                        <br/><br/><br/>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        </tbody>
      </table>
    </div>
</div>
<script>
    $(function (){
        initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '11', '0', '0');
    });
</script>