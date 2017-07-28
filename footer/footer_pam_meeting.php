<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#change_1" role="button" data-toggle="modal"><font color="#F7F8F7">编辑</font></a></button>
    <button class="btn">导出</button>
</div>
<div class="well">
    <div align="center">
   	  <table width="621" border="1">
    	  <tbody>
    	      	  <?php
    	  if($result=mysqli_query($db,"SELECT * FROM conference where conference_ID='".$id."'"))
    	  	while($row=mysqli_fetch_assoc($result))
    	  	{
    	  		$id1=$row["Department_ID"];
    	  		$result1=mysqli_query($db,"SELECT * FROM organization WHERE `Department_ID`='".$id1."'");
    	  		while($row1=mysqli_fetch_assoc($result1))
    	  		{
    	  			$name=$row1["name"];
    	  		}
    	  		$result2=mysqli_query($db,"SELECT * FROM conference_type_bmb WHERE `conference_type`={$row["conference_type"]}");
    	  		while($row2=mysqli_fetch_assoc($result2))
    	  		{
    	  			$type=$row2["conference_type_name"];
    	  		}
    	  		$join=$row["Join"];
    	  		$jd=explode(',',$join);
    	  		echo "
    	    <tr align='center'>
    	      <td width='103'>会议主题</td>
    	      <td colspan='3'>{$row["meeting_theme"]}</td>
    	      <td>会议类型</td>
    	      <td>$type</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>日期时间</td>
    	      <td width='105'>{$row["Datetime"]}</td>
    	      <td width='78'>地点</td>
    	      <td width='103'>{$row["site"]}</td>
    	      <td width='86'>召集部门</td>
    	      <td width='106'>$name</td>
  	      </tr>
    	    <tr align='center'>
    	      <td>参与部门</td>
    	      <td colspan='5'>";	
    	      for($index=0;$index<count($jd);$index++){
    	  			echo"    	  			
    	      $jd[$index],"
    	      		;
    	      }
    	      		echo "
    	      		</td>
   	        </tr>
   	         <tr align='center'>
    	      <td>参与人员类别</td>
    	      <td colspan='5'>{$row["else_member"]}</td>
   	        </tr>
    	    <tr align='center'>
    	      <td>会议内容</td>
    	      <td colspan='5'>{$row["meeting_detail"]}</td>
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
        <?php echo "<form id='tab' action='1_pam_meeting_information.php?id= $id' method='post'> "; ?>
          <?php
    	  if($result=mysqli_query($db,"SELECT * FROM conference where conference_ID=$id"))
    	  	while($row=mysqli_fetch_assoc($result))
    	  	{
    	  		echo "
    	<label>会议主题</label>
        <input type='text' name='activity_theme' id='activity_theme' value={$row["meeting_theme"]} class='input-xlarge'>
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
        	<option value={$row1["Department_ID"]}"; if($row1["Department_ID"]==$row["Department_ID"]) echo " selected='selected' "; echo">{$row1["name"]}</option>
	 			";
        }
        echo "
        </select>
    	<label>参与部门</label>
    	<select name='join_choose'>";
    	  if($result1=mysqli_query($db,"SELECT * FROM organization"))
        	while($row1=mysqli_fetch_assoc($result1)){
        	echo "
        	<option value={$row1["Department_ID"]}>{$row1["name"]}</option>
	 			";
    	  }
        	echo "
    	</select>
    	<input type='text' name='Join' id='Join' value='{$row["Join"]}' class='input-xlarge'>
        <label>参与人员类别</label>
        <select name='else_member'>
        <option value='全部'  "; if($row["else_member"]=='全部') echo "selected='selected'"; echo">全部</option>
        <option value='党员' "; if($row["else_member"]=='党员') echo "selected='selected'"; echo">党员</option>
        <option value='积极分子' "; if($row["else_member"]=='积极分子') echo "selected='selected'"; echo" >积极分子</option>
        </select>
        <label>会议类型</label>
         <select name='Conference_type'>
         ";
        if($result2=mysqli_query($db,"SELECT * FROM conference_type_bmb"))
        	while($row2=mysqli_fetch_assoc($result2)){
        	echo "
        	<option value={$row2["conference_type"]}"; if($row["conference_type"]==$row2["conference_type"]) echo " selected='selected' "; echo">{$row2["conference_type_name"]}</option>
	 			";
        }
        echo "
        </select>
       	<label>会议内容</label>
        <textarea name='activity_content'>{$row["meeting_detail"]}</textarea>
        <label>照片</label>
        <input type='file' name='photo' />
              			";
    	  	}
        ?>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                <input type="submit" name="save1" class="btn btn-danger" id="btn_change_sava" title='save1' value="保存" >
    </div>  
      </form>
    	<br/><br/><br/>
  </div>   
</div>