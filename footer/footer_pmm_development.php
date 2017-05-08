 <div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
  <div class="btn-group">
  </div>
</div>
 <div class="well">
    <div align="center">
      <table width="830" border="1" align="center">
        <tbody>
           
          <tr align="center">
            <td width="43" rowspan="13"><p>发展</p>
              <p>情况</p></td>
            <td width="134">发展阶段</td>
            <td width="110">&nbsp;</td>
            <td width="134">组织机构ID</td>
            <td width="115">&nbsp;</td>
            <td width="154">状态</td>
            <td width="94">&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">入团时间</td>
            <td>&nbsp;</td>
            <td colspan="2">申请入党时间</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">列积极分子时间</td>
            <td>&nbsp;</td>
            <td colspan="2">入党积极分子培训时间</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">团员大会日期</td>
            <td>&nbsp;</td>
            <td colspan="2">列发展对象时间</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">党前培训时间</td>
            <td>&nbsp;</td>
            <td colspan="2">计划发展时间</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">接收预备党员公示时间</td>
            <td>&nbsp;</td>
            <td colspan="2">预备党员转正公示时间</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">转正时间</td>
            <td>&nbsp;</td>
            <td colspan="2">入党时间</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td colspan="2">积极分子培训成绩</td>
            <td>&nbsp;</td>
            <td colspan="2">党前培训成绩</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td width="134">支部确定入党积极分子会议ID</td>
            <td width="110">&nbsp;</td>
            <td width="134">支部确定发展对象会议ID</td>
            <td width="115">&nbsp;</td>
            <td width="154">支部接收预备党员会议ID</td>
            <td width="94">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>支部预备党员转正会议ID</td>
            <td>&nbsp;</td>
            <td>党委审批预备党员会议ID</td>
            <td>&nbsp;</td>
            <td>党委审批预备党员转正会议ID</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td>谈话人</td>
            <td>&nbsp;</td>
            <td>谈话时间</td>
            <td>&nbsp;</td>
            <td>谈话地点</td>
            <td>&nbsp;</td>
            </tr>
          <tr align="center">
            <td>党员转入时间</td>
            <td colspan="1">&nbsp;</td>
            <td>转入自何处</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>党员转出时间</td>
            <td colspan="1">&nbsp;</td>
            <td>转去何处</td>
            <td colspan="3">&nbsp;</td>
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
        <label>发展阶段</label>
        <select name="development_stage">
        	<option value="0">申请入党</option>
            <option value="1">确定入党积极分子</option>
            <option value="2">接收预备党员</option>
            <option value="3">预备党员转正</option>
        </select>
        
        <label>组织机构ID</label>
        <input type="text" name="department_ID" value="" class="input-xlarge"> 
        <label>状态</label>
        <select name="state">
        	<option value="0">在校</option>
            <option value="1">毕业</option>
            <option value="2">调出</option>
        </select>
       	<label>入团时间</label>
        <input type="date"  name="join_t_time"/>
        <label>申请入党时间</label>
        <input type="date" name="SQRD_time" />
        <label>列积极分子时间</label>
        <input type="date" name="LJJ_time" />
        <label>入党积极分子培训时间</label>
        <input type="date" name="JJPX_time" />
        <label>团员大会日期</label>
        <input type="date" name="Tmember_meet_time" />
        <label>列发展对象时间</label>
        <input type="date"  name="LFZobject_time"/>
        <label>党前培训时间</label>
        <input type="date" name="DQPX_time" />
        <label>计划发展时间</label>
        <input type="date" name="Developmentplan_time" />
        <label>接收预备党员公示时间</label>
        <input type="date" name="Publicity_time" />
        <label>预备党员转正公示时间</label>
        <input type="date" name="ZZ_publicity_time" />
        <label>转正时间</label>
        <input type="date" name="Bec_official_time" />
        <label>入党时间</label>
        <input type="date" name="RD_datetime" />
        <label>积极分子培训成绩</label>
        <input type="text" name="JJPX_mark" value="" class="input-xlarge" />
        <label>党前培训成绩</label>
        <input type="text" name="DQPX_mark" value="" class="input-xlarge"> 
                <label>支部确定入党积极分子会议ID</label>
        <input type="text" name="ZQ_positivemeet_ID" value="" class="input-xlarge"> 
        <label>支部确定发展对象会议ID</label>
        <input type="text" name="ZQ_devemembermeet_ID" value="" class="input-xlarge"> 
        <label>支部接收预备党员会议ID</label>
        <input type="text" name="ZJ_readymeet_ID" value="" class="input-xlarge"> 
       	<label>支部预备党员转正会议ID</label>
        <input type="text" name="ZSbec_officalmeet_ID" value="" class="input-xlarge">
        <label>党委审批预备党员会议</label>
        <input type="text" name="DS_readymeet_ID" value="" class="input-xlarge">
        <label>党委审批预备党员转正会议</label>
        <input type="text" name="Bec_officialmeet_ID" value="" class="input-xlarge">
        <label>谈话人</label>
        <input type="text" name="Talker_ID" value="" class="input-xlarge">
        <label>谈话时间</label>
        <input type="date" name="Talk_time" />
        <label>谈话地点</label>
        <input type="text" name="Talk_site" value="" class="input-xlarge">
        <label>党员转入时间</label>
        <input type="date" name="In_time" />
        <label>转入自何处</label>
        <input type="text" name="In_where" value="" class="input-xlarge">
        <label>党员转出时间</label>
        <input type="date" name="Out_time" />
        <label>转去何处</label>
        <input type="text" name="Ge_where" value="" class="input-xlarge">

        
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div>