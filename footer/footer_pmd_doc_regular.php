<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])) {
    session_id($_COOKIE["PHPSESSID"]);
    if (isset($_SESSION["right"]) && $_SESSION["right"] == 0) {

        if (isset($_POST["submit"]) && $_POST["submit"]) {
            $sqlDelOldDate = "DELETE FROM `stage` WHERE ID_number='" . $_POST["ID_number"] . "' AND docu_type='" . $_POST["docu_type"] . "'";
            mysqli_query($db, $sqlDelOldDate);
            $sqlNewDate = "INSERT INTO `stage`(ID_number, docu_type, sub_date, remark) VALUES ('" . $_POST["ID_number"] . "','" . $_POST["docu_type"] . "','" . $_POST["sub_date"] . "',NULL)";
            if ($resND = mysqli_query($db, $sqlNewDate)) {
                ?>
                <script>
                    alert('添加成功！');
                    window.location = "<?php echo $_POST['url']?>";
                </script>
                <?php
            } else {
                echo $sqlNewDate;
            }
        } else {
            ?>
            <div class="well">
                <h2>文档信息</h2>
                <div align="center">
                    <table class="table">
                        <tbody>
                        <th>文档类型</th>
                        <th>提交日期</th>
                        <th style="width: 26px;"></th>
                        <tr>
                            <td>入党申请书</td>
                                <?php
                                $sqlGetDocT2 = "SELECT sub_date FROM `stage` WHERE docu_type=2 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT2 = mysqli_query($db, $sqlGetDocT2)) {

                                    echo ($rowGDT2 = mysqli_fetch_assoc($resGDT2)) ? "<td>".$rowGDT2['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="2" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>自传</td>
                                <?php
                                $sqlGetDocT3 = "SELECT sub_date FROM `stage` WHERE docu_type=3 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT3 = mysqli_query($db, $sqlGetDocT3)) {
                                    echo ($rowGDT3 = mysqli_fetch_assoc($resGDT3)) ? "<td>".$rowGDT3['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="3" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>入党积极分子培养考察表</td>
                                <?php
                                $sqlGetDocT4 = "SELECT sub_date FROM `stage` WHERE docu_type=4 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT4 = mysqli_query($db, $sqlGetDocT4)) {
                                    echo ($rowGDT4 = mysqli_fetch_assoc($resGDT4)) ? "<td>".$rowGDT4['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="4" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>优秀团员作党的发展对象推荐表</td>
                                <?php
                                $sqlGetDocT5 = "SELECT sub_date FROM `stage` WHERE docu_type=5 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT5 = mysqli_query($db, $sqlGetDocT5)) {
                                    echo ($rowGDT5 = mysqli_fetch_assoc($resGDT5)) ? "<td>".$rowGDT5['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="5" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>入党积极分子培训结业证</td>
                                <?php
                                $sqlGetDocT12 = "SELECT sub_date FROM `stage` WHERE docu_type=12 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT12 = mysqli_query($db, $sqlGetDocT12)) {
                                    echo ($rowGDT12 = mysqli_fetch_assoc($resGDT12)) ? "<td>".$rowGDT12['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="12" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>群众谈话记录</td>
                                <?php
                                $sqlGetDocT6 = "SELECT sub_date FROM `stage` WHERE docu_type=6 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT6 = mysqli_query($db, $sqlGetDocT6)) {
                                    echo ($rowGDT6 = mysqli_fetch_assoc($resGDT6)) ? "<td>".$rowGDT6['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="6" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>党支部综合性政审材料</td>
                                <?php
                                $sqlGetDocT7 = "SELECT sub_date FROM `stage` WHERE docu_type=7 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT7 = mysqli_query($db, $sqlGetDocT7)) {
                                    echo ($rowGDT7 = mysqli_fetch_assoc($resGDT7)) ? "<td>".$rowGDT7['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="7" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>函调信</td>
                                <?php
                                $sqlGetDocT8 = "SELECT sub_date FROM `stage` WHERE docu_type=8 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT8 = mysqli_query($db, $sqlGetDocT8)) {
                                    echo ($rowGDT8 = mysqli_fetch_assoc($resGDT8)) ? "<td>".$rowGDT8['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="8" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>公示材料</td>
                                <?php
                                $sqlGetDocT9 = "SELECT sub_date FROM `stage` WHERE docu_type=9 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT9 = mysqli_query($db, $sqlGetDocT9)) {
                                    echo ($rowGDT9 = mysqli_fetch_assoc($resGDT9)) ? "<td>".$rowGDT9['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="9" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>预备党员考察表</td>
                                <?php
                                $sqlGetDocT11 = "SELECT sub_date FROM `stage` WHERE docu_type=11 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT11 = mysqli_query($db, $sqlGetDocT11)) {
                                    echo ($rowGDT11 = mysqli_fetch_assoc($resGDT11)) ? "<td>".$rowGDT11['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="11" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>入党前短期集中培训合格证</td>
                                <?php
                                $sqlGetDocT13 = "SELECT sub_date FROM `stage` WHERE docu_type=13 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT13 = mysqli_query($db, $sqlGetDocT13)) {
                                    echo ($rowGDT13 = mysqli_fetch_assoc($resGDT13)) ? "<td>".$rowGDT13['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="13" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>入党志愿书</td>
                                <?php
                                $sqlGetDocT1 = "SELECT sub_date FROM `stage` WHERE docu_type=1 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT1 = mysqli_query($db, $sqlGetDocT1)) {
                                    echo ($rowGDT1 = mysqli_fetch_assoc($resGDT1)) ? "<td>".$rowGDT1['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
                            <td>
                                <a href="#change" id="1" class="doc" role="button" data-toggle="modal"><i
                                            class="icon-pencil"></i></a>
                            </td>
                        </tr>
                        
    <tr>
      <td>转正申请</td>                    <?php
                                $sqlGetDocT10 = "SELECT sub_date FROM `stage` WHERE docu_type=10 AND ID_number='" . $_GET['ID'] . "'";
                                if ($resGDT10 = mysqli_query($db, $sqlGetDocT10)) {
                                    echo ($rowGDT10 = mysqli_fetch_assoc($resGDT10)) ? "<td>".$rowGDT1['sub_date']."</td>" : "<td>未提交</td>";
                                }
                                ?>
      <td>
           <a href="#change" id="10" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
      </td>
    </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--修改组织信息-->
            <div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">编辑信息</h3>
                </div>
                <div class="modal-body">
                    <form id="tab" action="../footer/footer_pmd_doc_regular.php" method='post'>
                        <label>提交日期</label>
                        <input id="newDate" type="date" name="sub_date">
                        <input id="newType" type="hidden" name="docu_type">
                        <input type="hidden" name="url"
                               value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>">
                        <input type="hidden" name="ID_number" value="<?php echo $_GET["ID"] ?>">


                        <div class="modal-footer">
                            <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消
                            </button>
                            <input class="btn btn-danger" id="btn_change_sava" name="submit" type="submit" value="保存">
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $('.doc').on('click', function () {
                    console.log($(this).parent().prev().html());
                    $('#newDate').val($(this).parent().prev().html());
                    $('#newType').val($(this).attr('id'));
                    console.log($('#newDate').val());
                })
            </script>
            <?php
        }
    } else {
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