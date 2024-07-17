<?php
namespace RsLogger;
use RsLogger\Message;
use RsLogger\driver\DriverInterface;

class Logger implements LoggerInterface{
    
    public function __construct(protected DriverInterface $driver, 
            protected array $messageLevels){
    }
    
    private function createMessage(int $logLevel, string $message, array $metadata, string $traceId, array $traceAttributes){
        return new Message($logLevel, $message, $metadata, $traceId, $traceAttributes);
    }

    public function log(string $messageLevelName, string $message, array $metadata=[], string $traceId='', array $traceAttributes=[]):void{
        $message = $this->createMessage($this->messageLevels[$messageLevelName], $message, $metadata, $traceId, $traceAttributes);
        $this->logMessage($message);
    }
    
    public function logMessage(Message $message){
        $this->driver->log($message);
    }

}
