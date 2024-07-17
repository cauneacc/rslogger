<?php
namespace RsLogger;

class Message implements MessageInterface {
    public \DateTime $timestamp;
    public function __construct(
            public int $logLevel, 
            public string $message, 
            public array $metadata=[], 
            public string $traceId='', 
            public array $traceAttributes=[]) {
        $this->timestamp = new \DateTime();
    }
}

