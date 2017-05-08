<h2>人员出席情况</h2>
<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>&nbsp;
                    <button class="btn btn-primary" ><a href="#change_2" role="button" data-toggle="modal"><font color="#F7F8F7">党员名单</font></a></button>
                    <button class="btn btn-primary" ><a href="#change_2" role="button" data-toggle="modal"><font color="#F7F8F7">积极分子名单</font></a></button>
                </form>
     	</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th width="100">&nbsp;</th>
          <th>姓名</th>
          <th>身份证号</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="1"></td>
          <td>张三</td>
          <td>1305675432653</td>
          <td>
              <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="2"></td>
          <td>李四</td>
          <td>1305675432653</td>
          <td>
              <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td><input type="checkbox" name="checkboxGroup" value="3"></td>
          <td>王五</td>
          <td>1305675432653</td>
          <td>
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
<!--导入信息-->
<div class="modal small hide fade" id="change_2" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">导入信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
         <input type="checkbox" name="attend_checkboxGroup" value="1305675432653" id="attend_checkboxGroup_0" /> 张三<br />
         <input type="checkbox" name="attend_checkboxGroup" value="1305675432653" id="attend_checkboxGroup_1" /> 李四<br />
         <input type="checkbox" name="attend_checkboxGroup" value="1305675432653" id="attend_checkboxGroup_1" /> 王五<br />
    </form>
    <div class="modal-footer">
    	<button class="btn" id="btn_change_select" data-dismiss="modal" aria-hidden="true">全选</button>
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
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
                    