 <div class="btn-toolbar">
    <button class="btn btn-primary" ><font color="#F7F8F7">保存</font></button>
</div>
<div class="well">
    <div align="center">
      <table width="672">
        <tbody>
        <?php
        if(isset($_GET["stuId"])) {
        $sqlAllStudents = "SELECT ranking,all_funkobject_amount,TC_and_BZ,YorNwrong,reward_condtion,language_name FROM personnelinformation,language_bmb WHERE ID_number = '" . $_GET["stuId"] . "'&& personnelinformation.language=language_bmb.language";
        if ($resAS = mysqli_query($db, $sqlAllStudents)) {
        if($rowsAS = mysqli_fetch_assoc($resAS))
        ?>
<tr align="right">
    <td width="145">综合素质排名：</td>
    <td width="201" align="left"><input type="text" name="ranking" value="<?php echo$rowsAS['ranking'] ?>" class="input-large"/></td>
    <td width="129">全学程不及格门数：</td>
    <td width="169" align="left"><input type="text" name="All_funkobject_amount" value="<?php echo$rowsAS['all_funkobject_amount'] ?>" class="input-medium"/></td>
</tr>
<tr align="right">
    <td>突出表现和存在不足：</td>
    <td align="left"><textarea name="TC_and_BZ" class="input-large"><?php echo$rowsAS['TC_and_BZ'] ?></textarea></td>
    <td>外语语种：</td>
    <td align="left"><input type="text" name="language" value="<?php echo$rowsAS['language_name'] ?>" class="input-medium"/></td>
</tr>
<tr align="right">
    <td>获奖情况：</td>
    <td align="left"><textarea name="Reward_condtion" class="input-large"><?php echo$rowsAS['reward_condtion'] ?></textarea></td>
    <td>处分情况：</td>
    <td align="left">
        <?php
        if ($rowsAS["YorNwrong"] == 0) {
            ?>
            <input type="radio" name="YorNwrong" value="0" id="sex_0" checked="checked"/> 是
            <input type="radio" name="YorNwrong" value="1" id="sex_1"/>否
            <?php
        } else {
            ?>
            <input type="radio" name="YorNwrong" value="0" id="sex_0"/> 是
            <input type="radio" name="YorNwrong" value="1" id="sex_1" checked="checked"/>否
            <?php
        }
        ?>
    </td>
</tr>
        </tbody>
      </table>
    </div>
</div>

 <?php
 }
 }