<!DOCTYPE html>
<html lang="en">
  <head>
      <?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php"); ?>
  </head>
 
  <body class=""> 
    
 <?php include("5_footer_body_pmm.php"); ?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">党员信息表</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="5_index.php">返回首页</a> <span class="divider"></span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<!--表格信息-->
<div class="btn-toolbar">
    <button class="btn">导出</button>
  
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr> 
          <th>身份证号</th>
          <th>姓名</th>
          <th>类别</th>
          <th>基本信息</th>
          <th>发展情况</th>
          <th>在校情况</th>
         
          <th>参与活动</th>
          <th>民主评议</th>
          <th>奖惩情况</th>
          <th>文档信息</th>
          <th>备注</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>134567543243213453</td>
          <td>张三</td>
           <td>正式党员</td>
          <td><a href="5_pmm_information_basic_stu.php">基本信息</a></td>
          <td><a href="5_pmm_information_development.php">发展情况</a></td>
          <td><a href="5_pmm_information_atSchool_stu.php">在校情况</a></td>
          
          <td><a href="5_pmm_information_activities.php">参与活动</a></td>
          <td><a href="5_pmm_information_appraisement.php">民主评议</a></td>
          <td><a href="5_pmm_information_rorp.php">奖惩情况</a></td>
          <td><a href="5_pmm_information_regular_doc.php">文档信息</a></td>
          <td><a href="5_pmm_information_note.php">备注</a></td>
        </tr>
        
        <tr>
          <td>134567543243213453</td>
          <td>李四</td>
           <td>预备党员</td>
          <td><a href="5_pmm_information_basic_tea.php">基本信息</a></td>
          <td><a href="5_pmm_information_development.php">发展情况</a></td>
          <td><a href="5_pmm_information_atSchool_tea.php">在校情况</a></td>
         
          <td><a href="5_pmm_information_activities.php">参与活动</a></td>
          <td><a href="5_pmm_information_appraisement.php">民主评议</a></td>
          <td><a href="5_pmm_information_rorp.php">奖惩情况</a></td>
          <td><a href="5_pmm_information_probationary_doc.php">文档信息</a></td>
          <td><a href="5_pmm_information_note.php">备注</a></td>
        </tr> 
      </tbody>
    </table>
</div>


 <!--/表格信息-->

 <?php include("../footer/footer_bottom.php"); ?>
                    
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


