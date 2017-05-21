<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> <a href="#change" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
     <button class="btn"><a href="#feiyong" role="button" data-toggle="modal"><font color="#000000">党费计算器</font></a></button>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th width="144">身份证号</th>
          <th width="42">姓名</th>
          <th width="57">应缴金额(元)</th>
          <th width="60">实缴金额(元)</th>
          <th width="52">欠缴金额(元)</th>
          <th width="82">欠缴起始时间</th>
          <th width="82">欠缴结束时间</th>
          <th width="78">欠缴原因</th>
          <th width="89">处理意见</th>
          <th width="75">备注</th>
          <th width="26" style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>123456786567804678</td>
          <td>李四</td>
          <td>160</td>
          <td>140</td>
          <td>20</td>
          <td>2014年11月22日</td>
          <td>2014年12月22日</td>
          <td>欠缴原因XXXX</td>
          <td>处理意见XXXXX</td>
          <td>备注XXXXX</td>
          <td>
              <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
              <a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
</div>
<!--党费计算-->
<div class="modal small hide fade" id="feiyong" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">党费计算</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
     	<label>党员类型</label>
       <select name="dangyuantype">
        	<option value="1">在职</option>
            <option value="2">退休</option>
           
        </select> 
        <label>月工资</label>
        <input type="text" name="name" value="" class="input-xlarge">
      元<br>
      <button class="btn btn-primary">计算</button>
       <br>
       <br>
        <label>每月应缴费</label>
         <input type="text" name="name" value="" class="input-xlarge">
        
    元
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">关闭</button>
    </div>
    	<br/><br/><br/>
  </div>
    
</div>


<!--编辑信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
     	<label>身份证号</label>
        <input type="text" name="ID_number" value="" class="input-xlarge">
        <label>姓名</label>
        <input type="text" name="name" value="" class="input-xlarge">
        <label>欠缴金额(元)</label>
        <input type="text" name="QJ_money" value="" class="input-xlarge">
        <label>欠缴起始时间</label>
        <input type="date" name="QJ_starttime">
        <label>欠缴结束时间</label>
        <input type="date" name="QJ_endtime">
       	<label>欠缴原因</label>
        <input type="text" name="QJ_reasom" value="" class="input-xlarge">
        <label>处理意见</label>
        <input type="text" name="Hand_advise" value="" class="input-xlarge">
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
  