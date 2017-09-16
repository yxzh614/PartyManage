<!DOCTYPE html>
<html lang="en">
  <head>
         <?php
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php");
         session_start();
         if(isset($_COOKIE["PHPSESSID"])){
         session_id($_COOKIE["PHPSESSID"]);
         if (isset($_SESSION["right"]) && $_SESSION["right"] == 0){
         if(isset($_POST["submit"])&&$_POST["submit"]){
             //$dt = new DateTime();
             //$dt->format('Y-m-d H:i:s');
             $sqlAddStu = "INSERT INTO `personnelinformation` (ID_number,name,person_cate1,person_cate2) VALUES ( '" . $_POST['ID_number'] . "','" . $_POST['name'] . "'," . $_POST['person_cate1'] . "," . $_POST['person_cate2'] . ")";
             if (mysqli_query($db, $sqlAddStu)) {
                 // echo "==插入成功==";
                 echo "<script>alert('添加成功！')</script>";
             }
             ?>
             <script>
                 //alert("数据不能为空！");
                 //window.location = "1_DRM_stu_list.php";
             </script>
             <?php
         }
         ?>

  </head>

  <body class="">

  <?php include("1_footer_body_pmm.php"); ?>

  <div class="content">

      <div class="header">

          <h1 class="page-title">党员信息表</h1>
      </div>

      <ul class="breadcrumb">
          <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
      </ul>

      <div class="container-fluid">
          <div class="row-fluid">


              <!--表格信息-->
              <div class="btn-toolbar">
              <button class="btn btn-primary" href="#change" role="button" data-toggle="modal"><i class="icon-plus"></i>新建</button>
                  <button class="btn"><a href="#out" role="button" data-toggle="modal"><font
                                  color="#404040">调出</font></a></button>
                  <button class="btn">导出Excel表格</button>

              </div>
              <!--搜索框-->
              <div class="search-well">
                  <form class="form-inline">
                      <input class="input-xlarge" placeholder="根据身份证号或姓名查询" id="appendedInputButton" type="text">
                      <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                  </form>
              </div>
              <form action="../del.php" method="post">
                  <input id="submitType" type="hidden" name="type" value="">
              <div class="well">
                  <table class="table">
                      <thead>
                      <tr>
                          <th>&nbsp;</th>
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
                          <th style="width: 26px;"></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php
                      $sqlAllStudents = "SELECT *,Person_cate1_name FROM personnelinformation,person_cate1_bmb WHERE (`person_cate2`=1 OR`person_cate2`=2)  AND personnelinformation.out_time IS NULL AND person_cate1=Person_cate1_";
                      if ($resAS = mysqli_query($db, $sqlAllStudents)) {
                          while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                              echo "<tr>";
                              echo "<td><input type='checkbox'  name='onetodel[]' value='" . $rowsAS["ID_number"] . "'></td>";
                              echo "<td>" . $rowsAS["ID_number"] . "</td>";
                              echo "<td>" . $rowsAS["name"] . "</td>";
                              echo "<td>" . $rowsAS["Person_cate1_name"] . "</td>";
                              if($rowsAS["person_cate1"]==1){
                                  echo "<td><a href='1_pmm_information_basic_tea.php?stuId=" . $rowsAS["ID_number"] . " '>基本信息</a></td>";
                              }
                              else {
                                  echo "<td><a href='1_pmm_information_basic_stu.php?stuId=" . $rowsAS["ID_number"] . " '>基本信息</a></td>";
                              }


                              echo "<td><a href='1_pmm_information_development.php?stuId=" . $rowsAS["ID_number"] . " '>发展情况</a></td>";
                              if($rowsAS["person_cate1"]==1){
                                  echo "<td><a href='1_pmm_information_atSchool_tea.php?stuId=" . $rowsAS["ID_number"] . " '>在校情况</a></td>";
                              }
                              else {
                                  echo "<td><a href='1_pmm_information_atSchool_stu.php?stuId=" . $rowsAS["ID_number"] . " '>在校情况</a></td>";
                              }
                              echo "<td><a href='1_pmm_information_activities.php?stuId=" . $rowsAS["ID_number"] . " '>参与活动</a></td>";
                              echo "<td><a href='1_pmm_information_appraisement.php?stuId=" . $rowsAS["ID_number"] . " '>民主评议</a></td>";
                              echo "<td><a href='1_pmm_information_rorp.php?stuId=" . $rowsAS["ID_number"] . " '>奖惩情况</a></td>";
                              echo "<td><a href='1_pmm_information_regular_doc.php?stuId=" . $rowsAS["ID_number"] . " '>文档信息</a></td>";
                              echo "<td><a href='1_pmm_information_note.php?stuId=" . $rowsAS["ID_number"] . " '>备注</a></td>";?>
                              <?php
                              echo "</tr>";
                          }
                      }
                      ?>
                      </tbody>
                  </table>
              </div>
              <div class="btn-toolbar">
                  <button class="btn btn-primary" type="button" name="allChecked" id="allChecked" onclick="DoCheck()">全选</button>
                  <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('submitType').value='del';})();" value="删除">
              </div>

                  <!--调出-->
                  <div class="modal small hide fade" id="out" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
                       aria-hidden="true">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel">调出信息</h3>
                      </div>
                      <div class="modal-body">
                          <form id="tab">
                              <label>调出原因</label>
                              <select class="input-medium" name="state">
                                  <option value="2">毕业</option>
                                  <option value="3">退休</option>
                                  <option value="4">调出</option>
                              </select>
                              <label>调出至</label>
                              <input type="text" name="gowhere" value="" class="input-xlarge">
                              <label>调出日期</label>
                              <input type="date" name="out_time">
                          </form>
                          <div class="modal-footer">
                              <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                              <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要调出吗？')&&(()=>{document.getElementById('submitType').value='out';})();" value="确定">
                          </div>
                          <br/><br/><br/>
                      </div>

                  </div>

              </form>

              <!--新建信息-->
              <div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
                   aria-hidden="true">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">新建信息</h3>
                  </div>
                  <div class="modal-body">
                      <form id="tab" action="1_pmm_information.php"  method="post">
                          <label>身份证号</label>
                          <input type="text" name="ID_number" value="" class="input-medium">
                          <label>姓名</label>
                          <input type="text" name="name" value="" class="input-medium">
                          <label>人员类别</label>
                          <select name="person_cate1">
                              <option value="1">教师</option>
                              <option value="2">研究生</option>
                              <option value="3">本科生</option>
                          </select>
                          <label>信息类别</label>
                          <select name="person_cate2" class="input-medium">
                              <option value="1">正式党员</option>
                              <option value="2">预备党员</option>
                          </select>

                          <div class="modal-footer">
                              <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消
                              </button>
                              <input type="submit" name="submit" class="btn btn-danger" id="btn_change_save" value="保存">
                          </div>
                      </form>

                      <br/><br/><br/>
                  </div>
              </div>


              <!--删织信息-->
              <div class="modal small hide fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                   aria-hidden="true">
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


              <?php include("../footer/footer_bottom.php"); ?>

          </div>
      </div>
  </div>


  <script src="../lib/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript">
      $("[rel=tooltip]").tooltip();
      $(function () {
          $('.demo-cancel-click').click(function () {
              return false;
          });
      });
  </script>

  </body>
</html>
<?php
}
else {
    ?>
    <script>
        alert("未登录或权限不足！");
        window.location = "../sign-in.php";
    </script>
    <?php
}
}
else{
?>
<script>
    window.location = "../sign-in.php";
</script>
<?php
}