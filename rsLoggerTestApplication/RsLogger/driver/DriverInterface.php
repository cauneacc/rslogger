<?php
namespace RsLogger\driver;
use RsLogger\MessageInterface;

interface DriverInterface {
    public function log (MessageInterface $message):void;
}
