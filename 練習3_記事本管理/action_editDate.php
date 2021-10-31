<?php

include "config.php";

// 獲取修改後的學生信息
// $identity = $_POST['identity']; //不允許修改
$id = $_POST['id'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$date = $_POST['date'];
echo $id;
echo $category;
echo $amount;
echo $date;
//編寫預處理sql語句
$sql = "UPDATE `note`
			SET
				`category`= ?,
				`amount`= ?,
				`date`= ?
			WHERE `id`= ?";
//備註

//预处理SQL模板
$stmt = mysqli_prepare($link, $sql);
// 参数绑定，并为已经绑定的变量赋值
mysqli_stmt_bind_param($stmt, 'ssss', $category, $amount, $date, $id);

if ($id) {
    // 执行预处理（第1次执行）
    $result = mysqli_stmt_execute($stmt);
    //关闭连接
    mysqli_close($link);

    if ($result) {
        //修改成功
        //跳转到首页
        header("Location:index.php");
    } else {
        exit('修改信息sql语句执行失败。错误信息：' . mysqli_error($link));
    }
} else {
    //修改失败
    //輸出提示，跳轉到首頁
    echo "修改失败！<br><br>";
    header('Refresh: 3; url=index.php'); //3s后跳转
}
