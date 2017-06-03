<?php
date_default_timezone_set('PRC');
if(isset($_GET["stuId"])) {
$sqlAllStudents = "SELECT *,Person_cate1_name,Person_cate2_name FROM personnelinformation,person_cate1_bmb,person_cate2_bmb WHERE ID_number = '" . $_GET["stuId"] . "' AND personnelinformation.person_cate2=person_cate2_ AND person_cate1=Person_cate1_";
if ($resAS = mysqli_query($db, $sqlAllStudents)) {
if($rowsAS = mysqli_fetch_assoc($resAS))
?>
    <form action="../Right_1/1_pmm_information_basic_tea.php?ID=<?php echo $_GET["stuId"];?>" method="post" id="edit">
<div class="btn-toolbar">
    <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="showAreaID()">
</div>
<div class="well">
    <div align="center">
      <table width="907">
        <tbody>
          <tr align="right">
            <td width="112">姓名：</td>
            <td width="193" align="left"><input type="text" name="name" value="<?php echo $rowsAS["name"];?>" class="input-medium" /></td>
            <td width="129">性别：</td>
            <td width="204" align="left">
                <?php
                if ($rowsAS["sex"] == 0) {
                    ?>
                    <input type="radio" name="sex" value="0" id="sex_0" checked="checked"/> 男
                    <input type="radio" name="sex" value="1" id="sex_1"/>女
                    <?php
                }else {
                    ?>
                    <input type="radio" name="sex" value="0" id="sex_0"/> 男
                    <input type="radio" name="sex" value="1" id="sex_1" checked="checked"/>女
                    <?php
                }
                ?>
            </td>
            <td width="235" rowspan="5" align="left"><img src="../images/photo.png" /></td>
          </tr>
          <tr align="right">
            <td>出生年月：</td>
            <td align="left"><input type="month"  name="datetime" VALUE="<?php echo date("Y-m",strtotime($rowsAS["Datetime"]));?>" class="input-medium"/></td>
            <td>民族：</td>
            <td align="left"><select name="nation" class="input-medium">
                    <?php
                    $sqlAllNation = "SELECT * FROM nation_bmb";
                    if ($resAN = mysqli_query($db, $sqlAllNation)) {
                        while ($rowsAN = mysqli_fetch_assoc($resAN)) {
                            if($rowsAS["nation"]==$rowsAN["nation"]){
                                ?>
                                <option selected="selected" value="<?php echo $rowsAN["nation"]; ?>"><?php echo $rowsAN["nation_name"];?></option>
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
          </tr>
          <tr align="right">
            <td>身份证号：</td>
            <td align="left"><input type="text" name="ID_number" value="<?php echo $rowsAS["ID_number"];?>" class="input-medium" /></td>
            <td>籍贯：</td>
            <td align="left"><select name="province" class="input-medium">
              <option value="0">辽宁</option>
              <option value="1">河北</option>
              <option value="2">黑龙江</option>
            </select></td>
          </tr>
          <tr align="right">
            <td>政治面貌：</td>
            <td align="left"><select name="politics_status" class="input-medium">
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
            <td align="left">&nbsp;</td>
            <td align="left"><select name="city" class="input-medium">
              <option value="0">沈阳</option>
              <option value="1">本溪</option>
            </select></td>
          </tr>
          <tr align="right">
            <td>毕业日期</td>
            <td align="left"><input type="month" class="input-medium" value="<?php echo date("Y-m",strtotime($rowsAS["graduation_date"])); ?>"  name="graduation_date"/></td>
            <td align="left">&nbsp;</td>
            <td align="left"><select name="district" class="input-medium">
              <option value="0">浑南新区</option>
              <option value="1">皇姑区</option>
            </select></td>
          </tr>
          <tr align="right">
            <td >特长：</td>
           <td align="left"><input type="text" name="strong_point" value="<?php echo $rowsAS["strong_point"]; ?>" class="input-medium" /></td>
           <td>户口所在派出所：</td>
           <td align="left"><input type="text" name="police_station" value="" class="input-medium" /></td>
           <td><input type="file" name="fileField" id="fileField" class="input-small"/></td>
          </tr>
          <tr align="right">
            <td>家庭住址：</td>
            <td align="left"><input type="text" name="address" value="<?php
                $sqlAllPolity="SELECT all_name FROM home_place_bmb where place = '".$rowsAS["Home_Add"]."'";
                if($resAP=mysqli_query($db,$sqlAllPolity)){
                    while($rowsAP=mysqli_fetch_assoc($resAP)){
                        echo $rowsAP["all_name"];
                    }
                }
                ?>" class="input-medium" /></td>
            <td>邮政编码：</td>
            <td align="left"><input type="text" name="zip_code" value="<?php echo $rowsAS["zip_code"];?>" class="input-medium" /></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr align="right">
            <td>联系电话：</td>
            <td align="left"><input type="text" name="tel" value="<?php echo $rowsAS["tel"];?>" class="input-medium" /></td>
            <td>暂住地</td>
            <td align="left"><input type="text" name="now_address" value="" class="input-xlarge" /></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr align="right">
            <td>&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr align="right">
            <td>&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          </tbody>
      </table>
    </div>
</div>
    </form>
    <?php
}
}