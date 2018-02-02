<?php
require_once ("../public/config.php");
if(!isset($_SESSION)){ session_start(); }
if(isset($_COOKIE["PHPSESSID"])){
session_id($_COOKIE["PHPSESSID"]);
if(isset($_SESSION["right"])&&$_SESSION["right"]==0){

if(isset($_POST["submit"])&&$_POST["submit"]) {
    echo $_POST['company_receive_adv'];
    echo $_POST['ZZ_publicity_time'];
    echo $_POST['survey_condtion'];
    echo $_POST['J_solve_adv'];
    echo $_POST['ins_condition_GJ'];
    echo $_POST['per_condition'];
    echo $_POST['CF_condition'];
    $sqlUpdateStu = "UPDATE personnelinformation
            SET 
            ZZ_publicity_time = '".($_POST["ZZ_publicity_time"] ? $_POST["ZZ_publicity_time"] : "0000-01-01")."'
            WHERE personnelinformation.ID_number='".$_POST["ID_number"]."'";
            $sql2= "UPDATE pm_publicity
            SET 
            company_receive_adv = '".($_POST["company_receive_adv"])."',
            survey_condtion = '".($_POST["survey_condtion"])."',
            J_solve_adv = '".($_POST["J_solve_adv"])."',
            ins_condition_GJ = '".($_POST["ins_condition_GJ"])."',
            per_condition = '".($_POST["per_condition"])."',
            CF_condition = '".($_POST["CF_condition"])."'
            WHERE pm_publicity.ID_number='".$_POST["ID_number"]."'";
    echo $sqlUpdateStu;
    echo $sql2;
    if (mysqli_query($db, $sqlUpdateStu)) {
      if (mysqli_query($db, $sql2)) {
        ?>
        <script>
            alert('保存成功！');
            window.location="<?php echo $_POST['url']?>";
        </script>
        <?php
      }
    }
}else{
?>
<div class="btn-toolbar">
    <button class="btn btn-primary" >编辑</font></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div align="center">
<table width="709">
  <tbody>
  </tbody>
</table>

  </div>
</div>
<form action="../footer/footer_pmd_regular_probationary.php" method="post">
<input type="hidden" name="url" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>">
<input type="hidden" name="ID_number" value="<?php echo $_GET["ID"] ?>">
<div class="btn-toolbar">
    <input class="btn btn-primary" type="submit" name="submit" value="保存">
  <div class="btn-group">
  </div>
</div>
<div class="well">
  <div align="center">
      <table width="795">
        <tbody>
            <?php
            $sqlGetStuR1="SELECT ZZ_publicity_time,pm_publicity.* FROM personnelinformation,pm_publicity WHERE pm_publicity.ID_number = '".$_GET["ID"]."' AND personnelinformation.ID_number='".$_GET["ID"]."'";
            if($resGSR1=mysqli_query($db,$sqlGetStuR1)){
                while ($rowsGSR1=mysqli_fetch_assoc($resGSR1)){
                    ?>                    
    <tr align="right">
      <td width="242">预备党员转正公示时间：</td>
      <td width="451" align="left"><input type="date" name="ZZ_publicity_time" class="input-meduim"  value="<?php echo $rowsGSR1['ZZ_publicity_time'];?>"/></td>
    </tr>
    <tr align="right">
      <td>公示期间收集到的意见：</td>
      <td align="left"><input type="text" name="company_receive_adv" class="input-large" value="<?php echo $rowsGSR1['company_receive_adv'];?>"/></td>
    </tr>
    <tr align="right">
      <td>调查核实情况：</td>
      <td align="left"><input type="text" name="survey_condtion"  class="input-large" value="<?php echo $rowsGSR1['survey_condtion'];?>"/></td>
    </tr>
    <tr align="right">
      <td>见处理意见：</td>
      <td align="left"><input type="text" name="J_solve_adv" class="input-large"  value="<?php echo $rowsGSR1['J_solve_adv'];?>"/></td>
    </tr>
    <tr align="right">
      <td>预备期审查会提出的不足改进情况：</td>
      <td align="left"><input type="text" name="ins_condition_GJ" class="input-large"  value="<?php echo $rowsGSR1['ins_condition_GJ'];?>"/></td>
    </tr>
    <tr align="right">
      <td>预备期内表现及存在的不足：</td>
      <td align="left"><input type="text" name="per_condition"  class="input-large" value="<?php echo $rowsGSR1['per_condition'];?>"/></td>
    </tr>
    <tr align="right">
      <td>预备期内处分情况：</td>
      <td align="left"><input type="text" name="CF_condition" class="input-large"  value="<?php echo $rowsGSR1['CF_condition'];?>"/></td>
    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
      </table>
  </div>
</div>
</form>

<?php
}
}else{
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
?>