
<?php
if(isset($_GET["stuId"])) {
    $sqlAllStudents = "SELECT *,Person_cate1_name,Person_cate2_name FROM personnelinformation,person_cate1_bmb,person_cate2_bmb WHERE ID_number = '" . $_GET["stuId"] . "' AND personnelinformation.person_cate2=person_cate2_ AND person_cate1=Person_cate1_";
    if ($resAS = mysqli_query($db, $sqlAllStudents)) {
        if($rows = mysqli_fetch_assoc($resAS))
        ?>
        <div class="btn-toolbar">
            <button class="btn btn-primary"><font color="#F7F8F7">保存</font></button>
            <div class="btn-group">
            </div>
        </div>
        <div class="well">
            <div align="center">
                <table width="907">
                    <tbody>
                    <tr align="right">
                        <td width="112">姓名：</td>
                        <td width="193" align="left"><input type="text" name="name" value="<?php echo $rows["name"];?>" class="input-medium"/></td>
                        <td width="129">性别：</td>
                        <td width="204" align="left"><?php
                            if ($rows["sex"] == 0) {
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
                        <td width="235" rowspan="5" align="left"><img src="../images/photo.png"/></td>
                    </tr>
                    <tr align="right">
                        <td>出生年月：</td>
                        <td align="left"><input type="month" name="datetime" class="input-medium" value=""/></td>
                        <td>民族：</td>
                        <td align="left"><select name="nation" class="input-medium">
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
                    </tr>
                    <tr align="right">
                        <td>身份证号：</td>
                        <td align="left"><input type="text" name="ID_number" value="<?php echo $rows["ID_number"];?>" class="input-medium" ></td>
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
                        <td>辅导员：</td>
                        <td align="left"><input type="text" name="instruct_ID" value="<?php echo $rows["instructor_ID"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                        <td align="left"><select name="district" class="input-medium">
                                <option value="0">浑南新区</option>
                                <option value="1">皇姑区</option>
                            </select></td>
                    </tr>
                    <tr align="right">
                        <td>特长：</td>
                        <td align="left"><input type="text" name="strong_point" value="<?php echo $rows["strong_point"]; ?>" class="input-medium"/></td>
                        <td>户口所在派出所：</td>
                        <td align="left"><input type="text" name="police_station" value="<?php echo $rows["police_station"]; ?>" class="input-medium"/></td>
                        <td><input type="file" name="fileField" id="fileField" class="input-small"/></td>
                    </tr>
                    <tr align="right">
                        <td>家庭住址：</td>
                        <td align="left"><input type="text" name="address" value="<?php
                            $sqlAllPolity="SELECT all_name FROM home_place_bmb where place = '".$rows["Home_Add"]."'";
                            if($resAP=mysqli_query($db,$sqlAllPolity)){
                            while($rowsAP=mysqli_fetch_assoc($resAP)){
                            echo $rowsAP["all_name"];
                            }
                            }
                            ?>" class="input-medium"/></td>
                        <td>邮政编码：</td>
                        <td align="left"><input type="text" name="zip_code" value="<?php echo $rows["zip_code"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr align="right">
                        <td>联系电话：</td>
                        <td align="left"><input type="text" name="tel" value="<?php echo $rows["tel"];?>" class="input-medium"/></td>
                        <td>楼号：</td>
                        <td align="left"><input type="text" name="floor_number" value="<?php echo $rows["floor_number"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr align="right">
                        <td>班级学号：</td>
                        <td align="left"><input type="text" name="stu_number" value="<?php echo $rows["stu_number"];?>" class="input-medium"/></td>
                        <td>寝室号：</td>
                        <td align="left"><input type="text" name="dormitory_number" value="<?php echo $rows["dormitory_number"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr align="right">
                        <td>专业：</td>
                        <td align="left"><input type="text" name="major" value="<?php
                            $sqlAllPolity="SELECT major_name FROM major_bmb where major = '".$rows["major"]."'";
                            if($resAP=mysqli_query($db,$sqlAllPolity)){
                                while($rowsAP=mysqli_fetch_assoc($resAP)){
                                    echo $rowsAP["major_name"];
                                }
                            }
                            ?>" class="input-medium"/></td>
                        <td>床号：</td>
                        <td align="left"><input type="text" name="bed_number" value="<?php echo $rows["bed_number"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}