<?php

include "config.php";

// 獲取增加的信息
$name = $_POST['name'];
$identity = $_POST['identity'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$date = $_POST['date'];
echo $name;
echo $identity;
echo $category;
echo $amount;
echo $date;

//編寫預處理sql語句
$sql = "INSERT INTO `note` VALUES(NULL,?, ?, ?, ?, ?)";
echo $sql;
//預處理SQL模板
$stmt = mysqli_prepare($link, $sql);
// 參數綁定，並為已經綁定的變量賦值
mysqli_stmt_bind_param($stmt, 'sssss', $name, $identity, $category, $amount, $date);

if ($name) {
    // 執行預處理（第1次執行）
    $result = mysqli_stmt_execute($stmt);
    //關閉連接
    mysqli_close($link);

    if ($result) {
        //添加学生成功
        //跳转到首页
        header("Location:index.php");
    } else {
        exit('添加sql語句執行失敗。錯誤信息：' . mysqli_error($link));
    }
} else {
    //添加失败
    //輸出提示，跳轉到首頁
    echo "新增失敗！<br><br>";
    header('Refresh: 3; url=index.php'); //3s後跳轉
}
