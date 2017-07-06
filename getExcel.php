<?php
/**
 * Created by PhpStorm.
 * User: 52668
 * Date: 17/6/21
 * Time: 18:41
 */

session_start();//huihua
include("footer/footer_head.php");
require_once("config.php");
if(isset($_COOKIE["PHPSESSID"])){
    session_id($_COOKIE["PHPSESSID"]);
    if (isset($_SESSION["right"]) && $_SESSION["right"] == 0) {

        include 'lib/PHPExcel.php';
        include 'lib/PHPExcel/Writer/Excel2007.php';/*PHPExcel*/

        $objPHPExcel=new PHPExcel();/*创建excel*/

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="abc.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save('php://output');

        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");/*创建人*/
        $objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");/*最后修改人*/
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");/*标题*/
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");/*题目*/
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");/*描述*/
        $objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");/*关键字*/
        $objPHPExcel->getProperties()->setCategory("Test result file");/*种类*/

        $objPHPExcel->setActiveSheetIndex(0);/*设置当前sheet*/
        $objPHPExcel->getActiveSheet()->setTitle('Simple');/*设置sheet名*/

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'String');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 12);
        $objPHPExcel->getActiveSheet()->setCellValue('A3', true);
        $objPHPExcel->getActiveSheet()->setCellValue('C5', '=SUM(C2:C4)');
        $objPHPExcel->getActiveSheet()->setCellValue('B8', '=MIN(B2:C5)');/*设置单元格的值*/

        $objPHPExcel->getActiveSheet()->mergeCells('A18:E22');/*合并单元格*/

        $objPHPExcel->getActiveSheet()->unmergeCells('A28:B28');/*分离单元格*/

        $objPHPExcel->getActiveSheet()->freezePane('A2');/*冻结窗口*/

        $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true); // Needs to be set to true in order to enable any worksheet protection!
        $objPHPExcel->getActiveSheet()->protectCells('A3:E13', 'PHPExcel');/*保护cell*/
    } else {
        ?>
        <script>
            alert("未登录或权限不足！");
            window.location = "../sign-in.php";
        </script>
        <?php
    }
}else{
    ?>
    <script>
        window.location = "../sign-in.php";
    </script>
    <?php
}