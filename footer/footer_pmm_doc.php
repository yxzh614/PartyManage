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
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='2' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
    ?></td>
    </tr>
    <tr>
      <td>自传</td>
      <td><?php
           $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='3' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

       </td>
    </tr>
     <tr>
      <td>入党积极分子培养考察表</td>
      <td><?php
           $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='4' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

       </td>
    </tr>
     <tr>
      <td>优秀团员作党的发展对象推荐表</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='5' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

       </td>
    </tr>
     <tr>
      <td>入党积极分子培训结业证</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='12' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
     <tr>
      <td>群众谈话记录</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='6' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
     <tr>
      <td>党支部综合性政审材料</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='7' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
    <tr>
      <td>函调信</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='8' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
    <tr>
      <td>公示材料</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='9' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
    <tr>
      <td>预备党员考察表</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='11' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
    <tr>
      <td>入党前短期集中培训合格证</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='13' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
     <tr>
      <td>入党志愿书</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='1' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>
    <tr>
      <td>转正申请</td>
      <td><?php
          $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='10' AND stage.ID_number = '".$_GET['stuId']."'";
          if ($resAS = mysqli_query($db, $sqlAllStudents)) {
              $flag = false;
              while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                  $flag = true;
                  ?>
                  <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
                  <?php
              }
              if(!$flag) echo "——";
          }
          ?></td>
      <td>

      </td>
    </tr>

  </tbody>
</table>
</div>
</div>