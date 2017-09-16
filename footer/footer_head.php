 <head>
 <meta charset="utf-8">
    <title>党务工作信息系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="yuexianzhe">

    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/theme.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
    <script src="../lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <script src="../js/main.js"></script>
    <script src="../js/distpicker/dist/distpicker.data.min.js"></script>
    <script src="../js/distpicker/dist/distpicker.min.js"></script>
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    <!-- Demo page code -->

    <!-- <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style> -->
<?php 
// 获取表中下拉以及被选中的项
// 
function GetSelectGroup($db,$selectedResult,$sql,$realValue,$showValue){
    if($res=mysqli_query($db,$sql)){
        while($rows=mysqli_fetch_assoc($res)){
            if($selectedResult[$realValue]==$rows[$realValue]){
            ?>
            <option selected="selected" value="<?php echo $rows[$realValue]; ?>"><?php echo $rows[$showValue]; ?></option>
            <?php
            }else{
            ?>
            <option value="<?php echo $rows[$realValue]; ?>"><?php echo $rows[$showValue]; ?></option>
            <?php
            }
        }
    }
}
?>
</head>