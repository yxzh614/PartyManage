<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])) {
  session_id($_COOKIE["PHPSESSID"]);
  if (isset($_SESSION["right"]) && $_SESSION["right"] == 0) {
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
                            <a href="#change" id="2" class="doc" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
                        </td>
                    </tr>
                </tbody>
                </table>
                </div>
                </div>
                <!--修改组织信息-->
                <div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">编辑信息</h3>
                    </div>
                    <form class="modal-body" action="../public/del.php" method="post">
                        <label>提交日期</label>
                        <input type="date" name="date" id="update" value="">
                        <input type="hidden" name="type" value="save_doc_2">
                        <input type="hidden" name="ID_number" value="<?php echo $_GET["ID"] ?>">
                        <div class="modal-footer">
                            <button class="btn" type="button" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                            <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存">
                        </div>
                </form>   
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