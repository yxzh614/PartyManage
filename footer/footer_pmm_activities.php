 <!--搜索框-->
        <div class="search-well">
            <form class="form-inline">
                <input class="input-medium" placeholder="根据主题查询" id="" type="text">
                <input class="input-medium" placeholder="根据日期查询" id="" type="date">
                <input class="input-medium" placeholder="根据地点查询" id="" type="text">
                <input class="input-medium" placeholder="根据类型查询" id="" type="text">
                <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
            </form>
        </div>
        <div class="well">
            <table class="table">
                <thead>
                <tr>
                    <th>活动主题</th>
                    <th>日期时间</th>
                    <th>地点</th>
                    <th>活动类型</th>
                    <th>活动内容</th>
                    <th style="width: 26px;"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sqlAllStudents = "SELECT activity.activity_theme,activity.Datetime,activity.activity_content,activity.site FROM activity,appearance WHERE appearance.ID_number = '"
                    .$_GET['stuId']."' AND activity.Activity_ID = appearance.Activity_ID";
                if ($resAS = mysqli_query($db, $sqlAllStudents)) {
                    while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                        ?>
                        <tr>
                            <td> <?php echo $rowsAS["activity_theme"]; ?></td>
                            <td> <?php echo date("Y-m-d",strtotime($rowsAS["Datetime"])); ?> </td>
                            <td> <?php echo $rowsAS["activity_content"]; ?> </td>
                            <td> 活动 </td>
                            <td> <?php echo $rowsAS["site"]; ?> </td>
                        </tr>
                        <?php
                    }
                }?>

                <?php
                $sqlAllStudents = "SELECT conference.meeting_theme,conference.Datetime,conference.meeting_detail,conference.site,conference_type_bmb.conference_type_name FROM conference,attend,conference_type_bmb WHERE attend.ID_number = '"
                    .$_GET['stuId']."' AND conference.conference_ID = attend.conference_ID AND conference_type_bmb.conference_type =  conference.conference_type";
                if ($resAS = mysqli_query($db, $sqlAllStudents)) {
                    while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                        ?>
                        <tr>
                            <td> <?php echo $rowsAS["meeting_theme"]; ?></td>
                            <td> <?php echo date("Y-m-d",strtotime($rowsAS["Datetime"])); ?> </td>
                            <td> <?php echo $rowsAS["meeting_detail"]; ?> </td>
                            <td> 会议-<?php echo $rowsAS["conference_type_name"]; ?> </td>
                            <td> <?php echo $rowsAS["site"]; ?> </td>
                        </tr>
                        <?php
                    }
                }?>
                </tbody>
            </table>
        </div>

        <!--修改信息-->
        <div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">修改信息</h3>
            </div>
            <div class="modal-body">
                <form id="tab">
                    <label>活动主题</label>
                    <!--从数据库中加载-->
                    <select name="">
                        <option value="0">001</option>
                        <option value="1">002</option>
                    </select>
                </form>
                <div class="modal-footer">
                    <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                    <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
                </div>
                <br/><br/><br/>
            </div>

        </div>

        <!--删除信息-->
        <div class="modal small hide fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">删除信息</h3>
            </div>
            <div class="modal-body">
                <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定删除这条信息吗？</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                <button class="btn btn-danger" data-dismiss="modal">删除</button>
            </div>
        </div>