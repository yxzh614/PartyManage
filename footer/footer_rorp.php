<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> <a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
</div>
<div class="well">
   <form <?php $id=$_GET(); echo " id='tab' action='../Right_1/1_pam_organization_rorp.php?id={$id}' method='post'"?>>
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
      if($result=mysqli_query($db,"SELECT * FROM ororp WHERE `Department_ID`=$id"))
      while($row=mysqli_fetch_assoc($result)){
      	switch($row["type"])
      	{
      		case 0: $type="奖"; break;
      		case 1: $type="惩"; break;
      	}
      	switch($row["award_rank"])
      	{
      		case 0: $award_rank="国家级";break;
      		case 1: $award_rank="省级";break;
      		case 2: $award_rank="市级";break;
      		case 3: $award_rank="校级";break;
      	}
      	echo "
        <tr>
          <td><input type='checkbox' name='del[]' value={$row["JC_explain"]} id={$row["JC_explain"]} class='rorp'></td>
          <td>$type</td>
          <td>$award_rank</td>
          <td>{$row["Time"]}</td>
          <td>{$row["JC_explain"]}</td>
          <td>{$row["remark"]}</td>
          <td>
              <a href='#change' role='button' data-toggle='modal'><i class='icon-pencil'></i></a>
              <a href='#delete' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
          </td>
        </tr>
        ";
      }
     ?>
      </tbody>
    </table>
<div class="btn-toolbar">
     <input type="button" class="btn btn-primary" onclick="selectAll()" value="全选">
    <input type="submit" name="del1" class="btn" id="btn_change_sava"  value="删除" >
</div>
</form>
</div>


<!--修改信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">修改信息</h3>
    </div>
    <div class="modal-body">     
    <form<?php echo " id='tab' action='../Right_1/1_pam_organization_rorp.php?id={$id}' method='post'"?>>
     	<label>类型</label>
        <select name="type">
        	<option value="0">奖</option>
            <option value="1">惩</option>
        </select>
        <label>奖励级别</label>
        <select name="award_rank">
        	<option value="0">国家</option>
            <option value="1">省</option>
            <option value="2">市</option>
            <option value="3">校</option>
        </select>
        <label>日期</label>
        <input type="date" name="date">
        <label>地点</label>
        <input type="text" name="place"  value="" class="input-xlarge">	
        <label>奖惩情况说明</label>
        <textarea name="JC_explain"></textarea>
        <label>备注</label>
        <input type="text" name="remark" value="" class="input-xlarge">
       

    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="save" class="btn btn-danger" id="btn_change_sava" value="保存" >
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