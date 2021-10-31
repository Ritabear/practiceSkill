<?php
//引入數據庫文件
include "config.php";
$sql = "SELECT * FROM `note` ORDER BY `id` ";
//執行查詢操作、處理結果集
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查詢sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//編寫查詢數量sql語句
$sql = 'SELECT COUNT(*) FROM `note`';
//執行查詢操作、處理結果集
$n = mysqli_query($link, $sql);
if (!$n) {
    exit('查詢數量sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
}
$num = mysqli_fetch_assoc($n);
//將一維數組的值轉換為一個字符串
$num = implode($num);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <title>帳目款項登記表</title>

    <style>
    a {
        color: ghostwhite;
        text-decoration: none;
    }

    /* em 斜体的文字不倾斜 */
    em {
        font-style: normal;
        display: inline-block;
        width: 100px;
        height: 40px;
        background-color: #33A1C9;
        text-align: center;
        line-height: 40px;
        color: ghostwhite;
        text-decoration: none;
        border-radius: 10px;
    }

    .red {
        font-style: normal;
        display: inline-block;
        width: 100px;
        height: 40px;
        background-color: red;
        text-align: center;
        line-height: 40px;
        color: ghostwhite;
        text-decoration: none;
        border-radius: 10px;
    }

    .add .out {
        font-size: 20px;
    }

    .show {
        font-size: 15px;
        border: 1px solid;
        border-collapse: collapse;
    }

    thead {
        background-color: #FFFFFF;

    }

    tbody {
        background-color: #F5F5F5;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>帳目款項登記表</h1>
        <em><a href="addData.html" class="add">新增</a></em>
        <em><a href="output.php" class="out">輸出Excel</a></em>
        <br>
        <br>
        <table class="show" width="100%" border="1">
            <thead>
                <tr>
                    <a href="?order=1"><input type="button" value="從小到大↓"></a>&nbsp;&nbsp;
                    <a href="?order=2"><input type="button" value="從大到小↑"></a>&nbsp;&nbsp;
                </tr>
                <tr>
                    <td>id</td>
                    <td>姓名</td>
                    <td>身份證</td>
                    <td>款項類型</td>
                    <td>金額</td>
                    <td>日期</td>
                    <td>操作</td>
                    <td>操作</td>
                </tr>
            </thead>

            <?php

$order = $_GET['order'] ?? null;
if($order == 1){
    $sql = "SELECT * FROM `note` ORDER BY `date` ASC ";
    //執行查詢操作、處理結果集
    $result = mysqli_query($link, $sql);
    if (!$result) {
        exit('查詢sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
    }
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($data);
}elseif($order == 2){
    $sql = "SELECT * FROM `note` ORDER BY `date` DESC ";
    //執行查詢操作、處理結果集
    $result = mysqli_query($link, $sql);
    if (!$result) {
        exit('查詢sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
    }
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($data);
}


foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k] = $v;
    }
    echo "<tbody>";
    echo "<tr id='delete{$arr['id']}'>";
    // <tr id="delete<?php echo $result['id'] "
    echo "<td>{$arr['id']}</td>";
    echo "<td>{$arr['name']}</td>";
    echo "<td>{$arr['identity']}</td>";
    echo "<td>{$arr['category']}</td>";
    echo "<td>{$arr['amount']}</td>";
    echo "<td>{$arr['date']}</td>";
    echo "<td>
	<em><a href='editData.php?id={$arr['id']}'>修改</a></em></td>" ;
    echo "<td><button onclick='deleteAjax({$arr["id"]})' class='red'>刪除</button></td>";

    echo "</tr>";
    echo "</tbody>";

    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
}

// 關閉連接
mysqli_close($link);

?>
        </table>
        <div>

            <!-- <script type="text/javascript">
            function del(id) {
                if (confirm("確定刪除這筆資料嗎？")) {
                    window.location = "action_del.php?id=" + id;
                }
            }
            </script> -->

            <script type="text/javascript">
            function deleteAjax(id) {
                console.log(id);
                if (confirm('are You sure?')) {
                    console.log("YES");
                    $.ajax({
                        type: 'post',
                        url: 'delete.php',
                        datas: {
                            delete_id: id
                        },
                        success: function(datas) {
                            $('#delete' + id).hide('slow');
                        },

                    });
                }
                console.log(datas);
            }
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>

</html>


<!-- CREATE TABLE note (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR (20) NOT NULL ,
identity VARCHAR (10) NOT NULL UNIQUE,
category VARCHAR (20) NOT NULL,
amount INT NOT NULL,
date datetime );

INSERT INTO `note` VALUES ('1', 'winnie', 'T224685795', '年費', '10000', '2010-12-29 14:01:36');
-->