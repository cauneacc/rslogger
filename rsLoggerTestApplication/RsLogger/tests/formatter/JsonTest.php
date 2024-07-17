<?php

namespace RsLogger\tests\driver;

use RsLogger\formatter\Json;
use RsLogger\Message;

/**
 *  @covers RsLogger\formatter\Json
 */
class JsonTest extends \PHPUnit\Framework\TestCase{
    
    function testFormat(){
        $formatter = new Json();
        $message = new Message(0,'test message',
                ['key'=>'value'],'traceId',[0=>4]);
        $result = $formatter->format($message);
        $expectedResult = json_encode($message);
        $this->assertEquals($expectedResult, $result);
    }
}
    

