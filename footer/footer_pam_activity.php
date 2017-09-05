<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
</div>
<div class="well">
    <div align="center">
   	  <table width="621" border="1">
    	  <tbody>
    	  <?php
    	  if($result=mysqli_query($db,"SELECT * FROM activity where Activity_ID='".$id."'"))
    	  	while($row=mysqli_fetch_assoc($result))
    	  	{
    	  		$id1=$row["Department_ID"];
    	  		$result1=mysqli_query($db,"SELECT * FROM organization WHERE `Department_ID`='".$id1."'");
    	  		while($row1=mysqli_fetch_assoc($result1))
    	  		{
    	  			$name=$row1["name"];
    	  		}
    	  		echo "
    	    <tr align='center'>
    	      <td width='100'>活动主题</td>
    	      <td colspan='5'>{$row["activity_theme"]}</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>日期时间</td>
    	      <td width='109'>{$row["Datetime"]}</td>
    	      <td width='82'>地点</td>
    	      <td width='85'>{$row["site"]}</td>
    	      <td width='83'>召集部门</td>
    	      <td width='101'>$name</td>
  	      </tr>
    	    <tr align='center'>
    	      <td>参与部门</td>
    	      <td colspan='5'>{$row["join_depart"]}</td>
   	        </tr>
            <tr align='center'>
    	      <td>参与人员类别</td>
    	      <td colspan='5'>{$row["othert_member"]}</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>活动内容</td>
    	      <td colspan='5'>{$row["activity_content"]}</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>照片</td>
    	      <td colspan='5'>
              	<img src='../images/140x140.gif' class='img-polaroid'>&nbsp;
                <img src='../images/140x140.gif' class='img-polaroid'>&nbsp;
              	<img src='../images/140x140.gif' class='img-polaroid'>&nbsp;
              </td>
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
    <?php echo "<form id='tab' action='1_pam_activity_information.php?id= $id' method='post'> "; ?>
    <?php 
    if($result=mysqli_query($db,"SELECT * FROM activity where Activity_ID=$id"))
    	while($row=mysqli_fetch_assoc($result))
    	{
    		echo "
    	<label>活动主题</label>
        <input type='text' name='activity_theme' id='activity_theme' value={$row["activity_theme"]} class='input-xlarge'>
        <label>日期时间</label>
        <input type='date' name='dateTime' value={$row["Datetime"]}>
        <label>地点</label>
        <input type='text' name='place' id='place' value={$row["site"]} class='input-xlarge'>
        <label>召集部门</label>
        <select name='Department'>
        ";
        if($result1=mysqli_query($db,"SELECT * FROM organization"))
        	while($row1=mysqli_fetch_assoc($result1)){
        	echo "
        	<option value={$row1["Department_ID"]}"; if($row["Department_ID"]==$row1["Department_ID"]) echo " selected='selected'"; echo">{$row1["name"]}</option>
	 			";
        }
        	echo "
    	</select>
        <label>参与人员类别</label>
        <select name='else_member'>
        <option value='全部'  "; if($row["othert_member"]=='全部') echo "selected='selected'"; echo">全部</option>
        <option value='党员' "; if($row["othert_member"]=='党员') echo "selected='selected'"; echo">党员</option>
        <option value='积极分子' "; if($row["othert_member"]=='积极分子') echo "selected='selected'"; echo" >积极分子</option>
        </select>
        <label>参与部门</label>
        <input type='text' name='participation_ID' id='participation_ID' value='{$row["join_depart"]}'  class='input-xlarge'>  
       	<label>活动内容</label>
        <textarea name='activity_content'>{$row["activity_content"]}</textarea>
         <label>照片</label>
        <input type='file' name='photo' />
  	      		";
    	}
  	      		?>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="save1" class="btn btn-danger" id="btn_change_sava"  value="保存" >
    </div>   
     </form>
    	<br/><br/><br/>
  </div>   
</div>