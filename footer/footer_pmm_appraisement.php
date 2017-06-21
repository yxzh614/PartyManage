<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> <a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
            <th></th>
          <th>评议时间</th>
          <th>评议结果</th>
          <th>备注</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
        <form action="../del.php" method="post">
            <input id="submitType" type="hidden" name="type" value="">
      <tbody>

      <?php
      $sqlAllStudents = "SELECT * FROM appraisement WHERE ID_number = '".$_GET['stuId']."'";
      if ($resAS = mysqli_query($db, $sqlAllStudents)) {
          while ($rowsAS = mysqli_fetch_assoc($resAS)) {
              ?>

              <tr>
              <td><input type='checkbox' name='onetodel[]' value='<?php echo $rowsAS["appraisement_id"];?>'></td>
              <td> <?php echo $rowsAS["PY_time"]; ?> </td>
              <td> <?php echo $rowsAS["PY_result"]; ?> </td>
              <td> <?php echo $rowsAS["remark"]; ?> </td>
              <td>
                  <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
                  <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
              </td>
              </tr>

          <?php
          }
      }?>

      </tbody>
    </table>
</div>
<div class="btn-toolbar">
    <button class="btn btn-primary" type="button" name="allChecked" id="allChecked" onclick="DoCheck()">全选</button>
    <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('submitType').value='delAppraisement';})();" value="删除">
</div>
</form>
<!--编辑信息-->
<form id="tab" method="post" action="../Right_1/1_pmm_information_appraisement.php?stuId=<?php echo $_GET['stuId'];?>">
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>评议时间</label>
        <input type="date" name="PY_time">
        <label>评议结果</label>
        <select name="PY_result">
        	<option value="优秀">优秀</option>
            <option value="及格">及格</option>
             <option value="不及格">不及格</option>
        </select>
      
        <label>备注</label>
        <input type="text" name="remark" value="" class="input-xlarge">
       
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="submit" class="btn btn-danger" id="btn_change_save" value="保存">
    </div>
    	<br/><br/><br/>
  </div>
    
</div>
</form>

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