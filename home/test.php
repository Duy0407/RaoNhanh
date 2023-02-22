<?
include('config.php');
include ('../classes/PHPExcel/IOFactory.php');
require_once("../cache_file/home-cache.php");
$objPHPExcel = new PHPExcel();
// Loại file cần ghi là file excel phiên bản 2007 trở đi
$fileType = 'Excel2007';
// Tên file cần ghi
$fileName = 'DanhSach.xlsx';
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', "STT")
    ->setCellValue('B1', "Mã ngành nghề")
    ->setCellValue('C1', "Tên ngành nghề")
    ->setCellValue('D1', "URL");

$i = 2;
$j = 1;

$db_category = new db_query("SELECT cat_id,cat_name FROM category");
if (mysql_num_rows($db_category->result) > 0) {
    while ($row_category = mysql_fetch_assoc($db_category->result)) {
        $cat_id = $row_category['cat_id'];
        $cat_name = $row_category['cat_name'];

        $arr_cat[] = [
            'cat_id' => $cat_id,
            'cat_name' => $cat_name,
        ];
        unset($cat_id, $cat_name, $new_cat, $dmc);
    }
}
foreach($arr_cat as $key=>$value) {
    $link = 'https://raonhanh365.vn/mua-ban/'.$value['cat_id'].'/'.replaceTitle($value['cat_name']).'.html';
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A$i", $j++)
        ->setCellValue("B$i", $value['cat_id'])
        ->setCellValue("C$i", $value['cat_name'])
        ->setCellValue("D$i", $link);
    $i++;

}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
// Tiến hành ghi file
ob_end_clean();
$full_path = 'data_User.xlsx'; //duong dan file

$objWriter->save($full_path);
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$fileName");
$objWriter->save('php://output');

?>