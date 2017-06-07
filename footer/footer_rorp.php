<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> <a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
</div>
<form action="../del.php" method="post">
    <input id="submitType" type="hidden" name="type" value="">
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th>类型</th>
          <th>奖励级别</th>
          <th>时间</th>
          <th>奖惩情况说明</th>
          <th>备注</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
      <?php
      $sqlAllStudents = "SELECT * FROM rorp WHERE ID_number = '".$_GET['stuId']."'";
      if ($resAS = mysqli_query($db, $sqlAllStudents)) {
          while ($rowsAS = mysqli_fetch_assoc($resAS)) {
              echo "<tr>";
              echo "<td><input type='checkbox'  name='onetodel[]' value='" . $rowsAS["reward_id"] . "'></td>";?>
              <td> <?php echo $rowsAS["type"]==1?"奖":"惩"; ?> </td>

              <td> <?php switch ($rowsAS["award_rank"]){
                  case 1:echo "国家级";break;
                  case 2:echo "省级";break;
                  case 3:echo "市级";break;
                  case 4:echo "校级";break;
              } ?> </td>
                      <?php
              echo "<td>" . $rowsAS["Time"] . "</td>";
              echo "<td>" . $rowsAS["JC_explain"] . "</td>";
              echo "<td>" . $rowsAS["remark"] . "</td>";
              ?>
              <td>
                  <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
                  <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
              </td>
              <?php
              echo "</tr>";
          }
      }?>
      </tbody>
    </table>
</div>
<div class="btn-toolbar">
    <button class="btn btn-primary" type="button" name="allChecked" id="allChecked" onclick="DoCheck()">全选</button>
    <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('submitType').value='delRorp';})();" value="删除">
</div>
</form>


<!--修改信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <form id="tab" method="post" action="../Right_1/1_pmm_information_rorp.php?stuId=<?php echo $_GET['stuId'];?>">
    <div class="modal-body">
     	<label>类型</label>
        <select name="type">
        	<option value="1">奖</option>
            <option value="0">惩</option>
        </select>
        <label>奖励级别</label>
        <select name="award_rank">
        	<option value="1">国家</option>
            <option value="2">省</option>
            <option value="3">市</option>
            <option value="4">校</option>
        </select>
        <label>日期</label>
        <input type="date" name="Time">
<!--        <label>地点</label>-->
<!--        <input type="text" name="place"  value="" class="input-xlarge">-->
        <label>奖惩情况说明</label>
        <textarea name="JC_explain"></textarea>
        <label>备注</label>
        <input type="text" name="remark" value="" class="input-xlarge">


    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="submit" class="btn btn-danger" id="btn_change_save" value="保存">
    </div>
        </form>
    	<br/><br/><br/>
  </div>

</div>

<!--删除信息-->
<div class="modal small hide fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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