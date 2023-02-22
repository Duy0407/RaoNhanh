<?
include('../home/config.php');
include('../ssl/assets/array/array_front_end.php');
include('../functions/array_index_tv.php');
$domain = 'https://raonhanh365.vn';
$array = [];

$sql_tags = "SELECT * FROM `news` WHERE 1 AND new_active = 1";

$db_qr = new db_query($sql_tags);
while ($row = mysql_fetch_assoc($db_qr->result)) {
    $alias = replaceTitle($row['new_title']);
    $link = $domain . '/tin-tuc/' . $alias . "-p" . $row['new_id'] . ".html";

    $array[] = [
        'title' => $row['new_title'],
        'url'  => $link
    ];
}
// // die("Không có yêu cầu");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Blog raonhanh365.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo '<table border="1px solid black">';
echo '<tr>';
echo '<td><strong> STT </strong></td>';
echo '<td><strong> Tiêu đề </strong></td>';
echo '<td><strong> URL </strong></td>';
foreach ($array as $key => $value) {
    echo '<table border="1px solid black">';
    echo '<tr>';
    echo '<td>' . ++$key . '</td>';
    echo '<td>' . $value['title'] . '</td>';
    echo '<td>' . $value['url'] . '</td>';
}
echo '</tr>';
echo '</table>';
