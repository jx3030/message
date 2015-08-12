<?php
namespace fglpk\message;
/**
*所有发送信息的父类
**/
interface MessageSender
{
  /**
  *只有一个发送方法
  *传一个发送内容
  *第二个参数是接收的对象
  *如果需要可以传递数组的扩展信息
  **/
  public function send($data, $to, array $context = array());
}