<!DOCTYPE html>
<html lang="en">
  <head>
      <?php 
	session_start();
	include("../footer/footer_head.php"); 
	 require_once("../public/config.php");
      if(isset($_POST["submit"])&&$_POST["submit"]) {
          //$dt = new DateTime();
          //$dt->format('Y-m-d H:i:s');
          $sqlAddStu = "INSERT INTO `personnelinformation` (ID_number, person_cate1,person_cate2, major,nation,stu_number,class,name, sex, Datetime, Home_Add , tel,RD_datetime , in_time, in_where) VALUES ( '"
              . $_POST['ID_number'] . "','" . $_POST['person_cate1'] . "','" . $_POST['person_cate2'] . "','" . $_POST['major'] . "','" . $_POST['nation'] . "','" . $_POST['number'] . "','" . substr($_POST['number'], 0, 7) . "','" . $_POST['name'] . "','" . $_POST['sex'] . "','" . $_POST['datetime'].'-01' . "','"
              . /*$_POST['province'] . $_POST['city'] . $_POST['district'].*/  "000000','" . $_POST['tel'] . "','" . $_POST['RD_datetime'] . "','" . $_POST['in_time'] . "','" . $_POST['in_where'] . "')";
                              if (mysqli_query($db, $sqlAddStu)) {
              // echo "==插入成功==";
              echo "<script>alert('添加成功！')</script>";
          } else {
              ?>
                        <script>
                            alert("数据不能为空！");
                            window.location = "1_DRM_stu_list.php";
                        </script>
                        <?php
          }
      }
      ?>
  </head>

  <body class="">
  <?php include("1_footer_body_pmm.php"); ?>

  <div class="content">
      <div class="header">
          <h1 class="page-title">调入人员信息表</h1>
      </div>

      <ul class="breadcrumb">
          <li><a href="1_index.php">返回首页</a> <span class="divider"></span></li>
      </ul>

      <div class="container-fluid">
          <div class="row-fluid">

              <div class="btn-toolbar">
                  <button class="btn btn-primary"><a href="#new" role="button" data-toggle="modal"><font
                                  color="#F7F8F7">调入</font></a></button>
                  <button class="btn">导出Excel表格</button>
              </div>
              <!--搜索框-->
              <div class="search-well">
                  <form class="form-inline">
                      <input class="input-slarge" placeholder="身份证号" id="name" type="text">
                      <input class="input-small" placeholder="姓名" id="name" type="text">
                      <input class="input-slarge" placeholder="现所在支部" id="now-branch" type="text">
                      <input class="input-slarge" placeholder="调入自" id="" type="text">
                      调入日期：<input type="date" id="date">
                      <button class="btn" type="button"><i class="icon-search"></i> 查询</button>
                  </form>
              </div>

          </div>
          <div class="well">
              <table class="table">
                  <thead>
                  <tr>
                      <th width="50">&nbsp;</th>
                      <th>姓名</th>
                      <th>现所在支部</th>
                      <th>调入自</th>
                      <th>调入日期</th>
                      <th style="width: 26px;"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sqlAllStudents = "SELECT ID_number,name,Department_ID,in_time,in_where FROM personnelinformation WHERE in_time IS NOT NULL ";
                  if ($resAS = mysqli_query($db, $sqlAllStudents)) {
                      while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                          echo "<tr>";
                          echo "<td><input type='checkbox' name='checkboxGroup' value='" . $rowsAS["ID_number"] . "'></td>";
                          echo "<td>" . $rowsAS["name"] . "</td>";
                          echo "<td>" . $rowsAS["Department_ID"] . "</td>";
                          echo "<td>" . $rowsAS["in_where"] . "</td>";
                          echo "<td>" . $rowsAS["in_time"] . "</td>";
                          ?>
                          <td>
                              <a href="#change" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
                          </td>
                          </tr>
                      <?php }
                  } ?>
                  </tbody>
              </table>
          </div>

          <!--编辑信息-->
          <div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">编辑信息</h3>
              </div>
              <div class="modal-body">
                  <form id="tab">
                      <label>现所在支部</label>
                      <select name="">
                          <option value="0">第一支部</option>
                          <option value="1">第二支部</option>
                      </select>
                      <label>调入自</label>
                      <input type="text" name="" value="" class="input-xlarge">
                      <label>调入日期</label>
                      <input type="date" name="">
                  </form>
                  <div class="modal-footer">
                      <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                      <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
                  </div>
              </div>
          </div>
          <!--新建信息-->
          <div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">新建信息</h3>
              </div>
              <div class="modal-body">
                  <form id="tab" action="1_pmm_inside.php" method="post">
                      <label>身份证号：</label><input type="text" name="ID_number" value="" class="input-meduim">
                      <label>姓名：</label><input type="text" name="name" value="" class="input-meduim">
                      <label>性别：</label>
                      <input type="radio" name="sex" value="0" id="sex_0" checked="checked"/>男
                      <input type="radio" name="sex" value="1" id="sex_1"/>女
                      <label> 民族：</label>
                      <select name="nation" class="input-medium">
                          <?php
                          $sqlAllNation = "SELECT * FROM nation_bmb";
                          if ($resAN = mysqli_query($db, $sqlAllNation)) {
                              while ($rowsAN = mysqli_fetch_assoc($resAN)) {
                                  ?>
                                  <option value="<?php echo $rowsAN["nation"]; ?>"><?php echo $rowsAN["nation_name"]; ?></option>
                                  <?php
                              }
                          }
                          ?>
                      </select>
                      <label>籍贯:</label>
                      <select name="province" class="input-small">
                          <option value="00">辽宁</option>
                          <option value="1">河北</option>
                          <option value="2">黑龙江</option>
                      </select>
                      <select name="city" class="input-small">
                          <option value="00">沈阳</option>
                          <option value="1">本溪</option>
                      </select>
                      <select name="district" class="input-small">
                          <option value="00">浑南新区</option>
                          <option value="1">皇姑区</option>
                      </select>
                      <label>出生年月：</label><input type="month" name="datetime" value="" class="input-medium"/>
                      <label>入党时间：</label><input type="date" name="RD_datetime" value="" class="input-medium">
                      <label>是否正式：</label>
                      <select name="person_cate2" class="input-medium">
                          <option value="1">是</option>
                          <option value="2">否</option>
                      </select>
                      <label>人员类别：</label>
                      <select name="person_cate1" class="input-medium">
                          <option value="1">教师</option>
                          <option value="2">研究生</option>
                          <option value="2">本科生</option>
                      </select>
                      <label>联系电话：</label><input type="text" name="tel" value="" class="input-medium">
                      <label>学号：</label><input type="text" name="number" class="input-medium">
                      <label>专业：</label>
                      <select name="major">
                          <?php
                          $sqlAllMajor = "SELECT * FROM major_bmb";
                          if ($resAM = mysqli_query($db, $sqlAllMajor)) {
                              while ($rowsAM = mysqli_fetch_assoc($resAM)) {
                                  ?>
                                  <option value="<?php echo $rowsAM["major"]; ?>"><?php echo $rowsAM["major_name"]; ?></option>
                                  <?php
                              }
                          }
                          ?>
                      </select>
                      <label>调入支部：</label>
                      <select name="Department_ID">
                          <option value="0">第一支部</option>
                          <option value="1">第二支部</option>
                      </select>

                      <label>调入自：</label><input type="text" name="in_where" value="" class="input-medium">
                      <label>调入日期：</label><input type="date" name="in_time" class="input-medium">

                      <div class="modal-footer">
                          <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                          <input type="submit" name="submit" class="btn btn-danger" id="btn_change_save" value="保存">
                      </div>
                  </form>
              </div>
          </div>
          <!--批量调入-->
          <div class="modal small hide fade" id="batch" tabindex="10" role="dialog" aria-labelledby="myModalLabel"
               aria-hidden="true">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">批量调入</h3>
              </div>
              <div class="modal-body">
                  <form id="tab">
                      <label>调入支部</label>
                      <select name="">
                          <option value="0">第一支部</option>
                          <option value="1">第二支部</option>
                      </select>
                      <label>调入日期</label>
                      <input type="date" name="">
                      <label>详细信息:</label>
                      <input type="file">

                  </form>
                  <div class="modal-footer">
                      <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
                      <button class="btn btn-danger" id="btn_change_sava" data-dismiss="modal">保存</button>
                  </div>
              </div>
          </div>
          <!--删除信息-->
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


