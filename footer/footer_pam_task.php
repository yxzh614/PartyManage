<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
    <button class="btn">导出</button>
</div>
<div class="well">
    <div align="center">
   	  <table width="621" height="261" border="1">
    	  <tbody>
    	    <tr align="center">
    	      <td width="103">工作主题</td>
    	      <td colspan="3">&nbsp;</td>
    	      <td>日期时间</td>
    	      <td>&nbsp;</td>
   	        </tr>
    	    <tr align="center">
    	      <td>工作内容</td>
    	      <td width="105">&nbsp;</td>
    	      <td width="78">&nbsp;</td>
    	      <td width="103">&nbsp;</td>
    	      <td width="86">&nbsp;</td>
    	      <td width="106">&nbsp;</td>
  	      </tr>
    	    <tr align="center">
    	      <td>完成情况</td>
    	      <td colspan="5">&nbsp;</td>
   	        </tr>
    	    <tr align="center">
    	      <td>承担部门</td>
    	      <td colspan="5">&nbsp;</td>
   	        </tr>
             <tr align="center">
    	      <td>承担人员类别</td>
    	      <td colspan="5">&nbsp;</td>
   	        </tr>
    	    <tr align="center">
    	      <td>照片</td>
    	      <td colspan="5">
              	<img src="../images/140x140.gif" class="img-polaroid">&nbsp;
                <img src="../images/140x140.gif" class="img-polaroid">&nbsp;
              	<img src="../images/140x140.gif" class="img-polaroid">&nbsp;
              </td>
   	        </tr>
    	    <tr align="center">
    	      <td>备注</td>
    	      <td colspan="5">&nbsp;</td>
  	      </tr>
        </tbody>
  	  </table>
    </div>
</div>
  
<!--编辑信息-->
<div class="modal small hide fade" id="change_1" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
    	<label>工作主题</label>
        <input type="text" name="Job_theme" id="activity_theme" value="" class="input-xlarge">
        <label>日期时间</label>
        <input type="date" name="dataTime">
        <label>工作内容</label>
        <textarea name="activity_content"></textarea>
        <label>召集部门</label>
        <select name="Department">
        	<option value="0">XXXX</option>
            <option value="1">VVVV</option>
        </select>
        <label>完成情况</label>
        <input type="text" name="performance" id="participation_ID" value="" class="input-xlarge"> 
        <label>照片</label>
        <input type="file" name="photo" />
        <label>备注</label>
        <input type="text" name="remark" id="participation_ID" value="" class="input-xlarge">
        
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div> 