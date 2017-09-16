<div class="btn-toolbar">
<button class="btn btn-primary" href="#change" role="button" data-toggle="modal"><i class="icon-plus"></i>新建</button>
    <button class="btn">导入</button>
    <button class="btn">导出</button>
     <button class="btn"><a href="#feiyong" role="button" data-toggle="modal"><font color="#000000">党费计算器</font></a></button>
</div>
<form action="../del.php" method="post">
    <input id="submitType" type="hidden" name="type" value="">
<div class="well">
    <table class="table">
        <thead>
        <tr>
            <th width="10"></th>
            <th width="144">身份证号</th>
            <th width="42">姓名</th>
            <th width="57">应缴金额(元)</th>
            <th width="60">实缴金额(元)</th>
            <th width="52">欠缴金额(元)</th>
            <th width="82">欠缴起始时间</th>
            <th width="82">欠缴结束时间</th>
            <th width="78">欠缴原因</th>
            <th width="89">处理意见</th>
            <th width="75">备注</th>
            <th width="26" style="width: 26px;"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        $sqlAllStudents = "SELECT arrears.*,name FROM arrears,personnelinformation where arrears.ID_number=personnelinformation.ID_number";
        if ($resAS = mysqli_query($db, $sqlAllStudents)) {
            while ($rowsAS = mysqli_fetch_assoc($resAS)) {
                echo "<tr>";
                echo "<td><input type='checkbox'  name='onetodel[]' value='" . $rowsAS["arrears_id"] . "'></td>";
                echo "<td>" . $rowsAS["ID_number"] . "</td>";
                echo "<td>" . $rowsAS["name"] . "</td>";
                echo "<td>" . $rowsAS["QJ_should"] . "</td>";
                echo "<td>" . $rowsAS["QJ_reality"] . "</td>";
                echo "<td>" . $rowsAS["QJ_money"] . "</td>";
                echo "<td>" . $rowsAS["QJ_starttime"] . "</td>";
                echo "<td>" . $rowsAS["QJ_endtime"] . "</td>";
                echo "<td>" . $rowsAS["QJ_reason"] . "</td>";
                echo "<td>" . $rowsAS["hand_advise"] . "</td>";
                echo "<td>" . $rowsAS["remark"] . "</td>";
                ?>
                <?php
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div class="btn-toolbar">
    <button class="btn btn-primary" type="button" name="allChecked" id="allChecked" onclick="DoCheck()">全选</button>
    <input  class="btn btn-primary" type="submit" name="submit" onclick="return allUncheck()&&confirm('确定要删除吗？')&&(()=>{document.getElementById('submitType').value='delArrears';})();" value="删除">
</div>
</form>
<!--党费计算-->
<div class="modal middle hide fade" id="feiyong" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">党费计算</h3>
    </div>
    <div class="modal-body">
     	<label>党员类型</label>
       <select name="dangyuantype">
        	<option value="1">在职</option>
            <option value="2">退休</option>
        </select>

        <label>岗位工资</label>
        <input type="text" name="gangWei" id="gangWei" value="" class="input-medium">
        <label>薪级工资</label>
        <input type="text" name="xinJi" id="xinJi" value="" class="input-medium">
        <label>基础绩效</label>
        <input type="text" name="jiChu" id="jiChu" value="" class="input-medium">
      <br>
      <button class="btn btn-primary" onclick="mearsure()">计算</button>
       <br>
       <br>
        <table class="table">
            <thead>
            <tr>
                <th width="10">养老保险</th>
                <th width="10">医疗保险</th>
                <th width="10">公积金</th>
                <th width="10">扣税</th>
                <th width="10">职业年金</th>
                <th width="10">基数</th>
                <th width="10">比例系数</th>
                <th width="10">应缴党费</th>
            </tr>
            </thead>
            <tbody>
            <th width="10"><i id="yangLaoBaoXian">0</i></th>
            <th width="10"><i id="yiLiaoBaoXian">0</i></th>
            <th width="10"><i id="gongJiJin">0</i></th>
            <th width="10"><i id="duty">0</i></th>
            <th width="10"><i id="ZhiYeNianJin">0</i></th>
            <th width="10"><i id="result">0</i></th>
            <th width="10"><i id="biLi">0</i></th>
            <th width="10"><i id="arr">0</i></th>
            </tbody>
        </table>
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancel" data-dismiss="modal" aria-hidden="true">关闭</button>
    </div>
    	<br/><br/><br/>
  </div>
    
</div>


<!--编辑信息-->
<form id="tab" method="post" action="../Right_1/1_pmm_arrears.php">
<div class="modal small hide fade" id="change" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">编辑信息</h3>
    </div>
    <div class="modal-body">
     	<label>身份证号</label>
        <select name="ID_number" class="input-large">
            <?php
            $sqlAllId="SELECT ID_number,name FROM personnelinformation WHERE out_time IS NULL AND (personnelinformation.person_cate2 = '1' OR person_cate2 = '2')";
            if($resAI=mysqli_query($db,$sqlAllId)){
                while($rowsAI=mysqli_fetch_assoc($resAI)){
                    ?>
                        <option value="<?php echo $rowsAI["ID_number"]; ?>"><?php echo  $rowsAI["name"]."(".$rowsAI["ID_number"].")"; ?></option>
            <?php
                    }
                }
            ?>
        </select>
        <label>应缴金额(元)</label>
        <input type="text" name="QJ_should" value="" class="input-xlarge">
        <label>实缴金额(元)</label>
        <input type="text" name="QJ_reality" value="" class="input-xlarge">
        <label>欠缴起始时间</label>
        <input type="date" name="QJ_starttime">
        <label>欠缴结束时间</label>
        <input type="date" name="QJ_endtime">
       	<label>欠缴原因</label>
        <input type="text" name="QJ_reason" value="" class="input-xlarge">
        <label>处理意见</label>
        <input type="text" name="hand_advise" value="" class="input-xlarge">
        <label>备注</label>
        <input type="text" name="remark" value="" class="input-xlarge">
    <div class="modal-footer">
        <button class="btn" id="btn_change_cancle" data-dismiss="modal" aria-hidden="true">取消</button>
        <input type="submit" name="submit" class="btn btn-danger" id="btn_change_save" value="保存">
    </div>
    	<br/><br/><br/>
  </div>
    
</div>
</form>

<!--删除信息-->
<div class="modal small hide fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<script>
    function mearsure() {
        let a = Number($("#gangWei").val());
        let b = Number($("#xinJi").val());
        let c = Number($("#jiChu").val());

        let jiChuXiang = a+b+c;
        let yingNaShuiE = jiChuXiang - 3500;
        let duty;
        if(yingNaShuiE<0)
            duty = 0;
        else if(yingNaShuiE<1500)
            duty = yingNaShuiE*0.03;
        else if(yingNaShuiE<4500)
            duty = yingNaShuiE*0.1-105;
        else if (yingNaShuiE<9000)
            duty = yingNaShuiE*0.2 -555;
        else if(yingNaShuiE<35000)
            duty = yingNaShuiE*0.25 -1005;
        else if (yingNaShuiE<55000)
            duty = yingNaShuiE*0.3-2755;
        else if (yingNaShuiE<80000)
            duty = yingNaShuiE*0.35-5505;
        else
            duty = yingNaShuiE*0.45-13505;

        let yangLaoBaoXian = jiChuXiang * 0.08;
        let yiLiaoBaoXian = jiChuXiang *0.02;
        let gongJiJin = jiChuXiang * 0.12;
        let ZhiYeNianJin = jiChuXiang * 0.04;

        let result = jiChuXiang - yiLiaoBaoXian - yangLaoBaoXian - gongJiJin - duty - ZhiYeNianJin;

        let biLi = 0;
        if(result <3000)
            biLi =0.005;
        else if(result <5000)
            biLi =0.01;
        else if(result <10000)
            biLi =0.015;
        else
            biLi =0.02;

        let arr = result * biLi;
        document.getElementById("yangLaoBaoXian").innerHTML = yangLaoBaoXian.toFixed(2).toString();
        document.getElementById("yiLiaoBaoXian").innerHTML = yiLiaoBaoXian.toFixed(2).toString();
        document.getElementById("gongJiJin").innerHTML = gongJiJin.toFixed(2).toString();
        document.getElementById("duty").innerHTML = duty.toFixed(2).toString();
        document.getElementById("ZhiYeNianJin").innerHTML = ZhiYeNianJin.toFixed(2).toString();
        document.getElementById("result").innerHTML = result.toFixed(2).toString();
        document.getElementById("biLi").innerHTML = biLi.toFixed(2).toString();
        document.getElementById("arr").innerHTML = arr.toFixed(2).toString();
    }
</script>
  