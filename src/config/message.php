<?php
/**
*message的配置文件
**/
return array(
  //发送的接口配置，所有的发送接口需要实现MessageSender接口
  'sender' => [
    'mail' => 'fglpk\message\EmailSender',
  ]
);