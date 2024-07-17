<?php

namespace RsLogger\tests\driver;

use RsLogger\driver\Cli;
use RsLogger\formatter\Basic;
use RsLogger\Message;

/**
 *  @covers RsLogger\driver\Cli
 */
class CliTest extends \PHPUnit\Framework\TestCase{
    function testLog(){
        $formatter = new Basic();
        $message = new Message(0,'test message',
                [],'traceId',[]);
        $cliDriver = new Cli($formatter,'');
        $cliDriver->log($message);
        $expectedOutput=$formatter->format($message);
        $this->expectOutputString($expectedOutput);
    }
}    
    

