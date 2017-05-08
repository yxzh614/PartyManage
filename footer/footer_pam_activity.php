<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
</div>
<div class="well">
    <div align="center">
   	  <table width="621" border="1">
    	  <tbody>
    	    <tr align="center">
    	      <td width="100">活动主题</td>
    	      <td colspan="5">&nbsp;</td>
   	        </tr>
    	    <tr align="center">
    	      <td>日期时间</td>
    	      <td width="109">&nbsp;</td>
    	      <td width="82">地点</td>
    	      <td width="85">&nbsp;</td>
    	      <td width="83">召集部门</td>
    	      <td width="101">&nbsp;</td>
  	      </tr>
    	    <tr align="center">
    	      <td>参与部门</td>
    	      <td colspan="5">&nbsp;</td>
   	        </tr>
            <tr align="center">
    	      <td>参与人员类别</td>
    	      <td colspan="5">&nbsp;</td>
   	        </tr>
    	    <tr align="center">
    	      <td>活动内容</td>
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
    	<label>活动主题</label>
        <input type="text" name="activity_theme" id="activity_theme" value="" class="input-xlarge">
        <label>日期时间</label>
        <input type="date" name="dataTime">
        <label>地点</label>
        <input type="text" name="place" id="place" value="" class="input-xlarge">
        <label>召集部门</label>
        <select name="Department">
        	<option value="0">XXXX</option>
            <option value="1">VVVV</option>
        </select>
        <label>参与部门</label>
        <input type="text" name="participation_ID" id="participation_ID" value="" class="input-xlarge">  
       	<label>活动内容</label>
        <textarea name="activity_content"></textarea>
         <label>照片</label>
        <input type="file" name="photo" />
        
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
    	<br/><br/><br/>
  </div>   
</div>