<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit; //記得要跳出來，不然會重複轉址過多次
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>
    <style>
    form{
        color: black;
        font-size: 30px;
    }
    .beauty{
        width: 100%;

    }
    label,
    .beauty{
        /* text-align: center; */
        padding-left: 20px;
    }
    input{
        width: 80%;
        }
    .fail{
        font-size: 20px;
        background-color: #fff;
        color:red;
        }
    </style>
</head>
<body>
    <div class="fail"><li>登入失敗！</li></div>
    <form method="post" action="login.php" name="form">
    <h3 align="center">登入</h3>
    <table name="login" align="center" width="40%" border="0">
        <tr>
            <td><label for="username">登入Email</label></td>
        </tr>
        <tr>
            <td class="beauty"><input type="text" name="username" placeholder="admin@mail.com" />
            </td>
        </tr>
        <tr>
            <td><label for="pwd">密碼</label></td>
        </tr>
        <tr>
            <td class="beauty"><input type="password" name="password"  placeholder="*******" />
            </td>
        </tr>
        <br><br>
        <tr>
            <td><input type="submit" value="送出" style="width:100%;height:50px;" /></td>
        </tr>
    </table>
    </form>

</body>
</html>
