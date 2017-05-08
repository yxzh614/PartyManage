<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> <a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
</div>
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
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>奖</td>
          <td>校级</td>
          <td>2012年02月15日</td>
          <td>奖惩情况说明XXXXXXXXXX</td>
          <td>XXXXXXXX</td>
          <td>
              <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
              <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
     
      </tbody>
    </table>
</div>
<div class="btn-toolbar">
    <button class="btn btn-primary">全选</button>
    <button class="btn">删除</button> 
</div>


<!--修改信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">修改信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
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
       
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
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