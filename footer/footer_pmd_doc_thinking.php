<div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#new" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
</div>
<div class="well">
<h2>思想汇报</h2>
<div align="center">
	<table class="table">
  <tbody>
    <th>提交日期</th>
    <th style="width: 26px;"></th>
    <tr>
      <td>2014年07月22日</td>
      <td>
           <a href="#change_0" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
      </td>
    </tr>
    <tr>
      <td>2014年10月22日</td>
      <td>
           <a href="#change_0" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
      </td>
    </tr>
  
  </tbody>
</table>
</div>
</div>
<!--修改信息-->
<div class="modal small hide fade" id="change_0" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab"> 
        <label>提交日期</label>
        <input type="date" name="">
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
  </div>   
</div>

<!--新建信息-->
<div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">新建信息</h3>
    </div>
    <div class="modal-body">     
    <form id="tab"> 
        <label>提交日期</label>
        <input type="date" name="">
    </form>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
    </div>
  </div>   
</div>
<script>
var vm = new Vue(
    {

    }
)
    vm.$http.get('../back-end/thinking').then(
        function (response) {
            alert(response)
        },
        function (response) {
            alert('err')
        }
    )
</script>