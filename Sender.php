<?php

include_once("Header.php");
include_once("Event.php");

$header = new Header();
$event = new Event();

$data = $header->encode(). $event->encode();

$len = strlen($data);

$len_bin = pack('N', $len);
$data_bin = pack("a{$len}", $data);

$_data = $len_bin . $data_bin;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);  
$connection = socket_connect($socket, '127.0.0.1', 54321);    //连接服务器端socket  
$result = socket_write($socket, $_data, strlen($_data));
var_dump($result);
?>