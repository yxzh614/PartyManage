<h4><font color="#0F258F">积极分子培训信息</font></h4>                  
<div class="btn-toolbar">
    <button class="btn btn-primary"><a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7"><i class="icon-plus"></i> 新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th>培训总结</th>
          <th>教材名称</th> 
          <th>考试成绩</th>
          <th>分学校意见</th>
          <th>考试日期</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>培训总结</td>
          <td>教材名称</td>
          <td>考试成绩</td>
          <td>分学校意见</td>
          <td>考试日期</td>
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
     	<label>培训总结</label>
        <input type="date" name="summary" /> 
        <label>教材名称</label>
        <input type="text" name="book_name" value="" class="input-xlarge">
        <label>考试成绩</label>
        <input type="text" name="score" value="" class="input-xlarge">
        <label>分学校意见</label>
        <input type="text" name="opinion" value="" class="input-xlarge"> 
        <label>考试日期</label>
        <input type="date" name="date" />      
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
