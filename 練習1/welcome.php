<?php
include "config.php";

// 使用者成功登入後看到的畫面
$sql = "SELECT * FROM `account` ORDER BY `id` ";
//執行查詢操作、處理結果集
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查詢sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//編寫查詢數量sql語句
$sql = 'SELECT COUNT(*) FROM `account`';
//執行查詢操作、處理結果集
$n = mysqli_query($link, $sql);
if (!$n) {
    exit('查詢數量sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
}
$num = mysqli_fetch_assoc($n);
//將一維數組的值轉換為一個字符串
$num = implode($num);
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k] = $v;
    }
}

session_start(); //可以用的變數存在session裡
// $username = $_SESSION["username"];

echo "<h1>你好" . $arr['name'] . "</h1>";
echo "<a href='logout.php'>登出</a>";