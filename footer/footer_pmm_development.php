 <div class="btn-toolbar">
    <button class="btn btn-primary" ><font color="#F7F8F7">编辑</font></button>
</div>
 <div class="well">
    <div align="center">
      <table width="830">
        <tbody>
          <tr align="right">
            <td width="215">发展阶段：</td>
            <td align="left"><select name="development_stage" class="input-medium">
              <option value="0">申请入党</option>
              <option value="1">确定入党积极分子</option>
              <option value="2">接收预备党员</option>
              <option value="3">预备党员转正</option>
            </select></td>
            <td width="203">组织机构：</td>
            <td width="190" align="left">
            <select name="Department_ID" class="input-medium">
        	 <?php
                                $sqlAllDepartment="SELECT * FROM department_id_bmb";
                                if($resAD=mysqli_query($db,$sqlAllDepartment)){
                                    while($rowsAD=mysqli_fetch_assoc($resAD)){
                                        ?>
                                        <option value="<?php echo $rowsAD["Department_ID"]; ?>"><?php echo $rowsAD["Department"]; ?></option>
                                        <?php
                                    }
                                }
                                ?>
        	</select></td>
          </tr>
          <tr align="right">
            <td>入团时间：</td>
            <td width="202" align="left"><input type="date"  name="join_t_time" class="input-medium"/></td>
            <td>申请入党时间：</td>
            <td align="left"><input type="date" name="SQRD_time" class="input-medium" /></td>
            </tr>
          <tr align="right">
            <td>列积极分子时间：</td>
            <td align="left"><input type="date" name="LJJ_time" class="input-medium" /></td>
            <td>入党积极分子培训时间：</td>
            <td align="left"><input type="date" name="JJPX_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>团员大会日期：</td>
            <td align="left"><input type="date" name="Tmember_meet_time"  class="input-medium"/></td>
            <td>列发展对象时间：</td>
            <td align="left"><input type="date"  name="LFZobject_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>党前培训时间：</td>
            <td align="left"><input type="date" name="DQPX_time" class="input-medium"/></td>
            <td>计划发展时间：</td>
            <td align="left"><input type="date" name="Developmentplan_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>接收预备党员公示时间：</td>
            <td align="left"><input type="date" name="Publicity_time" class="input-medium"/></td>
            <td>预备党员转正公示时间：</td>
            <td align="left"><input type="date" name="ZZ_publicity_time" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>转正时间：</td>
            <td align="left"><input type="date" name="Bec_official_time" class="input-medium"/></td>
            <td>入党时间：</td>
            <td align="left"><input type="date" name="RD_datetime" class="input-medium"/></td>
            </tr>
          <tr align="right">
            <td>积极分子培训成绩：</td>
            <td align="left"><input type="text" name="JJPX_mark" value="" class="input-medium" /></td>
            <td>党前培训成绩：</td>
            <td align="left"><input type="text" name="DQPX_mark" value="" class="input-medium" /></td>
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
            <td align="left"><input type="text" name="Talker_ID" value="" class="input-medium" /></td>
            <td>谈话时间：</td>
            <td><input type="date" name="Talk_time" class="input-medium" /></td>
          </tr>
          <tr align="right">
            <td>谈话地点：</td>
            <td align="left"><input type="text" name="Talk_site" value="" class="input-medium" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          </tbody>
      </table>
    </div>

  </div>
  
