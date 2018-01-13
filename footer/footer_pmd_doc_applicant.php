
<div class="well">
<h2>文档信息</h2>
<div align="center">
	<table class="table">
  <tbody>
  	<th>文档类型</th>
    <th>提交日期</th>
    <th style="width: 26px;"></th>
    <tr>
      <td>入党申请书</td>
      <td>2014年07月22日</td>
      <td>
           <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
       </td>
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
    <form class="modal-body" action="../public/del.php" method="post">
        <label>提交日期</label>
        <input type="date" name="date" id="update">
        <input type="hidden" name="type" value="save_doc_2">
        <input type="hidden" name="ID_number" value="<?php echo $_GET["ID"] ?>">
        <div class="modal-footer">
            <button class="btn" type="button" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
            <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存">
        </div>
  </form>   
</div>