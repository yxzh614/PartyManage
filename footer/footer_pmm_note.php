<?php
if(isset($_GET["stuId"])) {
    $sqlAllStudents = "SELECT remark FROM personnelinformation WHERE ID_number = '" . $_GET["stuId"] . "'";
    if ($resAS = mysqli_query($db, $sqlAllStudents)) {
        if ($rowsAS = mysqli_fetch_assoc($resAS))
            ?>
            <form action="../Right_1/1_pmm_information_note.php?stuId=<?php echo $_GET["stuId"]; ?>" method="post"
                                                                                                       id="edit">
        <div class="btn-toolbar">
            <button class="btn btn-primary"><a href="#change" role="button" data-toggle="modal"><font
                            color="#F7F8F7">编辑</font></a></button>
            <div class="btn-group">
            </div>
        </div>
        <div class="well">
            <div align="center">
                <table width="762" border="1" align="center">
                    <tbody>
                    <tr align="center">
                        <td>备注</td>
                        <td width="590" align="left"><?php echo $rowsAS['remark'] ?></td>
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
                <form id="tab">
                    <label>备注</label>
                    <textarea name="remark" form="edit"><?php $rowsAS['remark'] ?></textarea>
                </form>
                <div class="modal-footer">
                    <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                    <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="showAreaID()">
                </div>
                <br/><br/><br/>
            </div>
        </div>
        </form>
        <?php
    }
}