<?php
namespace fglpk\message;

use Mail;
class EmailSender implements MessageSender
{
  public function send($data, $to, array $context = array())
  {
    Mail::send($data, $context, function ($message) use ($to, $context) {
      //邮件标题
      if(isset($context['subject']))
        $message->subject($context['subject']);
      $message->to($to);
    });
  }
}