<div class="btn-toolbar">
    <button class="btn btn-primary" ><font color="#F7F8F7">保存</font></button>
</div>
<div class="well">
    <div align="center">
      <table width="916" height="500" border="0">
  <tbody >
    <tr>
      <td width="120"><div align="right">姓名：</div></td>
      <td width="201"><input type="text" name="name" value="<?php echo $rowsGTR1["name"]; ?>" class="input-medium"></td>
      <td width="152"><div align="right">辅导员：</div></td>
      <td width="185"><input type="text" name="instructor_ID" value="<?php echo $rowsGTR1["instructor_ID"]; ?>" class="input-medium"></td>
      <td width="236" rowspan="5"><img src="/PartyManage-develop/images/photo.png" /></td>
    </tr>
    <tr>
      <td><div align="right">性别：</div></td>
      <td> <?php
                if ($rowsGTR1["sex"] == 0) {
                    ?>
                    <input type="radio" name="sex" value="男" id="sex_0" checked="checked"/> 男
                    <input type="radio" name="sex" value="女" id="sex_1"/>女
                    <?php
                }else{
                    ?>
                    <input type="radio" name="sex" value="男" id="sex_0" /> 男
                    <input type="radio" name="sex" value="女" id="sex_1" checked="checked"/>女
                    <?php
                }
                            ?></td>
      <td><div align="right">专业：</div></td>
      <td><input type="text" name="major" value="<?php echo $rowsGTR1["major"]; ?>" class="input-medium"></td>
      </tr>
    <tr>
      <td><div align="right">出生年月：</div></td>
      <td><input type="month"  name="datetime" value="<?php echo substr($rowsGTR1["ID_number"], 6, 8); ?>"  class="input-medium"/></td>
      <td><div align="right">高中入学日期：</div></td>
      <td><input type="date" name="GZRX_date" value="<?php echo $rowsGTR1["GZRX_date"]; ?>" class="input-medium"/></td>
      </tr>
    <tr>
      <td><div align="right">民族：</div></td>
      <td><select name="nation" class="input-medium">
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
        </select></td>
      <td><div align="right">高中毕业日期：</div></td>
      <td><input type="date" name="GZBY_date" value="<?php echo $rowsGTR1["GZBY_date"]; ?>" class="input-medium"/></td>
      </tr>
    <tr>
      <td><div align="right">籍贯：</div></td>
      <td><select name="province" class="input-medium">
        	<option value="0">辽宁</option>
            <option value="1">河北</option>
            <option value="2">黑龙江</option>
        </select></td>
      <td><div align="right">入团时间：</div></td>
      <td><input type="date" name="Join_T_time" value="<?php echo $rowsGTR1["join_T_time"]; ?>" class="input-medium"></td>
      </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><select name="city" class="input-medium">
        	<option value="0">沈阳</option>
            <option value="1">本溪</option>
        </select></td>
      <td><div align="right">申请入党时间：</div></td>
      <td><input type="date" name="SQRD_time" value="<?php echo $rowsGTR1["SQRD_time"]; ?>" class="input-medium"></td>
      <td width="236" align="center"><input type="file" /></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><select name="district" class="input-medium">
        	<option value="0">浑南新区</option>
            <option value="1">皇姑区</option>
        </select></td>
      <td><div align="right">列积极分子时间：</div></td>
      <td><input type="date" name="LJJ_time" value="<?php echo $rowsGTR1["LJJ_time"]; ?>"  class="input-medium"/></td>
      <td width="236">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">户口所在派出所：</div></td>
      <td><input type="text" name="police_station" value="<?php echo $rowsGTR1["police_station_name"]; ?>" class="input-medium"></td>
      <td><div align="right">培养人：</div></td>
      <td><input type="text" name="trainer" value="??" class="input-medium"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">家庭住址：</div></td>
      <td><input type="text" name="address" value="<?php echo $rowsGTR1["home_add_name"] . $rowsGTR1["Home_Add_Detail"]; ?>" class="input-medium"></td>
      <td><div align="right">所属组织：</div></td>
      <td><select name="Department_ID" class="input-medium">
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
        </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">身份证号：</div></td>
      <td><input type="text" name="ID_number" value="<?php echo $rowsGTR1["ID_number"]; ?>" class="input-medium"></td>
      <td><div align="right">行政职务：</div></td>
      <td><select name="Adminis_fun" class="input-medium">
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
        </select> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">政治面貌：</div></td>
      <td><select name="politics_status" class="input-medium">
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
        </select></td>
      <td><div align="right">状态：</div></td>
      <td><select name="state" class="input-medium">
        	<option value="0">在校</option>
            <option value="1">毕业</option>
            <option value="2">调出</option>
        </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">学历：</div></td>
      <td><input type="text" name="edu" value="<?php echo $rowsGTR1["edu_name"]; ?>" class="input-medium"/></td>
      <td><div align="right">排名：</div></td>
      <td><input type="number" name="ranking" min="0" value="<?php echo $rowsGTR1["ranking"]; ?>" class="input-medium"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">个人特长：</div></td>
      <td><input type="text" name="strong_point" value="<?php echo $rowsGTR1["strong_point"]; ?>" class="input-medium"></td>
      <td><div align="right">挂科数：</div></td>
      <td><input type="text" name="All_funkobject_amount" value="<?php echo $rowsGTR1["all_funkobject_amount"]; ?>" class="input-medium"> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">联系电话：</div></td>
      <td><input type="text" name="tel" value="<?php echo $rowsGTR1["tel"]; ?>" class="input-medium"></td>
      <td rowspan="2"><div align="right">获奖情况：</div></td>
      <td rowspan="2"><textarea name="Reward_condtion" ><?php echo $rowsGTR1["reward_condtion"]; ?></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">邮编：</div></td>
      <td><input type="text" name="zip_code" value="<?php echo $rowsGTR1["zip_code"]; ?>" class="input-medium"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">寝室楼号：</div></td>
      <td><input type="text" name="floor_number"  value="<?php echo $rowsGTR1["floor_number"]; ?>" class="input-medium"></td>
      <td><div align="right">处分情况：</div></td>
      <td><select name="YorNwrong" class="input-medium">
        	<option value="0">是</option>
            <option value="1">否</option>
        </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">寝室号：</div></td>
      <td><input type="text" name="dormitory_number"  value="<?php echo $rowsGTR1["dormitory_number"]; ?>" class="input-medium"></td>
      <td rowspan="2"><div align="right">突出表现和存在不足：</div></td>
      <td rowspan="2"><textarea name="TC_and_BZ" ><?php echo $rowsGTR1["TC_and_BZ"]; ?></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">床号：</div></td>
      <td><input type="text" name="bed_number" value="<?php echo $rowsGTR1["bed_number"]; ?>" class="input-medium"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">备注：</div></td>
      <td><input type="text" name="remark" value="<?php echo $rowsGTR1["remark"]; ?>" class="input-medium" /></td>
      <td><div align="right"></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
    </div>
</div>