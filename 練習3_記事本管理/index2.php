<?php

include 'config.php';

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
    $select = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($select);
}elseif($order == 2){
    $sql = "SELECT * FROM `note` ORDER BY `date` DESC ";
    //執行查詢操作、處理結果集
    $result = mysqli_query($link, $sql);
    if (!$result) {
        exit('查詢sql語句執行失敗。錯誤信息：' . mysqli_error($link)); // 獲取錯誤信息
    }
    $select = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($select);
}


$query = "SELECT * FROM note";
$select = mysqli_query($link,$query);
while ($result = mysqli_fetch_array($select)) {?>
            <tr id="delete<?php echo $result['id'] ?>">

                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['identity']; ?></td>
                <td><?php echo $result['category']; ?></td>
                <td><?php echo $result['amount']; ?></td>
                <td><?php echo $result['date']; ?></td>
                <!-- delete button -->
                <td><a href="editData.php?id={$arr['id']}">修改</a></td>
                <td><button onclick="deleteAjax(<?php echo $result['id'];  ?>)" class="btn btn-danger">delete</button>
                </td>
            </tr>
            <?php } ?>
            <script type="text/javascript">
            function deleteAjax(id) {

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
                        }
                    });
                }
            }
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>
<?php
$id = $_POST['delete_id'];
var_dump($id);
?>
</body>

</html>