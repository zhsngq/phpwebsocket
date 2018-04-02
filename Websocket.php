<?php
$action = require_once './Action.php';
require_once './Tool.php';

$server = new swoole_websocket_server("0.0.0.0", 9502);

$server->on('open', function ($server, $req) {
  echo "$req->fd;\r\n";
  $_SESSION['userGg'][$req->fd] = [];
});

$server->on('message', function ($server, $frame) use ($action) {
  echo $frame->data."-->\r\n";
  $data = json_decode($frame->data);
  if (isset($action[$data->action])) {
    $actionFunc = $action[$data->action];
    $actionFunc($server, $frame, $data);
  } else {
    echo 'no find action';
  }
});

$server->on('close', function ($server, $fd) {
  unset($_SESSION['userGg'][$fd]);
});

$server->start();
