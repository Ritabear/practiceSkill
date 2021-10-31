<?php

include 'config.php';

  // sorry need to get id 
var_dump($datas);
$id = $_POST['delete_id'];
var_dump($id);
var_dump('111111111111111111111111111111');


$query = mysqli_query($link,"DELETE FROM note WHERE id='$id'");

?>