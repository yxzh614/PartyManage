<h2>入党积极分子阶段信息</h2>
<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_2" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
      <table width="657" border="1">
        <tbody>
          <tr align="center">
            <td width="231"><p >支部确定入党积极分子会议</p></td>
            <td width="203">&nbsp;</td>
            <td width="92"><p >团推优时间</p></td>
            <td width="103">&nbsp;</td>
          </tr>
          <tr align="center">
            <td><p >入党积极分子分子培训时间</p></td>
            <td>&nbsp;</td>
            <td><p >培训成绩</p></td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
  
<!--修改组织信息-->
<div class="modal small hide fade" id="change_2" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab"> 
        <label>支部确定入党积极分子会议</label>
        <select name="ZQ_positivemeet">
        	<option value="会议ID">会议主题1</option>
            <option value="会议ID">会议主题2</option>
        </select>
        <label>团推优时间</label>
        <input type="date" name="Tmember_meet_time">
        <label>积极分子分子培训时间</label>
        <input type="date" name="JJPX_time">
        <label>培训成绩</label>
        <input type="text" name="JJPX_mark" />
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div>