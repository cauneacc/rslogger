<?php
namespace RsLogger\formatter;

use RsLogger\MessageInterface;

class Json implements StringFormatterInterface{
    function format(MessageInterface $message):string{
        return json_encode($message);
    }    
}

