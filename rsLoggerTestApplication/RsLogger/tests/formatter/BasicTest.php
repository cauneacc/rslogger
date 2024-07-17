<?php

namespace RsLogger\tests\driver;

use RsLogger\formatter\Basic;
use RsLogger\Message;

/**
 *  @covers RsLogger\formatter\Basic
 */
class BasicTest extends \PHPUnit\Framework\TestCase{
    
    function testFormat(){
        $formatter = new Basic();
        $message = new Message(0,'test message',
                ['key'=>'value'],'traceId',[0=>4]);
        $result = $formatter->format($message);
        $expectedResult = $message->timestamp->format('c').' level:'.$message->logLevel.' message:'.$message->message.' metadata:'.var_export($message->metadata,true).' traceId:'.$message->traceId.' traceAttributes:'.var_export($message->traceAttributes,true);
        $this->assertEquals($expectedResult, $result);
    }
}
    

