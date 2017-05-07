<!DOCTYPE html>
<html lang="en">
  <head>
   <?php
   session_start();
   require_once("config.php");
   include('footer/footer_head.php');
   ?>

  </head>

  <?php
  if(isset($_POST["submit"])&&$_POST["submit"]) {
  $username = $_POST["username"];
  $password = sha1($_POST["password"]);
  $sqlLogin = "SELECT `rights` FROM user WHERE username='$username'AND password='$password'";
  $res = mysqli_query($db, $sqlLogin);
  if ($res) {
      if ($gets = mysqli_fetch_assoc($res)) {
          $_SESSION["right"] = $gets["rights"];
          switch ($_SESSION["right"]) {
              case 0: {
                  ?>
                  <script>
                      window.location = "Right_1/1_index.php";
                  </script>
                  <?php
              }
                  break;
          }


      } else {
          //err log
          echo "false";
          echo $password;
          echo $username;
          echo $sqlLogin;
          echo mysqli_fetch_assoc($res);
      }
  }else{
      echo "res wrong";
      echo $password;
      echo $username;
  }
  }else{
  ?>
  <body class="">

  <div class="navbar">
      <div class="navbar-inner">
          <ul class="nav pull-right">

          </ul>

          <a class="brand" href="#"><span class="first">沈阳理工大学信息科学与工程学院</span> <span class="second">党务工作信息系统</span></a>
      </div>
  </div>

  <div class="row-fluid">
      <div class="dialog">
          <div class="block">
              <p class="block-heading">登录</p>
              <div class="block-body">
                  <form action="sign-in.php" method="post">
                      <label>用户名：</label>
                      <input type="text" class="span12" name="username">
                      <label>密码：</label>
                      <input type="password" class="span12" name="password">

                      <!--目前默认登录到权限最高的人的首页，需后端判断开发-->
                      <input type="submit" name="submit" class="btn btn-primary pull-right" value="登录">

                      <label class="remember-me"><input type="checkbox"> Remember me</label>
                  </form>
              </div>
          </div>
          <p class="pull-right" style=""></p>
          <p><a href="reset-password.php">Forgot your password?</a></p>
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


