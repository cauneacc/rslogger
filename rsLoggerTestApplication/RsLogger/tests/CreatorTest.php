<?php
namespace RsLogger\tests;

use RsLogger\Configuration;
use RsLogger\Creator;
use RsLogger\driver\Cli;
use RsLogger\formatter\Basic;
use RsLogger\Logger;

/**
 *  @covers RsLogger\Creator
 */

class CreatorTest extends \PHPUnit\Framework\TestCase{
    function testCreateLogger(){
        $creator = new Creator();
        $configuration = new Configuration(Cli::class,Basic::class,['DEBUG'=>0,
            'INFO'=>1,
            'WARNING'=>2]);

        $creator->setConfiguration($configuration);
        $logger = $creator->createLogger();
        $this->assertInstanceOf(Logger::class, $logger);
    }
}
