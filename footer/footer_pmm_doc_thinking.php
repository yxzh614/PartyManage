<div class="well">
<h2>思想汇报</h2>
<div align="center">
	<table class="table">
  <tbody>
    <th>提交日期</th>
    <th style="width: 26px;"></th>
    <?php
    $sqlAllStudents = "SELECT sub_date FROM stage WHERE stage.docu_type='14' AND stage.ID_number = '".$_GET['stuId']."'";
    if ($resAS = mysqli_query($db, $sqlAllStudents)) {
        while ($rowsAS = mysqli_fetch_assoc($resAS)) {
            ?>
    <tr>
        <td>
            <?php echo date("Y年m月d日", strtotime($rowsAS["sub_date"])); ?>
        </td>
    </tr>
            <?php
        }
    }
    ?>
  
  </tbody>
</table>
</div>
