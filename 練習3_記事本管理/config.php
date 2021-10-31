<?php
// 定義數據庫相關資訊
define('HOST', 'localhost');
define('USER', 'root');
define('PWD', '');
define('DB_NAME', 'HW');
define('CHARESET', 'utf8');

$link = mysqli_connect(HOST, USER, PWD, DB_NAME);
mysqli_query($link, CHARESET);

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    // echo '連線成功';
    return $link;
}
// require_once '../config.php';
