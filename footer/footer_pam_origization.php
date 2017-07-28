<!--编辑组织信息-->

<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
   <form <?php "id='tab' action='../Right_1/1_pam_organization.php' method='post'" ?>>
  /// <?php
   echo "
        <label>上级组织机构</label>
        <select name='SJ1'>
            <option value='C'>党委</option>
            <option value='B'>党总支</option>
        </select>
        <select name='SJ2'>
        </select>
        <select name='SJ3'>
        </select>
    		";
        ?>
        <label>名称</label>
        <input type="text" name="name" value="" class="input-xlarge">
        <label>简称</label>
        <input type="text" name="shortname" value="" class="input-xlarge">
        <label>状态</label>
        <select name="state">
        	<option value="0">有效</option>
            <option value="1">无效</option>
        </select>
       	<label>生效日期</label>
        <input type="date" name="Effective_date" />
        <label>失效日期</label>
        <input type="date" name="Expiry_date" />  
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>
</div>

<!--删除组织信息-->
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
