<?php

include 'config.php';

//獲取id
$id = $_GET['id'];
//編寫查詢sql語句
$sql = "SELECT * FROM `note`";
//執行查詢操作、處理結果集
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：' . mysqli_error($link)); // 獲取錯誤信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//將二維數數組轉化為一維數組
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k] = $v;
    }
}

// echo "<pre>";
// var_dump($arr);
// echo "</pre>";
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>学生信息管理系统</title>
    <style type="text/css">
    body {
        background-image: url(student.jpg);
        background-size: 100%;
    }

    .box {
        display: table;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
    }

    .add {
        margin-bottom: 20px;
    }
    </style>
</head>

<body>

    <!--輸出定製表單-->
    <div class="box">
        <h2>修改信息</h2>
        <div class="add">
            <form action="action_editDate.php" method="post" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <th>编号</th>
                        <td><input type="text" name="id" size="5" value="<?php echo $id ?>" readonly="readonly"></td>
                    </tr>
                    <tr>
                        <th>身份證</th>
                        <td>
                            <p><?php echo $arr["identity"] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th>原服務項目</th>
                        <td>
                            <p><?php echo $arr["category"] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th>款項類型：</th>
                        <td>
                            <select name="category">
                                <option <?php if (!$arr["category"]) {echo "selected";}?> value="">--请选择--</option>
                                <option <?php if ($arr["category"] == "年費") {echo "selected";}?> value="annual_fee">年費
                                </option>
                                <option <?php if ($arr["category"] == "捐款") {echo "selected";}?> value="donation">捐款
                                </option>
                                <option <?php if ($arr["category"] == "入會費") {echo "selected";}?> value="admission_fee">
                                    入會費</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <th>金額</th>
                        <td><input type="text" name="amount" size="25" value="<?php echo $arr["amount"] ?>">
                        </td>

                    </tr>
                    <tr>
                        <th>收款日期</th>
                        <td><input type="text" name="date" size="25" value="<?php echo $arr["date"] ?>"></td>
                    </tr>
                    <tr>
                        <th>備註</th>
                        <td><textarea name="remark" rows="5" cols="45"></textarea></td>
                    </tr>
                    <th></th>
                    <td>
                        <input type="button" onClick="javascript :history.back(-1);"
                            value="返回">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="提交">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>