<h2>预备党员转正阶段信息</h2>
<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
      <table width="788" border="1">
        <tbody>
          <tr align="center">
            <td width="211">党委审批预备党员转正会议</td>
            <td width="183">&nbsp;</td>
            <td width="183">预备党员转正公示时间</td>
            <td width="183">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>转正时间</td>
            <td>&nbsp;</td>
            <td>入党时间</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>党员转入时间</td>
            <td>&nbsp;</td>
            <td>转入自何处</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>党员转出时间</td>
            <td>&nbsp;</td>
            <td>转出自何处</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
  
<!--修改组织信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>党委审批预备党员转正会议</label>
        <select name="Bec_officialmeet">
        	<option value="会议ID">会议主题1</option>
            <option value="会议ID">会议主题2</option>
        </select>
        <label>预备党员转正公示时间</label>
        <input type="date" name="ZZ_publicity_time" />
        <label>转正时间</label>
        <input type="date" name="Bec_official_time" />
        <label>入党时间</label>
        <input type="date" name="RD_datetime" />
        <label>党员转入时间</label>
        <input type="date" name="In_time" />
        <label>转入自何处</label>
        <input type="text" name="In_where"/>
        <label>党员转出时间</label>
        <input type="date" name="Out_time" />
        <label>转出自何处</label>
        <input type="text" name="Ge_where"/>
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div>