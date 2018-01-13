
<?php
date_default_timezone_set('PRC');
if(isset($_GET["stuId"])) {
    $sqlAllStudents = "SELECT *,Person_cate1_name,Person_cate2_name FROM personnelinformation,person_cate1_bmb,person_cate2_bmb WHERE ID_number = '" . $_GET["stuId"] . "' AND personnelinformation.person_cate2=person_cate2_ AND person_cate1=Person_cate1_";
    if ($resAS = mysqli_query($db, $sqlAllStudents)) {
        if($rowsAS = mysqli_fetch_assoc($resAS))
        ?>
            <div>
            <form action="../Right_1/1_pmm_information_basic_stu.php?stuId=<?php echo $_GET["stuId"];?>" method="post" id="edit">
        <div class="btn-toolbar">
            <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="showAreaID()">
        </div>
        <div class="well">
            <div align="center">
                <table width="907">
                    <tbody>
                    <tr align="right">
                        <td width="112">姓名：</td>
                        <td width="193" align="left"><input type="text" name="name" value="<?php echo $rowsAS["name"];?>" class="input-medium"/></td>
                        <td width="129">性别：</td>
                        <td width="204" align="left"><?php
                            if ($rowsAS["sex"] == 0) {
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
                            ?></td>
                    </tr>
                    <tr align="right">
                        <td>出生年月：</td>
                        <td align="left"><input type="month" name="datetime" class="input-medium" value="<?php echo date("Y-m",strtotime($rowsAS["Datetime"]));?>"/></td>
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
                        <td align="left"><input type="text" name="ID_number" value="<?php echo $rowsAS["ID_number"];?>" class="input-medium" ></td>
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
                                $sqlAllPolity = "SELECT * FROM polity_bmb";
                                GetSelectGroup($db,$rowsAS,$sqlAllPolity,"politics_status","name");
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
                        <td align="left"><input type="text" name="instruct_ID" value="<?php echo $rowsAS["instructor_ID"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                        <td align="left"><select name="district" class="input-medium">
                                <option value="0">浑南新区</option>
                                <option value="1">皇姑区</option>
                            </select></td>
                    </tr>
                    <tr align="right">
                        <td>特长：</td>
                        <td align="left"><input type="text" name="strong_point" value="<?php echo $rowsAS["strong_point"]; ?>" class="input-medium"/></td>
                        <td>户口所在派出所：</td>
                        <td align="left"><input type="text" name="police_station" value="<?php echo $rowsAS["police_station"]; ?>" class="input-medium"/></td>
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
                            ?>" class="input-medium"/></td>
                        <td>邮政编码：</td>
                        <td align="left"><input type="text" name="zip_code" value="<?php echo $rowsAS["zip_code"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr align="right">
                        <td>联系电话：</td>
                        <td align="left"><input type="text" name="tel" value="<?php echo $rowsAS["tel"];?>" class="input-medium"/></td>
                        <td>楼号：</td>
                        <td align="left"><input type="text" name="floor_number" value="<?php echo $rowsAS["floor_number"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr align="right">
                        <td>班级学号：</td>
                        <td align="left"><input type="text" name="stu_number" value="<?php echo $rowsAS["stu_number"];?>" class="input-medium"/></td>
                        <td>寝室号：</td>
                        <td align="left"><input type="text" name="dormitory_number" value="<?php echo $rowsAS["dormitory_number"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr align="right">
                        <td>专业：</td>
                        <td align="left"><select name="major" class="input-medium">
                                <?php
                                $sqlAllMajor="SELECT * FROM major_bmb";
                                if($resAM=mysqli_query($db,$sqlAllMajor)){
                                    while($rowsAM=mysqli_fetch_assoc($resAM)){
                                        if($rowsAS["major"]==$rowsAM["major"]){
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
                            </select></td>
                        <td>床号：</td>
                        <td align="left"><input type="text" name="bed_number" value="<?php echo $rowsAS["bed_number"];?>" class="input-medium"/></td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <div style="position: absolute">
            <form method="post" action="../Right_1/upload.php?stuId=<?php echo $_GET["stuId"];?>" id="stu_photo">
                <img src="../images/photo.png"/>
                <input type="file" name="fileField" id="fileField" class="input-small" />
                <input class="btn btn-primary" type="submit" name="submit" value="上传">
            </form>
        </div>
        </div>
        <?php
    }
}