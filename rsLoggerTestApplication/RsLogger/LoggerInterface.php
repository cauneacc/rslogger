<?php
namespace RsLogger;

interface LoggerInterface {
    public function log(string $messageLevelName, string $message, array $metadata=[], string $traceId='', array $traceAttributes=[]):void;
}
