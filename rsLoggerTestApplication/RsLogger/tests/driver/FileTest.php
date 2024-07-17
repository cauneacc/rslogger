<?php

namespace RsLogger\tests\driver;

use RsLogger\driver\File;
use RsLogger\formatter\Basic;
use RsLogger\Message;

/**
 *  @covers RsLogger\driver\File
 */

class FileTest extends \PHPUnit\Framework\TestCase{
    
    function testLogFailure(){
        $formatter = new Basic();
        $message = new Message(0,'test message',
                [],'traceId',[]);
        $fileDriver = new File($formatter,'');
        $this->expectExceptionMessage("Log file '''' is not writable");
        $fileDriver->log($message);
    }
    
    
    function testLogSuccess(){
        $logFilePath=__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'test.log';
        unlink($logFilePath);
        $formatter = new Basic();
        $message = new Message(0,'test message',
                [],'traceId',[]);
        $fileDriver = new File($formatter,$logFilePath);
        $fileDriver->log($message);
        $expectedResult=$formatter->format($message).PHP_EOL;
        $result = file_get_contents($logFilePath);
        $this->assertEquals($result, $expectedResult);
    }
}
    

