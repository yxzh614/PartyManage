<?php
require_once ("../config.php");
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
                    <form id="tab" action="../footer/footer_pmd_doc_activist.php" method='post'>
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