
<?php
include "config.php";

//然後是輸出 Excel 最重要得 Header 部份：
// set header infomation
$file_type = "vnd.ms-excel";
$file_ending = "xls";
header("Pragma: public");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/$file_type");
header("Content-Disposition: attachment; filename=$dbTablename.$file_ending");
header("Content-Transfer-Encoding: binary ");
header("Pragma: no-cache");
header("Expires: 0");

//然後去把資料庫撈出來：
// export data to excel
$sql = "SELECT * FROM `note`";
// $sql = "SELECT * FROM . 'note' "; //error
//這裡就是搜尋字串和搜尋欄位的sql語法，也就是說，你原本的搜尋資料怎麼作，這裡就是帶入一樣的sql語法就好啦！
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：' . mysqli_error($link)); // 获取错误信息
}

$sep = "\t";
//Excel表頭
$title2Write = array('id', '姓名', '身份證', '款項類型', '金額', '日期', '操作');

for ($i = 0; $i < 7; $i++) {
    echo iconv("UTF-8", "UTF-8", $title2Write[$i]) . "\t";
}
print("\n");

//把資料開始塞到Excel 的所有欄位：
$i = 0;
while ($row = mysqli_fetch_row($result)) {
    $schema_insert = "";
    for ($j = 0; $j < mysqli_num_fields($result); $j++) {
        if (!isset($row[$j])) {
            $schema_insert .= "NULL" . $sep;
        } elseif ($row[$j] != "") {
            $schema_insert .= "$row[$j]" . $sep;
        } else {
            $schema_insert .= "" . $sep;
        }

    }
    $schema_insert = str_replace($sep . "$", "", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
    $i++;
}
