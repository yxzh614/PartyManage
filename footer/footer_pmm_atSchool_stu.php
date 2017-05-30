 <div class="btn-toolbar">
    <button class="btn btn-primary" ><font color="#F7F8F7">保存</font></button>
</div>
<div class="well">
    <div align="center">
      <table width="672">
        <tbody>
<?php
        $sqlAllStudents = "SELECT *,Person_cate1_name FROM personnelinformation,person_cate1_bmb WHERE (`person_cate2`=1 OR`person_cate2`=2)  AND person_cate1=Person_cate1_";
        if ($resAS = mysqli_query($db, $sqlAllStudents)) {
while ($rowsAS = mysqli_fetch_assoc($resAS)) {
?>
<tr align="right">
    <td width="145">综合素质排名：</td>
    <td width="201" align="left"><input type="text" name="ranking" value="班级综合测评名次/班级人数" class="input-large"/></td>
    <td width="129">全学程不及格门数：</td>
    <td width="169" align="left"><input type="text" name="All_funkobject_amount" value="" class="input-medium"/></td>
</tr>
<tr align="right">
    <td>突出表现和存在不足：</td>
    <td align="left"><textarea name="TC_and_BZ" class="input-large"></textarea></td>
    <td>外语语种：</td>
    <td align="left"><input type="text" name="language" value="" class="input-medium"/></td>
</tr>
<tr align="right">
    <td>获奖情况：</td>
    <td align="left"><textarea name="Reward_condtion" class="input-large"></textarea></td>
    <td>处分情况：</td>
    <td align="left">
        <select name="YorNwrong" class="input-medium">
            <option value="0">是</option>
            <option value="1">否</option>
        </select></td>
</tr>
        </tbody>
      </table>
    </div>
</div>

 <?php
 }
 }