<?php
namespace RsLogger\tests;

use RsLogger\Configuration;
use RsLogger\exception\ClassDoesNotExistException;
use RsLogger\driver\Cli;
use RsLogger\formatter\Basic;

/**
 *  @covers RsLogger\Configuration
 */
class ConfigurationTest extends \PHPUnit\Framework\TestCase{
    function testConstructorError(){
        $this->expectException(ClassDoesNotExistException::class);
        new Configuration('test','',[]);
        $this->expectException(ClassDoesNotExistException::class);
        new Configuration(Cli::class,'',[]);
    }
    
    function testConstructorSuccess(){
        $a = new Configuration(Cli::class,Basic::class,[]);
        $this->assertInstanceOf(Configuration::class, $a);
    }
    
    function testCreateConfigurationFromFile(){
        $configurationFilePath=__DIR__.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'testConfigurationFile.ini';
        $configuration = Configuration::createConfigurationFromFile($configurationFilePath);
        $this->assertInstanceOf(Configuration::class, $configuration);
    }
}
