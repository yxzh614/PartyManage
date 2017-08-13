<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   require_once("config.php");
   include('../footer/footer_head.php');
   ?>
  </head>
  <?php
  if(isset($_POST["submit"])&&$_POST["submit"]) {
  $userName = $_POST["username"];
  $password = sha1($_POST["password"]);
  $sqlLogin = "SELECT `rights` FROM user WHERE username='$userName'AND password='$password'";
  if ($resL = mysqli_query($db, $sqlLogin)) {
      if ($rowL = mysqli_fetch_assoc($resL)) {
          switch ($_SESSION["right"] = $rowL["rights"]) {
               case 0: echo "<script>window.location = '../Right_1/1_index.php';</script>";break;
			   case 1: echo "<script>window.location = 'Right_2/2_index.php';</script>";break;
			   case 2: echo "<script>window.location = 'Right_3/3_index.php';</script>";break;
			   case 3: echo "<script>window.location = 'Right_4/4_index.php';</script>";break;
			   case 4: echo "<script>window.location = 'Right_5/5_index.php';</script>";break;
			   case 5: echo "<script>window.location = 'Right_6/6_index.php';</script>";break;
          }
      } else {
          //err log
          echo "未找到用户";
          echo $password;
          echo $userName;
          echo $sqlLogin;
          echo mysqli_fetch_assoc($resL);
      }
  }else{
      echo "无sql返回对象";
      echo $password;
      echo $userName;
  }
  }else{
  ?>

  <body class="body-sign-in">
 <div class="font-sign">
 	<img src="images/5.png" />信息科学与工程学院党务工作信息系统
 </div>
  <div class="row-fluid">
      <div class="dialog">
          <div class="block-sign">
              <p class="block-heading-sign">党务工作信息系统登录</p>
              <div class="block-body">
                  <form action="sign-in.php" method="post">
                      <label>用户名：</label>
                      <input type="text" class="span12" name="username" >
                      <label>密码：</label>
                      <input type="password" class="span12" name="password">
                      <input type="submit" name="submit" class="btn btn-primary pull-right" value="登录">

                      <label class="remember-me"><input type="checkbox">记住密码</label>
                  </form>
              </div>
          </div>
          <p class="pull-right" style=""></p>
          <p><a href="reset-password.php">找回密码?</a></p>
      </div>
  </div>
  <script src="lib/bootstrap/js/bootstrap.js"></script>
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


