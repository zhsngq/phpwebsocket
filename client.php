<?php

require_once './WebSocketClient.php';
$ws = new WebSocketClient("192.168.199.179", 9502);

$ws->connect();


$data = [
  'action'=>'toUserMsg',
  'id'=>7,
  'msg'=>'test'
];
for ($i = 0; $i < 10; $i++) {
  echo $ws->send(json_encode($data));
}
