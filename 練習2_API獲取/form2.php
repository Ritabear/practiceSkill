<?php
// curl 比file_get_contents(). 一個簡單的 4 個字母的字符串需要大約 10 秒，而 curl 最多需要大約 1 秒
$url = 'https://data.taipei/opendata/datalist/apiAccess?scope=resourceAquire&rid=a3e2b221-75e0-45c1-8f97-75acbd43d613';
$ch = curl_init($url); // such as http://example.com/example.xml
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
// var_dump($data);

// $json_string = json_encode($arr);
// $obj = json_decode($data); //可以使用$obj->name訪問物件的屬性
//會有stdclass object

$arr=json_decode($data,true);//將第二個引數為true時將轉化為陣列
// print_r($arr);
echo $arr['result']['count'] . "<br>";

$arr_name = array();
$arr_pic = array();

foreach ($arr['result']['results'] as $k => $v) {
    $arr_name[$k] = $v['﻿A_Name_Ch'];
    $arr_pic[$k] = $v['A_Pic02_URL'];
}
var_dump($arr_name);
var_dump($arr_pic);