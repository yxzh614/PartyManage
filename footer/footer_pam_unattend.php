<h2>人员缺席情况</h2>
<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>姓名</th>
          <th>身份证号</th>
          <th>缺席原因</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
      <?php 
if($result=mysqli_query($db,"SELECT * FROM unattend where conference_ID='".$id."' "))
	while($row=mysqli_fetch_assoc($result))
	{
		$result1=mysqli_query($db,"SELECT * FROM personnelinformation WHERE `ID_number`='".$row["ID_number"]."' ");
		while($row1=mysqli_fetch_assoc($result1))
		{
			$name=$row1["name"];
		}
echo"
        <tr>
          <td>$name</td>
          <td>{$row["ID_number"]}</td>
          <td>{$row["absent_reason"]}</td>       
          <td>
              <a href='#change' role='button' data-toggle='modal'><i class='icon-pencil'></i></a>
          </td>
        ";
	}
?>

        </tr>
      </tbody>
    </table>
</div>


<!--修改缺席原因-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">修改信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>缺席原因</label>
         <select name="Reason">
        	<option value="0">因公</option>
            <option value="1">因私</option>
        </select>
        <input type="text" name="absent_reason" value="00aXXYYZZ" class="input-xlarge"> 
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
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
