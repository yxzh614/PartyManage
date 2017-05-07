<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
      <table width="740" border="1">
        <tbody>
          <tr align="center">
            <td width="127">姓名</td>
            <td width="112">&nbsp;</td>
            <td width="77">性别</td>
            <td width="75">&nbsp;</td>
            <td width="140">出生日期</td>
            <td width="97">&nbsp;</td>
            <td width="66" rowspan="3">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>民族</td>
            <td>&nbsp;</td>
            <td>籍贯</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>申请入党时间</td>
            <td colspan="2">&nbsp;</td>
            <td>联系电话</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>政治面貌</td>
            <td colspan="2">&nbsp;</td>
            <td>身份证号</td>
            <td>&nbsp;</td>
            <td>所属组织</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>入团时间</td>
            <td colspan="2">&nbsp;</td>
            <td>专业</td>
            <td>&nbsp;</td>
            <td>排名</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>列积极分子时间</td>
            <td colspan="2">&nbsp;</td>
            <td>学历</td>
            <td>&nbsp;</td>
            <td>邮编</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>家庭住址</td>
            <td colspan="3">&nbsp;</td>
            <td> 培养人</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>高中入学日期</td>
            <td colspan="3">&nbsp;</td>
            <td>高中毕业日期</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>户口所在派出所</td>
            <td colspan="3">&nbsp;</td>
            <td>行政职务</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>个人特长</td>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>寝室楼号</td>
            <td>&nbsp;</td>
            <td colspan="2">寝室号</td>
            <td>&nbsp;</td>
            <td>床号</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>辅导员</td>
            <td>&nbsp;</td>
            <td colspan="2">状态</td>
            <td>&nbsp;</td>
            <td>挂科数</td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td>突出表现和存在不足</td>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>获奖情况</td>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>处分情况</td>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr align="center">
            <td>备注</td>
            <td colspan="6">&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
  
<!--修改组织信息-->
<div class="modal small hide fade" id="change_1" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>姓名</label>
        <input type="text" name="name" value="" class="input-xlarge">
        <label>性别</label>
        <input type="radio" name="sex" value="男" id="sex_0"  checked="checked" /> 男</label>
        <input type="radio" name="sex" value="女" id="sex_1" />女</label> 
      	<label>出生年月</label>
        <input type="month"  name="datetime"/>
        <label>照片</label>
        <input type="file" name="image" />
        <label>民族</label>
        <select name="nation">
        	<option value="0">汉族</option>
            <option value="1">满族</option>
            <option value="2">回族</option>
        </select>
        <label>籍贯</label>
        <select name="province">
        	<option value="0">辽宁</option>
            <option value="1">河北</option>
            <option value="2">黑龙江</option>
        </select>
        <select name="city">
        	<option value="0">沈阳</option>
            <option value="1">本溪</option>
        </select>
        <select name="district">
        	<option value="0">浑南新区</option>
            <option value="1">皇姑区</option>
        </select>
        <label>申请入党时间</label>
        <input type="date" name="">
        <label>联系电话</label>
        <input type="text" name="tel" value="" class="input-xlarge">
        <label>政治面貌</label>
        <select name="politics_status">
        	<option value="0">中共党员</option>
            <option value="1">XXXX</option>
            <option value="2">XXXX</option>
        </select>
        <label>身份证号</label>
        <input type="text" name="ID_number" value="" class="input-xlarge">
        <label>所属组织</label>
        <select name="Department_ID">
        	<option value="0">党委</option>
            <option value="1">XXXX</option>
            <option value="2">XXXX</option>
        </select>
       	<label>入团时间</label>
        <input type="date" name="Join_T_time">
        <label>专业</label>
        <input type="text" name="major" value="" class="input-xlarge">
        <label>排名</label>
        <input type="number" name="ranking" min="0">
        <label>列积极分子时间</label>
        <input type="date" name="LJJ_time" />
        <label>学历</label>
        <input type="text" name="edu"/>
        <label>培养人</label>
        <input type="text" name="trainer"/>
        <label>家庭住址</label>
        <input type="text" name="address" value="" class="input-xlarge">
        <label>邮编</label>
        <input type="text" name="zip_code" value="" class="input-xlarge">
        <label>高中入学日期</label>
        <input type="date" name="GZRX_date" />
        <label>高中毕业日期</label>
        <input type="date" name="GZBY_date" />
        <label>户口所在派出所</label>
        <input type="text" name="police_station" value="" class="input-xlarge">
        <label>行政职务</label>
        <select name="Adminis_fun">
        	<option value="0">无</option>
    		<option value="1">党委书记</option>
            <option value="2">党委副书记</option>
            <option value="3">党委组织委员</option>
            <option value="4">党委宣传委员</option>
            <option value="5">党委群工委员</option>
            <option value="6">党委体育委员</option>
            <option value="7">党支部书记</option>
            <option value="8">党支部组织委员</option>
            <option value="9">党支部宣传委员</option>
            <option value="10">党小组</option>            
        </select> 
        <label>个人特长</label>
        <input type="text" name="strong_point" value="" class="input-xlarge">
        <label>寝室楼号</label>
        <input type="text" name="floor_number" value="" class="input-xlarge">
        <label>寝室号</label>
        <input type="text" name="dormitory_number" value="" class="input-xlarge">
        <label>床号</label>
        <input type="text" name="bed_numbe" value="" class="input-xlarge">
        <label>辅导员ID</label>
        <input type="text" name="instruct_ID" value="" class="input-xlarge">
        <label>状态</label>
        <select name="state">
        	<option value="0">在校</option>
            <option value="1">毕业</option>
            <option value="2">调出</option>
        </select>
        <label>挂科数</label>
        <input type="text" name="All_funkobject_amount" value="" class="input-xlarge"> 
       	<label>突出表现和存在不足</label>
        <textarea name="TC_and_BZ" ></textarea>
        <label>获奖情况</label>
        <textarea name="Reward_condtion" ></textarea>
        <label>处分情况</label>
        <select name="YorNwrong">
        	<option value="0">是</option>
            <option value="1">否</option>
        </select>
        <label>备注</label>
        <input type="text" name="remark" />
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div>