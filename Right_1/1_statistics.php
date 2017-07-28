<!doctype html>
<html>
<head>
<?php
   session_start();
   include("../footer/footer_head.php");
      require_once("../config.php");
if(isset($_COOKIE["PHPSESSID"])){
session_id($_COOKIE["PHPSESSID"]);
if(isset($_SESSION["right"]) &&$_SESSION["right"]==0){
?>
<meta charset="utf-8">
    <title>无标题文档</title>
<style type="text/css">
.select{width:auto;}
.input-medium{width:110px;}
</style>
</head>

<body>
 <?php include("../Right_1/1_footer_body_statistics.php"); ?>
 <div class="content">

        <div class="header">

            <h1 class="page-title">统计分析</h1>
        </div>

                <ul class="breadcrumb">
            <li><a href="1_index.php">返回首页</a>/<span class="divider">统计分析</span></li>
        </ul>
        <!--搜索框-->
    	<div class="search-well">
                <form action="../Right_1/1_statistics.php" method="post" class="form-inline">
                 &nbsp;
                <label>性别</label>
                  <select name="sex" class="select">
                      <option value="-1">无限制</option>
        	            <option value="0">男</option>
                        <option value="1">女</option>
                    </select>
                    &nbsp;
                  <label>民族</label>
                      <select name="nation" class="select">
                          <option value="-1">无限制</option>
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
                     &nbsp;
                     <label>类别</label>
                  <select name="kind" class="select">
                      <option value="-1">无限制</option>
        	            <option value="2">学生</option>
                        <option value="1">教师</option>
                    </select>
                     &nbsp;
                  <label>发展时间</label>
                    <input name="topDevTime" class="input-slarge" type="date">
                    ~
                     <input  name="bottomDevTime" class="input-slarge" type="date">
                     &nbsp;
                  <label>转正时间</label>
                  <input name="topTrueTime" class="input-slarge" type="date">
                   ~
                   <input name="bottomTrueTime" class="input-slarge" type="date">
                   &nbsp;
                    <input class="btn" type="submit" name="submit" value="查询统计" >
          </form>
     	</div>
        <div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>学号/教工号</th>
          <th>姓名</th>
          <th>性别</th>
          <th>民族</th>
          <th>类别</th>
          <th>发展时间</th>
          <th>转正时间</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST["submit"])&&$_POST["submit"]) {
            $sex=$_POST["sex"];
            $nation=$_POST["nation"];
            $kind=$_POST["kind"];
            $topDevTime=$_POST["topDevTime"];
            $bottomDevTime=$_POST["bottomDevTime"];
            $topTrueTime=$_POST["topTrueTime"];
            $bottomTrueTime=$_POST["bottomTrueTime"];

            $a = "";
            $b = "";
            $c = "";
            $d = "";

            if($sex != null && $sex>=0){
                $a = " and sex like '%$sex%'";}
            if($nation != null && $nation>=0){
                $b = " and nation like '%$nation%'";}
            if($kind != null && $kind>1){
                $c = " and ( person_cate1 like '2' or person_cate1 like '3')";
            }else if($kind != null && $kind == 1){
                $c = " and person_cate1 like '1'";
                }
            if($topDevTime != null && $bottomDevTime != null){
                $d = " and LFZobject_time between '$topDevTime' and '$bottomDevTime' ";
            }
                else if($topDevTime != null) {
                    $d = " and LFZobject_time like '$topDevTime' ";
                }

            if($topTrueTime != null && $bottomTrueTime != null){
                $d = " and bec_official_time between '$topTrueTime' and '$bottomTrueTime' ";
            }
            else if($topTrueTime != null) {
                $d = " and bec_official_time like '$topTrueTime'";
            }

            $sqlAnyStudents = "SELECT stu_number,name,sex,nation_name,Person_cate1_name,LFZobject_time,bec_official_time FROM personnelinformation,person_cate1_bmb,nation_bmb WHERE personnelinformation.out_time IS NULL AND person_cate1=Person_cate1_ AND nation_bmb.nation=personnelinformation.nation ";
            $sqlAnyStudents .=$a;
            $sqlAnyStudents .=$b;
            $sqlAnyStudents .=$c;
            $sqlAnyStudents .=$d;

            echo $sqlAnyStudents;
            if ($resAS = mysqli_query($db, $sqlAnyStudents)) {
                while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                    echo "<tr>";
                        echo "<td>" . $rowsAS["stu_number"] . "</td>";
                        echo "<td>" . $rowsAS["name"] . "</td>";
                        echo "<td>" . ($rowsAS["sex"] == 0 ? "男" : "女") . "</td>";
                        echo "<td>" . $rowsAS["nation_name"] . "</td>";
                        echo "<td>" . $rowsAS["Person_cate1_name"] . "</td>";
                        echo "<td>" . $rowsAS["LFZobject_time"] . "</td>";
                        echo "<td>" . $rowsAS["bec_official_time"] . "</td>";
                        echo "</tr>";
                }
            }
        }
        else {
            $sqlAllStudents = "SELECT stu_number,name,sex,nation_name,Person_cate1_name,LFZobject_time,RD_datetime FROM personnelinformation,person_cate1_bmb,nation_bmb WHERE personnelinformation.out_time IS NULL AND person_cate1=Person_cate1_ AND nation_bmb.nation=personnelinformation.nation";
            if ($resAS = mysqli_query($db, $sqlAllStudents)) {
                while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                    echo "<tr>";
                    echo "<td>" . $rowsAS["stu_number"] . "</td>";
                    echo "<td>" . $rowsAS["name"] . "</td>";
                    echo "<td>" . ($rowsAS["sex"] == 0 ? "男" : "女") . "</td>";
                    echo "<td>" . $rowsAS["nation_name"] . "</td>";
                    echo "<td>" . $rowsAS["Person_cate1_name"] . "</td>";
                    echo "<td>" . $rowsAS["LFZobject_time"] . "</td>";
                    echo "<td>" . $rowsAS["RD_datetime"] . "</td>";
                    echo "</tr>";
                }
            }
        }
        ?>
      </tbody>

      </tbody>
    </table>
</div>

 <?php include("../footer/footer_bottom.php");?>
     <script src="../lib/bootstrap/js/bootstrap.js"></script>
     <script type="text/javascript">
         $("[rel=tooltip]").tooltip();
         $(function() {
             $('.demo-cancel-click').click(function(){return false;});
         });
     </script>

</body>
</html>
<?php
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
