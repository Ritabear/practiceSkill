<?php
//開啟session
session_start();
$_SESSION = array();
session_destroy();
header('location:index.php');