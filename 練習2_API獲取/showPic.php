<?php
require_once 'form.php';
// echo $_POST['number'];
$animal = $_POST['number'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顯示圖片</title>
</head>
<body>
    <h1>你選擇的是<?php echo $arr_name[$animal] ?></h1>
    <img src=<?php echo $arr_pic[$animal]; ?> alt="" title=<?php echo $arr_name[$animal] ?>>

</body>
</html>
