<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
    <button class="btn">导出</button>
</div>
<div class="well">
    <div align="center">
   	  <table width="621" height="261" border="1">
    	  <tbody>
    	      	      	  <?php
    	  if($result=mysqli_query($db,"SELECT * FROM task where job_ID=$id"))
    	  	while($row=mysqli_fetch_assoc($result))
    	  	{
    	  		$id1=$row["Department_ID"];
    	  		$result1=mysqli_query($db,"SELECT * FROM organization WHERE `Department_ID`='".$id1."'");
    	  		while($row1=mysqli_fetch_assoc($result1))
    	  		{
    	  			$name=$row1["name"];
    	  		}
    	  	
    	  		echo"
    	    <tr align='center'>
    	      <td width='103'>工作主题</td>
    	      <td colspan='3'>{$row["job_theme"]}</td>
    	      <td>日期时间</td>
    	      <td>{$row["Datetime"]}</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>工作内容</td>
    	      <td colspan='5'>{$row["job_content"]}</td>
  	      </tr>
    	    <tr align='center'>
    	      <td>完成情况</td>
    	      <td colspan='5'>{$row["performance"]}</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>承担部门</td>
    	      <td colspan='5'>$name</td>
   	        </tr>
             <tr align='center'>
    	      <td>承担人员类别</td>
    	      <td colspan='5'>&nbsp;</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>照片</td>
    	      <td colspan='5'>
              	<img src='../images/140x140.gif' class='img-polaroid'>&nbsp;
                <img src='../images/140x140.gif' class='img-polaroid'>&nbsp;
              	<img src='../images/140x140.gif' class='img-polaroid'>&nbsp;
              </td>
   	        </tr>
    	    <tr align 'center'>
    	      <td>备注</td>
    	      <td colspan='5'>{$row["remark"]}</td>
  	      </tr>
              			";
    	  	}
    	  		?>
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
    <?php echo "<form id='tab' action='1_pam_task_information.php?id= $id' method='post'> "; 
        	  if($result=mysqli_query($db,"SELECT * FROM task where job_ID=$id"))
    	  	while($row=mysqli_fetch_assoc($result))
    	  	{
    	  		echo "
    	<label>工作主题</label>
        <input type='text' name='job_theme'  value='{$row["job_theme"]}' class='input-xlarge'>
        <label>日期时间</label>
        <input type='date' name='dateTime' value='{$row["Datetime"]}'>
        <label>工作内容</label>
        <textarea name='job_content' >{$row["job_content"]}</textarea>
        <label>召集部门</label>  		
        <select name='Department'>
    		   ";
        if($result1=mysqli_query($db,"SELECT * FROM organization"))
        	while($row1=mysqli_fetch_assoc($result1)){
        	echo "
        	<option value='{$row1["Department_ID"]}'"; if($row["Department_ID"]==$row1["Department_ID"]) echo "selected='selected'"; echo" >{$row1["name"]}</option>
	 			";
        }
        echo "
        </select>
        <label>完成情况</label>
        <input type='text' name='performance'  value='{$row["performance"]}' class='input-xlarge'> 
        <label>照片</label>
        <input type='file' name='photo' />
        <label>备注</label>
        <input type='text' name='remark'  value='{$row["remark"]}' class='input-xlarge'>
        ";
        }
        ?>

    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
           <input type="submit" name="save1" class="btn btn-danger" id="btn_change_sava" title='save1' value="保存" >
    </div> 
 
    	<br/><br/><br/>
  </div>  
         </form>
</div> 