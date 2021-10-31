<?php
$url = 'https://data.taipei/opendata/datalist/apiAccess?scope=resourceAquire&rid=a3e2b221-75e0-45c1-8f97-75acbd43d613';

$handle = fopen($url, "rb");
$content = "";
while (!feof($handle)) {
    $content .= fread($handle, 1000);
}
fclose($handle);
$content = json_decode($content, true);
// echo $content['result']['count'] . "<br>";

$arr_name = array();
$arr_pic = array();

foreach ($content['result']['results'] as $k => $v) {
    $arr_name[$k] = $v['﻿A_Name_Ch'];
    $arr_pic[$k] = $v['A_Pic02_URL'];
}
// var_dump($arr_name);
// var_dump($arr_pic);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- -->
<form name="form" method="post" action="showPic.php" enctype="multipart/form-data" >
    <select name="number">
        <option>請選擇你最愛的寵物</option>
        <?php foreach ($arr_name as $k => $v) {
    echo '<option name="animals" value="' . $k . '">' . $v . '<option>';
}?>
    </select>
    <input type="submit" value="送出">

</form>

</body>
</html>
