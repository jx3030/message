<?php
namespace fglpk\message;

/**
*主类
*完成信息发送操作的抽象
*1.从配置文件中获取发送操作使用的类，只调用其中的静态的send方法，返回成功失败
*2.从添加事件，用事件可以修改发送内容
**/
class Message
{
  /**
  *发送的主体方法
  *@param $data 发送的内容
  *@param $to 发送的对象
  *@param $type 需要制定对应配置文件中的sender的键的需要发送的类型，数组，一次可以发送多种
  *@param $context 扩展输入信息
  *@return 返回所有发送的send方法的返回值存放数组
  **/
  public function send($data, $to, array $context = array(), array $type=array('mail'))
  {
    $senders = $this->getSenders($type);
    if(!$senders)
      return false;

    //循环发送内容
    $sendResult = array();
    foreach($senders as $key=>$execSend)
    {
      $sendResult[$key] = $this->execSend(new $execSend, $data, $to, $context);
    }
    //发送后
    event(new \App\Events\MessageSend($data, $to, $type, $context));

    return $sendResult;
  }
  /**
  *分离获取要执行发送的类型列表
  **/
  public function getSenders($type)
  {
  	$senders = Config('message.sender');
  	$getSenders = array();
  	foreach($type as $v)
  	{
  	  if(array_key_exists($v, $senders))
  	  	$getSenders[$v] = $senders[$v];
  	}
  	return $getSenders;
  }
  /**
  *单步执行发送操作
  **/
  private function execSend(MessageSender $sender, $data, $to, array $context = array())
  {
  	$sender->send($data, $to, $context);
  }
}