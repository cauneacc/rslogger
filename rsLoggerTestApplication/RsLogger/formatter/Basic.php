<?php
namespace RsLogger\formatter;
use RsLogger\MessageInterface;

class Basic implements StringFormatterInterface{
    function format(MessageInterface $message):string{
        return $message->timestamp->format('c').' level:'.$message->logLevel.' message:'.$message->message.' metadata:'.var_export($message->metadata,true).' traceId:'.$message->traceId.' traceAttributes:'.var_export($message->traceAttributes,true);
    }    
}
