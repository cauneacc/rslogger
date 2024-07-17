<?php
namespace RsLogger\driver;
use RsLogger\formatter\StringFormatterInterface;
use RsLogger\MessageInterface;

class Cli implements DriverInterface{
    public function __construct(protected StringFormatterInterface $formatter) {
    }
    
    function log(MessageInterface $message):void{
        $formattedMessage = $this->formatter->format($message);
        echo $formattedMessage;
    }
}

