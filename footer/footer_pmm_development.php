<form action="../Right_1/1_pmm_information_development.php?stuId=<?php echo $_GET["stuId"];?>" method="post" id="edit">
<div class="btn-toolbar">
    <input class="btn btn-primary" type="submit" name="submit" value="保存" onclick="showAreaID()">
</div>
 <?php
 $sqlAllStudents = "SELECT join_T_time,SQRD_time,LJJ_time,JJPX_time,Tmember_meet_time,LFZobject_time,
 DQPX_time,developmentplan_time,publicity_time,ZZ_publicity_time,bec_official_time,RD_datetime,JJPX_mark,DQPX_mark,
 ZQ_positivemeet_ID,ZQ_devemembermeet_ID,ZJ_readymeet_ID,ZSbec_officialmeet_ID,DS_readymeet_ID,bec_officialmeet_ID,
Department_ID,talk_site,talk_time,talker_ID FROM personnelinformation WHERE ID_number = '" . $_GET["stuId"] . "'";
 if ($resAS = mysqli_query($db, $sqlAllStudents)) {
     while ($rowsAS = mysqli_fetch_assoc($resAS)) { ?>

 <div class="well">
    <div align="center">
      <table width="830">
        <tbody>
          <tr align="right">
            <td>入团时间：</td>
            <td width="202" align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["join_T_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["join_T_time"])); ?>" name="join_t_time" class="input-medium"/></td>
            <td>申请入党时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["SQRD_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["SQRD_time"])); ?>" name="SQRD_time" class="input-medium" /></td>
            </tr>
          <tr align="right">
            <td>列积极分子时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["LJJ_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["LJJ_time"])); ?>" name="LJJ_time" class="input-medium" /></td>
            <td>入党积极分子培训时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["JJPX_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["JJPX_time"])); ?>" name="JJPX_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>团员大会日期：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["Tmember_meet_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["Tmember_meet_time"])); ?>" name="Tmember_meet_time"  class="input-medium"/></td>
            <td>列发展对象时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["LFZobject_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["LFZobject_time"])); ?>"  name="LFZobject_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>党前培训时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["DQPX_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["DQPX_time"])); ?>" name="DQPX_time" class="input-medium"/></td>
            <td>计划发展时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["developmentplan_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["developmentplan_time"])); ?>" name="Developmentplan_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>接收预备党员公示时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["publicity_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["publicity_time"])); ?>" name="Publicity_time" class="input-medium"/></td>
            <td>预备党员转正公示时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["ZZ_publicity_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["ZZ_publicity_time"])); ?>" name="ZZ_publicity_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>转正时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["bec_official_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["bec_official_time"])); ?>" name="Bec_official_time" class="input-medium"/></td>
            <td>入党时间：</td>
            <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["RD_datetime"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["RD_datetime"])); ?>" name="RD_datetime" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>积极分子培训成绩：</td>
            <td align="left"><input type="text" value="<?php echo $rowsAS["JJPX_mark"]; ?>" name="JJPX_mark" class="input-medium" /></td>
            <td>党前培训成绩：</td>
            <td align="left"><input type="text" name="DQPX_mark" value="<?php echo $rowsAS["DQPX_mark"]; ?>" class="input-medium" /></td>
          </tr>
          <tr align="right">
            <td>支部确定入党积极分子会议：</td>
            <td align="left"><input type="text" name="ZQ_positivemeet_ID" value="" class="input-medium" /></td>
            <td>支部确定发展对象会议：</td>
            <td align="left"><input type="text" name="ZQ_devemembermeet_ID" value="" class="input-medium" /></td>
          </tr>
          <tr align="right">
            <td>支部接收预备党员会议：</td>
            <td align="left"><input type="text" name="ZJ_readymeet_ID" value="" class="input-medium" /></td>
            <td>支部预备党员转正会议：</td>
            <td align="left"><input type="text" name="ZSbec_officalmeet_ID" value="" class="input-medium" /></td>
          </tr>
          <tr align="right">
            <td>党委审批预备党员会议：</td>
            <td align="left"><input type="text" name="DS_readymeet_ID" value="" class="input-medium" /></td>
            <td>党委审批预备党员转正会议：</td>
            <td align="left"><input type="text" name="Bec_officialmeet_ID" value="" class="input-medium" /></td>
          </tr>
          <tr align="right">
            <td>谈话人：</td>
            <td align="left"><input type="text" name="Talker_ID" value="<?php
                $sqlTalker = "SELECT name FROM personnelinformation WHERE ID_number = '".$rowsAS['talker_ID']."'";
                if ($resT = mysqli_query($db, $sqlTalker)) {
                    while ($rowsT = mysqli_fetch_assoc($resT)) {
                        echo $rowsT["name"];
                    }
                }
                ?>" class="input-medium" /></td>
            <td>谈话时间：</td>
              <td align="left"><input type="date" value="<?php echo date("Y-m-d",strtotime($rowsAS["talk_time"]))=="1970-01-01"?"":date("Y-m-d",strtotime($rowsAS["talk_time"])); ?>" name="Talk_time" class="input-medium" /></td>
          </tr>
          <tr align="right">
            <td>谈话地点：</td>
            <td align="left"><input type="text" name="Talk_site" value="<?php echo $rowsAS["talk_site"]; ?>" class="input-medium" /></td>
              <td width="203">组织机构：</td>
              <td width="190" align="left">
                  <select name="Department_ID" class="input-medium">
                      <?php
                      $sqlAllDepartment="SELECT Department_ID,name FROM organization";
                      if($resAD=mysqli_query($db,$sqlAllDepartment)){
                          while($rowsAD=mysqli_fetch_assoc($resAD)){
                              if($rowsAS["Department_ID"]==$rowsAD["Department_ID"]){
                                  ?>
                                  <option selected="selected" value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["name"];?></option>
                                  <?php
                              }else{
                                  ?>
                                  <option value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["name"]; ?></option>
                                  <?php
                              }
                          }
                      }
                      ?>
                  </select></td>
          </tr>
          </tbody>
      </table>
    </div>

  </div>

         <?php
     }
 }
 ?>
