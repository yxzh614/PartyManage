<script type="text/javascript" language="javaScript">
function selectAll() {
	    $(".par").attr("checked", true); //全部选中
	    return false;
}
</script>
<!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                    <button class="btn btn-primary" ><a href="#change_2" role="button" data-toggle="modal"><font color="#F7F8F7">党员名单</font></a></button>
                    <button class="btn btn-primary" ><a href="#change_2" role="button" data-toggle="modal"><font color="#F7F8F7">积极分子名单</font></a></button>
                </form>
     	</div>
<div class="well">
  <?php echo "<form action='1_pam_task_information.php?id=$id' method='post'> "; ?>
    <table class="table">
      <thead>
        <tr>
          <th width="50">&nbsp;</th>
          <th>姓名</th>
          <th>身份证号</th>
          <th>承担的工作</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
      <?php 
if($result=mysqli_query($db,"SELECT * FROM participator where job_ID=$id"))
	while($row=mysqli_fetch_assoc($result))
	{
		$result1=mysqli_query($db,"SELECT * FROM personnelinformation WHERE `ID_number`={$row["ID_number"]} ");
		while($row1=mysqli_fetch_assoc($result1))
		{
			$name=$row1["name"];
		}
echo"
        <tr>
          <td><input type='checkbox' name='del[]' value={$row["ID_number"]} id={$row["ID_number"]} class='par'></td>
          <td>$name</td>
          <td>{$row["ID_number"]}</td>
          <td>{$row["take_job"]}</td>
          <td>
              <a href='#change' role='button' data-toggle='modal'><i class='icon-pencil'></i></a>
              <a href='#delete' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
          </td>
        </tr>      
        ";
  		}
?>
      </tbody>
    </table>
<div class="btn-toolbar">
     <input type='button' class='btn btn-primary' onclick="selectAll()" value='全选'>
    <input type='submit' name='del1' class='btn' id='btn_change_sava'  value='删除' >
    </div>
    </form>
</div>

<!--导入信息-->
<div class="modal small hide fade" id="change_2" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">修改信息</h3>
    </div>
    <div class="modal-body">     
      <?php echo "<form id='tab' action='1_pam_task_information.php?id=$id' method='post'> "; 
      if($result=mysqli_query($db,"SELECT * FROM personnelinformation where person_cate2='03' or person_cate2='04' "))
      	while($row=mysqli_fetch_assoc($result))
      	{
      		echo "
            <input type='checkbox' name='save[]' value={$row["ID_number"]} id={$row["ID_number"]} > {$row["name"]}<br />
      		";
      	}
  ?>

    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
         <input type="submit" name="save2" class="btn btn-danger" id="btn_change_sava" title='save2' value="保存" >
    </div>  
      
    	<br/><br/><br/>
  </div>
    </form>
</div>
<!--修改信息-->
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">修改信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab">
        <label>承担工作</label>
        <input type="text" name="work" value="整理文档" class="input-xlarge">
        <button class="btn" id="btn_change_select" data-dismiss="modal" aria-hidden="true">全选</button>
    </form>
    
    <div class="modal-footer">
        
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">消</button>
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
