<?php
namespace RsApp\lib\formatter;

use RsLogger\MessageInterface;
use RsLogger\formatter\FormatterInterface;

class Mysql implements FormatterInterface{
    function format(MessageInterface $message):array{
        return [':time'=>$message->timestamp->format('Y-m-d H:i:s'),
            ':logLevel'=>$message->logLevel,
            ':message'=>$message->message,
            ':metadata'=>json_encode($message->metadata),
            ':traceId'=>$message->traceId,
            ':traceAttributes'=>json_encode($message->traceAttributes)];
    }    
}

