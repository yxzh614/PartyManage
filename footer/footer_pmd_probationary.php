<h2>预备党员阶段信息</h2>
<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_3" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
      <table width="795" border="1">
        <tbody>
          <tr align="center">
            <td width="202">支部确定发展对象会议</td>
            <td width="144">&nbsp;</td>
            <td colspan="2">计划发展时间</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>支部接收预备党员会议</td>
            <td>&nbsp;</td>
            <td colspan="2">接收预备党员公示时间</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>谈话人</td>
            <td>&nbsp;</td>
            <td colspan="2">谈话地点</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>谈话时间</td>
            <td>&nbsp;</td>
            <td colspan="2">党委审批预备党员会议</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>党前培训时间</td>
            <td>&nbsp;</td>
            <td width="69">培训成绩</td>
            <td width="99">&nbsp;</td>
            <td width="119">列发展对象时间</td>
            <td width="122">&nbsp;</td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
  
<!--修改组织信息-->
<div class="modal small hide fade" id="change_3" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
       <label>支部确定发展对象会议</label>
       <select name="ZQ_devemembermeet">
        	<option value="会议ID">会议主题1</option>
            <option value="会议ID">会议主题2</option>
        </select>
       <label>计划发展时间</label>
       <input type="date" name="Developmentplan_time"/>
       <label>支部接收预备党员会议</label>
       <select name="ZJ_readymeet">
        	<option value="会议ID">会议主题1</option>
            <option value="会议ID">会议主题2</option>
        </select>
       <label>接收预备党员公示时间</label>
       <input type="date" name="Publicity_time"/>
       <label>谈话人</label>
       <input type="text" name="Talker_name" />
       <label>谈话地点</label>
       <input type="text" name="Talk_site" />
       <label>谈话时间</label>
       <input type="date" name=""/>
       <label>党委审批预备党员会议</label>
       <select name="DS_readymeet">
        	<option value="会议ID">会议主题1</option>
            <option value="会议ID">会议主题2</option>
        </select>
       <label>党前培训时间</label>
       <input type="date" name="DQPX_time"/>
       <label>培训成绩</label>
       <input type="text" name="DQPX_mark" />
       <label>列发展对象时间</label>
       <input type="date" name="LFZobject_time"/>
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div>