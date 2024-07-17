<?php
require __DIR__ . '/vendor/autoload.php';
use RsLogger\Configuration;
use RsLogger\Creator;
use RsLogger\Message;
use RsApp\lib\MysqlLoggerCreator;
use RsApp\lib\MysqlLoggerConfiguration;

function testCliDriver(){
    $conf = Configuration::createConfigurationFromFile(__DIR__.DIRECTORY_SEPARATOR.'loggerConfiguration'.DIRECTORY_SEPARATOR.'cliDriverExampleConfiguration.ini');
    $loggerCreator = new Creator();
    $loggerCreator->setConfiguration($conf);
    $logger = $loggerCreator->createLogger();
    $message = new Message(0,'test message',
                ['r'=>'df'],'traceId',[0=>5]);
    $logger->logMessage($message);
}

function testFileDriver(){
    $conf = Configuration::createConfigurationFromFile(__DIR__.DIRECTORY_SEPARATOR.'loggerConfiguration'.DIRECTORY_SEPARATOR.'fileDriverExampleConfiguration.ini');
    $loggerCreator = new Creator();
    $loggerCreator->setConfiguration($conf);
    $logger = $loggerCreator->createLogger();
    $logger->log('INFO','mesaj de test',[],'2ewrd',['userId'=>45]);
}

function testFileDriverJsonFormatter(){
    $conf = new Configuration('RsLogger\driver\File',
            'RsLogger\formatter\Json',
            ['USER'=>0,'APP'=>1], 
            __DIR__.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'fileDriverJsonFormatterExampleConfiguration.log');
    $loggerCreator = new Creator();
    $loggerCreator->setConfiguration($conf);
    $logger = $loggerCreator->createLogger();
    $logger->log('APP','mesaj de test',[],'2ewrd',['userId'=>45]);
}

function testMysqlDriver(){
    $conf = new MysqlLoggerConfiguration(RsApp\lib\driver\Mysql::class,
            RsApp\lib\formatter\Mysql::class,
            ['DEBUG'=>0,
        'INFO'=>1,
        'WARNING'=>2], 
            ['dsn'=>'mysql:dbname=rslogger;host=mysql',
                'user'=>'rslogger',
                'password'=>'rslogger',
                'logTableName'=>'log']);

    $loggerCreator = new MysqlLoggerCreator();
    $loggerCreator->setConfiguration($conf);
    $logger = $loggerCreator->createLogger();
    $logger->log('WARNING', 'mesajul meu de test');
}

testCliDriver();
testFileDriver();
testFileDriverJsonFormatter();
testMysqlDriver();

