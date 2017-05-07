<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("footer/footer_head.php"); ?>
  </head>

<body class="">   
	<?php include("3_footer_body_pam.php"); ?>

	<div class="content"> 
        <div class="header">
            <h1 class="page-title">活动信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="3_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn">导出</button>
    </div>
    <!--搜索框-->
    	<div class="search-well">
                <form class="form-inline">
                    <input class="input-xlarge" placeholder="根据活动主题或日期查询" id="appendedInputButton" type="text">
                    <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                </form>
     	</div>
  
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>活动主题</th>
          <th>日期时间</th>
          <th>地点</th>
          <th>召集部门</th>
          <th>详细信息</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>活动主题</td>
          <td>2012.03.04</td>
          <td>XX227</td>
          <td>XXXX</td>
          <td><a href="3_pam_meeting_information.php">详细信息</a></td>
        </tr>
     
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="#">上一页</a></li>
        <li><a href="#">1</a></li> 
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">下一页</a></li>
    </ul>
</div>
<?php include("../footer/footer_bottom.php");?>
            </div>
        </div>
    </div>

    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


