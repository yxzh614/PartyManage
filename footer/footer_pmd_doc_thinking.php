<?php
require_once ("../public/config.php");
if (!isset($_SESSION)) session_start();
if (isset($_COOKIE["PHPSESSID"])) {
  session_id($_COOKIE["PHPSESSID"]);
  if (isset($_SESSION["right"]) && $_SESSION["right"] == 0) {
    
    if (isset($_POST["submit"]) && $_POST["submit"]) {
      echo 'post';
      $submess = '';
      if ($_POST['type']=='edit'){
        $sql = "UPDATE `stage` SET `sub_date` = '".$_POST['sub_date']."' WHERE ID = '".$_POST['ID']."'"; 
        $submess = '修改成功!';
      } else if ($_POST['type'] == 'new') {
        $sql = "INSERT INTO `stage`(`ID_number`, `docu_type`, `sub_date`) VALUES(".$_POST['ID_number'].", '14', '".$_POST['sub_date']."')";
        $submess = '新建成功!';
      }
      if ($resND = mysqli_query($db, $sql)) {
          ?>
          <script>
              alert("<?php echo $submess; ?>");
              window.location = "<?php echo $_POST['url']?>";
          </script>
          <?php
      } else {
          echo $sql;
      }
  } else {
    ?>
    <div class="btn-toolbar">
    <button class="btn btn-primary" ><a href="#new" role="button" data-toggle="modal"><font color="#F7F8F7">新建</font></a></button>
    </div>
    <div class="well">
      <h2>思想汇报</h2>
      <div align="center">
        <table class="table">
          <tbody>
            <th>提交日期</th>
            <th style="width: 26px;"></th>
            <?php 
              $sqlthinking = "SELECT ID, sub_date FROM `stage` WHERE docu_type = '14' AND ID_number = ".$_GET["ID"]." ORDER BY sub_date DESC";
              if ($rest = mysqli_query($db,$sqlthinking)) {
                while ($rowst = mysqli_fetch_assoc($rest)) {
                  ?>
            <tr>
            <td><?php echo $rowst['sub_date']?></td>
            <td>
              <a href="#change_0" class="doc" id="<?php echo $rowst['ID']?>" role="button" data-toggle="modal"><i class="icon-pencil"></i></a>
            </td>
          </tr>
          <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!--修改信息-->
    <div class="modal small hide fade" id="change_0" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
      </div>
      <div class="modal-body">     
        <form action="../footer/footer_pmd_doc_thinking.php" id="tab" method="post"> 
          <label>提交日期</label>
          <input type="date" id="TnewDate" name="sub_date">
          <input type="hidden" id="ID" name="ID" value="">
          <input type="hidden" name="type" value="edit">
          <input type="hidden" name="url" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>">
                        
          <div class="modal-footer">
            <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
            <input class="btn btn-danger" id="btn_change_sava" type="submit" name="submit" value="保存">
          </div>
        </form>
      </div>   
    </div>

    <!--新建信息-->
    <div class="modal small hide fade" id="new" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">新建信息</h3>
        </div>
        <div class="modal-body">     
        <form action="../footer/footer_pmd_doc_thinking.php" id="tab" method="post"> 
            <label>提交日期</label>
            <input type="date" name="sub_date">
            <input type="hidden" name="type" value="new">
            <input type="hidden" name="ID_number" value="<?php echo $_GET['ID'];?>">
            <input type="hidden" name="url"
                               value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>">
                        
        <div class="modal-footer">
            <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
            <input type="submit" name="submit" class="btn btn-danger" id="btn_change_sava" value="保存">
        </div>
        </form>
      </div>   
    </div>
    <script>
        $('.doc').on('click', function () {
            console.log($(this).parent().prev().html());
            $('#TnewDate').val($(this).parent().prev().html());
            
            console.log($(this).attr('id'));
            $('#ID').val($(this).attr('id'));
            console.log($('#newDate').val());
        })
    </script>
      <?php
  }
      } else {
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
