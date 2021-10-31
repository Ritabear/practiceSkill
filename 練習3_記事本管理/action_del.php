<?php
//连接数据库
include "config.php";

$id = $_GET['id'];
// var_dump($id);
//刪除指定數據
//編寫刪除sql語句
$sql = "DELETE FROM note WHERE id={$id}";
// echo $sql;
//執行查詢操作、處理結果集
$result = mysqli_query($link, $sql);
function alertMes($mes, $url)
{
    echo "<script>alert('$mes');</script>";
    echo "<script>window.location='{$url}';</script>";
}

if (!$result) {
    exit('sql语句执行失败。错误信息：' . mysqli_error($link)); // 獲取錯誤信息
} else {
    alertMes("插入数据成功", "index.php");
}

// 刪除完跳轉到首頁

header("Location:index.php");
