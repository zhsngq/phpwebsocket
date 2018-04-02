<?php
require_once './Tool.php';

$action = [
  'getUserAll' => function ($server, $frame, $data) {
    $users = $_SESSION['userGg'];
    unset($users[$frame->fd]);
    $server ->push($frame->fd, json_encode([
      'users' => array_keys($users),
    ]));
  },
  'toUserMsg' => function($server, $frame, $data){
    $server->push($data->id, json_encode([
      'msg' => $data->msg
    ]));
  }
];
return $action;
